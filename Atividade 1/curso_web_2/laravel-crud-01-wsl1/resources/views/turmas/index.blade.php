@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Turmas</h1>
    <a href="{{ route('turmas.create') }}" class="btn btn-primary">Adicionar Turma</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Professor</th>
                <th>Turno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
                <tr>
                    <td>{{ $turma->disciplina }}</td>
                    <td>{{ $turma->professor }}</td>
                    <td>{{ $turma->turno }}</td>
                    <td>
                        <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
