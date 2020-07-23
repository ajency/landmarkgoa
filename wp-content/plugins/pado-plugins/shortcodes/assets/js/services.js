;(function ($, window, document, undefined) {
    'use strict';

    $('.services.accordion .toggle').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        $this.toggleClass('active').parent().siblings().find('.toggle').removeClass('active');
        $this.next().slideToggle(350).toggleClass('is-show').parent().siblings().find('.is-show').slideUp(350).removeClass('is-show');
        $this.find('i').toggleClass('ion-minus').toggleClass('ion-plus').parent().parent().siblings().find('i').removeClass('ion-minus').addClass('ion-plus');
    });

    function calcSliderWidth() {
        if ($('.services.slider-large').length) {
            $('.services.slider-large').each(function () {
                var slider = $(this).find('.services-slider').css('width', 'auto');
                if ($(window).outerWidth() > 767) {
                    var windowWidth     = $(window).outerWidth();
                    var sliderWrapWidth = $(this).outerWidth();
                    var sliderWidth     = $(slider).outerWidth();

                    var sliderWidth = sliderWidth + (windowWidth - sliderWrapWidth) / 2;

                    $(slider).css('width', sliderWidth);
                }
            });
        }
    }

    $(window).on('load', function () {
        calcSliderWidth();
        $(window).trigger('resize');
    });

    $(window).on('resize', function () {
        calcSliderWidth();
    });

    window.addEventListener("orientationchange", function () {
        calcSliderWidth();
    });

})(jQuery, window, document);