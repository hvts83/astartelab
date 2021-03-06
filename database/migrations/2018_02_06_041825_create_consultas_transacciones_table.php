<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas_transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tipo', 1);
            $table->integer('consulta');
            $table->string('informe');
            $table->char('estado_pago', 2);
            $table->char('facturacion', 2);
            $table->double('total', 8, 2);
            $table->double('monto', 8, 2);
            $table->double('saldo', 8, 2);
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
        Schema::dropIfExists('consultas_transacciones');
    }
}
