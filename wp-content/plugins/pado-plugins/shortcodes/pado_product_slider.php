<?php
if ( function_exists('vc_map') ) {
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(array(
            'name'        => __('Products Slider', 'js_composer'),
            'base'        => 'pado_products_slider',
            'description' => __('This outputs list shows any of the post-type items', 'js_composer'),
            'params'      => array(
                array(
                    'type'        => 'attach_image',
                    'heading'     => __('Background image', 'js_composer'),
                    'description' => esc_html__('Please add background image', 'js_composer'),
                    'param_name'  => 'image',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Background Title', 'js_composer'),
                    'description' => esc_html__('Please add your background title', 'js_composer'),
                    'param_name'  => 'bg_title',
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
                    'type'        => 'param_group',
                    'heading'     => __('Socials', 'js_composer'),
                    'description' => esc_html__('Please add your social information', 'js_composer'),
                    'param_name'  => 'socials',
                    'value'       => '',
                    'params'      => array(
                        array(
                            'type'        => 'iconpicker',
                            'heading'     => 'Select icon',
                            'description' => esc_html__('Please add custom icon', 'js_composer'),
                            'param_name'  => 'icon',
                            'value'       => '',
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('url', 'js_composer'),
                            'param_name'  => 'social_url',
                            'value'       => '',
                            'description' => __('Enter social link url.', 'js_composer'),
                        ),
                    ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Additional Link Text', 'js_composer'),
                    'description' => esc_html__('Please add additional text for link', 'js_composer'),
                    'param_name'  => 'additional_text',
                    'value'       => '',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Additional Link URL', 'js_composer'),
                    'description' => esc_html__('Please add additional URL for link', 'js_composer'),
                    'param_name'  => 'additional_url',
                    'value'       => '',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Email', 'js_composer'),
                    'description' => esc_html__('Please add your email', 'js_composer'),
                    'param_name'  => 'email',
                    'value'       => '',
                ),
                array(
                    'type'        => 'vc_efa_chosen',
                    'heading'     => __('Select Categories', 'js_composer'),
                    'param_name'  => 'cats_product',
                    'value'       => pado_element_values('categories', array(
                        'sort_order' => 'ASC',
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                    )),
                    'std'         => '',
                    'description' => __('You can choose specific categories for products, default is all categories', 'js_composer'),
                    'group'       => 'Source'

                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Order by', 'js_composer'),
                    'param_name'  => 'orderby',
                    'value'       => array(
                        '',
                        __('Date', 'js_composer')          => 'date',
                        __('ID', 'js_composer')            => 'ID',
                        __('Author', 'js_composer')        => 'author',
                        __('Title', 'js_composer')         => 'title',
                        __('Modified', 'js_composer')      => 'modified',
                        __('Random', 'js_composer')        => 'rand',
                        __('Comment count', 'js_composer') => 'comment_count',
                        __('Menu order', 'js_composer')    => 'menu_order',
                    ),
                    'description' => sprintf(__('Select how to sort retrieved posts. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>'),
                    'group'       => 'Source'
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Sort order', 'js_composer'),
                    'param_name'  => 'order',
                    'value'       => array(
                        __('Descending', 'js_composer') => 'DESC',
                        __('Ascending', 'js_composer')  => 'ASC',
                    ),
                    'description' => sprintf(__('Select ascending or descending order. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>'),
                    'group'       => 'Source'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count posts', 'js_composer'),
                    'param_name'  => 'count',
                    'description' => 'Only number',
                    'group'       => 'Source'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Autoplay (sec)', 'js_composer'),
                    'description' => __('0 - off autoplay.', 'js_composer'),
                    'param_name'  => 'autoplay',
                    'value'       => '0',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Speed (milliseconds)', 'js_composer'),
                    'description' => __('Speed Animation. Default 1000 milliseconds', 'js_composer'),
                    'param_name'  => 'speed',
                    'value'       => '500',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Loop', 'js_composer'),
                    'description' => esc_html__('Enable loop option?', 'js_composer'),
                    'param_name'  => 'loop',
                    'value'       => '1',
                    'group'       => 'Slider options'
                ),
            ),
        )
    );
}


/* Output */
if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_pado_products_slider extends WPBakeryShortCode {

        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'count'           => '',
                'speed'           => '',
                'title'           => '',
                'bg_title'        => '',
                'socials'         => '',
                'btn_style'       => 'a-btn a-btn-1',
                'email'           => '',
                'additional_text' => '',
                'additional_url'  => '',
                'image'           => '',
                'autoplay'        => '',
                'loop'            => '',
                'orderby'         => 'date',
                'order'           => 'DESC',
                'cats_product'    => ''
            ), $atts));


            // include needed stylesheets
            if ( !in_array("pado-product-slider", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-product-slider";
            }
            $this->enqueueCss();

            $args = array(
                'post_type' => 'product',
                'order'     => $order,
            );

            if ( !empty($cats_product) ) {
                $cats_product        = explode(',', $cats_product);
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'terms'    => $cats_product,
                    'field'    => 'slug',
                );
            }
            $orderby = null !== $orderby ? $orderby : 'date';
            $count   = !empty($count) && is_numeric($count) ? $count : 100;
            // Order posts
            $args['orderby']        = $orderby;
            $args['posts_per_page'] = $count;


            $autoplay = is_numeric($autoplay) ? $autoplay * 1000 : 0;
            $speed    = is_numeric($speed) ? $speed : '500';
            $loop     = !empty($loop) ? '1' : '0';

            $btn_style      = isset($btn_style) && !empty($btn_style) ? $btn_style : 'a-btn';
            $socials        = (array)vc_param_group_parse_atts($socials);
            $img_url          = (!empty($image) && is_numeric($image)) ? wp_get_attachment_url($image) : '';
            $img_alt =          get_post_meta($image, '_wp_attachment_image_alt', true);

            $prod = new WP_Query($args);

            wp_localize_script(
                'pado-main',
                'products_load',
                array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                )
            );

            ob_start();

            if ( $prod->have_posts() ) { ?>
                <div class="product-slider-wrapper">

                    <?php if ( !empty($img_url) ) {
                        echo pado_the_lazy_load_flter($img_url,
                            array(
                                'class' => 's-img-switch',
                                'alt'   => $img_alt
                            )
                        );
                    }
                    if ( !empty($bg_title) ) { ?>
                        <div class="bg-title">
                            <?php echo esc_html($bg_title); ?>
                        </div>
                    <?php } ?>

                    <?php if ( !empty($socials) ) { ?>
                        <div class="socials">
                            <?php foreach ( $socials as $item ) { ?>
                                <a href="<?php echo esc_url($item['social_url']); ?>">
                                    <i class="fa <?php echo esc_attr($item['icon']); ?>"></i>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>


                    <?php if ( !empty($additional_text) && !empty($additional_url) ) { ?>
                        <a href="<?php echo esc_url($additional_url); ?>" class="additional-link">
                            <?php echo esc_html($additional_text); ?>
                        </a>
                    <?php } ?>

                    <?php if ( !empty($email) ) { ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>"
                           class="additional-email"><?php echo esc_html($email); ?></a>
                    <?php } ?>

                    <div class="swiper3-container pado-product-swiper full-height-window-hard js-check-pagination"
                         data-mouse="0"
                         data-autoplay="<?php echo esc_attr($autoplay); ?>"
                         data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>"
                         data-center="1"
                         data-space="0" data-pagination-type="bullets"
                         data-mode="vertical">
                        <div class="swiper3-wrapper">

                            <?php while ( $prod->have_posts() ) : $prod->the_post();

                                global $post;

                                $product_meta = get_post_meta($post->ID, 'pado_product_options'); ?>

                                <div class="swiper3-slide">

                                    <div class="pado-prod-list-image">

                                        <div class="info">
                                            <div class="container">
                                                <div class="title"><?php do_action('woocommerce_shop_loop_item_title'); ?></div>
                                                <?php if ( isset($product_meta[0]['pado_additional_text']) && !empty($product_meta[0]['pado_additional_text']) ) { ?>
                                                    <div class="prod-descr">
                                                        <?php echo wp_kses_post($product_meta[0]['pado_additional_text']); ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="btn-wrap btn-wrap--desctop">
                                                    <a href="<?php the_permalink(); ?>"
                                                       class="<?php echo esc_attr($btn_style); ?>">
                                                        <?php esc_html_e('Shop now', 'pado'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php $image_size = apply_filters('single_product_archive_thumbnail_size', 'shop_catalog');

                                        if ( has_post_thumbnail() ) {
                                            $props = wc_get_product_attachment_props(get_post_thumbnail_id(), $post);
                                            echo get_the_post_thumbnail($post->ID, 'full', array(
                                                'alt'   => $props['alt'],
                                                'class' => '',
                                            ));
                                        } elseif ( wc_placeholder_img_src() ) {
                                            echo wc_placeholder_img($image_size);
                                        } ?>
                                        <div class="btn-wrap btn-wrap--mobile">
                                            <a href="<?php the_permalink(); ?>"
                                               class="<?php echo esc_attr($btn_style); ?>">
                                                <?php esc_html_e('Shop now', 'pado'); ?>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            <?php
                            endwhile; ?>
                        </div>
                        <div class="swiper3-pagination"></div>
                    </div>
                </div>
            <?php }

            wp_reset_postdata(); ?>

            <?php
            return ob_get_clean();
        }
    }
}