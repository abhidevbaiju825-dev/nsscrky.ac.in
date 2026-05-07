<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Placement Cell</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="space-y-16">
    
    <!-- Cell Description -->
    <div class="grid lg:grid-cols-3 gap-10">
      <div class="lg:col-span-2">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Empowering Careers</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">About the Placement Cell</h2>
        <div style="line-height:1.8;color:#444;text-align:justify;" class="space-y-4">
          <?php foreach($placement as $row):?>
            <div><?= $row['_description'] ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Incharge profiles -->
      <?php if($incharge_list): ?>
      <div class="space-y-6">
        <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#0d2448;font-weight:600;border-bottom:2px solid #eee;padding-bottom:10px;">Placement Incharges</h3>
        <div class="grid grid-cols-1 gap-6">
          <?php foreach($incharge_list as $row): ?>
          <div style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:16px;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
            <img src="<?= $row['_imgloc'] ? base_url($row['_imgloc']) : base_url('uploads/static/avatar.png') ?>" alt="<?= $row['_name'] ?>" style="width:70px;height:70px;border-radius:50%;object-fit:cover;border:2px solid #f0f0f0;">
            <div>
              <div style="font-weight:700;color:#0d2448;font-size:15px;"><?= $row['_name'] ?></div>
              <div style="font-size:12px;color:#b8922a;font-weight:600;margin-top:2px;"><?= $row['_designation'] ?></div>
              <div style="font-size:11px;color:#888;margin-top:4px;">
                <?php if(!empty($row['_phone'])): ?><div>📞 <?= $row['_phone'] ?></div><?php endif; ?>
                <?php if(!empty($row['_email'])): ?><div>✉️ <?= $row['_email'] ?></div><?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <!-- Placed Student List -->
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:32px;text-align:center;">Our Placed Students</h3>
      
      <?php if(!empty($year)): ?>
        <div class="space-y-12">
          <?php foreach($year as $val): ?>
          <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 25px rgba(0,0,0,0.04);border:1px solid #eee;">
            <div style="padding:16px 24px;background:#0d2448;color:#fff;font-weight:700;font-size:16px;"><?= $val['_year'] ?> Recruitment Drive</div>
            <div class="overflow-x-auto">
              <table class="w-full text-left border-collapse">
                <thead>
                  <tr class="bg-gray-50 border-b">
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Student Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Department</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Recruiter</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                  <?php foreach($dataall as $row ): ?>
                    <?php if($row['_year']==$val['_year']): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                      <td class="px-6 py-4 text-sm font-semibold text-gray-800"><?= strtoupper($row['_studentname']) ?></td>
                      <td class="px-6 py-4 text-sm text-gray-600"><?= strtoupper($row['_departmentname']) ?></td>
                      <td class="px-6 py-4 text-sm font-medium text-gold-700" style="color:#b8922a;"><?= strtoupper($row['_companyname']) ?></td>
                    </tr>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="text-center text-gray-500 italic">Student placement data will be updated soon.</p>
      <?php endif; ?>
    </div>

    <!-- Top Recruiters -->
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:32px;text-align:center;">Our Top Recruiters</h3>
      <div class="flex flex-wrap justify-center gap-8 opacity-70">
        <?php for($i=11; $i<=14; $i++): ?>
          <img src="<?= base_url('uploads/static/recruiters/'.$i.'.jpg') ?>" alt="Recruiter" style="height:50px;filter:grayscale(100%);transition:all 0.3s;" onmouseover="this.style.filter='none';this.style.opacity='1'" onmouseout="this.style.filter='grayscale(100%)';this.style.opacity='0.7'">
        <?php endfor; ?>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
