<?php
if ( function_exists('vc_map') ) {
    vc_map(
        array(
            'name'             => __('Locations', 'js_composer'),
            'base'             => 'pado_location',
            'description'      => __('Locations - contact map', 'js_composer'),
            'category'         => __('Content', 'js_composer'),
            'admin_enqueue_js' => array(
                'https://maps.googleapis.com/maps/api/js?key=' . get_option('ugm_google_api_key') . '&signed_in=true&libraries=places',
                EF_URL . '/shortcodes/assets/js/g-maps-admin.js',
            ),
            'params'           => array(
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'description' => __('Enter title', 'js_composer'),
                    'param_name'  => 'title',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Title background', 'js_composer'),
                    'description' => __('Enter text', 'js_composer'),
                    'param_name'  => 'title_bg',
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Locations', 'js_composer'),
                    'description' => __('Add new location', 'js_composer'),
                    'param_name'  => 'locations',
                    'params'      => array(
                        array(
                            'type'        => 'textarea',
                            'heading'     => __('Title', 'js_composer'),
                            'param_name'  => 'title',
                            'value'       => '',
                            'admin_label' => true,
                            'save_always' => true,
                        ),
                        array(
                            'type'       => 'textfield',
                            'heading'    => __('Address', 'js_composer'),
                            'param_name' => 'address',
                            'value'      => '',
                        ),
                        array(
                            'type'       => 'textarea',
                            'heading'    => __('Description', 'js_composer'),
                            'param_name' => 'description',
                            'value'      => '',
                        ),
                        array(
                            'type'       => 'param_group',
                            'heading'    => __('Add information', 'js_composer'),
                            'param_name' => 'informations',
                            'value'      => urlencode(json_encode(array())),
                            'params'     => array(
                                array(
                                    'type'        => 'textarea',
                                    'heading'     => __('Title', 'js_composer'),
                                    'param_name'  => 'title',
                                    'value'       => '',
                                    'admin_label' => true,
                                    'save_always' => true,
                                ),
                                array(
                                    'type'       => 'param_group',
                                    'heading'    => __('Some information', 'js_composer'),
                                    'param_name' => 'information_item',
                                    'value'      => urlencode(json_encode(array())),
                                    'params'     => array(
                                        array(
                                            'type'       => 'textarea',
                                            'heading'    => __('Add some information', 'js_composer'),
                                            'param_name' => 'information_text',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type'       => 'param_group',
                            'heading'    => __('Add phone', 'js_composer'),
                            'param_name' => 'phones',
                            'value'      => urlencode(json_encode(array())),
                            'params'     => array(
                                array(
                                    'type'        => 'textarea',
                                    'heading'     => __('Title', 'js_composer'),
                                    'param_name'  => 'title',
                                    'value'       => '',
                                    'admin_label' => true,
                                    'save_always' => true,
                                ),
                                array(
                                    'type'       => 'param_group',
                                    'heading'    => __('Phone', 'js_composer'),
                                    'param_name' => 'phone_item',
                                    'value'      => urlencode(json_encode(array())),
                                    'params'     => array(
                                        array(
                                            'type'       => 'textfield',
                                            'heading'    => __('Add your phone', 'js_composer'),
                                            'param_name' => 'phone_text',
                                            'value'      => ''
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type'       => 'param_group',
                            'heading'    => __('Add emails', 'js_composer'),
                            'param_name' => 'emails',
                            'value'      => urlencode(json_encode(array())),
                            'params'     => array(
                                array(
                                    'type'        => 'textarea',
                                    'heading'     => __('Title', 'js_composer'),
                                    'param_name'  => 'title',
                                    'value'       => '',
                                    'admin_label' => true,
                                    'save_always' => true,
                                ),
                                array(
                                    'type'       => 'param_group',
                                    'heading'    => __('Email', 'js_composer'),
                                    'param_name' => 'email_item',
                                    'value'      => urlencode(json_encode(array())),
                                    'params'     => array(
                                        array(
                                            'type'       => 'textfield',
                                            'heading'    => __('Add your email', 'js_composer'),
                                            'param_name' => 'email_text',
                                            'value'      => ''
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // map optios
                array(
                    'type'       => 'attach_image',
                    'heading'    => __('Active marker', 'js_composer'),
                    'param_name' => 'marker_active',
                    'value'      => '',
                    'group'      => 'Map options'
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => __('Passive marker', 'js_composer'),
                    'param_name' => 'marker_passive',
                    'value'      => '',
                    'group'      => 'Map options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Zoom', 'js_composer'),
                    'description' => __('Enter zoom', 'js_composer'),
                    'param_name'  => 'zoom',
                    'group'       => 'Map options'
                ),
                array(
                    'type'        => 'textarea_raw_html',
                    'heading'     => __('JSON Style', 'js_composer'),
                    'description' => __('Enter json with styles for map', 'js_composer'),
                    'param_name'  => 'json_style',
                    'group'       => 'Map options'
                ),
            ),
            //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_location extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'title'          => '',
                'title_bg'       => '',
                'locations'      => '',
                'marker_active'  => '',
                'marker_passive' => '',
                'json_style'     => '',
                'zoom'           => '',
            ), $atts));


            if ( !in_array("gmaps", self::$js_scripts) ) {
                self::$js_scripts[] = "gmaps";
            }

            if ( !in_array("pado-g-maps", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-g-maps";
            }

            $this->enqueueJs();

            if ( !in_array("pado-location", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-location";
            }

            $this->enqueueCss();

            ob_start();
            $locations = (array)vc_param_group_parse_atts($locations);

            $address = '';
            foreach ( $locations as $location ) {
                $address .= $location['address'] . '|';
            }

            $marker_active  = (!empty($marker_active) && is_numeric($marker_active)) ? wp_get_attachment_url($marker_active) : '';
            $marker_passive = (!empty($marker_passive) && is_numeric($marker_passive)) ? wp_get_attachment_url($marker_passive) : ''; ?>

            <div class="location js-wrap">
                <div class="location-content">
                    <?php if ( isset($title) && !empty($title) ): ?>
                        <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                    <?php endif; ?>
                    <div class="descr-row">
                        <?php foreach ( $locations as $key => $location ):
                            $class = ($key == 0) ? 'active' : '';
                            $descr = !empty($location['description']) ? $location['description'] : ''; ?>
                            <div class="title-description js-tab-item <?php esc_attr_e($class); ?>"><?php echo wp_kses_post($descr); ?></div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ( isset($locations) && !empty($locations) ) : ?>
                        <div class="location__list">
                            <?php foreach ( $locations as $key => $location ):
                                $class = ($key == 0) ? 'active' : '';
                                if ( isset($location['title']) && !empty($location['title']) ): ?>
                                    <div class="location__item js-tab-link google-marker <?php esc_attr_e($class); ?>">
                                        <h3 class="title"><?php echo wp_kses_post($location['title']); ?></h3>
                                        <?php if ( isset($location['description']) && !empty($location['description']) ): ?>
                                            <div class="description"><?php echo wp_kses_post($location['description']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="location-map">
                    <div class="tabs">
                        <?php foreach ( $locations as $key => $location ):
                            $class = ($key == 0) ? 'active' : '';
                            if ( isset($location['title']) && !empty($location['title']) ): ?>
                                <div class="js-tab-item location__over <?php esc_attr_e($class); ?>">
                                    <h3 class="title"><?php echo wp_kses_post($location['title']); ?></h3>
                                    <?php if ( isset($location['description']) && !empty($location['description']) ): ?>
                                        <div class="description"><?php echo wp_kses_post($location['description']); ?></div>
                                    <?php endif; ?>
                                    <?php if ( isset($location['informations']) && !empty($location['informations']) ) :
                                        $informations = (array)vc_param_group_parse_atts($location['informations']);
                                        foreach ( $informations as $information ): ?>
                                            <div class="info">
                                                <?php if ( isset($information['title']) && !empty($information['title']) ): ?>
                                                    <h5 class="subtitle"><i
                                                                class="icon-clock"></i><?php echo esc_html($information['title']); ?>
                                                    </h5>
                                                <?php endif;
                                                if ( isset($information['information_item']) && !empty($information['information_item']) ) :
                                                    $information_items = (array)vc_param_group_parse_atts($information['information_item']);
                                                    foreach ( $information_items as $information_item ):
                                                        if ( isset($information_item['information_text']) && !empty($information_item['information_text']) ): ?>
                                                            <div class="info__text"><?php echo wp_kses_post($information_item['information_text']); ?></div>
                                                        <?php endif;
                                                    endforeach;
                                                endif; ?>
                                            </div>
                                        <?php endforeach;
                                    endif; ?>
                                    <?php if ( isset($location['phones']) && !empty($location['phones']) ) :
                                        $phones = (array)vc_param_group_parse_atts($location['phones']);
                                        foreach ( $phones as $phone ): ?>
                                            <div class="info">
                                                <?php if ( isset($phone['title']) && !empty($phone['title']) ): ?>
                                                    <h5 class="subtitle"><i
                                                                class="icon-telephone-1"></i><?php echo esc_html($phone['title']); ?>
                                                    </h5>
                                                <?php endif;
                                                if ( isset($phone['phone_item']) && !empty($phone['phone_item']) ) :
                                                    $phone_items = (array)vc_param_group_parse_atts($phone['phone_item']);
                                                    foreach ( $phone_items as $phone_item ):
                                                        if ( isset($phone_item['phone_text']) && !empty($phone_item['phone_text']) ):
                                                            $link = str_replace(array(' ', ')', '('), '', $phone_item['phone_text']);?>
                                                            <div class="info__text"><a
                                                                        href="tel:<?php echo esc_html($link); ?>"><?php echo esc_html($phone_item['phone_text']); ?></a>
                                                            </div>
                                                        <?php endif;
                                                    endforeach;
                                                endif; ?>
                                            </div>
                                        <?php endforeach;
                                    endif; ?>
                                    <?php if ( isset($location['emails']) && !empty($location['emails']) ) :
                                        $emails = (array)vc_param_group_parse_atts($location['emails']);
                                        foreach ( $emails as $email ): ?>
                                            <div class="info">
                                                <?php if ( isset($email['title']) && !empty($email['title']) ): ?>
                                                    <h5 class="subtitle"><i
                                                                class="icon-email"></i><?php echo esc_html($email['title']); ?>
                                                    </h5>
                                                <?php endif;
                                                if ( isset($email['email_item']) && !empty($email['email_item']) ) :
                                                    $email_items = (array)vc_param_group_parse_atts($email['email_item']);
                                                    foreach ( $email_items as $email_item ):
                                                        if ( isset($email_item['email_text']) && !empty($email_item['email_text']) ): ?>
                                                            <div class="info__text"><a
                                                                        href="mailto:<?php echo esc_html($email_item['email_text']); ?>"><?php echo esc_html($email_item['email_text']); ?></a>
                                                            </div>
                                                        <?php endif;
                                                    endforeach;
                                                endif; ?>
                                            </div>
                                        <?php endforeach;
                                    endif; ?>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                    <div class="g-map"
                         data-marker-img="<?php esc_attr_e($marker_passive) ?>"
                         data-active-marker-img="<?php esc_attr_e($marker_active) ?>"
                         data-zoom="<?php esc_attr_e($zoom); ?>"
                         data-address="<?php esc_attr_e($address); ?>"
                         data-json="<?php esc_attr_e(rawurldecode(base64_decode(strip_tags($json_style)))) ?>"
                    ></div>
                </div>
                <?php if ( isset($title_bg) && !empty($title_bg) ): ?>
                    <div class="bg-title"><?php echo esc_html($title_bg); ?></div>
                <?php endif; ?>
            </div>

            <?php // end output

            return ob_get_clean();
        }
    }
}