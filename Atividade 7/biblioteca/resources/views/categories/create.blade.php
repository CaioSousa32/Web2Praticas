@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Nova Categoria</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
