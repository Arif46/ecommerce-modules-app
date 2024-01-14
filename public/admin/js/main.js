(function($) {
    'use strict';
    
    /*--
    Menu Stick
    -----------------------------------*/
    var header = $('.sticky-bar');
    var win = $(window);
    win.on('scroll', function() {
        var scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass('stick');
        } else {
            header.addClass('stick');
        }
    });
    
    
    
    
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
        var navbarTrigger = $('button.header-navbar-active'),
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
        var $this = $('.wrap-sidebar-menu');
        $this.find('nav.menu .cr-dropdown')
            .find('ul').slideUp();
        $this.find('nav.menu li.cr-dropdown > a, nav.menu li.cr-sub-dropdown > a').on('click', function(e) {
            e.preventDefault();
            $(this).next().slideToggle();
        });
    }
    sidemenuDropdown();
    
    
    
    
    
    /* language dropdown */
    $(".language li a").on("click", function(e) {
        e.preventDefault();
        $(this).parent().find('.lang-dropdown').slideToggle('medium');
    })
    
    
    
    /*=========================
		Toggle Ativation
	===========================*/
    function itemToggler() {
        $(".toggle-item-active").slice(0, 10).show();
        $(".item-wrapper").find(".loadMore").on('click', function(e) {
            e.preventDefault();
            $(this).parents(".item-wrapper").find(".toggle-item-active:hidden").slice(0, 5).slideDown();
            if ($(".toggle-item-active:hidden").length == 0) {
                $(this).parent('.toggle-btn').fadeOut('slow');
            }
        });
    }
    itemToggler();
    
    /*---------------------
        toggle item active2
    --------------------- */
    function itemToggler2() {
        $(".toggle-item-active2").slice(0, 16).show();
        $(".item-wrapper2").find(".loadMore2").on('click', function(e) {
            e.preventDefault();
            $(this).parents(".item-wrapper2").find(".toggle-item-active2:hidden").slice(0, 5).slideDown();
            if ($(".toggle-item-active2:hidden").length == 0) {
                $(this).parent('.toggle-btn2').fadeOut('slow');
            }
        });
    }
    itemToggler2();
    
    

    
    /*--
	   pro-details color Active
    -----------------------------------*/
    $('.pro-details-color2-content ul li')
        .on('click', function() {
            $('.pro-details-color2-content ul li').removeClass('active');
            $(this).addClass('active');
        });
    $('.product-sidebar-active').stickySidebar({
        topSpacing: 80,
        bottomSpacing: 30,
        minWidth: 767,
    });
    
    
    /*-------------------------
        Create an account toggle
    --------------------------*/
    $('.checkout-toggle2').on('click', function() {
        $('.open-toggle2').slideToggle(1000);
    });

    $('.checkout-toggle').on('click', function() {
        $('.open-toggle').slideToggle(1000);
    });
    
    
    /*-------------------------
      tooltip
    --------------------------*/
    $('[data-toggle="tooltip"]').tooltip()
    
 
    
    
    /*--------------------------
        ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    
    
   
    $('#mobile-menu-active').slicknav({
        appendTo : ".header-area",
        label : '<i class="menu-icon-open ti-menu"></i><i class="menu-icon-colse  ti-close"></i> ',
        closedSymbol: '<i class="ti-plus"></i>',
        openedSymbol : '<i class="ti-minus"></i>',

    });
    
    
    
    
    
    



})(jQuery);