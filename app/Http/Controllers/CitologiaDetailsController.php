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
use App\Models\Precio;
use App\Models\Citologia_imagen;
use App\Models\Doctor;
use App\Models\Doctor_transaccion;
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
      'micro' =>'required',
    ]);

    DB::beginTransaction();
    try {
      $citologia = Citologia::find($id);
      $citologia->micro = $request->micro;
      $citologia->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }


  public function dxlab(Request $request, $id)
  {
    $this->validate($request, [
      'dxlab' =>'required'
    ]);

    DB::beginTransaction();
    try {
      $citologia = Citologia::find($id);
      $citologia->dxlab = $request->dxlab;
      $citologia->save();
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
      'preliminar' =>'required'
    ]);

    DB::beginTransaction();
    try {
      $citologia = Citologia::find($id);
      $citologia->preliminar = $request->preliminar;
      $citologia->save();
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

  public function primer_pago(Request $request, $id){
    $this->validate($request, [
      'precio_id' => 'required',
      'estado_pago' => 'required',
      'facturacion' => 'required',
      'precio' => 'required'
      ]);

    $citologia = Citologia::find($id);
    $precioPagar = Precio::where('id', '=', $request->precio_id)->first();
    
    DB::beginTransaction();
    try {
      $citologia->precio_id = $request->precio_id;
      $citologia->estado_pago = $request->estado_pago;
      $citologia->save();

      $ct = new Consulta_transacciones();
      $ct->tipo = "C";
      $ct->consulta = $citologia->id;
      $ct->estado_pago = $citologia->estado_pago;
      switch ($request->estado_pago) {
        case 'PP':
          $this->pagoDoctor( $citologia->doctor_id, $request->precio);
          $ct->monto = $request->precio;
          $ct->saldo = 0;
          break;
        case 'AC':
          $ct->monto = $request->precio;
          $ct->saldo = 0;
          break;
      }
      $ct->total = $request->precio;
      $ct->informe = $citologia->informe;
      $ct->facturacion = $request->facturacion;
      $ct->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  protected function pagoDoctor($doctor_id, $monto){
    $doctor = Doctor::find($doctor_id);
    $nuevoSaldo = $doctor->saldo - $monto;
    //Inicio de las inserciones en la base de datos
    $trans = new Doctor_transaccion();
    $trans->doctor_id = $doctor->id;
    $trans->tipo = "E";
    $trans->monto = $monto;
    $trans->prev = $doctor->saldo;
    $trans->actual = $nuevoSaldo;
    $trans->save();

    $doctor->saldo = $nuevoSaldo;
    $doctor->save();
  }

}
