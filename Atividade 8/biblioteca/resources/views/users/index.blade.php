@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciar Papéis de Usuários</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Papel Atual</th>
                    <th>Editar Papel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <select name="role" class="form-control">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="bibliotecario" {{ $user->role == 'bibliotecario' ? 'selected' : '' }}>Bibliotecário</option>
                                        <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
