<div class="row justify-content-center">
    <div class="col-12 col-xl-9">
        
        <!-- Action Toolbar (Hidden in Print) -->
        <div class="d-flex justify-content-between align-items-center mb-3 no-print">
            <a href="<?php echo APP_URL; ?>/billing" class="btn-secondary-custom">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to Invoices
            </a>
            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn-print-custom">
                    <i class="fa-solid fa-print me-1"></i> Print Official Invoice
                </button>
                <?php if ($invoice['balance'] > 0): ?>
                    <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $invoice['invoice_number']; ?>" class="btn-primary-custom">
                        <i class="fa-solid fa-wallet me-1"></i> Receive Payment
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Official Printable Invoice Sheet -->
        <div class="ui-card p-4 p-md-5" style="background-color: #ffffff;">
            
            <!-- Invoice Letterhead Header -->
            <div class="d-flex justify-content-between align-items-start pb-3 mb-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="brand-icon" style="width: 38px; height: 38px;">
                            <i class="fa-solid fa-house-medical fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-0" style="font-size: 1rem;">I.K HOLINESS HOME CARE SERVICES</h5>
                            <span class="text-blue-accent fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.05em;">"YOUR HEALTH IS OUR LIFE"</span>
                        </div>
                    </div>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">
                        <strong>Location:</strong> Pankrono, Kumasi, Ghana &bull; 
                        <strong>Tel:</strong> 0241974447 / 0550974126<br>
                        <strong>Email:</strong> kisaiahh@icloud.com
                    </small>
                </div>

                <div class="text-end">
                    <h5 class="fw-bold text-dark font-mono mb-1" style="font-size: 1.2rem;">INVOICE</h5>
                    <span class="badge-pill-custom badge-emerald font-mono fw-bold mb-2">
                        # <?php echo htmlspecialchars($invoice['invoice_number']); ?>
                    </span>
                    <div class="text-muted small" style="font-size: 0.75rem;"><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($invoice['invoice_date'])); ?></div>
                </div>
            </div>

            <!-- Billed To Section -->
            <div class="row mb-3" style="font-size: 0.8125rem;">
                <div class="col-6">
                    <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.68rem;">Billed Patient / Client:</small>
                    <strong class="text-dark d-block" style="font-size: 0.95rem;"><?php echo htmlspecialchars($invoice['full_name']); ?></strong>
                    <div class="text-secondary">
                        Patient ID: <strong class="font-mono"><?php echo htmlspecialchars($invoice['client_id']); ?></strong> &bull; <?php echo htmlspecialchars($invoice['gender']); ?><br>
                        Phone: <?php echo htmlspecialchars($invoice['phone']); ?><br>
                        Address: <?php echo nl2br(htmlspecialchars($invoice['address'])); ?>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.68rem;">Payment Status:</small>
                    <?php
                    $statBadge = 'badge-rose';
                    if ($invoice['payment_status'] === 'Paid') $statBadge = 'badge-emerald';
                    if ($invoice['payment_status'] === 'Partially Paid') $statBadge = 'badge-amber';
                    ?>
                    <span class="badge-pill-custom <?php echo $statBadge; ?> py-1 px-2" style="font-size: 0.8125rem;">
                        <?php echo htmlspecialchars($invoice['payment_status']); ?>
                    </span>
                </div>
            </div>

            <!-- Itemized Charges Table -->
            <div class="table-responsive mb-3">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description of Clinical / Home Care Services</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $idx = 1; foreach ($items as $item): ?>
                            <tr>
                                <td><?php echo $idx++; ?></td>
                                <td class="text-dark fw-medium"><?php echo htmlspecialchars($item['service_description']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td class="text-end font-mono"><?php echo DEFAULT_CURRENCY . number_format($item['unit_price'], 2); ?></td>
                                <td class="text-end text-dark fw-bold font-mono"><?php echo DEFAULT_CURRENCY . number_format($item['subtotal'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Total Breakdown -->
            <div class="row justify-content-end mb-3">
                <div class="col-12 col-md-5">
                    <div class="p-3 rounded-2" style="background-color: var(--bg-subtle); border: 1px solid var(--border-subtle); font-size: 0.8125rem;">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Total Billed:</span>
                            <strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($invoice['total_amount'], 2); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Amount Settled / Paid:</span>
                            <strong class="text-emerald font-mono" style="color: var(--success);"><?php echo DEFAULT_CURRENCY . number_format($invoice['amount_paid'], 2); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                            <strong class="text-dark">Remaining Balance:</strong>
                            <strong class="font-mono <?php echo $invoice['balance'] > 0 ? 'text-danger' : 'text-emerald'; ?>">
                                <?php echo DEFAULT_CURRENCY . number_format($invoice['balance'], 2); ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Receipt History for this invoice -->
            <?php if (!empty($payments)): ?>
                <div class="mb-3">
                    <h6 class="fw-bold text-dark mb-2" style="font-size: 0.85rem;"><i class="fa-solid fa-receipt text-blue-accent me-1"></i> Payments Settled on this Invoice</h6>
                    <div class="table-responsive">
                        <table class="ui-table" style="font-size: 0.78rem;">
                            <thead>
                                <tr>
                                    <th>Receipt #</th>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th>Staff</th>
                                    <th class="text-end">Amount Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payments as $p): ?>
                                    <tr>
                                        <td><strong class="text-dark font-mono"><?php echo htmlspecialchars($p['receipt_number']); ?></strong></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($p['payment_date'])); ?></td>
                                        <td><span class="badge-pill-custom badge-zinc"><?php echo htmlspecialchars($p['payment_method']); ?></span></td>
                                        <td><small class="text-muted"><?php echo htmlspecialchars($p['staff_name']); ?></small></td>
                                        <td class="text-end font-mono fw-bold text-emerald" style="color: var(--success);"><?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Printable Signature Section -->
            <div class="row pt-3 mt-3 border-top" style="border-color: var(--border-subtle) !important;">
                <div class="col-6">
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Authorized Signatory / Medical Officer:</small>
                    <div style="border-bottom: 1px dashed #64748b; width: 160px; height: 30px;"></div>
                    <small class="text-muted" style="font-size: 0.7rem;">I.K Holiness Clinic & Home Care</small>
                </div>
                <div class="col-6 text-end">
                    <div style="display: inline-block; border: 2px dashed #94a3b8; width: 120px; height: 50px; border-radius: 6px;"></div>
                    <small class="text-muted d-block mt-1" style="font-size: 0.7rem;">Official Verification Stamp</small>
                </div>
            </div>

        </div>
    </div>
</div>