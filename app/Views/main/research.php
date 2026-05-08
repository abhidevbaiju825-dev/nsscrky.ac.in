<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Research</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">

  <!-- Research Guides -->
  <div style="margin-bottom:40px;">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Doctoral</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Research Guides</h2>

    <!-- Desktop table -->
    <div class="hidden md:block" style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
      <table style="width:100%;border-collapse:collapse;">
        <thead><tr style="background:#0d2448;">
          <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;">Name</th>
          <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;">Year / Recognition</th>
          <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;">Research Center & University</th>
        </tr></thead>
        <tbody>
          <tr style="border-bottom:1px solid #f0f0f0;"><td style="padding:12px 20px;font-weight:500;color:#0d2448;font-size:14px;">Dr. R. Rajeevan</td><td style="padding:12px 20px;color:#555;font-size:13px;">2017, Av.EI/A3/23521/2016</td><td style="padding:12px 20px;color:#555;font-size:13px;">Dept. of Political Science, University of Kerala</td></tr>
          <tr style="border-bottom:1px solid #f0f0f0;"><td style="padding:12px 20px;font-weight:500;color:#0d2448;font-size:14px;">Dr. Jyothish Kumar K</td><td style="padding:12px 20px;color:#555;font-size:13px;">2010, Ac. E1/034638/2010</td><td style="padding:12px 20px;color:#555;font-size:13px;">Dept. of Malayalam, MG College, University of Kerala</td></tr>
          <tr style="border-bottom:1px solid #f0f0f0;"><td style="padding:12px 20px;font-weight:500;color:#0d2448;font-size:14px;">Dr. Rekha T.K</td><td style="padding:12px 20px;color:#555;font-size:13px;">2022, No. 4145/AC A 6/2022/MGU</td><td style="padding:12px 20px;color:#555;font-size:13px;">Dept. of Electronics, NSS College Rajakumari, MG University</td></tr>
          <tr style="border-bottom:1px solid #f0f0f0;"><td style="padding:12px 20px;font-weight:500;color:#0d2448;font-size:14px;">Dr. Ajitha RS</td><td style="padding:12px 20px;color:#555;font-size:13px;">2022, No. 4145/AC A 6/2022/MGU</td><td style="padding:12px 20px;color:#555;font-size:13px;">Dept. of Computer Applications, NSS College Rajakumari, MG University</td></tr>
          <tr><td style="padding:12px 20px;font-weight:500;color:#0d2448;font-size:14px;">Dr. Reji A.P.</td><td style="padding:12px 20px;color:#555;font-size:13px;">2023, 1499/AC A 6/2023/MGU</td><td style="padding:12px 20px;color:#555;font-size:13px;">Dept. of Electronics, NSS College Rajakumari, MG University</td></tr>
        </tbody>
      </table>
    </div>

    <!-- Mobile card layout -->
    <div class="md:hidden space-y-3">
      <?php
      $guides = [
        ['Dr. R. Rajeevan', '2017, Av.EI/A3/23521/2016', 'Dept. of Political Science, University of Kerala'],
        ['Dr. Jyothish Kumar K', '2010, Ac. E1/034638/2010', 'Dept. of Malayalam, MG College, University of Kerala'],
        ['Dr. Rekha T.K', '2022, No. 4145/AC A 6/2022/MGU', 'Dept. of Electronics, NSS College Rajakumari, MG University'],
        ['Dr. Ajitha RS', '2022, No. 4145/AC A 6/2022/MGU', 'Dept. of Computer Applications, NSS College Rajakumari, MG University'],
        ['Dr. Reji A.P.', '2023, 1499/AC A 6/2023/MGU', 'Dept. of Electronics, NSS College Rajakumari, MG University'],
      ];
      foreach($guides as $g): ?>
      <div style="background:#fff;border-radius:12px;padding:16px;border:1px solid #eee;box-shadow:0 2px 10px rgba(0,0,0,0.04);">
        <div style="font-weight:600;color:#0d2448;font-size:15px;margin-bottom:8px;"><?= $g[0] ?></div>
        <div style="font-size:12px;color:#888;margin-bottom:4px;">
          <span style="color:#b8922a;font-weight:600;">Recognition:</span> <?= $g[1] ?>
        </div>
        <div style="font-size:12px;color:#888;">
          <span style="color:#b8922a;font-weight:600;">Center:</span> <?= $g[2] ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Publications -->
  <div>
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Academic Output</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Publications of Faculty Members</h2>

    <!-- Desktop table -->
    <div class="hidden md:block" style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
      <table style="width:100%;border-collapse:collapse;">
        <thead><tr style="background:#0d2448;">
          <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;">Author</th>
          <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;">Designation / Department</th>
          <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;">Publications</th>
        </tr></thead>
        <tbody>
          <?php
          $pubs = [
            ['Dr. R. Rajeevan','Principal (Retired 31/05/2021)',''],
            ['Dr. Jyothish Kumar K','Principal',''],
            ['Dr. Praveen N.','Associate Professor, Electronics',''],
            ['Dr. Saritha N.','Associate Professor, Electronics',''],
            ['Dr. Premlal P.D.','Associate Professor, Electronics',''],
            ['Dr. Rekha T.K','Associate Professor, Electronics','assets/research/Rekha.pdf|Journal Papers-8, Conference Papers-19'],
            ['Dr. Reji A.P.','Associate Professor, Electronics','assets/research/reji.pdf|Journal Papers-10, Conference Papers-3'],
            ['Dr. Shyam Kumar K','Associate Professor, Computer Applications',''],
            ['Dr. Ajitha R.S','Assistant Professor, Computer Applications','assets/research/ajitha.pdf|Journal Papers-19, Conference Papers-12'],
            ['Dr. Suji Gopinath','Assistant Professor, Computer Applications','assets/research/suji.pdf|Journal Papers-5, Conference Papers-2'],
            ['Dr. Bindu Gopinath','Associate Professor, Business Administration',''],
            ['Deepthy L','Assistant Professor, Commerce','assets/research/Deepthy.pdf|Journal Papers-4, Conference Papers-3'],
            ['Pradeep K.G','Assistant Professor, Commerce','assets/research/pradeep.pdf|Journal Papers-3'],
            ['Athira G.J','Assistant Professor, Commerce',''],
            ['Gopikrishnan P','Assistant Professor, English',''],
          ];
          foreach($pubs as $p): ?>
          <tr style="border-bottom:1px solid #f0f0f0;">
            <td style="padding:12px 20px;font-weight:500;color:#0d2448;font-size:13px;"><?= $p[0] ?></td>
            <td style="padding:12px 20px;color:#555;font-size:13px;"><?= $p[1] ?></td>
            <td style="padding:12px 20px;font-size:13px;">
              <?php if($p[2]): $parts = explode('|', $p[2]); ?>
                <a href="<?= base_url($parts[0]) ?>" target="_blank" style="color:#b8922a;text-decoration:none;"><?= $parts[1] ?></a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Mobile card layout -->
    <div class="md:hidden space-y-3">
      <?php foreach($pubs as $p): ?>
      <div style="background:#fff;border-radius:12px;padding:16px;border:1px solid #eee;box-shadow:0 2px 10px rgba(0,0,0,0.04);">
        <div style="font-weight:600;color:#0d2448;font-size:15px;margin-bottom:4px;"><?= $p[0] ?></div>
        <div style="font-size:12px;color:#888;margin-bottom:6px;"><?= $p[1] ?></div>
        <?php if($p[2]): $parts = explode('|', $p[2]); ?>
          <a href="<?= base_url($parts[0]) ?>" target="_blank" style="display:inline-flex;align-items:center;gap:4px;color:#b8922a;font-size:12px;font-weight:600;text-decoration:none;">
            📄 <?= $parts[1] ?>
          </a>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
