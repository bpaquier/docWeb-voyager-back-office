<?php


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Routes\getAllUsersInfos;
use Routes\getUserById;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$routeCollector = $app->getRouteCollector();
$routeCollector->setDefaultInvocationStrategy(new RequestResponseArgs());

$app->setBasePath('/docWeb-voyager-back-end');

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello world!");
    return $response;
})->setName('Home');

$app->group('/query', function (RouteCollectorProxy $group){

    $group->get('/allUsers', function(Request $request, Response $response) {
        $SqlConnexion = new getAllUsersInfos();
        $SqlConnexion->dbConnection();
        $SqlConnexion->setSqlRequest();
        $data = $SqlConnexion->returnResponse();
        $response->getBody()->write($data);
        return $response;
    });

    $group->get('/user/{id:[0-9]+}', function(Request $request, Response $response, $id) {
        $user = new getUserById($id);
        $user->dbConnection();
        $user->setSqlRequest();
        $data = $user->returnResponse();
        $response->getBody()->write($data);
        return $response;
    });
});

$app->run();
