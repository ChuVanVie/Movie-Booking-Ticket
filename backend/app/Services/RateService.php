<?php

namespace App\Services;

use App\Repositories\Rate\RateRepository;
use App\Repositories\Reservation\ReservationRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RateService
{
    use ApiResponse;

    protected RateRepository $rateRepository;
    protected ReservationRepository $reservationRepository;

    public function __construct(RateRepository $rateRepository, ReservationRepository $reservationRepository)
    {
        $this->rateRepository = $rateRepository;
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * Create a new rating for movie
     * @param array $data
     * @return Response
     * @throws Exception
     */
    public function create(array $data): Response
    {
        $user = auth()->user();

        DB::beginTransaction();
        try {
            $movieId = $data['movie_id'];
            if (!$this->reservationRepository->check($user->id, $movieId)){
                return $this->apiResponseError(
                    "Need to buy tickets in advance to rate",
                    Response::HTTP_BAD_REQUEST,
                );
            }

            if ($this->rateRepository->find($user->id, $movieId)){
                return $this->apiResponseError(
                    "Have rated this movie before",
                    Response::HTTP_BAD_REQUEST,
                );
            }

            $data['user_id'] = $user->id;
            $this->rateRepository->create($data);

            DB::commit();
            return $this->apiResponse(
                'Create new rate successful!',
                Response::HTTP_CREATED
            );

        } catch (Exception $e) {
            DB::rollBack();
            return $this->apiResponseError(
                $e->getMessage(), 
                Response::HTTP_INTERNAL_SERVER_ERROR,
            );
        }
    }
}