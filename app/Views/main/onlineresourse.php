<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Online Resources</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <!-- Search Filters -->
  <div style="background:#f9fafb;border-radius:16px;padding:24px;border:1px solid #eee;margin-bottom:32px;box-shadow:inset 0 2px 10px rgba(0,0,0,0.02);">
    <form action="<?= base_url('Home/onlineresourses'); ?>" method="POST" style="display:grid;gap:16px;" class="grid-cols-1 md:grid-cols-3 items-end">
      <?= csrf_field() ?>
      <div>
        <label style="display:block;font-size:12px;font-weight:700;color:#0d2448;margin-bottom:8px;text-transform:uppercase;">Course</label>
        <select id="course" name="course" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;background:#fff;">
          <option value="">Select Course</option>
          <?php foreach($course as $val): ?>
          <option value="<?= $val['_id']; ?>"><?= $val['_course']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label style="display:block;font-size:12px;font-weight:700;color:#0d2448;margin-bottom:8px;text-transform:uppercase;">Subject</label>
        <select id="subject" name="subject" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;background:#fff;">
          <option value="">Select Subject</option>
        </select>
      </div>
      <div>
        <button type="submit" style="width:100%;background:#0d2448;color:#fff;padding:10px 24px;border-radius:8px;font-weight:600;font-size:14px;transition:all 0.2s;border:none;cursor:pointer;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">
          Search Resources
        </button>
      </div>
    </form>
  </div>

  <!-- Resources Table -->
  <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50 border-b">
            <?php if($flag=='yes'): ?>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Posted Date</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Title</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Subject</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Posted By</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Resources</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php if(!empty($online)): $i=1; foreach($online as $value): ?>
            <?php if($flag=='no'): ?>
            <tr style="background:#f1f5f9;">
              <td colspan="4" class="px-6 py-3 text-sm font-bold text-gray-700 text-center uppercase tracking-wider">
                <?= $value['subject']; ?>
              </td>
            </tr>
            <tr class="bg-gray-50 border-b text-xs font-bold text-gray-400 uppercase">
              <td class="px-6 py-2">Posted Date</td>
              <td class="px-6 py-2">Title</td>
              <td class="px-6 py-2">Posted By</td>
              <td class="px-6 py-2">Resources</td>
            </tr>
            <?php endif; ?>

            <?php foreach($value['data'] as $val): ?>
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-6 py-4 text-sm text-gray-600"><?= date('d M Y',strtotime($val['_posted_date'])); ?></td>
              <td class="px-6 py-4 text-sm font-semibold text-gray-800"><?= $val['_title']; ?></td>
              <?php if($flag=='yes'): ?>
              <td class="px-6 py-4 text-sm text-gray-600"><?= $val['_subject']; ?></td>
              <?php endif; ?>
              <td class="px-6 py-4 text-sm text-gray-600"><?= $val['_name']; ?></td>
              <td class="px-6 py-4 text-sm">
                <div class="flex gap-3">
                  <?php if($val['_pdforlink']!=''): ?>
                  <a href="<?= base_url($val['_pdforlink']); ?>" target="_blank" style="color:#0d2448;text-decoration:none;display:flex;align-items:center;gap:4px;font-weight:600;" class="hover:text-gold-600 transition-colors">
                    <span style="font-size:16px;">📄</span> Doc
                  </a>
                  <?php endif; ?>
                  
                  <?php if($val['_linkordoc']!=''): ?>
                  <a href="<?= $val['_linkordoc']; ?>" target="_blank" style="color:#b8922a;text-decoration:none;display:flex;align-items:center;gap:4px;font-weight:600;" class="hover:text-navy-800 transition-colors">
                    <span style="font-size:16px;">🔗</span> Link
                  </a>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php $i++; endforeach; else: ?>
            <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">No resources available for this selection.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  function loadSubjects(courseId) {
    if(!courseId) {
      $('#subject').html('<option value="">Select Subject</option>');
      return;
    }
    $.ajax({
      url:'<?= base_url('TeacherPortal1/getsubject_Bycourse'); ?>',
      type:"POST",
      data:{course:courseId},
      success:function(data){
        var obj = JSON.parse(data);
        var string = '<option value="">Select Subject</option>';
        if(obj.message=="success"){
          for(var i=0; i<obj.data.length; i++){
            string += '<option value="'+obj.data[i]._id+'">'+obj.data[i]._subject+'</option>';
          }
        }
        $('#subject').html(string);
      }
    });
  }

  $('#course').change(function(){
    loadSubjects($(this).val());
  });

  // Initial load if course is selected
  var initialCourse = $('#course').val();
  if(initialCourse) loadSubjects(initialCourse);
});
</script>

<?= $this->endSection() ?>
