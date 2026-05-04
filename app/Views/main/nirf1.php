<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">NIRF</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid md:grid-cols-4 gap-8">
    <div>
      <div style="background:#f9fafb;border-radius:12px;padding:16px;border:1px solid #eee;">
        <?php $slinks = [['Home/iqac','IQAC Home','🏠'],['Home/aqar','AQAR','📄'],['Home/nirf1','NIRF','📊'],['Home/iqacresult','Results','🎓'],['Home/best','Best Practices','⭐'],['Home/naac_certificates','NAAC Certificate','🏅'],['Home/institutional_distinctiveness','Distinctiveness','🏆'],['Home/naac_journey','NAAC Journey','🗺️']];
        foreach($slinks as $sl): ?>
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;<?= strpos(current_url(),'nirf') !== false && $sl[0]=='Home/nirf1' ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="md:col-span-3">
      <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Rankings</div>
      <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:24px;">NIRF Reports</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <?php
        $nirfs = [
          ['NIRF 2021','assets/NIRF_submitted_details.pdf'],
          ['NIRF College 2022','assets/Submitted_data_College.pdf'],
          ['NIRF Overall 2022','assets/Submitted_data_Overall.pdf'],
          ['NIRF College 2023','assets/NIRF_College_2023.pdf'],
          ['NIRF Overall 2023','assets/NIRF_Overall_2023.pdf'],
          ['NIRF College 2024','assets/NIRF_College_2024.pdf'],
          ['NIRF Overall 2024','assets/NIRF_Overall_2024.pdf'],
        ];
        foreach($nirfs as $n): ?>
        <a href="<?= base_url($n[1]) ?>" target="_blank" style="display:flex;flex-direction:column;align-items:center;gap:10px;padding:24px 16px;background:#fff;border-radius:12px;border:1px solid #eee;box-shadow:0 2px 10px rgba(0,0,0,0.04);text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-3px)'" onmouseout="this.style.borderColor='#eee';this.style.transform=''">
          <div style="font-size:32px;">📊</div>
          <span style="font-size:13px;font-weight:600;color:#0d2448;text-align:center;"><?= $n[0] ?></span>
          <span style="font-size:11px;color:#b8922a;">Download PDF</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
