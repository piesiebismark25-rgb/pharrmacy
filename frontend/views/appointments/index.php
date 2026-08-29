<div class="row mb-4 no-print align-items-center justify-content-between g-3">
    <div class="col-12 col-md-6">
        <h5 class="fw-bold text-white mb-1"><i class="fa-solid fa-calendar-check text-teal me-2" style="color: var(--accent-teal);"></i> Appointments & Follow-up Home Visits</h5>
        <p class="text-muted mb-0" style="font-size: 0.85rem;">Doctor's upcoming clinical consultations and domiciliary care schedule</p>
    </div>
    <div class="col-12 col-md-auto">
        <a href="<?php echo APP_URL; ?>/appointments/create" class="btn-primary-custom">
            <i class="fa-solid fa-calendar-plus me-1"></i> Schedule New Appointment
        </a>
    </div>
</div>

<div class="ui-table-container">
    <div class="table-responsive">
        <table class="ui-table">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Patient Name & ID</th>
                    <th>Phone</th>
                    <th>Clinical Reason / Procedure</th>
                    <th>Status</th>
                    <th class="text-end no-print">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($appointments)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fa-regular fa-calendar-xmark fs-2 mb-3 d-block text-muted"></i>
                            No appointments scheduled in the system.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($appointments as $a): ?>
                        <tr>
                            <td>
                                <strong class="text-white d-block"><?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?></strong>
                                <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($a['appointment_time'])); ?></small>
                            </td>
                            <td>
                                <strong class="text-white d-block"><?php echo htmlspecialchars($a['full_name']); ?></strong>
                                <span class="badge-pill-custom badge-emerald font-monospace" style="font-size: 0.72rem;"><?php echo htmlspecialchars($a['client_id']); ?></span>
                            </td>
                            <td><span class="text-white"><?php echo htmlspecialchars($a['phone']); ?></span></td>
                            <td><span class="text-secondary"><?php echo htmlspecialchars($a['reason']); ?></span></td>
                            <td>
                                <?php
                                $badge = 'badge-amber';
                                if ($a['status'] === 'Completed') $badge = 'badge-emerald';
                                if ($a['status'] === 'Cancelled') $badge = 'badge-rose';
                                ?>
                                <span class="badge-pill-custom <?php echo $badge; ?>"><?php echo htmlspecialchars($a['status']); ?></span>
                            </td>
                            <td class="text-end no-print">
                                <div class="btn-group gap-1">
                                    <?php if ($a['status'] === 'Scheduled'): ?>
                                        <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Completed" class="btn-secondary-custom btn-sm" title="Mark Completed">
                                            <i class="fa-solid fa-check text-success"></i> Complete
                                        </a>
                                        <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Cancelled" class="btn-secondary-custom btn-sm text-danger" title="Cancel">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $a['client_id']; ?>" class="btn-secondary-custom btn-sm">
                                        Dossier
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