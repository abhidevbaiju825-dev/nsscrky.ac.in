<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Event Details</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto">
    <div style="background:#fff;border-radius:24px;overflow:hidden;box-shadow:0 10px 50px rgba(0,0,0,0.08);border:1px solid #f0f0f0;">
      <!-- Hero Image -->
      <div class="relative">
        <img src="<?= base_url($event_detail['_imgloc']); ?>" alt="<?= $event_detail['_title'] ?>" style="width:100%;max-height:500px;object-fit:cover;">
        <div style="position:absolute;bottom:0;left:0;right:0;background:linear-gradient(transparent, rgba(0,0,0,0.7));padding:40px 30px 20px;">
          <div style="color:#b8922a;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:8px;">Featured Event</div>
          <h2 style="font-family:'Cinzel',serif;font-size:26px;color:#fff;font-weight:700;"><?= $event_detail['_title'] ?></h2>
        </div>
      </div>
      
      <!-- Content Body -->
      <div style="padding:40px;">
        <div style="line-height:1.8;color:#444;font-size:16px;text-align:justify;" class="space-y-6">
          <?= $event_detail['_description'] ?>
        </div>

        <div style="margin-top:40px;padding-top:30px;border-top:1px solid #eee;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px;">
          <a href="<?= site_url('Home/events'); ?>" style="display:inline-flex;align-items:center;gap:10px;padding:12px 32px;background:#0d2448;color:#fff;border-radius:10px;text-decoration:none;font-weight:700;font-size:14px;transition:all 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">
            ← Back to Events
          </a>
          
          <div style="display:flex;align-items:center;gap:12px;">
            <span style="font-size:13px;font-weight:700;color:#666;text-transform:uppercase;">Share:</span>
            <div class="flex gap-2">
              <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#b8922a] hover:text-white transition-all">f</a>
              <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#b8922a] hover:text-white transition-all">t</a>
              <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#b8922a] hover:text-white transition-all">in</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
