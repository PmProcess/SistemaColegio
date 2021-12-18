<?php

namespace Database\Seeders;

use App\Models\Administracion\Colegio;
use Illuminate\Database\Seeder;

class ColegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colegio=new Colegio();
        $colegio->correo="administracion@colegio.com";
        $colegio->save();
    }
}
