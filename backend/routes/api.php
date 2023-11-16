<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\CinemaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Apis authentication
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refreshToken']);
    Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
});

// Apis movie
Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'getAllMovies']);
    Route::get('/{movieId}', [MovieController::class, 'getDetailMovie'])->where(['movieId' => '[0-9]+']);
    Route::get('/search', [MovieController::class, 'seachMovie']);
});

// Apis cinema
Route::prefix('cinemas')->group(function () {
    Route::get('/', [CinemaController::class, 'getAllCinemas']);
});
