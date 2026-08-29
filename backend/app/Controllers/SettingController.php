<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class SettingController
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
            $stmt = $db->query("SELECT * FROM settings WHERE id = 1");
            $settings = $stmt->fetch();

            if (!$settings) {
                // Seed default settings row if missing
                $db->exec("
                    INSERT INTO settings (id, clinic_name, clinic_address, phone_number, email, currency) 
                    VALUES (1, 'I.K HOLINESS HOME CARE SERVICES', 'Pankrono, Kumasi, Ghana', '0241974447 / 0550974126', 'kisaiahh@icloud.com', 'GH₵')
                    ON DUPLICATE KEY UPDATE id = 1
                ");
                $stmt = $db->query("SELECT * FROM settings WHERE id = 1");
                $settings = $stmt->fetch();
            }
        } catch (\PDOException $e) {
            $settings = [
                'clinic_name' => 'I.K HOLINESS HOME CARE SERVICES',
                'clinic_address' => 'Pankrono, Kumasi, Ghana',
                'phone_number' => '0241974447 / 0550974126',
                'email' => 'kisaiahh@icloud.com',
                'currency' => 'GH₵'
            ];
        }

        $pageTitle = "Clinic Settings - " . APP_NAME;
        $pageHeading = "Clinic Configuration & Practice Settings";
        $pageSubheading = "Customize practice profile, medical letterhead, contact channels, and system defaults.";
        $currentRoute = 'settings';

        ob_start();
        require_once VIEWS_PATH . '/settings/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function update(): void
    {
        AuthHelper::requireLogin();
        if (!AuthHelper::isAdmin() || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/settings');
            exit;
        }

        $clinic_name = trim($_POST['clinic_name'] ?? 'I.K HOLINESS HOME CARE SERVICES');
        $clinic_address = trim($_POST['clinic_address'] ?? 'Pankrono, Kumasi, Ghana');
        $phone_number = trim($_POST['phone_number'] ?? '0241974447 / 0550974126');
        $email = trim($_POST['email'] ?? 'kisaiahh@icloud.com');
        $currency = trim($_POST['currency'] ?? 'GH₵');

        if (empty($clinic_name) || empty($phone_number)) {
            $_SESSION['error_message'] = "Clinic name and contact telephone cannot be empty.";
            header('Location: ' . APP_URL . '/settings');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("
                INSERT INTO settings (id, clinic_name, clinic_address, phone_number, email, currency)
                VALUES (1, :name, :addr, :phone, :email, :curr)
                ON DUPLICATE KEY UPDATE 
                    clinic_name = :name,
                    clinic_address = :addr,
                    phone_number = :phone,
                    email = :email,
                    currency = :curr
            ");
            $stmt->execute([
                ':name' => $clinic_name,
                ':addr' => $clinic_address,
                ':phone' => $phone_number,
                ':email' => $email,
                ':curr' => $currency
            ]);

            $_SESSION['success_message'] = "Clinic configuration updated successfully!";
        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Failed to update settings: " . $e->getMessage();
        }

        header('Location: ' . APP_URL . '/settings');
        exit;
    }
}
