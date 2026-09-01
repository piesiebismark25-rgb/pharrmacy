<?php
$pageTitle   = 'About Our Practice – I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'about';
require_once __DIR__ . '/header.php';
?>

<!-- ╔═══ PAGE HERO ═══╗ -->
<section class="page-hero">
  <div class="container position-relative" style="z-index:2">
    <div class="tag navy mb-3">Established Clinical Practice</div>
    <h1 style="font-size:clamp(1.8rem,4vw,2.6rem);">Compassionate Healthcare<br>at Your Bedside</h1>
    <p class="lead mt-2" style="max-width:580px;">
      Bringing certified medical expertise, sterile nursing, and dignified domiciliary care directly to patients and families across Greater Kumasi.
    </p>
  </div>
</section>

<!-- ╔═══ STATS RIBBON ═══╗ -->
<section style="background:var(--surface);border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="row g-0">
      <?php
      $stats=[
        ['num'=>'16+',  'label'=>'Clinical Procedures','sub'=>'Across 4 care domains'],
        ['num'=>'100%', 'label'=>'Certified Staff',    'sub'=>'Licensed by health authority'],
        ['num'=>'8+',   'label'=>'Kumasi Communities', 'sub'=>'Covered by our teams'],
        ['num'=>'24/7', 'label'=>'On-Call Response',   'sub'=>'Round-the-clock dispatch'],
      ];
      foreach($stats as $s): ?>
      <div class="col-6 col-md-3 stat-block" style="border-right:1px solid var(--border);">
        <div class="stat-num font-serif" style="font-size:2rem;color:var(--sapphire)"><?php echo $s['num'];?></div>
        <div class="stat-label"><?php echo $s['label'];?></div>
        <div style="font-size:11px;color:var(--ink-200);margin-top:2px;"><?php echo $s['sub'];?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ╔═══ MISSION & VISION ═══╗ -->
<section class="section-gap">
  <div class="container">
    <div class="row g-5 align-items-center">

      <div class="col-12 col-lg-6">
        <div class="eyebrow">Our Purpose</div>
        <h2 style="font-size:clamp(1.5rem,3vw,2rem);margin-bottom:16px;">"Your Health Is Our Life"</h2>
        <div class="divider-line"></div>
        <p style="font-size:15px;color:var(--ink-400);line-height:1.7;margin-bottom:16px;">
          Founded on the conviction that quality medical care should be dignified, accessible, and provided in the environment where patients heal best — their own homes.
        </p>
        <p style="font-size:15px;color:var(--ink-400);line-height:1.7;margin-bottom:32px;">
          Headquartered in Pankrono, Kumasi, <strong style="color:var(--ink)">I.K Holiness Home Care Services</strong> provides physician-directed home nursing, diabetic management, sterile wound debridement, catheterization, and stroke rehabilitation.
        </p>
        <div class="row g-3">
          <?php
          $mv=[
            ['icon'=>'fa-bullseye','chip'=>'blue','title'=>'Mission',
             'text'=>'Deliver high-quality, empathetic, hospital-grade home healthcare that accelerates recovery and gives families peace of mind.'],
            ['icon'=>'fa-eye','chip'=>'purple','title'=>'Vision',
             'text'=>'Become the most trusted clinical standard for domiciliary healthcare and nursing therapy across the Ashanti Region.'],
          ];
          foreach($mv as $c): ?>
          <div class="col-12 col-sm-6">
            <div class="ik-card p-4 h-100">
              <div class="icon-chip <?php echo $c['chip'];?> mb-3">
                <i class="fa-solid <?php echo $c['icon'];?>"></i>
              </div>
              <h5 style="font-size:15px;margin-bottom:6px;"><?php echo $c['title'];?></h5>
              <p style="font-size:13px;color:var(--ink-300);line-height:1.55;margin:0;"><?php echo $c['text'];?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Clinical standards card -->
      <div class="col-12 col-lg-6">
        <div class="ik-card p-5" style="border-left:4px solid var(--sapphire);">
          <div class="tag blue mb-3">Clinical Protocols</div>
          <h3 style="font-size:1.35rem;margin-bottom:24px;">Core Practice Standards</h3>

          <?php
          $stds=[
            ['icon'=>'fa-user-shield','chip'=>'blue','title'=>'Patient Dignity & Confidentiality',
             'desc'=>'Discrete, individualized, respectful bedside attention complying with national medical ethics.'],
            ['icon'=>'fa-shield-virus','chip'=>'purple','title'=>'Sterile Aseptic Protocols',
             'desc'=>'Hospital-standard sterilization for every wound dressing, catheter exchange, and injection.'],
            ['icon'=>'fa-file-invoice-dollar','chip'=>'teal','title'=>'Financial Clarity',
             'desc'=>'Transparent itemized billing, verified receipts, and zero undisclosed practitioner fees.'],
          ];
          foreach($stds as $i=>$s): ?>
          <div class="d-flex gap-3 <?php echo $i<2?'mb-4 pb-4 border-bottom':''; ?>">
            <div class="icon-chip <?php echo $s['chip'];?>" style="width:38px;height:38px;font-size:17px;flex-shrink:0;margin-top:2px;">
              <i class="fa-solid <?php echo $s['icon'];?>"></i>
            </div>
            <div>
              <strong style="font-size:14px;color:var(--ink);display:block;margin-bottom:4px;"><?php echo $s['title'];?></strong>
              <p style="font-size:13px;color:var(--ink-300);margin:0;line-height:1.5;"><?php echo $s['desc'];?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ╔═══ COVERAGE ═══╗ -->
<section class="section-gap-sm" style="background:var(--surface-2);">
  <div class="container text-center">
    <div class="eyebrow mx-auto" style="justify-content:center;">Where We Serve</div>
    <h2 style="font-size:clamp(1.4rem,2.5vw,1.9rem);margin-bottom:8px;">Serving Greater Kumasi & Surrounding Communities</h2>
    <p style="font-size:14px;color:var(--ink-300);margin-bottom:28px;">
      Our on-call clinical teams travel directly to patient residences across:
    </p>
    <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
      <?php foreach(['Pankrono','Tafo','Ahodwo','Asokwa','Kwadaso','Bantama','Suame','Santasi'] as $area): ?>
      <span class="tag blue"><?php echo $area;?></span>
      <?php endforeach; ?>
    </div>
    <a href="<?php echo APP_URL; ?>/request-care" class="btn-primary-ik">
      <i class="fa-solid fa-calendar-check"></i> Book Care in Your Neighbourhood
    </a>
  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
