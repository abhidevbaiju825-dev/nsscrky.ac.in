<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Internal Marks</title>
        <meta charset="UTF-8">
        <meta name="description" content="NSS College Rajakumari was established and started functioning as a First grade degree college in the year 1995 and is affiliated to Mahatma Gandhi University, Kottayam, Kerala.The College offers three job degree courses, BBA, BCA, BSc. (Electronics) and B-Com (Model II), having six semesters spreading over three years.To comply with UGC requirements a new course, B-Com with Computer Applications was started in the year 2002." />
        <meta name="keywords" content="nss college ,nss rajakumari,msc electronics ,colleges in rajakumari,top 10 colleges in kerala,nss,rajakumari,colleges in kerala,studey bcom,study bsc electronics,toprated colleges in kerala,colleges in wayanadu,rajakumari college," />
        <meta name="author" content="Shahnad - SD Ignosi Enterprises" />
        <meta name="copyright" content="Ignosi Enterprises Pvt. Ltd.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

<script>
function loadM() {
    var e = document.getElementById("y");
    var s = document.getElementById("s");
    var c = document.getElementById("c");
    var text = c.options[c.selectedIndex].text+" "+e.options[e.selectedIndex].text+" "+s.options[s.selectedIndex].text;

 document.getElementById("idviewh").innerHTML = text;
     document.getElementById("idview").src= "/assets/inte/"+text.replaceAll(/\s/g,'')+".pdf";
}

</script>
<style>
   table, tr, th {
    border: none;
}
</style>
    </head>

    <body class="animsition restyle-index">
        <header>
            
        </header>
        <section class="bgwhite">
            <div class="container">
                <div class="row">
                 <div class="col-md-12 col-lg-12 p-b-30">
                        <div class="container p-b-6">
                            <div class="p-t-10">
                                <h3 class="p-b-8 special_text">
                                    Internal Marks 
                                </h3>
                                <div class="bg-main size2 bo-rad-3"></div>
                            </div>
                        </div>
                         <select class="selectpicker" id="c">
                        <option>MSc Electronics</option>
                        <option>BCom Model 1</option>
                        <option>BCom Model 2</option>
                        <option>BSc Electronics</option>
                        <option>BBA</option>
                        <option>BCA</option>
                        </select>
                  <select class="selectpicker" id="y">
                        <option>2021</option>
                        <option>2020</option>
                        <option>2019</option>
                        <option>2018</option>
                        <option>2017</option>
                        </select>
                    <select class="selectpicker" id="s">
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                        <option>S4</option>
                        <option>S5</option>
                        <option>S6</option>
                        </select>
                        <button type="button" class="btn btn-primary btn-sm" onclick=loadM()>View</button>
                        <b><p  id="idviewh"></p></b>
                <div><embed id="idview" src="/assets/inte/nss.pdf" width="100%" height="800px" /></div>
                    </div>
                 
                 
                </div>
            </div>
        </section>
        <footer class="bg4 p-t-25">
            
        </footer>
        <!-- Back to top -->
        <div class="btn-back-to-top hov-bg-main" id="myBtn"> <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span> </div>
        

        <!--<script src="<?php //echo base_url();?>/assets/js/main.js"></script>-->
    </body>
</html>


<?= $this->endSection() ?>
