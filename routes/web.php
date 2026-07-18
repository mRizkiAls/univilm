<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'search']);
Route::get('/', function () {
    return view('UniVilm.loading');
});
Route::get('/home', function () {
        return view('UniVilm.index');
    });

Route::get('/movie', function () {
    return view('UniVilm.movie');
});

Route::get('/genre', function () {
    return view('UniVilm.genre');
});

Route::get('/leaderboard', function () {
    return view('UniVilm.leaderboard');
});

Route::get('/tv', function () {
    return view('UniVilm.tv');
});

Route::get('/anime', function () {
    return view('UniVilm.anime');
});
Route::get('/trending', function () {
    return view('UniVilm.trending');
});



Route::get('/pixar', function () {
    return view('UniVilm.pixar');
});
use App\Http\Controllers\AuthController;

Route::get('/signin', [AuthController::class, 'showLogin']);
Route::get('/signup', [AuthController::class, 'showRegister']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profile', function () {
    return view('UniVilm.profile');
});

Route::post('/profile/update', [AuthController::class, 'updateProfile']);
Route::post('/profile/password', [AuthController::class, 'updatePassword']);


Route::middleware('auth')->group(function () {
    Route::get('/history', [HistoryController::class, 'history']);
    Route::post('/history/store', [HistoryController::class, 'store']);
    Route::delete('/history/{id}', [HistoryController::class, 'destroy']);
});

Route::get('/leaderboard', [HistoryController::class, 'leaderboard']);
Route::get('/login', function () {
    return redirect('/signin');
})->name('login');
Route::put('/history/{id}', [HistoryController::class, 'update']);
