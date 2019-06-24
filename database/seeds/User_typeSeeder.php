<?php

use App\User_type;
use Illuminate\Database\Seeder;

class User_typeSeeder extends Seeder
{
    /**
     * Seeder de los tipos de usuario del sistema.
     *
     * IMPORTANTE:
     * Valores estaticos, estos son usados por procesos del sistema, no los modifique.
     *
     * @return void
     */
    public function run()
    {
        User_type::create([
            'id' => 1,
            'nombre' => 'Administrator',
            'descripcion' => 'Administrador'
        ]);
    }
}
