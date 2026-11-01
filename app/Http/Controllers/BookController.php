<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    private function getBooks()
    {
        $path = storage_path('app/data/books.json');
        $data = json_decode(file_get_contents($path), true);

        $books = [];
        foreach ($data as $book) {
            $books[$book['id']] = $book;
        }

        return $books;
    }

    private function saveBooks($books)
    {
        $path = storage_path('app/data/books.json');
        file_put_contents($path, json_encode(array_values($books), JSON_PRETTY_PRINT));
    }

    public function index(Request $request)
{
    $category = $request->query('category', '');
    $year = $request->query('year', '');

    $books = Book::query()
        ->when($category !== '', fn ($q) => $q->where('category', $category))
        ->when($year !== '', fn ($q) => $q->where('year', $year))
        ->get();

    return view('books.index', compact('books', 'category', 'year'));
}

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'year' => 'required|numeric|min:1000|max:2026',
        'category' => 'required|in:Motivation,Self-Help,Psychology',
    ]);

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Book added successfully!');
}

    public function show($id)
{
    $book = Book::findOrFail($id);
    return view('books.show', compact('book'));
}

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
{
    $book = Book::findOrFail(3);
    return view('books.show', compact('book'));
}
}