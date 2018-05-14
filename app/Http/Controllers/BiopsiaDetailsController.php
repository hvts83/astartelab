<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Helpers\General;
use App\Models\Diagnostico;
use App\Models\Biopsia;
use App\Models\Imagen;
use App\Models\Biopsia_detalle;
use App\Models\Biopsia_imagen;
use App\Models\Consulta_transacciones;
use App\Mail\BiopsiaResults;

class BiopsiaDetailsController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
  }

  public function macro(Request $request, $id)
  {
    $this->validate($request, [
      'macro_id' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $macros = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'macro'],
      ['biopsia_id', '=', $id]
    ])->pluck('opcion_id');
    $macros = collect($macros)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->macro_id, $macros);
    //Valores a eliminar
    $eliminar = array_diff($macros, $request->macro_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'macro', $value);
    }
    $this->deleteDetalle($id, 'macro', $eliminar);

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function micro(Request $request, $id)
  {
    $this->validate($request, [
      'micro_id' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $micros = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'micro'],
      ['biopsia_id', '=', $id]
    ])->pluck('opcion_id');
    $micros = collect($micros)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->micro_id, $micros);
    //Valores a eliminar
    $eliminar = array_diff($micros, $request->micro_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'micro', $value);
    }
    $this->deleteDetalle($id, 'micro', $eliminar);

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function preliminar(Request $request, $id)
  {
    $this->validate($request, [
      'preliminar_id' =>'required',
      'preliminar' => 'required',
    ]);

    DB::beginTransaction();
    try {
     $biopsia  = Biopsia::find($id);
     $biopsia->informe_preliminar = $request->preliminar;
     $biopsia->save(); 

    $preliminars = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'preliminar'],
      ['biopsia_id', '=', $id]
    ])->pluck('opcion_id');
    $preliminars = collect($preliminars)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->preliminar_id, $preliminars);
    //Valores a eliminar
    $eliminar = array_diff($preliminars, $request->preliminar_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'preliminar', $value);
    }
    $this->deleteDetalle($id, 'preliminar', $eliminar);

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function inmunohistoquimica(Request $request, $id)
  {
    $this->validate($request, [
      'inmuno_id' =>'required',
    ]);

    DB::beginTransaction();
    try {
    $inmunohistoquimicas = Biopsia_detalle::where([
      ['tipo_detalle', '=', 'inmunohistoquimica'],
      ['biopsia_id', '=', $id]
    ])->pluck('opcion_id');
    $inmunohistoquimicas = collect($inmunohistoquimicas)->all();
    //Valores Nuevos
    $nuevos = array_diff($request->inmuno_id, $inmunohistoquimicas);
    //Valores a eliminar
    $eliminar = array_diff($inmunohistoquimicas, $request->inmuno_id);

    foreach ($nuevos as $value) {
      $this->createDetalle( $id, 'inmunohistoquimica', $value);
    }
    $this->deleteDetalle($id, 'inmunohistoquimica', $eliminar);

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function imagen(Request $request, $id)
  {
    $this->validate($request, [
      'imagen' => 'image|required',
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
      $url = 'images/biopsia/'. $id;
      $imageName = $id. 'img' . time() . '.' . $request->file('imagen')->getClientOriginalExtension();
      $request->file('imagen')->move( base_path() . '/public/' . $url , $imageName );
      $imagen = new imagen();
      $imagen->url = $url . '/' . $imageName;
      $imagen->save();

      $inimg = new Biopsia_imagen();
      $inimg->biopsia_id = $id;
      $inimg->imagen_id = $imagen->id;
      $inimg->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function abono(Request $request, $id)
  {
    $this->validate($request, [
      'monto' =>'required',
      'facturacion' => 'required',
      ]);

      $biopsia = Biopsia::find($id);
      $consultaSaldo = Consulta_transacciones::where([
        ['tipo', '=', 'B'],
        ['consulta', '=', $id]
      ])->orderBy('created_at', 'DESC')->first();

      $nuevoSaldo = $consultaSaldo->saldo - $request->monto;
      $estado = "AP";
      if ($nuevoSaldo == 0) {
          $estado = "AC";
      }

    DB::beginTransaction();
      try {
        $ct = new Consulta_transacciones();
        $ct->tipo = "B";
        $ct->consulta = $biopsia->id;
        $ct->estado_pago = $estado;
        $ct->total = $consultaSaldo->total;
        $ct->monto = $request->monto;
        $ct->saldo = $nuevoSaldo;
        $ct->informe = $biopsia->informe;
        $ct->facturacion = $request->facturacion;
        $ct->save();

        $biopsia->estado_pago= $estado;
        $biopsia->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function send(Request $request, $id){
    $biopsia = Biopsia::select(
      'biopsias.*',
      'pacientes.name as nombrePaciente',
      'pacientes.email as correoPaciente',
      'doctores.nombre as nombreDoctor',
      'doctores.email as correoDoctor',
      'precios.monto',
      'diagnosticos.nombre as diagnostico'
    )
    ->join('pacientes', 'biopsias.paciente_id', '=', 'pacientes.id')
    ->join('doctores', 'biopsias.doctor_id', '=', 'doctores.id')
    ->join('precios', 'biopsias.precio_id', '=', 'precios.id')
    ->join('diagnosticos', 'biopsias.diagnostico_id', '=', 'diagnosticos.id')
    ->where('biopsias.id', '=', $id)
    ->first();

    Mail::to($biopsia->correoPaciente, $biopsia->correoDoctor )
    ->send(new BiopsiaResults($biopsia));

    return redirect('biopsia/'. $id . "/edit");
  }

  private function createDetalle($biopsia, $tipo_detalle, $opcion_id) {
    $detalle = new Biopsia_detalle();
    $detalle->biopsia_id = $biopsia;
    $detalle->tipo_detalle = $tipo_detalle;
    $detalle->opcion_id = $opcion_id;
    $detalle->save();
  }

  private function deleteDetalle($biopsia, $tipo_detalle, $detalle_id){
    $detalle = Biopsia_detalle::where([
      ['biopsia_id', '=', $biopsia],
      ['tipo_detalle', '=', $tipo_detalle]
    ])
    ->whereIn('opcion_id', $detalle_id)
    ->delete();
  }

}
