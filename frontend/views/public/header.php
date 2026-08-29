<?php
if (!defined('APP_NAME')) {
    require_once __DIR__ . '/../../../backend/config/config.php';
}

$pageTitle = $pageTitle ?? 'I.K HOLINESS HOME CARE SERVICES - Premier Domiciliary Healthcare';
$currentPage = $currentPage ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="I.K Holiness Home Care Services - Premier physician-directed domiciliary nursing, diagnostics, wound care, catheterization, and stroke rehabilitation in Pankrono, Kumasi, Ghana.">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <!-- Google Fonts: Plus Jakarta Sans & Inter & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 Pro / Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --font-main: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            --font-mono: 'JetBrains Mono', monospace;

            /* Color Tokens */
            --brand-navy: #0b132b;
            --brand-dark: #0f172a;
            --brand-primary: #2563eb;
            --brand-primary-hover: #1d4ed8;
            --brand-primary-light: #eff6ff;
            --brand-purple: #7c3aed;
            --brand-emerald: #059669;
            --brand-amber: #d97706;
            --brand-rose: #e11d48;

            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;

            --bg-base: #ffffff;
            --bg-subtle: #f8fafc;
            --bg-muted: #f1f5f9;

            --border-subtle: #e2e8f0;
            --border-strong: #cbd5e1;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-xl: 24px;
        }

        body {
            font-family: var(--font-main);
            color: var(--text-primary);
            background-color: var(--bg-base);
            line-height: 1.6;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .font-mono {
            font-family: var(--font-mono);
        }

        /* 1. Header Top Announcement Bar */
        .announcement-bar {
            background-color: #0b132b;
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.78rem;
            padding: 7px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .announcement-bar a {
            color: #93c5fd;
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .announcement-bar a:hover {
            color: #ffffff;
        }

        /* 2. Frosted Glass Sticky Navbar */
        .public-navbar {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            position: sticky;
            top: 0;
            z-index: 1040;
            padding: 14px 0;
            transition: all 0.2s ease;
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-icon-sq {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            color: #ffffff;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
            flex-shrink: 0;
        }

        .brand-text-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--brand-dark);
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin-bottom: 1px;
        }

        .brand-text-sub {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--brand-primary);
            display: block;
        }

        .nav-link-custom {
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .nav-link-custom:hover {
            color: var(--brand-primary);
            background-color: var(--brand-primary-light);
        }

        .nav-link-custom.active {
            color: var(--brand-primary);
            background-color: var(--brand-primary-light);
            font-weight: 700;
        }

        .helpline-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 9999px;
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: var(--brand-dark);
            font-size: 0.8125rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .helpline-pill:hover {
            background-color: var(--brand-primary-light);
            border-color: #bfdbfe;
            color: var(--brand-primary);
        }

        .btn-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            border-radius: 10px;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            color: #ffffff !important;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-cta-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
            color: #ffffff;
        }

        .btn-cta-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            border-radius: 10px;
            background-color: #ffffff;
            border: 1px solid var(--border-strong);
            color: var(--brand-dark);
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .btn-cta-secondary:hover {
            background-color: #f8fafc;
            border-color: #94a3b8;
            color: var(--brand-primary);
        }

        /* 3. Section Containers & Banners */
        .section-py {
            padding: 68px 0;
        }

        .page-header-banner {
            padding: 60px 0 48px 0;
            background: linear-gradient(180deg, #eff6ff 0%, #ffffff 100%);
            border-bottom: 1px solid var(--border-subtle);
        }

        .badge-pill-custom {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .badge-blue { background-color: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8; }
        .badge-purple { background-color: #faf5ff; border: 1px solid #e9d5ff; color: #7e22ce; }
        .badge-emerald { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }
        .badge-rose { background-color: #fff1f2; border: 1px solid #fecdd3; color: #be123c; }

        /* 4. Luxury Cards & Components */
        .clean-service-card {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 26px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.03);
        }

        .clean-service-card:hover {
            transform: translateY(-4px);
            border-color: #cbd5e1;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .clean-service-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 18px;
        }

        .clean-service-title {
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--brand-dark);
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }

        .clean-service-desc {
            font-size: 0.84rem;
            color: var(--text-muted);
            line-height: 1.55;
            margin-bottom: 16px;
        }

        .clean-service-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .service-mini-pill {
            font-size: 0.7rem;
            font-weight: 600;
            color: #475569;
            background-color: #f1f5f9;
            padding: 3px 8px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }

        .btn-clean-service {
            font-size: 0.84rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: transform 0.15s ease;
            padding-top: 12px;
            border-top: 1px solid var(--border-subtle);
        }

        .btn-clean-service:hover {
            transform: translateX(4px);
        }

        .bg-soft-blue { background-color: #eff6ff; }
        .bg-soft-purple { background-color: #faf5ff; }
        .bg-soft-emerald { background-color: #f0fdf4; }
        .bg-soft-amber { background-color: #fff1f2; }
        .text-purple { color: #7c3aed !important; }

        /* Form Controls */
        .form-label-custom {
            font-size: 0.78rem;
            font-weight: 700;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 6px;
            display: block;
        }

        .form-control-custom, .form-select-custom {
            width: 100%;
            padding: 11px 14px;
            border-radius: 9px;
            border: 1px solid var(--border-strong);
            font-size: 0.875rem;
            color: var(--text-primary);
            background-color: #ffffff;
            transition: all 0.15s ease;
        }

        .form-control-custom:focus, .form-select-custom:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            outline: none;
        }

        /* 5. Mobile Drawer */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: #ffffff;
                border: 1px solid var(--border-subtle);
                border-radius: var(--radius-md);
                padding: 16px;
                margin-top: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }
        }
    </style>
</head>
<body>

    <!-- Top Info Ribbon -->
    <div class="announcement-bar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <span><i class="fa-solid fa-location-dot text-primary me-1"></i> Pankrono, Kumasi, Ghana</span>
                <span>&bull;</span>
                <span><i class="fa-solid fa-clock text-primary me-1"></i> 24/7 On-Call Home Nursing</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="tel:0241974447"><i class="fa-solid fa-phone me-1"></i> 0241974447 / 0550974126</a>
                <span>&bull;</span>
                <a href="<?php echo APP_URL; ?>/login"><i class="fa-solid fa-lock me-1"></i> Staff Portal</a>
            </div>
        </div>
    </div>

    <!-- Frosted Sticky Navbar -->
    <header class="public-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            
            <!-- Brand Monogram & Title -->
            <a href="<?php echo APP_URL; ?>/" class="brand-logo-wrap">
                <div class="brand-icon-sq">
                    <i class="fa-solid fa-house-medical"></i>
                </div>
                <div>
                    <div class="brand-text-title">I.K HOLINESS</div>
                    <span class="brand-text-sub">Home Care Services</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="d-none d-lg-flex align-items-center gap-1">
                <a href="<?php echo APP_URL; ?>/" class="nav-link-custom <?php echo $currentPage === 'home' ? 'active' : ''; ?>">Home</a>
                <a href="<?php echo APP_URL; ?>/services" class="nav-link-custom <?php echo $currentPage === 'services' ? 'active' : ''; ?>">Services</a>
                <a href="<?php echo APP_URL; ?>/about" class="nav-link-custom <?php echo $currentPage === 'about' ? 'active' : ''; ?>">About Us</a>
                <a href="<?php echo APP_URL; ?>/contact" class="nav-link-custom <?php echo $currentPage === 'contact' ? 'active' : ''; ?>">Contact</a>
            </nav>

            <!-- Action Area -->
            <div class="d-flex align-items-center gap-2">
                <a href="tel:0241974447" class="helpline-pill d-none d-sm-inline-flex">
                    <i class="fa-solid fa-phone text-primary"></i>
                    <span>0241974447</span>
                </a>
                <a href="<?php echo APP_URL; ?>/request-care" class="btn-cta-primary">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Request Care</span>
                </a>

                <!-- Mobile Hamburger Toggle -->
                <button class="navbar-toggler d-lg-none border-0 p-2 text-dark shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobilePublicNav" aria-controls="mobilePublicNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fs-4"></i>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer -->
        <div class="container d-lg-none collapse" id="mobilePublicNav">
            <div class="d-flex flex-column gap-2 pt-3 pb-2">
                <a href="<?php echo APP_URL; ?>/" class="nav-link-custom <?php echo $currentPage === 'home' ? 'active' : ''; ?>">Home</a>
                <a href="<?php echo APP_URL; ?>/services" class="nav-link-custom <?php echo $currentPage === 'services' ? 'active' : ''; ?>">Services Catalog</a>
                <a href="<?php echo APP_URL; ?>/about" class="nav-link-custom <?php echo $currentPage === 'about' ? 'active' : ''; ?>">About Practice</a>
                <a href="<?php echo APP_URL; ?>/contact" class="nav-link-custom <?php echo $currentPage === 'contact' ? 'active' : ''; ?>">Contact Us</a>
                <hr class="my-2 text-muted">
                <a href="<?php echo APP_URL; ?>/login" class="nav-link-custom text-muted small"><i class="fa-solid fa-lock me-1"></i> Staff Login</a>
            </div>
        </div>
    </header>
