<?php
/**
 * Application Configuration - I.K HOLINESS HOME CARE SERVICES
 * Decoupled Backend & Frontend Architecture with .env Support
 */

// 1. Path Definitions
define('ROOT_PATH', dirname(__DIR__, 2));
define('BACKEND_PATH', ROOT_PATH . '/backend');
define('FRONTEND_PATH', ROOT_PATH . '/frontend');
define('VIEWS_PATH', FRONTEND_PATH . '/views');
define('PUBLIC_PATH', FRONTEND_PATH . '/public');

// 2. Load Environment Variables from .env file
$envPath = ROOT_PATH . '/.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }
        if (str_contains($line, '=')) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            // Strip matching wrapping quotes
            if ((str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
                $value = substr($value, 1, -1);
            }
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv("{$name}={$value}");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

// Helper function to fetch env with fallback
if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed {
        $val = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        if ($val === false || $val === null) {
            return $default;
        }
        return match (strtolower((string)$val)) {
            'true', '(true)' => true,
            'false', '(false)' => false,
            'empty', '(empty)' => '',
            'null', '(null)' => null,
            default => $val,
        };
    }
}

// 3. Database Configurations
define('DB_HOST', env('DB_HOST', '127.0.0.1'));
define('DB_PORT', env('DB_PORT', '3306'));
define('DB_NAME', env('DB_NAME', 'ik_holiness_clinic'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', ''));
define('DB_CHARSET', env('DB_CHARSET', 'utf8mb4'));

// 4. Application Identity & Branding
define('APP_NAME', env('APP_NAME', 'I.K HOLINESS HOME CARE SERVICES'));
define('APP_SLOGAN', env('APP_SLOGAN', 'YOUR HEALTH IS OUR LIFE'));
define('APP_URL', rtrim(env('APP_URL', 'http://localhost/ik-holiness-clinic'), '/'));
define('CLINIC_PHONE', env('CLINIC_PHONE', '0241974447 / 0550974126'));
define('CLINIC_EMAIL', env('CLINIC_EMAIL', 'kisaiahh@icloud.com'));
define('CLINIC_LOCATION', env('CLINIC_LOCATION', 'Pankrono, Kumasi, Ghana'));
define('DEFAULT_CURRENCY', env('DEFAULT_CURRENCY', 'GH₵'));

// 5. Session Security Configurations
define('SESSION_LIFETIME', (int)env('SESSION_LIFETIME', 7200)); // 2 Hours
define('SESSION_SECURE', (bool)env('SESSION_SECURE', false));
define('SESSION_HTTPONLY', (bool)env('SESSION_HTTPONLY', true));
define('SESSION_SAMESITE', env('SESSION_SAMESITE', 'Lax'));

// 6. Security Keys
define('AUTH_SECRET_KEY', env('AUTH_SECRET_KEY', 'ik_holiness_clinic_secret_key_2026'));