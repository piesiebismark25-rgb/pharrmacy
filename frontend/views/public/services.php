<?php
$pageTitle   = 'Clinical Services Catalog – I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'services';
require_once __DIR__ . '/header.php';
?>

<!-- ╔═══ PAGE HERO ═══╗ -->
<section class="page-hero">
  <div class="container position-relative" style="z-index:2">
    <div class="tag navy mb-3"><i class="fa-solid fa-stethoscope me-1"></i> Complete Clinical Catalog</div>
    <h1 style="font-size:clamp(1.8rem,4vw,2.6rem);">Specialized Home Care Procedures</h1>
    <p class="lead mt-2" style="max-width:560px;">
      16 accredited nursing, aseptic, rehabilitative, and wellness procedures — delivered with hospital-grade precision to your residence.
    </p>
  </div>
</section>

<!-- ╔═══ SERVICES CATALOG ═══╗ -->
<section class="section-gap" style="background:var(--surface-2);">
  <div class="container">

    <?php
    $domains = [
      [
        'id'=>'nursing','chip'=>'blue','icon'=>'fa-heart-pulse',
        'num'=>'01','title'=>'Clinical Nursing & Diagnostics',
        'sub'=>'Vital tracking, glycaemic surveillance, and therapeutic administration.',
        'procedures'=>[
          ['code'=>'GLU-01','title'=>'Glucose Monitoring','desc'=>'Continuous fasting and postprandial glucose tracking, diabetic logs, ketone testing, and dietary counselling.','service'=>'Glucose+Monitoring'],
          ['code'=>'VIT-02','title'=>'Vital Signs Tracking','desc'=>'Routine blood pressure, radial pulse, respiratory rate, body temperature, and SpO₂ oxygen checks.','service'=>'Vital+Signs+Monitoring'],
          ['code'=>'MED-03','title'=>'Serving Medication','desc'=>'Strict timing and administration of prescribed oral medications, IV infusions, and subcutaneous injections.','service'=>'Serving+Medication'],
          ['code'=>'LAB-04','title'=>'Lab Blood Sampling','desc'=>'Sterile home phlebotomy, sample preservation, and prompt transport to certified diagnostic laboratories.','service'=>'Blood+Sampling+for+Laboratory'],
        ]
      ],
      [
        'id'=>'specialized','chip'=>'purple','icon'=>'fa-syringe',
        'num'=>'02','title'=>'Specialized Clinical Procedures',
        'sub'=>'Aseptic wound care, catheterization, and enteral tube feeding.',
        'procedures'=>[
          ['code'=>'CAT-05','title'=>'Catheterization','desc'=>'Sterile Foley catheter insertion, periodic exchange, and drainage bag set-up with strict aseptic protocols.','service'=>'Catheterization'],
          ['code'=>'CAT-06','title'=>'Catheter Care & Flush','desc'=>'Routine site hygiene, therapeutic bladder irrigation, line flushing, and blockage prevention.','service'=>'Catheter+Care'],
          ['code'=>'WND-07','title'=>'Wound Dressing','desc'=>'Clinical dressing for diabetic ulcers, pressure sores, surgical incisions, burns, and infected wounds.','service'=>'Wound+Dressing'],
          ['code'=>'NGT-08','title'=>'NG Tube Feeding','desc'=>'Enteral nasogastric nutrition administration, tube verification, flushing, and aspiration safety monitoring.','service'=>'NG+Tube+Feeding'],
        ]
      ],
      [
        'id'=>'rehabilitation','chip'=>'teal','icon'=>'fa-person-walking',
        'num'=>'03','title'=>'Rehabilitation & Recovery Therapy',
        'sub'=>'Stroke physiotherapy, post-surgical support, and clinical escort.',
        'procedures'=>[
          ['code'=>'REC-09','title'=>'Post-Operative Care','desc'=>'Post-surgical monitoring, drain management, pain tracking, and early mobilization guidance at home.','service'=>'Post+Operative+Care'],
          ['code'=>'PHY-10','title'=>'Physiotherapy','desc'=>'Bedside range-of-motion exercises, stroke rehabilitation, gait training, and muscle reconditioning.','service'=>'Physiotherapy+and+Exercise'],
          ['code'=>'HLT-11','title'=>'Health Counselling','desc'=>'Chronic disease management education, hypertension and diabetic guidance, and family health talks.','service'=>'Health+Talk'],
          ['code'=>'ESC-12','title'=>'Hospital Escort','desc'=>'Certified nurse-assisted transport and clinical accompaniment for specialist hospital appointments.','service'=>'Hospital+Escort'],
        ]
      ],
      [
        'id'=>'dailyliving','chip'=>'rose','icon'=>'fa-bath',
        'num'=>'04','title'=>'Daily Living Care & Consultations',
        'sub'=>'Bed bathing, oral hygiene, clinical nutrition, and physician reviews.',
        'procedures'=>[
          ['code'=>'BTH-13','title'=>'Bed Bathing','desc'=>'Gentle full-body bathing, pressure-area skincare, and complete linen change for immobile patients.','service'=>'Bed+Bathing'],
          ['code'=>'ORL-14','title'=>'Oral Hygiene Care','desc'=>'Antiseptic mouth care, denture cleaning, and oral cavity sanitation for dependent individuals.','service'=>'Oral+Care'],
          ['code'=>'NUT-15','title'=>'Nutritional Planning','desc'=>'Tailored dietary plans for diabetics, hypertensive clients, elderly nutrition support, and fluid monitoring.','service'=>'Nutritional+Management'],
          ['code'=>'MED-16','title'=>'Doctor Consultations','desc'=>'General medical examination, treatment review, prescription renewal, and specialist referral service.','service'=>'Medical+Advice+%26+Other+Services'],
        ]
      ],
    ];

    $chipMap = ['blue'=>'var(--sapphire)','purple'=>'var(--violet)','teal'=>'var(--teal)','rose'=>'var(--rose)'];

    foreach($domains as $domain): ?>
    <div id="<?php echo $domain['id'];?>" class="mb-5">

      <!-- Domain header -->
      <div class="d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom:2px solid var(--border);">
        <div class="icon-chip domain-icon <?php echo $domain['chip'];?>" style="width:48px;height:48px;font-size:22px;flex-shrink:0;">
          <i class="fa-solid <?php echo $domain['icon'];?>"></i>
        </div>
        <div>
          <div class="eyebrow mb-0" style="color:<?php echo $chipMap[$domain['chip']];?>">
            Domain <?php echo $domain['num'];?>
          </div>
          <h3 style="font-size:1.2rem;margin:2px 0 0;"><?php echo $domain['title'];?></h3>
          <p style="font-size:13px;color:var(--ink-300);margin:0;"><?php echo $domain['sub'];?></p>
        </div>
      </div>

      <!-- Procedure cards -->
      <div class="row g-3">
        <?php foreach($domain['procedures'] as $p): ?>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="ik-card h-100 p-4 d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <h5 style="font-size:15px;margin:0;"><?php echo $p['title'];?></h5>
              <span class="proc-code font-mono" style="font-size:10px;font-weight:700;
                    background:var(--surface-2);border:1px solid var(--border);
                    border-radius:6px;padding:2px 7px;color:var(--ink-300);white-space:nowrap;margin-left:8px;">
                <?php echo $p['code'];?>
              </span>
            </div>
            <p style="font-size:13px;color:var(--ink-300);line-height:1.55;flex:1;"><?php echo $p['desc'];?></p>
            <a href="<?php echo APP_URL; ?>/request-care?service=<?php echo $p['service'];?>"
               class="link-arrow mt-2" style="color:<?php echo $chipMap[$domain['chip']];?>;">
              Request <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
    <?php endforeach; ?>

    <!-- Bottom CTA -->
    <div class="ik-card p-5 text-center mt-3"
         style="background:linear-gradient(135deg,var(--navy) 0%,#1e3a8a 100%);border:none;color:#fff;">
      <h3 style="color:#fff;font-size:1.5rem;margin-bottom:10px;">Need Immediate Clinical Assistance?</h3>
      <p style="color:rgba(255,255,255,.65);font-size:14px;max-width:520px;margin:0 auto 28px;">
        Our nursing supervisors are available 24 / 7 to assess your patient's needs and dispatch a registered clinical officer to your home.
      </p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="tel:0241974447" class="btn-white-ik">
          <i class="fa-solid fa-phone" style="color:var(--sapphire)"></i> Call 0241974447
        </a>
        <a href="<?php echo APP_URL; ?>/request-care"
           class="btn-ghost-ik" style="color:rgba(255,255,255,.85);border-color:rgba(255,255,255,.2);background:rgba(255,255,255,.07);">
          <i class="fa-solid fa-calendar-check"></i> Book Online
        </a>
      </div>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
