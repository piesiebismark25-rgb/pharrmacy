<?php
use App\Helpers\AuthHelper;
AuthHelper::initSession();
$currentRole = AuthHelper::getRole();
$currentUserName = AuthHelper::getUserName();
$currentRoute = $currentRoute ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'I.K HOLINESS HOME CARE SERVICES'; ?></title>
    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Chart.js 4.4 for Modern Medical Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    
    <style>
        :root {
            /* Modern Professional Clean Palette (Tailwind UI / Linear Inspired) */
            --bg-base: #f8fafc;
            --bg-subtle: #f1f5f9;
            --surface-card: #ffffff;
            --surface-card-hover: #f8fafc;
            --surface-elevated: #ffffff;
            --border-subtle: #e2e8f0;
            --border-strong: #cbd5e1;
            --border-focus: #2563eb;
            
            /* Text Hierarchy */
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;
            
            /* Primary Brand Accent (Modern Royal Blue) */
            --accent-main: #2563eb;
            --accent-dark: #1d4ed8;
            --accent-light: #eff6ff;
            --accent-border: #bfdbfe;
            --accent-glow: rgba(37, 99, 235, 0.12);
            
            /* Semantic Status Colors */
            --success: #16a34a;
            --success-bg: #f0fdf4;
            --success-border: #bbf7d0;
            
            --warning: #d97706;
            --warning-bg: #fffbeb;
            --warning-border: #fde68a;
            
            --danger: #e11d48;
            --danger-bg: #fff1f2;
            --danger-border: #fecdd3;
            
            --info: #0284c7;
            --info-bg: #f0f9ff;
            --info-border: #bae6fd;

            --sidebar-bg: #0f172a;
            --sidebar-border: #1e293b;
            --sidebar-link: #94a3b8;
            --sidebar-link-active: #ffffff;
            --sidebar-width: 260px;
            
            --radius-sm: 8px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --shadow-subtle: 0 1px 2px 0 rgba(0, 0, 0, 0.04);
            --shadow-card: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 6px 16px -2px rgba(0, 0, 0, 0.06);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-base);
            color: var(--text-primary);
            font-size: 0.875rem;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Sidebar Navigation with Full Scrollbar Support */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            height: 100vh;
            max-height: 100vh;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-header {
            padding: 18px 18px;
            border-bottom: 1px solid var(--sidebar-border);
            flex-shrink: 0;
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border-radius: var(--radius-md);
            color: #ffffff;
            font-size: 0.95rem;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 0.9rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.15;
            letter-spacing: -0.01em;
        }

        .brand-tagline {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #60a5fa;
            font-weight: 600;
        }

        /* Scrollable Sidebar Menu */
        .sidebar-menu {
            list-style: none;
            padding: 12px 10px;
            margin: 0;
            flex: 1 1 auto;
            overflow-y: auto;
            overflow-x: hidden;
            min-height: 0;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.15) transparent;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 4px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .menu-category {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 700;
            color: #64748b;
            padding: 10px 12px 4px 12px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            color: var(--sidebar-link);
            text-decoration: none;
            font-size: 0.8125rem;
            font-weight: 500;
            border-radius: var(--radius-sm);
            transition: all 0.15s ease-in-out;
            margin-bottom: 2px;
            position: relative;
        }

        .sidebar-link i {
            width: 18px;
            text-align: center;
            font-size: 0.9rem;
            color: #64748b;
            transition: color 0.15s ease-in-out;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .sidebar-link:hover i {
            color: #60a5fa;
        }

        .sidebar-link.active {
            color: #ffffff;
            background-color: rgba(37, 99, 235, 0.15);
            border: 1px solid rgba(37, 99, 235, 0.3);
            font-weight: 600;
        }

        .sidebar-link.active i {
            color: #60a5fa;
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 20%;
            height: 60%;
            width: 3px;
            background-color: #3b82f6;
            border-radius: 0 4px 4px 0;
        }

        .sidebar-footer {
            padding: 12px 12px;
            border-top: 1px solid var(--sidebar-border);
            background-color: rgba(0, 0, 0, 0.2);
            flex-shrink: 0;
        }

        .sidebar-footer .doctor-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 8px;
            border-radius: var(--radius-sm);
            background-color: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .avatar-box {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.78rem;
            flex-shrink: 0;
        }

        /* Mobile Sidebar Backdrop */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(2px);
            z-index: 1035;
        }

        .sidebar-backdrop.show {
            display: block;
        }

        /* Main Content Wrapper */
        #page-content-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Topbar Header */
        .topbar {
            height: 60px;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-subtle);
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.02);
        }

        .topbar-left h1 {
            font-size: 1.05rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-primary);
        }

        .topbar-left p {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin: 0;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Content Container */
        .main-container {
            padding: 24px;
            flex: 1;
        }

        /* Modern UI Card */
        .ui-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-card);
            transition: all 0.15s ease-in-out;
            position: relative;
        }

        .ui-card-interactive:hover {
            transform: translateY(-2px);
            border-color: var(--accent-border);
            box-shadow: var(--shadow-hover);
        }

        /* Modern Search Input Component */
        .modern-search-wrap {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .modern-search-wrap .search-icon {
            position: absolute;
            left: 14px;
            color: #94a3b8;
            font-size: 0.85rem;
            pointer-events: none;
            z-index: 5;
        }

        .modern-search-input {
            width: 100%;
            background-color: #ffffff !important;
            border: 1px solid var(--border-strong) !important;
            border-radius: var(--radius-md) !important;
            padding: 8px 14px 8px 38px !important;
            font-size: 0.8125rem !important;
            color: var(--text-primary) !important;
            height: 38px !important;
            transition: all 0.15s ease-in-out;
            box-shadow: var(--shadow-subtle);
        }

        .modern-search-input:focus {
            border-color: var(--accent-main) !important;
            box-shadow: 0 0 0 3px var(--accent-glow) !important;
            outline: none;
        }

        /* Form Inputs & Controls */
        .form-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 5px;
            display: block;
        }

        .form-control, .form-select {
            background-color: #ffffff !important;
            border: 1px solid var(--border-strong) !important;
            color: var(--text-primary) !important;
            font-size: 0.8125rem;
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            min-height: 38px;
            transition: all 0.15s ease-in-out;
            box-shadow: var(--shadow-subtle);
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff !important;
            border-color: var(--accent-main) !important;
            box-shadow: 0 0 0 3px var(--accent-glow) !important;
            color: var(--text-primary) !important;
            outline: none;
        }

        .form-control::placeholder {
            color: #94a3b8;
            font-size: 0.8rem;
        }

        /* Custom Modern Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: 1px solid #1d4ed8;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.8125rem;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            box-shadow: 0 1px 2px 0 rgba(37, 99, 235, 0.25);
            transition: all 0.15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
            transform: translateY(-1px);
        }

        .btn-secondary-custom {
            background-color: #ffffff;
            border: 1px solid var(--border-strong);
            color: var(--text-secondary) !important;
            font-weight: 600;
            font-size: 0.8125rem;
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.15s ease-in-out;
            text-decoration: none;
            cursor: pointer;
            box-shadow: var(--shadow-subtle);
        }

        .btn-secondary-custom:hover {
            background-color: var(--bg-subtle);
            border-color: #94a3b8;
            color: var(--text-primary) !important;
        }

        .btn-print-custom {
            background-color: #ffffff;
            border: 1px solid #e0e7ff;
            color: #4338ca !important;
            font-weight: 600;
            font-size: 0.8125rem;
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s ease;
            text-decoration: none;
            box-shadow: var(--shadow-subtle);
        }

        .btn-print-custom:hover {
            background-color: #eef2ff;
            border-color: #c7d2fe;
            color: #3730a3 !important;
            transform: translateY(-1px);
        }

        /* Modern Tables */
        .ui-table-container {
            background-color: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }

        .ui-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .ui-table th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 11px 16px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .ui-table td {
            background-color: #ffffff !important;
            color: var(--text-secondary);
            font-size: 0.8125rem;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border-subtle);
            vertical-align: middle;
        }

        .ui-table tr:last-child td {
            border-bottom: none;
        }

        .ui-table tbody tr {
            transition: background-color 0.12s ease;
        }

        .ui-table tbody tr:hover td {
            background-color: #f8fafc !important;
            color: var(--text-primary);
        }

        /* Status & Category Badges */
        .badge-pill-custom {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 8px;
            font-size: 0.72rem;
            font-weight: 600;
            border-radius: 9999px;
            letter-spacing: 0.01em;
        }

        .badge-emerald {
            background-color: var(--success-bg);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .badge-amber {
            background-color: var(--warning-bg);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .badge-rose {
            background-color: var(--danger-bg);
            color: var(--danger);
            border: 1px solid var(--danger-border);
        }

        .badge-sky {
            background-color: var(--info-bg);
            color: var(--info);
            border: 1px solid var(--info-border);
        }

        .badge-zinc {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border-subtle);
        }

        /* Alert Callouts */
        .ui-alert {
            padding: 12px 16px;
            border-radius: var(--radius-md);
            font-size: 0.8125rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }

        .ui-alert-success {
            background-color: var(--success-bg);
            border-color: var(--success-border);
            color: #15803d;
        }

        .ui-alert-danger {
            background-color: var(--danger-bg);
            border-color: var(--danger-border);
            color: #be123c;
        }

        /* Accent Utility Classes */
        .text-blue-accent {
            color: var(--accent-main) !important;
        }

        .bg-blue-subtle {
            background-color: var(--accent-light) !important;
            border: 1px solid var(--accent-border) !important;
        }

        /* PRINT STYLES ENGINE */
        @media print {
            @page {
                size: A4 portrait;
                margin: 15mm;
            }
            body {
                background: #ffffff !important;
                color: #0f172a !important;
                font-size: 10pt !important;
                line-height: 1.4 !important;
            }
            #sidebar-wrapper, .sidebar-backdrop, .topbar, .btn-print-custom, .btn-primary-custom, .btn-secondary-custom, .no-print, .btn-close, .alert {
                display: none !important;
            }
            #page-content-wrapper {
                margin-left: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            .main-container {
                padding: 0 !important;
            }
            .ui-card, .ui-table-container {
                background: #ffffff !important;
                border: 1px solid #cbd5e1 !important;
                box-shadow: none !important;
                border-radius: 6px !important;
                color: #0f172a !important;
            }
            .ui-table th {
                background-color: #f1f5f9 !important;
                color: #0f172a !important;
                border-bottom: 2px solid #0f172a !important;
            }
            .ui-table td {
                color: #0f172a !important;
                border-bottom: 1px solid #e2e8f0 !important;
            }
            .print-only-header {
                display: block !important;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #0f172a;
            }
            .print-footer {
                display: block !important;
                margin-top: 30px;
                padding-top: 15px;
                border-top: 1px solid #cbd5e1;
                font-size: 8pt;
                color: #64748b;
            }
        }

        .print-only-header, .print-footer {
            display: none;
        }

        /* Mobile Responsiveness */
        @media (max-width: 991.98px) {
            #sidebar-wrapper {
                transform: translateX(-260px);
            }
            #sidebar-wrapper.show {
                transform: translateX(0);
            }
            #page-content-wrapper {
                margin-left: 0;
            }
            .topbar {
                padding: 0 16px;
            }
            .main-container {
                padding: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Mobile Backdrop -->
    <div id="sidebar-backdrop" class="sidebar-backdrop" onclick="toggleSidebar()"></div>

    <!-- Sidebar Navigation with Smooth Scroll -->
    <aside id="sidebar-wrapper">
        <div class="sidebar-header">
            <a href="<?php echo APP_URL; ?>/dashboard" class="brand-logo-wrap">
                <div class="brand-icon">
                    <i class="fa-solid fa-house-medical"></i>
                </div>
                <div class="brand-text">
                    <span class="brand-title">I.K HOLINESS</span>
                    <span class="brand-tagline">Home Care Services</span>
                </div>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-category">Clinical Management</li>
            <li>
                <a href="<?php echo APP_URL; ?>/dashboard" class="sidebar-link <?php echo $currentRoute === 'dashboard' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo APP_URL; ?>/clients" class="sidebar-link <?php echo $currentRoute === 'clients' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Patients Directory</span>
                </a>
            </li>
            <li>
                <a href="<?php echo APP_URL; ?>/visits" class="sidebar-link <?php echo $currentRoute === 'visits' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-stethoscope"></i>
                    <span>Clinical Encounters</span>
                </a>
            </li>
            <li>
                <a href="<?php echo APP_URL; ?>/appointments" class="sidebar-link <?php echo $currentRoute === 'appointments' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>

            <li class="menu-category">Finance & Billing</li>
            <li>
                <a href="<?php echo APP_URL; ?>/billing" class="sidebar-link <?php echo $currentRoute === 'billing' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <span>Invoices & Statements</span>
                </a>
            </li>
            <li>
                <a href="<?php echo APP_URL; ?>/payments" class="sidebar-link <?php echo $currentRoute === 'payments' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Receipts Ledger</span>
                </a>
            </li>
            <li>
                <a href="<?php echo APP_URL; ?>/reports" class="sidebar-link <?php echo $currentRoute === 'reports' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-print"></i>
                    <span>Auditing Reports</span>
                </a>
            </li>

            <?php if ($currentRole === 'admin'): ?>
                <li class="menu-category">Administration</li>
                <li>
                    <a href="<?php echo APP_URL; ?>/users" class="sidebar-link <?php echo $currentRoute === 'users' ? 'active' : ''; ?>">
                        <i class="fa-solid fa-user-shield"></i>
                        <span>Staff Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo APP_URL; ?>/settings" class="sidebar-link <?php echo $currentRoute === 'settings' ? 'active' : ''; ?>">
                        <i class="fa-solid fa-sliders"></i>
                        <span>Clinic Settings</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="sidebar-footer">
            <div class="doctor-badge mb-2">
                <div class="avatar-box">
                    <?php echo strtoupper(substr($currentUserName ?? 'DR', 0, 2)); ?>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <div class="fw-semibold text-truncate text-white" style="font-size: 0.8rem;"><?php echo htmlspecialchars($currentUserName ?? 'Doctor'); ?></div>
                    <div class="text-muted text-truncate" style="font-size: 0.68rem; text-transform: uppercase;"><?php echo htmlspecialchars($currentRole ?? 'Attending'); ?></div>
                </div>
            </div>
            <a href="<?php echo APP_URL; ?>/logout" class="sidebar-link text-danger py-1 px-2" style="margin-bottom: 0;">
                <i class="fa-solid fa-arrow-right-from-bracket text-danger" style="font-size: 0.8rem;"></i>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div id="page-content-wrapper">
        <!-- Top Bar Header -->
        <header class="topbar">
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-secondary-custom d-lg-none px-2 py-1" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="topbar-left">
                    <h1><?php echo $pageHeading ?? 'Dashboard'; ?></h1>
                    <p class="d-none d-md-block"><?php echo $pageSubheading ?? 'I.K Holiness Home Care Services Management'; ?></p>
                </div>
            </div>

            <div class="topbar-actions">
                <button onclick="window.print()" class="btn-print-custom">
                    <i class="fa-solid fa-print"></i>
                    <span class="d-none d-sm-inline">Print</span>
                </button>
                <a href="<?php echo APP_URL; ?>/clients/create" class="btn-primary-custom">
                    <i class="fa-solid fa-user-plus"></i>
                    <span class="d-none d-sm-inline">New Patient</span>
                </a>
            </div>
        </header>

        <!-- Printable Document Header (Appears only on paper/PDF export) -->
        <div class="print-only-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="fw-bold text-dark mb-0">I.K HOLINESS HOME CARE SERVICES</h2>
                    <p class="text-secondary fw-semibold mb-1" style="font-size: 10pt;">"YOUR HEALTH IS OUR LIFE"</p>
                    <small class="text-muted d-block">
                        <strong>Location:</strong> Pankrono, Kumasi, Ghana &bull; 
                        <strong>Tel:</strong> 0241974447 / 0550974126 &bull; 
                        <strong>Email:</strong> kisaiahh@icloud.com
                    </small>
                </div>
                <div class="text-end">
                    <span class="badge bg-dark text-white p-2">OFFICIAL MEDICAL RECORD</span>
                    <div class="mt-2 text-muted" style="font-size: 8pt;">Printed on: <?php echo date('d/m/Y H:i A'); ?></div>
                </div>
            </div>
        </div>

        <!-- Main Page Body -->
        <main class="main-container">
            <!-- Toast / Notifications -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="ui-alert ui-alert-success no-print" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-circle-check fs-6"></i>
                        <span><?php echo htmlspecialchars($_SESSION['success_message']); unset($_SESSION['success_message']); ?></span>
                    </div>
                    <button type="button" class="btn-close shadow-none" onclick="this.parentElement.remove()"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="ui-alert ui-alert-danger no-print" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation fs-6"></i>
                        <span><?php echo htmlspecialchars($_SESSION['error_message']); unset($_SESSION['error_message']); ?></span>
                    </div>
                    <button type="button" class="btn-close shadow-none" onclick="this.parentElement.remove()"></button>
                </div>
            <?php endif; ?>

            <!-- Render Main View Content -->
            <?php echo $content ?? ''; ?>

            <!-- Printable Footer Stamp Block -->
            <div class="print-footer">
                <div class="row pt-4">
                    <div class="col-6">
                        <p class="mb-1 fw-bold">Attending Medical Practitioner:</p>
                        <p class="text-muted mb-4"><?php echo htmlspecialchars($currentUserName ?? 'Dr. I.K Holiness'); ?> (Medical Officer)</p>
                        <div style="border-bottom: 1px dashed #64748b; width: 180px; height: 25px;"></div>
                        <small class="text-muted">Doctor Signature / Date</small>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-1 fw-bold">Official Stamp & Verification:</p>
                        <div style="display: inline-block; border: 2px dashed #94a3b8; width: 130px; height: 60px; border-radius: 6px;"></div>
                    </div>
                </div>
                <div class="text-center mt-3 pt-2 border-top text-muted" style="font-size: 7.5pt;">
                    I.K Holiness Home Care Services &bull; Pankrono, Kumasi &bull; 0241974447 / 0550974126 &bull; Confidential Medical Document
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar-wrapper');
            const backdrop = document.getElementById('sidebar-backdrop');
            sidebar.classList.toggle('show');
            backdrop.classList.toggle('show');
        }
    </script>
</body>
</html>
