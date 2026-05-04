<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     LOGIN HERO
═══════════════════════════════ -->
<section style="background:linear-gradient(145deg, var(--navy-deep) 0%, var(--navy) 50%, var(--navy-deep) 100%); position:relative; overflow:hidden; padding:80px 0 50px;">
  <div style="position:absolute;top:60px;left:60px;width:120px;height:120px;border-radius:50%;border:1px solid rgba(184,146,42,0.06);"></div>
  <div style="position:absolute;inset:0;opacity:0.02;background-image:linear-gradient(rgba(184,146,42,1) 1px,transparent 1px),linear-gradient(90deg,rgba(184,146,42,1) 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="max-w-screen-xl mx-auto px-4 text-center" style="position:relative;z-index:10;">
    <div class="sec-eyebrow" style="color:var(--gold);justify-content:center;">Welcome Back</div>
    <h1 style="font-family:'EB Garamond',serif;font-size:clamp(32px,4vw,48px);font-weight:500;line-height:1.15;color:#fff;">
      Alumni <em style="font-style:italic;color:var(--gold-bright);">Portal Login</em>
    </h1>
  </div>
</section>

<!-- ═══════════════════════════════
     LOGIN FORM
═══════════════════════════════ -->
<section class="py-16" style="background:var(--cream);">
  <div style="max-width:440px;margin:0 auto;padding:0 16px;">

    <?php if(session()->getFlashdata('error')): ?>
    <div style="background:#fef2f2;border-left:4px solid #dc2626;padding:14px 18px;font-size:13px;color:#991b1b;margin-bottom:20px;">
      <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
    <div style="background:var(--gold-pale);border-left:4px solid var(--gold);padding:14px 18px;font-size:13px;color:var(--navy);margin-bottom:20px;">
      <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <div style="background:var(--white);box-shadow:0 4px 30px rgba(13,36,72,0.08);overflow:hidden;">
      <div style="background:var(--navy);padding:28px;text-align:center;">
        <div style="width:64px;height:64px;border-radius:50%;background:rgba(184,146,42,0.15);border:2px solid rgba(184,146,42,0.3);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
          <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;color:var(--gold-bright);">SECURE ACCESS</div>
      </div>

      <div style="padding:32px;">
        <form action="<?= base_url('alumni/attemptLogin') ?>" method="POST">
          <?= csrf_field() ?>
          <div style="margin-bottom:20px;">
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Email Address</label>
            <input type="email" name="email" required style="width:100%;padding:12px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);transition:border 0.2s;" onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='rgba(13,36,72,0.15)'" placeholder="Enter your registered email">
          </div>
          <div style="margin-bottom:28px;">
            <label style="font-size:11px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);display:block;margin-bottom:6px;">Password</label>
            <input type="password" name="password" required style="width:100%;padding:12px 14px;border:1px solid rgba(13,36,72,0.15);font-size:14px;font-family:'Outfit',sans-serif;background:var(--cream);transition:border 0.2s;" onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='rgba(13,36,72,0.15)'" placeholder="Enter your password">
          </div>
          <button type="submit" style="width:100%;background:var(--gold);color:var(--navy-deep);font-size:12px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;padding:14px 0;border:2px solid var(--gold);cursor:pointer;font-family:'Outfit',sans-serif;transition:all 0.3s;display:flex;align-items:center;justify-content:center;gap:8px;" onmouseover="this.style.background='transparent';this.style.color='var(--gold)'" onmouseout="this.style.background='var(--gold)';this.style.color='var(--navy-deep)'">
            Secure Login
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          </button>
        </form>

        <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(13,36,72,0.1),transparent);margin:24px 0;"></div>

        <div class="text-center">
          <p style="font-size:13px;color:var(--muted);line-height:1.7;">Don't have an account?</p>
          <a href="<?= base_url('alumni/register') ?>" style="font-size:12px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:var(--navy);border-bottom:1px solid var(--navy);text-decoration:none;transition:all 0.2s;">Register as Alumni →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
