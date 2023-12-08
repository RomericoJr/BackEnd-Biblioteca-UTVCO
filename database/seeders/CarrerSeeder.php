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
            ['carrer_name' => 'Técnico Superior Universitario en Tecnologías de la Información'],
            ['carrer_name' => 'Técnico Superior Universitario en Mecatrónica'],
            ['carrer_name' => 'Técnico Superior Universitario en Agricultura Sustentable y Protegida'],
            ['carrer_name' => 'Técnico Superior Universitario en Energías Renovables'],
            ['carrer_name' => 'Técnico Superior Universitario en Gastronomía'],
            ['carrer_name' => 'Técnico Superior Universitario en Diseño y Moda Industrial'],
            ['carrer_name' => 'Técnico Superior Universitario en Desarrollo de Negocios'],
            ['carrer_name' => 'Ingeniería en Desarrollo y Gestión de Software'],
            ['carrer_name' => 'Ingeniería en Mecatrónica'],
            ['carrer_name' => 'Ingeniería en Agricultura Sustentable y Protegida'],
            ['carrer_name' => 'Ingeniería en Energías Renovables'],
            ['carrer_name' => 'Licenciatura en Gastronomía'],
            ['carrer_name' => 'Ingeniería en Diseño y Moda Industrial'],
            ['carrer_name' => 'Licenciatura en Innovación de Negocios y Mercadotecnia'],

           
        ];
        carrer::insert($carrer);
    }
}
