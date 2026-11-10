<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $year = $request->query('year');

        $categories = Category::all();

        $query = Book::with('category');

        if ($category) {
            $query = $query->where('category_id', $category);
        }

        if ($year) {
            $query = $query->where('year', $year);
        }

        $books = $query->get();

        return view('books.index', compact('books', 'category', 'year', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|numeric|min:1000|max:2026',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
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