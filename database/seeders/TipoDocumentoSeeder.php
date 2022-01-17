<?php

namespace Database\Seeders;

use App\Models\Administracion\TipoDocumento;
use App\Models\Administracion\YearEscolar;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::create([
            'tipo'=>'BOLETA'
        ]);
        TipoDocumento::create([
            'tipo'=>'FACTURA'
        ]);

    }
}
