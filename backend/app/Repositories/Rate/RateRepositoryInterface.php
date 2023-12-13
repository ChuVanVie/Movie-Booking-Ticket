<?php
namespace App\Repositories\Rate;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface RateRepositoryInterface
{

    /**
     * Create new rating in 1 movie
     * @param int $movieId
     * @return bool
     */
    public function create(int $movieId, int $star, ?string $comment): bool;

}