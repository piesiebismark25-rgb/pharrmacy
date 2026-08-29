<?php
$pageTitle = 'Clinical Services - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'services';
require_once __DIR__ . '/header.php';
?>

<!-- Banner Header -->
<section class="page-header-banner">
    <div class="container">
        <span class="page-badge">
            <i class="fa-solid fa-stethoscope"></i> Complete Clinical Catalog
        </span>
        <h1 class="page-title">Our Home Care Services</h1>
        <p class="page-desc">
            Explore our comprehensive range of 16 specialized medical, nursing, diagnostic, and palliative procedures provided in the comfort of your home.
        </p>
    </div>
</section>

<!-- Main Services Directory Section -->
<section class="section-py" style="background-color: var(--bg-base);">
    <div class="container">
        
        <!-- Pillar 1: Clinical Nursing & Monitoring -->
        <div id="nursing" class="mb-5 pt-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="pillar-icon-box theme-sapphire" style="width: 40px; height: 40px; font-size: 1rem;">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">1. Clinical Nursing & Diagnostics</h3>
                    <small class="text-muted">Biometric tracking, glycemic surveillance, and prescribed therapeutic administration.</small>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Glucose Monitoring</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">GLU-01</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Continuous fasting and postprandial blood glucose checks, ketone testing, diabetic log management, and lifestyle counseling.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Glucose+Monitoring" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Vital Signs Tracking</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">VIT-02</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Regular clinical tracking of blood pressure (BP), body temperature, radial pulse, respiratory rate, and SpO2 oxygen saturation levels.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Vital+Signs+Monitoring" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Serving Medication</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">MED-03</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Professional timing and administration of prescribed oral medications, intravenous (IV) infusions, intramuscular, and subcutaneous injections.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Serving+Medication" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Blood Sampling (Lab)</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">LAB-04</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Aseptic home phlebotomy blood collection, sample preservation, and prompt transport to certified clinical diagnostic laboratories.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Blood+Sampling+for+Laboratory" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pillar 2: Specialized Clinical Procedures -->
        <div id="specialized" class="mb-5 pt-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="pillar-icon-box theme-indigo" style="width: 40px; height: 40px; font-size: 1rem;">
                    <i class="fa-solid fa-syringe"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">2. Specialized Clinical Procedures</h3>
                    <small class="text-muted">Invasive care management, catheterization, aseptic wound dressings, and tube feeding.</small>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Catheterization</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">CAT-05</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Sterile urinary Foley catheter insertion, periodic exchange, and drainage bag setup with strict infection-control protocols.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Catheterization" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Catheter Care & Flushing</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">CAT-06</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Regular catheter site sanitation, therapeutic bladder irrigation, line flushing, and blockage prevention for bedbound patients.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Catheter+Care" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Wound Dressing</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">WND-07</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Advanced aseptic dressing of diabetic foot ulcers, pressure sores (bedsores), post-surgical incision care, and burn management.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Wound+Dressing" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">NG Tube Feeding</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">NGT-08</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Nasogastric tube insertion, enteral formula feeding administration, tube patency checks, and aspiration prevention precautions.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=NG+Tube+Feeding" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pillar 3: Rehabilitation & Therapy -->
        <div id="rehab" class="mb-5 pt-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="pillar-icon-box theme-teal" style="width: 40px; height: 40px; font-size: 1rem;">
                    <i class="fa-solid fa-person-walking"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">3. Rehabilitation & Therapy</h3>
                    <small class="text-muted">Post-surgical recovery, mobility enhancement, lifestyle guidance, and clinical escort.</small>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Post-Operative Care</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">POP-09</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Post-discharge home monitoring, surgical site inspection, pain control management, drain care, and recovery milestone tracking.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Post+Operative+Care" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Physiotherapy & Exercise</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">PHY-10</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Guided rehabilitation exercises, joint range-of-motion mobilization, post-stroke motor recovery, and ambulatory assistance.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Physiotherapy+and+Exercise" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Health Talk & Counseling</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">HLT-11</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Educational health sessions for families, preventative health strategies, chronic disease management, and psycho-social encouragement.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Health+Talk" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Hospital Escort</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">ESC-12</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Professional clinical accompaniment for hospital appointments, imaging visits, diagnostic reviews, and inpatient admissions.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Hospital+Escort" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pillar 4: Daily Living & Hygiene Support -->
        <div id="daily" class="mb-4 pt-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="pillar-icon-box theme-amber" style="width: 40px; height: 40px; font-size: 1rem;">
                    <i class="fa-solid fa-bath"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">4. Daily Living Care & Wellness</h3>
                    <small class="text-muted">Hygiene maintenance, oral sanitation, medical diet formulation, and general physician consults.</small>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Bed Bathing Care</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">BTH-13</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Dignified, gentle sponge and assisted bathing in bed for elderly, post-stroke, or immobile individuals with skin moisturizing.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Bed+Bathing" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Oral Hygiene Care</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">ORL-14</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Specialized oral cavitary debridement, antiseptic mouthwashes, denture care, and mucositis prevention for dependent patients.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Oral+Care" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Nutritional Planning</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">NUT-15</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Clinical dietetic assessment, specialized diabetic, renal, and low-sodium hypertensive meal planning and hydration support.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Nutritional+Management" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ui-card-modern h-100 p-3 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Medical Consultations</h6>
                                <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono" style="font-size: 0.68rem;">CON-16</span>
                            </div>
                            <p class="text-secondary small mb-3" style="line-height: 1.45;">
                                Clinical reviews, physical assessments, diagnosis discussions, specialist second opinions, and home care treatment plans.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Medical+Advice+%26+Other+Services" class="pillar-action-link" style="color: var(--accent-main);">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Call to Action Banner -->
<section class="section-py" style="background-color: #ffffff; border-top: 1px solid var(--border-subtle);">
    <div class="container text-center">
        <h3 class="fw-bold text-dark mb-2">Have a Customized Care Requirement?</h3>
        <p class="text-secondary small mb-4" style="max-width: 540px; margin: 0 auto 24px auto;">
            Our clinical team handles combined home care packages, palliative long-term support, and routine wellness schedules tailored to your family's needs.
        </p>
        <div class="d-flex justify-content-center gap-2 flex-wrap">
            <a href="<?php echo APP_URL; ?>/request-care" class="btn-cta-primary">
                <i class="fa-solid fa-calendar-check"></i> Book Home Care Session
            </a>
            <a href="<?php echo APP_URL; ?>/contact" class="btn-cta-secondary">
                <i class="fa-solid fa-envelope"></i> Contact Clinical Officer
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
