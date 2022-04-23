(function ($) {

    "use strict";

    // Preloder
    function preloader() {
        $('.preloader').delay(100).fadeOut(500);
    }

    // Navbar
    var nav = $('.main-navigation');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 80) {
            nav.addClass("fixed-header");
        } else {
            nav.removeClass("fixed-header");
        }
    });

    // plus-minus Jquery
    $(function () {
        var valueElement = $('#value');

        function incrementValue(e) {
            valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
            return false;
        }

        $('#plus').bind('click', {increment: 1}, incrementValue);
        $('#minus').bind('click', {increment: -1}, incrementValue);
    });
    $(function () {
        let valueElement = $('#value-two');

        function incrementValue(e) {
            valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
            return false;
        }

        $('#plus-two').bind('click', {increment: 1}, incrementValue);
        $('#minus-two').bind('click', {increment: -1}, incrementValue);
    });


    $(document).ready(function () {
        let dropDown = $('.dropdown');
        //Show dropdown on hover only for desktop devices
        if ($(window).innerWidth() > 767) {
            dropDown.on({
                mouseenter: function () {
                    dropDown.clearQueue();
                    $(this).find('>.dropdown-menu').addClass('show');
                },
                mouseleave: function () {
                    $(this).find('>.dropdown-menu').removeClass('show');
                }
            });

        }
        //Show dropdown on click only for mobile devices
        if ($(window).innerWidth() < 768) {
            dropDown.on('click', function (event) {

                // Avoid having the menu to close when clicking
                event.stopPropagation();

                // close all the siblings
                $(this).siblings().removeClass('show');
                $(this).siblings().find('>.dropdown-menu').removeClass('show');

                // close all the submenus of siblings
                $(this).siblings().find('>.dropdown-menu').parent().removeClass('show');

                // opening the one you clicked on
                $(this).find('>.dropdown-menu').toggleClass('show');
                $(this).siblings('>.dropdown-menu').toggleClass('show');
            });
        }
    });

    // Scroll To Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    });


    // Floor Plan Tab
    $(".tab ul.tabs").addClass("active").find("> li:eq(0)").addClass("current");

    $(".tab ul.tabs li a").click(function (g) {
        var tab = $(this).closest(".tab"),
            index = $(this).closest("li").index();

        tab.find("ul.tabs > li").removeClass("current");
        $(this).closest("li").addClass("current");

        tab.find(".tab_content")
            .find("div.tabs_item")
            .not("div.tabs_item:eq(" + index + ")")
            .slideUp();
        tab.find(".tab_content")
            .find("div.tabs_item:eq(" + index + ")")
            .slideDown();

        g.preventDefault();
    });

    // Default Class Js // Use To Background Images // Not Delete JS //
    if ($('[data-background]').length > 0) {

        $('[data-background]').each(function () {
            var $background, $backgroundmobile, $this;
            $this = $(this);
            $background = $(this).attr('data-background');
            $backgroundmobile = $(this).attr('data-background-mobile');
            if ($this.attr('data-background').substr(0, 1) === '#') {
                return $this.css('background-color', $background);
            } else if ($this.attr('data-background-mobile') && device.mobile()) {
                return $this.css('background-image', 'url(' + $backgroundmobile + ')');
            } else {
                return $this.css('background-image', 'url(' + $background + ')');
            }
        });
    }
    // Default Class Js // Use To Background Images // Not Delete JS //

    //bootstrap Slider JS Start
    $('#slider-style-one').bsTouchSlider(false);
    //bootstrap Slider JS End


    //flexslider JS Start
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false
    });
    //flexslider JS End


    //slick JS Start
    $(document).ready(function () {
        $('.slick-slider-one').on('init', function (event, slick) {
            $('.animated').addClass('activate fadeInUp');
        });

        $('.slick-slider-one').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false,
            dots: true,
        });

        $('.slick-slider-one').on('afterChange', function (event, slick, currentSlide) {
            $('.animated').removeClass('off');
            $('.animated').addClass('activate fadeInUp');
        });

        $('.slick-slider-one').on('beforeChange', function (event, slick, currentSlide) {
            $('.animated').removeClass('activate fadeInUp');
            $('.animated').addClass('off');
        });
    });
    //slick JS Start

    //Video Player JS Strat
    $('.player').mb_YTPlayer();

    //LightBox / MagnificPopup start
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false
    });

    $('.lightbox-image').magnificPopup({
        type: 'image',
        removalDelay: 500,
        mainClass: 'mfp-fade',
        // other optionsgallery:
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },

        retina: {
            ratio: 1, // Increase this number to enable retina image support.
            // Image in popup will be scaled down by this number.
            // Option can also be a function which should return a number (in case you support multiple ratios). For example:
            // ratio: function() { return window.devicePixelRatio === 1.5 ? 1.5 : 2  }


            replaceSrc: function (item, ratio) {
                return item.src.replace(/\.\w+$/, function (m) {
                    return '@2x' + m;
                });
            } // function that changes image source
        }
    });
    //LightBox / MagnificPopup End


    // makes the parallax elements JQUARY Start
    function parallaxIt() {
        // create variables
        var $fwindow = $(window);
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        var $contents = [];
        var $backgrounds = [];

        // for each of content parallax element
        $('[data-type="content"]').each(function (index, e) {
            let $contentObj = $(this);

            $contentObj.__speed = ($contentObj.data('speed') || 1);
            $contentObj.__fgOffset = $contentObj.offset().top;
            $contents.push($contentObj);
        });

        // for each of background parallax element
        $('[data-type="parallax"]').each(function () {
            var $backgroundObj = $(this);

            $backgroundObj.__speed = ($backgroundObj.data('speed') || 1);
            $backgroundObj.__fgOffset = $backgroundObj.offset().top;
            $backgrounds.push($backgroundObj);
        });

        // update positions
        $fwindow.on('scroll resize', function () {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            $contents.forEach(function ($contentObj) {
                var yPos = $contentObj.__fgOffset - scrollTop / $contentObj.__speed;

                $contentObj.css('top', yPos);
            })

            $backgrounds.forEach(function ($backgroundObj) {
                var yPos = -((scrollTop - $backgroundObj.__fgOffset) / $backgroundObj.__speed);

                $backgroundObj.css({
                    backgroundPosition: '50% ' + yPos + 'px'
                });
            });
        });

        // triggers winodw scroll for refresh
        $fwindow.trigger('scroll');
    };
    parallaxIt();
    // Parallax elements JQUARY End

    // Type Slider JQUARY Start
    function typeSlider() {
        var TxtRotate = function (el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };
        TxtRotate.prototype.tick = function () {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 300 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function () {
                that.tick();
            }, delta);
        };
        window.onload = function () {
            var elements = document.getElementsByClassName('txt-rotate');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-rotate');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtRotate(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
            document.body.appendChild(css);
        };
    };
    typeSlider()
    // Type Slider JQUARY End

    // Theam Js

    // Counter / Funfact
    var funFact = $('.start-count');
    if (funFact.length) {
        funFact.each(function () {
            var $this = $(this);
            $this.data('target', parseInt($this.html()));
            $this.data('counted', false);
            $this.html('0');
        });

        $(window).bind('scroll', function () {
            var speed = 4000;
            funFact.each(function () {
                var $this = $(this);
                if (!$this.data('counted') && $(window).scrollTop() + $(window).height() >= $this.offset().top) {
                    $this.data('counted', true);
                    $this.animate({
                        dummy: 1
                    }, {
                        duration: speed,
                        step: function (now) {
                            var $this = $(this);
                            let val = Math.round($this.data('target') * now);
                            $this.html(val);
                            if (0 < $this.parent('.value').length) {
                                $this.parent('.value').css('width', val + '%');
                            }
                        }
                    });
                }
            });
        })
            .triggerHandler('scroll');
    }

    $('#sidebar-carousel').owlCarousel({
        loop: true,
        rtl: true,
        margin: 0,
        dots: true,
        nav: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1500,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    // Room Dimensions 1
    $('#room-carousel-slide-1').owlCarousel({
        loop: true,
        margin: 10,
        rtl: true,
        nav: true,
        dots: true,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        autoplaySpeed: 2000,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp',
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    // Room Dimensions 2
    $('#room-carousel-slide-2').owlCarousel({
        loop: true,
        margin: 10,
        rtl: true,
        nav: true,
        dots: true,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        autoplaySpeed: 2000,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp',
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    // Room Dimensions 2
    $('#proparty-gallery').owlCarousel({
        loop: true,
        margin: 15,
        rtl: true,
        nav: false,
        dots: true,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        autoplaySpeed: 2000,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp',
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

    // owl-carousel for Testimonial
    $('#testimonial-carousel-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        rtl: true,
        dots: true,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        autoplaySpeed: 2000,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        }
    });

    //  Team SLider
    $('#team-carousel-slider').owlCarousel({
        loop: false,
        margin: 15,
        rtl: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        autoplaySpeed: 1000,
        navText: [
            '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
            '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4,
            },
        }
    });

    // Shop Singel
    $('#baner-slider').owlCarousel({
        loop: true,
        margin: 0,
        rtl: true,
        dots: false,
        nav: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1500,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    // Shop Discription // Not Delete JS //
    $('#shop-3col-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        nav: false,
        autoplayHoverPause: false,
        autoplay: true,
        smartSpeed: 1500,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    // slider Carousel Three
    $('#slider-three').owlCarousel({
        loop: false,
        margin: 30,
        rtl: true,
        dots: false,
        nav: true,
        autoplayHoverPause: false,
        autoplay: false,
        smartSpeed: 1500,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });


    // Video popup
    jQuery("a.demo").YouTubePopUp();

    // Magnific-popup
    $('.popup-image').magnificPopup({
        type: 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        // other options
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        }
    });

    //Setup Filterizr
    if ($('.filtr-container').length) {
        $('.filtr-container').imagesLoaded(function () {
            let filterizr = $('.filtr-container').filterizr();
        });
    }

    /* ==========================================================================
     When document is loading, do
     ========================================================================== */

    $(window).on('load', function () {
        // add your functions
        preloader();
    });

})(window.jQuery);

