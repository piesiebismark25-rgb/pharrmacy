<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-7">
        
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
            <a href="<?php echo APP_URL; ?>/payments" class="btn-secondary-custom">
                <i class="fa-solid fa-arrow-left me-1"></i> Receipts Ledger
            </a>
            <button onclick="window.print()" class="btn-print-custom">
                <i class="fa-solid fa-print me-1"></i> Print Official Receipt
            </button>
        </div>

        <div class="ui-card p-5" style="border: 2px dashed var(--border-active); background-color: var(--surface-card);">
            
            <div class="text-center pb-4 mb-4 border-bottom" style="border-color: var(--border-subtle) !important;">
                <h4 class="fw-bold text-white mb-1">I.K HOLINESS HOME CARE SERVICES</h4>
                <div class="text-teal fw-semibold mb-2" style="font-size: 0.8rem; letter-spacing: 0.08em; color: var(--accent-teal);">"YOUR HEALTH IS OUR LIFE"</div>
                <small class="text-muted d-block">
                    Pankrono, Kumasi &bull; Tel: 0241974447 / 0550974126 &bull; Email: kisaiahh@icloud.com
                </small>
                <div class="mt-3">
                    <span class="badge bg-white text-dark fw-bold p-2 px-4" style="font-size: 0.9rem; letter-spacing: 0.05em;">OFFICIAL PAYMENT RECEIPT</span>
                </div>
            </div>

            <div class="row g-3 mb-4" style="font-size: 0.9rem;">
                <div class="col-6">
                    <span class="text-muted d-block">Receipt Number:</span>
                    <strong class="text-white font-monospace fs-5"><?php echo htmlspecialchars($payment['receipt_number']); ?></strong>
                </div>
                <div class="col-6 text-end">
                    <span class="text-muted d-block">Date Issued:</span>
                    <strong class="text-white"><?php echo date('d/m/Y H:i A', strtotime($payment['payment_date'])); ?></strong>
                </div>
                <div class="col-6">
                    <span class="text-muted d-block">Received From Patient:</span>
                    <strong class="text-white"><?php echo htmlspecialchars($payment['full_name']); ?></strong>
                    <small class="text-muted d-block">ID: <?php echo htmlspecialchars($payment['client_id']); ?> &bull; Tel: <?php echo htmlspecialchars($payment['phone']); ?></small>
                </div>
                <div class="col-6 text-end">
                    <span class="text-muted d-block">Payment Channel:</span>
                    <span class="badge-pill-custom badge-emerald"><?php echo htmlspecialchars($payment['payment_method']); ?></span>
                </div>
            </div>

            <div class="p-4 rounded-3 text-center my-4" style="background-color: var(--accent-subtle); border: 1px solid var(--border-active);">
                <span class="text-muted d-block text-uppercase" style="font-size: 0.75rem;">Amount Received & Cleared</span>
                <h1 class="fw-bold my-1 text-emerald" style="color: #34d399; font-size: 2.4rem;">
                    <?php echo DEFAULT_CURRENCY . number_format($payment['amount_paid'], 2); ?>
                </h1>
                <small class="text-muted">Settlement applied against Invoice #<?php echo htmlspecialchars($payment['invoice_number']); ?></small>
            </div>

            <div class="d-flex justify-content-between text-muted mb-4 small">
                <span>Total Invoice: <?php echo DEFAULT_CURRENCY . number_format($payment['total_amount'], 2); ?></span>
                <span>Remaining Balance: <?php echo DEFAULT_CURRENCY . number_format($payment['balance'], 2); ?></span>
            </div>

            <?php if (!empty($payment['notes'])): ?>
                <div class="p-2 rounded mb-4 small text-muted" style="background-color: var(--bg-base);">
                    <strong>Notes/Ref:</strong> <?php echo htmlspecialchars($payment['notes']); ?>
                </div>
            <?php endif; ?>

            <div class="row pt-4 border-top align-items-end" style="border-color: var(--border-subtle) !important;">
                <div class="col-6">
                    <small class="text-muted d-block">Issued by Staff:</small>
                    <strong class="text-white"><?php echo htmlspecialchars($payment['staff_name']); ?></strong>
                    <div style="border-bottom: 1px dashed #64748b; width: 140px; height: 20px;"></div>
                </div>
                <div class="col-6 text-end">
                    <div style="display: inline-block; border: 2px dashed rgba(255, 255, 255, 0.2); width: 120px; height: 50px; border-radius: 6px;"></div>
                    <small class="text-muted d-block">Official Stamp</small>
                </div>
            </div>

        </div>
    </div>
</div>