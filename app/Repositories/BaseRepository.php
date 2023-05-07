<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Exception;

/**
 * Class BaseRepository
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.05.06
 * @version 1.0
 */
class BaseRepository
{
    /**
     * @var string $sUrl
     */
    protected $sUrl;

    /**
     * getApiResponse
     * @param array $aRequestParameters
     * @return array
     */
    protected function getApiResponse(array $aRequestParameters) : array
    {
        try {
            $oRequest = Http::timeout(30);
            $aHeaders = Arr::get($aRequestParameters, 'headers', []);
            if (empty($aHeaders) === false) {
                $oRequest->withHeaders($aHeaders);
            }

            $oResponse = $oRequest->get($this->sUrl, Arr::get($aRequestParameters, 'parameters', []));

            return (array)$oResponse->json();
        } catch (Exception $mException) {
            return [
                'code' => $mException->getCode(),
                'data' => [
                    'message' => $mException->getMessage()
                ]
            ];
        }
    }
}
