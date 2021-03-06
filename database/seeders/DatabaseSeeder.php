<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UsuarioSeeder::class);
        $this->call(UbigeoSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(ColegioSeeder::class);
        $this->call(YearEscolarSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
    }
}
