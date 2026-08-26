<div class="row g-4 mb-4">
    <!-- Total Clients Card -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="dashboard-card d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Total Clients</span>
                <h3 class="mb-0 fw-bold" style="font-size: 1.8rem;"><?php echo number_format($totalClients); ?></h3>
            </div>
            <div style="background-color: rgba(45, 212, 191, 0.1); padding: 15px; border-radius: 15px;">
                <i class="fa-solid fa-users text-teal fs-3" style="color: var(--accent-color);"></i>
            </div>
        </div>
    </div>

    <!-- Today's Visits Card -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="dashboard-card d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Today's Visits</span>
                <h3 class="mb-0 fw-bold" style="font-size: 1.8rem;"><?php echo number_format($todayVisits); ?></h3>
            </div>
            <div style="background-color: rgba(52, 211, 153, 0.1); padding: 15px; border-radius: 15px;">
                <i class="fa-solid fa-notes-medical text-success fs-3" style="color: var(--success-color);"></i>
            </div>
        </div>
    </div>

    <!-- Today's Payments Card -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="dashboard-card d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Today's Payments</span>
                <h3 class="mb-0 fw-bold" style="font-size: 1.8rem;">
                    <?php echo DEFAULT_CURRENCY . number_format($todayPayments, 2); ?>
                </h3>
            </div>
            <div style="background-color: rgba(52, 211, 153, 0.1); padding: 15px; border-radius: 15px;">
                <i class="fa-solid fa-money-bill-trend-up text-success fs-3" style="color: var(--success-color);"></i>
            </div>
        </div>
    </div>

    <!-- Outstanding Balances Card -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="dashboard-card d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Outstanding Balances</span>
                <h3 class="mb-0 fw-bold" style="font-size: 1.8rem; color: #f87171;">
                    <?php echo DEFAULT_CURRENCY . number_format($outstandingBalances, 2); ?>
                </h3>
            </div>
            <div style="background-color: rgba(248, 113, 113, 0.1); padding: 15px; border-radius: 15px;">
                <i class="fa-solid fa-circle-exclamation text-danger fs-3" style="color: var(--danger-color);"></i>
            </div>
        </div>
    </div>

    <!-- Today's Appointments Card (Helper card) -->
    <div class="col-12 col-md-6 col-lg-3 d-none">
        <!-- Hidden or can be placed elsewhere. Included in statistics. -->
    </div>
</div>

<!-- Second Row: Appointments and Recent Clients -->
<div class="row g-4 mb-4">
    <!-- Upcoming Appointments -->
    <div class="col-12 col-xl-7">
        <div class="custom-table-container h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold" style="font-size: 1.15rem; color: #ffffff;"><i class="fa-solid fa-calendar-check me-2 text-teal" style="color: var(--accent-color);"></i> Upcoming Appointments (Today/Future)</h4>
                <a href="<?php echo APP_URL; ?>/appointments" class="btn btn-sm btn-accent">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Date / Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($upcomingAppointments)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No upcoming appointments scheduled</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($upcomingAppointments as $appt): ?>
                                <tr>
                                    <td><strong><?php echo htmlspecialchars($appt['client_id']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($appt['full_name']); ?></td>
                                    <td>
                                        <i class="fa-regular fa-calendar me-1 text-muted"></i> <?php echo date('d/m/Y', strtotime($appt['appointment_date'])); ?><br>
                                        <small class="text-muted"><i class="fa-regular fa-clock me-1"></i> <?php echo date('g:i A', strtotime($appt['appointment_time'])); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($appt['reason']); ?></td>
                                    <td>
                                        <span class="badge rounded-pill badge-<?php echo strtolower($appt['status']); ?>">
                                            <?php echo htmlspecialchars($appt['status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Clients -->
    <div class="col-12 col-xl-5">
        <div class="custom-table-container h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold" style="font-size: 1.15rem; color: #ffffff;"><i class="fa-solid fa-user-injured me-2 text-teal" style="color: var(--accent-color);"></i> Recent Registrations</h4>
                <a href="<?php echo APP_URL; ?>/clients" class="btn btn-sm btn-accent">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentClients)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No clients registered yet</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentClients as $client): ?>
                                <tr>
                                    <td><strong><?php echo htmlspecialchars($client['client_id']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($client['full_name']); ?></td>
                                    <td><?php echo htmlspecialchars($client['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($client['phone']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Third Row: Recent Visits & Recent Payments -->
<div class="row g-4">
    <!-- Recent Visits -->
    <div class="col-12 col-xl-7">
        <div class="custom-table-container h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold" style="font-size: 1.15rem; color: #ffffff;"><i class="fa-solid fa-notes-medical me-2 text-teal" style="color: var(--accent-color);"></i> Recent Visits</h4>
                <a href="<?php echo APP_URL; ?>/visits" class="btn btn-sm btn-accent">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Complaint</th>
                            <th>Diagnosis</th>
                            <th>Attending Staff</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentVisits)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No visits recorded today</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentVisits as $visit): ?>
                                <tr>
                                    <td><?php echo date('d/m/Y H:i', strtotime($visit['visit_date'])); ?></td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($visit['client_id']); ?></strong><br>
                                        <small class="text-muted"><?php echo htmlspecialchars($visit['client_name']); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars(substr($visit['complaint'], 0, 40)) . (strlen($visit['complaint']) > 40 ? '...' : ''); ?></td>
                                    <td><?php echo htmlspecialchars(substr($visit['diagnosis'] ?? 'Pending', 0, 45)) . (strlen($visit['diagnosis'] ?? '') > 45 ? '...' : ''); ?></td>
                                    <td><small><?php echo htmlspecialchars($visit['staff_name']); ?></small></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Payments -->
    <div class="col-12 col-xl-5">
        <div class="custom-table-container h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold" style="font-size: 1.15rem; color: #ffffff;"><i class="fa-solid fa-receipt me-2 text-teal" style="color: var(--accent-color);"></i> Recent Payments</h4>
                <a href="<?php echo APP_URL; ?>/payments" class="btn btn-sm btn-accent">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Receipt</th>
                            <th>Amount</th>
                            <th>Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentPayments)): ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">No payments recorded today</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentPayments as $payment): ?>
                                <tr>
                                    <td>
                                        <strong><?php echo htmlspecialchars($payment['receipt_number']); ?></strong><br>
                                        <small class="text-muted"><?php echo htmlspecialchars($payment['client_name']); ?></small>
                                    </td>
                                    <td><strong><?php echo DEFAULT_CURRENCY . number_format($payment['amount_paid'], 2); ?></strong></td>
                                    <td><span class="badge bg-secondary"><?php echo htmlspecialchars($payment['payment_method']); ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
