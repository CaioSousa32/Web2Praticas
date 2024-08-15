@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Turma</h1>
    <div class="card">
        <div class="card-header">
            {{ $turma->disciplina }}
        </div>
        <div class="card-body">
            <p><strong>Professor:</strong> {{ $turma->professor }}</p>
            <p><strong>Turno:</strong> {{ $turma->turno }}</p>
            <a href="{{ route('turmas.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>
@endsection
