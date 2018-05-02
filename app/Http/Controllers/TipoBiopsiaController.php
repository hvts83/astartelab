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
use App\Models\Tipo_biopsia;

class TipoBiopsiaController extends Controller
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
        $data['page_title'] = "Ver Tipos  de Biopsias";
        $data['tipo_biopsias'] = Tipo_biopsia::all();
        return view('tipo_biopsia.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['page_title'] = "Nuevo Tipo de Biopsia";
      return view('tipo_biopsia.create', $data);
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
            $tipo_biopsia = new Tipo_biopsia();
            $tipo_biopsia->nombre = $request->nombre;
            $tipo_biopsia->save();
        } catch (\Exception $e) {
          DB::rollback();
          throw $e;
        }
       DB::commit();
       return redirect('/tipo-biopsia');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['page_title']  = "Editar Tipo de Biopsia";
      $data['tipo_biopsia'] =  Tipo_biopsia::find($id);
      if ($data['tipo_biopsia']  == null) { return redirect('tipo-biopsia'); } //Verificación para evitar errores
      return view('tipo_biopsia.edit', $data);
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
      $tipo_biopsia = Tipo_biopsia::find($id);
      $this->validate($request, [
        'nombre' => 'required',
        ]);

      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $tipo_biopsia->nombre = $request->nombre;
          $tipo_biopsia->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('tipo-biopsia/'. $id . "/edit");
    }

}
