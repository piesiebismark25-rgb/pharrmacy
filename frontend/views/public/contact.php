<?php
$pageTitle = 'Contact & Clinical Inquiries - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'contact';
require_once __DIR__ . '/header.php';
?>

<!-- 1. Hero Header Banner -->
<section class="page-header-banner" style="background: linear-gradient(180deg, #eff6ff 0%, #ffffff 100%); border-bottom: 1px solid #e2e8f0;">
    <div class="container text-center">
        <span class="badge-pill-custom badge-blue font-mono fw-bold mb-3">
            <i class="fa-solid fa-headset me-1"></i> WE ARE HERE FOR YOU 24/7
        </span>
        <h1 class="page-title text-dark fw-bold mb-3" style="font-size: clamp(2rem, 4vw, 2.75rem); letter-spacing: -0.02em;">
            Contact & Clinical Inquiries
        </h1>
        <p class="page-desc text-secondary" style="font-size: 1.05rem; max-width: 680px; margin: 0 auto 20px auto; line-height: 1.6;">
            Speak directly with our clinical coordination desk for questions regarding home nursing procedures, long-term care plans, or immediate doctor visits.
        </p>
    </div>
</section>

<!-- 2. Main Contact Section -->
<section class="section-py" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- Left: Contact Details Cards -->
            <div class="col-12 col-lg-5">
                
                <!-- Phone Hotlines -->
                <div class="clean-service-card p-4 mb-3" style="background-color: #ffffff;">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="icon-sq bg-blue-subtle text-primary" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">24/7 Phone Hotlines</span>
                            <a href="tel:0241974447" class="text-dark fw-bold text-decoration-none d-block font-mono" style="font-size: 1.05rem;">0241974447</a>
                            <a href="tel:0550974126" class="text-secondary text-decoration-none font-mono" style="font-size: 0.9rem;">0550974126</a>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">On-call registered nurses available for immediate home visit triage.</small>
                </div>

                <!-- Email Communications -->
                <div class="clean-service-card p-4 mb-3" style="background-color: #ffffff;">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="icon-sq bg-purple-subtle text-purple" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">Clinical Email</span>
                            <a href="mailto:kisaiahh@icloud.com" class="text-dark fw-bold text-decoration-none d-block" style="font-size: 0.98rem;">kisaiahh@icloud.com</a>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">Send official medical dossiers, referrals, or corporate care requests.</small>
                </div>

                <!-- Clinic Location -->
                <div class="clean-service-card p-4" style="background-color: #ffffff;">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="icon-sq bg-emerald-subtle text-success" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">Practice Headquarters</span>
                            <strong class="text-dark d-block" style="font-size: 0.98rem;">Pankrono, Kumasi, Ghana</strong>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">Ashanti Region. On-call domiciliary dispatch across Greater Kumasi.</small>
                </div>

            </div>

            <!-- Right: Direct Message Form -->
            <div class="col-12 col-lg-7">
                <div class="clean-service-card p-4 p-md-5" style="background-color: #ffffff;">
                    
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                        <div>
                            <h4 class="fw-bold text-dark mb-1" style="font-size: 1.2rem;">Send a Direct Clinical Message</h4>
                            <small class="text-muted">Have a general question or specific medical requirement?</small>
                        </div>
                        <span class="badge-pill-custom badge-blue font-mono">DIRECT INTAKE</span>
                    </div>

                    <!-- Alerts -->
                    <?php if (isset($_SESSION['contact_success'])): ?>
                        <div class="alert alert-success border-0 rounded-3 p-3 mb-4" style="background-color: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0 !important; font-size: 0.85rem;" role="alert">
                            <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                                <i class="fa-solid fa-circle-check fs-5"></i>
                                <span>Message Successfully Dispatched!</span>
                            </div>
                            <p class="mb-0 ps-4"><?php echo htmlspecialchars($_SESSION['contact_success']); unset($_SESSION['contact_success']); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['contact_error'])): ?>
                        <div class="alert alert-danger border-0 rounded-3 p-3 mb-4" style="background-color: #fff1f2; color: #be123c; border: 1px solid #fecdd3 !important; font-size: 0.85rem;" role="alert">
                            <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                                <i class="fa-solid fa-circle-exclamation fs-5"></i>
                                <span>Submission Error</span>
                            </div>
                            <p class="mb-0 ps-4"><?php echo htmlspecialchars($_SESSION['contact_error']); unset($_SESSION['contact_error']); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo APP_URL; ?>/contact-submit" method="POST" autocomplete="off">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Your Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control form-control-custom" placeholder="e.g. Grace Mensah" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Phone Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control form-control-custom font-mono" placeholder="e.g. 024 123 4567" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Email Address <span class="text-muted fw-normal text-lowercase">(optional)</span></label>
                                <input type="email" name="email" class="form-control form-control-custom" placeholder="e.g. grace@example.com">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Inquiry Subject <span class="text-danger">*</span></label>
                                <input type="text" name="subject" class="form-control form-control-custom" placeholder="e.g. Home Visit Consultation" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label-custom">Your Message / Medical Details <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control form-control-custom" rows="4" placeholder="Describe patient condition or requested care schedule..." required></textarea>
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn-cta-primary w-100 py-3 justify-content-center shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Send Clinical Message
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
