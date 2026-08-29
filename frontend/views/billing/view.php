<!-- Modern Executive Medical Invoice View -->
<div class="row justify-content-center">
    <div class="col-12 col-xl-10">
        
        <!-- Action Toolbar (Hidden in Print) -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4 no-print">
            <a href="<?php echo APP_URL; ?>/billing" class="btn-secondary-custom py-2 px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to Invoices
            </a>
            
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button onclick="window.print()" class="btn-secondary-custom py-2 px-3 shadow-sm">
                    <i class="fa-solid fa-print me-1"></i> Print Official Invoice
                </button>
                <?php if ($invoice['balance'] > 0): ?>
                    <a href="<?php echo APP_URL; ?>/payments/create?invoice_number=<?php echo $invoice['invoice_number']; ?>" class="btn-primary-custom py-2 px-3 shadow-sm">
                        <i class="fa-solid fa-wallet me-1"></i> Settle Payment (GH₵ <?php echo number_format($invoice['balance'], 2); ?>)
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Luxury Modern Printable Invoice Sheet -->
        <div class="modern-invoice-sheet p-4 p-md-5">
            
            <!-- 1. Header Letterhead Banner -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-4 pb-4 mb-4 border-bottom">
                
                <!-- Clinic Brand Info -->
                <div class="d-flex align-items-start gap-3">
                    <div class="invoice-logo-sq">
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

                <!-- Invoice Meta & Status -->
                <div class="text-start text-md-end">
                    <div class="text-uppercase fw-bold text-muted" style="font-size: 0.72rem; letter-spacing: 0.08em;">Official Medical Statement</div>
                    <h2 class="fw-bold text-dark font-mono mb-1" style="font-size: 1.6rem; letter-spacing: -0.02em;">
                        <?php echo htmlspecialchars($invoice['invoice_number']); ?>
                    </h2>
                    <div class="d-flex align-items-center justify-content-md-end gap-2 my-2">
                        <?php
                        $statBadge = 'badge-rose';
                        $statLabel = 'UNPAID';
                        if ($invoice['payment_status'] === 'Paid') {
                            $statBadge = 'badge-emerald';
                            $statLabel = 'PAID IN FULL';
                        } elseif ($invoice['payment_status'] === 'Partially Paid') {
                            $statBadge = 'badge-amber';
                            $statLabel = 'PARTIALLY PAID';
                        }
                        ?>
                        <span class="badge-pill-custom <?php echo $statBadge; ?> font-mono fw-bold py-1 px-2" style="font-size: 0.75rem;">
                            <i class="fa-solid <?php echo $invoice['payment_status'] === 'Paid' ? 'fa-circle-check' : 'fa-clock'; ?> me-1"></i>
                            <?php echo $statLabel; ?>
                        </span>
                    </div>
                    <div class="text-muted small font-mono" style="font-size: 0.75rem;">
                        <strong>Date:</strong> <?php echo date('d F Y', strtotime($invoice['invoice_date'])); ?>
                    </div>
                </div>

            </div>

            <!-- 2. Billed Patient & Payment Summary Bento Cards -->
            <div class="row g-3 mb-4">
                
                <!-- Billed Patient Card -->
                <div class="col-12 col-md-6">
                    <div class="invoice-bento-box h-100">
                        <span class="bento-box-label">Billed Patient / Client</span>
                        <h6 class="fw-bold text-dark mb-1" style="font-size: 1rem;">
                            <?php echo htmlspecialchars($invoice['full_name']); ?>
                        </h6>
                        <div class="text-secondary small d-flex flex-column gap-1" style="font-size: 0.8125rem;">
                            <div>
                                <span class="text-muted">Patient ID:</span> 
                                <span class="badge-pill-custom badge-emerald font-mono fw-bold" style="font-size: 0.68rem; padding: 1px 6px;">
                                    <?php echo htmlspecialchars($invoice['client_id']); ?>
                                </span>
                                <span class="ms-1">&bull; <?php echo htmlspecialchars($invoice['gender']); ?></span>
                            </div>
                            <div>
                                <span class="text-muted">Contact Phone:</span> 
                                <strong class="text-dark font-mono"><?php echo htmlspecialchars($invoice['phone']); ?></strong>
                            </div>
                            <div>
                                <span class="text-muted">Care Address:</span> 
                                <span><?php echo nl2br(htmlspecialchars($invoice['address'])); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account & Balance Due Card -->
                <div class="col-12 col-md-6">
                    <div class="invoice-bento-box h-100 <?php echo $invoice['balance'] > 0 ? 'border-danger-subtle' : 'border-success-subtle'; ?>">
                        <span class="bento-box-label">Statement Balance Summary</span>
                        
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-secondary small">Total Invoiced Charges:</span>
                            <strong class="text-dark font-mono"><?php echo DEFAULT_CURRENCY . number_format($invoice['total_amount'], 2); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-secondary small">Amount Settled / Cleared:</span>
                            <strong class="text-success font-mono"><?php echo DEFAULT_CURRENCY . number_format($invoice['amount_paid'], 2); ?></strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="fw-bold text-dark small">Outstanding Balance Due:</span>
                            <strong class="font-mono fs-5 <?php echo $invoice['balance'] > 0 ? 'text-danger' : 'text-success'; ?>">
                                <?php echo DEFAULT_CURRENCY . number_format($invoice['balance'], 2); ?>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 3. Itemized Services Table -->
            <div class="table-responsive mb-4">
                <table class="ui-table invoice-items-table">
                    <thead>
                        <tr>
                            <th style="width: 8%;">#</th>
                            <th style="width: 52%;">Description of Clinical / Home Care Services</th>
                            <th style="width: 10%; text-align: center;">Qty</th>
                            <th style="width: 15%; text-align: right;">Unit Price</th>
                            <th style="width: 15%; text-align: right;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $idx = 1; foreach ($items as $item): ?>
                            <tr>
                                <td class="text-muted font-mono"><?php echo sprintf('%02d', $idx++); ?></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="service-item-dot"></div>
                                        <strong class="text-dark fw-semibold" style="font-size: 0.85rem;">
                                            <?php echo htmlspecialchars($item['service_description']); ?>
                                        </strong>
                                    </div>
                                </td>
                                <td class="text-center font-mono"><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td class="text-end font-mono text-secondary"><?php echo DEFAULT_CURRENCY . number_format($item['unit_price'], 2); ?></td>
                                <td class="text-end font-mono text-dark fw-bold"><?php echo DEFAULT_CURRENCY . number_format($item['subtotal'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- 4. Financial Calculation Summary Bento -->
            <div class="row justify-content-end mb-4">
                <div class="col-12 col-md-5">
                    <div class="total-summary-card p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2" style="font-size: 0.8125rem;">
                            <span class="text-secondary">Gross Subtotal:</span>
                            <span class="text-dark font-mono fw-semibold"><?php echo DEFAULT_CURRENCY . number_format($invoice['total_amount'], 2); ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2" style="font-size: 0.8125rem;">
                            <span class="text-secondary">Amount Settled:</span>
                            <span class="text-success font-mono fw-semibold"><?php echo DEFAULT_CURRENCY . number_format($invoice['amount_paid'], 2); ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top" style="font-size: 0.92rem;">
                            <strong class="text-dark">Net Balance Due:</strong>
                            <strong class="font-mono <?php echo $invoice['balance'] > 0 ? 'text-danger' : 'text-success'; ?>" style="font-size: 1.15rem;">
                                <?php echo DEFAULT_CURRENCY . number_format($invoice['balance'], 2); ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Payment Receipt History (If exists) -->
            <?php if (!empty($payments)): ?>
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="icon-sq bg-blue-subtle text-primary" style="width: 24px; height: 24px; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 0.72rem;">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <strong class="text-dark" style="font-size: 0.85rem;">Payment Receipt Transaction History</strong>
                    </div>

                    <div class="table-responsive">
                        <table class="ui-table">
                            <thead>
                                <tr>
                                    <th>Receipt #</th>
                                    <th>Date & Time</th>
                                    <th>Payment Method</th>
                                    <th>Received By</th>
                                    <th class="text-end">Amount Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payments as $p): ?>
                                    <tr>
                                        <td><strong class="text-dark font-mono"><?php echo htmlspecialchars($p['receipt_number']); ?></strong></td>
                                        <td><span class="text-secondary"><?php echo date('d/m/Y \a\t g:i A', strtotime($p['payment_date'])); ?></span></td>
                                        <td><span class="badge-pill-custom badge-zinc"><?php echo htmlspecialchars($p['payment_method']); ?></span></td>
                                        <td><small class="text-muted"><i class="fa-solid fa-user-check me-1 text-primary"></i><?php echo htmlspecialchars($p['staff_name']); ?></small></td>
                                        <td class="text-end font-mono fw-bold text-success"><?php echo DEFAULT_CURRENCY . number_format($p['amount_paid'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <!-- 6. Printable Official Signature Section -->
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
/* Modern Luxury Medical Invoice Styles */
.modern-invoice-sheet {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
}

.invoice-logo-sq {
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

.invoice-bento-box {
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

.service-item-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: var(--accent-main);
    flex-shrink: 0;
}

.total-summary-card {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 12px;
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
    .modern-invoice-sheet {
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
    }
}
</style>