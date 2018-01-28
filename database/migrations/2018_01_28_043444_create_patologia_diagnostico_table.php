<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatologiaDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patologia_diagnostico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patologia_id');
            $table->integer('diagnostico_id');
            $table->text('detalle')->nullable();
            $table->string('informe_preliminar')->nullable();
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
        Schema::dropIfExists('patologia_diagnostico');
    }
}
