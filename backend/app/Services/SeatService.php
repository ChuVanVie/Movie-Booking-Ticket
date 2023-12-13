<?php

namespace App\Services;

use App\Models\Seat;
use App\Repositories\Seat\SeatRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatService
{
    use ApiResponse;

    protected SeatRepository $seatRepository;

    public function __construct(SeatRepository $seatRepository)
    {
        $this->seatRepository = $seatRepository;
    }

    /**
     * Get list seats of theater
     * @param int $theaterId
     * @return Response
     * @throws Exception
     */
    public function getListSeats(int $theaterId): Response
    {
        $seats = $this->seatRepository->getListSeats($theaterId);
        
        if (!$seats) {
            return $this->apiResponseError('Seats not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $seats,
            Response::HTTP_OK
        );
    }
}