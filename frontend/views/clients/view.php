<div class="row g-3 g-xl-4">
    <!-- Left Column: Patient Profile Card & Quick Actions -->
    <div class="col-12 col-lg-4">
        <div class="ui-card mb-3">
            <div class="text-center pb-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div class="avatar-box mx-auto mb-2" style="width: 56px; height: 56px; font-size: 1.25rem;">
                    <?php echo strtoupper(substr($client['full_name'], 0, 2)); ?>
                </div>
                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.05rem;"><?php echo htmlspecialchars($client['full_name']); ?></h5>
                <span class="badge-pill-custom badge-emerald font-mono fw-bold" style="font-size: 0.78rem;">
                    ID: <?php echo htmlspecialchars($client['client_id']); ?>
                </span>
            </div>

            <!-- Profile Info Grid -->
            <div class="py-2" style="font-size: 0.8125rem;">
                <div class="mb-2">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem; letter-spacing: 0.05em;">Gender & Age</small>
                    <span class="text-dark fw-semibold"><?php echo htmlspecialchars($client['gender']); ?>, <?php echo htmlspecialchars($client['age']); ?> Years Old</span>
                    <small class="text-muted d-block">(DOB: <?php echo date('d/m/Y', strtotime($client['dob'])); ?>)</small>
                </div>
                <div class="mb-2">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem; letter-spacing: 0.05em;">Phone Contact</small>
                    <span class="text-dark fw-semibold"><i class="fa-solid fa-phone text-blue-accent me-1" style="font-size: 0.75rem;"></i> <?php echo htmlspecialchars($client['phone']); ?></span>
                </div>
                <div class="mb-2">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem; letter-spacing: 0.05em;">Residential / Care Address</small>
                    <span class="text-secondary"><?php echo nl2br(htmlspecialchars($client['address'])); ?></span>
                </div>
                <div class="mb-2">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem; letter-spacing: 0.05em;">Enrolled Since</small>
                    <span class="text-muted"><?php echo date('d/m/Y', strtotime($client['registration_date'])); ?></span>
                </div>
            </div>

            <!-- Emergency Card -->
            <div class="p-2 px-3 rounded-2 mb-3" style="background-color: var(--warning-bg); border: 1px solid var(--warning-border);">
                <span class="text-warning fw-bold d-block mb-1 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.06em;">
                    <i class="fa-solid fa-phone-volume me-1"></i> Next of Kin / Emergency
                </span>
                <span class="text-dark d-block fw-bold" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($client['emergency_name']); ?></span>
                <span class="text-muted" style="font-size: 0.75rem;"><?php echo htmlspecialchars($client['emergency_phone']); ?></span>
            </div>

            <!-- Clinical Shortcuts -->
            <div class="d-grid gap-1 pt-2 border-top no-print" style="border-color: var(--border-subtle) !important;">
                <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom justify-content-start py-2">
                    <i class="fa-solid fa-stethoscope"></i> Record Clinical Encounter
                </a>
                <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom justify-content-start py-2">
                    <i class="fa-solid fa-file-invoice-dollar"></i> Generate Medical Invoice
                </a>
                <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom justify-content-start py-2">
                    <i class="fa-solid fa-calendar-plus"></i> Schedule Appointment
                </a>
                <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom justify-content-start py-2">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Patient Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Right Column: Medical History Tabs -->
    <div class="col-12 col-lg-8">
        <!-- Tab Navigation -->
        <ul class="nav nav-pills mb-3 gap-2 border-bottom pb-2 no-print" style="border-color: var(--border-subtle) !important;" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-3 py-1 fw-semibold btn-secondary-custom" id="tab-visits-btn" data-bs-toggle="pill" data-bs-target="#tab-visits" type="button" style="font-size: 0.8125rem;">
                    <i class="fa-solid fa-stethoscope me-1 text-blue-accent"></i> Encounters (<?php echo count($visits); ?>)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-3 py-1 fw-semibold btn-secondary-custom" id="tab-billing-btn" data-bs-toggle="pill" data-bs-target="#tab-billing" type="button" style="font-size: 0.8125rem;">
                    <i class="fa-solid fa-file-invoice-dollar me-1 text-blue-accent"></i> Billing (<?php echo count($invoices); ?>)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-3 py-1 fw-semibold btn-secondary-custom" id="tab-appts-btn" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" style="font-size: 0.8125rem;">
                    <i class="fa-solid fa-calendar-check me-1 text-blue-accent"></i> Appointments (<?php echo count($appointments); ?>)
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <!-- 1. Clinical Encounters Tab -->
            <div class="tab-pane fade show active" id="tab-visits">
                <?php if (empty($visits)): ?>
                    <div class="ui-card text-center py-5 text-muted small">
                        <i class="fa-solid fa-notes-medical fs-3 mb-2 d-block text-muted"></i>
                        No clinical encounters logged for this patient yet.<br>
                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom btn-sm mt-3">
                            Record First Clinical Visit
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($visits as $v): ?>
                        <div class="ui-card mb-3">
                            <div class="d-flex justify-content-between align-items-start border-bottom pb-2 mb-3" style="border-color: var(--border-subtle) !important;">
                                <div>
                                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">Encounter on <?php echo date('d/m/Y \a\t H:i A', strtotime($v['visit_date'])); ?></h6>
                                    <small class="text-muted">Attended by: <strong class="text-dark"><?php echo htmlspecialchars($v['staff_name']); ?></strong></small>
                                </div>
                                <button onclick="window.print()" class="btn-print-custom btn-sm py-1 px-2 no-print">
                                    <i class="fa-solid fa-print"></i> Print Rx
                                </button>
                            </div>

                            <!-- Vitals Metric Bar -->
                            <div class="row g-2 mb-3 p-2 rounded-2" style="background-color: var(--bg-subtle); border: 1px solid var(--border-subtle);">
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.68rem;">Temperature</small>
                                    <strong class="text-dark" style="font-size: 0.8125rem;"><?php echo $v['temperature'] ? htmlspecialchars($v['temperature']) . ' °C' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.68rem;">Blood Pressure</small>
                                    <strong class="text-dark" style="font-size: 0.8125rem;"><?php echo $v['bp'] ? htmlspecialchars($v['bp']) . ' mmHg' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.68rem;">Body Weight</small>
                                    <strong class="text-dark" style="font-size: 0.8125rem;"><?php echo $v['weight'] ? htmlspecialchars($v['weight']) . ' kg' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block" style="font-size: 0.68rem;">Diagnosis Status</small>
                                    <span class="badge-pill-custom badge-emerald"><?php echo $v['diagnosis'] ? 'Diagnosed' : 'Pending'; ?></span>
                                </div>
                            </div>

                            <!-- Diagnosis & Findings -->
                            <div class="row g-2" style="font-size: 0.8125rem;">
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.68rem;">Chief Complaint</span>
                                    <div class="p-2 rounded mt-1" style="background-color: #ffffff; border: 1px solid var(--border-subtle); color: var(--text-primary);">
                                        <?php echo nl2br(htmlspecialchars($v['complaint'])); ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.68rem;">Physical Findings & Symptoms</span>
                                    <div class="p-2 rounded mt-1" style="background-color: #ffffff; border: 1px solid var(--border-subtle); color: var(--text-secondary);">
                                        <?php echo $v['symptoms'] ? nl2br(htmlspecialchars($v['symptoms'])) : 'None recorded'; ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-blue-accent d-block" style="font-size: 0.68rem;">Clinical Diagnosis</span>
                                    <div class="p-2 rounded mt-1" style="background-color: var(--accent-light); border: 1px solid var(--accent-border); color: var(--accent-dark); font-weight: 600;">
                                        <?php echo $v['diagnosis'] ? nl2br(htmlspecialchars($v['diagnosis'])) : 'Pending Assessment'; ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-uppercase fw-bold text-muted d-block" style="font-size: 0.68rem;">Care & Treatment Plan</span>
                                    <div class="p-2 rounded mt-1" style="background-color: #ffffff; border: 1px solid var(--border-subtle); color: var(--text-secondary);">
                                        <?php echo $v['treatment'] ? nl2br(htmlspecialchars($v['treatment'])) : 'None recorded'; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="text-uppercase fw-bold text-dark d-block" style="font-size: 0.68rem;">
                                        <i class="fa-solid fa-prescription text-blue-accent me-1"></i> Prescription & Medication Schedule
                                    </span>
                                    <div class="p-2 rounded mt-1" style="background-color: var(--success-bg); border: 1px solid var(--success-border); color: var(--success); font-weight: 600;">
                                        <?php echo $v['prescription'] ? nl2br(htmlspecialchars($v['prescription'])) : 'No medication prescribed for this visit'; ?>
                                    </div>
                                </div>

                                <?php if (!empty($v['services_rendered'])): ?>
                                    <div class="col-12">
                                        <span class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.68rem;">Home Care Procedures Performed</span>
                                        <div class="d-flex flex-wrap gap-1">
                                            <?php 
                                            $rendered = is_string($v['services_rendered']) ? json_decode($v['services_rendered'], true) : $v['services_rendered'];
                                            if (is_array($rendered)):
                                                foreach ($rendered as $s):
                                            ?>
                                                <span class="badge-pill-custom badge-zinc" style="font-size: 0.72rem;">
                                                    <i class="fa-solid fa-check text-blue-accent me-1"></i> <?php echo htmlspecialchars($s); ?>
                                                </span>
                                            <?php endforeach; endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- 2. Invoices & Billing Tab -->
            <div class="tab-pane fade" id="tab-billing">
                <div class="ui-table-container">
                    <div class="table-responsive">
                        <table class="ui-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Date</th>
                                    <th>Total Charge</th>
                                    <th>Amount Paid</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($invoices)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-5 text-muted small">
                                            No billing statements generated for this patient yet.<br>
                                            <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom btn-sm mt-3">
                                                Generate First Invoice
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($invoices as $inv): ?>
                                        <tr>
                                            <td><strong class="text-dark font-mono"><?php echo htmlspecialchars($inv['invoice_number']); ?></strong></td>
                                            <td><?php echo date('d/m/Y', strtotime($inv['invoice_date'])); ?></td>
                                            <td><strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($inv['total_amount'], 2); ?></strong></td>
                                            <td><strong class="text-emerald font-mono" style="color: var(--success);"><?php echo DEFAULT_CURRENCY . number_format($inv['amount_paid'], 2); ?></strong></td>
                                            <td>
                                                <strong class="<?php echo $inv['balance'] > 0 ? 'text-danger font-mono' : 'text-muted font-mono'; ?>">
                                                    <?php echo DEFAULT_CURRENCY . number_format($inv['balance'], 2); ?>
                                                </strong>
                                            </td>
                                            <td>
                                                <?php
                                                $bClass = 'badge-rose';
                                                if ($inv['payment_status'] === 'Paid') $bClass = 'badge-emerald';
                                                if ($inv['payment_status'] === 'Partially Paid') $bClass = 'badge-amber';
                                                ?>
                                                <span class="badge-pill-custom <?php echo $bClass; ?>">
                                                    <?php echo htmlspecialchars($inv['payment_status']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end no-print">
                                                <div class="btn-group gap-1">
                                                    <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $inv['invoice_number']; ?>" class="btn-secondary-custom btn-sm py-1 px-2">
                                                        View
                                                    </a>
                                                    <?php if ($inv['balance'] > 0): ?>
                                                        <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $inv['invoice_number']; ?>" class="btn-primary-custom btn-sm py-1 px-2">
                                                            Pay
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
                    <div class="table-responsive">
                        <table class="ui-table">
                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Clinical Reason / Follow-up</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($appointments)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted small">
                                            No scheduled appointments for this patient.<br>
                                            <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom btn-sm mt-3">
                                                Schedule Home Visit
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($appointments as $a): ?>
                                        <tr>
                                            <td>
                                                <strong class="text-dark d-block"><?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?></strong>
                                                <small class="text-muted"><?php echo date('g:i A', strtotime($a['appointment_time'])); ?></small>
                                            </td>
                                            <td><span class="text-secondary"><?php echo htmlspecialchars($a['reason']); ?></span></td>
                                            <td>
                                                <?php
                                                $stat = 'badge-amber';
                                                if ($a['status'] === 'Completed') $stat = 'badge-emerald';
                                                if ($a['status'] === 'Cancelled') $stat = 'badge-rose';
                                                ?>
                                                <span class="badge-pill-custom <?php echo $stat; ?>">
                                                    <?php echo htmlspecialchars($a['status']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end no-print">
                                                <?php if ($a['status'] === 'Scheduled'): ?>
                                                    <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Completed" class="btn-secondary-custom btn-sm text-success py-1 px-2">
                                                        <i class="fa-solid fa-check"></i> Done
                                                    </a>
                                                <?php endif; ?>
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