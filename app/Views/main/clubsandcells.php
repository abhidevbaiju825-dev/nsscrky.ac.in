<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Life</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Clubs & Cells</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <?php 
    $hasClubs = false;
    if(!empty($clubs)) {
      foreach($clubs as $row) {
        if($row['_display_as'] == "clubncell") {
          $hasClubs = true;
          break;
        }
      }
    }
  ?>
  
  <?php if($hasClubs): ?>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach($clubs as $row): if($row['_display_as'] == "clubncell"): ?>
    <div style="background:#fff;border-radius:20px;padding:32px;border:1px solid #eee;box-shadow:0 10px 30px rgba(0,0,0,0.04);display:flex;flex-direction:column;transition:all 0.3s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-5px)';this.style.boxShadow='0 15px 40px rgba(184,146,42,0.1)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none';this.style.boxShadow='0 10px 30px rgba(0,0,0,0.04)'">
      <div style="width:50px;height:50px;background:#fef9e7;color:#b8922a;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:20px;border:1px solid #f9e79f;">
        ✨
      </div>
      <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:700;margin-bottom:12px;"><?= $row['_name'] ?></h3>
      <p style="font-size:14px;color:#666;line-height:1.6;margin-bottom:24px;flex-grow:1;">
        <?= strip_tags(substr($row['_description'],0,140)) ?>...
      </p>
      <a href="<?= site_url('Home/clubdetails/'.$row['_id']);?>" style="display:inline-flex;align-items:center;gap:8px;color:#0d2448;font-weight:700;font-size:13px;text-decoration:none;text-transform:uppercase;letter-spacing:0.05em;" class="group">
        Explore Club 
        <span style="transition:transform 0.2s;" class="group-hover:translate-x-1">→</span>
      </a>
    </div>
    <?php endif; endforeach; ?>
  </div>
  <?php else: ?>
  <div style="text-align:center;padding:60px 20px;">
    <div style="font-size:48px;margin-bottom:16px;opacity:0.3;">🤝</div>
    <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:8px;">Clubs & Cells</h3>
    <p style="font-size:15px;color:#888;max-width:400px;margin:0 auto;">Details of various clubs and cells will be updated here soon. They provide a platform for students to discover and hone their talents.</p>
  </div>
  <?php endif; ?>
</section>

<?= $this->endSection() ?>
