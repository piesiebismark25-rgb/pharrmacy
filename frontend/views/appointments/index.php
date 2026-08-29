<!-- Appointments & Clinical Follow-up Visits View -->
<div class="appointments-hub-wrapper">

    <!-- 1. Executive Metric KPI Tiles -->
    <div class="row g-3 mb-4">
        <!-- Tile 1: Total Appointments -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="kpi-banner-card kpi-blue">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="kpi-label">Total Appointments</span>
                        <div class="kpi-val"><?php echo count($appointments); ?></div>
                        <small class="kpi-desc">Scheduled encounters & reviews</small>
                    </div>
                    <div class="kpi-icon-pill">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tile 2: Today's Schedule -->
        <div class="col-12 col-sm-6 col-xl-4">
            <?php
            $todayAppts = 0;
            $todayDate = date('Y-m-d');
            foreach ($appointments as $a) {
                if ($a['appointment_date'] === $todayDate && $a['status'] === 'Scheduled') {
                    $todayAppts++;
                }
            }
            ?>
            <div class="kpi-banner-card kpi-teal">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="kpi-label">Today's Queue</span>
                        <div class="kpi-val"><?php echo $todayAppts; ?></div>
                        <small class="kpi-desc">Scheduled for today &bull; <?php echo date('d M Y'); ?></small>
                    </div>
                    <div class="kpi-icon-pill">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tile 3: Completed Visits -->
        <div class="col-12 col-sm-12 col-xl-4">
            <?php
            $completedAppts = 0;
            foreach ($appointments as $a) {
                if ($a['status'] === 'Completed') {
                    $completedAppts++;
                }
            }
            ?>
            <div class="kpi-banner-card kpi-emerald">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="kpi-label">Completed Sessions</span>
                        <div class="kpi-val"><?php echo $completedAppts; ?></div>
                        <small class="kpi-desc">Successfully concluded visits</small>
                    </div>
                    <div class="kpi-icon-pill">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Top Action Toolbar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3 mb-4 no-print">
        <!-- Title & Subtitle Brief -->
        <div class="d-flex align-items-center gap-2">
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.78rem;">
                <i class="fa-regular fa-calendar text-primary me-1"></i> Active Calendar Schedule
            </span>
        </div>

        <!-- Action: Book Appointment -->
        <div>
            <a href="<?php echo APP_URL; ?>/appointments/create" class="btn-primary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-calendar-plus me-1"></i> Schedule New Appointment
            </a>
        </div>
    </div>

    <!-- 3. Master Appointments Table Card -->
    <div class="ui-table-container">
        <div class="tanstack-table-header">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Clinical Appointments & Follow-up Schedule</h6>
                    <small class="text-muted">Doctor's scheduled home visits and patient follow-up sessions</small>
                </div>
            </div>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.72rem;">
                Total: <?php echo count($appointments); ?> Scheduled
            </span>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Date & Time</th>
                        <th style="width: 24%;">Patient Details</th>
                        <th style="width: 14%;">Phone Number</th>
                        <th style="width: 25%;">Clinical Reason / Procedure</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 12%; text-align: right;" class="no-print">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-regular fa-calendar-xmark fs-3 mb-2 d-block text-muted"></i>
                                No scheduled appointments found. Click <strong>"Schedule New Appointment"</strong> to add one.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $a): ?>
                            <tr>
                                <!-- Date & Time -->
                                <td>
                                    <div class="appt-time-pill-clean">
                                        <strong class="text-dark d-block" style="font-size: 0.82rem; white-space: nowrap;">
                                            <?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?>
                                        </strong>
                                        <small class="text-primary font-mono fw-semibold" style="font-size: 0.72rem; white-space: nowrap;">
                                            <i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($a['appointment_time'])); ?>
                                        </small>
                                    </div>
                                </td>

                                <!-- Patient Name & ID -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle-appt flex-shrink-0">
                                            <?php echo strtoupper(substr($a['full_name'] ?? 'P', 0, 2)); ?>
                                        </div>
                                        <div class="min-w-0">
                                            <strong class="text-dark d-block text-truncate" style="font-size: 0.85rem;">
                                                <?php echo htmlspecialchars($a['full_name']); ?>
                                            </strong>
                                            <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.65rem; padding: 1px 6px; white-space: nowrap;">
                                                <?php echo htmlspecialchars($a['client_id']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Phone Number -->
                                <td>
                                    <a href="tel:<?php echo htmlspecialchars($a['phone']); ?>" class="text-secondary text-decoration-none hover-primary font-mono" style="font-size: 0.8125rem; white-space: nowrap;">
                                        <i class="fa-solid fa-phone text-primary me-1" style="font-size: 0.72rem;"></i>
                                        <?php echo htmlspecialchars($a['phone']); ?>
                                    </a>
                                </td>

                                <!-- Clinical Reason / Procedure -->
                                <td>
                                    <div class="text-secondary small" style="line-height: 1.35; font-size: 0.8125rem;">
                                        <i class="fa-solid fa-notes-medical text-primary me-1"></i>
                                        <?php echo htmlspecialchars($a['reason']); ?>
                                    </div>
                                </td>

                                <!-- Status Badge -->
                                <td>
                                    <?php
                                    $badge = 'badge-amber';
                                    if ($a['status'] === 'Completed') $badge = 'badge-emerald';
                                    if ($a['status'] === 'Cancelled') $badge = 'badge-rose';
                                    ?>
                                    <span class="badge-pill-custom <?php echo $badge; ?>" style="font-size: 0.72rem;">
                                        <?php echo htmlspecialchars($a['status']); ?>
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td style="text-align: right;" class="no-print">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <?php if ($a['status'] === 'Scheduled'): ?>
                                            <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Completed" 
                                               class="btn-action-done btn-sm py-1 px-2" 
                                               title="Mark Appointment Completed">
                                                <i class="fa-solid fa-check me-1"></i> Done
                                            </a>
                                            <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Cancelled" 
                                               onclick="return confirm('Are you sure you want to cancel this appointment?');"
                                               class="btn-action-cancel btn-sm py-1 px-2" 
                                               title="Cancel Appointment">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $a['client_id']; ?>" 
                                           class="btn-secondary-custom btn-sm py-1 px-2" 
                                           style="font-size: 0.75rem;" 
                                           title="View Patient Medical Dossier">
                                            <i class="fa-solid fa-id-card-clip me-1 text-primary"></i> Dossier
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>
/* Appointments Hub Styles */
.appointments-hub-wrapper {
    max-width: 100%;
}

.avatar-circle-appt {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
}

.appt-time-pill-clean {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 8px;
    padding: 6px 10px;
    display: inline-block;
}

.btn-action-done {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #16a34a;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 600;
    transition: all 0.15s ease;
}

.btn-action-done:hover {
    background-color: #16a34a;
    color: #ffffff;
    border-color: #16a34a;
    box-shadow: 0 2px 8px rgba(22, 163, 74, 0.3);
}

.btn-action-cancel {
    background-color: #fff1f2;
    border: 1px solid #fecdd3;
    color: #e11d48;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 0.75rem;
    transition: all 0.15s ease;
}

.btn-action-cancel:hover {
    background-color: #e11d48;
    color: #ffffff;
    border-color: #e11d48;
    box-shadow: 0 2px 8px rgba(225, 29, 72, 0.3);
}
</style>