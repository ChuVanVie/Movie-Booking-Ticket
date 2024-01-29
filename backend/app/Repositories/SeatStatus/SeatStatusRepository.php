<?php
namespace App\Repositories\SeatStatus;

use App\Models\SeatStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SeatStatusRepository implements SeatStatusRepositoryInterface
{   
    protected SeatStatus $seatStatus;

    public function __construct(SeatStatus $seatStatus){
        $this->seatStatus = $seatStatus;
    }

    /**
     * Update status of seat
     * @param int $showtimeId
     * @param int $seatId
     * @return bool
     */
    public function updateStatus(int $showtimeId, int $seatId): bool {
        return $this->seatStatus
                    ->where(['showtime_id'=> $showtimeId, 'seat_id'=> $seatId])
                    ->update(['status' => 2]);
    }

}