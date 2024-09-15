<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any books.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        // Todos podem visualizar livros
        return true;
    }

    /**
     * Determine whether the user can view the book.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return bool
     */
    public function view(User $user, Book $book)
    {
        // Todos podem visualizar livros
        return true;
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        // Apenas admins podem criar livros
        return $user->hasRole('admin') || $user->hasRole('bibliotecario');
    }

    /**
     * Determine whether the user can update the book.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return bool
     */
    public function update(User $user, Book $book)
    {
        // Apenas admins podem editar livros
        return $user->hasRole('admin') || $user->hasRole('bibliotecario');
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return bool
     */
    public function delete(User $user, Book $book)
    {
        // Apenas admins podem excluir livros
        return $user->hasRole('admin') || $user->hasRole('bibliotecario');
    }
}
