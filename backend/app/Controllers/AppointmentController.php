<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class AppointmentController
{
    public function index(): void
    {
        AuthHelper::requireLogin();
        $appointments = [];

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query("
                SELECT a.*, c.full_name, c.phone 
                FROM appointments a 
                INNER JOIN clients c ON a.client_id = c.client_id 
                ORDER BY a.appointment_date ASC, a.appointment_time ASC
            ");
            $appointments = $stmt->fetchAll();
        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Could not fetch appointments.";
        }

        $pageTitle = "Appointments Schedule - " . APP_NAME;
        $pageHeading = "Appointments & Home Visits Schedule";
        $pageSubheading = "Manage scheduled medical consultations and follow-up home care.";
        $currentRoute = 'appointments';

        ob_start();
        require_once VIEWS_PATH . '/appointments/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function create(): void
    {
        AuthHelper::requireLogin();
        $client_id = $_GET['client_id'] ?? '';

        try {
            $db = Database::getInstance()->getConnection();
            $allClients = $db->query("SELECT client_id, full_name FROM clients ORDER BY full_name ASC")->fetchAll();
        } catch (\PDOException $e) {
            $allClients = [];
        }

        $pageTitle = "Schedule Appointment - " . APP_NAME;
        $pageHeading = "Schedule Appointment / Home Visit";
        $pageSubheading = "Set date, time, and clinical reason for consultation.";
        $currentRoute = 'appointments';

        ob_start();
        require_once VIEWS_PATH . '/appointments/create.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function store(): void
    {
        AuthHelper::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/appointments');
            exit;
        }

        $client_id = $_POST['client_id'] ?? '';
        $appointment_date = $_POST['appointment_date'] ?? '';
        $appointment_time = $_POST['appointment_time'] ?? '';
        $reason = trim($_POST['reason'] ?? '');

        if (!empty($client_id) && !empty($appointment_date) && !empty($appointment_time) && !empty($reason)) {
            try {
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("
                    INSERT INTO appointments (client_id, appointment_date, appointment_time, reason, status)
                    VALUES (:client_id, :appointment_date, :appointment_time, :reason, 'Scheduled')
                ");
                $stmt->execute([
                    ':client_id' => $client_id,
                    ':appointment_date' => $appointment_date,
                    ':appointment_time' => $appointment_time,
                    ':reason' => $reason
                ]);

                $_SESSION['success_message'] = "Appointment scheduled successfully!";
                header('Location: ' . APP_URL . '/appointments');
                exit;
            } catch (\PDOException $e) {
                $_SESSION['error_message'] = "Database error scheduling appointment.";
            }
        }
        header('Location: ' . APP_URL . '/appointments/create');
        exit;
    }

    public function edit(): void
    {
        AuthHelper::requireLogin();
        $id = $_GET['id'] ?? '';
        $status = $_GET['status'] ?? 'Completed';
        if (!empty($id)) {
            try {
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("UPDATE appointments SET status = :status WHERE id = :id");
                $stmt->execute([':status' => $status, ':id' => $id]);
                $_SESSION['success_message'] = "Appointment status updated to $status.";
            } catch (\PDOException $e) {}
        }
        header('Location: ' . APP_URL . '/appointments');
        exit;
    }
}