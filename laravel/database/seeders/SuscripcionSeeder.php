<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Suscripciones;
class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscripciones::create(['id_suscripcion' => 1, 'tipo_suscripcion' => 'Basica', 'precio' => 2]);
        Suscripciones::create(['id_suscripcion' => 2, 'tipo_suscripcion' => 'BasicaHD', 'precio' => 4]);
        Suscripciones::create(['id_suscripcion' => 3, 'tipo_suscripcion' => 'Estandar', 'precio' => 6]);
        Suscripciones::create(['id_suscripcion' => 4, 'tipo_suscripcion' => 'Danger', 'precio' => 8]);
    }
}
