<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
  protected $table = "grupos";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
