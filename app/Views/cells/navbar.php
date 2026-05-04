<?php
$uri = uri_string();
$is_home = ($uri == '' || $uri == '/');
$is_dept = (strpos($uri, 'Home/department_view') === 0);
$is_prog = ($uri == 'Home/programs');
$is_proj = ($uri == 'Home/ugc_projects');
$is_down = ($uri == 'Home/downloads');
$student_corner_uris = ['Home/onlineresourses', 'Home/syllabus', 'Evaluation', 'Home/codeofconduct', 'Home/college_examination', 'Home/scholarship', 'Home/students_union', 'Home/clubsandcells', 'Home/nationl_service_scheme', 'Home/nationl_cadet_corps'];
$is_student_corner = false;
foreach($student_corner_uris as $u) { if(strpos($uri, $u) === 0) $is_student_corner = true; }
$about_uris = ['Home/about', 'Home/principal_desk', 'Home/organogram', 'Home/college_counsil', 'Home/staff', 'Home/non_staff'];
$is_about = false;
foreach($about_uris as $u) { if(strpos($uri, $u) === 0) $is_about = true; }
$is_contact = ($uri == 'Home/contact');
?>
<div>
    <div class="container-menu-desktop">
        <div class="top-bar bg-main">
            <div class="container">
                <div class="content-topbar">
                    <div class="left-top-bar">
                        <p style="color:white; font-size:12px;"> Aided,Recognized U/S 2(F) and 12(B) of UGC Act 1956 Accredited by NAAC with B+ Grade (2.70)</p>
                    </div>
                    <div class="right-top-bar"> 
                        <span>
                            <i class="icon_mail" aria-hidden="true"></i>
                            <span>mail@nsscrky.edu.in</span> 
                        </span> 
                        <span>
                            <i class="icon_phone" aria-hidden="true"></i>
                            <span>04868-245370, &nbsp 04868-245515</span> 
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop" style="padding-top: 15px; padding-bottom: 10px; min-height: 100px;">
            <div class="limiter-menu-desktop">
                <a href="<?= base_url() ?>" class="logo">
                    <img src="<?= base_url('uploads/static/logo.png') ?>" alt="IMG-LOGO">
                </a>
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="<?= $is_home ? 'active' : '' ?>"> <a href="<?= base_url() ?>">Home</a> </li>
                        <li class="<?= $is_dept ? 'active' : '' ?>"> <a>DEPARTMENTS</a>
                            <ul class="sub-menu">
                                <?php if(!empty($menu_dept_data)): foreach($menu_dept_data as $dept): ?>
                                <li> <a href="<?= base_url('Home/department_view/'.$dept['_dep_id'].'/'. preg_replace('#[ -]+#', '-', $dept['_department_name'])) ?>"><?= esc($dept['_department_name']) ?></a> </li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </li>
                        <li class="<?= $is_prog ? 'active' : '' ?>">
                            <a href="<?= base_url('Home/programs') ?>">PROGRAMME</a>
                        </li>
                        <li class="<?= $is_proj ? 'active' : '' ?>"> <a href="<?= base_url('Home/ugc_projects') ?>">Projects</a> </li>
                        <li class="<?= $is_down ? 'active' : '' ?>"><a href="<?= base_url('Home/downloads') ?>">Downloads</a></li>
                        <li class="<?= $is_student_corner ? 'active' : '' ?>"> <a>Student's Corner</a>
                            <ul class="sub-menu">
                                <li><a style="cursor: pointer;"> Academic Calendar</a>
                                    <ul class="sub-menu">
                                        <li> <a href="<?= base_url('assets/Calender_2017_2018.pdf') ?>">2017-18 </a></li>
                                        <li> <a href="<?= base_url('assets/Academic_Calendar_2018-19.pdf') ?>">2018-19 </a></li>
                                        <li> <a href="<?= base_url('assets/Calendar_2019_2020.pdf') ?>">2019-20 </a></li>
                                        <li> <a href="<?= base_url('assets/Calendar_2020_2021.pdf') ?>">2020-21 </a></li>
                                        <li> <a href="<?= base_url('assets/Calendar_2021_2022.pdf') ?>">2021-22 </a></li>
                                    </ul>
                                </li>
                                <li><a style="cursor: pointer;">Resources</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url('Home/onlineresourses') ?>">Online Resources</a></li>
                                        <li><a href="https://drive.google.com/drive/folders/1IY6OlXpU9Vsx8E3LMx8unpxX7vZo_0lI" target="_blank">Question Papers</a></li>
                                        <li><a href="<?= base_url('Home/syllabus') ?>">Syllabus</a></li>
                                    </ul>
                                </li>
                                <li><a style="cursor: pointer;">Student Feedback</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url('Evaluation') ?>">Evaluation</a></li>
                                        <li><a target="_blank" href="<?= base_url('assets/feedback/survey1718.pdf') ?>">Survey result 2017-2018</a></li>
                                        <li><a target="_blank" href="<?= base_url('assets/feedback/survey_result_chart_website.pdf') ?>">Survey result 2018-2019</a></li>
                                        <li><a target="_blank" href="<?= base_url('assets/feedback/survey1920.pdf') ?>">Survey result 2019-2020</a></li>
                                        <li><a target="_blank" href="<?= base_url('assets/feedback/survey2021.pdf') ?>">Survey result 2020-2021</a></li>
                                        <li><a target="_blank" href="<?= base_url('assets/feedback/survey2122.pdf') ?>">Survey result 2021-2022</a></li>
                                    </ul>
                                </li>
                                <li><a style="cursor: pointer;">Skill Development</a>
                                    <ul class="sub-menu">
                                        <li> <a href="<?= base_url('assets/files/ASAP.docx') ?>">ASAP</a></li>
                                        <li><a target="_blank" href="<?= base_url('assets/best_practices/LeTinActivities.pdf') ?>">LeTin</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url('Home/codeofconduct') ?>">Code of Conduct</a></li>
                                <li><a href="<?= base_url('Home/college_examination') ?>">College Examination</a></li>
                                <li><a href="<?= base_url('Home/scholarship') ?>">Scholarships</a></li>
                                <li><a href="<?= base_url('Home/students_union') ?>">Students's Union</a></li>
                                <li><a href="<?= base_url('Home/clubsandcells') ?>">Clubs & Cells</a></li>
                                <li><a href="<?= base_url('Home/nationl_service_scheme') ?>">National Service Scheme</a></li>
                                <li><a href="<?= base_url('Home/nationl_cadet_corps') ?>">National Cadet Corps</a></li>
                            </ul>
                        </li>
                        <li class="<?= $is_about ? 'active' : '' ?>"> <a>ABOUT</a>
                            <ul class="sub-menu">
                                <li> <a href="<?= base_url('Home/about') ?>">Our Management</a> </li>
                                <li> <a href="<?= base_url('Home/principal_desk') ?>">Principal's Desk</a> </li>
                                <li> <a href="<?= base_url('Home/organogram') ?>">Organogram</a> </li>
                                <li> <a href="<?= base_url('Home/college_counsil') ?>">College Council</a> </li>
                                <li> <a href="<?= base_url('Home/staff') ?>">Teaching Staff</a> </li>
                                <li> <a href="<?= base_url('Home/non_staff') ?>">Non Teaching Staff</a> </li>
                            </ul>
                        </li>
                        <li class="<?= $is_contact ? 'active' : '' ?>"> <a href="<?= base_url('Home/contact') ?>">CONTACT</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav id="navigation_update" class="navbar navbar-expand-lg navbar-light " >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="margin:auto;" >
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/iqac') ?>">IQAC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/research') ?>">Research</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/gallery') ?>">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/news') ?>">News and Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/placement') ?>">Placement</a>
                </li>
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="<?= base_url('alumni') ?>" id="alumniDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Alumni
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alumniDropdown">
                        <a class="dropdown-item" href="<?= base_url('alumni') ?>">Directory & Activities</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('alumni/login') ?>">Login to Portal</a>
                        <a class="dropdown-item" href="<?= base_url('alumni/register') ?>">New Registration</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/rti') ?>">RTI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/anti_ragging_cell') ?>">AntiRagging Cell</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/greivence_cell') ?>">Grievance Cell</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/pta') ?>">PTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/basiclogin') ?>">Login</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('Home/fee') ?>">Fees</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrap-header-mobile">
        <a href="<?= base_url() ?>" class="logo-mobile"> <img src="<?= base_url('uploads/static/logo.png') ?>" alt="IMG-LOGO"> </a>
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze"> <span class="hamburger-box">
            <span class="hamburger-inner"></span> </span>
        </div>
    </div>
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li class="bo1-b p-t-8 p-b-8">
                <div class="left-top-bar p-l-7">
                     <a class="nav-link dropdown-toggle" href="<?= base_url('Home/iqac') ?>" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        IQAC
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="<?= base_url('Home/iqac') ?>">AQAR</a>
                        <a class="dropdown-item" href="<?= base_url('Home/naac_certificates') ?>">NAAC certificates</a>
                        <a class="dropdown-item" href="<?= base_url('Home/rank_holder') ?>">Result</a>
                    </div>
                      <a href="<?= base_url('Home/gallery') ?>" class="">GALLERY</a> 
                     <a href="<?= base_url('Home/news') ?>" class="">NEWS</a> 
                     <a href="<?= base_url('Home/placement') ?>" class="">PLACEMENT</a>
                     <a href="<?= base_url('Home/pta') ?>" class="">PTA</a> 
                    <ul>
                     <li>
                     <a class="nav-link dropdown-toggle" href="#" id="navlink1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALUMNI</a>
                     <div class="dropdown-menu" aria-labelledby="navlink1">
                        <a class="dropdown-item" href="<?= base_url('alumni') ?>">Directory & Activities</a>
                        <a class="dropdown-item" href="<?= base_url('alumni/login') ?>">Login to Portal</a>
                        <a class="dropdown-item" href="<?= base_url('alumni/register') ?>">New Registration</a>
                    </div>
                    </li>
                    </ul>
                     <a href="<?= base_url('Home/anti_ragging_cell') ?>" class="">Anti Ragging Cell</a>
                     <a href="<?= base_url('Home/greivence_cell') ?>" class="">Students’ Grievance Cell</a> 
                     <a href="<?= base_url('Home/basiclogin') ?>" class="">Login</a> 
                     <a class="nav-link " href="<?= base_url('Home/fee') ?>">Fee Payment</a> 
                </div>
            </li>
            <li class="right-top-bar bo1-b p-t-8 p-b-8"> <span>
                <i class="icon_phone" aria-hidden="true"></i>
                <span>04868-245370, &nbsp 04868-245515</span> </span>
            </li>
            <li class="right-top-bar bo1-b p-t-8 p-b-8"> <span>
                <i class="icon_mail" aria-hidden="true"></i>
                <span>mail@nsscrky.edu.in</span> </span>
            </li>
        </ul>
        <ul class="main-menu-m bg-main">
            <li class="bg-main goto_chilink"> <a href="<?= base_url() ?>">Home</a></li>
            <li class="has-main" data-nav="dept"> <a>DEPARTMENTS</a>
                <span style="float:right;margin-right:15px;" class="" data-nav="dept">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
                <ul class="sub-menu-m">
                    <?php if(!empty($menu_dept_data)): foreach($menu_dept_data as $dept): ?>
                    <li class="goto_chilink" > <a href="<?= base_url('Home/department_view/'.$dept['_dep_id'].'/'. preg_replace('#[ -]+#', '-', $dept['_department_name'])) ?>"><?= esc($dept['_department_name']) ?></a> </li>
                    <?php endforeach; endif; ?>
                </ul>
            </li>
            <li class="goto_chilink">
               <a href="<?= base_url('Home/programs') ?>">PROGRAMME</a>
            </li>
            <li class="bg-main goto_chilink"> <a href="<?= base_url('Home/ugc_projects') ?>">UGC Projects</a> </li>
            <li class="has-main"> <a>Downloads</a>
            <span style="float:right;margin-right:15px;" class="" data-nav="dept">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
                <ul class="sub-menu-m">
                    <li class="goto_chilink"> <a href="<?= base_url('assets/documents/magazine.pdf') ?>" target="_blank">College Magazine</a> </li>
                    <li class="goto_chilink"> <a href="<?= base_url('assets/documents/magazine.pdf') ?>" target="_blank">College Calender</a> </li>
                    <li class="goto_chilink"> <a href="<?= base_url('assets/documents/magazine.pdf') ?>" target="_blank">College Brochure</a> </li>
                </ul>
            </li>
            <li class="has-main"> <a>Students Corner</a>
            <span style="float:right;margin-right:15px;" class="" data-nav="dept">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
                 <ul class="sub-menu-m">
                    <li class="goto_chilink"> <a href="<?= base_url('Home/students_union') ?>">Students's Union</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/codeofconduct') ?>">Code of Conduct</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/college_examination') ?>">College Examination</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/scholarship') ?>">Scholarships</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/clubsandcells') ?>">Clubs & Cells</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/nationl_service_scheme') ?>">National Service Scheme</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/nationl_cadet_corps') ?>">National Cadet Corps</a></li>
                    <li><a href="<?= base_url('Evaluation') ?>">Evaluation</a></li>
                    <li><a target="_blank" href="<?= base_url('assets/feedback/survey1718.pdf') ?>">Survey result 2017-2018</a></li>
                    <li><a target="_blank" href="<?= base_url('assets/feedback/survey_result_chart_website.pdf') ?>">Survey result 2018-2019</a></li>
                    <li><a target="_blank" href="<?= base_url('assets/feedback/survey1920.pdf') ?>">Survey result 2019-2020</a></li>
                    <li><a target="_blank" href="<?= base_url('assets/feedback/survey2021.pdf') ?>">Survey result 2020-2021</a></li>
                    <li><a target="_blank" href="<?= base_url('assets/feedback/survey2122.pdf') ?>">Survey result 2021-2022</a></li>
                    <li><a href="<?= base_url('Home/rank_holder') ?>">Result</a></li>
                </ul>
            </li>
            <li class="has-main"> <a>ABOUT</a>
             <span style="float:right;margin-right:15px;" class="" data-nav="dept">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
                <ul class="sub-menu-m">
                    <li class="goto_chilink"> <a href="<?= base_url('Home/about') ?>">Our Management</a> </li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/principal_desk') ?>">Principal's Desk</a> </li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/college_counsil') ?>">College Counsil</a> </li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/staff') ?>">Teaching Staff</a></li>
                    <li class="goto_chilink"> <a href="<?= base_url('Home/non_staff') ?>">Non Teaching Staff</a> </li>
                </ul>
            </li>
            <li class="bg-main goto_chilink"> <a href="<?= base_url('Home/contact') ?>">Contact</a></li>
            <li class="bg-main goto_chilink"><a href="<?= base_url('registration') ?>">Application</a></li>
        </ul>
    </div>
</div>
