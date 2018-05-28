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
      $query = Biopsia::select('biopsias.*', 'doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
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
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(recibido) AND YEAR(?) = YEAR(recibido)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->mes)]);
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
      }elseif($request->mes != ''){
        $query->whereRaw('MONTH(?) = MONTH(recibido) AND YEAR(?) = YEAR(recibido)',
         [
          Carbon::createFromFormat('d-m-Y', $request->mes), 
          Carbon::createFromFormat('d-m-Y', $request->mes)
          ]);
      }elseif($request->annio != ''){
        $query->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->mes)]);
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
        $query1->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->mes)]);
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
        $query2->whereRaw('YEAR(?) = YEAR(recibido)', [Carbon::createFromFormat('d-m-Y', $request->mes)]);
      }
      $data['cgrupos'] = $query2->union($query1)->get();

    }

    return view('reportes.grupo')->with($data);
  }
}
