<div class="row g-4">
    <!-- Left Column: Patient Profile Card & Shortcuts -->
    <div class="col-12 col-lg-4">
        <div class="dashboard-card mb-4">
            <div class="text-center pb-3 border-bottom" style="border-color: var(--border-color) !important;">
                <div class="d-inline-flex align-items-center justify-content-center bg-opacity-10 rounded-circle mb-3" style="width: 80px; height: 80px; background-color: rgba(45, 212, 191, 0.1);">
                    <i class="fa-solid fa-user-injured text-teal" style="color: var(--accent-color); font-size: 2.5rem;"></i>
                </div>
                <h3 class="fw-bold mb-1 text-white"><?php echo htmlspecialchars($client['full_name']); ?></h3>
                <span class="badge bg-opacity-10 text-teal py-2 px-3 border border-teal" style="background-color: rgba(45, 212, 191, 0.05); color: var(--accent-color); border-color: rgba(45, 212, 191, 0.25) !important;">
                    ID: <?php echo htmlspecialchars($client['client_id']); ?>
                </span>
            </div>

            <!-- Profile Fields -->
            <div class="py-3">
                <div class="mb-3">
                    <small class="text-muted d-block uppercase-spacing">Gender</small>
                    <span class="text-white fw-medium"><?php echo htmlspecialchars($client['gender']); ?></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block uppercase-spacing">Age & Date of Birth</small>
                    <span class="text-white fw-medium"><?php echo htmlspecialchars($client['age']); ?> Years Old <small class="text-muted">(DOB: <?php echo date('d/m/Y', strtotime($client['dob'])); ?>)</small></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block uppercase-spacing">Phone Number</small>
                    <span class="text-white fw-medium"><?php echo htmlspecialchars($client['phone']); ?></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block uppercase-spacing">Residential Address</small>
                    <span class="text-white fw-medium"><?php echo nl2br(htmlspecialchars($client['address'])); ?></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block uppercase-spacing">Registration Date</small>
                    <span class="text-white fw-medium"><?php echo date('d/m/Y', strtotime($client['registration_date'])); ?></span>
                </div>
            </div>

            <!-- Emergency Contact Section -->
            <div class="p-3 rounded-4 bg-opacity-5 border border-dashed mb-3" style="background-color: rgba(251, 191, 36, 0.03); border-color: rgba(251, 191, 36, 0.2) !important;">
                <span class="text-warning fw-bold d-block mb-2 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                    <i class="fa-solid fa-phone-volume me-1"></i> Emergency Contact
                </span>
                <span class="text-white d-block fw-medium" style="font-size: 0.9rem;"><?php echo htmlspecialchars($client['emergency_name']); ?></span>
                <span class="text-muted small"><?php echo htmlspecialchars($client['emergency_phone']); ?></span>
            </div>

            <!-- Shortcuts -->
            <div class="d-grid gap-2 mt-4 pt-3 border-top" style="border-color: var(--border-color) !important;">
                <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn btn-accent text-start px-3 py-2">
                    <i class="fa-solid fa-file-medical me-2"></i> Record New Visit
                </a>
                <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn btn-accent text-start px-3 py-2">
                    <i class="fa-solid fa-file-invoice-dollar me-2"></i> Create Invoice / Charge
                </a>
                <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn btn-accent text-start px-3 py-2">
                    <i class="fa-solid fa-calendar-plus me-2"></i> Schedule Appointment
                </a>
                <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $client['client_id']; ?>" class="btn btn-outline-secondary text-start px-3 py-2" style="border-radius: 10px;">
                    <i class="fa-solid fa-user-pen me-2"></i> Edit Profile Info
                </a>
            </div>
        </div>
    </div>

    <!-- Right Column: Medical History Tabs -->
    <div class="col-12 col-lg-8">
        
        <!-- Navigation Tabs -->
        <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3 no-print" style="border-color: var(--border-color) !important;">
            <li class="nav-item">
                <button class="nav-link active px-4 py-2 fw-semibold" id="visits-tab" data-bs-toggle="pill" data-bs-target="#tab-visits" type="button" style="border-radius: 10px;">
                    <i class="fa-solid fa-notes-medical me-2"></i> Visit History (<?php echo count($visits); ?>)
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link px-4 py-2 fw-semibold" id="billing-tab" data-bs-toggle="pill" data-bs-target="#tab-billing" type="button" style="border-radius: 10px;">
                    <i class="fa-solid fa-file-invoice-dollar me-2"></i> Invoices / Balances (<?php echo count($invoices); ?>)
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link px-4 py-2 fw-semibold" id="appts-tab" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" style="border-radius: 10px;">
                    <i class="fa-solid fa-calendar-check me-2"></i> Appointments (<?php echo count($appointments); ?>)
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            
            <!-- 1. Visit History Tab -->
            <div class="tab-pane fade show active" id="tab-visits">
                <?php if (empty($visits)): ?>
                    <div class="custom-table-container py-5 text-center text-muted">
                        <i class="fa-solid fa-folder-open fs-2 mb-3 text-teal d-block" style="color: var(--accent-color);"></i>
                        No visits recorded for this patient yet.<br>
                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-accent mt-3">Record First Visit</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($visits as $v): ?>
                        <div class="custom-table-container mb-4">
                            <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3" style="border-color: var(--border-color) !important;">
                                <div>
                                    <h5 class="fw-bold mb-0 text-white">Visit on <?php echo date('d/m/Y \a\t H:i', strtotime($v['visit_date'])); ?></h5>
                                    <small class="text-muted">Attended by: <?php echo htmlspecialchars($v['staff_name']); ?></small>
                                </div>
                                <button onclick="window.print()" class="btn btn-sm btn-outline-secondary no-print" style="border-radius: 6px;"><i class="fa-solid fa-print"></i> Print</button>
                            </div>
                            
                            <!-- Vitals Grid -->
                            <div class="row g-3 mb-3 p-3 rounded-4" style="background-color: rgba(45, 212, 191, 0.03); border: 1px solid var(--border-color);">
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block">Temperature</small>
                                    <strong class="text-white"><?php echo $v['temperature'] ? htmlspecialchars($v['temperature']) . ' °C' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block">Blood Pressure (BP)</small>
                                    <strong class="text-white"><?php echo $v['bp'] ? htmlspecialchars($v['bp']) : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block">Weight</small>
                                    <strong class="text-white"><?php echo $v['weight'] ? htmlspecialchars($v['weight']) . ' kg' : 'N/A'; ?></strong>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small class="text-muted d-block">Diagnosis Status</small>
                                    <strong class="text-teal" style="color: var(--accent-color);"><?php echo $v['diagnosis'] ? 'Diagnosed' : 'Pending'; ?></strong>
                                </div>
                            </div>

                            <!-- Diagnosis and Complaints -->
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <span class="text-muted small fw-bold d-block text-uppercase">Chief Complaint</span>
                                    <p class="text-white bg-dark bg-opacity-25 p-2 rounded border border-light border-opacity-10"><?php echo nl2br(htmlspecialchars($v['complaint'])); ?></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-muted small fw-bold d-block text-uppercase">Symptoms</span>
                                    <p class="text-white bg-dark bg-opacity-25 p-2 rounded border border-light border-opacity-10"><?php echo $v['symptoms'] ? nl2br(htmlspecialchars($v['symptoms'])) : 'None recorded'; ?></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-muted small fw-bold d-block text-uppercase font-bold">Diagnosis</span>
                                    <p class="text-white bg-dark bg-opacity-25 p-2 rounded border border-light border-opacity-10 fw-medium"><?php echo $v['diagnosis'] ? nl2br(htmlspecialchars($v['diagnosis'])) : 'None recorded'; ?></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="text-muted small fw-bold d-block text-uppercase">Treatment</span>
                                    <p class="text-white bg-dark bg-opacity-25 p-2 rounded border border-light border-opacity-10"><?php echo $v['treatment'] ? nl2br(htmlspecialchars($v['treatment'])) : 'None recorded'; ?></p>
                                </div>
                                <div class="col-12">
                                    <span class="text-muted small fw-bold d-block text-uppercase">Prescription / Medication Details</span>
                                    <p class="text-teal bg-teal bg-opacity-5 p-3 rounded border border-teal border-opacity-20 fw-bold"><?php echo $v['prescription'] ? nl2br(htmlspecialchars($v['prescription'])) : 'No prescription recorded'; ?></p>
                                </div>
                                <?php if ($v['notes']): ?>
                                    <div class="col-12">
                                        <span class="text-muted small fw-bold d-block text-uppercase">Clinical Notes</span>
                                        <p class="text-muted bg-dark bg-opacity-25 p-2 rounded border border-light border-opacity-10 small"><?php echo nl2br(htmlspecialchars($v['notes'])); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- 2. Billing & Invoices Tab -->
            <div class="tab-pane fade" id="tab-billing">
                <div class="custom-table-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0 text-white">Billing & Invoice Statements</h5>
                        <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-accent no-print"><i class="fa-solid fa-plus me-1"></i> Add Bill</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Date</th>
                                    <th>Total Charge</th>
                                    <th>Paid Amount</th>
                                    <th>Remaining Balance</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($invoices)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">No billing statements registered for this patient</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($invoices as $inv): ?>
                                        <tr>
                                            <td><strong><?php echo htmlspecialchars($inv['invoice_number']); ?></strong></td>
                                            <td><?php echo date('d/m/Y', strtotime($inv['invoice_date'])); ?></td>
                                            <td><?php echo DEFAULT_CURRENCY . number_format($inv['total_amount'], 2); ?></td>
                                            <td class="text-success"><?php echo DEFAULT_CURRENCY . number_format($inv['amount_paid'], 2); ?></td>
                                            <td class="<?php echo $inv['balance'] > 0 ? 'text-danger fw-bold' : 'text-muted'; ?>">
                                                <?php echo DEFAULT_CURRENCY . number_format($inv['balance'], 2); ?>
                                            </td>
                                            <td>
                                                <span class="badge rounded-pill badge-<?php echo strtolower(str_replace(' ', '', $inv['payment_status'])); ?>">
                                                    <?php echo htmlspecialchars($inv['payment_status']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end no-print">
                                                <div class="btn-group gap-1">
                                                    <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $inv['invoice_number']; ?>" class="btn btn-sm btn-outline-info" style="border-radius: 6px;">
                                                        <i class="fa-solid fa-file-invoice"></i> View
                                                    </a>
                                                    <?php if ($inv['balance'] > 0): ?>
                                                        <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $inv['invoice_number']; ?>" class="btn btn-sm btn-success" style="border-radius: 6px;">
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
                <div class="custom-table-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0 text-white">Appointments Log</h5>
                        <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-accent no-print"><i class="fa-solid fa-plus me-1"></i> Add Appointment</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($appointments)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No appointments recorded</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($appointments as $appt): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($appt['appointment_date'])); ?></td>
                                            <td><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></td>
                                            <td><?php echo htmlspecialchars($appt['reason']); ?></td>
                                            <td>
                                                <span class="badge rounded-pill badge-<?php echo strtolower($appt['status']); ?>">
                                                    <?php echo htmlspecialchars($appt['status']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end no-print">
                                                <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $appt['id']; ?>" class="btn btn-sm btn-outline-warning" style="border-radius: 6px;">
                                                    <i class="fa-solid fa-pen"></i> Edit
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
/* Internal styles for uppercase labels */
.uppercase-spacing {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    font-weight: 600;
}
.nav-pills .nav-link {
    color: var(--text-muted);
    background-color: transparent;
    border: 1px solid var(--border-color);
}
.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
    color: #ffffff;
    border-color: transparent;
}
</style>
