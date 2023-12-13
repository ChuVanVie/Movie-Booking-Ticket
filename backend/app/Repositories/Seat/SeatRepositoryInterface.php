<?php
namespace App\Repositories\Seat;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface SeatRepositoryInterface
{

    /**
     * Get list seats of theater
     * @param int $theaterId|null
     * @return Collection|null
     */
    public function getListSeats(int $theaterId): ?Collection;

    /**
     * Update status of seat in theater
     * @param int $seatId
     * @return bool
     */
    public function updateStatus(int $seatId): bool;

}