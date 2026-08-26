<div class="row mb-4 no-print">
    <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <!-- Search bar -->
        <form action="<?php echo APP_URL; ?>/clients" method="GET" class="d-flex gap-2 w-100 max-width-md" style="max-width: 500px;">
            <div class="input-group">
                <span class="input-group-text bg-opacity-10 border-teal" style="background-color: rgba(13, 148, 136, 0.08); border-color: var(--border-color);"><i class="fa-solid fa-magnifying-glass text-teal" style="color: var(--accent-color);"></i></span>
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search by Client ID, Name, or Phone..." 
                       value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"
                       style="border-color: var(--border-color);">
            </div>
            <button type="submit" class="btn btn-accent px-4">Search</button>
            <?php if ($search !== ''): ?>
                <a href="<?php echo APP_URL; ?>/clients" class="btn btn-outline-secondary px-3" style="border-radius: 10px; display: flex; align-items: center;"><i class="fa-solid fa-xmark"></i></a>
            <?php endif; ?>
        </form>

        <!-- Register button -->
        <a href="<?php echo APP_URL; ?>/clients/create" class="btn btn-accent w-100 w-md-auto">
            <i class="fa-solid fa-plus me-2"></i> Register New Client
        </a>
    </div>
</div>

<!-- Clients List Container -->
<div class="custom-table-container">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Client ID</th>
                    <th>Full Name</th>
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
                            <i class="fa-solid fa-folder-open fs-2 mb-3 d-block text-teal" style="color: var(--accent-color);"></i>
                            No patient records found. Click "Register New Client" to add one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($clients as $c): ?>
                        <tr>
                            <td>
                                <span class="badge bg-opacity-10 text-teal py-2 px-3 border border-teal" style="background-color: rgba(45, 212, 191, 0.05); color: var(--accent-color); border-color: rgba(45, 212, 191, 0.25) !important;">
                                    <?php echo htmlspecialchars($c['client_id']); ?>
                                </span>
                            </td>
                            <td>
                                <strong class="text-white d-block"><?php echo htmlspecialchars($c['full_name']); ?></strong>
                                <small class="text-muted"><?php echo htmlspecialchars($c['age']); ?> yrs, DOB: <?php echo date('d/m/Y', strtotime($c['dob'])); ?></small>
                            </td>
                            <td><?php echo htmlspecialchars($c['gender']); ?></td>
                            <td><?php echo htmlspecialchars($c['phone']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($c['registration_date'])); ?></td>
                            <td class="text-end no-print">
                                <div class="btn-group gap-1">
                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $c['client_id']; ?>" class="btn btn-sm btn-outline-info" style="border-radius: 6px;" title="View Profile">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                    <a href="<?php echo APP_URL; ?>/clients/edit?id=<?php echo $c['client_id']; ?>" class="btn btn-sm btn-outline-warning" style="border-radius: 6px;" title="Edit Details">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                        <a href="javascript:void(0);" 
                                           onclick="confirmDelete('<?php echo $c['client_id']; ?>', '<?php echo htmlspecialchars($c['full_name'], ENT_QUOTES, 'UTF-8'); ?>')" 
                                           class="btn btn-sm btn-outline-danger" 
                                           style="border-radius: 6px;" 
                                           title="Delete Record">
                                            <i class="fa-solid fa-trash"></i> Delete
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

<!-- Delete Confirmation Modal (Native JS/Bootstrap) -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true" style="backdrop-filter: blur(5px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: var(--sidebar-bg); border: 1px solid var(--danger-color); border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-danger fw-bold"><i class="fa-solid fa-circle-exclamation me-2"></i> Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                Are you sure you want to delete patient record <strong id="deleteClientName" class="text-warning"></strong> (<span id="deleteClientId" class="text-teal" style="color: var(--accent-color);"></span>)?<br>
                <span class="text-muted small mt-2 d-block"><i class="fa-solid fa-info-circle me-1"></i> This action cannot be undone and will delete all associated visits and billing records.</span>
            </div>
            <div class="modal-header border-0 pt-0 d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border-radius: 8px;">Cancel</button>
                <a href="#" id="deleteConfirmBtn" class="btn btn-danger px-4" style="border-radius: 8px;">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, name) {
    document.getElementById('deleteClientId').innerText = id;
    document.getElementById('deleteClientName').innerText = name;
    document.getElementById('deleteConfirmBtn').href = "<?php echo APP_URL; ?>/clients/delete?id=" + id;
    
    var myModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
    myModal.show();
}
</script>
