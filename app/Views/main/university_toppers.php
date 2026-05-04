<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:60px 0 50px;text-align:center;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:14px;letter-spacing:0.3em;text-transform:uppercase;color:#b8922a;margin-bottom:12px;">Roll of Honor</div>
    <h1 style="font-family:'Cinzel',serif;font-size:36px;color:#fff;font-weight:700;letter-spacing:0.08em;">University Toppers</h1>
    <div style="width:80px;height:4px;background:#b8922a;margin:20px auto 0;border-radius:2px;"></div>
  </div>
</div>

<section class="py-16" style="background-image:url('<?= base_url('assets/img/congrats_bg.jpg') ?>');background-attachment:fixed;background-size:cover;background-position:center;">
  <div class="max-w-screen-xl mx-auto px-4">
    
    <!-- Top Tier (Rank 1 & 2) -->
    <div class="grid md:grid-cols-2 gap-8 mb-12 max-w-4xl mx-auto">
      <?php
      $topTwo = [
        ['Bobina George', 'Rank: 1', 'Grade: 9.58', 'Model II Computer Application', 'bobina_george.jpg'],
        ['Keerthana C.', 'Rank: 2', 'Grade: 9.32', 'Model I CO Operation', 'keerthana_c.jpg']
      ];
      foreach($topTwo as $t): ?>
      <div style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-radius:24px;padding:32px;border:2px solid #b8922a;box-shadow:0 10px 40px rgba(0,0,0,0.1);text-align:center;position:relative;overflow:hidden;">
        <div style="position:absolute;top:20px;right:-35px;background:#b8922a;color:#fff;padding:8px 45px;transform:rotate(45deg);font-weight:bold;font-size:14px;box-shadow:0 2px 10px rgba(0,0,0,0.1);"><?= $t[1] ?></div>
        <div style="width:180px;height:180px;margin:0 auto 20px;border-radius:50%;border:4px solid #b8922a;padding:5px;background:#fff;">
          <img src="<?= base_url('assets/img/university_toppers/'.$t[4]) ?>" alt="<?= $t[0] ?>" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
        </div>
        <h3 style="font-family:'Cinzel',serif;font-size:24px;color:#0d2448;font-weight:700;margin-bottom:6px;"><?= $t[0] ?></h3>
        <p style="font-size:16px;color:#b8922a;font-weight:600;margin-bottom:12px;"><?= $t[2] ?></p>
        <div style="height:1px;background:#eee;margin:16px auto;width:60%;"></div>
        <p style="font-size:13px;color:#666;font-weight:500;"><?= $t[3] ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Ranked Toppers Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-12">
      <?php
      $ranked = [
        ['Saranya Roy', 'Rank: 7', 'Grade: 9.28', 'Model II Computer Application', 'saranya_roy.jpg'],
        ['Amitha Sebastian', 'Rank: 10', 'Grade: 9.0', 'Model I CO Operation', 'amitha_sebastian.jpg'],
        ['Anju P V', 'Rank: 11', 'Grade: 8.97', 'Model I CO Operation', 'anju_p_v.jpg'],
        ['Surya Mohanan', 'Rank: 13', 'Grade: 8.83', 'Model I CO Operation', 'surya_mohanan.jpg'],
        ['Suryamol Rajan', 'Rank: 17', 'Grade: 8.73', 'Model I CO Operation', 'suryamol_rajan.jpg'],
        ['Haripriya Biju', 'Rank: 22', 'Grade: 8.63', 'Model I CO Operation', 'haripriya_biju.jpg'],
        ['Anitta Eldhose', 'Rank: 23', 'Grade: 8.93', 'BCA', 'anitta_eldhose.jpg'],
        ['Donia Johnson', 'Rank: 26', 'Grade: 8.51', 'Model I CO Operation', 'donia_johnson.jpg'],
        ['Binimol Baby', 'Rank: 28', 'Grade: 8.48', 'Model I CO Operation', 'binimol_baby_1.jpg'],
        ['Nimna Johnson', 'Rank: 29', 'Grade: 8.47', 'Model I CO Operation', 'nimna_johnson.jpg']
      ];
      foreach($ranked as $r): ?>
      <div style="background:rgba(255,255,255,0.95);border-radius:16px;padding:20px;border:1px solid #ddd;box-shadow:0 4px 15px rgba(0,0,0,0.05);text-align:center;position:relative;transition:all 0.3s;" onmouseover="this.style.transform='translateY(-5px)';this.style.borderColor='#b8922a';this.style.boxShadow='0 8px 25px rgba(184,146,42,0.2)'" onmouseout="this.style.transform='none';this.style.borderColor='#ddd';this.style.boxShadow='0 4px 15px rgba(0,0,0,0.05)'">
        <div style="position:absolute;top:10px;left:10px;background:#b8922a;color:#fff;padding:2px 8px;border-radius:4px;font-weight:bold;font-size:10px;"><?= $r[1] ?></div>
        <div style="width:100px;height:100px;margin:0 auto 15px;border-radius:50%;border:2px solid #eee;padding:3px;background:#fff;">
          <img src="<?= base_url('assets/img/university_toppers/'.$r[4]) ?>" alt="<?= $r[0] ?>" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
        </div>
        <h4 style="font-size:14px;font-weight:700;color:#0d2448;margin-bottom:4px;"><?= $r[0] ?></h4>
        <p style="font-size:12px;color:#b8922a;font-weight:600;margin-bottom:8px;"><?= $r[2] ?></p>
        <div style="height:1px;background:#f0f0f0;margin:10px 0;"></div>
        <p style="font-size:10px;color:#888;line-height:1.3;"><?= $r[3] ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Additional Toppers (No Rank specified) -->
    <div style="text-align:center;margin-bottom:40px;">
      <h3 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:700;margin-bottom:32px;">Department Toppers</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <?php
        $others = [
          ['Midhula M.', 'Grade: 8.82', 'Model II CS', 'midhula_m.jpg'],
          ['Soniya Johnson', 'Grade: 8.76', 'Model II CS', 'soniya_johnson.jpg'],
          ['Ajmi Basheer', 'Grade: 8.69', 'Model II CS', 'ajmi_basheer.jpg'],
          ['Anjaly Madhu', 'Grade: 8.52', 'Model II CS', 'anjaly_madhu.jpg'],
          ['Soniya Saji', 'Grade: 8.49', 'Model II CS', 'soniya_saji.jpg'],
          ['Karthika Jayan', 'Grade: 8.46', 'Model II CS', 'karthika_jayan.jpg'],
          ['Ageena Antony', 'Grade: 8.43', 'Model II CS', 'ageena_antony.jpg'],
          ['Aswathy K R', 'Grade: 8.30', 'Model II CS', 'aswathy_k_r.jpg'],
          ['Neenu Jayachandran', 'Grade: 8.19', 'Model II CS', 'neenu_jayachandran.jpg'],
          ['Aparna R', 'Grade: 8.10', 'Model II CS', 'aparna_r.jpg'],
          ['Akshaya S Anand', 'Grade: 8.40', 'Model I Coop', 'akshaya_s_anand.jpg'],
          ['Basil Shaji', 'Grade: 8.37', 'Model I Coop', 'basil_shaji.jpg'],
          ['Ashik Jose', 'Grade: 8.23', 'Model I Coop', 'ashik_jose.jpg'],
          ['Aneetta Jose', 'Grade: 8.20', 'Model I Coop', 'aneetta_jose.jpg'],
          ['Jeena John', 'Grade: 8.04', 'Model I Coop', 'jeena_john.jpg'],
          ['Vijitha Vikraman', 'Grade: 8.15', 'Model I Coop', 'vijitha_vikraman.jpg'],
          ['Harikuttan M N', 'Grade: 8.38', 'BBA', 'harikuttan_m_n.jpg'],
          ['Demitta Joshy', 'Grade: 8.76', 'BBA', 'demitta_joshy.jpg'],
          ['Neeraja T', 'Grade: 8.95', 'BBA', 'neeraja_t.jpg'],
          ['Sofiyani K Thomas', 'Grade: 8.67', 'BBA', 'sofiyani_k_thomas.jpg'],
          ['Jisna Sebastian', 'Grade: 9.05', 'BBA', 'jisna_sebastian.jpg'],
        ];
        foreach($others as $o): ?>
        <div style="background:rgba(255,255,255,0.9);border-radius:12px;padding:15px;border:1px solid #eee;text-align:center;">
          <img src="<?= base_url('assets/img/university_toppers/'.$o[3]) ?>" alt="<?= $o[0] ?>" style="width:70px;height:70px;margin:0 auto 10px;border-radius:50%;object-fit:cover;border:2px solid #eee;">
          <h5 style="font-size:12px;font-weight:700;color:#0d2448;margin-bottom:2px;"><?= $o[0] ?></h5>
          <p style="font-size:10px;color:#b8922a;font-weight:600;"><?= $o[1] ?></p>
          <p style="font-size:9px;color:#999;margin-top:4px;"><?= $o[2] ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>


  </div>
</section>

<?= $this->endSection() ?>
