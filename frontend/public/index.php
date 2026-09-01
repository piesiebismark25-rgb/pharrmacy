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

// Strip known local base paths (XAMPP dev environments)
// On production (ikclinic.page.gd) there is no subdirectory — path starts at /
$baseNames = [
    '/ik-holiness-clinic/frontend/public',
    '/ik-holiness-clinic/public',
    '/ik-holiness-clinic',
    '/frontend/public',
    '/public',
];
foreach ($baseNames as $b) {
    if (str_starts_with($requestPath, $b)) {
        $requestPath = substr($requestPath, strlen($b));
        break;
    }
}

$routingPath = '/' . ltrim($requestPath ?? '', '/');
if ($routingPath === '' || $routingPath === '//') {
    $routingPath = '/';
}

// 4. Initialize Router
$router = new Router();

// Public Multi-Page Routes
$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/services', 'HomeController@services');
$router->get('/about', 'HomeController@about');
$router->get('/request-care', 'HomeController@requestCare');
$router->get('/booking', 'HomeController@requestCare');
$router->get('/contact', 'HomeController@contact');
$router->post('/book-request', 'HomeController@bookRequest');
$router->post('/contact-submit', 'HomeController@contactSubmit');

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

// Appointments Scheduling Routes
$router->get('/appointments', 'AppointmentController@index');
$router->get('/appointments/create', 'AppointmentController@create');
$router->post('/appointments/store', 'AppointmentController@store');
$router->get('/appointments/edit', 'AppointmentController@edit');

// Medical Invoicing & Billing Routes
$router->get('/billing', 'BillingController@index');
$router->get('/billing/create', 'BillingController@create');
$router->post('/billing/store', 'BillingController@store');
$router->get('/billing/view', 'BillingController@view');

// Financial Payment Collections Routes
$router->get('/payments', 'PaymentController@index');
$router->get('/payments/create', 'PaymentController@create');
$router->post('/payments/store', 'PaymentController@store');
$router->get('/payments/receipt', 'PaymentController@receipt');

// Administrative Operational Reports
$router->get('/reports', 'ReportController@index');

// Staff Accounts Management Routes
$router->get('/users', 'UserController@index');
$router->get('/users/create', 'UserController@create');
$router->post('/users/store', 'UserController@store');
$router->get('/users/edit', 'UserController@edit');
$router->post('/users/update', 'UserController@update');
$router->get('/users/delete', 'UserController@delete');

// Clinic Settings Routes
$router->get('/settings', 'SettingController@index');
$router->post('/settings/update', 'SettingController@update');

// 5. Dispatch Request
$router->resolve($routingPath, $_SERVER['REQUEST_METHOD'] ?? 'GET');