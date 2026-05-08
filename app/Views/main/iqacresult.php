<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Academic Results</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- IQAC Sidebar (on mobile: appears after content via order) -->
    <div class="order-2 md:order-1">
      <div style="background:#f9fafb;border-radius:12px;padding:16px;border:1px solid #eee;">
        <?php $slinks = [['Home/iqac','IQAC Home','🏠'],['Home/aqar','AQAR','📄'],['Home/nirf1','NIRF','📊'],['Home/iqacresult','Results','🎓'],['Home/best','Best Practices','⭐'],['Home/naac_certificates','NAAC Certificate','🏅'],['Home/institutional_distinctiveness','Distinctiveness','🏆'],['Home/naac_journey','NAAC Journey','🗺️']];
        foreach($slinks as $sl): ?>
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;<?= $sl[0]=='Home/iqacresult' ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Content -->
    <div class="md:col-span-3 order-1 md:order-2">
      <?php
      $results = [
        ['Result 2021-2022', 'assets/feedback/result2122.pdf', [
          ['MSc Electronics', 7, 7, '100%'],
          ['BCom Model I - Cooperation', 37, 30, '81.08%'],
          ['BCom Model II – Computer Applications', 29, 26, '89.66%'],
          ['BSc Electronics', 30, 17, '56.67%'],
          ['BBA', 59, 44, '74.58%'],
          ['BCA', 42, 37, '88.09%']
        ]],
        ['Result 2020-2021', 'assets/feedback/result2021.pdf', [
          ['MSc Electronics', 11, 7, '63.6%'],
          ['BCom Model I - Cooperation', 38, 30, '78.95%'],
          ['BCom Model II – Computer Applications', 28, 23, '82.14%'],
          ['BSc Electronics', 25, 21, '84%'],
          ['BBA', 56, 41, '73.21%'],
          ['BCA', 44, 38, '86.36%']
        ]],
        ['Result 2019-2020', 'assets/feedback/result1920.pdf', [
          ['MSc Electronics', 10, 9, '90%'],
          ['BCom Model I - Cooperation', 37, 31, '83.78%'],
          ['BCom Model II – Computer Applications', 29, 23, '79.31%'],
          ['BSc Electronics', 31, 23, '74.19%'],
          ['BBA', 47, 29, '61.70%'],
          ['BCA', 44, 41, '93.18%']
        ]]
      ];

      foreach($results as $res): ?>
      <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
          <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;"><?= $res[0] ?></h3>
          <a href="<?= base_url($res[1]) ?>" target="_blank" class="text-sm text-blue-600 hover:underline">Download PDF</a>
        </div>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-gray-50 border-bottom border-gray-200">
                <th class="px-4 py-3 text-sm font-semibold text-gray-700">Course</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Appeared</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Passed</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Pass %</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <?php foreach($res[2] as $row): ?>
              <tr>
                <td class="px-4 py-3 text-sm text-gray-600"><?= $row[0] ?></td>
                <td class="px-4 py-3 text-sm text-gray-600 text-center"><?= $row[1] ?></td>
                <td class="px-4 py-3 text-sm text-gray-600 text-center"><?= $row[2] ?></td>
                <td class="px-4 py-3 text-sm font-medium text-gray-800 text-center"><?= $row[3] ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php endforeach; ?>

      <!-- Special Case: 2018-2019 with Ranks -->
      <div class="mb-12">
        <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;margin-bottom:24px;">Result 2018-2019</h3>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-gray-50 border-bottom border-gray-200">
                <th class="px-4 py-3 text-sm font-semibold text-gray-700" rowspan="2">Course</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center" colspan="4">No of Students</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center" rowspan="2">Pass %</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center" rowspan="2">Univ. Ranks (top 30)</th>
              </tr>
              <tr class="bg-gray-50 border-bottom border-gray-200">
                <th class="px-2 py-2 text-xs font-semibold text-gray-500 text-center border-l">Appeared</th>
                <th class="px-2 py-2 text-xs font-semibold text-gray-500 text-center">Passed</th>
                <th class="px-2 py-2 text-xs font-semibold text-gray-500 text-center">A+</th>
                <th class="px-2 py-2 text-xs font-semibold text-gray-500 text-center">A</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <?php
              $res1819 = [
                ['MSc Electronics', 10, 10, '', 2, '100%', '2, 4'],
                ['BCom Model I - Cooperation', 35, 28, 2, 15, '80.00%', '2, 10, 11, 13, 17, 22, 26, 28, 29'],
                ['BCom Model II – Computer Applications', 27, 22, 2, 11, '81.48%', '1, 7'],
                ['BSc Electronics', 34, 17, '', 7, '50.00%', '5, 6, 7, 10'],
                ['BBA', 50, 36, '', 5, '72.00%', ''],
                ['BCA', 42, 31, '', 7, '73.80%', '']
              ];
              foreach($res1819 as $row): ?>
              <tr>
                <td class="px-4 py-3 text-sm text-gray-600"><?= $row[0] ?></td>
                <td class="px-2 py-3 text-sm text-gray-600 text-center border-l"><?= $row[1] ?></td>
                <td class="px-2 py-3 text-sm text-gray-600 text-center"><?= $row[2] ?></td>
                <td class="px-2 py-3 text-sm text-gray-600 text-center"><?= $row[3] ?></td>
                <td class="px-2 py-3 text-sm text-gray-600 text-center"><?= $row[4] ?></td>
                <td class="px-4 py-3 text-sm font-medium text-gray-800 text-center"><?= $row[5] ?></td>
                <td class="px-4 py-3 text-sm text-gold-600 font-semibold text-center" style="color:#b8922a;"><?= $row[6] ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- 2017-2018 -->
      <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
          <h3 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:600;">Result 2017-2018</h3>
          <a href="<?= base_url('assets/feedback/result1718.pdf') ?>" target="_blank" class="text-sm text-blue-600 hover:underline">Download PDF</a>
        </div>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-gray-50 border-bottom border-gray-200">
                <th class="px-4 py-3 text-sm font-semibold text-gray-700">Course</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Appeared</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Passed</th>
                <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Pass %</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <?php
              $res1718 = [
                ['MSc Electronics', 10, 9, '90%'],
                ['BCom Model I - Cooperation', 43, 36, '83.72%'],
                ['BCom Model II – Computer Applications', 32, 25, '78.13%'],
                ['BSc Electronics', 29, 16, '55.17%'],
                ['BBA', 61, 39, '63.93%'],
                ['BCA', 40, 31, '77.50%']
              ];
              foreach($res1718 as $row): ?>
              <tr>
                <td class="px-4 py-3 text-sm text-gray-600"><?= $row[0] ?></td>
                <td class="px-4 py-3 text-sm text-gray-600 text-center"><?= $row[1] ?></td>
                <td class="px-4 py-3 text-sm text-gray-600 text-center"><?= $row[2] ?></td>
                <td class="px-4 py-3 text-sm font-medium text-gray-800 text-center"><?= $row[3] ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
