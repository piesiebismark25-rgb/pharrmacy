<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class AuthController
{
    public function showLogin(): void
    {
        AuthHelper::initSession();
        if (AuthHelper::isLoggedIn()) {
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }
        require_once VIEWS_PATH . '/auth/login.php';
    }

    public function login(): void
    {
        AuthHelper::initSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/login');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $errors = [];

        if (empty($username)) $errors[] = 'Username is required.';
        if (empty($password)) $errors[] = 'Password key is required.';

        if (empty($errors)) {
            try {
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password_hash'])) {
                    AuthHelper::login($user['id'], $user['username'], $user['full_name'], $user['role']);
                    header('Location: ' . APP_URL . '/dashboard');
                    exit;
                } else {
                    $errors[] = 'Invalid credentials. Please verify username and password.';
                }
            } catch (\PDOException $e) {
                error_log("Database Auth Error: " . $e->getMessage());
                $errors[] = 'Database connection error. Please try again.';
            }
        }

        $old_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        require_once VIEWS_PATH . '/auth/login.php';
    }

    public function logout(): void
    {
        AuthHelper::logout();
        header('Location: ' . APP_URL . '/login');
        exit;
    }
}