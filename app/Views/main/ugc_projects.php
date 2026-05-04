<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Research Projects</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid lg:grid-cols-2 gap-12">
    
    <!-- UGC Projects -->
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:24px;display:flex;align-items:center;gap:12px;">
        <span style="background:#0d2448;color:#fff;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;">🎓</span>
        UGC Funded Projects
      </h3>
      <div class="space-y-4">
        <?php foreach($ugc_list as $row): ?>
        <a href="<?= !empty($row['_pdfloc']) ? base_url($row['_pdfloc']) : '#' ?>" target="_blank" style="display:flex;align-items:center;gap:14px;padding:16px;background:#fff;border-radius:12px;border:1px solid #eee;box-shadow:0 4px 15px rgba(0,0,0,0.03);text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateX(5px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
          <span style="font-size:20px;">📄</span>
          <div style="font-size:14px;font-weight:600;color:#0d2448;"><?= ucwords($row['_papername']) ?></div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Student Projects -->
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:24px;display:flex;align-items:center;gap:12px;">
        <span style="background:#b8922a;color:#fff;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;">📝</span>
        Student Projects
      </h3>
      
      <!-- 2022-23 Section -->
      <div class="mb-8">
        <div style="font-size:12px;font-weight:700;color:#b8922a;margin-bottom:12px;text-transform:uppercase;letter-spacing:0.05em;">Academic Year 2022 - 2023</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php 
          $p2223 = [
            ['BBA Projects', 'bba_2022_23.pdf'],
            ['BCA Projects', 'bca_2022_23.pdf'],
            ['BCom M1 Projects', 'bcom_m1_2022_23.pdf'],
            ['BCom M2 Projects', 'bcom_m2_2022_23.pdf'],
            ['BSc Projects', 'bsc_2022_23.pdf'],
            ['MSc Projects', 'msc_2022_23.pdf']
          ];
          foreach($p2223 as $p): ?>
          <a href="https://nsscrky.ac.in/assets/project/<?= $p[1] ?>" target="_blank" style="padding:12px 16px;background:#f9fafb;border-radius:10px;border:1px solid #eee;font-size:13px;font-weight:600;color:#444;text-decoration:none;display:flex;justify-content:space-between;align-items:center;transition:all 0.2s;" onmouseover="this.style.background='#fff';this.style.borderColor='#b8922a'" onmouseout="this.style.background='#f9fafb';this.style.borderColor='#eee'">
            <?= $p[0] ?>
            <span style="font-size:16px;">📥</span>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 2021-22 Section -->
      <div>
        <div style="font-size:12px;font-weight:700;color:#b8922a;margin-bottom:12px;text-transform:uppercase;letter-spacing:0.05em;">Academic Year 2021 - 2022</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php 
          $p2122 = [
            ['BBA Projects', 'bba21.pdf'],
            ['BCA Projects', 'bca21.pdf'],
            ['BCom Projects', 'bcom21.pdf'],
            ['BSc Projects', 'bsc21.pdf']
          ];
          foreach($p2122 as $p): ?>
          <a href="https://nsscrky.ac.in/assets/project/<?= $p[1] ?>" target="_blank" style="padding:12px 16px;background:#f9fafb;border-radius:10px;border:1px solid #eee;font-size:13px;font-weight:600;color:#444;text-decoration:none;display:flex;justify-content:space-between;align-items:center;transition:all 0.2s;" onmouseover="this.style.background='#fff';this.style.borderColor='#b8922a'" onmouseout="this.style.background='#f9fafb';this.style.borderColor='#eee'">
            <?= $p[0] ?>
            <span style="font-size:16px;">📥</span>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
