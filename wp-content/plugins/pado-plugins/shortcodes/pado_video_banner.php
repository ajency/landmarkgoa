<?php
if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'            => 'Video Banner',
            'base'            => 'video_banner',
            'description'     => __('Section with video banner', 'js_composer'),
            'content_element' => true,
            'params'          => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Video link', 'js_composer'),
                    'description' => __('Insert your video link', 'js_composer'),
                    'param_name'  => 'video_link',
                    'value'       => ''
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Video preview image', 'js_composer'),
                    'description' => __('Insert video preview image', 'js_composer'),
                    'param_name'  => 'video_image',
                    'value'       => ''
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Enable overlay', 'js_composer'),
                    'description' => __('Do you want to enable overlay?', 'js_composer'),
                    'param_name'  => 'overlay',
                    'value'       => array(__('Yes', 'js_composer') => 'on'),
                    'std'         => 'on',
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Enable mute button?', 'js_composer'),
                    'description' => __('Do you want to enable mute button?', 'js_composer'),
                    'param_name'  => 'mute_btn',
                    'value'       => array(__('Yes', 'js_composer') => 'on'),
                    'std'         => 'on',
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Enable play/stop button?', 'js_composer'),
                    'description' => __('Do you want to play/stop button?', 'js_composer'),
                    'param_name'  => 'play_btn',
                    'value'       => array(__('Yes', 'js_composer') => 'on'),
                    'std'         => 'on',
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Enable full-screen button?', 'js_composer'),
                    'description' => __('Do you want to full-screen button?', 'js_composer'),
                    'param_name'  => 'full_btn',
                    'value'       => array(__('Yes', 'js_composer') => 'on'),
                    'std'         => 'on',
                ),
                array(
                    'type'        => 'textfield',
                    'description' => __('Please add text your subtitle', 'js_composer'),
                    'heading'     => __('Subtitle', 'js_composer'),
                    'param_name'  => 'subtitle',
                ),
                array(
                    'type'        => 'textfield',
                    'description' => __('Please add text your title', 'js_composer'),
                    'heading'     => __('Title', 'js_composer'),
                    'param_name'  => 'title'
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Autoplay', 'js_composer'),
                    'description' => __('Do you want to enable autoplay?', 'js_composer'),
                    'param_name'  => 'autoplay',
                    'value'       => array(__('Yes', 'js_composer') => 'on'),
                    'std'         => 'off',
                    'group'       => 'Video settings',
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Mute sound', 'js_composer'),
                    'description' => __('Do you want to enable mute option?', 'js_composer'),
                    'param_name'  => 'mute',
                    'value'       => array(__('Yes', 'js_composer') => 'on'),
                    'std'         => 'off',
                    'group'       => 'Video settings',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Video start(second)', 'js_composer'),
                    'description' => __('Please enter start video number', 'js_composer'),
                    'param_name'  => 'start',
                    'value'       => '',
                    'group'       => 'Video settings',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Video end(second)', 'js_composer'),
                    'description' => __('Please enter end video number', 'js_composer'),
                    'param_name'  => 'end',
                    'value'       => '',
                    'group'       => 'Video settings',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Extra class name', 'js_composer'),
                    'param_name'  => 'el_class',
                    'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
                    'value'       => ''
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => __('CSS box', 'js_composer'),
                    'param_name' => 'css',
                    'group'      => __('Design options', 'js_composer')
                )
            ),
            //end params
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_video_banner extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'css'          => '',
                'el_class'     => '',
                'video_link'   => '',
                'video_image'  => '',
                'subtitle'     => '',
                'title'        => '',
                'autoplay'     => '0',
                'overlay'      => 'on',
                'full_btn'     => 'on',
                'play_btn'     => 'on',
                'mute_btn'     => 'on',
                'head_visible' => 'on',
                'mute'         => 'off',
                'start'        => '',
                'end'          => '',
            ), $atts));


            if ( !in_array("pado-video-banner", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-video-banner";
            }
            $this->enqueueCss();

            if ( !in_array("pado-youtube", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-youtube";
            }

            if ( !in_array("pado-video-banner", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-video-banner";
            }
            $this->enqueueJs();


            $class = (!empty($el_class)) ? $el_class : '';
            $class .= vc_shortcode_custom_css_class($css, ' ');

            // for youtube
            $video_params = array(
                'autohide'       => 1,
                'enablejsapi'    => 1,
                'autoplay'       => $autoplay == 'on' ? 1 : 0,
                'loop'           => 1,
                'controls'       => 0,
                'modestbranding' => 0,
                'rel'            => 0,
                'showinfo'       => 0,
                'mute'           => 0,
                'start'          => ($start) ? $start : 0,
            );
//
            if ( $end ) {
                $video_params['end'] = $end;
            }

            $mute     = ($mute == 'on') ? 1 : 0;
            $autoplay = ($autoplay == 'on') ? '1' : '0';

            ob_start(); ?>

            <div class="<?php echo esc_attr($class); ?>">
                <div class="full-height-window-hard iframe-video banner-video youtube"
                     data-type-start="click"
                     data-mute="<?php echo esc_attr($mute); ?>"
                     data-autoplay="<?php echo esc_attr($autoplay); ?>">
                    <?php echo pado_the_lazy_load_flter($video_image, array('class' => 's-img-switch', 'alt' => ''));
                    if ( !empty($video_link) ) {
                        echo str_replace("?feature=oembed", "?feature=oembed&" . http_build_query($video_params), wp_oembed_get($video_link));
                    }
                    if ( isset($overlay) && $overlay ) : ?>
                        <span class="overlay"></span>
                    <?php endif; ?>
                    <div class="container">
                        <?php if ( isset($subtitle) && !empty($subtitle) ) { ?>
                            <h5 class="subtitle">
                                <?php echo wp_kses_post($subtitle); ?>
                            </h5>
                        <?php }
                        if ( isset($subtitle) && !empty($title) ) { ?>
                            <h3 class="title">
                                <?php echo wp_kses_post($title); ?>
                            </h3>
                        <?php } ?>
                    </div>
                    <?php if ( (isset($full_btn) && $full_btn) || (isset($play_btn) && $play_btn) || (isset($mute_btn) && $mute_btn) ): ?>
                        <div class="video-content">
                            <?php if ( isset($mute_btn) && $mute_btn ): ?>
                                <span class="mute-button mute<?php echo esc_attr($mute); ?>"></span>
                            <?php endif;
                            if ( isset($play_btn) && $play_btn ): ?>
                                <span class="play-button"></span>
                            <?php endif;
                            if ( isset($full_btn) && $full_btn ): ?>
                                <span class="full-button"></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php
            return ob_get_clean();
        }
    }
}
