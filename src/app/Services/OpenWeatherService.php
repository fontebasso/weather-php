<?php

namespace Fontebasso\Weather\Services;

use Fontebasso\Weather\Config;
use Fontebasso\Weather\Contracts\WeatherService;
use Fontebasso\Weather\Entities\Error;
use Fontebasso\Weather\Entities\Forecast;
use Fontebasso\Weather\Entities\Query;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class OpenWeatherService implements WeatherService
{
    private const API_VERSION = "2.5";

    public function search(Query $query): Forecast|Error
    {
        $data = $this->getData($query);
        if(array_key_exists('error', $data)) {
            return new Error(['message' => $data['message']]);
        }

        return new Forecast([
            'temperature' => $data['main']['temp'],
            'feelsLike' => $data['main']['feels_like'],
            'temperatureMin' => $data['main']['temp_min'],
            'temperatureMax' => $data['main']['temp_max'],
            'pressure' => $data['main']['pressure'],
            'humidity' => $data['main']['humidity'],
        ]);
    }

    private function getData(Query $query): array
    {
        $params = array_filter([
            'q' => implode(',', array_filter([$query->city, $query->state, $query->country], fn($item) => $item !== null)),
            'units' => $query->units,
            'appid' => Config::get('api_key')
       ], fn($item) => $item !== null);

        $client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/'. self::API_VERSION .'/weather'
        ]);
        try {
            $response = $client->request('GET', 'weather', [
                RequestOptions::QUERY => $params,
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
