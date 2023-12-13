<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SeatService;
use Symfony\Component\HttpFoundation\Response;

class SeatController extends Controller
{
    private SeatService $seatService;

    public function __construct(SeatService $seatService)
    {
        $this->seatService = $seatService;
    }

    /** Get list seats
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/seats/
     */
    public function getListSeats(Request $request): Response
    {
        return $this->seatService->getListSeats($request->theaterId);
    }
}
