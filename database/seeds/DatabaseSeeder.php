<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(MontoSeeder::class);
        $this->call(PuestoSeeder::class);
    }
}
