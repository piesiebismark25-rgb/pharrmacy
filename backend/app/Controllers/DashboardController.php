<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

class DashboardController
{
    public function index(): void
    {
        AuthHelper::requireLogin();

        try {
            $db = Database::getInstance()->getConnection();

            // Total Patients
            $stmt = $db->query("SELECT COUNT(*) FROM clients");
            $totalClients = (int)$stmt->fetchColumn();

            // Today's Visits
            $stmt = $db->query("SELECT COUNT(*) FROM visits WHERE DATE(visit_date) = CURDATE()");
            $todayVisits = (int)$stmt->fetchColumn();

            // Today's Payments
            $stmt = $db->query("SELECT COALESCE(SUM(amount_paid), 0) FROM payments WHERE DATE(payment_date) = CURDATE()");
            $todayPayments = (float)$stmt->fetchColumn();

            // Outstanding Balances
            $stmt = $db->query("SELECT COALESCE(SUM(balance), 0) FROM invoices");
            $outstandingBalances = (float)$stmt->fetchColumn();

            // Total Lifetime Revenue Collected
            $stmt = $db->query("SELECT COALESCE(SUM(amount_paid), 0) FROM payments");
            $totalRevenue = (float)$stmt->fetchColumn();

            // Total Invoices Billed
            $stmt = $db->query("SELECT COALESCE(SUM(total_amount), 0) FROM invoices");
            $totalBilled = (float)$stmt->fetchColumn();

            // Recent Clients (last 5)
            $stmt = $db->query("SELECT client_id, full_name, gender, phone, registration_date FROM clients ORDER BY created_at DESC LIMIT 5");
            $recentClients = $stmt->fetchAll();

            // Recent Visits (last 5)
            $stmt = $db->query("
                SELECT v.visit_date, v.client_id, v.complaint, v.diagnosis, c.full_name AS client_name, u.full_name AS staff_name 
                FROM visits v 
                INNER JOIN clients c ON v.client_id = c.client_id 
                INNER JOIN users u ON v.attending_staff_id = u.id 
                ORDER BY v.visit_date DESC 
                LIMIT 5
            ");
            $recentVisits = $stmt->fetchAll();

            // Recent Payments (last 5)
            $stmt = $db->query("
                SELECT p.receipt_number, p.amount_paid, p.payment_method, c.full_name AS client_name 
                FROM payments p 
                INNER JOIN clients c ON p.client_id = c.client_id 
                ORDER BY p.payment_date DESC 
                LIMIT 5
            ");
            $recentPayments = $stmt->fetchAll();

            // Upcoming Appointments
            $stmt = $db->query("
                SELECT a.client_id, a.appointment_date, a.appointment_time, a.reason, a.status, c.full_name 
                FROM appointments a 
                INNER JOIN clients c ON a.client_id = c.client_id 
                WHERE a.appointment_date >= CURDATE() AND a.status = 'Scheduled' 
                ORDER BY a.appointment_date ASC, a.appointment_time ASC 
                LIMIT 5
            ");
            $upcomingAppointments = $stmt->fetchAll();

            // --- Chart Data Aggregations (Last 7 Days) ---
            $chartDays = [];
            $chartVisitsData = [];
            $chartClientsData = [];
            for ($i = 6; $i >= 0; $i--) {
                $d = date('Y-m-d', strtotime("-$i days"));
                $label = date('D (j M)', strtotime($d));
                $chartDays[] = $label;

                // Visits on date
                $vStmt = $db->prepare("SELECT COUNT(*) FROM visits WHERE DATE(visit_date) = ?");
                $vStmt->execute([$d]);
                $chartVisitsData[] = (int)$vStmt->fetchColumn();

                // Clients registered on date
                $cStmt = $db->prepare("SELECT COUNT(*) FROM clients WHERE DATE(registration_date) = ?");
                $cStmt->execute([$d]);
                $chartClientsData[] = (int)$cStmt->fetchColumn();
            }

            // Invoice status counts for donut chart
            $invStats = $db->query("
                SELECT payment_status, COUNT(*) as count 
                FROM invoices 
                GROUP BY payment_status
            ")->fetchAll();

            $invoiceStatusMap = ['Paid' => 0, 'Partially Paid' => 0, 'Unpaid' => 0];
            foreach ($invStats as $stat) {
                if (isset($invoiceStatusMap[$stat['payment_status']])) {
                    $invoiceStatusMap[$stat['payment_status']] = (int)$stat['count'];
                }
            }

        } catch (\PDOException $e) {
            error_log("Dashboard Data Fetch Error: " . $e->getMessage());
            $totalClients = $todayVisits = 0;
            $todayPayments = $outstandingBalances = $totalRevenue = $totalBilled = 0.0;
            $recentClients = $recentVisits = $recentPayments = $upcomingAppointments = [];
            $chartDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            $chartVisitsData = [0, 0, 0, 0, 0, 0, 0];
            $chartClientsData = [0, 0, 0, 0, 0, 0, 0];
            $invoiceStatusMap = ['Paid' => 0, 'Partially Paid' => 0, 'Unpaid' => 0];
        }

        $pageTitle = "Executive Dashboard - " . APP_NAME;
        $pageHeading = "Executive Command Center";
        $pageSubheading = "Key metrics, clinical encounters, and home care summary for " . date('l, jS F Y');
        $currentRoute = 'dashboard';

        ob_start();
        require_once VIEWS_PATH . '/dashboard/index.php';
        $content = ob_get_clean();

        require_once VIEWS_PATH . '/shared/layout.php';
    }
}