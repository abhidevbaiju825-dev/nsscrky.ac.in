<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<html>
    <head>
        <title>NSS College, Rajakumari | Dashboard </title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        
    </head>
    <body>

        <div class="pusher">
            
            <div class="ui ">
                <div class="ui internally celled grid">
                    <div class="row">
                        <div class="thirteen wide mobile thirteen wide tablet three wide computer column">
                            <div class="ui vertical menu" style=" width: 100%;">
                                <a href="<?php echo site_url('Alumini_portal/loggedalumni_in');?>" class="teal item active">
                                    Dashboard
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
                                    <a class="active section">Dashboard</a>
                                </div>
                            </div>
                            <br>

                            <div class="ui grid">
                                <div class="sixteen column">
                                    <div class="ui raised segment">
                                        <a class="ui red ribbon label">Menu List</a>
                                        <span></span>
                                        <div class="ui grid mencs-conta">
                                            <?php if(!empty($profile)){ ?>
                                            <div class="row">
                                                <a href="<?php echo site_url('Alumini_portal/alumniprofile/'.$profile->_id); ?>" class="sixteen wide mobile four wide tablet three wide computer column">
                                                    <div class="menu-condshic">
                                                        <div class="insidegrop">
                                                            <div class="menu-topicon">
                                                                <i class="user outline icon" ></i>
                                                            </div>
                                                            <div class="menu-toptext">
                                                                <p>Alumni Profile</p>
                                                            </div>
                                                      
                                                        </div>
                                                    </div>
                                                </a> </div>
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>


<?= $this->endSection() ?>
