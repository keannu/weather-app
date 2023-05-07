<?php

namespace App\Services\PlaceInformation;

use App\Repositories\OpenWeather\OpenWeatherRepository;
use App\Repositories\FourSquare\FourSquareRepository;
use Illuminate\Support\Arr;


/**
 * Class PlaceInformationService
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.05.06
 * @version 1.0
 */
class PlaceInformationService
{
    /**
     * @var OpenWeatherRepository $oOpenWeatherRepository
     */
    private $oOpenWeatherRepository;

    /**
     * @var FourSquareRepository $oFourSquareRepository
     */
    private $oFourSquareRepository;

    /**
     * PlaceInformationService constructor.
     * @param OpenWeatherRepository $oOpenWeatherRepository
     * @param FourSquareRepository $oFourSquareRepository
     */
    public function __construct(OpenWeatherRepository $oOpenWeatherRepository, FourSquareRepository $oFourSquareRepository)
    {
        $this->oOpenWeatherRepository = $oOpenWeatherRepository;
        $this->oFourSquareRepository =$oFourSquareRepository;
    }

    /**
     * getCityInformation
     * @param array $aParameter
     * @return array
     */
    public function getCityInformation(array $aParameter) : array
    {
        $aWeather = $this->getWeather(Arr::get($aParameter, 'city', ''));
        if (Arr::exists($aWeather, 'four_square_parameter') === false) {
            return $aWeather;
        }

        $aNearbyPlaces = $this->oFourSquareRepository->getNearbyPlaces($aWeather['four_square_parameter']);
        if (Arr::exists($aNearbyPlaces, 'data') === true) {
            return $aNearbyPlaces;
        }

        return [
            'code' => 200,
            'data' => [
                'weather'       => $aWeather['current_weather'],
                'nearby_places' => $this->formatNearbyPlacesData(Arr::get($aNearbyPlaces, 'results', []))
            ]
        ];
    }

    /**
     * getWeather
     * @param string $sCity
     * @return array
     */
    private function getWeather(string $sCity) : array
    {
        $aWeather = $this->oOpenWeatherRepository->getWeather($sCity);
        if (Arr::exists($aWeather, 'data') === true) {
            return $aWeather;
        }

        return [
            'four_square_parameter' => Arr::get($aWeather, 'coord.lat', '') . ',' . Arr::get($aWeather, 'coord.lon', ''),
            'current_weather'       => [
                'type'       => Arr::first(Arr::get($aWeather, 'weather', [
                    'main'        => '',
                    'description' => ''
                ])),
                'temp'       => Arr::get($aWeather, 'main.temp', 0) . '°C',
                'feels_like' => Arr::get($aWeather, 'main.feels_like', 0) . '°C',
                'humidity'   => Arr::get($aWeather, 'main.humidity', 0) . '%',
                'temp_min'   => Arr::get($aWeather, 'main.temp_min', 0) . '°C',
                'temp_max'   => Arr::get($aWeather, 'main.temp_max', 0) . '°C',
                'wind_speed' => Arr::get($aWeather, 'wind.speed', 0) . 'm/s',
                'wind_deg'   => Arr::get($aWeather, 'wind.deg', 0) . '°',
                'cloud'      => Arr::get($aWeather, 'clouds.all', 0) . '%',
                'rain'       => Arr::get($aWeather, 'rain.1h', 0) . 'mm',
                'snow'       => Arr::get($aWeather, 'snow.1h', 0) . 'mm'
            ]
        ];
    }

    /**
     * formatNearbyPlacesData
     * @param array $aNearbyPlaces
     * @return array
     */
    private function formatNearbyPlacesData(array $aNearbyPlaces) : array
    {
        $aFormattedNearbyPlaces = [];
        foreach ($aNearbyPlaces as $aNearbyPlace) {
            $aCategories = Arr::get($aNearbyPlace, 'categories', []);
            $aFormattedNearbyPlaces[] = [
                'name'     => Arr::get($aNearbyPlace, 'name', 'N/A'),
                'address'  => Arr::get($aNearbyPlace, 'location.formatted_address', 'N/A'),
                'locality' => Arr::get($aNearbyPlace, 'location.locality', 'N/A'),
                'category' => Arr::get(Arr::first($aCategories), 'name', 'N/A'),
                'distance' => Arr::get($aNearbyPlace, 'distance', 0) . 'm',
                'timezone' => Arr::get($aNearbyPlace, 'timezone', 'N/A')
            ];
        }

        return $aFormattedNearbyPlaces;
    }
}
