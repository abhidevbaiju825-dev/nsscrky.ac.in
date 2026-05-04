<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Principal's Desk</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<?php if(!empty($details_p)): ?>
<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div style="background:#fff;border-radius:16px;box-shadow:0 4px 30px rgba(13,36,72,0.08);overflow:hidden;border:1px solid #eee;">
    <div class="grid md:grid-cols-3 gap-0">
      <!-- Profile -->
      <div style="background:linear-gradient(135deg,#f8f9fb 0%,#eef1f5 100%);padding:40px 30px;text-align:center;border-right:1px solid #eee;">
        <?php if(!empty($details_p['_imgloc'])): ?>
          <div style="width:180px;height:180px;border-radius:50%;overflow:hidden;margin:0 auto;border:4px solid #fff;box-shadow:0 6px 20px rgba(0,0,0,0.12);">
            <img src="<?= base_url($details_p['_imgloc']) ?>" alt="<?= esc($details_p['_name']) ?>" style="width:100%;height:100%;object-fit:cover;">
          </div>
        <?php else: ?>
          <div style="width:180px;height:180px;border-radius:50%;background:#dee2e6;display:inline-flex;align-items:center;justify-content:center;margin:0 auto;">
            <svg width="70" height="70" fill="none" viewBox="0 0 24 24" stroke="#adb5bd" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"/></svg>
          </div>
        <?php endif; ?>
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-top:18px;"><?= esc($details_p['_name'] ?? '') ?></h3>
        <?php if(!empty($details_p['_qualification'])): ?>
          <p style="color:#6c757d;font-size:14px;margin-top:4px;"><?= esc($details_p['_qualification']) ?></p>
        <?php endif; ?>
        <div style="margin-top:16px;">
          <?php if(!empty($details_p['_phone'])): ?>
            <p style="color:#555;font-size:13px;margin:4px 0;"><span style="color:#b8922a;margin-right:6px;">✆</span> +91 <?= esc($details_p['_phone']) ?></p>
          <?php endif; ?>
          <?php if(!empty($details_p['_email'])): ?>
            <p style="color:#555;font-size:13px;margin:4px 0;"><span style="color:#b8922a;margin-right:6px;">✉</span> <?= esc($details_p['_email']) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <!-- Message -->
      <div class="md:col-span-2" style="padding:40px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:12px;">Message from the Principal</div>
        <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
          <?= $details_p['_message'] ?? '' ?>
        </div>
        <?php if(!empty($details_p['_about'])): ?>
          <div style="height:1px;background:linear-gradient(90deg,#b8922a,transparent);margin:24px 0;"></div>
          <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
            <?= $details_p['_about'] ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Former Principals -->
<section style="background:#f9fafb;border-top:1px solid #eee;">
  <div class="max-w-screen-xl mx-auto px-4 py-14">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">History</div>
    <h2 style="font-family:'Cinzel',serif;font-size:24px;color:#0d2448;font-weight:600;margin-bottom:8px;">Former Principals</h2>
    <div style="width:50px;height:3px;background:#b8922a;margin-bottom:28px;border-radius:2px;"></div>

    <?php if(!empty($fdet)): ?>
    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
      <table style="width:100%;border-collapse:collapse;">
        <thead>
          <tr style="background:#0d2448;">
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;letter-spacing:0.05em;width:8%;">#</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;letter-spacing:0.05em;">Name</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;letter-spacing:0.05em;">From</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;letter-spacing:0.05em;">To</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($fdet as $i => $val): ?>
          <tr style="border-bottom:1px solid #f0f0f0;transition:background 0.15s;" onmouseover="this.style.background='#fafbfc'" onmouseout="this.style.background=''">
            <td style="padding:14px 20px;color:#888;font-size:14px;"><?= $i + 1 ?></td>
            <td style="padding:14px 20px;font-weight:600;color:#0d2448;font-size:14px;"><?= esc($val['_name']) ?></td>
            <td style="padding:14px 20px;color:#555;font-size:14px;"><?= !empty($val['_from_date']) ? date('d M Y', strtotime($val['_from_date'])) : '—' ?></td>
            <td style="padding:14px 20px;color:#555;font-size:14px;"><?= (!empty($val['_to_date']) && $val['_to_date'] != '0000-00-00') ? date('d M Y', strtotime($val['_to_date'])) : '<span style="color:#b8922a;font-style:italic;">Present</span>' ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php else: ?>
      <p style="text-align:center;color:#aaa;padding:30px;">No records available.</p>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
