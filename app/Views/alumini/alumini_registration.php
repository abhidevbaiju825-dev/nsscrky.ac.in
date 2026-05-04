<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alumni Registration</title>
    <meta charset="UTF-8">
    <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
    <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
    <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
    <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        .panel-heading {
    color: #fff;
    background-color: #233785;
    border-color: #773f3f;
    font-style: oblique;
    font-family: -webkit-pictograph;
}
       
        input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
    margin-right: 0.5em;
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";
  }
  .col-sm-12{
                position: relative;
    width: 100%;
    min-height: 1px;
     padding-right: 0px; 
    padding-left: 15px;
        }
        </style>
</head>

<body class="animsition restyle-index">
    <header>
        
    </header>



    <div class="container" style="margin-top:30px">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">

                <?php if(isset($_SESSION['s_msg'])){ ?>
                <div class="alert alert-success">
                    <i class="close icon"></i>
                    <div class="header">
                        <?php if(isset($_SESSION['s_msg']['message'])){ echo $_SESSION['s_msg']['message']; } ?>
                    </div>
                    <?php if(isset($_SESSION['s_msg']['submessage'])){ echo $_SESSION['s_msg']['submessage']; } ?>
                </div>
                <?php unset($_SESSION['s_msg']); } ?>
                <div class="panel-body" style="margin-top: 27px;">
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('Alumini_portal/insert_aluminimembers');?>" style="padding-bottom: 106px;">
    <?= csrf_field() ?>
                        <div class="border-radius" style="border: 1px solid #848d9770;padding: 75px;">
                            <div class="panel-heading col-md-12 " style="padding: 13px;text-align:center;">
                                <h3 class="panel-title"><strong>Alumni Registration </strong></h3>
                            </div><br>
                            <div class="form-group" style="text-align:center;">
                                <label>Upload Photo</label>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="file" name="teacherimg" id="teacherimg" style="display:none;">
                                    <img class="rounded" id="brsbtn" src="<?php echo base_url('assets/images/avatar.png');?>" style="width: 124px;height: 112px;border-radius: 13px;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder=" Name" tabindex="1" required>
                                            <!--                        <input type="hidden" name="name" id="name" class="form-control" placeholder=" Name" tabindex="1" required>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="date" name="dob" id="dob" class="form-control" required placeholder="Date of Birth :&nbsp;&nbsp;&nbsp;" tabindex="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <select class="form-control" name="gender" id="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Passout Year</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="passout" id="passout" required class="form-control" placeholder="Passout Year" maxlength="4" tabindex="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <textarea rows="2" name="per_address" id="per_address" required class="form-control " required placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--           alumni educational details-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Educational Qualification</b></div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>From</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="date" name="from[]" id="from" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>To</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="date" name="to[]" id="to" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="course[]" id="course"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>institution</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="institution[]" id="institution"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <a class='pointer' id="add_alumniedu"><i class='fa fa-plus' style='margin-top: 37px;;color:black;'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="show_edu"></div>
                            <!--         alumni working details-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Working Experience</b></div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>From</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="date" name="wfrom[]" id="wfrom" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>To</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="date" name="wto[]" id="wto"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="company[]" id="company" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="designation[]" id="institution" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <textarea name="description[]" rows="2" id="institution" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <a class='pointer' id="add_alworking"><i class='fa fa-plus' style='margin-top: 37px;;color:black;'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="show_working"></div>


                            <!--Other achivements-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Other Achievements</b></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="text" name="othertitle[]" id="othertitle" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Decription</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <textarea name="otherdescription[]" id="otherdescription" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <a class='pointer' id="add_otherachivements"><i class='fa fa-plus' style='margin-top: 37px;;color:black;'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="show_otherachivements"></div>

                            <!--            login cardinalities-->

                            <!--           testimonials-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Testimonials</b></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <!--                       <label>Decription</label>-->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <textarea name="testimonial" id="testimonial" placeholder="Enter Testimonial" required class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--           contribution-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Contributions</b></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <!--                       <label>Decription</label>-->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <textarea name="contribution" id="contribution" placeholder="Enter Description" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

           
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Feedback</b></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <!--                       <label>Decription</label>-->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <textarea name="feedback" id="feedback" placeholder="Enter Feedback"  class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b style="color: #233785;">Login Credentials:</b></div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="email" name="username" id="username" class="form-control" placeholder="example@gmail.com" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="password" name="password" id="password" required class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="password" name="c_password" id="c_password" required class="form-control" placeholder="Enter Confirm Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" id="submit" style=" color: #fff; background-color: #233785;" class="btn btn-success pull-right">Register</button>
                                </div>
                            </div>
                        </div>
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

</html>


<?= $this->endSection() ?>
