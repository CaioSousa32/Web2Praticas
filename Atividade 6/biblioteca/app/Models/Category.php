<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Campo que pode ser atribuído em massa
    protected $fillable = ['name'];

    // Relacionamento com Books: Uma categoria pode pertencer a muitos livros (many-to-many)
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
