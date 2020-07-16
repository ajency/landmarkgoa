<?php
$url     = EF_URL . '/admin/assets/images/shortcodes_images/image_parallax/';
if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'                    => esc_html__('Image Parallax', 'js_composer'),
            'base'                    => 'image_parallax',
            'description'             => __('Image parallax with text', 'js_composer'),
            'as_parent'               => array('only' => 'image_parallax_items'),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'js_view'                 => 'VcColumnView',
            'params'                  => array(
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax Mobile', 'js_composer'),
                    'description' => __('Enable parallax on mobile?', 'js_composer'),
                    'param_name'  => 'parallax_mob',
                    'std'         => false,
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Extra class name',
                    'param_name'  => 'el_class',
                    'description' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.',
                    'value'       => '',
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => 'CSS box',
                    'param_name' => 'css',
                    'group'      => 'Design options',
                ),
            )
            //end params
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_image_parallax extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'parallax_mob'        => '',
                'el_class' => '',
                'css'      => '',
            ), $atts));

            // include needed stylesheets
            if ( !in_array("pado-image-parallax", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-image-parallax";
            }
            $this->enqueueCss();

            /* get custum css as class*/
            $wrap_class = vc_shortcode_custom_css_class($css, ' ');
            $wrap_class .= !empty($el_class) ? ' ' . $el_class : '';
            global $image_parallax_items;
            $image_parallax_items = array();
            do_shortcode($content);
            // start output
            ob_start();
            if ( !empty($image_parallax_items) ) { ?>

            <div class="image-parallax <?php esc_attr($wrap_class); ?>">

                <?php foreach ( $image_parallax_items as $image_parallax_item ) {
                    $item               = $image_parallax_item['atts'];
                    $item['style']      = isset($item['style']) ? $item['style'] : 'simple';
                    $item['title_size'] = isset($item['heading_size']) ? $item['heading_size'] : 'h1';
                    $item['position']   = isset($item['position']) ? $item['position'] : 'image-parallax__item--center';
                    $heading_align      = $item['position'] == 'image-parallax__item--center' ? 'text-center' : 'text-left';
                    $class_item         = $item['style'] == 'modern' ? $item['position'] : '';
                    $class_item         .= ' ' . $item['style'];

                    $parallax_mob = isset($parallax_mob) ? $parallax_mob : false;
                    $parallax_mob = ($parallax_mob) ? 'data-ios-disabled=false data-android-disabled=false' : '';
                    if ( !empty($item) ) {
                        $image_id = $item['image'];
                        $url      = (is_numeric($image_id) && !empty($image_id)) ? wp_get_attachment_url($image_id) : ''; ?>

                    <div class="image-parallax__item full-height-window <?php echo esc_attr($class_item); ?>"
                         data-parallax="scroll" data-position-Y="top"
                         data-image-src="<?php echo esc_url($url); ?>" <?php echo esc_attr($parallax_mob); ?>>

                        <?php if ( !empty($item['overlay']) ) : ?>
                            <span class="image-parallax-overlay"></span>
                        <?php endif; ?>
                        <?php if ( $item['style'] == 'simple' ) : ?>
                            <?php if ( !empty($item['title']) || !empty($item['description_banner']) ) : ?>
                                <div class="image-parallax__banner <?php echo esc_attr($heading_align); ?>">
                                    <?php if ( !empty($item['title']) ) : ?>
                                        <h3 class="image-parallax__banner-title">
                                            <?php echo wp_kses_post($item['title']); ?>
                                        </h3>
                                    <?php endif ?>

                                    <?php if ( !empty($item['description_banner']) ): ?>
                                        <div class="image-parallax__banner-description">
                                            <?php echo wp_kses_post($item['description_banner']); ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        <?php elseif ( $item['style'] == 'modern' ) : ?>
                            <?php if ( !empty($item['subtitle']) || !empty($item['title']) || !empty($image_parallax_item['content']) ) : ?>
                                <div class="image-parallax__content <?php echo esc_attr($heading_align); ?>">
                                    <div class="image-parallax__heading">

                                        <?php if ( !empty($item['subtitle']) ): ?>
                                            <h6 class="image-parallax__content-subtitle">
                                                <?php echo wp_kses_post($item['subtitle']); ?>
                                            </h6>
                                        <?php endif ?>

                                        <?php if (!empty($item['title'])): ?>
                                        <<?php echo esc_attr($item['title_size']); ?>
                                        class="image-parallax__content-title"><?php echo wp_kses_post($item['title']); ?>
                                    </<?php echo esc_attr($item['title_size']); ?>>
                                    <?php endif; ?>

                                    <?php if ( !empty($image_parallax_item['content']) ) : ?>
                                        <div class="image-parallax__content-description">
                                            <?php echo wp_kses_post(do_shortcode($image_parallax_item['content'])); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                        </div>

                    <?php } ?>

                <?php } ?>
                </div>

            <?php } ?>

            <?php
            // end output
            return ob_get_clean();
        }
    }
}
vc_map(
    array(
        'name'            => esc_html__('Parallax Item', 'js_composer'),
        'base'            => 'image_parallax_items',
        'as_child'        => array('only' => 'image_parallax'),
        'content_element' => true,
        'params'          => array(
            array(
                'param_name' => 'image',
                'type'       => 'attach_image',
                'heading'    => __('Banner Image', 'js_composer'),
                'value'      => '',
            ),
            array(
                'param_name'  => 'overlay',
                'type'        => 'checkbox',
                'description' => '',
                'heading'     => 'Add overlay',
                'value'       => '',
            ),
            array(
                'type'        => 'select_preview',
                'heading'     => __('Style', 'js_composer'),
                'description' => __('Banner Style', 'js_composer'),
                'param_name'  => 'style',
                'value'       => array(
                    array(
                        'value' => 'simple',
                        'label' => esc_html__('Simple', 'js_composer'),
                        'image' => $url . 'simple.jpg'
                    ),
                    array(
                        'value' => 'modern',
                        'label' => esc_html__('Modern', 'js_composer'),
                        'image' => $url . 'modern.jpg'
                    ),
                )
            ),
            array(
                'param_name' => 'position',
                'type'       => 'dropdown',
                'heading'    => 'Position',
                'value'      => array(
                    'Center' => 'image-parallax__item--center',
                    'Left'   => 'image-parallax__item--bl',
                    'Right'  => 'image-parallax__item--br',
                ),
                'dependency' => array('element' => 'style', 'value' => 'modern'),
            ),
            array(
                'type'       => 'textfield',
                'heading'    => __('Subtitle', 'js_composer'),
                'param_name' => 'subtitle',
                'value'      => '',
                'dependency' => array('element' => 'style', 'value' => 'modern'),
            ),
            array(
                'param_name'  => 'heading_size',
                'type'        => 'dropdown',
                'description' => '',
                'heading'     => 'Heading Size',
                'value'       => array(
                    'H1' => 'h1',
                    'H2' => 'h2',
                    'H3' => 'h3',
                    'H4' => 'h4',
                    'H5' => 'h5',
                    'H6' => 'h6',
                ),
                'default'     => 'h4',
                'dependency'  => array('element' => 'style', 'value' => 'modern'),
            ),
            array(
                'type'       => 'textarea',
                'heading'    => __('Title', 'js_composer'),
                'param_name' => 'title',
                'value'      => '',
            ),
            array(
                'param_name' => 'description_banner',
                'type'       => 'textarea',
                'heading'    => __('Description', 'js_composer'),
                'value'      => '',
                'dependency' => array('element' => 'style', 'value' => 'simple'),
            ),
            array(
                'param_name' => 'content',
                'type'       => 'textarea_html',
                'heading'    => 'Description',
                'value'      => '',
                'dependency' => array('element' => 'style', 'value' => 'modern'),
            ),
        )
        //end params
    )
);

if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_image_parallax_items extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            global $image_parallax_items;
            $image_parallax_items[] = array('atts' => $atts, 'content' => $content);
            return;
        }
    }
}