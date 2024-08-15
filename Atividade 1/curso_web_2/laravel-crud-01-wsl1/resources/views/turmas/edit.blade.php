@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Turma</h1>
    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="disciplina">Disciplina</label>
            <input type="text" class="form-control" id="disciplina" name="disciplina" value="{{ old('disciplina', $turma->disciplina) }}" required>
        </div>
        <div class="form-group">
            <label for="professor">Professor</label>
            <input type="text" class="form-control" id="professor" name="professor" value="{{ old('professor', $turma->professor) }}" required>
        </div>
        <div class="form-group">
            <label for="turno">Turno</label>
            <input type="text" class="form-control" id="turno" name="turno" value="{{ old('turno', $turma->turno) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
