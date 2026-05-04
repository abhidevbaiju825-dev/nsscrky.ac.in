<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Downloads</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto">
    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- General Downloads -->
      <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <h2 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:700;margin-bottom:24px;border-bottom:2px solid #eee;padding-bottom:12px;">Documents & Forms</h2>
        <div class="space-y-4">
          <?php foreach($down_list as $downloads): ?>
          <a href="<?= base_url($downloads['_pdfloc']); ?>" target="_blank" style="display:flex;align-items:center;gap:12px;padding:14px;background:#f9fafb;border-radius:10px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='#fff';this.style.borderColor='#b8922a';this.style.transform='translateX(5px)'" onmouseout="this.style.background='#f9fafb';this.style.borderColor='#eee'">
            <span style="font-size:18px;">📄</span>
            <div style="font-size:14px;font-weight:600;color:#444;"><?= $downloads['_title']; ?></div>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Quick Access Links -->
      <div style="background:#fef9e7;border-radius:16px;padding:32px;border:1px solid #faebcc;">
        <h2 style="font-family:'Cinzel',serif;font-size:18px;color:#856404;font-weight:700;margin-bottom:24px;border-bottom:2px solid #faebcc;padding-bottom:12px;">Quick Access</h2>
        <div class="space-y-4">
          <a href="<?= base_url('Home/internal'); ?>" style="display:flex;align-items:center;gap:12px;padding:14px;background:#fff;border-radius:10px;text-decoration:none;border:1px solid #faebcc;transition:all 0.2s;" onmouseover="this.style.transform='translateX(5px)';this.style.boxShadow='0 4px 15px rgba(133,100,4,0.1)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
            <span style="font-size:18px;">📊</span>
            <div style="font-size:14px;font-weight:700;color:#856404;">Internal Marks Portal</div>
          </a>
          <p style="font-size:12px;color:#856404;opacity:0.8;line-height:1.5;">Click above to access the internal assessment results and marks distribution for current semesters.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
