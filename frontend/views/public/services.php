<?php
$pageTitle = 'Clinical Services Catalog - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'services';
require_once __DIR__ . '/header.php';
?>

<!-- 1. Hero Header Banner -->
<section class="page-header-banner" style="background: linear-gradient(180deg, #eff6ff 0%, #ffffff 100%); border-bottom: 1px solid #e2e8f0;">
    <div class="container text-center">
        <span class="badge-pill-custom badge-blue font-mono fw-bold mb-3">
            <i class="fa-solid fa-stethoscope me-1"></i> COMPLETE CLINICAL CATALOG
        </span>
        <h1 class="page-title text-dark fw-bold mb-3" style="font-size: clamp(2rem, 4vw, 2.75rem); letter-spacing: -0.02em;">
            Specialized Home Care Procedures
        </h1>
        <p class="page-desc text-secondary" style="font-size: 1.05rem; max-width: 680px; margin: 0 auto 20px auto; line-height: 1.6;">
            16 accredited clinical nursing, sterile aseptic, rehabilitative, and daily wellness procedures delivered directly to your residence in Kumasi.
        </p>
    </div>
</section>

<!-- 2. Main Services Directory Section -->
<section class="section-py" style="background-color: #f8fafc;">
    <div class="container">
        
        <!-- Domain 1: Clinical Nursing & Diagnostics -->
        <div id="nursing" class="mb-5">
            <div class="d-flex align-items-center gap-3 mb-4 pb-2 border-bottom">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.3rem;">1. Clinical Nursing & Diagnostics</h3>
                    <small class="text-secondary">Vital tracking, glycemic monitoring, and prescribed therapeutic administration.</small>
                </div>
            </div>

            <div class="row g-4">
                <!-- GLU-01 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Glucose Monitoring</h5>
                                <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.7rem;">GLU-01</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Continuous fasting and postprandial glucose tracking, diabetic logs, and dietary guidance.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Glucose+Monitoring" class="btn-clean-service text-primary">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- VIT-02 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Vital Signs Tracking</h5>
                                <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.7rem;">VIT-02</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Routine blood pressure (BP), radial pulse, respiration, temperature, and SpO2 oxygen checks.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Vital+Signs+Monitoring" class="btn-clean-service text-primary">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- MED-03 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Serving Medication</h5>
                                <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.7rem;">MED-03</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Strict timing and administration of prescribed oral medications, IV infusions, and injections.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Serving+Medication" class="btn-clean-service text-primary">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- LAB-04 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Lab Blood Sampling</h5>
                                <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.7rem;">LAB-04</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Sterile home phlebotomy blood sampling, sample preservation, and prompt laboratory dispatch.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Blood+Sampling+for+Laboratory" class="btn-clean-service text-primary">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Domain 2: Specialized Clinical Procedures -->
        <div id="specialized" class="mb-5">
            <div class="d-flex align-items-center gap-3 mb-4 pb-2 border-bottom">
                <div class="icon-sq bg-purple-subtle text-purple" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                    <i class="fa-solid fa-syringe"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.3rem;">2. Specialized Clinical Procedures</h3>
                    <small class="text-secondary">Aseptic wound dressings, urinary catheter care, and enteral tube feeding.</small>
                </div>
            </div>

            <div class="row g-4">
                <!-- CAT-05 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Catheterization</h5>
                                <span class="badge-pill-custom badge-purple font-mono" style="font-size: 0.7rem;">CAT-05</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Sterile Foley catheter insertion, periodic exchange, and drainage bag setup with aseptic protocols.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Catheterization" class="btn-clean-service text-purple">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- CAT-06 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Catheter Care & Flush</h5>
                                <span class="badge-pill-custom badge-purple font-mono" style="font-size: 0.7rem;">CAT-06</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Routine site hygiene, therapeutic bladder irrigation, line flushing, and blockage prevention.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Catheter+Care" class="btn-clean-service text-purple">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- WND-07 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Wound Dressing</h5>
                                <span class="badge-pill-custom badge-purple font-mono" style="font-size: 0.7rem;">WND-07</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Advanced clinical dressing for diabetic ulcers, pressure bedsores, surgical incisions, and burns.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Wound+Dressing" class="btn-clean-service text-purple">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- NGT-08 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">NG Tube Feeding</h5>
                                <span class="badge-pill-custom badge-purple font-mono" style="font-size: 0.7rem;">NGT-08</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Enteral nasogastric nutrition administration, tube verification, flushing, and aspiration safety.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=NG+Tube+Feeding" class="btn-clean-service text-purple">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Domain 3: Rehabilitation & Therapy -->
        <div id="rehabilitation" class="mb-5">
            <div class="d-flex align-items-center gap-3 mb-4 pb-2 border-bottom">
                <div class="icon-sq bg-emerald-subtle text-success" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                    <i class="fa-solid fa-person-walking"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.3rem;">3. Rehabilitation & Recovery Therapy</h3>
                    <small class="text-secondary">Physical stroke rehabilitation, post-operative support, and medical escort.</small>
                </div>
            </div>

            <div class="row g-4">
                <!-- REC-09 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Post-Operative Care</h5>
                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.7rem;">REC-09</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Post-surgical monitoring, drain management, pain tracking, and early mobilization guidance.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Post+Operative+Care" class="btn-clean-service text-success">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- PHY-10 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Physiotherapy</h5>
                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.7rem;">PHY-10</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Bedside range-of-motion therapy, stroke rehab, gait training, and muscle reconditioning.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Physiotherapy+and+Exercise" class="btn-clean-service text-success">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- HLT-11 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Health Counseling</h5>
                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.7rem;">HLT-11</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Chronic disease management guidance, hypertension & diabetic education, and family talks.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Health+Talk" class="btn-clean-service text-success">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- ESC-12 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Hospital Escort</h5>
                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.7rem;">ESC-12</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Certified nurse-assisted transport and physical accompaniment for specialist hospital appointments.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Hospital+Escort" class="btn-clean-service text-success">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Domain 4: Daily Living Care & Medical Consultations -->
        <div id="dailyliving" class="mb-5">
            <div class="d-flex align-items-center gap-3 mb-4 pb-2 border-bottom">
                <div class="icon-sq bg-soft-amber text-danger" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                    <i class="fa-solid fa-bath"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-0" style="font-size: 1.3rem;">4. Daily Living Care & Doctor Reviews</h3>
                    <small class="text-secondary">Bed bathing, oral hygiene, clinical nutrition, and physician consultations.</small>
                </div>
            </div>

            <div class="row g-4">
                <!-- BTH-13 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Bed Bathing Care</h5>
                                <span class="badge-pill-custom badge-rose font-mono" style="font-size: 0.7rem;">BTH-13</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Gentle, hygienic full bed bathing, pressure area skincare, and linen change for immobile patients.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Bed+Bathing" class="btn-clean-service text-danger">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- ORL-14 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Oral Hygiene Care</h5>
                                <span class="badge-pill-custom badge-rose font-mono" style="font-size: 0.7rem;">ORL-14</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Antiseptic mouth care, denture cleaning, and oral cavity sanitation for dependent individuals.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Oral+Care" class="btn-clean-service text-danger">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- NUT-15 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Nutritional Planning</h5>
                                <span class="badge-pill-custom badge-rose font-mono" style="font-size: 0.7rem;">NUT-15</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                Tailored dietary plans for diabetics, hypertensive clients, elderly nutrition, and fluid logs.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Nutritional+Management" class="btn-clean-service text-danger">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- MED-16 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="clean-service-card h-100 p-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="clean-service-title mb-0" style="font-size: 1rem;">Doctor Consultations</h5>
                                <span class="badge-pill-custom badge-rose font-mono" style="font-size: 0.7rem;">MED-16</span>
                            </div>
                            <p class="clean-service-desc mb-3">
                                General medical examinations, treatment reviews, prescription renewals, and specialist referrals.
                            </p>
                        </div>
                        <a href="<?php echo APP_URL; ?>/request-care?service=Medical+Advice+%26+Other+Services" class="btn-clean-service text-danger">
                            <span>Request Service</span> <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Immediate Helpline Callout -->
        <div class="clean-service-card p-4 p-md-5 text-center" style="background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%); color: #ffffff;">
            <h3 class="fw-bold mb-2" style="font-size: 1.5rem;">Need Immediate In-Home Clinical Care?</h3>
            <p class="mb-4" style="font-size: 0.95rem; opacity: 0.9; max-width: 580px; margin: 0 auto 20px auto;">
                Our nursing supervisors are available 24/7 to assess patient needs and deploy registered clinical officers to your home.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="tel:0241974447" class="btn btn-light fw-bold py-2 px-4 shadow-sm" style="color: #1e40af; border-radius: 8px;">
                    <i class="fa-solid fa-phone me-1"></i> Call 0241974447
                </a>
                <a href="<?php echo APP_URL; ?>/request-care" class="btn btn-outline-light fw-bold py-2 px-4" style="border-radius: 8px;">
                    <i class="fa-solid fa-calendar-check me-1"></i> Request Online Consultation
                </a>
            </div>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
