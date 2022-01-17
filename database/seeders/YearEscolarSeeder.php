<?php

namespace Database\Seeders;

use App\Models\Administracion\YearEscolar;
use Illuminate\Database\Seeder;

class YearEscolarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YearEscolar::create(
            [
                "year" => '2021',
                "descripcion" => "Año del Bicentenario del Perú : 200 años de Independencias"
            ]
        );
        YearEscolar::create([
            'year' => '2022',
            'descripcion' => 'año 2022'
        ]);
    }
}
