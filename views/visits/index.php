<div class="row mb-4 no-print">
    <div class="col-12">
        <form action="<?php echo APP_URL; ?>/visits" method="GET" class="d-flex gap-2 w-100 max-width-md" style="max-width: 500px;">
            <div class="input-group">
                <span class="input-group-text bg-opacity-10 border-teal" style="background-color: rgba(13, 148, 136, 0.08); border-color: var(--border-color);"><i class="fa-solid fa-magnifying-glass text-teal" style="color: var(--accent-color);"></i></span>
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search by Patient Name or Client ID..." 
                       value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"
                       style="border-color: var(--border-color);">
            </div>
            <button type="submit" class="btn btn-accent px-4">Search</button>
            <?php if ($search !== ''): ?>
                <a href="<?php echo APP_URL; ?>/visits" class="btn btn-outline-secondary px-3" style="border-radius: 10px; display: flex; align-items: center;"><i class="fa-solid fa-xmark"></i></a>
            <?php endif; ?>
        </form>
    </div>
</div>

<!-- Visits List -->
<div class="custom-table-container">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Date / Time</th>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Chief Complaint</th>
                    <th>Diagnosis</th>
                    <th>Attending Staff</th>
                    <th class="text-end no-print">Profile</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($visits)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-folder-open fs-2 mb-3 d-block text-teal" style="color: var(--accent-color);"></i>
                            No clinical visit logs found. Navigate to "Clients", choose a patient, and click "Record New Visit".
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($visits as $v): ?>
                        <tr>
                            <td>
                                <strong><?php echo date('d/m/Y', strtotime($v['visit_date'])); ?></strong><br>
                                <small class="text-muted"><i class="fa-regular fa-clock me-1"></i> <?php echo date('g:i A', strtotime($v['visit_date'])); ?></small>
                            </td>
                            <td>
                                <span class="badge bg-opacity-10 text-teal py-2 px-3 border border-teal" style="background-color: rgba(45, 212, 191, 0.05); color: var(--accent-color); border-color: rgba(45, 212, 191, 0.25) !important;">
                                    <?php echo htmlspecialchars($v['client_id']); ?>
                                </span>
                            </td>
                            <td><strong class="text-white"><?php echo htmlspecialchars($v['client_name']); ?></strong></td>
                            <td>
                                <?php echo htmlspecialchars(substr($v['complaint'], 0, 50)) . (strlen($v['complaint']) > 50 ? '...' : ''); ?>
                            </td>
                            <td>
                                <span class="text-teal" style="color: var(--accent-color); font-weight: 500;">
                                    <?php echo $v['diagnosis'] ? htmlspecialchars(substr($v['diagnosis'], 0, 50)) . (strlen($v['diagnosis']) > 50 ? '...' : '') : 'Pending'; ?>
                                </span>
                            </td>
                            <td><small class="text-muted"><?php echo htmlspecialchars($v['staff_name']); ?></small></td>
                            <td class="text-end no-print">
                                <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $v['client_id']; ?>" class="btn btn-sm btn-outline-info" style="border-radius: 6px;">
                                    <i class="fa-solid fa-user-circle"></i> View Profile
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
