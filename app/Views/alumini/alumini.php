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
        </style>
    </head>

    <body class="animsition restyle-index">
        <header>
            
        </header>



<div class="container" style="margin-top:30px">
<div class="col-md-12 col-md-offset-1">
    <div class="panel panel-default">
  
  
  <div class="panel-body" style="margin-top: 27px;">
   <form enctype="multipart/form-data" method="post" action="<?php echo site_url('TeacherPortal/insert_teacher_registration');?>" style="padding-bottom: 106px;">
    <?= csrf_field() ?>
        <div class="border-radius" style="border-radius: 13px;border: 2px solid #0c80f4;padding: 35px;">
            <div class="panel-heading col-md-12 " style="padding: 13px;text-align:center;">
                <h3 class="panel-title"><strong>Alumini Registration </strong></h3>
            </div><br>
<div class="form-group" style="text-align:center;">
        <label>Upload Photo</label>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <input name="teacherimg" id="teacherimg" type="file" class="" style="display:none;" >
        <img class="rounded" id="brsbtn" src="<?php echo base_url('uploads/static/avatar.png');?>" style="width: 124px;height: 112px;border-radius: 13px;">
    </div>
    </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>First Name</label>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth:" required>
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
                        <label>Department</label> 
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <select class="form-control" name="dept" id="dept" required>
                            <option value="">Select Your department</option>
                            <?php if(!empty($department)){ foreach ($department as $key => $dept) { ?>
                                <option value="<?php echo $dept['_dep_id']; ?>"><?php echo $dept['_department_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label>Mobile</label>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control " placeholder="Mobile Number" required>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                       <label>Permanant Address</label>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        <textarea rows="4" name="per_address" id="per_address" class="form-control " required placeholder="Permanant Address" ></textarea>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                       <label>Comunication Address</label>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        <textarea rows="4" name="cur_address" id="cur_address" class="form-control " required placeholder="Communication Address"></textarea>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                       <label>About Yourself</label>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        <textarea rows="4" name="about_ur_self" id="about_ur_self" required class="form-control " placeholder="About Your Self"></textarea>
                    </div>
                    </div>
                </div>
                
                
            </div>   
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="font-size: 30px;margin-top: 10px;font-family: Times New Roman;"><b>Login Credentials:</b></div>
            </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                       <label>Email</label>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
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
