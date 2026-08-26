<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

/**
 * Controller handling user login and logout workflows.
 */
class AuthController
{
    /**
     * Display the login page.
     */
    public function showLogin(): void
    {
        AuthHelper::initSession();

        // If user is already logged in, redirect to the dashboard
        if (AuthHelper::isLoggedIn()) {
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }

        // Include the login view
        require_once __DIR__ . '/../../views/auth/login.php';
    }

    /**
     * Process authentication credentials.
     */
    public function login(): void
    {
        AuthHelper::initSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/login');
            exit;
        }

        // Clean inputs
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $errors = [];

        if (empty($username)) {
            $errors[] = 'Username is required.';
        }
        if (empty($password)) {
            $errors[] = 'Password is required.';
        }

        if (empty($errors)) {
            try {
                // Get connection instance
                $db = Database::getInstance()->getConnection();

                // Retrieve user record
                $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password_hash'])) {
                    // Set secure session variables
                    AuthHelper::login($user['id'], $user['username'], $user['full_name'], $user['role']);
                    
                    // Redirect to dashboard
                    header('Location: ' . APP_URL . '/dashboard');
                    exit;
                } else {
                    $errors[] = 'Invalid username or password.';
                }
            } catch (\PDOException $e) {
                error_log("Database Authentication Error: " . $e->getMessage());
                $errors[] = 'An error occurred during authentication. Please try again.';
            }
        }

        // If errors exist, pass them back to the view
        $old_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        require_once __DIR__ . '/../../views/auth/login.php';
    }

    /**
     * Log the user out of the session.
     */
    public function logout(): void
    {
        AuthHelper::logout();
        header('Location: ' . APP_URL . '/login');
        exit;
    }
}
