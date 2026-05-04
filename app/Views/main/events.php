<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4 text-center">
    <h1 style="font-family:'Cinzel',serif;font-size:32px;color:#fff;font-weight:600;letter-spacing:0.06em;">Campus Events</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin:12px auto;border-radius:2px;"></div>
    <p style="color:rgba(255,255,255,0.7);font-size:14px;letter-spacing:0.1em;text-transform:uppercase;">Experience the Vibrant Campus Life</p>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-16">
  <div class="space-y-10">
    <?php if(!empty($events_list)): foreach($events_list as $row): ?>
    <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.05);border:1px solid #eee;display:flex;flex-wrap:wrap;transition:all 0.3s;" class="hover:shadow-xl hover:-translate-y-1">
      <!-- Image Section -->
      <div class="w-full md:w-1/3 lg:w-1/4 relative overflow-hidden">
        <img src="<?= base_url($row['_imgloc']); ?>" alt="<?= $row['_title'] ?>" style="width:100%;height:100%;object-fit:cover;" class="transition-transform duration-500 hover:scale-110">
        <div style="position:absolute;top:15px;left:15px;background:#b8922a;color:#fff;padding:4px 12px;border-radius:6px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.1em;">Latest Event</div>
      </div>
      
      <!-- Content Section -->
      <div class="w-full md:w-2/3 lg:w-3/4 p-8 flex flex-col justify-center">
        <div style="font-family:'Cinzel',serif;font-size:12px;color:#b8922a;font-weight:700;margin-bottom:8px;text-transform:uppercase;letter-spacing:0.05em;">Campus Highlights</div>
        <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:700;margin-bottom:16px;line-height:1.3;">
          <?= $row['_title'] ?>
        </h3>
        <p style="color:#666;font-size:15px;line-height:1.7;margin-bottom:24px;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
          <?= strip_tags($row['_description']) ?>
        </p>
        <div>
          <a href="<?= site_url('Home/eventdetails/'.$row['_eventid']); ?>" style="display:inline-flex;align-items:center;gap:10px;padding:12px 28px;background:#0d2448;color:#fff;border-radius:10px;text-decoration:none;font-weight:700;font-size:14px;transition:all 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">
            View Event Details 
            <span style="font-size:18px;">→</span>
          </a>
        </div>
      </div>
    </div>
    <?php endforeach; else: ?>
    <div class="text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
      <p class="text-gray-400 font-serif text-xl">No events scheduled at the moment.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
