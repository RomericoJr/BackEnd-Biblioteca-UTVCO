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
            ['id_category' => 1, 'subcategory' => 'Literatura'],
            
            
            ['id_category' => 1, 'subcategory' => 'Novela'],
            ['id_category' => 1, 'subcategory' => 'Poesía'],
            ['id_category' => 2, 'subcategory' => 'Física'],
            ['id_category' => 2, 'subcategory' => 'Química'],
            ['id_category' => 3, 'subcategory' => 'Historia Antigua'],
            ['id_category' => 3, 'subcategory' => 'Historia Moderna'],
            ['id_category' => 4, 'subcategory' => 'Álgebra'],
            ['id_category' => 4, 'subcategory' => 'Geometría'],
            ['id_category' => 5, 'subcategory' => 'Mecánica'],
            ['id_category' => 5, 'subcategory' => 'Termodinámica'],
            ['id_category' => 6, 'subcategory' => 'Química Orgánica'],
            ['id_category' => 6, 'subcategory' => 'Química Inorgánica'],
            ['id_category' => 7, 'subcategory' => 'Biología Celular'],
            ['id_category' => 7, 'subcategory' => 'Genética'],
            ['id_category' => 8, 'subcategory' => 'Ética'],
            ['id_category' => 8, 'subcategory' => 'Metafísica'],
            ['id_category' => 9, 'subcategory' => 'Pintura'],
            ['id_category' => 9, 'subcategory' => 'Escultura'],
            ['id_category' => 10, 'subcategory' => 'Clásica'],
            ['id_category' => 10, 'subcategory' => 'Rock'],
            ['id_category' => 11, 'subcategory' => 'Fútbol'],
            ['id_category' => 11, 'subcategory' => 'Baloncesto'],
            ['id_category' => 12, 'subcategory' => 'Desarrollo Web'],
            ['id_category' => 12, 'subcategory' => 'Inteligencia Artificial'],
            ['id_category' => 13, 'subcategory' => 'Java'],
            ['id_category' => 13, 'subcategory' => 'Python'],
            ['id_category' => 14, 'subcategory' => 'Diseño Gráfico'],
            ['id_category' => 14, 'subcategory' => 'Diseño de Interiores'],
            ['id_category' => 15, 'subcategory' => 'Arquitectura Moderna'],
            ['id_category' => 15, 'subcategory' => 'Arquitectura Renacentista'],
            ['id_category' => 16, 'subcategory' => 'Macroeconomía'],
            ['id_category' => 16, 'subcategory' => 'Microeconomía'],
            ['id_category' => 17, 'subcategory' => 'Inversiones'],
            ['id_category' => 17, 'subcategory' => 'Contabilidad'],
            ['id_category' => 18, 'subcategory' => 'Gestión de Proyectos'],
            ['id_category' => 18, 'subcategory' => 'Emprendimiento'],
            ['id_category' => 19, 'subcategory' => 'Marketing Digital'],
            ['id_category' => 19, 'subcategory' => 'Estrategias de Ventas'],
            ['id_category' => 20, 'subcategory' => 'Ventas B2B'],
            ['id_category' => 20, 'subcategory' => 'Ventas Minoristas'],
            ['id_category' => 21, 'subcategory' => 'Startups'],
            ['id_category' => 21, 'subcategory' => 'Desarrollo de Negocios'],
            ['id_category' => 22, 'subcategory' => 'Cocina Italiana'],
            ['id_category' => 22, 'subcategory' => 'Cocina Asiática'],
            
            
        ];
        subcategory::insert($subCategory);
    }
}
