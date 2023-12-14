<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\CinemaController;
use App\Http\Controllers\Api\ShowtimeController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\ReservationController;


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
});

// Apis cinema
Route::prefix('cinemas')->group(function () {
    Route::get('/', [CinemaController::class, 'getAllCinemas']);
    Route::get('/{cinemaId}', [CinemaController::class, 'getDetailCinema']);
});

// Apis showtime
Route::get('/showtimes', [ShowtimeController::class, 'getShowtimes']);

// Apis seat
Route::get('/seats/theater{theaterId}', [SeatController::class, 'getListSeats'])->middleware('auth:api');
Route::post('/seats/{seatId}/update-status', [SeatController::class, 'updateStatusSeat'])->middleware('auth:api');

// Apis seat
Route::get('/reservations', [ReservationController::class, 'getAllReservations'])->middleware('auth:api');
Route::get('/reservations/{reservationId}', [ReservationController::class, 'getDetailReservation'])->middleware('auth:api');
Route::post('/reservations/new-reservation', [ReservationController::class, 'createNewReservation'])->middleware('auth:api');

//Apis search
Route::get('/search/movies', [MovieController::class, 'seachMovie']);
Route::get('/search/showtimes', [ShowtimeController::class, 'seachShowtime']);

