<?php

namespace App\Services;

use App\Models\Reservation;
use App\Repositories\Reservation\ReservationRepository;
use App\Repositories\Seat\SeatRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ReservationService
{
    use ApiResponse;

    protected SeatRepository $seatRepository;
    protected ReservationRepository $reservationRepository;

    public function __construct(SeatRepository $seatRepository, ReservationRepository $reservationRepository)
    {
        $this->seatRepository = $seatRepository;
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * Get all reservations that user has booked
     * @return Response
     * @throws Exception
     */
    public function getAll(): Response
    {
        $reservations = $this->reservationRepository->getAll();
        
        if (!$reservations) {
            return $this->apiResponseError('Reservations not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $reservations,
            Response::HTTP_OK
        );
    }

    /**
     * Get all reservations that user has booked
     * @param int $reservationId
     * @return Response
     * @throws Exception
     */
    public function getDetail(int $reservationId): Response
    {
        $reservation = $this->reservationRepository->getDetail($reservationId);

        //Hanlde array seatIds to seatNumbers
        $seatIds = json_decode($reservation->seat_ids);
        $seatNumbers = $this->seatRepository->getArraySeatNumbers($seatIds);

        // Remove seat_ids and add seat_numbers to $reservation
        unset($reservation->seat_ids);
        
        if (!$reservation) {
            return $this->apiResponseError('Reservation not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $reservation,
            Response::HTTP_OK
        );
    }

    /**
     * Create new reservation
     * @param array $data
     * @return Response
     * @throws Exception
     */
    public function create(array $data): Response
    {
        DB::beginTransaction();
        try {
            $this->reservationRepository->create($data);

            DB::commit();
            return $this->apiResponse(
                'Create new reservation successful!',
                Response::HTTP_CREATED
            );

        } catch (Exception $e) {
            DB::rollBack();
            return $this->apiResponseError(
                $e->getMessage(), 
                Response::HTTP_INTERNAL_SERVER_ERROR,
            );
        }

        
    }
}