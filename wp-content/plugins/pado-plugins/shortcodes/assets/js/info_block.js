;(function ($, window, document, undefined) {
    'use strict';

    if ($('.images-wrapper').length) {
        $('.images-wrapper').each(function () {
            $(this).not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 3,
                vertical: true,
                verticalSwiping: true,
                centerMode: true,
                cssEase: 'cubic-bezier(0.445, 0.050, 0.550, 0.950)',
                prevArrow: '<div class="slick-prev"><i class="ion-chevron-up"></i></div>',
                nextArrow: '<div class="slick-next"><i class="ion-chevron-down"></i></div>'
            });
        });
    }

    $(window).on('orientationchange', function () {
        $('.images-wrapper').slick('reinit');
    });

    $(window).on('resize', function () {
        $('.images-wrapper').slick('resize');
    })

})(jQuery, window, document);
