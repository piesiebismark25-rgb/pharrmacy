<!-- Patients Directory View -->
<div class="patients-directory-wrapper">

    <!-- Top Action Toolbar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3 mb-4 no-print">
        <!-- Search Input -->
        <div style="max-width: 480px; width: 100%;">
            <form action="<?php echo APP_URL; ?>/clients" method="GET" class="d-flex gap-2">
                <div class="modern-search-wrap">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" 
                           name="search" 
                           class="modern-search-input" 
                           placeholder="Search by patient ID, name, or phone..." 
                           value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <button type="submit" class="btn-primary-custom px-3">
                    <i class="fa-solid fa-magnifying-glass me-1"></i> Search
                </button>
                <?php if (!empty($search)): ?>
                    <a href="<?php echo APP_URL; ?>/clients" class="btn-secondary-custom px-3" title="Clear Filter">
                        <i class="fa-solid fa-xmark me-1"></i> Clear
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Action: Register New Patient -->
        <div>
            <a href="<?php echo APP_URL; ?>/clients/create" class="btn-primary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-user-plus me-1"></i> Register New Patient
            </a>
        </div>
    </div>

    <!-- Patients Directory Table Card -->
    <div class="ui-table-container">
        <div class="tanstack-table-header">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Registered Patient Dossiers</h6>
                    <small class="text-muted">Master clinical directory of enrolled individuals</small>
                </div>
            </div>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.72rem;">
                Total: <?php echo count($clients); ?> Patients
            </span>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th style="width: 14%;">Patient ID</th>
                        <th style="width: 30%;">Full Name & Demographics</th>
                        <th style="width: 12%;">Gender</th>
                        <th style="width: 18%;">Phone Number</th>
                        <th style="width: 14%;">Registered Date</th>
                        <th style="width: 12%; text-align: right;" class="no-print">Actions</th>
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
                                <!-- Patient ID -->
                                <td>
                                    <span class="badge-pill-custom badge-emerald font-mono fw-bold" style="font-size: 0.75rem; padding: 3px 8px;">
                                        <?php echo htmlspecialchars($c['client_id']); ?>
                                    </span>
                                </td>

                                <!-- Full Name & Age/DOB -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle-client">
                                            <?php echo strtoupper(substr($c['full_name'], 0, 2)); ?>
                                        </div>
                                        <div>
                                            <strong class="text-dark d-block" style="font-size: 0.85rem;">
                                                <?php echo htmlspecialchars($c['full_name']); ?>
                                            </strong>
                                            <small class="text-muted" style="font-size: 0.75rem;">
                                                <?php echo htmlspecialchars($c['age']); ?> yrs &bull; DOB: <?php echo date('d/m/Y', strtotime($c['dob'])); ?>
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Gender -->
                                <td>
                                    <span class="badge-pill-custom badge-zinc" style="font-size: 0.7rem;">
                                        <?php echo htmlspecialchars($c['gender']); ?>
                                    </span>
                                </td>

                                <!-- Phone Number -->
                                <td>
                                    <a href="tel:<?php echo htmlspecialchars($c['phone']); ?>" class="text-decoration-none text-secondary font-mono" style="font-size: 0.8125rem;">
                                        <i class="fa-solid fa-phone text-primary me-1" style="font-size: 0.72rem;"></i>
                                        <?php echo htmlspecialchars($c['phone']); ?>
                                    </a>
                                </td>

                                <!-- Registered Date -->
                                <td>
                                    <span class="text-secondary" style="font-size: 0.8125rem;">
                                        <?php echo date('d/m/Y', strtotime($c['registration_date'])); ?>
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td style="text-align: right;" class="no-print">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $c['client_id']; ?>" 
                                           class="btn-secondary-custom btn-sm py-1 px-2" 
                                           style="font-size: 0.75rem;" 
                                           title="View Patient Medical Dossier">
                                            <i class="fa-solid fa-id-card-clip me-1 text-primary"></i> Dossier
                                        </a>
                                        <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $c['client_id']; ?>" 
                                           class="btn-secondary-custom btn-sm py-1 px-2" 
                                           style="font-size: 0.75rem;" 
                                           title="Edit Patient Info">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                            <a href="<?php echo APP_URL; ?>/clients/delete?id=<?php echo $c['client_id']; ?>" 
                                               onclick="return confirm('Are you sure you want to delete patient <?php echo htmlspecialchars(addslashes($c['full_name'])); ?>?');" 
                                               class="btn-action-delete btn-sm py-1 px-2" 
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
</div>

<style>
.avatar-circle-client {
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

.btn-action-delete {
    background-color: #fff1f2;
    border: 1px solid #fecdd3;
    color: #e11d48;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 0.75rem;
    transition: all 0.15s ease;
}

.btn-action-delete:hover {
    background-color: #e11d48;
    color: #ffffff;
    border-color: #e11d48;
    box-shadow: 0 2px 8px rgba(225, 29, 72, 0.3);
}
</style>