<?php
if ( function_exists('vc_map') ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/banner/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'        => __('Image banner', 'js_composer'),
            'base'        => 'pado_banner',
            'description' => __('Image banner with text and button', 'js_composer'),
            'category'    => __('Media', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'attach_image',
                    'description' => __('Please add your image', 'js_composer'),
                    'heading'     => __('Background image', 'js_composer'),
                    'param_name'  => 'image'
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax for background', 'js_composer'),
                    'description' => __('Do you want to parallax for background?', 'js_composer'),
                    'param_name'  => 'parallax',
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax for mobile device', 'js_composer'),
                    'description' => __('Do you want to enable parallax for mobile?', 'js_composer'),
                    'param_name'  => 'parallax_mob',
                    'dependency'  => array(
                        'element'   => 'parallax',
                        'not_empty' => true,
                    ),
                ),
                array(
                    'type'        => 'textarea',
                    'description' => __('Please add text your subtitle', 'js_composer'),
                    'heading'     => __('Subtitle', 'js_composer'),
                    'param_name'  => 'subtitle',
                    'admin_label' => true,
                    'save_always' => true,
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'param_name'  => 'title',
                    'description' => __("If you want to add the word which will be marked by main color, please insert it in &#60;i&#62; tag, for example: &#60;i&#62;Hello&#60;/i&#62;. And if you want to add the word which will be marked bold, please insert it in &#60;b&#62; tag, for example: &#60;b&#62;Hello&#60;/b&#62;"),
                    'admin_label' => true,
                    'save_always' => true,
                ),
                array(
                    'type'        => 'textarea',
                    'description' => __('Please add text your description', 'js_composer'),
                    'heading'     => __('Description', 'js_composer'),
                    'param_name'  => 'description'
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => __('Enable light style for content?', 'js_composer'),
                    'param_name' => 'light',
                    'dependency' => array('element' => 'style_banner', 'value' => 'simple')
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Button', 'js_composer'),
                    'description' => __('Please specify link for button', 'js_composer'),
                    'param_name'  => 'button',
                ),
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => __('Please select button style ', 'js_composer'),
                    'param_name'  => 'btn_style',
                    'value'       => array(
                        array(
                            'value' => 'a-btn a-btn-1',
                            'label' => esc_html__('Default', 'js_composer'),
                            'image' => $url_btn . 'a-btn-1.png'
                        ),
                        array(
                            'value' => 'a-btn a-btn-1 a-btn-arrow',
                            'label' => esc_html('Default with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-1 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-2',
                            'label' => esc_html('Default Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-2.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-2 a-btn-arrow',
                            'label' => esc_html('Default Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-2 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-3',
                            'label' => esc_html('Dark', 'pado'),
                            'image' => $url_btn . 'a-btn-3.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-3 a-btn-arrow',
                            'label' => esc_html('Dark with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-3 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-4',
                            'label' => esc_html('Dark Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-4.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-4 a-btn-arrow',
                            'label' => esc_html('Dark Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-4 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-5',
                            'label' => esc_html('Light', 'pado'),
                            'image' => $url_btn . 'a-btn-5.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-5 a-btn-arrow',
                            'label' => esc_html('Light with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-5 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-6',
                            'label' => esc_html('Light Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-6.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-6 a-btn-arrow',
                            'label' => esc_html('Light Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-6 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-7',
                            'label' => esc_html('White', 'pado'),
                            'image' => $url_btn . 'a-btn-7.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-7 a-btn-arrow',
                            'label' => esc_html('White with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-7 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-8',
                            'label' => esc_html('White Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-8.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-8 a-btn-arrow',
                            'label' => esc_html('White Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-8 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-link',
                            'label' => esc_html('Default link', 'pado'),
                            'image' => $url_btn . 'a-btn-link.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-link a-btn-arrow',
                            'label' => esc_html('Default link with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-link a-btn-arrow.png',
                        ),
                    )
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Additional Button', 'js_composer'),
                    'description' => __('Please specify link for button', 'js_composer'),
                    'param_name'  => 'add_button',
                ),
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Additional button style', 'js_composer'),
                    'description' => __('Please select button style ', 'js_composer'),
                    'param_name'  => 'add_btn_style',
                    'value'       => array(
                        array(
                            'value' => 'a-btn a-btn-1',
                            'label' => esc_html__('Default', 'js_composer'),
                            'image' => $url_btn . 'a-btn-1.png'
                        ),
                        array(
                            'value' => 'a-btn a-btn-1 a-btn-arrow',
                            'label' => esc_html('Default with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-1 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-2',
                            'label' => esc_html('Default Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-2.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-2 a-btn-arrow',
                            'label' => esc_html('Default Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-2 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-3',
                            'label' => esc_html('Dark', 'pado'),
                            'image' => $url_btn . 'a-btn-3.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-3 a-btn-arrow',
                            'label' => esc_html('Dark with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-3 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-4',
                            'label' => esc_html('Dark Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-4.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-4 a-btn-arrow',
                            'label' => esc_html('Dark Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-4 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-5',
                            'label' => esc_html('Light', 'pado'),
                            'image' => $url_btn . 'a-btn-5.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-5 a-btn-arrow',
                            'label' => esc_html('Light with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-5 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-6',
                            'label' => esc_html('Light Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-6.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-6 a-btn-arrow',
                            'label' => esc_html('Light Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-6 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-7',
                            'label' => esc_html('White', 'pado'),
                            'image' => $url_btn . 'a-btn-7.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-7 a-btn-arrow',
                            'label' => esc_html('White with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-7 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-8',
                            'label' => esc_html('White Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-8.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-8 a-btn-arrow',
                            'label' => esc_html('White Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-8 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-link',
                            'label' => esc_html('Default link', 'pado'),
                            'image' => $url_btn . 'a-btn-link.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-link a-btn-arrow',
                            'label' => esc_html('Default link with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-link a-btn-arrow.png',
                        ),
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Height Banner', 'js_composer'),
                    'description' => __('Please specify the height of the banner', 'js_composer'),
                    'param_name'  => 'height',
                    'value'       => array(
                        'Small'       => 'small_banner',
                        'Medium'      => 'medium_banner',
                        'Full height' => 'full',
                    ),
                    'dependency'  => array('element' => 'style_banner', 'value' => 'simple')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Content align', 'js_composer'),
                    'description' => __('Please select text alignment', 'js_composer'),
                    'param_name'  => 'style',
                    'value'       => array(
                        'Center content' => 't-center',
                        'Right content'  => 't-right',
                        'Left content'   => 't-left',
                    ),
                    'dependency'  => array('element' => 'style_banner', 'value' => 'simple')
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Full width?', 'js_composer'),
                    'description' => __('Enable full width for this banner', 'js_composer'),
                    'param_name'  => 'fullwidth',
                    'dependency'  => array('element' => 'style_banner', 'value' => 'simple')
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Show overlay?', 'js_composer'),
                    'description' => __('Enable overlay for this banner', 'js_composer'),
                    'param_name'  => 'overlay',
                    'dependency'  => array('element' => 'style_banner', 'value' => 'simple')
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Add additional info?', 'js_composer'),
                    'description' => __('Enable additional information', 'js_composer'),
                    'param_name'  => 'add_info',
                    'dependency'  => array('element' => 'height', 'value' => 'full')
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Socials', 'js_composer'),
                    'description' => __('Please add social information', 'js_composer'),
                    'param_name'  => 'add_soc',
                    'dependency'  => array(
                        'element'   => 'add_info',
                        'not_empty' => true,
                    ),
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
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Additional title', 'js_composer'),
                    'description' => __('Please add additional title', 'js_composer'),
                    'dependency'  => array(
                        'element'   => 'add_info',
                        'not_empty' => true,
                    ),
                    'param_name'  => 'additional_title',
                ),
            ),
            //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_banner extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'image'            => '',
                'subtitle'         => '',
                'title'            => '',
                'description'      => '',
                'light'            => '',
                'button'           => '',
                'btn_style'        => 'a-btn a-btn-1',
                'add_button'       => '',
                'add_btn_style'    => 'a-btn a-btn-1',
                'style'            => 't-center',
                'height'           => 'small_banner',
                'parallax'         => '',
                'parallax_mob'     => '',
                'overlay'          => '',
                'fullwidth'        => '',
                'add_info'         => '',
                'additional_title' => '',
                'add_soc'          => '',
            ), $atts));


            // include needed stylesheets
            if ( !in_array("pado-banner-image", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-banner-image";
            }
            $this->enqueueCss();

            $banner_height = ($height == 'full') ? 'full-height-window' : $height;
            $fullwidth     = isset($fullwidth) && $fullwidth ? 'container-fluid' : 'container';
            $light         = isset($light) && $light ? '-light' : '';
            $image         = (!empty($image) && is_numeric($image)) ? wp_get_attachment_url($image) : '';

            ob_start(); ?>

            <div class="top-banner <?php echo esc_attr($banner_height . ' ' . $style . ' ' . $light); ?>">
                <?php if ( isset($add_info) && $add_info && (!empty($additional_title) || !empty($add_soc)) ) { ?>
                    <div class="additional_wrap">
                        <?php if ( !empty($additional_title) ) { ?>
                            <div class="additional_title">
                                <?php echo wp_kses_post($additional_title); ?>
                            </div>
                        <?php } ?>
                        <?php if ( !empty($add_soc) ) {
                            $add_soc = (array)vc_param_group_parse_atts($add_soc); ?>
                            <div class="socials">
                                <?php foreach ( $add_soc as $item ) { ?>
                                    <a href="<?php echo esc_url($item['social_url']); ?>"><i
                                                class="fa <?php echo esc_attr($item['icon']); ?>"></i></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
                if ( !empty($image) ) {
                    if ( $parallax ) {
                        $parallax_mob = isset($parallax_mob) ? $parallax_mob : false;
                        $parallax_mob = ($parallax_mob) ? 'data-ios-disabled=false data-android-disabled=false' : ''; ?>
                        <div class="img-parallax" data-parallax="scroll" data-position-Y="top"
                             data-image-src="<?php echo esc_url($image); ?>" <?php echo esc_attr($parallax_mob); ?>></div>
                    <?php } else {
                        echo pado_the_lazy_load_flter($image,
                            array(
                                'class' => 's-img-switch',
                                'alt'   => ''
                            )
                        );
                    }
                }
                if ( !empty($overlay) ) { ?>
                    <span class="overlay"></span>
                <?php } ?>
                <div class="banner-wrap">
                    <div class="<?php echo esc_attr($fullwidth); ?>">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php
                                if ( isset($subtitle) && !empty($subtitle) ) { ?>
                                    <h5 class="subtitle">
                                        <?php echo wp_kses_post($subtitle); ?>
                                    </h5>
                                <?php }
                                if ( !empty($title) ) { ?>
                                    <h3 class="title">
                                        <?php echo wp_kses_post($title); ?>
                                    </h3>
                                <?php }
                                if ( !empty($description) ) { ?>
                                    <div class="description">
                                        <?php echo wp_kses_post($description); ?>
                                    </div>
                                <?php } ?>
                                <?php
                                $url     = !empty($button) ? vc_build_link($button) : '';
                                $add_url = !empty($add_button) ? vc_build_link($add_button) : '';
                                if ( isset($url) && !empty($url['title']) || isset($add_url) && !empty($add_url['title']) ) { ?>
                                    <div class="buttons">
                                        <?php
                                        if ( isset($url) && !empty($url['title']) ) { ?>
                                            <a href="<?php echo esc_attr($url['url']); ?>"
                                               class="<?php echo esc_attr($btn_style); ?>"
                                               target="<?php echo esc_attr($url['target']); ?>"><?php echo esc_html($url['title']); ?></a>
                                        <?php }
                                        if ( isset($add_url) && !empty($add_url['title']) ) { ?>
                                            <a href="<?php echo esc_attr($add_url['url']); ?>"
                                               class="<?php echo esc_attr($add_btn_style); ?>"
                                               target="<?php echo esc_attr($add_url['target']); ?>"><?php echo esc_html($add_url['title']); ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php // end output

            return ob_get_clean();
        }
    }
}