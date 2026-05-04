<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">College Council</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid lg:grid-cols-3 gap-12">
    <!-- Description -->
    <div class="lg:col-span-2">
      <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Administrative Leadership</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Governance</h2>
        <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
          <?php if(!empty($counsil_det['_description'])): ?>
            <?= $counsil_det['_description'] ?>
          <?php else: ?>
            <p>The College Council is the principal advisory body to the Principal on academic and administrative matters, comprising the Principal, Heads of Departments, and elected faculty representatives.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Council Members Sidebar Pattern -->
    <div class="lg:col-span-1">
      <div style="background:#f9fafb;border-radius:16px;padding:24px;border:1px solid #eee;">
        <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:600;margin-bottom:20px;border-bottom:2px solid #b8922a;padding-bottom:10px;">Council Members</h3>
        <div class="space-y-4">
          <?php if(isset($counsil_members)): foreach($counsil_members as $row): ?>
          <div style="display:flex;align-items:center;gap:12px;padding:12px;background:#fff;border-radius:10px;border:1px solid #eee;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a'" onmouseout="this.style.borderColor='#eee'">
            <img src="<?= !empty($row['_imgloc']) ? base_url($row['_imgloc']) : base_url('assets/images/avatar.png') ?>" alt="<?= $row['_name'] ?>" style="width:50px;height:50px;border-radius:50%;object-fit:cover;border:2px solid #f0f0f0;">
            <div>
              <div style="font-weight:700;color:#0d2448;font-size:14px;"><?= $row['_name'] ?></div>
              <div style="font-size:11px;color:#b8922a;font-weight:600;"><?= $row['_designation'] ?></div>
            </div>
          </div>
          <?php endforeach; endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
