<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4 text-center">
    <h1 style="font-family:'Cinzel',serif;font-size:32px;color:#fff;font-weight:600;letter-spacing:0.06em;">College Magazines</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin:12px auto;border-radius:2px;"></div>
    <p style="color:rgba(255,255,255,0.7);font-size:14px;letter-spacing:0.1em;text-transform:uppercase;">Voices and Creativity of NSS Rajakumari</p>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-16">
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
    <?php if(!empty($item)): foreach($item as $row): ?>
    <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.05);border:1px solid #eee;display:flex;flex-direction:column;transition:all 0.3s;" class="hover:shadow-2xl hover:-translate-y-2 group">
      <!-- Magazine Cover Placeholder / Thematic Icon -->
      <div style="height:200px;background:#f8fafc;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;">
        <div style="font-size:80px;filter:grayscale(1) opacity(0.2);transform:rotate(-15deg);transition:all 0.5s;" class="group-hover:rotate-0 group-hover:scale-110 group-hover:opacity-0.4">📚</div>
        <div style="position:absolute;bottom:20px;right:20px;background:#0d2448;color:#fff;padding:4px 12px;border-radius:6px;font-size:11px;font-weight:800;"><?= $row['_year'] ?> Edition</div>
      </div>

      <div style="padding:32px;flex-grow:1;display:flex;flex-direction:column;">
        <div style="font-family:'Cinzel',serif;font-size:11px;color:#b8922a;font-weight:700;margin-bottom:8px;text-transform:uppercase;letter-spacing:0.05em;">Annual Publication</div>
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:12px;"><?= $row['_title'] ?></h3>
        <p style="color:#666;font-size:14px;line-height:1.6;margin-bottom:24px;flex-grow:1;">
          <?= strip_tags(substr($row['_description'], 0, 120)) ?>...
        </p>
        
        <a href="<?= base_url($row['_imgloc']); ?>" target="_blank" style="display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:12px;background:#f8fafc;color:#0d2448;border-radius:10px;text-decoration:none;font-weight:700;font-size:13px;border:1px solid #eee;transition:all 0.2s;" onmouseover="this.style.background='#0d2448';this.style.color='#fff';this.style.borderColor='#0d2448'" onmouseout="this.style.background='#f8fafc';this.style.color='#0d2448';this.style.borderColor='#eee'">
          <span>📥</span> Download Magazine
        </a>
      </div>
    </div>
    <?php endforeach; else: ?>
    <div class="col-span-full text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
      <p class="text-gray-400 font-serif text-xl">Archive is being updated. Please check back later.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
