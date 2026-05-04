<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     ALUMNI HERO BANNER
═══════════════════════════════ -->
<section style="background:linear-gradient(145deg, var(--navy-deep) 0%, var(--navy) 40%, #1a3a6e 70%, var(--navy-deep) 100%); position:relative; overflow:hidden; padding:100px 0 80px;">
  <!-- Decorative shapes -->
  <div style="position:absolute;top:-50px;right:25%;width:1px;height:200%;background:linear-gradient(to bottom,transparent,rgba(184,146,42,0.08),transparent);transform:rotate(15deg);"></div>
  <div style="position:absolute;bottom:-100px;right:-100px;width:400px;height:400px;border-radius:50%;border:1px solid rgba(184,146,42,0.06);"></div>
  <div style="position:absolute;top:60px;left:60px;width:120px;height:120px;border-radius:50%;border:1px solid rgba(184,146,42,0.06);"></div>
  <div style="position:absolute;inset:0;opacity:0.02;background-image:linear-gradient(rgba(184,146,42,1) 1px,transparent 1px),linear-gradient(90deg,rgba(184,146,42,1) 1px,transparent 1px);background-size:60px 60px;"></div>

  <div class="max-w-screen-xl mx-auto px-4" style="position:relative;z-index:10;">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
      <div style="max-width:600px;">
        <div class="sec-eyebrow" style="color:var(--gold);">Alumni Association</div>
        <h1 style="font-family:'EB Garamond',serif;font-size:clamp(36px,5vw,60px);font-weight:500;line-height:1.1;color:#fff;margin-bottom:16px;">
          Our <em style="font-style:italic;color:var(--gold-bright);">Alumni</em> Network
        </h1>
        <p style="font-size:15px;color:rgba(255,255,255,0.55);line-height:1.8;max-width:480px;">
          Connecting generations of NSS College Rajakumari graduates. Browse the alumni directory, explore recent activities, and join the growing community.
        </p>
        <div style="margin-top:28px;display:flex;flex-wrap:wrap;gap:12px;">
          <a href="<?= base_url('alumni/register') ?>" class="slide-cta">Register as Alumni</a>
          <a href="<?= base_url('Home/basiclogin') ?>" class="slide-cta-ghost">Login to Portal</a>
        </div>
      </div>
      <!-- Stats -->
      <div class="hidden md:flex flex-col gap-6" style="border-left:1px solid rgba(184,146,42,0.15);padding-left:40px;">
        <div style="border-bottom:1px solid rgba(255,255,255,0.06);padding-bottom:20px;">
          <div style="font-size:10px;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:4px;font-family:'Cinzel',serif;">Registered</div>
          <div style="font-family:'EB Garamond',serif;font-size:44px;color:#fff;font-weight:400;line-height:1;"><?= count($alumni) ?></div>
          <div style="font-size:11px;color:rgba(255,255,255,0.35);margin-top:2px;">Active Alumni</div>
        </div>
        <div>
          <div style="font-size:10px;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:4px;font-family:'Cinzel',serif;">Activities</div>
          <div style="font-family:'EB Garamond',serif;font-size:44px;color:#fff;font-weight:400;line-height:1;"><?= count($activities) ?></div>
          <div style="font-size:11px;color:rgba(255,255,255,0.35);margin-top:2px;">Events Posted</div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if(session()->getFlashdata('success')): ?>
<div class="max-w-screen-xl mx-auto px-4" style="margin-top:20px;">
  <div style="background:var(--gold-pale);border-left:4px solid var(--gold);padding:16px 20px;font-size:14px;color:var(--navy);">
    <?= session()->getFlashdata('success') ?>
  </div>
</div>
<?php endif; ?>

<!-- ═══════════════════════════════
     ALUMNI DIRECTORY
═══════════════════════════════ -->
<section class="py-20 md:py-24" style="background:var(--cream);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="text-center mb-14 reveal">
      <div class="sec-eyebrow" style="justify-content:center;">Our Graduates</div>
      <h2 class="sec-heading">Alumni <em>Directory</em></h2>
    </div>

    <?php if(!empty($alumni)): ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach($alumni as $idx => $al): ?>
        <?php $delays = ['', 'd1', 'd2', 'd1', 'd2', 'd3']; ?>
        <div class="reveal <?= $delays[$idx % 6] ?? '' ?>" style="background:var(--white);border:1px solid rgba(13,36,72,0.08);padding:28px;transition:all 0.35s;position:relative;overflow:hidden;">
          <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--gold),var(--gold-bright));transform:scaleX(0);transform-origin:left;transition:transform 0.4s;"></div>
          <div style="display:flex;align-items:center;gap:16px;">
            <?php if(!empty($al['profile_picture'])): ?>
              <img src="<?= base_url($al['profile_picture']) ?>" style="width:64px;height:64px;border-radius:50%;object-fit:cover;border:2px solid rgba(184,146,42,0.25);flex-shrink:0;">
            <?php else: ?>
              <div style="width:64px;height:64px;border-radius:50%;background:var(--navy);display:flex;align-items:center;justify-content:center;font-family:'EB Garamond',serif;font-size:24px;color:var(--gold-bright);flex-shrink:0;border:2px solid rgba(184,146,42,0.25);">
                <?= strtoupper(substr($al['full_name'], 0, 1)) ?>
              </div>
            <?php endif; ?>
            <div>
              <div style="font-family:'EB Garamond',serif;font-size:20px;font-weight:500;color:var(--navy);line-height:1.2;">
                <?= esc($al['full_name']) ?>
              </div>
              <div style="display:flex;gap:8px;margin-top:6px;flex-wrap:wrap;">
                <span style="font-size:10px;letter-spacing:0.1em;text-transform:uppercase;background:var(--gold-pale);color:var(--navy);padding:2px 10px;font-weight:600;">Batch <?= esc($al['passout_year']) ?></span>
              </div>
              <div style="font-size:12px;color:var(--muted);margin-top:6px;display:flex;align-items:center;gap:4px;">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <?= esc($al['location'] ?? 'Location not specified') ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center" style="padding:60px 0;">
      <div style="font-family:'EB Garamond',serif;font-size:28px;color:var(--muted);font-style:italic;margin-bottom:12px;">No alumni registered yet.</div>
      <p style="font-size:14px;color:var(--muted);">Be the first to join the network.</p>
      <a href="<?= base_url('alumni/register') ?>" class="slide-cta" style="margin-top:24px;display:inline-flex;">Register Now</a>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ═══════════════════════════════
     ALUMNI ACTIVITIES
═══════════════════════════════ -->
<section class="py-20 md:py-24" style="background:var(--navy-deep);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
      <div class="reveal">
        <div class="sec-eyebrow" style="color:var(--gold);">Stay Connected</div>
        <h2 class="sec-heading-light">Recent <em>Activities</em></h2>
      </div>
    </div>

    <?php if(!empty($activities)): ?>
    <div class="grid md:grid-cols-3 gap-6">
      <?php foreach($activities as $idx => $act): ?>
        <div class="news-card reveal <?= $idx > 0 ? 'd'.$idx : '' ?>" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);">
          <?php if(!empty($act['image_url'])): ?>
            <img src="<?= base_url($act['image_url']) ?>" alt="<?= esc($act['title']) ?>" style="width:100%;height:200px;object-fit:cover;display:block;">
          <?php else: ?>
            <div style="width:100%;height:200px;background:linear-gradient(135deg,var(--navy),var(--navy-mid));display:flex;align-items:center;justify-content:center;">
              <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="rgba(184,146,42,0.3)" stroke-width="1">
                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
          <?php endif; ?>
          <div style="padding:24px;">
            <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.15em;color:var(--gold-bright);margin-bottom:8px;">
              <?= date('M d, Y', strtotime($act['activity_date'])) ?>
            </div>
            <div style="font-family:'EB Garamond',serif;font-size:20px;font-weight:500;color:#fff;line-height:1.3;margin-bottom:10px;">
              <?= esc($act['title']) ?>
            </div>
            <p style="font-size:13px;color:rgba(255,255,255,0.4);line-height:1.7;">
              <?= esc(substr($act['description'], 0, 150)) ?><?= strlen($act['description']) > 150 ? '...' : '' ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center" style="padding:40px 0;">
      <div style="font-family:'EB Garamond',serif;font-size:22px;color:rgba(255,255,255,0.4);font-style:italic;">No activities posted yet.</div>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ═══════════════════════════════
     CTA BAND
═══════════════════════════════ -->
<section style="background:var(--cream);border-top:1px solid rgba(184,146,42,0.2);border-bottom:1px solid rgba(184,146,42,0.2);">
  <div class="max-w-screen-xl mx-auto px-4 py-16">
    <div class="grid md:grid-cols-3 gap-8 text-center">
      <div class="reveal" style="padding:20px;">
        <div style="width:56px;height:56px;background:var(--navy);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        </div>
        <div style="font-family:'EB Garamond',serif;font-size:22px;font-weight:500;color:var(--navy);margin-bottom:8px;">Join the Network</div>
        <p style="font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:16px;">Register as an alumni member and connect with fellow graduates.</p>
        <a href="<?= base_url('alumni/register') ?>" style="font-size:12px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);border-bottom:1px solid var(--navy);text-decoration:none;transition:all 0.2s;padding-bottom:2px;">Register Now →</a>
      </div>
      <div class="reveal d1" style="padding:20px;">
        <div style="width:56px;height:56px;background:var(--navy);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
        </div>
        <div style="font-family:'EB Garamond',serif;font-size:22px;font-weight:500;color:var(--navy);margin-bottom:8px;">Access Your Dashboard</div>
        <p style="font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:16px;">Update your profile, education history, and career information.</p>
        <a href="<?= base_url('Home/basiclogin') ?>" style="font-size:12px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);border-bottom:1px solid var(--navy);text-decoration:none;transition:all 0.2s;padding-bottom:2px;">Login →</a>
      </div>
      <div class="reveal d2" style="padding:20px;">
        <div style="width:56px;height:56px;background:var(--navy);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <div style="font-family:'EB Garamond',serif;font-size:22px;font-weight:500;color:var(--navy);margin-bottom:8px;">Get in Touch</div>
        <p style="font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:16px;">Reach out for collaborations, reunions, or support initiatives.</p>
        <a href="<?= base_url('Home/contact') ?>" style="font-size:12px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--navy);border-bottom:1px solid var(--navy);text-decoration:none;transition:all 0.2s;padding-bottom:2px;">Contact Us →</a>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
/* Scroll reveal for alumni page */
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); } });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal, .reveal-l, .reveal-r').forEach(el => observer.observe(el));

/* Card hover effect */
document.querySelectorAll('.grid > [class*="reveal"]').forEach(card => {
  const bar = card.querySelector('div[style*="scaleX(0)"]');
  if (bar) {
    card.addEventListener('mouseenter', () => { bar.style.transform = 'scaleX(1)'; card.style.boxShadow = '0 12px 40px rgba(13,36,72,0.12)'; card.style.transform = 'translateY(-4px)'; });
    card.addEventListener('mouseleave', () => { bar.style.transform = 'scaleX(0)'; card.style.boxShadow = 'none'; card.style.transform = 'translateY(0)'; });
  }
});
</script>
<?= $this->endSection() ?>
