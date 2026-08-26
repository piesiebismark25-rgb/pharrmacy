<?php
use App\Helpers\AuthHelper;
AuthHelper::initSession();
$currentRole = AuthHelper::getRole();
$currentUserName = AuthHelper::getUserName();
$currentRoute = $currentRoute ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'I.K HOLINESS CLINIC'; ?></title>
    <!-- Google Fonts (Outfit) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --body-bg: #090f0e;
            --sidebar-bg: #0d1715;
            --card-bg: rgba(18, 30, 28, 0.6);
            --border-color: rgba(45, 212, 191, 0.12);
            --text-primary: #f3f7f6;
            --text-muted: #8faea8;
            --accent-color: #2dd4bf;
            --accent-hover: #0d9488;
            --sidebar-width: 260px;
            --danger-color: #f87171;
            --success-color: #34d399;
            --warning-color: #fbbf24;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--body-bg);
            background-image: radial-gradient(circle at 80% 20%, #102d29 0%, var(--body-bg) 80%);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand i {
            font-size: 1.8rem;
            color: var(--accent-color);
            filter: drop-shadow(0 0 5px rgba(45, 212, 191, 0.3));
        }

        .sidebar-brand h2 {
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: 1px;
            color: #ffffff;
        }

        .sidebar-nav {
            padding: 15px 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            border-left: 4px solid transparent;
            transition: all 0.2s ease;
            gap: 12px;
        }

        .sidebar-nav li a i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar-nav li a:hover {
            color: var(--accent-color);
            background-color: rgba(45, 212, 191, 0.04);
        }

        .sidebar-nav li.active a {
            color: var(--accent-color);
            background-color: rgba(45, 212, 191, 0.06);
            border-left-color: var(--accent-color);
            font-weight: 600;
        }

        /* Page Content Wrapper */
        #page-content-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
            padding: 30px;
        }

        /* Header / Topbar */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .topbar-title h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 0;
            color: #ffffff;
        }

        .topbar-title p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin: 5px 0 0 0;
        }

        .user-profile-badge {
            background-color: rgba(13, 148, 136, 0.12);
            border: 1px solid rgba(45, 212, 191, 0.2);
            padding: 8px 16px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-profile-badge i {
            color: var(--accent-color);
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.85rem;
            color: #ffffff;
            display: block;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
        }

        /* Premium Components */
        .dashboard-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(45, 212, 191, 0.1);
            border-color: rgba(45, 212, 191, 0.3);
        }

        /* Custom Table Styling */
        .custom-table-container {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .custom-table {
            margin-bottom: 0;
        }

        .custom-table th {
            background-color: rgba(13, 148, 136, 0.08) !important;
            color: var(--accent-color);
            border-bottom: 2px solid var(--border-color);
            padding: 14px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .custom-table td {
            background-color: transparent !important;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
            padding: 14px 16px;
            vertical-align: middle;
            font-size: 0.92rem;
        }

        .custom-table tr:last-child td {
            border-bottom: none;
        }

        .custom-table tr:hover td {
            background-color: rgba(45, 212, 191, 0.03) !important;
        }

        /* Custom Badges */
        .badge-scheduled { background-color: rgba(251, 191, 36, 0.15); color: #f59e0b; border: 1px solid rgba(251, 191, 36, 0.3); }
        .badge-completed { background-color: rgba(52, 211, 153, 0.15); color: #10b981; border: 1px solid rgba(52, 211, 153, 0.3); }
        .badge-cancelled { background-color: rgba(248, 113, 113, 0.15); color: #ef4444; border: 1px solid rgba(248, 113, 113, 0.3); }
        .badge-missed { background-color: rgba(156, 163, 175, 0.15); color: #9ca3af; border: 1px solid rgba(156, 163, 175, 0.3); }
        
        .badge-paid { background-color: rgba(52, 211, 153, 0.15); color: #10b981; border: 1px solid rgba(52, 211, 153, 0.3); }
        .badge-partial { background-color: rgba(251, 191, 36, 0.15); color: #f59e0b; border: 1px solid rgba(251, 191, 36, 0.3); }
        .badge-unpaid { background-color: rgba(248, 113, 113, 0.15); color: #ef4444; border: 1px solid rgba(248, 113, 113, 0.3); }

        /* General Forms & Buttons */
        .btn-accent {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            border: none;
            color: #ffffff;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-accent:hover {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            box-shadow: 0 4px 12px rgba(45, 212, 191, 0.3);
            color: #ffffff;
        }

        /* Print friendly rules */
        @media print {
            #sidebar-wrapper, .topbar, .btn, .no-print {
                display: none !important;
            }
            #page-content-wrapper {
                margin-left: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            body {
                background: #ffffff !important;
                color: #000000 !important;
            }
            .dashboard-card, .custom-table-container {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                background: #ffffff !important;
                color: #000000 !important;
            }
            .custom-table th {
                background-color: #eee !important;
                color: #000000 !important;
                border-bottom: 2px solid #000 !important;
            }
            .custom-table td {
                color: #000000 !important;
                border-bottom: 1px solid #ccc !important;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Wrapper -->
    <div id="sidebar-wrapper">
        <div class="sidebar-brand">
            <i class="fa-solid fa-house-chimney-medical"></i>
            <h2>I.K HOLINESS</h2>
        </div>
        <ul class="sidebar-nav">
            <li class="<?php echo $currentRoute === 'dashboard' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/dashboard">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
            </li>
            <li class="<?php echo $currentRoute === 'clients' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/clients">
                    <i class="fa-solid fa-user-injured"></i> Clients
                </a>
            </li>
            <li class="<?php echo $currentRoute === 'visits' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/visits">
                    <i class="fa-solid fa-notes-medical"></i> Visits
                </a>
            </li>
            <li class="<?php echo $currentRoute === 'appointments' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/appointments">
                    <i class="fa-solid fa-calendar-check"></i> Appointments
                </a>
            </li>
            <li class="<?php echo $currentRoute === 'billing' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/billing">
                    <i class="fa-solid fa-file-invoice-dollar"></i> Billing
                </a>
            </li>
            <li class="<?php echo $currentRoute === 'payments' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/payments">
                    <i class="fa-solid fa-receipt"></i> Payments
                </a>
            </li>
            <li class="<?php echo $currentRoute === 'reports' ? 'active' : ''; ?>">
                <a href="<?php echo APP_URL; ?>/reports">
                    <i class="fa-solid fa-chart-pie"></i> Reports
                </a>
            </li>
            
            <!-- Admin-only Links -->
            <?php if ($currentRole === 'admin'): ?>
                <li class="<?php echo $currentRoute === 'users' ? 'active' : ''; ?>">
                    <a href="<?php echo APP_URL; ?>/users">
                        <i class="fa-solid fa-users-gear"></i> Users
                    </a>
                </li>
                <li class="<?php echo $currentRoute === 'settings' ? 'active' : ''; ?>">
                    <a href="<?php echo APP_URL; ?>/settings">
                        <i class="fa-solid fa-gears"></i> Settings
                    </a>
                </li>
            <?php endif; ?>

            <li class="mt-4">
                <a href="<?php echo APP_URL; ?>/logout" class="text-danger">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Page Content Wrapper -->
    <div id="page-content-wrapper">
        <div class="topbar">
            <div class="topbar-title">
                <h1><?php echo $pageHeading ?? 'Dashboard'; ?></h1>
                <p><?php echo $pageSubheading ?? 'I.K HOLINESS CLINIC Management System'; ?></p>
            </div>
            
            <div class="user-profile-badge">
                <i class="fa-solid fa-user-circle fs-4"></i>
                <div class="user-info">
                    <span class="user-name"><?php echo htmlspecialchars($currentUserName, ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="user-role"><?php echo htmlspecialchars($currentRole, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </div>
        </div>

        <!-- System Alerts / Notifications -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 rounded-4 bg-opacity-10 bg-success text-success no-print" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>
                <?php 
                echo htmlspecialchars($_SESSION['success_message'], ENT_QUOTES, 'UTF-8'); 
                unset($_SESSION['success_message']);
                ?>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 rounded-4 bg-opacity-10 bg-danger text-danger no-print" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                <?php 
                echo htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8'); 
                unset($_SESSION['error_message']);
                ?>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Main Content Area -->
        <?php echo $content ?? ''; ?>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
