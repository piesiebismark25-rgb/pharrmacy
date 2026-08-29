<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
        <form action="<?php echo APP_URL; ?>/appointments/store" method="POST">
            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-calendar-plus text-teal me-2" style="color: var(--accent-teal);"></i> Book Appointment / Home Visit
                </h5>

                <div class="mb-3">
                    <label for="client_id" class="form-label">Select Patient <span class="text-danger">*</span></label>
                    <select name="client_id" id="client_id" class="form-select" required>
                        <option value="">-- Choose Patient --</option>
                        <?php foreach ($allClients as $c): ?>
                            <option value="<?php echo $c['client_id']; ?>" <?php echo (isset($_GET['client_id']) && $_GET['client_id'] === $c['client_id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($c['client_id'] . ' - ' . $c['full_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label for="appointment_date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="col-6">
                        <label for="appointment_time" class="form-label">Time <span class="text-danger">*</span></label>
                        <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="09:00" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="reason" class="form-label">Care Reason / Procedure <span class="text-danger">*</span></label>
                    <input type="text" name="reason" id="reason" class="form-control" placeholder="e.g. Weekly Vital Signs & Glucose Checkup, Catheter Replacement" required>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="<?php echo APP_URL; ?>/appointments" class="btn-secondary-custom px-4">Cancel</a>
                    <button type="submit" class="btn-primary-custom px-5">
                        <i class="fa-solid fa-calendar-check me-2"></i> Book Appointment
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>