;(function ($, window, document, undefined) {
    'use strict';

    function changeStateVideo(iframe_container, button, player, hover_enable, services) {
        var $this  = $(button),
            iframe = iframe_container.find('iframe');

        if (hover_enable) {

            iframe_container.on('mouseover', function () {
                services == 'youtube' && player.playVideo();
                $(this).addClass('play');
                if (services != 'youtube') {
                    if (iframe.data('src')) {
                        iframe.attr('src', iframe.data('src'));
                    }

                    $this.addClass('start')
                        .closest('.iframe-video').addClass('play');
                }
            });

            iframe_container.on('mouseout', function () {
                services == 'youtube' && player.pauseVideo();
                if (services != 'youtube') {
                    if (iframe.data('src')) {
                        iframe.attr('src', 'about:blank');
                    }
                    $this.addClass('start').closest('.iframe-video').addClass('play');
                }
                $(this).removeClass('play');
            });

            return;
        }

        if ($this.hasClass('start')) {
            services == 'youtube' && player.pauseVideo();
            if (iframe.data('src')) {
                iframe.attr('src', 'about:blank');
            }
            $this.removeClass('start')
                .closest('.iframe-video').removeClass('play');
        } else {
            services == 'youtube' && player.playVideo();
            if (iframe.data('src')) {
                iframe.attr('src', iframe.data('src'));
            }
            $this.addClass('start')
                .closest('.iframe-video').addClass('play');
        }

    }

    // youtube video ready
    window.onYouTubeIframeAPIReady = function () {

        var player         = [],
            $iframe_parent = [],
            $this;

        // each all iframe
        $('.iframe-video.youtube iframe').each(function (i) {
            // get parent element
            $this             = $(this);
            $iframe_parent[i] = $this.closest('.iframe-video.youtube');

            // init video player
            player[i] = new YT.Player(this, {

                // callbacks
                events: {
                    'onReady': function (event) {
                        // mute on/off
                        if ($iframe_parent[i].data('mute')) {
                            event.target.mute();
                        }
                    },
                    'onStateChange': function (event) {
                        switch (event.data) {
                            case 1:
                                // start play
                                $iframe_parent[i].addClass('play').find('.play-button').addClass('start');
                                break;
                            case 2:
                                $iframe_parent[i].removeClass('play').find('.play-button').removeClass('start');
                                break;
                            case 3:
                                // buffering
                                break;
                            case 0:
                                // end video
                                $iframe_parent[i].removeClass('play').find('.play-button').removeClass('start');
                                break;
                            default:
                                '-1'
                            // not play
                        }
                    }
                }
            });

            // hover play/pause video
            if ($iframe_parent[i].data('type-start') == 'hover') {
                changeStateVideo($iframe_parent[i], this, player[i], true, 'youtube')
            }

            // click play/pause video
            if ($iframe_parent[i].data('type-start') == 'click') {
                $iframe_parent[i].find('.play-button').on('click', function (event) {
                    event.preventDefault();
                    setTimeout(changeStateVideo($iframe_parent[i], this, player[i], false, 'youtube'), 0);

                    if ($(this).closest('.only-btn').length) {
                        if (!$(this).hasClass('start')) {
                            $('header').show();
                            $('footer:not(.no-footer)').show();
                            $('body').removeClass('overflow-full');
                            $(this).closest('.vc_row').removeClass('fix-z-index');
                        } else {
                            $('header').hide();
                            $('footer').hide();
                            $('body').addClass('overflow-full');
                            $(this).closest('.vc_row').addClass('fix-z-index');
                        }
                    }
                });
            }

            var muteButton = $iframe_parent[i].find('.mute-button');
            // mute video
            if (muteButton.length) {
                muteButton.on('click', function () {
                    if (muteButton.hasClass('mute1')) {
                        player[i].unMute();
                        muteButton.removeClass('mute1');
                    } else {
                        muteButton.addClass('mute1');
                        player[i].mute();
                    }
                });
            }
        });
    };

    // banner video full screen
    if ($('.banner-video .full-button').length) {
        $('.banner-video .full-button').each(function (index) {
            $(this).on('click', function () {
                if ($(this).hasClass('on')) {
                    $(this).removeClass('on');
                    $(this).closest('.banner-video').removeClass('full');
                    $(this).closest('.banner-video').find('.container').show();
                    $('header').show();
                    $('footer:not(.no-footer)').show();
                } else {
                    $(this).addClass('on');
                    $(this).closest('.banner-video').addClass('full');
                    $('header').hide();
                    $('footer').hide();
                    $(this).closest('.banner-video').find('.container').hide();
                }
            });
        });
    }

})(jQuery, window, document);