<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagen extends Model
{
  protected $table = "imagenes";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
