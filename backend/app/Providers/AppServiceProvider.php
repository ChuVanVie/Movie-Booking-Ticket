<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Movie\MovieRepositoryInterface::class,
            \App\Repositories\Movie\MovieRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Cinema\CinemaRepositoryInterface::class,
            \App\Repositories\Cinema\CinemaRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Showtime\ShowtimeRepositoryInterface::class,
            \App\Repositories\Showtime\ShowtimeRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Theater\TheaterRepositoryInterface::class,
            \App\Repositories\Theater\TheaterRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Seat\SeatRepositoryInterface::class,
            \App\Repositories\Seat\SeatRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\SeatStatus\SeatStatusRepositoryInterface::class,
            \App\Repositories\SeatStatus\SeatStatusRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Reservation\ReservationRepositoryInterface::class,
            \App\Repositories\Reservation\ReservationRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Rate\RateRepositoryInterface::class,
            \App\Repositories\Rate\RateRepository::class,
        );

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
