<?php

namespace Fontebasso\Weather\Entities;

/**
 * @property string $units
 * @property float $temperature
 * @property float $feelsLike
 * @property float $temperatureMin
 * @property float $temperatureMax
 * @property float $pressure
 * @property float $humidity
 */
class Forecast extends AbstractEntity
{
    protected string $units = 'metric';

    protected float $temperature;
    protected float $feelsLike;
    protected float $temperatureMin;
    protected float $temperatureMax;
    protected float $pressure;
    protected float $humidity;
}
