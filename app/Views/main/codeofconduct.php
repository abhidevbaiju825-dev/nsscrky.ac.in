<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Code of Conduct</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-4xl mx-auto">
    <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
      <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Rules & Regulations</div>
      <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:24px;">General Discipline & Behavior</h2>
      
      <div class="space-y-6">
        <?php 
        $rules = [
          "With regard to all matters connected with the conduct in and out, the college students are expected to behave themselves in accordance with the best standards of manners and behaviour.",
          "Students shall wear the prescribed uniform on all working days except Wednesdays. Those who violate the dress code will be fined Rs. 50/- per day.",
          "Political activities are completely banned in the college campus. Students indulging and involving in any kind of political activity in college campus are liable to be dismissed from the college.",
          "Students shall not organise or attend meetings other than official ones in the campus.",
          "Students resorting to strikes shall not enter verandahs or class rooms or campus.",
          "Students are required to make as little noise as possible when they move from one class to another and during interval time.",
          "While a class is in progress no student shall enter or leave the class without the permission of the teacher.",
          "Students shall handle all college property with care. They are not allowed to disfigure the walls, desks or benches.",
          "No notice or appeal of any kind shall be circulated among the students without the written consent of the principal.",
          "Smoking, alcohol consumption, usage of illicit drugs etc. are strictly prohibited within the college campus.",
          "Irregular attendance, insubordination to teachers, and misconduct are sufficient reasons for suspension or expulsion.",
          "Ragging is strictly banned in the college campus and is a punishable offense as per UGC and Govt. directives.",
          "Usage of mobile phones is not allowed in the campus as per Govt. orders.",
          "Vehicles must be parked only in designated areas; entry beyond that point is strictly prohibited."
        ];
        foreach($rules as $rule): ?>
        <div style="display:flex;gap:16px;padding:16px;background:#f9fafb;border-radius:10px;border-left:4px solid #0d2448;">
          <div style="color:#b8922a;font-weight:bold;font-size:18px;">•</div>
          <div style="font-size:14px;color:#444;line-height:1.6;"><?= $rule ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      <div style="margin-top:32px;padding:24px;background:#fff5f5;border-radius:12px;border:1px solid #feb2b2;">
        <h4 style="color:#c53030;font-weight:700;margin-bottom:8px;font-size:16px;">Zero Tolerance Policy</h4>
        <p style="font-size:13px;color:#742a2a;">Any violation of the above rules, especially regarding ragging, substance abuse, or political activities, will result in immediate disciplinary action including dismissal.</p>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
