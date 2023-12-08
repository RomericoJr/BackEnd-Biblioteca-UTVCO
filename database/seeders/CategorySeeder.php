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
           
        ];
        category::insert($category);
    }
}
