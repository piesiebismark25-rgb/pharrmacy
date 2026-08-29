<div class="row justify-content-center">
    <div class="col-12 col-xl-9">
        
        <?php if (!empty($errors)): ?>
            <div class="ui-alert ui-alert-danger mb-3" role="alert">
                <div>
                    <strong class="d-block mb-1"><i class="fa-solid fa-triangle-exclamation me-1"></i> Update Error:</strong>
                    <ul class="mb-0 ps-3">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo APP_URL; ?>/clients/update" method="POST" autocomplete="off">
            <input type="hidden" name="client_id" value="<?php echo htmlspecialchars($client['client_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

            <!-- Section 1: Patient Primary Details -->
            <div class="ui-card mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-user-pen text-blue-accent me-1"></i> Modify Patient Record
                    </h6>
                    <span class="badge-pill-custom badge-emerald font-mono">ID: <?php echo htmlspecialchars($client['client_id']); ?></span>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="full_name" 
                               id="full_name" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($client['full_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male" <?php echo isset($client['gender']) && $client['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo isset($client['gender']) && $client['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo isset($client['gender']) && $client['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" 
                               name="dob" 
                               id="dob" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($client['dob'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               onchange="calculateAge(this.value)" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Age</label>
                        <input type="text" 
                               id="age_display" 
                               class="form-control font-mono fw-bold" 
                               style="background-color: var(--bg-subtle) !important; color: var(--accent-main) !important;" 
                               value="<?php echo htmlspecialchars($client['age'] ?? ''); ?> Years Old" 
                               readonly>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="phone" class="form-label">Primary Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" 
                               name="phone" 
                               id="phone" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($client['phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label text-muted">Registration Date (Permanent)</label>
                        <input type="date" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($client['registration_date'] ?? date('Y-m-d')); ?>" 
                               disabled>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Residential Address <span class="text-danger">*</span></label>
                        <textarea name="address" 
                                  id="address" 
                                  rows="2" 
                                  class="form-control" 
                                  required><?php echo htmlspecialchars($client['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Section 2: Emergency Contact -->
            <div class="ui-card mb-4" style="border-left: 3px solid var(--warning);">
                <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-phone-volume text-warning me-1"></i> Emergency Contact & Next of Kin
                </h6>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="emergency_name" class="form-label">Contact Person Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="emergency_name" 
                               id="emergency_name" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($client['emergency_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="emergency_phone" class="form-label">Emergency Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" 
                               name="emergency_phone" 
                               id="emergency_phone" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($client['emergency_phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2">
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom px-3">Cancel</a>
                <button type="submit" class="btn-primary-custom px-4">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Update Patient Record
                </button>
            </div>

        </form>
    </div>
</div>

<script>
function calculateAge(dobString) {
    if (!dobString) {
        document.getElementById('age_display').value = "";
        return;
    }
    const dob = new Date(dobString);
    const diff_ms = Date.now() - dob.getTime();
    const age_dt = new Date(diff_ms);
    const age = Math.abs(age_dt.getUTCFullYear() - 1970);
    document.getElementById('age_display').value = isNaN(age) ? "" : age + " Years Old";
}
</script>