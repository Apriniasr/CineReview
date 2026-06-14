<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cinereview - Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-4xl font-bold mb-4 text-gray-800">Welcome to <span class="text-blue-600">Cinereview</span></h1>
        <p class="text-lg text-gray-600 mb-8">Find your favorite movies and share your reviews!</p>
        
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600 transition">Login</a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-6 py-2 rounded shadow hover:bg-green-600 transition">Register</a>
        </div>
    </div>
</body>
</html>
