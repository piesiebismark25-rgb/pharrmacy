<?php
$pageTitle = 'Contact Us - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'contact';
require_once __DIR__ . '/header.php';
?>

<!-- Banner Header -->
<section class="page-header-banner">
    <div class="container">
        <span class="page-badge">
            <i class="fa-solid fa-headset"></i> We Are Here For You 24/7
        </span>
        <h1 class="page-title">Contact & Clinical Inquiries</h1>
        <p class="page-desc">
            Reach out to our clinical coordination team for questions regarding procedures, long-term home care packages, or immediate physician visits.
        </p>
    </div>
</section>

<!-- Main Contact Section -->
<section class="section-py" style="background-color: var(--bg-base);">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- Left: Contact Details Cards -->
            <div class="col-12 col-lg-5">
                <div class="ui-card-modern p-4 mb-3">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="pillar-icon-box theme-sapphire" style="width: 44px; height: 44px; font-size: 1.1rem;">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.68rem; letter-spacing: 0.05em;">Phone Hotlines</span>
                            <a href="tel:0241974447" class="text-dark fw-bold text-decoration-none d-block" style="font-size: 1rem;">0241974447</a>
                            <a href="tel:0550974126" class="text-secondary text-decoration-none" style="font-size: 0.875rem;">0550974126</a>
                        </div>
                    </div>
                    <small class="text-muted d-block">Direct on-call nursing officers available 24/7 for home dispatch.</small>
                </div>

                <div class="ui-card-modern p-4 mb-3">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="pillar-icon-box theme-indigo" style="width: 44px; height: 44px; font-size: 1.1rem;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.68rem; letter-spacing: 0.05em;">Email Communications</span>
                            <a href="mailto:kisaiahh@icloud.com" class="text-dark fw-bold text-decoration-none d-block" style="font-size: 0.95rem;">kisaiahh@icloud.com</a>
                        </div>
                    </div>
                    <small class="text-muted d-block">Send official clinical inquiries, medical reports, or patient referrals.</small>
                </div>

                <div class="ui-card-modern p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="pillar-icon-box theme-teal" style="width: 44px; height: 44px; font-size: 1.1rem;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.68rem; letter-spacing: 0.05em;">Clinic Location</span>
                            <span class="text-dark fw-bold d-block" style="font-size: 0.95rem;">Pankrono, Kumasi, Ghana</span>
                        </div>
                    </div>
                    <small class="text-muted d-block">Ashanti Region. Domiciliary services provided across Kumasi metropolitan areas.</small>
                </div>
            </div>

            <!-- Right: Direct Message Form -->
            <div class="col-12 col-lg-7">
                <div class="ui-card-modern p-4 p-md-5">
                    
                    <h4 class="fw-bold text-dark mb-1" style="font-size: 1.25rem;">Send a Direct Message</h4>
                    <p class="text-secondary small mb-4">Have a question or special inquiry? Leave a message and we will respond promptly.</p>

                    <!-- Alerts -->
                    <?php if (isset($_SESSION['contact_success'])): ?>
                        <div class="alert alert-success border-0 rounded-3 p-3 mb-4" style="background-color: var(--accent-light); color: var(--accent-dark); border: 1px solid var(--accent-border) !important; font-size: 0.85rem;" role="alert">
                            <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                                <i class="fa-solid fa-circle-check fs-5"></i>
                                <span>Message Dispatched</span>
                            </div>
                            <p class="mb-0 ps-4"><?php echo htmlspecialchars($_SESSION['contact_success']); unset($_SESSION['contact_success']); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['contact_error'])): ?>
                        <div class="alert alert-danger border-0 rounded-3 p-3 mb-4" style="background-color: #fff1f2; color: #be123c; border: 1px solid #fecdd3 !important; font-size: 0.85rem;" role="alert">
                            <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                                <i class="fa-solid fa-circle-exclamation fs-5"></i>
                                <span>Form Error</span>
                            </div>
                            <p class="mb-0 ps-4"><?php echo htmlspecialchars($_SESSION['contact_error']); unset($_SESSION['contact_error']); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo APP_URL; ?>/contact-submit" method="POST" autocomplete="off">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Your Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control-custom w-100" placeholder="e.g. Grace Mensah" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control-custom w-100" placeholder="e.g. 055 987 6543" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Inquiry Message <span class="text-danger">*</span></label>
                                <textarea name="message" rows="4" class="form-control-custom w-100" placeholder="Write your clinical question, care requirements, or location specifics..." required></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn-cta-primary px-4 py-2">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Send Inquiry Message
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
