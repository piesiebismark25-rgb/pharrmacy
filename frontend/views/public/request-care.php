<?php
$pageTitle = 'Request Home Care - I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'request-care';
require_once __DIR__ . '/header.php';

$selectedService = $_GET['service'] ?? '';
?>

<!-- 1. Hero Header Banner -->
<section class="page-header-banner" style="background: linear-gradient(180deg, #eff6ff 0%, #ffffff 100%); border-bottom: 1px solid #e2e8f0;">
    <div class="container text-center">
        <span class="badge-pill-custom badge-blue font-mono fw-bold mb-3">
            <i class="fa-solid fa-calendar-check me-1"></i> FAST HOME VISIT SCHEDULING
        </span>
        <h1 class="page-title text-dark fw-bold mb-3" style="font-size: clamp(2rem, 4vw, 2.75rem); letter-spacing: -0.02em;">
            Schedule In-Home Clinical Care
        </h1>
        <p class="page-desc text-secondary" style="font-size: 1.05rem; max-width: 680px; margin: 0 auto 20px auto; line-height: 1.6;">
            Submit patient details below. Our on-call nursing supervisor will contact you within 15 minutes to confirm the appointment and medical preparations.
        </p>
    </div>
</section>

<!-- 2. Main Request Care Section -->
<section class="section-py" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- Left: Consultation Form Card (Col-lg-8) -->
            <div class="col-12 col-lg-8">
                <div class="clean-service-card p-4 p-md-5" style="background-color: #ffffff;">
                    
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                        <div>
                            <h4 class="fw-bold text-dark mb-0" style="font-size: 1.2rem;">Patient Intake & Booking Form</h4>
                            <small class="text-muted">Enter accurate details for swift clinical dispatch</small>
                        </div>
                        <span class="badge-pill-custom badge-blue font-mono fw-bold">ONLINE INTAKE</span>
                    </div>

                    <!-- Alerts -->
                    <?php if (isset($_SESSION['booking_success'])): ?>
                        <div class="alert alert-success border-0 rounded-3 p-3 mb-4" style="background-color: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0 !important; font-size: 0.85rem;" role="alert">
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
                            
                            <!-- Patient Name -->
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Patient Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="full_name" class="form-control form-control-custom" placeholder="e.g. Samuel Mensah" required>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Phone Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control form-control-custom font-mono" placeholder="e.g. 024 123 4567" required>
                            </div>

                            <!-- Procedure Selection -->
                            <div class="col-12">
                                <label class="form-label-custom">Primary Clinical Procedure Needed <span class="text-danger">*</span></label>
                                <select name="service" id="serviceSelect" class="form-select form-select-custom" required>
                                    <optgroup label="Clinical Nursing & Diagnostics">
                                        <option value="Glucose Monitoring" <?php echo str_contains($selectedService, 'Glucose') ? 'selected' : ''; ?>>Glucose Monitoring & Diabetic Logs</option>
                                        <option value="Vital Signs Monitoring" <?php echo str_contains($selectedService, 'Vital') ? 'selected' : ''; ?>>Vital Signs & BP Tracking</option>
                                        <option value="Serving Medication" <?php echo str_contains($selectedService, 'Medication') ? 'selected' : ''; ?>>Serving Medication & IV Injections</option>
                                        <option value="Blood Sampling for Laboratory" <?php echo str_contains($selectedService, 'Blood') ? 'selected' : ''; ?>>Blood Sampling (Phlebotomy / Lab)</option>
                                    </optgroup>

                                    <optgroup label="Specialized Clinical Procedures">
                                        <option value="Catheterization" <?php echo str_contains($selectedService, 'Catheterization') ? 'selected' : ''; ?>>Catheterization (Insertion / Change)</option>
                                        <option value="Catheter Care" <?php echo str_contains($selectedService, 'Catheter Care') ? 'selected' : ''; ?>>Catheter Care & Flushing</option>
                                        <option value="Wound Dressing" <?php echo str_contains($selectedService, 'Wound') ? 'selected' : ''; ?>>Wound & Diabetic Ulcer Dressing</option>
                                        <option value="NG Tube Feeding" <?php echo str_contains($selectedService, 'Tube') ? 'selected' : ''; ?>>NG Tube Feeding Management</option>
                                    </optgroup>

                                    <optgroup label="Rehabilitation & Recovery">
                                        <option value="Post Operative Care" <?php echo str_contains($selectedService, 'Post') ? 'selected' : ''; ?>>Post-Operative Home Recovery</option>
                                        <option value="Physiotherapy and Exercise" <?php echo str_contains($selectedService, 'Physio') ? 'selected' : ''; ?>>Physiotherapy & Stroke Mobility</option>
                                        <option value="Health Talk" <?php echo str_contains($selectedService, 'Health') ? 'selected' : ''; ?>>Health Talk & Family Counseling</option>
                                        <option value="Hospital Escort" <?php echo str_contains($selectedService, 'Escort') ? 'selected' : ''; ?>>Nurse-Accompanied Hospital Escort</option>
                                    </optgroup>

                                    <optgroup label="Daily Living & Care">
                                        <option value="Bed Bathing" <?php echo str_contains($selectedService, 'Bath') ? 'selected' : ''; ?>>Bed Bathing Assisted Hygiene</option>
                                        <option value="Oral Care" <?php echo str_contains($selectedService, 'Oral') ? 'selected' : ''; ?>>Antiseptic Oral Hygiene Care</option>
                                        <option value="Nutritional Management" <?php echo str_contains($selectedService, 'Nutritional') ? 'selected' : ''; ?>>Diabetic & Hypertension Nutrition Planning</option>
                                        <option value="Medical Advice & Other Services" <?php echo str_contains($selectedService, 'Advice') ? 'selected' : ''; ?>>Doctor Consultation & Clinical Review</option>
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Preferred Date & Time -->
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Preferred Visit Date <span class="text-danger">*</span></label>
                                <input type="date" name="preferred_date" class="form-control form-control-custom" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Preferred Time Window <span class="text-danger">*</span></label>
                                <select name="preferred_time" class="form-select form-select-custom" required>
                                    <option value="Morning (8:00 AM - 12:00 PM)">Morning (8:00 AM - 12:00 PM)</option>
                                    <option value="Afternoon (12:00 PM - 4:00 PM)">Afternoon (12:00 PM - 4:00 PM)</option>
                                    <option value="Evening (4:00 PM - 8:00 PM)">Evening (4:00 PM - 8:00 PM)</option>
                                    <option value="Immediate / Emergency On-Call">Immediate / Emergency On-Call</option>
                                </select>
                            </div>

                            <!-- Residential Location / Landmark -->
                            <div class="col-12">
                                <label class="form-label-custom">Residential Location & Landmark <span class="text-danger">*</span></label>
                                <input type="text" name="location" class="form-control form-control-custom" placeholder="e.g. Pankrono Estate, near Shell filling station" required>
                            </div>

                            <!-- Special Notes -->
                            <div class="col-12">
                                <label class="form-label-custom">Patient Condition Notes <span class="text-muted fw-normal text-lowercase">(optional)</span></label>
                                <textarea name="notes" class="form-control form-control-custom" rows="3" placeholder="Briefly describe patient diagnosis, mobility status, or specific care instructions..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 pt-3">
                                <button type="submit" class="btn-cta-primary w-100 py-3 justify-content-center shadow-sm" style="font-size: 1rem;">
                                    <i class="fa-solid fa-calendar-check me-1"></i> Submit & Schedule Home Care
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <!-- Right: Service Protocol Summary (Col-lg-4) -->
            <div class="col-12 col-lg-4">
                
                <div class="clean-service-card p-4 mb-4" style="background-color: #ffffff;">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <div class="icon-sq bg-blue-subtle text-primary" style="width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">What Happens Next?</h6>
                    </div>

                    <div class="d-flex flex-column gap-3 text-secondary small" style="font-size: 0.8125rem; line-height: 1.5;">
                        <div class="d-flex gap-2">
                            <i class="fa-solid fa-phone text-primary mt-1"></i>
                            <div>
                                <strong class="text-dark d-block">1. Phone Triage</strong>
                                Nurse coordinator calls within 15 minutes to verify symptoms.
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <i class="fa-solid fa-shield-virus text-purple mt-1"></i>
                            <div>
                                <strong class="text-dark d-block">2. Sterile Kit Prep</strong>
                                Medical equipment and single-use supplies are packed.
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <i class="fa-solid fa-house-medical text-success mt-1"></i>
                            <div>
                                <strong class="text-dark d-block">3. Home Visit Arrival</strong>
                                Clinical officer arrives at your home at the requested time.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clean-service-card p-4 text-center" style="background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%); color: #ffffff;">
                    <i class="fa-solid fa-phone-volume fs-3 mb-2"></i>
                    <h6 class="fw-bold text-white mb-1">Prefer to Book by Phone?</h6>
                    <p class="small mb-3" style="opacity: 0.9; font-size: 0.8rem;">Call our 24/7 clinical hotline directly:</p>
                    <a href="tel:0241974447" class="btn btn-light fw-bold w-100 py-2" style="color: #1e40af; border-radius: 8px;">
                        <i class="fa-solid fa-phone me-1"></i> 0241974447
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
