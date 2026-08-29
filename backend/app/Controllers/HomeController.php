<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class HomeController
{
    public function index(): void
    {
        AuthHelper::initSession();
        require_once VIEWS_PATH . '/public/index.php';
    }

    public function bookRequest(): void
    {
        AuthHelper::initSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/');
            exit;
        }

        $full_name = trim($_POST['full_name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $service = trim($_POST['service'] ?? 'General Consultation');
        $address = trim($_POST['address'] ?? '');
        $preferred_date = $_POST['preferred_date'] ?? date('Y-m-d');
        $preferred_time = $_POST['preferred_time'] ?? '09:00';
        $notes = trim($_POST['notes'] ?? '');

        if (!empty($full_name) && !empty($phone)) {
            try {
                $db = Database::getInstance()->getConnection();
                $db->beginTransaction();

                // 1. Check if patient exists or create quick registration
                $stmt = $db->prepare("SELECT client_id FROM clients WHERE phone = :phone LIMIT 1");
                $stmt->execute([':phone' => $phone]);
                $clientId = $stmt->fetchColumn();

                if (!$clientId) {
                    $stmt = $db->query("SELECT client_id FROM clients ORDER BY client_id DESC LIMIT 1 FOR UPDATE");
                    $lastId = $stmt->fetchColumn();
                    $num = $lastId ? (int)substr($lastId, 3) + 1 : 1;
                    $clientId = 'CL-' . str_pad($num, 6, '0', STR_PAD_LEFT);

                    $insClient = $db->prepare("
                        INSERT INTO clients (client_id, full_name, gender, dob, age, phone, address, emergency_name, emergency_phone, registration_date)
                        VALUES (:client_id, :full_name, 'Other', '1980-01-01', 40, :phone, :address, :emergency_name, :emergency_phone, CURDATE())
                    ");
                    $insClient->execute([
                        ':client_id' => $clientId,
                        ':full_name' => $full_name,
                        ':phone' => $phone,
                        ':address' => !empty($address) ? $address : 'Home Care Request',
                        ':emergency_name' => $full_name,
                        ':emergency_phone' => $phone
                    ]);
                }

                // 2. Book appointment
                $reason = "Public Web Booking: " . $service . (!empty($notes) ? " (Note: $notes)" : "");
                $insAppt = $db->prepare("
                    INSERT INTO appointments (client_id, appointment_date, appointment_time, reason, status)
                    VALUES (:client_id, :appointment_date, :appointment_time, :reason, 'Scheduled')
                ");
                $insAppt->execute([
                    ':client_id' => $clientId,
                    ':appointment_date' => $preferred_date,
                    ':appointment_time' => $preferred_time,
                    ':reason' => $reason
                ]);

                $db->commit();
                $_SESSION['booking_success'] = "Thank you $full_name! Your care request has been received. Our clinical team will call you shortly on $phone.";
            } catch (\Exception $e) {
                if (isset($db) && $db->inTransaction()) $db->rollBack();
                error_log("Public Booking Error: " . $e->getMessage());
                $_SESSION['booking_error'] = "Could not submit booking. Please call us directly at 0241974447.";
            }
        } else {
            $_SESSION['booking_error'] = "Please provide your full name and phone number.";
        }

        header('Location: ' . APP_URL . '/#booking');
        exit;
    }
}