<head>
    <link rel="stylesheet" href="/css/admin.css"> <!-- Link to Admin Stylesheet -->
</head>
<body>
<!-- Form to Edit Book -->
<h2>Edit Book</h2>
<form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This tells Laravel the form is using PUT for updating -->

    <!-- Book Title Input -->
    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}" required>
    </div>

    <!-- Author Input -->
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" id="author" value="{{ old('author', $book->author) }}" required>
    </div>

    <!-- Price Input -->
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ old('price', $book->price) }}" required>
    </div>

    <!-- Genre Dropdown -->
    <div class="form-group">
        <label for="genre">Genre</label>
        <select name="genre" class="form-control" id="genre" required>
            <!-- Set selected option based on current book genre -->
            <option value="Arts & Photography" {{ old('genre', $book->genre) == 'Arts & Photography' ? 'selected' : '' }}>Arts & Photography</option>
            <option value="Lifestyle & Wellness" {{ old('genre', $book->genre) == 'Lifestyle & Wellness' ? 'selected' : '' }}>Lifestyle & Wellness</option>
            <option value="Fiction & Literature" {{ old('genre', $book->genre) == 'Fiction & Literature' ? 'selected' : '' }}>Fiction & Literature</option>
            <option value="History & Biography" {{ old('genre', $book->genre) == 'History & Biography' ? 'selected' : '' }}>History & Biography</option>
            <option value="Kids & Teens" {{ old('genre', $book->genre) == 'Kids & Teens' ? 'selected' : '' }}>Kids & Teens</option>
        </select>
    </div>

    <!-- Description Input -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description', $book->description) }}</textarea>
    </div>

    <!-- Book Cover Image Upload -->
    <div class="form-group">
        <label for="image_url">Cover Image</label>
        <input type="file" name="image_url" class="form-control" id="image_url">

        <!-- Display current cover image if it exists -->
        @if ($book->image_url)
            <img src="{{ asset('storage/' . $book->image_url) }}" alt="Book Cover" class="mt-2" style="max-width: 150px;">
        @endif
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-success">Update Book</button>
</form>
</body>
