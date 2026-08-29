<?php
$currentPage = $currentPage ?? 'home';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'I.K HOLINESS HOME CARE SERVICES - "Your Health is Our Life"'; ?></title>
    <meta name="description" content="Professional clinical home care, nursing, vital signs monitoring, wound care, and post-operative recovery in Pankrono, Kumasi.">
    
    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --bg-base: #f8fafc;
            --bg-subtle: #f1f5f9;
            --surface-card: #ffffff;
            --border-subtle: #e2e8f0;
            --border-strong: #cbd5e1;
            --accent-main: #2563eb;
            --accent-dark: #1d4ed8;
            --accent-light: #eff6ff;
            --accent-border: #bfdbfe;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-base);
            color: var(--text-primary);
            font-size: 0.875rem;
            margin: 0;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        /* Top Navbar */
        .public-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-subtle);
            position: sticky;
            top: 0;
            z-index: 1050;
            padding: 12px 0;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03);
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand-icon-box {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
            color: #ffffff;
            font-size: 1rem;
        }

        .nav-link-custom {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            padding: 7px 14px;
            border-radius: 8px;
            transition: all 0.15s ease;
        }

        .nav-link-custom:hover {
            color: var(--accent-main);
            background-color: var(--accent-light);
        }

        .nav-link-custom.active {
            color: var(--accent-main);
            background-color: var(--accent-light);
            font-weight: 700;
        }

        .btn-cta-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: 1px solid #1d4ed8;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.25);
            transition: all 0.15s ease;
        }

        .btn-cta-primary:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transform: translateY(-1px);
        }

        .btn-cta-secondary {
            background-color: #ffffff;
            border: 1px solid var(--border-strong);
            color: var(--text-primary) !important;
            font-weight: 600;
            font-size: 0.8125rem;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.15s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.04);
        }

        .btn-cta-secondary:hover {
            background-color: var(--bg-subtle);
            border-color: #94a3b8;
        }

        /* Hero Section with Generous Padding */
        .hero-section {
            padding: 92px 0 68px 0;
            position: relative;
            background: radial-gradient(circle at 50% 12%, rgba(37, 99, 235, 0.05) 0%, transparent 65%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 14px;
            border-radius: 9999px;
            background-color: var(--accent-light);
            border: 1px solid var(--accent-border);
            color: var(--accent-dark);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            margin-bottom: 22px;
        }

        .hero-title {
            font-size: clamp(2rem, 4.2vw, 2.9rem);
            font-weight: 800;
            line-height: 1.22;
            color: var(--text-primary);
            margin-bottom: 16px;
            letter-spacing: -0.025em;
        }

        .hero-title-accent {
            color: var(--accent-main);
        }

        .hero-desc {
            font-size: 0.98rem;
            color: var(--text-secondary);
            line-height: 1.6;
            max-width: 660px;
            margin: 0 auto 30px auto;
        }

        /* Page Banner Header */
        .page-header-banner {
            padding: 60px 0 44px 0;
            background: radial-gradient(circle at 50% 10%, rgba(37, 99, 235, 0.05) 0%, transparent 70%);
            border-bottom: 1px solid var(--border-subtle);
            text-align: center;
        }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            border-radius: 9999px;
            background-color: var(--accent-light);
            border: 1px solid var(--accent-border);
            color: var(--accent-dark);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .page-title {
            font-size: clamp(1.8rem, 3.8vw, 2.5rem);
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .page-desc {
            font-size: 0.98rem;
            color: var(--text-secondary);
            max-width: 640px;
            margin: 0 auto;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 54px 0 40px 0;
            }
            .page-header-banner {
                padding: 44px 0 32px 0;
            }
        }

        /* Section Layouts */
        .section-py {
            padding: 56px 0;
        }

        /* Modern Redesigned Service Pillar Cards */
        .pillar-card-modern {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            padding: 24px 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.03);
        }

        .pillar-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--pillar-accent-gradient, linear-gradient(90deg, #2563eb, #3b82f6));
            opacity: 0.9;
        }

        .pillar-card-modern:hover {
            transform: translateY(-4px);
            border-color: var(--pillar-border-hover, #bfdbfe);
            box-shadow: 0 14px 28px -4px rgba(15, 23, 42, 0.08), 0 6px 12px -2px rgba(15, 23, 42, 0.04);
        }

        .pillar-header-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .pillar-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background-color: var(--pillar-bg-soft, #eff6ff);
            border: 1px solid var(--pillar-border-soft, #dbeafe);
            color: var(--pillar-color, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
            transition: transform 0.2s ease;
        }

        .pillar-card-modern:hover .pillar-icon-box {
            transform: scale(1.05);
        }

        .pillar-badge {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 3px 8px;
            border-radius: 9999px;
            background-color: var(--pillar-bg-soft, #eff6ff);
            color: var(--pillar-color, #2563eb);
            border: 1px solid var(--pillar-border-soft, #dbeafe);
        }

        .pillar-card-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 2px;
            letter-spacing: -0.01em;
        }

        .pillar-card-subtitle {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 14px;
            display: block;
        }

        .procedure-tile-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 18px;
        }

        .procedure-tile {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 10px;
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            transition: all 0.15s ease-in-out;
            text-decoration: none;
            cursor: pointer;
        }

        .procedure-tile:hover {
            background-color: #ffffff;
            border-color: var(--pillar-border-soft, #cbd5e1);
            transform: translateX(2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
        }

        .procedure-tile-icon {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            color: var(--pillar-color, #2563eb);
            flex-shrink: 0;
            margin-top: 1px;
        }

        .procedure-tile-content {
            flex: 1;
            min-width: 0;
        }

        .procedure-tile-name {
            font-size: 0.8125rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.25;
            display: block;
        }

        .procedure-tile-desc {
            font-size: 0.7rem;
            color: var(--text-muted);
            line-height: 1.35;
            display: block;
            margin-top: 1px;
        }

        .pillar-card-footer {
            padding-top: 12px;
            border-top: 1px solid var(--border-subtle);
        }

        .pillar-action-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8125rem;
            font-weight: 700;
            color: var(--pillar-color, #2563eb);
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .pillar-action-link:hover {
            color: var(--pillar-color-dark, #1d4ed8);
        }

        .pillar-action-link i {
            transition: transform 0.2s ease;
        }

        .pillar-card-modern:hover .pillar-action-link i {
            transform: translateX(4px);
        }

        /* Specific Pillar Color Themes */
        .theme-sapphire {
            --pillar-color: #2563eb;
            --pillar-color-dark: #1d4ed8;
            --pillar-bg-soft: #eff6ff;
            --pillar-border-soft: #bfdbfe;
            --pillar-border-hover: #93c5fd;
            --pillar-accent-gradient: linear-gradient(90deg, #2563eb, #60a5fa);
        }

        .theme-indigo {
            --pillar-color: #6366f1;
            --pillar-color-dark: #4338ca;
            --pillar-bg-soft: #eef2ff;
            --pillar-border-soft: #c7d2fe;
            --pillar-border-hover: #a5b4fc;
            --pillar-accent-gradient: linear-gradient(90deg, #6366f1, #818cf8);
        }

        .theme-teal {
            --pillar-color: #0d9488;
            --pillar-color-dark: #0f766e;
            --pillar-bg-soft: #f0fdfa;
            --pillar-border-soft: #99f6e4;
            --pillar-border-hover: #5eead4;
            --pillar-accent-gradient: linear-gradient(90deg, #0d9488, #2dd4bf);
        }

        .theme-amber {
            --pillar-color: #d97706;
            --pillar-color-dark: #b45309;
            --pillar-bg-soft: #fffbeb;
            --pillar-border-soft: #fde68a;
            --pillar-border-hover: #fcd34d;
            --pillar-accent-gradient: linear-gradient(90deg, #d97706, #fbbf24);
        }

        /* Forms & Cards */
        .ui-card-modern {
            background-color: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 16px -2px rgba(0, 0, 0, 0.04);
        }

        .form-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 5px;
            display: block;
        }

        .form-control-custom, .form-select-custom {
            background-color: #ffffff;
            border: 1px solid var(--border-strong);
            color: var(--text-primary);
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 0.8125rem;
            transition: all 0.15s ease;
        }

        .form-control-custom:focus, .form-select-custom:focus {
            background-color: #ffffff;
            border-color: var(--accent-main);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
            color: var(--text-primary);
            outline: none;
        }
    </style>
</head>
<body>

    <!-- Public Navigation Bar -->
    <header class="public-navbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                
                <!-- Brand Logo (Clicking returns to home) -->
                <a href="<?php echo APP_URL; ?>/" class="brand-logo-wrap">
                    <div class="brand-icon-box">
                        <i class="fa-solid fa-house-medical"></i>
                    </div>
                    <div>
                        <span class="fw-bold text-dark d-block" style="font-size: 0.95rem; line-height: 1.15;">I.K HOLINESS</span>
                        <span style="font-size: 0.65rem; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 700; color: var(--accent-main);">Home Care Services</span>
                    </div>
                </a>

                <!-- Separate Multi-Page Navigation Menu -->
                <nav class="d-none d-lg-flex align-items-center gap-1">
                    <a href="<?php echo APP_URL; ?>/" class="nav-link-custom <?php echo $currentPage === 'home' ? 'active' : ''; ?>">Home</a>
                    <a href="<?php echo APP_URL; ?>/services" class="nav-link-custom <?php echo $currentPage === 'services' ? 'active' : ''; ?>">Services</a>
                    <a href="<?php echo APP_URL; ?>/about" class="nav-link-custom <?php echo $currentPage === 'about' ? 'active' : ''; ?>">About Us</a>
                    <a href="<?php echo APP_URL; ?>/request-care" class="nav-link-custom <?php echo $currentPage === 'request-care' ? 'active' : ''; ?>">Request Care</a>
                    <a href="<?php echo APP_URL; ?>/contact" class="nav-link-custom <?php echo $currentPage === 'contact' ? 'active' : ''; ?>">Contact</a>
                </nav>

                <div class="d-flex align-items-center gap-2">
                    <a href="tel:0241974447" class="btn-cta-secondary d-none d-sm-inline-flex">
                        <i class="fa-solid fa-phone" style="color: var(--accent-main);"></i> 0241974447
                    </a>
                    <a href="<?php echo APP_URL; ?>/request-care" class="btn-cta-primary">
                        <i class="fa-solid fa-calendar-check"></i> Book Visit
                    </a>
                </div>

            </div>
        </div>
    </header>
