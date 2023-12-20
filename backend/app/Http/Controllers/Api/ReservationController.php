<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use App\Services\ReservationService;
use Symfony\Component\HttpFoundation\Response;


class ReservationController extends Controller
{
    private ReservationService $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /** Get all reservations that user has booked
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/reservations
     */
    public function getAllReservations(): Response
    {
        return $this->reservationService->getAll();
    }

    /** Get detail reservations that user has booked
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/reservations/{reservationId}
     */
    public function getDetailReservation(Request $request): Response
    {
        return $this->reservationService->getDetail($request->reservationId);
    }

    /** Create a new reservation
     * @param ReservationRequest $request
     * @return Response
     * @throws Exception
     * @api /api/reservations/new-reservation
     */
    public function createNewReservation(ReservationRequest $request): Response
    {
        return $this->reservationService->create($request->all());
    }
}
