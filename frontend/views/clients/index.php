<div class="row mb-3 no-print align-items-center justify-content-between g-3">
    <!-- Modern Search Bar -->
    <div class="col-12 col-md-6 col-lg-5">
        <form action="<?php echo APP_URL; ?>/clients" method="GET" class="d-flex gap-2">
            <div class="modern-search-wrap">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" 
                       name="search" 
                       class="modern-search-input" 
                       placeholder="Search by ID, name, or phone number..." 
                       value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <button type="submit" class="btn-primary-custom px-3">Search</button>
            <?php if (!empty($search)): ?>
                <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom px-2" title="Clear Filter">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Action Button -->
    <div class="col-12 col-md-auto">
        <a href="<?php echo APP_URL; ?>/clients/create" class="btn-primary-custom">
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
                            <i class="fa-solid fa-user-group fs-3 mb-2 d-block text-muted"></i>
                            No patient records found. Click <strong>"Register New Patient"</strong> to add one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($clients as $c): ?>
                        <tr>
                            <td>
                                <span class="badge-pill-custom badge-emerald font-mono fw-bold">
                                    <?php echo htmlspecialchars($c['client_id']); ?>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-box" style="width: 30px; height: 30px; font-size: 0.72rem;">
                                        <?php echo strtoupper(substr($c['full_name'], 0, 2)); ?>
                                    </div>
                                    <div>
                                        <strong class="text-dark d-block" style="font-size: 0.85rem;"><?php echo htmlspecialchars($c['full_name']); ?></strong>
                                        <small class="text-muted"><?php echo htmlspecialchars($c['age']); ?> yrs &bull; DOB: <?php echo date('d/m/Y', strtotime($c['dob'])); ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-pill-custom badge-zinc"><?php echo htmlspecialchars($c['gender']); ?></span>
                            </td>
                            <td>
                                <span class="text-dark fw-medium"><i class="fa-solid fa-phone text-muted me-1" style="font-size: 0.7rem;"></i> <?php echo htmlspecialchars($c['phone']); ?></span>
                            </td>
                            <td>
                                <span class="text-muted"><?php echo date('d/m/Y', strtotime($c['registration_date'])); ?></span>
                            </td>
                            <td class="text-end no-print">
                                <div class="btn-group gap-1">
                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $c['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2" title="View Patient Medical Dossier">
                                        <i class="fa-solid fa-id-card-clip"></i> Dossier
                                    </a>
                                    <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $c['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2" title="Edit Patient Info">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                        <a href="<?php echo APP_URL; ?>/clients/delete?id=<?php echo $c['client_id']; ?>" 
                                           onclick="return confirm('Are you sure you want to delete patient <?php echo htmlspecialchars(addslashes($c['full_name'])); ?>?');" 
                                           class="btn btn-sm btn-outline-danger py-1 px-2" 
                                           style="border-radius: var(--radius-sm); font-size: 0.78rem;" 
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