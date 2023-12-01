<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ['category' => 'Literatura'],
            ['category' => 'Ciencia'],
            ['category' => 'Historia'],
            ['category' => 'Matematicas'],
            ['category' => 'Fisica'],
            ['category' => 'Quimica'],
            ['category' => 'Biologia'],
            ['category' => 'Filosofia'],
            ['category' => 'Arte'],
            ['category' => 'Musica'],
            ['category' => 'Deportes'],
            ['category' => 'Tecnologia'],
            ['category' => 'Programacion'],
            ['category' => 'Diseño'],
            ['category' => 'Arquitectura'],
            ['category' => 'Economia'],
            ['category' => 'Finanzas'],
            ['category' => 'Negocios'],
            ['category' => 'Marketing'],
            ['category' => 'Ventas'],
            ['category' => 'Emprendimiento'],
            ['category' => 'Cocina'],
            ['category' => 'Nutricion'],
            ['category' => 'Salud'],
            ['category' => 'Medicina'],
            ['category' => 'Enfermeria'],
            ['category' => 'Psicologia'],
            ['category' => 'Sociologia'],
            ['category' => 'Politica'],
            ['category' => 'Religion'],
            ['category' => 'Esoterismo'],
            ['category' => 'Misticismo'],
            ['category' => 'Autoayuda'],
            ['category' => 'Desarrollo Personal'],
            ['category' => 'Desarrollo Profesional'],
            ['category' => 'Desarrollo Espiritual'],
            ['category' => 'Desarrollo Humano'],
            ['category' => 'Desarrollo Social'],
            ['category' => 'Desarrollo Economico'],
            ['category' => 'Desarrollo Cultural'],
            ['category' => 'Desarrollo Politico'],
            ['category' => 'Desarrollo Tecnologico'],
            ['category' => 'Desarrollo Sustentable'],
            ['category' => 'Desarrollo Sostenible'],
            ['category' => 'Desarrollo Ambiental'],
            ['category' => 'Desarrollo Urbano'],
            ['category' => 'Desarrollo Rural'],
            ['category' => 'Desarrollo Comunitario'],
            ['category' => 'Desarrollo Organizacional'],
        ];
        category::insert($category);
    }
}
