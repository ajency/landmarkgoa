<?php
if ( function_exists( 'vc_map' ) ) {
    vc_map(
        array(
            'name'                    => __( 'Last posts', 'js_composer' ),
            'base'                    => 'pado_last_posts',
            'params'                  => array(
                array(
                    'type'        => 'vc_efa_chosen',
                    'heading'     => __( 'Select Categories', 'js_composer' ),
                    'param_name'  => 'cats',
                    'group'       => 'Source',
                    'placeholder' => __( 'Select category', 'js_composer' ),
                    'value'       => pado_element_values( 'category', array(
                        'sort_order' => 'ASC',
                        'taxonomy'   => 'category',
                        'hide_empty' => false,
                    ) ),
                    'std'         => '',
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __( 'Order by', 'js_composer' ),
                    'param_name'  => 'orderby',
                    'group'       => 'Source',
                    'value'       => array(
                        '',
                        __( 'Date', 'js_composer' )          => 'date',
                        __( 'ID', 'js_composer' )            => 'ID',
                        __( 'Author', 'js_composer' )        => 'author',
                        __( 'Title', 'js_composer' )         => 'title',
                        __( 'Modified', 'js_composer' )      => 'modified',
                        __( 'Random', 'js_composer' )        => 'rand',
                        __( 'Comment count', 'js_composer' ) => 'comment_count'
                    ),
                    'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __( 'Sort order', 'js_composer' ),
                    'param_name'  => 'order',
                    'group'       => 'Source',
                    'value'       => array(
                        __( 'Descending', 'js_composer' ) => 'DESC',
                        __( 'Ascending', 'js_composer' )  => 'ASC',
                    ),
                    'description' => sprintf( __( 'Select ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => __( 'Count items', 'js_composer' ),
                    'param_name' => 'count',
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __( 'Count items in a line', 'js_composer' ),
                    'param_name'  => 'count_line',
                    'value'       => array(
                        __( 'Two', 'js_composer' ) => 'two',
                        __( 'Three', 'js_composer' )  => 'three',
                        __( 'Four', 'js_composer' )  => 'four',
                    ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Button name', 'js_composer' ),
                    'param_name'  => 'btn_name',
                    'std'         => 'View more',
                    'value'       => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => __('Please select button style', 'js_composer'),
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
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => __( 'Display link under posts', 'js_composer' ),
                    'param_name' => 'link',
                ),
                array(
                    'type'       => 'vc_link',
                    'heading'    => __( 'Link options', 'js_composer' ),
                    'param_name' => 'link_options',
                    'dependency' => array(
                        'element' => 'link',
                        'not_empty' => true,
                    ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Extra class name', 'js_composer' ),
                    'param_name'  => 'el_class',
                    'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
                    'value'       => ''
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => __( 'CSS box', 'js_composer' ),
                    'param_name' => 'css',
                    'group'      => __( 'Design options', 'js_composer' )
                )
            ) //end params
        )
    );
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_pado_last_posts extends WPBakeryShortCode {
        protected function content( $atts, $content = null ) {

            extract( shortcode_atts( array(
                'cats'              => '',
                'css'               => '',
                'class'             => '',
                'el_class'          => '',
                'btn_style'         => 'a-btn a-btn-1',
                'btn_name'          => 'View more',
                'count'             => '',
                'count_line'        => 'two',
                'link'              => '',
                'link_options'      => '',
                'orderby'           => '',
                'order'             => 'date'
            ), $atts ) );


            // include needed stylesheets
            if ( ! in_array( "pado-last-post-css", self::$css_scripts ) ) {
                self::$css_scripts[] = "pado-last-post-css";
            }
            $this->enqueueCss();

            $class = ( ! empty( $el_class ) ) ? $el_class : '';
            $class .= vc_shortcode_custom_css_class( $css, ' ' );

            ob_start();

            if  ($count_line == 'two') {
                $col_class = 'col-xs-12 col-md-6';
                $row_class = 'two-col';
            } elseif  ($count_line == 'four') {
                $col_class = 'col-xs-12 col-lg-3 col-md-6';
                $row_class = 'four-col';
            } else {
                $col_class = 'col-xs-12 col-md-4';
                $row_class = 'three-col';
            }

            if (empty($count) || $count < 0) {
                $count = 3;
            }

            // base args
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => ( ! empty( $count ) && is_numeric( $count ) ) ? $count : 9,
                'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
            );

            // Order posts
            if ( null !== $orderby ) {
                $args['orderby'] = $orderby;
            }
            $args['order'] = $order;

            // category
            if ( ! empty( $cats ) ) {

                $term_array = explode( ',', $cats );
                $cats       = array();

                foreach ( $term_array as $term_slug ) {
                    $term_info = get_term_by( 'slug', $term_slug, 'category' );
                    $cats[]    = $term_info->term_id;
                }

                $cats              = implode( ',', $cats );
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => explode( ',', $cats ),
                    )
                );
            }

            $posts = new WP_Query( $args ); ?>

            <?php if ( $posts->have_posts() ) : ?>
                <div class="last-post-wrap <?php echo esc_attr( $class ); ?>">
                    <div class="container">
                            <div class="row last-posts <?php echo esc_attr( $row_class ); ?>">
                                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                                    <div class="post-item <?php echo esc_attr( $col_class ); ?>">
                                        <article class="post-item__wrapper">
                                            <?php $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                            if ( ! empty( $image ) ) { ?>
                                                <div class="post-item__image">
                                                    <?php if ( ! empty( $image ) ) {
                                                        echo pado_the_lazy_load_flter( $image, array( 'class' => 's-img-switch', 'alt' => esc_attr__('thumbnail', 'pado') ) );
                                                    } ?>
                                                </div>
                                            <?php } ?>
                                            <div class="post-item__content">
                                                <div class="post-item__head">
                                                    <div class="post-item__date"><?php echo get_the_date( 'F j, Y' ) ?></div>
                                                    <h3 class="title"><?php the_title(); ?></h3>
                                                    <?php if (!empty($btn_name)) : ?>
                                                        <a class="<?php echo esc_attr($btn_style); ?>" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html($btn_name) ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <?php if ($link && !empty($link_options) ):
                                $url = vc_build_link( $link_options );
                                $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self'; ?>
                                <div class="last-post-button text-center">
                                    <a href="<?php echo esc_url( $url['url'] ); ?>"
                                       target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                </div>
            <?php else : ?>
                <p><?php esc_html_e( 'No posts', 'pado' ); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata();

            return ob_get_clean();

        }
    }
}
