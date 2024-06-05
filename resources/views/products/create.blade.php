<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label>Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label>Images:</label>
        <input type="file" multiple name="images[]" required>
        <br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>