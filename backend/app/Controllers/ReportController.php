<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class ReportController
{
    public function index(): void
    {
        AuthHelper::requireLogin();

        try {
            $db = Database::getInstance()->getConnection();

            $totalPatients = (int)$db->query("SELECT COUNT(*) FROM clients")->fetchColumn();
            $totalVisits = (int)$db->query("SELECT COUNT(*) FROM visits")->fetchColumn();
            $totalRevenue = (float)$db->query("SELECT COALESCE(SUM(amount_paid), 0) FROM payments")->fetchColumn();
            $totalOutstanding = (float)$db->query("SELECT COALESCE(SUM(balance), 0) FROM invoices")->fetchColumn();

            $recentVisits = $db->query("
                SELECT v.*, c.full_name AS client_name, u.full_name AS staff_name 
                FROM visits v 
                INNER JOIN clients c ON v.client_id = c.client_id 
                INNER JOIN users u ON v.attending_staff_id = u.id 
                ORDER BY v.visit_date DESC LIMIT 15
            ")->fetchAll();

            $recentPayments = $db->query("
                SELECT p.*, c.full_name AS client_name 
                FROM payments p 
                INNER JOIN clients c ON p.client_id = c.client_id 
                ORDER BY p.payment_date DESC LIMIT 15
            ")->fetchAll();

        } catch (\PDOException $e) {
            $totalPatients = $totalVisits = 0;
            $totalRevenue = $totalOutstanding = 0.0;
            $recentVisits = $recentPayments = [];
        }

        $pageTitle = "Printable Reports - " . APP_NAME;
        $pageHeading = "Comprehensive Clinical & Financial Reports";
        $pageSubheading = "Print-ready summaries for clinical operations and revenue auditing.";
        $currentRoute = 'reports';

        ob_start();
        require_once VIEWS_PATH . '/reports/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }
}