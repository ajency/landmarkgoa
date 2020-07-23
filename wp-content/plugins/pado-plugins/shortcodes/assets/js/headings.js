;(function ($, window, document, undefined) {
    'use strict';

    if ($('.headings.style5').length) {
        $('.headings.style5').each(function () {
            var head = $(this);
            var typingWords = head.find('.typed').data('words'),
                wordsArray = typingWords.split(',');
            head.find('.typed').each(function () {
                $(this).typed({
                    strings: wordsArray,
                    // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
                    stringsElement: null,
                    // typing speed
                    typeSpeed: 30,
                    // time before typing starts
                    startDelay: 1200,
                    // backspacing speed
                    backSpeed: 20,

                    // time before backspacing
                    backDelay: 500,
                    // loop
                    loop: true,
                    // false = infinite
                    loopCount: false,
                    // show cursor
                    showCursor: true,
                    // character for cursor
                    cursorChar: "|",
                    // attribute to type (null == text)
                    attr: null,
                    // either html or text
                    contentType: 'html',
                    // call when done callback function
                });
            })
        });
    }


})(jQuery, window, document);