<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiopsiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biopsias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('paciente_id');
            $table->integer('grupo_id');
            $table->integer('precio_id');
            $table->integer('tipo_biopsia_id');
            $table->char('estado_pago', 2);
            $table->integer('diagnostico_id');
            $table->date('recibido')->nullable();
            $table->date('entregado')->nullable();
            $table->string('informe')->unique();
            $table->string('informe_preliminar')->nullable();
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
        Schema::dropIfExists('biopsias');
    }
}
