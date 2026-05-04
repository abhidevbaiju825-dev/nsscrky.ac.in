<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Academics</div>
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Syllabus</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">

  <!-- Core Outcomes (PO / PSO / CO) -->
  <div style="margin-bottom:48px;">
    <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:16px;">Core Outcomes</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <a href="<?= base_url('assets/syllabus/PO_PSO_CO.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:24px;border:1px solid #eee;display:flex;align-items:center;gap:16px;text-decoration:none;box-shadow:0 4px 15px rgba(0,0,0,0.03);transition:all 0.2s;" class="hover:border-gold-500 hover:-translate-y-1" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-3px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:48px;height:48px;object-fit:cover;border-radius:8px;" alt="Book">
        <div>
          <div style="font-weight:700;color:#0d2448;font-size:14px;line-height:1.3;">Program Outcomes (PO, PSO, CO)</div>
          <div style="font-size:12px;color:#b8922a;font-weight:600;margin-top:4px;">Download PDF</div>
        </div>
      </a>
    </div>
  </div>

  <!-- Dynamic UG Programmes -->
  <?php if(!empty($ugcourse_lists)): ?>
  <div style="margin-bottom:48px;">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Undergraduate</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">UG Programmes</h2>
    
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach($ugcourse_lists as $row): ?>
        <?php if(!empty($row['syllabus'])): ?>
        <a href="<?= base_url($row['syllabus']) ?>" target="_blank" style="background:#fef9e7;border-radius:12px;padding:24px;border:1px solid #faebcc;display:flex;flex-direction:column;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='#fff';this.style.borderColor='#b8922a';this.style.boxShadow='0 10px 25px rgba(184,146,42,0.1)'" onmouseout="this.style.background='#fef9e7';this.style.borderColor='#faebcc';this.style.boxShadow='none'">
          <div style="margin-bottom:16px;">
            <span style="background:#0d2448;color:#fff;font-size:11px;font-weight:600;padding:4px 10px;border-radius:4px;letter-spacing:0.05em;">UG Course</span>
          </div>
          <h3 style="font-family:'Cinzel',serif;font-size:16px;color:#0d2448;font-weight:700;margin-bottom:auto;line-height:1.4;"><?= esc($row['title']) ?></h3>
          <div style="margin-top:20px;font-size:13px;font-weight:700;color:#b8922a;display:flex;align-items:center;gap:6px;">
            Download Syllabus <span>→</span>
          </div>
        </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- Dynamic PG Programmes -->
  <?php if(!empty($pgcourse_lists)): ?>
  <div style="margin-bottom:48px;">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Postgraduate</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:20px;">PG Programmes</h2>
    
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach($pgcourse_lists as $row): ?>
        <?php if(!empty($row['syllabus'])): ?>
        <a href="<?= base_url($row['syllabus']) ?>" target="_blank" style="background:#f8fafc;border-radius:12px;padding:24px;border:1px solid #e2e8f0;display:flex;flex-direction:column;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='#fff';this.style.borderColor='#b8922a';this.style.boxShadow='0 10px 25px rgba(184,146,42,0.1)'" onmouseout="this.style.background='#f8fafc';this.style.borderColor='#e2e8f0';this.style.boxShadow='none'">
          <div style="margin-bottom:16px;">
            <span style="background:#0d2448;color:#fff;font-size:11px;font-weight:600;padding:4px 10px;border-radius:4px;letter-spacing:0.05em;">PG Course</span>
          </div>
          <h3 style="font-family:'Cinzel',serif;font-size:16px;color:#0d2448;font-weight:700;margin-bottom:auto;line-height:1.4;"><?= esc($row['title']) ?></h3>
          <div style="margin-top:20px;font-size:13px;font-weight:700;color:#b8922a;display:flex;align-items:center;gap:6px;">
            Download Syllabus <span>→</span>
          </div>
        </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- Additional & Bridge Courses -->
  <div>
    <h2 style="font-family:'Cinzel',serif;font-size:20px;color:#0d2448;font-weight:700;margin-bottom:20px;">Additional & Bridge Courses</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <!-- B.COM Model I & II -->
      <a href="<?= base_url('assets/nsyllabus/B_Com_Model_1.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px;" alt="Book">
        <div><div style="font-weight:700;color:#0d2448;font-size:13px;">B.COM (MODEL I)</div></div>
      </a>
      <a href="<?= base_url('assets/nsyllabus/B_Com_Model_2.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px;" alt="Book">
        <div><div style="font-weight:700;color:#0d2448;font-size:13px;">B.COM (MODEL II)</div></div>
      </a>
      
      <!-- Bridge Courses -->
      <a href="<?= base_url('assets/nsyllabus/BBA.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px;" alt="Book">
        <div><div style="font-weight:700;color:#0d2448;font-size:13px;">BBA Bridge Course</div></div>
      </a>
      <a href="<?= base_url('assets/nsyllabus/BCA.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px;" alt="Book">
        <div><div style="font-weight:700;color:#0d2448;font-size:13px;">BCA Bridge Course</div></div>
      </a>
      <a href="<?= base_url('assets/nsyllabus/BCom.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px;" alt="Book">
        <div><div style="font-weight:700;color:#0d2448;font-size:13px;">B.COM Bridge Course</div></div>
      </a>
      <a href="<?= base_url('assets/nsyllabus/BSc.pdf') ?>" target="_blank" style="background:#fff;border-radius:12px;padding:20px;border:1px solid #eee;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#eee';this.style.transform='none'">
        <img src="<?= base_url('assets/img/book.jpg') ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px;" alt="Book">
        <div><div style="font-weight:700;color:#0d2448;font-size:13px;">B.Sc Bridge Course</div></div>
      </a>
    </div>
  </div>

</section>

<?= $this->endSection() ?>
