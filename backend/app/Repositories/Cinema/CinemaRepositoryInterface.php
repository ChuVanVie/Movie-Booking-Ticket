<?php

namespace App\Repositories\Cinema;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CinemaRepositoryInterface
{   
    /**
     * Get all cinemas
     * @return Colection
     */
    public function getAll(): Collection;

    /**
     * Get data cinema
     * @param int $cinemaId
     * @return Cinema|null
     */
    public function getDetail(int $cinemaId): ?Cinema;

}