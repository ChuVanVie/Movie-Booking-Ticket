<?php
namespace App\Repositories\Rate;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface RateRepositoryInterface
{

    /**
     * Create new rating for movie
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool;

    /**
     * Find rate whom user was evaluated
     * @param int $userId
     * @param int $movieId
     * @return Rate||null
     */
    public function find(int $userId, int $movieId): ?Rate;

}