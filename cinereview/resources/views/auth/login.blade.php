@extends('cinereview.layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white shadow-md p-6 rounded-md w-96">
        <h2 class="text-xl font-semibold mb-4 text-center">Login</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-sm">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Login as</label>
                <select name="role" class="w-full border p-2 rounded" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
        </form>
        <p class="mt-4 text-sm text-center">Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 underline">Register</a>
        </p>
    </div>
</div>
@endsection
