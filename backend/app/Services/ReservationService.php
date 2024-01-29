<?php

namespace App\Services;

use App\Models\Reservation;
use App\Repositories\Reservation\ReservationRepository;
use App\Repositories\Theater\TheaterRepository;
use App\Repositories\Seat\SeatRepository;
use App\Repositories\SeatStatus\SeatStatusRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ReservationService
{
    use ApiResponse;

    protected TheaterRepository $theaterRepository;
    protected SeatRepository $seatRepository;
    protected SeatStatusRepository $seatStatusRepository;
    protected ReservationRepository $reservationRepository;

    public function __construct(TheaterRepository $theaterRepository, SeatRepository $seatRepository, SeatStatusRepository $seatStatusRepository, ReservationRepository $reservationRepository)
    {
        $this->theaterRepository = $theaterRepository;
        $this->seatRepository = $seatRepository;
        $this->seatStatusRepository = $seatStatusRepository;
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * Get all reservations that user has booked
     * @return Response
     * @throws Exception
     */
    public function getAll(): Response
    {
        $user = auth()->user();
        $reservations = $this->reservationRepository->getAll($user->id);
        
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
        $user = auth()->user();
        $reservation = $this->reservationRepository->getDetail($user->id, $reservationId);

        if (!$reservation) {
            return $this->apiResponseError('Reservation not found', Response::HTTP_NOT_FOUND);
        }

        //Hanlde array seatIds to seatNumbers
        $seatIds = json_decode($reservation->seat_ids);
        $seatNumbers = $this->seatRepository->getArraySeatNumbers($seatIds);

        $reservationData = [
            'id' => $reservationId,
            'ticket_code' => $reservation->ticket_code,
            'showtime' => [
                'id' => $reservation->showtime->id,
                'start_time' => $reservation->showtime->start_time,
                'end_time' => $reservation->showtime->end_time
            ],
            'movie' => $reservation->showtime->movie,
            'cinema' => $reservation->showtime->cinema,
            'theater' => $reservation->showtime->theater,
            'seat_numbers' => $seatNumbers,
            'total_price' => $reservation->total_price,
        ];

        return $this->apiResponse(
            $reservationData,
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
        $user = auth()->user();

        DB::beginTransaction();
        try {

            $data['user_id'] = $user->id;

            //Generate new ticket code for reservation
            $showtimeId = $data['showtime_id'];
            $theaterName = $this->theaterRepository->getName($showtimeId);
            $ticketCode = $this->reservationRepository->generateTicketCode($theaterName);
            $data['ticket_code'] = $ticketCode;
            
            //Calculate total price of seat_numbers
            $seatIds = $data['seat_ids'];
            $totalPrice = $this->seatRepository->calculateTotalPrice($seatIds);
            $data['total_price'] = $totalPrice;

            $this->reservationRepository->create($data);

            //Update status seat 'Available' to 'Reserved'
            foreach ($seatIds as $seatId) {
                $this->seatStatusRepository->updateStatus($showtimeId, $seatId);
            }

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