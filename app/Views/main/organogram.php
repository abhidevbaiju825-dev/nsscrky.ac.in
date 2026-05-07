<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Organogram</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div style="background:#fff;border-radius:14px;padding:24px;box-shadow:0 4px 20px rgba(0,0,0,0.06);border:1px solid #eee;text-align:center;">
    <img src="<?= base_url('uploads/static/organogram.jpg') ?>" alt="Organogram" style="width:100%;max-width:900px;height:auto;border-radius:8px;">
  </div>
</section>

<?= $this->endSection() ?>
