<!-- Executive Clinical EHR Dashboard & Operations Command Center -->

<!-- 1. Rich Deep-Blue Welcome & Action Launchpad (High-Contrast Hero Banner) -->
<div class="p-4 p-md-4 rounded-4 mb-4 text-white position-relative overflow-hidden" 
     style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #2563eb 100%); box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.35); border: 1px solid rgba(255, 255, 255, 0.15);">
    
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-3 position-relative" style="z-index: 2;">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                <h3 class="fw-bold text-white mb-0" style="font-size: 1.4rem; letter-spacing: -0.01em;">
                    Good day, <?php echo htmlspecialchars($currentUserName ?? 'Doctor'); ?>
                </h3>
                <span class="badge-pill-custom py-1 px-2" style="background-color: rgba(34, 197, 94, 0.2); color: #86efac; border: 1px solid rgba(34, 197, 94, 0.4); font-size: 0.7rem;">
                    <i class="fa-solid fa-circle" style="font-size: 0.45rem;"></i> System Live & Synchronized
                </span>
            </div>
            <p class="small mb-0" style="color: #bfdbfe; font-size: 0.8125rem;">
                <i class="fa-regular fa-calendar-check me-1"></i> <?php echo date('l, d F Y'); ?> &bull; I.K Holiness Domiciliary Care Center &bull; Pankrono, Kumasi
            </p>
        </div>

        <!-- 4 Quick Action Launchpad Buttons -->
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <a href="<?php echo APP_URL; ?>/visits/create" class="btn btn-sm py-2 px-3 fw-semibold text-white rounded-3 shadow-sm d-inline-flex align-items-center gap-2" 
               style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border: 1px solid rgba(255, 255, 255, 0.3);">
                <i class="fa-solid fa-stethoscope"></i>
                <span>Log Visit</span>
            </a>
            <a href="<?php echo APP_URL; ?>/clients/create" class="btn btn-sm py-2 px-3 fw-semibold text-white rounded-3 shadow-sm d-inline-flex align-items-center gap-2" 
               style="background-color: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.25); backdrop-filter: blur(4px);">
                <i class="fa-solid fa-user-plus" style="color: #93c5fd;"></i>
                <span>New Patient</span>
            </a>
            <a href="<?php echo APP_URL; ?>/billing/create" class="btn btn-sm py-2 px-3 fw-semibold text-white rounded-3 shadow-sm d-inline-flex align-items-center gap-2" 
               style="background-color: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.25); backdrop-filter: blur(4px);">
                <i class="fa-solid fa-file-invoice-dollar" style="color: #fde047;"></i>
                <span>Create Invoice</span>
            </a>
            <a href="<?php echo APP_URL; ?>/appointments/create" class="btn btn-sm py-2 px-3 fw-semibold text-white rounded-3 shadow-sm d-inline-flex align-items-center gap-2" 
               style="background-color: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.25); backdrop-filter: blur(4px);">
                <i class="fa-solid fa-calendar-plus" style="color: #67e8f9;"></i>
                <span>Book Visit</span>
            </a>
        </div>
    </div>
</div>

<!-- 2. Distinctly Tinted Stat Bento Cards (No Bland Monotone White!) -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- Stat 1: Total Patients (Sapphire Blue Tint) -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between p-3" 
             style="background: linear-gradient(135deg, #eff6ff 0%, #ffffff 100%); border: 1px solid #bfdbfe; border-top: 4px solid #2563eb;">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.06em; color: #1e40af;">Total Patients</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1" style="font-size: 1.5rem; letter-spacing: -0.02em;">
                        <?php echo number_format($totalClients); ?>
                    </h3>
                </div>
                <div class="p-2 rounded-3" style="background-color: #dbeafe; color: #1d4ed8; border: 1px solid #bfdbfe;">
                    <i class="fa-solid fa-user-group fs-5"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: #dbeafe !important;">
                <span class="badge-pill-custom badge-emerald"><i class="fa-solid fa-check"></i> Enrolled</span>
                <span class="text-secondary" style="font-size: 0.72rem;">Permanent dossiers</span>
            </div>
        </div>
    </div>

    <!-- Stat 2: Today's Encounters (Teal/Cyan Tint) -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between p-3" 
             style="background: linear-gradient(135deg, #f0fdfa 0%, #ffffff 100%); border: 1px solid #99f6e4; border-top: 4px solid #0d9488;">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.06em; color: #0f766e;">Today's Encounters</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1" style="font-size: 1.5rem; letter-spacing: -0.02em;">
                        <?php echo number_format($todayVisits); ?>
                    </h3>
                </div>
                <div class="p-2 rounded-3" style="background-color: #ccfbf1; color: #0f766e; border: 1px solid #99f6e4;">
                    <i class="fa-solid fa-stethoscope fs-5"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: #ccfbf1 !important;">
                <span class="badge-pill-custom badge-sky"><i class="fa-solid fa-clock"></i> Today's Queue</span>
                <span class="text-secondary" style="font-size: 0.72rem;">Scheduled visits</span>
            </div>
        </div>
    </div>

    <!-- Stat 3: Today's Collections (Emerald Green Tint) -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between p-3" 
             style="background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%); border: 1px solid #bbf7d0; border-top: 4px solid #16a34a;">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.06em; color: #15803d;">Today's Collections</span>
                    <h3 class="fw-bold mb-0 mt-1 font-mono" style="font-size: 1.35rem; color: #16a34a; letter-spacing: -0.02em;">
                        <?php echo DEFAULT_CURRENCY . number_format($todayPayments, 2); ?>
                    </h3>
                </div>
                <div class="p-2 rounded-3" style="background-color: #dcfce7; color: #15803d; border: 1px solid #bbf7d0;">
                    <i class="fa-solid fa-wallet fs-5"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: #dcfce7 !important;">
                <span class="badge-pill-custom badge-emerald"><i class="fa-solid fa-circle-check"></i> Cleared</span>
                <span class="text-secondary" style="font-size: 0.72rem;">MoMo & Cash</span>
            </div>
        </div>
    </div>

    <!-- Stat 4: Outstanding Receivables (Rose/Red Tint) -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between p-3" 
             style="background: linear-gradient(135deg, #fff1f2 0%, #ffffff 100%); border: 1px solid #fecdd3; border-top: 4px solid #e11d48;">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <span class="text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.06em; color: #be123c;">Outstanding Receivables</span>
                    <h3 class="fw-bold mb-0 mt-1 font-mono" style="font-size: 1.35rem; color: #e11d48; letter-spacing: -0.02em;">
                        <?php echo DEFAULT_CURRENCY . number_format($outstandingBalances, 2); ?>
                    </h3>
                </div>
                <div class="p-2 rounded-3" style="background-color: #ffe4e6; color: #be123c; border: 1px solid #fecdd3;">
                    <i class="fa-solid fa-file-invoice-dollar fs-5"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: #ffe4e6 !important;">
                <span class="badge-pill-custom badge-rose"><i class="fa-solid fa-circle-exclamation"></i> Overdue</span>
                <span class="text-secondary" style="font-size: 0.72rem;">Pending settlement</span>
            </div>
        </div>
    </div>
</div>

<!-- 3. High-Impact Medical Analytics Section -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- Chart 1: 7-Day Encounters & Patient Registrations Activity Trend -->
    <div class="col-12 col-xl-8">
        <div class="ui-card h-100 p-3 p-md-4" style="border: 1px solid var(--border-subtle); box-shadow: var(--shadow-card);">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 mb-3 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-chart-line text-blue-accent me-1"></i> Clinical Encounters & Patient Growth Trend
                    </h6>
                    <small class="text-muted">Daily volume of clinical visits vs new patient registrations (Last 7 Days)</small>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <span class="badge-pill-custom bg-blue-subtle text-blue-accent fw-bold" style="font-size: 0.72rem;">
                        <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i> Clinical Visits
                    </span>
                    <span class="badge-pill-custom badge-emerald fw-bold" style="font-size: 0.72rem;">
                        <i class="fa-solid fa-circle text-success" style="font-size: 0.5rem;"></i> New Patients
                    </span>
                </div>
            </div>
            <div style="position: relative; height: 260px; width: 100%;">
                <canvas id="clinicalTrendsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart 2: Invoice Settlement & Financial Breakdown Donut -->
    <div class="col-12 col-xl-4">
        <div class="ui-card h-100 d-flex flex-column justify-content-between p-3 p-md-4" style="border: 1px solid var(--border-subtle); box-shadow: var(--shadow-card);">
            <div class="mb-2 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                <h6 class="fw-bold text-dark mb-0">
                    <i class="fa-solid fa-chart-pie text-blue-accent me-1"></i> Invoice Settlement Ratio
                </h6>
                <small class="text-muted">Distribution of Paid, Partially Paid, and Unpaid statements</small>
            </div>

            <div style="position: relative; height: 180px; width: 100%;" class="my-auto">
                <canvas id="invoiceDonutChart"></canvas>
            </div>

            <!-- Financial Metric Progress Rows -->
            <div class="pt-3 border-top mt-2" style="border-color: var(--border-subtle) !important; font-size: 0.78rem;">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary"><i class="fa-solid fa-circle text-success me-1" style="font-size: 0.6rem;"></i> Fully Paid Invoices:</span>
                    <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Paid'] ?? 0; ?></strong>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary"><i class="fa-solid fa-circle text-warning me-1" style="font-size: 0.6rem;"></i> Partially Settled:</span>
                    <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Partially Paid'] ?? 0; ?></strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-secondary"><i class="fa-solid fa-circle text-danger me-1" style="font-size: 0.6rem;"></i> Unpaid / Overdue:</span>
                    <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Unpaid'] ?? 0; ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4. Clinical Schedule & New Patient Influx Grid -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- Upcoming Appointments Schedule -->
    <div class="col-12 col-xl-7">
        <div class="ui-card h-100 p-0 overflow-hidden" style="border: 1px solid var(--border-subtle); box-shadow: var(--shadow-card);">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="background-color: #f8fafc; border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-calendar-check text-blue-accent me-1"></i> Upcoming Appointments Schedule
                    </h6>
                    <small class="text-muted">Doctor's scheduled home visits & consultations</small>
                </div>
                <a href="<?php echo APP_URL; ?>/appointments" class="btn-secondary-custom btn-sm py-1 px-2">View Calendar</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Patient Name & ID</th>
                            <th>Date & Time</th>
                            <th>Care Reason</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($upcomingAppointments)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted small">
                                    <i class="fa-regular fa-calendar-check fs-4 mb-1 d-block text-muted"></i>
                                    No pending appointments scheduled for today.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($upcomingAppointments as $appt): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-box" style="width: 30px; height: 30px; font-size: 0.72rem;">
                                                <?php echo strtoupper(substr($appt['full_name'] ?? 'P', 0, 2)); ?>
                                            </div>
                                            <div>
                                                <strong class="text-dark d-block" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($appt['full_name']); ?></strong>
                                                <span class="text-muted font-mono" style="font-size: 0.7rem;"><?php echo htmlspecialchars($appt['client_id']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-dark fw-medium" style="font-size: 0.8125rem;"><?php echo date('d/m/Y', strtotime($appt['appointment_date'])); ?></div>
                                        <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></small>
                                    </td>
                                    <td>
                                        <span class="text-secondary" style="font-size: 0.78rem;"><?php echo htmlspecialchars($appt['reason']); ?></span>
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
                                    <td class="text-end">
                                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo urlencode($appt['client_id']); ?>" class="btn-primary-custom btn-sm py-1 px-2" title="Start Clinical Visit">
                                            <i class="fa-solid fa-play"></i>
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

    <!-- Recently Registered Patients -->
    <div class="col-12 col-xl-5">
        <div class="ui-card h-100 p-0 overflow-hidden" style="border: 1px solid var(--border-subtle); box-shadow: var(--shadow-card);">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="background-color: #f8fafc; border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-user-plus text-blue-accent me-1"></i> New Patient Influx
                    </h6>
                    <small class="text-muted">Recently registered patient dossiers</small>
                </div>
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom btn-sm py-1 px-2">Full Directory</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Contact</th>
                            <th class="text-end">Dossier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentClients)): ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted small">
                                    <i class="fa-solid fa-user-group fs-4 mb-1 d-block text-muted"></i>
                                    No patients registered yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentClients as $rc): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-box" style="width: 30px; height: 30px; font-size: 0.72rem;">
                                                <?php echo strtoupper(substr($rc['full_name'], 0, 2)); ?>
                                            </div>
                                            <div>
                                                <strong class="text-dark d-block" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($rc['full_name']); ?></strong>
                                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.65rem; padding: 1px 5px;">
                                                    <?php echo htmlspecialchars($rc['client_id']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-dark" style="font-size: 0.78rem;">
                                            <i class="fa-solid fa-phone text-muted me-1"></i><?php echo htmlspecialchars($rc['phone']); ?>
                                        </div>
                                        <small class="text-muted"><?php echo htmlspecialchars($rc['gender']); ?></small>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $rc['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2" title="View Patient 360 File">
                                            <i class="fa-solid fa-id-card-clip"></i>
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

<!-- 5. Clinical Encounters Feed & Financial Collections Ledger -->
<div class="row g-3 g-xl-4">
    <!-- Recent Clinical Encounters Feed -->
    <div class="col-12 col-xl-7">
        <div class="ui-card h-100 p-0 overflow-hidden" style="border: 1px solid var(--border-subtle); box-shadow: var(--shadow-card);">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="background-color: #f8fafc; border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-stethoscope text-blue-accent me-1"></i> Recent Encounters Feed
                    </h6>
                    <small class="text-muted">Recorded vitals, medications & nursing interventions</small>
                </div>
                <a href="<?php echo APP_URL; ?>/visits" class="btn-secondary-custom btn-sm py-1 px-2">All Visits</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Chief Complaint</th>
                            <th>Diagnosis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentVisits)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted small">
                                    <i class="fa-solid fa-stethoscope fs-4 mb-1 d-block text-muted"></i>
                                    No clinical encounters logged yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentVisits as $rv): ?>
                                <tr>
                                    <td>
                                        <div class="text-dark fw-medium" style="font-size: 0.8125rem;"><?php echo date('d/m/Y', strtotime($rv['visit_date'])); ?></div>
                                        <small class="text-muted"><?php echo date('H:i A', strtotime($rv['visit_date'])); ?></small>
                                    </td>
                                    <td>
                                        <strong class="text-dark d-block" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($rv['client_name']); ?></strong>
                                        <small class="text-muted font-mono"><?php echo htmlspecialchars($rv['client_id']); ?></small>
                                    </td>
                                    <td>
                                        <span class="text-secondary" style="font-size: 0.78rem;">
                                            <?php echo htmlspecialchars(substr($rv['complaint'], 0, 35)) . (strlen($rv['complaint']) > 35 ? '...' : ''); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge-pill-custom badge-emerald" style="font-size: 0.72rem;">
                                            <?php echo htmlspecialchars(substr($rv['diagnosis'] ?? 'Under Observation', 0, 25)); ?>
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

    <!-- Recent Financial Collections Ledger -->
    <div class="col-12 col-xl-5">
        <div class="ui-card h-100 p-0 overflow-hidden" style="border: 1px solid var(--border-subtle); box-shadow: var(--shadow-card);">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="background-color: #f8fafc; border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-receipt text-blue-accent me-1"></i> Recent Receipts Ledger
                    </h6>
                    <small class="text-muted">Settled payment transactions & payment modes</small>
                </div>
                <a href="<?php echo APP_URL; ?>/payments" class="btn-secondary-custom btn-sm py-1 px-2">Full Ledger</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Receipt #</th>
                            <th>Patient</th>
                            <th>Method</th>
                            <th class="text-end">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentPayments)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted small">
                                    <i class="fa-solid fa-receipt fs-4 mb-1 d-block text-muted"></i>
                                    No payment receipts recorded yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentPayments as $rp): ?>
                                <tr>
                                    <td>
                                        <strong class="text-dark font-mono" style="font-size: 0.75rem;"><?php echo htmlspecialchars($rp['receipt_number']); ?></strong>
                                    </td>
                                    <td>
                                        <strong class="text-dark d-block" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($rp['client_name']); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge-pill-custom badge-zinc" style="font-size: 0.68rem;">
                                            <?php echo htmlspecialchars($rp['payment_method']); ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <strong class="font-mono" style="color: var(--success); font-size: 0.85rem;">
                                            <?php echo DEFAULT_CURRENCY . number_format($rp['amount_paid'], 2); ?>
                                        </strong>
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

<!-- Chart.js Modern Initialization Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Clinical Encounters & Patient Registrations Spline Chart
    const ctxTrends = document.getElementById('clinicalTrendsChart');
    if (ctxTrends) {
        const labels = <?php echo json_encode($chartDays ?? []); ?>;
        const visitsData = <?php echo json_encode($chartVisitsData ?? []); ?>;
        const clientsData = <?php echo json_encode($chartClientsData ?? []); ?>;

        const gradientBlue = ctxTrends.getContext('2d').createLinearGradient(0, 0, 0, 240);
        gradientBlue.addColorStop(0, 'rgba(37, 99, 235, 0.25)');
        gradientBlue.addColorStop(1, 'rgba(37, 99, 235, 0.00)');

        const gradientEmerald = ctxTrends.getContext('2d').createLinearGradient(0, 0, 0, 240);
        gradientEmerald.addColorStop(0, 'rgba(16, 185, 129, 0.22)');
        gradientEmerald.addColorStop(1, 'rgba(16, 185, 129, 0.00)');

        new Chart(ctxTrends, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Clinical Visits',
                        data: visitsData,
                        borderColor: '#2563eb',
                        backgroundColor: gradientBlue,
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#2563eb',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'New Patients',
                        data: clientsData,
                        borderColor: '#10b981',
                        backgroundColor: gradientEmerald,
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleColor: '#ffffff',
                        bodyColor: '#cbd5e1',
                        padding: 10,
                        cornerRadius: 8,
                        boxPadding: 4,
                        usePointStyle: true
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#64748b',
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e2e8f0'
                        },
                        ticks: {
                            color: '#64748b',
                            precision: 0,
                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        });
    }

    // 2. Invoice Settlement Ratio Donut Chart
    const ctxDonut = document.getElementById('invoiceDonutChart');
    if (ctxDonut) {
        const paidCount = <?php echo (int)($invoiceStatusMap['Paid'] ?? 0); ?>;
        const partialCount = <?php echo (int)($invoiceStatusMap['Partially Paid'] ?? 0); ?>;
        const unpaidCount = <?php echo (int)($invoiceStatusMap['Unpaid'] ?? 0); ?>;

        const hasData = (paidCount + partialCount + unpaidCount) > 0;
        const dataValues = hasData ? [paidCount, partialCount, unpaidCount] : [1, 0, 0];
        const dataColors = hasData ? ['#10b981', '#f59e0b', '#ef4444'] : ['#e2e8f0', '#e2e8f0', '#e2e8f0'];

        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Fully Paid', 'Partially Paid', 'Unpaid'],
                datasets: [{
                    data: dataValues,
                    backgroundColor: dataColors,
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: hasData,
                        backgroundColor: '#0f172a',
                        titleColor: '#ffffff',
                        bodyColor: '#cbd5e1',
                        padding: 10,
                        cornerRadius: 8
                    }
                }
            }
        });
    }
});
</script>
