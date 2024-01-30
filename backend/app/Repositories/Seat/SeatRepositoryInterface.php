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
     * Calculate total price of seat_numbers
     * @param array $seatIds
     * @return int
     */
    public function calculateTotalPrice(array $seatIds): int;

}