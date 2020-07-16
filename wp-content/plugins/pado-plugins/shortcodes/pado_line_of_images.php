<?php
if ( function_exists('vc_map') ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/line_of_images/';
    vc_map(array(
        'name'                    => __('Line of images', 'js_composer'),
        'base'                    => 'pado_line_of_images',
        'description'             => __('Section with line of images', 'js_composer'),
        'content_element'         => true,
        'show_settings_on_create' => true,
        'params'                  => array(
            array(
                'type'        => 'select_preview',
                'heading'     => __('Style', 'js_composer'),
                'description' => __('Please select main style', 'js_composer'),
                'param_name'  => 'style',
                'value'       => array(
                    array(
                        'value' => 'clients',
                        'label' => esc_html__('Clients', 'js_composer'),
                        'image' => $url . 'clients.jpg'
                    ),
                    array(
                        'value' => 'clients-2',
                        'label' => esc_html__('Clients (style 2)', 'js_composer'),
                        'image' => $url . 'clients-2.jpg'
                    ),
                )
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => __('Large desktop count images', 'js_composer'),
                'param_name' => 'count_lg',
                'value'      => array(
                    'Six'   => '6',
                    'Five'  => '5',
                    'Four'  => '4',
                    'Three' => '3',
                    'Two'   => '2',
                    'One'   => '1',
                ),
                'std'        => '5',
                'dependency' => array('element' => 'style', 'value' => array('clients'))
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => __('Medium desktop count images', 'js_composer'),
                'param_name' => 'count_md',
                'value'      => array(
                    'Five'  => '5',
                    'Four'  => '4',
                    'Three' => '3',
                    'Two'   => '2',
                    'One'   => '1',
                ),
                'std'        => '4',
                'dependency' => array('element' => 'style', 'value' => array('clients'))
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => __('Tablets count images', 'js_composer'),
                'param_name' => 'count_sm',
                'value'      => array(
                    'Four'  => '4',
                    'Three' => '3',
                    'Two'   => '2',
                    'One'   => '1',
                ),
                'std'        => '2',
                'dependency' => array('element' => 'style', 'value' => array('clients'))
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => __('Mobile count images', 'js_composer'),
                'param_name' => 'count_xs',
                'value'      => array(
                    'Three' => '3',
                    'Two'   => '2',
                    'One'   => '1',
                ),
                'std'        => '1',
                'dependency' => array('element' => 'style', 'value' => array('clients'))
            ),
            array(
                'type'       => 'param_group',
                'heading'    => __('Images', 'js_composer'),
                'param_name' => 'logos',
                'value'      => urlencode(json_encode(array())),
                'params'     => array(
                    array(
                        'type'        => 'attach_image',
                        'heading'     => __('Image', 'js_composer'),
                        'description' => __('Please add image', 'js_composer'),
                        'param_name'  => 'image'
                    ),
                    array(
                        'type'        => 'vc_link',
                        'heading'     => __('URL', 'js_composer'),
                        'description' => __('Please specify link for images', 'js_composer'),
                        'param_name'  => 'url',
                    ),
                ),
                'dependency' => array('element' => 'style', 'value' => array('clients', 'clients-2'))
            ),
            array(
                'type'        => 'textfield',
                'heading'     => __('Extra class name', 'js_composer'),
                'param_name'  => 'el_class',
                'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
                'value'       => '',
            ),
            array(
                'type'       => 'css_editor',
                'heading'    => __('CSS box', 'js_composer'),
                'param_name' => 'css',
                'group'      => __('Design options', 'js_composer'),
            ),
        ) //end params
    ));
}

if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_pado_line_of_images extends WPBakeryShortCode {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'style'    => 'clients',
                'images'   => '',
                'count_lg' => '5',
                'count_md' => '4',
                'count_sm' => '2',
                'count_xs' => '1',
                'logos'    => '',
                'el_class' => '',
                'css'      => '',
            ), $atts));

            // include needed stylesheets
            if ( !in_array("pado-line-of-images", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-line-of-images";
            }
            $this->enqueueCss();

            // custum css
            $css_class = vc_shortcode_custom_css_class($css, ' ');

            // custum class
            $css_class .= (!empty($el_class)) ? ' ' . $el_class : '';

            $count_lg = 'lg-' . ((isset($count_lg) && !empty($count_lg)) ? $count_lg : '6');
            $count_md = 'md-' . ((isset($count_md) && !empty($count_md)) ? $count_md : '5');
            $count_sm = 'sm-' . ((isset($count_sm) && !empty($count_sm)) ? $count_sm : '4');
            $count_xs = 'xs-' . ((isset($count_xs) && !empty($count_xs)) ? $count_xs : '3');

            $count = ($style === 'clients') ? $count_lg . ' ' . $count_md . ' ' . $count_sm . ' ' . $count_xs : '';

            ob_start(); ?>

            <div class="line-of-images <?php echo esc_attr($css_class . ' ' . $style); ?>">
                <div class="line-wrap">
                    <?php if ( $style == 'clients' || $style == 'clients-2' ) :
                        if ( !empty($logos) ) {
                            $logos = (array)vc_param_group_parse_atts($logos);

                            foreach ( $logos as $logo ) {
                                if ( !empty($logo['url']) ) {
                                    $link = vc_build_link($logo['url']);
                                }
                                if ( !empty($link['url']) ) { ?>
                                    <a href="<?php echo esc_url($link['url']); ?>"
                                       target="<?php echo esc_attr($link['target']); ?>"
                                       class="line-item <?php echo esc_attr($count); ?>">
                                        <?php
                                        $img_alt = get_post_meta($logo['image'], '_wp_attachment_image_alt', true);
                                        echo pado_the_lazy_load_flter($logo['image'], array('class' => '', 'alt' => $img_alt), true, 'large'); ?>
                                    </a>
                                <?php } else { ?>
                                    <div class="line-item <?php echo esc_attr($count); ?>">
                                        <?php
                                        $img_alt = get_post_meta($logo['image'], '_wp_attachment_image_alt', true);
                                        echo pado_the_lazy_load_flter($logo['image'], array('class' => '', 'alt' => $img_alt), true, 'large'); ?>
                                    </div>
                                <?php }
                            }
                        }
                    endif; ?>
                </div>
            </div>

            <?php
            return ob_get_clean();
        }
    }
}