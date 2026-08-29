<div class="row justify-content-center">
    <div class="col-12 col-xl-10">
        <form action="<?php echo APP_URL; ?>/billing/store" method="POST" id="invoiceForm">
            
            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-user-check text-teal me-2" style="color: var(--accent-teal);"></i> Invoice Recipient / Patient Selection
                </h5>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="client_id" class="form-label">Select Patient <span class="text-danger">*</span></label>
                        <select name="client_id" id="client_id" class="form-select" required>
                            <option value="">-- Choose Patient from Directory --</option>
                            <?php foreach ($allClients as $c): ?>
                                <option value="<?php echo $c['client_id']; ?>" <?php echo (isset($client['client_id']) && $client['client_id'] === $c['client_id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($c['client_id'] . ' - ' . $c['full_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Invoice Date</label>
                        <input type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>" disabled>
                    </div>
                </div>
            </div>

            <!-- Itemized Services Builder -->
            <div class="ui-card mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-list-check text-teal me-2" style="color: var(--accent-teal);"></i> Itemized Care Services & Charges</h5>
                        <small class="text-muted">Select from I.K Holiness 16 core services or add custom clinical items</small>
                    </div>
                    <button type="button" class="btn-secondary-custom btn-sm" onclick="addItemRow()">
                        <i class="fa-solid fa-plus me-1"></i> Add Another Line
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="ui-table" id="itemsTable">
                        <thead>
                            <tr>
                                <th style="width: 50%;">Service Description / Procedure</th>
                                <th style="width: 15%;">Qty</th>
                                <th style="width: 20%;">Unit Price (<?php echo DEFAULT_CURRENCY; ?>)</th>
                                <th style="width: 15%;" class="text-end">Subtotal</th>
                                <th style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody id="itemsBody">
                            <tr>
                                <td>
                                    <input type="text" name="services[]" class="form-control item-desc" list="serviceOptions" placeholder="e.g. Glucose Monitoring & Vital Signs" required>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control item-qty" value="1" min="1" onchange="calculateTotal()" required>
                                </td>
                                <td>
                                    <input type="number" step="0.5" name="prices[]" class="form-control item-price" placeholder="50.00" onchange="calculateTotal()" required>
                                </td>
                                <td class="text-end fw-bold text-white item-subtotal">GHâ‚µ 0.00</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm text-danger" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- 16 Services Datalist for autocomplete -->
                <datalist id="serviceOptions">
                    <option value="Glucose Monitoring">
                    <option value="Vital Signs Monitoring">
                    <option value="Bed Bathing Procedure">
                    <option value="Catheterization">
                    <option value="Hospital Escort Service">
                    <option value="Serving Medication">
                    <option value="Nutritional Management & Dietary Plan">
                    <option value="Blood Sampling for Laboratory Investigations">
                    <option value="Post Operative Home Care">
                    <option value="Health Talk & Lifestyle Counseling">
                    <option value="Physiotherapy and Exercise Session">
                    <option value="Catheter Care & Flushing">
                    <option value="Wound Dressing & Aseptic Care">
                    <option value="Oral Hygiene Care">
                    <option value="NG Tube Feeding Procedure">
                    <option value="Medical Consultation & Advice">
                </datalist>

                <!-- Total Summary Bar -->
                <div class="d-flex justify-content-end align-items-center gap-4 mt-4 pt-3 border-top" style="border-color: var(--border-subtle) !important;">
                    <div class="text-muted" style="font-size: 0.9rem;">Invoice Total Charge:</div>
                    <div class="fs-3 fw-bold text-emerald" id="grandTotal" style="color: #34d399;">GHâ‚µ 0.00</div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-3">
                <a href="<?php echo APP_URL; ?>/billing" class="btn-secondary-custom px-4">Cancel</a>
                <button type="submit" class="btn-primary-custom px-5">
                    <i class="fa-solid fa-file-circle-check me-2"></i> Issue & Save Invoice
                </button>
            </div>

        </form>
    </div>
</div>

<script>
function addItemRow() {
    const tbody = document.getElementById('itemsBody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td>
            <input type="text" name="services[]" class="form-control item-desc" list="serviceOptions" placeholder="e.g. Wound Dressing & Catheter Care" required>
        </td>
        <td>
            <input type="number" name="quantities[]" class="form-control item-qty" value="1" min="1" onchange="calculateTotal()" required>
        </td>
        <td>
            <input type="number" step="0.5" name="prices[]" class="form-control item-price" placeholder="50.00" onchange="calculateTotal()" required>
        </td>
        <td class="text-end fw-bold text-white item-subtotal">GHâ‚µ 0.00</td>
        <td class="text-center">
            <button type="button" class="btn btn-sm text-danger" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button>
        </td>
    `;
    tbody.appendChild(tr);
}

function removeItemRow(btn) {
    const tbody = document.getElementById('itemsBody');
    if (tbody.children.length > 1) {
        btn.closest('tr').remove();
        calculateTotal();
    }
}

function calculateTotal() {
    const rows = document.querySelectorAll('#itemsBody tr');
    let total = 0;
    rows.forEach(r => {
        const qty = parseFloat(r.querySelector('.item-qty').value) || 0;
        const price = parseFloat(r.querySelector('.item-price').value) || 0;
        const sub = qty * price;
        r.querySelector('.item-subtotal').innerText = 'GHâ‚µ ' + sub.toFixed(2);
        total += sub;
    });
    document.getElementById('grandTotal').innerText = 'GHâ‚µ ' + total.toFixed(2);
}
</script>