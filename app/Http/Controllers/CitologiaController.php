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
    $data['precios'] = Precio::where('tipo', '=', 'C')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'C')->get();
    $data['frases'] = Frase::where('tipo', '=', 'C')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
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
      'estado_pago' => 'required',
      'facturacion' => 'required',
      ]);

      $correlativo=  Consulta_transacciones::whereRaw('tipo = "C" AND MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(NOW())')->count();
      $informe = "C" . date('y') . date('n') .'-'. str_pad(($correlativo + 1), 3, "0", STR_PAD_LEFT);
      $precioPagar = Precio::where('id', '=', $request->precio_id)->first();

      DB::beginTransaction();
        try {
          $citologia = new Citologia();
          $citologia->doctor_id = $request->doctor_id;
          $citologia->paciente_id = $request->paciente_id;
          $citologia->grupo_id = $request->grupo_id;
          $citologia->precio_id = $request->precio_id;
          $citologia->diagnostico_id = $request->diagnostico_id;
          $citologia->estado_pago = $request->estado_pago;
          $citologia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
          $citologia->entregado = Carbon::createFromFormat('d-m-Y', $request->entregado);
          $citologia->informe_preliminar = $request->dpreliminar;
          $citologia->informe = $informe;
          $citologia->save();

          $ct = new Consulta_transacciones();
          $ct->tipo = "C";
          $ct->consulta = $citologia->id;
          $ct->estado_pago = $citologia->estado_pago;
          switch ($citologia->estado_pago) {
            case 'PP':
              $this->pagoDoctor( $request->doctor_id, $precioPagar->monto);
              $ct->monto = $precioPagar->monto;
              $ct->saldo = 0;
              break;
            case 'AP':
              $ct->monto = 0;
              $ct->saldo = $precioPagar->monto;
              break;
            case 'AC':
              $ct->monto = $precioPagar->monto;
              $ct->saldo = 0;
              break;
            case 'PE':
              $ct->monto = 0;
              $ct->saldo = $precioPagar->monto;
              break;
          }
          $ct->total = $precioPagar->monto;
          $ct->informe = $citologia->informe;
          $ct->facturacion = $request->facturacion;
          $ct->save();

          $this->createDetalle($citologia->id, 'micro', $request->micro);
          $this->createDetalle($citologia->id, 'macro', $request->macro);
          $this->createDetalle($citologia->id, 'preliminar', $request->preliminar);

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
    $data['macro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
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
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function pdf($id)
  {
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['macro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
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
    $pdf = PDF::loadView('/citologia/pdf', $data);
    return $pdf->download( $data['citologia']->informe . '.pdf');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function sm($id)
  {
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['macro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
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
    $pdf = PDF::loadView('/citologia/sm', $data);
    return $pdf->download( $data['citologia']->informe . '.pdf');
  }




  
   public function envelope($id)
  {
    $data['citologia'] =  Citologia::selectRaw('citologia.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, grupos.nombre as grupo')
      ->join('doctores', 'citologia.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'citologia.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'citologia.grupo_id', '=', 'grupos.id')
      ->where('citologia.id', '=', $id)
      ->first();
    if ($data['citologia']  == null) { return redirect('citologias'); } //Verificación para evitar errores
    $data['macro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Citologia_detalle::where([
      ['citologia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
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
    $pdf = PDF::loadView('/citologia/envelope', $data)->setPaper('DL');
    return $pdf->download( $data['citologia']->informe . '-sobre'.'.pdf');
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
      'diagnostico_id' =>'required',
      'informe' => 'unique:citologia|required'
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        if($request->informe !== $citologia->informe ){
          Consulta_transacciones::where('informe', '=', $citologia->informe)->update(['informe' => $request->informe]);
          $citologia->informe = $request->informe;
        }
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

  protected function pagoDoctor($doctor_id, $monto){
    $doctor = Doctor::find($doctor_id);
    $nuevoSaldo = $doctor->saldo - $monto;
    //Inicio de las inserciones en la base de datos
    $trans = new Doctor_transaccion();
    $trans->doctor_id = $doctor->id;
    $trans->tipo = "E";
    $trans->monto = $monto;
    $trans->prev = $doctor->saldo;
    $trans->actual = $nuevoSaldo;
    $trans->save();

    $doctor->saldo = $nuevoSaldo;
    $doctor->save();
  }

  private function createDetalle($citologia, $tipo_detalle, $detalle_texto = '') {
    $detalle = new Citologia_detalle();
    $detalle->citologia_id = $citologia;
    $detalle->tipo_detalle = $tipo_detalle;
    $detalle->detalle = $detalle_texto;
    $detalle->save();
  }
}