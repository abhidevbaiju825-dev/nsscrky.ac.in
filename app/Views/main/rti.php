<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Right To Information (RTI)</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="space-y-12">
    
    <!-- Statutory Declaration -->
    <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:20px;text-transform:uppercase;border-bottom:2px solid #eee;padding-bottom:12px;">Statutory Declaration</h2>
      <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;">
        <?php if ($declaration): ?>
            <?= $declaration['description']; ?>
        <?php else: ?>
            Citizens can seek information regarding the activities of the college by submitting a written request with details like Name, address, contact telephone number and particulars of the information sought.
        <?php endif; ?>
      </div>
    </div>

    <!-- Officers Section -->
    <div>
      <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:700;margin-bottom:32px;text-align:center;">Officers as Per RTI Act – 2005</h3>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if ($officers): ?>
            <?php foreach ($officers as $officer): ?>
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,0.04);border:1px solid #eee;transition:all 0.3s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-5px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
              <div style="padding:16px;background:#0d2448;color:#fff;text-align:center;font-weight:700;font-size:14px;letter-spacing:0.05em;">
                <?= esc($officer['role']); ?>
              </div>
              <div style="padding:28px;">
                <h4 style="font-size:18px;font-weight:700;color:#0d2448;margin-bottom:6px;"><?= esc($officer['name']); ?></h4>
                <div style="color:#b8922a;font-weight:600;font-size:13px;margin-bottom:4px;"><?= esc($officer['designation']); ?></div>
                <div style="color:#666;font-size:12px;margin-bottom:20px;"><?= esc($officer['department']); ?></div>
                
                <div style="padding-top:15px;border-top:1px solid #f0f0f0;font-size:13px;color:#444;" class="space-y-2">
                  <div class="flex items-center gap-3">
                    <span style="color:#b8922a;">📞</span>
                    <span><?= esc($officer['phone']); ?></span>
                  </div>
                  <div class="flex items-center gap-3">
                    <span style="color:#b8922a;">✉️</span>
                    <a href="mailto:<?= esc($officer['email']); ?>" class="hover:text-blue-600 transition-colors"><?= esc($officer['email']); ?></a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full text-center py-10 text-gray-500 italic">
                Officer details will be updated soon.
            </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
