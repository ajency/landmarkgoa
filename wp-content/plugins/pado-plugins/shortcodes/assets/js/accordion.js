;(function ($, window, document, undefined) {
    'use strict';

    var inputs = $('.wpcf7-file');
    Array.prototype.forEach.call(inputs, function (input) {
        input.addEventListener('change', function (e) {
            var label_id = this.getAttribute('id');
            var label    = $(this).closest('form').find('label[for=' + label_id + ']');

            var fileName = this.value.split('\\').pop();

            if (fileName)
                label.text(fileName);
        });
    });

    $('.accordion-title').on('click', function () {
        $(this).addClass('is_animated').closest('.accordion-header').next().addClass('is_animated');

        $(this).closest('.accordion_row').find('.accordion-content').not('.is_animated').slideUp();
        $(this).closest('.accordion_row').find('.accordion-title').not('.is_animated').removeClass('is_opened');

        if ($(this).hasClass('is_opened')) {
            $(this).removeClass('is_opened').closest('.accordion-header').next().slideUp();
        } else {
            $(this).addClass('is_opened').closest('.accordion-header').next().slideDown();
        }

        $(this).removeClass('is_animated').closest('.accordion-header').next().removeClass('is_animated');
    });

    $('.accordion-wrapper input[type="submit"]').on('click', function () {
        $(this).closest('.wpcf7').addClass('animated');

        setInterval(removeAnimationClass, 1200);
    });

    function removeAnimationClass() {
        $('.wpcf7').removeClass('animated');
    }

    function addClassRow() {
        if ($('.accordion-wrapper').length) {
            $('.accordion-wrapper').each(function () {
                $(this).closest('.vc_row').addClass('accordion_row');
            })
        }
    }

    $(window).on('load', function () {
        addClassRow();
    });

})(jQuery, window, document);