<!-- Appointments & Clinical Follow-up Visits View -->
<div class="appointments-calendar-wrapper">

    <!-- 1. Top Calendar Command Bar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3 mb-4 no-print">
        
        <!-- Left: Date Navigator -->
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="date-navigator-box">
                <button type="button" class="nav-arrow-btn" onclick="changeDay(-1)" title="Previous Day">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="current-date-text" id="selectedDateDisplay">
                    <i class="fa-regular fa-calendar text-primary me-2"></i>
                    <span id="activeDateLabel"><?php echo date('l, d F Y'); ?></span>
                </div>
                <button type="button" class="nav-arrow-btn" onclick="changeDay(1)" title="Next Day">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <button type="button" class="btn-today-pill" onclick="resetToToday()">
                Today
            </button>
        </div>

        <!-- Right: View Switcher (Full List FIRST) & Action CTA -->
        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end">
            <div class="agenda-view-switcher">
                <button type="button" class="agenda-btn active" id="btnListView" onclick="toggleAgendaMode('list')">
                    <i class="fa-solid fa-list-check me-1"></i> Full List (<?php echo count($appointments); ?>)
                </button>
                <button type="button" class="agenda-btn" id="btnAgendaView" onclick="toggleAgendaMode('agenda')">
                    <i class="fa-solid fa-calendar-day me-1"></i> Time Slots Agenda
                </button>
            </div>

            <a href="<?php echo APP_URL; ?>/appointments/create" class="btn-primary-custom py-2 px-3 shadow-sm">
                <i class="fa-solid fa-calendar-plus me-1"></i> Schedule New Visit
            </a>
        </div>

    </div>

    <!-- 2. MODE A: Full Tabular List View (Default Active First) -->
    <div id="calendarListView" class="ui-table-container">
        <div class="tanstack-table-header">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-sq bg-blue-subtle text-primary" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Appointments & Follow-up Visits Ledger</h6>
                    <small class="text-muted">Master schedule of patient home visits and clinical consultations</small>
                </div>
            </div>
            <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.72rem;">
                Total: <?php echo count($appointments); ?> Scheduled
            </span>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Date & Time</th>
                        <th style="width: 24%;">Patient Name & ID</th>
                        <th style="width: 14%;">Phone</th>
                        <th style="width: 25%;">Clinical Reason / Procedure</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 12%; text-align: right;" class="no-print">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-regular fa-calendar-xmark fs-3 mb-2 d-block text-muted"></i>
                                No scheduled appointments found. Click <strong>"Schedule New Visit"</strong> to add one.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $a): ?>
                            <tr>
                                <!-- Date & Time -->
                                <td>
                                    <div class="appt-time-pill-clean">
                                        <strong class="text-dark d-block" style="font-size: 0.82rem; white-space: nowrap;">
                                            <?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?>
                                        </strong>
                                        <small class="text-primary font-mono fw-semibold" style="font-size: 0.72rem; white-space: nowrap;">
                                            <i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($a['appointment_time'])); ?>
                                        </small>
                                    </div>
                                </td>

                                <!-- Patient Name & ID -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle-appt flex-shrink-0">
                                            <?php echo strtoupper(substr($a['full_name'] ?? 'P', 0, 2)); ?>
                                        </div>
                                        <div class="min-w-0">
                                            <strong class="text-dark d-block text-truncate" style="font-size: 0.85rem;">
                                                <?php echo htmlspecialchars($a['full_name']); ?>
                                            </strong>
                                            <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.65rem; padding: 1px 6px; white-space: nowrap;">
                                                <?php echo htmlspecialchars($a['client_id']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Phone -->
                                <td>
                                    <a href="tel:<?php echo htmlspecialchars($a['phone']); ?>" class="text-secondary text-decoration-none hover-primary font-mono" style="font-size: 0.8125rem; white-space: nowrap;">
                                        <i class="fa-solid fa-phone text-primary me-1" style="font-size: 0.72rem;"></i>
                                        <?php echo htmlspecialchars($a['phone']); ?>
                                    </a>
                                </td>

                                <!-- Reason -->
                                <td>
                                    <div class="text-secondary small" style="line-height: 1.35; font-size: 0.8125rem;">
                                        <i class="fa-solid fa-notes-medical text-primary me-1"></i>
                                        <?php echo htmlspecialchars($a['reason']); ?>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td>
                                    <?php
                                    $badge = 'badge-amber';
                                    if ($a['status'] === 'Completed') $badge = 'badge-emerald';
                                    if ($a['status'] === 'Cancelled') $badge = 'badge-rose';
                                    ?>
                                    <span class="badge-pill-custom <?php echo $badge; ?>" style="font-size: 0.72rem;">
                                        <?php echo htmlspecialchars($a['status']); ?>
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td style="text-align: right;" class="no-print">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <?php if ($a['status'] === 'Scheduled'): ?>
                                            <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo urlencode($a['client_id']); ?>" 
                                               class="btn-primary-custom btn-sm py-1 px-2" 
                                               style="font-size: 0.75rem;" 
                                               title="Start Visit">
                                                <i class="fa-solid fa-play me-1"></i> Start
                                            </a>
                                            <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $a['id']; ?>&status=Completed" 
                                               class="btn-action-done btn-sm py-1 px-2" 
                                               title="Mark Completed">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $a['client_id']; ?>" 
                                           class="btn-secondary-custom btn-sm py-1 px-2" 
                                           style="font-size: 0.75rem;" 
                                           title="View Patient Medical Dossier">
                                            <i class="fa-solid fa-id-card-clip text-primary"></i> Dossier
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 3. MODE B: Interactive Time Slots Agenda Grid (Toggleable) -->
    <div id="calendarAgendaGrid" class="row g-3 g-xl-4" style="display: none;">
        
        <!-- LEFT: Mini Calendar Widget & Quick Summary (Col-lg-4) -->
        <div class="col-12 col-lg-4 col-xl-4">
            
            <!-- Mini Month Calendar Card -->
            <div class="neat-card p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold text-dark mb-0" id="miniCalendarMonth" style="font-size: 0.92rem;">
                        <?php echo date('F Y'); ?>
                    </h6>
                    <span class="badge-pill-custom badge-zinc font-mono" style="font-size: 0.68rem;">
                        <?php echo count($appointments); ?> Appts Booked
                    </span>
                </div>

                <!-- Days of Week Header -->
                <div class="mini-cal-grid-header">
                    <span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
                </div>

                <!-- Mini Calendar Days -->
                <div class="mini-cal-days-grid" id="miniCalGrid">
                    <!-- Populated dynamically via JS -->
                </div>
            </div>

            <!-- Today's Clinical Summary Box -->
            <div class="neat-card p-3">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <div class="icon-sq bg-blue-subtle text-primary" style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 0.8rem;">
                        <i class="fa-solid fa-user-clock"></i>
                    </div>
                    <strong class="text-dark" style="font-size: 0.84rem;">Appointments Summary</strong>
                </div>

                <div class="d-flex flex-column gap-2 mt-2" style="font-size: 0.8rem;">
                    <div class="d-flex justify-content-between align-items-center p-2 rounded bg-slate-subtle">
                        <span class="text-secondary">Total Scheduled:</span>
                        <strong class="text-dark font-mono"><?php echo count($appointments); ?></strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded bg-slate-subtle">
                        <span class="text-secondary">Completed Visits:</span>
                        <?php 
                        $compCount = 0;
                        foreach ($appointments as $a) if ($a['status'] === 'Completed') $compCount++;
                        ?>
                        <strong class="text-success font-mono"><?php echo $compCount; ?></strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded bg-slate-subtle">
                        <span class="text-secondary">Pending Action:</span>
                        <strong class="text-warning font-mono"><?php echo count($appointments) - $compCount; ?></strong>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT: Hourly Time-Slot Agenda Schedule (Col-lg-8) -->
        <div class="col-12 col-lg-8 col-xl-8">
            <div class="neat-card p-0 overflow-hidden shadow-sm">
                
                <div class="tanstack-table-header">
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon-sq bg-blue-subtle text-primary" style="width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Daily Clinical Agenda & Time Slots</h6>
                            <small class="text-muted">Structured hourly visit schedule for home care</small>
                        </div>
                    </div>
                    <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.72rem;">
                        Live Schedule
                    </span>
                </div>

                <!-- Time Slot Track List -->
                <div class="agenda-timeline-track p-3">
                    
                    <?php if (empty($appointments)): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="fa-regular fa-calendar-check fs-2 mb-2 d-block text-muted"></i>
                            <h6 class="fw-bold text-dark mb-1">No Appointments Scheduled</h6>
                            <p class="small text-muted mb-3">No consultations or home visits in the system.</p>
                            <a href="<?php echo APP_URL; ?>/appointments/create" class="btn-primary-custom py-2 px-3">
                                <i class="fa-solid fa-calendar-plus me-1"></i> Book First Appointment
                            </a>
                        </div>
                    <?php else: ?>
                        <?php 
                        $timeSlots = [
                            '08:00:00' => '08:00 AM',
                            '09:00:00' => '09:00 AM',
                            '10:00:00' => '10:00 AM',
                            '11:00:00' => '11:00 AM',
                            '12:00:00' => '12:00 PM',
                            '13:00:00' => '01:00 PM',
                            '14:00:00' => '02:00 PM',
                            '15:00:00' => '03:00 PM',
                            '16:00:00' => '04:00 PM',
                            '17:00:00' => '05:00 PM'
                        ];

                        foreach ($timeSlots as $slotKey => $slotLabel): 
                            $slotHour = (int)explode(':', $slotKey)[0];
                            $matchingAppts = [];
                            foreach ($appointments as $a) {
                                $apptHour = (int)date('H', strtotime($a['appointment_time']));
                                if ($apptHour === $slotHour) {
                                    $matchingAppts[] = $a;
                                }
                            }
                        ?>
                            <div class="timeline-slot-row">
                                <div class="slot-time-col">
                                    <span class="slot-time-text"><?php echo $slotLabel; ?></span>
                                </div>

                                <div class="slot-content-col">
                                    <?php if (!empty($matchingAppts)): ?>
                                        <?php foreach ($matchingAppts as $appt): ?>
                                            <div class="agenda-encounter-card">
                                                <div class="d-flex justify-content-between align-items-start gap-2 mb-2 flex-wrap">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar-circle-agenda">
                                                            <?php echo strtoupper(substr($appt['full_name'] ?? 'P', 0, 2)); ?>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                <strong class="text-dark appt-name-text"><?php echo htmlspecialchars($appt['full_name']); ?></strong>
                                                                <span class="badge-pill-custom badge-emerald font-mono" style="font-size: 0.65rem; padding: 1px 6px;">
                                                                    <?php echo htmlspecialchars($appt['client_id']); ?>
                                                                </span>
                                                            </div>
                                                            <div class="text-muted small font-mono" style="font-size: 0.72rem;">
                                                                <i class="fa-solid fa-phone text-primary me-1"></i><?php echo htmlspecialchars($appt['phone']); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="appt-exact-time">
                                                            <i class="fa-regular fa-clock me-1"></i><?php echo date('g:i A', strtotime($appt['appointment_time'])); ?> &bull; <?php echo date('d M Y', strtotime($appt['appointment_date'])); ?>
                                                        </span>
                                                        <?php
                                                        $statusClass = 'badge-amber';
                                                        if ($appt['status'] === 'Completed') $statusClass = 'badge-emerald';
                                                        if ($appt['status'] === 'Cancelled') $statusClass = 'badge-rose';
                                                        ?>
                                                        <span class="badge-pill-custom <?php echo $statusClass; ?>" style="font-size: 0.7rem;">
                                                            <?php echo htmlspecialchars($appt['status']); ?>
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- Care Reason -->
                                                <div class="appt-reason-box mb-2">
                                                    <i class="fa-solid fa-notes-medical text-primary me-1"></i>
                                                    <strong>Care Protocol:</strong> <?php echo htmlspecialchars($appt['reason']); ?>
                                                </div>

                                                <!-- Actions Toolbar -->
                                                <div class="d-flex justify-content-between align-items-center pt-2 border-top no-print" style="font-size: 0.75rem;">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <?php if ($appt['status'] === 'Scheduled'): ?>
                                                            <a href="<?php echo APP_URL; ?>/visits/create?client_id=<?php echo urlencode($appt['client_id']); ?>" class="btn-primary-custom btn-sm py-1 px-3" style="font-size: 0.75rem;">
                                                                <i class="fa-solid fa-play me-1"></i> Start Clinical Visit
                                                            </a>
                                                            <a href="<?php echo APP_URL; ?>/appointments/edit?id=<?php echo $appt['id']; ?>&status=Completed" class="btn-action-done btn-sm py-1 px-2" title="Mark Done">
                                                                <i class="fa-solid fa-check me-1"></i> Mark Done
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <a href="<?php echo APP_URL; ?>/clients/view?id=<?php echo $appt['client_id']; ?>" class="btn-secondary-custom btn-sm py-1 px-2">
                                                        <i class="fa-solid fa-id-card-clip me-1 text-primary"></i> Dossier
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <a href="<?php echo APP_URL; ?>/appointments/create" class="empty-slot-btn no-print">
                                            <i class="fa-solid fa-plus me-1"></i> Available Slot &bull; Click to Schedule
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

</div>

<style>
/* Appointments Hub Styles */
.appointments-calendar-wrapper {
    max-width: 100%;
}

.date-navigator-box {
    display: inline-flex;
    align-items: center;
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-subtle);
    overflow: hidden;
}

.nav-arrow-btn {
    background: transparent;
    border: none;
    padding: 8px 12px;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.15s ease;
}

.nav-arrow-btn:hover {
    background-color: #f1f5f9;
    color: var(--accent-main);
}

.current-date-text {
    padding: 6px 16px;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text-primary);
    border-left: 1px solid var(--border-subtle);
    border-right: 1px solid var(--border-subtle);
    white-space: nowrap;
}

.btn-today-pill {
    background-color: #ffffff;
    border: 1px solid var(--border-subtle);
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.8125rem;
    padding: 7px 14px;
    border-radius: var(--radius-md);
    cursor: pointer;
    box-shadow: var(--shadow-subtle);
    transition: all 0.15s ease;
}

.btn-today-pill:hover {
    background-color: #f8fafc;
    color: var(--accent-main);
    border-color: var(--accent-border);
}

.agenda-view-switcher {
    background-color: #f1f5f9;
    border: 1px solid var(--border-subtle);
    border-radius: 8px;
    padding: 3px;
    display: inline-flex;
}

.agenda-btn {
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--text-secondary);
    background: transparent;
    border: none;
    border-radius: 6px;
    padding: 6px 12px;
    cursor: pointer;
    transition: all 0.15s ease;
}

.agenda-btn.active {
    background-color: #ffffff;
    color: var(--accent-main);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
}

.avatar-circle-appt {
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

.appt-time-pill-clean {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 8px;
    padding: 6px 10px;
    display: inline-block;
}

/* Mini Calendar Grid */
.mini-cal-grid-header {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
    font-size: 0.7rem;
    font-weight: 700;
    color: var(--text-muted);
    margin-bottom: 6px;
}

.mini-cal-days-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 4px;
    text-align: center;
}

.mini-cal-day {
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-size: 0.75rem;
    color: var(--text-primary);
    cursor: pointer;
    transition: all 0.15s ease;
    position: relative;
}

.mini-cal-day:hover {
    background-color: #eff6ff;
    color: var(--accent-main);
}

.mini-cal-day.active-day {
    background-color: var(--accent-main);
    color: #ffffff;
    font-weight: 700;
}

.mini-cal-day.has-event::after {
    content: '';
    position: absolute;
    bottom: 2px;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background-color: #22c55e;
}

.mini-cal-day.active-day.has-event::after {
    background-color: #ffffff;
}

.bg-slate-subtle {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
}

/* Timeline Slots */
.agenda-timeline-track {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.timeline-slot-row {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.slot-time-col {
    width: 75px;
    flex-shrink: 0;
    text-align: right;
    padding-top: 8px;
}

.slot-time-text {
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--text-muted);
    font-family: 'JetBrains Mono', monospace;
}

.slot-content-col {
    flex-grow: 1;
    min-width: 0;
}

.agenda-encounter-card {
    background-color: #ffffff;
    border: 1px solid #bfdbfe;
    border-left: 4px solid var(--accent-main);
    border-radius: 10px;
    padding: 14px 16px;
    box-shadow: 0 2px 8px rgba(37, 99, 235, 0.08);
    transition: all 0.15s ease;
}

.agenda-encounter-card:hover {
    box-shadow: 0 4px 14px rgba(37, 99, 235, 0.15);
    transform: translateY(-1px);
}

.avatar-circle-agenda {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: #ffffff;
    font-weight: 800;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.appt-name-text {
    font-size: 0.92rem;
}

.appt-exact-time {
    background-color: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 6px;
}

.appt-reason-box {
    background-color: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 0.8125rem;
    color: var(--text-primary);
}

.empty-slot-btn {
    display: block;
    width: 100%;
    text-align: left;
    background-color: #fbfcfe;
    border: 1px dashed #cbd5e1;
    border-radius: 8px;
    padding: 8px 14px;
    font-size: 0.75rem;
    color: #94a3b8;
    text-decoration: none;
    transition: all 0.15s ease;
}

.empty-slot-btn:hover {
    background-color: #eff6ff;
    border-color: #93c5fd;
    color: #2563eb;
}

.btn-action-done {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #16a34a;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 600;
    transition: all 0.15s ease;
}

.btn-action-done:hover {
    background-color: #16a34a;
    color: #ffffff;
}
</style>

<script>
let currentCalDate = new Date(2026, 7, 29); // 29 Aug 2026

function toggleAgendaMode(mode) {
    const list = document.getElementById('calendarListView');
    const agenda = document.getElementById('calendarAgendaGrid');
    const btnList = document.getElementById('btnListView');
    const btnAgenda = document.getElementById('btnAgendaView');

    if (mode === 'list') {
        list.style.display = 'block';
        agenda.style.display = 'none';
        btnList.classList.add('active');
        btnAgenda.classList.remove('active');
    } else {
        list.style.display = 'none';
        agenda.style.display = 'flex';
        btnList.classList.remove('active');
        btnAgenda.classList.add('active');
    }
}

function changeDay(delta) {
    currentCalDate.setDate(currentCalDate.getDate() + delta);
    updateDateDisplay();
}

function resetToToday() {
    currentCalDate = new Date(2026, 7, 29);
    updateDateDisplay();
}

function updateDateDisplay() {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('activeDateLabel').textContent = currentCalDate.toLocaleDateString('en-GB', options);
    renderMiniCalendar();
}

function renderMiniCalendar() {
    const grid = document.getElementById('miniCalGrid');
    if (!grid) return;
    grid.innerHTML = '';

    const year = currentCalDate.getFullYear();
    const month = currentCalDate.getMonth();
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    
    const startOffset = (firstDay === 0 ? 6 : firstDay - 1);

    for (let i = 0; i < startOffset; i++) {
        const blank = document.createElement('div');
        blank.className = 'mini-cal-day text-muted opacity-25';
        grid.appendChild(blank);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const dayEl = document.createElement('div');
        dayEl.className = 'mini-cal-day';
        dayEl.textContent = day;

        if (day === currentCalDate.getDate()) {
            dayEl.classList.add('active-day');
        }

        if (day === 29) {
            dayEl.classList.add('has-event');
        }

        dayEl.onclick = function() {
            currentCalDate = new Date(year, month, day);
            updateDateDisplay();
        };

        grid.appendChild(dayEl);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    renderMiniCalendar();
});
</script>