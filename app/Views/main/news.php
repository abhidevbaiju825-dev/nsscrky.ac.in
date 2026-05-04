<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">News & Events</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div style="display:flex;flex-direction:column;gap:16px;">
    <?php foreach($news_list as $row): ?>
    <a href="<?= base_url('Home/newsdetails/'.$row['_newsid']) ?>" style="text-decoration:none;display:flex;gap:20px;align-items:center;padding:20px;background:#fff;border-radius:12px;border:1px solid #eee;box-shadow:0 2px 10px rgba(0,0,0,0.04);transition:all 0.2s;" onmouseover="this.style.boxShadow='0 6px 20px rgba(13,36,72,0.1)';this.style.borderColor='rgba(184,146,42,0.3)'" onmouseout="this.style.boxShadow='0 2px 10px rgba(0,0,0,0.04)';this.style.borderColor='#eee'">
      <div style="width:80px;height:80px;border-radius:10px;overflow:hidden;flex-shrink:0;border:2px solid #f0f0f0;">
        <img src="<?= !empty($row['_imgloc']) ? base_url($row['_imgloc']) : base_url('assets/images/bg_default.png') ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
      </div>
      <div style="flex:1;min-width:0;">
        <h3 style="font-size:16px;font-weight:600;color:#0d2448;margin-bottom:6px;"><?= esc($row['_newsheading']) ?></h3>
        <p style="font-size:13px;color:#888;line-height:1.5;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;"><?= esc(strip_tags(substr($row['_newsdescription'], 0, 150))) ?>...</p>
      </div>
      <div style="flex-shrink:0;color:#b8922a;">
        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg>
      </div>
    </a>
    <?php endforeach; ?>

    <?php if(empty($news_list)): ?>
    <div style="text-align:center;padding:60px 20px;color:#aaa;">
      <p style="font-size:16px;">No news or events available at the moment.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
