@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $author->name }}</h1>
        <p><strong>Data de Nascimento:</strong> {{ $author->birth_date }}</p>
        <h3>Livros:</h3>
        <ul>
            @foreach ($author->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
        <a href="{{ route('authors.index') }}" class="btn btn-primary">Voltar à Lista</a>
        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
        </form>
    </div>
@endsection
