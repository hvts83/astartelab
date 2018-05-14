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


class TablasController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('rol:A');
  }

  public function biopsia(Request $request, $param = null, $value = null){
    $data['page_title'] = "Ver biopsias";

    return view('reportes.biopsia')->with($data);
  }
  
}
