<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

/**
 * Controller managing clinical visit logs.
 */
class VisitController
{
    /**
     * Display a master list of all clinic visits (supports search).
     */
    public function index(): void
    {
        AuthHelper::requireLogin();

        $search = trim($_GET['search'] ?? '');
        $visits = [];

        try {
            $db = Database::getInstance()->getConnection();

            if ($search !== '') {
                // Search visits by Client ID or Client Name
                $stmt = $db->prepare("
                    SELECT v.*, c.full_name AS client_name, u.full_name AS staff_name 
                    FROM visits v 
                    INNER JOIN clients c ON v.client_id = c.client_id 
                    INNER JOIN users u ON v.attending_staff_id = u.id 
                    WHERE v.client_id LIKE :search 
                       OR c.full_name LIKE :search 
                    ORDER BY v.visit_date DESC
                ");
                $stmt->execute([':search' => "%$search%"]);
            } else {
                $stmt = $db->query("
                    SELECT v.*, c.full_name AS client_name, u.full_name AS staff_name 
                    FROM visits v 
                    INNER JOIN clients c ON v.client_id = c.client_id 
                    INNER JOIN users u ON v.attending_staff_id = u.id 
                    ORDER BY v.visit_date DESC
                ");
            }

            $visits = $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Visits Master Fetch Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Could not retrieve clinic visits history.";
        }

        $pageTitle = "Visits Log - I.K HOLINESS CLINIC";
        $pageHeading = "Clinical Visits History";
        $pageSubheading = "Complete records of patient examinations, symptoms, diagnosis, and prescriptions.";
        $currentRoute = 'visits';

        ob_start();
        require_once __DIR__ . '/../../views/visits/index.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Display form to record a new clinical visit.
     */
    public function create(): void
    {
        AuthHelper::requireLogin();

        $client_id = $_GET['client_id'] ?? '';
        if (empty($client_id)) {
            $_SESSION['error_message'] = "Please select a client from the directory to record a new visit.";
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
            error_log("Visit Create Load Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Error retrieving client details.";
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $pageTitle = "Record Visit - I.K HOLINESS CLINIC";
        $pageHeading = "New Clinical Visit";
        $pageSubheading = "Record vitals, diagnosis, and prescription details for " . htmlspecialchars($client['full_name']);
        $currentRoute = 'visits';

        ob_start();
        require_once __DIR__ . '/../../views/visits/create.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }

    /**
     * Store new visit records in the database.
     */
    public function store(): void
    {
        AuthHelper::requireLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/clients');
            exit;
        }

        $client_id = $_POST['client_id'] ?? '';
        $complaint = trim($_POST['complaint'] ?? '');
        $symptoms = trim($_POST['symptoms'] ?? '');
        $temperature = trim($_POST['temperature'] ?? '');
        $bp = trim($_POST['bp'] ?? '');
        $weight = trim($_POST['weight'] ?? '');
        $diagnosis = trim($_POST['diagnosis'] ?? '');
        $treatment = trim($_POST['treatment'] ?? '');
        $prescription = trim($_POST['prescription'] ?? '');
        $notes = trim($_POST['notes'] ?? '');
        $attending_staff_id = AuthHelper::getUserId();

        $errors = [];

        if (empty($client_id)) $errors[] = "Client ID is missing.";
        if (empty($complaint)) $errors[] = "Chief Complaint description is required.";

        if (empty($errors)) {
            try {
                $db = Database::getInstance()->getConnection();
                
                $insert = $db->prepare("
                    INSERT INTO visits (client_id, visit_date, complaint, symptoms, temperature, bp, weight, diagnosis, treatment, prescription, notes, attending_staff_id)
                    VALUES (:client_id, NOW(), :complaint, :symptoms, :temperature, :bp, :weight, :diagnosis, :treatment, :prescription, :notes, :attending_staff_id)
                ");

                $insert->execute([
                    ':client_id' => $client_id,
                    ':complaint' => $complaint,
                    ':symptoms' => $symptoms,
                    ':temperature' => $temperature,
                    ':bp' => $bp,
                    ':weight' => $weight,
                    ':diagnosis' => $diagnosis,
                    ':treatment' => $treatment,
                    ':prescription' => $prescription,
                    ':notes' => $notes,
                    ':attending_staff_id' => $attending_staff_id
                ]);

                $_SESSION['success_message'] = "Clinical visit recorded successfully!";
                header('Location: ' . APP_URL . '/clients/view?id=' . urlencode($client_id));
                exit;

            } catch (\PDOException $e) {
                error_log("Visit Insert Error: " . $e->getMessage());
                $errors[] = "Database error: Could not log clinical visit details.";
            }
        }

        // Return to visit creation form with errors
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = :id");
            $stmt->execute([':id' => $client_id]);
            $client = $stmt->fetch();
        } catch (\PDOException $e) {
            $client = ['client_id' => $client_id, 'full_name' => 'Unknown Patient'];
        }

        $pageTitle = "Record Visit - I.K HOLINESS CLINIC";
        $pageHeading = "New Clinical Visit";
        $pageSubheading = "Please correct errors in form below.";
        $currentRoute = 'visits';

        ob_start();
        require_once __DIR__ . '/../../views/visits/create.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }
}
