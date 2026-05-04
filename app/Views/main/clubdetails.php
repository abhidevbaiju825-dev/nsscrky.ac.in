<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Life</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">
      <?php if(!empty($clubdetails)){ echo $clubdetails['_name']; }else{ echo 'Club Details'; } ?>
    </h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<?php
  $otherClubsCount = 0;
  if(!empty($club)) {
    foreach($club as $val) {
      if($val['_display_as']=="clubncell" && $val['_id'] != $clubdetails['_id']) {
        $otherClubsCount++;
      }
    }
  }
  
  $hasSidebar = !empty($clubevents) || !empty($club_activites) || !empty($gallery_image) || $otherClubsCount > 0;
?>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="<?= $hasSidebar ? 'grid lg:grid-cols-4 gap-12' : 'max-w-5xl mx-auto' ?>">
    
    <!-- Main Content Area -->
    <div class="<?= $hasSidebar ? 'lg:col-span-3' : '' ?> space-y-12">
      
      <!-- Banner & Description -->
      <div style="background:#fff;border-radius:24px;overflow:hidden;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <?php if(!empty($clubdetails['_imgloc'])): ?>
          <img src="<?= base_url($clubdetails['_imgloc']) ?>" style="width:100%;max-height:450px;object-fit:cover;" alt="Banner">
        <?php endif; ?>
        
        <div style="padding:40px;">
          <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">About the Club</div>
          <h2 style="font-family:'Cinzel',serif;font-size:24px;color:#0d2448;font-weight:700;margin-bottom:24px;">Objectives & Activities</h2>
          <div style="line-height:1.8;color:#444;font-size:16px;text-align:justify;">
            <?= !empty($clubdetails['_description']) ? $clubdetails['_description'] : '<p>Detailed information about the club\'s objectives and activities will be updated soon.</p>' ?>
          </div>
        </div>
      </div>

      <!-- Member Lists -->
      <?php if(!empty($club_members)): ?>
        <?php foreach($club_members as $val): ?>
        <div class="space-y-8">
          <div style="display:flex;align-items:center;gap:16px;">
            <div style="height:2px;background:#eee;flex-grow:1;"></div>
            <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;white-space:nowrap;">
              <?= $val['designation'] ?: 'Club Members' ?>
            </h3>
            <div style="height:2px;background:#eee;flex-grow:1;"></div>
          </div>

          <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
            <?php foreach($val['members'] as $row): ?>
            <div style="background:#fff;border-radius:16px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:16px;box-shadow:0 4px 15px rgba(0,0,0,0.03);transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
              <img src="<?= empty($row['acc_data']['_imgloc']) ? base_url('assets/images/avatar.png') : base_url($row['acc_data']['_imgloc']) ?>" alt="<?= $row['org_name'] ?>" style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid #f0f0f0;">
              <div>
                <a href="<?= !empty($row['acc_data']['_teacher_id']) ? site_url('Home/view_teacher_detail/'.$row['acc_data']['_teacher_id']) : '#' ?>" style="font-weight:700;color:#0d2448;font-size:14px;text-decoration:none;" class="hover:text-gold-600">
                  <?= $row['org_name'] ?>
                </a>
                <div style="font-size:11px;color:#b8922a;font-weight:600;margin-top:2px;"><?= $row['_desig'] ?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div style="text-align:center;padding:40px 20px;background:#fff;border-radius:24px;border:1px solid #f0f0f0;">
          <div style="font-size:48px;margin-bottom:16px;opacity:0.3;">👥</div>
          <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:8px;">Members List</h3>
          <p style="font-size:15px;color:#888;max-width:400px;margin:0 auto;">The list of club members for the current academic year will be updated soon.</p>
        </div>
      <?php endif; ?>

    </div>

    <!-- Sidebar Area -->
    <?php if($hasSidebar): ?>
    <div class="lg:col-span-1 space-y-10">
      
      <!-- News & Events -->
      <?php if(!empty($clubevents)): ?>
      <div style="background:#fff;border-radius:16px;border:1px solid #eee;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04);">
        <div style="background:#0d2448;padding:12px 20px;color:#fff;font-family:'Cinzel',serif;font-size:14px;font-weight:700;letter-spacing:0.05em;">News & Events</div>
        <div style="max-height:350px;overflow-y:auto;padding:20px;" class="space-y-6">
          <?php foreach ($clubevents as $activity): ?>
          <div style="border-bottom:1px solid #f0f0f0;padding-bottom:12px;" class="last:border-0">
            <h4 style="font-size:14px;font-weight:700;color:#0d2448;margin-bottom:4px;"><?= $activity['_news_title'] ?></h4>
            <p style="font-size:12px;color:#666;line-height:1.5;"><?= substr($activity['_news_description'],0,60) ?>...</p>
            <div style="margin-top:8px;display:flex;justify-content:space-between;align-items:center;">
              <a href="<?= site_url('Home/activity_detailed_view/'.$activity['_club_news_id']) ?>" style="font-size:11px;font-weight:700;color:#b8922a;text-transform:uppercase;">Read More →</a>
              <?php if(!empty($activity['_doc_loc'])): ?>
                <a href="<?= base_url($activity['_doc_loc']) ?>" target="_blank" style="font-size:11px;color:#0d2448;">📥 PDF</a>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Activity Reports -->
      <?php if(!empty($club_activites)): ?>
      <div style="background:#fef9e7;border-radius:16px;padding:24px;border:1px solid #faebcc;">
        <h3 style="font-family:'Cinzel',serif;font-size:15px;color:#856404;font-weight:800;margin-bottom:16px;text-transform:uppercase;">Activity Reports</h3>
        <ul class="space-y-3">
          <?php foreach ($club_activites as $activity): ?>
          <li>
            <a href="<?= !empty($activity['_doc_loc']) ? base_url($activity['_doc_loc']) : '#' ?>" target="_blank" style="display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:#856404;text-decoration:none;" class="hover:underline">
              <span style="font-size:16px;">📄</span>
              <?= substr($activity['_title'],0,30) ?><?= strlen($activity['_title']) > 30 ? '...' : '' ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <!-- Mini Gallery -->
      <?php if(!empty($gallery_image)): ?>
      <div style="background:#fff;border-radius:16px;border:1px solid #eee;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04);">
        <div style="background:#f8fafc;padding:12px 20px;border-bottom:1px solid #eee;font-family:'Cinzel',serif;font-size:14px;font-weight:700;color:#0d2448;">Gallery</div>
        <div style="padding:15px;">
          <div class="grid grid-cols-2 gap-2">
            <?php foreach (array_slice($gallery_image, 0, 4) as $img): ?>
              <a href="<?= site_url('Home/view_gallery/'.$img['_albumid']) ?>" style="display:block;border-radius:8px;overflow:hidden;height:80px;">
                <img src="<?= base_url($img['_imgloc']) ?>" style="width:100%;height:100%;object-fit:cover;transition:all 0.3s;" class="hover:scale-110">
              </a>
            <?php endforeach; ?>
          </div>
          <a href="<?= site_url('Home/gallery') ?>" style="display:block;text-align:center;font-size:12px;font-weight:700;color:#b8922a;margin-top:12px;text-decoration:none;">View Full Gallery</a>
        </div>
      </div>
      <?php endif; ?>

      <!-- Other Clubs Quick Links -->
      <?php if($otherClubsCount > 0): ?>
      <div style="background:#fff;border-radius:16px;padding:24px;border:1px solid #eee;">
        <h3 style="font-family:'Cinzel',serif;font-size:14px;color:#0d2448;font-weight:800;margin-bottom:16px;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:8px;">Other Clubs</h3>
        <div class="space-y-2">
          <?php foreach($club as $val): if($val['_display_as']=="clubncell" && $val['_id'] != $clubdetails['_id']): ?>
            <a href="<?= site_url('Home/clubdetails/'.$val['_id']); ?>" style="display:block;font-size:13px;color:#666;text-decoration:none;padding:4px 0;" class="hover:text-gold-600">
              • <?= $val['_name']; ?>
            </a>
          <?php endif; endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
    <?php endif; ?>

  </div>
</section>

<?= $this->endSection() ?>
