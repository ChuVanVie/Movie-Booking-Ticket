<?php

namespace App\Services;

use App\Models\Movie;
use App\Repositories\Movie\MovieRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MovieService
{
    use ApiResponse;

    protected MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /** Get all movies
     * @return Response
     * @throws Exception
     */
    public function getAll(): Response
    {
        $movies = $this->movieRepository->getAll();
        
        if (!$movies) {
            return $this->apiResponseError('Movies not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $movies,
            Response::HTTP_OK
        );
    }

    /** Get detail movie
     * @param int $movieId
     * @return Response
     * @throws Exception
     */
    public function getDetail(int $movieId): Response
    {
        $movie = $this->movieRepository->getDetail($movieId);
        
        if (!$movie) {
            return $this->apiResponseError('Movie not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $movie,
            Response::HTTP_OK
        );
    }

    /** Search movie by name, country, category
     * @param string $name|null
     * @param string $country|null
     * @param string $category|null
     * @return Response
     * @throws Exception
     */
    public function search(?string $name, ?string $country, ?string $category): Response
    {
        $movies = $this->movieRepository->search($name, $country, $category);
        
        if (!$movies) {
            return $this->apiResponseError('Movies not found', Response::HTTP_NOT_FOUND);
        }

        return $this->apiResponse(
            $movies,
            Response::HTTP_OK
        );
    }
}
