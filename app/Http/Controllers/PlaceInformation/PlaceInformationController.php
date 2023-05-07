<?php

namespace App\Http\Controllers\PlaceInformation;

use App\Services\PlaceInformation\PlaceInformationService;
use App\Http\Requests\PlaceInformation\GetPlaceInformationRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class PlaceInformationController
 * 
 * @author Keannu Rim Kristoffer C. Regala
 * @since 2023.05.06
 * @version 1.0
 */
class PlaceInformationController
{
    /**
     * @var PlaceInformationService
     */
    private $oPlaceInformationService;

    /**
     * PlaceInformationController constructor.
     * @param PlaceInformationService $oPlaceInformationService
     */
    public function __construct(PlaceInformationService $oPlaceInformationService)
    {
        $this->oPlaceInformationService = $oPlaceInformationService;
    }

    /**
     * getCityInformation
     * @param GetPlaceInformationRequest $oGetPlaceInformationRequest
     * @return JsonResponse
     */
    public function getCityInformation(GetPlaceInformationRequest $oGetPlaceInformationRequest)
    {
        $aResult = $this->oPlaceInformationService->getCityInformation($oGetPlaceInformationRequest->validated());
        return response()->json($aResult['data'], $aResult['code']);
    }
}
