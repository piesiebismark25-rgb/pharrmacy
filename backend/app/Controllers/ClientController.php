<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class ClientController
{
    public function index(): void
    {
        AuthHelper::requireLogin();
        $search = trim($_GET['search'] ?? '');
        $clients = [];

        try {
            $db = Database::getInstance()->getConnection();
            if ($search !== '') {
                $stmt = $db->prepare("
                    SELECT * FROM clients 
                    WHERE client_id LIKE :search 
                       OR full_name LIKE :search 
                       OR phone LIKE :search 
                    ORDER BY client_id DESC
                ");
                $stmt->execute([':search' => "%$search%"]);
            } else {
                $stmt = $db->query("SELECT * FROM clients ORDER BY client_id DESC");
            }
            $clients = $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Client Fetch Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Could not fetch patient records.";
        }

        $pageTitle = "Patient Directory - " . APP_NAME;
        $pageHeading = "Patient Management Directory";
        $pageSubheading = "Search, enroll, and view clinical histories of registered patients.";
        $currentRoute = 'clients';

        ob_start();
        require_once VIEWS_PATH . '/clients/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function create(): void
    {
        AuthHelper::requireLogin();
        $pageTitle = "Register Patient - " . APP_NAME;
        $pageHeading = "New Patient Registration";
        $pageSubheading = "Enroll a new patient into the home care management system.";
        $currentRoute = 'clients';

        ob_start();
        require_once VIEWS_PATH . '/clients/create.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function store(): void
    {
        AuthHelper::requireLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $full_name = trim($_POST['full_name'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $emergency_name = trim($_POST['emergency_name'] ?? '');
        $emergency_phone = trim($_POST['emergency_phone'] ?? '');
        $registration_date = $_POST['registration_date'] ?? date('Y-m-d');

        $errors = [];
        if (empty($full_name)) $errors[] = "Full Name is required.";
        if (empty($gender)) $errors[] = "Gender is required.";
        if (empty($dob)) $errors[] = "Date of Birth is required.";
        if (empty($phone)) $errors[] = "Phone Number is required.";
        if (empty($address)) $errors[] = "Residential Address is required.";
        if (empty($emergency_name)) $errors[] = "Emergency Contact Name is required.";
        if (empty($emergency_phone)) $errors[] = "Emergency Contact Phone is required.";

        $age = 0;
        if (!empty($dob)) {
            try {
                $dobDate = new \DateTime($dob);
                $today = new \DateTime();
                $age = $today->diff($dobDate)->y;
            } catch (\Exception $e) {
                $errors[] = "Invalid Date of Birth format.";
            }
        }

        if (empty($errors)) {
            try {
                $db = Database::getInstance()->getConnection();
                $db->beginTransaction();

                $stmt = $db->query("SELECT client_id FROM clients ORDER BY client_id DESC LIMIT 1 FOR UPDATE");
                $lastId = $stmt->fetchColumn();
                $num = $lastId ? (int)substr($lastId, 3) + 1 : 1;
                $client_id = 'CL-' . str_pad($num, 6, '0', STR_PAD_LEFT);

                $insert = $db->prepare("
                    INSERT INTO clients (client_id, full_name, gender, dob, age, phone, address, emergency_name, emergency_phone, registration_date)
                    VALUES (:client_id, :full_name, :gender, :dob, :age, :phone, :address, :emergency_name, :emergency_phone, :registration_date)
                ");
                $insert->execute([
                    ':client_id' => $client_id,
                    ':full_name' => $full_name,
                    ':gender' => $gender,
                    ':dob' => $dob,
                    ':age' => $age,
                    ':phone' => $phone,
                    ':address' => $address,
                    ':emergency_name' => $emergency_name,
                    ':emergency_phone' => $emergency_phone,
                    ':registration_date' => $registration_date
                ]);

                $db->commit();
                $_SESSION['success_message'] = "Patient registered successfully! Patient ID: $client_id";
                header('Location: ' . APP_URL . '/clients/view?id=' . urlencode($client_id));
                exit;

            } catch (\PDOException $e) {
                if (isset($db) && $db->inTransaction()) $db->rollBack();
                error_log("Client Insert Error: " . $e->getMessage());
                $errors[] = "Database error registering patient: " . $e->getMessage();
            }
        }

        $pageTitle = "Register Patient - " . APP_NAME;
        $pageHeading = "New Patient Registration";
        $pageSubheading = "Please correct issues to complete enrollment.";
        $currentRoute = 'clients';

        ob_start();
        require_once VIEWS_PATH . '/clients/create.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function view(): void
    {
        AuthHelper::requireLogin();
        $client_id = $_GET['id'] ?? '';
        if (empty($client_id)) {
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            
            $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = :id");
            $stmt->execute([':id' => $client_id]);
            $client = $stmt->fetch();

            if (!$client) {
                $_SESSION['error_message'] = "Patient record not found.";
                header('Location: ' . APP_URL . '/clients');
                exit;
            }

            // Visits
            $stmt = $db->prepare("
                SELECT v.*, u.full_name AS staff_name 
                FROM visits v 
                INNER JOIN users u ON v.attending_staff_id = u.id 
                WHERE v.client_id = :client_id 
                ORDER BY v.visit_date DESC
            ");
            $stmt->execute([':client_id' => $client_id]);
            $visits = $stmt->fetchAll();

            // Invoices
            $stmt = $db->prepare("SELECT * FROM invoices WHERE client_id = :client_id ORDER BY invoice_date DESC");
            $stmt->execute([':client_id' => $client_id]);
            $invoices = $stmt->fetchAll();

            // Appointments
            $stmt = $db->prepare("SELECT * FROM appointments WHERE client_id = :client_id ORDER BY appointment_date DESC");
            $stmt->execute([':client_id' => $client_id]);
            $appointments = $stmt->fetchAll();

        } catch (\PDOException $e) {
            error_log("Patient View Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Could not load patient profile.";
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $pageTitle = "Patient Dossier: " . htmlspecialchars($client['full_name']) . " - " . APP_NAME;
        $pageHeading = "Patient Medical Dossier";
        $pageSubheading = "Complete clinical history, care visits, and invoices for " . htmlspecialchars($client['client_id']);
        $currentRoute = 'clients';

        ob_start();
        require_once VIEWS_PATH . '/clients/view.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function edit(): void
    {
        AuthHelper::requireLogin();
        $client_id = $_GET['id'] ?? '';
        if (empty($client_id)) {
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = :id");
            $stmt->execute([':id' => $client_id]);
            $client = $stmt->fetch();

            if (!$client) {
                $_SESSION['error_message'] = "Patient record not found.";
                header('Location: ' . APP_URL . '/clients');
                exit;
            }
        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Error loading patient record.";
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $pageTitle = "Edit Patient - " . APP_NAME;
        $pageHeading = "Edit Patient Details";
        $pageSubheading = "Update personal and contact info for " . htmlspecialchars($client['full_name']);
        $currentRoute = 'clients';

        ob_start();
        require_once VIEWS_PATH . '/clients/edit.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function update(): void
    {
        AuthHelper::requireLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $client_id = $_POST['client_id'] ?? '';
        $full_name = trim($_POST['full_name'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $emergency_name = trim($_POST['emergency_name'] ?? '');
        $emergency_phone = trim($_POST['emergency_phone'] ?? '');

        $errors = [];
        if (empty($client_id) || empty($full_name) || empty($gender) || empty($dob) || empty($phone)) {
            $errors[] = "All required fields must be completed.";
        }

        $age = 0;
        if (!empty($dob)) {
            try {
                $dobDate = new \DateTime($dob);
                $today = new \DateTime();
                $age = $today->diff($dobDate)->y;
            } catch (\Exception $e) {
                $errors[] = "Invalid Date of Birth format.";
            }
        }

        if (empty($errors)) {
            try {
                $db = Database::getInstance()->getConnection();
                $update = $db->prepare("
                    UPDATE clients 
                    SET full_name = :full_name, gender = :gender, dob = :dob, age = :age, 
                        phone = :phone, address = :address, emergency_name = :emergency_name, 
                        emergency_phone = :emergency_phone
                    WHERE client_id = :client_id
                ");
                $update->execute([
                    ':full_name' => $full_name,
                    ':gender' => $gender,
                    ':dob' => $dob,
                    ':age' => $age,
                    ':phone' => $phone,
                    ':address' => $address,
                    ':emergency_name' => $emergency_name,
                    ':emergency_phone' => $emergency_phone,
                    ':client_id' => $client_id
                ]);

                $_SESSION['success_message'] = "Patient details updated successfully!";
                header('Location: ' . APP_URL . '/clients/view?id=' . urlencode($client_id));
                exit;

            } catch (\PDOException $e) {
                error_log("Client Update Error: " . $e->getMessage());
                $errors[] = "Database error updating patient record.";
            }
        }

        $client = $_POST;
        $pageTitle = "Edit Patient - " . APP_NAME;
        $pageHeading = "Edit Patient Details";
        $pageSubheading = "Please resolve issues.";
        $currentRoute = 'clients';

        ob_start();
        require_once VIEWS_PATH . '/clients/edit.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function delete(): void
    {
        AuthHelper::requireRole('admin');
        $client_id = $_GET['id'] ?? '';
        if (!empty($client_id)) {
            try {
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("DELETE FROM clients WHERE client_id = :id");
                $stmt->execute([':id' => $client_id]);
                $_SESSION['success_message'] = "Patient record removed.";
            } catch (\PDOException $e) {
                $_SESSION['error_message'] = "Cannot delete patient with active medical or billing records.";
            }
        }
        header('Location: ' . APP_URL . '/clients');
        exit;
    }
}