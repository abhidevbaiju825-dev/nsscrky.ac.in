<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Life</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">National Service Scheme (NSS)</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<?php
  $hasCoordinator = false;
  $hasVoluntary = false;
  if (!empty($nss_incharge)) {
    foreach ($nss_incharge as $v) {
      if ($v['_designation'] === 'Program Co-ordinator') $hasCoordinator = true;
      if ($v['_designation'] === 'Voluntary Secretary') $hasVoluntary = true;
    }
  }
  $hasSidebar = $hasCoordinator;
?>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="<?= $hasSidebar ? 'grid lg:grid-cols-3 gap-12' : 'max-w-4xl mx-auto' ?>">
    
    <!-- Main Description -->
    <div class="<?= $hasSidebar ? 'lg:col-span-2' : '' ?> space-y-10">
      <div style="background:#fff;border-radius:20px;padding:40px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;">
          <img src="<?= base_url('uploads/static/nss_logo.png'); ?>" style="width:40px; height:40px;" alt="NSS Logo" onerror="this.style.display='none'">
          <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;">Unit Mission & Vision</h2>
        </div>
        <div style="line-height:1.8;color:#444;font-size:16px;text-align:justify;" class="space-y-6">
          <p>National Service Scheme is a voluntary organization working under the Ministry of Youth Affairs and Sports, Govt. of India. The purpose of NSS is purely educational, upholding the concept of "Education through Social Service". It focuses on the overall development of the personality of the students through community services.</p>
          <p>We have two units of NSS with a strength of hundred volunteers each. Admission to NSS is open only to I DC and II DC students. To be eligible for an NSS certificate, a volunteer has to undergo 240 hours of regular activities and attend a seven-day special camp.</p>
          <div style="background:#f8fafc;padding:20px;border-radius:12px;border-left:4px solid #0d2448;">
            <p style="margin:0;font-style:italic;">"The NSS units of our college engage in social awareness programmes and cultural activities. World Environment Day, Aids Day, and NSS Day are observed with due importance."</p>
          </div>
          <p>A special unit of NSS works in collaboration with the Primary Health Centre, Rajakumari, taking care of palliative patients. The team regularly visits the homes of palliative patients to provide necessary support.</p>
        </div>
      </div>

      <!-- Voluntary Secretaries -->
      <?php if($hasVoluntary): ?>
      <div style="background:#fff;border-radius:20px;padding:32px;border:1px solid #eee;box-shadow:0 4px 20px rgba(0,0,0,0.03);">
        <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:700;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
          <span style="font-size:20px;">🤝</span> Voluntary Secretaries
        </h3>
        <div class="grid sm:grid-cols-2 gap-4">
          <?php foreach($nss_incharge as $val): if($val['_designation']==="Voluntary Secretary"): ?>
          <div style="background:#f9fafb;padding:16px;border-radius:12px;border:1px solid #eee;display:flex;align-items:center;gap:12px;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a'" onmouseout="this.style.borderColor='#eee'">
            <div style="width:8px;height:8px;background:#b8922a;border-radius:50%;flex-shrink:0;"></div>
            <div>
              <div style="font-size:14px;font-weight:700;color:#0d2448;"><?= $val['_name'] ?></div>
              <div style="font-size:12px;color:#666;"><?= $val['_details'] ?></div>
            </div>
          </div>
          <?php endif; endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Unit Stats (shown when no sidebar) -->
      <?php if(!$hasSidebar): ?>
      <div style="background:#fef9e7;padding:28px;border-radius:20px;border:1px solid #faebcc;">
        <h3 style="font-family:'Cinzel',serif;font-size:14px;color:#856404;font-weight:800;margin-bottom:12px;text-transform:uppercase;">Unit Stats</h3>
        <div class="grid sm:grid-cols-3 gap-6">
          <div style="text-align:center;">
            <div style="font-size:28px;font-weight:800;color:#856404;">02</div>
            <div style="font-size:12px;color:#856404;opacity:0.8;">Active Units</div>
          </div>
          <div style="text-align:center;">
            <div style="font-size:28px;font-weight:800;color:#856404;">200</div>
            <div style="font-size:12px;color:#856404;opacity:0.8;">Total Volunteers</div>
          </div>
          <div style="text-align:center;">
            <div style="font-size:28px;font-weight:800;color:#856404;">Annual</div>
            <div style="font-size:12px;color:#856404;opacity:0.8;">Special Camps</div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <!-- Coordinator Sidebar -->
    <?php if($hasSidebar): ?>
    <div class="space-y-8">
      <?php foreach($nss_incharge as $val): if($val['_designation']==="Program Co-ordinator"): ?>
      <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,0.05);border:1px solid #eee;text-align:center;">
        <div style="padding:40px 20px;">
          <img src="<?= !empty($val['_imgloc']) ? base_url($val['_imgloc']) : base_url('uploads/static/avatar.png') ?>" alt="<?= $val['_name'] ?>" style="width:120px;height:120px;border-radius:50%;object-fit:cover;margin:0 auto 20px;border:4px solid #f8fafc;box-shadow:0 4px 15px rgba(0,0,0,0.1);">
          <div style="font-family:'Cinzel',serif;font-size:12px;font-weight:800;color:#b8922a;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:8px;">Programme Coordinator</div>
          <h4 style="font-size:18px;font-weight:700;color:#0d2448;margin-bottom:4px;"><?= $val['_name'] ?></h4>
          <p style="font-size:13px;color:#666;line-height:1.5;"><?= $val['_details'] ?></p>
        </div>
        <div style="background:#0d2448;padding:15px;color:#fff;font-size:12px;font-weight:600;">
          NSS Units 24 & 25
        </div>
      </div>
      <?php endif; endforeach; ?>


    </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
