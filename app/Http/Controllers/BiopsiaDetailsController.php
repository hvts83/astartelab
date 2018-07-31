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
use App\Models\Biopsia;
use App\Models\Imagen;
use App\Models\Precio;
use App\Models\Biopsia_detalle;
use App\Models\Biopsia_imagen;
use App\Models\Doctor;
use App\Models\Doctor_transaccion;
use App\Models\Consulta_transacciones;
use App\Mail\BiopsiaResults;

class BiopsiaDetailsController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
  }

  public function macro(Request $request, $id)
  {
    $this->validate($request, [
      'macro' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $macro = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'macro'],
      ['id', '=', $id]
    ])->first();
    
    $macro->detalle = $request->macro;
    $macro->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $macro->biopsia_id . "/edit");
  }

  public function micro(Request $request, $id)
  {
    $this->validate($request, [
      'micro' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $micro = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'micro'],
      ['id', '=', $id]
    ])->first();
    
    $micro->detalle = $request->micro;
    $micro->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $micro->biopsia_id . "/edit");
  }

  public function preliminar(Request $request, $id)
  {
    $this->validate($request, [
      'preliminar' =>'required',
      'dpreliminar' => 'required',
    ]);

    DB::beginTransaction();
    try {
    $preliminar = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'preliminar'],
      ['id', '=', $id]
    ])->first();
    
    $preliminar->detalle = $request->preliminar;
    $preliminar->save();

    $biopsia = Biopsia::find($preliminar->biopsia_id);
    $biopsia->informe_preliminar = $request->dpreliminar;
    $biopsia->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $preliminar->biopsia_id . "/edit");
  }

  public function inmunohistoquimica(Request $request, $id)
  {
    $this->validate($request, [
      'inmuno' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $inmunohistoquimica = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'inmunohistoquimica'],
      ['id', '=', $id]
    ])->first();
    
    $inmunohistoquimica->detalle = $request->inmuno;
    $inmunohistoquimica->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $inmunohistoquimica->biopsia_id . "/edit");
  }

  public function imagen(Request $request, $id)
  {
    $this->validate($request, [
      'imagen' => 'image|required',
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
      $url = 'images/biopsia/'. $id;
      $imageName = $id. 'img' . time() . '.' . $request->file('imagen')->getClientOriginalExtension();
      $request->file('imagen')->move( base_path() . '/public/' . $url , $imageName );
      $imagen = new imagen();
      $imagen->url = $url . '/' . $imageName;
      $imagen->save();

      $inimg = new Biopsia_imagen();
      $inimg->biopsia_id = $id;
      $inimg->imagen_id = $imagen->id;
      $inimg->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function primer_pago(Request $request, $id){
    $this->validate($request, [
      'precio_id' => 'required',
      'estado_pago' => 'required',
      'facturacion' => 'required',
      ]);

    $biopsia = Biopsia::find($id);
    $precioPagar = Precio::where('id', '=', $request->precio_id)->first();

    DB::beginTransaction();
    try {
      $biopsia->precio_id = $request->precio_id;
      $biopsia->estado_pago = $request->estado_pago;
      $biopsia->save();

      $ct = new Consulta_transacciones();
      $ct->tipo = "B";
      $ct->consulta = $biopsia->id;
      $ct->estado_pago = $biopsia->estado_pago;
      switch ($request->estado_pago) {
        case 'PP':
          $this->pagoDoctor( $biopsia->doctor_id, $precioPagar->monto);
          $ct->monto = $precioPagar->monto;
          $ct->saldo = 0;
          break;
        case 'AC':
          $ct->monto = $precioPagar->monto;
          $ct->saldo = 0;
          break;
        case 'PE':	
          $ct->monto = 0;	
          $ct->saldo = $precioPagar->monto;	
          break;
      }
      $ct->total = $precioPagar->monto;
      $ct->informe = $biopsia->informe;
      $ct->facturacion = $request->facturacion;
      $ct->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
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
