<?php

use Illuminate\Database\Seeder;
use App\Puesto;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puesto::create([
            'nombre' => 'MECANICO',
            'descripcion' => 'NINGUNA'
        ]);

        Puesto::create([
            'nombre' => 'INGENIERO',
            'descripcion' => 'NINGUNA'
        ]);

        Puesto::create([
            'nombre' => 'ALMACENERO',
            'descripcion' => 'NINGUNA'
        ]);

        Puesto::create([
            'nombre' => 'JEFE SSOMA',
            'descripcion' => 'NINGUNA'
        ]);
    }
}
