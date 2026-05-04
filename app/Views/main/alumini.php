<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Alumni</title>
        <meta charset="UTF-8">
        <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
        <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
        <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
        <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body class="animsition restyle-index">
        <header>
            
        </header>
       <?php foreach($data as $row):?>
        <section class="bgwhite p-t-20 p-b-30" >
            <div class="container p-b-6">
                <div class="p-b-24">
                    <h3 class="p-b-8 special_text">
                        Alumni
                    </h3>
                    <div class="bg-main size2 bo-rad-3"></div>
                </div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 m-lr-auto p-b-50">

                        <div class="p-r-20 p-r-0-md">
                            <div class="">
                                <div class="p-l-38 p-r-38 p-t-30 p-b-18 p-lr-15-sm">
                                    <p class="s-txt2 p-b-24" style="margin-top: -47px; text-align:justify; text-indent:5%;">
                                    <?php if(!empty($row['_description'])){ echo $row['_description']; } ?></p>

                                    <div class="flex-w flex-sb-m">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

                   
                <div class="row">
                    <div class="col-lg-32 col-md-2"></div>
                    <?php foreach($incharges as $val){ ?>
                    <div class="col-lg-3 col-md-3">
                        <img style=" width: 105px;  border: 1px solid #999999;padding: 3px;  object-fit: cover;   border-radius: 50%;" src="<?php if(!empty($val['_profile_picture'])){ echo base_url($val['_profile_picture']); } ?>">
                        <p style="color:red"><b><?php if(!empty($val['_designation'])){ echo $val['_designation']; } ?></b></p>
                        <p><b><?php if(!empty($val['_full_name'])){ echo $val['_full_name']; } ?></b></p>
                        <p ><?php if(!empty($val['_wdetails'])){ echo $val['_wdetails']; } ?> </p>
                        <p >Ph : <?php if(!empty($val['_phone'])){ echo $val['_phone']; } ?> </p>
                        <p >Email : <?php if(!empty($val['_email'])){ echo $val['_email']; } ?> </p>

                    </div>
                    <?php } ?>
                 <div class="col-lg-3 col-md-3"></div>
                </div>
                
            </div>
        </section>
<!-- Testimonial & About-->
    <section class="bgwhite p-t-25 p-b-80">
        <div class="container">
            <div class="row">

 <?php if(!empty($test)){ ?>
              <div class="col-md-12 p-t-40">
                    <div class="wrap-slide-slick-3">
                       <div class="p-b-22">
                            <h3 class="m-txt4 p-b-8 p-r-90 respon1">
                                Testimonials
                            </h3>
                        <div class="bg-main size2 bo-rad-3"></div>
                        </div>
                        <div class="slide-slick-3 js-slick-3">
                           <?php foreach($test as $val){?>
                           <?php if($val->_testimonial_rank ==""||$val->_testimonial_rank == 0||$val->_testimonial_rank == -1){}else{ ?>
                            <div class="item-slick-3" data-thumb="images/dot-slide-01.jpg">
                                <span class="xl-txt1 float-l p-r-5 dis-block h-full ab-t-l">“</span>
                                <p  class="para-slide-slick-3 s-txt2 p-t-12 p-l-33 p-b-20 animated">
                                    <?php echo $val->_testimonial; ?>
                                    </p>

                                <div class="wrap-person-slick-3 p-l-33 animated">
                                    <div class="wrap-info-person">
                                        <span class="s-txt12 m-r-15"><?php if(!empty($val->_full_name)){ echo $val->_full_name; }  ?></span>
                                        <span class="s-txt13"><?php if(!empty($val->_job_specification)){ echo $val->_job_specification; } ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>

                       </div></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>



                <!-- <section class="bg-white " >
<div class="container-slick-5 rs1-slick2">
<div class="row">
<div class="container p-b-6">
<div class="p-b-24">
<h3 class="p-b-8 special_text">
Alumini Members
</h3>
<div class="bg-main size2 bo-rad-3"></div>
</div>
</div>
<table class="staff_table_design">
<tbody>
<?php  $i=1; foreach($members as $row):?>
<tr class="man_bg_seltr">
<td><b><?php echo $i++?></b></td>
    <td><b><?php echo $row['_full_name'];?></b></td>
<td><?php echo $row['_job_specification'];?></td>
<td class="col_stname" >
<a class="colst_name" ></a>
<p></p>
</td>
<td></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</section>
</div>




</section>
<?php endforeach; ?>-->


                 <footer class="bg4 p-t-25">
                
                </footer>
                <!-- Back to top -->
                <div class="btn-back-to-top hov-bg-main" id="myBtn"> <span class="symbol-btn-back-to-top">
                    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                    </span> </div>
                
                </body>

            </html>


<?= $this->endSection() ?>
