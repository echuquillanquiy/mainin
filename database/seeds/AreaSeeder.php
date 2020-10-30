<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre' => 'CHANCADO',
            'descripcion' => 'NINGUNA'
        ]);

        Area::create([
            'nombre' => 'FLOTACIÓN',
            'descripcion' => 'NINGUNA'
        ]);

        Area::create([
            'nombre' => 'MOLIENDA',
            'descripcion' => 'NINGUNA'
        ]);
    }
}
