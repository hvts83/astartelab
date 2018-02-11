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
use App\Models\Cuenta;
use App\Models\Cuenta_transaccion;
use App\Models\Cheque;

class CuentaFondosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getCuentaAccount(Request $request, $id){
      $data['cuenta'] =  Cuenta::find($id);
      if ($data['cuenta']  == null) { return redirect('cuentaes'); } //Verificación para evitar errores
      $data['transacciones'] = Cuenta_transaccion::where('cuenta_id', '=', $data['cuenta']->id )
        ->orderBy('created_at', 'DESC')
        ->get();
      $data['page_title']  = "Balance de " . $data['cuenta']->nombre ;
      return view('cuenta.account', $data);
    }

    public function postCuentaFunds(Request $request, $id){
      $cuenta = Cuenta::find($id);
      $this->validate($request, [
        'monto' => 'numeric|required',
        'numero' => 'numeric|required',
        'fecha_realizacion' => 'required',
        'lugar' => 'required',
        'tipo' => 'required',
        'paguese' => 'required',
        'concepto' => 'required'
        ]);

      if ($request->tipo = "E") {
        $nuevoSaldo = $cuenta->fondo - $request->monto;
      }else {
        $nuevoSaldo = $cuenta->fondo + $request->monto;
      }
      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $cheque = new Cheque();
          $cheque->cuenta_id = $cuenta->id;
          $cheque->numero = $request->numero;
          $cheque->monto = $request->monto;
          $cheque->fecha_realizacion = Carbon::createFromFormat('d-m-Y', $request->fecha_realizacion);
          $cheque->lugar = $request->lugar;
          $cheque->concepto = $request->concepto;
          $cheque->paguese = $request->paguese;
          $cheque->tipo = $request->tipo;
          $cheque->save();

          $trans = new Cuenta_transaccion();
          $trans->cuenta_id = $cuenta->id;
          $trans->cheque_id = $cheque->id;
          $trans->tipo = $request->tipo;
          $trans->concepto = $request->concepto;
          $trans->monto = $request->monto;
          $trans->prev = $cuenta->fondo;
          $trans->actual = $nuevoSaldo;
          $trans->save();

          $cuenta->fondo = $nuevoSaldo;
          $cuenta->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('cuenta-account/'. $id);
    }
}
