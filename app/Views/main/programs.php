<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Programmes</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">

  <!-- UG Courses -->
  <div style="margin-bottom:48px;">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Undergraduate</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:8px;">UG Courses</h2>
    <div style="width:50px;height:3px;background:#b8922a;margin-bottom:24px;border-radius:2px;"></div>

    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
      <table style="width:100%;border-collapse:collapse;">
        <thead>
          <tr style="background:#0d2448;">
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;width:6%;">No.</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;width:40%;">Course</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;">Duration</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;">Seats</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;">Syllabus</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($ugcourse_lists as $row): ?>
          <tr style="border-bottom:1px solid #f0f0f0;transition:background 0.15s;" onmouseover="this.style.background='#fafbfc'" onmouseout="this.style.background=''">
            <td style="padding:14px 20px;text-align:center;color:#888;font-size:14px;"><?= $i++ ?></td>
            <td style="padding:14px 20px;font-weight:600;color:#0d2448;font-size:14px;"><?= esc($row['title']) ?></td>
            <td style="padding:14px 20px;text-align:center;color:#555;font-size:14px;"><?= esc($row['duration']) ?></td>
            <td style="padding:14px 20px;text-align:center;color:#555;font-size:14px;"><?= $row['max_seats'] ?></td>
            <td style="padding:14px 20px;text-align:center;">
              <?php if(!empty($row['syllabus'])): ?>
                <a href="<?= base_url($row['syllabus']) ?>" target="_blank" style="color:#b8922a;text-decoration:none;font-size:13px;font-weight:500;">Download</a>
              <?php endif; ?>
            </td>
            <td style="padding:14px 20px;text-align:center;">
              <button onclick="showDetails(<?= $row['id'] ?>)" style="padding:6px 16px;border-radius:6px;background:#0d2448;color:#fff;border:none;font-size:12px;cursor:pointer;transition:background 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">View</button>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php if(empty($ugcourse_lists)): ?>
          <tr><td colspan="6" style="padding:30px;text-align:center;color:#aaa;">No UG courses listed.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- PG Courses -->
  <div style="margin-bottom:48px;">
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Postgraduate</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:8px;">PG Courses</h2>
    <div style="width:50px;height:3px;background:#b8922a;margin-bottom:24px;border-radius:2px;"></div>

    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
      <table style="width:100%;border-collapse:collapse;">
        <thead>
          <tr style="background:#0d2448;">
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;width:6%;">No.</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;width:40%;">Course</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;">Duration</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;">Seats</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;">Syllabus</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($pgcourse_lists as $row): ?>
          <tr style="border-bottom:1px solid #f0f0f0;transition:background 0.15s;" onmouseover="this.style.background='#fafbfc'" onmouseout="this.style.background=''">
            <td style="padding:14px 20px;text-align:center;color:#888;font-size:14px;"><?= $i++ ?></td>
            <td style="padding:14px 20px;font-weight:600;color:#0d2448;font-size:14px;"><?= esc($row['title']) ?></td>
            <td style="padding:14px 20px;text-align:center;color:#555;font-size:14px;"><?= esc($row['duration']) ?></td>
            <td style="padding:14px 20px;text-align:center;color:#555;font-size:14px;"><?= $row['max_seats'] ?></td>
            <td style="padding:14px 20px;text-align:center;">
              <?php if(!empty($row['syllabus'])): ?>
                <a href="<?= base_url($row['syllabus']) ?>" target="_blank" style="color:#b8922a;text-decoration:none;font-size:13px;font-weight:500;">Download</a>
              <?php endif; ?>
            </td>
            <td style="padding:14px 20px;text-align:center;">
              <button onclick="showDetails(<?= $row['id'] ?>)" style="padding:6px 16px;border-radius:6px;background:#0d2448;color:#fff;border:none;font-size:12px;cursor:pointer;transition:background 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">View</button>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php if(empty($pgcourse_lists)): ?>
          <tr><td colspan="6" style="padding:30px;text-align:center;color:#aaa;">No PG courses listed.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Research -->
  <div>
    <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Doctoral</div>
    <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:8px;">Research Programmes</h2>
    <div style="width:50px;height:3px;background:#b8922a;margin-bottom:24px;border-radius:2px;"></div>
    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.05);border:1px solid #eee;">
      <table style="width:100%;border-collapse:collapse;">
        <thead>
          <tr style="background:#0d2448;">
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:center;font-weight:600;width:10%;">No.</th>
            <th style="padding:14px 20px;color:#fff;font-size:13px;text-align:left;font-weight:600;">Course</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom:1px solid #f0f0f0;"><td style="padding:14px 20px;text-align:center;color:#888;">1</td><td style="padding:14px 20px;color:#0d2448;font-weight:500;">Electronics</td></tr>
          <tr><td style="padding:14px 20px;text-align:center;color:#888;">2</td><td style="padding:14px 20px;color:#0d2448;font-weight:500;">Computer Applications</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Programme Detail Modal -->
<div id="progModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;" onclick="if(event.target===this)closeModal()">
  <div style="background:#fff;border-radius:16px;max-width:800px;width:90%;max-height:85vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,0.3);padding:36px;position:relative;">
    <button onclick="closeModal()" style="position:absolute;top:16px;right:20px;background:none;border:none;font-size:24px;color:#aaa;cursor:pointer;">&times;</button>
    <h3 id="pm_title" style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:4px;"></h3>
    <div style="display:flex;gap:16px;margin:12px 0 20px;">
      <span id="pm_duration" style="background:#f4f4f4;padding:4px 14px;border-radius:6px;font-size:13px;color:#555;"></span>
      <span id="pm_seats" style="background:#f4f4f4;padding:4px 14px;border-radius:6px;font-size:13px;color:#555;"></span>
    </div>
    <div id="pm_description" style="line-height:1.8;color:#444;font-size:15px;text-align:justify;margin-bottom:16px;"></div>
    <div id="pm_eligibility" style="display:none;margin-bottom:16px;"><strong style="color:#0d2448;">Eligibility:</strong> <span style="color:#555;"></span></div>
    <div id="pm_vision" style="display:none;margin-bottom:16px;"><strong style="color:#0d2448;">Vision:</strong> <span style="color:#555;"></span></div>
    <div id="pm_mission" style="display:none;margin-bottom:16px;"><strong style="color:#0d2448;">Mission:</strong> <span style="color:#555;"></span></div>
    <div id="pm_objectives" style="display:none;margin-bottom:16px;"><strong style="color:#0d2448;">Objectives:</strong> <span style="color:#555;"></span></div>
  </div>
</div>

<script>
function showDetails(id) {
  $.ajax({
    url: '<?= base_url() ?>Home/course_details',
    type: 'post',
    data: { course_id: id },
    success: function(data) {
      var d = typeof data === 'string' ? JSON.parse(data) : data;
      var r = d.responceData;
      $('#pm_title').text(r._title);
      $('#pm_duration').text(r._duration);
      $('#pm_seats').text(r._maxseat + ' seats');
      $('#pm_description').html(r._description);
      setField('#pm_eligibility', r._eligibity);
      setField('#pm_vision', r._vission);
      setField('#pm_mission', r._mission);
      setField('#pm_objectives', r._objectives);
      document.getElementById('progModal').style.display = 'flex';
    }
  });
}
function setField(sel, val) {
  if (val && val.trim()) { $(sel).show().find('span').html(val); } else { $(sel).hide(); }
}
function closeModal() { document.getElementById('progModal').style.display = 'none'; }
</script>

<?= $this->endSection() ?>
