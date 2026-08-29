<div class="row mb-3 no-print align-items-center justify-content-between g-3">
    <div class="col-12 col-md-6">
        <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-calendar-check text-blue-accent me-1"></i> Appointments & Follow-up Visits</h6>
        <small class="text-muted">Doctor's scheduled home visits and clinical consultations</small>
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
                        <td colspan="6" class="text-center py-5 text-muted small">
                            <i class="fa-regular fa-calendar-xmark fs-3 mb-2 d-block text-muted"></i>
                            No appointments scheduled in the system.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($appointments as $a): ?>
                        <tr>
                            <td>
                                <strong class="text-dark d-block"><?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?></strong>
                                <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($a['appointment_time'])); ?></small>
                            </td>
                            <td>
                                <strong class="text-dark d-block" style="font-size: 0.85rem;"><?php echo htmlspecialchars($a['full_name']); ?></strong>
                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.68rem;"><?php echo htmlspecialchars($a['client_id']); ?></span>
                            </td>
                            <td><span class="text-dark"><?php echo htmlspecialchars($a['phone']); ?></span></td>
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
                                        <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Completed" class="btn-secondary-custom btn-sm py-1 px-2 text-success" title="Mark Completed">
                                            <i class="fa-solid fa-check"></i> Done
                                        </a>
                                        <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Cancelled" class="btn-secondary-custom btn-sm py-1 px-2 text-danger" title="Cancel">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $a['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2">
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