<?php
if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'                    => esc_html__('Pado Gallery', 'js_composer'),
            'base'                    => 'pado_gallery',
            'content_element'         => true,
            'show_settings_on_create' => false,
            'description'             => esc_html__('Simple Gallery and For Justified Gallery Plugins', 'js_composer'),
            'params'                  => array(
                array(
                    'type'        => 'attach_images',
                    'heading'     => 'Images',
                    'param_name'  => 'images',
                    'admin_label' => true,
                    'description' => 'Upload your images.'
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
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Extra class name', 'js_composer'),
                    'param_name'  => 'el_class',
                    'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => esc_html__('CSS box', 'js_composer'),
                    'param_name' => 'css',
                    'group'      => esc_html__('Design options', 'js_composer'),
                ),
            ),
            //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_gallery extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'images'   => '',
                'overlay'  => 'on',
                'el_class' => '',
                'css'      => ''

            ), $atts));

            if ( !in_array("pado-gallery", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-gallery";
            }

            $this->enqueueCss();

            if ( !in_array("pado-gallery", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-gallery";
            }
            $this->enqueueJs();

            // el class
            $css_classes = array(
                $this->getExtraClass($el_class)
            );

            $wrap_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($css_classes)), $this->settings['base'], $atts);

            /* get custum css as class*/
            $wrap_class .= vc_shortcode_custom_css_class($css, ' ');
            $wrap_class .= !empty($el_class) ? ' ' . $el_class : '';
            $css_class  = !empty($wrap_class) ? ' ' . $wrap_class : '';

            ob_start(); ?>

            <!-- Row -->
            <?php if ( !empty($images) ) {

                $images = explode(',', $images); ?>
                <div class="<?php echo esc_attr($css_class); ?>">
                    <div class="thumb-slider-wrapp full-height-window-hard">
                        <div class="main-thumb-slider">
                            <?php if ( isset($overlay) && $overlay ) : ?>
                                <span class="overlay"></span>
                            <?php endif; ?>
                            <ul class="slides">
                                <?php foreach ( $images as $key => $image_id ) :
                                    $attachment = get_post($image_id); ?>
                                    <li>
                                        <div class="thumb-slider-bg">
                                            <?php $url = wp_get_attachment_image_url($image_id, 'full');
                                            echo pado_the_lazy_load_flter($url, array(
                                                'class' => 's-img-switch',
                                                'alt'   => $attachment->post_excerpt
                                            )); ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="sub-thumb-slider">
                            <ul class="slides">
                                <?php foreach ( $images as $key => $image_id ) :
                                    $attachment = get_post($image_id); ?>
                                    <li>
                                        <div class="thumb-slider-bg">
                                            <?php $url = wp_get_attachment_image_url($image_id, 'medium');
                                            echo pado_the_lazy_load_flter($url, array(
                                                'class' => 's-img-switch',
                                                'alt'   => $attachment->post_excerpt
                                            )); ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="thumb-slider-wrapp-arrow">
                            <span class="hide-images"><?php esc_html_e('Hide images', 'pado'); ?></span>
                            <span class="show-images"><?php esc_html_e('Show images', 'pado'); ?></span>
                        </div>
                    </div>
                </div>

                <?php
            }

            return ob_get_clean();
        }
    }
}

