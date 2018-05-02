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
use App\Models\Biopsia;
use App\Models\Consulta_transacciones;
use App\Models\Imagen;
use App\Models\Biopsia_inmunohistoquimica;
use App\Models\Biopsia_inmunohistoquimica_imagen;
use App\Models\Biopsia_macro;
use App\Models\Biopsia_micro;
use App\Models\Biopsia_preliminar;
use App\Models\Frase;
use App\Models\Doctor_transaccion;


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
    $data['precios'] = Precio::where('tipo', '=', 'B')->get();
    $data['diagnosticos'] = Diagnostico::where('tipo', '=', 'B')->get();
    $data['frases'] = Frase::where('tipo', '=', 'B')->get();
    $data['pagos'] = General::getCondicionPago();
    $data['facturacion'] = General::getFacturacion();
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
      'precio_id' => 'required',
      'estado_pago' => 'required',
      'facturacion' => 'required',
      ]);

      $correlativo=  Consulta_transacciones::whereRaw('tipo = "B" AND MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(NOW())')->count();
      $informe = "B" . date('y') . date('m') .'-'. str_pad(($correlativo + 1), 3, "0", STR_PAD_LEFT);
      //dd($informe);
      $precioPagar = Precio::where('id', '=', $request->precio_id)->first();

      DB::beginTransaction();
        try {
          $biopsia = new Biopsia();
          $biopsia->doctor_id = $request->doctor_id;
          $biopsia->paciente_id = $request->paciente_id;
          $biopsia->grupo_id = $request->grupo_id;
          $biopsia->precio_id = $request->precio_id;
          $biopsia->diagnostico_id = $request->diagnostico_id;
          $biopsia->estado_pago = $request->estado_pago;
          $biopsia->recibido = Carbon::createFromFormat('d-m-Y', $request->recibido);
          $biopsia->entregado = Carbon::createFromFormat('d-m-Y', $request->entregado);
          $biopsia->informe = $informe;
          $biopsia->save();

          $ct = new Consulta_transacciones();
          $ct->tipo = "B";
          $ct->consulta = $biopsia->id;
          $ct->estado_pago = $biopsia->estado_pago;
          switch ($biopsia->estado_pago) {
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
          $ct->informe = $biopsia->informe;
          $ct->facturacion = $request->facturacion;
          $ct->save();

          $micro = new Biopsia_micro();
          $micro->biopsia_id = $biopsia->id;
          $micro->frase_id = $request->micro_id;
          $micro->save();

          $macro = new Biopsia_macro();
          $macro->biopsia_id = $biopsia->id;
          $macro->frase_id = $request->macro_id;
          $macro->save();


          $preliminar = new Biopsia_preliminar();
          $preliminar->biopsia_id = $biopsia->id;
          $preliminar->diagnostico_id = $request->preliminar_id;
          $preliminar->save();

          $inmunohistoquimica = new Biopsia_inmunohistoquimica();
          $inmunohistoquimica->biopsia_id = $biopsia->id;
          $inmunohistoquimica->frase_id = $request->inmuno_id;
          $inmunohistoquimica->save();
                
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
    $data['biopsia'] =  Biopsia::find($id);
    if ($data['biopsia']  == null) { return redirect('biopsias'); } //Verificación para evitar errores
    $data['macro'] = Biopsia_macro::where('biopsia_id', '=', $id)->first();
    $data['micro'] = Biopsia_micro::where('biopsia_id', '=', $id)->first();
    $data['preliminar'] = Biopsia_preliminar::where('biopsia_id', '=', $id)->first();
    $data['inmunohistoquimica'] = Biopsia_inmunohistoquimica::where('biopsia_id', '=', $id)->first();
    $data['inmunohistoquimica_imagenes'] = Biopsia_inmunohistoquimica_imagen::join('imagen', 'imagen_id', '=', 'imagen.id')
      ->where('biopsia_id', '=', $id)->get();
    $data['detalle_pago'] = Consulta_transacciones::where([
      ['tipo', '=', 'B'],
      ['consulta', '=', $id]
    ])->orderBy('created_at', 'DESC')->get();
    $data['page_title']  = "Detalle " . $data['biopsia']->informe;
    $data['doctores'] = Doctor::all();
    $data['pacientes'] = Paciente::all();
    $data['pacienteConsulta'] = Paciente::find($data['biopsia']->paciente_id);
    $data['grupos'] = Grupo::all();
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
        $biopsia->doctor_id = $request->doctor_id;
        $biopsia->paciente_id = $request->paciente_id;
        $biopsia->grupo_id = $request->grupo_id;
        $biopsia->precio_id = $request->precio_id;
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
}
