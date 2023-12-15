<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RateService;
use Symfony\Component\HttpFoundation\Response;

class RateController extends Controller
{
    private RateService $rateService;

    public function __construct(RateService $rateService)
    {
        $this->rateService = $rateService;
    }

    /** Create a new rating for movie
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/rates/new-rating
     */
    public function createNewRate(Request $request): Response
    {
        return $this->rateService->create($request->all());
    }

}