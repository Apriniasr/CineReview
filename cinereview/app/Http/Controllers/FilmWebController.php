<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmWebController extends Controller
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
        $filmsResponse = Http::withHeaders($this->headers())->get($this->apiUrl);
        $films = $filmsResponse->successful() ? $filmsResponse->json() : [];

        return view('filmeraportal.films.index', compact('films'));
    }

    public function store(Request $request)
    {
        Http::withHeaders($this->headers())->post($this->apiUrl, $request->all());
        return redirect()->route('films.index');
    }

    public function update(Request $request, $id)
    {
        Http::withHeaders($this->headers())->put("{$this->apiUrl}/{$id}", $request->all());
        return redirect()->route('films.index');
    }

    public function destroy($id)
    {
        Http::withHeaders($this->headers())->delete("{$this->apiUrl}/{$id}");
        return redirect()->route('films.index');
    }

    public function search(Request $request)
    {
        $query = $request->query('query');

        $filmsResponse = Http::withHeaders($this->headers())
            ->get($this->apiUrl . '/search', [
                'query' => $query
            ]);

        $films = $filmsResponse->successful() ? $filmsResponse->json() : [];

        return view('filmeraportal.films.index', compact('films'));
    }
}
