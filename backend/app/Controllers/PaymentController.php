<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class PaymentController
{
    public function index(): void
    {
        AuthHelper::requireLogin();
        $payments = [];

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query("
                SELECT p.*, c.full_name AS client_name, u.full_name AS staff_name 
                FROM payments p 
                INNER JOIN clients c ON p.client_id = c.client_id 
                INNER JOIN users u ON p.staff_id = u.id 
                ORDER BY p.payment_date DESC
            ");
            $payments = $stmt->fetchAll();
        } catch (\PDOException $e) {
            $_SESSION['error_message'] = "Could not fetch payment records.";
        }

        $pageTitle = "Receipts Ledger - " . APP_NAME;
        $pageHeading = "Payment Receipts Ledger";
        $pageSubheading = "All collections, receipts, and settlements recorded in the system.";
        $currentRoute = 'payments';

        ob_start();
        require_once VIEWS_PATH . '/payments/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function create(): void
    {
        AuthHelper::requireLogin();
        $invoice_number = $_GET['invoice_number'] ?? '';

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("
                SELECT i.*, c.full_name 
                FROM invoices i 
                INNER JOIN clients c ON i.client_id = c.client_id 
                WHERE i.invoice_number = :inv
            ");
            $stmt->execute([':inv' => $invoice_number]);
            $invoice = $stmt->fetch();

            if (!$invoice) {
                $_SESSION['error_message'] = "Invoice statement not found.";
                header('Location: ' . APP_URL . '/billing');
                exit;
            }
        } catch (\PDOException $e) {
            header('Location: ' . APP_URL . '/billing');
            exit;
        }

        $pageTitle = "Record Payment - " . APP_NAME;
        $pageHeading = "Receive Payment / Settle Invoice";
        $pageSubheading = "Record collection for invoice #" . htmlspecialchars($invoice['invoice_number']);
        $currentRoute = 'payments';

        ob_start();
        require_once VIEWS_PATH . '/payments/create.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }

    public function store(): void
    {
        AuthHelper::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/payments');
            exit;
        }

        $invoice_number = $_POST['invoice_number'] ?? '';
        $amount_paid = (float)($_POST['amount_paid'] ?? 0.0);
        $payment_method = $_POST['payment_method'] ?? 'Cash';
        $notes = trim($_POST['notes'] ?? '');
        $staff_id = AuthHelper::getUserId();

        if (empty($invoice_number) || $amount_paid <= 0) {
            $_SESSION['error_message'] = "Please specify a valid payment amount.";
            header('Location: ' . APP_URL . '/payments/create?invoice_number=' . urlencode($invoice_number));
            exit;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $db->beginTransaction();

            $stmt = $db->prepare("SELECT * FROM invoices WHERE invoice_number = :inv FOR UPDATE");
            $stmt->execute([':inv' => $invoice_number]);
            $inv = $stmt->fetch();

            if (!$inv) {
                throw new \Exception("Invoice not found.");
            }

            $stmt = $db->query("SELECT receipt_number FROM payments ORDER BY receipt_number DESC LIMIT 1 FOR UPDATE");
            $lastRec = $stmt->fetchColumn();
            $num = $lastRec ? (int)substr($lastRec, 4) + 1 : 1;
            $receipt_number = 'REC-' . str_pad($num, 6, '0', STR_PAD_LEFT);
            $payment_id = 'PAY-' . str_pad($num, 6, '0', STR_PAD_LEFT);

            $ins = $db->prepare("
                INSERT INTO payments (payment_id, receipt_number, client_id, invoice_number, payment_date, amount_paid, payment_method, staff_id, notes)
                VALUES (:payment_id, :receipt_number, :client_id, :invoice_number, NOW(), :amount_paid, :payment_method, :staff_id, :notes)
            ");
            $ins->execute([
                ':payment_id' => $payment_id,
                ':receipt_number' => $receipt_number,
                ':client_id' => $inv['client_id'],
                ':invoice_number' => $invoice_number,
                ':amount_paid' => $amount_paid,
                ':payment_method' => $payment_method,
                ':staff_id' => $staff_id,
                ':notes' => $notes
            ]);

            $newPaid = (float)$inv['amount_paid'] + $amount_paid;
            $newBalance = max(0.0, (float)$inv['total_amount'] - $newPaid);
            $newStatus = $newBalance == 0 ? 'Paid' : 'Partially Paid';

            $upd = $db->prepare("
                UPDATE invoices 
                SET amount_paid = :paid, balance = :bal, payment_status = :status 
                WHERE invoice_number = :inv
            ");
            $upd->execute([
                ':paid' => $newPaid,
                ':bal' => $newBalance,
                ':status' => $newStatus,
                ':inv' => $invoice_number
            ]);

            $db->commit();
            $_SESSION['success_message'] = "Payment receipt $receipt_number created successfully!";
            header('Location: ' . APP_URL . '/payments/receipt?id=' . urlencode($receipt_number));
            exit;

        } catch (\Exception $e) {
            if (isset($db) && $db->inTransaction()) $db->rollBack();
            $_SESSION['error_message'] = "Database error logging payment.";
            header('Location: ' . APP_URL . '/billing');
            exit;
        }
    }

    public function receipt(): void
    {
        AuthHelper::requireLogin();
        $id = $_GET['id'] ?? '';

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("
                SELECT p.*, c.full_name, c.phone, c.address, u.full_name AS staff_name, i.total_amount, i.balance 
                FROM payments p 
                INNER JOIN clients c ON p.client_id = c.client_id 
                INNER JOIN users u ON p.staff_id = u.id 
                INNER JOIN invoices i ON p.invoice_number = i.invoice_number 
                WHERE p.receipt_number = :id
            ");
            $stmt->execute([':id' => $id]);
            $payment = $stmt->fetch();

            if (!$payment) {
                $_SESSION['error_message'] = "Receipt not found.";
                header('Location: ' . APP_URL . '/payments');
                exit;
            }
        } catch (\PDOException $e) {
            header('Location: ' . APP_URL . '/payments');
            exit;
        }

        $pageTitle = "Receipt " . $payment['receipt_number'] . " - " . APP_NAME;
        $pageHeading = "Official Medical Receipt";
        $pageSubheading = "Payment confirmation #" . htmlspecialchars($payment['receipt_number']);
        $currentRoute = 'payments';

        ob_start();
        require_once VIEWS_PATH . '/payments/receipt.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }
}