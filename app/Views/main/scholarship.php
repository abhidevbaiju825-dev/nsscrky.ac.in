<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Scholarships</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-5xl mx-auto">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Financial Assistance</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:32px;">Available Scholarships</h2>

    <div class="grid gap-6">
      <?php $i=1; foreach($scholarship_lst as $row):?>
      <div style="background:#fff;border-radius:16px;padding:24px;border:1px solid #eee;box-shadow:0 4px 15px rgba(0,0,0,0.03);display:flex;justify-content:space-between;align-items:center;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <div style="display:flex;gap:20px;align-items:center;">
          <div style="width:40px;height:40px;background:#f9fafb;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;color:#0d2448;font-size:14px;border:1px solid #eee;flex-shrink:0;">
            <?= $i++ ?>
          </div>
          <div>
            <h4 style="font-size:17px;font-weight:700;color:#0d2448;margin-bottom:4px;"><?= $row['_title'];?></h4>
            <p style="font-size:14px;color:#666;line-height:1.5;"><?= $row['_description'];?></p>
          </div>
        </div>
        <a href="<?= site_url('Home/scholarship_details/'.$row['_scholarship_id']);?>" style="display:flex;align-items:center;justify-content:center;width:44px;height:44px;background:#fef9e7;color:#b8922a;border-radius:12px;text-decoration:none;font-size:18px;transition:all 0.2s;" onmouseover="this.style.background='#b8922a';this.style.color='#fff'" onmouseout="this.style.background='#fef9e7';this.style.color='#b8922a'">
          👁️
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
