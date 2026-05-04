<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details</title>
    <meta charset="UTF-8">
    <meta name="description" content="AuCreative theme tempalte">
    <meta name="author" content="AuCreative">
    <meta name="keywords" content="AuCreative theme template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body class="animsition restyle-index">
    <header>
        
    </header>
    <!--
        <div class="bg1 p-t-29 p-b-8">
            <div class="container">
                <div class="flex-w">
                    <span>
                        <a href="<?php echo site_url('Home');?>" class="s-txt21 hov-color-main trans-02">
                            <i class="fa fa-home"></i>Home</a>
                        <span class="s-txt21 p-l-6 p-r-9">/</span>
                    </span>
                    <span>
                        <span class="s-txt21">
                            <a href="<?php echo site_url('Home/news');?>" style="color:grey;">
                               <?php if(isset($activity)||isset($dept_activity)){ echo "Activity";}else if(isset($news)){echo "News";} ?></a>
                        </span>
                    </span>
                </div>
            </div>
        </div>
-->
    <section class="bgwhite p-t-30">
        <div class="container">
            <?php if(isset($activity)){ ?>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 m-lr-auto">
                    <div class=" p-b-1">
                        <div class="p-b-10">
                            <h3 class="p-b-8 special_text">
                                <?php if(isset($activity->_title)){ echo $activity->_title; }  ?>
                            </h3>
                            <div class="bg-main size2 bo-rad-3 "></div>
                        </div>
                    </div>
                    <div class="p-r-20 p-r-0-md">
                        <!-- <div class="wrap-pic-w bo2-b"> <img src="<?php //if(!empty($activity->_imgloc)){ echo base_url($activity->_imgloc); } else{ echo base_url('assets/images/bg_default.png');}?>" alt="IMG-COURSE" style="width:250px;height:189px;border: 1px solid #c7c7c7;"> </div> -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-11 col-lg-11 m-lr-auto">
<!--
                    <h4 class="m-txt4 p-t-10 p-b-5" style="font-size:16px;">
                        <?php //if(isset($activity->_title)){ echo $activity->_title; } ?>
                    </h4>
-->
                    <p class="s-txt2 p-t-1 p-b-24" style="text-align:justify">
                        <?php  if(isset($activity->_description)) {echo $activity->_description; } ?>
                    </p>
                </div>
            </div>
            <?php } else if(isset($news)){?>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 m-lr-auto p-b-50">
                    <div class=" p-b-1">
                        <div class="p-b-10">
                            <h3 class="p-b-8 special_text">
                                <?php if(isset($news)){ echo $news->_news_title; }  ?>
                            </h3>
                            <div class="bg-main size2 bo-rad-3 "></div>
                        </div>
                    </div>
                    <div class="p-r-20 p-r-0-md">
                        <!-- <div class="wrap-pic-w bo2-b"> <img src="<?php //if(!empty($news->_imgloc)){ echo base_url($news->_imgloc); } else{ echo base_url('assets/images/bg_default.png');}?>" alt="IMG-COURSE" style="width:250px;height:189px;border: 1px solid #c7c7c7;"> </div>
                        </div> -->
                    </div>
                    <div class="col-sm-12 col-md-11 col-lg-11 m-lr-auto p-b-50">
<!--
                        <h4 class="m-txt4 p-t-10 p-b-5">
                            <?php if(isset($news->_news_title)){ echo $news->_news_title; } ?>
                        </h4>
-->
                        <p class="s-txt2 p-t-1 p-b-24" style="text-align:justify">
                            <?php if(isset($news->_news_description)){ echo $news->_news_description; }?>
                        </p>
                    </div>
                </div>
                <?php }else if(isset($dept_activity)){ ?>
                <div>
                    <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-12 m-lr-auto p-b-50">
                            <div class=" p-b-0">
                                <h4 class="m-txt4 p-t-10 p-b-0" style="font-size:16px;">&nbsp &nbsp
                                    <?php if(isset($dept_activity->_activity_name)){ echo $dept_activity->_activity_name; } ?>
                                </h4>
                                <div class="bg-main size2 bo-rad-3 "></div>
                            </div>
                            <p class="s-txt2 p-t-5 p-l-10" style="text-align:justify; line-height:2;font-size:16px;">
                                <?php if(isset($dept_activity->_actitvity_description)){ echo $dept_activity->_actitvity_description; }?>
                            </p>
<!--                            <a href="<?php echo base_url('Home');?>" style="width:10%;" class="btn-drive size1 m-txt1 bg-main ">Back</a>-->
                        </div>
                    </div>
                </div>

                <?php }else if(isset($alumnidata)){?>
                <div>
                    <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-12 m-lr-auto p-b-50">
                            <div class=" p-b-0">
                                <h4 class="m-txt4 p-t-10 p-b-0" style="font-size:16px;">
                                    <?php if(isset($alumnidata->_title)){ echo $alumnidata->_title; } ?>
                                </h4>
                                <div class="bg-main size2 bo-rad-3 "></div>
                            </div>
                            <p class="s-txt2 p-t-5 p-l-10" style="text-align:justify; line-height:2;font-size:16px;">
                                <?php if(isset($alumnidata->_description)){ echo $alumnidata->_description; }?>
                            </p>
<!--                            <a href="<?php echo base_url('Home');?>" style="width:10%;" class="btn-drive size1 m-txt1 bg-main ">Back</a>-->
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>


    <footer class="bg4 p-t-25">
        
    </footer>

    <div class="btn-back-to-top hov-bg-main" id="myBtn"> <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span> </div>
    
</body>

</html>


<?= $this->endSection() ?>
