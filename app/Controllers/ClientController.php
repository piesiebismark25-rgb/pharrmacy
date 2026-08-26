<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

/**
 * Controller handling Patient/Client management operations (CRUD & search).
 */
class ClientController
{
    /**
     * Display a list of registered clients (supports search).
     */
    public function index(): void
    {
        AuthHelper::requireLogin();

        $search = trim($_GET['search'] ?? '');
        $clients = [];

        try {
            $db = Database::getInstance()->getConnection();
            
            if ($search !== '') {
                // Search by Client ID, Name, or Phone Number
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
            $_SESSION['error_message'] = "Could not fetch client records.";
        }

        // Layout variables
        $pageTitle = "Manage Clients - I.K HOLINESS CLINIC";
        $pageHeading = "Client Directory";
        $pageSubheading = "Search, register, and update patient information records.";
        $currentRoute = 'clients';

        ob_start();
        require_once __DIR__ . '/../../views/clients/index.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Display Client Registration Form.
     */
    public function create(): void
    {
        AuthHelper::requireLogin();

        $pageTitle = "Register Client - I.K HOLINESS CLINIC";
        $pageHeading = "New Client Registration";
        $pageSubheading = "Enter client details below to register a new record.";
        $currentRoute = 'clients';

        ob_start();
        require_once __DIR__ . '/../../views/clients/create.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Store Client Registration Data.
     */
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

        // Validations
        if (empty($full_name)) $errors[] = "Full Name is required.";
        if (empty($gender)) $errors[] = "Gender selection is required.";
        if (empty($dob)) $errors[] = "Date of Birth is required.";
        if (empty($phone)) $errors[] = "Phone Number is required.";
        if (empty($address)) $errors[] = "Address is required.";
        if (empty($emergency_name)) $errors[] = "Emergency Contact Name is required.";
        if (empty($emergency_phone)) $errors[] = "Emergency Contact Phone is required.";

        // Calculate Age automatically based on DOB
        $age = 0;
        if (!empty($dob)) {
            try {
                $dobDate = new \DateTime($dob);
                $today = new \DateTime();
                if ($dobDate > $today) {
                    $errors[] = "Date of Birth cannot be in the future.";
                } else {
                    $age = $today->diff($dobDate)->y;
                }
            } catch (\Exception $e) {
                $errors[] = "Invalid Date of Birth format.";
            }
        }

        if (empty($errors)) {
            try {
                $db = Database::getInstance()->getConnection();
                
                // Begin Transaction to prevent race conditions during ID generation
                $db->beginTransaction();

                // Generate Sequential Client ID: CL-000001
                $stmt = $db->query("SELECT client_id FROM clients ORDER BY client_id DESC LIMIT 1 FOR UPDATE");
                $lastId = $stmt->fetchColumn();

                if ($lastId) {
                    $num = (int)substr($lastId, 3);
                    $nextNum = $num + 1;
                } else {
                    $nextNum = 1;
                }
                $client_id = 'CL-' . str_pad($nextNum, 6, '0', STR_PAD_LEFT);

                // Insert patient record
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
                $_SESSION['success_message'] = "Client registered successfully! ID assigned: $client_id";
                header('Location: ' . APP_URL . '/clients');
                exit;

            } catch (\PDOException $e) {
                if (isset($db) && $db->inTransaction()) {
                    $db->rollBack();
                }
                error_log("Client Insert Error: " . $e->getMessage());
                $errors[] = "Database error: Could not register client. " . $e->getMessage();
            }
        }

        // Return with input and errors
        $pageTitle = "Register Client - I.K HOLINESS CLINIC";
        $pageHeading = "New Client Registration";
        $pageSubheading = "Correct errors below to complete registration.";
        $currentRoute = 'clients';

        ob_start();
        require_once __DIR__ . '/../../views/clients/create.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Display Client Editing Form.
     */
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
            error_log("Client Edit Load Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Error loading client record.";
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $pageTitle = "Edit Client - I.K HOLINESS CLINIC";
        $pageHeading = "Edit Client Details";
        $pageSubheading = "Modify record details for " . htmlspecialchars($client['full_name']);
        $currentRoute = 'clients';

        ob_start();
        require_once __DIR__ . '/../../views/clients/edit.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Process Update Client Request.
     */
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

        // Calculate Age
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
                    SET full_name = :full_name, 
                        gender = :gender, 
                        dob = :dob, 
                        age = :age, 
                        phone = :phone, 
                        address = :address, 
                        emergency_name = :emergency_name, 
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

                $_SESSION['success_message'] = "Client details updated successfully!";
                header('Location: ' . APP_URL . '/clients');
                exit;

            } catch (\PDOException $e) {
                error_log("Client Update Error: " . $e->getMessage());
                $errors[] = "Database error: Could not update client details.";
            }
        }

        // Return to edit screen with errors
        $client = $_POST; // preserve inputs
        $pageTitle = "Edit Client - I.K HOLINESS CLINIC";
        $pageHeading = "Edit Client Details";
        $pageSubheading = "Please resolve the validation issues.";
        $currentRoute = 'clients';

        ob_start();
        require_once __DIR__ . '/../../views/clients/edit.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Delete Client Record (Admin Only).
     */
    public function delete(): void
    {
        // Enforce Admin role
        AuthHelper::requireRole('admin');

        $client_id = $_GET['id'] ?? '';
        if (!empty($client_id)) {
            try {
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("DELETE FROM clients WHERE client_id = :id");
                $stmt->execute([':id' => $client_id]);

                $_SESSION['success_message'] = "Client record deleted successfully.";
            } catch (\PDOException $e) {
                error_log("Client Delete Error: " . $e->getMessage());
                $_SESSION['error_message'] = "Database restriction: Cannot delete client because they have active visit or billing history.";
            }
        }

        header('Location: ' . APP_URL . '/clients');
        exit;
    }

    /**
     * Display Patient Profile (Visits, Invoices, Appointments).
     */
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
            
            // 1. Fetch Client Details
            $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = :id");
            $stmt->execute([':id' => $client_id]);
            $client = $stmt->fetch();

            if (!$client) {
                $_SESSION['error_message'] = "Patient record not found.";
                header('Location: ' . APP_URL . '/clients');
                exit;
            }

            // 2. Fetch Visit History
            $stmt = $db->prepare("
                SELECT v.*, u.full_name AS staff_name 
                FROM visits v 
                INNER JOIN users u ON v.attending_staff_id = u.id 
                WHERE v.client_id = :client_id 
                ORDER BY v.visit_date DESC
            ");
            $stmt->execute([':client_id' => $client_id]);
            $visits = $stmt->fetchAll();

            // 3. Fetch Billing History
            $stmt = $db->prepare("
                SELECT * FROM invoices 
                WHERE client_id = :client_id 
                ORDER BY invoice_date DESC, invoice_number DESC
            ");
            $stmt->execute([':client_id' => $client_id]);
            $invoices = $stmt->fetchAll();

            // 4. Fetch Appointment History
            $stmt = $db->prepare("
                SELECT * FROM appointments 
                WHERE client_id = :client_id 
                ORDER BY appointment_date DESC, appointment_time DESC
            ");
            $stmt->execute([':client_id' => $client_id]);
            $appointments = $stmt->fetchAll();

        } catch (\PDOException $e) {
            error_log("Patient View Load Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Database error: Could not load patient profile.";
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $pageTitle = "Patient Profile: " . htmlspecialchars($client['full_name']) . " - I.K HOLINESS CLINIC";
        $pageHeading = "Patient Profile Details";
        $pageSubheading = "Clinical history, billing sheets, and appointments for patient " . htmlspecialchars($client['client_id']);
        $currentRoute = 'clients';

        ob_start();
        require_once __DIR__ . '/../../views/clients/view.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }
}

