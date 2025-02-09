<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{

    // // Get all products
    // public function index()
    // {
    //     return response()->json(Product::all(), 200);
    // }

    // // Get a specific product by ID
    // public function show($id)
    // {
    //     $product = Product::find($id);
    //     if (!$product) {
    //         return response()->json(['message' => 'Product not found'], 404);
    //     }
    //     return response()->json($product, 200);
    // }

    // // Create a new product
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //     ]);

    //     $product = Product::create($request->all());
    //     return response()->json($product, 201);
    // }

    public function index()
    {
        // $posts = Product::paginate(10);
        // return ProductResource::collection($posts);
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request){
        $post = new Product();
        $post->name = $request -> input('name');
        $post->description = $request -> input('description');
        $post->price = $request -> input('price');
        $post->save();
        return new ProductResource($post);
    }

    public function show($id){
        $post = Product::find($id);
        return new ProductResource($post);
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->all());
        // return response()->json($product, 200);
        return new ProductResource($product);
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}

