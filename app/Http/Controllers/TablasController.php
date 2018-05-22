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
    
    $data['page_title'] = "Ver biopsias";
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();

    if( count($request->all()) > 0 ){
      $query = Biopsia::select('biopsias.*', 'doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('pacientes', 'pacientes.id', '=', 'paciente_id');
      
      if($request->doctor != 0){
        $query->where('doctor_id', '=',  $request->doctor);
      }
      if($request->paciente != 0){
        $query->where('paciente_id', '=', $request->paciente);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }
      $data['biopsias'] = $query->get();
    }
    return view('reportes.biopsia')->with($data);
  }
  
  public function citologia(Request $request){
    
    $data['page_title'] = "Ver citologías";
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();

    if( count($request->all()) > 0 ){
      $query = Citologia::select('citologia.*', 'doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('pacientes', 'pacientes.id', '=', 'paciente_id');
      
      if($request->doctor != 0){
        $query->where('doctor_id', '=',  $request->doctor);
      }
      if($request->paciente != 0){
        $query->where('paciente_id', '=', $request->paciente);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
      }
      $data['citologias'] = $query->get();
    }
    return view('reportes.citologia')->with($data);
  }

  public function grupo(Request $request){
    $data['page_title'] = "Ver citologías";
    $data['grupos'] = Grupo::all();

    if( count($request->all()) > 0 ){
      $query1 = Biopsia::select('biopsias.*', 'doctores.nombre as doctor_name', 'grupos.nombre as grupo_name')
      ->join('doctores', 'doctores.id', '=', 'doctor_id')
      ->join('grupos', 'grupos.id', '=', 'grupo_id');
      
      if($request->grupo != 0){
        $query1->where('grupo_id', '=', $request->grupo);
      }
      if($request->inicio != '' and $request->fin != '' ){
        $query1->whereBetween('recibido', 
          [ 
            Carbon::createFromFormat('d-m-Y', $request->inicio), 
            Carbon::createFromFormat('d-m-Y', $request->fin) 
          ]);
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
      }
      $data['cgrupos'] = $query2->union($query1)->get();

    }

    return view('reportes.grupo')->with($data);
  }
}
