<?php
$pageTitle = 'Request Home Care - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'request-care';
require_once __DIR__ . '/header.php';

$selectedService = $_GET['service'] ?? '';
?>

<!-- Banner Header -->
<section class="page-header-banner">
    <div class="container">
        <span class="page-badge">
            <i class="fa-solid fa-calendar-check"></i> Fast Home Visit Scheduling
        </span>
        <h1 class="page-title">Request a Home Care Visit</h1>
        <p class="page-desc">
            Submit your patient details below. Our on-call clinical officer will contact you immediately to confirm the appointment and medical preparations.
        </p>
    </div>
</section>

<!-- Main Request Care Section -->
<section class="section-py" style="background-color: var(--bg-base);">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- Left: Consultation Form Card -->
            <div class="col-12 col-lg-8">
                <div class="ui-card-modern p-4 p-md-5">
                    
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                        <div>
                            <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Patient Consultation Form</h4>
                            <small class="text-muted">Enter accurate contact info for prompt phone confirmation</small>
                        </div>
                        <span class="badge-pill-custom bg-blue-subtle text-blue-accent font-mono fw-bold">ONLINE INTAKE</span>
                    </div>

                    <!-- Alerts -->
                    <?php if (isset($_SESSION['booking_success'])): ?>
                        <div class="alert alert-success border-0 rounded-3 p-3 mb-4" style="background-color: var(--accent-light); color: var(--accent-dark); border: 1px solid var(--accent-border) !important; font-size: 0.85rem;" role="alert">
                            <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                                <i class="fa-solid fa-circle-check fs-5"></i>
                                <span>Request Successfully Received!</span>
                            </div>
                            <p class="mb-0 ps-4"><?php echo htmlspecialchars($_SESSION['booking_success']); unset($_SESSION['booking_success']); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['booking_error'])): ?>
                        <div class="alert alert-danger border-0 rounded-3 p-3 mb-4" style="background-color: #fff1f2; color: #be123c; border: 1px solid #fecdd3 !important; font-size: 0.85rem;" role="alert">
                            <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                                <i class="fa-solid fa-circle-exclamation fs-5"></i>
                                <span>Submission Error</span>
                            </div>
                            <p class="mb-0 ps-4"><?php echo htmlspecialchars($_SESSION['booking_error']); unset($_SESSION['booking_error']); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo APP_URL; ?>/book-request" method="POST" autocomplete="off">
                        <input type="hidden" name="redirect_to" value="/request-care">

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Patient Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="full_name" class="form-control-custom w-100" placeholder="e.g. Samuel Mensah" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Phone Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control-custom w-100" placeholder="e.g. 024 123 4567" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Primary Procedure / Service Needed <span class="text-danger">*</span></label>
                                <select name="service" id="serviceSelect" class="form-select-custom w-100" required>
                                    <optgroup label="Clinical Nursing & Diagnostics">
                                        <option value="Glucose Monitoring" <?php echo str_contains($selectedService, 'Glucose') ? 'selected' : ''; ?>>Glucose Monitoring & Diabetic Care</option>
                                        <option value="Vital Signs Monitoring" <?php echo str_contains($selectedService, 'Vital') ? 'selected' : ''; ?>>Vital Signs & BP Surveillance</option>
                                        <option value="Serving Medication" <?php echo str_contains($selectedService, 'Medication') ? 'selected' : ''; ?>>Serving Prescribed Medication</option>
                                        <option value="Blood Sampling for Laboratory" <?php echo str_contains($selectedService, 'Blood') ? 'selected' : ''; ?>>Blood Sampling (Phlebotomy / Lab)</option>
                                    </optgroup>

                                    <optgroup label="Specialized Clinical Procedures">
                                        <option value="Catheterization" <?php echo str_contains($selectedService, 'Catheterization') ? 'selected' : ''; ?>>Catheterization (Insertion / Change)</option>
                                        <option value="Catheter Care" <?php echo str_contains($selectedService, 'Catheter Care') ? 'selected' : ''; ?>>Catheter Care & Flushing</option>
                                        <option value="Wound Dressing" <?php echo str_contains($selectedService, 'Wound') ? 'selected' : ''; ?>>Aseptic Wound & Ulcer Dressing</option>
                                        <option value="NG Tube Feeding" <?php echo str_contains($selectedService, 'Tube') ? 'selected' : ''; ?>>NG Tube Feeding Procedure</option>
                                    </optgroup>

                                    <optgroup label="Rehabilitation & Recovery">
                                        <option value="Post Operative Care" <?php echo str_contains($selectedService, 'Post') ? 'selected' : ''; ?>>Post-Operative Home Recovery</option>
                                        <option value="Physiotherapy and Exercise" <?php echo str_contains($selectedService, 'Physio') ? 'selected' : ''; ?>>Physiotherapy & Mobility Rehab</option>
                                        <option value="Health Talk" <?php echo str_contains($selectedService, 'Health') ? 'selected' : ''; ?>>Health Talk & Family Counseling</option>
                                        <option value="Hospital Escort" <?php echo str_contains($selectedService, 'Escort') ? 'selected' : ''; ?>>Hospital Escort Service</option>
                                    </optgroup>

                                    <optgroup label="Daily Living & Wellness">
                                        <option value="Bed Bathing" <?php echo str_contains($selectedService, 'Bath') ? 'selected' : ''; ?>>Bed Bathing Assisted Hygiene</option>
                                        <option value="Oral Care" <?php echo str_contains($selectedService, 'Oral') ? 'selected' : ''; ?>>Oral Hygiene Care</option>
                                        <option value="Nutritional Management" <?php echo str_contains($selectedService, 'Nutri') ? 'selected' : ''; ?>>Nutritional & Dietary Planning</option>
                                        <option value="Medical Advice & Other Services" <?php echo (str_contains($selectedService, 'Advice') || empty($selectedService)) ? 'selected' : ''; ?>>Medical Advice & Consultations</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Residential Address (Kumasi Location)</label>
                                <input type="text" name="address" class="form-control-custom w-100" placeholder="e.g. House 14, Pankrono Estate, Kumasi">
                            </div>

                            <div class="col-6 col-md-6">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" name="preferred_date" class="form-control-custom w-100" value="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="col-6 col-md-6">
                                <label class="form-label">Preferred Arrival Time</label>
                                <input type="time" name="preferred_time" class="form-control-custom w-100" value="09:00">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Patient Health Condition / Special Instructions</label>
                                <textarea name="notes" rows="3" class="form-control-custom w-100" placeholder="Describe symptoms, patient mobility, medical history, or urgent requests..."></textarea>
                            </div>

                            <div class="col-12 text-center pt-3">
                                <button type="submit" class="btn-cta-primary px-5 py-3 fs-6 w-100 w-md-auto">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Submit Care Request
                                </button>
                                <small class="text-muted d-block mt-2">No advance online payment required. Official statements issued during visit.</small>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Right: 3-Step Process & Hotline Card -->
            <div class="col-12 col-lg-4">
                <!-- Direct Hotline Callout Card -->
                <div class="ui-card-modern p-4 mb-4" style="background-color: var(--accent-light); border-color: var(--accent-border);">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fa-solid fa-phone-volume text-blue-accent fs-4"></i>
                        <h6 class="fw-bold text-dark mb-0">Direct Emergency Hotline</h6>
                    </div>
                    <p class="text-secondary small mb-3">
                        For immediate dispatch or critical bedside advice, call our clinical officers directly:
                    </p>
                    <div class="d-grid gap-2">
                        <a href="tel:0241974447" class="btn btn-primary-custom py-2">
                            <i class="fa-solid fa-phone me-1"></i> 0241974447
                        </a>
                        <a href="tel:0550974126" class="btn btn-secondary-custom py-2">
                            <i class="fa-solid fa-phone me-1"></i> 0550974126
                        </a>
                    </div>
                </div>

                <!-- 3-Step Care Progression -->
                <div class="ui-card-modern p-4">
                    <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                        <i class="fa-solid fa-list-ol text-blue-accent me-1"></i> How It Works
                    </h6>

                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="avatar-box" style="width: 28px; height: 28px; font-size: 0.75rem;">1</div>
                        <div>
                            <strong class="text-dark d-block" style="font-size: 0.8125rem;">Submit Request</strong>
                            <small class="text-muted">Fill out the online intake form above.</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="avatar-box" style="width: 28px; height: 28px; font-size: 0.75rem;">2</div>
                        <div>
                            <strong class="text-dark d-block" style="font-size: 0.8125rem;">Clinical Confirmation</strong>
                            <small class="text-muted">Our medical officer calls to verify location & needs.</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="avatar-box" style="width: 28px; height: 28px; font-size: 0.75rem;">3</div>
                        <div>
                            <strong class="text-dark d-block" style="font-size: 0.8125rem;">Home Visit & Care</strong>
                            <small class="text-muted">Practitioner arrives with sterile supplies to treat patient.</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
