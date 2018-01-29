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
use App\Models\Biopsia;

class BiopsiaController extends Controller
{
  public function index()
  {
      $data['page_title'] = "Ver biopsias";
      $data['biopsias'] = Biopsia::all();
      return view('biopsia.index')->with($data);
  }
}
