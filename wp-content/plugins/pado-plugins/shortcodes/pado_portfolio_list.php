<?php
if ( function_exists('vc_map') ) {
    $url     = EF_URL . '/admin/assets/images/shortcodes_images/portfolio_list/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'        => __('Portfolio list', 'js_composer'),
            'base'        => 'pado_portfolio_list',
            'description' => __('List of portfolio items', 'js_composer'),
            'category'    => __('Content', 'js_composer'),
            'params'      => array(
                array(
                    'type'       => 'textfield',
                    'heading'    => __('Text for button', 'js_composer'),
                    'param_name' => 'btn_text',
                    'std'        => 'See more',
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
                    'type'        => 'checkbox',
                    'heading'     => __('Light style for text?', 'js_composer'),
                    'description' => __('Enable light style', 'js_composer'),
                    'param_name'  => 'light',
                    'value'       => array(__('Yes, please', 'js_composer') => 'yes'),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => __('Parallax Mobile', 'js_composer'),
                    'description' => __('Enable parallax on mobile?', 'js_composer'),
                    'param_name'  => 'parallax_mob',
                    'std'         => false,
                ),

                // SOURCE GROUP
                array(
                    'type'        => 'vc_efa_chosen',
                    'heading'     => __('Select Categories', 'js_composer'),
                    'description' => __('Please select the categories', 'js_composer'),
                    'param_name'  => 'cats',
                    'placeholder' => __('Select category', 'js_composer'),
                    'group'       => 'Source',
                    'value'       => pado_element_values('categories', array(
                        'sort_order' => 'ASC',
                        'taxonomy'   => 'portfolio-category',
                        'hide_empty' => false,
                    )),
                    'std'         => '',
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Order by', 'js_composer'),
                    'param_name'  => 'orderby',
                    'group'       => 'Source',
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
                    'group'       => 'Source',
                    'value'       => array(
                        __('Descending', 'js_composer') => 'DESC',
                        __('Ascending', 'js_composer')  => 'ASC',
                    ),
                    'description' => sprintf(__('Select ascending or descending order. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => 'Image original size',
                    'description' => __('Please select image size', 'js_composer'),
                    'param_name'  => 'image_original_size',
                    'group'       => 'Source',
                    'value'       => array_merge(array('full'), get_intermediate_image_sizes())
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => 'Linked to detail page',
                    'description' => __('Enable link to detail page', 'js_composer'),
                    'param_name'  => 'linked',
                    'group'       => 'Source',
                    'value'       => array(
                        'Yes'  => 'yes',
                        'None' => 'none'
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __('Count items', 'js_composer'),
                    'description' => __('Please specify count number', 'js_composer'),
                    'param_name'  => 'count',
                    'group'       => 'Source',
                ),
            ),
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    /* Frontend Output Shortcode */

    class WPBakeryShortCode_pado_portfolio_list extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            /* get all params */
            extract(shortcode_atts(array(
                'cats'                => '',
                'btn_style'           => 'a-btn a-btn-1',
                'image_original_size' => 'full',
                'linked'              => 'yes',
                'btn_text'            => 'See more',
                'count'               => '',
                'light'               => '',
                'orderby'             => '',
                'parallax_mob'        => '',
                'order'               => 'date'

            ), $atts));

            $this->enqueueJs();

            // include needed stylesheets
            if ( !in_array("pado-portfolio-list", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-portfolio-list";
            }
            $this->enqueueCss();

            // base args
            $args = array(
                'post_type'      => 'portfolio',
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
                    $term_info = get_term_by('slug', $term_slug, 'portfolio-category');
                    $cats[]    = $term_info->term_id;
                }

                $cats              = implode(',', $cats);
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'portfolio-category',
                        'field'    => 'term_id',
                        'terms'    => explode(',', $cats),
                    )
                );
            }

            $light = (isset($light) && $light) ? '-light' : '';

            $counter = 0;

            $btn_text  = isset($btn_text) && !empty($btn_text) ? $btn_text : 'See more';

            $posts = new WP_Query($args);

            wp_localize_script(
                'pado-main',
                'load_more_post',
                array(
                    'ajaxurl'   => admin_url('admin-ajax.php'),
                    'startPage' => $args['paged'],
                    'maxPage'   => $posts->max_num_pages,
                    'nextLink'  => next_posts(0, false)
                )
            );

            ob_start(); ?>
                <div class="parallax-showcase-wrapper <?php echo esc_attr($light); ?>">
                    <?php if ( $posts->have_posts() ) {
                        while ( $posts->have_posts() ) :
                            $posts->the_post();

                            $portfolio_meta = get_post_meta($posts->ID, 'pado_portfolio_options', true);
                            $images         = explode(',', $portfolio_meta['slider']);

                            $link = get_the_permalink();

                            $target = '_self';

                            if ( $linked == 'none' && !empty($portfolio_meta['ext_link']) ) {
                                $link   = $portfolio_meta['ext_link'];
                                $target = '_blank';
                            }

                            if ( !get_post_thumbnail_id($posts->ID) ) {
                                $url      = (!empty($images[0]) && is_numeric($images[0])) ? wp_get_attachment_image_src($images[0], $image_original_size) : '';
                                $url_main = $url[0];
                            } else {
                                $image_id = get_post_thumbnail_id($posts->ID);
                                $image    = (is_numeric($image_id) && !empty($image_id)) ? wp_get_attachment_image_src($image_id, $image_original_size) : '';
                                $url_main = $image[0];
                            }

                            $parallax_mob = isset($parallax_mob) ? $parallax_mob : false;
                            $parallax_mob = ($parallax_mob) ? 'data-ios-disabled=false data-android-disabled=false' : '';

                            $parallaxClass = ($counter % 2 == 0) ? '' : 'parallax-window';
                            $parallaxAttr  = ($counter % 2 == 0) ? '' : 'data-parallax="scroll" data-position-Y="top"
                                            data-image-src="' . esc_url($url_main) . '" data-bleed="500" data-overScrollFix="true"'; ?>

                            <div class="parallax-showcase-item <?php echo esc_attr($parallaxClass); ?>" <?php echo $parallaxAttr; ?> <?php echo esc_attr($parallax_mob); ?>>
                                <?php if ( $counter % 2 == 0 ) { ?>
                                    <img src="<?php echo esc_url($url_main); ?>" alt="" class="s-img-switch">
                                <?php } ?>
                                <div class="parallax-showcase-content">
                                    <?php the_title('<div class="title">', '</div>'); ?>
                                    <div class="desc">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                    <a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($btn_style); ?>"
                                       target="<?php echo esc_attr($target); ?>"><?php echo esc_html($btn_text); ?></a>
                                </div>
                            </div>
                            <?php
                            $counter++;
                        endwhile;
                    } ?>
                </div>
            <?php
            wp_reset_postdata();

            return ob_get_clean();

        }
    }
}

