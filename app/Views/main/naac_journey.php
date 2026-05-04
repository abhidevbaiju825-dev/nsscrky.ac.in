<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">NAAC Journey</h1>
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
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;transition:all 0.15s;<?= strpos(current_url(), $sl[0]) !== false ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>" onmouseover="if(!this.style.background.includes('0d2448'))this.style.background='#eee'" onmouseout="if(!this.style.background.includes('0d2448'))this.style.background='rgba(255,255,255,0.8)'"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Content -->
    <div class="md:col-span-3">
      <?php foreach($naac as $row): ?>
      <div style="background:#fff;border-radius:14px;padding:28px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:12px;"><?= esc($row['_title']) ?></h3>
        <div style="text-align:justify;line-height:1.8;color:#444;font-size:15px;"><?= $row['_description'] ?></div>
      </div>
      <?php endforeach; ?>

      <?php if(!empty($cordinators)): ?>
      <div style="margin-top:20px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Team</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:20px;">NAAC Coordinators</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
          <?php foreach($cordinators as $row): ?>
          <div style="text-align:center;background:#fff;border-radius:12px;padding:20px 14px;box-shadow:0 2px 10px rgba(0,0,0,0.04);border:1px solid #f0f0f0;">
            <h4 style="font-size:14px;font-weight:600;color:#0d2448;"><?= esc($row['_name']) ?></h4>
            <p style="font-size:12px;color:#b8922a;margin-top:4px;"><?= esc($row['_designation']) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
