<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>filmeraportal</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-14 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">filmeraportal</h1>
            <div class="flex items-center space-x-4">
                @auth
                    <span>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>
</body>
</html>
