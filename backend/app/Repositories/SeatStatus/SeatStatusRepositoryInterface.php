<?php
namespace App\Repositories\SeatStatus;

use App\Models\SeatStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface SeatStatusRepositoryInterface
{

    /**
     * Update status of seat
     * @param int $showtimeId
     * @param int $seatId
     * @return bool
     */
    public function updateStatus(int $showtimeId, int $seatId): bool;

}