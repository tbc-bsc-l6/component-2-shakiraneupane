<head>
    <!-- Link to the Admin CSS File -->
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <!-- Form to Add New Book -->
    <h2>Add New Book</h2>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Book Title Field -->
        <div class="form-group">
            <label for="title">Book Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <!-- Author Field -->
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" id="author" required>
        </div>

        <!-- Price Field -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
        </div>

        <!-- Genre Field -->
        <div class="form-group">
            <label for="genre">Genre</label>
            <select name="genre" class="form-control" id="genre" required>
                <option value="" disabled selected>Select Genre</option>
                <option value="Arts & Photography">Arts & Photography</option>
                <option value="Lifestyle & Wellness">Lifestyle & Wellness</option>
                <option value="Fiction & Literature">Fiction & Literature</option>
                <option value="History & Biography">History & Biography</option>
                <option value="Kids & Teens">Kids & Teens</option>
            </select>
        </div>

        <!-- Description Field -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
        </div>

        <!-- Book Cover Image Field -->
        <div class="form-group">
            <label for="image_url">Cover Image</label>
            <input type="file" name="image_url" class="form-control" id="image_url" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Add Book</button>
    </form>
</body>
