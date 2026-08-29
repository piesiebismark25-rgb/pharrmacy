<!-- Modern Executive Payment Receipt View -->
<div class="row justify-content-center">
    <div class="col-12 col-md-9 col-xl-8">
        
        <!-- Action Toolbar (Hidden in Print) -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4 no-print">
            <a href="<?php echo APP_URL; ?>/payments" class="btn-secondary-custom py-2 px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Receipts Ledger
            </a>
            
            <div class="d-flex align-items-center gap-2">
                <button onclick="window.print()" class="btn-secondary-custom py-2 px-3 shadow-sm">
                    <i class="fa-solid fa-print me-1"></i> Print Official Receipt
                </button>
                <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $payment['invoice_number']; ?>" class="btn-secondary-custom py-2 px-3 shadow-sm">
                    <i class="fa-solid fa-file-invoice-dollar me-1 text-warning"></i> View Invoice
                </a>
            </div>
        </div>

        <!-- Luxury Modern Printable Receipt Sheet -->
        <div class="modern-receipt-sheet p-4 p-md-5">
            
            <!-- 1. Header Letterhead Banner -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-4 pb-4 mb-4 border-bottom">
                
                <!-- Clinic Brand Info -->
                <div class="d-flex align-items-start gap-3">
                    <div class="receipt-logo-sq">
                        <i class="fa-solid fa-house-medical"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-dark mb-1" style="font-size: 1.15rem; letter-spacing: -0.02em;">
                            I.K HOLINESS HOME CARE SERVICES
                        </h4>
                        <span class="badge-motto mb-2">"YOUR HEALTH IS OUR LIFE"</span>
                        <div class="text-secondary small mt-1" style="font-size: 0.78rem; line-height: 1.4;">
                            <div><i class="fa-solid fa-location-dot text-primary me-1"></i> Pankrono, Kumasi, Ghana</div>
                            <div><i class="fa-solid fa-phone text-primary me-1"></i> 0241974447 / 0550974126 &bull; <i class="fa-regular fa-envelope text-primary me-1"></i> kisaiahh@icloud.com</div>
                        </div>
                    </div>
                </div>

                <!-- Receipt Meta & Number -->
                <div class="text-start text-md-end">
                    <div class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.08em;">Official Payment Receipt</div>
                    <h2 class="fw-bold text-dark font-mono mb-1" style="font-size: 1.6rem; letter-spacing: -0.02em;">
                        <?php echo htmlspecialchars($payment['receipt_number']); ?>
                    </h2>
                    <div class="d-flex align-items-center justify-content-md-end gap-2 my-2">
                        <span class="badge-pill-custom badge-emerald font-mono fw-bold py-1 px-2" style="font-size: 0.75rem;">
                            <i class="fa-solid fa-circle-check me-1"></i> CLEARED PAYMENT
                        </span>
                    </div>
                    <div class="text-muted small font-mono" style="font-size: 0.75rem;">
                        <strong>Date:</strong> <?php echo date('d F Y \a\t g:i A', strtotime($payment['payment_date'])); ?>
                    </div>
                </div>

            </div>

            <!-- 2. Patient & Payment Channel Bento Cards -->
            <div class="row g-3 mb-4">
                
                <!-- Billed Patient Card -->
                <div class="col-12 col-md-6">
                    <div class="receipt-bento-box h-100">
                        <span class="bento-box-label">Received From Patient</span>
                        <h6 class="fw-bold text-dark mb-1" style="font-size: 1rem;">
                            <?php echo htmlspecialchars($payment['full_name']); ?>
                        </h6>
                        <div class="text-secondary small d-flex flex-column gap-1" style="font-size: 0.8125rem;">
                            <div>
                                <span class="text-muted">Patient ID:</span> 
                                <span class="badge-pill-custom badge-emerald font-mono fw-bold" style="font-size: 0.68rem; padding: 1px 6px;">
                                    <?php echo htmlspecialchars($payment['client_id']); ?>
                                </span>
                            </div>
                            <div>
                                <span class="text-muted">Phone:</span> 
                                <strong class="text-dark font-mono"><?php echo htmlspecialchars($payment['phone']); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Details Card -->
                <div class="col-12 col-md-6">
                    <div class="receipt-bento-box h-100">
                        <span class="bento-box-label">Transaction Details</span>
                        <div class="text-secondary small d-flex flex-column gap-1" style="font-size: 0.8125rem;">
                            <div>
                                <span class="text-muted">Applied Against:</span>
                                <strong class="text-dark font-mono">Invoice #<?php echo htmlspecialchars($payment['invoice_number']); ?></strong>
                            </div>
                            <div>
                                <span class="text-muted">Payment Channel:</span>
                                <span class="badge-pill-custom badge-zinc fw-bold"><?php echo htmlspecialchars($payment['payment_method']); ?></span>
                            </div>
                            <div>
                                <span class="text-muted">Cashier / Staff:</span>
                                <strong class="text-dark"><i class="fa-solid fa-user-check me-1 text-primary"></i><?php echo htmlspecialchars($payment['staff_name'] ?? 'Authorized Staff'); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 3. High-Impact Amount Cleared Box -->
            <div class="amount-cleared-banner my-4">
                <span class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.06em;">
                    Total Amount Received & Cleared
                </span>
                <div class="amount-cleared-value font-mono">
                    <?php echo DEFAULT_CURRENCY . number_format($payment['amount_paid'], 2); ?>
                </div>
                <small class="text-success fw-semibold" style="font-size: 0.78rem;">
                    <i class="fa-solid fa-shield-check me-1"></i> Transaction verified & updated on clinical statement
                </small>
            </div>

            <!-- 4. Invoice Balance Reconciliation -->
            <div class="d-flex justify-content-between align-items-center p-3 rounded-2 bg-slate-subtle mb-4" style="font-size: 0.8125rem;">
                <div>
                    <span class="text-muted">Total Invoiced Amount:</span>
                    <strong class="text-dark font-mono ms-1"><?php echo DEFAULT_CURRENCY . number_format($payment['total_amount'], 2); ?></strong>
                </div>
                <div>
                    <span class="text-muted">Remaining Balance:</span>
                    <strong class="font-mono ms-1 <?php echo $payment['balance'] > 0 ? 'text-danger' : 'text-success'; ?>">
                        <?php echo DEFAULT_CURRENCY . number_format($payment['balance'], 2); ?>
                    </strong>
                </div>
            </div>

            <?php if (!empty($payment['notes'])): ?>
                <div class="p-3 rounded-2 mb-4" style="background-color: #f8fafc; border: 1px solid var(--border-subtle); font-size: 0.78rem;">
                    <strong class="text-dark d-block mb-1">Transaction Notes / Reference:</strong>
                    <span class="text-secondary"><?php echo htmlspecialchars($payment['notes']); ?></span>
                </div>
            <?php endif; ?>

            <!-- 5. Printable Official Signature Section -->
            <div class="row pt-4 mt-4 border-top">
                <div class="col-6">
                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                        Authorized Clinical Signatory
                    </small>
                    <div class="signature-line mt-4"></div>
                    <small class="text-dark fw-bold d-block mt-1" style="font-size: 0.75rem;">Dr. I.K Holiness (Medical Officer)</small>
                    <small class="text-muted" style="font-size: 0.7rem;">I.K Holiness Home Care Services</small>
                </div>
                <div class="col-6 text-end">
                    <div class="official-stamp-box ms-auto">
                        <span>OFFICIAL CLINICAL STAMP</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* Modern Luxury Receipt Styles */
.modern-receipt-sheet {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
}

.receipt-logo-sq {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-size: 1.35rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
}

.badge-motto {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    padding: 2px 8px;
    border-radius: 20px;
    display: inline-block;
}

.receipt-bento-box {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 12px;
    padding: 16px 20px;
}

.bento-box-label {
    display: block;
    font-size: 0.68rem;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 6px;
}

.amount-cleared-banner {
    background-color: #f0fdf4;
    border: 1.5px solid #bbf7d0;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
}

.amount-cleared-value {
    font-size: 2.2rem;
    font-weight: 900;
    color: #15803d;
    line-height: 1.1;
    margin: 6px 0;
}

.signature-line {
    border-bottom: 1.5px dashed #94a3b8;
    width: 180px;
    height: 10px;
}

.official-stamp-box {
    width: 130px;
    height: 60px;
    border: 2px dashed #94a3b8;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #94a3b8;
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 0.05em;
}

@media print {
    .modern-receipt-sheet {
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
    }
}
</style>