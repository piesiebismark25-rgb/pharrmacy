<?php
namespace App\Helpers;

/**
 * Authentication and Session Management Helper
 */
class AuthHelper
{
    /**
     * Start a secure session with standard security policies.
     */
    public static function initSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            // Set cookie parameters based on security configurations
            session_set_cookie_params([
                'lifetime' => defined('SESSION_LIFETIME') ? SESSION_LIFETIME : 1800,
                'path' => '/',
                'domain' => '',
                'secure' => defined('SESSION_SECURE') ? SESSION_SECURE : false,
                'httponly' => defined('SESSION_HTTPONLY') ? SESSION_HTTPONLY : true,
                'samesite' => defined('SESSION_SAMESITE') ? SESSION_SAMESITE : 'Lax'
            ]);
            
            session_start();
        }

        // Session validation (anti-session hijacking check)
        if (self::isLoggedIn()) {
            if (!isset($_SESSION['user_agent_hash'])) {
                $_SESSION['user_agent_hash'] = md5($_SERVER['HTTP_USER_AGENT']);
            } elseif ($_SESSION['user_agent_hash'] !== md5($_SERVER['HTTP_USER_AGENT'])) {
                self::logout();
            }
        }
    }

    /**
     * Set session variables on successful login.
     */
    public static function login(int $userId, string $username, string $fullName, string $role): void
    {
        self::initSession();
        // Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);

        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['full_name'] = $fullName;
        $_SESSION['role'] = $role;
        $_SESSION['user_agent_hash'] = md5($_SERVER['HTTP_USER_AGENT']);
        $_SESSION['last_activity'] = time();
    }

    /**
     * Destroy the session and redirect to login.
     */
    public static function logout(): void
    {
        self::initSession();
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
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
        session_destroy();
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
     * Redirects to access denied/forbidden if roles don't match.
     */
    public static function requireRole(string $role): void
    {
        self::requireLogin();
        if ($_SESSION['role'] !== $role) {
            http_response_code(403);
            echo "Access Denied: You do not have permission to access this page.";
            exit;
        }
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
