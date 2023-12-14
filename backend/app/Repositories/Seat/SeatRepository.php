<?php
namespace App\Repositories\Seat;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SeatRepository implements SeatRepositoryInterface
{   
    protected Seat $seat;

    public function __construct(Seat $seat){
        $this->seat = $seat;
    }

    /**
     * Get list seats of theater
     * @param int $theaterId
     * @return Collection|null
     */
    public function getList(int $theaterId): Collection {
        return $this->seat 
                    ->where('theater_id', $theaterId)
                    ->select(['id', 'seat_number', 'status', 'price'])
                    ->orderBy('seat_number')
                    ->get()
                    ->groupBy(function ($seat) {
                        // Separate letters and numbers from seat_number
                        preg_match('/([a-zA-Z]+)(\d+)/', $seat->seat_number, $matches);
                        // If a letter is found, return the letter, otherwise return the number
                        return isset($matches[1]) ? 'seat_' . $matches[1] : 'seat_' . $matches[2];
                    });
    }

    /**
     * Get array seatNumbers from seatIds
     * @param array $seatIds
     * @return array
     */
    public function getArraySeatNumbers(array $seatIds): array {
        $seats = $this->seat
                      ->whereIn('id', $seatIds)
                      ->get();

        $seatNumbers = $seats->pluck('seat_number')->toArray();

        return $seatNumbers;
    }

    /**
     * Update status of seat in theater
     * @param int $seatId
     * @param string $status
     * @return bool
     */
    public function updateStatus(int $seatId, string $status): bool {
        return $this->seat
                    ->where('id', $seatId)
                    ->update(['status' => $status]);
    }

}