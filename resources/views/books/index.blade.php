@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    <p><a href="{{ route('books.create') }}" class="btn btn-primary">Add books</a></p>

    <p>
        Filter by category:
        @foreach ($categories as $cat)
            <a href="{{ route('books.index', ['category' => $cat->id, 'year' => $year]) }}">{{ $cat->name }}</a>
            @if (! $loop->last) | @endif
        @endforeach
    </p>

    <p>
        Filter by year:
        <a href="{{ route('books.index', ['category' => $category, 'year' => 1937]) }}">1937</a>
        |
        <a href="{{ route('books.index', ['category' => $category, 'year' => 2018]) }}">2018</a>
    </p>

    <p>
        @if ($category || $year)
            Active filters:
            @if ($category) Category: {{ $categories->find($category)?->name }} @endif
            @if ($year) Year: {{ $year }} @endif
            |
            <a href="{{ route('books.index') }}">Clear all filters</a>
        @else
            Showing all books
        @endif
    </p>

    @forelse ($books as $book)
        @if ($loop->first)
            <table class="table table-striped table-bordered">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
        @endif

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category->name }}</td>
            <td>
                {{ $book->year }}
                @if ($book->year < 1950)
                    <span>(Classic)</span>
                @endif
            </td>
            <td>
                <a href="{{ route('books.edit', $book) }}">Edit</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST"onsubmit="return confirm('Delete this record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
            </td>
        </tr>

        @if ($loop->last)
            </table>
        @endif
    @empty
        <p>No books are available right now. Please check back later.</p>
    @endforelse
@endsection