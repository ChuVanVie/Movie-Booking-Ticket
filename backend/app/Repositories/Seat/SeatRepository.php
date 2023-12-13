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
     * @param int $theaterId|null
     * @return Collection|null
     */
    public function getListSeats(int $theaterId): Collection {
        return $this->seat 
                    ->where('theater_id', $theaterId)
                    ->orderBy('seat_number')
                    ->get()
                    ->groupBy(function ($seat) {
                        // Tách chữ cái và số từ seat_number
                        preg_match('/([a-zA-Z]+)(\d+)/', $seat->seat_number, $matches);
                        // Nếu tìm thấy chữ cái, trả về chữ cái, ngược lại trả về số
                        return isset($matches[1]) ? 'seat_' . $matches[1] : 'seat_' . $matches[2];
                    });
    }

}