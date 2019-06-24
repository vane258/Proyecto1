<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Vanesa',
            'apellidos' => 'Balderrama',
            'tipo_documento' => 'INE',
            'num_documento' => '21287314612987301',
            'direccion'=>'colonia',
            'telefono'=>'843',
            'email'=>'1430132@upv.edu.mx',
            'password' => bcrypt('vane2019'),
            'rol' => 1
        ]);

    }
}
