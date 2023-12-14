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
     * Get list seats of theater
     * @param int $theaterId
     * @return Response
     * @throws Exception
     */
    public function getList(int $theaterId): Response
    {
        $seats = $this->seatRepository->getList($theaterId);
        
        if (!$seats) {
            return $this->apiResponseError('Seats not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $seats,
            Response::HTTP_OK
        );
    }

    /**
     * Update status of seat
     * @param int $seatId
     * @param string $status
     * @return Response
     * @throws Exception
     */
    public function updateStatus(int $seatId, string $status): Response
    {
        try {
            $this->seatRepository->updateStatus($seatId, $status);
        } catch (Exception $e) {
            return $this->apiResponseError(
                'Update status seat failed!', 
                Response::HTTP_INTERNAL_SERVER_ERROR,
            );
        }

        return $this->apiResponse(
            'Update status seat successful!',
            Response::HTTP_OK
        );
    }
}