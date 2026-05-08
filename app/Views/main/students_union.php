<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<?php
  // Get first in-charge
  $incharge = !empty($union_incharge_lst) ? $union_incharge_lst[0] : null;
?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Student Life</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Students Union</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<div class="max-w-screen-xl mx-auto px-4 py-12">
  <div class="grid lg:grid-cols-4 gap-10">

    <!-- ═══ MAIN CONTENT (3/4) ═══ -->
    <div class="lg:col-span-3 space-y-12">
      
      <!-- About Section -->
      <div style="background:#fff;border-radius:14px;padding:24px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;" class="md:!p-8">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Overview</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:700;margin-bottom:6px;">About the Union</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:20px;border-radius:2px;"></div>
        <?php if(!empty($union_activities_lst)): ?>
          <?php foreach($union_activities_lst as $row): ?>
          <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;margin-bottom:15px;">
            <?= $row['_details'] ?? $row['_description'] ?? '' ?>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
            <p>The Students Union of NSS College Rajakumari is democratically elected by the students to represent their interests and organize various academic, cultural, and social activities throughout the academic year. The union serves as a bridge between students and the college administration.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Union Members -->
      <?php if(!empty($union_panel_lst)): ?>
      <div class="space-y-6">
        <div style="margin-bottom:20px;">
          <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Elected Representatives</div>
          <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:700;margin-bottom:6px;">Executive Council</h2>
          <div style="width:45px;height:3px;background:#b8922a;border-radius:2px;"></div>
        </div>

        <div class="space-y-3">
          <!-- Desktop Table Header -->
          <div class="hidden md:flex" style="align-items:center;padding:0 24px 8px;border-bottom:2px solid #eee;margin-bottom:10px;">
            <div style="width:35%;font-size:12px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.05em;">Designation</div>
            <div style="width:35%;font-size:12px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.05em;">Name</div>
            <div style="width:30%;font-size:12px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.05em;">Department</div>
          </div>

          <?php foreach($union_panel_lst as $val): 
            $isChair = (stripos($val['_designation'] ?? '', 'Chairman') !== false || stripos($val['_designation'] ?? '', 'Chairperson') !== false);
          ?>
            <?php if($isChair): ?>
              <!-- Premium Blue Card for Chairman/Chairperson -->
              <div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);border-radius:12px;padding:20px;box-shadow:0 8px 25px rgba(13,36,72,0.15);position:relative;overflow:hidden;margin-top:10px;margin-bottom:10px;">
                <!-- Decorative elements -->
                <div style="position:absolute;top:0;right:0;width:150px;height:150px;background:radial-gradient(circle, rgba(184,146,42,0.1) 0%, rgba(255,255,255,0) 70%);transform:translate(30%, -30%);"></div>
                
                <!-- Desktop layout -->
                <div class="hidden md:flex" style="align-items:center;position:relative;z-index:1;width:100%;">
                  <div style="flex:1;display:flex;align-items:center;">
                    <div style="width:35%;">
                      <div style="font-weight:700;color:#b8922a;font-size:15px;letter-spacing:0.02em;text-transform:uppercase;"><?= !empty($val['_designation']) ? ucwords($val['_designation']) : '-' ?></div>
                    </div>
                    <div style="width:35%;">
                      <div style="font-weight:700;color:#fff;font-size:18px;"><?= !empty($val['_name']) ? ucwords($val['_name']) : '-' ?></div>
                    </div>
                    <div style="width:30%;">
                      <div style="font-size:14px;color:rgba(255,255,255,0.7);"><?= !empty($val['_department']) ? ucwords($val['_department']) : '-' ?></div>
                    </div>
                  </div>
                  <?php if(!empty($val['_imgloc'])): ?>
                  <div style="width:50px;height:50px;border-radius:50%;overflow:hidden;border:2px solid #b8922a;flex-shrink:0;margin-left:15px;box-shadow:0 4px 10px rgba(0,0,0,0.3);">
                     <img src="<?= base_url($val['_imgloc']) ?>" style="width:100%;height:100%;object-fit:cover;">
                  </div>
                  <?php endif; ?>
                </div>

                <!-- Mobile layout -->
                <div class="md:hidden" style="position:relative;z-index:1;text-align:center;">
                  <?php if(!empty($val['_imgloc'])): ?>
                  <div style="width:60px;height:60px;border-radius:50%;overflow:hidden;border:2px solid #b8922a;margin:0 auto 12px;box-shadow:0 4px 10px rgba(0,0,0,0.3);">
                     <img src="<?= base_url($val['_imgloc']) ?>" style="width:100%;height:100%;object-fit:cover;">
                  </div>
                  <?php endif; ?>
                  <div style="font-weight:700;color:#b8922a;font-size:12px;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:6px;"><?= !empty($val['_designation']) ? ucwords($val['_designation']) : '-' ?></div>
                  <div style="font-weight:700;color:#fff;font-size:16px;margin-bottom:4px;"><?= !empty($val['_name']) ? ucwords($val['_name']) : '-' ?></div>
                  <div style="font-size:13px;color:rgba(255,255,255,0.7);"><?= !empty($val['_department']) ? ucwords($val['_department']) : '-' ?></div>
                </div>
              </div>
            <?php else: ?>
              <!-- Desktop: Regular List Item -->
              <div class="hidden md:flex" style="background:#fff;border-radius:12px;padding:16px 24px;align-items:center;justify-content:space-between;border:1px solid #eee;transition:all 0.2s;" onmouseover="this.style.background='#fcfcfc'" onmouseout="this.style.background='#fff'">
                <div style="flex:1;display:flex;align-items:center;">
                  <div style="width:35%;font-weight:700;color:#0d2448;font-size:14px;"><?= !empty($val['_designation']) ? ucwords($val['_designation']) : '-' ?></div>
                  <div style="width:35%;font-weight:600;color:#444;font-size:14px;"><?= !empty($val['_name']) ? ucwords($val['_name']) : '-' ?></div>
                  <div style="width:30%;font-size:13px;color:#666;"><?= !empty($val['_department']) ? ucwords($val['_department']) : '-' ?></div>
                </div>
              </div>

              <!-- Mobile: Card Layout -->
              <div class="md:hidden" style="background:#fff;border-radius:12px;padding:14px 16px;border:1px solid #eee;">
                <div style="font-weight:700;color:#0d2448;font-size:13px;margin-bottom:2px;"><?= !empty($val['_designation']) ? ucwords($val['_designation']) : '-' ?></div>
                <div style="font-weight:500;color:#555;font-size:14px;"><?= !empty($val['_name']) ? ucwords($val['_name']) : '-' ?></div>
                <?php if(!empty($val['_department'])): ?>
                  <div style="font-size:12px;color:#888;margin-top:4px;"><?= ucwords($val['_department']) ?></div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <?php else: ?>
      <!-- Empty State for Union Panel -->
      <div style="text-align:center;padding:60px 20px;background:#fff;border-radius:14px;border:1px solid #eee;">
        <div style="font-size:48px;margin-bottom:16px;opacity:0.3;">🏛️</div>
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:8px;">Executive Council</h3>
        <p style="font-size:15px;color:#888;max-width:400px;margin:0 auto;">The elected representatives for the current academic year will be updated soon.</p>
      </div>
      <?php endif; ?>

    </div>
    
    <!-- ═══ SIDEBAR (1/4) ═══ -->
    <div>
      
      <!-- Officer In-charge -->
      <?php if($incharge): ?>
      <div style="background:#fff;border-radius:14px;padding:28px 20px;box-shadow:0 2px 15px rgba(0,0,0,0.06);border:1px solid #eee;text-align:center;margin-bottom:20px;">
        <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.18em;text-transform:uppercase;color:#b8922a;margin-bottom:14px;">Staff Advisor</div>
        <div style="width:120px;height:120px;border-radius:50%;overflow:hidden;margin:0 auto 12px;border:3px solid rgba(184,146,42,0.3);box-shadow:0 4px 15px rgba(0,0,0,0.1);">
          <img src="<?= empty($incharge['_imgloc']) ? base_url('uploads/static/avatar.png') : base_url($incharge['_imgloc']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <h4 style="font-size:15px;font-weight:600;color:#0d2448;"><?= esc($incharge['_name']) ?></h4>
        <p style="font-size:12px;color:#b8922a;margin-top:2px;"><?= esc($incharge['_designation']) ?></p>
        <?php if(!empty($incharge['_details'])): ?>
          <p style="font-size:12px;color:#666;margin-top:10px;line-height:1.5;"><?= esc($incharge['_details']) ?></p>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <!-- Quick Contact / Info -->
      <div style="background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);border:1px solid #eee;">
        <h4 style="font-family:'Cinzel',serif;font-size:13px;color:#0d2448;font-weight:600;margin-bottom:14px;letter-spacing:0.05em;">Union Office</h4>
        <div style="font-size:13px;color:#555;display:flex;align-items:flex-start;margin-bottom:10px;gap:8px;">
          <span style="color:#b8922a;">📍</span>
          <span>Students Union Room,<br>Main Block, Ground Floor</span>
        </div>
        <div style="font-size:13px;color:#555;display:flex;align-items:center;margin-bottom:10px;gap:8px;">
          <span style="color:#b8922a;">✉</span>
          <span style="word-break:break-all;">union@nsscrky.ac.in</span>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
