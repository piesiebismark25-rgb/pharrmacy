<?php
$pageTitle   = 'Request Home Care – I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'request-care';
require_once __DIR__ . '/header.php';
$selectedService = $_GET['service'] ?? '';
?>

<!-- ╔═══ PAGE HERO ═══╗ -->
<section class="page-hero">
  <div class="container position-relative" style="z-index:2">
    <div class="tag navy mb-3"><i class="fa-solid fa-calendar-check me-1"></i> Fast Home Visit Scheduling</div>
    <h1 style="font-size:clamp(1.8rem,4vw,2.6rem);">Schedule In-Home Clinical Care</h1>
    <p class="lead mt-2" style="max-width:580px;">
      Submit patient details below. Our on-call nursing supervisor will call you back within 15 minutes to confirm the appointment and clinical preparations.
    </p>
  </div>
</section>

<!-- ╔═══ BOOKING FORM ═══╗ -->
<section class="section-gap" style="background:var(--surface-2);">
  <div class="container">
    <div class="row g-4 justify-content-center">

      <!-- ── Intake form ── -->
      <div class="col-12 col-lg-8">
        <div class="ik-card p-4 p-md-5">

          <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
            <div>
              <h4 style="font-size:18px;margin:0;">Patient Intake & Booking Form</h4>
              <p style="font-size:13px;color:var(--ink-300);margin:4px 0 0;">Enter accurate details for swift clinical dispatch.</p>
            </div>
            <span class="tag blue font-mono">ONLINE INTAKE</span>
          </div>

          <?php if(isset($_SESSION['booking_success'])): ?>
          <div class="ik-alert-success mb-4 d-flex gap-2 align-items-start">
            <i class="fa-solid fa-circle-check mt-1"></i>
            <div><?php echo htmlspecialchars($_SESSION['booking_success']); unset($_SESSION['booking_success']); ?></div>
          </div>
          <?php endif; ?>
          <?php if(isset($_SESSION['booking_error'])): ?>
          <div class="ik-alert-error mb-4 d-flex gap-2 align-items-start">
            <i class="fa-solid fa-circle-exclamation mt-1"></i>
            <div><?php echo htmlspecialchars($_SESSION['booking_error']); unset($_SESSION['booking_error']); ?></div>
          </div>
          <?php endif; ?>

          <form action="<?php echo APP_URL; ?>/book-request" method="POST" autocomplete="off">
            <input type="hidden" name="redirect_to" value="/request-care">
            <div class="row g-3">

              <div class="col-12 col-md-6">
                <label class="ik-label">Patient Full Name <span style="color:var(--rose)">*</span></label>
                <input type="text" name="full_name" class="ik-input" placeholder="e.g. Samuel Mensah" required>
              </div>

              <div class="col-12 col-md-6">
                <label class="ik-label">Phone Contact <span style="color:var(--rose)">*</span></label>
                <input type="tel" name="phone" class="ik-input font-mono" placeholder="e.g. 024 123 4567" required>
              </div>

              <div class="col-12">
                <label class="ik-label">Primary Procedure Needed <span style="color:var(--rose)">*</span></label>
                <select name="service" id="serviceSelect" class="ik-select" required>
                  <optgroup label="Clinical Nursing & Diagnostics">
                    <option value="Glucose Monitoring"           <?php echo str_contains($selectedService,'Glucose')        ?'selected':'';?>>Glucose Monitoring & Diabetic Logs</option>
                    <option value="Vital Signs Monitoring"       <?php echo str_contains($selectedService,'Vital')          ?'selected':'';?>>Vital Signs & BP Tracking</option>
                    <option value="Serving Medication"           <?php echo str_contains($selectedService,'Medication')     ?'selected':'';?>>Serving Medication & IV Injections</option>
                    <option value="Blood Sampling for Laboratory"<?php echo str_contains($selectedService,'Blood')          ?'selected':'';?>>Blood Sampling (Phlebotomy / Lab)</option>
                  </optgroup>
                  <optgroup label="Specialized Clinical Procedures">
                    <option value="Catheterization"              <?php echo str_contains($selectedService,'Catheterization') ?'selected':'';?>>Catheterization (Insertion / Change)</option>
                    <option value="Catheter Care"                <?php echo str_contains($selectedService,'Catheter Care')  ?'selected':'';?>>Catheter Care & Flushing</option>
                    <option value="Wound Dressing"               <?php echo str_contains($selectedService,'Wound')          ?'selected':'';?>>Wound & Diabetic Ulcer Dressing</option>
                    <option value="NG Tube Feeding"              <?php echo str_contains($selectedService,'Tube')           ?'selected':'';?>>NG Tube Feeding Management</option>
                  </optgroup>
                  <optgroup label="Rehabilitation & Recovery">
                    <option value="Post Operative Care"          <?php echo str_contains($selectedService,'Post')           ?'selected':'';?>>Post-Operative Home Recovery</option>
                    <option value="Physiotherapy and Exercise"   <?php echo str_contains($selectedService,'Physio')         ?'selected':'';?>>Physiotherapy & Stroke Mobility</option>
                    <option value="Health Talk"                  <?php echo str_contains($selectedService,'Health')         ?'selected':'';?>>Health Talk & Family Counselling</option>
                    <option value="Hospital Escort"              <?php echo str_contains($selectedService,'Escort')         ?'selected':'';?>>Nurse-Accompanied Hospital Escort</option>
                  </optgroup>
                  <optgroup label="Daily Living & Care">
                    <option value="Bed Bathing"                  <?php echo str_contains($selectedService,'Bath')           ?'selected':'';?>>Bed Bathing Assisted Hygiene</option>
                    <option value="Oral Care"                    <?php echo str_contains($selectedService,'Oral')           ?'selected':'';?>>Antiseptic Oral Hygiene Care</option>
                    <option value="Nutritional Management"       <?php echo str_contains($selectedService,'Nutritional')    ?'selected':'';?>>Nutrition Planning (Diabetic / Elderly)</option>
                    <option value="Medical Advice & Other Services" <?php echo str_contains($selectedService,'Advice')      ?'selected':'';?>>Doctor Consultation & Clinical Review</option>
                  </optgroup>
                </select>
              </div>

              <div class="col-12 col-md-6">
                <label class="ik-label">Preferred Visit Date <span style="color:var(--rose)">*</span></label>
                <input type="date" name="preferred_date" class="ik-input" value="<?php echo date('Y-m-d'); ?>" required>
              </div>

              <div class="col-12 col-md-6">
                <label class="ik-label">Preferred Time Window <span style="color:var(--rose)">*</span></label>
                <select name="preferred_time" class="ik-select" required>
                  <option>Morning (8:00 AM – 12:00 PM)</option>
                  <option>Afternoon (12:00 PM – 4:00 PM)</option>
                  <option>Evening (4:00 PM – 8:00 PM)</option>
                  <option>Immediate / Emergency On-Call</option>
                </select>
              </div>

              <div class="col-12">
                <label class="ik-label">Residential Location & Landmark <span style="color:var(--rose)">*</span></label>
                <input type="text" name="location" class="ik-input" placeholder="e.g. Pankrono Estate, near Shell filling station" required>
              </div>

              <div class="col-12">
                <label class="ik-label">Patient Condition Notes
                  <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--ink-300)">(optional)</span>
                </label>
                <textarea name="notes" class="ik-textarea" rows="3"
                          placeholder="Describe diagnosis, mobility status, or specific care instructions…"></textarea>
              </div>

              <div class="col-12 mt-2">
                <button type="submit" class="btn-primary-ik w-100 justify-content-center" style="padding:14px;font-size:15px;">
                  <i class="fa-solid fa-calendar-check"></i> Submit & Schedule Home Care
                </button>
              </div>

            </div>
          </form>

        </div>
      </div>

      <!-- ── Side info ── -->
      <div class="col-12 col-lg-4">

        <div class="ik-card p-4 mb-3">
          <h6 style="font-size:13px;font-weight:700;color:var(--ink);margin-bottom:16px;">
            <i class="fa-solid fa-clock-rotate-left me-2" style="color:var(--sapphire)"></i>What Happens Next?
          </h6>
          <?php
          $next=[
            ['icon'=>'fa-phone','chip'=>'blue','title'=>'Phone Triage','desc'=>'Coordinator calls within 15 mins to verify symptoms.'],
            ['icon'=>'fa-shield-virus','chip'=>'purple','title'=>'Kit Preparation','desc'=>'Sterile single-use supplies packed for your procedure.'],
            ['icon'=>'fa-house-medical','chip'=>'teal','title'=>'Home Visit','desc'=>'Licensed clinical officer arrives at your requested time.'],
          ];
          foreach($next as $i=>$n): ?>
          <div class="d-flex gap-3 <?php echo $i<2?'mb-3 pb-3 border-bottom':'';?>">
            <div class="icon-chip <?php echo $n['chip'];?>" style="width:32px;height:32px;font-size:14px;flex-shrink:0;">
              <i class="fa-solid <?php echo $n['icon'];?>"></i>
            </div>
            <div>
              <strong style="font-size:13px;color:var(--ink);display:block;"><?php echo $n['title'];?></strong>
              <p style="font-size:12.5px;color:var(--ink-300);margin:2px 0 0;line-height:1.45;"><?php echo $n['desc'];?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Phone CTA -->
        <div class="ik-card p-4 text-center"
             style="background:linear-gradient(135deg,var(--navy) 0%,#1e3a8a 100%);border:none;">
          <i class="fa-solid fa-phone-volume mb-2" style="font-size:28px;color:#60a5fa;"></i>
          <h6 style="color:#fff;font-size:15px;margin-bottom:6px;">Prefer to Book by Phone?</h6>
          <p style="font-size:12px;color:rgba(255,255,255,.55);margin-bottom:16px;">Our 24 / 7 clinical hotline:</p>
          <a href="tel:0241974447" class="btn-white-ik w-100 justify-content-center">
            <i class="fa-solid fa-phone" style="color:var(--sapphire)"></i> 0241974447
          </a>
        </div>

      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
