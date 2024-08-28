<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' => Author::factory(), // Relaciona com um autor fake
            'category_id' => Category::inRandomOrder()->first()->id, // Relaciona com uma categoria existente
            'published_year' => $this->faker->year()
        ];
    }
}
