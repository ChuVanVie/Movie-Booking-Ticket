<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    /** Get detail cinema
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/showtimes/
     */
    public function getShowtimes(Request $request): Response
    {
        return $this->showtimeService->getShowtimes($request->movieId, $request->cinemaId, $request->time);
    }
}
