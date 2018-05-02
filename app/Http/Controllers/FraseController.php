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
use App\Models\Frase;

class FraseController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('rol:A');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data['page_title'] = "Ver frases";
      $data['frases'] = Frase::all();
      $data['tipos'] = General::getTipoFrases();
      return view('frase.index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['page_title'] = "Nuevo frase";
    $data['tipos'] = General::getTipoFrases();
    return view('frase.create', $data);
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
          $frase = new Frase();
          $frase->nombre = $request->nombre;
          $frase->tipo = $request->tipo;
          $frase->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/frases');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['page_title']  = "Editar frase";
    $data['frase'] =  Frase::find($id);
    if ($data['frase']  == null) { return redirect('frases'); } //Verificación para evitar errores
    $data['tipos'] = General::getTipoFrases();
    return view('frase.edit', $data);
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
    $frase = Frase::find($id);
    $this->validate($request, [
      'nombre' => 'required',
      'tipo' => 'required',
      ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        $frase->nombre = $request->nombre;
        $frase->tipo = $request->tipo;
        $frase->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
   DB::commit();
     return redirect('frases/'. $id . "/edit");
  }
}
