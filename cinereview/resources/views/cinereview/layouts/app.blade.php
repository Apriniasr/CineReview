<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinereview - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-14 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Cinereview</h1>
            <div class="flex items-center space-x-4">
                @auth
                    <span>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="py-6 px-4">
        @yield('content')
    </main>
</body>
</html>
