<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Student Grievance Cell</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto">
    <div class="space-y-12">
      <!-- Description -->
      <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">We Are Listening</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Redressal Mechanism</h2>
        <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
          <?php if ($item): ?>
              <?= $item['description']; ?>
          <?php else: ?>
              <p>Information about the Student Grievance Cell will be updated soon. Our institution is committed to providing a fair and prompt redressal mechanism for any student concerns.</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Grievance Form -->
      <div style="background:#f9fafb;border-radius:24px;padding:40px;border:1px solid #eee;box-shadow:inset 0 2px 10px rgba(0,0,0,0.02);">
        <div style="text-align:center;margin-bottom:32px;">
          <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;">Submit a Grievance</h3>
          <p style="color:#666;font-size:14px;margin-top:8px;">Your concerns are important. Please provide details below for prompt review.</p>
        </div>

        <form action="<?= base_url('submit-grievance') ?>" method="POST" class="space-y-6">
          <?= csrf_field() ?>
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:8px;">Full Name</label>
              <input style="width:100%;padding:12px 16px;border-radius:10px;border:1px solid #ddd;outline:none;transition:all 0.2s;" onfocus="this.style.borderColor='#0d2448';this.style.boxShadow='0 0 0 3px rgba(13,36,72,0.1)'" onblur="this.style.borderColor='#ddd';this.style.boxShadow='none'" type="text" name="name" placeholder="Your Name">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:8px;">Email Address *</label>
              <input style="width:100%;padding:12px 16px;border-radius:10px;border:1px solid #ddd;outline:none;transition:all 0.2s;" onfocus="this.style.borderColor='#0d2448';this.style.boxShadow='0 0 0 3px rgba(13,36,72,0.1)'" onblur="this.style.borderColor='#ddd';this.style.boxShadow='none'" type="email" name="email" placeholder="Your Email" required>
            </div>
          </div>
          <div>
            <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:8px;">Subject *</label>
            <input style="width:100%;padding:12px 16px;border-radius:10px;border:1px solid #ddd;outline:none;transition:all 0.2s;" onfocus="this.style.borderColor='#0d2448';this.style.boxShadow='0 0 0 3px rgba(13,36,72,0.1)'" onblur="this.style.borderColor='#ddd';this.style.boxShadow='none'" type="text" name="subject" placeholder="What is this regarding?" required>
          </div>
          <div>
            <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:8px;">Description of Grievance *</label>
            <textarea style="width:100%;padding:12px 16px;border-radius:10px;border:1px solid #ddd;outline:none;transition:all 0.2s;min-height:150px;" onfocus="this.style.borderColor='#0d2448';this.style.boxShadow='0 0 0 3px rgba(13,36,72,0.1)'" onblur="this.style.borderColor='#ddd';this.style.boxShadow='none'" name="message" placeholder="Provide full details of your concern..." required></textarea>
          </div>
          <div style="text-align:center;">
            <button style="background:#0d2448;color:#fff;padding:14px 48px;border-radius:10px;font-weight:600;font-size:15px;transition:all 0.2s;cursor:pointer;border:none;" onmouseover="this.style.background='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#0d2448';this.style.transform='none'">Submit Grievance</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
