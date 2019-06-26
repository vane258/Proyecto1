<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')
                ->on('cliente')->onDelete('cascade')->onUpdate('cascade');
            

            $table->integer('idusuario')->unsigned();

            $table->foreign('idusuario')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->date('fecha_hora');
            $table->double('impuesto');
            $table->double('total_venta');
            $table->string('estado');
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
        Schema::dropIfExists('venta');
    }
}
