<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('apellidos',255);
            $table->string('tipo_documento',255);
            $table->string('num_documento',255);
            $table->string('direccion',500);
            $table->string('telefono',50);
            $table->string('email',70)->unique();
            $table->string('contacto',255)->default(0);
            $table->string('telefono_contacto',50);
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
        Schema::dropIfExists('proveedors');
    }
}
