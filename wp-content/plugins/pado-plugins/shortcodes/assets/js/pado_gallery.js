;(function ($, window, document, undefined) {
    'use strict';

    $('.thumb-slider-wrapp-arrow').on('click', function () {
        $(this).toggleClass('active').parent().find('.sub-thumb-slider').toggleClass('active');
    });

    function initThumbFlexSlider() {
        $('.main-thumb-slider').flexslider({
            animation: "fade",
            animationSpeed: 600,
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: ".sub-thumb-slider"
        });

        $('.sub-thumb-slider').flexslider({
            animation: "slide",
            animationSpeed: 600,
            controlNav: true,
            animationLoop: false,
            direction: "horizontal",
            slideshow: false,
            itemWidth: 100,
            itemMargin: 5,
            mousewheel: true,
            prevText: '',
            nextText: '',
            asNavFor: '.main-thumb-slider'
        });
    }

    $(window).on('load', function () {
        if ($('.thumb-slider-wrapp').length) {
            initThumbFlexSlider();
        }
    });
})(jQuery, window, document);