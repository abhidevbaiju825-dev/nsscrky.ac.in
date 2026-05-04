<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:6px;">Faculty</div>
    <h1 style="font-family:'Cinzel',serif;font-size:26px;color:#fff;font-weight:600;letter-spacing:0.04em;"><?= esc($teacher_data['_name']) ?></h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div style="background:#fff;border-radius:16px;box-shadow:0 4px 30px rgba(13,36,72,0.08);overflow:hidden;border:1px solid #eee;">
    <div class="grid md:grid-cols-3 gap-0">
      <!-- Photo & Basic Info -->
      <div style="background:linear-gradient(135deg,#f8f9fb 0%,#eef1f5 100%);padding:40px 30px;text-align:center;border-right:1px solid #eee;">
        <div style="width:180px;height:180px;border-radius:50%;overflow:hidden;margin:0 auto;border:4px solid #fff;box-shadow:0 6px 20px rgba(0,0,0,0.12);">
          <img src="<?= $teacher_data['_profile_pic'] ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-top:18px;"><?= esc($teacher_data['_name']) ?></h3>
        <p style="color:#b8922a;font-size:14px;margin-top:4px;letter-spacing:0.03em;"><?= esc($teacher_data['_designation']) ?></p>
        <div style="margin-top:16px;">
          <?php if(trim($teacher_data['_mobile_visible'] ?? '') != 'on' && trim($teacher_data['_phone'] ?? '') != ''): ?>
            <p style="color:#555;font-size:13px;margin:5px 0;"><span style="color:#b8922a;">✆</span> <?= esc($teacher_data['_phone']) ?></p>
          <?php endif; ?>
          <?php if(trim($teacher_data['_email_visible'] ?? '') != 'on' && trim($teacher_data['_email'] ?? '') != ''): ?>
            <p style="color:#555;font-size:13px;margin:5px 0;"><span style="color:#b8922a;">✉</span> <?= esc($teacher_data['_email']) ?></p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Details -->
      <div class="md:col-span-2" style="padding:40px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:18px;">Profile Details</div>

        <div style="display:flex;flex-direction:column;gap:0;">
          <?php
          $fields = [];
          if(trim($teacher_data['_qualification'] ?? '') != '') $fields[] = ['Qualification', $teacher_data['_qualification']];
          if(trim($teacher_data['_area_of_specialization'] ?? '') != '') $fields[] = ['Area of Specialization', $teacher_data['_area_of_specialization']];
          if(trim($teacher_data['_description'] ?? '') != '') $fields[] = ['About', $teacher_data['_description']];
          ?>
          <?php foreach($fields as $f): ?>
          <div style="display:flex;border-bottom:1px solid #f0f0f0;padding:16px 0;">
            <div style="width:200px;flex-shrink:0;font-weight:600;color:#0d2448;font-size:14px;"><?= $f[0] ?></div>
            <div style="color:#555;font-size:14px;line-height:1.7;"><?= $f[1] ?></div>
          </div>
          <?php endforeach; ?>

          <!-- Papers Published -->
          <?php if(!empty($teacher_data['array_paper_published'])): ?>
          <div style="margin-top:28px;">
            <h4 style="font-family:'Cinzel',serif;font-size:16px;color:#0d2448;font-weight:600;margin-bottom:16px;">Publications</h4>
            <?php foreach($teacher_data['array_paper_published'] as $paper): ?>
            <div style="background:#f9fafb;border-radius:10px;padding:16px;margin-bottom:10px;border:1px solid #eee;">
              <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:6px;">
                <span style="background:#0d2448;color:#fff;padding:2px 10px;border-radius:4px;font-size:11px;"><?= date('d/m/Y', strtotime($paper['_date'])) ?></span>
                <span style="background:rgba(184,146,42,0.1);color:#b8922a;padding:2px 10px;border-radius:4px;font-size:11px;"><?= esc($paper['_journal']) ?></span>
              </div>
              <p style="color:#555;font-size:13px;line-height:1.6;"><?= $paper['_description'] ?></p>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div style="margin-top:24px;">
    <a href="<?= base_url('Home/staff/All') ?>" style="display:inline-flex;align-items:center;gap:6px;color:#b8922a;font-size:14px;font-weight:500;text-decoration:none;" onmouseover="this.style.color='#0d2448'" onmouseout="this.style.color='#b8922a'">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
      Back to Staff
    </a>
  </div>
</section>

<?= $this->endSection() ?>
