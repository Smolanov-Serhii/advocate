$( document ).ready(function() {

    var $menu = $("#header");
    var time = 2,
        cc = 1;
    var target = $('.footer');
    var targetPos = target.offset().top;
    var winHeight = $(window).height();
    var scrollToElem = targetPos - winHeight;

    $(window).scroll(function() {
        var winScrollTop = $(this).scrollTop();
        if(winScrollTop > scrollToElem){
            $('.header__logo').fadeOut(300);
        }else {
            $('.header__logo').fadeIn(300);
        }

        if ( $(this).scrollTop() > 100 && $menu.hasClass("default")  && $(window).innerWidth() > 1020 ){
            $menu.removeClass("default").addClass("moved");
        } else if($(this).scrollTop() <= 100 && $menu.hasClass("moved")) {
            $menu.removeClass("moved").addClass("default");
        }
        $('#about').each(function() {
            var
                cPos = $(this).offset().top,
                topWindow = $(window).scrollTop();
            viewportHeight = $(window).height();
            if ((topWindow + viewportHeight) - cPos > viewportHeight / 6) {
                if (cc < 2) {
                    $(".number").addClass("viz");
                    $('span').each(function() {
                        var
                            i = 1,
                            num = $(this).data('num'),
                            step = 1000 * time / num,
                            that = $(this),
                            int = setInterval(function() {
                                if (i <= num) {
                                    that.html(i);
                                } else {
                                    cc = cc + 2;
                                    clearInterval(int);
                                }
                                i++;
                            }, step);
                    });
                }
            }
        });
    });

    // function slidescreen() { h = $(window).height(); $(".screen").css('height', h); };

    // $(window).resize(slidescreen);
    // $(document).ready(slidescreen);
    //
    // $(document).bind('mousewheel DOMMouseScroll', function(event) { scroll(event); });
    //
    // var num = 1;
    // var scrolling = false;
    // var FootElem = $('#footer');
    // var targetPosition = FootElem.offset().top;
    // var targetHeight = FootElem.height();
    // var windowHeight = $(window).height();
    // var scrollToElem = targetPosition - windowHeight;
    // function scroll(event) {
    //     if($('body').hasClass('locked')){
    //
    //     }else{
    //         var winScrollTop = $(window).scrollTop();
    //         if (scrollToElem + windowHeight + targetHeight - 100 < winScrollTop ) {
    //             num = 6;
    //         } else {
    //             if (!scrolling) {
    //                 scrolling = true;
    //                 if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
    //                     num--;
    //                     num = num < 1 ? 1 : num;
    //                 } else {
    //                     num++;
    //                     num = num > $(".screen").length ? $(".screen").length : num;
    //                 }
    //                 var Elemid = $(".screen" + num).prop("id");
    //                 var scrollTop = $('#' + Elemid).offset().top;
    //                 var LeftMenu = $('#left-menu').find('a[href^="#' + Elemid + '"]').closest('li');
    //                 $('#left-menu li').removeClass('active');
    //                 LeftMenu.addClass('active');
    //                 // $(document).scrollTop(scrollTop);
    //                 scrolling = false;
    //             }
    //         }
    //     }
    // }

    jQuery(function($) {

        const section = $('.screen'),
            nav = $('#left-menu'),
            navHeight = nav.outerHeight(); // получаем высоту навигации

        // поворот экрана
        window.addEventListener('orientationchange', function () {
            navHeight = nav.outerHeight();
        }, false);

        $(window).on('scroll', function () {
            const position = $(this).scrollTop();

            section.each(function () {
                const top = $(this).offset().top - navHeight - 5,
                    bottom = top + $(this).outerHeight();

                if (position >= top && position <= bottom) {
                    nav.find('li').removeClass('active');
                    // section.removeClass('active');
                    // $(this).addClass('active');
                    nav.find('a[href="http://advocate.front-end-dev.com.ua/#' + $(this).attr('id') + '"]').closest('li').addClass('active');
                }
            });
        });

        nav.find('a').on('click', function () {
            const id = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(id).offset().top - navHeight
            }, 487);

            return false;
        });

    });
    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 200, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1200, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
    if ($("#left-menu").length){
        $('#left-menu li:first-child').addClass('active');
    };
    $(".header__burger").click( function(e) {
        $('body').toggleClass('locked');
        $('.header__mobile-menu').fadeToggle(300);
        $('.header__burger').toggleClass('active');
    });
    $("#top-mob-menu a").click( function(e) {
        $('body').toggleClass('locked');
        $('.header__mobile-menu').fadeToggle(300);
        $('.header__burger').toggleClass('active');
    });
    $(".js-form").click( function(e) {
        $('.popup').fadeIn(300);
        $('body').addClass('locked');
    });
    $(".popup__close").click( function(e) {
        $('.popup').fadeOut(300);
        $('body').removeClass('locked');
    });
    $(".js-show-all").click( function(e) {
        $(this).fadeOut(300);
        $('.branch__item ')
            .css("display", "flex")
            .hide()
            .fadeIn(300);
    });
    if ($(".popup").length){
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            $('.popup').fadeOut(300);
            $('#success-send').fadeIn(300);
            $('.wpcf7-response-output').empty();
            setTimeout(function (){
                $('#success-send').fadeOut(300);
                $('body').removeClass('locked');
            }, 2000);
        }, false );
    };
    if ($(".header").length){
        $(".mobile-burger").click( function(e) {
            $('.mobile-menu').fadeToggle().css('display', 'flex');
            $('body').toggleClass('locked');
        });

        $("#top-menu a").click( function(e) {
            var TopId = $(this).prop('href').split('#')[1];
            var LeftMenu = $('#left-menu').find('a[href^="#' + TopId + '"]').closest('li');
            $('#left-menu li').removeClass('active');
            LeftMenu.addClass('active');
            $set = $('#top-menu a');
            $('#top-menu').on('click', 'a', function () {
                var n=$set.index(this);
                num = n+1;
            });
        });
        $("#footer-menu a").click( function(e) {
            var TopId = $(this).prop('href').split('#')[1];
            var LeftMenu = $('#left-menu').find('a[href^="#' + TopId + '"]').closest('li');
            $('#left-menu li').removeClass('active');
            LeftMenu.addClass('active');
            $set = $('#footer-menu a');
            $('#footer-menu').on('click', 'a', function () {
                var n=$set.index(this);
                num = n+1;
            });
        });
    };
    var swiper = new Swiper(".reviews__list", {
        slidesPerView: 3,
        centeredSlides: true,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
});




