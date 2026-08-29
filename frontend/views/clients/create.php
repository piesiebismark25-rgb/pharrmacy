<div class="row justify-content-center">
    <div class="col-12 col-xl-9">
        
        <?php if (!empty($errors)): ?>
            <div class="ui-alert ui-alert-danger mb-4" role="alert">
                <div>
                    <strong class="d-block mb-1"><i class="fa-solid fa-triangle-exclamation me-1"></i> Registration Error:</strong>
                    <ul class="mb-0 ps-3">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo APP_URL; ?>/clients/store" method="POST" autocomplete="off">
            
            <!-- Section 1: Patient Primary Details -->
            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-user-pen text-teal me-2" style="color: var(--accent-teal);"></i> Patient Personal & Contact Details
                </h5>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="full_name" 
                               id="full_name" 
                               class="form-control" 
                               placeholder="e.g. Samuel Mensah" 
                               value="<?php echo htmlspecialchars($full_name ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male" <?php echo isset($gender) && $gender === 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo isset($gender) && $gender === 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo isset($gender) && $gender === 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" 
                               name="dob" 
                               id="dob" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($dob ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               onchange="calculateAge(this.value)" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Calculated Age</label>
                        <input type="text" 
                               id="age_display" 
                               class="form-control text-teal fw-bold" 
                               style="color: var(--accent-teal) !important; background-color: var(--bg-base) !important;" 
                               placeholder="Auto-calculated from DOB..." 
                               readonly>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="phone" class="form-label">Primary Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" 
                               name="phone" 
                               id="phone" 
                               class="form-control" 
                               placeholder="e.g. 024 123 4567" 
                               value="<?php echo htmlspecialchars($phone ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="registration_date" class="form-label">Registration Date</label>
                        <input type="date" 
                               name="registration_date" 
                               id="registration_date" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($registration_date ?? date('Y-m-d'), ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Residential Address (Home Care Location) <span class="text-danger">*</span></label>
                        <textarea name="address" 
                                  id="address" 
                                  rows="2" 
                                  class="form-control" 
                                  placeholder="e.g. House No. 45, Pankrono Estate, Kumasi" 
                                  required><?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Section 2: Emergency Contact -->
            <div class="ui-card mb-4" style="border-left: 4px solid var(--warning);">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-phone-volume text-warning me-2"></i> Emergency Contact & Next of Kin
                </h5>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="emergency_name" class="form-label">Contact Person Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="emergency_name" 
                               id="emergency_name" 
                               class="form-control" 
                               placeholder="e.g. Grace Mensah (Daughter)" 
                               value="<?php echo htmlspecialchars($emergency_name ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="emergency_phone" class="form-label">Emergency Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" 
                               name="emergency_phone" 
                               id="emergency_phone" 
                               class="form-control" 
                               placeholder="e.g. 055 987 6543" 
                               value="<?php echo htmlspecialchars($emergency_phone ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-3">
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom px-4">Cancel</a>
                <button type="submit" class="btn-primary-custom px-5">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save & Register Patient
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
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    const m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    document.getElementById('age_display').value = age >= 0 ? age + " Years Old" : "Invalid Date";
}
document.addEventListener("DOMContentLoaded", function() {
    const dobVal = document.getElementById('dob').value;
    if(dobVal) calculateAge(dobVal);
});
</script>