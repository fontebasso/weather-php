<?php

namespace Fontebasso\Weather\Contracts;

use Fontebasso\Weather\Entities\Error;
use Fontebasso\Weather\Entities\Forecast;
use Fontebasso\Weather\Entities\Query;

interface WeatherService
{
    public function search(Query $query): Forecast|Error;
}
