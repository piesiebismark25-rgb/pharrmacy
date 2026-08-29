<!-- Ultra-Modern Creative Patient Medical Dossier & Clinical Cockpit -->
<div class="creative-dossier-wrapper">

    <!-- 1. Top Action & Navigation Header -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4 no-print">
        <div class="d-flex align-items-center gap-2">
            <a href="<?php echo APP_URL; ?>/clients" class="btn-back-pill">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Patients Directory</span>
            </a>
            <span class="text-muted small">&bull;</span>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.75rem;">
                Dossier: <?php echo htmlspecialchars($client['client_id']); ?>
            </span>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button onclick="window.print()" class="btn-secondary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-print me-1"></i> Print Dossier
            </button>
            <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profile
            </a>
        </div>
    </div>

    <!-- 2. Hero Patient Bento Cockpit (Creative Multi-Card Matrix) -->
    <div class="row g-3 g-xl-4 mb-4">
        
        <!-- Hero Identity Card (Vibrant Royal Blue Gradient) -->
        <div class="col-12 col-xl-7">
            <div class="hero-patient-card">
                <div class="d-flex align-items-start gap-3">
                    <div class="hero-avatar">
                        <?php echo strtoupper(substr($client['full_name'], 0, 2)); ?>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                            <h2 class="hero-patient-name text-truncate mb-0">
                                <?php echo htmlspecialchars($client['full_name']); ?>
                            </h2>
                            <span class="hero-badge-id font-mono">
                                <?php echo htmlspecialchars($client['client_id']); ?>
                            </span>
                            <span class="hero-badge-gender">
                                <?php echo htmlspecialchars($client['gender']); ?> &bull; <?php echo htmlspecialchars($client['age']); ?> Yrs
                            </span>
                        </div>

                        <!-- Demographics & Contact Bar -->
                        <div class="hero-meta-row mt-2">
                            <span><i class="fa-solid fa-cake-candles me-1"></i> DOB: <?php echo date('d M Y', strtotime($client['dob'])); ?></span>
                            <a href="tel:<?php echo htmlspecialchars($client['phone']); ?>" class="hero-phone-link">
                                <i class="fa-solid fa-phone me-1"></i> <?php echo htmlspecialchars($client['phone']); ?>
                            </a>
                            <span><i class="fa-solid fa-location-dot me-1"></i> <?php echo htmlspecialchars($client['address']); ?></span>
                        </div>

                        <!-- Emergency Contact Banner -->
                        <?php if (!empty($client['emergency_name'])): ?>
                            <div class="hero-emergency-banner mt-3">
                                <i class="fa-solid fa-phone-volume me-1"></i>
                                <strong>Emergency Contact:</strong> <?php echo htmlspecialchars($client['emergency_name']); ?> (<?php echo htmlspecialchars($client['emergency_phone']); ?>)
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Quick KPI Bento Tiles & Actions (Col-xl-5) -->
        <div class="col-12 col-xl-5">
            <div class="row g-3 h-100">
                <!-- Tile 1: Total Encounters -->
                <div class="col-6">
                    <div class="dossier-kpi-card card-kpi-blue">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="kpi-tag">Clinical Visits</span>
                            <i class="fa-solid fa-stethoscope kpi-icon"></i>
                        </div>
                        <div class="kpi-number"><?php echo count($visits); ?></div>
                        <small class="kpi-subtext">Lifetime encounters</small>
                    </div>
                </div>

                <!-- Tile 2: Outstanding Balance -->
                <div class="col-6">
                    <?php 
                    $totalBalance = 0;
                    foreach ($invoices as $inv) {
                        $totalBalance += (float)($inv['balance'] ?? 0);
                    }
                    ?>
                    <div class="dossier-kpi-card <?php echo $totalBalance > 0 ? 'card-kpi-rose' : 'card-kpi-emerald'; ?>">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="kpi-tag">Balance Due</span>
                            <i class="fa-solid fa-wallet kpi-icon"></i>
                        </div>
                        <div class="kpi-number font-mono"><?php echo DEFAULT_CURRENCY . number_format($totalBalance, 2); ?></div>
                        <small class="kpi-subtext"><?php echo count($invoices); ?> Statements</small>
                    </div>
                </div>

                <!-- Action Launchpad Row -->
                <div class="col-12">
                    <div class="quick-action-strip">
                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom py-2 px-3 justify-content-center shadow-sm flex-grow-1">
                            <i class="fa-solid fa-plus me-1"></i> Log Visit
                        </a>
                        <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom py-2 px-3 justify-content-center flex-grow-1">
                            <i class="fa-solid fa-file-invoice-dollar text-warning me-1"></i> Invoice
                        </a>
                        <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom py-2 px-3 justify-content-center flex-grow-1">
                            <i class="fa-solid fa-calendar-plus text-info me-1"></i> Book
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- 3. Tabbed Medical Workspace -->
    <div class="neat-card p-0 overflow-hidden shadow-sm">
        
        <!-- Segmented Tab Header Bar -->
        <div class="d-flex justify-content-between align-items-center p-3 px-4 border-bottom bg-slate-header no-print">
            <div class="workspace-tabs-wrapper">
                <ul class="nav nav-pills" id="dossierTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-visits-btn" data-bs-toggle="pill" data-bs-target="#tab-visits" type="button" role="tab">
                            <i class="fa-solid fa-stethoscope me-1"></i> Clinical Encounters (<?php echo count($visits); ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-billing-btn" data-bs-toggle="pill" data-bs-target="#tab-billing" type="button" role="tab">
                            <i class="fa-solid fa-file-invoice-dollar me-1"></i> Invoices & Billing (<?php echo count($invoices); ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-appts-btn" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab">
                            <i class="fa-solid fa-calendar-check me-1"></i> Appointments (<?php echo count($appointments); ?>)
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab Panes Content -->
        <div class="tab-content p-4" id="dossierTabsContent">

            <!-- TAB 1: Clinical Encounters -->
            <div class="tab-pane fade show active" id="tab-visits" role="tabpanel">
                <?php if (empty($visits)): ?>
                    <div class="empty-state-workspace py-5 text-center">
                        <div class="empty-icon-circle mx-auto mb-3">
                            <i class="fa-solid fa-notes-medical"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">No Clinical Encounters Logged</h5>
                        <p class="text-muted small mb-4">There are no domiciliary medical visits or consultations recorded for this patient yet.</p>
                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom py-2 px-4 shadow-sm">
                            <i class="fa-solid fa-plus me-1"></i> Record First Clinical Encounter
                        </a>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-column gap-3">
                        <?php foreach ($visits as $v): ?>
                            <div class="encounter-record-card">
                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                            <h6 class="fw-bold text-dark mb-0" style="font-size: 0.98rem;">
                                                Encounter on <?php echo date('d F Y \a\t g:i A', strtotime($v['visit_date'])); ?>
                                            </h6>
                                            <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.68rem;">
                                                <i class="fa-solid fa-circle-check me-1"></i> Completed
                                            </span>
                                        </div>
                                        <small class="text-muted">
                                            Attended by: <strong class="text-dark"><?php echo htmlspecialchars($v['staff_name']); ?></strong>
                                        </small>
                                    </div>
                                    <button onclick="window.print()" class="btn-secondary-custom btn-sm py-1 px-3 no-print" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-print me-1"></i> Print Rx
                                    </button>
                                </div>

                                <!-- Vitals Metric Bento Grid -->
                                <div class="row g-2 mb-3">
                                    <div class="col-6 col-md-3">
                                        <div class="vitals-metric-pill">
                                            <span class="vitals-label">Temperature</span>
                                            <strong class="vitals-value"><?php echo $v['temperature'] ? htmlspecialchars($v['temperature']) . ' °C' : 'N/A'; ?></strong>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="vitals-metric-pill">
                                            <span class="vitals-label">Blood Pressure</span>
                                            <strong class="vitals-value"><?php echo $v['bp'] ? htmlspecialchars($v['bp']) . ' mmHg' : 'N/A'; ?></strong>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="vitals-metric-pill">
                                            <span class="vitals-label">Body Weight</span>
                                            <strong class="vitals-value"><?php echo $v['weight'] ? htmlspecialchars($v['weight']) . ' kg' : 'N/A'; ?></strong>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="vitals-metric-pill">
                                            <span class="vitals-label">Clinical Status</span>
                                            <strong class="vitals-value text-success"><?php echo $v['diagnosis'] ? 'Diagnosed' : 'Pending'; ?></strong>
                                        </div>
                                    </div>
                                </div>

                                <!-- Clinical Sections -->
                                <div class="row g-3" style="font-size: 0.8125rem;">
                                    <div class="col-12 col-md-6">
                                        <span class="d-block text-uppercase fw-bold text-muted mb-1" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                            Chief Complaint
                                        </span>
                                        <div class="clinical-note-box">
                                            <?php echo nl2br(htmlspecialchars($v['complaint'])); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span class="d-block text-uppercase fw-bold text-muted mb-1" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                            Physical Findings & Symptoms
                                        </span>
                                        <div class="clinical-note-box text-secondary">
                                            <?php echo $v['symptoms'] ? nl2br(htmlspecialchars($v['symptoms'])) : 'None recorded'; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span class="d-block text-uppercase fw-bold text-primary mb-1" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                            Clinical Diagnosis
                                        </span>
                                        <div class="clinical-diagnosis-box">
                                            <?php echo $v['diagnosis'] ? nl2br(htmlspecialchars($v['diagnosis'])) : 'Pending Assessment'; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span class="d-block text-uppercase fw-bold text-muted mb-1" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                            Care & Treatment Plan
                                        </span>
                                        <div class="clinical-note-box text-secondary">
                                            <?php echo $v['treatment'] ? nl2br(htmlspecialchars($v['treatment'])) : 'None recorded'; ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="d-block text-uppercase fw-bold text-success mb-1" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                            <i class="fa-solid fa-prescription me-1"></i> Prescription & Medication Schedule
                                        </span>
                                        <div class="prescription-box">
                                            <?php echo $v['prescription'] ? nl2br(htmlspecialchars($v['prescription'])) : 'No medication prescribed for this visit'; ?>
                                        </div>
                                    </div>

                                    <?php if (!empty($v['services_rendered'])): ?>
                                        <div class="col-12">
                                            <span class="d-block text-uppercase fw-bold text-muted mb-2" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                                Procedures Performed
                                            </span>
                                            <div class="d-flex flex-wrap gap-1">
                                                <?php 
                                                $rendered = is_string($v['services_rendered']) ? json_decode($v['services_rendered'], true) : $v['services_rendered'];
                                                if (is_array($rendered)):
                                                    foreach ($rendered as $s):
                                                ?>
                                                    <span class="badge-pill-custom badge-zinc" style="font-size: 0.72rem;">
                                                        <i class="fa-solid fa-check text-primary me-1"></i> <?php echo htmlspecialchars($s); ?>
                                                    </span>
                                                <?php endforeach; endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- TAB 2: Invoices & Billing -->
            <div class="tab-pane fade" id="tab-billing" role="tabpanel">
                <?php if (empty($invoices)): ?>
                    <div class="empty-state-workspace py-5 text-center">
                        <div class="empty-icon-circle mx-auto mb-3" style="background: rgba(22, 163, 74, 0.1); color: #16a34a;">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">No Billing Statements Generated</h5>
                        <p class="text-muted small mb-4">No medical invoices generated for clinical consultations or treatments yet.</p>
                        <a href="<?php echo APP_URL; ?>/billing/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom py-2 px-4 shadow-sm">
                            <i class="fa-solid fa-plus me-1"></i> Generate First Invoice
                        </a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="ui-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Date</th>
                                    <th>Total Billed</th>
                                    <th>Amount Paid</th>
                                    <th>Balance Due</th>
                                    <th>Status</th>
                                    <th class="text-end no-print">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoices as $inv): ?>
                                    <tr>
                                        <td><strong class="text-dark font-mono"><?php echo htmlspecialchars($inv['invoice_number']); ?></strong></td>
                                        <td><span class="text-secondary"><?php echo date('d/m/Y', strtotime($inv['invoice_date'])); ?></span></td>
                                        <td><strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($inv['total_amount'], 2); ?></strong></td>
                                        <td><strong class="text-success font-mono"><?php echo DEFAULT_CURRENCY . number_format($inv['amount_paid'], 2); ?></strong></td>
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
                                            <div class="d-inline-flex align-items-center gap-1">
                                                <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $inv['invoice_number']; ?>" class="btn-secondary-custom btn-sm py-1 px-2" style="font-size: 0.75rem;">
                                                    View
                                                </a>
                                                <?php if ($inv['balance'] > 0): ?>
                                                    <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $inv['invoice_number']; ?>" class="btn-primary-custom btn-sm py-1 px-2" style="font-size: 0.75rem;">
                                                        Pay
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <!-- TAB 3: Appointments -->
            <div class="tab-pane fade" id="tab-appointments" role="tabpanel">
                <?php if (empty($appointments)): ?>
                    <div class="empty-state-workspace py-5 text-center">
                        <div class="empty-icon-circle mx-auto mb-3" style="background: rgba(2, 132, 199, 0.1); color: #0284c7;">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">No Scheduled Appointments</h5>
                        <p class="text-muted small mb-4">No upcoming home care visits or consultations scheduled for this patient.</p>
                        <a href="<?php echo APP_URL; ?>/appointments/create?client_id=<?php echo $client['client_id']; ?>" class="btn-primary-custom py-2 px-4 shadow-sm">
                            <i class="fa-solid fa-plus me-1"></i> Schedule Home Visit
                        </a>
                    </div>
                <?php else: ?>
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
                                <?php foreach ($appointments as $a): ?>
                                    <tr>
                                        <td>
                                            <strong class="text-dark d-block"><?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?></strong>
                                            <small class="text-muted font-mono"><i class="fa-regular fa-clock text-primary me-1"></i><?php echo date('g:i A', strtotime($a['appointment_time'])); ?></small>
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
                                                <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Completed" class="btn-secondary-custom btn-sm text-success py-1 px-2" style="font-size: 0.75rem;">
                                                    <i class="fa-solid fa-check me-1"></i> Mark Done
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div>

<style>
/* Creative Patient Medical Dossier Architecture */
.creative-dossier-wrapper {
    max-width: 100%;
}

.btn-back-pill {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    color: var(--text-secondary);
    font-size: 0.8125rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    transition: all 0.15s ease;
    box-shadow: var(--shadow-subtle);
}

.btn-back-pill:hover {
    background-color: #f8fafc;
    color: var(--accent-main);
    border-color: var(--accent-border);
}

/* Hero Identity Card (Vibrant Royal Blue Gradient) */
.hero-patient-card {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 55%, #3b82f6 100%);
    border-radius: var(--radius-lg);
    padding: 24px;
    color: #ffffff;
    box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.35);
    height: 100%;
    position: relative;
    overflow: hidden;
}

.hero-patient-card::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 60%);
    pointer-events: none;
}

.hero-avatar {
    width: 68px;
    height: 68px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(8px);
    border: 2px solid rgba(255, 255, 255, 0.4);
    color: #ffffff;
    font-weight: 800;
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
}

.hero-patient-name {
    font-size: 1.4rem;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.02em;
}

.hero-badge-id {
    background: rgba(255, 255, 255, 0.22);
    border: 1px solid rgba(255, 255, 255, 0.35);
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 20px;
}

.hero-badge-gender {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 20px;
}

.hero-meta-row {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    font-size: 0.8125rem;
    color: rgba(255, 255, 255, 0.9);
}

.hero-phone-link {
    color: #ffffff;
    text-decoration: none;
    font-family: 'JetBrains Mono', monospace;
    font-weight: 600;
}

.hero-phone-link:hover {
    color: #dbeafe;
    text-decoration: underline;
}

.hero-emergency-banner {
    background: rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    padding: 6px 12px;
    font-size: 0.75rem;
    color: #fef08a;
    display: inline-flex;
    align-items: center;
}

/* Dossier KPI Cards */
.dossier-kpi-card {
    border-radius: var(--radius-md);
    padding: 16px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.2s ease;
}

.dossier-kpi-card:hover {
    transform: translateY(-2px);
}

.card-kpi-blue {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
}

.card-kpi-emerald {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #15803d;
}

.card-kpi-rose {
    background-color: #fff1f2;
    border: 1px solid #fecdd3;
    color: #e11d48;
}

.kpi-tag {
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.kpi-icon {
    font-size: 1rem;
    opacity: 0.8;
}

.kpi-number {
    font-size: 1.45rem;
    font-weight: 800;
    line-height: 1.1;
    margin: 4px 0 2px 0;
}

.kpi-subtext {
    font-size: 0.7rem;
    opacity: 0.85;
}

.quick-action-strip {
    display: flex;
    gap: 8px;
}

/* Workspace Segmented Tabs */
.workspace-tabs-wrapper {
    background-color: #f1f5f9;
    border-radius: 8px;
    padding: 3px;
    border: 1px solid var(--border-subtle);
    display: inline-block;
}

.workspace-tabs-wrapper .nav-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 2px;
}

.workspace-tabs-wrapper .nav-link {
    font-size: 0.78rem;
    font-weight: 700;
    padding: 6px 14px;
    border-radius: 6px;
    color: var(--text-secondary);
    background: transparent;
    border: none;
    white-space: nowrap;
    transition: all 0.12s ease;
}

.workspace-tabs-wrapper .nav-link.active {
    background-color: #ffffff;
    color: var(--accent-main);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
}

/* Empty State */
.empty-state-workspace {
    padding: 40px 20px;
}

.empty-icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(37, 99, 235, 0.1);
    color: #2563eb;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.encounter-record-card {
    border: 1px solid var(--border-subtle);
    border-radius: 12px;
    padding: 18px;
    background-color: #ffffff;
    transition: all 0.15s ease;
}

.encounter-record-card:hover {
    border-color: var(--border-strong);
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
}

.vitals-metric-pill {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 8px;
    padding: 8px 12px;
}

.vitals-label {
    display: block;
    font-size: 0.68rem;
    color: var(--text-muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.vitals-value {
    font-size: 0.88rem;
    color: var(--text-primary);
    display: block;
    margin-top: 2px;
}

.clinical-note-box {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 8px;
    padding: 10px 14px;
    color: var(--text-primary);
    min-height: 44px;
}

.clinical-diagnosis-box {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    padding: 10px 14px;
    color: #1d4ed8;
    font-weight: 600;
    min-height: 44px;
}

.prescription-box {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 8px;
    padding: 10px 14px;
    color: #15803d;
    font-weight: 600;
    min-height: 44px;
}
</style>