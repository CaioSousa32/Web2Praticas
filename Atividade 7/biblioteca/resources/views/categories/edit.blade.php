@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoria</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
