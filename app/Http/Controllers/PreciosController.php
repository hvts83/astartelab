<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Helpers\General;
use App\Models\Precio;

class PreciosController extends Controller
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
      $data['page_title'] = "Ver Precios";
      $data['precios'] = Precio::all();
      $data['tipos'] = General::getTipoServicio();
      return view('precio.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['page_title'] = "Nuevo precio";
      $data['tipos'] = General::getTipoServicio();
      return view('precio.create', $data);
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
        'monto' => 'numeric|required',
        'tipo' => 'required'
        ]);

        DB::beginTransaction();
          try {
            $precio = new Precio();
            $precio->nombre = $request->nombre;
            $precio->monto = $request->monto;
            $precio->tipo = $request->tipo;
            $precio->save();
        } catch (\Exception $e) {
          DB::rollback();
          throw $e;
        }
       DB::commit();
       return redirect('/precios');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['page_title']  = "Editar precio";
      $data['precio'] =  Precio::find($id);
      if ($data['precio']  == null) { return redirect('precios'); } //Verificación para evitar errores
      $data['tipos'] = General::getTipoServicio();
      return view('precio.edit', $data);
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
      $precio = Precio::find($id);
      $this->validate($request, [
        'nombre' => 'required',
        'monto' => 'numeric|required',
        'tipo' => 'required'
        ]);

      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $precio->nombre = $request->nombre;
          $precio->monto = $request->monto;
          $precio->tipo = $request->tipo;
          $precio->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('precios/'. $id . "/edit");
    }
}
