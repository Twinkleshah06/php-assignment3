<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8">Product Catalog</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg">
                    <h2 class="text-xl font-bold mt-4">{{ $product->name }}</h2>
                    <p class="text-gray-700 mt-2">{{ $product->description }}</p>
                    <p class="text-green-500 font-bold mt-4">${{ number_format($product->price, 2) }}</p>
                    <p class="text-sm text-gray-500">Stock: {{ $product->stock_quantity }}</p>
                </div>
            @endforeach
        </div>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Add to Cart</button>
</form>
    </div>
</body>
</html>
