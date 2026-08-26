<?php
namespace App\Core;

/**
 * Basic Core Routing Engine
 *
 * Registers URL pathways for GET and POST HTTP verbs,
 * resolves incoming request routes, and executes Controller methods.
 */
class Router
{
    /**
     * Stores registered routes.
     * @var array
     */
    private array $routes = [];

    /**
     * Register a GET route.
     *
     * @param string $path
     * @param string $handler Format: 'ControllerClassName@methodName'
     * @return void
     */
    public function get(string $path, string $handler): void
    {
        $this->routes['GET'][$this->normalizePath($path)] = $handler;
    }

    /**
     * Register a POST route.
     *
     * @param string $path
     * @param string $handler Format: 'ControllerClassName@methodName'
     * @return void
     */
    public function post(string $path, string $handler): void
    {
        $this->routes['POST'][$this->normalizePath($path)] = $handler;
    }

    /**
     * Resolve the incoming HTTP request path and method.
     *
     * @param string $requestUri
     * @param string $requestMethod
     * @return void
     */
    public function resolve(string $requestUri, string $requestMethod): void
    {
        // Parse the URL path, removing query strings (e.g. /login?ref=dashboard -> /login)
        $path = parse_url($requestUri, PHP_URL_PATH);
        $normalizedPath = $this->normalizePath($path);
        $method = strtoupper($requestMethod);

        // Check if the route is registered for the given HTTP method
        if (!isset($this->routes[$method][$normalizedPath])) {
            $this->sendNotFound();
            return;
        }

        $handler = $this->routes[$method][$normalizedPath];
        $this->executeHandler($handler);
    }

    /**
     * Clean and normalize a path by trimming slashes.
     *
     * @param string $path
     * @return string
     */
    private function normalizePath(string $path): string
    {
        $trimmed = trim($path, '/');
        return $trimmed === '' ? '/' : '/' . $trimmed;
    }

    /**
     * Instantiate the target Controller and execute its method.
     *
     * @param string $handler Format: 'ControllerClassName@methodName'
     * @return void
     */
    private function executeHandler(string $handler): void
    {
        list($controllerClass, $method) = explode('@', $handler);

        // Fully qualify the controller namespace
        $fullControllerName = "App\\Controllers\\" . $controllerClass;

        if (!class_exists($fullControllerName)) {
            $this->sendError("Controller class '$fullControllerName' not found.");
            return;
        }

        $controllerInstance = new $fullControllerName();

        if (!method_exists($controllerInstance, $method)) {
            $this->sendError("Controller method '$method' not found in class '$fullControllerName'.");
            return;
        }

        // Call the controller method
        $controllerInstance->$method();
    }

    /**
     * Send HTTP 404 Not Found response.
     *
     * @return void
     */
    private function sendNotFound(): void
    {
        http_response_code(404);
        echo "404 Not Found: The requested URL does not exist on this server.\n";
        exit;
    }

    /**
     * Send HTTP 500 Internal Server Error response.
     *
     * @param string $message
     * @return void
     */
    private function sendError(string $message): void
    {
        http_response_code(500);
        echo "500 Internal Server Error: $message\n";
        exit;
    }
}
