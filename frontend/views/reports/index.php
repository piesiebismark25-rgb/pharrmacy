<!-- Executive Clinical & Financial Audit Intelligence Report -->
<div class="audit-report-wrapper">

    <!-- 1. Executive Top Command Bar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4 no-print">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                <h4 class="fw-bold text-dark mb-0" style="font-size: 1.15rem; letter-spacing: -0.02em;">
                    Clinical Operations & Financial Intelligence
                </h4>
                <span class="live-status-pill">
                    <span class="live-dot-pulse"></span>
                    Live Analytics
                </span>
            </div>
            <small class="text-muted">Consolidated operational intelligence, revenue analytics, and transaction audit dossier</small>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="text-muted small font-mono me-2">
                <i class="fa-regular fa-clock text-primary me-1"></i><?php echo date('d M Y • g:i A'); ?>
            </span>
            <button onclick="window.print()" class="btn-primary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-print me-1"></i> Print Executive Report
            </button>
        </div>
    </div>

    <!-- 2. Four Vibrant Distinct Luxury Bento KPI Cards -->
    <div class="row g-3 mb-4">
        <!-- 1. Registered Patients (Royal Blue) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="audit-kpi-card bg-grad-blue">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">Enrolled Patients</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="kpi-main-number"><?php echo number_format($totalPatients); ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid fa-id-card-clip me-1"></i> Active Clinical Dossiers
                </div>
            </div>
        </div>

        <!-- 2. Clinical Encounters (Royal Purple) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="audit-kpi-card bg-grad-purple">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">Clinical Encounters</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                </div>
                <div class="kpi-main-number"><?php echo number_format($totalVisits); ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid fa-house-medical me-1"></i> Domiciliary Home Visits
                </div>
            </div>
        </div>

        <!-- 3. Total Collections (Emerald Green) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="audit-kpi-card bg-grad-emerald">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">Total Collections</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>
                <div class="kpi-main-number font-mono"><?php echo DEFAULT_CURRENCY . number_format($totalRevenue, 2); ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid fa-circle-check me-1"></i> 100% Cleared Revenue
                </div>
            </div>
        </div>

        <!-- 4. Outstanding Receivables (Crimson Rose) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="audit-kpi-card bg-grad-rose">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">Outstanding Balance</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                </div>
                <div class="kpi-main-number font-mono"><?php echo DEFAULT_CURRENCY . number_format($totalOutstanding, 2); ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid <?php echo $totalOutstanding > 0 ? 'fa-clock' : 'fa-check-double'; ?> me-1"></i>
                    <?php echo $totalOutstanding > 0 ? 'Pending Settlements' : 'Zero Overdue Balance'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Visual Analytics Cockpit (Replacing Plain Encounters Table) -->
    <div class="row g-3 mb-4">
        
        <!-- LEFT: Revenue Velocity & Encounters Trend Chart (Col-lg-8) -->
        <div class="col-12 col-lg-8">
            <div class="analytics-card h-100 p-4">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon-sq bg-blue-subtle text-primary" style="width: 34px; height: 34px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 0.9rem;">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Revenue Velocity & Encounter Volume Trend</h6>
                            <small class="text-muted">7-Day clinical consultations and collection progression</small>
                        </div>
                    </div>
                    <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.72rem;">Last 7 Days</span>
                </div>

                <!-- Chart Canvas -->
                <div style="height: 260px; position: relative;">
                    <canvas id="auditTrendChart"></canvas>
                </div>

                <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3 text-secondary small flex-wrap gap-2" style="font-size: 0.78rem;">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-inline-flex align-items-center gap-1">
                            <span style="width: 10px; height: 10px; border-radius: 3px; background-color: #2563eb; display: inline-block;"></span>
                            Revenue Collected (GH₵)
                        </span>
                        <span class="d-inline-flex align-items-center gap-1">
                            <span style="width: 10px; height: 10px; border-radius: 3px; background-color: #7c3aed; display: inline-block;"></span>
                            Visits Completed
                        </span>
                    </div>
                    <span class="font-mono text-dark fw-bold">
                        Avg: GH₵ <?php echo $totalVisits > 0 ? number_format($totalRevenue / $totalVisits, 2) : '0.00'; ?> / visit
                    </span>
                </div>
            </div>
        </div>

        <!-- RIGHT: Revenue Streams by Payment Channel (Col-lg-4) -->
        <div class="col-12 col-lg-4">
            <div class="analytics-card h-100 p-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="icon-sq bg-emerald-subtle text-success" style="width: 34px; height: 34px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 0.9rem;">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Payment Channels</h6>
                        <small class="text-muted">Settlement method distribution</small>
                    </div>
                </div>

                <!-- Donut Chart Container -->
                <div style="height: 180px; position: relative;" class="my-2">
                    <canvas id="paymentChannelChart"></canvas>
                </div>

                <!-- Breakdown List -->
                <div class="d-flex flex-column gap-2 mt-3 pt-2 border-top">
                    <?php if (empty($channelStats)): ?>
                        <div class="text-muted small text-center py-2">No transaction data yet.</div>
                    <?php else: ?>
                        <?php foreach ($channelStats as $ch): ?>
                            <div class="d-flex justify-content-between align-items-center" style="font-size: 0.8125rem;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge-pill-custom badge-zinc fw-semibold" style="font-size: 0.72rem;">
                                        <?php echo htmlspecialchars($ch['payment_method']); ?>
                                    </span>
                                    <small class="text-muted">(<?php echo $ch['txn_count']; ?> txns)</small>
                                </div>
                                <strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($ch['total_amount'], 2); ?></strong>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

    <!-- 4. Demographics & Operational Health Bento Matrix -->
    <div class="row g-3 mb-4">
        
        <!-- Gender Cohort Card -->
        <div class="col-12 col-md-4">
            <div class="analytics-card p-3 h-100">
                <span class="text-uppercase fw-bold text-muted d-block mb-2" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                    Patient Gender Demographics
                </span>
                <?php
                $maleCount = 0;
                $femaleCount = 0;
                foreach ($genderStats as $g) {
                    if (strtolower($g['gender']) === 'male') $maleCount = (int)$g['count'];
                    if (strtolower($g['gender']) === 'female') $femaleCount = (int)$g['count'];
                }
                $genderTotal = max(1, $maleCount + $femaleCount);
                $femalePct = round(($femaleCount / $genderTotal) * 100);
                $malePct = round(($maleCount / $genderTotal) * 100);
                ?>
                <div class="d-flex justify-content-between align-items-center mb-1 small">
                    <span><i class="fa-solid fa-venus text-danger me-1"></i> Female</span>
                    <strong class="text-dark"><?php echo $femaleCount; ?> (<?php echo $femalePct; ?>%)</strong>
                </div>
                <div class="progress mb-2" style="height: 7px; border-radius: 4px; background-color: #f1f5f9;">
                    <div class="progress-bar bg-danger" style="width: <?php echo $femalePct; ?>%;"></div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-1 small">
                    <span><i class="fa-solid fa-mars text-primary me-1"></i> Male</span>
                    <strong class="text-dark"><?php echo $maleCount; ?> (<?php echo $malePct; ?>%)</strong>
                </div>
                <div class="progress" style="height: 7px; border-radius: 4px; background-color: #f1f5f9;">
                    <div class="progress-bar bg-primary" style="width: <?php echo $malePct; ?>%;"></div>
                </div>
            </div>
        </div>

        <!-- Collection Rate Card -->
        <div class="col-12 col-md-4">
            <div class="analytics-card p-3 h-100">
                <span class="text-uppercase fw-bold text-muted d-block mb-2" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                    Collection Realization Rate
                </span>
                <?php 
                $billedSum = $totalRevenue + $totalOutstanding;
                $collectionRate = $billedSum > 0 ? round(($totalRevenue / $billedSum) * 100) : 100;
                ?>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h3 class="fw-bold text-success font-mono mb-0" style="font-size: 1.6rem;"><?php echo $collectionRate; ?>%</h3>
                    <span class="badge-pill-custom badge-emerald font-mono fw-bold" style="font-size: 0.72rem;">Cleared</span>
                </div>
                <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">
                    Total Invoiced: <?php echo DEFAULT_CURRENCY . number_format($billedSum, 2); ?>
                </small>
                <div class="progress mt-2" style="height: 7px; border-radius: 4px; background-color: #f1f5f9;">
                    <div class="progress-bar bg-success" style="width: <?php echo $collectionRate; ?>%;"></div>
                </div>
            </div>
        </div>

        <!-- Average Ticket Value Card -->
        <div class="col-12 col-md-4">
            <div class="analytics-card p-3 h-100">
                <span class="text-uppercase fw-bold text-muted d-block mb-2" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                    Encounter Yield & Productivity
                </span>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h3 class="fw-bold text-dark font-mono mb-0" style="font-size: 1.6rem;">
                        <?php echo DEFAULT_CURRENCY . ($totalVisits > 0 ? number_format($totalRevenue / $totalVisits, 2) : '0.00'); ?>
                    </h3>
                    <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.72rem;">Per Encounter</span>
                </div>
                <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">
                    Average revenue generated per home visit consultation
                </small>
            </div>
        </div>

    </div>

    <!-- 5. Section 2: Recent Payment Collections & Revenue Ledger -->
    <div class="ui-table-container shadow-sm">
        <div class="tanstack-table-header">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-sq bg-emerald-subtle text-success" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-receipt"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Financial Collections & Receipts Ledger</h6>
                    <small class="text-muted">Itemized audit of revenue cleared through Cash and Mobile Money</small>
                </div>
            </div>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.72rem;">
                Showing <?php echo count($recentPayments); ?> Transactions
            </span>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th style="width: 16%;">Receipt #</th>
                        <th style="width: 18%;">Date & Time</th>
                        <th style="width: 26%;">Patient Name</th>
                        <th style="width: 16%;">Payment Channel</th>
                        <th style="width: 14%; text-align: right;">Amount Cleared</th>
                        <th style="width: 10%; text-align: right;" class="no-print">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentPayments)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-receipt fs-3 mb-2 d-block text-muted"></i>
                                No payment receipts recorded yet.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($recentPayments as $p): ?>
                            <tr>
                                <!-- Receipt # -->
                                <td>
                                    <strong class="text-dark font-mono" style="font-size: 0.85rem;">
                                        <?php echo htmlspecialchars($p['receipt_number']); ?>
                                    </strong>
                                </td>

                                <!-- Date & Time -->
                                <td>
                                    <span class="text-secondary font-mono" style="font-size: 0.8125rem;">
                                        <?php echo date('d/m/Y \a\t g:i A', strtotime($p['payment_date'])); ?>
                                    </span>
                                </td>

                                <!-- Patient Name -->
                                <td>
                                    <strong class="text-dark" style="font-size: 0.85rem;">
                                        <?php echo htmlspecialchars($p['client_name']); ?>
                                    </strong>
                                </td>

                                <!-- Payment Channel -->
                                <td>
                                    <span class="badge-pill-custom badge-zinc fw-semibold" style="font-size: 0.72rem;">
                                        <i class="fa-solid fa-money-bill-wave text-success me-1"></i>
                                        <?php echo htmlspecialchars($p['payment_method']); ?>
                                    </span>
                                </td>

                                <!-- Amount Cleared -->
                                <td style="text-align: right;">
                                    <strong class="text-success font-mono" style="font-size: 0.92rem;">
                                        <?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?>
                                    </strong>
                                </td>

                                <!-- Action -->
                                <td style="text-align: right;" class="no-print">
                                    <a href="<?php echo APP_URL; ?>/payments/receipt?id=<?php echo urlencode($p['receipt_number']); ?>" class="btn-secondary-custom btn-sm py-1 px-2" style="font-size: 0.75rem;" title="View Receipt">
                                        <i class="fa-solid fa-receipt me-1 text-primary"></i> Receipt
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

<!-- Chart.js Modern Initializations -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. Audit Trend Spline & Bar Chart
    const trendCtx = document.getElementById('auditTrendChart');
    if (trendCtx) {
        new Chart(trendCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($days); ?>,
                datasets: [
                    {
                        label: 'Revenue (GH₵)',
                        type: 'line',
                        data: <?php echo json_encode($revenueDaysData); ?>,
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.08)',
                        borderWidth: 2.5,
                        tension: 0.35,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#2563eb',
                        yAxisID: 'y'
                    },
                    {
                        label: 'Visits',
                        type: 'bar',
                        data: <?php echo json_encode($visitsDaysData); ?>,
                        backgroundColor: '#7c3aed',
                        borderRadius: 6,
                        barThickness: 16,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        padding: 10,
                        cornerRadius: 8
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 11 }, color: '#64748b' }
                    },
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        grid: { color: '#f1f5f9' },
                        ticks: {
                            callback: function(v) { return 'GH₵' + v; },
                            font: { size: 11 },
                            color: '#64748b'
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: { display: false },
                        ticks: {
                            stepSize: 1,
                            font: { size: 11 },
                            color: '#64748b'
                        }
                    }
                }
            }
        });
    }

    // 2. Payment Channel Doughnut Chart
    const channelCtx = document.getElementById('paymentChannelChart');
    if (channelCtx) {
        const channelLabels = <?php echo json_encode(array_column($channelStats, 'payment_method')); ?>;
        const channelAmounts = <?php echo json_encode(array_map('floatval', array_column($channelStats, 'total_amount'))); ?>;
        
        new Chart(channelCtx, {
            type: 'doughnut',
            data: {
                labels: channelLabels.length ? channelLabels : ['No Data'],
                datasets: [{
                    data: channelAmounts.length ? channelAmounts : [1],
                    backgroundColor: channelAmounts.length ? ['#16a34a', '#2563eb', '#f59e0b', '#8b5cf6'] : ['#e2e8f0'],
                    borderWidth: 0,
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
                        padding: 8,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(c) {
                                return ' ' + c.label + ': GH₵ ' + Number(c.raw).toFixed(2);
                            }
                        }
                    }
                }
            }
        });
    }
});
</script>

<style>
/* Audit Report Styles */
.audit-report-wrapper {
    max-width: 100%;
}

.analytics-card {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-lg);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.analytics-card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
}

.audit-kpi-card {
    border-radius: var(--radius-lg);
    padding: 20px 22px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    transition: transform 0.2s ease;
}

.audit-kpi-card:hover {
    transform: translateY(-2px);
}

.bg-grad-blue {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 60%, #3b82f6 100%);
}

.bg-grad-purple {
    background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 60%, #9333ea 100%);
}

.bg-grad-emerald {
    background: linear-gradient(135deg, #15803d 0%, #16a34a 60%, #22c55e 100%);
}

.bg-grad-rose {
    background: linear-gradient(135deg, #be123c 0%, #e11d48 60%, #f43f5e 100%);
}

.kpi-glass-tag {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    opacity: 0.95;
}

.kpi-glass-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.kpi-main-number {
    font-size: 1.7rem;
    font-weight: 900;
    line-height: 1.1;
    margin: 6px 0 4px 0;
    letter-spacing: -0.02em;
}

.kpi-sub-label {
    font-size: 0.72rem;
    opacity: 0.9;
}
</style>