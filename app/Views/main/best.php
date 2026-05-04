<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Best Practices</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid md:grid-cols-4 gap-8">
    <!-- IQAC Sidebar -->
    <div>
      <div style="background:#f9fafb;border-radius:12px;padding:16px;border:1px solid #eee;">
        <?php $slinks = [['Home/iqac','IQAC Home','🏠'],['Home/aqar','AQAR','📄'],['Home/nirf1','NIRF','📊'],['Home/iqacresult','Results','🎓'],['Home/best','Best Practices','⭐'],['Home/naac_certificates','NAAC Certificate','🏅'],['Home/institutional_distinctiveness','Distinctiveness','🏆'],['Home/naac_journey','NAAC Journey','🗺️']];
        foreach($slinks as $sl): ?>
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;<?= $sl[0]=='Home/best' ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Content -->
    <div class="md:col-span-3">
      <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Institutional Excellence</div>
      <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:24px;">Our Best Practices</h2>

      <?php if (!empty($reports)): ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach ($reports as $doc): ?>
        <a href="<?= base_url($doc['file_path']) ?>" target="_blank" style="display:flex;align-items:center;gap:14px;padding:20px;background:#fff;border-radius:12px;border:1px solid #eee;box-shadow:0 2px 10px rgba(0,0,0,0.04);text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-3px)'" onmouseout="this.style.borderColor='#eee';this.style.transform=''">
          <div style="width:44px;height:44px;background:#fef9e7;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:20px;">⭐</div>
          <div style="flex:1;min-width:0;">
            <div style="font-size:14px;font-weight:600;color:#0d2448;line-height:1.4;"><?= esc($doc['title']) ?></div>
            <?php if (!empty($doc['year'])): ?>
            <div style="font-size:11px;color:#b8922a;margin-top:2px;"><?= esc($doc['year']) ?></div>
            <?php endif; ?>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
      <div style="padding:40px;text-align:center;background:#f9fafb;border-radius:12px;border:1px dashed #ddd;color:#999;">
        No best practices documents available yet.
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
