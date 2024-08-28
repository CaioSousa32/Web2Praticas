@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Novo Livro</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Autor</label>
                <select class="form-select" id="author_id" name="author_id" required>
                    <option value="">Selecione um Autor</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="publisher_id" class="form-label">Editora</label>
                <select class="form-select" id="publisher_id" name="publisher_id" required>
                    <option value="">Selecione uma Editora</option>
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="published_year" class="form-label">Ano de Publicação</label>
                <input type="number" class="form-control" id="published_year" name="published_year" value="{{ old('published_year') }}" required>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Categorias</label>
                <select class="form-select" id="categories" name="categories[]" multiple required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
