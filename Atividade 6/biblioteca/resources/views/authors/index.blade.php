@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Autores</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Adicionar Novo Autor</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->birth_date }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
