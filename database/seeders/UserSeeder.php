<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=> env('DEFAULT_USER_NAME', 'User McUserFace'),
            'email'=> env('DEFAULT_USER_EMAIL', 'user@gmail.com'),
            'password'=> env('DEFAULT_USER_PASSWORD_HASH', bcrypt('password')),
        ]);

    }
}
