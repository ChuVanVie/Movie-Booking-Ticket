<?php

namespace App\Services;

use App\Models\Showtime;
use App\Repositories\Showtime\ShowtimeRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowtimeService
{
    use ApiResponse;

    protected ShowtimeRepository $showtimeRepository;

    public function __construct(ShowtimeRepository $showtimeRepository)
    {
        $this->showtimeRepository = $showtimeRepository;
    }

    /**
     * Get showtimes
     * @param int $movieId
     * @param int $cinemaId
     * @param string $time
     * @return Response
     * @throws Exception
     */
    public function getShowtimes(?int $movieId, ?int $cinemaId, string $time): Response
    {
        $showtimes = $this->showtimeRepository->getShowtimes($movieId, $cinemaId, $time);
        
        if (!$showtimes) {
            return $this->apiResponseError('Showtimes not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $showtimes,
            Response::HTTP_OK
        );
    }

    /**
     * Get detail showtime
     * @param int $showtimeId
     * @return Response
     * @throws Exception
     */
    public function getDetail(int $showtimeId): Response
    {
        $showtime = $this->showtimeRepository->getDetail($showtimeId);
        
        if (!$showtime) {
            return $this->apiResponseError('Showtime not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $showtime,
            Response::HTTP_OK
        );
    }
}