<!-- Doctor's Modern Executive Dashboard & Analytics Command Center -->

<!-- 1. Executive Metric Summary Cards with Trend Badges -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- Total Patients -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-2">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.68rem; letter-spacing: 0.06em;">Total Patients</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1" style="font-size: 1.4rem;"><?php echo number_format($totalClients); ?></h3>
                </div>
                <div class="p-2 rounded-2 bg-blue-subtle">
                    <i class="fa-solid fa-user-group text-blue-accent" style="font-size: 1.1rem;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-emerald"><i class="fa-solid fa-arrow-trend-up"></i> Active Registry</span>
                <span class="text-muted" style="font-size: 0.72rem;">Permanent files</span>
            </div>
        </div>
    </div>

    <!-- Today's Visits / Encounters -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-2">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.68rem; letter-spacing: 0.06em;">Today's Encounters</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1" style="font-size: 1.4rem;"><?php echo number_format($todayVisits); ?></h3>
                </div>
                <div class="p-2 rounded-2" style="background-color: var(--info-bg); border: 1px solid var(--info-border);">
                    <i class="fa-solid fa-stethoscope" style="color: var(--info); font-size: 1.1rem;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-sky"><i class="fa-solid fa-clock"></i> Today's Consults</span>
                <span class="text-muted" style="font-size: 0.72rem;">Home visits</span>
            </div>
        </div>
    </div>

    <!-- Today's Collections -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-2">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.68rem; letter-spacing: 0.06em;">Today's Collections</span>
                    <h3 class="fw-bold mb-0 mt-1 font-mono" style="font-size: 1.3rem; color: var(--success);">
                        <?php echo DEFAULT_CURRENCY . number_format($todayPayments, 2); ?>
                    </h3>
                </div>
                <div class="p-2 rounded-2" style="background-color: var(--success-bg); border: 1px solid var(--success-border);">
                    <i class="fa-solid fa-cash-register" style="color: var(--success); font-size: 1.1rem;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-emerald"><i class="fa-solid fa-circle-check"></i> Cleared</span>
                <span class="text-muted" style="font-size: 0.72rem;">MoMo & Cash</span>
            </div>
        </div>
    </div>

    <!-- Outstanding Balances -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="ui-card ui-card-interactive h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-start justify-content-between mb-2">
                <div>
                    <span class="text-uppercase fw-bold text-muted" style="font-size: 0.68rem; letter-spacing: 0.06em;">Outstanding Balances</span>
                    <h3 class="fw-bold mb-0 mt-1 font-mono" style="font-size: 1.3rem; color: var(--danger);">
                        <?php echo DEFAULT_CURRENCY . number_format($outstandingBalances, 2); ?>
                    </h3>
                </div>
                <div class="p-2 rounded-2" style="background-color: var(--danger-bg); border: 1px solid var(--danger-border);">
                    <i class="fa-solid fa-file-invoice-dollar" style="color: var(--danger); font-size: 1.1rem;"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                <span class="badge-pill-custom badge-rose"><i class="fa-solid fa-circle-exclamation"></i> Receivables</span>
                <span class="text-muted" style="font-size: 0.72rem;">Pending settlement</span>
            </div>
        </div>
    </div>
</div>

<!-- 2. Interactive Modern Medical Analytics Charts -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- Chart 1: 7-Day Encounters & Patient Registrations Activity Trend -->
    <div class="col-12 col-xl-8">
        <div class="ui-card h-100">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 mb-3 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-chart-line text-blue-accent me-1"></i> Clinical Encounters & Patient Growth Trend</h6>
                    <small class="text-muted">Daily volume of clinical visits vs new client registrations (Last 7 Days)</small>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <span class="badge-pill-custom bg-blue-subtle text-blue-accent fw-bold" style="font-size: 0.7rem;">
                        <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i> Visits
                    </span>
                    <span class="badge-pill-custom badge-zinc fw-bold" style="font-size: 0.7rem;">
                        <i class="fa-solid fa-circle" style="font-size: 0.5rem; color: #10b981;"></i> New Patients
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
        <div class="ui-card h-100 d-flex flex-column justify-content-between">
            <div class="mb-2 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-chart-pie text-blue-accent me-1"></i> Invoice Settlement Ratio</h6>
                <small class="text-muted">Distribution of Paid, Partially Paid, and Unpaid statements</small>
            </div>

            <div style="position: relative; height: 190px; width: 100%;" class="my-auto">
                <canvas id="invoiceDonutChart"></canvas>
            </div>

            <div class="pt-2 border-top mt-2" style="border-color: var(--border-subtle) !important; font-size: 0.75rem;">
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-muted"><i class="fa-solid fa-circle text-success me-1" style="font-size: 0.6rem;"></i> Fully Paid Invoices:</span>
                    <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Paid'] ?? 0; ?></strong>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-muted"><i class="fa-solid fa-circle text-warning me-1" style="font-size: 0.6rem;"></i> Partially Settled:</span>
                    <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Partially Paid'] ?? 0; ?></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted"><i class="fa-solid fa-circle text-danger me-1" style="font-size: 0.6rem;"></i> Unpaid / Overdue:</span>
                    <strong class="text-dark font-mono"><?php echo $invoiceStatusMap['Unpaid'] ?? 0; ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Quick Action Command Toolbar -->
<div class="row g-2 mb-4">
    <div class="col-6 col-md-3">
        <a href="<?php echo APP_URL; ?>/clients" class="ui-card ui-card-interactive text-decoration-none p-3 d-flex align-items-center gap-3">
            <div class="p-2 rounded-2 bg-blue-subtle">
                <i class="fa-solid fa-stethoscope text-blue-accent"></i>
            </div>
            <div>
                <strong class="text-dark d-block" style="font-size: 0.8125rem;">Record Encounter</strong>
                <small class="text-muted">Log vitals & care</small>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="<?php echo APP_URL; ?>/clients/create" class="ui-card ui-card-interactive text-decoration-none p-3 d-flex align-items-center gap-3">
            <div class="p-2 rounded-2" style="background-color: var(--success-bg); border: 1px solid var(--success-border);">
                <i class="fa-solid fa-user-plus" style="color: var(--success);"></i>
            </div>
            <div>
                <strong class="text-dark d-block" style="font-size: 0.8125rem;">New Patient</strong>
                <small class="text-muted">Register file</small>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="<?php echo APP_URL; ?>/billing/create" class="ui-card ui-card-interactive text-decoration-none p-3 d-flex align-items-center gap-3">
            <div class="p-2 rounded-2" style="background-color: var(--warning-bg); border: 1px solid var(--warning-border);">
                <i class="fa-solid fa-file-invoice-dollar" style="color: var(--warning);"></i>
            </div>
            <div>
                <strong class="text-dark d-block" style="font-size: 0.8125rem;">Create Invoice</strong>
                <small class="text-muted">Bill procedures</small>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="<?php echo APP_URL; ?>/appointments/create" class="ui-card ui-card-interactive text-decoration-none p-3 d-flex align-items-center gap-3">
            <div class="p-2 rounded-2" style="background-color: var(--info-bg); border: 1px solid var(--info-border);">
                <i class="fa-solid fa-calendar-plus" style="color: var(--info);"></i>
            </div>
            <div>
                <strong class="text-dark d-block" style="font-size: 0.8125rem;">Book Visit</strong>
                <small class="text-muted">Schedule appointment</small>
            </div>
        </a>
    </div>
</div>

<!-- 4. Second Row: Upcoming Appointments & Recent Patient Registrations -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- Upcoming Appointments -->
    <div class="col-12 col-xl-7">
        <div class="ui-card h-100 p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-calendar-check text-blue-accent me-1"></i> Upcoming Appointments</h6>
                    <small class="text-muted">Doctor's scheduled home visits</small>
                </div>
                <a href="<?php echo APP_URL; ?>/appointments" class="btn-secondary-custom btn-sm py-1 px-2">View Schedule</a>
            </div>

            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>Patient Name & ID</th>
                            <th>Date & Time</th>
                            <th>Care Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($upcomingAppointments)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted small">
                                    <i class="fa-regular fa-calendar-check fs-4 mb-1 d-block text-muted"></i>
                                    No pending appointments scheduled for today.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($upcomingAppointments as $appt): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-box" style="width: 28px; height: 28px; font-size: 0.7rem;">
                                                <?php echo strtoupper(substr($appt['full_name'] ?? 'P', 0, 2)); ?>
                                            </div>
                                            <div>
                                                <strong class="text-dark d-block" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($appt['full_name']); ?></strong>
                                                <span class="text-muted font-mono" style="font-size: 0.7rem;"><?php echo htmlspecialchars($appt['client_id']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-dark fw-medium"><?php echo date('d/m/Y', strtotime($appt['appointment_date'])); ?></div>
                                        <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></small>
                                    </td>
                                    <td>
                                        <span class="text-secondary"><?php echo htmlspecialchars($appt['reason']); ?></span>
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
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-user-plus text-blue-accent me-1"></i> New Patients</h6>
                    <small class="text-muted">Recently enrolled directory</small>
                </div>
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom btn-sm py-1 px-2">Full Directory</a>
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
                                            <div class="avatar-box" style="width: 28px; height: 28px; font-size: 0.7rem;">
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
                                        <div class="text-dark" style="font-size: 0.78rem;"><i class="fa-solid fa-phone text-muted me-1"></i><?php echo htmlspecialchars($rc['phone']); ?></div>
                                        <small class="text-muted"><?php echo htmlspecialchars($rc['gender']); ?></small>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $rc['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2" title="View Patient Profile">
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

<!-- 5. Third Row: Recent Clinical Encounters & Recent Financial Collections -->
<div class="row g-3 g-xl-4">
    <!-- Recent Clinical Encounters -->
    <div class="col-12 col-xl-7">
        <div class="ui-card h-100 p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-stethoscope text-blue-accent me-1"></i> Clinical Encounters Feed</h6>
                    <small class="text-muted">Recent diagnoses, vitals, and home visits</small>
                </div>
                <a href="<?php echo APP_URL; ?>/visits" class="btn-secondary-custom btn-sm py-1 px-2">All Encounters</a>
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
                                        <div class="text-dark fw-medium"><?php echo date('d/m/Y', strtotime($rv['visit_date'])); ?></div>
                                        <small class="text-muted"><?php echo date('H:i A', strtotime($rv['visit_date'])); ?></small>
                                    </td>
                                    <td>
                                        <strong class="text-dark d-block" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($rv['client_name']); ?></strong>
                                        <small class="text-muted font-mono"><?php echo htmlspecialchars($rv['client_id']); ?></small>
                                    </td>
                                    <td>
                                        <span class="text-secondary" style="font-size: 0.8rem;">
                                            <?php echo htmlspecialchars(substr($rv['complaint'], 0, 35)) . (strlen($rv['complaint']) > 35 ? '...' : ''); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge-pill-custom badge-emerald">
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

    <!-- Recent Financial Collections -->
    <div class="col-12 col-xl-5">
        <div class="ui-card h-100 p-0 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-receipt text-blue-accent me-1"></i> Recent Receipts</h6>
                    <small class="text-muted">Settled collections ledger</small>
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
                                        <strong class="text-emerald font-mono" style="color: var(--success); font-size: 0.85rem;">
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
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        borderDash: [4, 4],
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
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleFont: { family: 'Plus Jakarta Sans', size: 12, weight: '700' },
                        bodyFont: { family: 'Plus Jakarta Sans', size: 12 },
                        padding: 10,
                        cornerRadius: 8,
                        boxPadding: 4
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: '#64748b',
                            font: { family: 'Plus Jakarta Sans', size: 11 }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            color: '#64748b',
                            font: { family: 'Plus Jakarta Sans', size: 11 }
                        },
                        grid: {
                            color: '#f1f5f9',
                            borderDash: [3, 3]
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

        const totalInvs = paidCount + partialCount + unpaidCount;
        const donutData = totalInvs > 0 ? [paidCount, partialCount, unpaidCount] : [1, 0, 0];
        const donutColors = totalInvs > 0 ? ['#16a34a', '#d97706', '#e11d48'] : ['#e2e8f0', '#f1f5f9', '#f8fafc'];

        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Paid', 'Partially Paid', 'Unpaid'],
                datasets: [{
                    data: donutData,
                    backgroundColor: donutColors,
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
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleFont: { family: 'Plus Jakarta Sans', size: 12, weight: '700' },
                        bodyFont: { family: 'Plus Jakarta Sans', size: 12 },
                        padding: 10,
                        cornerRadius: 8
                    }
                }
            }
        });
    }
});
</script>
