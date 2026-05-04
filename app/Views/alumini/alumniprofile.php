<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<html>
    <head>
        <title>Alumni Profile</title>        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
        
    </head>
    <body>                          
        <?php //$this->load->view('admin/includes/sideheader'); ?>
        <div class="pusher"> 
            
            <div class="ui ">                
                <div class="ui internally celled grid">
                    <div class="row">                                               
                        <div class="sixteen wide mobile sixteen wide tablet three wide computer column">
                            <div class="ui vertical menu">
                                <a href="<?php //echo site_url('alumini_portal/alumniprofile/'.$profile_data->_id); ?>" class="teal item active">
                                    Profile
                                    <div class="ui teal left pointing label">
                                        <i class="compress icon"></i>
                                    </div>
                                </a> 
                      </div>
                           
                        </div>
                        
                        <div class="sixteen wide mobile sixteen wide tablet thirteen wide computer column">
                            <?php if(isset($_SESSION['s_msg'])){ ?>
                            <div class="ui positive message">
                                <i class="close icon"></i>
                                <div class="header">
                                    <?php echo $_SESSION['s_msg']['message']; ?>
                                </div>
                                <p>
                                    <?php echo $_SESSION['s_msg']['submessage']; ?>
                                </p>
                            </div>
                            <?php unset($_SESSION['s_msg']); } ?>
                            <?php if(isset($_SESSION['e_msg'])){ ?>
                            <div class="ui negative message">
                                <i class="close icon"></i>
                                <div class="header">
                                    <?php echo $_SESSION['e_msg']['message']; ?>
                                </div>
                                <p>
                                    <?php echo $_SESSION['e_msg']['submessage']; ?>
                                </p>
                            </div>
                            <?php unset($_SESSION['e_msg']); } ?>
                            <div class="org-container">
                                <div class="ui breadcrumb">
                                    <a class="active section">Alumni Profile</a>
                                                                        
                                </div>
                            </div>
                            <br><?php //var_dump($studData); ?>
                            <form action="<?php echo site_url('alumini_portal/update_aluminimembers'); ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
                                              
                            <div class="ui grid">
                                <div class="sixteen column">
                            <div class="ui raised segment"  style="background-color: aliceblue;">
                                         <h3 class="ui block header centered">
                                                    Personel Details
                                                </h3>
                                        <div class="ui segment" style="background-color: aliceblue;">
                                           
                                            <div class="">
                                                  <?php //var_dump($profile_data); ?>
                                             <div class="ui segmet">
                                                   <div class="ui container form">
                                             <div class="fields ui grid center aligned">
                                                  <?php if($profile_data->_profile_picture != ""){?>
                                                  <div class="field three wide column">
                                                   <img  class="rounded" id="brsbtn" src="<?php echo base_url($profile_data->_profile_picture); ?>" style="width: 124px;height: 112px;border-radius: 50%">
                                               <input type="hidden"  name="image" value="<?php if(!empty($profile_data->_profile_picture)){ echo $profile_data->_profile_picture; } ?>">
                                               <input  type="file"  name="teacherimg" id="teacherimg" style="display:none;" >
 
                                                </div>
                                                 <?php } else{?>
                                                <img  class="rounded" id="brsbtn" src="<?php echo base_url('assets/images/avatar.png'); ?>" style="width: 140px;height: 112px;border-radius: 50%">
                                     <input  type="file"  name="teacherimg" id="teacherimg" style="display:none;" >
                                        
                                                 <?php } ?>
                                                  </div>
                                                   <div class="fields">
                                                   <?php //var_dump($profile_data); ?>
                                                    <div class="four wide field">
                                                        <label>Name</label>
                                                        <input type="text" name="name" id="name" value="<?php if(isset($profile_data)){echo $profile_data->_full_name;} ?>" class="form-control" placeholder=" Name" tabindex="1" required>
                          <input type="hidden" name="alumniId" id="alumniId" value="<?php if(isset($profile_data)){echo $profile_data->_id;} ?>" required>
                                                    
                                                    </div>
                                                    <div class="four wide field">
                                                        <label>Date of Birth</label>
                                                       <input type="date" name="dob" id="dob" value="<?php if(isset($profile_data)){echo $profile_data->_dob;} ?>" class="form-control" placeholder="Date of Birth :&nbsp;&nbsp;&nbsp;"   tabindex="1">
                                                  </div>
                                                    <div class="four wide field">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender" id="gender" required>
                            <option  value="">Select Gender</option>
                            <option <?php if(isset($profile_data)){if($profile_data->_gender =="m"){echo "selected='selected'";}} ?> value="m">Male</option>
                            <option <?php if(isset($profile_data)){if($profile_data->_gender =="f"){echo "selected='selected'";}} ?> value="f">Female</option>
                        </select></div>
                                                    <div class="four wide field">
                                                        <label>Passout Year</label>
                                                        <input type="text" value="<?php if(isset($profile_data)){echo $profile_data->_passout_year;} ?>" name="passout" id="passout" class="form-control" placeholder="Passout Year"   tabindex="1">
                        
                                                    </div>
                                                </div>
                                                <div class="fields">
                                                   <div class="field five wide column">
                                                    <label>Contact No</label>
                                                     <input type="text" name="contact" value="<?php if(isset($profile_data->_contact_no)){echo $profile_data->_contact_no;} ?>">  
                                                   </div>
                                                   <div class="field four wide column">
                                                    <label>Location</label>
                                                     <input type="text" name="location" value="<?php if(isset($profile_data->_location)){echo $profile_data->_location;} ?>">  
                                                   </div>
                                                    <div class="eight wide field">
                                                        <label>Address</label>
                                                        <textarea rows="2" name="per_address" id="per_address" class="form-control " required placeholder="Address" ><?php if(isset($profile_data)){echo $profile_data->_address;} ?></textarea>
                                                           </div>
                        
                                                </div>
                                        
                                                <div class="fields">
                                                   <div class="field four wide column">
                                                    <label>Job Specification</label>
                                                     <input type="text" name="job" value="<?php if(isset($profile_data->_job_specification)){echo $profile_data->_job_specification;} ?>">  
                                                   </div>
                                                   <div class="field four wide column">
                                                    <label>Designation</label>
                                                     <input type="text" name="designation" value="<?php if(isset($profile_data->_designation)){echo $profile_data->_designation;} ?>">  
                                                   </div>
                                                   <div class="field four wide column">
                                                    <label>Email</label>
                                                     <input type="text" name="email" value="<?php if(isset($profile_data->_email_address)){echo $profile_data->_email_address;} ?>">  
                                                   </div>
                                                   <div class="field four wide column">
                                                    <label>Blood Group</label>
                                                      <select name="bloodgroup">
                                            <option value=""> -- Select Blood Group --</option>
                                            <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="O+"){echo "selected='selected'";}} ?> value="O+">O+</option>
                                            <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="O-"){echo "selected='selected'";}} ?>value="O-">O-</option>
                                             <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="A+"){echo "selected='selected'";}} ?> value="A+">A+</option>
                                            <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="A-"){echo "selected='selected'";}} ?> value="A-">A-</option>
                                           <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="B+"){echo "selected='selected'";}} ?> value="B+">B+</option>
                                            <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="B-"){echo "selected='selected'";}} ?> value="B-">B-</option>
                          
                                              <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="AB+"){echo "selected='selected'";}} ?> value="AB+">AB+</option>
                                             <option <?php if(isset($profile_data->_blood_group)){if($profile_data->_blood_group =="AB-"){echo "selected='selected'";}} ?> value="AB-">AB-</option>
                                        </select>
                                                     </div>
                                                    
                                                </div>
                                        
                                                
<!--                                            </form>-->
                                        </div>
                                                 
                                             </div>   
                                                    
                                                        
                                                                
                                            </div>   
                                                                                 
                                        </div>
                                      
                                    </div>
<!--                                    education-->
                                    <div class="ui raised segment" style="background-color: #fff;">
                                        <h3 class="ui block header centered">
                                                    Education Qualification
                                                </h3>
                                        <div class="ui segmet">
                                                   <div class="ui container form">
<!--                                            <form action="<?php //echo site_url('alumini_portal/update_aluminimembers'); ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>-->
                                             <?php if(!empty($edu)){ ?>
                                                <?php $count =count($edu); $i=1;  foreach ($edu as $value) {  ?>
                                                   <div class="fields">
                                                       <div class="field three wide column">
                                                        <label>From</label>
                                                           <input type="date" name="from[]" id="from" class="form-control" value="<?php echo $value->_from ; ?>" required>
                                                           <input type="hidden" name="aedu_id[]" value="<?php echo $value->_edu_id; ?>">
                                                        </div>
                                                       <div class="field three wide column">
                                                        <label>To</label>
                                                           <input type="date" name="to[]" id="to" required class="form-control" value="<?php echo $value->_to ; ?>">
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Course</label>
                                                           <input type="text" name="course[]" id="course" required class="form-control" value="<?php echo $value->_course ; ?>">
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Institution</label>
                                                            <input type="text" name="institution[]" id="institution" required class="form-control" value="<?php echo $value->_institution ; ?>">
                                                       </div>
                                                       <div class="field two wide column" style="margin-top: -27px;">
                                                         <a class='pointer' href="<?php echo site_url('Alumini_portal/remove_edu/'.$value->_edu_id); ?>" ><i class='minus icon' style='margin-top: 57px;;color:red;'></i></a> 
                                                        <?php if($count == $i){ ?>  <a class='pointer' id="addalumniedu" ><i class='plus icon' style='margin-top: 57px;;color:black;'></i></a> <?php } ?>
                                                           </div>
                                                   </div>
                                              <?php $i++; }} else{ ?>
                                    <div class="fields">
                                                       <div class="field three wide column">
                                                        <label>From</label>
                                                           <input type="date" name="from[]" id="from" class="form-control" required>
                                                       </div>
                                                       <div class="field three wide column">
                                                        <label>To</label>
                                                           <input type="date" name="to[]" id="to" required class="form-control">
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Course</label>
                                                           <input type="text" name="course[]" id="course" required class="form-control">
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Institution</label>
                                                            <input type="text" name="institution[]" id="institution" required class="form-control">
                                                       </div>
                                                       <div class="field two wide column" style="margin-top: -27px;">
                                                            <a class='pointer' id="addalumniedu" ><i class='plus icon' style='margin-top: 37px;;color:black;'></i></a>
                                                       </div>
                                                   </div>
                                        <?php } ?>
                                         <div class="show_education"></div>
                                                
<!--                                            </form>-->
                                        </div>
                                                 
                                             </div>   
                                    </div>
<!--                                    working-->
                                             <div class="ui raised segment" style="background-color: #fff;">
                                        <h3 class="ui block header centered">
                                                    Working Experience
                                                </h3>
                                        <div class="ui segmet">
                                                   <div class="ui container form">
                                                <?php if(!empty($working)){ ?>
                                                <?php $count= count($working); $i=1; foreach ($working as $value) {  ?>
                                                   <div class="fields">
                                                       <div class="field three wide column">
                                                        <label>From</label>
                                                           <input type="date" name="wfrom[]" id="wfrom" class="form-control" value="<?php echo $value->_from ; ?>" required>
                                                           <input type="hidden" name="aworking_id[]" value="<?php echo $value->_working_id; ?>">
                                                        </div>
                                                       <div class="field three wide column">
                                                        <label>To</label>
                                                           <input type="date" name="wto[]" id="wto" required class="form-control" value="<?php echo $value->_to ; ?>">
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Company</label>
                                                           <input type="text" name="company[]" id="company" required class="form-control" value="<?php echo $value->_company ; ?>">
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Designation</label>
                                                            <input type="text" name="adesignation[]" id="adesignation" required class="form-control" value="<?php echo $value->_designation ; ?>">
                                                       </div>
                                                       </div>
                                                    <div class="fields">
                                                      <div class="field fifteen wide column">
                                                        <label>Designation</label>
                                                            <input type="text" name="description[]" id="description" required class="form-control" value="<?php echo $value->_description ; ?>">
                                                       </div>
                                                       <div class="field two wide column" style="margin-top: -27px;">
                                                           <a class='pointer' href="<?php echo site_url('Alumini_portal/remove_working/'.$value->_working_id); ?>"  ><i class='minus icon' style='margin-top: 57px;;color:red;'></i></a>
                                                          <?php if($count == $i){?>  <a class='pointer' id="addalumniworking" ><i class='plus icon' style='margin-top: 57px;;color:black;'></i></a><?php } ?>
                                                            
                                                       </div>
                                                   </div>
                                              <?php $i++; }} else{ ?>
                                              <div class="fields">
                                                       <div class="field three wide column">
                                                        <label>From</label>
                                                           <input type="date" name="from[]" id="from" class="form-control" required>
                                                         </div>
                                                       <div class="field three wide column">
                                                        <label>To</label>
                                                           <input type="date" name="to[]" id="to" required class="form-control" >
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Company</label>
                                                           <input type="text" name="company[]" id="company" required class="form-control" >
                                                       </div>
                                                       <div class="field four wide column">
                                                        <label>Designation</label>
                                                            <input type="text" name="designation[]" id="designation" required class="form-control" >
                                                       </div>
                                                       </div>
                                                    <div class="fields">
                                                      <div class="field fifteen wide column">
                                                        <label>Designation</label>
                                                            <input type="text" name="description[]" id="description" required class="form-control">
                                                       </div>
                                                       <div class="field one wide column" style="margin-top: -27px;">
                                                            <a class='pointer' id="addalumniworking" ><i class='plus icon' style='margin-top: 57px;;color:black;'></i></a>
                                                       </div>
                                                   </div>
                                        <?php } ?>
                                         <div class="show_working"></div>
                                         </div>   
                                    </div>
                              
                                </div>
<!--                                achievements-->
                                                <div class="ui raised segment" style="background-color: #fff;">
                                        <h3 class="ui block header centered">
                                                    Other Achievements
                                                </h3>
                                        <div class="ui segmet">
                                                   <div class="ui container form">
                                                <?php if(!empty($other)){ ?>
                                                <?php $count = count($other); $i=1; foreach ($other as $value) {  ?>
                                                 <div class="fields">
                                                     <div class="field three wide column">
                                                        <label>Achievement</label>
                                                         <input type="text" name="otitle[]" value="<?php echo $value->_title ?>">
                                                         <input type="hidden" name="achieve_id" value="<?php echo $value->_achievement_id ?>">
                                                     </div>
                                                      <div class="field eleven wide column">
                                                        <label>Designation</label>
                                                            <input type="text" name="odescription[]" id="odescription" required class="form-control" value="<?php echo $value->_description ; ?>">
                                                       </div>
                                                       <div class="field two wide column" style="margin-top: -27px;">
                                                           
                                                            <a class='pointer' href="<?php echo site_url('Alumini_portal/remove_other/'.$value->_achievement_id); ?>"  ><i class='minus icon' style='margin-top: 57px;;color:red;'></i></a>
                                                            <?php if($count == $i){ ?>
                                                            <a class='pointer' id="addalumniother" ><i class='plus icon' style='margin-top: 57px;;color:black;'></i></a>
                                                       <?php  } ?>
                                                       </div>
                                                   </div>
                                              <?php  $i++; }} else{ ?>
                                                       <div class="fields">
                                                     <div class="field three wide column">
                                                        <label>Achievement</label>
                                                         <input type="text" name="otitle[]" >
                                                     </div>
                                                      <div class="field eleven wide column">
                                                        <label>Designation</label>
                                                            <input type="text" name="odescription[]"   class="form-control" >
                                                       </div>
                                                       <div class="field two wide column" style="margin-top: -27px;">
                                                            <a class='pointer' id="addalumniother" ><i class='plus icon' style='margin-top: 57px;;color:black;'></i></a>
                                                       </div>
                                                   </div>
                                        <?php } ?>
                                         <div class="show_other"></div>
                                         <div class="fields">
                                                    <div class="field" style="margin-top:10px;">   
                                                        <input type="submit" class="ui button"  id="mybutton" style="" value="Update Profile"/>
                                                    </div>
                                                </div>
                                         </div>   
                                    </div>
                              
                                </div>
                                
                                </div></div>
                            </form>
                            <div class="ui grid">
                            <div class="sixteen wide column">
                            <div class="ui segment">
                            <h3 class="ui block header centered">
                                                   Other Details
                                                </h3>
<!--                                     testiminial,  etc-->
                                      <div class="ui raised segment" style="background-color: #fff;">
                                       
                                        <div class="ui segmet">
                                                   <div class="ui container form">
                                            <form action="<?php echo site_url('Alumini_portal/update_otherdetails/'.$profile_data->_id); ?>" method="POST" enctype="multipart/form-data">
                                                <?= csrf_field() ?>
                                              
                                                   
                                                    
<!--                                                      <div class="fields">-->
                                                      <div class="sixteen wide field">
                                                        <label>Testimonial</label>
                                                        <textarea rows="2" name="testimonial" id="testimonial"  class="form-control" placeholder=" Name" tabindex="1" required><?php if(isset($profile_data->_testimonial)){echo $profile_data->_testimonial;} ?></textarea>
                                                  
                                                  </div>
                                                    <div class="field" style="margin-top: 30px;">   
                                                       <input type="submit" class="ui button" value="update" />
                                                    </div>
<!--                                                </div>-->
                                                       </form>
                                                       
                                        </div>
                                                 
                                             </div>   
                                    </div>
                        <!--                                     testiminial,  etc-->
                                      <div class="ui raised segment" style="background-color: #fff;">
                                        
                                        <div class="ui segmet">
                                                   <div class="ui container form">
                                          
                                                       <form action="<?php echo site_url('Alumini_portal/update_other/'.$profile_data->
_id); ?>" method="POST" enctype="multipart/form-data">
                                             
                                                  <div class="sixteen wide field">
                                                        <label>Contribution</label>
                                                        <textarea rows="2" name="contribution" id="contribution"  class="form-control" placeholder=" Name" tabindex="1" required><?php if(isset($profile_data-> _contribution)){echo $profile_data->   _contribution;} ?></textarea>
                                                           </div>
                                                           <div class="fields">
                                                    
                                                </div>
                                                        
                                                  <div class="sixteen wide field">
                                                        <label>Feedback</label>
                                                        <textarea rows="2" name="feedback" id="feedback"  class="form-control" placeholder=" Name" tabindex="1" required><?php if(isset($profile_data-> _feedback)){echo $profile_data->   _feedback;} ?></textarea>
                                                  </div>

                                    
                                        
                                                <div class="fields">
                                                    <div class="field">   
                                                        <input type="submit" class="ui button"   style="" value="Update"/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                                 
                                             </div>   
                                    </div>
                                    </div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
    </body>
</html>


<?= $this->endSection() ?>
