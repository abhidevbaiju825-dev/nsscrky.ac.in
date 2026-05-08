<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Alumni Registration</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="max-w-3xl mx-auto">

    <?php if(isset($_SESSION['s_msg'])): ?>
    <div style="background:#e8f5e9;border-left:4px solid #2e7d32;padding:16px;border-radius:8px;margin-bottom:20px;">
      <p style="color:#1b5e20;margin:0;font-size:14px;">
        <?php if(isset($_SESSION['s_msg']['message'])){ echo $_SESSION['s_msg']['message']; } ?>
        <?php if(isset($_SESSION['s_msg']['submessage'])){ echo ' ' . $_SESSION['s_msg']['submessage']; } ?>
      </p>
    </div>
    <?php unset($_SESSION['s_msg']); endif; ?>

    <div style="background:#fff;border-radius:16px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;overflow:hidden;">
      <div style="background:#0d2448;padding:20px 24px;">
        <h3 style="color:#fff;font-family:'Cinzel',serif;font-size:18px;font-weight:600;">Alumni Registration Form</h3>
      </div>
      <div style="padding:24px;" class="md:!p-10">
        <form action="<?php echo site_url('alumini_portal/insert_aluminimembers'); ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4" style="margin-bottom:16px;">
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Name *</label>
              <input type="text" name="name" id="name" placeholder="Full Name" required style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Date of Birth</label>
              <input type="date" name="dob" id="dob" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Mobile *</label>
              <input type="text" name="number" id="number" placeholder="Contact Number" required style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
          </div>

          <div style="margin-bottom:16px;">
            <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Address</label>
            <textarea rows="2" name="address" id="address" placeholder="Your Address" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'"></textarea>
          </div>

          <div style="margin-bottom:16px;">
            <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Job Specification</label>
            <input type="text" name="job" id="job" placeholder="Current Job / Profession" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4" style="margin-bottom:16px;">
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Email *</label>
              <input type="email" name="email" id="email" placeholder="Email Address" required style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Location</label>
              <input type="text" name="location" id="location" placeholder="City / Town" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Blood Group</label>
              <select name="bloodgroup" style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;background:#fff;">
                <option value="">-- Select --</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
            </div>
          </div>

          <div style="height:1px;background:#eee;margin:24px 0;"></div>
          <h4 style="font-size:14px;font-weight:700;color:#0d2448;margin-bottom:16px;">Login Credentials</h4>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4" style="margin-bottom:24px;">
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Username (Email) *</label>
              <input type="text" name="username" id="username" placeholder="Email as Username" required style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Password *</label>
              <input type="password" name="password" id="password" placeholder="Password" required style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
            </div>
            <div>
              <label style="display:block;font-size:13px;font-weight:600;color:#0d2448;margin-bottom:6px;">Confirm Password *</label>
              <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required style="width:100%;padding:10px 14px;border-radius:8px;border:1px solid #ddd;outline:none;font-size:14px;transition:border 0.2s;" onfocus="this.style.borderColor='#0d2448'" onblur="this.style.borderColor='#ddd'">
              <span id="message" style="font-size:12px;margin-top:4px;display:block;"></span>
            </div>
          </div>

          <button type="submit" style="background:#0d2448;color:#fff;padding:14px 48px;border-radius:10px;font-weight:600;font-size:15px;transition:all 0.2s;cursor:pointer;border:none;" onmouseover="this.style.background='#b8922a';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#0d2448';this.style.transform='none'">Register</button>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
$('#password_confirmation').on('keyup', function() {
    if ($('#password').val() == $('#password_confirmation').val()) {
        $('#message').html('✓ Passwords match').css('color', 'green');
    } else {
        $('#message').html('✗ Not matching').css('color', 'red');
    }
});
</script>

<?= $this->endSection() ?>
