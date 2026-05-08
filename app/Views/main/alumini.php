<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Alumni</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<?php foreach($data as $row): ?>
<section class="max-w-screen-xl mx-auto px-4 py-14">
  <!-- Description -->
  <div style="background:#fff;border-radius:16px;padding:24px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;margin-bottom:32px;" class="md:!p-10">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Our Alumni</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:16px;">Alumni Association</h2>
    <div style="width:50px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
    <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
      <?php if(!empty($row['_description'])){ echo $row['_description']; } ?>
    </div>
  </div>

  <!-- Incharges -->
  <?php if(!empty($incharges)): ?>
  <div style="margin-bottom:32px;">
    <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:24px;">Alumni Committee</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach($incharges as $val): ?>
      <div style="background:#fff;border-radius:16px;padding:24px;border:1px solid #eee;text-align:center;box-shadow:0 2px 15px rgba(0,0,0,0.05);">
        <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;margin:0 auto 14px;border:3px solid rgba(184,146,42,0.3);">
          <img src="<?php if(!empty($val['_profile_picture'])){ echo base_url($val['_profile_picture']); } else { echo base_url('uploads/static/avatar.png'); } ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <div style="font-weight:700;color:#b8922a;font-size:13px;margin-bottom:4px;"><?php if(!empty($val['_designation'])){ echo $val['_designation']; } ?></div>
        <div style="font-weight:600;color:#0d2448;font-size:15px;margin-bottom:4px;"><?php if(!empty($val['_full_name'])){ echo $val['_full_name']; } ?></div>
        <?php if(!empty($val['_wdetails'])): ?>
          <div style="font-size:12px;color:#666;margin-bottom:4px;"><?= $val['_wdetails'] ?></div>
        <?php endif; ?>
        <?php if(!empty($val['_phone'])): ?>
          <div style="font-size:12px;color:#888;">📞 <?= $val['_phone'] ?></div>
        <?php endif; ?>
        <?php if(!empty($val['_email'])): ?>
          <div style="font-size:12px;color:#888;word-break:break-all;">✉ <?= $val['_email'] ?></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
</section>
<?php endforeach; ?>

<!-- Testimonials -->
<?php if(!empty($test)): ?>
<section style="background:#f9fafb;border-top:1px solid #eee;">
  <div class="max-w-screen-xl mx-auto px-4 py-14">
    <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:32px;text-align:center;">Testimonials</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach($test as $val): ?>
        <?php if($val->_testimonial_rank =="" || $val->_testimonial_rank == 0 || $val->_testimonial_rank == -1){ continue; } ?>
        <div style="background:#fff;border-radius:16px;padding:24px;border:1px solid #eee;box-shadow:0 2px 15px rgba(0,0,0,0.05);position:relative;">
          <div style="font-size:48px;color:rgba(184,146,42,0.15);font-family:'EB Garamond',serif;line-height:1;position:absolute;top:12px;right:20px;">"</div>
          <div style="font-size:14px;color:#555;line-height:1.7;font-style:italic;margin-bottom:16px;">
            <?= $val->_testimonial ?>
          </div>
          <div style="border-top:1px solid #eee;padding-top:12px;">
            <div style="font-weight:600;color:#0d2448;font-size:14px;"><?php if(!empty($val->_full_name)){ echo $val->_full_name; } ?></div>
            <div style="font-size:12px;color:#b8922a;"><?php if(!empty($val->_job_specification)){ echo $val->_job_specification; } ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?= $this->endSection() ?>
