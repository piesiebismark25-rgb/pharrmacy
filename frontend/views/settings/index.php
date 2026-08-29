<!-- Modern Executive Clinic Configuration & Practice Settings View -->
<div class="row justify-content-center">
    <div class="col-12 col-xl-10 col-xxl-9">

        <!-- 1. Top Command Header -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <h4 class="fw-bold text-dark mb-0" style="font-size: 1.2rem; letter-spacing: -0.02em;">
                        Clinic Configuration & Practice Settings
                    </h4>
                    <span class="live-status-pill">
                        <span class="live-dot-pulse"></span>
                        Admin Control
                    </span>
                </div>
                <small class="text-muted">Configure clinic identity, official letterhead, communication channels, and billing defaults</small>
            </div>
        </div>

        <?php
        // Normalize currency encoding
        $currentCurrency = $settings['currency'] ?? 'GH₵';
        if (strpos($currentCurrency, 'â') !== false || empty($currentCurrency)) {
            $currentCurrency = 'GH₵';
        }
        ?>

        <!-- 2. Live Letterhead Preview Banner -->
        <div class="letterhead-preview-card p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                <span class="preview-badge">
                    <i class="fa-solid fa-eye me-1"></i> Live Official Letterhead Preview
                </span>
                <small class="text-muted" style="font-size: 0.72rem;">Reflected on all invoices, receipts & medical dossiers</small>
            </div>

            <div class="d-flex flex-column flex-md-row align-items-start gap-3">
                <div class="preview-logo-sq">
                    <i class="fa-solid fa-house-medical"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="fw-bold text-dark mb-1" id="previewName" style="font-size: 1.1rem; letter-spacing: -0.02em;">
                        <?php echo htmlspecialchars($settings['clinic_name'] ?? 'I.K HOLINESS HOME CARE SERVICES'); ?>
                    </h5>
                    <span class="badge-motto mb-2">"YOUR HEALTH IS OUR LIFE"</span>
                    <div class="text-secondary small mt-1" style="font-size: 0.8rem; line-height: 1.45;">
                        <div>
                            <i class="fa-solid fa-location-dot text-primary me-1"></i>
                            <span id="previewAddress"><?php echo htmlspecialchars($settings['clinic_address'] ?? 'Pankrono, Kumasi, Ghana'); ?></span>
                        </div>
                        <div>
                            <i class="fa-solid fa-phone text-primary me-1"></i>
                            <span id="previewPhone"><?php echo htmlspecialchars($settings['phone_number'] ?? '0241974447 / 0550974126'); ?></span>
                            &bull; 
                            <i class="fa-regular fa-envelope text-primary ms-1 me-1"></i>
                            <span id="previewEmail"><?php echo htmlspecialchars($settings['email'] ?? 'kisaiahh@icloud.com'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Main Configuration Bento Form -->
        <form action="<?php echo APP_URL; ?>/settings/update" method="POST">
            
            <!-- Bento Box 1: Practice Profile & Letterhead -->
            <div class="analytics-card p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                    <div class="icon-sq bg-blue-subtle text-primary" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                        <i class="fa-solid fa-hospital"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 1rem;">Practice Identity & Document Header</h6>
                        <small class="text-muted">Primary clinical practice name and physical practice address</small>
                    </div>
                </div>

                <!-- Clinic Name -->
                <div class="mb-3">
                    <label for="clinic_name" class="form-label-custom">
                        Official Clinic / Practice Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control form-control-custom fw-semibold" 
                           id="clinic_name" 
                           name="clinic_name" 
                           value="<?php echo htmlspecialchars($settings['clinic_name'] ?? 'I.K HOLINESS HOME CARE SERVICES'); ?>" 
                           oninput="document.getElementById('previewName').innerText = this.value || 'I.K HOLINESS HOME CARE SERVICES';"
                           required>
                </div>

                <!-- Physical Address -->
                <div class="mb-0">
                    <label for="clinic_address" class="form-label-custom">
                        Physical Practice Address / Location <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control form-control-custom" 
                           id="clinic_address" 
                           name="clinic_address" 
                           value="<?php echo htmlspecialchars($settings['clinic_address'] ?? 'Pankrono, Kumasi, Ghana'); ?>" 
                           oninput="document.getElementById('previewAddress').innerText = this.value || 'Pankrono, Kumasi, Ghana';"
                           required>
                </div>
            </div>

            <!-- Bento Box 2: Communication Channels & Contact Details -->
            <div class="analytics-card p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                    <div class="icon-sq bg-purple-subtle text-purple" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 1rem;">Patient Care & Contact Channels</h6>
                        <small class="text-muted">Official helpline telephone numbers and enquiry email</small>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="phone_number" class="form-label-custom">
                            Helpline & Care Telephone(s) <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-custom font-mono" 
                               id="phone_number" 
                               name="phone_number" 
                               value="<?php echo htmlspecialchars($settings['phone_number'] ?? '0241974447 / 0550974126'); ?>" 
                               oninput="document.getElementById('previewPhone').innerText = this.value || '0241974447 / 0550974126';"
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label-custom">
                            Official Practice Email Address <span class="text-danger">*</span>
                        </label>
                        <input type="email" 
                               class="form-control form-control-custom" 
                               id="email" 
                               name="email" 
                               value="<?php echo htmlspecialchars($settings['email'] ?? 'kisaiahh@icloud.com'); ?>" 
                               oninput="document.getElementById('previewEmail').innerText = this.value || 'kisaiahh@icloud.com';"
                               required>
                    </div>
                </div>
            </div>

            <!-- Bento Box 3: Billing & Financial Preferences -->
            <div class="analytics-card p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                    <div class="icon-sq bg-emerald-subtle text-success" style="width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 1rem;">Billing & Financial Currency</h6>
                        <small class="text-muted">Currency standard applied across all billing statements and receipts</small>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="currency" class="form-label-custom">
                        Billing Currency Symbol <span class="text-danger">*</span>
                    </label>
                    <div class="d-flex align-items-center gap-3">
                        <input type="text" 
                               class="form-control form-control-custom font-mono fw-bold text-success" 
                               style="max-width: 160px; font-size: 1.1rem;" 
                               id="currency" 
                               name="currency" 
                               value="<?php echo htmlspecialchars($currentCurrency); ?>" 
                               required>
                        <small class="text-muted" style="font-size: 0.78rem;">
                            Current Standard: <strong>Ghana Cedi (GH₵)</strong>
                        </small>
                    </div>
                </div>
            </div>

            <!-- Floating Save Action Bar -->
            <div class="d-flex justify-content-end align-items-center gap-3 pt-2 mb-5">
                <button type="submit" class="btn-primary-custom py-2 px-4 shadow-sm" style="font-size: 0.92rem;">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Practice Configuration
                </button>
            </div>

        </form>

    </div>
</div>

<style>
/* Modern Settings Styles */
.form-label-custom {
    font-size: 0.78rem;
    font-weight: 700;
    color: #334155;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-bottom: 6px;
    display: block;
}

.form-control-custom {
    padding: 10px 14px;
    border-radius: 8px;
    border: 1px solid var(--border-subtle);
    font-size: 0.875rem;
    color: var(--text-primary);
    background-color: #ffffff;
    transition: all 0.15s ease;
}

.form-control-custom:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    outline: none;
}

.analytics-card {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: 16px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
}

.letterhead-preview-card {
    background-color: #ffffff;
    border: 1px solid #bfdbfe;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.06);
}

.preview-badge {
    background-color: #eff6ff;
    color: #1d4ed8;
    font-weight: 700;
    font-size: 0.72rem;
    padding: 3px 10px;
    border-radius: 20px;
    border: 1px solid #bfdbfe;
    display: inline-flex;
    align-items: center;
}

.preview-logo-sq {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-size: 1.35rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
}

.badge-motto {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    padding: 2px 8px;
    border-radius: 20px;
    display: inline-block;
}

.badge-purple {
    background-color: #faf5ff;
    border-color: #e9d5ff;
    color: #7e22ce;
}
</style>
