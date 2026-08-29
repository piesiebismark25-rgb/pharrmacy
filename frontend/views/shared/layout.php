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
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            /* Strict High-Contrast Color System */
            --bg-base: #080d0c;
            --bg-subtle: #0d1514;
            --surface-card: #121e1b;
            --surface-card-hover: #162622;
            --surface-elevated: #1a2c28;
            --border-subtle: rgba(255, 255, 255, 0.07);
            --border-active: rgba(45, 212, 191, 0.35);
            --border-focus: #14b8a6;
            
            /* Text Hierarchy */
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            
            /* Single Primary Accent (Emerald/Teal 600-400) */
            --accent-main: #10b981;
            --accent-teal: #14b8a6;
            --accent-glow: rgba(20, 184, 166, 0.2);
            --accent-subtle: rgba(20, 184, 166, 0.1);
            
            /* Semantic Colors */
            --success: #10b981;
            --success-subtle: rgba(16, 185, 129, 0.12);
            --warning: #f59e0b;
            --warning-subtle: rgba(245, 158, 11, 0.12);
            --danger: #f43f5e;
            --danger-subtle: rgba(244, 63, 94, 0.12);
            --info: #0ea5e9;
            --info-subtle: rgba(14, 165, 233, 0.12);

            --sidebar-width: 270px;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-base);
            background-image: 
                radial-gradient(at 0% 0%, rgba(20, 184, 166, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(16, 185, 129, 0.05) 0px, transparent 50%);
            background-attachment: fixed;
            color: var(--text-primary);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.02em;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--bg-subtle);
            border-right: 1px solid var(--border-subtle);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.2) 0%, rgba(16, 185, 129, 0.1) 100%);
            border: 1px solid var(--border-active);
            border-radius: var(--radius-md);
            box-shadow: 0 0 16px var(--accent-glow);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
            letter-spacing: 0.02em;
        }

        .brand-tagline {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--accent-teal);
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 16px 12px;
            margin: 0;
            flex: 1;
            overflow-y: auto;
        }

        .menu-category {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            color: var(--text-muted);
            padding: 12px 14px 6px 14px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: var(--radius-sm);
            transition: all 0.15s ease-in-out;
            margin-bottom: 3px;
            position: relative;
        }

        .sidebar-link i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            color: var(--text-muted);
            transition: color 0.15s ease-in-out;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.04);
        }

        .sidebar-link:hover i {
            color: var(--accent-teal);
        }

        .sidebar-link.active {
            color: #ffffff;
            background-color: var(--surface-card);
            border: 1px solid var(--border-active);
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar-link.active i {
            color: var(--accent-teal);
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 25%;
            height: 50%;
            width: 3px;
            background-color: var(--accent-teal);
            border-radius: 0 4px 4px 0;
        }

        .sidebar-footer {
            padding: 16px 14px;
            border-top: 1px solid var(--border-subtle);
            background-color: rgba(0, 0, 0, 0.15);
        }

        .sidebar-footer .doctor-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 10px;
            border-radius: var(--radius-md);
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
        }

        .avatar-box {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981 0%, #0d9488 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        /* Main Content Wrapper */
        #page-content-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Topbar Header */
        .topbar {
            height: 72px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgba(13, 21, 20, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-subtle);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .topbar-left h1 {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
            color: #ffffff;
        }

        .topbar-left p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Content Container */
        .main-container {
            padding: 32px;
            flex: 1;
        }

        /* Card & Elevation Design System */
        .ui-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            transition: all 0.2s ease-in-out;
            position: relative;
        }

        .ui-card:hover {
            border-color: rgba(255, 255, 255, 0.12);
        }

        .ui-card-interactive:hover {
            transform: translateY(-2px);
            border-color: var(--border-active);
            box-shadow: 0 8px 24px rgba(20, 184, 166, 0.12);
        }

        /* Form Inputs & Controls */
        .form-label {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
            display: block;
        }

        .form-control, .form-select {
            background-color: var(--bg-subtle) !important;
            border: 1px solid var(--border-subtle) !important;
            color: var(--text-primary) !important;
            font-size: 0.875rem;
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            min-height: 42px;
            transition: all 0.15s ease-in-out;
        }

        .form-control:focus, .form-select:focus {
            background-color: var(--surface-card) !important;
            border-color: var(--border-focus) !important;
            box-shadow: 0 0 0 3px var(--accent-glow) !important;
            color: #ffffff !important;
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* Custom Modern Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, #10b981 0%, #0d9488 100%);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.25);
            transition: all 0.15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #059669 0%, #0f766e 100%);
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.35);
            transform: translateY(-1px);
        }

        .btn-secondary-custom {
            background-color: var(--surface-elevated);
            border: 1px solid var(--border-subtle);
            color: var(--text-primary) !important;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.15s ease-in-out;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-secondary-custom:hover {
            background-color: var(--surface-card-hover);
            border-color: rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
        }

        .btn-print-custom {
            background-color: rgba(14, 165, 233, 0.12);
            border: 1px solid rgba(14, 165, 233, 0.3);
            color: #38bdf8 !important;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .btn-print-custom:hover {
            background-color: rgba(14, 165, 233, 0.22);
            color: #7dd3fc !important;
            border-color: #38bdf8;
            transform: translateY(-1px);
        }

        /* Modern High-Contrast Tables */
        .ui-table-container {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
        }

        .ui-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .ui-table th {
            background-color: rgba(255, 255, 255, 0.02);
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .ui-table td {
            background-color: transparent !important;
            color: var(--text-secondary);
            font-size: 0.875rem;
            padding: 16px 20px;
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
            background-color: rgba(255, 255, 255, 0.02) !important;
            color: var(--text-primary);
        }

        /* Status & Category Badges */
        .badge-pill-custom {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
            letter-spacing: 0.02em;
        }

        .badge-emerald {
            background-color: var(--success-subtle);
            color: #34d399;
            border: 1px solid rgba(52, 211, 153, 0.25);
        }

        .badge-amber {
            background-color: var(--warning-subtle);
            color: #fbbf24;
            border: 1px solid rgba(251, 191, 36, 0.25);
        }

        .badge-rose {
            background-color: var(--danger-subtle);
            color: #fb7185;
            border: 1px solid rgba(251, 113, 133, 0.25);
        }

        .badge-sky {
            background-color: var(--info-subtle);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.25);
        }

        .badge-zinc {
            background-color: rgba(255, 255, 255, 0.06);
            color: var(--text-secondary);
            border: 1px solid var(--border-subtle);
        }

        /* Alert Callouts */
        .ui-alert {
            padding: 14px 18px;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            border: 1px solid transparent;
        }

        .ui-alert-success {
            background-color: var(--success-subtle);
            border-color: rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
        }

        .ui-alert-danger {
            background-color: var(--danger-subtle);
            border-color: rgba(244, 63, 94, 0.3);
            color: #fda4af;
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
            #sidebar-wrapper, .topbar, .btn-print-custom, .btn-primary-custom, .btn-secondary-custom, .no-print, .btn-close, .alert {
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
                left: -270px;
            }
            #sidebar-wrapper.show {
                left: 0;
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

    <!-- Sidebar Navigation -->
    <aside id="sidebar-wrapper">
        <div>
            <div class="sidebar-header">
                <a href="<?php echo APP_URL; ?>/dashboard" class="brand-logo-wrap">
                    <div class="brand-icon">
                        <!-- Custom Brand SVG Crest -->
                        <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="28" height="28" rx="8" fill="#0d9488" fill-opacity="0.2" stroke="#2dd4bf" stroke-width="1.5"/>
                            <path d="M16 7V25M7 16H25" stroke="#2dd4bf" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="16" cy="16" r="4" fill="#10b981" stroke="#ffffff" stroke-width="1.2"/>
                        </svg>
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
                        <span>Executive Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo APP_URL; ?>/clients" class="sidebar-link <?php echo $currentRoute === 'clients' ? 'active' : ''; ?>">
                        <i class="fa-solid fa-user-group"></i>
                        <span>Patient Directory</span>
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
                        <span>Appointments Schedule</span>
                    </a>
                </li>

                <li class="menu-category">Finance & Invoicing</li>
                <li>
                    <a href="<?php echo APP_URL; ?>/billing" class="sidebar-link <?php echo $currentRoute === 'billing' ? 'active' : ''; ?>">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span>Billing & Invoices</span>
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
                        <span>Printable Reports</span>
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
        </div>

        <div class="sidebar-footer">
            <div class="doctor-badge mb-2">
                <div class="avatar-box">
                    <?php echo strtoupper(substr($currentUserName ?? 'DR', 0, 2)); ?>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <div class="fw-semibold text-truncate text-white" style="font-size: 0.85rem;"><?php echo htmlspecialchars($currentUserName ?? 'Doctor'); ?></div>
                    <div class="text-muted text-truncate" style="font-size: 0.72rem; text-transform: uppercase;"><?php echo htmlspecialchars($currentRole ?? 'Attending'); ?></div>
                </div>
            </div>
            <a href="<?php echo APP_URL; ?>/logout" class="sidebar-link text-danger py-2" style="margin-bottom: 0;">
                <i class="fa-solid fa-arrow-right-from-bracket text-danger"></i>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div id="page-content-wrapper">
        <!-- Top Bar Header -->
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-secondary-custom d-lg-none px-2 py-1" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="topbar-left">
                    <h1><?php echo $pageHeading ?? 'Dashboard'; ?></h1>
                    <p><?php echo $pageSubheading ?? 'I.K Holiness Home Care Services Management'; ?></p>
                </div>
            </div>

            <div class="topbar-actions">
                <button onclick="window.print()" class="btn-print-custom">
                    <i class="fa-solid fa-print"></i>
                    <span class="d-none d-sm-inline">Print View</span>
                </button>
                <a href="<?php echo APP_URL; ?>/clients/create" class="btn-primary-custom">
                    <i class="fa-solid fa-user-plus"></i>
                    <span class="d-none d-sm-inline">Register Patient</span>
                </a>
            </div>
        </header>

        <!-- Printable Document Header (Appears only on paper/PDF export) -->
        <div class="print-only-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="fw-bold text-dark mb-0">I.K HOLINESS HOME CARE SERVICES</h2>
                    <p class="text-secondary fw-semibold mb-1" style="font-size: 11pt;">"YOUR HEALTH IS OUR LIFE"</p>
                    <small class="text-muted d-block">
                        <strong>Location:</strong> Pankrono, Kumasi, Ghana &bull; 
                        <strong>Tel:</strong> 0241974447 / 0550974126 &bull; 
                        <strong>Email:</strong> kisaiahh@icloud.com
                    </small>
                </div>
                <div class="text-end">
                    <span class="badge bg-dark text-white p-2">OFFICIAL MEDICAL RECORD</span>
                    <div class="mt-2 text-muted" style="font-size: 9pt;">Printed on: <?php echo date('d/m/Y H:i A'); ?></div>
                </div>
            </div>
        </div>

        <!-- Main Page Body -->
        <main class="main-container">
            <!-- Toast / Notifications -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="ui-alert ui-alert-success no-print" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-circle-check fs-5"></i>
                        <span><?php echo htmlspecialchars($_SESSION['success_message']); unset($_SESSION['success_message']); ?></span>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none" onclick="this.parentElement.remove()"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="ui-alert ui-alert-danger no-print" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation fs-5"></i>
                        <span><?php echo htmlspecialchars($_SESSION['error_message']); unset($_SESSION['error_message']); ?></span>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none" onclick="this.parentElement.remove()"></button>
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
                        <div style="border-bottom: 1px dashed #64748b; width: 200px; height: 30px;"></div>
                        <small class="text-muted">Doctor Signature / Date</small>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-1 fw-bold">Official Stamp & Verification:</p>
                        <div style="display: inline-block; border: 2px dashed #94a3b8; width: 140px; height: 70px; border-radius: 8px; margin-top: 5px;"></div>
                    </div>
                </div>
                <div class="text-center mt-4 pt-2 border-top text-muted" style="font-size: 8pt;">
                    I.K Holiness Home Care Services &bull; Pankrono, Kumasi &bull; 0241974447 / 0550974126 &bull; Confidential Medical Document
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar-wrapper').classList.toggle('show');
        }
    </script>
</body>
</html>
