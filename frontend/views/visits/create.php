<div class="row justify-content-center">
    <div class="col-12 col-xl-10">
        <form action="<?php echo APP_URL; ?>/visits/store" method="POST" autocomplete="off">
            <input type="hidden" name="client_id" value="<?php echo htmlspecialchars($client['client_id']); ?>">

            <!-- Patient Demographic Header Bar -->
            <div class="ui-card mb-4" style="background: linear-gradient(135deg, rgba(20, 184, 166, 0.1) 0%, var(--surface-card) 100%); border-color: var(--border-active);">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-box" style="width: 50px; height: 50px; font-size: 1.15rem;">
                            <?php echo strtoupper(substr($client['full_name'], 0, 2)); ?>
                        </div>
                        <div>
                            <h4 class="fw-bold text-white mb-0"><?php echo htmlspecialchars($client['full_name']); ?></h4>
                            <span class="text-muted" style="font-size: 0.85rem;">
                                ID: <strong class="text-white"><?php echo htmlspecialchars($client['client_id']); ?></strong> &bull; 
                                <?php echo htmlspecialchars($client['gender']); ?>, <?php echo htmlspecialchars($client['age']); ?> Years &bull; 
                                Tel: <?php echo htmlspecialchars($client['phone']); ?>
                            </span>
                        </div>
                    </div>
                    <span class="badge-pill-custom badge-emerald p-2 px-3">
                        <i class="fa-solid fa-stethoscope"></i> Clinical Encounter Session
                    </span>
                </div>
            </div>

            <!-- Section 1: Vital Signs Tracker -->
            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-heart-pulse text-teal me-2" style="color: var(--accent-teal);"></i> Patient Vital Signs & Biometrics
                </h5>

                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-md-3">
                        <label for="temperature" class="form-label">Body Temp (Â°C)</label>
                        <input type="text" name="temperature" id="temperature" class="form-control" placeholder="e.g. 36.8">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <label for="bp" class="form-label">Blood Pressure (mmHg)</label>
                        <input type="text" name="bp" id="bp" class="form-control" placeholder="e.g. 120/80">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <label for="weight" class="form-label">Body Weight (kg)</label>
                        <input type="text" name="weight" id="weight" class="form-control" placeholder="e.g. 72.5">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <label class="form-label">Encounter Date</label>
                        <input type="text" class="form-control" value="<?php echo date('d/m/Y H:i A'); ?>" disabled>
                    </div>
                </div>
            </div>

            <!-- Section 2: Home Care Services Rendered (All 16 Services from Flyer) -->
            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-2">
                    <i class="fa-solid fa-hand-holding-medical text-teal me-2" style="color: var(--accent-teal);"></i> Home Care Procedures Rendered During Visit
                </h5>
                <p class="text-muted mb-3" style="font-size: 0.82rem;">Select all procedures performed for this patient:</p>

                <div class="row g-2">
                    <?php
                    $servicesOptions = [
                        'Glucose Monitoring', 'Vital Signs Monitoring', 'Bed Bathing', 'Catheterization',
                        'Hospital Escort', 'Serving Medication', 'Nutritional Management', 'Blood Sampling for Lab',
                        'Post Operative Care', 'Health Talk', 'Physiotherapy & Exercise', 'Catheter Care',
                        'Wound Dressing', 'Oral Care', 'NG Tube Feeding', 'Medical Advice & Consult'
                    ];
                    foreach ($servicesOptions as $svc):
                    ?>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label class="d-flex align-items-center gap-2 p-2 rounded-2" style="background-color: var(--bg-base); border: 1px solid var(--border-subtle); cursor: pointer;">
                                <input type="checkbox" name="services_rendered[]" value="<?php echo $svc; ?>" class="form-check-input mt-0" style="background-color: var(--surface-card); border-color: var(--border-subtle);">
                                <span class="text-secondary" style="font-size: 0.82rem;"><?php echo $svc; ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Section 3: Clinical Findings, Diagnosis & Prescription -->
            <div class="ui-card mb-4">
                <h5 class="fw-bold text-white mb-4 pb-2 border-bottom" style="border-color: var(--border-subtle) !important;">
                    <i class="fa-solid fa-notes-medical text-teal me-2" style="color: var(--accent-teal);"></i> Clinical Findings & Medical Order
                </h5>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="complaint" class="form-label">Chief Complaint & History <span class="text-danger">*</span></label>
                        <textarea name="complaint" id="complaint" rows="3" class="form-control" placeholder="Patient's primary health concern and timeline..." required></textarea>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="symptoms" class="form-label">Physical Examination & Symptoms</label>
                        <textarea name="symptoms" id="symptoms" rows="3" class="form-control" placeholder="Observed symptoms, clinical examination findings..."></textarea>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="diagnosis" class="form-label">Clinical Diagnosis / Working Assessment</label>
                        <textarea name="diagnosis" id="diagnosis" rows="3" class="form-control" placeholder="e.g. Type 2 Diabetes management / Hypertension Stage 1..."></textarea>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="treatment" class="form-label">Care & Procedures Done</label>
                        <textarea name="treatment" id="treatment" rows="3" class="form-control" placeholder="Wound dressing completed, IV fluids administered, etc..."></textarea>
                    </div>

                    <div class="col-12">
                        <label for="prescription" class="form-label text-white">
                            <i class="fa-solid fa-prescription text-teal me-1" style="color: var(--accent-teal);"></i> Prescription & Medication Orders
                        </label>
                        <textarea name="prescription" id="prescription" rows="3" class="form-control text-teal fw-semibold" style="color: #34d399 !important;" placeholder="Drug Name, Dosage (e.g. 500mg), Frequency (e.g. BD/TDS), Duration (e.g. 7 days)..."></textarea>
                    </div>

                    <div class="col-12">
                        <label for="notes" class="form-label text-muted">Confidential Doctor's Notes (Private)</label>
                        <textarea name="notes" id="notes" rows="2" class="form-control" placeholder="Next review date, dietary instructions, specialized precautions..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-3">
                <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $client['client_id']; ?>" class="btn-secondary-custom px-4">Cancel</a>
                <button type="submit" class="btn-primary-custom px-5">
                    <i class="fa-solid fa-check me-2"></i> Save Clinical Encounter
                </button>
            </div>

        </form>
    </div>
</div>