;(function ($, window, document, undefined) {
    'use strict';

    $('body').fitVids({ignore: '.vimeo-video, .youtube-simple-wrap iframe, .iframe-video.for-btn iframe, .post-media.video-container iframe'});

    /*=================================*/
    /* 01 - VARIABLES */
    /*=================================*/
    var swipers                                    = [],
        winW, winH, winScr, _isresponsive, smPoint = 768,
        mdPoint                                    = 992,
        lgPoint                                    = 1200,
        addPoint                                   = 1600,
        _ismobile                                  = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i),
        pageCalculateHeight;


    /*Full height banner*/
    function topBannerHeight() {
        var headerH = $('.header_top_bg').not('.header_trans-fixed, .fixed-header').outerHeight() || 0,
            footerH = $('#footer').not('.fix-bottom').outerHeight() || 0,
            bannerH = $(window).height() - (headerH + footerH),
            windowH = $(window).height() - $('#wpadminbar').outerHeight();

        $('.full-height-window').css('min-height', (windowH - headerH) + 'px');

        $('.full-height-window-hard').css('height', (windowH - headerH) + 'px');
        $('.full-height').css('min-height', bannerH + 'px');
        $('body, .main-wrapper').css('min-height', $(window).height());

        $('.hard-full-height').css('height', (windowH - headerH) + 'px');

        $('.full-height-hard').css('height', bannerH + 'px');
    }

    /* IF TOUCH DEVICE */
    function isTouchDevice() {
        return 'ontouchstart' in document.documentElement;
    }

    /*=================================*/
    /* SWIPER SLIDER */
    /*=================================*/
    function initSwiper3() {
        var initIterator = 0;
        $('.swiper3-container').each(function () {
            var $t = $(this);

            var index = 'swiper3-unique-id-' + initIterator;
            $t.addClass('swiper3-' + index + ' initialized').attr('id', index);
            $t.parent().find('.swiper3-pagination').addClass('swiper3-pagination-' + index);

            if ($t.closest('.creative_slider').length) {
                $t.closest('.creative_slider').find('.swiper3-button-next').addClass('swiper3-button-next-' + index);
                $t.closest('.creative_slider').find('.swiper3-button-prev').addClass('swiper3-button-prev-' + index);
            } else {
                $t.parent().find('.swiper3-button-next').addClass('swiper3-button-next-' + index);
                $t.parent().find('.swiper3-button-prev').addClass('swiper3-button-prev-' + index);
            }

            var setThumb = function (activeIndex, slidesNum) {
                var leftClick           = $t.find('.slider-click.left'),
                    rightClick          = $t.find('.slider-click.right'),
                    customSliderCurrent = $t.find('.number-slides .current'),
                    customSliderTotal   = $t.find('.number-slides .total');
                if (loopVar === 1) {
                    if (activeIndex < 1) {
                        leftClick.removeClass('disabled').find('.left').text(slidesNum);
                        leftClick.find('.right').text(slidesNum);
                        // pado slider
                        ifZero(activeIndex, slidesNum);
                        customSliderCurrent.text(currentSwiper);
                        customSliderTotal.text(totalSwiper);
                    }
                    else {
                        leftClick.removeClass('disabled').find('.left').text(activeIndex);
                        leftClick.find('.right').text(slidesNum);
                        // yuk slider
                        ifZero(activeIndex, slidesNum);
                        customSliderCurrent.text(currentSwiper);
                        customSliderTotal.text(totalSwiper);
                    }
                    if (activeIndex == slidesNum - 1) {
                        rightClick.removeClass('disabled').find('.left').text('1');
                        rightClick.find('.right').text(slidesNum);
                        // yuk slider
                        ifZero(activeIndex, slidesNum);
                        customSliderCurrent.text(currentSwiper);
                        customSliderTotal.text(totalSwiper);
                    }
                    else {
                        rightClick.removeClass('disabled').find('.left').text(activeIndex + 2);
                        rightClick.find('.right').text(slidesNum);
                        // yuk slider
                        ifZero(activeIndex, slidesNum);
                        customSliderCurrent.text(currentSwiper);
                        customSliderTotal.text(totalSwiper);
                    }
                } else {
                    if (activeIndex < 1) {
                        leftClick.addClass('disabled');
                    }
                    else {
                        leftClick.removeClass('disabled').find('.left').text(activeIndex);
                        leftClick.find('.right').text(slidesNum);
                        // yuk slider
                        ifZero(activeIndex, slidesNum);
                        customSliderCurrent.text(currentSwiper);
                        customSliderTotal.text(totalSwiper);
                    }
                    if (activeIndex == slidesNum - 1) {
                        rightClick.addClass('disabled');
                    }
                    else {
                        rightClick.removeClass('disabled').find('.left').text(activeIndex + 2);
                        rightClick.find('.right').text(slidesNum);
                        // yuk slider
                        ifZero(activeIndex, slidesNum);
                        customSliderCurrent.text(currentSwiper);
                        customSliderTotal.text(totalSwiper);
                    }
                }
            };

            if (isTouchDevice() && $t.data('mode') == 'vertical') {
                $t.attr('data-noswiping', 1);
                $(this).find('.swiper3-slide').addClass('swiper-no-swiping');
            }

            var autoPlayVar     = parseInt($t.attr('data-autoplay'), 10);
            var mode            = $t.attr('data-mode');
            var effect          = $t.attr('data-effect') ? $t.attr('data-effect') : 'slide';
            var paginationType  = $t.attr('data-pagination-type');
            var loopVar         = parseInt($t.attr('data-loop'), 10);
            var noSwipingVar    = $t.attr('data-noSwiping');
            var mouse           = parseInt($t.attr('data-mouse'), 10);
            var speedVar        = parseInt($t.attr('data-speed'), 10);
            var centerVar       = parseInt($t.attr('data-center'), 10);
            var spaceBetweenVar = parseInt($t.attr('data-space'), 10);
            var slidesPerView   = parseInt($t.attr('data-slidesPerView'), 10) ? parseInt($t.attr('data-slidesPerView'), 10) : 'auto';
            var breakpoints     = {};
            var responsive      = $t.attr('data-responsive');
            if (responsive == 'responsive') {
                slidesPerView = $t.attr('data-add-slides');
                var lg        = $t.attr('data-lg-slides') ? $t.attr('data-lg-slides') : $t.attr('data-add-slides');
                var md        = $t.attr('data-md-slides') ? $t.attr('data-md-slides') : $t.attr('data-add-slides');
                var sm        = $t.attr('data-sm-slides') ? $t.attr('data-sm-slides') : $t.attr('data-add-slides');
                var xs        = $t.attr('data-xs-slides') ? $t.attr('data-xs-slides') : $t.attr('data-add-slides');

                breakpoints = {
                    768: {
                        slidesPerView: xs
                    },
                    992: {
                        slidesPerView: sm
                    },
                    1200: {
                        slidesPerView: md
                    },
                    1600: {
                        slidesPerView: lg
                    }
                };

            }

            var titles = [];
            $t.find('.swiper3-slide').each(function () {
                titles.push($(this).data('title'));
            });

            if ($t.hasClass('swiper-album')) {
                breakpoints = {
                    480: {
                        slidesPerView: 1
                    },
                    767: {
                        slidesPerView: 3,
                        centeredSlides: false
                    },
                    991: {
                        slidesPerView: 4
                    },
                    1600: {
                        slidesPerView: 5
                    }
                };
            }

            swipers['swiper3-' + index] = new Swiper3('.swiper3-' + index, {

                pagination: '.swiper3-pagination-' + index,
                paginationType: paginationType,
                paginationBulletRender: function (swiper, index, className) {
                    if ($t.parent('.banner-slider-wrap.vertical_custom_elements').length || $t.parent('.product-slider-wrapper').length) {
                        var title = titles[index];

                        if (index < 9) return '<span class="' + className + '"><i class="pagination-title">' + title + '</i><i>' + ('0' + (index + 1)) + '</i></span>';

                        return '<span class="' + className + '"><i class="pagination-title">' + title + '</i><i>' + (index + 1) + '</i></span>';
                    } else if ($t.closest('.portfolio-slider-wrap.filter_slider').length) {

                        if (index < 9) return '<span class="' + className + '"><i>' + ('0' + (index + 1)) + '</i></span>';

                        return '<span class="' + className + '"><i>' + (index + 1) + '</i></span>';
                    } else {
                        return '<span class="' + className + '"></span>';
                    }
                },
                direction: mode || 'horizontal',
                slidesPerView: slidesPerView,
                breakpoints: breakpoints,
                centeredSlides: centerVar,
                noSwiping: noSwipingVar,
                noSwipingClass: 'swiper-no-swiping',
                paginationClickable: true,
                spaceBetween: spaceBetweenVar,
                containerModifierClass: 'swiper3-container-', // NEW
                slideClass: 'swiper3-slide',
                slideActiveClass: 'swiper3-slide-active',
                slideDuplicateActiveClass: 'swiper3-slide-duplicate-active',
                slideVisibleClass: 'swiper3-slide-visible',
                slideDuplicateClass: 'swiper3-slide-duplicate',
                slideNextClass: 'swiper3-slide-next',
                slideDuplicateNextClass: 'swiper3-slide-duplicate-next',
                slidePrevClass: 'swiper3-slide-prev',
                slideDuplicatePrevClass: 'swiper3-slide-duplicate-prev',
                wrapperClass: 'swiper3-wrapper',
                bulletClass: 'swiper3-pagination-bullet',
                bulletActiveClass: 'swiper3-pagination-bullet-active',
                buttonDisabledClass: 'swiper3-button-disabled',
                paginationCurrentClass: 'swiper3-pagination-current',
                paginationTotalClass: 'swiper3-pagination-total',
                paginationHiddenClass: 'swiper3-pagination-hidden',
                paginationProgressbarClass: 'swiper3-pagination-progressbar',
                paginationClickableClass: 'swiper3-pagination-clickable', // NEW
                paginationModifierClass: 'swiper3-pagination-', // NEW
                lazyLoadingClass: 'swiper3-lazy',
                lazyStatusLoadingClass: 'swiper3-lazy-loading',
                lazyStatusLoadedClass: 'swiper3-lazy-loaded',
                lazyPreloaderClass: 'swiper3-lazy-preloader',
                notificationClass: 'swiper3-notification',
                preloaderClass: 'preloader',
                zoomContainerClass: 'swiper3-zoom-container',
                loop: loopVar,
                speed: speedVar,
                autoplay: autoPlayVar,
                effect: effect,
                mousewheelControl: mouse,
                nextButton: '.swiper3-button-next-' + index,
                prevButton: '.swiper3-button-prev-' + index,
                iOSEdgeSwipeDetection: true,
                onInit: function (swiper) {

                    if ($('.full_screen_slider').length) {
                        var totalSlides = $t.find('.swiper3-slide').not('.swiper3-slide-duplicate').length;
                        setThumb(swiper.realIndex, totalSlides);
                    }

                    arrowImg($t);
                    arrowImgClass($t);

                    if ($t.hasClass('js-check-pagination')) {
                        if ($t.find('.swiper3-pagination-bullet').length > 5) {
                            $t.addClass('js-calc-pagination');
                        }
                    }

                    if ($t.hasClass('js-calc-pagination')) {
                        checkingPagination($t);
                    }
                },
                onSlideChangeEnd: function (swiper) {
                    $(window).trigger('scroll');
                    if ($('.banner-slider-wrap.vertical').length) {
                        var totalSlides = $t.find('.swiper3-slide').not('.swiper3-slide-duplicate').length;
                        setThumb(swiper.realIndex, totalSlides);
                    }
                    arrowImgClass($t);

                    if ($t.hasClass('js-calc-pagination')) {
                        checkingPagination($t);
                    }
                },
                onSlideChangeStart: function (swiper) {
                    var activeIndex = (loopVar == 1) ? swiper.realIndex : swiper.activeIndex;

                    if ($t.parent().find('.swiper-pagination-bullet').length) {
                        $t.parent().find('.swiper-pagination-bullet').removeClass('swiper-pagination-bullet-active').eq(activeIndex).addClass('swiper-pagination-bullet-active');
                    }

                    if ($('.banner-slider-wrap.vertical').length) {
                        var totalSlides = $t.find('.swiper3-slide').not('.swiper3-slide-duplicate').length;
                        setThumb(swiper.realIndex, totalSlides);
                    }
                    arrowImg($t);
                }
            });
            initIterator++;
        });
    }

    function arrowImgClass(parent) {
        if ($(parent).find('.js-arrow-img').length) {
            $(parent).find('.js-arrow-img').removeClass('running');
        }
    }

    function arrowImg(parent) {
        if ($(parent).find('.js-arrow-img').length) {
            $(parent).find('.js-arrow-img').addClass('running');
            var arrowNext = $(parent).find($('.js-next-img')),
                arrowPrev = $(parent).find($('.js-prev-img')),
                loop      = $(parent).data('loop');

            var slideCount   = 0,
                slideVisible = 1,
                indexActive,
                nextSlideIndex,
                prevSlideIndex,
                nextSlide,
                prevSlide,
                imgPrev,
                imgNext;

            if (winW < 768) {
                slideVisible = $(parent).attr('data-xs-slides');
            } else if (winW < 992) {
                slideVisible = $(parent).attr('data-sm-slides');
            } else if (winW < 1200) {
                slideVisible = $(parent).attr('data-md-slides');
            } else if (winW < 1600) {
                slideVisible = $(parent).attr('data-lg-slides');
            } else {
                slideVisible = $(parent).attr('data-add-slides');
            }

            slideVisible = parseInt(slideVisible);

            if (loop) {
                indexActive = parseInt($(parent).find('.swiper3-slide-active').attr('data-swiper-slide-index'));
                $(parent).find('.swiper3-slide').each(function () {
                    slideCount = parseInt($(this).attr('data-swiper-slide-index')) > slideCount ? parseInt($(this).attr('data-swiper-slide-index')) : slideCount;
                });
                slideCount++;

                nextSlideIndex = (indexActive + slideVisible) % slideCount;
                prevSlideIndex = (indexActive - 1 + slideCount) % slideCount;

                nextSlide = $(parent).find('.swiper3-slide[data-swiper-slide-index="' + nextSlideIndex + '"]');
                prevSlide = $(parent).find('.swiper3-slide[data-swiper-slide-index="' + prevSlideIndex + '"]');
            } else {
                indexActive    = $(parent).find('.swiper3-slide-active').index();
                slideCount     = $(parent).find('.swiper3-slide').length;
                nextSlideIndex = indexActive + slideVisible;

                nextSlide = $(parent).find('.swiper3-slide').eq(nextSlideIndex);
                prevSlide = $(parent).find('.swiper3-slide-prev');
            }

            if (nextSlide.length) {
                imgNext = nextSlide.find('img').attr('src');
                $(arrowNext).css('background-image', 'url(' + imgNext + ')');
            } else {
                $(arrowNext).css('background-image', 'none');
            }

            if (prevSlide.length) {
                imgPrev = prevSlide.find('img').attr('src');
                $(arrowPrev).css('background-image', 'url(' + imgPrev + ')');
            } else {
                $(arrowPrev).css('background-image', 'none');
            }
        }
    }

    function checkingPagination($t) {
        var slide = $t.find('.swiper3-pagination-bullet');
        slide.removeClass('visible');
        var countSlide = slide.length;
        var index      = $t.find('.swiper3-pagination-bullet-active').index();

        slide.eq(index).addClass('visible');
        slide.eq(0).addClass('visible');
        slide.eq(countSlide - 1).addClass('visible');

        if (index > 1 && index < countSlide - 2) {
            $t.find('.swiper3-pagination').removeClass('start end').addClass('center');
            slide.eq(index - 1).addClass('visible');
            slide.eq(index + 1).addClass('visible');
        } else if (index <= 1) {
            $t.find('.swiper3-pagination').removeClass('center end').addClass('start');
            slide.eq(0).addClass('visible');
            slide.eq(1).addClass('visible');
            slide.eq(2).addClass('visible');
        } else if (countSlide >= index - 2) {
            $t.find('.swiper3-pagination').removeClass('center start').addClass('end');
            slide.eq(countSlide - 2).addClass('visible');
            slide.eq(countSlide - 3).addClass('visible');
        }
    }

    var currentSwiper;
    var totalSwiper;

    /* ADD ZERO FUNCTION */
    function ifZero(current, total) {
        if (String(current).length === 1) {
            currentSwiper = '0' + (current + 1);
        } else {
            currentSwiper = total;
        }
        if (String(total).length === 1) {
            totalSwiper = '0' + total;
        } else {
            totalSwiper = total;
        }
    }

    /*=================================*/
    /* PORTFOLIO AJAX LOAD */
    /*=================================*/
    function portfolio_load() {
        // Load More Portfolio
        if (window.portfolio_load) {

            // wrapper selector
            var wrap_selector = '.portfolio-tabs-wrapper .swiper-wrapper-tab';

            //button click
            $('.portfolio-tabs-wrapper .filters ul li').on('click', function (e) {

                $('.portfolio-tabs-wrapper .filters ul li').removeClass('active');
                $(this).addClass('active');

                var cats     = $(this).attr('data-filter'),
                    order    = $(this).closest('.filters').attr('data-order'),
                    orderby  = $(this).closest('.filters').attr('data-orderby'),
                    count    = $(this).closest('.filters').attr('data-count'),
                    autoplay = $(this).closest('.portfolio-filter-wrap').attr('data-autoplay'),
                    speed    = $(this).closest('.portfolio-filter-wrap').attr('data-speed');

                var $container = $(wrap_selector);
                $.ajax({
                    url: get.ajaxurl,
                    type: "post",
                    data: ({
                        action: 'pado_portfolio_slider_load',
                        cats: cats,
                        order: order,
                        orderby: orderby,
                        count: count,
                        speed: speed,
                        autoplay: autoplay
                    }),
                    success: function (data) {

                        $container.html(data);
                        $('img[data-lazy-src]').foxlazy();
                        $container.find('img[data-lazy-src]').foxlazy();
                        wpc_add_img_bg('.s-img-switch');

                        initSwiper3();
                    }
                });
                return false;
            });
        }
    }

    /**********************************/
    /* LOAD MORE POST */
    /**********************************/
    function load_more_blog_posts() {
        // Load More Portfolio
        if (window.load_more_blog_posts) {

            var pageNum = parseInt(window.load_more_blog_posts.startPage);

            // The maximum number of pages the current query can return.
            var max = parseInt(window.load_more_blog_posts.maxPage);

            // The link of the next page of posts.
            var nextLink = window.load_more_blog_posts.nextLink;

            // wrapper selector
            var wrap_selector = '.blog.metro';

            //button click
            $('.js-load-more').on('click', function (e) {

                var $btn     = $(this),
                    $btnText = $btn.html();
                $btn.html('Loading...');

                if (pageNum <= max) {

                    var $container = $(wrap_selector);
                    $.ajax({
                        url: nextLink,
                        type: "get",
                        success: function (data) {
                            var newElements = $(data).find('.blog.metro .post');
                            var elems       = [];

                            newElements.each(function (i) {
                                elems.push(this);
                            });

                            $btn.parent().before(elems);
                            $container.find('img[data-lazy-src]').foxlazy();

                            wpc_add_img_bg('.s-img-switch');

                            $('img[data-lazy-src]').foxlazy();
                            pageNum++;
                            nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + pageNum);

                            $btn.html($btnText);

                            if (pageNum == (max + 1)) {
                                $btn.parent().hide('fast');
                            }
                        }
                    });
                }
                return false;
            });
        }
    }

    /*=================================*/
    /* PORTFOLIO LEFT GALLERY */
    /*=================================*/
    function leftGalleryImages() {
        if ($('.portfolio-single-content.left_gallery img').length) {
            $("img[data-lazy-src]").foxlazy();
            $('.portfolio-single-content.left_gallery img').each(function () {
                var height = $(this).height();
                var width  = $(this).width();
                if (height > width) {
                    $(this).addClass('vertical');
                } else {
                    $(this).addClass('horizontal');
                }
            });
        }
    }

    /*=================================*/
    /* POST LIKE */
    /*=================================*/
    function toggleLikeFromCookies($element, postId) {
        if (document.cookie.search(postId) === -1) {
            $element.removeClass('post__likes--liked');
        } else {
            $element.addClass('post__likes--liked');
        }
    }

    var $likes = $('.post__likes');

    for (var i = 0; i < $likes.length; i++) {
        toggleLikeFromCookies($likes.eq(i), $likes.eq(i).attr('data-id'));
    }

    $likes.on('click', function (e) {
        var $this   = $(this),
            post_id = $this.attr('data-id');
        $this.toggleClass('post__likes--liked');
        $this.addClass('post__likes--disable');

        $.ajax({
            type: "POST",
            url: get.ajaxurl,
            data: ({
                action: 'pado_like_post',
                post_id: post_id
            }),
            success: function (msg) {
                $this.closest('.likes-wrap').find('.count').text(msg);
                toggleLikeFromCookies($this, post_id);
                $this.removeClass('post__likes--disable');
            }
        });
        return false;
    });

    /*=================================*/
    /* BACKGROUND IMG for parent */
    /*=================================*/
    function wpc_add_img_bg(img_sel, parent_sel) {
        if (!img_sel) {

            return false;
        }
        var $parent, $imgDataHidden, _this;
        $(img_sel).each(function () {
            _this          = $(this);
            $imgDataHidden = _this.data('s-hidden');
            $parent        = _this.closest(parent_sel);
            $parent        = $parent.length ? $parent : _this.parent();
            $parent.css('background-image', 'url(' + this.src + ')').addClass('s-back-switch');
            if ($imgDataHidden) {
                _this.css('visibility', 'hidden');
                _this.show();
            }
            else {
                _this.hide();
            }
        });
    }

    /*=================================*/
    /* POPUP LIGHT GALLERY */
    /*=================================*/
    function popup_image() {
        if ($('.popup-image').length) {
            $('.popup-image').lightGallery({
                selector: 'this',
                mode: 'lg-slide',
                closable: true,
                iframeMaxWidth: '80%',
                download: false,
                thumbnail: true
            });
        }

        // IMAGE POPUP
        if ($('.gallery-single').length || $('.portfolio').length || $('.line-wrap').length || $('.light-gallery').length) {
            $('.gallery-single, .portfolio, .line-wrap, .light-gallery').each(function () {
                var thumb = (typeof $(this).attr('data-thumb') !== undefined) && (typeof $(this).attr('data-thumb') !== false) ? $(this).attr('data-thumb') : true;
                thumb     = thumb === 'false' ? false : true;

                $(this).lightGallery({
                    selector: '.gallery-item:not(.popup-details)',
                    mode: 'lg-slide',
                    closable: false,
                    iframeMaxWidth: '80%',
                    download: false,
                    thumbnail: true,
                    showThumbByDefault: thumb
                });
            });
        }
    }

    /*=================================*/
    /* CHECK IS IN VIEWPORT */
    /*=================================*/
    $.fn.isInViewport = function (offsetB) {
        var elementTop    = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop    = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height() - offsetB;

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    /*=================================*/
    /* FLEX SLIDER */
    /*=================================*/
    if ($('.img-slider').length) {
        $('.img-slider').each(function () {
            $(this).flexslider({
                animation: "fade",
                slideshowSpeed: 4500,
                smoothHeight: true,
                pauseOnAction: false,
                controlNav: false,
                directionNav: true,
                prevText: "<i class='fa fa-angle-left'></i>",
                nextText: "<i class='fa fa-angle-right'></i>"
            });
        })
    }
    $('.flex-direction-nav a').on('click', function (ev) {
        ev.stopPropagation();
    });

    /*=================================*/
    /* ISOTOPE */
    /*=================================*/
    function initIsotop() {
        if ($('.izotope-container').length) {
            $('.izotope-container').each(function () {
                var self    = $(this);
                var layoutM = self.attr('data-layout') || 'masonry';
                self.isotope({
                    itemSelector: '.item-single, .gallery-item',
                    layoutMode: layoutM,
                    masonry: {
                        columnWidth: '.item-single, .gallery-item, .grid-sizer',
                        gutterWidth: 30
                    }
                });
            });
        }

        if ($('.izotope-blog').length) {
            $('.izotope-blog').each(function () {
                var self = $(this);
                var layoutM = 'masonry';
                self.isotope({
                    itemSelector: '.post',
                    layoutMode: layoutM,
                    masonry: {
                        columnWidth: '.post'
                    }
                });
            });
        }

        if ($('.blog').length && $('.blog > .row > .item').length) {
            $('.blog > .row').each(function () {
                var self    = $(this);
                var layoutM = 'masonry';
                if (!$(this).parent().hasClass('adjusted')) {
                    self.isotope({
                        itemSelector: '.item',
                        layoutMode: layoutM,
                        masonry: {
                            columnWidth: '.item'
                        }
                    });
                }
            });
        }
    }

    /*=================================*/
    /* SHARE SOCIAL BUTTON */
    /*=================================*/
    $('[data-share]').on('click', function () {
        var w          = window,
            url        = this.getAttribute('data-share'),
            title      = '',
            w_pop      = 600,
            h_pop      = 600,
            scren_left = w.screenLeft != undefined ? w.screenLeft : screen.left,
            scren_top  = w.screenTop != undefined ? w.screenTop : screen.top,
            width      = w.innerWidth,
            height     = w.innerHeight,
            left       = ((width / 2) - (w_pop / 2)) + scren_left,
            top        = ((height / 2) - (h_pop / 2)) + scren_top,
            newWindow  = w.open(url, title, 'scrollbars=yes, width=' + w_pop + ', height=' + h_pop + ', top=' + top + ', left=' + left);

        if (w.focus) {
            newWindow.focus();
        }
        return false;
    });

    /*=================================*/
    /* COPYRIGHT */
    /*=================================*/
    if ($('.pado_copyright_overlay').length) {
        $(document).on('contextmenu', function (event) {
            if ($('.pado_copyright_overlay').hasClass('copy')) {
                event.preventDefault();
            } else if (event.target.tagName != 'A') {
                event.preventDefault();
            }
            $('.pado_copyright_overlay').addClass('active');
        }).on('click', function () {
            $('.pado_copyright_overlay').removeClass('active').removeAttr('style');
        });
    }

    /**********************************/
    /* BACK TO TOP BUTTON */
    /**********************************/
    function backToTop() {
        if ($('#back-to-top').length) {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > 100) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        }
    };

    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });

    /**********************************/
    /* SINGLE POST HEIGHT */
    /**********************************/
    function postHeight() {
        if ($('.unit .single-post').length) {
            var postHeight = $(window).outerHeight() - ($('.header_top_bg').outerHeight()  + $('#footer').outerHeight());
            $('.unit .single-post').css('min-height', postHeight + 'px');
        }
    }

    /**********************************/
    /* PORTFOLIO PAGINATION */
    /**********************************/
    function portfolioPagination () {
        if ($('footer').length && ($(window).scrollTop() > $('footer').offset().top - 600) && $('.single-pagination.left_gallery').length) {
            $('.single-pagination.left_gallery').addClass('change-color');
        } else if ($('.single-pagination.left_gallery').length) {
            $('.single-pagination.left_gallery').removeClass('change-color');
        }
    }

    /**********************************/
    /* PRODUCT SLIDER */
    /**********************************/
    if ($('.pado_images').length) {
        $('.product-gallery-wrap').each(function () {
            $(this).slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
                asNavFor: '.product-gallery-thumbnail-wrap',
                fade: true,
                draggable: false
            })
        });
        $('.product-gallery-thumbnail-wrap').each(function () {
            $(this).slick({
                infinite: true,
                slidesToShow: 10,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                asNavFor: '.product-gallery-wrap',
                vertical: true,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 770,
                        settings: {
                            slidesToShow: 3,
                            vertical: false
                        }
                    }
                ]
            })
        })
    }

    /**********************************/
    /* MAGNIFIC POPUP */
    /**********************************/
    if ($('.video').length) {
        $('.play').each(function () {
            $(this).magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: true,
                fixedBgPos: true
            });
        });
    }

    /**********************************/
    /* FOOTER-PAGE PADDING */
    /**********************************/
    function calcPaddingMainWrapper() {
        var footer    = $('#footer');
        var paddValue = footer.outerHeight();

        if (!$("#footer.fix-bottom").length && $("#footer.footer-parallax").length) {
            $('.main-wrapper').css('margin-bottom', paddValue);
        } else if (!$("#footer.fix-bottom").length) {
            $('.main-wrapper').css('padding-bottom', paddValue);
        }
    }

    /**********************************/
    /* HEADINGS ANIMATION */
    /**********************************/
    function headingAnimation() {
        if ($('.headings-wrap').length) {
            $('.headings-wrap').each(function () {
                if ($(this).hasClass('load-fade')) {
                    var animationClass = 'animation';
                    var target         = $(this).find('.title, .description, .subtitle, .but-wrap');
                    var headingOffsetB;
                    if ($(window).width() > 1024) {
                        headingOffsetB = 50;
                    } else {
                        headingOffsetB = 0;
                    }
                    if ($(this).isInViewport(headingOffsetB)) {
                        $(target).addClass(animationClass);
                    } else {
                        $(target).removeClass(animationClass);
                    }
                }
            });
        }
    }

    /**********************************/
    /* FIX the GRID */
    /**********************************/
    function removeBracketsFromFilter() {
        if ($('.tg-filter-name').length) {
            $('.tg-filter-name').each(function () {
                var text   = $(this).text().replace(/[0-9]|\(|\)/g, '');
                var number = $(this).find('.tg-filter-count').text();
                $(this).text(text).append('<span class="tg-filter-count">' + number + '</span>');
            });
        }
    }

    /**********************************/
    /* FUNCTION INITIALIZATION */
    /**********************************/
    $(window).on('load', function () {
        if ($('.preloader').length) {
            $('.preloader').fadeOut('slow');
        }
        wpc_add_img_bg('.s-img-switch');
        topBannerHeight();
        initSwiper3();
        $("img[data-lazy-src]").foxlazy('', function () {
            setTimeout(initIsotop, 100);
        });
        popup_image();
        removeBracketsFromFilter();
        load_more_blog_posts();
        portfolio_load();
        $(window).trigger('scroll');
        $(window).trigger('resize');
    });

    $(window).on('load resize', function () {
        headingAnimation();
        leftGalleryImages();
        calcPaddingMainWrapper();
        postHeight();
        initIsotop();
    });

    $(window).on('resize', function () {
        topBannerHeight();
    });

    $(window).on('scroll', function () {
        headingAnimation();
        backToTop();
        portfolioPagination();
    });

    window.addEventListener("orientationchange", function () {
        headingAnimation();
        topBannerHeight();
        calcPaddingMainWrapper();
        initIsotop();
        postHeight();
        portfolioPagination();
    });

})(jQuery, window, document);