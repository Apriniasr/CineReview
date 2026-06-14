<?php

use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiKeyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    
// Route::get('/dashboard', function () {
//     return view('welcome');
// });

use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrate', function () {
    Artisan::call('migrate');
    return 'Migration success!';
});


//Tampilkan landing page
Route::get('/', function() {
    return view('landing');
})->name('landing');

//Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


//Register Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/logout', function () {
    return redirect('/landing'); // atau halaman lain yang kamu inginkan
});

//Route mengarah ke Random Sampling
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/generate-api-key', [ApiKeyController::class, 'generate'])->name('generate.api.key');
    Route::post('/revoke-api-key/{id}', [ApiKeyController::class, 'revoke'])->name('revoke.api.key');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});








