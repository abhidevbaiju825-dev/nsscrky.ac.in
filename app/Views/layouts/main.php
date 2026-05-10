<!DOCTYPE html>
<html lang="en">
<head>
    <title>NSS COLLEGE RAJAKUMARI - CI4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995..." />
    
    <link rel="icon" type="image/png" href="<?= base_url('uploads/static/icons/favicon.png') ?>"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/elegant-font/html-css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/revolution/css/layers.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/revolution/css/navigation.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/revolution/css/settings.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/lightbox2/css/lightbox.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animsition/dist/css/animsition.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/color.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/mystyle.css') ?>">

    <?= $this->renderSection('styles') ?>
</head>

<body class="animsition restyle-index">
    
    <header>
        <!-- Include Navbar View Cell -->
        <?= view_cell('App\Cells\NavbarCell::render') ?>
    </header>      
    
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg4 p-t-10">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12 col-lg-3 p-t-10">
                    <div class="">
                        <a href="<?= base_url('/') ?>"><img class="footer-img-main" src="<?= base_url('uploads/static/icons/logo-02.png') ?>" alt="LOGO"></a>
                    </div>
                    <p class="s-txt9 p-t-10 customer-text_confoot">
                        The N.S.S. College, Rajakumari got established and started functioning in June 1995. It is one among several prestigious centres of higher education under the auspices of Nair Service Society...
                    </p>
                </div>
                
                <div class="col-sm-6 col-lg-2 p-t-10">
                    <h4 class="m-txt12 p-t-14">Useful Links</h4>
                    <div class="wrap-link-footer p-t-28">
                        <ul class="col-left">
                            <li><a href="https://www.aicte-india.org/">AICTE</a></li>
                            <li><a href="https://www.naac.gov.in/">NAAC</a></li>
                            <li><a href="https://www.mhrd.gov.in/">MHRD</a></li>
                            <li><a href="https://nptel.ac.in/">NPTEL</a></li>
                            <li><a href="https://kerala.gov.in/home">Kerala Gov.</a></li>
                        </ul>
                        <ul class="col-right">
                            <li><a href="https://www.ugc.ac.in/">UGC</a></li>
                            <li><a href="http://www.antiragging.in/">Anti Ragging</a></li>
                            <li><a href="https://www.mgu.ac.in">M.G University</a></li>
                            <li><a href="https://www.ieee.org/">IEEE</a></li>
                            <li><a href="https://www.nirfindia.org/">NIRF</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-2 p-t-10">
                    <h4 class="m-txt12 p-t-14">Contact us</h4>
                    <ul class="contact-footer p-t-5">
                        <li><i class="fa fa-home" aria-hidden="true"></i> NSS College Rajakumari Kulappurachal P.O,Idukki Dist.- 685619</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> 04868-245370</li>
                        <li><i class="fa fa-fax" aria-hidden="true"></i> 04868-245515</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> mail@nsscrky.edu.in</li>
                    </ul>
                </div>
                
                <div class="col-sm-6 col-lg-5 p-t-10">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.654177138351!2d77.16909861428178!3d9.96270327641009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07a0f52b1a501d%3A0x5e52b98bfcc0d3e7!2sNSS+College!5e0!3m2!1sen!2sin!4v1544351228773" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg3 txt-center p-t-5 p-b-5">
            <span class="s-txt10">Designed <?= date('Y') ?> @ IGNOSI Technopark. CI4 Port.</span>
        </div>
    </footer>
    
    <div class="btn-back-to-top hov-bg-main" id="myBtn">
        <span class="symbol-btn-back-to-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></span>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/wow/wow.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/animsition/dist/js/animsition.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/slick/slick.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/slick-custom.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- Revolution Slider removed for brevity, will include if needed, actually let's include it to avoid breaking home -->
    <script src="<?= base_url('assets/vendor/revolution/js/jquery.themepunch.tools.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/revolution/js/jquery.themepunch.revolution.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/slide-custom.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/lightbox2/js/lightbox.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/isotope/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/parallax100/parallax100.js') ?>"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="<?= base_url('assets/vendor/sweetalert/sweetalert.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/contact.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/js/myscript.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
