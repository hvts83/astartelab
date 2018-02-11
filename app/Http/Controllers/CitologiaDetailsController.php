<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Helpers\General;
use App\Models\Diagnostico;
use App\Models\Citologia;
use App\Models\Imagen;
use App\Models\Citologia_imagen;
use App\Models\Citologia_micro;
use App\Models\Citologia_diagnostico;
use App\Models\Consulta_transacciones;
use App\Mail\CitologiaResults;

class CitologiaDetailsController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
  }

  public function micro(Request $request, $id)
  {
    $this->validate($request, [
      'frase_id' =>'required',
      'detalle' => 'required',
      ]);

    $micro = Citologia_micro::where('citologia_id', '=', $id)->first();
    if ($micro == null) {
      $micro = new Citologia_micro();
    }
    DB::beginTransaction();
      try {
        $micro->citologia_id = $id;
        $micro->frase_id = $request->frase_id;
        $micro->detalle = $request->detalle;
        $micro->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  public function preliminar(Request $request, $id)
  {
    $this->validate($request, [
      'diagnostico_id' =>'required',
      'detalle' => 'required',
      ]);

    $preliminar = Citologia_diagnostico::where('citologia_id', '=', $id)->first();
    if ($preliminar == null) {
      $preliminar = new Citologia_diagnostico();
    }
    DB::beginTransaction();
      try {
        $preliminar->citologia_id = $id;
        $preliminar->diagnostico_id = $request->diagnostico_id;
        $preliminar->detalle = $request->detalle;
        $preliminar->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  public function imagen(Request $request, $id)
  {
    $this->validate($request, [
      'imagen' => 'image|required',
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
      $url = 'images/citologia/'. $id;
      $imageName = $id. 'img' . time() . '.' . $request->file('imagen')->getClientOriginalExtension();
      $request->file('imagen')->move( base_path() . '/public/' . $url , $imageName );
      $imagen = new imagen();
      $imagen->url = $url . '/' . $imageName;
      $imagen->save();

      $inimg = new Citologia_imagen();
      $inimg->citologia_id = $id;
      $inimg->imagen_id = $imagen->id;
      $inimg->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  public function abono(Request $request, $id)
  {
    $this->validate($request, [
      'monto' =>'required',
      'facturacion' => 'required',
      ]);

      $citologia = Citologia::find($id);
      $consultaSaldo = Consulta_transacciones::where([
        ['tipo', '=', 'C'],
        ['consulta', '=', $id]
      ])->orderBy('created_at', 'DESC')->first();

      $nuevoSaldo = $consultaSaldo->saldo - $request->monto;
      $estado = "AP";
      if ($nuevoSaldo == 0) {
          $estado = "AC";
      }

    DB::beginTransaction();
      try {
        $ct = new Consulta_transacciones();
        $ct->tipo = "C";
        $ct->consulta = $citologia->id;
        $ct->estado_pago = $estado;
        $ct->total = $consultaSaldo->total;
        $ct->monto = $request->monto;
        $ct->saldo = $nuevoSaldo;
        $ct->informe = $citologia->informe;
        $ct->facturacion = $request->facturacion;
        $ct->save();

        $citologia->estado_pago= $estado;
        $citologia->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  public function send(Request $request, $id){
    $citologia = Citologia::select(
      'citologia.*',
      'pacientes.name as nombrePaciente',
      'pacientes.email as correoPaciente',
      'doctores.nombre as nombreDoctor',
      'doctores.email as correoDoctor',
      'precios.monto',
      'diagnosticos.nombre as diagnostico'
    )
    ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
    ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
    ->join('precios', 'citologia.precio_id', '=', 'precios.id')
    ->join('diagnosticos', 'citologia.diagnostico_id', '=', 'diagnosticos.id')
    ->where('citologia.id', '=', $id)
    ->first();

    Mail::to($citologia->correoPaciente, $citologia->correoDoctor )
    ->send(new CitologiaResults($citologia));

    return redirect('citologia/'. $id . "/edit");
  }

}
