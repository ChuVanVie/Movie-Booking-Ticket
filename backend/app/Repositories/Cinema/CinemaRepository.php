<?php

namespace App\Repositories\Cinema;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CinemaRepository implements CinemaRepositoryInterface
{
    protected Cinema $cinema;

    public function __construct(Cinema $cinema)
    {
        $this->cinema = $cinema;
    }

    public function getAll(): Collection
    {
        return $this->cinema
                ->select('id', 'cinema_name', 'slug', 'address', 'phone')
                ->get();
    }

}