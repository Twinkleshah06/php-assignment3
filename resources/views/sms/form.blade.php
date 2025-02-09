<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8">Send an SMS</h1>

        @if (session('status'))
            <div class="bg-green-200 p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('sms.send') }}" method="POST">
            @csrf
            <label for="phone_number" class="block">Phone Number:</label>
            <input type="text" name="phone_number" class="border p-2 w-full mb-4" placeholder="+1234567890" required>

            <label for="message" class="block">Message:</label>
            <textarea name="message" class="border p-2 w-full mb-4" placeholder="Enter your message here..." required></textarea>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send SMS</button>
        </form>
    </div>
</body>
</html>
