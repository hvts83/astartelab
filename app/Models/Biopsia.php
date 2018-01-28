<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biopsia extends Model
{
  protected $table = "biopsias";

  use SoftDeletes;
  protected $dates = ['deleted_at'];
}
