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
use App\Models\Citologia_detalle;
use App\Models\Citologia_imagen;
use App\Models\Consulta_transacciones;
use App\Mail\CitologiaResults;

class CitologiaDetailsController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
  }

  public function macro(Request $request, $id)
  {
    $this->validate($request, [
      'macro_id' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $macros = Citologia_detalle::where([
      ['tipo_detalle', '=', 'macro'],
      ['citologia_id', '=', $id]
    ])->pluck('opcion_id');
    $macros = collect($macros)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->macro_id, $macros);
    //Valores a eliminar
    $eliminar = array_diff($macros, $request->macro_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'macro', $value);
    }
    $this->deleteDetalle($id, 'macro', $eliminar);

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  public function micro(Request $request, $id)
  {
    $this->validate($request, [
      'micro_id' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $micros = Citologia_detalle::where([
      ['tipo_detalle', '=', 'micro'],
      ['citologia_id', '=', $id]
    ])->pluck('opcion_id');
    $micros = collect($micros)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->micro_id, $micros);
    //Valores a eliminar
    $eliminar = array_diff($micros, $request->micro_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'micro', $value);
    }
    $this->deleteDetalle($id, 'micro', $eliminar);

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
      'preliminar_id' =>'required',
      'preliminar' => 'required',
    ]);

    DB::beginTransaction();
    try {
     $citologia  = Citologia::find($id);
     $citologia->informe_preliminar = $request->preliminar;
     $citologia->save(); 

    $preliminars = Citologia_detalle::where([
      ['tipo_detalle', '=', 'preliminar'],
      ['citologia_id', '=', $id]
    ])->pluck('opcion_id');
    $preliminars = collect($preliminars)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->preliminar_id, $preliminars);
    //Valores a eliminar
    $eliminar = array_diff($preliminars, $request->preliminar_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'preliminar', $value);
    }
    $this->deleteDetalle($id, 'preliminar', $eliminar);

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
        ['tipo', '=', 'B'],
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
        $ct->tipo = "B";
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
      'citologias.*',
      'pacientes.name as nombrePaciente',
      'pacientes.email as correoPaciente',
      'doctores.nombre as nombreDoctor',
      'doctores.email as correoDoctor',
      'precios.monto',
      'diagnosticos.nombre as diagnostico'
    )
    ->join('pacientes', 'citologias.paciente_id', '=', 'pacientes.id')
    ->join('doctores', 'citologias.doctor_id', '=', 'doctores.id')
    ->join('precios', 'citologias.precio_id', '=', 'precios.id')
    ->join('diagnosticos', 'citologias.diagnostico_id', '=', 'diagnosticos.id')
    ->where('citologias.id', '=', $id)
    ->first();

    Mail::to($citologia->correoPaciente, $citologia->correoDoctor )
    ->send(new CitologiaResults($citologia));

    return redirect('citologia/'. $id . "/edit");
  }

  private function createDetalle($citologia, $tipo_detalle, $opcion_id) {
    $detalle = new Citologia_detalle();
    $detalle->citologia_id = $citologia;
    $detalle->tipo_detalle = $tipo_detalle;
    $detalle->opcion_id = $opcion_id;
    $detalle->save();
  }

  private function deleteDetalle($citologia, $tipo_detalle, $detalle_id){
    $detalle = Citologia_detalle::where([
      ['citologia_id', '=', $citologia],
      ['tipo_detalle', '=', $tipo_detalle]
    ])
    ->whereIn('opcion_id', $detalle_id)
    ->delete();
  }

}
