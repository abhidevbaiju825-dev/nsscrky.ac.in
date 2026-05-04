$(document).ready(function(){
    $('.goto_chilink').click(function(){
       $href_l = $(this) .find('a').attr('href');
       if($href_l != ""){
           window.location = $href_l;
       }
    });
    $('.has-main').click(function(){
        //console.log("Called hee");
       //$('.arrow-main-menu-m[data-nav="'+$(this).attr('data-nav')+'"]').trigger('click');
       $(this).find('.sub-menu-m').slideToggle()
       /*if($(this).find('.sub-menu-m').hasClass('active')){
            $(this).find('.sub-menu-m').slideUp();
            $(this).removeClass('active');   
       }else{
           $(this).find('.sub-menu-m').slideDown();
           $(this).addClass('active');
       }*/
       
    });
    $(document).on('click','.goto_link_woc',function(){
        window.open($(this).attr('data-href'), '_blank');        
    });  
    $('.arrange_view_btn').click(function(){
        $data_id = $(this).attr('data-id');
        var teacher_data = JSON.parse($('#id_teacher_data_json').val());
        if(teacher_data.length != 0){
            popup_teacher_modal(teacher_data[$data_id]);
        }
    });
    $(document).on('click','.mam_cls_btn',function(){
        $('.main_modal_design').remove(); 
    });    
    $(document).on('click','.main_modal_design',function(ev){    
        if(ev.target == this){
            $('.main_modal_design').remove(); 
        }
    });
    function popup_teacher_modal($teacher_data){
        console.log($teacher_data);
        $pop_up = '<div class="main_modal_design"><div class="main_modal_content"><p class="mam_usp">User Profile</p><button class="mam_cls_btn"><i class="fa fa-close"></i></button><hr class="custom_hr"><h4 class="modal_text_name">'+$teacher_data['_name']+'</h4><img class="mm_img_div" src="'+$teacher_data['_profile_pic']+'" alt="">';
        if($teacher_data['_qualification'] != ""){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Qualification</p><div class="modal_cont_inner">'+$teacher_data['_qualification']+'</div></div>';
        }
        if($teacher_data['_designation'] != ""){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Designation</p><div class="modal_cont_inner">'+$teacher_data['_designation']+'</div></div>';
        }
        if($teacher_data['_department'] != ""){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Department</p><div class="modal_cont_inner">'+$teacher_data['_department']+'</div></div>';
        }
        if($teacher_data['_area_of_specialization'] != ""){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Area of Specialization</p><div class="modal_cont_inner">'+$teacher_data['_area_of_specialization']+'</div></div>';
        }
        if($teacher_data['_phone'] != "" && $teacher_data['_is_phone_public'] != 'no' ){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Phone</p><div class="modal_cont_inner">'+$teacher_data['_phone']+'</div></div>';
        }
        if($teacher_data['_email'] != "" ){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Email</p><div class="modal_cont_inner">'+$teacher_data['_email']+'</div></div>';
        }        
        for(var i=0;i<$teacher_data['array_paper_published'].length;i++){
            $pop_up += '<div class="modal_cont_para" ><p class="modal_cont_title">Paper Published On '+$teacher_data['array_paper_published'][i]['_format_date']+'</p><div class="modal_cont_inner"><p>Date:<b>'+$teacher_data['array_paper_published'][i]['_date']+'</b></p><p>Journal:<b>'+$teacher_data['array_paper_published'][i]['_journal']+'</b></p><p>Description:<b>'+$teacher_data['array_paper_published'][i]['_description']+'</b></p></div></div>';
        }

        $pop_up += '</div></div>';
        $pop_up += '</div></div>';
        $('body').append($pop_up);
    }
});
(function ($) {
    "use strict";

    /*==================================================================
    [ Load page ]*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="cp-spinner cp-skeleton"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });


    /*==================================================================
    [ Back to top ]*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input input, .validate-input textarea');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $(input).each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }


    /*==================================================================
    [ Fixed Header ]*/
    var menuHeader = $('.container-menu-desktop');
    var posWrapHeader = $('.top-bar').height();

    $(window).on('scroll',function(){
        if($(this).scrollTop() >= posWrapHeader) {
            $(menuHeader).addClass('fix-menu-desktop');
        }  
        else {
            $(menuHeader).removeClass('fix-menu-desktop');
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                                                       $(this).css('display','none');
                                                       $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                                                      }
            });

        }
    });


    /*==================================================================
    [ Play video 01 ]*/
    var srcOld = $('.video-mo-01').children('iframe').attr('src');

    $('[data-target="#modal-video-01"]').on('click',function(){
        $('.video-mo-01').children('iframe')[0].src += "&autoplay=1";

        setTimeout(function(){
            $('.video-mo-01').css('opacity','1');
        },300);      
    });

    $('[data-dismiss="modal"]').on('click',function(){
        $('.video-mo-01').children('iframe')[0].src = srcOld;
        $('.video-mo-01').css('opacity','0');
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });

    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('actived-1');
            }

            $(this).addClass('actived-1');


            if($(this).data('filter') == "*") {
                $('.isotope-grid-gallery .isotope-item a').attr('data-lightbox','all-gallery');
            }
            else {
                $('.isotope-grid-gallery ' + $(this).data('filter') + ' a').attr('data-lightbox',$(this).data('filter'));
            }
        });
    });


    /*==================================================================
    [ Show content Product detail ]*/
    $('.active-dropdown-content .js-toggle-dropdown-content').toggleClass('show-dropdown-content');
    $('.active-dropdown-content .dropdown-content').slideToggle();

    $('.js-toggle-dropdown-content').on('click', function(){
        $(this).toggleClass('show-dropdown-content');
        $(this).parent().find('.dropdown-content').slideToggle(300);
    });

    /*==================================================================
    [ Show gird / list course ]*/

    $('.js-show-grid').on('click', function(){
        $('.js-show-grid').addClass('actived-2');
        $('.js-show-list').removeClass('actived-2');
        $('.js-list').fadeOut();
        $('.js-grid').fadeIn();
    });

    $('.js-show-list').on('click', function(){
        $('.js-show-list').addClass('actived-2');
        $('.js-show-grid').removeClass('actived-2');
        $('.js-grid').fadeOut();
        $('.js-list').fadeIn();
    });

    /*
    ==================================================================
    [ Panel color setting ]*/
    /* $('body').append(*/
    /*'<div class="color-setting">' +
        '<div class="btn-show-panel">' +
        '<img src="<?php echo base_url();?>/assets/images/icons/color-palette.png" alt="IMG">' +
        '</div>' +

        '<div class="panel-color">' +
        '<div class="btn-hide-panel show-hide-btn flex-c-m">' +
        '<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>' +
        '</div>' +

        '<div class="title-panel">' +
        'Main color' +
        '</div>' +
        '<div class="color-blue"></div>' +
        '<div class="color-green"></div>' +
        '<div class="color-yellow"></div>' +
        '<div class="color-orange"></div>' +
        '</div>' +
        '</div>'*/
    /* );

    $('link[href="css/color.css"]').attr('id','color-css');

    $('.btn-show-panel').on('click', function(){
        $('.panel-color').slideDown('fast');
        $('.btn-show-panel').addClass('show-hide-btn');
        $('.btn-hide-panel').removeClass('show-hide-btn');
    });

    $('.btn-hide-panel').on('click', function(){
        $('.panel-color').slideUp('fast');
        $('.btn-show-panel').removeClass('show-hide-btn');
        $('.btn-hide-panel').addClass('show-hide-btn');
    });

    $('.color-blue').on('click', function(){
        $('#color-css').attr('href','css/color/blue/color.css');
    });

    $('.color-green').on('click', function(){
        $('#color-css').attr('href','css/color/green/color.css');
    });

    $('.color-yellow').on('click', function(){
        $('#color-css').attr('href','css/color/yellow/color.css');
    });

    $('.color-orange').on('click', function(){
        $('#color-css').attr('href','css/color/orange/color.css');
    });*/

})(jQuery);