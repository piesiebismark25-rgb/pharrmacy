<?php
if (!defined('APP_NAME')) {
    require_once __DIR__ . '/../../../backend/config/config.php';
}
$pageTitle  = $pageTitle  ?? 'I.K HOLINESS HOME CARE SERVICES – Premier Domiciliary Healthcare';
$currentPage = $currentPage ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="I.K Holiness Home Care Services – Licensed physician-directed domiciliary nursing, wound care, catheterization &amp; rehabilitation in Kumasi, Ghana.">
<title><?php echo htmlspecialchars($pageTitle); ?></title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Serif+Display:ital@0;1&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
/* ============================================================
   IK HOLINESS – DESIGN SYSTEM  (public site)
   ============================================================ */
:root {
  /* Palette */
  --navy:        #07112b;
  --navy-800:    #0d1e48;
  --navy-700:    #132660;
  --sapphire:    #1a56db;
  --sapphire-l:  #2563eb;
  --sky:         #60a5fa;
  --teal:        #0d9488;
  --emerald:     #10b981;
  --violet:      #7c3aed;
  --rose:        #e11d48;
  --amber:       #d97706;
  --gold:        #f59e0b;

  --ink:         #0a0f1e;
  --ink-600:     #1e293b;
  --ink-500:     #334155;
  --ink-400:     #475569;
  --ink-300:     #64748b;
  --ink-200:     #94a3b8;
  --ink-100:     #cbd5e1;

  --surface:     #ffffff;
  --surface-2:   #f8fafc;
  --surface-3:   #f1f5f9;

  --border:      #e2e8f0;
  --border-2:    #cbd5e1;

  /* Fonts */
  --font-sans:   'DM Sans', system-ui, sans-serif;
  --font-serif:  'DM Serif Display', Georgia, serif;
  --font-mono:   'JetBrains Mono', monospace;

  /* Radii */
  --r-sm:   6px;
  --r-md:   12px;
  --r-lg:   18px;
  --r-xl:   28px;
  --r-full: 9999px;

  /* Shadows */
  --shadow-sm:  0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
  --shadow-md:  0 4px 16px rgba(0,0,0,.07);
  --shadow-lg:  0 12px 40px rgba(0,0,0,.09);
  --shadow-xl:  0 24px 64px rgba(0,0,0,.12);
}

/* ---- Base -------------------------------------------------- */
*, *::before, *::after { box-sizing: border-box; }

body {
  font-family: var(--font-sans);
  font-size: 15px;
  line-height: 1.65;
  color: var(--ink-400);
  background: var(--surface);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

h1,h2,h3,h4,h5,h6 {
  color: var(--ink);
  font-family: var(--font-sans);
  font-weight: 700;
  line-height: 1.2;
  letter-spacing: -0.02em;
}

.font-serif { font-family: var(--font-serif) !important; }
.font-mono  { font-family: var(--font-mono)  !important; }

a { color: inherit; text-decoration: none; }

/* ---- Utility ---------------------------------------------- */
.section-gap  { padding: 80px 0; }
.section-gap-sm { padding: 48px 0; }

.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--sapphire);
  margin-bottom: 12px;
}

.eyebrow::before {
  content:'';
  display:inline-block;
  width:18px;
  height:2px;
  background: var(--sapphire);
  border-radius: 2px;
}

.text-balance { text-wrap: balance; }

/* ---- Buttons ---------------------------------------------- */
.btn-primary-ik {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 11px 22px;
  font-size: 14px;
  font-weight: 600;
  border-radius: var(--r-md);
  background: var(--sapphire);
  color: #fff !important;
  border: none;
  box-shadow: 0 4px 20px rgba(26,86,219,.35);
  transition: all .2s ease;
  cursor: pointer;
}
.btn-primary-ik:hover {
  background: #1648c8;
  transform: translateY(-2px);
  box-shadow: 0 8px 28px rgba(26,86,219,.45);
}

.btn-ghost-ik {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 600;
  border-radius: var(--r-md);
  background: transparent;
  color: var(--ink);
  border: 1px solid var(--border-2);
  transition: all .18s ease;
}
.btn-ghost-ik:hover {
  background: var(--surface-2);
  border-color: var(--ink-200);
  color: var(--sapphire);
}

.btn-white-ik {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 11px 24px;
  font-size: 14px;
  font-weight: 700;
  border-radius: var(--r-md);
  background: #fff;
  color: var(--sapphire) !important;
  border: none;
  box-shadow: var(--shadow-md);
  transition: all .2s ease;
}
.btn-white-ik:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

/* ---- Top bar --------------------------------------------- */
.topbar {
  background: var(--navy);
  font-size: 12px;
  color: rgba(255,255,255,.6);
  padding: 7px 0;
  border-bottom: 1px solid rgba(255,255,255,.07);
}
.topbar a { color: rgba(255,255,255,.7); transition: color .15s; }
.topbar a:hover { color: #fff; }

/* ---- Navbar ---------------------------------------------- */
.ik-navbar {
  position: sticky;
  top: 0;
  z-index: 1050;
  background: rgba(255,255,255,.94);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
  padding: 13px 0;
}

.ik-logo {
  display: flex;
  align-items: center;
  gap: 11px;
}
.ik-logo-icon {
  width: 38px; height: 38px;
  border-radius: 10px;
  background: var(--sapphire);
  color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
  box-shadow: 0 4px 12px rgba(26,86,219,.3);
  flex-shrink: 0;
}
.ik-logo-name {
  font-size: 15px;
  font-weight: 800;
  color: var(--ink);
  letter-spacing: -.02em;
  line-height: 1.1;
}
.ik-logo-tagline {
  font-size: 10px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .08em;
  color: var(--sapphire);
}

.ik-nav a {
  font-size: 14px;
  font-weight: 500;
  color: var(--ink-500);
  padding: 6px 14px;
  border-radius: var(--r-sm);
  transition: all .15s;
}
.ik-nav a:hover { color: var(--sapphire); background: #eff6ff; }
.ik-nav a.active { color: var(--sapphire); font-weight: 600; }

.ik-phone-chip {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 14px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ink-500);
  background: var(--surface-2);
  border: 1px solid var(--border);
  border-radius: var(--r-full);
  transition: all .15s;
}
.ik-phone-chip:hover { background: #eff6ff; color: var(--sapphire); border-color: #bfdbfe; }

/* ---- Cards ----------------------------------------------- */
.ik-card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--r-lg);
  box-shadow: var(--shadow-sm);
  transition: all .24s ease;
}
.ik-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
  border-color: var(--border-2);
}

.icon-chip {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}
.icon-chip.blue    { background:#eff6ff; color: var(--sapphire); }
.icon-chip.purple  { background:#f5f3ff; color: var(--violet); }
.icon-chip.teal    { background:#f0fdfa; color: var(--teal); }
.icon-chip.rose    { background:#fff1f2; color: var(--rose); }
.icon-chip.emerald { background:#ecfdf5; color: var(--emerald); }
.icon-chip.amber   { background:#fffbeb; color: var(--amber); }
.icon-chip.navy    { background:var(--navy-800); color: var(--sky); }

/* ---- Tags / Badges --------------------------------------- */
.tag {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 3px 10px;
  font-size: 11px;
  font-weight: 600;
  border-radius: var(--r-full);
  letter-spacing: .03em;
}
.tag.blue    { background:#eff6ff; color:#1d4ed8; border:1px solid #bfdbfe; }
.tag.purple  { background:#f5f3ff; color:#6d28d9; border:1px solid #ddd6fe; }
.tag.teal    { background:#f0fdfa; color:#0f766e; border:1px solid #99f6e4; }
.tag.rose    { background:#fff1f2; color:#be123c; border:1px solid #fecdd3; }
.tag.emerald { background:#ecfdf5; color:#065f46; border:1px solid #6ee7b7; }
.tag.slate   { background:#f1f5f9; color:#475569; border:1px solid #e2e8f0; }
.tag.gold    { background:#fffbeb; color:#92400e; border:1px solid #fde68a; }
.tag.navy    { background:var(--navy); color:#93c5fd; border:1px solid rgba(255,255,255,.1); }

/* ---- Forms ----------------------------------------------- */
.ik-label {
  display: block;
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .06em;
  color: var(--ink-500);
  margin-bottom: 6px;
}

.ik-input, .ik-select, .ik-textarea {
  width: 100%;
  padding: 10px 14px;
  font-size: 14px;
  font-family: var(--font-sans);
  color: var(--ink);
  background: var(--surface);
  border: 1px solid var(--border-2);
  border-radius: var(--r-md);
  transition: all .15s;
  outline: none;
  appearance: none;
  -webkit-appearance: none;
}
.ik-input:focus, .ik-select:focus, .ik-textarea:focus {
  border-color: var(--sapphire-l);
  box-shadow: 0 0 0 3px rgba(37,99,235,.14);
}
.ik-input::placeholder, .ik-textarea::placeholder { color: var(--ink-200); }

/* ---- Service mini-pill ----------------------------------- */
.spill {
  font-size: 11px;
  font-weight: 600;
  color: var(--ink-400);
  background: var(--surface-2);
  border: 1px solid var(--border);
  border-radius: 6px;
  padding: 2px 8px;
}

/* ---- Link arrow ------------------------------------------ */
.link-arrow {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  font-weight: 600;
  color: var(--sapphire);
  transition: gap .15s;
}
.link-arrow:hover { gap: 10px; }

/* ---- Section divider line -------------------------------- */
.divider-line {
  width: 40px;
  height: 3px;
  border-radius: 2px;
  background: var(--sapphire);
  margin-bottom: 20px;
}

/* ---- Stat counter pill ----------------------------------- */
.stat-block {
  text-align: center;
  padding: 20px 16px;
}
.stat-num {
  font-family: var(--font-serif);
  font-size: 2.4rem;
  color: var(--ink);
  line-height: 1;
  margin-bottom: 4px;
}
.stat-label {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .07em;
  color: var(--ink-300);
}

/* ---- Step circle ----------------------------------------- */
.step-num {
  width: 36px; height: 36px;
  border-radius: 50%;
  background: var(--sapphire);
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(26,86,219,.3);
}

/* ---- Page hero banner (inner pages) ---------------------- */
.page-hero {
  background: linear-gradient(135deg, var(--navy) 0%, #1e3a8a 100%);
  padding: 64px 0 52px;
  color: #fff;
  position: relative;
  overflow: hidden;
}
.page-hero::before {
  content:'';
  position: absolute;
  top: -60px; right: -60px;
  width: 400px; height: 400px;
  border-radius: 50%;
  background: rgba(255,255,255,.03);
  pointer-events: none;
}
.page-hero::after {
  content:'';
  position: absolute;
  bottom: -80px; left: -40px;
  width: 280px; height: 280px;
  border-radius: 50%;
  background: rgba(255,255,255,.025);
  pointer-events: none;
}
.page-hero h1 { color: #fff; font-size: clamp(1.6rem,3.5vw,2.2rem); }
.page-hero .lead { color: rgba(255,255,255,.75); font-size: 15px; }

/* ---- Mobile nav ------------------------------------------ */
@media (max-width:991px) {
  .ik-mobile-menu {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--r-lg);
    margin-top: 10px;
    padding: 16px;
    box-shadow: var(--shadow-xl);
  }
  .ik-mobile-menu a {
    display: block;
    padding: 9px 12px;
    font-size: 14px;
    font-weight: 500;
    color: var(--ink-500);
    border-radius: var(--r-sm);
    transition: all .14s;
  }
  .ik-mobile-menu a:hover, .ik-mobile-menu a.active {
    background: #eff6ff;
    color: var(--sapphire);
  }
}

/* ---- Alerts ---------------------------------------------- */
.ik-alert-success {
  background: #f0fdf4;
  border: 1px solid #bbf7d0;
  color: #14532d;
  border-radius: var(--r-md);
  padding: 12px 16px;
  font-size: 13px;
}
.ik-alert-error {
  background: #fff1f2;
  border: 1px solid #fecdd3;
  color: #881337;
  border-radius: var(--r-md);
  padding: 12px 16px;
  font-size: 13px;
}

/* ---- Footer ---------------------------------------------- */
.ik-footer {
  background: var(--navy);
  color: rgba(255,255,255,.55);
  font-size: 13px;
  padding: 60px 0 28px;
  border-top: 1px solid rgba(255,255,255,.06);
  margin-top: auto;
}
.ik-footer h6 {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .1em;
  color: rgba(255,255,255,.35);
  margin-bottom: 14px;
}
.ik-footer a { color: rgba(255,255,255,.55); transition: color .15s; }
.ik-footer a:hover { color: #fff; }
.ik-footer .footer-brand-name { font-size: 15px; font-weight: 800; color: #fff; letter-spacing: -.01em; }
.ik-footer .footer-brand-sub  { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: var(--sky); }
.ik-footer .footer-divider { border-color: rgba(255,255,255,.08); margin: 36px 0 24px; }
.ik-footer .copy { font-size: 12px; color: rgba(255,255,255,.3); }
.ik-footer li { margin-bottom: 9px; list-style: none; }
.ik-footer ul { padding: 0; margin: 0; }

/* ---- Decorative rings ------------------------------------ */
.deco-ring {
  position: absolute;
  border-radius: 50%;
  border: 1px solid;
  pointer-events: none;
}

/* ---- Smooth scroll --------------------------------------- */
html { scroll-behavior: smooth; }

/* ---- Print ----------------------------------------------- */
@media print {
  .ik-navbar, .topbar, .ik-footer { display: none; }
}
</style>
</head>
<body>

<!-- ╔═══ TOP BAR ═══╗ -->
<div class="topbar d-none d-md-block">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-4">
      <span><i class="fa-solid fa-location-dot me-1" style="color:#60a5fa"></i> Pankrono, Kumasi — Ashanti Region</span>
      <span><i class="fa-solid fa-clock me-1" style="color:#60a5fa"></i> Available 24 / 7 · On-Call Nursing Dispatch</span>
    </div>
    <a href="tel:0241974447"><i class="fa-solid fa-phone me-1" style="color:#60a5fa"></i> 0241974447 &nbsp;/&nbsp; 0550974126</a>
  </div>
</div>

<!-- ╔═══ NAVBAR ═══╗ -->
<header class="ik-navbar">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="<?php echo APP_URL; ?>/" class="ik-logo">
      <div class="ik-logo-icon"><i class="fa-solid fa-house-medical"></i></div>
      <div>
        <div class="ik-logo-name">I.K HOLINESS</div>
        <div class="ik-logo-tagline">Home Care Services</div>
      </div>
    </a>

    <nav class="ik-nav d-none d-lg-flex align-items-center gap-1">
      <a href="<?php echo APP_URL; ?>/"          class="<?php echo $currentPage==='home'        ?'active':''; ?>">Home</a>
      <a href="<?php echo APP_URL; ?>/services"  class="<?php echo $currentPage==='services'    ?'active':''; ?>">Services</a>
      <a href="<?php echo APP_URL; ?>/about"     class="<?php echo $currentPage==='about'       ?'active':''; ?>">About</a>
      <a href="<?php echo APP_URL; ?>/contact"   class="<?php echo $currentPage==='contact'     ?'active':''; ?>">Contact</a>
    </nav>

    <div class="d-flex align-items-center gap-2">
      <a href="tel:0241974447" class="ik-phone-chip d-none d-md-inline-flex">
        <i class="fa-solid fa-phone" style="color:var(--sapphire)"></i> 0241974447
      </a>
      <a href="<?php echo APP_URL; ?>/request-care" class="btn-primary-ik">
        <i class="fa-solid fa-calendar-check"></i> Book Care
      </a>
      <button class="d-lg-none border-0 bg-transparent p-1 ms-1" style="color:var(--ink);font-size:20px"
              data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-label="Menu">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>

  </div>

  <div class="container d-lg-none">
    <div id="mobileMenu" class="collapse ik-mobile-menu">
      <a href="<?php echo APP_URL; ?>/"         class="<?php echo $currentPage==='home'     ?'active':'';?>">Home</a>
      <a href="<?php echo APP_URL; ?>/services" class="<?php echo $currentPage==='services' ?'active':'';?>">Services</a>
      <a href="<?php echo APP_URL; ?>/about"    class="<?php echo $currentPage==='about'    ?'active':'';?>">About Us</a>
      <a href="<?php echo APP_URL; ?>/contact"  class="<?php echo $currentPage==='contact'  ?'active':'';?>">Contact</a>
    </div>
  </div>
</header>
