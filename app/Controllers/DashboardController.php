<?php
namespace App\Controllers;

use App\Core\Database;
use App\Helpers\AuthHelper;

/**
 * Controller managing the main dashboard views and retrieving live metric data.
 */
class DashboardController
{
    public function index(): void
    {
        // Enforce authentication
        AuthHelper::requireLogin();

        try {
            $db = Database::getInstance()->getConnection();

            // 1. Fetch Total Clients
            $stmt = $db->query("SELECT COUNT(*) FROM clients");
            $totalClients = (int)$stmt->fetchColumn();

            // 2. Fetch Today's Visits
            $stmt = $db->query("SELECT COUNT(*) FROM visits WHERE DATE(visit_date) = CURDATE()");
            $todayVisits = (int)$stmt->fetchColumn();

            // 3. Fetch Today's Payments
            $stmt = $db->query("SELECT COALESCE(SUM(amount_paid), 0) FROM payments WHERE DATE(payment_date) = CURDATE()");
            $todayPayments = (float)$stmt->fetchColumn();

            // 4. Fetch Outstanding Balances
            $stmt = $db->query("SELECT COALESCE(SUM(balance), 0) FROM invoices");
            $outstandingBalances = (float)$stmt->fetchColumn();

            // 5. Fetch Today's Appointments Count
            $stmt = $db->query("SELECT COUNT(*) FROM appointments WHERE appointment_date = CURDATE()");
            $todayAppointments = (int)$stmt->fetchColumn();

            // 6. Fetch Recent Clients (last 5)
            $stmt = $db->query("SELECT client_id, full_name, gender, phone, registration_date FROM clients ORDER BY created_at DESC LIMIT 5");
            $recentClients = $stmt->fetchAll();

            // 7. Fetch Recent Visits (last 5)
            $stmt = $db->query("
                SELECT v.visit_date, v.client_id, v.complaint, v.diagnosis, c.full_name AS client_name, u.full_name AS staff_name 
                FROM visits v 
                INNER JOIN clients c ON v.client_id = c.client_id 
                INNER JOIN users u ON v.attending_staff_id = u.id 
                ORDER BY v.visit_date DESC 
                LIMIT 5
            ");
            $recentVisits = $stmt->fetchAll();

            // 8. Fetch Recent Payments (last 5)
            $stmt = $db->query("
                SELECT p.receipt_number, p.amount_paid, p.payment_method, c.full_name AS client_name 
                FROM payments p 
                INNER JOIN clients c ON p.client_id = c.client_id 
                ORDER BY p.payment_date DESC 
                LIMIT 5
            ");
            $recentPayments = $stmt->fetchAll();

            // 9. Fetch Upcoming Appointments (Today/Future Scheduled, limit 5)
            $stmt = $db->query("
                SELECT a.client_id, a.appointment_date, a.appointment_time, a.reason, a.status, c.full_name 
                FROM appointments a 
                INNER JOIN clients c ON a.client_id = c.client_id 
                WHERE a.appointment_date >= CURDATE() AND a.status = 'Scheduled' 
                ORDER BY a.appointment_date ASC, a.appointment_time ASC 
                LIMIT 5
            ");
            $upcomingAppointments = $stmt->fetchAll();

        } catch (\PDOException $e) {
            error_log("Dashboard Data Fetch Error: " . $e->getMessage());
            // Safe fallbacks for display in case of DB queries error
            $totalClients = $todayVisits = $todayAppointments = 0;
            $todayPayments = $outstandingBalances = 0.0;
            $recentClients = $recentVisits = $recentPayments = $upcomingAppointments = [];
        }

        // Layout parameters
        $pageTitle = "Dashboard - I.K HOLINESS CLINIC";
        $pageHeading = "Dashboard Overview";
        $pageSubheading = "Key metrics and summary of operations for " . date('l, jS F Y');
        $currentRoute = 'dashboard';

        // Render Dashboard View inside Layout
        ob_start();
        require_once __DIR__ . '/../../views/dashboard/index.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/shared/layout.php';
    }
}
