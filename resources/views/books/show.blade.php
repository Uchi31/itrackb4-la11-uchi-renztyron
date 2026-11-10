@extends('layouts.app')

@section('title', $book['title'])

@section('content')
    <h2>{{ $book['title'] }}</h2>
    <p><strong>Author:</strong> {{ $book['author'] }}</p>
    <p><strong>Year:</strong> {{ $book['year'] }}</p>
    <p><strong>Category:</strong> {{ $book->category->name }}</p>

    <p><a href="{{ route('books.index') }}" class="btn btn-primary">Back to list</a></p>
@endsection