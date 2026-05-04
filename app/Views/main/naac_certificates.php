<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">NAAC Certificates</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid md:grid-cols-4 gap-8">
    <!-- IQAC Sidebar -->
    <div>
      <div style="background:#f9fafb;border-radius:12px;padding:16px;border:1px solid #eee;">
        <?php
        $slinks = [
          ['Home/iqac','IQAC Home','🏠'],['Home/aqar','AQAR','📄'],['Home/nirf1','NIRF','📊'],
          ['Home/iqacresult','Results','🎓'],['Home/best','Best Practices','⭐'],
          ['Home/naac_certificates','NAAC Certificate','🏅'],['Home/institutional_distinctiveness','Distinctiveness','🏆'],
          ['Home/naac_journey','NAAC Journey','🗺️'],
        ];
        foreach($slinks as $sl): ?>
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;transition:all 0.15s;<?= strpos(current_url(), $sl[0]) !== false ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>" onmouseover="if(!this.style.background.includes('0d2448'))this.style.background='#eee'" onmouseout="if(!this.style.background.includes('0d2448'))this.style.background='rgba(255,255,255,0.8)'"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Content -->
    <div class="md:col-span-3">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach($certificates as $row): ?>
        <div style="border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);border:2px solid rgba(184,146,42,0.15);">
          <img src="<?= base_url($row['_imgloc']) ?>" alt="NAAC Certificate" style="width:100%;height:auto;display:block;">
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
