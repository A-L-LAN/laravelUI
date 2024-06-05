<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function show(Product $product)
    {
        $mainImage = $product->mainImage;

        return view('products.show', compact('product', 'mainImage'));
    }
   public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => '',
            'images' => 'required|array',
            'images.*' => 'image|max:2048',
        ]);

    if (auth()->check()) {
        $product = Product::create([ 
    'name' => $request->input('name'),
    'price' => $request->input('price'),
    'description' => $request->input('description'),
    'user_id' => auth()->id(),
]);

        $isMain = true;

        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');


            $product->pictures()->create([
                'image' => $path,
                'is_main' => $isMain,
            ]);

            $isMain = false;
        }

        return redirect()->route('home')->with('success', 'Product created successfully.');
   } else {
        // Redirect to login if user is not authenticated
        return redirect()->route('login')->with('error', 'Please log in to upload products.');
    }
    }
public function create()
{
    return view('products.create');
}
public function destroy(Product $product)
{
   // Check if current logged in user is the owner of the product
   if (auth()->id() === $product->user_id) {
       $product->delete();  // Deletes the product
       // You may want to delete associated images from storage here, or set up a model event to handle it when a product is deleted
   }
   
   return back()->with('success', 'Product deleted successfully.'); 
}
}
