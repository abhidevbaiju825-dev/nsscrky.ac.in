<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Scholarship Details</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-3xl mx-auto">
    <div style="background:#fff;border-radius:16px;padding:40px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Financial Assistance</div>
      <h2 style="font-family:'Cinzel',serif;font-size:24px;color:#0d2448;font-weight:600;margin-bottom:24px;">
        <?php if(!empty($scholarship_details['_title'])){ echo $scholarship_details['_title'];} ?>
      </h2>
      
      <div style="line-height:1.8;color:#444;font-size:16px;text-align:justify;" class="space-y-6">
        <?= $scholarship_details['_description'] ?>
      </div>

      <div style="margin-top:40px;padding-top:24px;border-top:1px solid #eee;display:flex;justify-content:center;">
        <a href="<?= site_url('Home/scholarship');?>" style="display:inline-flex;align-items:center;gap:10px;padding:12px 32px;background:#0d2448;color:#fff;border-radius:10px;text-decoration:none;font-weight:600;font-size:14px;transition:all 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">
          ← Back to Scholarships
        </a>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
