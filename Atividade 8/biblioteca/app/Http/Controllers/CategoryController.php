<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Certifique-se de que o middleware de autorização não está aplicando restrições não desejadas
    }

    // Função para exibir uma lista de categorias
    public function index()
    {
        $categories = Category::with('books')->get();
        return view('categories.index', compact('categories'));
    }

    // Função para exibir uma categoria específica
    public function show($id)
    {
        $category = Category::with('books')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // Função para exibir o formulário de criação de uma nova categoria
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('categories.create');
    }

    // Função para armazenar uma nova categoria no banco de dados
    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Função para exibir o formulário de edição de uma categoria
    public function edit($id)
    {
        $this->authorize('create', Book::class);

        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Função para atualizar uma categoria no banco de dados
    public function update(Request $request, $id)
    {
        $this->authorize('create', Book::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Função para excluir uma categoria do banco de dados
    public function destroy($id)
    {
        $this->authorize('create', Book::class);

        $category = Category::findOrFail($id);
        $category->books()->detach();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
