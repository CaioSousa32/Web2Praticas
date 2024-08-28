<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Fantasia']);
        Category::create(['name' => 'Ficção Científica']);
        Category::create(['name' => 'Ficção Brasileira']);
        Category::create(['name' => 'Clássico']);
        Category::create(['name' => 'Suspense']);
    }
}
