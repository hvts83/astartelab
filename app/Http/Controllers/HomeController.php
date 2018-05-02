<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\General;

use App\Models\Consulta_transacciones;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Inicio";
        $data['biopsias'] = Consulta_transacciones::whereRAW('YEAR(created_at) = YEAR(NOW()) 
            AND MONTH(created_at) = MONTH(NOW()) 
            AND tipo = "B"')
            ->count();
        $data['citologias'] = Consulta_transacciones::whereRAW('YEAR(created_at) = YEAR(NOW()) 
            AND MONTH(created_at) = MONTH(NOW()) 
            AND tipo = "C"')
            ->count();
        $data['meses'] = Consulta_transacciones::select('tipo', 'informe', 'estado_pago')
            ->whereRAW('YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at) = MONTH(NOW())')
            ->groupBy('informe', 'tipo', 'estado_pago')->get();
        $data['pagos'] = General::getCondicionPago();

        return view('home')->with($data);
    }
}
