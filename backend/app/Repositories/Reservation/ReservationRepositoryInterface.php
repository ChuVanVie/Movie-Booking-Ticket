<?php
namespace App\Repositories\Reservation;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReservationRepositoryInterface
{

    /**
     * Get all reservations that user has booked
     * @return Collection|null
     */
    public function getAll(int $userId): ?Collection;

    /**
     * Get detail reservation that user has booked
     * @return Reservation|null
     */
    public function getDetail(int $userId, int $reservationId): ?Reservation;

    /**
     * Create new reservation
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool;

    /**
     * Generate new ticket code for reservation
     * @param string $theaterName
     * @return string
     */
    public function generateTicketCode(string $theaterName): string;

    /**
     * Check if user has booked a reservation yet
     * @param int $userId
     * @param int $movieId
     * @return bool
     */
    public function check($userId, $movieId): bool;

}