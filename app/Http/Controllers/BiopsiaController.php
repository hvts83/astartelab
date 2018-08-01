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
use App\Models\Biopsia;
use App\Models\Biopsia_detalle;
use App\Models\Biopsia_imagen;
use App\Models\Doctor_transaccion;
use PDF;


class BiopsiaController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function index()
  {
      $data['page_title'] = "Ver biopsias";
      $data['biopsias'] = Biopsia::select('biopsias.*', 'doctores.nombre as doctor_name', 'pacientes.name as paciente_name')
        ->join('doctores', 'doctores.id','=', 'doctor_id')
        ->join('pacientes', 'pacientes.id', '=', 'paciente_id')
        ->get();
      return view('biopsia.index')->with($data);
  }

  public function create()
  {
    $data['page_title'] = "Solicitud biopsia";
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();
    $data['grupos'] = Grupo::all();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    return view('biopsia.create', $data);
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
      ]);

      $correlativo=  Biopsia::select('informe')
      ->whereRaw('MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(NOW())')
      ->orderBy('informe', 'desc')->first();
      $parte_inicial= "B" . date('y') . date('n') .'-';
      if($correlativo== null){
        $informe = $parte_inicial . str_pad(1, 3, "0", STR_PAD_LEFT);
      }else{
        $informe = $parte_inicial . str_pad((str_replace($parte_inicial, '', $correlativo->informe ) + 1), 3, "0", STR_PAD_LEFT);
      }

      DB::beginTransaction();
        try {
          $biopsia = new biopsia();
          $biopsia->doctor_id = $request->doctor_id;
          $biopsia->paciente_id = $request->paciente_id;
          $biopsia->grupo_id = $request->grupo_id;
          $biopsia->diagnostico_id = $request->diagnostico_id;
          $biopsia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
          $biopsia->entregado = Carbon::createFromFormat('d-m-Y', $request->entregado);
          $biopsia->informe_preliminar = $request->dpreliminar;
          $biopsia->informe = $informe;
          $biopsia->save();

          $this->createDetalle($biopsia->id, 'micro', $request->micro);
          $this->createDetalle($biopsia->id, 'macro', $request->macro);
          $this->createDetalle($biopsia->id, 'preliminar', $request->preliminar);

      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
     return redirect('/biopsia');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['biopsia'] =  Biopsia::selectRaw('biopsias.*, doctores.nombre as doctor, pacientes.name as paciente, grupos.nombre as grupo')
      ->join('doctores', 'biopsias.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'biopsias.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'biopsias.grupo_id', '=', 'grupos.id')
      ->where('biopsias.id', '=', $id)
      ->first();
    if ($data['biopsia']  == null) { return redirect('biopsias'); } //Verificación para evitar errores
    $data['macro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
    $data['inmunohistoquimica'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'inmunohistoquimica']
      ])->first();
    $data['imagenes'] = Biopsia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('biopsia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'B'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['biopsia']->informe;
    $data['pacienteConsulta'] = Paciente::find($data['biopsia']->paciente_id);
    $data['precios'] = Precio::where('tipo', '=', 'B')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
    $data['biopsia']->recibido = General::formatoFecha( $data['biopsia']->recibido );
    $data['biopsia']->entregado = General::formatoFecha( $data['biopsia']->entregado );
    return view('biopsia.edit', $data);
  }


  
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function pdf($id)
  {
    $data['biopsia'] =  Biopsia::selectRaw('biopsias.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'biopsias.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'biopsias.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'biopsias.grupo_id', '=', 'grupos.id')
      ->where('biopsias.id', '=', $id)
      ->first();
    if ($data['biopsia']  == null) { return redirect('biopsias'); } //Verificación para evitar errores
    $data['macro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
    $data['inmunohistoquimica'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'inmunohistoquimica']
      ])->first();
    $data['imagenes'] = Biopsia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('biopsia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'B'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['biopsia']->informe;
    $data['pacienteConsulta'] = Paciente::find($data['biopsia']->paciente_id);
    $data['precios'] = Precio::where('tipo', '=', 'B')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
    $data['biopsia']->recibido = General::formatoFecha( $data['biopsia']->recibido );
    $data['biopsia']->entregado = General::formatoFecha( $data['biopsia']->entregado );
    $pdf = PDF::loadView('/biopsia/pdf', $data);
    return $pdf->download( $data['biopsia']->informe .'.pdf');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function sm($id)
  {
    $data['biopsia'] =  Biopsia::selectRaw('biopsias.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, grupos.nombre as grupo')
      ->join('doctores', 'biopsias.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'biopsias.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'biopsias.grupo_id', '=', 'grupos.id')
      ->where('biopsias.id', '=', $id)
      ->first();
    if ($data['biopsia']  == null) { return redirect('biopsias'); } //Verificación para evitar errores
    $data['macro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
    $data['inmunohistoquimica'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'inmunohistoquimica']
      ])->first();
    $data['imagenes'] = Biopsia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('biopsia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'B'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['biopsia']->informe;
    $data['pacienteConsulta'] = Paciente::find($data['biopsia']->paciente_id);
    $data['precios'] = Precio::where('tipo', '=', 'B')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
    $data['biopsia']->recibido = General::formatoFecha( $data['biopsia']->recibido );
    $data['biopsia']->entregado = General::formatoFecha( $data['biopsia']->entregado );
    $pdf = PDF::loadView('/biopsia/sm', $data);
    return $pdf->stream( $data['biopsia']->informe .'.pdf');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function print($id)
  {
    $data['biopsia'] =  Biopsia::selectRaw('biopsias.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, pacientes.meses as meses, grupos.nombre as grupo')
      ->join('doctores', 'biopsias.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'biopsias.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'biopsias.grupo_id', '=', 'grupos.id')
      ->where('biopsias.id', '=', $id)
      ->first();
    if ($data['biopsia']  == null) { return redirect('biopsias'); } //Verificación para evitar errores
    $data['macro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
    $data['inmunohistoquimica'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'inmunohistoquimica']
      ])->first();
    $data['imagenes'] = Biopsia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('biopsia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'B'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['biopsia']->informe;
    $data['pacienteConsulta'] = Paciente::find($data['biopsia']->paciente_id);
    $data['precios'] = Precio::where('tipo', '=', 'B')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
    $data['biopsia']->recibido = General::formatoFecha( $data['biopsia']->recibido );
    $data['biopsia']->entregado = General::formatoFecha( $data['biopsia']->entregado );
    $pdf = PDF::loadView('/biopsia/print', $data);
    return $pdf->stream( $data['biopsia']->informe .'.pdf');
  }

  

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function envelope($id)
  {
    $data['biopsia'] =  Biopsia::selectRaw('biopsias.*, doctores.nombre as doctor, pacientes.name as paciente, pacientes.sexo as sexo, pacientes.edad as edad, grupos.nombre as grupo')
      ->join('doctores', 'biopsias.doctor_id', '=', 'doctores.id')
      ->join('pacientes', 'biopsias.paciente_id', '=', 'pacientes.id')
      ->join('grupos', 'biopsias.grupo_id', '=', 'grupos.id')
      ->where('biopsias.id', '=', $id)
      ->first();
    if ($data['biopsia']  == null) { return redirect('biopsias'); } //Verificación para evitar errores
    $data['macro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'macro']
      ])->first();
    $data['micro'] = Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'micro']
      ])->first();
    $data['preliminar'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'preliminar']
      ])->first();
    $data['inmunohistoquimica'] =Biopsia_detalle::where([
      ['biopsia_id', '=', $id], 
      ['tipo_detalle', '=', 'inmunohistoquimica']
      ])->first();
    $data['imagenes'] = Biopsia_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('biopsia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'B'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['biopsia']->informe;
    $data['pacienteConsulta'] = Paciente::find($data['biopsia']->paciente_id);
    $data['precios'] = Precio::where('tipo', '=', 'B')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
    $data['biopsia']->recibido = General::formatoFecha( $data['biopsia']->recibido );
    $data['biopsia']->entregado = General::formatoFecha( $data['biopsia']->entregado );
     $pdf = PDF::loadView('/biopsia/envelope', $data)->setPaper('DL');
    return $pdf->stream($data['biopsia']->informe . '-sobre' .'.pdf');
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
    $biopsia = Biopsia::find($id);
    $this->validate($request, [
      'diagnostico_id' =>'required',
      'informe' => 'unique:biopsias|required'
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
        if($request->informe !== $biopsia->informe ){
          Consulta_transacciones::where('informe', '=', $biopsia->informe)->update(['informe' => $request->informe]);
          $biopsia->informe = $request->informe;
        }
        $biopsia->diagnostico_id = $request->diagnostico_id;
        $biopsia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
        $biopsia->entregado = Carbon::createFromFormat('d-m-Y', $request->entregado);
        $biopsia->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
     return redirect('biopsia/'. $id . "/edit");
  }

  private function createDetalle($biopsia, $tipo_detalle, $detalle_texto = '') {
    $detalle = new Biopsia_detalle();
    $detalle->biopsia_id = $biopsia;
    $detalle->tipo_detalle = $tipo_detalle;
    $detalle->detalle = $detalle_texto;
    $detalle->save();
  }

}
