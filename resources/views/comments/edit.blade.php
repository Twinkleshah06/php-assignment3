<form action="{{ route('comments.update', $comment) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Author:</label>
    <input type="text" name="author" value="{{ $comment->author }}" class="border p-2 w-full" required>
    <label>Comment:</label>
    <textarea name="comment" class="border p-2 w-full" required>{{ $comment->comment }}</textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Update Comment</button>
</form>
