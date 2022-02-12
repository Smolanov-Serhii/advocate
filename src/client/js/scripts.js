$( document ).ready(function() {
    function setCookie(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + expires : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }
    function getCookie(name) {
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if (cookie.length > 0) {
            offset = cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = cookie.indexOf(";", offset)
                if (end == -1) {
                    end = cookie.length;
                }
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return(setStr);
    }


    var time = 2,
        cc = 1;
    $(window).scroll(function() {
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

    function slidescreen() { h = $(window).height(); $(".screen").css('height', h); };

    $(window).resize(slidescreen);
    $(document).ready(slidescreen);

    $(document).bind('mousewheel DOMMouseScroll', function(event) { scroll(event); });

    var num = 1;
    var scrolling = false;

    function scroll(event) {
        // event.preventDefault();
        if (!scrolling) {
            scrolling = true;
            if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
                num--;
                num = num < 1 ? 1 : num;
            } else {
                num++;
                num = num > $(".screen").length ? $(".screen").length : num;
            }
            var Elemid = $(".screen" + num).prop("id");
            var scrollTop = $('#' + Elemid).offset().top;
            var LeftMenu = $('#left-menu').find('a[href^="#' + Elemid + '"]').closest('li');
            $('#left-menu li').removeClass('active');
            LeftMenu.addClass('active');
            $(document).scrollTop(scrollTop);
            scrolling = false;
        }
    }
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

    if ($(".popup-fade").length){
        if(getCookie('quize') == "true"){
            $('.video').fadeIn(300);
        }
        $(".js-try").click( function(e) {
            var CurrentAbonement = $(this).closest('.best__item').find('.best__item-title').html();
            $('input.zakaz').val(CurrentAbonement);
            $('body').addClass('locked');
            $('.popup-fade').fadeIn(300);
            $('.quize').fadeIn(300);
            quizeslider();
        });
        $(".close-quize").click( function(e) {
            $('body').removeClass('locked');
            $('.popup-fade').fadeOut(300);
            $('.quize').fadeOut(300);
        });
        $(".get-result").click( function(e) {
            var CurrentLevel = $('#start-level input:checked').val();
            var CurrentCel = $('#cel input:checked').val();
            var chackedbox = $("input.agree:checked").length;
            var CurrentMail = $('.quize-main').val();
            $('input.level').val(CurrentLevel);
            $('input.cel').val(CurrentCel);
            $('input.quize-mail').val(CurrentMail);
            var counter = 0;
            if(!CurrentMail){
                $('.mail-row .error').fadeIn(300);
            } else {
                counter++;
            }
            if (chackedbox == 0) {
                $('.agree-error').fadeIn(300);
            } else {
                counter++;
            }
            if(counter == 2){
                $( ".quize-send" ).trigger( "click" );
                setCookie('quize', 'true');
                $('.video').fadeIn(300);
                $('html, body').animate({
                    scrollTop: $("#video").offset().top  // класс объекта к которому приезжаем
                }, 1000); // Скорость прокрутки
            } else {

            }


        });
        $(".close-callback").click( function(e) {
            $('body').removeClass('locked');
            $('.popup-fade').fadeOut(300);
            $('.popup-callback').fadeOut(300);
        });

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            $('body').removeClass('locked');
            $('.popup-fade > div').fadeOut(300);
            $('.popup-fade').fadeOut(300);
            $('.wpcf7-response-output').empty();
            setTimeout(function (){
                $('#success-send').removeClass('active-popup');
                console.log('send');
                $('.quize').fadeOut(300);
            }, 2000);
        }, false );
    };
    if ($(".header").length){
        $(".mobile-burger").click( function(e) {
            $('.mobile-menu').fadeToggle().css('display', 'flex');
            $('body').toggleClass('locked');
        });
        $(".mobile-menu li a").click( function(e) {
            $('.mobile-menu').fadeOut(300);
            $('body').toggleClass('locked');
        });
    };
});




