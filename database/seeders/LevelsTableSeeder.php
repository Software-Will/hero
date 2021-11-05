<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder //componente para inicializar inserccion de datos
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0'); //Resetea las claves foraneas en heroes y el autoincrementable en levels

        DB::table('levels')->truncate(); //reseteo de tabla

        $xp = 100;
        for ($i = 0; $i < 10; $i++) {
            $xp = $xp * 2;
            DB::table('levels')->insert([ //aca agregas todos los campos a insertar : array
                //'id' => 1,
                'xp' => $xp
            ]); //Nombre de la tabla en donde queremos insertar el registro para
        }
    }
}
