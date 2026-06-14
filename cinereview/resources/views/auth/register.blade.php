@extends('cinereview.layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white shadow-md p-6 rounded-md w-96">
        <h2 class="text-xl font-semibold mb-4 text-center">Register</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-sm">Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
            </div>
            <button class="bg-green-500 text-white px-4 py-2 rounded w-full">Register</button>
        </form>
        <p class="mt-4 text-sm text-center">Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 underline">Login</a>
        </p>
    </div>
</div>
@endsection
