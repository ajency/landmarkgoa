<?php
if ( function_exists('vc_map') ) {
    $url     = EF_URL . '/admin/assets/images/shortcodes_images/heading/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'        => __('Headings', 'js_composer'),
            'base'        => 'pado_headings',
            'description' => __('Section with text button (with paddings)', 'js_composer'),
            'category'    => __('Content', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Style', 'js_composer'),
                    'description' => __('Please select main style', 'js_composer'),
                    'param_name'  => 'style',
                    'value'       => array(
                        array(
                            'value' => 'style2',
                            'label' => esc_html__('Simple', 'js_composer'),
                            'image' => $url . 'style2.jpg'
                        ),
                        array(
                            'value' => 'style1',
                            'label' => esc_html__('Text left align', 'js_composer'),
                            'image' => $url . 'style1.jpg'
                        ),
                        array(
                            'value' => 'style5',
                            'label' => esc_html__('Text with type animation', 'js_composer'),
                            'image' => $url . 'style5.gif'
                        ),
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Subtitle', 'js_composer'),
                    'description' => __('Please add subtitle', 'js_composer'),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'dependency'  => array('element' => 'style', 'value' => array('style2'))
                ),
                array(
                    "type"        => "colorpicker",
                    "heading"     => __("Subtitle color", "js_composer"),
                    'description' => __('Please select subtitle color', 'js_composer'),
                    "param_name"  => "subtitle_color",
                    "value"       => '', //Default color
                    'dependency'  => array('element' => 'style', 'value' => array('style2'))
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'param_name'  => 'title',
                    'value'       => '',
                    'description' => __("If you want to add the word which will be marked by main color, please insert it in &#60;i&#62; tag, for example: &#60;i&#62;Hello&#60;/i&#62;. And if you want to add the word which will be marked bold, please insert it in &#60;b&#62; tag, for example: &#60;b&#62;Hello&#60;/b&#62;", 'js_composer'),
                ),
                array(
                    "type"        => "colorpicker",
                    "heading"     => __("Title color", "js_composer"),
                    'description' => __('Please select title color', 'js_composer'),
                    "param_name"  => "title_color",
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Description', 'js_composer'),
                    'param_name'  => 'description',
                    'value'       => '',
                    'dependency'  => array('element' => 'style', 'value' => array('style2')),
                    'description' => __("If you want to add the word which will be marked by main color, please insert it in &#60;i&#62; tag, for example: &#60;i&#62;Hello&#60;/i&#62;", 'js_composer'),
                ),
                array(
                    "type"        => "colorpicker",
                    "heading"     => __("Description color", "js_composer"),
                    'description' => __('Please select title color', 'js_composer'),
                    "param_name"  => "description_color",
                    "value"       => '',
                    'dependency'  => array('element' => 'style', 'value' => array('style2'))
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Animation text', 'js_composer'),
                    'param_name'  => 'animation_text',
                    'value'       => '',
                    'description' => __("You can write several words without spaces and separate it by the comma.", 'js_composer'),
                    'dependency'  => array('element' => 'style', 'value' => array('style5'))
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Button', 'js_composer'),
                    'description' => __('Please specify link for the button', 'js_composer'),
                    'param_name'  => 'button',
                    'dependency'  => array('element' => 'style', 'value' => array('style1'))
                ),
                array(
                    'type'       => 'select_preview',
                    'heading'    => __( 'Button style', 'js_composer' ),
                    'description' => __( 'Please select button style', 'js_composer' ),
                    'param_name' => 'btn_style',
					'dependency' => array( 'element' => 'style', 'value' => array( 'style1' ) ),
                    'value'      => array(
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
                    'heading'     => __('Heading align', 'js_composer'),
                    'description' => __('Please select heading align', 'js_composer'),
                    'param_name'  => 'align',
                    'value'       => array(
                        'Center' => 'text-center',
                        'Left'   => 'text-left',
                        'Right'  => 'text-right',
                    ),
                    'default'     => 'text-center',
                    'dependency'  => array('element' => 'style', 'value' => array('style2'))
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__('Remove fade-in-up animation on load?', 'js_composer'),
                    'description' => __('Do you want to remove fade-in-up animation?', 'js_composer'),
                    'param_name'  => 'animation_fade',
                    'std'         => '',
                ),
            ),

            //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_headings extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'title'             => '',
                'subtitle_color'    => '',
                'title_color'       => '',
                'subtitle'          => '',
                'animation_fade'    => '',
                'animation_text'    => '',
                'style'             => 'style2',
                'links'             => '',
                'button'            => '',
                'btn_style'         => 'a-btn a-btn-1',
                'description'       => '',
                'description_color' => '',
                'align'             => 'text-center',
            ), $atts));


            if ( $style == 'style5' ) {
                if ( !in_array("pado-typed", self::$js_scripts) ) {
                    self::$js_scripts[] = "pado-typed";
                }

                if ( !in_array("pado-headings", self::$js_scripts) ) {
                    self::$js_scripts[] = "pado-headings";
                }
            }
            $this->enqueueJs();

            // include needed stylesheets
            if ( !in_array("pado-headings", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-headings";
            }
            $this->enqueueCss();

            $animation_text    = isset($animation_text) && !empty($animation_text) ? $animation_text : '';
            $wrapClass         = isset($animation_fade) && !empty($animation_fade) ? '' : 'load-fade';
            $subtitle_color    = !empty($subtitle_color) ? 'style="color:' . $subtitle_color . '" ' : '';
            $title_color       = !empty($title_color) ? 'style="color:' . $title_color . '" ' : '';
            $description_color = !empty($description_color) ? 'style="color:' . $description_color . '" ' : '';
            $align             = ($style == 'style2') ? $align : '';
            $title_size        = ($style == 'style1') ? 'h3' : 'h2';

            // start output
            ob_start(); ?>
            <div class="headings-wrap <?php echo esc_attr($wrapClass); ?>">
                <div class="container no-padd">
                    <div class="row">
                        <div class="headings <?php echo esc_attr($style . ' ' . $align); ?>">
                            <?php if ($style == 'style1' || $style == 'style2') { ?>
                            <div class="content">
                                <div class="info">
                                    <?php if ( !empty($subtitle) ) { ?>
                                        <h5 class="subtitle" <?php echo $subtitle_color ?> ><?php echo esc_html($subtitle); ?></h5>
                                    <?php }
                                    if (!empty($title)) { ?>
                                    <<?php echo esc_attr($title_size); ?> class="title" <?php echo $title_color ?>>
                                    <?php echo wp_kses_post($title); ?>
                                </<?php echo esc_attr($title_size); ?>>
                                <?php }
                                if ( !empty($description) && $style == 'style2' ) { ?>
                                    <div class="description" <?php echo $description_color ?> >
                                        <?php echo wp_kses_post($description); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if ( !empty($button) ) {
                                $url = vc_build_link($button);
                                $target = !empty($url['target']) ? $url['target'] : '_self';
                                if ( !empty($url['title']) ) { ?>
                                    <div class="but-wrap">
                                        <a href="<?php echo esc_attr($url['url']); ?>"
                                           target="<?php echo esc_attr($target); ?>"
                                           class="<?php echo esc_attr($btn_style); ?>">
                                            <?php echo esc_html($url['title']); ?>
                                        </a>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <?php } elseif ( $style == 'style5' ) { ?>
                            <div class="content">
                                <div class="info">
                                    <?php
                                    if ( !empty($title) ) { ?>
                                        <h3 class="title" <?php echo $title_color ?> >
                                            <?php echo wp_kses_post($title); ?> <span class="typed"
                                                                                      data-words="<?php echo esc_attr($animation_text); ?>"></span>
                                        </h3>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <?php // end output

            return ob_get_clean();
        }
    }
}