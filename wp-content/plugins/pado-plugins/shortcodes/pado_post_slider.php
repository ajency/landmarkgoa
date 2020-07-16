<?php
if ( function_exists('vc_map') ) {
    $url     = EF_URL . '/admin/assets/images/shortcodes_images/post_slider/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'     => __('Post slider', 'js_composer'),
            'base'     => 'pado_post_slider',
            'category' => __('Content', 'js_composer'),
            'params'   => array(
                array(
                    'type'       => 'select_preview',
                    'heading'    => __('Style', 'js_composer'),
                    'param_name' => 'style',
                    'value'      => array(
                        array(
                            'value' => 'slider_progress',
                            'label' => esc_html__('Simple Slider with progress bar', 'js_composer'),
                            'image' => $url . 'slider_progress.jpg'
                        ),
                        array(
                            'value' => 'classic_slider_progress',
                            'label' => esc_html__('Classic Slider with progress bar', 'js_composer'),
                            'image' => $url . 'classic_slider_progress.jpg'
                        ),
                    ),
                ),
                array(
                    'type'        => 'vc_efa_chosen',
                    'heading'     => __('Select Categories', 'js_composer'),
                    'param_name'  => 'cats',
                    'description' => __('Please select categories', 'js_composer'),
                    'placeholder' => __('Select category', 'js_composer'),
                    'value'       => pado_element_values('category', array(
                        'sort_order' => 'ASC',
                        'taxonomy'   => 'category',
                        'hide_empty' => false,
                    )),
                    'std'         => '',
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
                        __('Comment count', 'js_composer') => 'comment_count'
                    ),
                    'description' => sprintf(__('Select how to sort retrieved posts. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Sort order', 'js_composer'),
                    'param_name'  => 'order',
                    'value'       => array(
                        __('Descending', 'js_composer') => 'DESC',
                        __('Ascending', 'js_composer')  => 'ASC',
                    ),
                    'description' => sprintf(__('Select ascending or descending order. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count items', 'js_composer'),
                    'description' => __('Please specify how many elements appear on the page', 'js_composer'),
                    'param_name'  => 'count',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Autoplay speed (milliseconds)', 'js_composer'),
                    'description' => __('Autoplay speed Animation. Default 5000 milliseconds', 'js_composer'),
                    'param_name'  => 'autoplay',
                    'value'       => '',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Speed (milliseconds)', 'js_composer'),
                    'description' => __('Speed Animation. Default 1500 milliseconds', 'js_composer'),
                    'param_name'  => 'speed',
                    'value'       => '',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count of slides for large desktop', 'js_composer'),
                    'description' => __('Only numbers. By default is 2.', 'js_composer'),
                    'param_name'  => 'lg_count',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count of slides for middle desktop', 'js_composer'),
                    'description' => __('Only numbers. By default is 2.', 'js_composer'),
                    'param_name'  => 'md_count',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count of slides for tablet', 'js_composer'),
                    'description' => __('Only numbers. By default is 2.', 'js_composer'),
                    'param_name'  => 'sm_count',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count of slides for mobile', 'js_composer'),
                    'description' => __('Only numbers. By default is 1.', 'js_composer'),
                    'param_name'  => 'xs_count',
                    'group'       => 'Slider options'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Text for button', 'js_composer'),
                    'param_name'  => 'btn_text',
                    'description' => __('By default - "View More".', 'js_composer'),
                    'dependency'  => array('element' => 'style', 'value' => array('classic_slider_progress')),
                ),
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => esc_html__('Please select button style', 'js_composer'),
                    'param_name'  => 'btn_style',
                    'dependency'  => array('element' => 'style', 'value' => array('classic_slider_progress')),
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
            ),

            //end params
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_post_slider extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'cats'                => '',
                'linked'              => 'yes',
                'btn_text'            => 'View More',
                'btn_style'           => 'a-btn a-btn-link a-btn-arrow',
                'style'               => 'slider_progress',
                'count'               => '',
                'autoplay'            => '5000',
                'speed'               => '1500',
                'lg_count'            => '2',
                'md_count'            => '2',
                'sm_count'            => '2',
                'xs_count'            => '1',
                'orderby'             => '',
                'order'               => 'date'

            ), $atts));


            // include needed stylesheets
            if ( !in_array("pado-post-slider", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-post-slider";
            }
            $this->enqueueCss();

            // base args
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => (!empty($count) && is_numeric($count)) ? $count : 9,
                'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1
            );

            // Order posts
            if ( null !== $orderby ) {
                $args['orderby'] = $orderby;
            }
            $args['order'] = $order;

            // category
            if ( !empty($cats) ) {

                $term_array = explode(',', $cats);
                $cats       = array();

                foreach ( $term_array as $term_slug ) {
                    $term_info = get_term_by('slug', $term_slug, 'category');
                    $cats[]    = $term_info->term_id;
                }

                $cats              = implode(',', $cats);
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => explode(',', $cats),
                    )
                );
            }


            $autoplay = is_numeric($autoplay) ? $autoplay : '5000';
            $speed    = is_numeric($speed) ? $speed : '1500';

            $btn_text  = isset($btn_text) && !empty($btn_text) ? $btn_text : 'see more';
            $btn_style = isset($btn_style) && !empty($btn_style) ? $btn_style : 'a-btn';

            $lg_count = !empty($lg_count) && is_numeric($lg_count) ? $lg_count : '2';
            $md_count = !empty($md_count) && is_numeric($md_count) ? $md_count : '2';
            $sm_count = !empty($sm_count) && is_numeric($sm_count) ? $sm_count : '2';
            $xs_count = !empty($xs_count) && is_numeric($xs_count) ? $xs_count : '1';


            $posts = new WP_Query($args);

            ob_start(); ?>

            <?php if ( $posts->have_posts() ) { ?>
                <div class="post-slider-wrapper <?php echo esc_attr($style); ?>">
                    <div class="swiper3-container"
                         data-mouse="1" data-autoplay="<?php echo esc_attr($autoplay); ?>"
                         data-loop="1" data-speed="<?php echo esc_attr($speed); ?>" data-center="0" data-space="30"
                         data-responsive="responsive" data-pagination-type="progress"
                         data-add-slides="<?php echo esc_attr($lg_count); ?>"
                         data-xs-slides="<?php echo esc_attr($xs_count); ?>"
                         data-sm-slides="<?php echo esc_attr($sm_count); ?>"
                         data-md-slides="<?php echo esc_attr($md_count); ?>"
                         data-lg-slides="<?php echo esc_attr($lg_count); ?>">
                        <div class="swiper3-wrapper">
                            <?php while ( $posts->have_posts() ) :
                                $posts->the_post();
                                $link    = get_the_permalink();
                                $img_url = wp_get_attachment_url(get_post_thumbnail_id($posts->ID));
                                $img_alt = get_post_meta(get_post_thumbnail_id($posts->ID), '_wp_attachment_image_alt', true);

                                $categories = get_the_terms($posts->ID, 'category');
                                $categories = !empty($categories) ? $categories : array();
                                $category   = array();
                                if ( !empty($categories) ) {
                                    foreach ( $categories as $item ) {
                                        $category[] = $item->name;
                                    }
                                    $category = implode(", ", $category);
                                }


                                if ( $style == 'slider_progress' ) { ?>
                                    <div class="swiper3-slide">
                                        <?php if ( !empty($img_url) ) { ?>
                                            <div class="img-wrap">
                                                <?php echo pado_the_lazy_load_flter($img_url, array(
                                                    'class' => 's-img-switch',
                                                    'alt'   => $img_alt
                                                ), true); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="content-wrap">
                                            <div class="flex-wrap">
                                                <div class="category"><?php echo esc_html($category); ?></div>
                                                <a href="<?php echo esc_url($link); ?>"
                                                   class="title"><?php echo esc_html(get_the_title()); ?></a>
                                            </div>
                                            <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                        </div>
                                    </div>
                                <?php } elseif ( $style == 'classic_slider_progress' ) { ?>
                                    <div class="swiper3-slide">
                                        <?php if ( !empty($img_url) ) { ?>
                                            <div class="img-wrap">
                                                <?php echo pado_the_lazy_load_flter($img_url, array(
                                                    'class' => 's-img-switch',
                                                    'alt'   => $img_alt
                                                ), true ); ?>
                                                <div class="category"><?php echo esc_html($category); ?></div>
                                            </div>
                                        <?php } ?>
                                        <div class="content-wrap">
                                            <div class="flex-wrap">
                                                <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                                <a href="<?php echo esc_url($link); ?>"
                                                   class="title"><?php echo esc_html(get_the_title()); ?></a>
                                                <a href="<?php echo esc_url($link); ?>"
                                                   class="<?php echo esc_attr($btn_style); ?>"><?php echo esc_html($btn_text); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            endwhile; ?>
                        </div>
                        <div class="swiper3-pagination"></div>
                    </div>
                </div>
            <?php }

            wp_reset_postdata();

            return ob_get_clean();

        }
    }
}

