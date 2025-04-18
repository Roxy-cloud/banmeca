<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
<<<<<<< HEAD
$app = require_once __DIR__.'/../bootstrap/app.php'; 
$request = Request::capture(); // Captura la solicitud
$response = $app->handle($request); // Maneja la solicitud
$response->send(); // Envía la respuesta

$app->terminate($request, $response); 
=======
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
>>>>>>> e2a8b4e (Primer commit)
