<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // Campos que podem ser atribuídos em massa
    protected $fillable = ['name', 'birth_date'];

    // Relacionamento com Books: Um autor pode ter muitos livros
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
