<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patologia extends Model
{
  protected $table = "patologia";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
