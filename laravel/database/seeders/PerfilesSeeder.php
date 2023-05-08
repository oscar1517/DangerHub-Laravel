<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfiles;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfiles::create(['nombre' => 'oscar', 'url_avatar' => 'https://i.blogs.es/ceda9c/dalle/450_1000.jpg', 'id_usuario' => 1]);
        Perfiles::create(['nombre' => 'adads', 'url_avatar' => 'https://i.blogs.es/ceda9c/dalle/450_1000.jpg', 'id_usuario' => 1]);

    }
}
