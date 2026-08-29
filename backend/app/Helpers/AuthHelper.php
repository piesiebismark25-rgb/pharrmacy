<?php
namespace App\Helpers;

/**
 * Authentication and Session Management Helper
 */
class AuthHelper
{
    /**
     * Start session safely without recursion or headers warning.
     */
    public static function initSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            if (!headers_sent()) {
                session_set_cookie_params([
                    'lifetime' => defined('SESSION_LIFETIME') ? SESSION_LIFETIME : 1800,
                    'path' => '/',
                    'domain' => '',
                    'secure' => defined('SESSION_SECURE') ? SESSION_SECURE : false,
                    'httponly' => defined('SESSION_HTTPONLY') ? SESSION_HTTPONLY : true,
                    'samesite' => defined('SESSION_SAMESITE') ? SESSION_SAMESITE : 'Lax'
                ]);
            }
            @session_start();
        }
    }

    /**
     * Set session variables on successful login.
     */
    public static function login(int $userId, string $username, string $fullName, string $role): void
    {
        self::initSession();
        if (!headers_sent()) {
            @session_regenerate_id(true);
        }

        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['full_name'] = $fullName;
        $_SESSION['role'] = $role;
        $_SESSION['user_agent_hash'] = md5($_SERVER['HTTP_USER_AGENT'] ?? 'unknown');
        $_SESSION['last_activity'] = time();
    }

    /**
     * Destroy the session and cleanup.
     */
    public static function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }
        $_SESSION = [];
        if (ini_get("session.use_cookies") && !headers_sent()) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        if (session_status() === PHP_SESSION_ACTIVE) {
            @session_destroy();
        }
    }

    /**
     * Check if user is logged in.
     */
    public static function isLoggedIn(): bool
    {
        self::initSession();

        if (!isset($_SESSION['user_id'])) {
            return false;
        }

        // Check for session timeout
        $lifetime = defined('SESSION_LIFETIME') ? SESSION_LIFETIME : 1800;
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $lifetime)) {
            self::logout();
            return false;
        }

        $_SESSION['last_activity'] = time(); // Refresh activity timestamp
        return true;
    }

    /**
     * Enforce authentication for protected routes.
     */
    public static function requireLogin(): void
    {
        if (!self::isLoggedIn()) {
            header('Location: ' . APP_URL . '/login');
            exit;
        }
    }

    /**
     * Enforce a specific role or role group.
     */
    public static function requireRole(string $role): void
    {
        self::requireLogin();
        if (($_SESSION['role'] ?? '') !== $role) {
            http_response_code(403);
            echo "Access Denied: You do not have permission to access this page.";
            exit;
        }
    }

    /**
     * Check if the currently authenticated user has admin role.
     */
    public static function isAdmin(): bool
    {
        self::initSession();
        return (self::getRole() === 'admin');
    }

    /**
     * Get the logged-in user's role.
     */
    public static function getRole(): ?string
    {
        self::initSession();
        return $_SESSION['role'] ?? null;
    }

    /**
     * Get the logged-in user's ID.
     */
    public static function getUserId(): ?int
    {
        self::initSession();
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * Get the logged-in user's full name.
     */
    public static function getUserName(): ?string
    {
        self::initSession();
        return $_SESSION['full_name'] ?? null;
    }
}