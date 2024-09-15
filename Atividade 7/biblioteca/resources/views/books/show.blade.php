@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>

    <!-- Exibir a Imagem de Capa -->
    <div class="mb-3">
        @if ($book->cover_image)
        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Capa do Livro" style="max-width: 300px;">
        @else
        <p>Nenhuma imagem de capa disponível.</p>
        @endif

    </div>

    <!-- Detalhes do Livro -->
    <p><strong>Autor:</strong> {{ $book->author->name }}</p>
    <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
    <p><strong>Ano de Publicação:</strong> {{ $book->published_year }}</p>
    <p><strong>Categorias:</strong>
        @foreach ($book->categories as $category)
        <span class="badge bg-secondary">{{ $category->name }}</span>
        @endforeach
    </p>

    <!-- Botões de Ação -->
    <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar à Lista</a>
    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
    </form>
</div>
@endsection