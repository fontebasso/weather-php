<?php

use Fontebasso\Weather\Entities\Query;
use Fontebasso\Weather\Services\OpenWeatherService;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require_once(__DIR__ . '/../vendor/autoload.php');

(new Dotenv())->usePutenv()->bootEnv(dirname(__DIR__).'/.env');

/*$service = new OpenWeatherService();
$query = $service->search(new Query(['city' => 'São Paulo', 'state' => 'SP', 'country' => 'BR']));
print_r($query);*/

$request = Request::createFromGlobals();

$routes = include __DIR__ . '/../routes.php';


$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    /** @var string $_controller */
    $controllerParts = explode('::', $_controller);
    $controller = "\\Fontebasso\\Weather\\Controllers\\" . $controllerParts[0];
    $action = $controllerParts[1];
    $response = (new $controller())->$action($request);
} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();
