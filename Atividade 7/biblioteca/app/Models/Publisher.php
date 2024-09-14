<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    // Campos que podem ser atribuídos em massa
    protected $fillable = ['name', 'address'];

    // Relacionamento com Books: Uma editora pode ter muitos livros
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
