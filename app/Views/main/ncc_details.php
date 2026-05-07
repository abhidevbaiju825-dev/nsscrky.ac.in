<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Activities</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">National Cadet Corps (NCC)</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<?php
  $hasSidebar = !empty($clubevents) || !empty($club_activity) || !empty($gallery_image);
  $hasIncharge = false;
  $hasMembers = false;
  if (!empty($ncc_mem)) {
    foreach ($ncc_mem as $m) {
      if (strtolower($m['_type']) == 'incharge') $hasIncharge = true;
      if (strtolower($m['_type']) == 'member') $hasMembers = true;
    }
  }
?>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="<?= $hasSidebar ? 'grid lg:grid-cols-4 gap-12' : '' ?>">
    
    <!-- Main Content Area -->
    <div class="<?= $hasSidebar ? 'lg:col-span-3' : '' ?> space-y-12">
      
      <!-- Description -->
      <div style="background:#fff;border-radius:24px;padding:40px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:700;margin-bottom:24px;display:flex;align-items:center;gap:12px;">
          <span style="background:#0d2448;color:#fff;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:16px;">🎖️</span>
          About NCC Unit
        </h2>
        <div style="line-height:1.8;color:#444;font-size:16px;text-align:justify;" class="space-y-6">
          <?php if(!empty($ncc_details['_description'])): ?>
            <?= $ncc_details['_description'] ?>
          <?php else: ?>
            <p>The National Cadet Corps (NCC) is a youth development movement. It has enormous potential for nation building. The NCC provides opportunities to the youth of the country for their all-round development with a sense of Duty, Commitment, Dedication, Discipline and Moral Values so that they become able leaders and useful citizens.</p>
            <div style="background:#f8fafc;padding:24px;border-radius:16px;border:1px solid #e2e8f0;">
              <h4 style="font-weight:700;color:#0d2448;margin-bottom:12px;font-size:16px;">Eligibility Conditions</h4>
              <ul class="space-y-3">
                <li style="display:flex;gap:10px;font-size:14px;"><span style="color:#b8922a;">✓</span> Citizen of India or a subject of Nepal.</li>
                <li style="display:flex;gap:10px;font-size:14px;"><span style="color:#b8922a;">✓</span> Bearing good moral character.</li>
                <li style="display:flex;gap:10px;font-size:14px;"><span style="color:#b8922a;">✓</span> Enrolled in an educational institution.</li>
                <li style="display:flex;gap:10px;font-size:14px;"><span style="color:#b8922a;">✓</span> Meets the prescribed medical standards.</li>
                <li style="display:flex;gap:10px;font-size:14px;"><span style="color:#b8922a;">✓</span> Age: Senior Division/Wing (Boys/Girls) - Upto 26 years.</li>
              </ul>
            </div>
            <p>A student desirous of being enrolled in the Senior Division shall apply to the Officer Commanding of the nearest NCC Unit.</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- NCC Officer In-Charge -->
      <?php if($hasIncharge): ?>
      <div class="space-y-8">
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;border-left:4px solid #b8922a;padding-left:16px;">NCC Officer In-Charge</h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($ncc_mem as $mem_ncc): if(strtolower($mem_ncc['_type']) == 'incharge'): ?>
          <div style="background:#fff;border-radius:16px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:16px;box-shadow:0 4px 15px rgba(0,0,0,0.03);transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-3px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
            <img src="<?= !empty($mem_ncc['_profile_pic']) ? base_url($mem_ncc['_profile_pic']) : base_url('uploads/static/avatar.png') ?>" alt="<?= $mem_ncc['_name'] ?>" style="width:70px;height:70px;border-radius:50%;object-fit:cover;border:3px solid #f0f0f0;">
            <div>
              <div style="font-weight:700;color:#0d2448;font-size:15px;"><?= $mem_ncc['_name'] ?></div>
              <div style="font-size:12px;color:#b8922a;font-weight:600;margin-top:2px;"><?= $mem_ncc['_designation'] ?></div>
            </div>
          </div>
          <?php endif; endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Cadets / Members -->
      <?php if($hasMembers): ?>
      <div class="space-y-8">
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;border-left:4px solid #b8922a;padding-left:16px;">Cadets & Under Officers</h3>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <?php foreach ($ncc_mem as $mem_ncc_de): if(strtolower($mem_ncc_de['_type']) == 'member'): ?>
          <div style="background:#fff;border-radius:16px;padding:20px;border:1px solid #eee;text-align:center;transition:all 0.2s;box-shadow:0 4px 15px rgba(0,0,0,0.03);" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 30px rgba(184,146,42,0.12)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none';this.style.boxShadow='0 4px 15px rgba(0,0,0,0.03)'">
            <img src="<?= !empty($mem_ncc_de['_profile_pic']) ? base_url($mem_ncc_de['_profile_pic']) : base_url('uploads/static/avatar.png') ?>" alt="<?= $mem_ncc_de['_name'] ?>" style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin:0 auto 12px;border:3px solid #f8fafc;">
            <div style="font-weight:700;color:#0d2448;font-size:14px;"><?= $mem_ncc_de['_name'] ?></div>
            <div style="font-size:11px;color:#666;margin-top:4px;"><?= $mem_ncc_de['_designation'] ?></div>
          </div>
          <?php endif; endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>

    <!-- Sidebar (only if there's content) -->
    <?php if($hasSidebar): ?>
    <div class="space-y-10">
      
      <!-- News & Events -->
      <?php if(!empty($clubevents)): ?>
      <div style="background:#fff;border-radius:16px;border:1px solid #eee;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04);">
        <div style="background:#0d2448;padding:12px 20px;color:#fff;font-family:'Cinzel',serif;font-size:14px;font-weight:700;letter-spacing:0.05em;">NCC News</div>
        <div style="max-height:300px;overflow-y:auto;padding:20px;" class="space-y-6">
          <?php foreach ($clubevents as $activity): ?>
          <div style="border-bottom:1px solid #f0f0f0;padding-bottom:12px;">
            <h4 style="font-size:13px;font-weight:700;color:#0d2448;margin-bottom:4px;"><?= $activity['_news_title'] ?? $activity['_title'] ?? '' ?></h4>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;">
              <a href="<?= site_url('Home/activity_detailed_view/'.($activity['_club_news_id'] ?? $activity['_id'] ?? '')) ?>" style="font-size:11px;font-weight:700;color:#b8922a;text-transform:uppercase;">View →</a>
              <?php if(!empty($activity['_doc_loc'])): ?>
                <a href="<?= base_url($activity['_doc_loc']) ?>" target="_blank" style="font-size:11px;color:#0d2448;">📥 PDF</a>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Activity Report -->
      <?php if(!empty($club_activity)): ?>
      <div style="background:#fef9e7;border-radius:16px;padding:24px;border:1px solid #faebcc;">
        <h3 style="font-family:'Cinzel',serif;font-size:14px;color:#856404;font-weight:800;margin-bottom:16px;text-transform:uppercase;">Activity Reports</h3>
        <ul class="space-y-3">
          <?php foreach ($club_activity as $activity): ?>
          <li>
            <a href="<?= !empty($activity['_doc_loc']) ? base_url($activity['_doc_loc']) : '#' ?>" target="_blank" style="display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:#856404;text-decoration:none;" class="hover:underline">
              <span style="font-size:16px;">📄</span>
              <?= $activity['_title'] ?? '' ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <!-- Gallery -->
      <?php if(!empty($gallery_image)): ?>
      <div style="background:#fff;border-radius:16px;border:1px solid #eee;overflow:hidden;">
        <div style="background:#f8fafc;padding:12px 20px;border-bottom:1px solid #eee;font-family:'Cinzel',serif;font-size:13px;font-weight:700;color:#0d2448;">NCC Gallery</div>
        <div style="padding:15px;">
          <div class="grid grid-cols-2 gap-2">
            <?php foreach (array_slice($gallery_image, 0, 4) as $img): ?>
              <a href="<?= site_url('Home/view_gallery/'.$img['_albumid']) ?>" style="display:block;border-radius:8px;overflow:hidden;height:80px;">
                <img src="<?= base_url($img['_imgloc']) ?>" style="width:100%;height:100%;object-fit:cover;transition:all 0.3s;" class="hover:scale-110">
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

    </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
