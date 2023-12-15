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
    public function getAll(int $userId): ?Collection {
        return $this->reservation
                    ->where('user_id', $userId)
                    ->select(['id', 'ticket_code', 'total_price', 'created_at'])
                    ->get();
    }

    /**
     * Get detail reservation that user has booked
     * @return Reservation|null
     */
    public function getDetail(int $userId, int $reservationId): ?Reservation {
        return $this->reservation
                    ->where(['id' => $reservationId, 'user_id' => $userId])
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
        if (empty($data['user_id']) || empty($data['showtime_id']) || empty($data['seat_ids'])) {
            return false;
        }

        $data['seat_ids'] = json_encode($data['seat_ids']);
        
        $newReservation = $this->reservation->create($data);

        return true;
    }

    /**
     * Generate new ticket code for reservation
     * @param string $theaterName
     * @return string
     */
    public function generateTicketCode(string $theaterName): string {
        $latestReservation = $this->reservation->where('ticket_code', 'like', $theaterName . '%')
                                  ->orderBy('ticket_code', 'desc')
                                  ->first();
        $ticketCode = $latestReservation->ticket_code;

        $numberTicket = substr($ticketCode, 6);
        $numberTicket = intval($numberTicket) + 1;
        $newTicketCode = $theaterName . '-' . $numberTicket;

        return $newTicketCode;
    }

    /**
     * Check if user has booked a reservation yet
     * @param int $userId
     * @param int $movieId
     * @return bool
     */
    public function check($userId, $movieId): bool {
        // $reservation = $this->reservation
        //                     ->where('user_id', $userId)
        //                     ->where(function ($query) use ($movieId) {
        //                         $query->whereHas('showtime', function ($query) use ($movieId) {
        //                             $query->whereHas('movie', function ($query) use ($movieId) {
        //                                 $query->where('id', $movieId);
        //                             });
        //                         });
        //                     })
        //                     ->first();
        // return $reservation ? true : false;

        return $this->reservation
                    ->where('user_id', $userId)
                    ->whereHas('showtime.movie', fn ($query) => $query->where('id', $movieId))
                    ->exists();
    }

}