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
use App\Models\Diagnostico;
use App\Models\Biopsia;
use App\Models\Imagen;
use App\Models\Biopsia_inmunohistoquimica;
use App\Models\Biopsia_inmunohistoquimica_imagen;
use App\Models\Biopsia_macro;
use App\Models\Biopsia_micro;
use App\Models\Biopsia_preliminar;
use App\Models\Consulta_transacciones;

class BiopsiaDetailsController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
  }

  public function micro(Request $request, $id)
  {
    $this->validate($request, [
      'frase_id' =>'required',
      'detalle' => 'required',
      ]);

    $micro = Biopsia_micro::where('biopsia_id', '=', $id)->first();
    if ($micro == null) {
      $micro = new Biopsia_micro();
    }
    DB::beginTransaction();
      try {
        $micro->biopsia_id = $id;
        $micro->frase_id = $request->frase_id;
        $micro->detalle = $request->detalle;
        $micro->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function macro(Request $request, $id)
  {
    $this->validate($request, [
      'frase_id' =>'required',
      'detalle' => 'required',
      ]);

    $macro = Biopsia_macro::where('biopsia_id', '=', $id)->first();
    if ($macro == null) {
      $macro = new Biopsia_macro();
    }
    DB::beginTransaction();
      try {
        $macro->biopsia_id = $id;
        $macro->frase_id = $request->frase_id;
        $macro->detalle = $request->detalle;
        $macro->save();

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
      'diagnostico_id' =>'required',
      'detalle' => 'required',
      ]);

    $preliminar = Biopsia_preliminar::where('biopsia_id', '=', $id)->first();
    if ($preliminar == null) {
      $preliminar = new Biopsia_preliminar();
    }
    DB::beginTransaction();
      try {
        $preliminar->biopsia_id = $id;
        $preliminar->diagnostico_id = $request->diagnostico_id;
        $preliminar->detalle = $request->detalle;
        $preliminar->save();

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
      'resultado' =>'required',
      'detalle' => 'required',
      ]);

    $inmunohistoquimica = Biopsia_inmunohistoquimica::where('biopsia_id', '=', $id)->first();
    if ($inmunohistoquimica == null) {
      $inmunohistoquimica = new Biopsia_inmunohistoquimica();
    }
    DB::beginTransaction();
      try {
        $inmunohistoquimica->biopsia_id = $id;
        $inmunohistoquimica->resultado = $request->resultado;
        $inmunohistoquimica->detalle = $request->detalle;
        $inmunohistoquimica->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('biopsia/'. $id . "/edit");
  }

  public function inmunohistoquimica_imagen(Request $request, $id)
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

      $inimg = new Biopsia_inmunohistoquimica_imagen();
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

}
