<?php
$pageTitle   = 'I.K HOLINESS HOME CARE SERVICES – Premium Domiciliary Healthcare in Kumasi';
$currentPage = 'home';
require_once __DIR__ . '/header.php';
?>

<!-- ╔═══ HERO ═══╗ -->
<section style="background:linear-gradient(135deg,var(--navy) 0%,#1e3a8a 60%,#1e40af 100%);
                padding:96px 0 80px;position:relative;overflow:hidden;">

  <!-- decorative rings -->
  <div class="deco-ring" style="width:600px;height:600px;border-color:rgba(255,255,255,.04);
       top:-200px;right:-200px;"></div>
  <div class="deco-ring" style="width:350px;height:350px;border-color:rgba(255,255,255,.05);
       bottom:-100px;left:-80px;"></div>

  <div class="container position-relative">
    <div class="row align-items-center g-5">

      <!-- Left copy -->
      <div class="col-12 col-lg-6">
        <div class="tag navy mb-4"><i class="fa-solid fa-house-medical me-1"></i> Licensed Home Care Practice · Kumasi</div>

        <h1 class="font-serif mb-4" style="font-size:clamp(2.2rem,4.5vw,3.4rem);color:#fff;
            line-height:1.1;font-weight:400;font-style:italic;">
          Hospital-Grade Care,<br>
          <span style="font-style:normal;font-weight:700;">At Your Doorstep.</span>
        </h1>

        <p style="font-size:16px;color:rgba(255,255,255,.7);line-height:1.7;max-width:480px;margin-bottom:36px;">
          Physician-directed nursing, sterile wound care, catheterization, glycaemic monitoring,
          and stroke rehabilitation — provided by certified officers in the comfort of your home.
        </p>

        <div class="d-flex flex-wrap gap-3 mb-5">
          <a href="<?php echo APP_URL; ?>/request-care" class="btn-white-ik">
            <i class="fa-solid fa-calendar-check" style="color:var(--sapphire)"></i> Book a Home Visit
          </a>
          <a href="tel:0241974447" class="btn-ghost-ik"
             style="color:rgba(255,255,255,.85);border-color:rgba(255,255,255,.2);background:rgba(255,255,255,.06);">
            <i class="fa-solid fa-phone" style="color:#60a5fa"></i> 0241974447
          </a>
        </div>

        <!-- Trust strip -->
        <div class="d-flex flex-wrap gap-4" style="font-size:12px;color:rgba(255,255,255,.5);">
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check" style="color:#34d399"></i>
            <span>Certified Nursing Officers</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check" style="color:#34d399"></i>
            <span>Sterile Aseptic Protocols</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check" style="color:#34d399"></i>
            <span>24 / 7 On-Call Response</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check" style="color:#34d399"></i>
            <span>Zero Hidden Charges</span>
          </div>
        </div>
      </div>

      <!-- Right — clinical vitals widget -->
      <div class="col-12 col-lg-6">
        <div class="ms-lg-4" style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);
             border-radius:var(--r-xl);padding:28px;backdrop-filter:blur(12px);">

          <!-- Header row -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center gap-3">
              <div class="icon-chip navy">
                <i class="fa-solid fa-user-nurse"></i>
              </div>
              <div>
                <div style="font-size:14px;font-weight:700;color:#fff;">Clinical Officer On Duty</div>
                <div style="font-size:11px;color:#34d399;font-family:var(--font-mono);">
                  <i class="fa-solid fa-circle me-1" style="font-size:7px;"></i> Active Dispatch
                </div>
              </div>
            </div>
            <div class="tag navy">24 / 7</div>
          </div>

          <!-- Vitals grid -->
          <div class="row g-2 mb-4">
            <?php
            $vitals = [
              ['label'=>'Blood Pressure','value'=>'120 / 80','unit'=>'mmHg','color'=>'#60a5fa'],
              ['label'=>'SpO₂ Oxygen',  'value'=>'98%',      'unit'=>'Normal','color'=>'#34d399'],
              ['label'=>'Blood Glucose','value'=>'5.4',       'unit'=>'mmol/L','color'=>'#fbbf24'],
              ['label'=>'Heart Rate',   'value'=>'72',        'unit'=>'BPM',   'color'=>'#f87171'],
            ];
            foreach($vitals as $v): ?>
            <div class="col-6">
              <div style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);
                   border-radius:12px;padding:12px 14px;">
                <div style="font-size:10px;text-transform:uppercase;letter-spacing:.07em;
                     color:rgba(255,255,255,.4);margin-bottom:4px;"><?php echo $v['label'];?></div>
                <div style="font-size:22px;font-weight:700;font-family:var(--font-mono);
                     color:<?php echo $v['color'];?>;line-height:1;"><?php echo $v['value'];?></div>
                <div style="font-size:10px;color:rgba(255,255,255,.3);margin-top:2px;"><?php echo $v['unit'];?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <!-- Sterile notice -->
          <div style="background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.25);
               border-radius:10px;padding:10px 14px;font-size:12px;color:rgba(255,255,255,.65);">
            <i class="fa-solid fa-shield-check me-2" style="color:#34d399"></i>
            All procedures use single-use hospital-grade sterile kits.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ╔═══ STATS ═══╗ -->
<section style="background:var(--surface);border-bottom:1px solid var(--border);padding:0">
  <div class="container">
    <div class="row g-0 divide-x">
      <?php
      $stats = [
        ['num'=>'16+',  'label'=>'Clinical Procedures'],
        ['num'=>'100%', 'label'=>'Licensed Nursing Officers'],
        ['num'=>'8+',   'label'=>'Kumasi Communities'],
        ['num'=>'24/7', 'label'=>'On-Call Rapid Response'],
      ];
      foreach($stats as $s): ?>
      <div class="col-6 col-md-3" style="border-right:1px solid var(--border);">
        <div class="stat-block">
          <div class="stat-num font-serif"><?php echo $s['num'];?></div>
          <div class="stat-label"><?php echo $s['label'];?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ╔═══ SERVICES ═══╗ -->
<section class="section-gap" style="background:var(--surface-2);">
  <div class="container">

    <div class="row justify-content-between align-items-end mb-5">
      <div class="col-12 col-md-7">
        <div class="eyebrow">What We Offer</div>
        <h2 style="font-size:clamp(1.6rem,3vw,2.2rem);">Specialized Clinical Services</h2>
        <p style="font-size:15px;color:var(--ink-300);max-width:480px;margin-top:10px;">
          Physician-directed home procedures across four clinical domains, delivered with hospital precision.
        </p>
      </div>
      <div class="col-12 col-md-auto mt-3 mt-md-0">
        <a href="<?php echo APP_URL; ?>/services" class="btn-ghost-ik">
          View Full Catalog <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
      </div>
    </div>

    <div class="row g-4">
      <?php
      $services = [
        ['icon'=>'fa-heart-pulse','chip'=>'blue','title'=>'Clinical Nursing',
         'desc'=>'Vital sign monitoring, glycaemic surveillance, phlebotomy, and medication administration in your home.',
         'tags'=>['Glucose Checks','Vital Signs','Lab Sampling','Medications'],
         'link'=>'Clinical+Nursing','link_color'=>'var(--sapphire)'],

        ['icon'=>'fa-syringe','chip'=>'purple','title'=>'Specialized Procedures',
         'desc'=>'Sterile wound debridement, urinary catheterization, NG tube feeding, and invasive clinical care.',
         'tags'=>['Wound Dressing','Catheter Care','NG Tube Feeding','Aseptic Kits'],
         'link'=>'Specialized+Care','link_color'=>'var(--violet)'],

        ['icon'=>'fa-person-walking','chip'=>'teal','title'=>'Rehabilitation',
         'desc'=>'Physiotherapy, stroke mobility exercises, post-operative care, and supervised hospital escort.',
         'tags'=>['Physiotherapy','Post-Op Care','Hospital Escort','Health Talk'],
         'link'=>'Rehabilitation','link_color'=>'var(--teal)'],

        ['icon'=>'fa-bath','chip'=>'rose','title'=>'Daily Living Care',
         'desc'=>'Bed bathing, oral hygiene, individualised nutrition planning, and in-home physician consultations.',
         'tags'=>['Bed Bathing','Oral Hygiene','Nutrition Plan','Doctor Reviews'],
         'link'=>'Daily+Living+Care','link_color'=>'var(--rose)'],
      ];
      foreach($services as $s): ?>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="ik-card h-100 p-4 d-flex flex-column">
          <div class="icon-chip <?php echo $s['chip'];?> mb-3">
            <i class="fa-solid <?php echo $s['icon'];?>"></i>
          </div>
          <h5 style="font-size:16px;margin-bottom:8px;"><?php echo $s['title'];?></h5>
          <p style="font-size:13px;color:var(--ink-300);line-height:1.55;flex:1;"><?php echo $s['desc'];?></p>
          <div class="d-flex flex-wrap gap-1 mb-4 mt-2">
            <?php foreach($s['tags'] as $t): ?>
            <span class="spill"><?php echo $t;?></span>
            <?php endforeach; ?>
          </div>
          <a href="<?php echo APP_URL; ?>/request-care?service=<?php echo $s['link'];?>"
             class="link-arrow" style="color:<?php echo $s['link_color'];?>">
            Request Service <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ╔═══ HOW IT WORKS ═══╗ -->
<section class="section-gap" style="background:var(--surface);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="eyebrow mx-auto" style="justify-content:center;">How It Works</div>
      <h2 style="font-size:clamp(1.6rem,3vw,2.2rem);">Simple Three-Step Patient Journey</h2>
      <p style="font-size:15px;color:var(--ink-300);max-width:480px;margin:10px auto 0;">
        From first call to bedside care — without the waiting room.
      </p>
    </div>

    <div class="row g-4">
      <?php
      $steps = [
        ['n'=>'01','title'=>'Submit a Request','desc'=>'Fill our short online intake form or call 0241974447. Our coordinator triages your patient within 15 minutes.',
         'icon'=>'fa-clipboard-list','chip'=>'blue'],
        ['n'=>'02','title'=>'Nurse Dispatched','desc'=>'A licensed clinical officer prepares a sterile procedure kit and travels directly to your home at the confirmed time.',
         'icon'=>'fa-truck-medical','chip'=>'teal'],
        ['n'=>'03','title'=>'Bedside Treatment','desc'=>'Receive clinical-grade care in dignity. Vital readings and procedure notes are filed in your personal medical dossier.',
         'icon'=>'fa-notes-medical','chip'=>'purple'],
      ];
      foreach($steps as $s): ?>
      <div class="col-12 col-md-4">
        <div class="d-flex gap-4">
          <div>
            <div class="step-num"><?php echo $s['n'];?></div>
            <div style="width:2px;background:var(--border);margin:10px auto 0;height:calc(100% - 46px);"></div>
          </div>
          <div class="pb-4">
            <div class="icon-chip <?php echo $s['chip'];?> mb-3">
              <i class="fa-solid <?php echo $s['icon'];?>"></i>
            </div>
            <h5 style="font-size:16px;margin-bottom:8px;"><?php echo $s['title'];?></h5>
            <p style="font-size:13.5px;color:var(--ink-300);line-height:1.6;"><?php echo $s['desc'];?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ╔═══ CTA BAND ═══╗ -->
<section style="background:linear-gradient(135deg,var(--navy) 0%,#1e3a8a 100%);padding:72px 0;">
  <div class="container text-center">
    <div class="tag navy mx-auto mb-3">On-Call Helpline</div>
    <h2 class="font-serif" style="color:#fff;font-size:clamp(1.7rem,3.5vw,2.6rem);font-style:italic;font-weight:400;margin-bottom:16px;">
      Need Immediate <span style="font-style:normal;font-weight:700;">In-Home Care?</span>
    </h2>
    <p style="font-size:15px;color:rgba(255,255,255,.65);max-width:520px;margin:0 auto 36px;">
      Our clinical supervisor is available round the clock to deploy registered nursing officers to your residence anywhere in Kumasi.
    </p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="tel:0241974447" class="btn-white-ik">
        <i class="fa-solid fa-phone" style="color:var(--sapphire)"></i> Call 0241974447
      </a>
      <a href="<?php echo APP_URL; ?>/request-care"
         class="btn-ghost-ik"
         style="color:rgba(255,255,255,.85);border-color:rgba(255,255,255,.2);background:rgba(255,255,255,.06);">
        <i class="fa-solid fa-calendar-check"></i> Request Online
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>