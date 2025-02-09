<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8">Shopping Cart</h1>

        @if(session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(empty($cart))
            <p>Your cart is empty!</p>
        @else
            <table class="table-auto w-full mb-8 bg-white shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-4">Product</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td class="p-4">{{ $item['name'] }}</td>
                            <td class="p-4">${{ number_format($item['price'], 2) }}</td>
                            <td class="p-4">
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="border p-2 w-16">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                </form>
                            </td>
                            <td class="p-4">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="/products-catalog" class="bg-gray-700 text-white px-4 py-2 rounded">Continue Shopping</a>
    </div>
</body>
</html>
