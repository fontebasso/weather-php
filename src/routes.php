<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('weather', new Route('/query', ['_controller' => 'WeatherController::query' ]));

return $routes;
