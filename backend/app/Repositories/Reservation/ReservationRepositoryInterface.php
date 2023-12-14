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
    public function getAll(): ?Collection;

    /**
     * Get detail reservation that user has booked
     * @return Reservation|null
     */
    public function getDetail(int $reservationId): ?Reservation;

    /**
     * Create new reservation
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool;

}