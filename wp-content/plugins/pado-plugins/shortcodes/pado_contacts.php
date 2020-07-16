<?php
if ( function_exists('vc_map') ) {
    $url     = EF_URL . '/admin/assets/images/shortcodes_images/contacts/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'        => __('Contacts', 'js_composer'),
            'base'        => 'pado_contacts',
            'description' => __('Contacts info', 'js_composer'),
            'category'    => __('Content', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Style', 'js_composer'),
                    'description' => __('Please select style for this section', 'js_composer'),
                    'param_name'  => 'style',
                    'value'       => array(
                        array(
                            'value' => 'style5',
                            'label' => esc_html__( 'Info list', 'js_composer' ),
                            'image' => $url . 'style5.jpg'
                        ),
                        array(
                            'value' => 'style3',
                            'label' => esc_html__( 'Info with parallax', 'js_composer' ),
                            'image' => $url . 'style3.jpg'
                        ),
                        array(
                            'value' => 'style4',
                            'label' => esc_html__( 'Custom info', 'js_composer' ),
                            'image' => $url . 'style4.jpg'
                        ),
                        array(
                            'value' => 'simple_form',
                            'label' => esc_html__( 'Simple form', 'js_composer' ),
                            'image' => $url . 'simple_form.jpg'
                        ),
                    )
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Image', 'js_composer'),
                    'description' => __('Please add the image', 'js_composer'),
                    'param_name'  => 'image',
                    'dependency'  => array('element' => 'style', 'value' => array('style1', 'style3'))
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Title', 'js_composer'),
                    'description' => __('Please add title', 'js_composer'),
                    'param_name'  => 'title',
                    'value'       => '',
                    'dependency'  => array('element' => 'style', 'value' => array('style3', 'style7',))
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Text', 'js_composer'),
                    'description' => __('Please add simple text', 'js_composer'),
                    'param_name'  => 'text',
                    'dependency'  => array('element' => 'style', 'value' => array('style3', 'style7'))
                ),
                array(
                    'type'        => 'textarea_html',
                    'heading'     => __('Text', 'js_composer'),
                    'description' => __('Please add simple text', 'js_composer'),
                    'param_name'  => 'content',
                    'dependency'  => array('element' => 'style', 'value' => array('style2', 'style4',))
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Address', 'js_composer'),
                    'description' => __('Please add your address information', 'js_composer'),
                    'param_name'  => 'address_info',
                    'value'       => urlencode(json_encode(array())),
                    'params'      => array(
                        array(
                            'type'       => 'textarea',
                            'heading'    => __('Add your address', 'js_composer'),
                            'param_name' => 'address',
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('style1', 'style2', 'style4')),
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Email', 'js_composer'),
                    'description' => __('Please add your email', 'js_composer'),
                    'param_name'  => 'email_info',
                    'value'       => urlencode(json_encode(array())),
                    'params'      => array(
                        array(
                            'type'       => 'textfield',
                            'heading'    => __('Add your email', 'js_composer'),
                            'param_name' => 'email',
                            'value'      => ''
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('style1', 'style4')),
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Phone', 'js_composer'),
                    'description' => __('Please add your phone number', 'js_composer'),
                    'param_name'  => 'phone_info',
                    'value'       => urlencode(json_encode(array())),
                    'params'      => array(
                        array(
                            'type'       => 'textfield',
                            'heading'    => __('Add your phone', 'js_composer'),
                            'param_name' => 'phone',
                            'value'      => ''
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('style1', 'style4')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Contact form', 'js_composer'),
                    'param_name'  => 'form',
                    'description' => __('Add your form id from shortcode Contact Form 7 Plugin.', 'js_composer'),
                    'dependency'  => array('element' => 'style', 'value' => array('style2', 'style3', 'style7', 'simple_form'))
                ),
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Button style for form', 'js_composer'),
                    'description' => __('Please select button style', 'js_composer'),
                    'param_name'  => 'btn_style',
                    'dependency'  => array('element' => 'style', 'value' => array('simple_form', 'style3')),
                    'value'       => array(
                        array(
                            'value' => 'a-btn-style a-btn-1-style',
                            'label' => esc_html__('Default', 'js_composer'),
                            'image' => $url_btn . 'a-btn-1.png'
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-2-style',
                            'label' => esc_html('Default Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-2.png',
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-3-style',
                            'label' => esc_html('Dark', 'pado'),
                            'image' => $url_btn . 'a-btn-3.png',
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-4-style',
                            'label' => esc_html('Dark Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-4.png',
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-5-style',
                            'label' => esc_html('Light', 'pado'),
                            'image' => $url_btn . 'a-btn-5.png',
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-6-style',
                            'label' => esc_html('Light Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-6.png',
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-7-style',
                            'label' => esc_html('White', 'pado'),
                            'image' => $url_btn . 'a-btn-7.png',
                        ),
                        array(
                            'value' => 'a-btn-style a-btn-8-style',
                            'label' => esc_html('White Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-8.png',
                        ),
                    )
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items', 'js_composer'),
                    'description' => __('Please add options for the items', 'js_composer'),
                    'param_name'  => 'items',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'dropdown',
                            'heading'     => __('Icon type', 'js_composer'),
                            'description' => esc_html__('Please select icon type', 'js_composer'),
                            'param_name'  => 'icon_type',
                            'value'       => array(
                                'Font icon'   => 'font_icon',
                                'Pado icon'   => 'pado_icon',
                            ),
                        ),
                        array(
                            'type'        => 'iconpicker',
                            'heading'     => 'Select icon',
                            'param_name'  => 'icon',
                            'value'       => 'icon-arrow-1-circle-down',
                            'settings'    => array(
                                'emptyIcon'    => false,
                                'type'         => 'info',
                                'source'       => pado_simple_line_icons(),
                                'iconsPerPage' => 4000,
                            ),
                            'dependency'  => array('element' => 'icon_type', 'value' => array('font_icon')),
                            'description' => __('Pleae select custom icon', 'js_composer'),
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
                            'heading'     => 'Icon color',
                            'description' => __('Please select colors for icon', 'js_composer'),
                            'param_name'  => 'icon_color',
                            'default'     => '#004ae2'
                        ),
                        array(
                            'type'        => 'param_group',
                            'heading'     => __('Info', 'js_composer'),
                            'description' => __('Please add your information', 'js_composer'),
                            'param_name'  => 'items_child',
                            'value'       => '',
                            'params'      => array(
                                array(
                                    'type'        => 'textfield',
                                    'heading'     => __('Title', 'js_composer'),
                                    'description' => __('Please add your title', 'js_composer'),
                                    'param_name'  => 'title',
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'heading'     => __('Phone', 'js_composer'),
                                    'description' => __('Please add your phone number', 'js_composer'),
                                    'param_name'  => 'phone'
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'heading'     => __('Email', 'js_composer'),
                                    'description' => __('Please add your email', 'js_composer'),
                                    'param_name'  => 'email'
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'description' => __('Please add simple text', 'js_composer'),
                                    'heading'     => __('Text', 'js_composer'),
                                    'param_name'  => 'text'
                                ),
                            ),
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('style5')),
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items single', 'js_composer'),
                    'description' => __('Please add your information', 'js_composer'),
                    'param_name'  => 'items_single',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Title', 'js_composer'),
                            'description' => __('Please add your title', 'js_composer'),
                            'param_name'  => 'title',
                        ),
                        array(
                            'type'        => 'textfield',
                            'description' => __('Please add your phone number', 'js_composer'),
                            'heading'     => __('Phone', 'js_composer'),
                            'param_name'  => 'phone'
                        ),
                        array(
                            'type'        => 'textfield',
                            'description' => __('Please add your email', 'js_composer'),
                            'heading'     => __('Email', 'js_composer'),
                            'param_name'  => 'email'
                        ),
                    ),
                    'dependency'  => array('element' => 'style', 'value' => array('style6')),
                ),
            ),
            //end params
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_contacts extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'image'        => '',
                'style'        => 'style5',
                'btn_style'    => 'a-btn-style a-btn-1-style',
                'address_info' => '',
                'form'         => '',
                'title'        => '',
                'text'         => '',
                'email_info'   => '',
                'phone_info'   => '',
                'items'        => '',
                'items_single' => ''

            ), $atts));

            if ( !in_array("pado-contacts", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-contacts";
            }
            $this->enqueueCss();

            if ( isset($style) && $style == 'style3' ) {
                if ( !in_array("pado_parallax_lib", self::$js_scripts) ) {
                    self::$js_scripts[] = "pado_parallax_lib";
                }
                $this->enqueueJs();
            }

            // el class
            $url   = (!empty($image) && is_numeric($image)) ? wp_get_attachment_image_src($image, 'full') : '';
            $style = $style == 'style3' ? $style . ' full-height' : $style;

            $class_overlay = !empty($form) ? ' over' : '';

            // start output
            ob_start(); ?>

            <div class="contacts-info-wrap <?php echo esc_attr($style . $class_overlay); ?>">
                <?php if ( $style == 'style3 full-height' ) { ?>
                    <div class="content-wrap full-height">
                        <?php if ( !empty($image) ) {
                            $classContent = ''; ?>
                            <div class="image-wrap full-height parallax-window full-height" data-parallax="scroll"
                                 data-position-Y="top"
                                 data-position-X="center" data-image-src="<?php echo esc_url($url[0]); ?>">
                            </div>
                        <?php } else {
                            $classContent = 'no-image';
                        } ?>

                        <div class="content <?php echo esc_attr($classContent); ?>">
                            <?php if ( !empty($title) ) { ?>
                                <h2 class="title-main"><?php echo wp_kses_post($title); ?></h2>
                            <?php }
                            if ( !empty($text) ) { ?>
                                <div class="text"><?php echo wp_kses_post($text); ?></div>
                            <?php }
                            if ( !empty($form) ) { ?>
                                <div class="form-wrap form <?php esc_attr_e($btn_style); ?>">
                                    <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($form) . '"]'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } elseif ( $style == 'style4' ) {
                    if ( !empty($content) || !empty($address_info) || !empty($phone_info) || !empty($email_info) ) {
                        $bottomClass = (!empty($content) && (!empty($address_info) || !empty($phone_info) || !empty($email_info))) ? 'col-xs-12 col-sm-6' : 'col-xs-12'; ?>
                        <div class="additional-content-wrap">
                            <div class="container">
                                <div class="row">
                                    <?php if ( !empty($content) ) { ?>
                                        <div class="text <?php echo esc_attr($bottomClass); ?>">
                                            <p><?php echo wp_kses_post(do_shortcode($content)); ?></p>
                                        </div>
                                    <?php } ?>

                                    <div class="content-items <?php echo esc_attr($bottomClass); ?>">

                                        <?php if ( !empty($address_info) ) { ?>

                                            <div class="content-item">

                                                <?php $address_info = (array)vc_param_group_parse_atts($address_info); ?>

                                                <h5 class="title"><?php echo esc_html__('Address:', 'pado'); ?></h5>

                                                <?php foreach ( $address_info as $address ) {
                                                    if ( !empty($address) ) { ?>
                                                        <div class="address"><?php echo wp_kses_post($address['address']); ?></div>
                                                    <?php }
                                                } ?>

                                            </div>

                                        <?php }

                                        if ( !empty($phone_info) ) { ?>

                                            <div class="content-item">

                                                <?php $phone_info = (array)vc_param_group_parse_atts($phone_info); ?>

                                                <h5 class="title"><?php echo esc_html__('Phone:', 'pado'); ?></h5>

                                                <?php foreach ( $phone_info as $phone ) {
                                                    if ( !empty($phone) ) {
                                                        $link = str_replace(array(' ', ')', '('), '', $phone['phone']); ?>
                                                        <a href="tel:<?php echo esc_attr($link); ?>"
                                                           class="email"><?php echo wp_kses_post($phone['phone']); ?></a>
                                                    <?php }
                                                } ?>

                                            </div>

                                        <?php }

                                        if ( !empty($email_info) ) { ?>

                                            <div class="content-item">

                                                <?php $email_info = (array)vc_param_group_parse_atts($email_info); ?>

                                                <h5 class="title"><?php echo esc_html__('Email:', 'pado'); ?></h5>

                                                <?php foreach ( $email_info as $email ) {
                                                    if ( !empty($email) ) { ?>
                                                        <a href="mailto:<?php echo esc_attr($email['email']); ?>"
                                                           class="email"><?php echo wp_kses_post($email['email']); ?></a>
                                                    <?php }
                                                } ?>

                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                if ( $style == 'style5' ) {
                    if ( !empty($items) ) {
                        $items = (array)vc_param_group_parse_atts($items);
                        foreach ( $items as $item ) { ?>

                            <div class="item-wrapper">
                                <?php if (isset($item['icon_type']) && $item['icon_type'] == 'pado_icon') {
                                    if ( !empty($item['pado_icon']) ) {
                                        $colors = !empty($item['pado_icon']) ? 'style="color:' . $item['icon_color'] . '"' : ''; ?>
                                        <i class="<?php echo esc_attr($item['pado_icon']); ?>" <?php echo $colors; ?>></i>
                                    <?php }
                                } else {
                                    if ( !empty($item['icon']) ) {
                                        $colors = !empty($item['icon_color']) ? 'style="color:' . $item['icon_color'] . '"' : ''; ?>
                                        <i class="<?php echo esc_attr($item['icon']); ?>" <?php echo $colors; ?>></i>
                                    <?php }
                                }

                                if (!empty($item['items_child'])){
                                $items_child = (array)vc_param_group_parse_atts($item['items_child']); ?>
                                <div class="flex-wrap">
                                    <?php foreach ( $items_child as $info ) { ?>

                                        <?php if ( !empty($info['title']) ) { ?>
                                            <h5 class="title"><?php echo esc_html($info['title']); ?></h5>
                                        <?php }
                                        if ( !empty($info['phone']) ) {
                                            $link = str_replace(array(' ', ')', '('), '', $info['phone']); ?>
                                            <a href="tel:<?php echo esc_attr($link); ?>"><?php echo esc_html($info['phone']); ?></a>
                                        <?php }
                                        if ( !empty($info['email']) ) {
                                            $link = str_replace(array(' ', ')', '('), '', $info['email']); ?>
                                            <a href="mailto:<?php echo esc_attr($link); ?>"><?php echo esc_html($info['email']); ?></a>
                                        <?php }
                                        if ( !empty($info['text']) ) { ?>
                                            <div class="text"><?php echo wp_kses_post($info['text']); ?></div>
                                        <?php } ?>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <?php
                        } // end foreach
                    }
                } elseif ( $style == 'simple_form' ) { ?>
                    <div class="form-wrap form <?php echo esc_attr($btn_style); ?>">
                        <?php
                        echo do_shortcode('[contact-form-7 id="' . esc_attr($form) . '"]'); ?>
                    </div>
                <?php } ?>
            </div>

            <?php
            // end output
            return ob_get_clean();
        }
    }
}

