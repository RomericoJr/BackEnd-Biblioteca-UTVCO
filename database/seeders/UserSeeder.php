<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Password1'),
            'id_rol' => 1,
            ];
        User::insert($user);
    }
}
