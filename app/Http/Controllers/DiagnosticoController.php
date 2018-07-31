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
use App\Models\Diagnostico;

class DiagnosticoController extends Controller
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
      $data['page_title'] = "Ver diagnósticos";
      $data['diagnosticos'] = Diagnostico::all();
      $data['tipos'] = General::getTipoDiagnostico();
      return view('diagnostico.index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['page_title'] = "Nuevo diagnóstico";
    $data['tipos'] = General::getTipoDiagnostico();
    return view('diagnostico.create', $data);
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
      'nombre' => 'required',
      'tipo' => 'required',
      ]);

      DB::beginTransaction();
        try {
          $diagnostico = new Diagnostico();
          $diagnostico->nombre = $request->nombre;
          $diagnostico->tipo = $request->tipo;
          $diagnostico->detalle = $request->detalle;
          $diagnostico->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/diagnosticos');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['page_title']  = "Editar Diagnóstico";
    $data['diagnostico'] =  Diagnostico::find($id);
    if ($data['diagnostico']  == null) { return redirect('diagnosticos'); } //Verificación para evitar errores
    $data['tipos'] = General::getTipoDiagnostico();
    return view('diagnostico.edit', $data);
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
    $diagnostico = Diagnostico::find($id);
    $this->validate($request, [
      'nombre' => 'required',
      'tipo' => 'required',
      ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        $diagnostico->nombre = $request->nombre;
        $diagnostico->tipo = $request->tipo;
        $diagnostico->detalle = $request->detalle;
        $diagnostico->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
   DB::commit();
     return redirect('diagnosticos/'. $id . "/edit");
  }
}
