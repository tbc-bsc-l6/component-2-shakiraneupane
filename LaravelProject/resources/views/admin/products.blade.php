@extends('admin.layout')

@section('content')
<div class="container">
    <!-- Page Title: Manage Books -->
    <h1 class="text-2xl font-semibold mb-4">Manage Books</h1>

    <!-- Display success message if any (e.g., after adding, updating, or deleting a book) -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Books Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th> <!-- Serial Number (Iteration) -->
                <th>Title</th> <!-- Book Title -->
                <th>Author</th> <!-- Author of the Book -->
                <th>Price</th> <!-- Price of the Book -->
                <th>Genre</th> <!-- Genre of the Book -->
                <th>Description</th> <!-- Book Description -->
                <th>Cover Image</th> <!-- Book Cover Image -->
                <th>Action</th> <!-- Action Buttons (Edit, Delete) -->
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Displays the current loop iteration number (1, 2, 3, ...) -->
                    <td>{{ $book->title }}</td> <!-- Displays the book title -->
                    <td>{{ $book->author }}</td> <!-- Displays the author's name -->
                    <td>{{ $book->price }}</td> <!-- Displays the price of the book -->
                    <td>{{ $book->genre }}</td> <!-- Displays the book's genre -->
                    <td>
                        <!-- Shortened Description with a "See More" Link to Toggle Full Description -->
                        <div class="description-container">
                            <span class="description-short">{{ \Str::limit($book->description, 20) }}</span> <!-- Truncated description (max 20 chars) -->
                            <span class="description-full" style="display: none;">{{ $book->description }}</span> <!-- Full description (hidden initially) -->
                            <a href="javascript:void(0);" class="see-more">See More</a> <!-- Link to toggle full description visibility -->
                        </div>
                    </td>
                    <td>
                        <!-- Display Book Cover Image -->
                        <img src="{{ asset('storage/' . $book->image_url) }}" alt="Book Cover">
                    </td>

                    <td>
                        <!-- Edit Button: Redirects to the edit page for the book -->
                        <button> <a href="{{ route('admin.editBooks', $book->id) }}" class="edit">Edit</a> </button>

                        <!-- Delete Form: Deletes the book using the DELETE method -->
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE') <!-- Specify that this form is using the DELETE method -->
                            <button class="delete">Delete</button> <!-- Delete Button -->
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Button to Add a New Book -->
    <a href="{{ route('admin.section', ['section' => 'addBooks']) }}" class="btn btn-success add-btn">
        <i class="fas fa-plus-circle"></i> Add New Book
    </a>
</div>
@endsection
