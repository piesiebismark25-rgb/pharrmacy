<div class="row mb-4 no-print align-items-center justify-content-between g-3">
    <div class="col-12 col-md-6">
        <h5 class="fw-bold text-white mb-1"><i class="fa-solid fa-file-invoice-dollar text-teal me-2" style="color: var(--accent-teal);"></i> Medical Invoices & Billing Statements</h5>
        <p class="text-muted mb-0" style="font-size: 0.85rem;">All statements issued for clinical and home care procedures</p>
    </div>
    <div class="col-12 col-md-auto">
        <a href="<?php echo APP_URL; ?>/billing/create" class="btn-primary-custom">
            <i class="fa-solid fa-plus me-1"></i> Generate New Invoice
        </a>
    </div>
</div>

<div class="ui-table-container">
    <div class="table-responsive">
        <table class="ui-table">
            <thead>
                <tr>
                    <th>Invoice #</th>
                    <th>Date</th>
                    <th>Patient Name</th>
                    <th>Total Charge</th>
                    <th>Amount Paid</th>
                    <th>Remaining Balance</th>
                    <th>Status</th>
                    <th class="text-end no-print">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($invoices)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-file-invoice fs-2 mb-3 d-block text-muted"></i>
                            No billing statements recorded yet. Click "Generate New Invoice" to create one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($invoices as $inv): ?>
                        <tr>
                            <td><strong class="text-white font-monospace"><?php echo htmlspecialchars($inv['invoice_number']); ?></strong></td>
                            <td><?php echo date('d/m/Y', strtotime($inv['invoice_date'])); ?></td>
                            <td>
                                <strong class="text-white d-block"><?php echo htmlspecialchars($inv['client_name']); ?></strong>
                                <small class="text-muted"><?php echo htmlspecialchars($inv['phone']); ?></small>
                            </td>
                            <td><strong><?php echo DEFAULT_CURRENCY . number_format($inv['total_amount'], 2); ?></strong></td>
                            <td class="text-emerald" style="color: #34d399;"><?php echo DEFAULT_CURRENCY . number_format($inv['amount_paid'], 2); ?></td>
                            <td class="<?php echo $inv['balance'] > 0 ? 'text-danger fw-bold' : 'text-muted'; ?>">
                                <?php echo DEFAULT_CURRENCY . number_format($inv['balance'], 2); ?>
                            </td>
                            <td>
                                <?php
                                $badge = 'badge-rose';
                                if ($inv['payment_status'] === 'Paid') $badge = 'badge-emerald';
                                if ($inv['payment_status'] === 'Partially Paid') $badge = 'badge-amber';
                                ?>
                                <span class="badge-pill-custom <?php echo $badge; ?>">
                                    <?php echo htmlspecialchars($inv['payment_status']); ?>
                                </span>
                            </td>
                            <td class="text-end no-print">
                                <div class="btn-group gap-1">
                                    <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $inv['invoice_number']; ?>" class="btn-secondary-custom btn-sm" title="View & Print Invoice">
                                        <i class="fa-solid fa-file-invoice"></i> View / Print
                                    </a>
                                    <?php if ($inv['balance'] > 0): ?>
                                        <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $inv['invoice_number']; ?>" class="btn-primary-custom btn-sm" title="Receive Payment">
                                            <i class="fa-solid fa-wallet"></i> Settle
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