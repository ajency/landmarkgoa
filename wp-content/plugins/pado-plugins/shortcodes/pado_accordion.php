<?php
if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'        => __('Accordion', 'js_composer'),
            'base'        => 'pado_accordion',
            'description' => __('Section with accordion', 'js_composer'),
            'category'    => __('Content', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items', 'js_composer'),
                    'description' => __('Please add information for the item', 'js_composer'),
                    'param_name'  => 'items',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Number', 'js_composer'),
                            'description' => __('Please add number', 'js_composer'),
                            'param_name'  => 'number',
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Title', 'js_composer'),
                            'description' => __('Please add your title', 'js_composer'),
                            'param_name'  => 'title',
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Position', 'js_composer'),
                            'description' => __('Please add your position', 'js_composer'),
                            'param_name'  => 'position',
                        ),
                        array(
                            'type'        => 'textarea',
                            'heading'     => __('Description', 'js_composer'),
                            'description' => __('Please add your description', 'js_composer'),
                            'param_name'  => 'description',
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Contact form', 'js_composer'),
                            'param_name'  => 'form',
                            'description' => __('Add your form id from shortcode Contact Form 7 Plugin.', 'js_composer'),
                        ),
                    ),
                ),
                array(
                    'param_name'  => 'full_width',
                    'type'        => 'checkbox',
                    'heading'     => __('Full width', 'js_composer'),
                    'description' => __('Enable full width', 'js_composer'),
                )
            )
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_accordion extends WPBakeryShortCode {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'items'      => '',
                'full_width' => '',
            ), $atts));


            // include needed stylesheets
            if ( !in_array("pado-accordion", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-accordion";
            }
            $this->enqueueCss();

            if ( !in_array("pado-accordion", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-accordion";
            }
            $this->enqueueJs();

            $full_width = (isset($full_width) && $full_width) ? 'full-width' : 'small-width';
            $items = (array)vc_param_group_parse_atts($items);

            ob_start();

            if ( !empty($items) ) { ?>
                <div class="accordion-wrapper <?php esc_attr_e($full_width); ?>">
                    <?php foreach ( $items as $item ) { ?>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <h3 class="accordion-title">
                                    <?php if ( isset($item['number']) && !empty($item['number']) ) { ?>
                                        <span><?php echo esc_html($item['number']); ?></span>
                                    <?php } ?>
                                    <?php echo esc_html($item['title']); ?>
                                    <i class="ion-chevron-down"></i>
                                </h3>
                                <?php if ( isset($item['position']) && !empty($item['position']) ) { ?>
                                    <div class="accordion-position">
                                        <?php echo esc_html($item['position']); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="accordion-content">
                                <?php if ( isset($item['description']) && !empty($item['description']) ) { ?>
                                    <div class="accordion-description">
                                        <?php echo esc_html($item['description']); ?>
                                    </div>
                                <?php } ?>
                                <?php if ( !empty($item['form']) ) { ?>
                                    <div class="accordion-form"><?php echo do_shortcode('[contact-form-7 id="' . esc_attr($item['form']) . '"]'); ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php }

            return ob_get_clean();
        }
    }
}
