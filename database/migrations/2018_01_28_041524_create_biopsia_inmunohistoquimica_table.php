<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiopsiaInmunohistoquimicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biopsia_inmunohistoquimica', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('biopsia_id');
          $table->string('resultado');
          $table->text('detalle')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biopsia_inmunohistoquimica');
    }
}
