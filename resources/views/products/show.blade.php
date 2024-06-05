<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
    <title>Product Details</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->price }}</p>
    <p>{{ $product->description }}</p>
    <p> </p>
    <div class="image-grid">
    @foreach($product->pictures as $picture)
        <img src="{{ asset('storage/' . $picture->image) }}">
    @endforeach
    </div>
</body>
</html>