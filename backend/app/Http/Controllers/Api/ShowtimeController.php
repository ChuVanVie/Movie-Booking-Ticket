<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowtimeRequest;
use Illuminate\Http\Request;
use App\Services\ShowtimeService;
use Symfony\Component\HttpFoundation\Response;

class ShowtimeController extends Controller
{
    private ShowtimeService $showtimeService;

    public function __construct(ShowtimeService $showtimeService)
    {
        $this->showtimeService = $showtimeService;
    }

    /** Get all showtime
     * @param ShowtimeRequest $request
     * @return Response
     * @throws Exception
     * @api /api/showtimes/
     */
    public function getShowtimes(ShowtimeRequest $request): Response
    {
        return $this->showtimeService->getShowtimes($request->movieId, $request->cinemaId, $request->time);
    }

    /** Get detail showtime
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/showtimes/{showtimeId}
     */
    public function getDetailShowtime(Request $request): Response
    {
        return $this->showtimeService->getDetail($request->showtimeId);
    }
}
