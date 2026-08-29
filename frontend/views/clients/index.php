<div class="row mb-4 no-print align-items-center justify-content-between g-3">
    <!-- Search bar -->
    <div class="col-12 col-md-6">
        <form action="<?php echo APP_URL; ?>/clients" method="GET" class="d-flex gap-2">
            <div class="input-group">
                <span class="input-group-text bg-opacity-10 border-0" style="background-color: var(--surface-card); color: var(--accent-teal); border: 1px solid var(--border-subtle); border-right: none; border-radius: var(--radius-sm) 0 0 var(--radius-sm);">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search by Patient ID, Full Name, or Phone..." 
                       value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                       style="border-left: none; border-radius: 0 var(--radius-sm) var(--radius-sm) 0;">
            </div>
            <button type="submit" class="btn-primary-custom px-4">Search</button>
            <?php if (!empty($search)): ?>
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom px-3" title="Clear Filter">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Action Button -->
    <div class="col-12 col-md-auto">
        <a href="<?php echo APP_URL; ?>/clients/create" class="btn-primary-custom w-100">
            <i class="fa-solid fa-user-plus"></i>
            <span>Register New Patient</span>
        </a>
    </div>
</div>

<!-- Patient Directory Table -->
<div class="ui-table-container">
    <div class="table-responsive">
        <table class="ui-table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Full Name & Demographics</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Registration Date</th>
                    <th class="text-end no-print">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($clients)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-user-group fs-2 mb-3 d-block text-muted"></i>
                            No patient records found. Click <strong>"Register New Patient"</strong> to add one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($clients as $c): ?>
                        <tr>
                            <td>
                                <span class="badge-pill-custom badge-emerald font-monospace fw-bold">
                                    <?php echo htmlspecialchars($c['client_id']); ?>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-box">
                                        <?php echo strtoupper(substr($c['full_name'], 0, 2)); ?>
                                    </div>
                                    <div>
                                        <strong class="text-white d-block" style="font-size: 0.95rem;"><?php echo htmlspecialchars($c['full_name']); ?></strong>
                                        <small class="text-muted"><?php echo htmlspecialchars($c['age']); ?> yrs &bull; DOB: <?php echo date('d/m/Y', strtotime($c['dob'])); ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-secondary"><?php echo htmlspecialchars($c['gender']); ?></span>
                            </td>
                            <td>
                                <span class="text-white fw-medium"><i class="fa-solid fa-phone text-muted me-1" style="font-size: 0.75rem;"></i> <?php echo htmlspecialchars($c['phone']); ?></span>
                            </td>
                            <td>
                                <span class="text-muted"><?php echo date('d/m/Y', strtotime($c['registration_date'])); ?></span>
                            </td>
                            <td class="text-end no-print">
                                <div class="btn-group gap-2">
                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $c['client_id']; ?>" class="btn-secondary-custom btn-sm" title="View Patient Medical Dossier">
                                        <i class="fa-solid fa-id-card-clip"></i> Dossier
                                    </a>
                                    <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $c['client_id']; ?>" class="btn-secondary-custom btn-sm" title="Edit Patient Info">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                        <a href="<?php echo APP_URL; ?>/clients/delete?id=<?php echo $c['client_id']; ?>" 
                                           onclick="return confirm('Are you sure you want to delete patient <?php echo htmlspecialchars(addslashes($c['full_name'])); ?>?');" 
                                           class="btn btn-sm btn-outline-danger" 
                                           style="border-radius: var(--radius-sm); padding: 6px 10px;" 
                                           title="Delete Record">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>