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
            ['carrer_name' => 'Tecnologia de nformacion'],
            ['carrer_name' => 'Desarrollo y Gestión de Software'],
        ];
        carrer::insert($carrer);
    }
}
