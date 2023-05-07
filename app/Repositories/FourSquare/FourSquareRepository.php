<?php

namespace App\Repositories\FourSquare;

use App\Repositories\BaseRepository;

/**
 * Class FourSquareRepository
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.05.06
 * @version 1.0
 */
class FourSquareRepository extends BaseRepository
{
    /**
     * FourSquareRepository constructor
     */
    public function __construct()
    {
        $this->sUrl = (string)config('app.api.four_square.url');
    }

    /**
     * getNearbyPlaces
     * @param string $sParameter
     * @return array
     */
    public function getNearbyPlaces(string $sParameter) : array
    {
        return $this->getApiResponse([
            'headers'    => [
                'Accept' => 'application/json',
                'Authorization' => (string)config('app.api.four_square.api_key')
            ],
            'parameters' => [ 'll' => $sParameter ]
        ]);
    }
}
