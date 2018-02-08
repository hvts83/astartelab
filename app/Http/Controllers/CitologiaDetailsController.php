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
use App\Models\Citologia;
use App\Models\Imagen;
use App\Models\Citologia_imagen;
use App\Models\Citologia_micro;

class CitologiaDetailsController extends Controller
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

    $micro = Citologia_micro::where('citologia_id', '=', $id)->first();
    if ($micro == null) {
      $micro = new Citologia_micro();
    }
    DB::beginTransaction();
      try {
        $micro->citologia_id = $id;
        $micro->frase_id = $request->frase_id;
        $micro->detalle = $request->detalle;
        $micro->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

  public function imagen(Request $request, $id)
  {
    $this->validate($request, [
      'imagen' => 'image|required',
    ]);

    //Inicio de las inserciones en la base de datos
    DB::beginTransaction();
      try {
      $url = 'images/citologia/'. $id;
      $imageName = $id. 'img' . time() . '.' . $request->file('imagen')->getClientOriginalExtension();
      $request->file('imagen')->move( base_path() . '/public/' . $url , $imageName );
      $imagen = new imagen();
      $imagen->url = $url . '/' . $imageName;
      $imagen->save();

      $inimg = new Citologia_imagen();
      $inimg->citologia_id = $id;
      $inimg->imagen_id = $imagen->id;
      $inimg->save();

    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
    DB::commit();
    return redirect('citologia/'. $id . "/edit");
  }

}
