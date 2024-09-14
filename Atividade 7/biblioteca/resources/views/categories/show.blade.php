@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <h3>Livros nesta Categoria:</h3>
        <ul>
            @foreach ($category->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Voltar à Lista</a>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
        </form>
    </div>
@endsection
