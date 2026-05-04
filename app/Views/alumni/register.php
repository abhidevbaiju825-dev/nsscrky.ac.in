<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     REGISTRATION HERO
═══════════════════════════════ -->
<section style="background:linear-gradient(145deg, var(--navy-deep) 0%, var(--navy) 50%, var(--navy-deep) 100%); position:relative; overflow:hidden; padding:80px 0 50px;">
  <div style="position:absolute;bottom:-180px;right:-180px;width:500px;height:500px;border-radius:50%;border:1px solid rgba(184,146,42,0.05);"></div>
  <div style="position:absolute;inset:0;opacity:0.02;background-image:linear-gradient(rgba(184,146,42,1) 1px,transparent 1px),linear-gradient(90deg,rgba(184,146,42,1) 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="max-w-screen-xl mx-auto px-4" style="position:relative;z-index:10;">
    <div class="sec-eyebrow" style="color:var(--gold);">Join Our Community</div>
    <h1 style="font-family:'EB Garamond',serif;font-size:clamp(32px,4vw,52px);font-weight:500;line-height:1.15;color:#fff;margin-bottom:12px;">
      Alumni <em style="font-style:italic;color:var(--gold-bright);">Registration</em>
    </h1>
    <p style="font-size:14px;color:rgba(255,255,255,0.45);max-width:500px;line-height:1.7;">
      Register to join the official NSS College Rajakumari alumni network. Your profile will be visible after administrator approval.
    </p>
  </div>
</section>

<!-- ═══════════════════════════════
     REGISTRATION FORM
═══════════════════════════════ -->
<section class="py-16" style="background:var(--cream);">
  <div class="max-w-screen-lg mx-auto px-4">

    <?php if(session()->getFlashdata('error')): ?>
    <div style="background:#fef2f2;border-left:4px solid #dc2626;padding:16px 20px;font-size:14px;color:#991b1b;margin-bottom:24px;">
      <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('alumni/submitRegistration') ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <!-- Personal Information -->
      <div style="background:var(--white);box-shadow:0 4px 30px rgba(13,36,72,0.07);margin-bottom:24px;overflow:hidden;">
        <div style="background:var(--navy);padding:18px 28px;display:flex;align-items:center;gap:10px;">
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
          <span style="font-family:'Cinzel',serif;font-size:12px;letter-spacing:0.16em;color:var(--gold-bright);font-weight:500;">PERSONAL INFORMATION</span>
        </div>
        <div style="padding:28px;" class="grid md:grid-cols-2 gap-6">
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Full Name <span style="color:#dc2626;">*</span></label>
            <input type="text" name="full_name" required style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;transition:border 0.2s;background:var(--cream);" onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='rgba(13,36,72,0.15)'">
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Passout Year <span style="color:#dc2626;">*</span></label>
            <select name="passout_year" required style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
              <option value="">— Select Year —</option>
              <?php for($i = date('Y'); $i >= 1995; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Date of Birth</label>
            <input type="date" name="dob" style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Gender</label>
            <select name="gender" style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
              <option value="">— Select —</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Blood Group</label>
            <select name="blood_group" style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
              <option value="">— Select —</option>
              <?php foreach(['O+','O-','A+','A-','B+','B-','AB+','AB-'] as $bg): ?>
                <option value="<?= $bg ?>"><?= $bg ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Profile Picture</label>
            <input type="file" name="profile_picture" accept="image/*" style="width:100%;padding:8px 14px;border:1px solid rgba(13,36,72,0.15);font-size:13px;font-family:'Outfit',sans-serif;background:#fff;">
          </div>
        </div>
      </div>

      <!-- Contact Details -->
      <div style="background:var(--white);box-shadow:0 4px 30px rgba(13,36,72,0.07);margin-bottom:24px;overflow:hidden;">
        <div style="background:var(--navy);padding:18px 28px;display:flex;align-items:center;gap:10px;">
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          <span style="font-family:'Cinzel',serif;font-size:12px;letter-spacing:0.16em;color:var(--gold-bright);font-weight:500;">CONTACT DETAILS</span>
        </div>
        <div style="padding:28px;" class="grid md:grid-cols-2 gap-6">
          <div class="md:col-span-2">
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Current Address</label>
            <textarea name="address" rows="2" style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);resize:vertical;"></textarea>
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">City / Location</label>
            <input type="text" name="location" placeholder="e.g. Cochin, Kerala" style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Phone Number <span style="color:#dc2626;">*</span></label>
            <input type="tel" name="phone" required style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
          </div>
        </div>
      </div>

      <!-- Login Credentials -->
      <div style="background:var(--white);box-shadow:0 4px 30px rgba(13,36,72,0.07);margin-bottom:24px;overflow:hidden;">
        <div style="background:var(--navy);padding:18px 28px;display:flex;align-items:center;gap:10px;">
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          <span style="font-family:'Cinzel',serif;font-size:12px;letter-spacing:0.16em;color:var(--gold-bright);font-weight:500;">LOGIN CREDENTIALS</span>
        </div>
        <div style="padding:28px;" class="grid md:grid-cols-2 gap-6">
          <div class="md:col-span-2">
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Email Address <span style="color:#dc2626;">*</span></label>
            <input type="email" name="email" required style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Password <span style="color:#dc2626;">*</span></label>
            <input type="password" name="password" required style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
          </div>
          <div>
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Confirm Password <span style="color:#dc2626;">*</span></label>
            <input type="password" name="password_confirmation" required style="width:100%;padding:10px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);">
          </div>
        </div>
      </div>

      <!-- Notice -->
      <div style="background:var(--gold-pale);border:1px solid rgba(184,146,42,0.25);padding:18px 24px;margin-bottom:28px;display:flex;align-items:flex-start;gap:14px;">
        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="var(--gold)" stroke-width="1.5" style="flex-shrink:0;margin-top:2px;"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <p style="font-size:13px;color:var(--navy);line-height:1.7;">By registering, you agree that your basic information (Name, Batch, Location) will be visible in the public alumni directory. Complete profile management will be available after administrator approval.</p>
      </div>

      <!-- Submit -->
      <div class="text-center">
        <button type="submit" class="slide-cta" style="border:none;cursor:pointer;font-size:13px;">Submit Registration</button>
        <p style="margin-top:16px;font-size:13px;color:var(--muted);">Already registered? <a href="<?= base_url('alumni/login') ?>" style="color:var(--navy);font-weight:600;text-decoration:none;border-bottom:1px solid var(--navy);">Login here</a></p>
      </div>
    </form>
  </div>
</section>

<?= $this->endSection() ?>
