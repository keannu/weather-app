<?php

namespace App\Repositories\OpenWeather;

use App\Repositories\BaseRepository;

/**
 * Class OpenWeatherRepository
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.05.06
 * @version 1.0
 */
class OpenWeatherRepository extends BaseRepository
{
    /**
     * UNIT_OF_MEASURE
     * @const string
     */
    const UNIT_OF_MEASURE = 'metric';

    /**
     * OpenWeatherRepository constructor
     */
    public function __construct()
    {
        $this->sUrl = (string)config('app.api.open_weather.url');
    }

    /**
     * getWeather
     * @param string $sCity
     * @return array
     */
    public function getWeather(string $sCity) : array
    {
        return $this->getApiResponse([
            'headers'    => [],
            'parameters' => [
                'q'     => $sCity,
                'appid' => (string)config('app.api.open_weather.app_id'),
                'units' => self::UNIT_OF_MEASURE
            ]
        ]);
    }
}
