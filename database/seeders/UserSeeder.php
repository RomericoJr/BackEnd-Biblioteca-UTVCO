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
            'name' => 'Rome',
            'email' => 'romecito@gmail.com',
            'password' => bcrypt('password2'),
            'id_rol' => 1,
            ];
        User::insert($user);
    }
}
