<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Ana García',
            'email' => 'ana@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
