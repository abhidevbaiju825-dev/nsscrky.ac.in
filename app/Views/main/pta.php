<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Parent Teacher Association (PTA)</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="space-y-16">
    
    <!-- Top Section: About & Leadership -->
    <div class="grid lg:grid-cols-3 gap-12">
      <div class="lg:col-span-2">
        <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
          <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Collaborative Excellence</div>
          <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">About the PTA</h2>
          <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
            <?php if ($pta_about): ?>
                <?= $pta_about['description']; ?>
            <?php else: ?>
                <p>The Parent Teacher Association (PTA) of our college plays a vital role in the academic and infrastructural development of the institution. It fosters a close relationship between parents and teachers for the overall well-being and development of the students.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="space-y-6">
        <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:600;border-bottom:2px solid #eee;padding-bottom:10px;">PTA Leadership</h3>
        <?php foreach ($president as $row): ?>
          <div style="background:#fff;border-radius:12px;padding:16px;border:1px solid #eee;display:flex;align-items:center;gap:16px;">
            <img src="<?= $row['image'] ? base_url($row['image']) : base_url('assets/images/avatar.png'); ?>" alt="President" style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid #f0f0f0;">
            <div>
              <div style="font-weight:700;color:#0d2448;font-size:14px;"><?= esc($row['title']); ?></div>
              <div style="font-size:11px;color:#b8922a;font-weight:600;">President</div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php foreach ($secretary as $row): ?>
          <div style="background:#fff;border-radius:12px;padding:16px;border:1px solid #eee;display:flex;align-items:center;gap:16px;">
            <img src="<?= $row['image'] ? base_url($row['image']) : base_url('assets/images/avatar.png'); ?>" alt="Secretary" style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid #f0f0f0;">
            <div>
              <div style="font-weight:700;color:#0d2448;font-size:14px;"><?= esc($row['title']); ?></div>
              <div style="font-size:11px;color:#b8922a;font-weight:600;">Secretary</div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Executive Committee -->
    <?php if (!empty($incharge)): ?>
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:32px;text-align:center;">Executive Committee</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
        <?php foreach ($incharge as $row): ?>
        <div style="background:#fff;border-radius:16px;padding:20px;border:1px solid #eee;text-align:center;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
          <img src="<?= $row['image'] ? base_url($row['image']) : base_url('assets/images/avatar.png'); ?>" alt="<?= $row['title'] ?>" style="width:80px;height:80px;border-radius:50%;margin:0 auto 12px;object-fit:cover;border:2px solid #f0f0f0;">
          <div style="font-weight:700;color:#0d2448;font-size:14px;"><?= esc($row['title']); ?></div>
          <div style="font-size:11px;color:#b8922a;margin-top:2px;"><?= esc($row['designation']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- PTA Activities -->
    <?php if (!empty($activities)): ?>
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:32px;text-align:center;">Recent Activities</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <?php foreach ($activities as $row): ?>
        <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,0.05);border:1px solid #eee;">
          <?php if ($row['image']): ?>
            <img src="<?= base_url($row['image']); ?>" style="width:100%;height:200px;object-fit:cover;" alt="Activity">
          <?php endif; ?>
          <div style="padding:24px;">
            <h4 style="font-size:18px;font-weight:700;color:#0d2448;margin-bottom:10px;"><?= esc($row['title']); ?></h4>
            <p style="font-size:14px;color:#666;line-height:1.6;"><?= esc($row['description']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>

<?= $this->endSection() ?>
