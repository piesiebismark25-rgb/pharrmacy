<?php
$pageTitle   = 'Contact & Clinical Inquiries – I.K HOLINESS HOME CARE SERVICES';
$currentPage = 'contact';
require_once __DIR__ . '/header.php';
?>

<!-- ╔═══ PAGE HERO ═══╗ -->
<section class="page-hero">
  <div class="container position-relative" style="z-index:2">
    <div class="tag navy mb-3"><i class="fa-solid fa-headset me-1"></i> We Are Here For You 24 / 7</div>
    <h1 style="font-size:clamp(1.8rem,4vw,2.6rem);">Contact & Clinical Inquiries</h1>
    <p class="lead mt-2" style="max-width:560px;">
      Reach our clinical coordination team for any questions about procedures, long-term care packages, or urgent physician visits.
    </p>
  </div>
</section>

<!-- ╔═══ CONTACT CONTENT ═══╗ -->
<section class="section-gap" style="background:var(--surface-2);">
  <div class="container">
    <div class="row g-4 justify-content-center">

      <!-- ── Contact info column ── -->
      <div class="col-12 col-lg-4">

        <?php
        $contacts = [
          ['chip'=>'blue','icon'=>'fa-phone','label'=>'24 / 7 Phone Hotlines',
           'main'=>'<a href="tel:0241974447" class="font-mono" style="font-size:17px;font-weight:700;color:var(--ink);text-decoration:none;">0241974447</a>',
           'sub' =>'<a href="tel:0550974126" class="font-mono" style="font-size:14px;color:var(--ink-300);text-decoration:none;">0550974126</a>',
           'note'=>'On-call registered nurses available for immediate home triage.'],
          ['chip'=>'purple','icon'=>'fa-envelope','label'=>'Clinical Email',
           'main'=>'<a href="mailto:kisaiahh@icloud.com" style="font-size:15px;font-weight:600;color:var(--ink);text-decoration:none;">kisaiahh@icloud.com</a>',
           'sub' =>'','note'=>'Send medical dossiers, referral letters, or corporate care requests.'],
          ['chip'=>'teal','icon'=>'fa-location-dot','label'=>'Practice Headquarters',
           'main'=>'<span style="font-size:15px;font-weight:600;color:var(--ink);">Pankrono, Kumasi, Ghana</span>',
           'sub' =>'','note'=>'Ashanti Region. Domiciliary dispatch across Greater Kumasi.'],
        ];
        foreach($contacts as $c): ?>
        <div class="ik-card p-4 mb-3">
          <div class="d-flex gap-3 mb-2">
            <div class="icon-chip <?php echo $c['chip'];?>" style="width:40px;height:40px;font-size:18px;flex-shrink:0;">
              <i class="fa-solid <?php echo $c['icon'];?>"></i>
            </div>
            <div>
              <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--ink-300);margin-bottom:4px;">
                <?php echo $c['label'];?>
              </div>
              <?php echo $c['main'];?>
              <?php if($c['sub']): ?><div class="mt-1"><?php echo $c['sub'];?></div><?php endif;?>
            </div>
          </div>
          <p style="font-size:12.5px;color:var(--ink-300);margin:0;"><?php echo $c['note'];?></p>
        </div>
        <?php endforeach; ?>

      </div>

      <!-- ── Message form ── -->
      <div class="col-12 col-lg-8">
        <div class="ik-card p-4 p-md-5">

          <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
            <div>
              <h4 style="font-size:18px;margin:0;">Send a Direct Message</h4>
              <p style="font-size:13px;color:var(--ink-300);margin:4px 0 0;">We respond within 30 minutes during call hours.</p>
            </div>
            <span class="tag blue font-mono">DIRECT INTAKE</span>
          </div>

          <?php if(isset($_SESSION['contact_success'])): ?>
          <div class="ik-alert-success mb-4 d-flex gap-2 align-items-start">
            <i class="fa-solid fa-circle-check mt-1"></i>
            <div><?php echo htmlspecialchars($_SESSION['contact_success']); unset($_SESSION['contact_success']); ?></div>
          </div>
          <?php endif; ?>
          <?php if(isset($_SESSION['contact_error'])): ?>
          <div class="ik-alert-error mb-4 d-flex gap-2 align-items-start">
            <i class="fa-solid fa-circle-exclamation mt-1"></i>
            <div><?php echo htmlspecialchars($_SESSION['contact_error']); unset($_SESSION['contact_error']); ?></div>
          </div>
          <?php endif; ?>

          <form action="<?php echo APP_URL; ?>/contact-submit" method="POST" autocomplete="off">
            <div class="row g-3">
              <div class="col-12 col-md-6">
                <label class="ik-label">Full Name <span style="color:var(--rose)">*</span></label>
                <input type="text" name="name" class="ik-input" placeholder="e.g. Grace Mensah" required>
              </div>
              <div class="col-12 col-md-6">
                <label class="ik-label">Phone Number <span style="color:var(--rose)">*</span></label>
                <input type="tel" name="phone" class="ik-input font-mono" placeholder="e.g. 024 123 4567" required>
              </div>
              <div class="col-12 col-md-6">
                <label class="ik-label">Email <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--ink-300)">(optional)</span></label>
                <input type="email" name="email" class="ik-input" placeholder="name@example.com">
              </div>
              <div class="col-12 col-md-6">
                <label class="ik-label">Subject <span style="color:var(--rose)">*</span></label>
                <input type="text" name="subject" class="ik-input" placeholder="e.g. Catheter Care Inquiry" required>
              </div>
              <div class="col-12">
                <label class="ik-label">Your Message <span style="color:var(--rose)">*</span></label>
                <textarea name="message" class="ik-textarea" rows="5"
                          placeholder="Describe the patient condition, care required, or any questions…" required></textarea>
              </div>
              <div class="col-12 mt-2">
                <button type="submit" class="btn-primary-ik w-100 justify-content-center" style="padding:13px">
                  <i class="fa-solid fa-paper-plane"></i> Send Clinical Message
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
