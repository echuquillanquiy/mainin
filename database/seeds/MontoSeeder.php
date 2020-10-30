<?php

use Illuminate\Database\Seeder;
use App\Monto;

class MontoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Monto::create([
            'descripcion' => 'INGENIERO',
            'monto' => '190'
        ]);

        Monto::create([
            'descripcion' => 'ELECTRICISTA',
            'monto' => '150'
        ]);

        Monto::create([
            'descripcion' => 'MECANICO',
            'monto' => '170'
        ]);
    }
}
