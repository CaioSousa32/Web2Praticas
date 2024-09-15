<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Bibliotecario',
            'email' => 'bibliotecario@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'bibliotecario',
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'cliente',
        ]);
    }
}
