@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Manage Books</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Cover Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>
                        <div class="description-container">
                            <span class="description-short">{{ \Str::limit($book->description, 20) }}</span>
                            <span class="description-full" style="display: none;">{{ $book->description }}</span>
                            <a href="javascript:void(0);" class="see-more">See More</a>
                        </div>
                    </td>
                    <td><img src="{{ asset('storage/' . $book->image_url) }}" ></td>


                    <td> <button> <a href="{{ route('admin.editBooks', $book->id) }}" class="edit">Edit</a> </button>

                      <!-- Delete Form -->

                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="delete">Delete</button>
                    </form>

                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.section', ['section' => 'addBooks']) }}" class="btn btn-success add-btn">
        <i class="fas fa-plus-circle"></i> Add New Book
    </a>
</div>
@endsection
