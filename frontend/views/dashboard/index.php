    <!-- 1. Executive Top Header Layout (Compact & Aligned) -->
    <div class="header-command-bar mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <div class="header-info">
                <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                    <h2 class="header-title mb-0">Clinical Operations</h2>
                    <span class="live-status-pill">
                        <span class="live-dot-pulse"></span>
                        Live Active
                    </span>
                    <span class="date-badge">
                        <i class="fa-regular fa-calendar text-primary me-1"></i><?php echo date('D, d M Y'); ?>
                    </span>
                </div>
                <p class="header-subtitle mb-0">
                    Welcome, <strong class="text-dark"><?php 
                        $docName = $currentUserName ?? 'Dr. I.K Holiness';
                        if (!str_starts_with(strtolower($docName), 'dr.') && !str_starts_with(strtolower($docName), 'dr ')) {
                            $docName = 'Dr. ' . $docName;
                        }
                        echo htmlspecialchars($docName); 
                    ?></strong> &bull; Pankrono Domiciliary Healthcare &bull; Kumasi
                </p>
            </div>

            <!-- Sleek Unified Action Toolbar (Compact & No-Wrap) -->
            <div class="header-actions">
                <a href="<?php echo APP_URL; ?>/visits/create" class="btn-action-primary">
                    <i class="fa-solid fa-stethoscope"></i>
                    <span>Log Visit</span>
                </a>
                <div class="btn-group-custom">
                    <a href="<?php echo APP_URL; ?>/clients/create" class="btn-action-secondary" title="Add Patient">
                        <i class="fa-solid fa-user-plus text-primary"></i>
                        <span class="d-none d-sm-inline">Patient</span>
                    </a>
                    <a href="<?php echo APP_URL; ?>/billing/create" class="btn-action-secondary" title="Create Invoice">
                        <i class="fa-solid fa-file-invoice-dollar text-warning"></i>
                        <span class="d-none d-sm-inline">Invoice</span>
                    </a>
                    <a href="<?php echo APP_URL; ?>/appointments/create" class="btn-action-secondary" title="Book Visit">
                        <i class="fa-solid fa-calendar-plus text-info"></i>
                        <span class="d-none d-sm-inline">Book</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. 4 HERO STAT CARDS WITH 4 DISTINCT VIBRANT LUXURY COLORS -->
    <div class="row g-3 g-xl-4 mb-4">
        
        <!-- CARD 1: Registered Patients (Vibrant Royal Blue) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vibrant-stat-card card-gradient-blue">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="vibrant-label">Registered Patients</span>
                        <div class="vibrant-value"><?php echo number_format($totalClients); ?></div>
                    </div>
                    <div class="vibrant-icon-box">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="vibrant-footer">
                    <span class="vibrant-subtext">
                        <i class="fa-solid fa-id-card-clip"></i>
                        <span>Permanent Patient Dossiers</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- CARD 2: Today's Encounters (Vibrant Royal Purple) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vibrant-stat-card card-gradient-purple">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="vibrant-label">Today's Visits</span>
                        <div class="vibrant-value"><?php echo number_format($todayVisits); ?></div>
                    </div>
                    <div class="vibrant-icon-box">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                </div>
                <div class="vibrant-footer">
                    <span class="vibrant-subtext">
                        <i class="fa-solid fa-house-medical"></i>
                        <span>Home Visits Scheduled</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- CARD 3: Today's Collections (Vibrant Emerald Green) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vibrant-stat-card card-gradient-emerald">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="vibrant-label">Today's Cleared Revenue</span>
                        <div class="vibrant-value font-mono">
                            <?php echo DEFAULT_CURRENCY . number_format($todayPayments, 2); ?>
                        </div>
                    </div>
                    <div class="vibrant-icon-box">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>
                <div class="vibrant-footer">
                    <span class="vibrant-subtext">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>MoMo & Cash Settled</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- CARD 4: Outstanding Receivables (Vibrant Crimson Rose) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vibrant-stat-card card-gradient-rose">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="vibrant-label">Outstanding Balances</span>
                        <div class="vibrant-value font-mono">
                            <?php echo DEFAULT_CURRENCY . number_format($outstandingBalances, 2); ?>
                        </div>
                    </div>
                    <div class="vibrant-icon-box">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                </div>
                <div class="vibrant-footer">
                    <span class="vibrant-subtext">
                        <i class="fa-solid <?php echo $outstandingBalances > 0 ? 'fa-triangle-exclamation' : 'fa-check-double'; ?>"></i>
                        <span><?php echo $outstandingBalances > 0 ? 'Pending Invoices' : 'Zero Overdue Balance'; ?></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Analytics Charts (Clinical Volume + Settlement Donut) -->
    <div class="row g-3 g-xl-4 mb-4">
        <!-- 7-Day Encounters Volume Trend -->
        <div class="col-12 col-xl-8">
            <div class="neat-card h-100 p-4">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 mb-3 pb-2 border-bottom">
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">
                            <i class="fa-solid fa-chart-line text-primary me-2"></i>Clinical Encounters & Patient Registrations
                        </h6>
                        <small class="text-muted">7-day volume tracking of home visits vs new patient enrollments</small>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="badge-pill-custom badge-sky fw-bold" style="font-size: 0.72rem;">
                            <i class="fa-solid fa-circle text-primary" style="font-size: 0.5rem;"></i> Clinical Visits
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

        <!-- Financial Breakdown Donut -->
        <div class="col-12 col-xl-4">
            <div class="neat-card h-100 d-flex flex-column justify-content-between p-4">
                <div class="mb-2 pb-2 border-bottom">
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-chart-pie text-primary me-2"></i>Invoice Settlement Ratio
                    </h6>
                    <small class="text-muted">Paid, Partially Settled, and Unpaid statements</small>
                </div>

                <div style="position: relative; height: 180px; width: 100%;" class="my-auto">
                    <canvas id="invoiceDonutChart"></canvas>
                </div>

                <!-- Financial Metric Progress Rows -->
                <div class="pt-3 border-top mt-2" style="font-size: 0.78rem;">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="text-secondary"><i class="fa-solid fa-circle text-success me-1" style="font-size: 0.55rem;"></i> Fully Paid Invoices:</span>
                        <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Paid'] ?? 0; ?></strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="text-secondary"><i class="fa-solid fa-circle text-warning me-1" style="font-size: 0.55rem;"></i> Partially Settled:</span>
                        <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Partially Paid'] ?? 0; ?></strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-secondary"><i class="fa-solid fa-circle text-danger me-1" style="font-size: 0.55rem;"></i> Unpaid / Overdue:</span>
                        <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Unpaid'] ?? 0; ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Neat, Well-Designed Medical Tables (Left: Scheduled Encounters, Right: Activity Feed) -->
    <div class="row g-3 g-xl-4">
        
        <!-- LEFT: Upcoming Scheduled Visits Table -->
        <div class="col-12 col-xl-7">
            <div class="neat-card h-100 p-0 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center p-3 px-4 border-bottom bg-slate-header">
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon-sq bg-blue-subtle text-primary">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Upcoming Scheduled Encounters</h6>
                            <small class="text-muted">Doctor's pending clinical home visits & consultations</small>
                        </div>
                    </div>
                    <a href="<?php echo APP_URL; ?>/appointments" class="btn-secondary-custom btn-sm py-1 px-3" style="font-size: 0.75rem;">
                        <i class="fa-regular fa-calendar me-1"></i> Full Calendar
                    </a>
                </div>

                <div class="p-3">
                    <?php if (empty($upcomingAppointments)): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="fa-regular fa-calendar-check fs-2 mb-2 d-block text-muted"></i>
                            <p class="mb-0 fw-medium">No pending visits scheduled for today.</p>
                            <small class="text-muted">Click "+ Book Visit" to schedule an appointment.</small>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-column gap-3">
                            <?php foreach ($upcomingAppointments as $appt): ?>
                                <div class="appt-schedule-card">
                                    <!-- 1. Left: Time Box -->
                                    <div class="appt-time-box">
                                        <div class="appt-time-value"><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></div>
                                        <div class="appt-date-value"><?php echo date('d M Y', strtotime($appt['appointment_date'])); ?></div>
                                    </div>

                                    <!-- 2. Middle: Patient & Clinical Reason -->
                                    <div class="appt-details-wrap flex-grow-1 min-w-0">
                                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                            <div class="avatar-circle-blue-sm">
                                                <?php echo strtoupper(substr($appt['full_name'] ?? 'P', 0, 2)); ?>
                                            </div>
                                            <strong class="text-dark appt-patient-name text-truncate">
                                                <?php echo htmlspecialchars($appt['full_name']); ?>
                                            </strong>
                                            <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.65rem; padding: 1px 6px;">
                                                <?php echo htmlspecialchars($appt['client_id']); ?>
                                            </span>
                                        </div>
                                        <div class="appt-care-reason text-truncate">
                                            <i class="fa-solid fa-notes-medical text-primary me-1"></i>
                                            <?php echo htmlspecialchars($appt['reason']); ?>
                                        </div>
                                    </div>

                                    <!-- 3. Right: Action -->
                                    <div class="appt-action-box flex-shrink-0">
                                        <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo urlencode($appt['client_id']); ?>" 
                                           class="btn-primary-custom py-2 px-3 shadow-sm" style="font-size: 0.8125rem;">
                                            <i class="fa-solid fa-play me-1"></i> Start Visit
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- RIGHT: Live Activity & Recent Transactions Stream -->
        <div class="col-12 col-xl-5">
            <div class="neat-card h-100 p-0 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center p-3 px-4 border-bottom bg-slate-header">
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon-sq bg-emerald-subtle text-success">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Activity Stream</h6>
                            <small class="text-muted">Recent registrations & receipts</small>
                        </div>
                    </div>
                    
                    <!-- Horizontal Segmented Tabs (Never Stacks) -->
                    <div class="stream-segmented-pill">
                        <ul class="nav nav-pills" id="streamTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="stream-patients-btn" data-bs-toggle="pill" data-bs-target="#stream-patients" type="button" role="tab">
                                    Patients (<?php echo count($recentClients); ?>)
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="stream-receipts-btn" data-bs-toggle="pill" data-bs-target="#stream-receipts" type="button" role="tab">
                                    Receipts (<?php echo count($recentPayments); ?>)
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content" id="streamTabsContent">
                    <!-- STREAM TAB 1: Patients List -->
                    <div class="tab-pane fade show active" id="stream-patients" role="tabpanel">
                        <?php if (empty($recentClients)): ?>
                            <div class="text-center py-5 text-muted">
                                <i class="fa-solid fa-user-group fs-2 mb-2 d-block text-muted"></i>
                                <p class="mb-0 fw-medium">No patient files registered yet.</p>
                            </div>
                        <?php else: ?>
                            <div class="stream-list-container">
                                <?php foreach ($recentClients as $rc): ?>
                                    <div class="stream-row-item">
                                        <div class="d-flex align-items-center gap-3 min-w-0">
                                            <div class="avatar-circle-sm-blue flex-shrink-0">
                                                <?php echo strtoupper(substr($rc['full_name'], 0, 2)); ?>
                                            </div>
                                            <div class="text-truncate">
                                                <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                                    <strong class="text-dark stream-name text-truncate">
                                                        <?php echo htmlspecialchars($rc['full_name']); ?>
                                                    </strong>
                                                    <span class="badge-pill-custom badge-zinc py-0 px-2" style="font-size: 0.65rem;">
                                                        <?php echo htmlspecialchars($rc['gender']); ?>
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center gap-2 text-muted small font-mono" style="font-size: 0.75rem;">
                                                    <a href="tel:<?php echo htmlspecialchars($rc['phone']); ?>" class="text-secondary text-decoration-none hover-primary">
                                                        <i class="fa-solid fa-phone text-primary me-1"></i><?php echo htmlspecialchars($rc['phone']); ?>
                                                    </a>
                                                    <span>&bull;</span>
                                                    <span><?php echo htmlspecialchars($rc['client_id']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $rc['client_id']; ?>" 
                                           class="btn-secondary-custom btn-sm py-1 px-3 flex-shrink-0 ms-2" style="font-size: 0.75rem;" title="View Dossier">
                                            <i class="fa-solid fa-id-card-clip me-1"></i> Dossier
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- STREAM TAB 2: Receipts List -->
                    <div class="tab-pane fade" id="stream-receipts" role="tabpanel">
                        <?php if (empty($recentPayments)): ?>
                            <div class="text-center py-5 text-muted">
                                <i class="fa-solid fa-receipt fs-2 mb-2 d-block text-muted"></i>
                                <p class="mb-0 fw-medium">No payments received yet today.</p>
                            </div>
                        <?php else: ?>
                            <div class="stream-list-container">
                                <?php foreach ($recentPayments as $rp): ?>
                                    <div class="stream-row-item">
                                        <div class="d-flex align-items-center gap-3 min-w-0">
                                            <div class="icon-sq bg-emerald-subtle text-success flex-shrink-0">
                                                <i class="fa-solid fa-wallet"></i>
                                            </div>
                                            <div class="text-truncate">
                                                <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                                    <strong class="text-dark font-mono" style="font-size: 0.8125rem;">
                                                        <?php echo htmlspecialchars($rp['receipt_number']); ?>
                                                    </strong>
                                                    <span class="badge-pill-custom badge-zinc py-0 px-2" style="font-size: 0.65rem;">
                                                        <?php echo htmlspecialchars($rp['payment_method']); ?>
                                                    </span>
                                                </div>
                                                <div class="text-secondary small text-truncate" style="font-size: 0.78rem;">
                                                    <?php echo htmlspecialchars($rp['client_name']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end flex-shrink-0 ms-2">
                                            <strong class="font-mono text-success fw-bold d-block" style="font-size: 0.92rem;">
                                                <?php echo DEFAULT_CURRENCY . number_format($rp['amount_paid'], 2); ?>
                                            </strong>
                                            <small class="text-muted" style="font-size: 0.68rem;">Cleared</small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
/* Modern Executive Header Command Bar */
.header-command-bar {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-lg);
    padding: 16px 20px;
    box-shadow: var(--shadow-card);
}

.header-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--text-primary);
    letter-spacing: -0.03em;
}

.header-subtitle {
    font-size: 0.8125rem;
    color: var(--text-muted);
}

.live-status-pill {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #16a34a;
    font-size: 0.68rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.live-dot-pulse {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #16a34a;
    box-shadow: 0 0 8px #16a34a;
    display: inline-block;
}

.date-badge {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    color: var(--text-secondary);
    font-size: 0.72rem;
    font-weight: 600;
    padding: 2px 10px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: nowrap;
}

.btn-action-primary {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.8125rem;
    padding: 8px 16px;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
    white-space: nowrap;
    transition: all 0.15s ease;
}

.btn-action-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
}

.btn-group-custom {
    display: inline-flex;
    border-radius: var(--radius-sm);
    box-shadow: var(--shadow-subtle);
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    overflow: hidden;
}

.btn-action-secondary {
    padding: 8px 12px;
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--text-secondary) !important;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    border-right: 1px solid var(--border-subtle);
    background-color: #ffffff;
    transition: all 0.12s ease;
    white-space: nowrap;
}

.btn-group-custom .btn-action-secondary:last-child {
    border-right: none;
}

.btn-action-secondary:hover {
    background-color: #f8fafc;
    color: var(--text-primary) !important;
}

/* Vibrant Rich Gradient Bento Cards */
.vibrant-stat-card {
    border-radius: var(--radius-lg);
    padding: 22px;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.vibrant-stat-card::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%);
    pointer-events: none;
}

.vibrant-stat-card:hover {
    transform: translateY(-3px);
}

.card-gradient-blue {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 60%, #3b82f6 100%);
    box-shadow: 0 10px 25px -4px rgba(37, 99, 235, 0.35);
}

.card-gradient-purple {
    background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 60%, #9333ea 100%);
    box-shadow: 0 10px 25px -4px rgba(124, 58, 237, 0.35);
}

.card-gradient-emerald {
    background: linear-gradient(135deg, #15803d 0%, #16a34a 60%, #22c55e 100%);
    box-shadow: 0 10px 25px -4px rgba(22, 163, 74, 0.35);
}

.card-gradient-rose {
    background: linear-gradient(135deg, #be123c 0%, #e11d48 60%, #f43f5e 100%);
    box-shadow: 0 10px 25px -4px rgba(225, 29, 72, 0.35);
}

.vibrant-label {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: rgba(255, 255, 255, 0.88);
}

.vibrant-value {
    font-size: 1.85rem;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.15;
    margin-top: 6px;
    letter-spacing: -0.03em;
}

.vibrant-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.vibrant-footer {
    display: flex;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    margin-top: 14px;
}

.vibrant-badge {
    background: rgba(255, 255, 255, 0.22);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 20px;
}

.vibrant-subtext {
    font-size: 0.76rem;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.95);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Neat White Cards & Tables */
.neat-card {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-card);
}

.bg-slate-header {
    background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
}

.icon-sq {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
}

.avatar-circle-blue {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.78rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.avatar-circle-sm-blue {
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

/* Activity Stream Segmented Pills & Rows */
.stream-segmented-pill {
    background-color: #f1f5f9;
    border-radius: 8px;
    padding: 3px;
    border: 1px solid var(--border-subtle);
}

.stream-segmented-pill .nav-pills {
    display: flex;
    flex-wrap: nowrap;
    gap: 2px;
}

.stream-segmented-pill .nav-link {
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 6px;
    color: var(--text-secondary);
    background: transparent;
    border: none;
    white-space: nowrap;
    transition: all 0.12s ease;
}

.stream-segmented-pill .nav-link.active {
    background-color: #ffffff;
    color: var(--accent-main);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
}

.stream-list-container {
    display: flex;
    flex-direction: column;
}

.stream-row-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    border-bottom: 1px solid var(--border-subtle);
    transition: background-color 0.12s ease;
}

.stream-row-item:last-child {
    border-bottom: none;
}

.stream-row-item:hover {
    background-color: #f8fafc;
}

.hover-primary:hover {
    color: var(--accent-main) !important;
}

/* Scheduled Encounters 3-Part Card */
.appt-schedule-card {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 14px 18px;
    border: 1px solid var(--border-subtle);
    border-radius: 12px;
    background-color: #ffffff;
    transition: all 0.18s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.02);
}

.appt-schedule-card:hover {
    background-color: #f8fafc;
    border-color: var(--border-strong);
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
    transform: translateY(-1px);
}

.appt-time-box {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 10px;
    padding: 8px 12px;
    text-align: center;
    min-width: 90px;
    flex-shrink: 0;
}

.appt-time-value {
    font-size: 0.88rem;
    font-weight: 800;
    color: #1d4ed8;
    line-height: 1.1;
    white-space: nowrap;
}

.appt-date-value {
    font-size: 0.68rem;
    font-weight: 600;
    color: #3b82f6;
    margin-top: 2px;
    white-space: nowrap;
}

.avatar-circle-blue-sm {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.72rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.appt-patient-name {
    font-size: 0.88rem;
    line-height: 1.2;
}

.appt-care-reason {
    font-size: 0.78rem;
    color: var(--text-secondary);
    line-height: 1.2;
    margin-top: 2px;
}
</style>

<!-- Chart.js Modern Initialization Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Chart.js: Clinical Encounters & Patient Registrations Spline Chart
    const ctxTrends = document.getElementById('clinicalTrendsChart');
    if (ctxTrends) {
        const labels = <?php echo json_encode($chartDays ?? []); ?>;
        const visitsData = <?php echo json_encode($chartVisitsData ?? []); ?>;
        const clientsData = <?php echo json_encode($chartClientsData ?? []); ?>;

        const gradientBlue = ctxTrends.getContext('2d').createLinearGradient(0, 0, 0, 240);
        gradientBlue.addColorStop(0, 'rgba(37, 99, 235, 0.22)');
        gradientBlue.addColorStop(1, 'rgba(37, 99, 235, 0.00)');

        const gradientEmerald = ctxTrends.getContext('2d').createLinearGradient(0, 0, 0, 240);
        gradientEmerald.addColorStop(0, 'rgba(22, 163, 74, 0.20)');
        gradientEmerald.addColorStop(1, 'rgba(22, 163, 74, 0.00)');

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
                        borderColor: '#16a34a',
                        backgroundColor: gradientEmerald,
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#16a34a',
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
                            color: '#f1f5f9'
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

    // 2. Chart.js: Invoice Settlement Ratio Donut Chart
    const ctxDonut = document.getElementById('invoiceDonutChart');
    if (ctxDonut) {
        const paidCount = <?php echo (int)($invoiceStatusMap['Paid'] ?? 0); ?>;
        const partialCount = <?php echo (int)($invoiceStatusMap['Partially Paid'] ?? 0); ?>;
        const unpaidCount = <?php echo (int)($invoiceStatusMap['Unpaid'] ?? 0); ?>;

        const hasData = (paidCount + partialCount + unpaidCount) > 0;
        const dataValues = hasData ? [paidCount, partialCount, unpaidCount] : [1, 0, 0];
        const dataColors = hasData ? ['#16a34a', '#d97706', '#e11d48'] : ['#e2e8f0', '#e2e8f0', '#e2e8f0'];

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
