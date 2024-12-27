<head>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<!-- Form to Add New Book -->
<h2>Add New Book</h2>
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" id="author" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" id="price" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="genre">Genre</label>
        <select name="genre" class="form-control" id="genre" required>
            <option value="" disabled selected>Select Genre</option>
            <option value="fiction">Arts & Photography</option>
            <option value="non-fiction">Lifestyle & Wellness</option>
            <option value="mystery">Fiction & literature</option>
            <option value="romance">History & biography</option>
            <option value="science-fiction">Kids & Teens</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="cover_image">Cover Image</label>
        <input type="file" name="cover_image" class="form-control" id="cover_image" required>
    </div>

    <button type="submit" class="btn btn-success">Add Book</button>
</form>
</body>
