<?php

namespace Database\Seeders;

use App\Models\genere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genere = [
            ['genere' => 'Masculino'],
            ['genere' => 'Femenino'],
            ['genere' => 'Otro'],

        ];
        genere::insert($genere);
    }
}
