<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        // Autores Brasileiros
        Author::create(['name' => 'Machado de Assis', 'birth_date' => '1839-06-21']);
        Author::create(['name' => 'Clarice Lispector', 'birth_date' => '1920-12-10']);
        Author::create(['name' => 'Jorge Amado', 'birth_date' => '1912-08-10']);
        Author::create(['name' => 'Paulo Coelho', 'birth_date' => '1947-08-24']);

        // Autores de Cultura Pop Estrangeira
        Author::create(['name' => 'J.K. Rowling', 'birth_date' => '1965-07-31']);
        Author::create(['name' => 'George Orwell', 'birth_date' => '1903-06-25']);
        Author::create(['name' => 'J.R.R. Tolkien', 'birth_date' => '1892-01-03']);
    }
}

