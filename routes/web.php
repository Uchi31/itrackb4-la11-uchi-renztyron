<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/filter/{value?}', function ($value = null) {
    return redirect()->route('books.index', ['category' => $value]);
});

Route::get('/books/create', [BookController::class, 'create'])
    ->name('books.create');

Route::post('/books', [BookController::class, 'store'])
    ->name('books.store');

Route::resource('books', BookController::class)->only(['index', 'show']);