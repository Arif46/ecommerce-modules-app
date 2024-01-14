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
        Related Product Carousel
    ---------------------------------------- */
    $('.related-product-carousel').owlCarousel({
        items: 4,
        autoplay: true,
        mouseDrag: true,
        navigation: false,
        nav: false,
        dots: false,
        // navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
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
                items: 4
            },
            1200: {
                items: 4
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
    //new WOW().init();

    /*------------------------------------------
        06. Isotope
    -------------------------------------------- */
    // $('.grid').isotope({
    //     itemSelector: '.grid-item',
    //     percentPosition: true,
    //     masonry: {
    //         columnWidth: '.grid-item'
    //     }
    // });

    /*----------------------------------------
        product-thumbnail slider
    ------------------------------------------*/
    $('.product-thumbnail-slider').slick({
        autoplay: false,
        infinite: true,
        centerPadding: '0px',
        focusOnSelect: true,
        variableWidth: false,
        swipeToSlide: true,
        // centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-image-slider',
        arrows: false
    });

    $('.product-image-slider').slick({
        // prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        // nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        dots: false,
        prevArrow: false,
        nextArrow: false,
        autoplay: false,
        infinite: true,
        // centerMode: true,
        arrows: false,
        centerPadding: '0px',
        focusOnSelect: true,
        slidesToShow: 1,
        slidesToScroll: 1,
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

    $('.product-zoom')
        .wrap('<span style="display:inline-block"></span>')
        .css('display', 'block')
        // .parent()
        .zoom({
            on: 'mouseover',
            url: false,
            touch: false,
            duration: 120,
            magnify: 1
        });

    // $('.product-zoom').trigger('zoom.destroy');


    function activaTab(tab) {
        $('.nav a[href="#' + tab + '"]').tab('show');
    };

    /*====== sidebarSearch ======*/
    function sidebarSearch() {
        var searchTrigger = $('button.sidebar-trigger-search'),
            endTriggersearch = $('button.search-close'),
            container = $('.main-search-active');
        searchTrigger.on('click', function() {
            container.addClass('inside');
        });
        endTriggersearch.on('click', function() {
            container.removeClass('inside');
        });
    };
    sidebarSearch();

    /*====== sidebar active ======*/
    function sidebarNav() {
        var navbarTrigger = $('.header-navbar-active'),
            endTrigger = $('button.op-sidebar-close'),
            container = $('.sidebar-active'),
            wrapper = $('.wrapper');

        wrapper.prepend('<div class="body-overlay"></div>');

        navbarTrigger.on('click', function() {
            container.addClass('inside');
            wrapper.addClass('overlay-active');
        });

        endTrigger.on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active');
        });

        $('.body-overlay').on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active');
        });
    };
    sidebarNav();


    /* Sidemenu Dropdown */
    function sidemenuDropdown() {
        var $this = $('.sidebar-menu');
        $this.find('nav.menu .cr-dropdown')
            .find('ul').slideUp();
        $this.find('nav.menu li.cr-dropdown > a, nav.menu li.cr-sub-dropdown > a').on('click', function(e) {
            e.preventDefault();
            $(this).next().slideToggle();
        });
    }
    sidemenuDropdown();

})(jQuery);