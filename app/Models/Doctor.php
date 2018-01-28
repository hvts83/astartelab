<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
  protected $table = "doctores";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
