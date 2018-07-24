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

class DoctorController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data['page_title'] = "Ver doctores";
      $data['doctores'] = Doctor::all();
      return view('doctor.index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['page_title'] = "Nuevo doctor";

    return view('doctor.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'nombre' => 'max:64|required',
      'email' => 'email|max:64',
      ]);

      DB::beginTransaction();
        try {
          $doctor = new Doctor();
          $doctor->email = $request->email;
          $doctor->nombre = $request->nombre;
          $doctor->direccion = $request->direccion;
          $doctor->telefono = $request->telefono;
          $doctor->saldo = 0;
          $doctor->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/doctores');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['page_title']  = "Editar Doctor";
    $data['doctor'] =  Doctor::find($id);
    if ($data['doctor']  == null) { return redirect('doctores'); } //Verificación para evitar errores
    return view('doctor.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $doctor = Doctor::find($id);
    $this->validate($request, [
      'nombre' => 'max:64|required',
      'email'    => 'email|max:64',
      ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        $doctor->email = $request->email;
        $doctor->nombre = $request->nombre;
        $doctor->direccion = $request->direccion;
        $doctor->telefono = $request->telefono;
        $doctor->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
   DB::commit();
     return redirect('doctores/'. $id . "/edit");
  }

    public function destroy($id)
    { 
      $doctor = Doctor::find($id);
      $doctor->delete();
      return redirect('/doctores');
    }

}
