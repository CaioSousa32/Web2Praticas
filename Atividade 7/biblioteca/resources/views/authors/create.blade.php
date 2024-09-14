@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Novo Autor</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
