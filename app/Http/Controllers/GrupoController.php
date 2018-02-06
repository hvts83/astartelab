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
use App\Models\Grupo;

class GrupoController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('rol:A');
      $this->middleware('acceso', ['only' => ['index','create']] );
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data['page_title'] = "Ver grupos";
      $data['grupos'] = Grupo::all();
      return view('grupo.index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['page_title'] = "Nuevo grupo";

    return view('grupo.create', $data);
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
      ]);

      DB::beginTransaction();
        try {
          $grupo = new Grupo();
          $grupo->nombre = $request->nombre;
          $grupo->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/grupos');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['page_title']  = "Editar Grupo";
    $data['grupo'] =  Grupo::find($id);
    if ($data['grupo']  == null) { return redirect('grupos'); } //Verificación para evitar errores
    return view('grupo.edit', $data);
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
    $grupo = Grupo::find($id);
    $this->validate($request, [
      'nombre' => 'required',
      ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        $grupo->nombre = $request->nombre;
        $grupo->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
   DB::commit();
     return redirect('grupos/'. $id . "/edit");
  }
}
