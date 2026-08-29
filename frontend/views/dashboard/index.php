<!-- Doctor's Command Center & Dashboard -->

<!-- 1. Executive Metric Summary Cards -->
<div class="row g-4 mb-4">
    <!-- Total Patients -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.08em;">Total Patients</span>
                    <h2 class="fw-bold text-white mb-0 mt-1" style="font-size: 2rem;"><?php echo number_format($totalClients); ?></h2>
                </div>
                <div class="p-3 rounded-3" style="background-color: var(--accent-subtle); border: 1px solid var(--border-active);">
                    <i class="fa-solid fa-user-group text-teal fs-4" style="color: var(--accent-teal);"></i>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-emerald"><i class="fa-solid fa-shield-halved"></i> Active Records</span>
                <span class="text-muted" style="font-size: 0.75rem;">Lifetime registrations</span>
            </div>
        </div>
    </div>

    <!-- Today's Visits / Encounters -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.08em;">Today's Encounters</span>
                    <h2 class="fw-bold text-white mb-0 mt-1" style="font-size: 2rem;"><?php echo number_format($todayVisits); ?></h2>
                </div>
                <div class="p-3 rounded-3" style="background-color: rgba(14, 165, 233, 0.1); border: 1px solid rgba(14, 165, 233, 0.25);">
                    <i class="fa-solid fa-notes-medical fs-4" style="color: #38bdf8;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-sky"><i class="fa-solid fa-clock"></i> Live Feed</span>
                <span class="text-muted" style="font-size: 0.75rem;">Logged today</span>
            </div>
        </div>
    </div>

    <!-- Today's Revenue -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.08em;">Today's Collections</span>
                    <h2 class="fw-bold text-white mb-0 mt-1" style="font-size: 2rem; color: #34d399;">
                        <?php echo DEFAULT_CURRENCY . number_format($todayPayments, 2); ?>
                    </h2>
                </div>
                <div class="p-3 rounded-3" style="background-color: var(--success-subtle); border: 1px solid rgba(52, 211, 153, 0.25);">
                    <i class="fa-solid fa-cash-register fs-4" style="color: #34d399;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-emerald"><i class="fa-solid fa-arrow-trend-up"></i> Received</span>
                <span class="text-muted" style="font-size: 0.75rem;">Paid receipts</span>
            </div>
        </div>
    </div>

    <!-- Outstanding Balances -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.08em;">Outstanding Balances</span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-size: 2rem; color: #fb7185;">
                        <?php echo DEFAULT_CURRENCY . number_format($outstandingBalances, 2); ?>
                    </h2>
                </div>
                <div class="p-3 rounded-3" style="background-color: var(--danger-subtle); border: 1px solid rgba(251, 113, 133, 0.25);">
                    <i class="fa-solid fa-file-invoice-dollar fs-4" style="color: #fb7185;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-rose"><i class="fa-solid fa-circle-exclamation"></i> Unpaid Bills</span>
                <span class="text-muted" style="font-size: 0.75rem;">Awaiting settlement</span>
            </div>
        </div>
    </div>
</div>

<!-- 2. Home Care Services Catalog Bar (All 16 Services from Flyer) -->
<div class="ui-card mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
        <div>
            <h5 class="fw-bold text-white mb-1"><i class="fa-solid fa-hand-holding-medical text-teal me-2" style="color: var(--accent-teal);"></i> Home Care Services Portfolio</h5>
            <p class="text-muted mb-0" style="font-size: 0.82rem;">Specialized clinical and domiciliary healthcare procedures offered by I.K Holiness</p>
        </div>
        <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom btn-sm">
            <i class="fa-solid fa-plus me-1"></i> Patient Care Log
        </a>
    </div>

    <div class="d-flex flex-wrap gap-2 pt-1">
        <?php
        $servicesList = [
            'Glucose Monitoring', 'Vital Signs Monitoring', 'Bed Bathing', 'Catheterization',
            'Hospital Escort', 'Serving Medication', 'Nutritional Management', 'Blood Sampling (Lab)',
            'Post Operative Care', 'Health Talk', 'Physiotherapy & Exercise', 'Catheter Care',
            'Wound Dressing', 'Oral Care', 'NG Tube Feeding', 'Medical Advice & Consult'
        ];
        foreach ($servicesList as $idx => $svc):
        ?>
            <span class="badge-pill-custom badge-zinc" style="font-size: 0.8rem; padding: 6px 12px;">
                <i class="fa-solid fa-check text-teal me-1" style="color: var(--accent-teal);"></i> <?php echo $svc; ?>
            </span>
        <?php endforeach; ?>
    </div>
</div>

<!-- 3. Second Row: Upcoming Appointments & Recent Patient Registrations -->
<div class="row g-4 mb-4">
    <!-- Upcoming Appointments -->
    <div class="col-12 col-xl-7">
        <div class="ui-card h-100 p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-calendar-check text-teal me-2" style="color: var(--accent-teal);"></i> Upcoming Appointments</h5>
                    <small class="text-muted">Doctor's scheduled home visits and checkups</small>
                </div>
                <a href="<?php echo APP_URL; ?>/appointments" class="btn-secondary-custom btn-sm">View Schedule</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Patient ID & Name</th>
                            <th>Date & Time</th>
                            <th>Care Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($upcomingAppointments)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fa-regular fa-calendar-check fs-2 mb-2 d-block text-muted"></i>
                                    No pending appointments scheduled for today.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($upcomingAppointments as $appt): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-box" style="width: 32px; height: 32px; font-size: 0.75rem;">
                                                <?php echo strtoupper(substr($appt['full_name'] ?? 'P', 0, 2)); ?>
                                            </div>
                                            <div>
                                                <strong class="text-white d-block"><?php echo htmlspecialchars($appt['full_name']); ?></strong>
                                                <span class="text-muted" style="font-size: 0.75rem;"><?php echo htmlspecialchars($appt['client_id']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-white fw-medium"><?php echo date('d/m/Y', strtotime($appt['appointment_date'])); ?></div>
                                        <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></small>
                                    </td>
                                    <td>
                                        <span class="text-white"><?php echo htmlspecialchars($appt['reason']); ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        $statusClass = 'badge-amber';
                                        if (strtolower($appt['status']) === 'completed') $statusClass = 'badge-emerald';
                                        if (strtolower($appt['status']) === 'cancelled') $statusClass = 'badge-rose';
                                        ?>
                                        <span class="badge-pill-custom <?php echo $statusClass; ?>">
                                            <?php echo htmlspecialchars($appt['status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Patient Registrations -->
    <div class="col-12 col-xl-5">
        <div class="ui-card h-100 p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-user-plus text-teal me-2" style="color: var(--accent-teal);"></i> New Registrations</h5>
                    <small class="text-muted">Recently enrolled patients</small>
                </div>
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom btn-sm">Full Directory</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Contact</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentClients)): ?>
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-user-injured fs-2 mb-2 d-block text-muted"></i>
                                    No patients registered yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentClients as $client): ?>
                                <tr>
                                    <td>
                                        <strong class="text-white d-block"><?php echo htmlspecialchars($client['full_name']); ?></strong>
                                        <span class="text-muted" style="font-size: 0.75rem;">
                                            ID: <?php echo htmlspecialchars($client['client_id']); ?> &bull; <?php echo htmlspecialchars($client['gender']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-white" style="font-size: 0.85rem;"><?php echo htmlspecialchars($client['phone']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-secondary-custom" style="padding: 4px 10px; font-size: 0.75rem;">
                                            Dossier
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

<!-- 4. Third Row: Recent Clinical Visits Log & Payment Ledger -->
<div class="row g-4">
    <!-- Recent Clinical Visits -->
    <div class="col-12 col-xl-7">
        <div class="ui-card p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-stethoscope text-teal me-2" style="color: var(--accent-teal);"></i> Recent Clinical Encounters</h5>
                    <small class="text-muted">Doctor's diagnosis & medical care history</small>
                </div>
                <a href="<?php echo APP_URL; ?>/visits" class="btn-secondary-custom btn-sm">All Encounters</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Date / Patient</th>
                            <th>Chief Complaint</th>
                            <th>Diagnosis</th>
                            <th>Attending</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentVisits)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-file-medical fs-2 mb-2 d-block text-muted"></i>
                                    No visits recorded today yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentVisits as $v): ?>
                                <tr>
                                    <td>
                                        <strong class="text-white d-block"><?php echo htmlspecialchars($v['client_name']); ?></strong>
                                        <small class="text-muted"><?php echo date('d/m/Y H:i', strtotime($v['visit_date'])); ?> &bull; <?php echo htmlspecialchars($v['client_id']); ?></small>
                                    </td>
                                    <td>
                                        <span class="text-secondary" style="font-size: 0.85rem;">
                                            <?php echo htmlspecialchars(substr($v['complaint'], 0, 35)) . (strlen($v['complaint']) > 35 ? '...' : ''); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge-pill-custom badge-emerald" style="font-size: 0.75rem;">
                                            <?php echo htmlspecialchars(substr($v['diagnosis'] ?? 'Pending', 0, 30)); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?php echo htmlspecialchars($v['staff_name']); ?></small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Payments -->
    <div class="col-12 col-xl-5">
        <div class="ui-card p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-receipt text-teal me-2" style="color: var(--accent-teal);"></i> Recent Payment Receipts</h5>
                    <small class="text-muted">Settled invoices and collections</small>
                </div>
                <a href="<?php echo APP_URL; ?>/payments" class="btn-secondary-custom btn-sm">Ledger</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Receipt & Patient</th>
                            <th>Amount</th>
                            <th>Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentPayments)): ?>
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-receipt fs-2 mb-2 d-block text-muted"></i>
                                    No payments registered today.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentPayments as $p): ?>
                                <tr>
                                    <td>
                                        <strong class="text-white d-block"><?php echo htmlspecialchars($p['receipt_number']); ?></strong>
                                        <small class="text-muted"><?php echo htmlspecialchars($p['client_name']); ?></small>
                                    </td>
                                    <td>
                                        <strong class="text-emerald" style="color: #34d399;">
                                            <?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <span class="badge-pill-custom badge-zinc">
                                            <?php echo htmlspecialchars($p['payment_method']); ?>
                                        </span>
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
