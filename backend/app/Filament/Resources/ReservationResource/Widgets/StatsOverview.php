<?php

namespace App\Filament\Resources\ReservationResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\Reservation;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.showtime-resource.widgets.stats-overview';
    protected function getCards(): array
    {
        $totalTickets = Reservation::all()->count();

        $ticketsThisMonth = Reservation::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $ticketsPreviousMonth = Reservation::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->count();
        $percentageChange = round(($ticketsThisMonth - $ticketsPreviousMonth) / ($ticketsPreviousMonth ?: 1) * 100);

        $mostBookedMovie = Reservation::select('movies.id', 'movies.movie_name', DB::raw('COUNT(reservations.id) as reservation_count'))
            ->join('showtimes', 'reservations.showtime_id', '=', 'showtimes.id')
            ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
            ->groupBy('movies.id', 'movies.movie_name')
            ->orderByDesc('reservation_count')
            ->first();

        return [
            Card::make('All Reservations', $totalTickets),
            Card::make('Tickets booked this month', $ticketsThisMonth)
                ->description( $percentageChange > 0 ? ($percentageChange . '% increase') : (-$percentageChange . '% decrease'))
                ->descriptionIcon($percentageChange > 0 ? 'heroicon-s-trending-up' : 'heroicon-s-trending-down')
                ->color($percentageChange > 0 ? 'success' : 'danger'),
            Card::make('Most booked movies:', $mostBookedMovie->movie_name ?? 'No data')
                ->description('Reservations booked: ' . $mostBookedMovie->reservation_count ?? 0)
                ->color('warning'),
        ];
    }
}
