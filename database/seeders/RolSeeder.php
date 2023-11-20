<?php

namespace Database\Seeders;

use App\Models\rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['rol' => 'admin'],
            ['rol' => 'vendedor'],
            ['rol' => 'usuario'],
        ];
        rol::insert($roles);
    }
}
