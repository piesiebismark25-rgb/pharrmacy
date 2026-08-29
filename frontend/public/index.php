<?php
/**
 * Front Controller & Routing Entry Point
 * I.K HOLINESS HOME CARE SERVICES
 */

// 1. Load configurations and autoloader from backend
require_once __DIR__ . '/../../backend/config/config.php';
require_once __DIR__ . '/../../backend/app/autoload.php';

use App\Core\Router;
use App\Helpers\AuthHelper;

// 2. Initialize secure session management
AuthHelper::initSession();

// 3. Normalize Request URI
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = parse_url($requestUri, PHP_URL_PATH);

$baseNames = ['/ik-holiness-clinic/frontend/public', '/ik-holiness-clinic/public', '/ik-holiness-clinic'];
foreach ($baseNames as $b) {
    if (strpos($requestPath, $b) === 0) {
        $requestPath = substr($requestPath, strlen($b));
        break;
    }
}

$routingPath = '/' . ltrim($requestPath, '/');
if (empty($routingPath)) {
    $routingPath = '/';
}

// 4. Initialize Router
$router = new Router();

// Public Homepage & Inquiries
$router->get('/', 'HomeController@index');
$router->post('/book-request', 'HomeController@bookRequest');

// Authentication Routes
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

// Doctor Dashboard Route
$router->get('/dashboard', 'DashboardController@index');

// Patient / Client Routes
$router->get('/clients', 'ClientController@index');
$router->get('/clients/create', 'ClientController@create');
$router->post('/clients/store', 'ClientController@store');
$router->get('/clients/view', 'ClientController@view');
$router->get('/clients/edit', 'ClientController@edit');
$router->post('/clients/update', 'ClientController@update');
$router->get('/clients/delete', 'ClientController@delete');

// Clinical Visits & Encounters Routes
$router->get('/visits', 'VisitController@index');
$router->get('/visits/create', 'VisitController@create');
$router->post('/visits/store', 'VisitController@store');
$router->get('/visits/view', 'VisitController@view');

// Appointments Routes
$router->get('/appointments', 'AppointmentController@index');
$router->get('/appointments/create', 'AppointmentController@create');
$router->post('/appointments/store', 'AppointmentController@store');
$router->get('/appointments/edit', 'AppointmentController@edit');
$router->post('/appointments/update', 'AppointmentController@update');
$router->get('/appointments/delete', 'AppointmentController@delete');

// Billing & Invoices Routes
$router->get('/billing', 'BillingController@index');
$router->get('/billing/create', 'BillingController@create');
$router->post('/billing/store', 'BillingController@store');
$router->get('/billing/view', 'BillingController@view');

// Payments & Receipts Routes
$router->get('/payments', 'PaymentController@index');
$router->get('/payments/create', 'PaymentController@create');
$router->post('/payments/store', 'PaymentController@store');
$router->get('/payments/receipt', 'PaymentController@receipt');

// Printable Reports
$router->get('/reports', 'ReportController@index');

// 5. Resolve Route
$router->resolve($routingPath, $_SERVER['REQUEST_METHOD']);