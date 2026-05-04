<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
        <head>
        <title>NSS COLLEGE RAJAKUMARI</title>
        <meta charset="UTF-8">
        <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
        <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
        <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
        <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">
        
        
        <style >
            #congrats_wish{
                display:none;
                position:fixed;
                width:80vw;
                height:90vh;
                top:5vh;
                left:10vw;
                background-color:#edeeef;
                z-index:50000;
                box-shadow:2px 2px 5px 2px #878787;
                border:1px solid #0c2651;
                padding:15px;
            }
            #closebutton_congrats{
                z-index:1000000;
                position:absolute;
                right:-9px;
                top:-9px;
                width:27px;
                height:27px;
                background-color:#0c2651;
                border-radius:50%;
                padding:3px;
                color:#fff;
                cursor:pointer;
            }
             #closebutton_congrats:hover{
                 background-color:#2a5499;
             }
             #hover_area_list{
                 max-height:95%;
                overflow-y:auto;
                overflow-x:hidden;
                padding:5px;
             }
             .con_student_data{
                 border:1px solid #303030;
                 border-radius:20px;
                 margin-bottom:20px;
                 padding:5px;
                 background-color:#fff;
             }
             .con_stu_img{
                 border-radius:20px;
                 width:100%;
                 /*object-fit:cover;*/
                 width:200px;
                 height:200px;
             }
             .con_stu_img_cont{
                 text-align:center;
                 position:relative;
             }
             .con_stu_name{
                 margin-top:5px;
                 font-size:17px;
                 font-weight:bold;
                 color:#000;
             }
             .con_stu_rank{
                 font-size:16px;
                 color:#000;
                 position:absolute;
                 font-weight:bold;
                 border:1px solid black;
                 top:8px;
                 left:-4px;
                 padding:5px;
                 background-color:#eae202;
                 border-radius:8px;
                  -ms-transform: rotate(20deg); /* IE 9 */
                -webkit-transform: rotate(20deg); /* Safari 3-8 */
                transform: rotate(-45deg);
             }
             #id_main_cong_bg{
                 position:absolute;
                 top:0px;
                 left:0px;
                 width:100%;
                 height:100%;
                 object-fit:cover;
                 z-index:-1;
             }
             #main_title_rankhold{
                 text-align:center;
                 font-size:25px;
                 letter-spacing:1.2px;
                 margin-bottom:15px;
                 font-weight:bold;
             }
             #main_title_rankhold span{
                 padding:6px;
                 color:#fff;
                 background-color:#123f87;
                 border-radius:10px;
             }
             .con_divider{
                 width:100%;
                 border:1px solid #727272;
             }
             .con_depoartment{
                 font-size:13px;
                 color:#000;
             }
             .con_stu_grade{
                 font-size:14px;
                 color:#000;
             }
             .marquee-container {
            overflow: hidden;
            white-space: nowrap;
        }
        .marquee-text {
            display: inline-block;
            padding-left: 100%;
            padding-top:10px;
            animation: marquee 50s linear;
        }
        @keyframes marquee {
            100% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        </style>
    </head>

    <body class="animsition restyle-index" >
        <div id="congrats_wish" >
            <img id="id_main_cong_bg" src="<?php echo base_url('assets/img/congrats_bg.jpg'); ?>" >
            <h1 id="main_title_rankhold"><span>Congratulations University Toppers</span></h1>
            <button id="closebutton_congrats" >X</button>
            <div id="hover_area_list" >
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="con_student_data" >
                            <div class="con_stu_img_cont">
                                <img class="con_stu_img" style="width:300px;height:300px;" src="<?php echo base_url('assets/img/university_toppers/amal_shiji.jpg'); ?>"  >
                                <h3 class="con_stu_name">Amal Shiji</h3>
                                <h6 class="con_stu_grade">Grade:8.64</h6>
                                <span class="con_stu_rank" >Rank:8</span>
                                <div class="con_divider"></div>
                                <span class="con_depoartment" >BBA</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="con_student_data" >
                            <div class="con_stu_img_cont">
                                <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/rincymol.jpg'); ?>"  >
                                <h3 class="con_stu_name">Rinsimol P.M</h3>
                                <h6 class="con_stu_grade">Grade:8.34</h6>
                                <span class="con_stu_rank" >Rank:9</span>
                                <div class="con_divider"></div>
                                <span class="con_depoartment" >B.Com Model II</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="con_student_data" >
                            <div class="con_stu_img_cont">
                                <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/anamika_shanas.jpg'); ?>"  >
                                <h3 class="con_stu_name">Anamika Shanas</h3>
                                <h6 class="con_stu_grade">Grade:8.34</h6>
                                <span class="con_stu_rank" >Rank:9</span>
                                <div class="con_divider"></div>
                                <span class="con_depoartment" >B.Com Model II</span>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/saranya_roy.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Saranya Roy</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:9.28</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:7</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/amitha_sebastian.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Amitha Sebastian</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:9.0</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:10</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/anju_p_v.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Anju P V</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.97</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:11</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/surya_mohanan.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Surya Mohanan</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.83</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:13</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/suryamol_rajan.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Suryamol Rajan</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.73</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:17</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/haripriya_biju.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Haripriya Biju</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.63</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:22</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/anitta_eldhose.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Anitta Eldhose</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.93</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:23</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Computer Application (BCA)</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/donia_johnson.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Donia Johnson</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.51</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:26</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/binimol_baby_1.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Binimol Baby</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.48</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:28</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/nimna_johnson.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Nimna Johnson</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.47</h6>-->
                    <!--            <span class="con_stu_rank" >Rank:29</span>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I CO Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--- Other Toppers -->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/midhula_m.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Midhula M.</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.82 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/soniya_johnson.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Soniya Johnson</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.76 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/ajmi_basheer.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Ajmi Basheer</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.69 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/anjaly_madhu.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Anjaly Madhu</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.52 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/soniya_saji.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Soniya Saji</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.49 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/karthika_jayan.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Karthika Jayan</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.46 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/ageena_antony.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Ageena Antony</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.43 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/aswathy_k_r.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Aswathy K R</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.30 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/neenu_jayachandran.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Neenu Jayachandran </h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.19 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/aparna_r.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Aparna R </h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.10 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model II Computer Application</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/akshaya_s_anand.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Akshaya S Anand</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.40 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I Co Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/basil_shaji.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Basil Shaji</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.37 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I Co Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/ashik_jose.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Ashik Jose</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.23 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I Co Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/aneetta_jose.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Aneetta Jose</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.20 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I Co Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/jeena_john.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Jeena John</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.04 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I Co Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">-->
                    <!--    <div class="con_student_data" >-->
                    <!--        <div class="con_stu_img_cont">-->
                    <!--            <img class="con_stu_img" src="<?php echo base_url('assets/img/university_toppers/vijitha_vikraman.jpg'); ?>"  >-->
                    <!--            <h3 class="con_stu_name">Vijitha Vikraman</h3>-->
                    <!--            <h6 class="con_stu_grade">Grade:8.15 | University Topper</h6>-->
                    <!--            <div class="con_divider"></div>-->
                    <!--            <span class="con_depoartment" >Model I Co Operation</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <header>
            
        </header>      
        <section class="bgwhite p-t-2 p-b-6">   
<!--        <div class="ui segment">-->
<!--    <div class="marquee-container">-->
<!--        <marquee  style="background-color:#233785;color:white;padding:3px;">-->
<!--            പുതിയ  പാഠ്യപദ്ധതിയെ സംബന്ധിച്ചുള്ള സംശയ നിവാരണത്തിനായി രാജകുമാരി എൻ എസ് എസ് കോളേജിൽ 2024  മെയ് 24 ന് 10 മണിക്ക് മുഖാമുഖം പരിപാടി നടത്തുന്നു.പ്രവേശനം തികച്ചും സൗജന്യമാണ്.-->
<!--ഈ വർഷത്തെ ബിരുദ പ്രവേശനത്തിനായി ആഗ്രഹിക്കുന്ന  വിദ്യാർത്ഥികൾ ഇതോടൊപ്പം നൽകിയിരിക്കുന്ന ഗൂഗിൾ ഫോം പൂരിപ്പിച്ച് രജിസ്റ്റർ ചെയ്യേണ്ടതാണ്.-->
<!--        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdpShAXAmDklDRti2FGmF0iVzXimX7M1Nq_3jUo2s75VEFbrQ/viewform" target="_blank" class="ui primary button">-->
<!--            [ Click here to register ]-->
<!--        </a>-->
<!--        </marquee>-->
<!--    </div>-->
<!--</div>-->

            <div class="container" >
                <div class="row">                   
                    <div class="col-md-7 col-lg-8 p-t-40">
                        <div class=" p-b-1">
                            <div class="p-b-10">
                                <h3 class="p-b-8 special_text" >
                                    Our College
                                </h3>
                                <div class="bg-main size2 bo-rad-3 "></div>
                            </div>
                        </div>
                        <p class="custtstyle s-txt2 p-b-16">The N.S.S. College, Rajakumari got established and started
                            functioning in June 1995. It is one among several prestigious centres of
                            higher education under the auspices of Nair Service Society, the biggest
                            charitable organisation in Kerala, founded by Padma Bhushan Bharatha
                            Kesari Mannathu Padmanabhan. By establishing this college, NSS has
                            extended its services in higher education to High Ranges, an educationally
                            backward area. The college in its early days functioned in a rented building
                            at Rajakumari town.
                        </p>
                        <p class="custtstyle s-txt2 p-b-16"> The foundation stone of the present college building was laid by
                            Sri. P.K. Narayana Panicker, former Hon. General Secretary of Nair
                            Service Society on 16.01.1995. The construction of the College building
                            was completed with in a short span of time by the sheer determination
                            and devotion of NSS Management. Sri. P.K. Narayana Panicker officially
                            inaugurated the new college building on 7th march 2000. </p>
                        <p class="custtstyle s-txt2 p-b-16" >The college campus is situated on a beautiful hill top near
                            Kulapparachal, 2 km east of Rajakumari town. The natural scenic beauty
                            of the hills and valleys around the campus thrills the viewers.</p>
                        <p class="custtstyle s-txt2 p-b-16" >The college extends its sincere gratitude to Sri. K.G. Sreedhara
                            Panicker, former N.S.S. High Range Taluk Union President, for
                            donating the major portion of land to the college and his sincere
                            endeavours in fulfilling this institution as a ‘temple of education’.</p>
                            
                            <h3 class="p-b-8 special_text" >
                                    Our Vision
                                </h3> <p class="custtstyle s-txt2 p-b-16" >To uplift the socio-economic backwardness of this area by providing job-oriented 
education in new generation programmes like Electronics, Computer hardware and 
Software, Business administration and Commerce and to equip the stakeholders 
competent and hardworking to survive the challenges in the present competitive world.</p>
 <h3 class="p-b-8 special_text" >
                                    Our Mission
                                </h3><ul class="custtstyle s-txt2 p-b-16"> <li> To mould the stakeholders of the various programmes to excel in their fields
</li><li>  To give opportunity for community and extension activities and hence to create 
awareness of the real world situations
</li><li>   To nurture the inbuilt capability of every student through curricular and noncurricular activities
</li><li>  To facilitate the stakeholder expertise in solving practical as well as real world 
situations through well-equipped laboratories and in-house projects
</li><li>   To convert the laboratories into active research centers</li> </ul>
                    </div>
                   
                    <div class="col-md-5 col-lg-4 p-t-40">
                        <div class="notice-board-design"  style="height:100%">
                            <h3 class="notice-board-title"> <i class="icon-pushpin"></i> Notice Board</h3>
                            <div id="notice_scroll_area_anima" style="height:30%">
                                <?php if($notice_list){foreach($notice_list as $noticeitem){  ?>
                                <div class="notice-scroll-area" >
                                    <div class="notice-ind-item">
                                        <?php if($noticeitem['_important'] == 'yes'){ ?>
                                        <span class="important-warning">IMP</span>
                                        <?php } ?>
                                        <h4 class="nbsub-title"><?php echo $noticeitem['_title']; ?></h4>    
                                        <p class="nbsub-para"><?php echo $noticeitem['_description']; ?></p>
                                        <div class="nbsub_bottom_set">
                                            <div class="left_info_data">Date: <?php echo date('d/m/Y',strtotime($noticeitem['_display_date'])); ?></div>
                                            <?php if(trim($noticeitem['_pdf_file_loc']) != ""){ ?>
                                            <div class="center_info_data"><a  target="_blank" href="<?php echo base_url($noticeitem['_pdf_file_loc']); ?>" >Download</a></div>
                                            <?php } ?>
                                            <?php if(trim($noticeitem['_link']) != ""){ ?>
                                            <div class="right_info_data"><a  target="_blank" href="<?php echo $noticeitem['_link']; ?>" >View</a></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } }else{ ?>  
                                <i style="text-align:center;coor:red;" ></i>
                                <?php } ?>
                                <div class="notice-scroll-area" >
                                        <div class="notice-ind-item">
                                            <img src="<?=base_url('assets/img/FIUGP/mmbrochure.jpg')?>" style="width:100%">
                                        </div>
                                        <hr>
                                        <div class="notice-ind-item">
                                            <img src="/dynamic_assets/images/rank_2024.jpg" width=340px >
                                        </div>
                                        <hr>
                                        <!--<hr>-->
                                        <!--<div class="notice-ind-item">-->
                                        <!--    <img src="/dynamic_assets/images/bsc_rank_2023.jpeg" width=340px >-->
                                        <!--</div>-->
                                        
                                        <!--<div class="notice-scroll-area" >-->
                                    
                                        <!--</div>-->
                                </div>
                            </div>                        
                        </div>                       
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <hr>
            <?php if(count($news_list)>0){ ?>
            <section class="bgwhite p-t-15 p-b-10">
                <div class=" p-b-1">
                    <div class="p-b-24">
                        <h3 class="p-b-8 special_text" >
                            Latest News & Events
                        </h3>
                        <div class="bg-main size2 bo-rad-3 "></div>
                    </div>
                </div>
                <div class="container-slick-2"> 
                    <div class="wrap-slick-2">
                        <div class="slick-2 js-slick-2">                            
                            <?php foreach($news_list as $row){ ?>
                            <?php if($row['_newsid'] == 15){ ?>
                            <div class="item-slick-2 m-l-15 m-r-15">    
                                <div class="news-area-box-main" style="height:450px!important">
                                    <div class="nabm-imgbox-imp">
                                        <img class="nabm-imgbox" src="<?php echo base_url($row['_imgloc']) ?>" alt="">
                                        <p class="nabm_top_title_date"><?php echo date('d/m/Y',strtotime($row['_date'])); ?> | <?php echo $row['_added_by']; ?></p>
                                        <p class="nabm_bottom_title_txt"><?php echo $row['_newsheading']; ?></p>
                                    </div>
                                    <p style="text-align:justify;" class="nabm_bottom_paragraph">
                                        <?php echo substr($row['_newsdescription'],0,200); ?>                                     
                                    </p>
                                    <a class="nabm_bottom_view_button" href="<?php echo base_url('Home/pariksha_pe_charcha'); ?>">View</a>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="item-slick-2 m-l-15 m-r-15">    
                                <div class="news-area-box-main"  style="height:450px!important">
                                    <div class="nabm-imgbox-imp">
                                        <img class="nabm-imgbox" src="<?php echo base_url($row['_imgloc']) ?>" alt="">
                                        <p class="nabm_top_title_date"><?php echo date('d/m/Y',strtotime($row['_date'])); ?> | <?php echo $row['_added_by']; ?></p>
                                        <p class="nabm_bottom_title_txt"><?php echo $row['_newsheading']; ?></p>
                                    </div>
                                    <p style="text-align:justify;" class="nabm_bottom_paragraph">
                                        <?php echo substr($row['_newsdescription'],0,200); ?>                                     
                                    </p>
                                    <a class="nabm_bottom_view_button" href="<?php echo base_url('Home/newsdetails/'.$row['_newsid']); ?>">View</a>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </section>  
            <?php } ?>
        </div>      
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="z-index:1110!important;">
          <div class="modal-dialog" role="document" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
            <div class="modal-content">
              
              <div class="modal-body">
                <img src="<?=base_url('assets/img/FIUGP/brochure.jpg')?>" style="width:100%">
              </div>
              <div style="text-align:center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" id="id_openmodalbtn" data-target="#exampleModal" style="display:none">
          Launch demo modal
        </button>
        <footer class="bg4 p-t-10">
            
        </footer>
        <!-- Back to top -->
        <div class="btn-back-to-top hov-bg-main" id="myBtn"> <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span> </div>
        
        <script src="<?php echo base_url('assets/js/jquery.marquee.min.js'); ?>" ></script>
        <script>
            $('#id_openmodalbtn').click();
            $('#notice_scroll_area_anima').marquee({
                pauseOnHover: true,                
                duration: 15000,                
                gap: 5,                
                delayBeforeStart: 2000,                
                direction: 'up',                
                duplicated: true,
                startVisible: true
            });
        </script>
    </body>

</html>


<?= $this->endSection() ?>
