<?php
if ( function_exists('vc_map') ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/promotion/';
    vc_map(
        array(
            'name'        => esc_html__('Promotion', 'js_composer'),
            'base'        => 'promotion',
            'description' => __('Image with text', 'js_composer'),
            'category'    => __('Content', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Promotion style', 'js_composer'),
                    'description' => __('Please select main style', 'js_composer'),
                    'param_name'  => 'style',
                    'value'       => array(
                        array(
                            'value' => 'modern',
                            'label' => esc_html__('Modern', 'js_composer'),
                            'image' => $url . 'modern.jpg'
                        ),
                        array(
                            'value' => 'simple',
                            'label' => esc_html__('Simple', 'js_composer'),
                            'image' => $url . 'simple.jpg'
                        ),
                        array(
                            'value' => 'info_video',
                            'label' => esc_html__('Info with Video', 'js_composer'),
                            'image' => $url . 'info_video.jpg'
                        ),
                    )
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => 'Section image background',
                    'param_name' => 'section_image_bg',
                    'dependency' => array('element' => 'style', 'value' => array('modern', 'simple')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax for background', 'js_composer'),
                    'description' => __('Do you want to parallax for background?', 'js_composer'),
                    'param_name'  => 'parallax',
                    'dependency'  => array('element' => 'style', 'value' => array('modern', 'simple')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax for mobile device', 'js_composer'),
                    'description' => __('Do you want to enable parallax for mobile?', 'js_composer'),
                    'param_name'  => 'parallax_mob',
                    'dependency'  => array(
                        'element'   => 'parallax',
                        'not_empty' => true,
                    ),
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => __('Section Image', 'js_composer'),
                    'param_name' => 'image',
                    'dependency' => array('element' => 'style', 'value' => array('modern')),
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
                    'dependency' => array('element' => 'style', 'value' => array('modern')),
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
                    'dependency' => array('element' => 'style', 'value' => array('modern')),
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Mask image', 'js_composer'),
                    'param_name'  => 'mask_image',
                    'description' => 'Will be display in top left side in section',
                    'dependency'  => array('element' => 'style', 'value' => array('modern')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Subtitle', 'js_composer'),
                    'description' => __('Please add subtitle', 'js_composer'),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'dependency'  => array('element' => 'style', 'value' => array('modern', 'simple')),
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => __('Title', 'js_composer'),
                    'param_name'  => 'title',
                    'value'       => '',
                    'description' => __("If you want to add the word which will be marked by main color, please insert it in &#60;i&#62; tag, for example: &#60;i&#62;Hello&#60;/i&#62;. And if you want to add the word which will be marked bold, please insert it in &#60;b&#62; tag, for example: &#60;b&#62;Hello&#60;/b&#62;", 'js_composer'),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => __('Description', 'js_composer'),
                    'param_name' => 'description',
                    'value'      => '',
                    'dependency' => array('element' => 'style', 'value' => array('modern', 'simple')),
                ),
                array(
                    'type'        => 'vc_link',
                    'heading'     => __('Button', 'js_composer'),
                    'description' => __('Please specify button link', 'js_composer'),
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
                // Video button
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Add video button?', 'js_composer'),
                    'description' => __('Do you want add video button?', 'js_composer'),
                    'param_name'  => 'video_enable',
                    'dependency'  => array('element' => 'style', 'value' => array('info_video')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Video link', 'js_composer'),
                    'description' => __('Please add link for video', 'js_composer'),
                    'param_name'  => 'video_link',
                    'dependency'  => array('element' => 'video_enable', 'not_empty' => true,),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Video button name', 'js_composer'),
                    'description' => __('Please add name for video button', 'js_composer'),
                    'param_name'  => 'video_name',
                    'dependency'  => array('element' => 'video_enable', 'not_empty' => true,),
                ),
                // items
                array(
                    'type'        => 'param_group',
                    'heading'     => __('Items', 'js_composer'),
                    'description' => __('Please add information for the item', 'js_composer'),
                    'param_name'  => 'items',
                    'value'       => '',
                    'dependency'  => array('element' => 'style', 'value' => array('info_video')),
                    'params'      => array(
                        array(
                            'type'       => 'attach_image',
                            'heading'    => 'Item image',
                            'param_name' => 'image',
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Name', 'js_composer'),
                            'description' => __('Please add name for item', 'js_composer'),
                            'param_name'  => 'name',
                        ),
                    ),
                ),
                // background options
                array(
                    'type'       => 'attach_image',
                    'heading'    => 'Left section image background',
                    'param_name' => 'left_image_bg',
                    'dependency' => array('element' => 'style', 'value' => array('info_video')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Left section image parallax', 'js_composer'),
                    'description' => __('Do you want to parallax for background?', 'js_composer'),
                    'param_name'  => 'left_image_parallax',
                    'dependency'  => array('element' => 'style', 'value' => array('info_video')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax for mobile device (left section)', 'js_composer'),
                    'description' => __('Do you want to enable parallax for mobile?', 'js_composer'),
                    'param_name'  => 'parallax_mob_l',
                    'dependency'  => array(
                        'element'   => 'left_image_parallax',
                        'not_empty' => true,
                    ),
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => 'Right section image background',
                    'param_name' => 'right_image_bg',
                    'dependency' => array('element' => 'style', 'value' => array('info_video')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Right section image parallax', 'js_composer'),
                    'description' => __('Do you want to parallax for background?', 'js_composer'),
                    'param_name'  => 'right_image_parallax',
                    'dependency'  => array('element' => 'style', 'value' => array('info_video')),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax for mobile device (right section)', 'js_composer'),
                    'description' => __('Do you want to enable parallax for mobile?', 'js_composer'),
                    'param_name'  => 'parallax_mob_r',
                    'dependency'  => array(
                        'element'   => 'right_image_parallax',
                        'not_empty' => true,
                    ),
                ),
                // Other options
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
    class WPBakeryShortCode_promotion extends WPBakeryShortCode {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'style'                => 'modern',
                // bg params
                'section_image_bg'     => '',
                'parallax'             => '',
                'parallax_mob'         => '',
                'left_image_bg'        => '',
                'left_image_parallax'  => '',
                'parallax_mob_l'       => '',
                'right_image_bg'       => '',
                'right_image_parallax' => '',
                'parallax_mob_r'       => '',
                // img params
                'image'                => '',
                'image_position'       => '',
                'image_width'          => '',
                'mask_image'           => '',
                // headline params
                'subtitle'             => '',
                'title'                => '',
                'description'          => '',
                // buttons params
                'button'               => '',
                'btn_style'            => 'a-btn a-btn-1',
                // video params
                'video_enable'         => '',
                'video_link'           => '',
                'video_name'           => '',
                // items
                'items'                => array(),
                // other
                'css'                  => '',
            ), $atts));

            // include needed stylesheets
            if ( !in_array("pado-promotion", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-promotion";
            }
            $this->enqueueCss();

            /* get custum css as class*/
            $wrap_class = vc_shortcode_custom_css_class($css, ' ');
            $wrap_class .= !empty($el_class) ? ' ' . $el_class : '';
            do_shortcode($content);

            $bg_img         = (!empty($section_image_bg) && is_numeric($section_image_bg)) ? wp_get_attachment_url($section_image_bg) : '';
            $left_image_bg  = (!empty($left_image_bg) && is_numeric($left_image_bg)) ? wp_get_attachment_url($left_image_bg) : '';
            $right_image_bg = (!empty($right_image_bg) && is_numeric($right_image_bg)) ? wp_get_attachment_url($right_image_bg) : '';

            $image_position = (isset($image_position) && !empty($image_position)) ? 'img-pos-' . $image_position : '';
            $image_width    = (isset($image_width) && !empty($image_width)) ? 'width:' . $image_width . '%' : '';

            // start output
            ob_start(); ?>
            <div class="promotion <?php echo esc_attr($style . ' ' . $wrap_class); ?>">
                <?php if ( $style == 'modern' ) { ?>
                    <?php if ( !empty($bg_img) ) {
                        if ( $parallax ) {
                            $parallax_mob = isset($parallax_mob) ? $parallax_mob : false;
                            $parallax_mob = ($parallax_mob) ? 'data-ios-disabled=false data-android-disabled=false' : ''; ?>
                            <div class="img-parallax" data-parallax="scroll" data-position-Y="top"
                                 data-image-src="<?php echo esc_url($bg_img); ?>" <?php echo esc_attr($parallax_mob); ?>></div>
                        <?php } else {
                            echo pado_the_lazy_load_flter($bg_img,
                                array(
                                    'class' => 's-img-switch',
                                    'alt'   => ''
                                )
                            );
                        }
                    } ?>
                    <div class="mask">
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
                            <div class="col-lg-5 col-sm-6 col-xs-12 promotion-content-wrap">
                                <div class="promotion-content">
                                    <?php if ( !empty($subtitle) ) { ?>
                                        <h5 class="subtitle"><?php echo esc_html($subtitle); ?></h5>
                                    <?php }
                                    if ( !empty($title) ) { ?>
                                        <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                                    <?php }
                                    if ( !empty($description) ) { ?>
                                        <div class="description"><?php echo wp_kses_post($description); ?></div>
                                    <?php }
                                    if ( !empty($button) ) {
                                        $url    = vc_build_link($button);
                                        $target = !empty($url['target']) ? $url['target'] : '_self';
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
                            <div class="col-sm-6 col-lg-offset-1 col-xs-12 promotion-image-wrap">
                                <div class="promotion-image" style="<?php esc_attr_e($image_width); ?>">
                                    <?php if ( !empty($image) ) {
                                        $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
                                        $image     = wp_get_attachment_url($image);
                                        echo pado_the_lazy_load_flter($image, array(
                                            'alt'   => $image_alt,
                                            'class' => ''
                                        ));
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } elseif ( $style == 'simple' ) { ?>
                    <?php if ( !empty($bg_img) ) {
                        if ( $parallax ) {
                            $parallax_mob = isset($parallax_mob) ? $parallax_mob : false;
                            $parallax_mob = ($parallax_mob) ? 'data-ios-disabled=false data-android-disabled=false' : ''; ?>
                            <div class="img-parallax" data-parallax="scroll" data-position-Y="top"
                                 data-image-src="<?php echo esc_url($bg_img); ?>" <?php echo esc_attr($parallax_mob); ?>></div>
                        <?php } else {
                            echo pado_the_lazy_load_flter($bg_img,
                                array(
                                    'class' => 's-img-switch',
                                    'alt'   => ''
                                )
                            );
                        }
                    } ?>
                    <div class="container">
                        <div class="promotion-content">
                            <?php if ( !empty($subtitle) ) { ?>
                                <h5 class="subtitle"><?php echo esc_html($subtitle); ?></h5>
                            <?php }
                            if ( !empty($title) ) { ?>
                                <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                            <?php }
                            if ( !empty($description) ) { ?>
                                <div class="description"><?php echo wp_kses_post($description); ?></div>
                            <?php }
                            if ( !empty($button) ) {
                                $url    = vc_build_link($button);
                                $target = !empty($url['target']) ? $url['target'] : '_self';
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
                <?php } elseif ( $style == 'info_video' ) { ?>
                    <div class="container">
                        <div class="content">
                            <div class="section-left">
                                <?php if ( !empty($left_image_bg) ) {
                                    if ( $left_image_parallax ) {
                                        $parallax_mob_l = isset($parallax_mob_l) ? $parallax_mob_l : false;
                                        $parallax_mob_l = ($parallax_mob_l) ? 'data-ios-disabled=false data-android-disabled=false' : ''; ?>
                                        <div class="img-parallax" data-parallax="scroll" data-position-Y="top"
                                             data-image-src="<?php echo esc_url($left_image_bg); ?>" <?php echo esc_attr($parallax_mob_l); ?>></div>
                                    <?php } else {
                                        echo pado_the_lazy_load_flter($left_image_bg,
                                            array(
                                                'class' => 's-img-switch',
                                                'alt'   => ''
                                            )
                                        );
                                    }
                                } ?>
                            </div>
                            <div class="section-right">
                                <?php if ( !empty($right_image_bg) ) {
                                    if ( $right_image_parallax ) {
                                        $parallax_mob_r = isset($parallax_mob_r) ? $parallax_mob_r : false;
                                        $parallax_mob_r = ($parallax_mob_r) ? 'data-ios-disabled=false data-android-disabled=false' : ''; ?>
                                        <div class="img-parallax" data-parallax="scroll" data-position-Y="top"
                                             data-image-src="<?php echo esc_url($right_image_bg); ?>" <?php echo esc_attr($parallax_mob_r); ?>></div>
                                    <?php } else {
                                        echo pado_the_lazy_load_flter($right_image_bg,
                                            array(
                                                'class' => 's-img-switch',
                                                'alt'   => ''
                                            )
                                        );
                                    }
                                } ?>
                            </div>
                            <div class="content-info">
                                <?php if ( isset($video_enable) && $video_enable && !empty($video_link) && !empty($video_name) ) { ?>
                                    <div class="video-btn">
                                        <a href="<?php echo esc_url($video_link); ?>"
                                           class="play"></a><?php esc_html_e($video_name); ?>
                                    </div>
                                <?php }
                                if ( !empty($title) ) { ?>
                                    <h3 class="title"><?php echo wp_kses_post($title); ?></h3>
                                <?php }
                                if ( !empty($button) ) {
                                    $url    = vc_build_link($button);
                                    $target = !empty($url['target']) ? $url['target'] : '_self';
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
                            <?php if ( !empty($items) ) {
                                $items = (array)vc_param_group_parse_atts($items);
                                if ( count($items) > 4 ) { ?>
                                    <div class="items-wrap desktop">
                                        <div class="swiper3-container"
                                             data-mode="vertical"
                                             data-mouse="1"
                                             data-speed="1000"
                                             data-loop="0"
                                             data-space="0">
                                            <div class="swiper3-wrapper">
                                                <?php foreach ( $items as $item ) {
                                                    $image = (!empty($item['image']) && is_numeric($item['image'])) ? wp_get_attachment_url($item['image']) : '';
                                                    ?>
                                                    <div class="swiper3-slide">
                                                        <div class="item">
                                                            <?php if ( !empty($image) ) { ?>
                                                                <div class="item-img"><img
                                                                            src="<?php echo esc_url($image); ?>" alt="">
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ( isset($item['name']) && !empty($item['name']) ) { ?>
                                                                <div class="item-name"><?php esc_html_e($item['name']) ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- If we need navigation buttons -->
                                        <div class="swiper3-button-prev"></div>
                                        <div class="swiper3-button-next"></div>
                                    </div>
                                <?php } else { ?>
                                    <div class="items-wrap desktop">
                                        <?php foreach ( $items as $item ) {
                                            $image = (!empty($item['image']) && is_numeric($item['image'])) ? wp_get_attachment_url($item['image']) : '';
                                            ?>
                                            <div class="item">
                                                <?php if ( !empty($image) ) { ?>
                                                    <div class="item-img"><img src="<?php echo esc_url($image); ?>"
                                                                               alt="">
                                                    </div>
                                                <?php } ?>
                                                <?php if ( isset($item['name']) && !empty($item['name']) ) { ?>
                                                    <div class="item-name"><?php esc_html_e($item['name']) ?></div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="items-wrap mobile">
                                        <div class="swiper3-container"
                                             data-mode="horizontal"
                                             data-mouse="1"
                                             data-speed="1000"
                                             data-add-slides="auto"
                                             data-loop="0"
                                             data-space="0">
                                            <div class="swiper3-wrapper">
                                                <?php foreach ( $items as $item ) {
                                                    $image = (!empty($item['image']) && is_numeric($item['image'])) ? wp_get_attachment_url($item['image']) : '';
                                                    ?>
                                                    <div class="swiper3-slide">
                                                        <div class="item">
                                                            <?php if ( !empty($image) ) { ?>
                                                                <div class="item-img"><img
                                                                            src="<?php echo esc_url($image); ?>" alt="">
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ( isset($item['name']) && !empty($item['name']) ) { ?>
                                                                <div class="item-name"><?php esc_html_e($item['name']) ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- If we need navigation buttons -->
                                        <div class="swiper3-button-prev"></div>
                                        <div class="swiper3-button-next"></div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            // end output
            return ob_get_clean();
        }
    }
}