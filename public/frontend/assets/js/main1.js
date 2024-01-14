/*  
    Author: Webartbd   
*/


(function($) {
    "use strict";

    /*------------------------------------
        01. Sticky Menu
    -------------------------------------- */
    var windows = $(window);
    var stick = $(".header-sticky");
    windows.on('scroll', function() {
        var scroll = windows.scrollTop();
        if (scroll < 245) {
            stick.removeClass("sticky");
        } else {
            stick.addClass("sticky");
        }
    });

    /*------------------------------------
        02. jQuery MeanMenu
    -------------------------------------- */
    $('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });

    /*----------------------------------------
        03. Owl Carousel
    ---------------------------------------- */
    /*----------------------------------------
        Slider Carousel
    ---------------------------------------- */
    $('.slider-wrapper').owlCarousel({
        loop: true,
        autoplay: true,
        center: true,
        autoplaySpeed: 1000,
        mouseDrag: true,
        touchDrag: true,
        // autoWidth: true,
        // animateOut: 'fadeOut',
        // animateIn: 'fadeIn',
        // smartSpeed: 500,
        items: 1,
        nav: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        dots: true
    });
    /*----------------------------------------
        Product Carousel
    ---------------------------------------- */
    $('.product-carousel').owlCarousel({
        loop: false,
        items: 1,
        autoplay: true,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            420: {
                items: 2
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1024: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
    /*----------------------------------------
        Feature Product Carousel
    ---------------------------------------- */
    $('.feature-product-carousel').owlCarousel({
        loop: false,
        autoplay: true,
        mouseDrag: true,
        items: 4,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                mouseDrag: true
            },
            420: {
                items: 1,
                mouseDrag: true
            },
            600: {
                items: 2,
                mouseDrag: true
            },
            800: {
                items: 2,
                mouseDrag: true
            },
            1024: {
                items: 2,
                mouseDrag: true
            },
            1200: {
                items: 3
            }
        }
    });
    /*----------------------------------------
        Blog Carousel
    ---------------------------------------- */
    $('.blog-carousel').owlCarousel({
        items: 3,
        mouseDrag: false,
        responsive: {
            0: {
                items: 1,
                mouseDrag: true
            },
            600: {
                items: 2,
                mouseDrag: true
            },
            800: {
                items: 3
            }
        }
    });
    /*----------------------------------------
        Product Carousel Two
    ---------------------------------------- */
    $('.product-carousel-two').owlCarousel({
        loop: false,
        autoplay: true,
        items: 4,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            420: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1024: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });
    /*----------------------------------------
        Related Product Carousel
    ---------------------------------------- */
    $('.related-product-carousel').owlCarousel({
        items: 4,
        autoplay: true,
        mouseDrag: false,
        nav: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                mouseDrag: true,
                nav: true
            },
            400: {
                items: 1,
                mouseDrag: true,
                nav: true
            },
            600: {
                items: 2,
                mouseDrag: true,
                nav: true
            },
            800: {
                items: 3,
                mouseDrag: true,
                nav: true
            },
            1024: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });
    /*------------------------------------------
        04. ScrollUp
    ------------------------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-chevron-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*------------------------------------------
        05. Wow js
    -------------------------------------------- */
    new WOW().init();

    /*------------------------------------------
        06. Isotope
    -------------------------------------------- */
    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-item'
        }
    });

    /*----------------------------------------
        07. Slick Slider
    ------------------------------------------*/
    $('.product-thumbnail-slider').slick({
        autoplay: false,
        infinite: true,
        centerPadding: '0px',
        focusOnSelect: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-image-slider',
        arrows: false
    });

    $('.product-image-slider').slick({
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        autoplay: false,
        infinite: true,
        slidesToShow: 1,
        asNavFor: '.product-thumbnail-slider'
    });

    /*-----------------------------------------
        08. Newletter Modal On Load
    ----------------------------------------- */
    var win = $(window);
    win.on('load', function() {

        setTimeout(function() {
            $('#newslettermodal').modal('show');
        }, 4000);
        // $('#newslettermodal').modal('show');
    });

    /*------------------------------------
        09. Scroll Down
    -------------------------------------- */
    $('.scroll-down').on('click', function() {
        $('html, body').animate({ scrollTop: $('.scroll-area').offset().top - 100 }, 'slow');
        return false;
    });


    /*-----------------------
        Testimonial-active
    -----------------------------------*/
    $('.testimonial-active').slick({
        autoplay: true,
        infinite: true,
        centerPadding: '0px',
        focusOnSelect: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.testimonial-text-slider',
        responsive: {
            0: {
                items: 1,
                mouseDrag: true,
                nav: true
            },
            400: {
                items: 2,
                mouseDrag: true,
                nav: true
            },
            600: {
                items: 3,
                mouseDrag: true,
                nav: true
            },
            800: {
                items: 3,
                mouseDrag: true,
                nav: true
            },
            1024: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });


    /*-----------------------
    Testimonial Slick Carousel
    -----------------------------------*/
    $('.testimonial-text-slider').slick({
        autoplay: false,
        infinite: true,
        centerPadding: '0px',
        focusOnSelect: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.testimonial-active',
        arrows: false
    });


    /*-----------------------
    Top Add Slick Carousel
    -----------------------------------*/
    $('.topadd-text-slider').slick({
        autoplay: true,
        infinite: true,
        centerPadding: '0px',
        focusOnSelect: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        speed: 1000,
        // centerMode: true,
        // focusOnSelect: true
        //asNavFor: '.testimonial-active',
        arrows: false
    });

    /*--
       pro-details color Active
    -----------------------------------*/
    $('.pro-details-color-content label')
        .on('click', function() {
            $('.pro-details-color-content label').removeClass('active');
            $(this).addClass('active');
        });

    $('.pro-details-size-content label')
        .on('click', function() {
            $('.pro-details-size-content label').removeClass('active');
            $(this).addClass('active');
        });


    /*----------------------------
           images Zoom
       ------------------------------ */

    $('.product-zoom').zoom({
        on: 'mouseover',
        url: false,
        touch: true,
        duration: 120,
        magnify: 2
    });


    function activaTab(tab) {
        $('.nav a[href="#' + tab + '"]').tab('show');
    };




})(jQuery);