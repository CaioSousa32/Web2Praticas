<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Certifique-se de que o middleware de autorização não está aplicando restrições não desejadas
    }

    // Função para exibir uma lista de livros
    public function index()
    {
        $books = Book::with(['author', 'publisher', 'categories'])->get();
        return view('books.index', compact('books'));
    }

    // Função para exibir um livro específico
    public function show($id)
    {
        $book = Book::with(['author', 'publisher', 'categories'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Função para exibir o formulário de criação de um novo livro
    public function create()
    {
        // Permissão para criar um livro
        $this->authorize('create', Book::class);

        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'publishers', 'categories'));
    }

    // Função para armazenar um novo livro no banco de dados
    public function store(Request $request)
    {
        // Permissão para armazenar um novo livro
        $this->authorize('create', Book::class);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'published_year' => 'required|integer',
            'categories' => 'required|array',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        ]);

        // Verifica se uma imagem de capa foi enviada e a armazena
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('book_covers', 'public');
            $validatedData['cover_image'] = $imagePath; // Adiciona o caminho da imagem aos dados validados
        }

        $book = Book::create($validatedData);
        $book->categories()->attach($request->categories);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso!');
    }

    // Função para exibir o formulário de edição de um livro
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        // Permissão para editar o livro
        $this->authorize('update', $book);

        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'publishers', 'categories'));
    }

    // Função para atualizar um livro no banco de dados
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Permissão para atualizar o livro
        $this->authorize('update', $book);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'published_year' => 'required|integer',
            'categories' => 'required|array',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        ]);

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('cover_image')) {
            // Remove a imagem antiga, se existir
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }

            // Armazena a nova imagem
            $imagePath = $request->file('cover_image')->store('book_covers', 'public');
            $validatedData['cover_image'] = $imagePath;
        }

        $book->update($validatedData);
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    // Função para excluir um livro do banco de dados
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Permissão para excluir o livro
        $this->authorize('delete', $book);

        // Remove a imagem de capa associada, se existir
        if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->categories()->detach();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
    }
}
