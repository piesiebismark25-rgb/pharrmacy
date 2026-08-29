<div class="row mb-4 no-print align-items-center justify-content-between g-3">
    <div class="col-12 col-md-6">
        <h5 class="fw-bold text-white mb-1"><i class="fa-solid fa-receipt text-teal me-2" style="color: var(--accent-teal);"></i> Collections & Receipts Ledger</h5>
        <p class="text-muted mb-0" style="font-size: 0.85rem;">Record of all patient payments, mobile money settlements, and cash received</p>
    </div>
</div>

<div class="ui-table-container">
    <div class="table-responsive">
        <table class="ui-table">
            <thead>
                <tr>
                    <th>Receipt #</th>
                    <th>Payment Date</th>
                    <th>Patient Name</th>
                    <th>Invoice #</th>
                    <th>Amount Paid</th>
                    <th>Payment Method</th>
                    <th>Received By</th>
                    <th class="text-end no-print">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($payments)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-receipt fs-2 mb-3 d-block text-muted"></i>
                            No payment receipts recorded yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($payments as $p): ?>
                        <tr>
                            <td><strong class="text-white font-monospace"><?php echo htmlspecialchars($p['receipt_number']); ?></strong></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($p['payment_date'])); ?></td>
                            <td><strong class="text-white"><?php echo htmlspecialchars($p['client_name']); ?></strong></td>
                            <td><span class="text-muted"><?php echo htmlspecialchars($p['invoice_number']); ?></span></td>
                            <td><strong class="text-emerald" style="color: #34d399;"><?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?></strong></td>
                            <td><span class="badge-pill-custom badge-zinc"><?php echo htmlspecialchars($p['payment_method']); ?></span></td>
                            <td><small class="text-muted"><?php echo htmlspecialchars($p['staff_name']); ?></small></td>
                            <td class="text-end no-print">
                                <a href="<?php echo APP_URL; ?>/payments/receipt?id=<?php echo $p['receipt_number']; ?>" class="btn-secondary-custom btn-sm">
                                    <i class="fa-solid fa-print"></i> Official Receipt
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>