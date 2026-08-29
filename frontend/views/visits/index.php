<!-- Clinical Encounters Master Ledger View -->
<div class="encounters-ledger-wrapper">

    <!-- 1. Executive Metric KPI Tiles -->
    <div class="row g-3 mb-4">
        <!-- Tile 1: Total Encounters -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="kpi-banner-card kpi-blue">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="kpi-label">Total Encounters Logged</span>
                        <div class="kpi-val"><?php echo count($visits); ?></div>
                        <small class="kpi-desc">Lifetime clinical home visits</small>
                    </div>
                    <div class="kpi-icon-pill">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tile 2: Today's Consultations -->
        <div class="col-12 col-sm-6 col-xl-4">
            <?php
            $todayCount = 0;
            $todayStr = date('Y-m-d');
            foreach ($visits as $v) {
                if (date('Y-m-d', strtotime($v['visit_date'])) === $todayStr) {
                    $todayCount++;
                }
            }
            ?>
            <div class="kpi-banner-card kpi-teal">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="kpi-label">Today's Visits</span>
                        <div class="kpi-val"><?php echo $todayCount; ?></div>
                        <small class="kpi-desc">Conducted today &bull; <?php echo date('d M Y'); ?></small>
                    </div>
                    <div class="kpi-icon-pill">
                        <i class="fa-solid fa-house-medical"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tile 3: Active Patient Coverage -->
        <div class="col-12 col-sm-12 col-xl-4">
            <?php
            $uniquePatients = count(array_unique(array_column($visits, 'client_id')));
            ?>
            <div class="kpi-banner-card kpi-emerald">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="kpi-label">Patients Attended</span>
                        <div class="kpi-val"><?php echo $uniquePatients; ?></div>
                        <small class="kpi-desc">Unique patients with clinical logs</small>
                    </div>
                    <div class="kpi-icon-pill">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Search & Action Toolbar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3 mb-4 no-print">
        <!-- Search Input -->
        <div style="max-width: 480px; width: 100%;">
            <form action="<?php echo APP_URL; ?>/visits" method="GET" class="d-flex gap-2">
                <div class="modern-search-wrap">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" 
                           name="search" 
                           class="modern-search-input" 
                           placeholder="Search encounters by patient, diagnosis, or ID..." 
                           value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <button type="submit" class="btn-primary-custom px-3">
                    <i class="fa-solid fa-magnifying-glass me-1"></i> Search
                </button>
                <?php if (!empty($search)): ?>
                    <a href="<?php echo APP_URL; ?>/visits" class="btn-secondary-custom px-3" title="Clear Filter">
                        <i class="fa-solid fa-xmark me-1"></i> Clear
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Action: Start Visit -->
        <div>
            <a href="<?php echo APP_URL; ?>/clients" class="btn-primary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-notes-medical me-1"></i> Select Patient to Record Visit
            </a>
        </div>
    </div>

    <!-- 3. Clinical Encounters Master Ledger Table -->
    <div class="ui-table-container">
        <div class="tanstack-table-header">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-stethoscope"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Clinical Encounters & Domiciliary Logs</h6>
                    <small class="text-muted">Comprehensive master audit of patient visits & consultations</small>
                </div>
            </div>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.72rem;">
                Total: <?php echo count($visits); ?> Records
            </span>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th style="width: 14%;">Date & Time</th>
                        <th style="width: 22%;">Patient Info</th>
                        <th style="width: 26%;">Chief Complaint</th>
                        <th style="width: 22%;">Clinical Diagnosis</th>
                        <th style="width: 10%;">Doctor</th>
                        <th style="width: 6%; text-align: right;" class="no-print">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($visits)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-stethoscope fs-3 mb-2 d-block text-muted"></i>
                                No clinical encounter logs found. Navigate to Patient Directory to start an encounter.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($visits as $v): ?>
                            <tr>
                                <!-- Date & Time -->
                                <td>
                                    <strong class="text-dark d-block" style="font-size: 0.84rem; white-space: nowrap;">
                                        <?php echo date('d/m/Y', strtotime($v['visit_date'])); ?>
                                    </strong>
                                    <small class="text-muted font-mono" style="font-size: 0.72rem; white-space: nowrap;">
                                        <i class="fa-regular fa-clock text-primary me-1"></i><?php echo date('g:i A', strtotime($v['visit_date'])); ?>
                                    </small>
                                </td>

                                <!-- Patient Info -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle-visit flex-shrink-0">
                                            <?php echo strtoupper(substr($v['client_name'] ?? 'P', 0, 2)); ?>
                                        </div>
                                        <div class="min-w-0">
                                            <strong class="text-dark d-block text-truncate" style="font-size: 0.85rem;">
                                                <?php echo htmlspecialchars($v['client_name']); ?>
                                            </strong>
                                            <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.68rem; padding: 1px 6px; white-space: nowrap;">
                                                <?php echo htmlspecialchars($v['client_id']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Chief Complaint -->
                                <td>
                                    <div class="text-secondary small" style="line-height: 1.35; font-size: 0.8125rem;">
                                        <i class="fa-regular fa-clipboard text-muted me-1"></i>
                                        <?php echo htmlspecialchars($v['complaint']); ?>
                                    </div>
                                </td>

                                <!-- Clinical Diagnosis -->
                                <td>
                                    <?php if (!empty($v['diagnosis'])): ?>
                                        <span class="diagnosis-badge">
                                            <i class="fa-solid fa-notes-medical me-1 text-primary"></i>
                                            <?php echo htmlspecialchars($v['diagnosis']); ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge-pill-custom badge-zinc" style="font-size: 0.72rem;">Pending Assessment</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Doctor -->
                                <td>
                                    <small class="text-dark fw-medium" style="font-size: 0.78rem; white-space: nowrap;">
                                        <i class="fa-solid fa-user-doctor text-primary me-1"></i><?php echo htmlspecialchars($v['staff_name']); ?>
                                    </small>
                                </td>

                                <!-- Action -->
                                <td style="text-align: right;" class="no-print">
                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $v['client_id']; ?>" 
                                       class="btn-secondary-custom btn-sm py-1 px-2" 
                                       style="font-size: 0.75rem;" 
                                       title="View Patient Medical Dossier">
                                        <i class="fa-solid fa-id-card-clip me-1 text-primary"></i> Dossier
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
/* Clean Clinical Encounters Ledger Architecture */
.encounters-ledger-wrapper {
    max-width: 100%;
}

/* KPI Banner Cards */
.kpi-banner-card {
    border-radius: var(--radius-lg);
    padding: 18px 22px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    transition: transform 0.2s ease;
}

.kpi-banner-card:hover {
    transform: translateY(-2px);
}

.kpi-blue {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 60%, #3b82f6 100%);
}

.kpi-teal {
    background: linear-gradient(135deg, #0f766e 0%, #0d9488 60%, #14b8a6 100%);
}

.kpi-emerald {
    background: linear-gradient(135deg, #15803d 0%, #16a34a 60%, #22c55e 100%);
}

.kpi-label {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    opacity: 0.9;
    display: block;
}

.kpi-val {
    font-size: 1.6rem;
    font-weight: 800;
    line-height: 1.1;
    margin: 4px 0 2px 0;
}

.kpi-desc {
    font-size: 0.72rem;
    opacity: 0.85;
    display: block;
}

.kpi-icon-pill {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.avatar-circle-visit {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
}

.diagnosis-badge {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
    padding: 4px 10px;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-block;
    line-height: 1.3;
}
</style>