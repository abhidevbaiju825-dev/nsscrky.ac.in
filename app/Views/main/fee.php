<?= $this->extend('layouts/home') ?>
<?= $this->section('styles') ?>
<style>
@media (max-width: 767px) {
  .fee-table td, .fee-table th { padding: 10px 8px !important; font-size: 12px !important; }
  .fee-table td[colspan] { font-size: 13px !important; }
}
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Academics</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Fee Structure</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto space-y-10">
    <div style="background:#fff;border-radius:20px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;" class="p-5 md:p-10">
      <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:24px;">Academic Fees Breakdown</h2>
      
      <div class="overflow-x-auto" style="-webkit-overflow-scrolling:touch;">
        <table class="w-full text-left fee-table" style="border-collapse: separate; border-spacing: 0; min-width:480px;">
          <thead>
            <tr style="background:#f8fafc;">
              <th style="padding:16px;font-weight:700;color:#0d2448;border-bottom:2px solid #e2e8f0;border-top-left-radius:12px;">Class</th>
              <th style="padding:16px;font-weight:700;color:#0d2448;border-bottom:2px solid #e2e8f0;text-align:right;">Tuition Fee (₹)</th>
              <th style="padding:16px;font-weight:700;color:#0d2448;border-bottom:2px solid #e2e8f0;text-align:right;">Special Fee (₹)</th>
              <th style="padding:16px;font-weight:700;color:#0d2448;border-bottom:2px solid #e2e8f0;text-align:right;">Exam Fee (₹)</th>
              <th style="padding:16px;font-weight:800;color:#b8922a;border-bottom:2px solid #e2e8f0;border-top-right-radius:12px;text-align:right;">Total (₹)</th>
            </tr>
          </thead>
          <tbody style="color:#444;font-size:15px;">
            
            <!-- I Year -->
            <tr>
              <td colspan="5" style="padding:16px;font-family:'Cinzel',serif;font-weight:700;color:#0d2448;background:#fef9e7;border-bottom:1px solid #e2e8f0;">I Year</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">BBA / B.Com</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,050</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,840</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">2,990</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">BCA / BSc</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">3,150</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">2,105</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">5,355</td>
            </tr>

            <!-- II Year -->
            <tr>
              <td colspan="5" style="padding:16px;font-family:'Cinzel',serif;font-weight:700;color:#0d2448;background:#fef9e7;border-bottom:1px solid #e2e8f0;">II Year</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">BBA / B.Com</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,050</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,840</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">3,155</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">BCA / BSc</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">3,150</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">2,105</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">5,520</td>
            </tr>

            <!-- III Year -->
            <tr>
              <td colspan="5" style="padding:16px;font-family:'Cinzel',serif;font-weight:700;color:#0d2448;background:#fef9e7;border-bottom:1px solid #e2e8f0;">III Year</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">BBA / B.Com</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,050</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,840</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">3,465</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">BCA / BSc</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">3,150</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">2,105</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">5,830</td>
            </tr>

            <!-- PG -->
            <tr>
              <td colspan="5" style="padding:16px;font-family:'Cinzel',serif;font-weight:700;color:#0d2448;background:#fef9e7;border-bottom:1px solid #e2e8f0;">Post Graduate (PG)</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">MSc I</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,890</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">3,375</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,500</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">6,765</td>
            </tr>
            <tr style="transition:background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;font-weight:600;color:#0d2448;">MSc II</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">1,890</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">2,160</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;">2,000</td>
              <td style="padding:16px;border-bottom:1px solid #e2e8f0;text-align:right;font-weight:700;color:#b8922a;">6,050</td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</section>

<?= $this->endSection() ?>
