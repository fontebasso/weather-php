<?php

namespace Fontebasso\Weather\Entities;

/**
 * @property string $units
 * @property string $city
 * @property ?string $state
 * @property ?string $country
 */
class Query extends AbstractEntity
{
    protected string $units = 'metric';

    protected string $city;

    protected ?string $state = null;

    protected ?string $country = null;
}
