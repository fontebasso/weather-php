<?php

namespace Fontebasso\Weather\Controllers;

use Fontebasso\Weather\Entities\Forecast;
use Fontebasso\Weather\Entities\Query;
use Fontebasso\Weather\Services\OpenWeatherService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WeatherController
{
    public function query(Request $request)
    {
        $service = new OpenWeatherService();

        $query = new Query([
            'city' => $request->query->get('city') || "",
            'state' => $request->query->get('state'),
            'country' => $request->query->get('country')
        ]);
        $search = $service->search($query);

        return new Response($search, $search instanceof Forecast ? 200 : 500, [
            'Content-Type' => 'application/json'
        ]);
    }
}
