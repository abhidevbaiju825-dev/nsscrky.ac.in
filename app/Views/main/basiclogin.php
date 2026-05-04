<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="description" content="AuCreative theme tempalte">
        <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
        <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
        <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
        <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <style>
            #login_style{
                display: inline-block;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  padding: 10px 20px;
  border: 1px solid #b7b7b7;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal 16px/normal "Times New Roman", Times, serif;
  color: rgba(0,142,198,1);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: rgba(252,252,252,1);
  -webkit-box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
  box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.66) ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
                
            }


        </style>
    </head>
    <body class="animsition restyle-index">
        <header>
            
        </header>
        <section class="login-block" style="margin-top: 40px;margin-bottom: 51px;">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 login-sec"></div>
                    <div class="col-md-4 login-sec" id="login_style" >
                        <div class="header">
                            <?php if(isset($_SESSION['s_msg']['message'])){ echo $_SESSION['s_msg']['message']; } ?>
                        </div>
                        <?php if(isset($_SESSION['s_msg']['submessage'])){ echo $_SESSION['s_msg']['submessage']; } ?>
                        <?php if(isset($_SESSION['msg'])){ ?>

                        <?php echo $_SESSION['msg']['head']; ?>

                        <?php echo $_SESSION['msg']['msg']; ?>
                        <?php unset($_SESSION['msg']); } ?>

                        <div class="border_index">
                            <h2 class="text-center">Login</h2>
                            <form class="login-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('Home/user_login_validation') ?>">
    <?= csrf_field() ?>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                                    <input type="text" class="form-control" name="_username" placeholder="">

                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                                    <input type="password" name="_password" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 login-sec"></div> -->
                </div>
            </div>
        </section>


        <footer class="bg4 p-t-25">
            
        </footer>
        

    </body>
</html>

<?= $this->endSection() ?>
