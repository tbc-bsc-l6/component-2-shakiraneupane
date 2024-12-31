<head>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<!-- Form to Edit Book -->
<h2>Edit Book</h2>
<form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This tells Laravel the form is using PUT for updating -->

    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}" required>
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" id="author" value="{{ old('author', $book->author) }}" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ old('price', $book->price) }}" required>
    </div>

    <div class="form-group">
        <label for="genre">Genre</label>
        <select name="genre" class="form-control" id="genre" required>
            <option value="fiction" {{ old('genre', $book->genre) == 'fiction' ? 'selected' : '' }}>Arts & Photography</option>
            <option value="non-fiction" {{ old('genre', $book->genre) == 'non-fiction' ? 'selected' : '' }}>Lifestyle & Wellness</option>
            <option value="mystery" {{ old('genre', $book->genre) == 'mystery' ? 'selected' : '' }}>Fiction & literature</option>
            <option value="romance" {{ old('genre', $book->genre) == 'romance' ? 'selected' : '' }}>History & biography</option>
            <option value="science-fiction" {{ old('genre', $book->genre) == 'science-fiction' ? 'selected' : '' }}>Kids & Teens</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description', $book->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="image_url">Cover Image</label>
        <input type="file" name="image_url" class="form-control" id="image_url">
        @if ($book->image_url)
            <img src="{{ asset('storage/' . $book->image_url) }}" alt="Book Cover" class="mt-2" style="max-width: 150px;">
        @endif
    </div>

    <button type="submit" class="btn btn-success">Update Book</button>
</form>
</body>
