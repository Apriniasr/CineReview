@extends('cinereview.layouts.app')

@section('content')
<div x-data="cinereviewComponent()" class="max-w-7xl mx-auto p-4">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold flex items-center gap-2">
            🎬 Cinereview
        </h1>
    </div>

    @if (is_array($films))
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($films as $film)
                <div class="bg-white shadow rounded overflow-hidden flex flex-col">
                    <img src="{{ $film['poster_url'] ?? 'https://via.placeholder.com/300x450?text=No+Image' }}" alt="{{ $film['title'] }}" class="h-60 object-cover w-full">
                    <div class="p-4 flex-1 flex flex-col">
                        <h2 class="text-lg font-semibold mb-1">{{ $film['title'] }}</h2>
                        <p class="text-sm text-gray-500 mb-1">{{ $film['genre'] }} | {{ $film['release_year'] }}</p>
                        <p class="text-sm text-gray-700 flex-1">{{ Str::limit($film['synopsis'], 100) }}</p>
                        <div class="mt-2 text-sm text-yellow-600">
                            ⭐ {{ number_format($film['avg_rating'] ?? 0, 1) }} ({{ $film['review_count'] ?? 0 }} ulasan)
                        </div>
                        <div class="mt-4 flex justify-between gap-2">
                            <button 
                                @click="selectedFilm = {{ json_encode($film) }}; fetchReviews({{ $film['id'] }}); reviewModal = true;"
                                class="w-1/2 bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                                Review
                            </button>
                            <button 
                                @click="
                                    selectedFilm = {{ json_encode($film) }};
                                    fetchReviews({{ $film['id'] }});
                                    allReviewsModal = true;
                                "
                                class=" w-1/2 bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700">
                                Lihat Semua Review
                            </button>
                        </div>
                        <div class="flex items-center mt-3">
                            <button 
                                @click="selectedFilm = {{ json_encode($film) }}; detailModal = true"
                                class="w-full bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-600">Tidak ada film yang tersedia.</p>
    @endif

    <!-- Modal Detail -->
    <div x-show="detailModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="detailModal = false" class="bg-white p-6 rounded shadow max-w-xl w-full">
            <h2 class="text-xl font-semibold mb-2" x-text="selectedFilm.title"></h2>
            <img :src="selectedFilm.poster_url" class="w-full h-64 object-cover rounded mb-4">
            <p class="text-sm text-gray-600 mb-1"><strong>Genre:</strong> <span x-text="selectedFilm.genre"></span></p>
            <p class="text-sm text-gray-600 mb-1"><strong>Tahun:</strong> <span x-text="selectedFilm.release_year"></span></p>
            <p class="text-sm text-gray-600 mb-1"><strong>Sutradara:</strong> <span x-text="selectedFilm.director"></span></p>
            <p class="text-sm text-gray-800 mt-2" x-text="selectedFilm.synopsis"></p>
            <div class="text-right mt-4">
                <button @click="detailModal = false" class="bg-gray-600 text-white px-4 py-1 rounded hover:bg-gray-700">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Review -->
    <div x-show="reviewModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="reviewModal = false" class="bg-white p-6 rounded shadow max-w-lg w-full">
            <h2 class="text-xl font-semibold mb-2" x-text="selectedFilm.title"></h2>

            <form method="POST" action="{{ route('film.review') }}">
                @csrf
                <input type="hidden" name="film_id" :value="selectedFilm.id">
                <div class="mb-2">
                    <label class="block text-sm font-medium">Rating (1-5)</label>
                    <input type="number" name="rating" min="1" max="5" required class="w-full border px-3 py-1 rounded text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ulasan</label>
                    <textarea name="content" rows="3" required class="w-full border px-3 py-1 rounded text-sm"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Semua Review -->
    <div x-show="allReviewsModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="allReviewsModal = false" class="bg-white p-6 rounded shadow max-w-2xl w-full max-h-[80vh] overflow-y-auto">
            <h2 class="text-xl font-semibold mb-4 text-center" x-text="'Semua Review untuk: ' + selectedFilm.title"></h2>

            <template x-if="reviews.length === 0">
                <p class="text-sm text-gray-600 text-center">Belum ada review untuk film ini.</p>
            </template>

            <template x-for="review in reviews" :key="review.id">
                <div class="mb-4 border-b pb-2">
                    <div class="text-sm font-semibold text-gray-800" x-text="review.user.name"></div>
                    <div class="text-sm text-yellow-600">⭐ <span x-text="review.rating"></span></div>
                    <div class="text-sm text-gray-600" x-text="review.content"></div>
                </div>
            </template>

            <div class="mt-4 text-center">
                <button @click="allReviewsModal = false" class="bg-gray-600 text-white px-4 py-1 rounded hover:bg-gray-700">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Sukses -->
    <div x-show="successModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="successModal = false" class="bg-white p-6 rounded shadow max-w-md w-full text-center">
            <h2 class="text-lg font-semibold text-green-600 mb-3">Berhasil</h2>
            <p class="text-sm text-gray-800" x-text="successMessage"></p>
            <div class="mt-4">
                <button @click="successModal = false" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Gagal -->
    <div x-show="showError" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="showError = false" class="bg-white p-6 rounded shadow max-w-sm w-full text-center">
            <h2 class="text-lg font-bold mb-2 text-red-600">⚠️ Gagal!</h2>
            <p class="text-sm text-gray-600">{{ session('error') }}</p>
            <button @click="showError = false" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Tutup</button>
        </div>
    </div>

    <style>[x-cloak] { display: none !important; }</style>

    <script>
        function cinereviewComponent() {
            return {
                reviewModal: false,
                detailModal: false,
                allReviewsModal: false,
                selectedFilm: {},
                reviews: [],
                showSuccess: {{ session('success') ? 'true' : 'false' }},
                showError: {{ session('error') ? 'true' : 'false' }},
                successModal: {{ session('success') ? 'true' : 'false' }},
                successMessage: '{{ session('success') ?? '' }}',

                fetchReviews(filmId) {
                    fetch(`/cinereview/reviews/${filmId}`)
                        .then(res => res.json())
                        .then(data => {
                            this.reviews = data;
                        })
                        .catch(err => {
                            console.error('Error ambil review:', err);
                        });
                }
            }
        }
    </script>
</div>
@endsection
