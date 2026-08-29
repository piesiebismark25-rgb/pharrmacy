<div class="row justify-content-center">
    <div class="col-12 col-xl-9">
        
        <!-- Action Toolbar (Hidden in Print) -->
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
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
        <div class="ui-card p-5" style="border: 1px solid var(--border-subtle); background-color: var(--surface-card);">
            
            <!-- Invoice Letterhead Header -->
            <div class="d-flex justify-content-between align-items-start pb-4 mb-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="brand-icon" style="width: 48px; height: 48px;">
                            <svg width="30" height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="28" height="28" rx="8" fill="#0d9488" fill-opacity="0.3" stroke="#2dd4bf" stroke-width="1.5"/>
                                <path d="M16 7V25M7 16H25" stroke="#2dd4bf" stroke-width="2.5" stroke-linecap="round"/>
                                <circle cx="16" cy="16" r="4" fill="#10b981" stroke="#ffffff" stroke-width="1.2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="fw-bold text-white mb-0">I.K HOLINESS HOME CARE SERVICES</h3>
                            <span class="text-teal fw-semibold" style="font-size: 0.8rem; letter-spacing: 0.05em; color: var(--accent-teal);">"YOUR HEALTH IS OUR LIFE"</span>
                        </div>
                    </div>
                    <small class="text-muted d-block">
                        <strong>Location:</strong> Pankrono, Kumasi, Ghana &bull; 
                        <strong>Tel:</strong> 0241974447 / 0550974126<br>
                        <strong>Email:</strong> kisaiahh@icloud.com
                    </small>
                </div>

                <div class="text-end">
                    <h2 class="fw-bold text-white font-monospace mb-1" style="font-size: 1.5rem;">INVOICE</h2>
                    <span class="badge-pill-custom badge-emerald font-monospace fw-bold mb-2">
                        # <?php echo htmlspecialchars($invoice['invoice_number']); ?>
                    </span>
                    <div class="text-muted small"><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($invoice['invoice_date'])); ?></div>
                </div>
            </div>

            <!-- Billed To Section -->
            <div class="row mb-4">
                <div class="col-6">
                    <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.72rem;">Billed Patient / Client:</small>
                    <strong class="text-white fs-5 d-block"><?php echo htmlspecialchars($invoice['full_name']); ?></strong>
                    <div class="text-secondary" style="font-size: 0.875rem;">
                        Patient ID: <strong><?php echo htmlspecialchars($invoice['client_id']); ?></strong> &bull; <?php echo htmlspecialchars($invoice['gender']); ?><br>
                        Phone: <?php echo htmlspecialchars($invoice['phone']); ?><br>
                        Address: <?php echo nl2br(htmlspecialchars($invoice['address'])); ?>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.72rem;">Payment Status:</small>
                    <?php
                    $statBadge = 'badge-rose';
                    if ($invoice['payment_status'] === 'Paid') $statBadge = 'badge-emerald';
                    if ($invoice['payment_status'] === 'Partially Paid') $statBadge = 'badge-amber';
                    ?>
                    <span class="badge-pill-custom <?php echo $statBadge; ?> fs-6 py-2 px-3">
                        <?php echo htmlspecialchars($invoice['payment_status']); ?>
                    </span>
                </div>
            </div>

            <!-- Itemized Charges Table -->
            <div class="table-responsive mb-4">
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
                                <td class="text-white fw-medium"><?php echo htmlspecialchars($item['service_description']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td class="text-end"><?php echo DEFAULT_CURRENCY . number_format($item['unit_price'], 2); ?></td>
                                <td class="text-end text-white fw-bold"><?php echo DEFAULT_CURRENCY . number_format($item['subtotal'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Total Breakdown -->
            <div class="row justify-content-end mb-4">
                <div class="col-12 col-md-5">
                    <div class="p-3 rounded-3" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle);">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Total Billed:</span>
                            <strong class="text-white"><?php echo DEFAULT_CURRENCY . number_format($invoice['total_amount'], 2); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Amount Settled / Paid:</span>
                            <strong class="text-emerald" style="color: #34d399;"><?php echo DEFAULT_CURRENCY . number_format($invoice['amount_paid'], 2); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between pt-2 border-top fs-5" style="border-color: var(--border-subtle) !important;">
                            <strong class="text-white">Remaining Balance:</strong>
                            <strong class="<?php echo $invoice['balance'] > 0 ? 'text-danger' : 'text-emerald'; ?>">
                                <?php echo DEFAULT_CURRENCY . number_format($invoice['balance'], 2); ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments History Ledger if any -->
            <?php if (!empty($payments)): ?>
                <div class="mb-4 pt-3 border-top" style="border-color: var(--border-subtle) !important;">
                    <h6 class="fw-bold text-white mb-3">Settlement Receipts History:</h6>
                    <table class="ui-table" style="font-size: 0.82rem;">
                        <thead>
                            <tr>
                                <th>Receipt #</th>
                                <th>Payment Date</th>
                                <th>Method</th>
                                <th class="text-end">Amount Settled</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payments as $p): ?>
                                <tr>
                                    <td><strong class="text-white"><?php echo htmlspecialchars($p['receipt_number']); ?></strong></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($p['payment_date'])); ?></td>
                                    <td><span class="badge-pill-custom badge-zinc"><?php echo htmlspecialchars($p['payment_method']); ?></span></td>
                                    <td class="text-end text-emerald fw-bold"><?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <!-- Signature & Stamp Section (Always on Print) -->
            <div class="row pt-4 mt-4 border-top" style="border-color: var(--border-subtle) !important;">
                <div class="col-6">
                    <p class="mb-1 text-white fw-bold" style="font-size: 0.85rem;">Authorized Medical Officer:</p>
                    <p class="text-muted mb-4" style="font-size: 0.8rem;">Dr. I.K Holiness (Home Care Director)</p>
                    <div style="border-bottom: 1px dashed #64748b; width: 180px; height: 25px;"></div>
                    <small class="text-muted">Signature & Date</small>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-1 text-white fw-bold" style="font-size: 0.85rem;">Official Clinic Stamp:</p>
                    <div style="display: inline-block; border: 2px dashed rgba(255, 255, 255, 0.2); width: 140px; height: 60px; border-radius: 8px; margin-top: 5px;"></div>
                </div>
            </div>

        </div>
    </div>
</div>