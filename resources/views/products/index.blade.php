<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Hypermall Imports</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#about">About Us</a></li>
                <li><a href="#products">Our Products</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section id="home">
        <h1>Welcome to Hypermall Imports</h1>
        <br/>
        <p>Experience Luxury and quality Like Never Before</p>
        <br/>
        <a href="#products" class="cta-button">Explore Our Products</a>
    </section>
    <section id="about">
        <h2>About Us</h2>
        <p>We are an established import business specialized in importing high-end quality goods from well-known brands in the UK, US, and Sweden, offering a wide range of products.
        <br/> Our mission is to provide customers in Eastern Africa with access to world-class products at affordable prices.</p>
    </section>
    <section id="products">
    <h2>Our Products</h2>
    <div class="grid-container">
         @foreach($products as $product)
        <div>
            @if($product->mainImage)
                <img src="{{ asset('storage/' . $product->mainImage->image) }}">
            @endif
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->price }}</p>
            <a href="/products/{{ $product->id }}">View Details</a>
            @if(Auth::check() && (Auth::user()->id === $product->user_id))
                <form action="{{ route('destroy.product', [$product->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>
            @endif
        </div>
         @endforeach
    </div>
    </section>
    <hr/>
    <section id="contact">
        <h2>Contact Us</h2>
        <p>Email: hypermallenterprises@gmail.com</p>
        <p>Phone: +254795309105</p>
    </section>
</body>
</html>