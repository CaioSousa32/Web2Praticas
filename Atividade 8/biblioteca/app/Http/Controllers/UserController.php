<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    // Função para exibir a lista de usuários e permitir a edição dos papéis
    public function index()
    {
        $this->authorize('editRoles', User::class); // Verifica a autorização

        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Função para atualizar o papel do usuário
    public function updateRole(Request $request, User $user)
    {
        $this->authorize('editRoles', User::class); // Verifica a autorização

        $validatedData = $request->validate([
            'role' => 'required|in:admin,bibliotecario,cliente',
        ]);

        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'Papel do usuário atualizado com sucesso!');
    }
}
