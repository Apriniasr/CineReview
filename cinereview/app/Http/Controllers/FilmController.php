<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class FilmController extends Controller
{
    private $apiUrl = 'http://127.0.0.1:8000/api/films';
    private $apiKey = 'RJIVPSdScj3FkU6apbDkizbAAmyCwiEp';

    private function headers()
    {
        return [
            'X-API-KEY' => $this->apiKey,
            'Accept' => 'application/json',
        ];
    }

    public function index()
    {
        $response = Http::withHeaders($this->headers())->get($this->apiUrl);
        $films = $response->successful() ? $response->json() : [];

        foreach ($films as &$film) {
            $ratings = Review::where('film_id', $film['id'])->pluck('rating');
            $film['avg_rating'] = round($ratings->avg(), 1);
            $film['review_count'] = $ratings->count();
        }

        return view('cinereview.films.index', compact('films'));
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'film_id' => 'required|integer',
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $userId = Auth::id();
        $exists = Review::where('user_id', $userId)
                        ->where('film_id', $request->film_id)
                        ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Kamu sudah memberikan review untuk film ini.');
        }

        Review::create([
            'user_id' => $userId,
            'film_id' => $request->film_id,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan.');
    }

    public function reviews($film_id)
    {
        $reviews = Review::with('user')
                    ->where('film_id', $film_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json($reviews);
    }
}
