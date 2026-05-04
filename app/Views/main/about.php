<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">About the Institution</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<!-- Founder Section -->
<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="text-center mb-14">
    <div style="width:220px;height:220px;border-radius:50%;border:5px solid #b8922a;overflow:hidden;margin:0 auto;box-shadow:0 8px 30px rgba(13,36,72,0.15);">
      <img src="<?= base_url('assets/images/mannathu_padmanabha_pillai.jpg') ?>" alt="Founder" style="width:100%;height:100%;object-fit:cover;">
    </div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;margin-top:18px;font-weight:600;">Padma Bhushan Bharatha Kesari Mannathu Padmanabhan</h2>
    <p style="color:#b8922a;font-size:14px;letter-spacing:0.1em;margin-top:4px;">02/01/1878 – 25/02/1970 · Founder, Nair Service Society</p>
  </div>
</section>

<!-- Management Section -->
<?php foreach($management as $row): ?>
<section style="background:#f9fafb;border-top:1px solid #eee;border-bottom:1px solid #eee;">
  <div class="max-w-screen-xl mx-auto px-4 py-14">
    <div class="grid md:grid-cols-2 gap-10 items-start">
      <div>
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Institution</div>
        <h2 style="font-family:'Cinzel',serif;font-size:24px;color:#0d2448;font-weight:600;margin-bottom:16px;">Our Management</h2>
        <div style="width:50px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
          <?= $row['_description'] ?>
        </div>
      </div>
      <div style="display:flex;justify-content:center;">
        <div style="border-radius:12px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,0.1);border:3px solid rgba(184,146,42,0.2);">
          <img src="<?= !empty($row['_imgloc']) ? base_url($row['_imgloc']) : base_url('assets/images/bg_default.png') ?>" alt="Management" style="max-width:100%;height:auto;">
        </div>
      </div>
    </div>
  </div>
</section>
<?php endforeach; ?>

<!-- Our Team Section -->
<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">People</div>
  <h2 style="font-family:'Cinzel',serif;font-size:24px;color:#0d2448;font-weight:600;margin-bottom:8px;">Our Management Team</h2>
  <div style="width:50px;height:3px;background:#b8922a;margin-bottom:32px;border-radius:2px;"></div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <?php foreach($our_team as $row): ?>
    <div style="text-align:center;background:#fff;border-radius:12px;padding:24px 16px;box-shadow:0 2px 15px rgba(0,0,0,0.06);border:1px solid #f0f0f0;transition:transform 0.2s,box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 25px rgba(13,36,72,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 15px rgba(0,0,0,0.06)'">
      <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;margin:0 auto 12px;border:3px solid rgba(184,146,42,0.3);">
        <img src="<?= ($row['_imgloc'] == '') ? base_url('assets/images/avatar.png') : base_url($row['_imgloc']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
      </div>
      <h4 style="font-size:14px;font-weight:600;color:#0d2448;margin-bottom:4px;"><?= esc($row['_name']) ?></h4>
      <p style="font-size:12px;color:#b8922a;letter-spacing:0.05em;"><?= esc($row['_designation']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<?= $this->endSection() ?>
