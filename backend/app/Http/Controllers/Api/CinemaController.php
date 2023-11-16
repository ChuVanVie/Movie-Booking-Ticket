<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CinemaService;
use Symfony\Component\HttpFoundation\Response;

class CinemaController extends Controller
{
    private CinemaService $cinemaService;

    public function __construct(CinemaService $cinemaService)
    {
        $this->cinemaService = $cinemaService;
    }

    /** Get all cinemas
     * @return Response
     * @throws Exception
     * @api /api/cinemas/
     */
    public function getAllCinemas(): Response
    {
        return $this->cinemaService->getAll();
    }
}
