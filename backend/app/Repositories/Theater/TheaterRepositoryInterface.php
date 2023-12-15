<?php
namespace App\Repositories\Theater;

use App\Models\Theater;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TheaterRepositoryInterface
{

    /**
     * Get theater name
     * @param int $showtimeId|null
     * @return String|null
     */
    public function getName(int $showtimeId): ?String;

}