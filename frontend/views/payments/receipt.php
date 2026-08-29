<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-7">
        
        <div class="d-flex justify-content-between align-items-center mb-3 no-print">
            <a href="<?php echo APP_URL; ?>/payments" class="btn-secondary-custom">
                <i class="fa-solid fa-arrow-left me-1"></i> Receipts Ledger
            </a>
            <button onclick="window.print()" class="btn-print-custom">
                <i class="fa-solid fa-print me-1"></i> Print Receipt
            </button>
        </div>

        <div class="ui-card p-4 p-md-5" style="border: 2px dashed var(--border-strong); background-color: #ffffff;">
            
            <div class="text-center pb-3 mb-3 border-bottom" style="border-color: var(--border-subtle) !important;">
                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">I.K HOLINESS HOME CARE SERVICES</h5>
                <div class="text-blue-accent fw-semibold mb-2" style="font-size: 0.72rem; letter-spacing: 0.06em;">"YOUR HEALTH IS OUR LIFE"</div>
                <small class="text-muted d-block" style="font-size: 0.75rem;">
                    Pankrono, Kumasi &bull; Tel: 0241974447 / 0550974126 &bull; Email: kisaiahh@icloud.com
                </small>
                <div class="mt-2">
                    <span class="badge bg-dark text-white fw-bold py-1 px-3" style="font-size: 0.8rem; letter-spacing: 0.04em;">OFFICIAL PAYMENT RECEIPT</span>
                </div>
            </div>

            <div class="row g-2 mb-3" style="font-size: 0.8125rem;">
                <div class="col-6">
                    <span class="text-muted d-block" style="font-size: 0.72rem;">Receipt Number:</span>
                    <strong class="text-dark font-mono"><?php echo htmlspecialchars($payment['receipt_number']); ?></strong>
                </div>
                <div class="col-6 text-end">
                    <span class="text-muted d-block" style="font-size: 0.72rem;">Date Issued:</span>
                    <strong class="text-dark"><?php echo date('d/m/Y H:i A', strtotime($payment['payment_date'])); ?></strong>
                </div>
                <div class="col-6">
                    <span class="text-muted d-block" style="font-size: 0.72rem;">Received From Patient:</span>
                    <strong class="text-dark"><?php echo htmlspecialchars($payment['full_name']); ?></strong>
                    <small class="text-muted d-block">ID: <span class="font-mono"><?php echo htmlspecialchars($payment['client_id']); ?></span> &bull; Tel: <?php echo htmlspecialchars($payment['phone']); ?></small>
                </div>
                <div class="col-6 text-end">
                    <span class="text-muted d-block" style="font-size: 0.72rem;">Payment Channel:</span>
                    <span class="badge-pill-custom badge-emerald"><?php echo htmlspecialchars($payment['payment_method']); ?></span>
                </div>
            </div>

            <div class="p-3 rounded-2 text-center my-3" style="background-color: var(--success-bg); border: 1px solid var(--success-border);">
                <span class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Amount Received & Cleared</span>
                <h2 class="fw-bold my-1 font-mono text-emerald" style="color: var(--success); font-size: 1.8rem;">
                    <?php echo DEFAULT_CURRENCY . number_format($payment['amount_paid'], 2); ?>
                </h2>
                <small class="text-muted" style="font-size: 0.75rem;">Settlement applied against Invoice #<strong class="font-mono"><?php echo htmlspecialchars($payment['invoice_number']); ?></strong></small>
            </div>

            <div class="d-flex justify-content-between text-muted mb-3 small" style="font-size: 0.78rem;">
                <span>Total Invoice: <strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($payment['total_amount'], 2); ?></strong></span>
                <span>Remaining Balance: <strong class="font-mono <?php echo $payment['balance'] > 0 ? 'text-danger' : 'text-emerald'; ?>"><?php echo DEFAULT_CURRENCY . number_format($payment['balance'], 2); ?></strong></span>
            </div>

            <?php if (!empty($payment['notes'])): ?>
                <div class="p-2 rounded mb-3 small text-muted" style="background-color: var(--bg-subtle); font-size: 0.75rem;">
                    <strong>Notes/Ref:</strong> <?php echo htmlspecialchars($payment['notes']); ?>
                </div>
            <?php endif; ?>

            <div class="row pt-3 border-top align-items-end" style="border-color: var(--border-subtle) !important;">
                <div class="col-6">
                    <small class="text-muted d-block" style="font-size: 0.72rem;">Issued by Staff:</small>
                    <strong class="text-dark" style="font-size: 0.8125rem;"><?php echo htmlspecialchars($payment['staff_name']); ?></strong>
                    <div style="border-bottom: 1px dashed #64748b; width: 140px; height: 18px;"></div>
                </div>
                <div class="col-6 text-end">
                    <div style="display: inline-block; border: 2px dashed #94a3b8; width: 110px; height: 45px; border-radius: 6px;"></div>
                    <small class="text-muted d-block" style="font-size: 0.7rem;">Official Stamp</small>
                </div>
            </div>

        </div>
    </div>
</div>