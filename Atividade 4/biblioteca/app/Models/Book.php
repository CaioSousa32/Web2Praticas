<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Campos que podem ser atribuídos em massa
    protected $fillable = ['title', 'author_id', 'publisher_id', 'published_year'];

    // Relacionamento com Author: Um livro pertence a um autor
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Relacionamento com Publisher: Um livro pertence a uma editora
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // Relacionamento com Categories: Um livro pode pertencer a muitas categorias (many-to-many)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
