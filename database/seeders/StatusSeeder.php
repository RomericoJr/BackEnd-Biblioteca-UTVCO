<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'status' => 'Rechazado',
            ],
            [
                'status' => 'Aprobado',
            ],
            [
                'status' => 'Pendiente',
            ],
            [
                'status' => 'Devuelto',
            ],
        ];
        status::insert($status);
    }
}
