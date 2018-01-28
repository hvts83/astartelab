<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnostico extends Model
{
  protected $table = "diagnosticos";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
