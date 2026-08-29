<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class UserController
{
    public function index(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin()) {
            $_SESSION['error_message'] = "Access denied. Administrator privileges required.";
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query("SELECT id, username, full_name, role, created_at FROM users ORDER BY id ASC");
            $users = $stmt->fetchAll();

            $totalUsers = count($users);
            $totalAdmins = count(array_filter($users, fn($u) => $u['role'] === 'admin'));
            $totalStaff = count(array_filter($users, fn($u) => $u['role'] === 'staff'));
        } catch (\PDOException $e) {
            $users = [];
            $totalUsers = $totalAdmins = $totalStaff = 0;
            $_SESSION['error_message'] = "Could not fetch staff accounts.";
        }

        $pageTitle = "Staff Management - " . APP_NAME;
        $pageHeading = "Staff Accounts & Access Management";
        $pageSubheading = "Manage clinical officers, nurses, and administrative user credentials.";
        $currentRoute = 'users';

        ob_start();
        require_once VIEWS_PATH . '/users/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function create(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin()) {
            $_SESSION['error_message'] = "Access denied.";
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }

        $pageTitle = "New Staff Account - " . APP_NAME;
        $pageHeading = "Create Staff Account";
        $pageSubheading = "Register a new medical practitioner or system administrator.";
        $currentRoute = 'users';

        ob_start();
        require_once VIEWS_PATH . '/users/create.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function store(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin() || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/users');
            exit;
        }

        $full_name = trim($_POST['full_name'] ?? '');
        $username = strtolower(trim($_POST['username'] ?? ''));
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'staff';

        if (empty($full_name) || empty($username) || empty($password)) {
            $_SESSION['error_message'] = "All fields (Full Name, Username, and Password) are required.";
            header('Location: ' . APP_URL . '/users/create');
            exit;
        }

        if (!in_array($role, ['admin', 'staff'])) {
            $role = 'staff';
        }

        try {
            $db = Database::getInstance()->getConnection();

            // Check if username exists
            $check = $db->prepare("SELECT id FROM users WHERE username = :u");
            $check->execute([':u' => $username]);
            if ($check->fetch()) {
                $_SESSION['error_message'] = "The username '$username' is already taken.";
                header('Location: ' . APP_URL . '/users/create');
                exit;
            }

            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $db->prepare("
                INSERT INTO users (full_name, username, password_hash, role)
                VALUES (:name, :user, :hash, :role)
            ");
            $stmt->execute([
                ':name' => $full_name,
                ':user' => $username,
                ':hash' => $password_hash,
                ':role' => $role
            ]);

            $_SESSION['success_message'] = "Staff account for $full_name created successfully!";
            header('Location: ' . APP_URL . '/users');
            exit;

        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Database error creating user account.";
            header('Location: ' . APP_URL . '/users/create');
            exit;
        }
    }

    public function edit(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin()) {
            $_SESSION['error_message'] = "Access denied.";
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            header('Location: ' . APP_URL . '/users');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT id, username, full_name, role FROM users WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $user = $stmt->fetch();

            if (!$user) {
                $_SESSION['error_message'] = "Staff account not found.";
                header('Location: ' . APP_URL . '/users');
                exit;
            }
        } catch (\PDOException $e) {
            header('Location: ' . APP_URL . '/users');
            exit;
        }

        $pageTitle = "Edit Staff Account - " . APP_NAME;
        $pageHeading = "Edit Staff Profile";
        $pageSubheading = "Update account credentials and role for " . htmlspecialchars($user['full_name']);
        $currentRoute = 'users';

        ob_start();
        require_once VIEWS_PATH . '/users/edit.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function update(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin() || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/users');
            exit;
        }

        $id = (int)($_POST['id'] ?? 0);
        $full_name = trim($_POST['full_name'] ?? '');
        $username = strtolower(trim($_POST['username'] ?? ''));
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'staff';

        if ($id <= 0 || empty($full_name) || empty($username)) {
            $_SESSION['error_message'] = "Full name and username cannot be blank.";
            header('Location: ' . APP_URL . '/users/edit?id=' . $id);
            exit;
        }

        if (!in_array($role, ['admin', 'staff'])) {
            $role = 'staff';
        }

        try {
            $db = Database::getInstance()->getConnection();

            // Check if username is taken by another user
            $check = $db->prepare("SELECT id FROM users WHERE username = :u AND id != :id");
            $check->execute([':u' => $username, ':id' => $id]);
            if ($check->fetch()) {
                $_SESSION['error_message'] = "The username '$username' is already taken by another account.";
                header('Location: ' . APP_URL . '/users/edit?id=' . $id);
                exit;
            }

            if (!empty($password)) {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $db->prepare("
                    UPDATE users 
                    SET full_name = :name, username = :user, password_hash = :hash, role = :role 
                    WHERE id = :id
                ");
                $stmt->execute([
                    ':name' => $full_name,
                    ':user' => $username,
                    ':hash' => $password_hash,
                    ':role' => $role,
                    ':id' => $id
                ]);
            } else {
                $stmt = $db->prepare("
                    UPDATE users 
                    SET full_name = :name, username = :user, role = :role 
                    WHERE id = :id
                ");
                $stmt->execute([
                    ':name' => $full_name,
                    ':user' => $username,
                    ':role' => $role,
                    ':id' => $id
                ]);
            }

            // Update session if editing self
            if ($id === AuthHelper::getUserId()) {
                $_SESSION['user']['full_name'] = $full_name;
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['role'] = $role;
            }

            $_SESSION['success_message'] = "Staff account $full_name updated successfully!";
            header('Location: ' . APP_URL . '/users');
            exit;

        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Database error updating staff account.";
            header('Location: ' . APP_URL . '/users/edit?id=' . $id);
            exit;
        }
    }

    public function delete(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin()) {
            $_SESSION['error_message'] = "Access denied.";
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            header('Location: ' . APP_URL . '/users');
            exit;
        }

        if ($id === AuthHelper::getUserId()) {
            $_SESSION['error_message'] = "Security protection: You cannot delete your own active administrator account.";
            header('Location: ' . APP_URL . '/users');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute([':id' => $id]);

            $_SESSION['success_message'] = "Staff account deleted successfully.";
        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Could not delete staff account. It may be linked to active clinical visits or billing records.";
        }

        header('Location: ' . APP_URL . '/users');
        exit;
    }
}
