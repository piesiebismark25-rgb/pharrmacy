<div class="d-flex justify-content-between align-items-center mb-3 no-print">
    <div>
        <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-print text-blue-accent me-1"></i> Operations & Financial Auditing Report</h6>
        <small class="text-muted">Executive clinical activity dossier, revenue auditing, and patient summary</small>
    </div>
    <button onclick="window.print()" class="btn-print-custom">
        <i class="fa-solid fa-print me-1"></i> Print Executive Report
    </button>
</div>

<!-- Key Metric Highlights -->
<div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Enrolled Patients</span>
            <h4 class="fw-bold text-dark mb-0 mt-1" style="font-size: 1.25rem;"><?php echo number_format($totalPatients); ?></h4>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Clinical Encounters</span>
            <h4 class="fw-bold text-dark mb-0 mt-1" style="font-size: 1.25rem;"><?php echo number_format($totalVisits); ?></h4>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Total Collections</span>
            <h4 class="fw-bold font-mono mb-0 mt-1" style="font-size: 1.25rem; color: var(--success);"><?php echo DEFAULT_CURRENCY . number_format($totalRevenue, 2); ?></h4>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="ui-card p-3">
            <span class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Outstanding Balances</span>
            <h4 class="fw-bold font-mono mb-0 mt-1" style="font-size: 1.25rem; color: var(--danger);"><?php echo DEFAULT_CURRENCY . number_format($totalOutstanding, 2); ?></h4>
        </div>
    </div>
</div>

<!-- Section 1: Recent Clinical Encounters Log -->
<div class="ui-card mb-3">
    <h6 class="fw-bold text-dark mb-2" style="font-size: 0.85rem;"><i class="fa-solid fa-stethoscope text-blue-accent me-1"></i> Clinical Encounters Log</h6>
    <div class="table-responsive">
        <table class="ui-table" style="font-size: 0.8125rem;">
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
                        <td><strong><?php echo htmlspecialchars($v['client_name']); ?></strong> (<span class="font-mono"><?php echo htmlspecialchars($v['client_id']); ?></span>)</td>
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
    <h6 class="fw-bold text-dark mb-2" style="font-size: 0.85rem;"><i class="fa-solid fa-receipt text-blue-accent me-1"></i> Financial Collections Ledger</h6>
    <div class="table-responsive">
        <table class="ui-table" style="font-size: 0.8125rem;">
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
                        <td><strong class="text-dark font-mono"><?php echo htmlspecialchars($p['receipt_number']); ?></strong></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($p['payment_date'])); ?></td>
                        <td><?php echo htmlspecialchars($p['client_name']); ?></td>
                        <td><span class="badge-pill-custom badge-zinc"><?php echo htmlspecialchars($p['payment_method']); ?></span></td>
                        <td class="text-end font-mono fw-bold" style="color: var(--success);"><?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>