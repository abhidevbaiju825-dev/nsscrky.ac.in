<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alumini Registration</title>
    <meta charset="UTF-8">
    <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
    <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
    <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
    <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        .panel-default>.panel-heading {
                color: #fff;
                background-color: #233785;
                border-color: #773f3f;
            }
        </style>
</head>

<body class="animsition restyle-index">
    <header>
        
    </header>
    <div class="container" style="margin-top:30px">
        <?php if(isset($_SESSION['s_msg'])){ ?>
        <div class="alert alert-success">
            <i class="close icon"></i>
            <div class="header">
                <?php if(isset($_SESSION['s_msg']['message'])){ echo $_SESSION['s_msg']['message']; } ?>
            </div>
            <?php if(isset($_SESSION['s_msg']['submessage'])){ echo $_SESSION['s_msg']['submessage']; } ?>
        </div>
        <?php unset($_SESSION['s_msg']); } ?>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Alumini Registration </strong></h3>
                    <!--      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>-->
                </div>
                <div class="panel-body" style="margin-top: 27px;">
                    <form action="<?php echo site_url('alumini_portal/insert_aluminimembers'); ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder=" Name" tabindex="1" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth :&nbsp;&nbsp;&nbsp;" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="number" required id="number" class="form-control " placeholder="Contact Number" tabindex="2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea rows="2" name="address" id="address" class="form-control " placeholder="Address" tabindex="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Job Specification</label>
                            <input type="text" name="job" id="job" class="form-control " placeholder="Job Specification" tabindex="2">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" id="email" class="form-control" placeholder=" Email" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" id="location" class="form-control" placeholder="Location" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="form-control" name="bloodgroup">
                                        <option value=""> -- Select Blood Group --</option>
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
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>User Name (Email)</label>
                                    <input type="text" name="username" required id="username" class="form-control" placeholder="Emaiil" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" required name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
                                    <span style="margin-left: 343px;" id='message'></span>

                                </div>
                            </div>
                        </div>
                        <button type="submit" style=" color: #fff; background-color: #233785;" class="btn btn-success">Sign in</button>
                        <hr style="margin-top:10px;margin-bottom:10px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg4 p-t-25">
        
    </footer>
    <!-- Back to top -->
    <div class="btn-back-to-top hov-bg-main" id="myBtn"> <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span> </div>
    
</body>
<script>
    $('#password_confirmation').on('keyup', function() {
        if ($('#password').val() == $('#password_confirmation').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });

</script>
<script src='../../img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
<!-- Mirrored from templates.aucreative.co/drive/course-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Dec 2018 14:56:22 GMT -->

</html>


<?= $this->endSection() ?>
