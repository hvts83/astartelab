<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citologia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('paciente_id');
            $table->integer('grupo_id');
            $table->integer('precio_id');
            $table->integer('diagnostico_id');
            $table->date('recibido')->nullable();
            $table->date('entregado')->nullable();
            $table->string('informe')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('citologia');
    }
}
