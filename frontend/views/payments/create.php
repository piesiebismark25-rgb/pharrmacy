<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
        <form action="<?php echo APP_URL; ?>/payments/store" method="POST">
            <input type="hidden" name="invoice_number" value="<?php echo htmlspecialchars($invoice['invoice_number']); ?>">

            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-cash-register text-teal me-2" style="color: var(--accent-teal);"></i> Settle Invoice #<?php echo htmlspecialchars($invoice['invoice_number']); ?>
                </h5>

                <div class="p-3 rounded-3 mb-4" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle);">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Patient Name:</span>
                        <strong class="text-white"><?php echo htmlspecialchars($invoice['full_name']); ?></strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Invoice Charge:</span>
                        <strong class="text-white"><?php echo DEFAULT_CURRENCY . number_format($invoice['total_amount'], 2); ?></strong>
                    </div>
                    <div class="d-flex justify-content-between fs-5 pt-2 border-top" style="border-color: var(--border-subtle) !important;">
                        <strong class="text-danger">Current Balance Due:</strong>
                        <strong class="text-danger"><?php echo DEFAULT_CURRENCY . number_format($invoice['balance'], 2); ?></strong>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="amount_paid" class="form-label">Payment Amount (<?php echo DEFAULT_CURRENCY; ?>) <span class="text-danger">*</span></label>
                    <input type="number" step="0.5" name="amount_paid" id="amount_paid" class="form-control fs-5 fw-bold text-teal" value="<?php echo htmlspecialchars($invoice['balance']); ?>" max="<?php echo htmlspecialchars($invoice['balance']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method <span class="text-danger">*</span></label>
                    <select name="payment_method" id="payment_method" class="form-select" required>
                        <option value="Cash">Cash Settlement</option>
                        <option value="Mobile Money">Mobile Money (MTN / Telecel / AT)</option>
                        <option value="Card">Bank Card / POS</option>
                        <option value="Bank Transfer">Bank Wire Transfer</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="notes" class="form-label">Transaction Reference / Receipt Notes</label>
                    <input type="text" name="notes" id="notes" class="form-control" placeholder="e.g. MoMo Transaction ID: 1234567890">
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="<?php echo APP_URL; ?>/billing/view?id=<?php echo $invoice['invoice_number']; ?>" class="btn-secondary-custom px-4">Cancel</a>
                    <button type="submit" class="btn-primary-custom px-5">
                        <i class="fa-solid fa-receipt me-2"></i> Confirm Payment & Issue Receipt
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>