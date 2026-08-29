<?php
$pageTitle = 'Home - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'home';
require_once __DIR__ . '/header.php';
?>

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
            <a href="<?php echo APP_URL; ?>/request-care" class="btn-cta-primary">
                <i class="fa-solid fa-calendar-check"></i> Request a Home Visit
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

<!-- Services Section (4-Pillar Modern Showcase) -->
<section id="services" class="section-py" style="background-color: var(--bg-subtle);">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-end gap-3 mb-4">
            <div>
                <span class="text-uppercase fw-bold text-blue-accent d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.05em;">Clinical Portfolio</span>
                <h2 class="fw-bold text-dark mb-0" style="font-size: 1.5rem;">Home Care Services Portfolio</h2>
                <small class="text-muted">16 specialized clinical procedures organized across 4 health domains.</small>
            </div>
            <a href="<?php echo APP_URL; ?>/services" class="btn-cta-secondary btn-sm py-1 px-3">
                <span>View Full Catalog</span>
                <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-3 g-xl-4">
            <!-- Pillar 1: Clinical Nursing (Sapphire Theme) -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="pillar-card-modern theme-sapphire">
                    <div>
                        <div class="pillar-header-wrap">
                            <div class="pillar-icon-box">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <span class="pillar-badge">4 Procedures</span>
                        </div>

                        <h3 class="pillar-card-title">Clinical Nursing</h3>
                        <span class="pillar-card-subtitle">Diagnostic & Vitals</span>

                        <div class="procedure-tile-list">
                            <a href="<?php echo APP_URL; ?>/request-care?service=Glucose+Monitoring" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-droplet"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Glucose Monitoring</span>
                                    <span class="procedure-tile-desc">Fasting logs, blood sugar & diabetic care</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Vital+Signs+Monitoring" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-stethoscope"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Vital Signs Tracking</span>
                                    <span class="procedure-tile-desc">Blood pressure, pulse, oxygen & temp</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Serving+Medication" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-pills"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Serving Medication</span>
                                    <span class="procedure-tile-desc">Strict scheduling for oral, IV & injections</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Blood+Sampling+for+Laboratory" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-vial"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Lab Blood Sampling</span>
                                    <span class="procedure-tile-desc">Sterile phlebotomy with lab dispatch</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="pillar-card-footer">
                        <a href="<?php echo APP_URL; ?>/request-care?service=Clinical+Nursing" class="pillar-action-link">
                            <span>Request Clinical Care</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pillar 2: Specialized Procedures (Indigo Theme) -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="pillar-card-modern theme-indigo">
                    <div>
                        <div class="pillar-header-wrap">
                            <div class="pillar-icon-box">
                                <i class="fa-solid fa-syringe"></i>
                            </div>
                            <span class="pillar-badge">4 Procedures</span>
                        </div>

                        <h3 class="pillar-card-title">Specialized Care</h3>
                        <span class="pillar-card-subtitle">Aseptic Procedures</span>

                        <div class="procedure-tile-list">
                            <a href="<?php echo APP_URL; ?>/request-care?service=Catheterization" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-circle-nodes"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Catheterization</span>
                                    <span class="procedure-tile-desc">Sterile insertion & drainage management</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Catheter+Care" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-repeat"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Catheter Flushing</span>
                                    <span class="procedure-tile-desc">Aseptic hygiene & regular maintenance</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Wound+Dressing" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-bandage"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Wound Dressing</span>
                                    <span class="procedure-tile-desc">Diabetic ulcers, burns & incisions</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=NG+Tube+Feeding" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-apple-whole"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">NG Tube Feeding</span>
                                    <span class="procedure-tile-desc">Enteral feeding & aspiration prevention</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="pillar-card-footer">
                        <a href="<?php echo APP_URL; ?>/request-care?service=Specialized+Care" class="pillar-action-link">
                            <span>Request Specialized Care</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pillar 3: Rehabilitation (Teal Theme) -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="pillar-card-modern theme-teal">
                    <div>
                        <div class="pillar-header-wrap">
                            <div class="pillar-icon-box">
                                <i class="fa-solid fa-person-walking"></i>
                            </div>
                            <span class="pillar-badge">4 Procedures</span>
                        </div>

                        <h3 class="pillar-card-title">Rehabilitation</h3>
                        <span class="pillar-card-subtitle">Recovery & Therapy</span>

                        <div class="procedure-tile-list">
                            <a href="<?php echo APP_URL; ?>/request-care?service=Post+Operative+Care" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-user-nurse"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Post-Operative Care</span>
                                    <span class="procedure-tile-desc">Surgical recovery support & monitoring</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Physiotherapy+and+Exercise" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-dumbbell"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Physiotherapy & Mobility</span>
                                    <span class="procedure-tile-desc">Exercise therapy & post-stroke rehab</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Health+Talk" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Health Counseling</span>
                                    <span class="procedure-tile-desc">Preventative guidance & lifestyle talk</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Hospital+Escort" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-truck-medical"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Hospital Escort</span>
                                    <span class="procedure-tile-desc">Accompanied transport to clinic visits</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="pillar-card-footer">
                        <a href="<?php echo APP_URL; ?>/request-care?service=Rehabilitation" class="pillar-action-link">
                            <span>Request Rehabilitation</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pillar 4: Daily Living Care (Amber Theme) -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="pillar-card-modern theme-amber">
                    <div>
                        <div class="pillar-header-wrap">
                            <div class="pillar-icon-box">
                                <i class="fa-solid fa-bath"></i>
                            </div>
                            <span class="pillar-badge">4 Procedures</span>
                        </div>

                        <h3 class="pillar-card-title">Daily Living Care</h3>
                        <span class="pillar-card-subtitle">Hygiene & Wellness</span>

                        <div class="procedure-tile-list">
                            <a href="<?php echo APP_URL; ?>/request-care?service=Bed+Bathing" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-shower"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Bed Bathing Care</span>
                                    <span class="procedure-tile-desc">Gentle hygiene for immobile patients</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Oral+Care" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-tooth"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Oral Hygiene Care</span>
                                    <span class="procedure-tile-desc">Antiseptic rinses & oral sanitation</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Nutritional+Management" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-utensils"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Nutritional Planning</span>
                                    <span class="procedure-tile-desc">Specialized diabetic & hypertension diets</span>
                                </div>
                            </a>
                            <a href="<?php echo APP_URL; ?>/request-care?service=Medical+Advice+%26+Other+Services" class="procedure-tile">
                                <div class="procedure-tile-icon"><i class="fa-solid fa-user-doctor"></i></div>
                                <div class="procedure-tile-content">
                                    <span class="procedure-tile-name">Medical Consultations</span>
                                    <span class="procedure-tile-desc">Doctor evaluations, reviews & advice</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="pillar-card-footer">
                        <a href="<?php echo APP_URL; ?>/request-care?service=Daily+Living+Care" class="pillar-action-link">
                            <span>Request Daily Care</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose I.K Holiness Section -->
<section class="section-py">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-12 col-lg-6">
                <span class="text-uppercase fw-bold text-blue-accent d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.05em;">Our Clinical Standards</span>
                <h2 class="fw-bold text-dark mb-3" style="font-size: 1.6rem;">Why Patients & Families Trust I.K Holiness</h2>
                <p class="text-secondary mb-4" style="line-height: 1.6;">
                    We bridge the gap between hospital-level healthcare and the comfort of your private residence. Our medical practitioners provide personalized, discrete, and empathetic care with complete patient dignity.
                </p>

                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: var(--bg-subtle); border: 1px solid var(--border-subtle);">
                            <i class="fa-solid fa-user-doctor text-blue-accent fs-5 mb-2"></i>
                            <h6 class="fw-bold text-dark mb-1">Qualified Practitioners</h6>
                            <small class="text-muted">Licensed nurses and attending clinical officers.</small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: var(--bg-subtle); border: 1px solid var(--border-subtle);">
                            <i class="fa-solid fa-house-chimney-medical text-blue-accent fs-5 mb-2"></i>
                            <h6 class="fw-bold text-dark mb-1">Comfort of Home</h6>
                            <small class="text-muted">Avoid tedious clinic queues and transportation stress.</small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: var(--bg-subtle); border: 1px solid var(--border-subtle);">
                            <i class="fa-solid fa-notes-medical text-blue-accent fs-5 mb-2"></i>
                            <h6 class="fw-bold text-dark mb-1">Itemized Statements</h6>
                            <small class="text-muted">Transparent invoicing with official receipts.</small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: var(--bg-subtle); border: 1px solid var(--border-subtle);">
                            <i class="fa-solid fa-headset text-blue-accent fs-5 mb-2"></i>
                            <h6 class="fw-bold text-dark mb-1">24/7 Rapid Response</h6>
                            <small class="text-muted">On-call for emergency checks and home visits.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Callout Card -->
            <div class="col-12 col-lg-6">
                <div class="ui-card-modern p-4 p-md-5 text-center" style="background: radial-gradient(circle at 50% 0%, rgba(37, 99, 235, 0.06) 0%, transparent 80%);">
                    <div class="brand-icon-box mx-auto mb-3" style="width: 52px; height: 52px; font-size: 1.4rem;">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-2">Need Immediate Home Care?</h4>
                    <p class="text-secondary small mb-4" style="max-width: 420px; margin: 0 auto 20px auto;">
                        Our clinical officer is available to discuss your patient's symptoms, medication plan, or schedule a home visit right away.
                    </p>
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        <a href="<?php echo APP_URL; ?>/request-care" class="btn-cta-primary">
                            <i class="fa-solid fa-calendar-check"></i> Book Consultation
                        </a>
                        <a href="tel:0241974447" class="btn-cta-secondary">
                            <i class="fa-solid fa-phone" style="color: var(--accent-main);"></i> 0241974447
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>