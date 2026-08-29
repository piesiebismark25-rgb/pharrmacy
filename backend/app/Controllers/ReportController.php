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

            // 1. Payment Methods Breakdown (Donut Chart)
            $channelStats = $db->query("
                SELECT payment_method, COUNT(*) AS txn_count, COALESCE(SUM(amount_paid), 0) AS total_amount 
                FROM payments 
                GROUP BY payment_method
            ")->fetchAll();

            // 2. Gender Demographics
            $genderStats = $db->query("
                SELECT gender, COUNT(*) AS count 
                FROM clients 
                GROUP BY gender
            ")->fetchAll();

            // 3. Last 7 Days Revenue Trend
            $days = [];
            $revenueDaysData = [];
            $visitsDaysData = [];
            for ($i = 6; $i >= 0; $i--) {
                $d = date('Y-m-d', strtotime("-$i days"));
                $label = date('D, d M', strtotime($d));
                $days[] = $label;

                $revStmt = $db->prepare("SELECT COALESCE(SUM(amount_paid), 0) FROM payments WHERE DATE(payment_date) = :d");
                $revStmt->execute([':d' => $d]);
                $revenueDaysData[] = (float)$revStmt->fetchColumn();

                $visStmt = $db->prepare("SELECT COUNT(*) FROM visits WHERE DATE(visit_date) = :d");
                $visStmt->execute([':d' => $d]);
                $visitsDaysData[] = (int)$visStmt->fetchColumn();
            }

            // 4. Recent Payment Transactions Ledger
            $recentPayments = $db->query("
                SELECT p.*, c.full_name AS client_name 
                FROM payments p 
                INNER JOIN clients c ON p.client_id = c.client_id 
                ORDER BY p.payment_date DESC LIMIT 15
            ")->fetchAll();

        } catch (\PDOException $e) {
            $totalPatients = $totalVisits = 0;
            $totalRevenue = $totalOutstanding = 0.0;
            $channelStats = $genderStats = $days = $revenueDaysData = $visitsDaysData = $recentPayments = [];
        }

        $pageTitle = "Operational & Financial Intelligence - " . APP_NAME;
        $pageHeading = "Comprehensive Clinical & Financial Reports";
        $pageSubheading = "Executive analytics and operational audit intelligence.";
        $currentRoute = 'reports';

        ob_start();
        require_once VIEWS_PATH . '/reports/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }
}