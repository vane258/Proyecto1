<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idventa')->unsigned();

            $table->foreign('idventa')->references('id')
                ->on('ventas')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('idarticulo')->unsigned();

            $table->foreign('idarticulo')->references('id')
                ->on('articulos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('cantidad');
            $table->double('precio_venta');
            $table->double('descuento');
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
        Schema::dropIfExists('detalle_ventas');
    }
}
