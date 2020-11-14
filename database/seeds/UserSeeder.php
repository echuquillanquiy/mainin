<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Raúl Eduardo Chuquillanqui Yupanqui',
            'username' => 'echuquillanquiy',
            'email' => 'echuquillanquiy@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'administrador'
        ]);

        User::create([
            'name' => 'Milagros Talledo',
            'username' => 'mtalledo',
            'email' => 'm.tlledo@mainin.pe',
            'password' => bcrypt('12345678'),
            'role' => 'administrador'
        ]);
    }
}
