<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I.K HOLINESS HOME CARE SERVICES - "Your Health is Our Life"</title>
    <meta name="description" content="Professional clinical home care, nursing, vital signs monitoring, wound care, and post-operative recovery in Pankrono, Kumasi.">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
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
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
            color: #ffffff;
            font-size: 0.95rem;
        }

        .nav-link-custom {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 6px;
            transition: all 0.15s ease;
        }

        .nav-link-custom:hover {
            color: var(--accent-main);
            background-color: var(--accent-light);
        }

        .btn-cta-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: 1px solid #1d4ed8;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 9px 18px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
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
            font-size: 0.875rem;
            padding: 9px 18px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.15s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.04);
        }

        .btn-cta-secondary:hover {
            background-color: var(--bg-subtle);
            border-color: #94a3b8;
        }

        /* Hero Section */
        .hero-section {
            padding: 60px 0 50px 0;
            position: relative;
            background: radial-gradient(circle at 50% 10%, rgba(37, 99, 235, 0.05) 0%, transparent 60%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 9999px;
            background-color: var(--accent-light);
            border: 1px solid var(--accent-border);
            color: var(--accent-dark);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            margin-bottom: 18px;
        }

        .hero-title {
            font-size: clamp(1.8rem, 4vw, 2.7rem);
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-primary);
            margin-bottom: 14px;
            letter-spacing: -0.02em;
        }

        .hero-title-accent {
            color: var(--accent-main);
        }

        .hero-desc {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.5;
            max-width: 620px;
            margin: 0 auto 26px auto;
        }

        /* Pillar & Tabbed Services Matrix */
        .pillar-card {
            background-color: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 14px;
            padding: 24px;
            height: 100%;
            transition: all 0.2s ease-in-out;
            position: relative;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.03);
        }

        .pillar-card:hover {
            transform: translateY(-3px);
            border-color: var(--accent-border);
            box-shadow: 0 8px 20px -3px rgba(37, 99, 235, 0.08);
        }

        .pillar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .pillar-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background-color: var(--accent-light);
            border: 1px solid var(--accent-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: var(--accent-main);
            flex-shrink: 0;
        }

        .pillar-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .pillar-subtitle {
            font-size: 0.72rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .service-list-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.8125rem;
            color: var(--text-secondary);
            margin-bottom: 10px;
        }

        .service-list-item i {
            color: var(--accent-main);
            font-size: 0.75rem;
            margin-top: 3px;
            flex-shrink: 0;
        }

        /* Section Containers */
        .section-py {
            padding: 60px 0;
        }

        .section-header {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 36px auto;
        }

        .section-subtitle {
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--accent-main);
            margin-bottom: 6px;
            display: block;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        /* Booking Form Card */
        .booking-card {
            background-color: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            padding: 32px 24px;
            box-shadow: 0 6px 20px -3px rgba(0, 0, 0, 0.05);
        }

        .form-control-custom, .form-select-custom {
            background-color: #ffffff;
            border: 1px solid var(--border-strong);
            color: var(--text-primary);
            border-radius: 6px;
            padding: 8px 12px;
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

        /* Footer */
        .public-footer {
            background-color: #ffffff;
            border-top: 1px solid var(--border-subtle);
            padding: 40px 0 20px 0;
        }
    </style>
</head>
<body>

    <!-- Public Navigation Bar (Clean & Professional) -->
    <header class="public-navbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                
                <a href="<?php echo APP_URL; ?>/" class="brand-logo-wrap">
                    <div class="brand-icon-box">
                        <i class="fa-solid fa-house-medical"></i>
                    </div>
                    <div>
                        <span class="fw-bold text-dark d-block" style="font-size: 0.95rem; line-height: 1.15;">I.K HOLINESS</span>
                        <span style="font-size: 0.65rem; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 700; color: var(--accent-main);">Home Care Services</span>
                    </div>
                </a>

                <nav class="d-none d-lg-flex align-items-center gap-1">
                    <a href="#services" class="nav-link-custom">Services</a>
                    <a href="#about" class="nav-link-custom">About Us</a>
                    <a href="#booking" class="nav-link-custom">Request Care</a>
                    <a href="#contact" class="nav-link-custom">Contact</a>
                </nav>

                <div class="d-flex align-items-center gap-2">
                    <a href="tel:0241974447" class="btn-cta-secondary d-none d-sm-inline-flex px-3 py-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-phone" style="color: var(--accent-main);"></i> 0241974447
                    </a>
                    <a href="#booking" class="btn-cta-primary py-1 px-3" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-calendar-check"></i> Book Visit
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

            <div class="d-flex justify-content-center gap-2 flex-wrap mb-4">
                <a href="#booking" class="btn-cta-primary">
                    <i class="fa-solid fa-calendar-check"></i> Schedule a Home Visit
                </a>
                <a href="tel:0241974447" class="btn-cta-secondary">
                    <i class="fa-solid fa-phone-volume" style="color: var(--accent-main);"></i> Call 0241974447
                </a>
            </div>

            <!-- Stats / Trust Pillars -->
            <div class="row g-3 justify-content-center pt-3 max-w-4xl mx-auto border-top" style="border-color: var(--border-subtle) !important;">
                <div class="col-6 col-md-3">
                    <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">16+</h4>
                    <small class="text-muted" style="font-size: 0.72rem;">Home Care Services</small>
                </div>
                <div class="col-6 col-md-3">
                    <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">24 / 7</h4>
                    <small class="text-muted" style="font-size: 0.72rem;">On-Call Support</small>
                </div>
                <div class="col-6 col-md-3">
                    <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Pankrono</h4>
                    <small class="text-muted" style="font-size: 0.72rem;">Kumasi & Environs</small>
                </div>
                <div class="col-6 col-md-3">
                    <h4 class="fw-bold mb-0" style="font-size: 1.25rem; color: var(--accent-main);">100%</h4>
                    <small class="text-muted" style="font-size: 0.72rem;">Dedicated Care</small>
                </div>
            </div>

        </div>
    </section>

    <!-- Services Portfolio: Clean 4-Pillar Clinical Matrix -->
    <section id="services" class="section-py" style="background-color: var(--bg-subtle);">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Structured Healthcare</span>
                <h2 class="section-title">Home Care Services Portfolio</h2>
                <p class="text-secondary mb-0" style="font-size: 0.8125rem;">Our 16 clinical procedures organized into 4 specialized care pillars for fast, convenient discovery.</p>
            </div>

            <div class="row g-3 g-xl-4">
                <!-- Pillar 1: Clinical Nursing & Monitoring -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="pillar-card">
                        <div class="pillar-header">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <div>
                                <h3 class="pillar-title">Clinical Nursing</h3>
                                <span class="pillar-subtitle">Diagnostic & Vitals</span>
                            </div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Glucose Monitoring:</strong> Fasting blood sugar logs and diabetic checks.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Vital Signs Tracking:</strong> BP, temperature, respiration, pulse rate.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Serving Medication:</strong> Timely oral, IV, and injectable drugs.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Blood Sampling:</strong> Phlebotomy sample collection for labs.</div>
                        </div>
                    </div>
                </div>

                <!-- Pillar 2: Specialized Clinical Procedures -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="pillar-card">
                        <div class="pillar-header">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-syringe"></i>
                            </div>
                            <div>
                                <h3 class="pillar-title">Specialized Care</h3>
                                <span class="pillar-subtitle">Aseptic Procedures</span>
                            </div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Catheterization:</strong> Sterile insertion & drainage management.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Catheter Flushing:</strong> Care, hygiene, and regular maintenance.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Wound Dressing:</strong> Ulcer treatment, aseptic post-op dressing.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>NG Tube Feeding:</strong> Nasogastric feeds & aspiration safety.</div>
                        </div>
                    </div>
                </div>

                <!-- Pillar 3: Recovery & Rehabilitation -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="pillar-card">
                        <div class="pillar-header">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-person-walking"></i>
                            </div>
                            <div>
                                <h3 class="pillar-title">Rehabilitation</h3>
                                <span class="pillar-subtitle">Recovery & Therapy</span>
                            </div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Post-Operative Care:</strong> Home recovery support and monitoring.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Physiotherapy:</strong> Mobility exercises & joint rehabilitation.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Health Talk & Counseling:</strong> Preventative lifestyle guidance.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Hospital Escort:</strong> Medical escort to hospital consults.</div>
                        </div>
                    </div>
                </div>

                <!-- Pillar 4: Hygiene & Daily Living Support -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="pillar-card">
                        <div class="pillar-header">
                            <div class="pillar-icon">
                                <i class="fa-solid fa-bath"></i>
                            </div>
                            <div>
                                <h3 class="pillar-title">Daily Living Care</h3>
                                <span class="pillar-subtitle">Hygiene & Wellness</span>
                            </div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Bed Bathing Care:</strong> Dignified hygiene for immobile patients.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Oral Hygiene Care:</strong> Gentle antiseptic oral sanitation.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Nutritional Care:</strong> Diabetic & hypertensive meal planning.</div>
                        </div>
                        <div class="service-list-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Medical Consults:</strong> Clinical assessments and follow-ups.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Booking & Inquiries Section -->
    <section id="booking" class="section-py">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="booking-card">
                        <div class="text-center mb-3">
                            <span class="section-subtitle">Quick Consultation</span>
                            <h3 class="fw-bold text-dark mb-1" style="font-size: 1.4rem;">Request a Home Care Visit</h3>
                            <p class="text-secondary mb-0" style="font-size: 0.8125rem;">Fill out your details below and our medical officer will contact you immediately.</p>
                        </div>

                        <!-- Feedback Alerts -->
                        <?php if (isset($_SESSION['booking_success'])): ?>
                            <div class="alert alert-success border-0 rounded-2 p-2 px-3 mb-3" style="background-color: var(--accent-light); color: var(--accent-dark); border: 1px solid var(--accent-border) !important; font-size: 0.8125rem;" role="alert">
                                <i class="fa-solid fa-circle-check me-1"></i>
                                <?php echo htmlspecialchars($_SESSION['booking_success']); unset($_SESSION['booking_success']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['booking_error'])): ?>
                            <div class="alert alert-danger border-0 rounded-2 p-2 px-3 mb-3" style="background-color: #fff1f2; color: #be123c; border: 1px solid #fecdd3 !important; font-size: 0.8125rem;" role="alert">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                <?php echo htmlspecialchars($_SESSION['booking_error']); unset($_SESSION['booking_error']); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo APP_URL; ?>/book-request" method="POST" autocomplete="off">
                            <div class="row g-2">
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
                                    <label class="form-label text-secondary fw-semibold">Residential Location (Kumasi)</label>
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
                                    <label class="form-label text-secondary fw-semibold">Special Medical Notes</label>
                                    <textarea name="notes" rows="2" class="form-control form-control-custom" placeholder="Briefly describe symptoms, patient condition, or requests..."></textarea>
                                </div>
                                <div class="col-12 text-center pt-2">
                                    <button type="submit" class="btn-cta-primary px-4 py-2">
                                        <i class="fa-solid fa-paper-plane me-1"></i> Submit Request
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
            <div class="row g-4 pb-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                
                <div class="col-12 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="brand-icon-box">
                            <i class="fa-solid fa-house-medical"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">I.K HOLINESS HOME CARE</h6>
                            <span style="font-size: 0.68rem; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 700; color: var(--accent-main);">"Your Health is Our Life"</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-0" style="font-size: 0.78rem;">
                        Professional, discrete, and compassionate medical home care tailored to the individual health needs of our patients across Pankrono, Kumasi, and surrounding communities.
                    </p>
                </div>

                <div class="col-6 col-md-3">
                    <h6 class="fw-bold text-dark text-uppercase mb-2" style="font-size: 0.75rem; letter-spacing: 0.06em;">Quick Links</h6>
                    <ul class="list-unstyled text-secondary small mb-0" style="font-size: 0.78rem;">
                        <li class="mb-1"><a href="#services" class="text-secondary text-decoration-none">Our Services</a></li>
                        <li class="mb-1"><a href="#booking" class="text-secondary text-decoration-none">Book Care Visit</a></li>
                        <li class="mb-1"><a href="#contact" class="text-secondary text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-3">
                    <h6 class="fw-bold text-dark text-uppercase mb-2" style="font-size: 0.75rem; letter-spacing: 0.06em;">Emergency Contact</h6>
                    <div class="text-secondary small mb-1" style="font-size: 0.78rem;">
                        <i class="fa-solid fa-location-dot me-1" style="color: var(--accent-main);"></i> Pankrono, Kumasi, Ghana
                    </div>
                    <div class="text-secondary small mb-1" style="font-size: 0.78rem;">
                        <i class="fa-solid fa-phone me-1" style="color: var(--accent-main);"></i> 0241974447 / 0550974126
                    </div>
                    <div class="text-secondary small" style="font-size: 0.78rem;">
                        <i class="fa-solid fa-envelope me-1" style="color: var(--accent-main);"></i> kisaiahh@icloud.com
                    </div>
                </div>

            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3 text-muted small" style="font-size: 0.75rem;">
                <div>&copy; <?php echo date('Y'); ?> I.K Holiness Home Care Services. All rights reserved.</div>
                <div class="mt-1 mt-md-0">
                    <span>"Your Health is Our Life"</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>