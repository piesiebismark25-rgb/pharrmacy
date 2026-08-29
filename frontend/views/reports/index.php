<div class="d-flex justify-content-between align-items-center mb-4 no-print">
    <div>
        <h5 class="fw-bold text-white mb-1"><i class="fa-solid fa-print text-teal me-2" style="color: var(--accent-teal);"></i> Printable Operations & Financial Report</h5>
        <p class="text-muted mb-0" style="font-size: 0.85rem;">Executive clinical activity dossier, revenue auditing, and patient summary</p>
    </div>
    <button onclick="window.print()" class="btn-print-custom">
        <i class="fa-solid fa-print me-1"></i> Print Full Executive Report
    </button>
</div>

<!-- Key Metric Highlights -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Enrolled Patients</span>
            <h3 class="fw-bold text-white mb-0 mt-1"><?php echo number_format($totalPatients); ?></h3>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Clinical Encounters</span>
            <h3 class="fw-bold text-white mb-0 mt-1"><?php echo number_format($totalVisits); ?></h3>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Total Revenue Collected</span>
            <h3 class="fw-bold text-emerald mb-0 mt-1" style="color: #34d399;"><?php echo DEFAULT_CURRENCY . number_format($totalRevenue, 2); ?></h3>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Outstanding Balances</span>
            <h3 class="fw-bold text-danger mb-0 mt-1"><?php echo DEFAULT_CURRENCY . number_format($totalOutstanding, 2); ?></h3>
        </div>
    </div>
</div>

<!-- Section 1: Recent Clinical Encounters Log -->
<div class="ui-card mb-4">
    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-stethoscope text-teal me-2" style="color: var(--accent-teal);"></i> Clinical Encounters & Care Log</h5>
    <div class="table-responsive">
        <table class="ui-table" style="font-size: 0.85rem;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Patient ID & Name</th>
                    <th>Complaint</th>
                    <th>Diagnosis</th>
                    <th>Attending Doctor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentVisits as $v): ?>
                    <tr>
                        <td><?php echo date('d/m/Y', strtotime($v['visit_date'])); ?></td>
                        <td><strong><?php echo htmlspecialchars($v['client_name']); ?></strong> (<?php echo htmlspecialchars($v['client_id']); ?>)</td>
                        <td><?php echo htmlspecialchars(substr($v['complaint'], 0, 30)); ?></td>
                        <td><?php echo htmlspecialchars($v['diagnosis'] ?? 'Pending'); ?></td>
                        <td><?php echo htmlspecialchars($v['staff_name']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Section 2: Recent Payment Collections -->
<div class="ui-card">
    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-receipt text-teal me-2" style="color: var(--accent-teal);"></i> Financial Collections Ledger</h5>
    <div class="table-responsive">
        <table class="ui-table" style="font-size: 0.85rem;">
            <thead>
                <tr>
                    <th>Receipt #</th>
                    <th>Date</th>
                    <th>Patient Name</th>
                    <th>Method</th>
                    <th class="text-end">Amount Cleared</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentPayments as $p): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($p['receipt_number']); ?></strong></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($p['payment_date'])); ?></td>
                        <td><?php echo htmlspecialchars($p['client_name']); ?></td>
                        <td><?php echo htmlspecialchars($p['payment_method']); ?></td>
                        <td class="text-end text-emerald fw-bold"><?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>