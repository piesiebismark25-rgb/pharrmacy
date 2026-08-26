<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <!-- Error Alerts -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger border-0 rounded-4 bg-opacity-10 bg-danger text-danger mb-4" role="alert">
                <h5 class="alert-heading fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i> Registration Error</h5>
                <ul class="mb-0 ps-3">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo APP_URL; ?>/clients/store" method="POST" autocomplete="off">
            
            <!-- Section 1: Personal Information -->
            <div class="custom-table-container mb-4">
                <h4 class="mb-4 fw-bold text-white"><i class="fa-solid fa-id-card text-teal me-2" style="color: var(--accent-color);"></i> Personal Information</h4>
                
                <div class="row g-3">
                    <!-- Full Name -->
                    <div class="col-12 col-md-6">
                        <label for="full_name" class="form-label text-muted">Full Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="full_name" 
                               id="full_name" 
                               class="form-control" 
                               placeholder="e.g. John Mensah" 
                               value="<?php echo htmlspecialchars($full_name ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <!-- Gender -->
                    <div class="col-12 col-md-6">
                        <label for="gender" class="form-label text-muted">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control form-select" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male" <?php echo isset($gender) && $gender === 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo isset($gender) && $gender === 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo isset($gender) && $gender === 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-12 col-md-6">
                        <label for="dob" class="form-label text-muted">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" 
                               name="dob" 
                               id="dob" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($dob ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               onchange="calculateAge(this.value)" 
                               required>
                    </div>

                    <!-- Age Display -->
                    <div class="col-12 col-md-6">
                        <label class="form-label text-muted">Age (Auto-calculated)</label>
                        <input type="text" 
                               id="age_display" 
                               class="form-control text-teal" 
                               style="background-color: rgba(13, 148, 136, 0.05); color: var(--accent-color); font-weight: bold;" 
                               placeholder="Enter Date of Birth to calculate age..." 
                               readonly>
                    </div>

                    <!-- Phone Number -->
                    <div class="col-12 col-md-6">
                        <label for="phone" class="form-label text-muted">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" 
                               name="phone" 
                               id="phone" 
                               class="form-control" 
                               placeholder="e.g. +233 24 000 0000" 
                               value="<?php echo htmlspecialchars($phone ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <!-- Registration Date -->
                    <div class="col-12 col-md-6">
                        <label for="registration_date" class="form-label text-muted">Registration Date</label>
                        <input type="date" 
                               name="registration_date" 
                               id="registration_date" 
                               class="form-control" 
                               value="<?php echo htmlspecialchars($registration_date ?? date('Y-m-d'), ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <!-- Address -->
                    <div class="col-12">
                        <label for="address" class="form-label text-muted">Residential Address <span class="text-danger">*</span></label>
                        <textarea name="address" 
                                  id="address" 
                                  rows="2" 
                                  class="form-control" 
                                  placeholder="Enter complete residential address..." 
                                  required><?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Section 2: Emergency Contact Details -->
            <div class="custom-table-container mb-4">
                <h4 class="mb-4 fw-bold text-white"><i class="fa-solid fa-phone-volume text-warning me-2" style="color: var(--warning-color);"></i> Emergency Contact Information</h4>
                
                <div class="row g-3">
                    <!-- Emergency Contact Name -->
                    <div class="col-12 col-md-6">
                        <label for="emergency_name" class="form-label text-muted">Contact Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="emergency_name" 
                               id="emergency_name" 
                               class="form-control" 
                               placeholder="e.g. Jane Mensah (Spouse)" 
                               value="<?php echo htmlspecialchars($emergency_name ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>

                    <!-- Emergency Contact Phone -->
                    <div class="col-12 col-md-6">
                        <label for="emergency_phone" class="form-label text-muted">Contact Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" 
                               name="emergency_phone" 
                               id="emergency_phone" 
                               class="form-control" 
                               placeholder="e.g. +233 20 000 0000" 
                               value="<?php echo htmlspecialchars($emergency_phone ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               required>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-3">
                <a href="<?php echo APP_URL; ?>/clients" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 10px;">Cancel</a>
                <button type="submit" class="btn btn-accent px-5 py-2">
                    <i class="fa-solid fa-save me-2"></i> Register Patient
                </button>
            </div>

        </form>
    </div>
</div>

<script>
// JS calculation for age display feedback
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
    
    if (age < 0) {
        document.getElementById('age_display').value = "Invalid Date of Birth";
    } else {
        document.getElementById('age_display').value = age + " Years Old";
    }
}

// Calculate age on load if DOB exists
document.addEventListener("DOMContentLoaded", function() {
    const dobVal = document.getElementById('dob').value;
    if(dobVal) {
        calculateAge(dobVal);
    }
});
</script>
