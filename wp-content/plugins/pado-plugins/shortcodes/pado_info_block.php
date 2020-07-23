<?php
if ( function_exists('vc_map') ) {
    $url     = EF_URL . '/admin/assets/images/shortcodes_images/info_block/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'                    => __('Info block', 'js_composer'),
            'base'                    => 'pado_info_block',
            'content_element'         => true,
            'show_settings_on_create' => true,
            'description'             => __('Image and text', 'js_composer'),
            'params'                  => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Info block style', 'js_composer'),
                    'description' => __('Please select block style', 'js_composer'),
                    'param_name'  => 'info_block_style',
                    'value'       => array(
                        array(
                            'value' => 'style-3',
                            'label' => esc_html__('Modern with slider', 'js_composer'),
                            'image' => $url . 'style-3.jpg'
                        ),
                        array(
                            'value' => 'promotion',
                            'label' => esc_html__('Promotion', 'js_composer'),
                            'image' => $url . 'promotion.jpg'
                        ),
                        array(
                            'value' => 'discount',
                            'label' => esc_html__('Discount', 'js_composer'),
                            'image' => $url . 'discount.jpg'
                        ),
                        array(
                            'value' => 'style-4',
                            'label' => esc_html__('Modern', 'js_composer'),
                            'image' => $url . 'style-4.jpg'
                        ),
                        array(
                            'value' => 'style-1',
                            'label' => esc_html__('Classic', 'js_composer'),
                            'image' => $url . 'style-1.jpg'
                        ),
                        array(
                            'value' => 'style-5',
                            'label' => esc_html__('Simple', 'js_composer'),
                            'image' => $url . 'style-5.jpg'
                        ),
                    )
                ),
                array(
                    'type'       => 'colorpicker',
                    'heading'    => 'Section color background',
                    'param_name' => 'section_color_bg',
                    'dependency' => array('element' => 'info_block_style', 'value' => array('discount')),
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => __('Product image', 'js_composer'),
                    'param_name' => 'image',
                    'dependency' => array('element' => 'info_block_style', 'value' => array('discount')),
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => __('Image Position', 'js_composer'),
                    'param_name' => 'image_position',
                    'value'      => array(
                        'Top'    => 'top',
                        'Middle' => 'middle',
                        'Bottom' => 'bottom',
                    ),
                    'std'        => 'middle',
                    'dependency' => array('element' => 'info_block_style', 'value' => array('discount')),
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => __('Image Width', 'js_composer'),
                    'param_name' => 'image_width',
                    'value'      => array(
                        '100%' => '100',
                        '110%' => '110',
                        '120%' => '120',
                        '130%' => '130',
                        '140%' => '140',
                        '150%' => '150',
                        '160%' => '160',
                        '170%' => '170',
                        '180%' => '180',
                    ),
                    'std'        => '100',
                    'dependency' => array('element' => 'info_block_style', 'value' => array('discount')),
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Mask image', 'js_composer'),
                    'param_name'  => 'mask_image',
                    'description' => 'Will be display in top left side in section',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('discount')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Number', 'js_composer'),
                    'description' => __('Please add number, maximal two symbols', 'js_composer'),
                    'param_name'  => 'number',
                    'value'       => '',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('style-3', 'style-4')),
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Background image for number', 'js_composer'),
                    'description' => __('Please add your image for number', 'js_composer'),
                    'param_name'  => 'image_bg',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('style-3', 'style-4')),
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Background image', 'js_composer'),
                    'description' => __('Please add your image for background', 'js_composer'),
                    'param_name'  => 'block_bg',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('promotion')),
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'description' => __('If you want to add the word which will be marked by main color, please insert it in &#60;i&#62; tag, for example: &#60;i&#62;Hello&#60;/i&#62;. And if you want to add the word which will be marked bold, please insert it in &#60;b&#62; tag, for example: &#60;b&#62;Hello&#60;/b&#62;', 'js_composer'),
                    'param_name'  => 'title',
                    'value'       => '',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('style-3', 'promotion', 'discount', 'style-4', 'style-5')),
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Heading', 'js_composer'),
                    'description' => __('Please select heading', 'js_composer'),
                    'param_name'  => 'title_tag',
                    'value'       => array(
                        'H1' => 'h1',
                        'H2' => 'h2',
                        'H3' => 'h3',
                        'H4' => 'h4',
                        'H5' => 'h5',
                        'H6' => 'h6',
                    ),
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('style-3', 'style-4')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Subtitle', 'js_composer'),
                    'description' => __('Please add your subtitle', 'js_composer'),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('promotion', 'discount')),
                ),
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items for accordion', 'js_composer'),
                    'description' => __('Please add more information for items', 'js_composer'),
                    'param_name'  => 'items_accordion',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Title', 'js_composer'),
                            'description' => __('Please add title', 'js_composer'),
                            'param_name'  => 'title',
                        ),
                        array(
                            'type'        => 'textarea',
                            'heading'     => __('Text', 'js_composer'),
                            'description' => __('Please add simple text', 'js_composer'),
                            'param_name'  => 'text',
                        ),
                    ),
                    'dependency'  => array('element' => 'info_block_style', 'value' => 'style-5'),
                ),
                array(
                    'type'        => 'textarea_html',
                    'heading'     => __('Text', 'js_composer'),
                    'description' => __('Please add text', 'js_composer'),
                    'param_name'  => 'content',
                    'value'       => '',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('style-3', 'style-1', 'style-4')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Background text', 'js_composer'),
                    'description' => __('Please add your background text', 'js_composer'),
                    'param_name'  => 'bg_text',
                    'value'       => '',
                    'dependency'  => array('element' => 'info_block_style', 'value' => array( 'style-3', 'style-5' )),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Add video?', 'js_composer'),
                    'description' => __('Do you want to add your video?', 'js_composer'),
                    'param_name'  => 'add_video',
                    'value'       => array(__('Yes, please', 'js_composer') => 'yes'),
                    'dependency'  => array('element' => 'info_block_style', 'value' => array('style-3', 'style-4', 'style-5')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Video link', 'js_composer'),
                    'description' => __('Insert your video link', 'js_composer'),
                    'param_name'  => 'video_link',
                    'value'       => '',
                    'dependency'  => array('element' => 'add_video', 'value' => 'yes'),
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Image', 'js_composer'),
                    'description' => __('Please add image', 'js_composer'),
                    'param_name'  => 'image_id',
                    'dependency'  => array(
                        'element' => 'info_block_style',
                        'value'   => array('style-2', 'style-1', 'style-5')
                    ),
                ),
                array(
                    'type'        => 'attach_images',
                    'heading'     => __('Images', 'js_composer'),
                    'param_name'  => 'images',
                    'dependency'  => array('element' => 'info_block_style', 'value' => 'style-3'),
                    'description' => __('Add min 4 images.', 'js_composer'),
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Button', 'js_composer'),
                    'description' => __('Please specify button link', 'js_composer'),
                    'param_name'  => 'button',
                    'dependency'  => array('element' => 'info_block_style', 'value_not_equal_to' => array('style-3', 'style-4', 'style-5')),
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => __('Please select button style', 'js_composer'),
                    'param_name'  => 'btn_style',
                    'dependency'  => array('element' => 'info_block_style', 'value_not_equal_to' => array('style-3', 'style-4', 'style-5')),
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
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Extra class name', 'js_composer'),
                    'param_name'  => 'el_class',
                    'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
                    'value'       => ''
                ),
                /* CSS editor */
                array(
                    'type'       => 'css_editor',
                    'heading'    => __('CSS box', 'js_composer'),
                    'param_name' => 'css',
                    'group'      => __('Design options', 'js_composer')
                )
            ), //end params
        )
    );
}
if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_info_block extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'info_block_style' => 'style-3',
                'section_color_bg' => '',
                'image'            => '',
                'image_position'   => 'middle',
                'image_width'      => '100',
                'mask_image'       => '',
                'items_accordion'  => '',
                'title'            => '',
                'number'           => '',
                'title_tag'        => 'h1',
                'subtitle'         => '',
                'add_video'        => '',
                'image_id'         => '',
                'image_bg'         => '',
                'block_bg'         => '',
                'images'           => '',
                'bg_text'          => '',
                'video_link'       => '',
                'button'           => '',
                'btn_style'        => 'a-btn a-btn-1',
                'el_class'         => '',
                'css'              => '',
            ), $atts));

            // include needed scripts
            if ( !in_array("pado-info-block", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-info-block";
            }
            $this->enqueueJs();

            if ( !in_array("pado-info-block", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-info-block";
            }
            $this->enqueueCss();

            $class  = (!empty($info_block_style)) ? $info_block_style : "";
            $class  .= " " . (!empty($el_class)) ? $el_class : '';
            $class  .= vc_shortcode_custom_css_class($css, ' ');
            $images = !empty($images) ? explode(',', $images) : '';

            $image_position = (isset($image_position) && !empty($image_position)) ? 'img-pos-' . $image_position : '';
            $image_width    = (isset($image_width) && !empty($image_width)) ? 'style = width:' . $image_width . '%' : '';
            $image_url      = (!empty($image_id) && is_numeric($image_id)) ? wp_get_attachment_url($image_id) : '';
            $image_alt      = (!empty($image_id) && is_numeric($image_id)) ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';

            $section_color_bg = (!empty($section_color_bg)) ? 'background-color: ' . $section_color_bg : '';

            ob_start(); ?>

            <div class="info-block-wrap <?php echo esc_attr($class); ?>">
                <?php if ( $info_block_style == 'style-1' || $info_block_style == 'style-2' ) { ?>
                    <div class="row">
                        <?php if ( !empty($image_url) ) {
                            $contentClass = 'col-sm-6 col-sm-pull-6';
                        } ?>
                        <div class="image-wrap col-xs-12 col-sm-6 col-sm-push-6">
                            <div class="image-container">
                                <?php echo pado_the_lazy_load_flter($image_url,
                                    array(
                                        'class' => 'info-block-img',
                                        'alt'   => $image_alt
                                    )
                                ); ?>
                            </div>
                        </div>
                        <div class="content-wrap col-xs-12 <?php echo esc_attr($contentClass); ?>">
                            <?php if ( !empty($title) && !empty($title_tag) && $info_block_style != "style-2" ) {
                                echo sprintf('<%1$s class="title">%2$s</%1$s>',
                                    $title_tag,
                                    wp_kses_post($title)
                                );
                            } // end if ?>
                            <?php if ( !empty($content) && $info_block_style != "style-2" ) { ?>
                                <div class="content">
                                    <p><?php echo wp_kses_post($content); ?></p>
                                </div>
                            <?php }
                            if ( $info_block_style == 'style-2' ) { ?>
                                <div class="accordeon-wrap">
                                    <?php if ( !empty($info_block_style) && $info_block_style = "style-2" ) { ?>
                                        <?php if ( !empty($subtitle) ) { ?>
                                            <h5 class="subtitle">
                                                <?php echo esc_html($subtitle); ?></h5>
                                        <?php } ?>
                                    <?php } // end if ?>
                                    <?php if ( !empty($items_accordion) ) {
                                        $items_accordion = (array)vc_param_group_parse_atts($items_accordion); ?>
                                        <ul class="accordeon">
                                            <?php
                                            $counter = 1;

                                            foreach ( $items_accordion as $item ) {
                                                $active_class  = $counter === 1 ? 'active' : '';
                                                $active_class2 = $counter === 1 ? 'is-show' : ''; ?>
                                                <li>
                                                    <?php if ( !empty($item['title']) ) { ?>
                                                        <a href=""
                                                           class="toggle-list <?php echo esc_attr($active_class); ?>">
                                                            <?php echo esc_html($item['title']); ?>
                                                        </a>
                                                    <?php } ?>
                                                    <?php if ( !empty($item['text']) ) { ?>
                                                        <ul class="list-drop <?php echo esc_attr($active_class2); ?>">
                                                            <li>
                                                                <div class="text">
                                                                    <?php echo wp_kses_post($item['text']);
                                                                    ?></div>
                                                            </li>
                                                        </ul>
                                                    <?php } ?>
                                                </li>
                                                <?php
                                                $counter++;
                                            } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if ( !empty($button) ) {
                                $url_btn = vc_build_link($button);
                                if ( !empty($url_btn['title']) ) {
                                    $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self'; ?>
                                    <div class="but-wrap">
                                        <a href="<?php echo esc_url($url_btn['url']); ?>"
                                           class="<?php echo esc_attr($btn_style); ?>"
                                           target="<?php echo esc_attr($target); ?>">
                                            <?php echo esc_html($url_btn['title']); ?>
                                        </a>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                <?php } elseif ( $info_block_style == 'style-3' ) { ?>
                    <div class="container no-padd">
                        <div class="row">
                            <div class="col-xs-12 col-lg-5 col-sm-6">
                                <?php if ( !empty($images) ) { ?>
                                    <div class="images-wrapper">
                                        <?php foreach ( $images as $image ) {
                                            $url = (!empty($image) && is_numeric($image)) ? wp_get_attachment_image_url($image, 'full') : '';
                                            $img_alt = (!empty($image) && is_numeric($image)) ? get_post_meta($image, '_wp_attachment_image_alt', true) : ''; ?>
                                            <div class="img-wrap">
                                                <img src="<?php esc_attr_e($url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                            </div>

                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-offset-1">
                                <div class="title-wrap">
                                    <?php if ( ! empty( $number ) ) { ?>
                                    <div class="number">
                                        <?php $random = substr( md5( rand() ), 0, 7 ); ?>
                                        <svg id="pado-info-number" class="number-svg"
                                             xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 0 185 140"
                                             style="opacity: 1;">


                                            <?php if ( ! empty( $image_bg ) ) {
                                                $image_bg = wp_get_attachment_image_src( $image_bg, 'full' );
                                                $image_bg = is_array( $image_bg ) ? $image_bg[0] : $image_bg; ?>
                                                <defs>
                                                    <pattern x="0" y="0" width="185" height="140"
                                                             patternUnits="userSpaceOnUse"
                                                             id="pattern<?php echo esc_attr( $random ); ?>"
                                                             viewBox="0 0 185 140">
                                                        <image xmlns:xlink="http://www.w3.org/1999/xlink"
                                                               xlink:href="<?php echo esc_url( $image_bg ); ?>"
                                                               preserveAspectRatio="none" x="0" y="0" width="185"
                                                               height="140"></image>
                                                    </pattern>
                                                </defs>
                                            <?php } ?>

                                            <text x="45%" y="50%" id="letter" dy="50" style="text-anchor: middle;"
                                                  fill="url('#pattern<?php echo esc_attr( $random ); ?>')">
                                                <?php echo esc_html( $number ); ?>
                                            </text>
                                        </svg>
                                    </div>
                                    <?php }

                                    if ( !empty($title) && !empty($title_tag) ) {
                                        echo sprintf('<%1$s class="title">%2$s</%1$s>',
                                            $title_tag,
                                            wp_kses_post($title)
                                        );
                                    } // end if
                                    ?>
                                </div>
                                <?php if ( !empty($content) ) { ?>
                                    <div class="content">
                                        <p><?php echo wp_kses_post($content); ?></p>
                                    </div>
                                <?php } // end if

                                if ( isset($add_video) && !empty($add_video) ) { ?>
                                    <div class="video only-button">
                                        <div class="video-content">
                                            <?php if ( !empty($video_link) ) { ?>
                                                <a href="<?php echo esc_url($video_link); ?>" class="play ion-play"></a>
                                            <?php } ?>
                                            <span><?php esc_html_e('Watch Video', 'pado'); ?></span>
                                        </div>
                                        <span class="close fa fa-close"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if ( !empty($bg_text) ) { ?>
                        <div class="bg-text">
                            <?php echo esc_html($bg_text); ?>
                        </div>
                    <?php } ?>
                <?php } elseif ( $info_block_style == 'style-4' ) { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="title-wrap">
                                    <?php if ( !empty($number) ) { ?>
                                        <div class="number">
                                            <?php $random = substr(md5(rand()), 0, 7); ?>
                                            <svg id="pado-info-number" class="number-svg"
                                                 xmlns="http://www.w3.org/2000/svg" height="150" viewBox="0 0 185 140"
                                                 style="opacity: 1;">
                                                <?php if ( !empty($image_bg) ) {
                                                    $image_bg = wp_get_attachment_image_src($image_bg, 'full');
                                                    $image_bg = is_array($image_bg) ? $image_bg[0] : $image_bg; ?>
                                                    <defs>
                                                        <pattern x="0" y="0" width="185" height="140"
                                                                 patternUnits="userSpaceOnUse"
                                                                 id="pattern<?php echo esc_attr($random); ?>"
                                                                 viewBox="0 0 185 140">
                                                            <image xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                   xlink:href="<?php echo esc_url($image_bg); ?>"
                                                                   preserveAspectRatio="none" x="0" y="0" width="185"
                                                                   height="140"></image>
                                                        </pattern>
                                                    </defs>
                                                <?php } ?>

                                                <text x="45%" y="50%" id="letter" dy="50" style="text-anchor: middle;"
                                                      fill="url('#pattern<?php echo esc_attr($random); ?>')">
                                                    <?php echo esc_html($number); ?>
                                                </text>
                                            </svg>
                                        </div>
                                    <?php }

                                    if ( !empty($title) && !empty($title_tag) ) {
                                        echo sprintf('<%1$s class="title">%2$s</%1$s>',
                                            $title_tag,
                                            wp_kses_post($title)
                                        );
                                    } // end if
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <?php if ( !empty($content) ) { ?>
                                    <div class="content">
                                        <p><?php echo wp_kses_post($content); ?></p>
                                    </div>
                                <?php } // end if

                                if ( isset($add_video) && !empty($add_video) ) { ?>
                                    <div class="video only-button"
                                         data-type-start="click">
                                        <div class="video-content">
                                            <?php if ( !empty($video_link) ) { ?>
                                                <a href="<?php echo esc_url($video_link); ?>" class="play"></a>
                                            <?php } ?>
                                            <span><?php esc_html_e('Watch Video', 'pado'); ?></span>
                                        </div>
                                        <span class="close fa fa-close"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if ( !empty($bg_text) ) { ?>
                        <div class="bg-text">
                            <?php echo esc_html($bg_text); ?>
                        </div>
                    <?php } ?>
                <?php } elseif ( $info_block_style == 'style-5' ) { ?>
                    <div class="row">
                        <div class="content-wrap col-sm-6">
                            <?php if ( !empty($title) ) {
                                echo sprintf('<h3 class="title">%1$s</h3>',
                                    wp_kses_post($title)
                                );
                            } // end if
                            ?>
                            <div class="info-item-wrap">
                                <?php if ( !empty($items_accordion) ) {
                                    $items_accordion = (array)vc_param_group_parse_atts($items_accordion); ?>
                                    <?php
                                    $counter = 1;

                                    foreach ( $items_accordion as $item ) { ?>
                                        <div class="info-item">
                                            <?php if ( !empty($item['title']) ) { ?>
                                                <h3 class="info-subtitle"><?php echo esc_html($item['title']); ?></h3>
                                            <?php } ?>
                                            <?php if ( !empty($item['text']) ) { ?>
                                                <div class="info-text">
                                                    <?php echo wp_kses_post($item['text']);
                                                    ?></div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        $counter++;
                                    } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="image-wrap col-sm-6">
                            <div class="image-container video">
                                <?php echo pado_the_lazy_load_flter($image_url,
                                    array(
                                        'class' => 's-img-switch',
                                        'alt'   => $image_alt
                                    )
                                ); ?>
                                <?php if ( !empty($video_link) ) { ?>
                                    <a href="<?php echo esc_url($video_link); ?>" class="play"></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if ( !empty($bg_text) ) { ?>
                        <div class="bg-text">
                            <?php echo esc_html($bg_text); ?>
                        </div>
                    <?php } ?>
                <?php } elseif ( $info_block_style == 'promotion' ) {
                    $img_url = (!empty($block_bg) && is_numeric($block_bg)) ? wp_get_attachment_url($block_bg) : '';
                    if ( !empty($img_url) ) {
                        echo pado_the_lazy_load_flter($img_url,
                            array(
                                'class' => 's-img-switch',
                                'alt'   => ''
                            )
                        );
                    } ?>
                    <div class="title-wrap">
                        <?php if ( !empty($subtitle) ) { ?>
                            <div class="subtitle">
                                <?php echo wp_kses_post($subtitle); ?>
                            </div>
                        <?php }
                        if ( !empty($title) ) { ?>
                            <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                        <?php } ?>
                    </div>
                    <?php if ( !empty($button) ) {
                        $url_btn = vc_build_link($button);
                        if ( !empty($url_btn['title']) ) {
                            $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self'; ?>
                            <a href="<?php echo esc_url($url_btn['url']); ?>"
                               class="<?php echo esc_attr($btn_style); ?>"
                               target="<?php echo esc_attr($target); ?>">
                                <?php echo esc_html($url_btn['title']); ?>
                            </a>
                        <?php }
                    }
                } elseif ( $info_block_style == 'discount' ) { ?>
                    <div class="discount__wrap" style="<?php echo $section_color_bg ?>">
                        <div class="discount__mask">
                            <?php if ( !empty($mask_image) ) {
                                $image_alt  = get_post_meta($mask_image, '_wp_attachment_image_alt', true);
                                $mask_image = wp_get_attachment_url($mask_image);
                                echo pado_the_lazy_load_flter($mask_image, array(
                                    'alt'   => $image_alt,
                                    'class' => ''
                                ));
                            } ?>
                        </div>
                        <div class="container">
                            <div class="row <?php esc_attr_e($image_position); ?>">
                                <div class="col-lg-5 col-sm-5 col-xs-12 discount__content-wrap">
                                    <div class="discount__content">
                                        <?php if ( !empty($subtitle) ) { ?>
                                            <h5 class="subtitle"><?php echo wp_kses_post($subtitle); ?></h5>
                                        <?php }
                                        if ( !empty($title) ) { ?>
                                            <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                                        <?php }
                                        if ( !empty($button) ) {
                                            $url = vc_build_link($button);
                                            $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self';
                                        }
                                        if ( !empty($url['title']) ) { ?>
                                            <div class="but-wrap">
                                                <a href="<?php echo esc_attr($url['url']); ?>"
                                                   class="<?php echo esc_attr($btn_style); ?>"
                                                   target="<?php echo esc_attr($target); ?>">
                                                    <?php echo esc_html($url['title']); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-7 col-xs-12 discount-product-wrap">
                                    <div class="discount-product" <?php esc_attr_e($image_width); ?>>
                                        <?php if ( !empty($image) ) {
                                            $image2_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
                                            $image      = wp_get_attachment_url($image);
                                            echo pado_the_lazy_load_flter($image, array(
                                                'alt'   => $image2_alt,
                                                'class' => ''
                                            ));
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php
            return ob_get_clean();
        } // end content()
    } // end class
} // end if

?>
