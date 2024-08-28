@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Editora</h1>
        <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $publisher->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $publisher->address) }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
