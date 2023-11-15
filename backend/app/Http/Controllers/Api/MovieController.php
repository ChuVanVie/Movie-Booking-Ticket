<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MovieService;
use Symfony\Component\HttpFoundation\Response;


class MovieController extends Controller
{
    private MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /** Get all movies
     * @return Response
     * @throws Exception
     * @api /api/movies/
     */
    public function getAllMovies(): Response
    {
        return $this->movieService->getAll();
    }

    /** Get detail movie
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/movies/{movieId}
     */
    public function getDetailMovie(Request $request): Response
    {
        return $this->movieService->getDetail($request->movieId);
    }

    /** Get detail movie
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/movies/search
     */
    public function seachMovie(Request $request): Response
    {
        return $this->movieService->search($request->name, $request->country, $request->category);
    }
}
