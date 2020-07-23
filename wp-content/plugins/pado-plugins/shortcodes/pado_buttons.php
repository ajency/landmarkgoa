<?php
if ( function_exists('vc_map') ) {
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'        => __('Button', 'js_composer'),
            'base'        => 'pado_button',
            'description' => __('Simple buttons', 'js_composer'),
            'category'    => __('Media', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Button', 'js_composer'),
                    'description' => __('Please specify link for button', 'js_composer'),
                    'param_name'  => 'button',
                ),
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => __('Please select button style', 'js_composer'),
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
                    'description' => __('Please select button style', 'js_composer'),
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
                    'heading'     => __('Buttons align', 'js_composer'),
                    'description' => __('Please select buttons alignment', 'js_composer'),
                    'param_name'  => 'style',
                    'value'       => array(
                        'Center' => 'text-center',
                        'Right'  => 'text-right',
                        'Left'   => 'text-left',
                    ),
                ),
            ),
            //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_button extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'button'        => '',
                'btn_style'     => 'a-btn a-btn-1',
                'add_button'    => '',
                'add_btn_style' => 'a-btn a-btn-1',
                'style'         => 'text-center',
            ), $atts));

            ob_start(); ?>

            <div class="button-wrap <?php echo esc_attr($style); ?>">
                <?php if ( !empty($button) ) {
                    $url = vc_build_link($button);
                    $target = !empty($url['target']) ? $url['target'] : '_self';
                }
                if ( isset($url) && !empty($url['title']) ) { ?>
                    <a href="<?php echo esc_attr($url['url']); ?>"
                       class="<?php echo esc_attr($btn_style); ?>"
                       target="<?php echo esc_attr($target); ?>"><?php echo esc_html($url['title']); ?></a>
                <?php }

                if ( !empty($add_button) ) {
                    $add_url = vc_build_link($add_button);
                    $add_target = !empty($add_url['target']) ? $add_url['target'] : '_self';
                }
                if ( !empty($add_url['title']) ) { ?>
                    <a href="<?php echo esc_attr($add_url['url']); ?>"
                       class="<?php echo esc_attr($add_btn_style); ?>"
                       target="<?php echo esc_attr($add_target); ?>"><?php echo esc_html($add_url['title']); ?></a>
                <?php } ?>
            </div>

            <?php // end output

            return ob_get_clean();
        }
    }
}