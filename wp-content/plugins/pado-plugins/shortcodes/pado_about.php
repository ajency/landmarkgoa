<?php
if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'        => esc_html__('About', 'js_composer'),
            'base'        => 'pado_about',
            'description' => __('Section with image, text and button', 'js_composer'),
            'category'    => __('Content', 'js_composer'),
            'params'      => array(
                array(
                    'type'       => 'attach_image',
                    'heading'    => __('Section image', 'js_composer'),
                    'param_name' => 'image1',
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => __('Section addition image', 'js_composer'),
                    'param_name' => 'image2',
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => __('Title', 'js_composer'),
                    'param_name' => 'title',
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => __('Background title', 'js_composer'),
                    'param_name' => 'bg_title',
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => __('Description', 'js_composer'),
                    'param_name' => 'content',
                ),
                array(
                    'type'       => 'vc_link',
                    'heading'    => __('Button', 'js_composer'),
                    'param_name' => 'button',
                ),
                array(
                    'type'        => 'dropdown',
                    'description' => '',
                    'heading'     => __('Button style', 'js_composer'),
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
                    'admin_label' => true,
                    'save_always' => true,
                ),
            ),

            //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_about extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'title'     => '',
                'bg_title'  => '',
                'image1'    => '',
                'image2'    => '',
                'button'    => '',
                'btn_style' => '',
            ), $atts));

            // include needed stylesheets
            if ( !in_array("pado-about", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-about";
            }
            $this->enqueueCss();


            $btn_style = isset($btn_style) && !empty($btn_style) ? $btn_style : 'a-btn a-btn-1';
            // start output
            ob_start(); ?>
            <div class="about-section">
                <div class="about-row">
                    <?php if ( !empty($image1) ) { ?>
                        <div class="about-image-col">
                            <div class="about-image">
                                <?php
                                $image1_alt = (!empty($image1) && is_numeric($image1)) ? get_post_meta($image1, '_wp_attachment_image_alt', true) : '';

                                $image1 = (!empty($image1) && is_numeric($image1)) ? wp_get_attachment_url($image1) : '';
                                if ( $image1 ) :
                                    echo pado_the_lazy_load_flter($image1, array(
                                        'class' => 's-img-switch',
                                        'alt'   => $image1_alt
                                    ));
                                endif; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ( !empty($image2) ) { ?>
                        <div class="about-image-col">
                            <div class="about-image">
                                <?php
                                $image2_alt = (!empty($image2) && is_numeric($image2)) ? get_post_meta($image2, '_wp_attachment_image_alt', true) : '';

                                $image2 = (!empty($image2) && is_numeric($image2)) ? wp_get_attachment_url($image2) : '';
                                if ( $image2 ) :
                                    echo pado_the_lazy_load_flter($image2, array(
                                        'class' => 's-img-switch',
                                        'alt'   => $image2_alt
                                    ));
                                endif; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="content-wrap">
                        <div class="content">
                            <?php if ( !empty($title) ) { ?>
                                <h2 class="title"><?php echo wp_kses_post($title); ?></h2>
                            <?php }
                            if ( !empty($content) ) { ?>
                                <div class="description"><?php echo wp_kses_post($content); ?></div>
                            <?php }
                            if ( !empty($button) ) {
                                $url = vc_build_link($button);
                            }
                            if ( !empty($url['url']) ) {
                                $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self'; ?>
                                <div class="but-wrap">
                                    <a href="<?php echo esc_attr($url['url']); ?>"
                                       class="<?php echo esc_attr($btn_style); ?>"
                                       target="<?php echo esc_attr($target); ?>">
                                        <?php echo wp_kses_post($url['title']); ?>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ( !empty($bg_title) ) { ?>
                                <div class="bg-title"><?php echo wp_kses_post($bg_title); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php return ob_get_clean();
        }
    }
}