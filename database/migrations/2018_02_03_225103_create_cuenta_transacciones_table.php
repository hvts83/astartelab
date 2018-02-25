<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuenta_id');
            $table->char('tipo', 1);
            $table->string('numero');
            $table->date('fecha_realizacion');
            $table->string('lugar');
            $table->string('concepto');
            $table->string('paguese');
            $table->double('monto', 8, 2);
            $table->double('prev', 8,2);
            $table->double('actual', 8, 2);
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
        Schema::dropIfExists('cuenta_transacciones');
    }
}
