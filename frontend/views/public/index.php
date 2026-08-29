<?php
$pageTitle = 'I.K HOLINESS HOME CARE SERVICES - Premier Domiciliary Healthcare Kumasi';
$currentPage = 'home';
require_once __DIR__ . '/header.php';
?>

<!-- 1. Hero Section -->
<section class="hero-section" style="background: radial-gradient(circle at 80% 20%, #eff6ff 0%, #ffffff 70%); padding: 72px 0 60px 0; border-bottom: 1px solid var(--border-subtle);">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">
            
            <!-- Left Hero Content -->
            <div class="col-12 col-lg-7">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background-color: #eff6ff; border: 1px solid #bfdbfe;">
                    <span class="badge-pill-custom badge-blue font-mono p-0" style="background: none; border: none; font-size: 0.72rem;">
                        <i class="fa-solid fa-house-medical me-1"></i> LICENSED HOME CARE PRACTICE
                    </span>
                </div>

                <h1 class="fw-bold text-dark mb-3" style="font-size: clamp(2.2rem, 4.5vw, 3.2rem); letter-spacing: -0.03em; line-height: 1.15;">
                    Hospital-Grade Medical Care, Delivered to Your Bedside
                </h1>

                <p class="text-secondary mb-4" style="font-size: 1.05rem; line-height: 1.65; max-width: 600px;">
                    Professional physician-directed nursing, diabetic glycemic monitoring, sterile catheterization, wound debridement, and stroke rehabilitation in the comfort of your home in Kumasi.
                </p>

                <!-- Action CTA Cluster -->
                <div class="d-flex align-items-center gap-3 flex-wrap mb-4">
                    <a href="<?php echo APP_URL; ?>/request-care" class="btn-cta-primary py-3 px-4 shadow-sm" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Book In-Home Care</span>
                    </a>
                    <a href="tel:0241974447" class="btn-cta-secondary py-3 px-4" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-phone text-primary"></i>
                        <span>Call 0241974447</span>
                    </a>
                </div>

                <!-- Trust Guarantee Pill -->
                <div class="d-flex align-items-center gap-3 pt-2 text-muted small" style="font-size: 0.8125rem;">
                    <div class="d-flex align-items-center text-warning">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span><strong>4.9 / 5.0 Rating</strong> &bull; Trusted by 500+ families across Greater Kumasi</span>
                </div>
            </div>

            <!-- Right Hero Card / Live Nursing Simulation -->
            <div class="col-12 col-lg-5">
                <div class="clean-service-card p-4 p-md-5" style="border: 1.5px solid #bfdbfe; background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%); box-shadow: 0 16px 36px rgba(37, 99, 235, 0.08);">
                    
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <div class="brand-icon-sq" style="width: 36px; height: 36px; font-size: 1rem;">
                                <i class="fa-solid fa-user-nurse"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Clinical Officer On-Duty</h6>
                                <small class="text-success font-mono" style="font-size: 0.72rem;"><i class="fa-solid fa-circle me-1" style="font-size: 0.5rem;"></i> Active Domiciliary Dispatch</small>
                            </div>
                        </div>
                        <span class="badge-pill-custom badge-emerald font-mono">24/7 ON-CALL</span>
                    </div>

                    <!-- Simulated Patient Vitals Monitor Box -->
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="p-2 px-3 rounded-3 bg-white border" style="font-size: 0.78rem;">
                                <span class="text-muted d-block" style="font-size: 0.68rem; text-transform: uppercase;">Blood Pressure</span>
                                <strong class="text-dark font-mono fs-6">120 / 80</strong> <small class="text-muted">mmHg</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 px-3 rounded-3 bg-white border" style="font-size: 0.78rem;">
                                <span class="text-muted d-block" style="font-size: 0.68rem; text-transform: uppercase;">Oxygen (SpO2)</span>
                                <strong class="text-primary font-mono fs-6">98%</strong> <small class="text-muted">Normal</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 px-3 rounded-3 bg-white border" style="font-size: 0.78rem;">
                                <span class="text-muted d-block" style="font-size: 0.68rem; text-transform: uppercase;">Blood Glucose</span>
                                <strong class="text-success font-mono fs-6">5.4</strong> <small class="text-muted">mmol/L</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 px-3 rounded-3 bg-white border" style="font-size: 0.78rem;">
                                <span class="text-muted d-block" style="font-size: 0.68rem; text-transform: uppercase;">Heart Rate</span>
                                <strong class="text-dark font-mono fs-6">72</strong> <small class="text-muted">BPM</small>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 rounded-3 bg-soft-blue border border-primary-subtle text-dark small" style="font-size: 0.78rem;">
                        <i class="fa-solid fa-shield-check text-primary me-1"></i> All procedures performed with single-use sterile medical kits.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. Trust Guarantees Ribbon -->
<section style="background-color: #ffffff; border-bottom: 1px solid var(--border-subtle); padding: 28px 0;">
    <div class="container">
        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <div class="d-flex align-items-center gap-3 p-2">
                    <div class="icon-sq bg-blue-subtle text-primary" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <div>
                        <strong class="text-dark d-block" style="font-size: 0.85rem;">Certified Officers</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Licensed clinical nurses</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="d-flex align-items-center gap-3 p-2">
                    <div class="icon-sq bg-purple-subtle text-purple" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                        <i class="fa-solid fa-shield-virus"></i>
                    </div>
                    <div>
                        <strong class="text-dark d-block" style="font-size: 0.85rem;">Sterile Protocols</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Aseptic hospital kits</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="d-flex align-items-center gap-3 p-2">
                    <div class="icon-sq bg-emerald-subtle text-success" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                        <i class="fa-solid fa-truck-medical"></i>
                    </div>
                    <div>
                        <strong class="text-dark d-block" style="font-size: 0.85rem;">Rapid Home Visits</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Prompt on-call response</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="d-flex align-items-center gap-3 p-2">
                    <div class="icon-sq bg-soft-amber text-danger" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <div>
                        <strong class="text-dark d-block" style="font-size: 0.85rem;">Transparent Billing</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Itemized receipt vouchers</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Specialty Healthcare Services Showcase -->
<section id="services" class="section-py" style="background-color: #f8fafc; border-bottom: 1px solid var(--border-subtle);">
    <div class="container">
        
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge-pill-custom badge-blue font-mono fw-bold mb-2">
                <i class="fa-solid fa-star me-1"></i> WHAT WE OFFER
            </span>
            <h2 class="fw-bold text-dark mb-2" style="font-size: 2rem; letter-spacing: -0.02em;">
                Specialized Clinical Services
            </h2>
            <p class="text-secondary" style="font-size: 0.95rem;">
                Doctor-directed clinical procedures delivered directly to the comfort of your residence in Kumasi.
            </p>
        </div>

        <div class="row g-4">
            
            <!-- Card 1: Clinical Nursing -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="clean-service-card h-100">
                    <div class="clean-service-icon bg-soft-blue text-primary">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <h4 class="clean-service-title">Clinical Nursing</h4>
                    <p class="clean-service-desc">
                        Professional diagnostic monitoring, vital tracking, and scheduled medication in your home.
                    </p>
                    <div class="clean-service-tags mb-4">
                        <span class="service-mini-pill">Glucose Checks</span>
                        <span class="service-mini-pill">Vital Signs</span>
                        <span class="service-mini-pill">Lab Sampling</span>
                        <span class="service-mini-pill">Medications</span>
                    </div>
                    <a href="<?php echo APP_URL; ?>/request-care?service=Clinical+Nursing" class="btn-clean-service text-primary">
                        <span>Request Care</span>
                        <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2: Specialized Care -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="clean-service-card h-100">
                    <div class="clean-service-icon bg-soft-purple text-purple">
                        <i class="fa-solid fa-syringe"></i>
                    </div>
                    <h4 class="clean-service-title">Specialized Care</h4>
                    <p class="clean-service-desc">
                        Sterile aseptic procedures, advanced wound debridement, and clinical tube maintenance.
                    </p>
                    <div class="clean-service-tags mb-4">
                        <span class="service-mini-pill">Wound Dressing</span>
                        <span class="service-mini-pill">Catheter Care</span>
                        <span class="service-mini-pill">NG Tube Feeding</span>
                        <span class="service-mini-pill">Aseptic Kits</span>
                    </div>
                    <a href="<?php echo APP_URL; ?>/request-care?service=Specialized+Care" class="btn-clean-service text-purple">
                        <span>Request Care</span>
                        <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3: Rehabilitation -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="clean-service-card h-100">
                    <div class="clean-service-icon bg-soft-emerald text-success">
                        <i class="fa-solid fa-person-walking"></i>
                    </div>
                    <h4 class="clean-service-title">Rehabilitation</h4>
                    <p class="clean-service-desc">
                        Dedicated physiotherapy, stroke mobility exercises, and surgical recovery assistance.
                    </p>
                    <div class="clean-service-tags mb-4">
                        <span class="service-mini-pill">Physiotherapy</span>
                        <span class="service-mini-pill">Post-Op Recovery</span>
                        <span class="service-mini-pill">Hospital Escort</span>
                        <span class="service-mini-pill">Health Talk</span>
                    </div>
                    <a href="<?php echo APP_URL; ?>/request-care?service=Rehabilitation" class="btn-clean-service text-success">
                        <span>Request Care</span>
                        <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 4: Daily Living & Wellness -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="clean-service-card h-100">
                    <div class="clean-service-icon bg-soft-amber text-danger">
                        <i class="fa-solid fa-bath"></i>
                    </div>
                    <h4 class="clean-service-title">Daily Living & Care</h4>
                    <p class="clean-service-desc">
                        Compassionate bed bathing, personal oral hygiene, nutrition planning, and doctor reviews.
                    </p>
                    <div class="clean-service-tags mb-4">
                        <span class="service-mini-pill">Bed Bathing</span>
                        <span class="service-mini-pill">Oral Hygiene</span>
                        <span class="service-mini-pill">Nutrition Plans</span>
                        <span class="service-mini-pill">Doctor Advice</span>
                    </div>
                    <a href="<?php echo APP_URL; ?>/request-care?service=Daily+Living+Care" class="btn-clean-service text-danger">
                        <span>Request Care</span>
                        <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="<?php echo APP_URL; ?>/services" class="btn-cta-secondary py-2 px-4">
                <span>View Complete 16-Procedure Catalog</span>
                <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>

<!-- 4. How It Works (3-Step Patient Journey) -->
<section class="section-py" style="background-color: #ffffff; border-bottom: 1px solid var(--border-subtle);">
    <div class="container">
        
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge-pill-custom badge-purple font-mono fw-bold mb-2">
                <i class="fa-solid fa-route me-1"></i> SIMPLE PATIENT JOURNEY
            </span>
            <h2 class="fw-bold text-dark mb-2" style="font-size: 2rem; letter-spacing: -0.02em;">
                How Home Care Works
            </h2>
            <p class="text-secondary" style="font-size: 0.95rem;">
                Receive professional medical attention in 3 straightforward steps without clinic waiting times.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="p-4 rounded-4 text-center h-100" style="background-color: #f8fafc; border: 1px solid var(--border-subtle);">
                    <div class="icon-sq bg-blue-subtle text-primary mx-auto mb-3" style="width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <span>1</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Request Care Online or Call</h5>
                    <p class="text-secondary small mb-0" style="line-height: 1.55;">
                        Select your needed procedure or phone our helpline at 0241974447 to describe patient symptoms.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="p-4 rounded-4 text-center h-100" style="background-color: #f8fafc; border: 1px solid var(--border-subtle);">
                    <div class="icon-sq bg-purple-subtle text-purple mx-auto mb-3" style="width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <span>2</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Nurse Dispatch & Triage</h5>
                    <p class="text-secondary small mb-0" style="line-height: 1.55;">
                        A licensed clinical officer prepares sterile procedure equipment and travels directly to your residence.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="p-4 rounded-4 text-center h-100" style="background-color: #f8fafc; border: 1px solid var(--border-subtle);">
                    <div class="icon-sq bg-emerald-subtle text-success mx-auto mb-3" style="width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <span>3</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Bedside Treatment & Records</h5>
                    <p class="text-secondary small mb-0" style="line-height: 1.55;">
                        Receive gentle, sterile treatment. Vital logs and clinical notes are filed directly into your medical dossier.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 5. Direct Callout Banner -->
<section class="section-py" style="background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%); color: #ffffff;">
    <div class="container text-center">
        <span class="badge-pill-custom bg-white text-primary font-mono fw-bold mb-3" style="font-size: 0.75rem;">
            <i class="fa-solid fa-phone me-1"></i> ON-CALL HELPLINE
        </span>
        <h2 class="fw-bold text-white mb-3" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); letter-spacing: -0.02em;">
            Have Questions or Need an Immediate Home Visit?
        </h2>
        <p class="mb-4" style="font-size: 1rem; opacity: 0.9; max-width: 620px; margin: 0 auto 24px auto; line-height: 1.6;">
            Speak directly with our clinical supervisor to schedule home nursing, catheter maintenance, or physician evaluations in Kumasi.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="tel:0241974447" class="btn btn-light fw-bold py-3 px-4 shadow-sm" style="color: #1e40af; border-radius: 10px; font-size: 0.95rem;">
                <i class="fa-solid fa-phone me-1"></i> Call 0241974447
            </a>
            <a href="<?php echo APP_URL; ?>/request-care" class="btn btn-outline-light fw-bold py-3 px-4" style="border-radius: 10px; font-size: 0.95rem;">
                <i class="fa-solid fa-calendar-check me-1"></i> Request Care Online
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>