<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">NAAC Minutes & Documents</h1>
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
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;background:rgba(255,255,255,0.8);"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Content -->
    <div class="md:col-span-3">
      <div style="display:flex;flex-direction:column;gap:14px;">
        <?php foreach($ugc_list as $row): ?>
        <div style="display:flex;gap:20px;align-items:center;padding:20px;background:#fff;border-radius:12px;border:1px solid #eee;box-shadow:0 2px 10px rgba(0,0,0,0.04);">
          <div style="width:50px;height:60px;background:#fef3f3;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:28px;">📄</div>
          <div style="flex:1;min-width:0;">
            <p style="font-size:12px;color:#b8922a;margin-bottom:2px;"><?= esc($row['_authorname']) ?></p>
            <h4 style="font-size:15px;font-weight:600;color:#0d2448;margin-bottom:4px;"><?= esc($row['_papername']) ?></h4>
          </div>
          <a href="<?= base_url($row['_pdfloc']) ?>" target="_blank" style="padding:8px 18px;border-radius:6px;background:#0d2448;color:#fff;font-size:12px;text-decoration:none;font-weight:500;white-space:nowrap;transition:background 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">Download</a>
        </div>
        <?php endforeach; ?>
        <?php if(empty($ugc_list)): ?>
        <p style="text-align:center;padding:40px;color:#aaa;">No documents available.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
