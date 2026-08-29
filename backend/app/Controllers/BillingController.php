<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class BillingController
{
    public function index(): void
    {
        AuthHelper::requireLogin();
        $invoices = [];

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query("
                SELECT i.*, c.full_name AS client_name, c.phone 
                FROM invoices i 
                INNER JOIN clients c ON i.client_id = c.client_id 
                ORDER BY i.invoice_date DESC, i.invoice_number DESC
            ");
            $invoices = $stmt->fetchAll();
        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Could not fetch invoices.";
        }

        $pageTitle = "Billing & Invoices - " . APP_NAME;
        $pageHeading = "Medical Invoices & Statements";
        $pageSubheading = "Itemized charges for home care procedures, medications, and consultations.";
        $currentRoute = 'billing';

        ob_start();
        require_once VIEWS_PATH . '/billing/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function create(): void
    {
        AuthHelper::requireLogin();
        $client_id = $_GET['client_id'] ?? '';
        $client = null;

        try {
            $db = Database::getInstance()->getConnection();
            if (!empty($client_id)) {
                $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = :id");
                $stmt->execute([':id' => $client_id]);
                $client = $stmt->fetch();
            }
            $allClients = $db->query("SELECT client_id, full_name FROM clients ORDER BY full_name ASC")->fetchAll();
        } catch (\PDOException $e) {
            $allClients = [];
        }

        $pageTitle = "Create Invoice - " . APP_NAME;
        $pageHeading = "New Billing Invoice";
        $pageSubheading = "Generate an itemized statement for home care clinical services.";
        $currentRoute = 'billing';

        ob_start();
        require_once VIEWS_PATH . '/billing/create.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function store(): void
    {
        AuthHelper::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/billing');
            exit;
        }

        $client_id = $_POST['client_id'] ?? '';
        $services = $_POST['services'] ?? [];
        $prices = $_POST['prices'] ?? [];
        $quantities = $_POST['quantities'] ?? [];

        if (empty($client_id) || empty($services)) {
            $_SESSION['error_message'] = "Please select a patient and add at least one service charge.";
            header('Location: ' . APP_URL . '/billing/create');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $db->beginTransaction();

            $stmt = $db->query("SELECT invoice_number FROM invoices ORDER BY invoice_number DESC LIMIT 1 FOR UPDATE");
            $lastInv = $stmt->fetchColumn();
            $num = $lastInv ? (int)substr($lastInv, 4) + 1 : 1;
            $invoice_number = 'INV-' . str_pad($num, 6, '0', STR_PAD_LEFT);

            $totalAmount = 0.0;
            $items = [];
            for ($i = 0; $i < count($services); $i++) {
                $desc = trim($services[$i] ?? '');
                $qty = (int)($quantities[$i] ?? 1);
                $price = (float)($prices[$i] ?? 0.0);
                if (!empty($desc) && $price > 0) {
                    $sub = $qty * $price;
                    $totalAmount += $sub;
                    $items[] = ['desc' => $desc, 'qty' => $qty, 'price' => $price, 'sub' => $sub];
                }
            }

            if (empty($items)) {
                $totalAmount = 50.0;
                $items[] = ['desc' => 'General Clinical Consultation', 'qty' => 1, 'price' => 50.0, 'sub' => 50.0];
            }

            $insertInv = $db->prepare("
                INSERT INTO invoices (invoice_number, client_id, invoice_date, total_amount, amount_paid, balance, payment_status)
                VALUES (:invoice_number, :client_id, CURDATE(), :total_amount, 0.00, :balance, 'Unpaid')
            ");
            $insertInv->execute([
                ':invoice_number' => $invoice_number,
                ':client_id' => $client_id,
                ':total_amount' => $totalAmount,
                ':balance' => $totalAmount
            ]);

            $insertItem = $db->prepare("
                INSERT INTO invoice_items (invoice_number, service_description, quantity, unit_price, subtotal)
                VALUES (:invoice_number, :desc, :qty, :price, :sub)
            ");
            foreach ($items as $item) {
                $insertItem->execute([
                    ':invoice_number' => $invoice_number,
                    ':desc' => $item['desc'],
                    ':qty' => $item['qty'],
                    ':price' => $item['price'],
                    ':sub' => $item['sub']
                ]);
            }

            $db->commit();
            $_SESSION['success_message'] = "Invoice $invoice_number created successfully!";
            header('Location: ' . APP_URL . '/billing/view?id=' . urlencode($invoice_number));
            exit;

        } catch (\PDOException $e) {
            if (isset($db) && $db->inTransaction()) $db->rollBack();
            error_log("Invoice Store Error: " . $e->getMessage());
            $_SESSION['error_message'] = "Database error creating invoice.";
            header('Location: ' . APP_URL . '/billing');
            exit;
        }
    }

    public function view(): void
    {
        AuthHelper::requireLogin();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            header('Location: ' . APP_URL . '/billing');
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("
                SELECT i.*, c.full_name, c.phone, c.address, c.gender, c.age 
                FROM invoices i 
                INNER JOIN clients c ON i.client_id = c.client_id 
                WHERE i.invoice_number = :id
            ");
            $stmt->execute([':id' => $id]);
            $invoice = $stmt->fetch();

            if (!$invoice) {
                $_SESSION['error_message'] = "Invoice statement not found.";
                header('Location: ' . APP_URL . '/billing');
                exit;
            }

            $itemsStmt = $db->prepare("SELECT * FROM invoice_items WHERE invoice_number = :id");
            $itemsStmt->execute([':id' => $id]);
            $items = $itemsStmt->fetchAll();

            $paymentsStmt = $db->prepare("
                SELECT p.*, u.full_name AS staff_name 
                FROM payments p 
                LEFT JOIN users u ON p.staff_id = u.id 
                WHERE p.invoice_number = :id 
                ORDER BY p.payment_date DESC
            ");
            $paymentsStmt->execute([':id' => $id]);
            $payments = $paymentsStmt->fetchAll();

        } catch (\PDOException $e) {
            header('Location: ' . APP_URL . '/billing');
            exit;
        }

        $pageTitle = "Invoice " . $invoice['invoice_number'] . " - " . APP_NAME;
        $pageHeading = "Official Medical Invoice";
        $pageSubheading = "Invoice statement #" . htmlspecialchars($invoice['invoice_number']);
        $currentRoute = 'billing';

        ob_start();
        require_once VIEWS_PATH . '/billing/view.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }
}