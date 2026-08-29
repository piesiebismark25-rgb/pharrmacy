<div class="row g-4">
    <!-- Left Column: Patient Profile Card & Quick Actions -->
    <div class="col-12 col-lg-4">
        <div class="ui-card mb-4">
            <div class="text-center pb-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div class="avatar-box mx-auto mb-3" style="width: 72px; height: 72px; font-size: 1.5rem;">
                    <?php echo strtoupper(substr($client['full_name'], 0, 2)); ?>
                </div>
                <h4 class="fw-bold text-white mb-1"><?php echo htmlspecialchars($client['full_name']); ?></h4>
                <span class="badge-pill-custom badge-emerald font-monospace fw-bold" style="font-size: 0.85rem;">
                    ID: <?php echo htmlspecialchars($client['client_id']); ?>
                </span>
            </div>

            <!-- Profile Info Grid -->
            <div class="py-3">
                <div class="mb-3">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Gender & Age</small>
                    <span class="text-white fw-medium"><?php echo htmlspecialchars($client['gender']); ?>, <?php echo htmlspecialchars($client['age']); ?> Years Old</span>
                    <small class="text-muted d-block">(DOB: <?php echo date('d/m/Y', strtotime($client['dob'])); ?>)</small>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Phone Contact</small>
                    <span class="text-white fw-medium"><i class="fa-solid fa-phone text-teal me-1" style="color: var(--accent-teal);"></i> <?php echo htmlspecialchars($client['phone']); ?></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Residential / Care Address</small>
                    <span class="text-white fw-medium"><?php echo nl2br(htmlspecialchars($client['address'])); ?></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Enrolled Since</small>
                    <span class="text-muted"><?php echo date('d/m/Y', strtotime($client['registration_date'])); ?></span>
                </div>
            </div>

            <!-- Emergency Card -->
            <div class="p-3 rounded-3 mb-4" style="background-color: var(--warning-subtle); border: 1px solid rgba(251, 191, 36, 0.25);">
                <span class="text-warning fw-bold d-block mb-1 text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                    <i class="fa-solid fa-phone-volume me-1"></i> Next of Kin / Emergency
                </span>
                <span class="text-white d-block fw-semibold" style="font-size: 0.9rem;"><?php echo htmlspecialchars($client['emergency_name']); ?></span>
                <span class="text-muted" style="font-size: 0.82rem;"><?php echo htmlspecialchars($client['emergency_phone']); ?></span>
            </div>

            <!-- Clinical Shortcuts -->
            <div class="d-grid gap-2 pt-3 border-top no-print" style="border-color: var(--border-subtle) !important;">
                <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom justify-content-start">
                    <i class="fa-solid fa-stethoscope"></i> Record Clinical Encounter
                </a>
                <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom justify-content-start">
                    <i class="fa-solid fa-file-invoice-dollar"></i> Generate Medical Invoice
                </a>
                <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom justify-content-start">
                    <i class="fa-solid fa-calendar-plus"></i> Schedule Appointment
                </a>
                <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom justify-content-start">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Patient Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Right Column: Medical History Tabs -->
    <div class="col-12 col-lg-8">
        <!-- Tab Navigation -->
        <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3 no-print" style="border-color: var(--border-subtle) !important;" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-2 fw-semibold" id="tab-visits-btn" data-bs-toggle="pill" data-bs-target="#tab-visits" type="button" style="border-radius: var(--radius-sm);">
                    <i class="fa-solid fa-stethoscope me-2"></i> Clinical Encounters (<?php echo count($visits); ?>)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2 fw-semibold" id="tab-billing-btn" data-bs-toggle="pill" data-bs-target="#tab-billing" type="button" style="border-radius: var(--radius-sm);">
                    <i class="fa-solid fa-file-invoice-dollar me-2"></i> Invoices & Billing (<?php echo count($invoices); ?>)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2 fw-semibold" id="tab-appts-btn" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" style="border-radius: var(--radius-sm);">
                    <i class="fa-solid fa-calendar-check me-2"></i> Appointments (<?php echo count($appointments); ?>)
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <!-- 1. Clinical Encounters Tab -->
            <div class="tab-pane fade show active" id="tab-visits">
                <?php if (empty($visits)): ?>
                    <div class="ui-card text-center py-5 text-muted">
                        <i class="fa-solid fa-notes-medical fs-2 mb-3 d-block text-muted"></i>
                        No clinical encounters logged for this patient yet.<br>
                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom btn-sm mt-3">
                            Record First Clinical Visit
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($visits as $v): ?>
                        <div class="ui-card mb-4">
                            <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3" style="border-color: var(--border-subtle) !important;">
                                <div>
                                    <h5 class="fw-bold text-white mb-0">Encounter on <?php echo date('d/m/Y \a\t H:i A', strtotime($v['visit_date'])); ?></h5>
                                    <small class="text-muted">Attended by: <strong class="text-white"><?php echo htmlspecialchars($v['staff_name']); ?></strong></small>
                                </div>
                                <button onclick="window.print()" class="btn-print-custom btn-sm no-print">
                                    <i class="fa-solid fa-print"></i> Print Rx & Encounter Slip
                                </button>
                            </div>

                            <!-- Vitals Metric Bar -->
                            <div class="row g-2 mb-3 p-3 rounded-3" style="background-color: rgba(255, 255, 255, 0.02); border: 1px solid var(--border-subtle);">
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.72rem;">Temperature</small>
                                    <strong class="text-white"><?php echo $v['temperature'] ? htmlspecialchars($v['temperature']) . ' Â°C' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.72rem;">Blood Pressure (BP)</small>
                                    <strong class="text-white"><?php echo $v['bp'] ? htmlspecialchars($v['bp']) . ' mmHg' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.72rem;">Body Weight</small>
                                    <strong class="text-white"><?php echo $v['weight'] ? htmlspecialchars($v['weight']) . ' kg' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.72rem;">Diagnosis Status</small>
                                    <span class="badge-pill-custom badge-emerald"><?php echo $v['diagnosis'] ? 'Diagnosed' : 'Pending Review'; ?></span>
                                </div>
                            </div>

                            <!-- Diagnosis & Findings -->
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.72rem;">Chief Complaint</span>
                                    <div class="p-2 rounded mt-1" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle); color: #ffffff;">
                                        <?php echo nl2br(htmlspecialchars($v['complaint'])); ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.72rem;">Physical Findings & Symptoms</span>
                                    <div class="p-2 rounded mt-1" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle); color: #cbd5e1;">
                                        <?php echo $v['symptoms'] ? nl2br(htmlspecialchars($v['symptoms'])) : 'None recorded'; ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-teal d-block" style="font-size: 0.72rem; color: var(--accent-teal);">Clinical Diagnosis</span>
                                    <div class="p-2 rounded mt-1" style="background-color: var(--bg-base); border: 1px solid var(--border-active); color: #ffffff; font-weight: 600;">
                                        <?php echo $v['diagnosis'] ? nl2br(htmlspecialchars($v['diagnosis'])) : 'Pending Assessment'; ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.72rem;">Care & Treatment Plan</span>
                                    <div class="p-2 rounded mt-1" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle); color: #cbd5e1;">
                                        <?php echo $v['treatment'] ? nl2br(htmlspecialchars($v['treatment'])) : 'None recorded'; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="text-uppercase fw-bold text-white d-block" style="font-size: 0.72rem;">
                                        <i class="fa-solid fa-prescription text-teal me-1" style="color: var(--accent-teal);"></i> Prescription & Medication Schedule
                                    </span>
                                    <div class="p-3 rounded mt-1" style="background-color: var(--accent-subtle); border: 1px solid var(--border-active); color: #34d399; font-weight: 600;">
                                        <?php echo $v['prescription'] ? nl2br(htmlspecialchars($v['prescription'])) : 'No medication prescribed for this visit'; ?>
                                    </div>
                                </div>
                                <?php if (!empty($v['notes'])): ?>
                                    <div class="col-12">
                                        <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.72rem;">Doctor's Confidential Clinical Notes</span>
                                        <div class="p-2 rounded mt-1 text-muted" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle); font-size: 0.85rem;">
                                            <?php echo nl2br(htmlspecialchars($v['notes'])); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- 2. Billing & Invoices Tab -->
            <div class="tab-pane fade" id="tab-billing">
                <div class="ui-table-container">
                    <div class="d-flex justify-content-between align-items-center p-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                        <h5 class="fw-bold text-white mb-0">Billing Statements & Invoices</h5>
                        <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom btn-sm no-print">
                            <i class="fa-solid fa-plus me-1"></i> New Invoice
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="ui-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Date</th>
                                    <th>Total Charge</th>
                                    <th>Amount Paid</th>
                                    <th>Remaining Balance</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($invoices)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-5 text-muted">
                                            No billing records logged for this patient.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($invoices as $inv): ?>
                                        <tr>
                                            <td><strong class="text-white"><?php echo htmlspecialchars($inv['invoice_number']); ?></strong></td>
                                            <td><?php echo date('d/m/Y', strtotime($inv['invoice_date'])); ?></td>
                                            <td><?php echo DEFAULT_CURRENCY . number_format($inv['total_amount'], 2); ?></td>
                                            <td class="text-emerald" style="color: #34d399;"><?php echo DEFAULT_CURRENCY . number_format($inv['amount_paid'], 2); ?></td>
                                            <td class="<?php echo $inv['balance'] > 0 ? 'text-danger fw-bold' : 'text-muted'; ?>">
                                                <?php echo DEFAULT_CURRENCY . number_format($inv['balance'], 2); ?>
                                            </td>
                                            <td>
                                                <?php
                                                $statusBadge = 'badge-rose';
                                                if ($inv['payment_status'] === 'Paid') $statusBadge = 'badge-emerald';
                                                if ($inv['payment_status'] === 'Partially Paid') $statusBadge = 'badge-amber';
                                                ?>
                                                <span class="badge-pill-custom <?php echo $statusBadge; ?>">
                                                    <?php echo htmlspecialchars($inv['payment_status']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end no-print">
                                                <div class="btn-group gap-1">
                                                    <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $inv['invoice_number']; ?>" class="btn-secondary-custom btn-sm">
                                                        <i class="fa-solid fa-file-invoice"></i> View
                                                    </a>
                                                    <?php if ($inv['balance'] > 0): ?>
                                                        <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $inv['invoice_number']; ?>" class="btn-primary-custom btn-sm">
                                                            <i class="fa-solid fa-wallet"></i> Pay
                                                        </a>
                                                    <?php endif; ?>
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

            <!-- 3. Appointments Tab -->
            <div class="tab-pane fade" id="tab-appointments">
                <div class="ui-table-container">
                    <div class="d-flex justify-content-between align-items-center p-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                        <h5 class="fw-bold text-white mb-0">Scheduled Consultations & Visits</h5>
                        <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom btn-sm no-print">
                            <i class="fa-solid fa-plus me-1"></i> New Appointment
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="ui-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Care Reason</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($appointments)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            No appointments scheduled for this patient.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($appointments as $appt): ?>
                                        <tr>
                                            <td><strong><?php echo date('d/m/Y', strtotime($appt['appointment_date'])); ?></strong></td>
                                            <td><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></td>
                                            <td><?php echo htmlspecialchars($appt['reason']); ?></td>
                                            <td>
                                                <span class="badge-pill-custom badge-amber"><?php echo htmlspecialchars($appt['status']); ?></span>
                                            </td>
                                            <td class="text-end no-print">
                                                <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $appt['id']; ?>&status=Completed" class="btn-secondary-custom btn-sm">
                                                    Mark Completed
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.nav-pills .nav-link {
    color: var(--text-secondary);
    background-color: var(--surface-card);
    border: 1px solid var(--border-subtle);
    transition: all 0.15s ease;
}
.nav-pills .nav-link:hover {
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.15);
}
.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #10b981 0%, #0d9488 100%) !important;
    color: #ffffff !important;
    border-color: transparent !important;
    box-shadow: 0 2px 10px rgba(16, 185, 129, 0.25);
}
</style>