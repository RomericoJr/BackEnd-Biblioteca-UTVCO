<?php

namespace Database\Seeders;

use App\Models\students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = [
            'name' => 'Juan',
            'lastname_father' => 'Perez',
            'lastname_mother' => 'Gomez',
            'matricula' => 'UTTI202001',
            'phone' => '1234567890',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('1234567890'),
            'id_genere' => 1,
            'id_carrers' => 1,
        ];
        students::insert($student);
    }
}
