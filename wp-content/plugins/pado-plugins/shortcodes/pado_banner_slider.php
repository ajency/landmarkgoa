<?php
if ( function_exists('vc_map') ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/banner_slider/';
    vc_map(
        array(
            'name'                    => __('Banner Slider', 'js_composer'),
            'base'                    => 'banner_slider',
            'description'             => __('Section with images slider', 'js_composer'),
            'as_parent'               => array('only' => 'banner_slider_items'),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'js_view'                 => 'VcColumnView',
            'params'                  => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Type Slider', 'js_composer'),
                    'description' => __('Please select type of this slider', 'js_composer'),
                    'param_name'  => 'type_slider',
                    'value'       => array(
                        array(
                            'value' => 'urban',
                            'label' => esc_html__('Horizontal urban slider', 'js_composer'),
                            'image' => $url . 'urban.jpg'
                        ),
                        array(
                            'value' => 'vertical',
                            'label' => esc_html__('Vertical slider', 'js_composer'),
                            'image' => $url . 'vertical.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => __('Select style:', 'js_composer'),
                    'param_name' => 'text_style',
                    'value'      => array(
                        __('Dark Style', 'js_composer')  => 'dark',
                        __('Light Style', 'js_composer') => 'light',
                    ),
                    'dependency' => array('element' => 'type_slider', 'value' => array('vertical'))
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Socials', 'js_composer'),
                    'description' => __('Please add social information', 'js_composer'),
                    'param_name'  => 'socials_urban',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'iconpicker',
                            'heading'     => 'Select icon',
                            'param_name'  => 'icon',
                            'value'       => '',
                            'description' => __('Please select custom icon', 'js_composer'),
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('url', 'js_composer'),
                            'param_name'  => 'social_url',
                            'value'       => '',
                            'description' => __('Enter social link url.', 'js_composer'),
                        ),
                    ),
                    'dependency'  => array(
                        'element' => 'type_slider',
                        'value'   => 'urban',
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Additional title', 'js_composer'),
                    'description' => __('Please add additional title', 'js_composer'),
                    'param_name'  => 'additional_title',
                    'dependency'  => array(
                        'element' => 'type_slider',
                        'value'   => 'urban',
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Autoplay (sec)', 'js_composer'),
                    'description' => __('0 - off autoplay.', 'js_composer'),
                    'param_name'  => 'autoplay',
                    'value'       => '0',
                    'group'       => __('Animation', 'js_composer')
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Speed (milliseconds)', 'js_composer'),
                    'description' => __('Speed Animation. Default 1000 milliseconds', 'js_composer'),
                    'param_name'  => 'speed',
                    'value'       => '500',
                    'group'       => __('Animation', 'js_composer')
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
            ) //end params
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_banner_slider extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'type_slider'      => 'urban',
                // additional options
                'socials_urban'    => '',
                'additional_title' => '',
                // color options
                'text_style'       => 'dark',
                // slider options
                'autoplay'         => '0',
                'speed'            => '500',
                'css'              => '',
                'el_class'         => '',
            ), $atts));

            // include needed stylesheets
            if ( !in_array("pado-banner-slider", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-banner-slider";
            }
            $this->enqueueCss();

            $autoplay = is_numeric($autoplay) ? $autoplay * 1000 : 0;
            $speed    = is_numeric($speed) ? $speed : '500';
            $class    = (!empty($el_class)) ? $el_class : '';
            $class    .= vc_shortcode_custom_css_class($css, ' ');

            global $banner_slider_items;
            $banner_slider_items = array();

            $socials_urban = (array)vc_param_group_parse_atts($socials_urban);

            $data_type_slider = ($type_slider == 'vertical') ? 'vertical' : 'horizontal';
            $sliderClass      = ($type_slider == 'vertical') ? 'hard-full-height' : '';
            $paginationType   = ($type_slider == 'vertical') ? 'progress' : 'fraction';
            $column           = ($type_slider == 'vertical') ? 'col-lg-6 col-sm-10' : 'col-xs-12';

            $class .= ' ' . $type_slider;

            do_shortcode($content);

            ob_start();

            if ( !empty($banner_slider_items) ) { ?>

                <div class="banner-slider-wrap <?php echo esc_attr($class . ' ' . $text_style); ?>">
                    <div class="swiper3-container <?php echo esc_attr($sliderClass); ?>"
                         data-mouse="0" data-autoplay="<?php echo esc_attr($autoplay); ?>"
                         data-loop="1" data-speed="<?php echo esc_attr($speed); ?>" data-center="1"
                         data-space="0" data-pagination-type="<?php echo esc_attr($paginationType); ?>"
                         data-mode="<?php echo esc_attr($data_type_slider); ?>">
                        <div class="swiper3-wrapper">
                            <?php foreach ( $banner_slider_items as $item ) {
                                $value                = (object)$item['atts'];
                                $btn_style            = isset($value->btn_style) && !empty($value->btn_style) ? $value->btn_style : 'a-btn a-btn-1';
                                $additional_btn_style = isset($value->additional_btn_style) && !empty($value->additional_btn_style) ? $value->additional_btn_style : 'a-btn a-btn-1';
                                $img_url              = (!empty($value->image) && is_numeric($value->image)) ? wp_get_attachment_url($value->image) : ''; ?>

                                <div class="swiper3-slide swiper-no-swiping">
                                    <div class="slider-banner full-height-window">
                                        <div class="img-bg bg-cover">
                                            <?php if ( !empty($img_url) ) {
                                                echo pado_the_lazy_load_flter($img_url,
                                                    array(
                                                        'class' => 's-img-switch',
                                                        'alt'   => ''
                                                    )
                                                );
                                            } ?>
                                        </div>
                                        <div class="slider-wrap">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="<?php echo esc_attr($column); ?>">
                                                        <?php if ( !empty($value->subtitle) ) { ?>
                                                            <h5 class="subtitle">
                                                                <?php echo wp_kses_post($value->subtitle); ?>
                                                            </h5>
                                                        <?php }
                                                        if ( !empty($value->title) ) { ?>
                                                            <h3 class="title">
                                                                <?php echo wp_kses_post($value->title); ?>
                                                            </h3>
                                                        <?php }
                                                        if ( !empty($value->text) && $type_slider == 'vertical' ) { ?>
                                                            <div class="text">
                                                                <?php echo wp_kses_post($value->text); ?>
                                                            </div>
                                                        <?php }
                                                        $url = '';
                                                        if ( !empty($value->button) ) {
                                                            $url = vc_build_link($value->button);
                                                            $target = !empty($url['target']) ? $url['target'] : '_self';
                                                        }
                                                        if ( !empty($url['title']) ) { ?>
                                                            <a href="<?php echo esc_attr($url['url']); ?>"
                                                               class="<?php echo esc_attr($btn_style); ?>"
                                                               target="<?php echo esc_attr($target); ?>"><?php echo esc_html($url['title']); ?></a>
                                                        <?php }
                                                        $additional_button_url = '';
                                                        if ( !empty($value->additional_button) ) {
                                                            $additional_button_url = vc_build_link($value->additional_button);
                                                            $add_target = !empty($additional_button_url['target']) ? $additional_button_url['target'] : '_self';
                                                        }
                                                        if ( !empty($additional_button_url['title']) ) { ?>
                                                            <a href="<?php echo esc_attr($additional_button_url['url']); ?>"
                                                               class="<?php echo esc_attr($additional_btn_style); ?>"
                                                               target="<?php echo esc_attr($add_target); ?>"><?php echo esc_html($additional_button_url['title']); ?></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            } ?>
                        </div>
                        <div class="pag-wrapper">
                            <?php if ( $type_slider == 'vertical' ) : ?>
                                <div class="swiper3-button-prev"></div>
                            <?php else : ?>
                                <div class="swiper3-button-prev"><?php esc_html_e('Prev', 'pado'); ?></div>
                            <?php endif; ?>

                            <?php if ( $type_slider == 'vertical' ) : ?>
                                <div class="number-slides">
                                    <span class="current"></span>/<span class="total"></span>
                                </div>
                            <?php endif; ?>

                            <div class="swiper3-pagination"></div>

                            <?php if ( $type_slider == 'vertical' ) : ?>
                                <div class="swiper3-button-next"></div>
                            <?php else : ?>
                                <div class="swiper3-button-next"><?php esc_html_e('Next', 'pado'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ( (!empty($additional_title) || !empty($socials_urban)) && $type_slider == 'urban' ) { ?>
                        <div class="additional_wrap">
                            <?php if ( !empty($additional_title) && $type_slider == 'urban' ) { ?>
                                <div class="additional_title">
                                    <?php echo wp_kses_post($additional_title); ?>
                                </div>
                            <?php } ?>
                            <?php if ( !empty($socials_urban) && $type_slider == 'urban' ) { ?>
                                <div class="socials">
                                    <?php foreach ( $socials_urban as $item ) { ?>
                                        <a href="<?php echo esc_url($item['social_url']); ?>"><i
                                                    class="fa <?php echo esc_attr($item['icon']); ?>"></i></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php }

            return ob_get_clean();
        }
    }
}

if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'            => 'Slider item',
            'base'            => 'banner_slider_items',
            'as_child'        => array('only' => 'banner_slider'),
            'content_element' => true,
            'params'          => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Show options for style:', 'js_composer'),
                    'description' => __('Please select style for slider', 'js_composer'),
                    'param_name'  => 'option_style',
                    'value'       => array(
                        array(
                            'value' => 'urban',
                            'label' => esc_html__('Horizontal urban slider', 'js_composer'),
                            'image' => $url . 'urban.jpg'
                        ),
                        array(
                            'value' => 'vertical',
                            'label' => esc_html__('Vertical slider', 'js_composer'),
                            'image' => $url . 'vertical.jpg'
                        ),
                    )
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Background Image', 'js_composer'),
                    'description' => __('Please add background image', 'js_composer'),
                    'param_name'  => 'image',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Subtitle', 'js_composer'),
                    'description' => __('Please add subtitle', 'js_composer'),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'admin_label' => true,
                    'save_always' => true,
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'description' => __('Please add title', 'js_composer'),
                    'param_name'  => 'title',
                    'value'       => '',
                    'admin_label' => true,
                    'save_always' => true
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Text', 'js_composer'),
                    'description' => __('Please add text', 'js_composer'),
                    'param_name'  => 'text',
                    'value'       => '',
                    'dependency'  => array(
                        'element' => 'option_style',
                        'value'   => array('vertical'),
                    ),
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => __('Please select button style', 'js_composer'),
                    'param_name'  => 'btn_style',
                    'value'       => array(
                        'Default'                        => 'a-btn a-btn-1',
                        'Default with arrow'             => 'a-btn a-btn-1 a-btn-arrow',
                        'Default Transparent'            => 'a-btn a-btn-2',
                        'Default Transparent with arrow' => 'a-btn a-btn-2 a-btn-arrow',
                        'Dark'                           => 'a-btn a-btn-3',
                        'Dark with arrow'                => 'a-btn a-btn-3 a-btn-arrow',
                        'Dark Transparent'               => 'a-btn a-btn-4',
                        'Dark Transparent with arrow'    => 'a-btn a-btn-4 a-btn-arrow',
                        'Light'                          => 'a-btn a-btn-5',
                        'Light with arrow'               => 'a-btn a-btn-5 a-btn-arrow',
                        'Light Transparent'              => 'a-btn a-btn-6',
                        'Light Transparent with arrow'   => 'a-btn a-btn-6 a-btn-arrow',
                        'White'                          => 'a-btn a-btn-7',
                        'White with arrow'               => 'a-btn a-btn-7 a-btn-arrow',
                        'White Transparent'              => 'a-btn a-btn-8',
                        'White Transparent with arrow'   => 'a-btn a-btn-8 a-btn-arrow',
                        'Default link'                   => 'a-btn a-btn-link',
                        'Default link with arrow'        => 'a-btn a-btn-link a-btn-arrow',
                    ),
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Button', 'js_composer'),
                    'description' => __('Please specify link for button', 'js_composer'),
                    'param_name'  => 'button',
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Button style for additional button', 'js_composer'),
                    'description' => __('Please select additional button style ', 'js_composer'),
                    'param_name'  => 'additional_btn_style',
                    'value'       => array(
                        'Default'                        => 'a-btn a-btn-1',
                        'Default with arrow'             => 'a-btn a-btn-1 a-btn-arrow',
                        'Default Transparent'            => 'a-btn a-btn-2',
                        'Default Transparent with arrow' => 'a-btn a-btn-2 a-btn-arrow',
                        'Dark'                           => 'a-btn a-btn-3',
                        'Dark with arrow'                => 'a-btn a-btn-3 a-btn-arrow',
                        'Dark Transparent'               => 'a-btn a-btn-4',
                        'Dark Transparent with arrow'    => 'a-btn a-btn-4 a-btn-arrow',
                        'Light'                          => 'a-btn a-btn-5',
                        'Light with arrow'               => 'a-btn a-btn-5 a-btn-arrow',
                        'Light Transparent'              => 'a-btn a-btn-6',
                        'Light Transparent with arrow'   => 'a-btn a-btn-6 a-btn-arrow',
                        'White'                          => 'a-btn a-btn-7',
                        'White with arrow'               => 'a-btn a-btn-7 a-btn-arrow',
                        'White Transparent'              => 'a-btn a-btn-8',
                        'White Transparent with arrow'   => 'a-btn a-btn-8 a-btn-arrow',
                        'Default link'                   => 'a-btn a-btn-link',
                        'Default link with arrow'        => 'a-btn a-btn-link a-btn-arrow',
                    ),
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Additional Button', 'js_composer'),
                    'description' => __('Please specify link for additional button', 'js_composer'),
                    'param_name'  => 'additional_button',
                ),
            ) //end params
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_banner_slider_items extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            global $banner_slider_items;
            $banner_slider_items[] = array('atts' => $atts, 'content' => $content);

            return;
        }
    }
}