<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I.K HOLINESS HOME CARE SERVICES - "Your Health is Our Life"</title>
    <meta name="description" content="Professional clinical home care, nursing, vital signs monitoring, wound care, and post-operative recovery in Pankrono, Kumasi.">
    
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --bg-base: #060a09;
            --bg-subtle: #0c1513;
            --surface-card: #111d1a;
            --surface-card-hover: #162824;
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-active: rgba(45, 212, 191, 0.35);
            --accent-main: #10b981;
            --accent-teal: #14b8a6;
            --accent-glow: rgba(20, 184, 166, 0.2);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-base);
            color: var(--text-primary);
            margin: 0;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.02em;
        }

        /* Glassmorphic Navbar */
        .public-navbar {
            background-color: rgba(6, 10, 9, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-subtle);
            position: sticky;
            top: 0;
            z-index: 1050;
            padding: 16px 0;
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.25) 0%, rgba(16, 185, 129, 0.12) 100%);
            border: 1px solid var(--border-active);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 16px var(--accent-glow);
        }

        .nav-link-custom {
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.9375rem;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.15s ease;
        }

        .nav-link-custom:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-portal-login {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.875rem;
            padding: 9px 18px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.15s ease;
        }

        .btn-portal-login:hover {
            background-color: var(--surface-card-hover);
            border-color: var(--border-active);
            color: #ffffff;
        }

        .btn-cta-primary {
            background: linear-gradient(135deg, #10b981 0%, #0d9488 100%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.35);
            transition: all 0.2s ease;
        }

        .btn-cta-primary:hover {
            background: linear-gradient(135deg, #059669 0%, #0f766e 100%);
            box-shadow: 0 6px 28px rgba(16, 185, 129, 0.5);
            transform: translateY(-2px);
            color: #ffffff;
        }

        .btn-cta-secondary {
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-subtle);
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .btn-cta-secondary:hover {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        /* Hero Section */
        .hero-section {
            padding: 90px 0 80px 0;
            position: relative;
            background-image: 
                radial-gradient(circle at 50% 10%, rgba(20, 184, 166, 0.15) 0%, transparent 60%),
                radial-gradient(circle at 90% 80%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 9999px;
            background-color: rgba(20, 184, 166, 0.1);
            border: 1px solid var(--border-active);
            color: var(--accent-teal);
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            margin-bottom: 24px;
        }

        .hero-title {
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .hero-title-accent {
            background: linear-gradient(135deg, #2dd4bf 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: 1.15rem;
            color: var(--text-secondary);
            line-height: 1.6;
            max-width: 680px;
            margin: 0 auto 36px auto;
        }

        /* Service Cards */
        .service-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            padding: 28px 24px;
            height: 100%;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-4px);
            border-color: var(--border-active);
            background-color: var(--surface-card-hover);
            box-shadow: 0 12px 30px rgba(20, 184, 166, 0.12);
        }

        .service-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background-color: rgba(20, 184, 166, 0.1);
            border: 1px solid rgba(20, 184, 166, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--accent-teal);
            margin-bottom: 20px;
        }

        .service-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .service-text {
            color: var(--text-secondary);
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 0;
        }

        /* Section Container */
        .section-py {
            padding: 90px 0;
        }

        .section-header {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 60px auto;
        }

        .section-subtitle {
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.8125rem;
            font-weight: 700;
            color: var(--accent-teal);
            margin-bottom: 10px;
            display: block;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 14px;
        }

        /* Booking Form Card */
        .booking-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 24px;
            padding: 44px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .form-control-custom, .form-select-custom {
            background-color: rgba(6, 10, 9, 0.7);
            border: 1px solid var(--border-subtle);
            color: #ffffff;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.9375rem;
            transition: all 0.15s ease;
        }

        .form-control-custom:focus, .form-select-custom:focus {
            background-color: rgba(6, 10, 9, 0.95);
            border-color: var(--accent-teal);
            box-shadow: 0 0 0 3px var(--accent-glow);
            color: #ffffff;
            outline: none;
        }

        /* Footer */
        .public-footer {
            background-color: var(--bg-subtle);
            border-top: 1px solid var(--border-subtle);
            padding: 60px 0 30px 0;
        }
    </style>
</head>
<body>

    <!-- Public Navigation Bar -->
    <header class="public-navbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                
                <a href="<?php echo APP_URL; ?>/" class="brand-logo-wrap">
                    <div class="brand-icon-box">
                        <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="28" height="28" rx="8" fill="#0d9488" fill-opacity="0.3" stroke="#2dd4bf" stroke-width="1.5"/>
                            <path d="M16 7V25M7 16H25" stroke="#2dd4bf" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="16" cy="16" r="4" fill="#10b981" stroke="#ffffff" stroke-width="1.2"/>
                        </svg>
                    </div>
                    <div>
                        <span class="brand-font fw-bold text-white d-block" style="font-size: 1.05rem; line-height: 1.1;">I.K HOLINESS</span>
                        <span class="text-teal" style="font-size: 0.72rem; letter-spacing: 0.08em; text-transform: uppercase; font-weight: 600; color: var(--accent-teal);">Home Care Services</span>
                    </div>
                </a>

                <nav class="d-none d-lg-flex align-items-center gap-1">
                    <a href="#services" class="nav-link-custom">Services</a>
                    <a href="#about" class="nav-link-custom">About Us</a>
                    <a href="#booking" class="nav-link-custom">Book Visit</a>
                    <a href="#contact" class="nav-link-custom">Contact</a>
                </nav>

                <div class="d-flex align-items-center gap-3">
                    <a href="tel:0241974447" class="btn-cta-secondary d-none d-sm-inline-flex px-3 py-2" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-phone text-teal" style="color: var(--accent-teal);"></i> 0241974447
                    </a>
                    <a href="<?php echo APP_URL; ?>/login" class="btn-portal-login">
                        <i class="fa-solid fa-user-doctor text-teal" style="color: var(--accent-teal);"></i>
                        <span>Doctor / Staff Portal</span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <div class="hero-badge">
                <i class="fa-solid fa-shield-heart"></i> Licensed Clinical & Domiciliary Nursing
            </div>
            
            <h1 class="hero-title">
                Compassionate Clinical Care in the <br>
                <span class="hero-title-accent">Comfort of Your Home</span>
            </h1>

            <p class="hero-desc">
                Dedicated healthcare professionals delivering glucose monitoring, wound management, post-operative care, medication administration, and vital signs monitoring across Kumasi.
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap mb-5">
                <a href="#booking" class="btn-cta-primary">
                    <i class="fa-solid fa-calendar-check"></i> Schedule a Home Visit
                </a>
                <a href="tel:0241974447" class="btn-cta-secondary">
                    <i class="fa-solid fa-phone-volume text-teal" style="color: var(--accent-teal);"></i> Call 0241974447
                </a>
            </div>

            <!-- Stats/Trust Pillars -->
            <div class="row g-4 justify-content-center pt-4 max-w-4xl mx-auto border-top" style="border-color: var(--border-subtle) !important;">
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-white mb-0">16+</h3>
                    <small class="text-muted">Home Care Services</small>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-white mb-0">24 / 7</h3>
                    <small class="text-muted">On-Call Support</small>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-white mb-0">Pankrono</h3>
                    <small class="text-muted">Kumasi & Environs</small>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-emerald mb-0" style="color: #34d399;">100%</h3>
                    <small class="text-muted">Dedicated Care</small>
                </div>
            </div>

        </div>
    </section>

    <!-- Services Catalog (All 16 Services) -->
    <section id="services" class="section-py" style="background-color: var(--bg-subtle);">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">What We Offer</span>
                <h2 class="section-title">Our Home Care Services Portfolio</h2>
                <p class="text-secondary mb-0">Comprehensive medical, surgical, rehabilitation, and hygiene procedures delivered directly to patients at home.</p>
            </div>

            <div class="row g-4">
                <?php
                $services = [
                    ['icon' => 'fa-droplet', 'title' => 'Glucose Monitoring', 'desc' => 'Routine and emergency blood sugar level checks, fasting glucose logs, and diabetic lifestyle management.'],
                    ['icon' => 'fa-heart-pulse', 'title' => 'Vital Signs Monitoring', 'desc' => 'Regular tracking of blood pressure, pulse rate, body temperature, respiration, and blood oxygen levels.'],
                    ['icon' => 'fa-bath', 'title' => 'Bed Bathing Care', 'desc' => 'Dignified, gentle assisted hygiene care for bedridden, immobile, or elderly patients in comfort.'],
                    ['icon' => 'fa-syringe', 'title' => 'Catheterization', 'desc' => 'Sterile catheter insertion, replacement, and clinical management to ensure comfort and prevent infection.'],
                    ['icon' => 'fa-truck-medical', 'title' => 'Hospital Escort', 'desc' => 'Professional accompaniment to clinical appointments, hospital admissions, and doctor liaisons.'],
                    ['icon' => 'fa-pills', 'title' => 'Serving Medication', 'desc' => 'Timely, strict administration of oral, topical, and injectable medications per doctor prescriptions.'],
                    ['icon' => 'fa-utensils', 'title' => 'Nutritional Management', 'desc' => 'Specialized dietary guidance, meal planning for hypertension/diabetes, and nutritional rehabilitation.'],
                    ['icon' => 'fa-vial', 'title' => 'Blood Sampling for Lab', 'desc' => 'Home phlebotomy blood draw services with prompt dispatch to certified diagnostic laboratories.'],
                    ['icon' => 'fa-user-nurse', 'title' => 'Post-Operative Care', 'desc' => 'Specialized home recovery support following surgery, pain management, and complication monitoring.'],
                    ['icon' => 'fa-person-chalkboard', 'title' => 'Health Talk & Counseling', 'desc' => 'In-depth health education for patients and families on disease prevention and wellness.'],
                    ['icon' => 'fa-person-walking', 'title' => 'Physiotherapy & Exercise', 'desc' => 'Therapeutic exercises, mobility rehabilitation, joint mobilization, and post-stroke recovery.'],
                    ['icon' => 'fa-repeat', 'title' => 'Catheter Care & Flushing', 'desc' => 'Regular aseptic catheter care, drainage hygiene, and therapeutic saline flushing.'],
                    ['icon' => 'fa-bandage', 'title' => 'Wound Dressing', 'desc' => 'Sterile surgical wound care, diabetic foot ulcer treatment, burn management, and dressing changes.'],
                    ['icon' => 'fa-tooth', 'title' => 'Oral Hygiene Care', 'desc' => 'Specialized oral care and antiseptic rinses for dependent, elderly, and palliative care patients.'],
                    ['icon' => 'fa-apple-whole', 'title' => 'NG Tube Feeding', 'desc' => 'Nasogastric tube care, safe enteral nutritional feeds, and aspiration prevention protocols.'],
                    ['icon' => 'fa-user-doctor', 'title' => 'Medical Advice & Consult', 'desc' => 'Doctor evaluations, clinical second opinions, follow-up consults, and care referrals.']
                ];

                foreach ($services as $s):
                ?>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fa-solid <?php echo $s['icon']; ?>"></i>
                            </div>
                            <h3 class="service-title"><?php echo $s['title']; ?></h3>
                            <p class="service-text"><?php echo $s['desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Interactive Booking & Inquiries Section -->
    <section id="booking" class="section-py">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="booking-card">
                        <div class="text-center mb-4">
                            <span class="section-subtitle">Quick Consultation</span>
                            <h2 class="fw-bold text-white mb-2">Request a Home Care Visit</h2>
                            <p class="text-secondary mb-0">Fill out your details below and our medical officer will contact you immediately.</p>
                        </div>

                        <!-- Feedback Alerts -->
                        <?php if (isset($_SESSION['booking_success'])): ?>
                            <div class="alert alert-success border-0 rounded-3 bg-opacity-10 bg-success text-success p-3 mb-4" role="alert">
                                <i class="fa-solid fa-circle-check me-2"></i>
                                <?php echo htmlspecialchars($_SESSION['booking_success']); unset($_SESSION['booking_success']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['booking_error'])): ?>
                            <div class="alert alert-danger border-0 rounded-3 bg-opacity-10 bg-danger text-danger p-3 mb-4" role="alert">
                                <i class="fa-solid fa-circle-exclamation me-2"></i>
                                <?php echo htmlspecialchars($_SESSION['booking_error']); unset($_SESSION['booking_error']); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo APP_URL; ?>/book-request" method="POST" autocomplete="off">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-secondary fw-semibold">Patient Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control form-control-custom" placeholder="e.g. Kwame Mensah" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-secondary fw-semibold">Phone Contact Number <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control form-control-custom" placeholder="e.g. 024 123 4567" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-secondary fw-semibold">Primary Home Service Needed</label>
                                    <select name="service" class="form-select form-select-custom">
                                        <option value="Glucose Monitoring">Glucose Monitoring</option>
                                        <option value="Vital Signs Monitoring">Vital Signs Monitoring</option>
                                        <option value="Bed Bathing">Bed Bathing</option>
                                        <option value="Catheterization">Catheterization</option>
                                        <option value="Hospital Escort">Hospital Escort</option>
                                        <option value="Serving Medication">Serving Medication</option>
                                        <option value="Nutritional Management">Nutritional Management</option>
                                        <option value="Blood Sampling for Laboratory">Blood Sampling for Laboratory</option>
                                        <option value="Post Operative Care">Post Operative Care</option>
                                        <option value="Health Talk">Health Talk</option>
                                        <option value="Physiotherapy and Exercise">Physiotherapy and Exercise</option>
                                        <option value="Catheter Care">Catheter Care</option>
                                        <option value="Wound Dressing">Wound Dressing</option>
                                        <option value="Oral Care">Oral Care</option>
                                        <option value="NG Tube Feeding">NG Tube Feeding</option>
                                        <option value="Medical Advice & Other Services">Medical Advice & Other Services</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-secondary fw-semibold">Residential Location (Kumasi / Environs)</label>
                                    <input type="text" name="address" class="form-control form-control-custom" placeholder="e.g. Pankrono, Tafo, Ahodwo...">
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label text-secondary fw-semibold">Preferred Date</label>
                                    <input type="date" name="preferred_date" class="form-control form-control-custom" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label text-secondary fw-semibold">Preferred Time</label>
                                    <input type="time" name="preferred_time" class="form-control form-control-custom" value="09:00">
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold">Special Medical Notes or Instructions</label>
                                    <textarea name="notes" rows="3" class="form-control form-control-custom" placeholder="Briefly describe symptoms, patient condition, or any special requests..."></textarea>
                                </div>
                                <div class="col-12 text-center pt-3">
                                    <button type="submit" class="btn-cta-primary px-5 py-3 fs-6">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Submit Home Care Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Emergency Footer -->
    <footer id="contact" class="public-footer">
        <div class="container">
            <div class="row g-4 pb-5 border-bottom" style="border-color: var(--border-subtle) !important;">
                
                <div class="col-12 col-md-5">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="brand-icon-box">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="28" height="28" rx="8" fill="#0d9488" fill-opacity="0.3" stroke="#2dd4bf" stroke-width="1.5"/>
                                <path d="M16 7V25M7 16H25" stroke="#2dd4bf" stroke-width="2.5" stroke-linecap="round"/>
                                <circle cx="16" cy="16" r="4" fill="#10b981" stroke="#ffffff" stroke-width="1.2"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="fw-bold text-white mb-0">I.K HOLINESS HOME CARE</h4>
                            <span class="text-teal" style="font-size: 0.75rem; letter-spacing: 0.08em; text-transform: uppercase; color: var(--accent-teal);">"Your Health is Our Life"</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3">
                        Professional, discrete, and compassionate medical home care tailored to the individual health needs of our patients across Pankrono, Kumasi, and surrounding communities.
                    </p>
                </div>

                <div class="col-6 col-md-3">
                    <h6 class="fw-bold text-white text-uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.08em;">Quick Links</h6>
                    <ul class="list-unstyled text-secondary small mb-0">
                        <li class="mb-2"><a href="#services" class="text-secondary text-decoration-none hover-white">All 16 Services</a></li>
                        <li class="mb-2"><a href="#booking" class="text-secondary text-decoration-none hover-white">Book Care Visit</a></li>
                        <li class="mb-2"><a href="<?php echo APP_URL; ?>/login" class="text-teal text-decoration-none fw-semibold">Doctor Login</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-4">
                    <h6 class="fw-bold text-white text-uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.08em;">Emergency Contact</h6>
                    <div class="text-secondary small mb-2">
                        <i class="fa-solid fa-location-dot text-teal me-2" style="color: var(--accent-teal);"></i> Pankrono, Kumasi, Ghana
                    </div>
                    <div class="text-secondary small mb-2">
                        <i class="fa-solid fa-phone text-teal me-2" style="color: var(--accent-teal);"></i> 0241974447 / 0550974126
                    </div>
                    <div class="text-secondary small mb-3">
                        <i class="fa-solid fa-envelope text-teal me-2" style="color: var(--accent-teal);"></i> kisaiahh@icloud.com
                    </div>
                </div>

            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-4 text-muted small">
                <div>&copy; <?php echo date('Y'); ?> I.K Holiness Home Care Services. All rights reserved.</div>
                <div class="mt-2 mt-md-0">
                    <a href="<?php echo APP_URL; ?>/login" class="text-muted text-decoration-none me-3">Staff Portal</a>
                    <span>"Your Health is Our Life"</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>