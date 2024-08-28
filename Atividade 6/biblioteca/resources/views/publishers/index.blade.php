@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Editoras</h1>
        <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Adicionar Nova Editora</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>
                            <a href="{{ route('publishers.show', $publisher->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta editora?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
