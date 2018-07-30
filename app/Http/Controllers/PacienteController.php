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
use App\Models\Paciente;

class PacienteController extends Controller
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
        $data['page_title'] = "Ver pacientes";
        $data['pacientes'] = Paciente::all();
        return view('paciente.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['page_title'] = "Nuevo paciente";

      return view('paciente.create', $data);
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
        'name' => 'max:64|required',
        'sexo' => 'required',
        ]);

        DB::beginTransaction();
          try {
            $paciente = new Paciente();
            $paciente->email = $request->email;
            $paciente->name = $request->name;
            $paciente->sexo = $request->sexo;
            $paciente->documento = $request->documento;
            $paciente->edad = $request->edad;
            $paciente->meses = $request->meses;
            $paciente->telefono = $request->telefono;
            $paciente->save();
        } catch (\Exception $e) {
          DB::rollback();
          throw $e;
        }
       DB::commit();
       return redirect('/pacientes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['page_title']  = "Editar Paciente";
      $data['paciente'] =  Paciente::find($id);
      if ($data['paciente']  == null) { return redirect('pacientes'); } //Verificación para evitar errores
      $data['paciente']->edad = $data['paciente']->edad;
      return view('paciente.edit', $data);
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
      $paciente = Paciente::find($id);
      $this->validate($request, [
        'name' => 'max:64|required',
        'email'    => 'email|max:64',
        'sexo' => 'required',
        ]);

      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $paciente->email = $request->email;
          $paciente->name = $request->name;
          $paciente->sexo = $request->sexo;
          $paciente->documento = $request->documento;
          $paciente->edad = $request->edad;
          $paciente->meses = $request->meses;
          $paciente->telefono = $request->telefono;
          $paciente->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('pacientes/'. $id . "/edit");
    }

}
