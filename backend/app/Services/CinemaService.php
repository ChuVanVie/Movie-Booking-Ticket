<?php

namespace App\Services;

use App\Models\Cinema;
use App\Repositories\Cinema\CinemaRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CinemaService
{
    use ApiResponse;

    protected CinemaRepository $cinemaRepository;

    public function __construct(CinemaRepository $cinemaRepository)
    {
        $this->cinemaRepository = $cinemaRepository;
    }

    /**
     * Get all cinemas
     * @return Response
     * @throws Exception
     */
    public function getAll(): Response
    {
        $cinemas = $this->cinemaRepository->getAll();
        
        if (!$cinemas) {
            return $this->apiResponseError('Cinemas not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $cinemas,
            Response::HTTP_OK
        );
    }

    /**
     * Get data cinema
     * @param int $cinemaId
     * @return Response
     * @throws Exception
     */
    public function getDetail(int $cinemaId): Response
    {
        $cinema = $this->cinemaRepository->getDetail($cinemaId);
        
        if (!$cinema) {
            return $this->apiResponseError('Cinema not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $cinema,
            Response::HTTP_OK
        );
    }
}
