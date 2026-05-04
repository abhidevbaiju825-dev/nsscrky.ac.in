<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Code of Conduct</title>
        <meta charset="UTF-8">
        <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
        <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
        <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
        <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
          <link rel="stylesheet" href="<?php echo base_url('assets/admin/semanticui/semantic.min.css'); ?>">
    </head>
<style type="text/css">
    .wide {

    background-color: white !important;
    width: 100%;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 0;
    border-top-right-radius: 0 border-bottom-right-radius: 0;

}
  .lab{
color:#0d5189 !important;
font-size: 17px !important;
}
.lab1{
color:#0d5189 !important;
}
.checksize{
/*width:10px;*/
/*height:10px;*/
}
.colorlist{
color: black !important;
}
</style>
    <body class="animsition restyle-index">
        <header>
            
        </header>

        <section class="bgwhite p-t-20 p-b-20">
            <div class="container">
              <!--   <div class="p-b-34" id="headimgdept">
                    <h3 class="m-txt4 p-b-8 respon1">
                       Application for community quota - UG admission 2020-2021
                    </h3>
                    <div class="bg-main size2 bo-rad-3" style="text-align: justify;"></div>
                </div> -->
                  <div class="row">
                    <div class="col-md-12 col-xs-6  col-sm-6">
                    <div class="ui grid">
                                    <div class="ui raised segment">
                                        <?php if( $this->session->flashdata('message'))
                                              $message=$this->session->flashdata('message');
                                              if( $this->session->flashdata('error'))
                                                $error=$this->session->flashdata('error');

                                          ?>
                                          <?php if(!empty($error) || !empty($message)){ ?>
                                                  <div class="ui container" id="msg_id" style="margin-top:20px;">
                                                            <?php if (!empty($message)): if($message!='Saved Successfully'){ ?>
                                                                
                                                            <div id="error_msg" class="ui error message " >
                                                             <div class="header">OOps Error !!</div>
                                                      </div>
                                                            <?php } endif; ?>


                                                            <?php if (!empty($message)): ?>
                                                              <div id="success_msg" class="ui success message " >
                                                             <div class="header">Submitted Successfully !!</div>
                                                        </div>
                                                            
                                                            <?php endif; ?>
                                                   </div>
                                            <?php }?>
                                          <!--   <?php echo $_appl_no; ?> -->
                                        <h2 class="ui center aligned header" align="center">
                                            <div class="content-registration">Students Grievance Cell-Complaint Form</div>
                                        </h2>
                                       
                                        <div class="ui container form">
                                           
                                            <form id="complaintForm" action="<?php echo site_url('Home/saveComplaint'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
                                           <div class="ui segment" style="padding-left:80px ;padding-right:80px; ">
                        <div class="ui  form">
                            <div class=" field">
                            <label>Complaint Type</label>
                              <select class="ui dropdown" name="type">
  <option value="General Complaint">General Complaint</option>
  <option value="Caste Based Discrimination">Caste Based Discrimination</option>
  <option value="Gender Discriminations">Gender Discriminations</option>
  <option value="Mental Harassment">Mental Harassment</option>
  <option value="Harassment from Senior">Harassment from Senior</option>
</select>
                              
                           
                          </div>
                          <div class="two fields">
                            <div class="field">
                              <label>Name</label>
                              <input placeholder="Enter Your Name" id="name"  name="name" type="text">
                            </div>
                            <div class="field">
                              <label>Mobile No.</label>
                              <input placeholder="Enter Your Mobile No." id="mobile" name="mobile"  type="text">
                            </div>
                          </div>
                          <div class=" field">
                            <label>Subject</label>
                              <input type="text" placeholder="Enter Subject Here" id="subject"  name="subject" >
                              
                           
                          </div>
                          <div class=" field">
                            <label>Complaint</label>
                              <textarea rows="2" placeholder="Enter Complaint Here" name="complaint" id="complaint" ></textarea>
                          </div>
                       <div id="error_message_area"></div>
                            <div class="fields">   
                                                        <div class="thirteen wide field"></div><div class=" field"><a  class="ui red button" id="send_appln">Submit</a></div>
                                                    </div>
                        
                        </div>
                        
                      </div>
                      
                      </form>
                                        </div>
        </div>

    </div> 
     <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
     <input type="hidden" name="baseu" id="baseu" value="<?php echo base_url(); ?>">
            </div>
        </section>
        <footer class="bg4 p-t-25">
            
        </footer>
        <div class="btn-back-to-top hov-bg-main" id="myBtn"> <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span> </div>
        

        <!--<script src="<?php //echo base_url();?>/assets/js/main.js"></script>-->
    </body>

</html>
 <script src="<?php echo base_url('assets/admin/dtprint.js'); ?>" ></script>
 <script src="<?php echo base_url('assets/admin/semanticui/semantic.min.js'); ?>" ></script> 
 <script>
$(document).on('click','#send_appln',function(){

      $error='';
       if($('#name').val()==''){
           $error +='<li>Name Field is required</li>';
       }
       if($('#mobile').val()==''){
           $error +='<li>Mobile No. is required</li>';
       }
       if($('#subject').val()==''){
           $error +='<li>Subject Field is required</li>';
       }
        if($('#complaint').val()==''){
           $error +='<li>Complaint Field is required</li>';
       }
       if(($('#mobile').val().length<10 )||($('#mobile').val().length>10 )){
        $error +='<li>Enter 10 digit Mobile No.</li>';
       }

   // // console.log(tempdata);

       if($error!=''){
            $('#error_message_area').html('<div class="ui negative  message"><div class="header">Invalid form entries found</div><ul class="list">'+$error+'</ul></div>');
            $('#error_message_area').transition('pulse');
            $('#error_message_area').fadeIn();
            return;
       }else{
        $('#complaintForm').submit();
     }
  });
$(document).on('keyup','#mobile', function(){
        if(($.isNumeric($(this).val()))==false){
          $(this).val('0');
    }
    });
$(document).ready(function()  {
    setInterval(function(){
        $("#msg_id").fadeOut();
    }, 1000);   
});

</script>

    </body>
</html>


