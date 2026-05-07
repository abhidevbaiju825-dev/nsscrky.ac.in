<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Anti-Ragging Cell</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid lg:grid-cols-4 gap-12">
    <!-- Main Content -->
    <div class="lg:col-span-3 space-y-12">
      <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Zero Tolerance Policy</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Protecting Students</h2>
        <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
          <?php if ($anti_ragging): ?>
              <?= $anti_ragging['description']; ?>
          <?php else: ?>
              <p>The Anti-Ragging policy information will be updated soon. Our college maintains a strict zero-tolerance policy against ragging in any form.</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Anonymous Complaint Box -->
      <div style="background:#f9fafb;border-radius:24px;padding:40px;border:1px solid #eee;box-shadow:inset 0 2px 10px rgba(0,0,0,0.02);">
        <div style="text-align:center;margin-bottom:32px;">
          <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;">Anonymous Complaint Box</h3>
          <p style="color:#666;font-size:14px;margin-top:8px;">Post your anonymous complaint here. We ensure complete confidentiality.</p>
        </div>

        <?php if(session()->getFlashdata('success')): ?>
          <div style="max-w: 42rem; margin: 0 auto 20px auto; background: #e8f5e9; border-left: 4px solid #2e7d32; padding: 16px; border-radius: 8px;">
            <p style="color: #1b5e20; margin: 0; font-size: 14px; display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 18px;">✅</span> <?= session()->getFlashdata('success'); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
          <div style="max-w: 42rem; margin: 0 auto 20px auto; background: #ffebee; border-left: 4px solid #c62828; padding: 16px; border-radius: 8px;">
            <p style="color: #b71c1c; margin: 0; font-size: 14px; display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 18px;">❌</span> <?= session()->getFlashdata('error'); ?>
            </p>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('Home/submit_antiragging_complaint') ?>" method="POST" class="max-w-2xl mx-auto space-y-4">
          <?= csrf_field() ?>
          <div>
            <input style="width:100%;padding:14px 20px;border-radius:12px;border:1px solid #ddd;background:#fff;outline:none;transition:all 0.2s;" onfocus="this.style.borderColor='#0d2448';this.style.boxShadow='0 0 0 4px rgba(13,36,72,0.1)'" onblur="this.style.borderColor='#ddd';this.style.boxShadow='none'" type="text" name="subject" placeholder="Subject of Complaint *" required>
          </div>
          <div>
            <textarea style="width:100%;padding:14px 20px;border-radius:12px;border:1px solid #ddd;background:#fff;outline:none;transition:all 0.2s;min-height:120px;" onfocus="this.style.borderColor='#0d2448';this.style.boxShadow='0 0 0 4px rgba(13,36,72,0.1)'" onblur="this.style.borderColor='#ddd';this.style.boxShadow='none'" name="complaint" placeholder="Enter Your Complaint in Detail *" required></textarea>
          </div>
          <div style="text-align:center;">
            <button style="background:#0d2448;color:#fff;padding:14px 48px;border-radius:12px;font-weight:600;font-size:15px;transition:all 0.2s;cursor:pointer;border:none;" onmouseover="this.style.background='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#0d2448';this.style.transform='none'">Submit Complaint</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Sidebar / Incharge -->
    <div class="space-y-6">
      <?php if ($anti_ragging && $anti_ragging['incharge_name']): ?>
        <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:600;border-bottom:2px solid #eee;padding-bottom:10px;">Cell Incharge</h3>
        <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,0.05);border:1px solid #eee;">
          <img src="<?= $anti_ragging['incharge_image'] ? base_url($anti_ragging['incharge_image']) : base_url('uploads/static/avatar.png'); ?>" alt="Incharge" style="width:100%; height:260px; object-fit: cover;">
          <div style="padding:20px;text-align:center;">
            <div style="font-weight:700;color:#0d2448;font-size:16px;"><?= esc($anti_ragging['incharge_name']); ?></div>
            <div style="font-size:12px;color:#b8922a;font-weight:600;margin-top:4px;">Anti-Ragging Cell Incharge</div>
            <div style="font-size:12px;color:#666;margin-top:4px;"><?= esc($anti_ragging['incharge_designation']); ?></div>
          </div>
        </div>
      <?php endif; ?>
      
      <div style="background:#fef3f3;padding:20px;border-radius:16px;border:1px solid #feb2b2;">
        <div style="color:#c53030;font-weight:700;font-size:14px;display:flex;align-items:center;gap:8px;">
          <span style="font-size:20px;">⚠️</span> Emergency Helpline
        </div>
        <div style="font-size:18px;font-weight:800;color:#0d2448;margin-top:10px;">1800-180-5522</div>
        <p style="font-size:11px;color:#c53030;margin-top:4px;">National Anti-Ragging Helpline</p>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
