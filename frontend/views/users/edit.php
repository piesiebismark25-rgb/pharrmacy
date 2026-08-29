<!-- Edit Staff Account View -->
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
        
        <!-- Header & Back Navigation -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="<?php echo APP_URL; ?>/users" class="btn-secondary-custom py-2 px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to Staff List
            </a>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.75rem;">
                User ID: #<?php echo $user['id']; ?>
            </span>
        </div>

        <!-- Form Card -->
        <div class="ui-card p-4 p-md-5" style="background-color: #ffffff;">
            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                    <i class="fa-solid fa-user-pen"></i>
                </div>
                <div>
                    <h5 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">Edit Staff Account</h5>
                    <small class="text-muted">Update profile, username, role, or reset password</small>
                </div>
            </div>

            <form action="<?php echo APP_URL; ?>/users/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="full_name" class="form-label-custom">
                        Full Practitioner Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control form-control-custom" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label-custom">
                        Login Username <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control form-control-custom font-mono" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>

                <!-- New Password (Optional) -->
                <div class="mb-3">
                    <label for="password" class="form-label-custom">
                        Reset Password <span class="text-muted fw-normal text-lowercase">(leave empty to keep current password)</span>
                    </label>
                    <input type="password" class="form-control form-control-custom" id="password" name="password" placeholder="Enter new password to overwrite">
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <label class="form-label-custom">
                        System Access Role <span class="text-danger">*</span>
                    </label>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="role-select-box">
                                <input type="radio" name="role" value="staff" <?php echo $user['role'] === 'staff' ? 'checked' : ''; ?>>
                                <div class="role-box-content">
                                    <i class="fa-solid fa-stethoscope text-primary fs-5 mb-1"></i>
                                    <strong class="d-block text-dark small">Clinical Staff</strong>
                                    <small class="text-muted" style="font-size: 0.7rem;">Encounters & appointments</small>
                                </div>
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="role-select-box">
                                <input type="radio" name="role" value="admin" <?php echo $user['role'] === 'admin' ? 'checked' : ''; ?>>
                                <div class="role-box-content">
                                    <i class="fa-solid fa-user-shield text-purple fs-5 mb-1"></i>
                                    <strong class="d-block text-dark small">Administrator</strong>
                                    <small class="text-muted" style="font-size: 0.7rem;">Full system access</small>
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
                        <i class="fa-solid fa-check me-1"></i> Save Changes
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
