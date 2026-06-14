<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\User;

class FilmController extends Controller
{
    public function index()
    {
        return Film::all();
    }

    public function show($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }
        return $film;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'director' => 'required',
            'release_year' => 'required|integer',
            'synopsis' => 'required',
            'poster_url' => 'required',
        ]);

        $film = Film::create($request->all());
        return response()->json($film, 201);
    }

    public function update(Request $request, $id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        $film->update($request->all());
        return response()->json(['message' => 'Updated successfully']);
    }

    public function destroy($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        $film->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    //search
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return response()->json(['message' => 'Search query is required'], 400);
        }

        $movies = Film::where('title', 'like', "%{$query}%")
                    ->orWhere('genre', 'like', "%{$query}%")
                    ->orWhere('director', 'like', "%{$query}%")
                    ->orWhere('synopsis', 'like', "%{$query}%")
                    ->get();

        return response()->json($movies);
    }

}
