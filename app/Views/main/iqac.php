<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">IQAC</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid md:grid-cols-4 gap-8">
    <div>
      <div style="background:#f9fafb;border-radius:12px;padding:16px;border:1px solid #eee;">
        <?php $slinks = [['Home/iqac','IQAC Home','🏠'],['Home/aqar','AQAR','📄'],['Home/nirf1','NIRF','📊'],['Home/iqacresult','Results','🎓'],['Home/best','Best Practices','⭐'],['Home/naac_certificates','NAAC Certificate','🏅'],['Home/institutional_distinctiveness','Distinctiveness','🏆'],['Home/naac_journey','NAAC Journey','🗺️']];
        foreach($slinks as $sl): ?>
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;transition:all 0.15s;<?= strpos(current_url(), $sl[0]) !== false ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="md:col-span-3">
      <!-- About -->
      <div style="background:#fff;border-radius:14px;padding:28px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:12px;">About IQAC</h2>
        <div style="width:45px;height:3px;background:#b8922a;margin-bottom:16px;border-radius:2px;"></div>
        <p style="line-height:1.8;color:#444;font-size:15px;"><?= esc($settings['about_text'] ?? '') ?></p>
      </div>

      <!-- Committee -->
      <div style="background:#fff;border-radius:14px;padding:28px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;margin-bottom:20px;">
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:16px;">Committee</h2>
        <div style="display:flex;flex-direction:column;gap:8px;">
          <div style="padding:12px 16px;background:#f9fafb;border-radius:8px;border-left:3px solid #b8922a;">
            <span style="font-weight:600;color:#0d2448;">CHAIRMAN:</span> <span style="color:#555;"><?= esc($settings['chairman'] ?? '') ?></span>
          </div>
          <div style="padding:12px 16px;background:#f9fafb;border-radius:8px;border-left:3px solid #b8922a;">
            <span style="font-weight:600;color:#0d2448;">COORDINATOR:</span> <span style="color:#555;"><?= esc($settings['coordinator'] ?? '') ?></span>
          </div>
        </div>
        <?php if(!empty($settings['members'])): ?>
        <h4 style="font-weight:600;color:#0d2448;margin-top:20px;margin-bottom:10px;font-size:15px;">Members</h4>
        <div style="display:flex;flex-direction:column;gap:4px;">
          <?php foreach(explode("\n", $settings['members']) as $member): ?>
            <?php if(trim($member)): ?>
            <div style="padding:8px 14px;background:#f9fafb;border-radius:6px;font-size:13px;color:#555;border-left:3px solid #eee;"><?= esc(trim($member)) ?></div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Undertaking -->
      <?php if(!empty($documents['undertaking'])): ?>
      <?php $ut = $documents['undertaking'][0]; ?>
      <a href="<?= base_url($ut['file_path']) ?>" target="_blank" style="display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:#0d2448;color:#fff;border-radius:8px;text-decoration:none;font-weight:500;font-size:14px;margin-bottom:20px;transition:background 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">📥 Download Undertaking</a>
      <?php endif; ?>

      <!-- Minutes -->
      <?php if(!empty($documents['meeting_minutes'])): ?>
      <div style="background:#fff;border-radius:14px;padding:28px;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
        <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:16px;">Meeting Minutes</h2>
        <div style="display:flex;flex-wrap:wrap;gap:8px;">
          <?php foreach($documents['meeting_minutes'] as $mm): ?>
          <a href="<?= base_url($mm['file_path']) ?>" target="_blank" style="display:inline-flex;align-items:center;gap:8px;padding:10px 16px;background:#f9fafb;border:1px solid #eee;border-radius:8px;text-decoration:none;color:#555;font-size:13px;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.color='#0d2448'" onmouseout="this.style.borderColor='#eee';this.style.color='#555'">📄 <?= esc($mm['title']) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
