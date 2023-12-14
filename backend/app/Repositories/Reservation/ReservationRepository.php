<?php
namespace App\Repositories\Reservation;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ReservationRepository implements ReservationRepositoryInterface
{
    protected Reservation $reservation;

    public function __construct(Reservation $reservation){
        $this->reservation = $reservation;
    }

    /**
     * Get all reservations that user has booked
     * @return Collection|null
     */
    public function getAll(): ?Collection {
        $user = auth()->user();
        return $this->reservation
                    ->where('user_id', $user->id)
                    ->select(['id', 'ticket_code', 'total_price', 'created_at'])
                    ->get();
    }

    /**
     * Get detail reservation that user has booked
     * @return Reservation|null
     */
    public function getDetail(int $reservationId): ?Reservation {
        $user = auth()->user();
        return $this->reservation
                    ->where(['id' => $reservationId, 'user_id' => $user->id])
                    ->select(['id', 'showtime_id', 'seat_ids', 'ticket_code', 'total_price'])
                    ->with([
                        //Get showtime info
                        'showtime' => function($query) {
                            $query->select(['id','movie_id', 'cinema_id', 'theater_id', 'start_time', 'end_time'])
                                  ->with([
                                    //Get movie info
                                    'movie' => function($query) {
                                        $query->select(['id', 'movie_name', 'slug']);
                                    },
                                    //Get cinema info
                                    'cinema' => function($query) {
                                        $query->select(['id', 'cinema_name', 'address']);
                                    },
                                    //Get theater info
                                    'theater' => function($query) {
                                        $query->select(['id', 'theater_name']);
                                    },
                                  ]);
                        }
                    ])
                    ->first();
    }

    /**
     * Create new reservation
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool {
        
    }

}