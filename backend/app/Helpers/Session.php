<?php
namespace App\Helpers;

/**
 * Security-Hardened Session Helper Class
 *
 * Implements security directives for session instantiation,
 * session regeneration, hijacking checks, and secure variables storage.
 */
class Session
{
    /**
     * Start a secure session with custom configuration policies.
     *
     * @return void
     */
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            // Configure PHP session cookie parameters for security
            session_set_cookie_params([
                'lifetime' => SESSION_LIFETIME,
                'path'     => '/',
                'domain'   => '',
                'secure'   => SESSION_SECURE,   // true if HTTPS
                'httponly' => SESSION_HTTPONLY, // Prevents JS injection access
                'samesite' => SESSION_SAMESITE  // Mitigates CSRF
            ]);

            session_start();
        }

        // Validate session fingerprint to prevent Session Hijacking
        self::validateSessionFingerprint();
    }

    /**
     * Set a session variable.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a session variable.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Check if a session key exists.
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Delete a specific key from the session.
     *
     * @param string $key
     * @return void
     */
    public static function remove(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Regenerate the session ID to defend against Session Fixation.
     *
     * Call this instantly upon any status change (like User Log In).
     *
     * @return void
     */
    public static function regenerate(): void
    {
        // Regenerates session ID and deletes the old session file on the server
        session_regenerate_id(true);
        
        // Re-establish fingerprint with the new session ID
        self::establishFingerprint();
    }

    /**
     * Completely destroy the session (Logout).
     *
     * @return void
     */
    public static function destroy(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            
            // Delete the session cookie from the browser
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
    }

    /**
     * Write user footprint details to session.
     *
     * @return void
     */
    public static function establishFingerprint(): void
    {
        $_SESSION['fingerprint_user_agent'] = $_SERVER['HTTP_USER_AGENT'] ?? '';
        // Extract the subnet range (first three octets) to avoid session termination on dynamic mobile IPs
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $ip_segments = explode('.', $ip);
        $_SESSION['fingerprint_ip'] = (count($ip_segments) >= 3) 
            ? "$ip_segments[0].$ip_segments[1].$ip_segments[2]" 
            : $ip;
    }

    /**
     * Check if client browser footprint matches the session fingerprint.
     * If mismatch, destroys session immediately.
     *
     * @return void
     */
    private static function validateSessionFingerprint(): void
    {
        // If fingerprint is not established yet (e.g. fresh visitor), establish it
        if (!self::has('fingerprint_user_agent')) {
            self::establishFingerprint();
            return;
        }

        $current_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $current_ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $ip_segments = explode('.', $current_ip);
        $current_ip_segment = (count($ip_segments) >= 3) 
            ? "$ip_segments[0].$ip_segments[1].$ip_segments[2]" 
            : $current_ip;

        if (
            self::get('fingerprint_user_agent') !== $current_agent ||
            self::get('fingerprint_ip') !== $current_ip_segment
        ) {
            // Fingerprint mismatch! Securely force logout.
            self::destroy();
            header('Location: /');
            exit("Security Violation: Invalid Session Fingerprint.\n");
        }
    }
}
