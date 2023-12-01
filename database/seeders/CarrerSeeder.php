<?php

namespace Database\Seeders;

use App\Models\carrer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carrer = [
            ['carrer_name' => 'Tecnologia de informacion'],
            ['carrer_name' => 'Desarrollo y Gestión de Software'],
            ['carrer_name' => 'Ingeniería en Sistemas Computacionales'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
            ['carrer_name' => 'Ingeniería en Tecnologías de la Información y Comunicaciones'],
        ];
        carrer::insert($carrer);
    }
}
