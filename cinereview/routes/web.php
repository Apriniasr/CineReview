<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmWebController; // Admin-side
use App\Http\Controllers\FilmController;    // User-side
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Public Routes (before login)
|--------------------------------------------------------------------------
*/

// Landing page sebagai default
Route::get('/', function () {
    return view('landing');
})->name('welcome');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes (hanya setelah login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Side (filmeraportal)
    | Controller: FilmWebController
    | Role: admin only
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin')->group(function () {
        Route::get('/filmeraportal', [FilmWebController::class, 'index'])->name('films.index');
        Route::post('/films', [FilmWebController::class, 'store'])->name('films.store');
        Route::put('/films/{id}', [FilmWebController::class, 'update'])->name('films.update');
        Route::delete('/films/{id}', [FilmWebController::class, 'destroy'])->name('films.destroy');
        Route::get('/films/search', [FilmWebController::class, 'search'])->name('films.search');
    });

    /*
    |--------------------------------------------------------------------------
    | User Side (cinereview)
    | Controller: FilmController
    |--------------------------------------------------------------------------
    */
    // USER SIDE - CINEREVIEW
    Route::get('/cinereview', [FilmController::class, 'index'])->name('film.index');
    Route::get('/cinereview/film/{id}', [FilmController::class, 'show'])->name('film.show');
    Route::post('/cinereview/review', [FilmController::class, 'storeReview'])->name('film.review');
    Route::get('/cinereview/reviews/{film_id}', [FilmController::class, 'reviews'])->name('film.reviews');

});
