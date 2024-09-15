<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Certifique-se de que o middleware de autorização não está aplicando restrições não desejadas
    }
    
    // Função para exibir uma lista de autores
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }

    // Função para exibir um autor específico
    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);
        return view('authors.show', compact('author'));
    }

    // Função para exibir o formulário de criação de um novo autor
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('authors.create');
    }

    // Função para armazenar um novo autor no banco de dados
    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        Author::create($validatedData);

        return redirect()->route('authors.index')->with('success', 'Autor criado com sucesso!');
    }

    // Função para exibir o formulário de edição de um autor
    public function edit($id)
    {
        $this->authorize('create', Book::class);

        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    // Função para atualizar um autor no banco de dados
    public function update(Request $request, $id)
    {
        $this->authorize('create', Book::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $author = Author::findOrFail($id);
        $author->update($validatedData);

        return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso!');
    }

    // Função para excluir um autor do banco de dados
    public function destroy($id)
    {
        $this->authorize('create', Book::class);

        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor excluído com sucesso!');
    }
}
