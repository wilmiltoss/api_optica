<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$app = new \Slim\App;

require '../src/routes/rol.php';
require '../src/routes/categoria.php';
require '../src/routes/persona.php';

// Prueba Define app routes
/*$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
	$name = $args['name'];
	$response->getBody()->write("Hello, $name");
	return $response;
});*/

// Importante Define app routes 
$app->run();

