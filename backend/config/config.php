<?php
/**
 * Application Configuration - I.K HOLINESS HOME CARE SERVICES
 * Decoupled Backend & Frontend Architecture
 */

// 1. Path Definitions
define('ROOT_PATH', dirname(__DIR__, 2));
define('BACKEND_PATH', ROOT_PATH . '/backend');
define('FRONTEND_PATH', ROOT_PATH . '/frontend');
define('VIEWS_PATH', FRONTEND_PATH . '/views');
define('PUBLIC_PATH', FRONTEND_PATH . '/public');

// 2. Database Configurations
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'ik_holiness_clinic');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// 3. Application Identity & Branding
define('APP_NAME', 'I.K HOLINESS HOME CARE SERVICES');
define('APP_SLOGAN', 'YOUR HEALTH IS OUR LIFE');
define('APP_URL', 'http://localhost/ik-holiness-clinic');
define('CLINIC_PHONE', '0241974447 / 0550974126');
define('CLINIC_EMAIL', 'kisaiahh@icloud.com');
define('CLINIC_LOCATION', 'Pankrono, Kumasi, Ghana');
define('DEFAULT_CURRENCY', 'GHâ‚µ');

// 4. Session Security Configurations
define('SESSION_LIFETIME', 7200); // 2 Hours
define('SESSION_SECURE', false);
define('SESSION_HTTPONLY', true);
define('SESSION_SAMESITE', 'Lax');

// 5. Security Keys
define('AUTH_SECRET_KEY', 'ik_holiness_clinic_secret_key_2026');