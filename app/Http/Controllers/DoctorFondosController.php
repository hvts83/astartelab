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
use App\Models\Doctor_transaccion;

class DoctorFondosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getDoctorAccount(Request $request, $id){
      $data['doctor'] =  Doctor::find($id);
      if ($data['doctor']  == null) { return redirect('doctores'); } //Verificación para evitar errores
      $data['transacciones'] = Doctor_transaccion::where('doctor_id', '=', $data['doctor']->id )
        ->orderBy('created_at', 'DESC')
        ->get();
      $data['page_title']  = "Fondos de " . $data['doctor']->nombre ;
      return view('doctor.account', $data);
    }

    public function postDoctorFunds(Request $request, $id){
      $doctor = Doctor::find($id);
      $this->validate($request, [
        'monto' => 'numeric|required',
        ]);

      $nuevoSaldo = $doctor->saldo + $request->monto;
      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $trans = new Doctor_transaccion();
          $trans->doctor_id = $doctor->id;
          $trans->tipo = "I";
          $trans->monto = $request->monto;
          $trans->prev = $doctor->saldo;
          $trans->actual = $nuevoSaldo;
          $trans->save();

          $doctor->saldo = $nuevoSaldo;
          $doctor->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('doctor-account/'. $id);
    }
}
