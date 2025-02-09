<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <label>Author:</label>
    <input type="text" name="author" class="border p-2 w-full" required>
    <label>Comment:</label>
    <textarea name="comment" class="border p-2 w-full" required></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Add Comment</button>
</form>
