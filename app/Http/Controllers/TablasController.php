<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Helpers\General;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Biopsia;
use App\Models\Citologia;
use App\Models\Grupo;
use App\Models\Consulta_transacciones;
use PDF;


class TablasController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('rol:A');
  }

  public function biopsia(Request $request){
    
    $data['page_title'] = "Reportes de biopsias";
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();

    if( count($request->all()) > 0 ){
      $query = Biopsia::select('biopsias.*','doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('pacientes', 'pacientes.id', '=', 'paciente_id');
      
      if($request->has('doctor')){
        $query->where('doctor_id', '=',  $request->doctor);
      }
      if($request->has('paciente')){
        $query->where('paciente_id', '=', $request->paciente);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->desde != '' and $request->hasta != '' ){
        $query->whereRaw("CAST( REPLACE(REPLACE(informe, '-', ''), 'B', '') as int) 
          between  CAST( REPLACE(REPLACE('". $request->desde . "', '-', ''), 'B', '') as int) 
          and  CAST( REPLACE(REPLACE('". $request->hasta . "', '-', ''), 'B', '') as int)");
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(recibido) AND YEAR(?) = YEAR(recibido)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes),
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }
      $data['biopsias'] = $query->get();
    }
    return view('reportes.biopsia')->with($data);
  }
  
  public function citologia(Request $request){
    
    $data['page_title'] = "Reportes de citologías";
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();

    if( count($request->all()) > 0 ){
      $query = Citologia::select('citologia.*', 'doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('pacientes', 'pacientes.id', '=', 'paciente_id');
      
      if($request->has('doctor')){
        $query->where('doctor_id', '=',  $request->doctor);
      }
      if($request->has('paciente')){
        $query->where('paciente_id', '=', $request->paciente);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
        }elseif($request->desde != '' and $request->hasta != '' ){
          $query->whereRaw("CAST( REPLACE(REPLACE(informe, '-', ''), 'C', '') as int) 
            between  CAST( REPLACE(REPLACE('". $request->desde . "', '-', ''), 'C', '') as int) 
            and  CAST( REPLACE(REPLACE('". $request->hasta . "', '-', ''), 'C', '') as int)");
        }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(recibido) AND YEAR(?) = YEAR(recibido)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }
      $data['citologias'] = $query->get();
    }
    return view('reportes.citologia')->with($data);
  }

  public function grupo(Request $request){
    $data['page_title'] = "Reportes de grupos";
    $data['grupos'] = Grupo::all();

    if( count($request->all()) > 0 ){
      $query1 = Biopsia::select('biopsias.*', 'doctores.nombre as doctor_name', 'grupos.nombre as grupo_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('grupos', 'grupos.id', '=', 'grupo_id');
      
      if($request->has('grupo')){
        $query1->where('grupo_id', '=', $request->grupo);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query1->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->mes != ''){
        $query1->whereRaw('MONTH(?) = MONTH(recibido) AND YEAR(?) = YEAR(recibido)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query1->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }
      
      $query2 = Citologia::select('citologia.*', 'doctores.nombre as doctor_name', 'grupos.nombre as grupo_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('grupos', 'grupos.id', '=', 'grupo_id');
      
      if($request->grupo != 0){
        $query2->where('grupo_id', '=', $request->grupo);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query2->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->mes != ''){
        $query2->whereRaw('MONTH(?) = MONTH(recibido) AND YEAR(?) = YEAR(recibido)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query2->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }
      $data['cgrupos'] = $query2->union($query1)->get();

    }

    return view('reportes.grupo')->with($data);
  }

  public function ingresos(Request $request){
    $data['page_title'] = "Reportes de ingresos";
    $data['facturacion'] = General::getFacturacion();
    $data['pagos'] = General::getCondicionPago();
    
    if( count($request->all()) > 0 ){
      $query = Consulta_transacciones::where('estado_pago', '!=', 'PE');
      
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('created_at', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(created_at) AND YEAR(?) = YEAR(created_at)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(created_at)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }      
      $data['cpagos'] = $query->get();
    }
    return view('reportes.ingresos')->with($data);
  }

  public function controldiario(Request $request){
    $data['page_title'] = "Control Diario";
    $data['facturacion'] = General::getFacturacion();
    $data['pagos'] = General::getCondicionPago();
    
    if( count($request->all()) > 0 ){
      $query = Consulta_transacciones::where('monto', '>=', 0);
      
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('created_at', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(created_at) AND YEAR(?) = YEAR(created_at)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->dia != ''){
        $query->whereRaw('date(?) = date(created_at)', [Carbon  ::createFromFormat('d-m-Y', $request->dia)]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(created_at)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }  
      $data['cpagos'] = $query->get();
    }
    return view('reportes.control-diario')->with($data);
  }



  public function prepagados(Request $request){
    $data['page_title'] = "Reportes de prepagados";
    $data['facturacion'] = General::getFacturacion();
    $data['pagos'] = General::getCondicionPago();
    
    if( count($request->all()) > 0 ){
      $query = Consulta_transacciones::where('estado_pago', '=', 'PP');
      
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('created_at', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(created_at) AND YEAR(?) = YEAR(created_at)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(created_at)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }
      
      $data['cpagos'] = $query->get();

    }

    return view('reportes.prepagados')->with($data);
  }

  public function pendientes(Request $request){
    $data['page_title'] = "Reportes de pendientes de pago";
    $data['facturacion'] = General::getFacturacion();
    $data['pagos'] = General::getCondicionPago();
    
    if( count($request->all()) > 0 ){
      $query = Consulta_transacciones::where('estado_pago', '=', 'PE');
      
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('created_at', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(created_at) AND YEAR(?) = YEAR(created_at)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(created_at)', [Carbon::createFromFormat('d-m-Y', $request->annio)]);
      }
      $data['cpagos'] = $query->get();
    }

    return view('reportes.pendientes')->with($data);
  }

}
