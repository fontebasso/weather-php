<?php

namespace Fontebasso\Weather;

class Config
{
    public static function get(string $key)
    {
        $config = include_once __DIR__ . '/../config/weather.php';
        return $config[getenv('WEATHER_DRIVER')][$key];
    }
}
