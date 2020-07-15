/* ------------------------------------------- */
/* HEADER */
/* ------------------------------------------- */
;(function ($, window, document, undefined) {
    "use strict";

    $('.mob-nav').on('click', function (event) {
        event.preventDefault();
        $('html').addClass('sidebar-open no-scroll');
        $('#topmenu').addClass('open');
    });

    $('.mob-nav-close').on('click', function (event) {
        event.preventDefault();
        $(this).parent().removeClass('open');
        $('html').removeClass('no-scroll sidebar-open');
    });

    $('.mob-but-full').on('click', function (event) {
        event.preventDefault();
        $(this).toggleClass('active');
        $('html').toggleClass('no-scroll');
        if ($('#topmenu-full').hasClass('open')) {
            $('html').removeClass('no-scroll').height('auto');
            $('#topmenu-full').find('.sub-menu').slideUp();
            $('#topmenu-full').toggleClass('open');
            setTimeout(function () {
                $('#topmenu-full').animate({'width': 'toggle'}, 500);
            }, 800);
        } else {
            $('#topmenu-full').animate({'width': 'toggle'}, 500).css('padding-top', ($('.header_top_bg').outerHeight() + $('#wpadminbar').outerHeight()) + 'px');
            setTimeout(function () {
                $('#topmenu-full').toggleClass('open');
            }, 400);
        }
    });

    $('#topmenu-full .menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
        $(this).parent().siblings().find('.sub-menu').slideUp();
        $(this).next().slideToggle();
    });

    // SEARCH POPUP
    $('.open-search').on('click', function () {
        $('body').css('overflow', 'hidden');
        $('.site-search').addClass('open');
        setTimeout(function() {
            $('.site-search').find('#search-input').focus();
        }, 100);
    });

    $('.close-search').on('click', function () {
        $('body').css('overflow', '');
        $('.site-search').removeClass('open');
    });

    $('.aside .menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
        if (($(window).width() > 1024)) {
            $(this).parent().siblings().find('a').removeClass('active').next().slideUp();
            $(this).toggleClass('active').next().slideToggle();
        }
    });

    $(document).on('click', function(e) {
        e.stopPropagation();
        if (!$(e.target).closest(".aside .topmenu .menu").length) {
            if (($(window).width() > 1024)) {
                $('.aside .menu-item-has-children > a').removeClass('active').next().slideUp();
            }
        }
    });

    $('.header-overlay').on('click', function () {
        $('html').removeClass('no-scroll sidebar-open');
        $('#topmenu').removeClass('open');
    });

    function menuArrows() {
        if (($(window).width() <= 1024)) {
            $('header.simple .menu-item-has-children, header.aside .menu-item-has-children').each(function () {
                if (!$(this).find('.menu-arrow').length) {
                    $(this).append( "<i class='menu-arrow'></i>" );
                }
            });

            $('.menu-arrow').on('click', function () {
                if (!$(this).hasClass('animation')) {
                    $(this).addClass('animation');
                    $(this).closest('.menu-item').siblings('.menu-item-has-children').find('.menu-arrow').removeClass('open').siblings('.sub-menu').slideUp();
                    $(this).toggleClass('open').siblings('.sub-menu').slideToggle();
                }

                setTimeout(removeClass, 400);

                function removeClass() {
                    $('.menu-arrow').removeClass('animation');
                }
            })
        }
    }

    function addClassForAside() {
        if ($('header').hasClass('aside')) {
            $('body').addClass('static-menu');
        }
    }

    function deleteClass () {
        if ($(window).outerWidth() > 1024) {
            $('html').removeClass('no-scroll sidebar-open').height('auto');
            $('#topmenu').removeClass('open');
        }
    }

    function addPadding() {
        if ($(window).outerWidth() <= 1024) {
            $('#topmenu').css('padding-top', $('#wpadminbar').outerHeight() + 'px');
        } else {
            $('#topmenu').css('padding-top', 0);
        }
    }

    function fixedMenu() {
		if ($('#wpadminbar').length && $(window).width() < 768) {
			$('#wpadminbar').css({
				'position': 'fixed',
				'top': '0'
			})
		}

        if ($('#wpadminbar').length) {
            var adminbarHeight = $('#wpadminbar').outerHeight();

            if ($('.header_top_bg.fixed-header').length || $('.header_top_bg.header_trans-fixed').length) {
                $('.header_top_bg').css('margin-top', adminbarHeight);
            }
        }

        if ($(window).scrollTop() >= 150) {
            if ($('.header_top_bg.header_trans-fixed').length) {
                $('.header_top_bg.header_trans-fixed').addClass('bg-fixed-color');
                $('.logo-hover, .header-button-scroll').show();
                $('.main-logo, .header-button-default').hide();
            }
        } else {
            if ($('.header_top_bg.header_trans-fixed').length) {
                $('.header_top_bg.header_trans-fixed').removeClass('bg-fixed-color');
                $('.logo-hover, .header-button-scroll').hide();
                $('.main-logo, .header-button-default').show();
            }
        }
    }

    $(window).on('load', function () {
        menuArrows();
        addPadding();
        addClassForAside();
        fixedMenu();
    });

    $(window).on('resize', function () {
        deleteClass();
        menuArrows();
    });

    window.addEventListener("orientationchange", function () {
        fixedMenu();
        addPadding();
        menuArrows();
    });

    $(window).on('resize scroll', function () {
        fixedMenu();
        addPadding();
    });
})(jQuery, window, document);

