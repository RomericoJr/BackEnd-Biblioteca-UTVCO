<?php

namespace Database\Seeders;

use App\Models\book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
            'isbn' => '1234567890',
            'title' => 'El principito',
            'author' => 'Antoine de Saint-Exupéry',
            'editorial' => 'Salamandra',
            'edition' => '1',
            'stock' => 10,
            'id_category' => '1',
            'id_subcategory' => '1',
            ],
            [
            'isbn' => '1234567891',
            'title' => 'El pspsp',
            'author' => 'Antoine de Saint-Exupéry',
            'editorial' => 'Salamandra',
            'edition' => '1',
            'stock' => 10,
            'id_category' => '1',
            'id_subcategory' => '1',
            ],
        ];
        book::insert($books);
    }
}
