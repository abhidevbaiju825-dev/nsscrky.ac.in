<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<?php
  $g = count($teachers_list ?? []);
  $hod = null;
  $faculty = [];
  foreach ($teachers_list as $t) {
    if (($t['_designation'] == 'Associate Professor & Head' || $t['_designation'] == 'Assistant Professor & Head')) {
      $hod = $t;
    } else if ($t['_designation'] != 'Non-Teaching Staff') {
      $faculty[] = $t;
    }
  }
?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:6px;">Department</div>
    <h1 style="font-family:'Cinzel',serif;font-size:26px;color:#fff;font-weight:600;letter-spacing:0.04em;"><?= esc($dept_name) ?></h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<div class="max-w-screen-xl mx-auto px-4 py-12">
  <div class="grid lg:grid-cols-4 gap-10">

    <!-- ═══ MAIN CONTENT (3/4) ═══ -->
    <div class="lg:col-span-3">

      <!-- Department Description -->
      <?php if(!empty($dept_data['_description'])): ?>
      <div style="background:#fff;border-radius:14px;padding:32px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:28px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Overview</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:6px;">About the Department</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
          <?= $dept_data['_description'] ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- HOD Message -->
      <?php if(!empty($dept_data['_hod_message'])): ?>
      <div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);border-radius:14px;padding:32px;margin-bottom:28px;position:relative;overflow:hidden;">
        <div style="position:absolute;top:12px;left:20px;font-size:60px;color:rgba(184,146,42,0.15);font-family:serif;line-height:1;">"</div>
        <div style="position:relative;z-index:1;">
          <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:12px;">Head of Department</div>
          <p style="font-family:'EB Garamond',serif;font-size:18px;color:rgba(255,255,255,0.85);line-height:1.8;font-style:italic;">
            <?= esc(trim($dept_data['_hod_message'])) ?>
          </p>
          <?php if($hod): ?>
            <p style="color:#b8922a;font-size:14px;margin-top:14px;font-weight:500;">— <?= esc($hod['_name']) ?>, <?= esc($hod['_designation']) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Programmes Offered -->
      <?php if(!empty($programmes)): ?>
      <div style="background:#fff;border-radius:14px;padding:32px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:28px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Academics</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:6px;">Programmes Offered</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div style="overflow-x:auto;">
          <table style="width:100%;border-collapse:collapse;">
            <thead>
              <tr style="background:#0d2448;">
                <th style="padding:12px 16px;color:#fff;font-size:12px;text-align:center;width:6%;">#</th>
                <th style="padding:12px 16px;color:#fff;font-size:12px;text-align:left;">Programme</th>
                <th style="padding:12px 16px;color:#fff;font-size:12px;text-align:center;">Type</th>
                <th style="padding:12px 16px;color:#fff;font-size:12px;text-align:center;">Duration</th>
                <th style="padding:12px 16px;color:#fff;font-size:12px;text-align:center;">Seats</th>
                <th style="padding:12px 16px;color:#fff;font-size:12px;text-align:center;">Syllabus</th>
              </tr>
            </thead>
            <tbody>
              <?php $pi=1; foreach($programmes as $prog): ?>
              <tr style="border-bottom:1px solid #f0f0f0;">
                <td style="padding:12px 16px;text-align:center;color:#888;font-size:13px;"><?= $pi++ ?></td>
                <td style="padding:12px 16px;font-weight:600;color:#0d2448;font-size:13px;"><?= esc($prog['title']) ?></td>
                <td style="padding:12px 16px;text-align:center;"><span style="background:rgba(184,146,42,0.1);color:#b8922a;padding:2px 10px;border-radius:4px;font-size:11px;"><?= esc($prog['type']) ?></span></td>
                <td style="padding:12px 16px;text-align:center;color:#555;font-size:13px;"><?= esc($prog['duration']) ?></td>
                <td style="padding:12px 16px;text-align:center;color:#555;font-size:13px;"><?= $prog['max_seats'] ?></td>
                <td style="padding:12px 16px;text-align:center;"><?php if(!empty($prog['syllabus'])): ?><a href="<?= base_url($prog['syllabus']) ?>" target="_blank" style="color:#b8922a;text-decoration:none;font-size:12px;">Download</a><?php endif; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php endif; ?>

      <!-- Faculty Section -->
      <?php if($g > 0): ?>
      <div style="margin-bottom:28px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">People</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:6px;">Faculty Members</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:24px;border-radius:2px;"></div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
          <?php foreach($faculty as $row): ?>
          <a href="<?= site_url('Home/view_teacher_detail/'.$row['_teacher_id']) ?>" style="text-decoration:none;display:block;text-align:center;background:#fff;border-radius:12px;padding:24px 14px;box-shadow:0 2px 10px rgba(0,0,0,0.04);border:1px solid #f0f0f0;transition:all 0.25s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 25px rgba(13,36,72,0.1)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 10px rgba(0,0,0,0.04)'">
            <div style="width:90px;height:90px;border-radius:50%;overflow:hidden;margin:0 auto 10px;border:3px solid rgba(184,146,42,0.2);">
              <img src="<?= ($row['_imgloc'] == '') ? base_url('assets/images/avatar.png') : base_url($row['_imgloc']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
            </div>
            <h4 style="font-size:13px;font-weight:600;color:#0d2448;margin-bottom:3px;"><?= esc($row['_name']) ?></h4>
            <p style="font-size:11px;color:#b8922a;"><?= esc($row['_designation']) ?></p>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Association -->
      <?php if(!empty($dept_data['_association_name'])): ?>
      <div style="background:#fff;border-radius:14px;padding:32px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:28px;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Forum</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:6px;"><?= esc($dept_data['_association_name']) ?> — Student Association</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div style="text-align:justify;line-height:1.9;color:#444;font-size:15px;">
          <?= $dept_data['_association_description'] ?? '' ?>
        </div>
      </div>
      <?php endif; ?>

    </div>

    <!-- ═══ SIDEBAR (1/4) ═══ -->
    <div>

      <!-- HOD Card -->
      <?php if($hod): ?>
      <div style="background:#fff;border-radius:14px;padding:28px 20px;box-shadow:0 2px 15px rgba(0,0,0,0.06);border:1px solid #eee;text-align:center;margin-bottom:20px;">
        <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.18em;text-transform:uppercase;color:#b8922a;margin-bottom:14px;">Head of Department</div>
        <div style="width:120px;height:120px;border-radius:50%;overflow:hidden;margin:0 auto 12px;border:3px solid rgba(184,146,42,0.3);box-shadow:0 4px 15px rgba(0,0,0,0.1);">
          <img src="<?= ($hod['_imgloc'] == '') ? base_url('assets/images/avatar.png') : base_url($hod['_imgloc']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <h4 style="font-size:15px;font-weight:600;color:#0d2448;"><?= esc($hod['_name']) ?></h4>
        <p style="font-size:12px;color:#b8922a;margin-top:2px;"><?= esc($hod['_designation']) ?></p>
        <?php if(trim($hod['_email'] ?? '') != ''): ?>
          <p style="font-size:11px;color:#888;margin-top:8px;">✉ <?= esc($hod['_email']) ?></p>
        <?php endif; ?>
        <?php if(trim($hod['_phone'] ?? '') != ''): ?>
          <p style="font-size:11px;color:#888;margin-top:2px;">✆ <?= esc($hod['_phone']) ?></p>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <!-- Department News -->
      <?php if(!empty($dept_news)): ?>
      <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Latest News</h4>
        <?php foreach(array_slice($dept_news, 0, 5) as $n): ?>
        <a href="<?= base_url('Home/newsdetails/'.$n['_newsid']) ?>" style="display:block;text-decoration:none;padding:10px 0;border-bottom:1px solid #f5f5f5;">
          <p style="font-size:13px;color:#0d2448;font-weight:500;line-height:1.4;margin:0;"><?= esc(mb_substr($n['_newsheading'], 0, 60)) ?>...</p>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Clubs -->
      <?php if(!empty($dept_club)): ?>
      <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Clubs & Cells</h4>
        <?php foreach($dept_club as $c): ?>
        <a href="<?= site_url('Home/clubdetails/'.($c['_id'] ?? '')) ?>" style="display:block;text-decoration:none;padding:8px 0;border-bottom:1px solid #f5f5f5;">
          <p style="font-size:13px;color:#555;margin:0;"><?= esc(mb_substr($c['_name'] ?? '', 0, 60)) ?></p>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Activities -->
      <?php if(!empty($report)): ?>
      <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Activity Reports</h4>
        <?php foreach($report as $activity): ?>
        <a href="<?= base_url($activity['_imgloc'] ?? '#') ?>" style="display:block;text-decoration:none;padding:8px 0;border-bottom:1px solid #f5f5f5;">
          <p style="font-size:13px;color:#555;margin:0;"><?= esc($activity['_title'] ?? '') ?></p>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Gallery -->
      <?php if(!empty($gallery_image)): ?>
      <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Gallery</h4>
        <div class="grid grid-cols-2 gap-2">
          <?php foreach(array_slice($gallery_image, 0, 4) as $img): ?>
          <a href="<?= !empty($img['_albumid']) ? site_url('Home/view_deptgallery/'.$img['_albumid']) : '#' ?>" style="border-radius:8px;overflow:hidden;display:block;aspect-ratio:1;">
            <img src="<?= !empty($img['_imgloc']) ? base_url($img['_imgloc']) : '' ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Other Departments -->
      <?php if(!empty($dept)): ?>
      <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #eee;">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Other Departments</h4>
        <?php foreach($dept as $d): ?>
          <?php if(($d['_dep_id'] ?? '') != ($dept_data['_dep_id'] ?? '')): ?>
          <a href="<?= base_url('Home/department_view/'.$d['_dep_id'].'/'.preg_replace('#[ -]+#', '-', $d['_department_name'])) ?>" style="display:block;text-decoration:none;padding:8px 12px;margin-bottom:4px;border-radius:6px;font-size:13px;color:#555;transition:all 0.15s;" onmouseover="this.style.background='#f4f4f4';this.style.color='#0d2448'" onmouseout="this.style.background='';this.style.color='#555'">
            <?= esc($d['_department_name']) ?>
          </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
