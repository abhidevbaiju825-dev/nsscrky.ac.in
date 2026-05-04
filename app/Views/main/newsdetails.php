<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:6px;">News & Events</div>
    <h1 style="font-family:'Cinzel',serif;font-size:24px;color:#fff;font-weight:600;letter-spacing:0.04em;">
      <?php if(isset($news_detail)): ?>
        <?= esc($news_detail['_newsheading'] ?? 'News Detail') ?>
      <?php elseif(isset($deptnews_detail)): ?>
        <?= esc($deptnews_detail['_newsheading'] ?? 'News Detail') ?>
      <?php endif; ?>
    </h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <?php if(isset($news_detail)): ?>
  <div class="grid md:grid-cols-4 gap-10">
    <!-- Image -->
    <div>
      <div style="border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);border:2px solid rgba(184,146,42,0.15);">
        <img src="<?= !empty($news_detail['_imgloc']) ? base_url($news_detail['_imgloc']) : base_url('assets/images/bg_default.png') ?>" alt="" style="width:100%;height:auto;display:block;">
      </div>
    </div>
    <!-- Content -->
    <div class="md:col-span-3">
      <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
        <?= $news_detail['_newsdescription'] ?? '' ?>
      </div>
    </div>
  </div>
  <?php elseif(isset($deptnews_detail)): ?>
  <div>
    <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
      <?= $deptnews_detail['_newsdescription'] ?? '' ?>
    </div>
  </div>
  <?php endif; ?>

  <div style="margin-top:30px;">
    <a href="<?= base_url('Home/news') ?>" style="display:inline-flex;align-items:center;gap:6px;color:#b8922a;font-size:14px;font-weight:500;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#0d2448'" onmouseout="this.style.color='#b8922a'">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
      Back to News & Events
    </a>
  </div>
</section>

<?= $this->endSection() ?>
