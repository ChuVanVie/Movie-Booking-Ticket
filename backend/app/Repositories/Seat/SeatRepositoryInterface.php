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
    public function getList(int $theaterId): ?Collection;

    /**
     * Get array seatNumbers from seatIds
     * @param array $seatIds
     * @return array
     */
    public function getArraySeatNumbers(array $seatIds): array;

    /**
     * Update status of seat in theater
     * @param int $seatId
     * @param string $status
     * @return bool
     */
    public function updateStatus(int $seatId, string $status): bool;

}