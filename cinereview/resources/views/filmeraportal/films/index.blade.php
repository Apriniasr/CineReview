@extends('filmeraportal.layouts.app')

@section('content')
<div x-data="{ createModal: false, editModal: false, currentFilm: {} }" class="max-w-7xl mx-auto p-2">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-4">
            <h1 class="text-2xl font-bold flex items-center gap-2">
                🎬 filmeraportal
            </h1>
        </div>
    </div>

    <div class="flex justify-between items-center mb-6">
        <button @click="createModal = true" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-6">
            + Tambah Film
        </button>
        <form method="GET" action="{{ route('films.search') }}" class="flex items-center space-x-2">
            <input name="query" placeholder="Cari..." class="border px-3 py-1 rounded text-sm" />
            <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Cari</button>
        </form>
    </div>

    @if (is_array($films))
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($films as $film)
                @if (is_array($film))
                    <div class="bg-white shadow rounded overflow-hidden flex flex-col">
                        <img src="{{ $film['poster_url'] ?? '' }}" alt="{{ $film['title'] ?? '' }}" class="h-60 object-cover w-full">
                        <div class="p-4 flex-1 flex flex-col">
                            <h2 class="text-lg font-semibold mb-1">{{ $film['title'] ?? '' }}</h2>
                            <p class="text-sm text-gray-500 mb-1">{{ $film['genre'] ?? '' }} | {{ $film['release_year'] ?? '' }}</p>
                            <p class="text-sm text-gray-700 flex-1">{{ Str::limit($film['synopsis'] ?? '', 100) }}</p>

                            <div class="mt-4 flex justify-between items-center gap-2">
                                <button 
                                    @click='
                                        currentFilm = @json($film);
                                        editModal = true
                                    '
                                    class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('films.destroy', $film['id']) }}" onsubmit="return confirm('Yakin hapus film ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <p>Tidak ada data film yang tersedia.</p>
    @endif

    {{-- Modal Tambah --}}
    <div x-show="createModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="createModal = false" class="bg-white p-6 rounded shadow max-w-md w-full">
            <h2 class="text-xl font-semibold mb-4">Tambah Film</h2>
            <form method="POST" action="{{ route('films.store') }}">
                @csrf
                @include('filmeraportal.films.form')
                <div class="mt-4 text-right">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div x-show="editModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="editModal = false" class="bg-white p-6 rounded shadow max-w-md w-full">
            <h2 class="text-xl font-semibold mb-4">Edit Film</h2>
            <form :action="`/films/${currentFilm.id}`" method="POST">
                @csrf
                @method('PUT')
                <template x-if="currentFilm">
                    <div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium">Judul</label>
                            <input type="text" name="title" class="w-full border px-3 py-2 rounded text-sm" x-model="currentFilm.title">
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium">Genre</label>
                            <input type="text" name="genre" class="w-full border px-3 py-2 rounded text-sm" x-model="currentFilm.genre">
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium">Sutradara</label>
                            <input type="text" name="director" class="w-full border px-3 py-2 rounded text-sm" x-model="currentFilm.director">
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium">Tahun Rilis</label>
                            <input type="number" name="release_year" class="w-full border px-3 py-2 rounded text-sm" x-model="currentFilm.release_year">
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium">Poster URL</label>
                            <input type="text" name="poster_url" class="w-full border px-3 py-2 rounded text-sm" x-model="currentFilm.poster_url">
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium">Sinopsis</label>
                            <textarea name="synopsis" class="w-full border px-3 py-2 rounded text-sm" x-model="currentFilm.synopsis"></textarea>
                        </div>
                    </div>
                </template>
                <div class="mt-4 text-right">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</div>
@endsection
