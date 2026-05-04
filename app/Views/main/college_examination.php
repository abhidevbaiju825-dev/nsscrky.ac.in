<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Examination System</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto space-y-12">
    
    <!-- Assessment Overview -->
    <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Evaluation Scheme</h2>
      <p style="line-height:1.8;color:#444;margin-bottom:24px;">The evaluation of each course shall contain two parts:</p>
      
      <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div style="padding:24px;background:#f9fafb;border-radius:12px;border-left:4px solid #0d2448;">
          <h4 style="font-weight:700;color:#0d2448;margin-bottom:8px;">Internal Assessment (ISA)</h4>
          <p style="font-size:14px;color:#666;">In-Semester Evaluation worth 20 marks.</p>
        </div>
        <div style="padding:24px;background:#f9fafb;border-radius:12px;border-left:4px solid #b8922a;">
          <h4 style="font-weight:700;color:#0d2448;margin-bottom:8px;">External Assessment (ESA)</h4>
          <p style="font-size:14px;color:#666;">End-Semester University Exam worth 80 marks.</p>
        </div>
      </div>
      
      <p style="line-height:1.8;color:#444;">The internal to external assessment ratio is 1:4. For all courses, grades are given on a 07-point scale based on the total percentage of marks (ISA+ESA).</p>
    </div>

    <!-- Grading Scale Table -->
    <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <div style="padding:20px 32px;background:#0d2448;">
        <h3 style="font-family:'Cinzel',serif;font-size:18px;color:#fff;font-weight:600;">7-Point Grading Scale</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-gray-50 border-b">
              <th class="px-8 py-4 text-sm font-semibold text-gray-700">Percentage of Marks</th>
              <th class="px-8 py-4 text-sm font-semibold text-gray-700">Grade</th>
              <th class="px-8 py-4 text-sm font-semibold text-gray-700">Grade Point</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr><td class="px-8 py-4 text-sm">90 and above</td><td class="px-8 py-4 text-sm font-medium">A+ - Outstanding</td><td class="px-8 py-4 text-sm">10</td></tr>
            <tr><td class="px-8 py-4 text-sm">80 - 89</td><td class="px-8 py-4 text-sm font-medium">A - Excellent</td><td class="px-8 py-4 text-sm">9</td></tr>
            <tr><td class="px-8 py-4 text-sm">70 - 79</td><td class="px-8 py-4 text-sm font-medium">B - Very Good</td><td class="px-8 py-4 text-sm">8</td></tr>
            <tr><td class="px-8 py-4 text-sm">60 - 69</td><td class="px-8 py-4 text-sm font-medium">C - Good</td><td class="px-8 py-4 text-sm">7</td></tr>
            <tr><td class="px-8 py-4 text-sm">50 - 59</td><td class="px-8 py-4 text-sm font-medium">D - Satisfactory</td><td class="px-8 py-4 text-sm">6</td></tr>
            <tr><td class="px-8 py-4 text-sm">40 - 49</td><td class="px-8 py-4 text-sm font-medium">E - Adequate</td><td class="px-8 py-4 text-sm">5</td></tr>
            <tr><td class="px-8 py-4 text-sm text-red-600 font-medium">Below 40</td><td class="px-8 py-4 text-sm text-red-600 font-medium">F - Failure</td><td class="px-8 py-4 text-sm text-red-600">4</td></tr>
          </tbody>
        </table>
      </div>
      <div style="padding:16px 32px;background:#f9fafb;font-size:12px;color:#888;">
        <strong>Note:</strong> Decimals are to be rounded to the next whole number.
      </div>
    </div>

    <!-- Credit Point Section -->
    <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">CPA Calculation</h2>
      <div style="padding:24px;background:#fef3f3;border-radius:12px;border-left:4px solid #e53e3e;margin-bottom:24px;">
        <code style="font-size:16px;font-weight:bold;color:#c53030;">CP = C x GP</code>
        <p style="font-size:13px;color:#742a2a;margin-top:4px;">Where C = Credit; GP = Grade point</p>
        <div class="my-4 border-t border-red-100"></div>
        <code style="font-size:16px;font-weight:bold;color:#c53030;">CPA = TCP / TC</code>
        <p style="font-size:13px;color:#742a2a;margin-top:4px;">Where TCP = Total Credit Points; TC = Total Credits</p>
      </div>
      
      <p style="line-height:1.8;color:#444;margin-bottom:20px;">Grades for the different semesters and overall programme are given based on the corresponding CPA:</p>
      
      <div class="overflow-x-auto rounded-lg border">
        <table class="w-full text-left border-collapse">
          <thead><tr class="bg-gray-50"><th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase">CPA Range</th><th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase">Grade</th></tr></thead>
          <tbody class="divide-y divide-gray-100">
            <tr><td class="px-6 py-3 text-sm">8 < CPA <= 9</td><td class="px-6 py-3 text-sm font-medium">A - Excellent</td></tr>
            <tr><td class="px-6 py-3 text-sm">7 < CPA <= 8</td><td class="px-6 py-3 text-sm font-medium">B - Very Good</td></tr>
            <tr><td class="px-6 py-3 text-sm">6 < CPA <= 7</td><td class="px-6 py-3 text-sm font-medium">C - Good</td></tr>
            <tr><td class="px-6 py-3 text-sm">5 < CPA <= 6</td><td class="px-6 py-3 text-sm font-medium">D - Satisfactory</td></tr>
            <tr><td class="px-6 py-3 text-sm">4 < CPA <= 5</td><td class="px-6 py-3 text-sm font-medium">E - Adequate</td></tr>
            <tr><td class="px-6 py-3 text-sm text-red-600">CPA <= 4</td><td class="px-6 py-3 text-sm text-red-600 font-medium">F - Failure</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Internal Evaluation Components -->
    <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">Internal Assessment Breakdown</h2>
      <p style="color:#666;margin-bottom:20px;font-size:14px;">Applicable for all courses without practical:</p>
      
      <div class="grid md:grid-cols-2 gap-8 items-start">
        <div class="space-y-4">
          <div style="display:flex;justify-content:space-between;padding:12px 16px;background:#f9fafb;border-radius:8px;">
            <span style="font-weight:500;color:#0d2448;">Attendance</span>
            <span style="color:#b8922a;font-weight:bold;">5 Marks</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding:12px 16px;background:#f9fafb;border-radius:8px;">
            <span style="font-weight:500;color:#0d2448;">Assignment / Seminar / Viva</span>
            <span style="color:#b8922a;font-weight:bold;">5 Marks</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding:12px 16px;background:#f9fafb;border-radius:8px;">
            <span style="font-weight:500;color:#0d2448;">Test Papers (1 or 2)</span>
            <span style="color:#b8922a;font-weight:bold;">10 Marks</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding:12px 16px;background:#0d2448;border-radius:8px;color:#fff;">
            <span style="font-weight:bold;">Total Internal Marks</span>
            <span style="font-weight:bold;">20 Marks</span>
          </div>
        </div>
        
        <div style="padding:24px;background:#f0f4f8;border-radius:16px;border:1px dashed #2d3748;">
          <h4 style="font-weight:700;color:#1a202c;margin-bottom:12px;">Exam Pass Criteria</h4>
          <ul style="font-size:13px;line-height:1.6;color:#4a5568;" class="space-y-2">
            <li>• 30% Minimum in Internal Assessment</li>
            <li>• 30% Minimum in External Examination</li>
            <li>• 40% Aggregate Minimum for overall Pass</li>
            <li>• "E" Grade is required in all individual courses for program completion</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
