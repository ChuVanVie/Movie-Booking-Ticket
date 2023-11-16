<?php

namespace App\Repositories\Cinema;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CinemaRepositoryInterface
{
    /**
     * Get all movies
     * @return Collection
     */
    public function getAll(): Collection;

}