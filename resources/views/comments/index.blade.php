<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8">Comments</h1>

        <a href="{{ route('comments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Comment</a>

        @if (session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <ul>
            @foreach ($comments as $comment)
                <li class="bg-white shadow p-4 mb-4">
                    <strong>{{ $comment->author }}</strong>: {{ $comment->comment }}
                    <div class="mt-2">
                        <a href="{{ route('comments.edit', $comment) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
