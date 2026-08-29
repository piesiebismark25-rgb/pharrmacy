<!-- Modern Executive Staff Accounts Management View -->
<div class="staff-management-wrapper">

    <!-- 1. Top Command Header -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h4 class="fw-bold text-dark mb-0" style="font-size: 1.15rem; letter-spacing: -0.02em;">
                    Staff Accounts & Access Management
                </h4>
                <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.72rem;">
                    <?php echo $totalUsers; ?> Active Users
                </span>
            </div>
            <small class="text-muted">Manage clinical officers, domiciliary nurses, and system administrative accounts</small>
        </div>

        <a href="<?php echo APP_URL; ?>/users/create" class="btn-primary-custom py-2 px-3 shadow-sm">
            <i class="fa-solid fa-user-plus me-1"></i> Add New Staff Member
        </a>
    </div>

    <!-- 2. Three Vibrant Luxury Bento Metric Tiles -->
    <div class="row g-3 mb-4">
        
        <!-- Total Personnel -->
        <div class="col-12 col-md-4">
            <div class="staff-kpi-card bg-grad-blue">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">Total Personnel</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                </div>
                <div class="kpi-main-number"><?php echo $totalUsers; ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid fa-circle-check me-1"></i> Active Healthcare Practitioners
                </div>
            </div>
        </div>

        <!-- System Administrators -->
        <div class="col-12 col-md-4">
            <div class="staff-kpi-card bg-grad-purple">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">System Admins</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                </div>
                <div class="kpi-main-number"><?php echo $totalAdmins; ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid fa-key me-1"></i> Full Administrative Privileges
                </div>
            </div>
        </div>

        <!-- Attending Clinicians -->
        <div class="col-12 col-md-4">
            <div class="staff-kpi-card bg-grad-emerald">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="kpi-glass-tag">Clinical Officers</span>
                    <div class="kpi-glass-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                </div>
                <div class="kpi-main-number"><?php echo $totalStaff; ?></div>
                <div class="kpi-sub-label">
                    <i class="fa-solid fa-stethoscope me-1"></i> Domiciliary Care & Encounters
                </div>
            </div>
        </div>

    </div>

    <!-- 3. Master Staff Ledger Table -->
    <div class="ui-table-container shadow-sm">
        <div class="tanstack-table-header">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Practitioner & Staff Directory</h6>
                    <small class="text-muted">Master database of authenticated clinical staff</small>
                </div>
            </div>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.72rem;">
                Total: <?php echo count($users); ?> Accounts
            </span>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th style="width: 32%;">Practitioner Name</th>
                        <th style="width: 22%;">Username</th>
                        <th style="width: 18%;">System Role</th>
                        <th style="width: 16%;">Created Date</th>
                        <th style="width: 12%; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-users-slash fs-3 mb-2 d-block text-muted"></i>
                                No staff accounts found. Click <strong>"Add New Staff Member"</strong> to create one.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <!-- Practitioner Name & Avatar -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle-staff flex-shrink-0">
                                            <?php echo strtoupper(substr($u['full_name'] ?? 'ST', 0, 2)); ?>
                                        </div>
                                        <div class="min-w-0">
                                            <strong class="text-dark d-block text-truncate" style="font-size: 0.88rem;">
                                                <?php echo htmlspecialchars($u['full_name']); ?>
                                            </strong>
                                            <?php if ($u['id'] == \App\Helpers\AuthHelper::getUserId()): ?>
                                                <span class="badge-pill-custom badge-blue font-mono" style="font-size: 0.65rem; padding: 1px 6px;">
                                                    <i class="fa-solid fa-circle-check me-1"></i> Current Session
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>

                                <!-- Username -->
                                <td>
                                    <span class="font-mono text-secondary fw-semibold" style="font-size: 0.8125rem;">
                                        <i class="fa-solid fa-at text-muted me-1"></i><?php echo htmlspecialchars($u['username']); ?>
                                    </span>
                                </td>

                                <!-- Role Badge -->
                                <td>
                                    <?php if ($u['role'] === 'admin'): ?>
                                        <span class="badge-pill-custom badge-purple font-mono fw-bold" style="font-size: 0.72rem;">
                                            <i class="fa-solid fa-shield-halved me-1"></i> ADMINISTRATOR
                                        </span>
                                    <?php else: ?>
                                        <span class="badge-pill-custom badge-emerald font-mono fw-bold" style="font-size: 0.72rem;">
                                            <i class="fa-solid fa-stethoscope me-1"></i> CLINICAL STAFF
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <!-- Created Date -->
                                <td>
                                    <span class="text-secondary font-mono" style="font-size: 0.78rem;">
                                        <?php echo date('d/m/Y', strtotime($u['created_at'])); ?>
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td style="text-align: right;">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <a href="<?php echo APP_URL; ?>/users/edit?id=<?php echo $u['id']; ?>" 
                                           class="btn-secondary-custom btn-sm py-1 px-2" 
                                           style="font-size: 0.75rem;" 
                                           title="Edit User Profile">
                                            <i class="fa-solid fa-pen-to-square text-primary"></i> Edit
                                        </a>

                                        <?php if ($u['id'] != \App\Helpers\AuthHelper::getUserId()): ?>
                                            <a href="<?php echo APP_URL; ?>/users/delete?id=<?php echo $u['id']; ?>" 
                                               class="btn-secondary-custom btn-sm py-1 px-2 text-danger hover-danger" 
                                               style="font-size: 0.75rem;" 
                                               onclick="return confirm('Are you sure you want to delete the staff account for <?php echo htmlspecialchars($u['full_name']); ?>?');"
                                               title="Delete Account">
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

</div>

<style>
/* Staff Management Styles */
.staff-management-wrapper {
    max-width: 100%;
}

.staff-kpi-card {
    border-radius: var(--radius-lg);
    padding: 20px 22px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    transition: transform 0.2s ease;
}

.staff-kpi-card:hover {
    transform: translateY(-2px);
}

.bg-grad-blue {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 60%, #3b82f6 100%);
}

.bg-grad-purple {
    background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 60%, #9333ea 100%);
}

.bg-grad-emerald {
    background: linear-gradient(135deg, #15803d 0%, #16a34a 60%, #22c55e 100%);
}

.kpi-glass-tag {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    opacity: 0.95;
}

.kpi-glass-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.kpi-main-number {
    font-size: 1.7rem;
    font-weight: 900;
    line-height: 1.1;
    margin: 6px 0 4px 0;
    letter-spacing: -0.02em;
}

.kpi-sub-label {
    font-size: 0.72rem;
    opacity: 0.9;
}

.avatar-circle-staff {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
}

.badge-purple {
    background-color: #faf5ff;
    border-color: #e9d5ff;
    color: #7e22ce;
}
</style>
