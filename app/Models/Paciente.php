<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
  protected $table = "pacientes";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
