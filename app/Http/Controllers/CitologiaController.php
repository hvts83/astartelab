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
use App\Models\Grupo;
use App\Models\Diagnostico;
use App\Models\Precio;
use App\Models\Citologia;
use App\Models\Consulta_transacciones;
use App\Models\Imagen;
use App\Models\Citologia_imagen;
use App\Models\Citologia_micro;
use App\Models\Citologia_preliminar;
use App\Models\Frase;


class CitologiaController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('acceso', ['only' => ['index','create']] );
  }

  public function index()
  {
      $data['page_title'] = "Ver citologias";
      $data['citologias'] = Citologia::select('citologia.*', 'doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
        ->join('doctores', 'doctores.id','=', 'doctor_id')
        ->join('pacientes', 'pacientes.id', '=', 'paciente_id')
        ->get();
      return view('citologia.index')->with($data);
  }

  public function create()
  {
    $data['page_title'] = "Solicitud citología";
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();
    $data['grupos'] = Grupo::all();
    $data['precios'] = Precio::where('tipo', '=', 'C')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'C')->get();

    return view('citologia.create', $data);
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
      'doctor_id' => 'required',
      'paciente_id' => 'required',
      'grupo_id' => 'required',
      'diagnostico_id' =>'required',
      'precio_id' => 'required',
      ]);

      $correlativo=  Consulta_transacciones::whereRaw('tipo = "C" AND MONTH(created_at) = MONTH(CURDATE())')->count();
      $informe = "C" . date('m') . ($correlativo + 1);
      //dd($informe);
      $precioPagar = Precio::where('id', '=', $request->precio_id)->first();

      DB::beginTransaction();
        try {
          $citologia = new Citologia();
          $citologia->doctor_id = $request->doctor_id;
          $citologia->paciente_id = $request->paciente_id;
          $citologia->grupo_id = $request->grupo_id;
          $citologia->precio_id = $request->precio_id;
          $citologia->diagnostico_id = $request->diagnostico_id;
          $citologia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
          $citologia->informe = $informe;
          $citologia->save();

          $ct = new Consulta_transacciones();
          $ct->tipo = "C";
          $ct->consulta = $citologia->id;
          $ct->informe = $citologia->informe;
          $ct->monto = $precioPagar->monto;
          $ct->save();

      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/citologia');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['citologia'] =  Citologia::find($id);
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['micro'] = Citologia_micro::where('citologia_id', '=', $id)->first();
    $data['imagenes'] = Citologia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('citologia_id', '=', $id)->get();
    $data['page_title']  = "Detalle " . $data['citologia']->informe;
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();
    $data['grupos'] = Grupo::all();
    $data['precios'] = Precio::where('tipo', '=', 'C')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'C')->get();
    $data['frases'] = Frase::where('tipo', '=', 'C')->get();
    $data['citologia']->recibido = General::formatoFecha( $data['citologia']->recibido );
    $data['citologia']->entregado = General::formatoFecha( $data['citologia']->entregado );

    return view('citologia.edit', $data);
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
    $citologia = Citologia::find($id);
    $this->validate($request, [
      'doctor_id' => 'required',
      'paciente_id' => 'required',
      'grupo_id' => 'required',
      'diagnostico_id' =>'required',
      'precio_id' => 'required',
      ]);

      $precioPagar = Precio::where('id', '=', $request->precio_id)->first();

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        $citologia->doctor_id = $request->doctor_id;
        $citologia->paciente_id = $request->paciente_id;
        $citologia->grupo_id = $request->grupo_id;
        $citologia->precio_id = $request->precio_id;
        $citologia->diagnostico_id = $request->diagnostico_id;
        $citologia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
        $citologia->entregado = Carbon::createFromFormat('d-m-Y', $request->entregado);
        $citologia->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
     return redirect('citologia/'. $id . "/edit");
  }
}
