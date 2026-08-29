<div class="row mb-3 no-print align-items-center justify-content-between g-3">
    <div class="col-12 col-md-6">
        <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-invoice-dollar text-blue-accent me-1"></i> Medical Invoices & Billing Statements</h6>
        <small class="text-muted">All statements issued for clinical and home care procedures</small>
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
                        <td colspan="8" class="text-center py-5 text-muted small">
                            <i class="fa-solid fa-file-invoice fs-3 mb-2 d-block text-muted"></i>
                            No billing statements recorded yet. Click "Generate New Invoice" to create one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($invoices as $inv): ?>
                        <tr>
                            <td><strong class="text-dark font-mono" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($inv['invoice_number']); ?></strong></td>
                            <td><?php echo date('d/m/Y', strtotime($inv['invoice_date'])); ?></td>
                            <td>
                                <strong class="text-dark d-block" style="font-size: 0.85rem;"><?php echo htmlspecialchars($inv['client_name']); ?></strong>
                                <small class="text-muted"><?php echo htmlspecialchars($inv['phone']); ?></small>
                            </td>
                            <td><strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($inv['total_amount'], 2); ?></strong></td>
                            <td><strong class="text-emerald font-mono" style="color: var(--success);"><?php echo DEFAULT_CURRENCY . number_format($inv['amount_paid'], 2); ?></strong></td>
                            <td>
                                <strong class="<?php echo $inv['balance'] > 0 ? 'text-danger font-mono fw-bold' : 'text-muted font-mono'; ?>">
                                    <?php echo DEFAULT_CURRENCY . number_format($inv['balance'], 2); ?>
                                </strong>
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
                                    <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $inv['invoice_number']; ?>" class="btn-secondary-custom btn-sm py-1 px-2" title="View & Print Invoice">
                                        <i class="fa-solid fa-file-invoice"></i> View
                                    </a>
                                    <?php if ($inv['balance'] > 0): ?>
                                        <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $inv['invoice_number']; ?>" class="btn-primary-custom btn-sm py-1 px-2" title="Receive Payment">
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