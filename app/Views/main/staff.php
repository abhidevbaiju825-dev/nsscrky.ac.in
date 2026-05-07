<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Teaching Staff</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-10">
  <!-- Department Filters -->
  <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:32px;">
    <a href="<?= site_url('Home/staff/All') ?>" style="padding:8px 20px;border-radius:20px;font-size:13px;font-weight:500;text-decoration:none;background:#0d2448;color:#fff;transition:all 0.2s;">All</a>
    <?php foreach($_staff_list as $staffde): ?>
      <?php if(count($staffde['_staff_list']) > 0): ?>
        <a href="<?= site_url('Home/staff/'.$staffde['_dep_id']) ?>" style="padding:8px 20px;border-radius:20px;font-size:13px;font-weight:500;text-decoration:none;background:#f4f4f4;color:#0d2448;border:1px solid #e0e0e0;transition:all 0.2s;" onmouseover="this.style.background='#0d2448';this.style.color='#fff';this.style.borderColor='#0d2448'" onmouseout="this.style.background='#f4f4f4';this.style.color='#0d2448';this.style.borderColor='#e0e0e0'"><?= esc($staffde['_department_name']) ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <!-- Staff Grid -->
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php foreach($_all_teacher_list as $row): ?>
    <a href="<?= site_url('Home/view_teacher_detail/'.$row['_teacher_id']) ?>" style="text-decoration:none;display:block;text-align:center;background:#fff;border-radius:14px;padding:28px 16px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #f0f0f0;transition:all 0.25s;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 10px 30px rgba(13,36,72,0.12)';this.style.borderColor='rgba(184,146,42,0.3)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(0,0,0,0.05)';this.style.borderColor='#f0f0f0'">
      <div style="width:120px;height:120px;border-radius:50%;overflow:hidden;margin:0 auto 14px;border:3px solid rgba(184,146,42,0.25);">
        <img src="<?= ($row['_imgloc'] == '') ? base_url('uploads/static/avatar.png') : base_url($row['_imgloc']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
      </div>
      <h4 style="font-size:14px;font-weight:600;color:#0d2448;margin-bottom:4px;"><?= esc($row['_name']) ?></h4>
      <p style="font-size:12px;color:#b8922a;margin-bottom:8px;letter-spacing:0.03em;"><?= esc($row['_designation']) ?></p>
      <div style="font-size:11px;color:#888;">
        <?php if(trim($row['_email'] ?? '') != '' && ($row['_email_visible'] ?? '') != 'on'): ?>
          <p style="margin:2px 0;">✉ <?= esc($row['_email']) ?></p>
        <?php endif; ?>
        <?php if(trim($row['_phone'] ?? '') != '' && ($row['_mobile_visible'] ?? '') != 'on'): ?>
          <p style="margin:2px 0;">✆ <?= esc($row['_phone']) ?></p>
        <?php endif; ?>
      </div>
    </a>
    <?php endforeach; ?>
  </div>

  <?php if(empty($_all_teacher_list)): ?>
  <div style="text-align:center;padding:60px 20px;color:#aaa;">
    <p style="font-size:16px;">No staff records available.</p>
  </div>
  <?php endif; ?>
</section>

<?= $this->endSection() ?>
