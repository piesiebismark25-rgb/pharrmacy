<?php
/**
 * Application Configuration
 *
 * Centralized settings for database connection, security policies,
 * session constraints, and environment parameters.
 */

// --- 1. Database Configurations ---
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'ik_holiness_clinic');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// --- 2. Application Identity ---
define('APP_NAME', 'I.K HOLINESS CLINIC');
define('APP_URL', 'http://localhost/ik-holiness-clinic');
define('DEFAULT_CURRENCY', 'GH₵');

// --- 3. Session Security Configurations ---
define('SESSION_LIFETIME', 1800); // 30 Minutes
define('SESSION_SECURE', false);   // Set to true if using HTTPS in production
define('SESSION_HTTPONLY', true);  // Prevents JavaScript access to session cookie
define('SESSION_SAMESITE', 'Lax'); // Protects against CSRF attacks

// --- 4. Security Keys ---
define('AUTH_SECRET_KEY', 'ik_holiness_clinic_secret_seed_2026');

