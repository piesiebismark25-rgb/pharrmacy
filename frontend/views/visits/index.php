<div class="row mb-3 no-print align-items-center justify-content-between g-3">
    <div class="col-12 col-md-6 col-lg-5">
        <form action="<?php echo APP_URL; ?>/visits" method="GET" class="d-flex gap-2">
            <div class="modern-search-wrap">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" 
                       name="search" 
                       class="modern-search-input" 
                       placeholder="Search encounters by patient name or ID..." 
                       value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <button type="submit" class="btn-primary-custom px-3">Search</button>
            <?php if (!empty($search)): ?>
                <a href="<?php echo APP_URL; ?>/visits" class="btn-secondary-custom px-2"><i class="fa-solid fa-xmark"></i></a>
            <?php endif; ?>
        </form>
    </div>

    <div class="col-12 col-md-auto">
        <a href="<?php echo APP_URL; ?>/clients" class="btn-primary-custom">
            <i class="fa-solid fa-notes-medical"></i>
            <span>Select Patient to Record Visit</span>
        </a>
    </div>
</div>

<div class="ui-table-container">
    <div class="table-responsive">
        <table class="ui-table">
            <thead>
                <tr>
                    <th>Date / Time</th>
                    <th>Patient ID</th>
                    <th>Patient Full Name</th>
                    <th>Chief Complaint</th>
                    <th>Clinical Diagnosis</th>
                    <th>Attending Doctor</th>
                    <th class="text-end no-print">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($visits)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-stethoscope fs-3 mb-2 d-block text-muted"></i>
                            No clinical encounter logs found. Navigate to Patient Directory to start an encounter.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($visits as $v): ?>
                        <tr>
                            <td>
                                <strong class="text-dark d-block"><?php echo date('d/m/Y', strtotime($v['visit_date'])); ?></strong>
                                <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($v['visit_date'])); ?></small>
                            </td>
                            <td>
                                <span class="badge-pill-custom badge-emerald font-mono">
                                    <?php echo htmlspecialchars($v['client_id']); ?>
                                </span>
                            </td>
                            <td><strong class="text-dark" style="font-size: 0.85rem;"><?php echo htmlspecialchars($v['client_name']); ?></strong></td>
                            <td>
                                <span class="text-secondary" style="font-size: 0.8rem;">
                                    <?php echo htmlspecialchars(substr($v['complaint'], 0, 45)) . (strlen($v['complaint']) > 45 ? '...' : ''); ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge-pill-custom badge-emerald">
                                    <?php echo $v['diagnosis'] ? htmlspecialchars(substr($v['diagnosis'], 0, 45)) : 'Pending Assessment'; ?>
                                </span>
                            </td>
                            <td><small class="text-muted"><?php echo htmlspecialchars($v['staff_name']); ?></small></td>
                            <td class="text-end no-print">
                                <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $v['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2">
                                    <i class="fa-solid fa-id-card-clip"></i> Dossier
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>