<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = ['disciplina', 'professor', 'turno'];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_turma');
    }
}
