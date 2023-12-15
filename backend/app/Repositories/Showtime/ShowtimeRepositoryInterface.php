<?php

namespace App\Repositories\Showtime;

use App\Models\Showtime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ShowtimeRepositoryInterface
{

    /**
     * Get all showtimes of movie
     * @param int $movieId|null
     * @param int $cinemaId|null
     * @param string $time
     * @return Collection|null
     */
    public function getShowtimes(?int $movieId, ?int $cinemaId, string $time): ?Collection;

}