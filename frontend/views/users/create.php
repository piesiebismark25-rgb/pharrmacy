<!-- Create New Staff Account View -->
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
        
        <!-- Header & Back Navigation -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="<?php echo APP_URL; ?>/users" class="btn-secondary-custom">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to Staff List
            </a>
            <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.75rem;">
                <i class="fa-solid fa-user-shield me-1"></i> Admin Console
            </span>
        </div>

        <!-- Form Card -->
        <div class="ui-card p-4 p-md-5" style="background-color: #ffffff;">
            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div>
                    <h5 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">Register New Staff Account</h5>
                    <small class="text-muted">Create credentials for a clinical officer or administrator</small>
                </div>
            </div>

            <form action="<?php echo APP_URL; ?>/users/store" method="POST">
                
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="full_name" class="form-label-custom">
                        Full Practitioner Name <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-user-doctor"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0 form-control-custom" id="full_name" name="full_name" placeholder="e.g. Dr. Kwabena Mensah or Nurse Sarah" required>
                    </div>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label-custom">
                        Login Username <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-at"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0 form-control-custom font-mono" id="username" name="username" placeholder="e.g. kmensah or nurse_sarah" required>
                    </div>
                    <small class="text-muted" style="font-size: 0.72rem;">Lowercase letters and numbers without spaces.</small>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label-custom">
                        Temporary Password <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control border-start-0 ps-0 form-control-custom" id="password" name="password" placeholder="Minimum 6 characters" required>
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <label class="form-label-custom">
                        System Access Role <span class="text-danger">*</span>
                    </label>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="role-select-box">
                                <input type="radio" name="role" value="staff" checked>
                                <div class="role-box-content">
                                    <i class="fa-solid fa-stethoscope text-primary fs-5 mb-1"></i>
                                    <strong class="d-block text-dark small">Clinical Staff</strong>
                                    <small class="text-muted" style="font-size: 0.7rem;">Encounters, patients & appointments</small>
                                </div>
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="role-select-box">
                                <input type="radio" name="role" value="admin">
                                <div class="role-box-content">
                                    <i class="fa-solid fa-user-shield text-purple fs-5 mb-1"></i>
                                    <strong class="d-block text-dark small">Administrator</strong>
                                    <small class="text-muted" style="font-size: 0.7rem;">Full system & audit management</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="<?php echo APP_URL; ?>/users" class="btn-secondary-custom py-2 px-3">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary-custom py-2 px-4 shadow-sm">
                        <i class="fa-solid fa-check me-1"></i> Create Staff Account
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<style>
.form-label-custom {
    font-size: 0.78rem;
    font-weight: 700;
    color: #334155;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-bottom: 6px;
    display: block;
}

.role-select-box {
    display: block;
    cursor: pointer;
}

.role-select-box input {
    display: none;
}

.role-box-content {
    border: 1.5px solid var(--border-subtle);
    border-radius: 10px;
    padding: 14px;
    text-align: center;
    background-color: #f8fafc;
    transition: all 0.15s ease;
}

.role-select-box input:checked + .role-box-content {
    border-color: var(--accent-main);
    background-color: #eff6ff;
    box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
}
</style>
