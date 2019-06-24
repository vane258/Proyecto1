<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Tabla: users
     *
     * Aqui se almacenan los usuarios que pueden acceder al sistema.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('apellidos',255);
            $table->string('tipo_documento',255);
            $table->string('num_documento',255);
            $table->string('direccion',500);
            $table->string('telefono',50);
            $table->string('email',70)->unique();
            $table->string('password',128);
            $table->boolean('condicion')->default(0);            
            $table->integer('rol')->unsigned();
            $table->foreign('rol')->references('id')
                ->on('user_types')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
