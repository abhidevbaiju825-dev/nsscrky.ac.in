<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     DASHBOARD HERO
═══════════════════════════════ -->
<section style="background:linear-gradient(145deg, var(--navy-deep) 0%, var(--navy) 40%, #1a3a6e 70%, var(--navy-deep) 100%); position:relative; overflow:hidden; padding:80px 0 60px;">
  <div style="position:absolute;top:-50px;right:25%;width:1px;height:200%;background:linear-gradient(to bottom,transparent,rgba(184,146,42,0.08),transparent);transform:rotate(15deg);"></div>
  <div style="position:absolute;bottom:-100px;right:-100px;width:400px;height:400px;border-radius:50%;border:1px solid rgba(184,146,42,0.06);"></div>
  <div style="position:absolute;inset:0;opacity:0.02;background-image:linear-gradient(rgba(184,146,42,1) 1px,transparent 1px),linear-gradient(90deg,rgba(184,146,42,1) 1px,transparent 1px);background-size:60px 60px;"></div>

  <div class="max-w-screen-xl mx-auto px-4" style="position:relative;z-index:10;">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
      <!-- Profile Info -->
      <div style="display:flex;align-items:center;gap:24px;">
        <?php if(!empty($profile['profile_picture'])): ?>
          <img src="<?= base_url($profile['profile_picture']) ?>" style="width:88px;height:88px;border-radius:50%;object-fit:cover;border:3px solid var(--gold);flex-shrink:0;">
        <?php else: ?>
          <div style="width:88px;height:88px;border-radius:50%;background:rgba(184,146,42,0.15);border:3px solid var(--gold);display:flex;align-items:center;justify-content:center;font-family:'EB Garamond',serif;font-size:36px;color:var(--gold-bright);flex-shrink:0;">
            <?= strtoupper(substr($profile['full_name'], 0, 1)) ?>
          </div>
        <?php endif; ?>
        <div>
          <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.2em;color:var(--gold);margin-bottom:4px;">ALUMNI DASHBOARD</div>
          <h1 style="font-family:'EB Garamond',serif;font-size:32px;font-weight:500;color:#fff;line-height:1.15;margin-bottom:6px;">
            <?= esc($profile['full_name']) ?>
          </h1>
          <div style="display:flex;flex-wrap:wrap;gap:10px;align-items:center;">
            <span style="font-size:10px;letter-spacing:0.1em;text-transform:uppercase;background:rgba(184,146,42,0.2);border:1px solid rgba(184,146,42,0.3);color:var(--gold-bright);padding:3px 12px;font-weight:600;">Batch of <?= esc($profile['passout_year']) ?></span>
            <span style="font-size:12px;color:rgba(255,255,255,0.45);"><?= esc($profile['email']) ?></span>
          </div>
        </div>
      </div>
      <!-- Logout -->
      <a href="<?= base_url('alumni/logout') ?>" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:rgba(255,255,255,0.6);font-size:12px;font-weight:500;letter-spacing:0.1em;text-transform:uppercase;padding:10px 24px;border:1px solid rgba(255,255,255,0.2);text-decoration:none;transition:all 0.3s;" onmouseover="this.style.borderColor='var(--gold)';this.style.color='var(--gold-bright)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.2)';this.style.color='rgba(255,255,255,0.6)'">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
        Logout
      </a>
    </div>
  </div>
</section>

<!-- Profile Details Band -->
<div style="background:var(--navy);border-bottom:2px solid var(--gold);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="flex flex-wrap gap-8" style="padding:18px 0;">
      <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:rgba(255,255,255,0.5);">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="var(--gold)" stroke-width="1.5"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        <?= esc($profile['phone'] ?? 'Not specified') ?>
      </div>
      <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:rgba(255,255,255,0.5);">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="var(--gold)" stroke-width="1.5"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <?= esc($profile['location'] ?? 'Location not specified') ?>
      </div>
      <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:rgba(255,255,255,0.5);">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="var(--gold)" stroke-width="1.5"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <?= esc($profile['address'] ?? 'Address not specified') ?>
      </div>
    </div>
  </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
<div class="max-w-screen-xl mx-auto px-4" style="margin-top:20px;">
  <div style="background:var(--gold-pale);border-left:4px solid var(--gold);padding:14px 18px;font-size:13px;color:var(--navy);">
    <?= session()->getFlashdata('success') ?>
  </div>
</div>
<?php endif; ?>

<!-- ═══════════════════════════════
     EXPERIENCE & EDUCATION
═══════════════════════════════ -->
<section class="py-16" style="background:var(--cream);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="grid lg:grid-cols-2 gap-10">

      <!-- Professional Experience -->
      <div>
        <div class="mb-8">
          <div class="sec-eyebrow">Career</div>
          <h2 class="sec-heading" style="font-size:28px;">Professional <em>Experience</em></h2>
        </div>

        <!-- Existing Records -->
        <div style="margin-bottom:24px;">
          <?php if(!empty($experience)): ?>
            <?php foreach($experience as $exp): ?>
              <div style="background:var(--white);border:1px solid rgba(13,36,72,0.08);padding:24px;margin-bottom:12px;position:relative;transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(184,146,42,0.3)';this.style.boxShadow='0 8px 30px rgba(13,36,72,0.08)'" onmouseout="this.style.borderColor='rgba(13,36,72,0.08)';this.style.boxShadow='none'">
                <a href="<?= base_url('alumni/dropExperience/'.$exp['id']) ?>" style="position:absolute;top:16px;right:16px;color:rgba(13,36,72,0.2);transition:color 0.2s;text-decoration:none;" onmouseover="this.style.color='#dc2626'" onmouseout="this.style.color='rgba(13,36,72,0.2)'" onclick="return confirm('Remove this experience record?');">
                  <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </a>
                <div style="font-family:'EB Garamond',serif;font-size:20px;font-weight:500;color:var(--navy);line-height:1.2;"><?= esc($exp['designation']) ?></div>
                <div style="font-size:13px;color:var(--gold);font-weight:600;margin-top:4px;"><?= esc($exp['company']) ?></div>
                <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.1em;color:var(--muted);margin-top:8px;"><?= esc($exp['from_year']) ?> — <?= esc($exp['to_year'] ?: 'Present') ?></div>
                <?php if(!empty($exp['description'])): ?>
                  <p style="font-size:13px;color:var(--muted);line-height:1.6;margin-top:10px;border-top:1px solid rgba(13,36,72,0.06);padding-top:10px;"><?= esc($exp['description']) ?></p>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div style="border:2px dashed rgba(13,36,72,0.1);padding:32px;text-align:center;">
              <p style="font-size:14px;color:var(--muted);font-style:italic;">No experience records added yet.</p>
            </div>
          <?php endif; ?>
        </div>

        <!-- Add Form -->
        <div style="background:var(--white);border-top:3px solid var(--navy);box-shadow:0 4px 20px rgba(13,36,72,0.06);padding:24px;">
          <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.18em;color:var(--gold);margin-bottom:16px;">ADD NEW EXPERIENCE</div>
          <form action="<?= base_url('alumni/addExperience') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="grid grid-cols-2 gap-4">
              <div class="col-span-2">
                <input type="text" name="designation" placeholder="Job Title / Designation" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div class="col-span-2">
                <input type="text" name="company" placeholder="Company / Organization" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div>
                <input type="text" name="from_year" placeholder="Start Year" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div>
                <input type="text" name="to_year" placeholder="End Year (blank = present)" style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div class="col-span-2">
                <textarea name="description" placeholder="Brief description (optional)" rows="2" style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);resize:vertical;"></textarea>
              </div>
              <div class="col-span-2 text-right">
                <button type="submit" style="background:var(--navy);color:var(--gold-bright);font-size:11px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;padding:10px 24px;border:none;cursor:pointer;font-family:'Outfit',sans-serif;transition:all 0.3s;display:inline-flex;align-items:center;gap:6px;" onmouseover="this.style.background='var(--gold)';this.style.color='var(--navy-deep)'" onmouseout="this.style.background='var(--navy)';this.style.color='var(--gold-bright)'">
                  <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
                  Add Record
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Education History -->
      <div>
        <div class="mb-8">
          <div class="sec-eyebrow">Academics</div>
          <h2 class="sec-heading" style="font-size:28px;">Higher <em>Education</em></h2>
        </div>

        <!-- Existing Records -->
        <div style="margin-bottom:24px;">
          <?php if(!empty($education)): ?>
            <?php foreach($education as $edu): ?>
              <div style="background:var(--white);border:1px solid rgba(13,36,72,0.08);padding:24px;margin-bottom:12px;position:relative;transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(184,146,42,0.3)';this.style.boxShadow='0 8px 30px rgba(13,36,72,0.08)'" onmouseout="this.style.borderColor='rgba(13,36,72,0.08)';this.style.boxShadow='none'">
                <a href="<?= base_url('alumni/dropEducation/'.$edu['id']) ?>" style="position:absolute;top:16px;right:16px;color:rgba(13,36,72,0.2);transition:color 0.2s;text-decoration:none;" onmouseover="this.style.color='#dc2626'" onmouseout="this.style.color='rgba(13,36,72,0.2)'" onclick="return confirm('Remove this education record?');">
                  <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </a>
                <div style="font-family:'EB Garamond',serif;font-size:20px;font-weight:500;color:var(--navy);line-height:1.2;"><?= esc($edu['course']) ?></div>
                <div style="font-size:13px;color:var(--gold);font-weight:600;margin-top:4px;"><?= esc($edu['institution']) ?></div>
                <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.1em;color:var(--muted);margin-top:8px;"><?= esc($edu['from_year']) ?> — <?= esc($edu['to_year']) ?></div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div style="border:2px dashed rgba(13,36,72,0.1);padding:32px;text-align:center;">
              <p style="font-size:14px;color:var(--muted);font-style:italic;">No education records added yet.</p>
            </div>
          <?php endif; ?>
        </div>

        <!-- Add Form -->
        <div style="background:var(--white);border-top:3px solid var(--green-acc);box-shadow:0 4px 20px rgba(13,36,72,0.06);padding:24px;">
          <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.18em;color:var(--green-acc);margin-bottom:16px;">ADD EDUCATION</div>
          <form action="<?= base_url('alumni/addEducation') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="grid grid-cols-2 gap-4">
              <div class="col-span-2">
                <input type="text" name="course" placeholder="Degree / Course Name" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div class="col-span-2">
                <input type="text" name="institution" placeholder="University / Institution" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div>
                <input type="text" name="from_year" placeholder="Start Year" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div>
                <input type="text" name="to_year" placeholder="End Year" required style="width:100%;padding:10px 12px;border:1px solid rgba(13,36,72,0.12);font-size:13px;font-family:'Outfit',sans-serif;background:var(--cream);">
              </div>
              <div class="col-span-2 text-right">
                <button type="submit" style="background:var(--green-acc);color:#fff;font-size:11px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;padding:10px 24px;border:none;cursor:pointer;font-family:'Outfit',sans-serif;transition:all 0.3s;display:inline-flex;align-items:center;gap:6px;" onmouseover="this.style.background='var(--gold)';this.style.color='var(--navy-deep)'" onmouseout="this.style.background='var(--green-acc)';this.style.color='#fff'">
                  <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
                  Add Record
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
