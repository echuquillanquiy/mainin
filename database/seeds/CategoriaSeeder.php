<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'T1'
        ]);

        Categoria::create([
            'nombre' => 'T2'
        ]);

        Categoria::create([
            'nombre' => 'T3'
        ]);

        Categoria::create([
            'nombre' => 'T4'
        ]);

        Categoria::create([
            'nombre' => 'T5'
        ]);
    }
}
