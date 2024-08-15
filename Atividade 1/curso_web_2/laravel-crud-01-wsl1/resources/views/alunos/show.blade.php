@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Aluno</h1>
    <div class="card">
        <div class="card-header">
            {{ $aluno->nome }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $aluno->email }}</p>
            <p><strong>Matrícula:</strong> {{ $aluno->matricula }}</p>
            <a href="{{ route('alunos.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>
@endsection
