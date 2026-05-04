<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Additional Downloads</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto">
    <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50 border-b">
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase w-20">Sl No.</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Document Title</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase w-24 text-center">View</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php if(!empty($down_list)): $i=1; foreach($down_list as $row): ?>
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4 text-sm text-gray-600"><?= $i++ ?></td>
            <td class="px-6 py-4 text-sm font-semibold text-gray-800"><?= $row['_title'] ?></td>
            <td class="px-6 py-4 text-center">
              <a href="<?= base_url($row['_pdfloc']) ?>" target="_blank" style="color:#0d2448;text-decoration:none;" class="hover:text-gold-600">
                👁️
              </a>
            </td>
          </tr>
          <?php endforeach; else: ?>
          <tr>
            <td class="px-6 py-4 text-sm text-gray-600">1</td>
            <td class="px-6 py-4 text-sm font-semibold text-gray-800">Sample Document</td>
            <td class="px-6 py-4 text-center">
              <a href="#" style="color:#0d2448;text-decoration:none;">👁️</a>
            </td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
