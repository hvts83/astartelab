<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->char('tipo', 1);
            $table->double('monto', 8 ,2);
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
        Schema::dropIfExists('doctor_transacciones');
    }
}
