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
    <h1 class="text-2xl md:text-3xl font-semibold text-white break-words" style="font-family:'Cinzel',serif;letter-spacing:0.04em;line-height:1.3;"><?= esc($dept_name) ?></h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:12px;border-radius:2px;"></div>
  </div>
</div>

<div class="max-w-screen-xl mx-auto px-4 py-12">
  <div class="grid lg:grid-cols-4 gap-10">

    <!-- ═══ MAIN CONTENT (3/4) ═══ -->
    <div class="lg:col-span-3 overflow-hidden">

      <!-- Department Description -->
      <?php if(!empty($dept_data['_description'])): ?>
      <div class="bg-white rounded-xl p-6 md:p-8 mb-8 border border-gray-100 shadow-sm">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Overview</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:6px;">About the Department</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div class="text-gray-600 leading-relaxed text-sm md:text-base text-justify break-words">
          <?= $dept_data['_description'] ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- HOD Message -->
      <?php if(!empty($dept_data['_hod_message'])): ?>
      <div class="rounded-xl p-6 md:p-8 mb-8 relative overflow-hidden" style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);">
        <div style="position:absolute;top:12px;left:20px;font-size:60px;color:rgba(184,146,42,0.15);font-family:serif;line-height:1;">"</div>
        <div class="relative z-10 flex flex-col md:flex-row gap-6 items-center md:items-start">
          <!-- Mobile HOD Photo inside message -->
          <?php if($hod): ?>
          <div class="flex-shrink-0 lg:hidden mb-2 md:mb-0">
             <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;border:3px solid rgba(184,146,42,0.3);box-shadow:0 4px 15px rgba(0,0,0,0.1);">
               <img src="<?= ($hod['_imgloc'] == '') ? base_url('uploads/static/avatar.png') : base_url($hod['_imgloc']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
             </div>
          </div>
          <?php endif; ?>
          <div class="text-center md:text-left w-full">
            <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:12px;">Head of Department</div>
            <p style="font-family:'EB Garamond',serif;font-size:18px;color:rgba(255,255,255,0.85);line-height:1.8;font-style:italic;">
              <?= esc(trim($dept_data['_hod_message'])) ?>
            </p>
            <?php if($hod): ?>
              <p style="color:#b8922a;font-size:14px;margin-top:14px;font-weight:500;">— <?= esc($hod['_name']) ?><span class="hidden md:inline">, <?= esc($hod['_designation']) ?></span></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- Programmes Offered -->
      <?php if(!empty($programmes)): ?>
      <div class="bg-white rounded-xl p-6 md:p-8 mb-8 border border-gray-100 shadow-sm overflow-hidden">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Academics</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:6px;">Programmes Offered</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div class="overflow-x-auto w-full rounded-lg border border-gray-100">
          <table class="min-w-full divide-y divide-gray-200" style="min-width:600px;">
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
            <tbody class="divide-y divide-gray-100 bg-white">
              <?php $pi=1; foreach($programmes as $prog): ?>
              <tr class="hover:bg-gray-50 transition-colors">
                <td style="padding:12px 16px;text-align:center;color:#888;font-size:13px;"><?= $pi++ ?></td>
                <td style="padding:12px 16px;font-weight:600;color:#0d2448;font-size:13px;white-space:normal;"><?= esc($prog['title']) ?></td>
                <td style="padding:12px 16px;text-align:center;"><span style="background:rgba(184,146,42,0.1);color:#b8922a;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;"><?= esc($prog['type']) ?></span></td>
                <td style="padding:12px 16px;text-align:center;color:#555;font-size:13px;"><?= esc($prog['duration']) ?></td>
                <td style="padding:12px 16px;text-align:center;color:#555;font-size:13px;"><?= $prog['max_seats'] ?></td>
                <td style="padding:12px 16px;text-align:center;"><?php if(!empty($prog['syllabus'])): ?><a href="<?= base_url($prog['syllabus']) ?>" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 bg-nss-gold text-white text-xs font-bold rounded hover:bg-yellow-600 transition-colors">View</a><?php endif; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php endif; ?>

      <!-- Faculty Section -->
      <?php if($g > 0): ?>
      <div class="mb-8">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">People</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:6px;">Faculty Members</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:24px;border-radius:2px;"></div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-5">
          <?php foreach($faculty as $row): ?>
          <a href="<?= site_url('Home/view_teacher_detail/'.$row['_teacher_id']) ?>" class="flex flex-col items-center bg-white rounded-xl p-5 md:p-6 border border-gray-100 shadow-sm hover:-translate-y-1 hover:shadow-md transition-all break-words text-center">
            <div class="w-20 h-20 md:w-24 md:h-24 rounded-full overflow-hidden mb-3 border-[3px] border-nss-gold/20 flex-shrink-0">
              <img src="<?= ($row['_imgloc'] == '') ? base_url('uploads/static/avatar.png') : base_url($row['_imgloc']) ?>" alt="" class="w-full h-full object-cover">
            </div>
            <h4 class="text-sm md:text-[15px] font-bold text-nss-navy mb-1 leading-tight"><?= esc($row['_name']) ?></h4>
            <p class="text-[11px] md:text-xs text-nss-gold leading-tight"><?= esc($row['_designation']) ?></p>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Association -->
      <?php if(!empty($dept_data['_association_name'])): ?>
      <div class="bg-white rounded-xl p-6 md:p-8 mb-8 border border-gray-100 shadow-sm">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Forum</div>
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:6px;"><?= esc($dept_data['_association_name']) ?> — Student Association</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <div class="text-gray-600 leading-relaxed text-sm md:text-base text-justify break-words">
          <?= $dept_data['_association_description'] ?? '' ?>
        </div>
      </div>
      <?php endif; ?>

    </div>

    <!-- ═══ SIDEBAR (1/4) ═══ -->
    <div class="space-y-6">

      <!-- HOD Card (Hidden on Mobile as it's included in the message) -->
      <?php if($hod): ?>
      <div class="hidden lg:block bg-white rounded-xl p-6 border border-gray-100 shadow-sm text-center">
        <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.18em;text-transform:uppercase;color:#b8922a;margin-bottom:14px;">Head of Department</div>
        <div class="w-[120px] h-[120px] rounded-full overflow-hidden mx-auto mb-4 border-[3px] border-nss-gold/30 shadow-md">
          <img src="<?= ($hod['_imgloc'] == '') ? base_url('uploads/static/avatar.png') : base_url($hod['_imgloc']) ?>" alt="" class="w-full h-full object-cover">
        </div>
        <h4 class="text-[15px] font-bold text-nss-navy"><?= esc($hod['_name']) ?></h4>
        <p class="text-xs text-nss-gold mt-1"><?= esc($hod['_designation']) ?></p>
        <?php if(trim($hod['_email'] ?? '') != ''): ?>
          <p class="text-[11px] text-gray-500 mt-3 flex items-center justify-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg> <?= esc($hod['_email']) ?></p>
        <?php endif; ?>
        <?php if(trim($hod['_phone'] ?? '') != ''): ?>
          <p class="text-[11px] text-gray-500 mt-1 flex items-center justify-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> <?= esc($hod['_phone']) ?></p>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <!-- Department News -->
      <?php if(!empty($dept_news)): ?>
      <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Latest News</h4>
        <div class="divide-y divide-gray-100">
          <?php foreach(array_slice($dept_news, 0, 5) as $n): ?>
          <a href="<?= base_url('Home/newsdetails/'.$n['_newsid']) ?>" class="block py-2.5 group">
            <p class="text-[13px] text-gray-700 font-medium leading-snug group-hover:text-nss-navy group-hover:underline transition-all"><?= esc(mb_substr($n['_newsheading'], 0, 60)) ?>...</p>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Clubs -->
      <?php if(!empty($dept_club)): ?>
      <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Clubs & Cells</h4>
        <div class="divide-y divide-gray-100">
          <?php foreach($dept_club as $c): ?>
          <a href="<?= site_url('Home/clubdetails/'.($c['_id'] ?? '')) ?>" class="block py-2.5 group">
            <p class="text-[13px] text-gray-600 group-hover:text-nss-navy transition-all flex items-center justify-between">
              <?= esc(mb_substr($c['_name'] ?? '', 0, 60)) ?>
              <svg class="w-3.5 h-3.5 text-gray-300 group-hover:text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </p>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Activities -->
      <?php if(!empty($report)): ?>
      <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Activity Reports</h4>
        <div class="divide-y divide-gray-100">
          <?php foreach($report as $activity): ?>
          <a href="<?= base_url($activity['_imgloc'] ?? '#') ?>" target="_blank" class="block py-2.5 group">
            <p class="text-[13px] text-gray-600 group-hover:text-nss-navy transition-all flex items-center gap-2">
              <svg class="w-4 h-4 text-gray-400 group-hover:text-nss-gold flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              <span class="truncate"><?= esc($activity['_title'] ?? '') ?></span>
            </p>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Gallery -->
      <?php if(!empty($gallery_image)): ?>
      <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Gallery</h4>
        <div class="grid grid-cols-2 gap-2">
          <?php foreach(array_slice($gallery_image, 0, 4) as $img): ?>
          <a href="<?= !empty($img['_albumid']) ? site_url('Home/view_deptgallery/'.$img['_albumid']) : '#' ?>" class="rounded-lg overflow-hidden block aspect-square group">
            <img src="<?= !empty($img['_imgloc']) ? base_url($img['_imgloc']) : '' ?>" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Other Departments -->
      <?php if(!empty($dept)): ?>
      <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Other Departments</h4>
        <div class="flex flex-col gap-1.5">
          <?php foreach($dept as $d): ?>
            <?php if(($d['_dep_id'] ?? '') != ($dept_data['_dep_id'] ?? '')): ?>
            <a href="<?= base_url('Home/department_view/'.$d['_dep_id'].'/'.preg_replace('#[^a-zA-Z0-9]+#', '-', trim($d['_department_name'], '. '))) ?>" class="block px-3 py-2 rounded-md text-[13px] text-gray-600 hover:bg-gray-50 hover:text-nss-navy transition-colors border border-transparent hover:border-gray-100">
              <?= esc($d['_department_name']) ?>
            </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
