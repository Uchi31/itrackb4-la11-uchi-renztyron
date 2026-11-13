@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title', $book->title) }}">
            @error('title') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Author</label><br>
            <input type="text" name="author" value="{{ old('author', $book->author) }}">
            @error('author') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Year</label><br>
            <input type="text" name="year" value="{{ old('year', $book->year) }}">
            @error('year') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Category</label><br>
            <select name="category_id">
                <option value="">Choose a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span>{{ $message }}</span> @enderror
        </div>

        <br>
        <button type="submit">Save</button>
    </form>
@endsection