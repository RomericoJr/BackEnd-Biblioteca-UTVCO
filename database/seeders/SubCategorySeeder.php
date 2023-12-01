<?php

namespace Database\Seeders;

use App\Models\subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategory= [
            ['id_category' => rand(1, 50), 'subcategory' => 'Literatura'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Ciencia'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Historia'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Matematicas'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Fisica'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Quimica'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Biologia'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Filosofia'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Arte'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Musica'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Deportes'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Tecnologia'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Programacion'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Diseño'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Arquitectura'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Economia'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Finanzas'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Negocios'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Marketing'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Ventas'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Emprendimiento'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Cocina'],
            ['id_category' => rand(1, 50), 'subcategory' => 'Nutricion'],
        ];
        subcategory::insert($subCategory);
    }
}
