<?php
/**
 * Front Controller & Routing Entry Point
 */

// 1. Load configurations and autoloader
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/autoload.php';

use App\Core\Router;
use App\Helpers\AuthHelper;

// 2. Initialize secure session management
AuthHelper::initSession();

// 3. Normalize Request URI to support subdirectories (like /ik-holiness-clinic/public/)
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME']; // e.g. /public/index.php or /ik-holiness-clinic/public/index.php
$baseDir = dirname($scriptName); // e.g. /public or /ik-holiness-clinic/public
$baseDir = str_replace('\\', '/', $baseDir);

// Extract the path from the Request URI
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Strip base directory from request path to get the routing path relative to application root
if ($baseDir !== '/' && strpos($requestPath, $baseDir) === 0) {
    $routingPath = substr($requestPath, strlen($baseDir));
} else {
    $routingPath = $requestPath;
}

// Ensure routing path starts with a slash
$routingPath = '/' . ltrim($routingPath, '/');

// 4. Initialize Router
$router = new Router();

// Define Auth routes
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

// Root path redirect
$router->get('/', 'AuthController@showLogin');

// Define Dashboard route
$router->get('/dashboard', 'DashboardController@index');

// Define Client routes
$router->get('/clients', 'ClientController@index');
$router->get('/clients/create', 'ClientController@create');
$router->post('/clients/store', 'ClientController@store');
$router->get('/clients/edit', 'ClientController@edit');
$router->post('/clients/update', 'ClientController@update');
$router->get('/clients/delete', 'ClientController@delete');

// 5. Resolve the Route
$router->resolve($routingPath, $_SERVER['REQUEST_METHOD']);

