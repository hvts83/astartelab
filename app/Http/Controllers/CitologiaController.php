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
use App\Models\Frase;
use App\Models\Precio;
use App\Models\Consulta_transacciones;
use App\Models\Imagen;
use App\Models\Citologia;
use App\Models\Citologia_detalle;
use App\Models\Citologia_imagen;
use App\Models\Doctor_transaccion;
use PDF;


class CitologiaController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function index()
  {
      $data['page_title'] = "Ver citologías";
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
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'C')->get();
    $data['frases'] = Frase::where('tipo', '=', 'C')->get();
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
      'diagnostico' =>'required',
      ]);

      $correlativo=  Citologia::select('informe')
      ->whereRaw('MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(NOW())')
      ->orderBy('informe', 'desc')->first();
      $parte_inicial= "C" . date('y') . date('n') .'-';
      if($correlativo== null){
        $informe = $parte_inicial . str_pad(1, 3, "0", STR_PAD_LEFT);
      }else{
        $informe = $parte_inicial . str_pad((str_replace($parte_inicial, '', $correlativo->informe ) + 1), 3, "0", STR_PAD_LEFT);
      }

      DB::beginTransaction();
        try {
          $citologia = new Citologia();
          $citologia->doctor_id = $request->doctor_id;
          $citologia->paciente_id = $request->paciente_id;
          $citologia->grupo_id = $request->grupo_id;
          $citologia->informe = $informe;
          $citologia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
          $citologia->entregado = Carbon::createFromFormat('d-m-Y', $request->entregado);
          $citologia->diagnostico = $request->diagnostico;
          $citologia->micro = $request->micro;
          $citologia->dxlab = $request->dxlab;
          $citologia->preliminar = $request->preliminar;
          $citologia->save();

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
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['imagenes'] = Citologia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('citologia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'C'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['citologia']->informe;
    $data['pacienteConsulta'] = Paciente::find($data['citologia']->paciente_id);
    $data['precios'] = Precio::where('tipo', '=', 'C')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'C')->get();
    $data['frases'] = Frase::where('tipo', '=', 'C')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
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
      'diagnostico' =>'required',
      'informe' => 'required'
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        if($request->informe !== $citologia->informe ){
          $comprobacion = Citologia::where('informe')->count();
          if($comprobacion === 0){
            Consulta_transacciones::where('informe', '=', $citologia->informe)->update(['informe' => $request->informe]);
            $citologia->informe = $request->informe;
          }
        }
        $citologia->diagnostico = $request->diagnostico;
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


   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function pdf($id){
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['citologia']->recibido = General::formatoFecha( $data['citologia']->recibido );
    $data['citologia']->entregado = General::formatoFecha( $data['citologia']->entregado );
    $pdf = PDF::loadView('/citologia/pdf', $data);
    return $pdf->download( $data['citologia']->informe . '.pdf');
  }


   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function print($id)
  {
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['citologia']->recibido = General::formatoFecha( $data['citologia']->recibido );
    $data['citologia']->entregado = General::formatoFecha( $data['citologia']->entregado );
    $pdf = PDF::loadView('/citologia/print', $data);
    return $pdf->stream( $data['citologia']->informe . '.pdf');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function sm($id)
  {
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['citologia']->recibido = General::formatoFecha( $data['citologia']->recibido );
    $data['citologia']->entregado = General::formatoFecha( $data['citologia']->entregado );
    $pdf = PDF::loadView('/citologia/sm', $data);
    return $pdf->stream( $data['citologia']->informe . '.pdf');
  }

  
  public function envelope($id){
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $pdf = PDF::loadView('/citologia/envelope', $data)->setPaper('DL');
    return $pdf->stream( $data['citologia']->informe . '-sobre'.'.pdf');
  }

  public function show(Request $request){
    $data['citologias'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->whereIn('citologia.id', $request->id )
      ->get();
    $pdf = PDF::loadView('/citologia/select_print', $data);
    return $pdf->stream('reporte.pdf');
  }
    
}