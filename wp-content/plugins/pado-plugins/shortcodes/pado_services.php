<?php
if ( function_exists('vc_map') ) {
    $url     = EF_URL . '/admin/assets/images/shortcodes_images/services/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'        => __('Services', 'js_composer'),
            'base'        => 'pado_services',
            'category'    => __('Content', 'js_composer'),
            'description' => __('Block with image and text', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Style', 'js_composer'),
                    'description' => esc_html__('Please select main style', 'js_composer'),
                    'param_name'  => 'style',
                    'value'       => array(
                        array(
                            'value' => 'creative_slider',
                            'label' => esc_html__('Creative slider', 'js_composer'),
                            'image' => $url . 'creative-slider.jpg'
                        ),
                        array(
                            'value' => 'accordion',
                            'label' => esc_html__('Accordion', 'js_composer'),
                            'image' => $url . 'accordion.jpg'
                        ),
                        array(
                            'value' => 'center',
                            'label' => esc_html__('Center', 'js_composer'),
                            'image' => $url . 'center.jpg'
                        ),
                        array(
                            'value' => 'classic',
                            'label' => esc_html__('Classic', 'js_composer'),
                            'image' => $url . 'classic.jpg'
                        ),
                    ),
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Icon type', 'js_composer'),
                    'description' => esc_html__('Please select icon type', 'js_composer'),
                    'param_name'  => 'icon_type',
                    'value'       => array(
                        'Font icon'   => 'font_icon',
                        'Pado icon'   => 'pado_icon',
                        'Custom icon' => 'custom_icon',
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('center'))
                ),
                array(
                    'type'        => 'iconpicker',
                    'heading'     => __('Font Icon', 'js_composer'),
                    'param_name'  => 'icon',
                    'value'       => 'icon-arrow-1-circle-down',
                    'settings'    => array(
                        'emptyIcon'    => false,
                        'type'         => 'info',
                        'source'       => pado_simple_line_icons(),
                        'iconsPerPage' => 4000,
                    ),
                    'description' => __('Select icon', 'js_composer'),
                    'dependency'  => array('element' => 'icon_type', 'value' => array('font_icon'))
                ),
                array(
                    'type'        => 'iconpicker',
                    'heading'     => __( 'Pado icon', 'js_composer' ),
                    'param_name'  => 'pado_icon',
                    'value'       => '',
                    'settings'    => array(
                        'emptyIcon'    => false,
                        'type'         => 'info',
                        'source'       => pado_custom_icons(),
                        'iconsPerPage' => 4000,
                    ),
                    'dependency'  => array('element' => 'icon_type', 'value' => array('pado_icon'))
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => 'Font Icon color',
                    'description' => esc_html__('Please select color for icon', 'js_composer'),
                    'param_name'  => 'icon_color',
                    'dependency'  => array('element' => 'icon_type', 'value' => array('font_icon', 'pado_icon'))
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => 'Font Icon color on hover',
                    'description' => esc_html__('Please select color for icon (hover)', 'js_composer'),
                    'param_name'  => 'icon_color_hover',
                    'dependency'  => array('element' => 'icon_type', 'value' => array('font_icon', 'pado_icon'))
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Custom icon', 'js_composer'),
                    'description' => esc_html__('Please add custom icon', 'js_composer'),
                    'param_name'  => 'custom_icon',
                    'dependency'  => array('element' => 'icon_type', 'value' => array('custom_icon'))
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => __('Content Position', 'js_composer'),
                    'param_name' => 'content_position',
                    'value'      => array(
                        'Left'  => 'left',
                        'Right' => 'right'
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('accordion'))
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'description' => esc_html__('Please add your title', 'js_composer'),
                    'param_name'  => 'title',
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Image', 'js_composer'),
                    'description' => esc_html__('Please add image', 'js_composer'),
                    'param_name'  => 'image',
                    'dependency'  => array('element' => 'style', 'value' => array('classic', 'accordion'))
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Text', 'js_composer'),
                    'description' => esc_html__('Please add simple text', 'js_composer'),
                    'param_name'  => 'text',
                    'dependency'  => array(
                        'element'            => 'style',
                        'value_not_equal_to' => array('accordion')
                    ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Background text', 'js_composer'),
                    'description' => esc_html__('Please add simple text', 'js_composer'),
                    'param_name'  => 'bg_text',
                    'dependency'  => array(
                        'element' => 'style',
                        'value'   => array('creative_slider')
                    ),
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => __('Enable Slider Full Width', 'js_composer'),
                    'param_name' => 'enable_full',
                    'dependency' => array(
                        'element' => 'style',
                        'value'   => array('creative_slider')
                    ),
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items', 'js_composer'),
                    'param_name'  => 'items_accordion',
                    'description' => esc_html__('Please add more information about item', 'js_composer'),
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Number', 'js_composer'),
                            'description' => esc_html__('Please add number', 'js_composer'),
                            'param_name'  => 'number',
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Title', 'js_composer'),
                            'description' => esc_html__('Please add title', 'js_composer'),
                            'param_name'  => 'title',
                        ),
                        array(
                            'type'        => 'textarea',
                            'heading'     => __('Text', 'js_composer'),
                            'description' => esc_html__('Please add simole text', 'js_composer'),
                            'param_name'  => 'text',
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('accordion')),
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items', 'js_composer'),
                    'description' => esc_html__('Please add more information about item', 'js_composer'),
                    'param_name'  => 'items',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'dropdown',
                            'heading'     => __('Icon type', 'js_composer'),
                            'description' => esc_html__('Please select icon type', 'js_composer'),
                            'param_name'  => 'icon_type_item',
                            'value'       => array(
                                'Font icon'   => 'font_icon',
                                'Pado icon'   => 'pado_icon',
                                'Custom icon' => 'custom_icon',
                            ),
                        ),
                        array(
                            'type'        => 'iconpicker',
                            'heading'     => 'Select font icon',
                            'param_name'  => 'icon',
                            'value'       => 'icon-arrow-1-circle-down',
                            'settings'    => array(
                                'emptyIcon'    => false,
                                'type'         => 'info',
                                'source'       => pado_simple_line_icons(),
                                'iconsPerPage' => 4000,
                            ),
                            'description' => __('Select icon', 'js_composer'),
                            'dependency'  => array('element' => 'icon_type_item', 'value' => array('font_icon'))
                        ),
                        array(
                            'type'        => 'iconpicker',
                            'heading'     => __( 'Pado icon', 'js_composer' ),
                            'param_name'  => 'pado_icon',
                            'value'       => '',
                            'settings'    => array(
                                'emptyIcon'    => false,
                                'type'         => 'info',
                                'source'       => pado_custom_icons(),
                                'iconsPerPage' => 4000,
                            ),
                            'dependency'  => array('element' => 'icon_type_item', 'value' => array('pado_icon'))
                        ),
                        array(
                            'type'        => 'attach_image',
                            'heading'     => __('Custom icon', 'js_composer'),
                            'description' => esc_html__('Please add custom icon', 'js_composer'),
                            'param_name'  => 'custom_icon',
                            'dependency'  => array('element' => 'icon_type_item', 'value' => array('custom_icon'))
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Title', 'js_composer'),
                            'description' => esc_html__('Please add title', 'js_composer'),
                            'param_name'  => 'title',
                        ),
                        array(
                            'type'        => 'textarea',
                            'heading'     => __('Text', 'js_composer'),
                            'description' => esc_html__('Please add simple text', 'js_composer'),
                            'param_name'  => 'text'
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('creative_slider')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Autoplay (sec)', 'js_composer'),
                    'param_name'  => 'autoplay',
                    'value'       => '0',
                    'description' => __('0 - off autoplay.', 'js_composer'),
                    'group'       => 'Slider settings',
                    'dependency'  => array('element' => 'style', 'value' => array('creative_slider')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Speed (milliseconds)', 'js_composer'),
                    'param_name'  => 'speed',
                    'value'       => '1500',
                    'description' => __('Speed Animation. Default 500 milliseconds', 'js_composer'),
                    'group'       => 'Slider settings',
                    'dependency'  => array('element' => 'style', 'value' => array('creative_slider')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Loop', 'js_composer'),
                    'description' => esc_html__('Enable loop options?', 'js_composer'),
                    'param_name'  => 'loop',
                    'value'       => '1',
                    'group'       => 'Slider settings',
                    'dependency'  => array('element' => 'style', 'value' => array('creative_slider')),
                ),
            )
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_services extends WPBakeryShortCode
    {
        protected function content($atts, $content = null)
        {

            extract(shortcode_atts(array(
                'title'            => '',
                'content_position' => 'left',
                'icon'             => 'icon-arrow-1-circle-down',
                'pado_icon'        => 'icon-arrow-1-circle-down',
                'icon_type'        => 'font_icon',
                'items'            => '',
                'items_accordion'  => '',
                'custom_icon'       => '',
                'autoplay'         => '',
                'speed'            => '',
                'loop'             => '',
                'icon_color'       => '',
                'icon_color_hover' => '',
                'style'            => 'creative_slider',
                'image'            => '',
                'text'             => '',
                'enable_full'      => '',
                'bg_text'          => ''
            ), $atts));


            // include needed stylesheets
            if ( !in_array("pado-services", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-services";
            }
            $this->enqueueCss();


            if ( !in_array("pado-services", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-services";
            }
            $this->enqueueJs();


            $url = (!empty($image) && is_numeric($image)) ? wp_get_attachment_url($image) : '';
            $img_alt =          get_post_meta($image, '_wp_attachment_image_alt', true);
            $icon_color       = !empty($icon_color) ? $icon_color : '#004ae2';
            $icon_color_hover = !empty($icon_color_hover) ? $icon_color_hover : '#222';

            $autoplay = is_numeric($autoplay) ? $autoplay * 1000 : 0;
            $speed    = is_numeric($speed) ? $speed : '500';
            $loop     = !empty($loop) ? '1' : '0';

            $class = ($style == 'creative_slider' && $enable_full) ? 'slider-large' : '';

            $icon_type         = isset($icon_type) ? $icon_type : 'font_icon';

            $custom_icon       = (isset($custom_icon) && !empty($custom_icon) && is_numeric($custom_icon)) ? wp_get_attachment_url($custom_icon) : '';

            ob_start(); ?>

            <div class="services <?php echo esc_attr($style . ' ' . $class); ?>">

                <?php if ( $style == 'creative_slider' ) { ?>

                    <div class="container no-padd">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="services-content">
                                    <?php if ( !empty($title) ) { ?>
                                        <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                                    <?php }
                                    if ( !empty($text) ) { ?>
                                        <div class="text"><?php echo wp_kses_post($text); ?></div>
                                    <?php } ?>
                                    <div class="swiper-arrows swiper-arrows--desctop">
                                        <div class="swiper3-button-prev ion-chevron-left"></div>
                                        <div class="swiper3-button-next ion-chevron-right"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="services-slider">
                                    <div class="services-slider-wrap">
                                        <div class="services-bg"></div>
                                        <?php if ( !empty($items) ) {
                                            $items = (array)vc_param_group_parse_atts($items); ?>
                                            <div class="swiper3-container"
                                                 data-space="25"
                                                 data-mouse="0"
                                                 data-autoplay="<?php echo esc_attr($autoplay); ?>"
                                                 data-pagination-type="bullets"
                                                 data-loop="<?php echo esc_attr($loop); ?>"
                                                 data-speed="<?php echo esc_attr($speed); ?>"
                                                 data-center="0"
                                                 data-responsive="responsive"
                                                 data-add-slides="auto">

                                                <div class="swiper3-wrapper">

                                                    <?php foreach ( $items as $item ) {
                                                        $icon_type_item   = isset($item['icon_type_item']) && !empty($item['icon_type_item']) ? $item['icon_type_item'] : 'font_icon';
                                                        $custom_icon_item = isset($item['custom_icon']) && !empty($item['custom_icon']) && is_numeric($item['custom_icon']) ? wp_get_attachment_url($item['custom_icon']) : '';
                                                        $custom_icon_alt = isset($item['custom_icon']) && !empty($item['custom_icon']) && is_numeric($item['custom_icon']) ? get_post_meta($item['custom_icon'], '_wp_attachment_image_alt', true) : ''; ?>

                                                        <div class="swiper3-slide">
                                                            <div class="content-slide">
                                                                <?php if ( $icon_type_item == 'font_icon' && !empty($item['icon']) ) { ?>
                                                                    <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                                                                <?php } elseif ($icon_type_item == 'pado_icon' && !empty($item['pado_icon'])) { ?>
                                                                    <i class="<?php echo esc_attr($item['pado_icon']); ?>"></i>
                                                                <?php } elseif ( $icon_type_item == 'custom_icon' && !empty($custom_icon_item) ) { ?>
                                                                    <img src="<?php echo esc_url($custom_icon_item); ?>"
                                                                         alt="<?php echo esc_attr($custom_icon_alt); ?>"
                                                                         class="custom-icon">
                                                                <?php } ?>
                                                                <?php if ( !empty($item['title']) || !empty($item['text']) ) { ?>
                                                                    <div class="content-slider-text">
                                                                        <?php if ( !empty($item['title']) ) { ?>
                                                                            <h5 class="title"><?php echo esc_html($item['title']); ?></h5>
                                                                        <?php }
                                                                        if ( !empty($item['text']) ) { ?>
                                                                            <div class="text"><?php echo wp_kses_post($item['text']); ?></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } // end foreach  ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-arrows swiper-arrows--mobile">
                                        <div class="swiper3-button-prev ion-chevron-left"></div>
                                        <div class="swiper3-button-next ion-chevron-right"></div>
                                    </div>
                                    <?php if ( !empty($bg_text) ) { ?>
                                        <div class="services-bg-text"><?php esc_html_e($bg_text); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } elseif ( $style == 'accordion' ) { ?>
                    <div class="accordeon-wrap <?php echo esc_attr($content_position); ?>">
                        <div class="main-title"><?php echo wp_kses_post($title); ?></div>

                        <?php if ( !empty($items_accordion) ) {
                            $items_accordion = (array)vc_param_group_parse_atts($items_accordion); ?>
                            <ul class="accordeon">
                                <?php

                                $counter = 1;
                                foreach ( $items_accordion as $item ) {
                                    $active       = $counter === 1 ? 'is-show' : '';
                                    $active_title = $counter === 1 ? 'active' : '';
                                    $active_icon  = $counter === 1 ? 'ion-minus' : 'ion-plus'; ?>
                                    <li class="">
                                        <a href="" class="toggle <?php echo esc_attr($active_title); ?>">
                                            <div class="inner-wrap">
                                                <?php if ( !empty($item['number']) ) { ?>
                                                    <div class="number"><?php echo esc_html($item['number']); ?></div>
                                                <?php }

                                                if ( !empty($item['title']) ) { ?>
                                                    <div class="title"><?php echo esc_html($item['title']); ?></div>
                                                <?php } ?>
                                            </div>
                                            <i class="<?php echo esc_attr($active_icon); ?>"></i>
                                        </a>
                                        <ul class="list-drop <?php echo esc_attr($active); ?>">
                                            <li>
                                                <?php if ( !empty($item['text']) ) { ?>
                                                    <div class="text"><?php echo wp_kses_post($item['text']); ?></div>
                                                <?php } ?>
                                            </li>
                                        </ul>

                                    </li>
                                    <?php
                                    $counter++;
                                } ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <?php if ( !empty($url) ) { ?>
                        <div class="img-wrap">
                            <?php echo pado_the_lazy_load_flter($url,
                                array(
                                    'class' => 's-img-switch',
                                    'alt'   => $img_alt
                                )
                            ); ?>
                        </div>
                    <?php } ?>
                <?php } elseif ($style == 'center') { ?>
                    <div class="content">
                        <?php
                        if ( !empty($icon) && $icon_type == 'font_icon' ) { ?>
                            <i class="<?php echo esc_attr($icon); ?>"
                               style="color: <?php echo esc_attr($icon_color); ?>"
                               onmouseover="this.style.color='<?php echo esc_attr($icon_color_hover); ?>'"
                               onmouseout="this.style.color='<?php echo esc_attr($icon_color); ?>'"></i>
                        <?php } elseif ($icon_type == 'pado_icon' && !empty($pado_icon)) { ?>
                            <i class="<?php echo esc_attr($pado_icon); ?>"
                               style="color: <?php echo esc_attr($icon_color); ?>"
                               onmouseover="this.style.color='<?php echo esc_attr($icon_color_hover); ?>'"
                               onmouseout="this.style.color='<?php echo esc_attr($icon_color); ?>'"></i>
                        <?php } elseif ( $icon_type == 'custom_icon' && !empty($custom_icon) ) { ?>
                            <img src="<?php echo esc_url($custom_icon); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="custom-icon">
                        <?php } ?>
                        <?php if ( !empty($title) ) { ?>
                            <h4 class="title"><?php echo esc_html($title); ?></h4>
                        <?php }
                        if ( !empty($text) ) { ?>
                            <div class="text"><?php echo wp_kses_post($text); ?></div>
                        <?php } ?>
                    </div>
                <?php } elseif ($style == 'classic') {
                    if ( !empty($url) ) { ?>
                        <div class="img-wrap">
                            <?php echo pado_the_lazy_load_flter($url,
                                array(
                                    'class' => 's-img-switch',
                                    'alt'   => $img_alt
                                )
                            );
                            ?>
                        </div>
                        <div class="content">
                            <?php if ( !empty($title) ) { ?>
                                <h4 class="title"><?php echo esc_html($title); ?></h4>
                            <?php }
                            if ( !empty($text) ) { ?>
                                <div class="text"><?php echo wp_kses_post($text); ?></div>
                            <?php } ?>
                        </div>
                    <?php }
                } ?>
            </div>

            <?php

            return ob_get_clean();
        }
    }
}
