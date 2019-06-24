<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Vaciar y llenar la base de datos de la aplicacion
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
                'user_types',
                'users'
              ]);

        //Se llaman los seeder, IMPORTANTE seguir orden por restricciones de
        //llaves foraneas.
        $this->call(User_typeSeeder::class);
        $this->call(UserSeeder::class);
    }

    /*
        Permite el eliminado de todos los registros de una tabla, independientemente
        de sus llaves foraneas.
    */
    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
