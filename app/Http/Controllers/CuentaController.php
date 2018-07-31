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
use App\Models\Cuenta;

class CuentaController extends Controller
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
      $data['page_title'] = "Ver cuentas";
      $data['cuentas'] = Cuenta::all();
      return view('cuenta.index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['page_title'] = "Nuevo cuenta";

    return view('cuenta.create', $data);
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
      'codigo'    => 'required|max:8',
      ]);

      DB::beginTransaction();
        try {
          $cuenta = new Cuenta();
          $cuenta->codigo = $request->codigo;
          $cuenta->nombre = $request->nombre;
          $cuenta->fondo = 0;
          $cuenta->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/cuentas');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['page_title']  = "Editar Cuenta";
    $data['cuenta'] =  Cuenta::find($id);
    if ($data['cuenta']  == null) { return redirect('cuentas'); } //Verificación para evitar errores
    return view('cuenta.edit', $data);
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
    $cuenta = Cuenta::find($id);
    $this->validate($request, [
      'nombre' => 'max:64|required',
      'codigo'    => 'required|max:8',
      ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        $cuenta->codigo = $request->codigo;
        $cuenta->nombre = $request->nombre;
        $cuenta->save();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
   DB::commit();
     return redirect('cuentas/'. $id . "/edit");
  }
}
