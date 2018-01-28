<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frase extends Model
{
  protected $table = "frases";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
