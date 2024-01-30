<?php

namespace App\Services;

use App\Models\Seat;
use App\Repositories\Seat\SeatRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
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
     * Get list seats in showtime
     * @param int $theaterId
     * @return Response
     * @throws Exception
     */
    public function getList(int $showtimeId): Response
    {
        $seats = $this->seatRepository->getList($showtimeId);
        
        if (!$seats) {
            return $this->apiResponseError('Seats not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $seats,
            Response::HTTP_OK
        );
    }
}