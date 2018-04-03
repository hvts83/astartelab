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
use App\Models\Tipo_citologia;

class TipoCitologiaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('acceso', ['only' => ['index']] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Ver Tipos  de Citologías";
        $data['tipo_citologias'] = Tipo_citologia::all();
        return view('tipo_citologia.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['page_title'] = "Nuevo Tipo de Citología";
      return view('tipo_citologia.create', $data);
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
            $tipo_citologia = new Tipo_citologia();
            $tipo_citologia->nombre = $request->nombre;
            $tipo_citologia->save();
        } catch (\Exception $e) {
          DB::rollback();
          throw $e;
        }
       DB::commit();
       return redirect('/tipo-citologia');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['page_title']  = "Editar Tipo de Citología";
      $data['tipo_citologia'] =  Tipo_citologia::find($id);
      if ($data['tipo_citologia']  == null) { return redirect('tipo-citologia'); } //Verificación para evitar errores
      return view('tipo_citologia.edit', $data);
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
      $tipo_citologia = Tipo_citologia::find($id);
      $this->validate($request, [
        'nombre' => 'required',
        ]);

      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $tipo_citologia->nombre = $request->nombre;
          $tipo_citologia->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('tipo-citologia/'. $id . "/edit");
    }

}
