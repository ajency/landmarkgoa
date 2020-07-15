<?php
/**
 * Requried functions for theme backend.
 *
 * @package pado
 * @subpackage Template
 */

// cs framework missing
if ( ! function_exists( 'cs_get_option' ) ) {
	function cs_get_option() {
		return '';
	}

	function cs_get_customize_option() {
		return '';
	}
}

if ( ! function_exists( 'pado_add_default_cs_websafe_fonts' )) {
	function pado_add_default_cs_websafe_fonts($params)
	{
		return array_merge(array(''),$params);
	}
}
add_filter( 'cs_websafe_fonts', 'pado_add_default_cs_websafe_fonts' );

/**
 * Сustom pado menu.
 */
if ( ! function_exists( 'pado_custom_menu' ) ) {
	function pado_custom_menu() {

		$walker = new pado_Menu_Walker();
		$args = array( 'container' => '', 'walker' => $walker );
		$meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
		$portfolio_data = get_post_meta( get_the_ID(), 'pado_portfolio_options', true );

		if ( isset( $meta_data['page_menu'] ) && $meta_data['page_menu'] !== 'none' ) {
			$args['menu'] = $meta_data['page_menu'];
			wp_nav_menu( $args );
		} elseif( isset( $portfolio_data['page_menu'] ) && $portfolio_data['page_menu'] !== 'none'){
			$args['menu'] = $portfolio_data['page_menu'];
			wp_nav_menu( $args );
        } else {
			if ( has_nav_menu( 'primary-menu' ) ) {
				$args['theme_location'] = 'primary-menu';
				wp_nav_menu( $args );
			} else {
				echo '<span class="no-menu">' . esc_html__( 'Please register Top Navigation from', 'pado' ) . ' <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance &gt; Menus', 'pado' ) . '</a></span>';
			}
		}

	}
}

/**
 *
 * Get first "url" from post content or string
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'pado_get_first_url_from_string' ) ) {
	function pado_get_first_url_from_string( $string ) {
		$pattern = "/^\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
		preg_match( $pattern, $string, $link );

		return ( ! empty( $link[0] ) ) ? $link[0] : false;
	}
}

/**
 *
 * Custom Regular Expression
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'pado_get_shortcode_regex' ) ) {
	function pado_get_shortcode_regex( $tagregexp = '' ) {
		// WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
		// Also, see shortcode_unautop() and shortcode.js.
		return
			'\\['                                // Opening bracket
			. '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
			. "($tagregexp)"                     // 2: Shortcode name
			. '(?![\\w-])'                       // Not followed by word character or hyphen
			. '('                                // 3: Unroll the loop: Inside the opening shortcode tag
			. '[^\\]\\/]*'                   // Not a closing bracket or forward slash
			. '(?:'
			. '\\/(?!\\])'               // A forward slash not followed by a closing bracket
			. '[^\\]\\/]*'               // Not a closing bracket or forward slash
			. ')*?'
			. ')'
			. '(?:'
			. '(\\/)'                        // 4: Self closing tag ...
			. '\\]'                          // ... and closing bracket
			. '|'
			. '\\]'                          // Closing bracket
			. '(?:'
			. '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
			. '[^\\[]*+'             // Not an opening bracket
			. '(?:'
			. '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
			. '[^\\[]*+'         // Not an opening bracket
			. ')*+'
			. ')'
			. '\\[\\/\\2\\]'             // Closing shortcode tag
			. ')?'
			. ')'
			. '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
	}
}

/**
 *
 * Tag Regular Expression
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'pado_tagregexp' ) ) {
	function pado_tagregexp() {
		return apply_filters( 'pado_custom_tagregexp', 'video|audio|playlist|video-playlist|embed|cs_media' );
	}
}

/**
 *
 * POST FORMAT: VIDEO & AUDIO
 *
 */
if ( ! function_exists( 'pado_post_media' ) ) {
	function pado_post_media( $content ) {
		$result = strpos( $content, 'iframe' );
		if ( $result === false ) {
			$media = pado_get_first_url_from_string( $content );
			if ( ! empty( $media ) ) {
				global $wp_embed;
				$content = do_shortcode( $wp_embed->run_shortcode( '[embed]' . $media . '[/embed]' ) );
			} else {
				$pattern = pado_get_shortcode_regex( pado_tagregexp() );
				preg_match( '/' . $pattern . '/s', $content, $media );
				if ( ! empty( $media[2] ) ) {
					if ( $media[2] == 'embed' ) {
						global $wp_embed;
						$content = do_shortcode( $wp_embed->run_shortcode( $media[0] ) );
					} else {
						$content = do_shortcode( $media[0] );
					}
				}
			}
			if ( ! empty( $media ) ) {
				$output = $content;

				return $output;
			}

			return false;
		} else {
			return $content;
		}
	}
}

/**
 *
 * Create custom html structure for comments
 *
 */
if ( ! function_exists( 'pado_comment' ) ) {
	function pado_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ):
			case 'pingback':
			case 'trackback': ?>
				<p>
					<?php esc_html_e( 'Pingback:', 'pado' ); ?><?php comment_author_link(); ?>
					<?php edit_comment_link( esc_html__( '(Edit)', 'pado' ), '<span class="edit-link">', '</span>' ); ?>
				</p>
				<?php
				break;
			default:
				// generate comments
				?>
				<li <?php comment_class( 'ct-part' ); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>">
					<div class="content">
            <div class="person-img">
              <?php echo get_avatar( $comment, '70', '', '', array( 'class' => 'img-person' ) ); ?>
            </div>
            <div class="comment-content">
            <div class="person">
              <div class="author-wrap">
							<a href="#" class="author">
								<?php comment_author(); ?>
							</a>
                          <span class="comment-date">
                            <?php comment_date( get_option( 'date_format' ) ); ?>
                          </span>
              </div>
						</div>
						<?php
						comment_reply_link(
							array_merge( $args,
								array(
									'reply_text' => esc_html__( 'Reply', 'pado' ),
									'after'      => '',
									'depth'      => $depth,
									'max_depth'  => $args['max_depth']
								)
							)
						);
						?>
						<div class="text">
							<?php comment_text(); ?>
						</div>
            </div>
					</div>
				</div>
				<?php
				break;
		endswitch;
	}
}

/*
 * Site logo function.
 */
if ( ! function_exists( 'pado_site_logo' ) ) {
	function pado_site_logo() {
        $meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
        $meta_data_portfolio = get_post_meta(get_the_ID(), 'pado_portfolio_options', true);

        $logo_bg = isset( $meta_data['logo_bg'] ) && $meta_data['logo_bg'] ? 'logo-bg' : '';
        $logo_bg = isset( $meta_data_portfolio['logo_bg'] ) && $meta_data_portfolio['logo_bg'] ? 'logo-bg' : $logo_bg; ?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo <?php echo esc_attr($logo_bg); ?>">

			<?php
            $light_menu = ((isset($meta_data['menu_light_text']) && $meta_data['menu_light_text'] && $meta_data['style_header'] == 'transparent')
                || (isset($meta_data_portfolio['menu_light_text']) && $meta_data_portfolio['menu_light_text'] && $meta_data_portfolio['style_header'] == 'transparent' )) ? true : false;

            $logoHover         = cs_get_option('image_logo');
            $image_logo_mobile = cs_get_option('image_logo_mobile');
            $logo_alt = get_option('blogname');

            if ( apply_filters('pado_type_logo', cs_get_option('site_logo')) == 'imglogo' ) {

                if ( is_404() && cs_get_option('error_logo') ) {
                    if ( apply_filters('pado_type_logo', cs_get_option('error_site_logo')) == 'txtlogo' ) {
                        echo ' <span> ' . esc_html(cs_get_option('error_text_logo')) . '</span>';
                    } else {
                        $logo = '';
                        if ( cs_get_option('error_image_logo') ) {
                            $logo = cs_get_option('error_image_logo');
                        }
                        // logo for page
                        ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                             class="main-logo">

                        <?php if ( $logoHover ) { ?>
                            <img src="<?php echo esc_url($logoHover); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                                 class="logo-hover">
                        <?php } else { ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                                 class="logo-hover">
                        <?php }
                    }
                } else {

                    if ( isset($light_menu) && $light_menu ) {
                        $logo = cs_get_option('image_logo_light');
                    } else {
                        $logo = cs_get_option('image_logo');
                    }

                    // logo for page
                    $logo              = !empty($meta_data['image_page_logo']) ? $meta_data['image_page_logo'] : $logo;
                    $logo              = isset($meta_data_portfolio['image_page_logo']) && !empty($meta_data_portfolio['image_page_logo']) ? $meta_data_portfolio['image_page_logo'] : $logo;
                    $image_logo        = apply_filters('pado_header_logo', $logo);
                    $img_src           = !empty($image_logo) ? $image_logo : PADO_T_URI . '/assets/images/logo.png';
                    $logoHover         = isset($meta_data['image_logo_scroll']) && !empty($meta_data['image_logo_scroll']) ? $meta_data['image_logo_scroll'] : $logoHover;
                    $logoHover         = isset($meta_data_portfolio['image_logo_scroll']) && !empty($meta_data_portfolio['image_logo_scroll']) ? $meta_data_portfolio['image_logo_scroll'] : $logoHover;
                    $image_logo_mobile = isset($meta_data['image_logo_mobile']) && !empty($meta_data['image_logo_mobile']) ? $meta_data['image_logo_mobile'] : $image_logo_mobile;
                    $image_logo_mobile = isset($meta_data_portfolio['image_logo_mobile']) && !empty($meta_data_portfolio['image_logo_mobile']) ? $meta_data_portfolio['image_logo_mobile'] : $image_logo_mobile;

                    ?>
                    <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                         class="main-logo">

                    <?php if ( $logoHover ) { ?>
                        <img src="<?php echo esc_url($logoHover); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                             class="logo-hover">
                    <?php } else { ?>
                        <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                             class="logo-hover">
                    <?php } ?>
                    <img src="<?php echo esc_url($image_logo_mobile); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                         class="main-logo logo-mobile">
                    <?php
                }
            } elseif ( !function_exists('cs_framework_init') ) {
                echo '<span>' . esc_html($logo_alt) . '</span>';
            } else {
                echo '<span>' . esc_html(cs_get_option('text_logo')) . '</span>';
            } ?>
		</a>
	<?php }
}

/*
 * Blog item header.
 */
if ( ! function_exists( 'pado_blog_item_hedeader' ) ) {
	function pado_blog_item_hedeader( $option, $post_id , $video_params = array(), $classButton = '', $classWrap = '' ) {
		$format = get_post_format( $post_id );
		if ( isset( $option[0]['post_preview_style'] ) ) {
			switch ( $option[0]['post_preview_style'] ) {
				case 'image':
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
					$blog_type = cs_get_option('blog_type') ? cs_get_option('blog_type') : 'masonry';
					$imgClass = $blog_type == 'masonry' ? '' : 's-img-switch';
					$output = '';
					if ( !empty( $image ) && ( $format != 'quote' ) ) {
                      $output .= '<div class="post-media">';
                      $output .= pado_the_lazy_load_flter( $image[0], array(
                          'class' => $imgClass,
                          'alt'   => ''
                      ) );
                      $output .= '</div>';
					}

					break;
				case 'video':
					$output = '<div class="post-media video-container iframe-video youtube ' . esc_attr($classWrap) . '" data-type-start="click">';
                    $video_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
                    $output .= pado_the_lazy_load_flter( $video_img[0], array(
                        'class' => 's-img-switch',
                        'alt'   => ''
                    ) );

                    $video_link = $option[0]['post_preview_video'];

                    $output .= '<div class="video-content video-content-blog"><a href="'. esc_url( $video_link ).'" class="play ' . esc_attr($classButton) . '"></a></div>';
					$output .= '<span class="close fa fa-close"></span>';
					$output .= '</div>';
					break;
				case 'slider':

					$blog_type = cs_get_option('blog_type') ? cs_get_option('blog_type') : 'masonry';

					if($blog_type == 'masonry'){
						$imgClass = $blog_type == 'masonry' ? '' : 's-img-switch';
						$output = '';
						if ( !empty( $image ) && ( $format != 'quote' ) ) {
							$output .= '<div class="post-media">';
							$output .= pado_the_lazy_load_flter( $image[0], array(
								'class' => $imgClass,
								'alt'   => ''
							) );
							$output .= '</div>';
						}
                    }else{
						$output = '<div class="post-media">';
						$output .= '<div class="img-slider">';
						$output .= '<ul class="slides">';
						$images = explode( ',', $option[0]['post_preview_slider'] );
						foreach ( $images as $image ) {
							$url = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';
							if ( ! empty( $url ) ) {
								$output .= '<li class="post-slider-img">';
								$output .= pado_the_lazy_load_flter( $url, array(
									'class' => 's-img-switch',
									'alt'   => ''
								) );
								$output .= '</li>';
							}
						}
						$output .= '</ul>';
						$output .= '</div>';
						$output .= '</div>';
                    }


					break;
				case 'text':
					$output = '<i class="fa fa-quote-right fa-2x"></i><blockquote>';
					$output .= wp_kses_post( $option[0]['post_preview_text'] );
					$output .= '</blockquote>';
					if(isset($option[0]['post_preview_author']) && !empty($option[0]['post_preview_author'])){
						$output .= '<cite>';
						$output .= wp_kses_post($option[0]['post_preview_author']);
						$output .= '</cite>';
					}
					break;
				case 'audio':
					$output = '<div class="post-media">';
					$output .=  pado_post_media( $option[0]['post_preview_audio'] );
					$output .= '</div>';
					break;
				case 'link':
					$output = '<div class="link-wrap"><i class="ion-link"></i><a href="'. esc_url($option[0]['post_preview_link']) .'">';
					$output .= wp_kses_post( $option[0]['post_preview_link'] );
					$output .= '</a></div>';
					break;
			}
		} else {
			$output = '';
			if ( $format == 'quote' ) {
				$output .= '<i class="fa fa-quote-right fa-2x"></i><blockquote>';
				$output .= get_the_excerpt();
				$output .= '</blockquote>';
			}elseif($format == 'link'){
				$output .= '<div class="link-wrap"><i class="ion-link"></i>';
				$output .= get_the_content();
				$output .= '</div>';
			}else{
				$image = wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), 'large' );
				$blog_type = cs_get_option('blog_type') ? cs_get_option('blog_type') : 'masonry';
				$imgClass = $blog_type == 'masonry' ? '' : 's-img-switch';
				if(!empty($image)){
					$output .= '<div class="post-media">';
					$output .= pado_the_lazy_load_flter( $image, array(
						'class' => $imgClass,
						'alt'   => ''
					) );
					$output .= '</div>';
                }

            }
		}
		echo do_shortcode($output);
	}
}

/*
* Get Page For Navi
*/
if ( ! function_exists( 'pado_get_pages_for_navi' ) ) {
	function pado_get_pages_for_navi() {
		$posts = get_posts( "post_type=page&post_status=publish&numberposts=99999&orderby=menu_order" );
		$pages = get_page_hierarchy( $posts );
		$pages = array_keys( $pages );

		return $pages;
	}
}


// Custom row styles for onepage site type+-.
if ( ! function_exists('pado_dynamic_css' ) ) {
  function pado_dynamic_css() {
    require_once get_template_directory() . '/assets/css/custom.css.php';
    wp_die();
  }
}
add_action( 'wp_ajax_nopriv_pado_dynamic_css', 'pado_dynamic_css' );
add_action( 'wp_ajax_pado_dynamic_css', 'pado_dynamic_css' );

/*
* pado Mini Cart for Woocommerce
*/
if ( !function_exists('pado_mini_cart') ) {
    function pado_mini_cart()
    {

        if ( class_exists('WooCommerce') ) {

            ob_start();
            ?>
            <div class="pado_mini_cart">

                <?php do_action('woocommerce_before_mini_cart'); ?>

                <ul class="cart_list product_list_widget">

                    <?php if ( !WC()->cart->is_empty() ) : ?>

                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key) ) {
                                $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                                $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                ?>
                                <li class="<?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
                                    <div class="mini_cart_item_thumbnail">
                                        <?php if ( !$_product->is_visible() ) : ?>
                                            <?php echo str_replace(array('http:', 'https:'), '', $thumbnail); ?>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url($product_permalink); ?>">
                                                <?php echo str_replace(array('http:', 'https:'), '', $thumbnail); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mini-cart-data">
                                        <a href="<?php echo esc_url($product_permalink); ?>"
                                           class="mini_cart_item_name">
                                            <?php echo wp_kses_post($product_name); ?>
                                        </a>

                                        <div class="mini_cart_item_quantity">
                                            <?php esc_html_e('x', 'pado'); ?>
                                            <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . $cart_item['quantity'] . '</span>', $cart_item, $cart_item_key); ?>
                                        </div>

                                        <div class="mini_cart_item_price">
                                            <?php if ( !empty($product_price) ) {
                                                echo wp_kses_post($product_price);
                                            } ?>
                                        </div>


                                    </div>
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                        '<a href="%s" class="woocommerce-mini-cart__remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        esc_html__('Remove this item', 'pado'),
                                        esc_attr($product_id),
                                        esc_attr($cart_item_key),
                                        esc_attr($_product->get_sku())
                                    ), $cart_item_key);
                                    ?>
                                </li>
                                <?php
                            }
                        }
                        ?>

                    <?php else : ?>

                        <li class="empty"><?php esc_html_e('No products in the cart.', 'pado'); ?></li>

                    <?php endif; ?>

                </ul><!-- end product list -->

                <div class="pado-buttons">
                    <a href="<?php echo wc_get_cart_url(); ?>"><?php esc_html_e('Go to cart', 'pado'); ?><i
                                class="fa fa-arrow-right"></i></a>
                    <p class="woocommerce-mini-cart__total total"><?php esc_html_e('Total', 'pado'); ?>
                        : <?php echo WC()->cart->get_cart_subtotal(); ?></p>
                </div>

                <?php if ( !WC()->cart->is_empty() ) : ?>

                    <?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

                    <a href="<?php echo esc_url(wc_get_checkout_url()); ?>"
                       class="button checkout wc-forward"><?php esc_html_e('Checkout', 'pado'); ?></a>

                <?php endif; ?>

                <?php do_action('woocommerce_after_mini_cart'); ?>

            </div>

            <?php
            return ob_get_clean();
        }
    }
}

if (! function_exists('pado_the_share_posts')) {
	function pado_the_share_posts($post,$show_title = '')
	{	
		if ( cs_get_option( 'social_portfolio' ) ) { 
			ob_start();  ?>
				<div class="row single-share">
					<div class="ft-part margin-lg-15b">
						<ul class="social-list">
							<?php if (!empty($show_title)) { ?>
							<li><span><?php esc_html_e( 'Share:', 'pado' ); ?></span></li>
							<?php } ?>
							<li>
								<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url( the_permalink() ); ?>&amp;title=<?php echo esc_attr( urlencode( the_title( '', '', false ) ) ); ?>"
								   target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li>
								<a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url( urlencode( get_permalink() ) ); ?>&amp;media=<?php echo esc_attr( $pinterestimage[0] ); ?>&amp;description=<?php esc_attr( the_title() ); ?>"
								   class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'pado'); ?>"><i
										class="fa fa-pinterest-p"></i></a></li>
							<li>
								<a href="http://www.facebook.com/sharer.php?u=<?php esc_url( the_permalink() ); ?>&amp;t=<?php echo esc_attr( urlencode( the_title( '', '', false ) ) ); ?>"
								   class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li>
								<a href="http://twitter.com/home?status=<?php echo esc_url( urlencode( the_title( '', '', false ) ) ); ?><?php esc_url( the_permalink() ); ?>"
								   class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'pado'); ?>"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="http://plus.google.com/share?url=<?php esc_url( the_permalink() ); ?>&amp;title=<?php echo esc_attr( urlencode( the_title( '', '', false ) ) ); ?>"
								   target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			<?php 
			echo ob_get_clean();
		}
	} 
}

if ( ! function_exists( 'pado_get_post_shortcode_params' ) ) {
	function pado_get_post_shortcode_params($tag_shortcode, $string = '', $all = false)
	{

		if (empty($tag_shortcode)) return false;

		if (empty($string)) {
			global $post;
			$string = $post->post_content;
		}
		
		preg_match_all( "/" . get_shortcode_regex(array($tag_shortcode)) . "/si" ,
					$string,
					$matchs );
		if (!empty($matchs[0])) {

			if ($all) {
				$params = array();
				foreach ($matchs[0] as $key => $param) {
					$this_param = str_replace('"]', '" ]', $matchs[$key][0]);
					$atts = shortcode_parse_atts($this_param);
					if (is_array($atts)) {
					$this_param = array_slice($atts, 1, -1);
						$params[] = $this_param;
					}
				}
				return $params;
			}

			$params = str_replace('"]', '" ]', $matchs[0][0]);
			$params = array_slice(shortcode_parse_atts($params), 1, -1);
			if (is_array($params)) {
				return $params;
			}
			return false;
		}
		return false;

	}
}

if (!function_exists('pado_include_fonts')) {
	function pado_include_fonts($fonts = '') {
		if ( empty($fonts) ) return ''; 

		if ( !is_array($fonts) ) {
			$fonts = array( $name_option );
		}

		foreach ($fonts as $key => $font) {
			if ( cs_get_option($font) ) { 

				$font_family = cs_get_option($font);
				if(! empty($font_family['family']) ) {
					wp_enqueue_style( sanitize_title_with_dashes($font_family['family']), '//fonts.googleapis.com/css?family=' . $font_family['family'] . ':' . $font_family['variant'] .'' );
				}
			}
		}

	}
}

// functions max word in string
if ( ! function_exists( 'pado_maxsite_str_word' ) ) {
	function pado_maxsite_str_word( $text, $counttext = 10, $sep = ' ' ) {
		$words = explode( $sep, $text );
		if ( count( $words ) > $counttext )
			$text = join( $sep, array_slice( $words, 0, $counttext ) );
		return $text;
	}
}


if ( ! function_exists( 'pado_excerpt_more' ) ) {
	function pado_excerpt_more() {
		return ' ...';
	}
	add_filter('excerpt_more', 'pado_excerpt_more');
}


/**
 * Сustom pado menu list.
 */
if ( ! function_exists( 'pado_get_menus' ) ) {
	function pado_get_menus() {
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
		$array = array( 'none' => 'None' );
		foreach ( $menus as $menu ) {
			$array[ $menu->slug ] = $menu->name;
		}

		return $array;
	}
}

/**
 *
 * ION icons array.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'pado_simple_line_icons' ) ) {
	function pado_simple_line_icons() {
		return array(
			array('icon-arrow-1-circle-down' =>'icon-arrow-1-circle-down'),
			array('icon-arrow-1-circle-left' =>'icon-arrow-1-circle-left'),
			array('icon-arrow-1-circle-right' =>'icon-arrow-1-circle-right'),
			array('icon-arrow-1-circle-up' =>'icon-arrow-1-circle-up'),
			array('icon-arrow-1-down' =>'icon-arrow-1-down'),
			array('icon-arrow-1-left' =>'icon-arrow-1-left'),
			array('icon-arrow-1-right' =>'icon-arrow-1-right'),
			array('icon-arrow-1-square-down' =>'icon-arrow-1-square-down'),
			array('icon-arrow-1-square-left' =>'icon-arrow-1-square-left'),
			array('icon-arrow-1-square-right' =>'icon-arrow-1-square-right'),
			array('icon-arrow-1-square-up' =>'icon-arrow-1-square-up'),
			array('icon-arrow-1-up' =>'icon-arrow-1-up'),
			array('icon-arrow-2-circle-down' =>'icon-arrow-2-circle-down'),
			array('icon-arrow-2-circle-left' =>'icon-arrow-2-circle-left'),
			array('icon-arrow-2-circle-right' =>'icon-arrow-2-circle-right'),
			array('icon-arrow-2-circle-up' =>'icon-arrow-2-circle-up'),
			array('icon-arrow-2-down' =>'icon-arrow-2-down'),
			array('icon-arrow-2-left' =>'icon-arrow-2-left'),
			array('icon-arrow-2-right' =>'icon-arrow-2-right'),
			array('icon-arrow-2-sqare-down' =>'icon-arrow-2-sqare-down'),
			array('icon-arrow-2-sqare-left' =>'icon-arrow-2-sqare-left'),
			array('icon-arrow-2-sqare-right' =>'icon-arrow-2-sqare-right'),
			array('icon-arrow-2-sqare-up' =>'icon-arrow-2-sqare-up'),
			array('icon-arrow-2-up' =>'icon-arrow-2-up'),
			array('icon-arrow-3-circle-down' =>'icon-arrow-3-circle-down'),
			array('icon-arrow-3-circle-left' =>'icon-arrow-3-circle-left'),
			array('icon-arrow-3-circle-right' =>'icon-arrow-3-circle-right'),
			array('icon-arrow-3-circle-up' =>'icon-arrow-3-circle-up'),
			array('icon-arrow-3-down' =>'icon-arrow-3-down'),
			array('icon-arrow-3-left' =>'icon-arrow-3-left'),
			array('icon-arrow-3-right' =>'icon-arrow-3-right'),
			array('icon-arrow-3-square-down' =>'icon-arrow-3-square-down'),
			array('icon-arrow-3-square-left' =>'icon-arrow-3-square-left'),
			array('icon-arrow-3-square-right' =>'icon-arrow-3-square-right'),
			array('icon-arrow-3-square-up' =>'icon-arrow-3-square-up'),
			array('icon-arrow-3-up' =>'icon-arrow-3-up'),
			array('icon-back-1' =>'icon-back-1'),
			array('icon-back-2' =>'icon-back-2'),
			array('icon-back-3' =>'icon-back-3'),
			array('icon-back-4-circle' =>'icon-back-4-circle'),
			array('icon-back-4-square' =>'icon-back-4-square'),
			array('icon-back-4' =>'icon-back-4'),
			array('icon-back-5' =>'icon-back-5'),
			array('icon-back-6' =>'icon-back-6'),
			array('icon-back-7' =>'icon-back-7'),
			array('icon-backward-7' =>'icon-backward-7'),
			array('icon-double-arrows-1-left' =>'icon-double-arrows-1-left'),
			array('icon-double-arrows-1-right' =>'icon-double-arrows-1-right'),
			array('icon-fork-arrows' =>'icon-fork-arrows'),
			array('icon-forward-7' =>'icon-forward-7'),
			array('icon-next-1' =>'icon-next-1'),
			array('icon-next-2' =>'icon-next-2'),
			array('icon-next-3' =>'icon-next-3'),
			array('icon-next-4-circle' =>'icon-next-4-circle'),
			array('icon-next-4-square' =>'icon-next-4-square'),
			array('icon-next-4' =>'icon-next-4'),
			array('icon-next-5' =>'icon-next-5'),
			array('icon-next-6' =>'icon-next-6'),
			array('icon-next-7' =>'icon-next-7'),
			array('icon-s-arrow-1' =>'icon-s-arrow-1'),
			array('icon-s-arrow-2' =>'icon-s-arrow-2'),
			array('icon-s-arrow-3' =>'icon-s-arrow-3'),
			array('icon-answer' =>'icon-answer'),
			array('icon-call-back' =>'icon-call-back'),
			array('icon-call-block' =>'icon-call-block'),
			array('icon-call-end' =>'icon-call-end'),
			array('icon-call-hold' =>'icon-call-hold'),
			array('icon-call-in' =>'icon-call-in'),
			array('icon-call-logs' =>'icon-call-logs'),
			array('icon-call-off' =>'icon-call-off'),
			array('icon-call-out' =>'icon-call-out'),
			array('icon-call' =>'icon-call'),
			array('icon-chat-1' =>'icon-chat-1'),
			array('icon-chat-2' =>'icon-chat-2'),
			array('icon-chat-3' =>'icon-chat-3'),
			array('icon-comment-1-like' =>'icon-comment-1-like'),
			array('icon-comment-1' =>'icon-comment-1'),
			array('icon-comment-2-hashtag' =>'icon-comment-2-hashtag'),
			array('icon-comment-2-quote' =>'icon-comment-2-quote'),
			array('icon-comment-2-smile' =>'icon-comment-2-smile'),
			array('icon-comment-2-write-2' =>'icon-comment-2-write-2'),
			array('icon-comment-2' =>'icon-comment-2'),
			array('icon-comment-3-write-2' =>'icon-comment-3-write-2'),
			array('icon-comment-3' =>'icon-comment-3'),
			array('icon-comments-1' =>'icon-comments-1'),
			array('icon-comments-2' =>'icon-comments-2'),
			array('icon-comments-3' =>'icon-comments-3'),
			array('icon-email-2-at' =>'icon-email-2-at'),
			array('icon-email-2-letter' =>'icon-email-2-letter'),
			array('icon-email-2-open' =>'icon-email-2-open'),
			array('icon-email-2-search' =>'icon-email-2-search'),
			array('icon-email-at' =>'icon-email-at'),
			array('icon-email-ban' =>'icon-email-ban'),
			array('icon-email-check' =>'icon-email-check'),
			array('icon-email-close' =>'icon-email-close'),
			array('icon-email-delete' =>'icon-email-delete'),
			array('icon-email-edit' =>'icon-email-edit'),
			array('icon-email-forward' =>'icon-email-forward'),
			array('icon-email-in' =>'icon-email-in'),
			array('icon-email-letter' =>'icon-email-letter'),
			array('icon-email-locked' =>'icon-email-locked'),
			array('icon-email-new' =>'icon-email-new'),
			array('icon-email-open' =>'icon-email-open'),
			array('icon-email-out' =>'icon-email-out'),
			array('icon-email-refresh' =>'icon-email-refresh'),
			array('icon-email-reply' =>'icon-email-reply'),
			array('icon-email-search' =>'icon-email-search'),
			array('icon-email-send' =>'icon-email-send'),
			array('icon-email-star' =>'icon-email-star'),
			array('icon-email' =>'icon-email'),
			array('icon-inbox-empty' =>'icon-inbox-empty'),
			array('icon-inbox-full' =>'icon-inbox-full'),
			array('icon-inbox' =>'icon-inbox'),
			array('icon-letter' =>'icon-letter'),
			array('icon-letters' =>'icon-letters'),
			array('icon-megaphone-1' =>'icon-megaphone-1'),
			array('icon-megaphone-2' =>'icon-megaphone-2'),
			array('icon-message-1-alert' =>'icon-message-1-alert'),
			array('icon-message-1-ask' =>'icon-message-1-ask'),
			array('icon-message-1-hashtag' =>'icon-message-1-hashtag'),
			array('icon-message-1-heart' =>'icon-message-1-heart'),
			array('icon-message-1-music-tone' =>'icon-message-1-music-tone'),
			array('icon-message-1-pause' =>'icon-message-1-pause'),
			array('icon-message-1-quote' =>'icon-message-1-quote'),
			array('icon-message-1-smile' =>'icon-message-1-smile'),
			array('icon-message-1-write' =>'icon-message-1-write'),
			array('icon-message-1' =>'icon-message-1'),
			array('icon-message-2-alert' =>'icon-message-2-alert'),
			array('icon-message-2-ask' =>'icon-message-2-ask'),
			array('icon-message-2-heart' =>'icon-message-2-heart'),
			array('icon-message-2-like' =>'icon-message-2-like'),
			array('icon-message-2-music-tone' =>'icon-message-2-music-tone'),
			array('icon-message-2-pause' =>'icon-message-2-pause'),
			array('icon-message-2-write' =>'icon-message-2-write'),
			array('icon-message-2' =>'icon-message-2'),
			array('icon-message-3-alert' =>'icon-message-3-alert'),
			array('icon-message-3-ask' =>'icon-message-3-ask'),
			array('icon-message-3-hashtag' =>'icon-message-3-hashtag'),
			array('icon-message-3-heart' =>'icon-message-3-heart'),
			array('icon-message-3-like' =>'icon-message-3-like'),
			array('icon-message-3-music-tone' =>'icon-message-3-music-tone'),
			array('icon-message-3-pause' =>'icon-message-3-pause'),
			array('icon-message-3-quote' =>'icon-message-3-quote'),
			array('icon-message-3-smile' =>'icon-message-3-smile'),
			array('icon-message-3-write' =>'icon-message-3-write'),
			array('icon-message-3' =>'icon-message-3'),
			array('icon-outbox' =>'icon-outbox'),
			array('icon-paper-plane-2' =>'icon-paper-plane-2'),
			array('icon-phone-call-in' =>'icon-phone-call-in'),
			array('icon-phone-call-out' =>'icon-phone-call-out'),
			array('icon-phone-contacts' =>'icon-phone-contacts'),
			array('icon-phone-message-1' =>'icon-phone-message-1'),
			array('icon-phone-message-2' =>'icon-phone-message-2'),
			array('icon-phone-message-3' =>'icon-phone-message-3'),
			array('icon-phone-ring' =>'icon-phone-ring'),
			array('icon-Q-and-A' =>'icon-Q-and-A'),
			array('icon-telephone-1' =>'icon-telephone-1'),
			array('icon-voicemail' =>'icon-voicemail'),
			array('icon-battery-1' =>'icon-battery-1'),
			array('icon-battery-2' =>'icon-battery-2'),
			array('icon-battery-3' =>'icon-battery-3'),
			array('icon-battery-4' =>'icon-battery-4'),
			array('icon-battery-5' =>'icon-battery-5'),
			array('icon-battery-charging' =>'icon-battery-charging'),
			array('icon-battery-empty' =>'icon-battery-empty'),
			array('icon-battery-fully-charged' =>'icon-battery-fully-charged'),
			array('icon-battery-low' =>'icon-battery-low'),
			array('icon-battery-warning' =>'icon-battery-warning'),
			array('icon-cable-1' =>'icon-cable-1'),
			array('icon-cable-2' =>'icon-cable-2'),
			array('icon-CD-1' =>'icon-CD-1'),
			array('icon-cd-burn' =>'icon-cd-burn'),
			array('icon-charger-plug-1' =>'icon-charger-plug-1'),
			array('icon-charger-plug-2' =>'icon-charger-plug-2'),
			array('icon-charger-plug-3' =>'icon-charger-plug-3'),
			array('icon-desktop' =>'icon-desktop'),
			array('icon-diskette-1' =>'icon-diskette-1'),
			array('icon-diskette-2' =>'icon-diskette-2'),
			array('icon-diskette-3' =>'icon-diskette-3'),
			array('icon-flashdrive' =>'icon-flashdrive'),
			array('icon-gameboy' =>'icon-gameboy'),
			array('icon-hdd' =>'icon-hdd'),
			array('icon-imac' =>'icon-imac'),
			array('icon-ipod' =>'icon-ipod'),
			array('icon-iwatch' =>'icon-iwatch'),
			array('icon-joystick-1' =>'icon-joystick-1'),
			array('icon-joystick-2' =>'icon-joystick-2'),
			array('icon-keyboard-1' =>'icon-keyboard-1'),
			array('icon-keyboard-2' =>'icon-keyboard-2'),
			array('icon-laptop-1' =>'icon-laptop-1'),
			array('icon-laptop-2' =>'icon-laptop-2'),
			array('icon-monitor' =>'icon-monitor'),
			array('icon-mouse-1' =>'icon-mouse-1'),
			array('icon-mouse-2' =>'icon-mouse-2'),
			array('icon-mouse-3' =>'icon-mouse-3'),
			array('icon-old-computer' =>'icon-old-computer'),
			array('icon-old-radio-1' =>'icon-old-radio-1'),
			array('icon-old-radio-2' =>'icon-old-radio-2'),
			array('icon-old-radio-3' =>'icon-old-radio-3'),
			array('icon-old-telephone' =>'icon-old-telephone'),
			array('icon-old-tv-1' =>'icon-old-tv-1'),
			array('icon-old-tv-2' =>'icon-old-tv-2'),
			array('icon-outlet' =>'icon-outlet'),
			array('icon-plug' =>'icon-plug'),
			array('icon-printer' =>'icon-printer'),
			array('icon-projector' =>'icon-projector'),
			array('icon-psp' =>'icon-psp'),
			array('icon-remote' =>'icon-remote'),
			array('icon-router' =>'icon-router'),
			array('icon-security-camera' =>'icon-security-camera'),
			array('icon-shredder' =>'icon-shredder'),
			array('icon-sim-1' =>'icon-sim-1'),
			array('icon-sim-2' =>'icon-sim-2'),
			array('icon-smart-watch' =>'icon-smart-watch'),
			array('icon-smartphone-3G' =>'icon-smartphone-3G'),
			array('icon-smartphone-4G' =>'icon-smartphone-4G'),
			array('icon-smartphone-desktop' =>'icon-smartphone-desktop'),
			array('icon-smartphone-hand-1' =>'icon-smartphone-hand-1'),
			array('icon-smartphone-hand-2' =>'icon-smartphone-hand-2'),
			array('icon-smartphone-landscape' =>'icon-smartphone-landscape'),
			array('icon-smartphone-laptop' =>'icon-smartphone-laptop'),
			array('icon-smartphone-off' =>'icon-smartphone-off'),
			array('icon-smartphone-orientation' =>'icon-smartphone-orientation'),
			array('icon-smartphone-rotate-left' =>'icon-smartphone-rotate-left'),
			array('icon-smartphone-rotate-right' =>'icon-smartphone-rotate-right'),
			array('icon-smartphone-tablet-1' =>'icon-smartphone-tablet-1'),
			array('icon-smartphone-tablet-2' =>'icon-smartphone-tablet-2'),
			array('icon-smartphone-tablet-desktop' =>'icon-smartphone-tablet-desktop'),
			array('icon-smartphone' =>'icon-smartphone'),
			array('icon-smartphones' =>'icon-smartphones'),
			array('icon-switch' =>'icon-switch'),
			array('icon-tablet-desktop' =>'icon-tablet-desktop'),
			array('icon-tablet-landscape' =>'icon-tablet-landscape'),
			array('icon-tablet-orientation-landscape' =>'icon-tablet-orientation-landscape'),
			array('icon-tablet-orientation-portrait' =>'icon-tablet-orientation-portrait'),
			array('icon-tablet-stylus' =>'icon-tablet-stylus'),
			array('icon-tablet' =>'icon-tablet'),
			array('icon-tablets' =>'icon-tablets'),
			array('icon-telephone' =>'icon-telephone'),
			array('icon-tv' =>'icon-tv'),
			array('icon-usb-wireless' =>'icon-usb-wireless'),
			array('icon-web-camera' =>'icon-web-camera'),
			array('icon-auction' =>'icon-auction'),
			array('icon-barcode-scan' =>'icon-barcode-scan'),
			array('icon-barcode' =>'icon-barcode'),
			array('icon-basket-add' =>'icon-basket-add'),
			array('icon-basket-checked' =>'icon-basket-checked'),
			array('icon-basket-close' =>'icon-basket-close'),
			array('icon-basket-in' =>'icon-basket-in'),
			array('icon-basket-out' =>'icon-basket-out'),
			array('icon-basket-remove' =>'icon-basket-remove'),
			array('icon-basket' =>'icon-basket'),
			array('icon-cart-1-add' =>'icon-cart-1-add'),
			array('icon-cart-1-cancel' =>'icon-cart-1-cancel'),
			array('icon-cart-1-checked' =>'icon-cart-1-checked'),
			array('icon-cart-1-in' =>'icon-cart-1-in'),
			array('icon-cart-1-loaded' =>'icon-cart-1-loaded'),
			array('icon-cart-1-out' =>'icon-cart-1-out'),
			array('icon-cart-1-remove' =>'icon-cart-1-remove'),
			array('icon-cart-1' =>'icon-cart-1'),
			array('icon-cart-2-add' =>'icon-cart-2-add'),
			array('icon-cart-2-cancel' =>'icon-cart-2-cancel'),
			array('icon-cart-2-checked' =>'icon-cart-2-checked'),
			array('icon-cart-2-in' =>'icon-cart-2-in'),
			array('icon-cart-2-loaded' =>'icon-cart-2-loaded'),
			array('icon-cart-2-out' =>'icon-cart-2-out'),
			array('icon-cart-2-remove' =>'icon-cart-2-remove'),
			array('icon-cart-2' =>'icon-cart-2'),
			array('icon-cart-3-loaded' =>'icon-cart-3-loaded'),
			array('icon-cart-3' =>'icon-cart-3'),
			array('icon-delivery-1' =>'icon-delivery-1'),
			array('icon-delivery-2' =>'icon-delivery-2'),
			array('icon-delivery-3' =>'icon-delivery-3'),
			array('icon-delivery-box-1' =>'icon-delivery-box-1'),
			array('icon-delivery-box-2' =>'icon-delivery-box-2'),
			array('icon-discount-circle' =>'icon-discount-circle'),
			array('icon-discount-star' =>'icon-discount-star'),
			array('icon-handbag' =>'icon-handbag'),
			array('icon-list-heart' =>'icon-list-heart'),
			array('icon-open-sign' =>'icon-open-sign'),
			array('icon-price-tag' =>'icon-price-tag'),
			array('icon-qr-code' =>'icon-qr-code'),
			array('icon-shop-1' =>'icon-shop-1'),
			array('icon-shop-2-location' =>'icon-shop-2-location'),
			array('icon-shop-2' =>'icon-shop-2'),
			array('icon-shopping-bag-add' =>'icon-shopping-bag-add'),
			array('icon-shopping-bag-checked' =>'icon-shopping-bag-checked'),
			array('icon-shopping-bag-close' =>'icon-shopping-bag-close'),
			array('icon-shopping-bag-heart' =>'icon-shopping-bag-heart'),
			array('icon-shopping-bag-remove' =>'icon-shopping-bag-remove'),
			array('icon-shopping-bag' =>'icon-shopping-bag'),
			array('icon-shopping-tag' =>'icon-shopping-tag'),
			array('icon-shopping-tags' =>'icon-shopping-tags'),
			array('icon-ticket' =>'icon-ticket'),
			array('icon-wallet-1' =>'icon-wallet-1'),
			array('icon-wallet-add' =>'icon-wallet-add'),
			array('icon-wallet-ban' =>'icon-wallet-ban'),
			array('icon-wallet-cancel' =>'icon-wallet-cancel'),
			array('icon-wallet-info' =>'icon-wallet-info'),
			array('icon-wallet-loaded' =>'icon-wallet-loaded'),
			array('icon-wallet-locked' =>'icon-wallet-locked'),
			array('icon-wallet-remove' =>'icon-wallet-remove'),
			array('icon-wallet-verified' =>'icon-wallet-verified'),
			array('icon-wallet1' =>'icon-wallet1'),
			array('icon-abacus' =>'icon-abacus'),
			array('icon-alphabet' =>'icon-alphabet'),
			array('icon-blackboard-1' =>'icon-blackboard-1'),
			array('icon-blackboard-2' =>'icon-blackboard-2'),
			array('icon-blackboard-3' =>'icon-blackboard-3'),
			array('icon-blackboard-alphabet' =>'icon-blackboard-alphabet'),
			array('icon-blackboard-pointer' =>'icon-blackboard-pointer'),
			array('icon-bomb' =>'icon-bomb'),
			array('icon-briefcase-2' =>'icon-briefcase-2'),
			array('icon-bulb-add' =>'icon-bulb-add'),
			array('icon-bulb-checked' =>'icon-bulb-checked'),
			array('icon-bulb-close' =>'icon-bulb-close'),
			array('icon-bulb-idea' =>'icon-bulb-idea'),
			array('icon-bulb-remove' =>'icon-bulb-remove'),
			array('icon-bulb' =>'icon-bulb'),
			array('icon-chemistry-1-test-failed' =>'icon-chemistry-1-test-failed'),
			array('icon-chemistry-1-test-successful' =>'icon-chemistry-1-test-successful'),
			array('icon-chemistry-1' =>'icon-chemistry-1'),
			array('icon-chemistry-2' =>'icon-chemistry-2'),
			array('icon-chemistry-3' =>'icon-chemistry-3'),
			array('icon-chemistry-5' =>'icon-chemistry-5'),
			array('icon-divider' =>'icon-divider'),
			array('icon-drawers' =>'icon-drawers'),
			array('icon-earth-globe' =>'icon-earth-globe'),
			array('icon-formula-2' =>'icon-formula-2'),
			array('icon-formula' =>'icon-formula'),
			array('icon-germs' =>'icon-germs'),
			array('icon-grade' =>'icon-grade'),
			array('icon-graduation-cap' =>'icon-graduation-cap'),
			array('icon-learning' =>'icon-learning'),
			array('icon-math' =>'icon-math'),
			array('icon-molecule' =>'icon-molecule'),
			array('icon-nerd-glasses' =>'icon-nerd-glasses'),
			array('icon-physics-1' =>'icon-physics-1'),
			array('icon-physics-2' =>'icon-physics-2'),
			array('icon-planet' =>'icon-planet'),
			array('icon-school-bag' =>'icon-school-bag'),
			array('icon-telescope' =>'icon-telescope'),
			array('icon-university' =>'icon-university'),
			array('icon-d-axis' =>'icon-d-axis'),
			array('icon-d-axis-2' =>'icon-d-axis-2'),
			array('icon-d-axis2' =>'icon-d-axis2'),
			array('icon-d-cube' =>'icon-d-cube'),
			array('icon-blur' =>'icon-blur'),
			array('icon-bring-forward' =>'icon-bring-forward'),
			array('icon-brush-1' =>'icon-brush-1'),
			array('icon-brush-2' =>'icon-brush-2'),
			array('icon-brush-pencil' =>'icon-brush-pencil'),
			array('icon-cmyk' =>'icon-cmyk'),
			array('icon-color-palette' =>'icon-color-palette'),
			array('icon-crop' =>'icon-crop'),
			array('icon-easel' =>'icon-easel'),
			array('icon-eraser' =>'icon-eraser'),
			array('icon-eyedropper-1' =>'icon-eyedropper-1'),
			array('icon-eyedropper-2' =>'icon-eyedropper-2'),
			array('icon-golden-spiral' =>'icon-golden-spiral'),
			array('icon-graphic-tablet' =>'icon-graphic-tablet'),
			array('icon-grid' =>'icon-grid'),
			array('icon-layers-1' =>'icon-layers-1'),
			array('icon-layers-2' =>'icon-layers-2'),
			array('icon-layers-add-1' =>'icon-layers-add-1'),
			array('icon-layers-add-2' =>'icon-layers-add-2'),
			array('icon-layers-linked-1' =>'icon-layers-linked-1'),
			array('icon-layers-linked-2' =>'icon-layers-linked-2'),
			array('icon-layers-locked-1' =>'icon-layers-locked-1'),
			array('icon-layers-locked-2' =>'icon-layers-locked-2'),
			array('icon-layers-off-1' =>'icon-layers-off-1'),
			array('icon-layers-remove-1' =>'icon-layers-remove-1'),
			array('icon-layers-remove-2' =>'icon-layers-remove-2'),
			array('icon-paint-bucket-1' =>'icon-paint-bucket-1'),
			array('icon-paint-bucket-2' =>'icon-paint-bucket-2'),
			array('icon-paint-roll' =>'icon-paint-roll'),
			array('icon-pantone-charts' =>'icon-pantone-charts'),
			array('icon-pathfinder-exclude' =>'icon-pathfinder-exclude'),
			array('icon-pathfinder-intersect' =>'icon-pathfinder-intersect'),
			array('icon-pathfinder-minus-front' =>'icon-pathfinder-minus-front'),
			array('icon-pathfinder-unite' =>'icon-pathfinder-unite'),
			array('icon-pen-2' =>'icon-pen-2'),
			array('icon-pen-pencil' =>'icon-pen-pencil'),
			array('icon-pen1' =>'icon-pen1'),
			array('icon-pencil-ruler' =>'icon-pencil-ruler'),
			array('icon-pencil1' =>'icon-pencil1'),
			array('icon-pencil2' =>'icon-pencil2'),
			array('icon-rgb' =>'icon-rgb'),
			array('icon-ruler-triangle' =>'icon-ruler-triangle'),
			array('icon-ruler' =>'icon-ruler'),
			array('icon-scissors-2' =>'icon-scissors-2'),
			array('icon-scissors' =>'icon-scissors'),
			array('icon-send-backward' =>'icon-send-backward'),
			array('icon-sharpener' =>'icon-sharpener'),
			array('icon-smart-object' =>'icon-smart-object'),
			array('icon-spiral' =>'icon-spiral'),
			array('icon-spray-can' =>'icon-spray-can'),
			array('icon-square-circle' =>'icon-square-circle'),
			array('icon-square-triangle-circle' =>'icon-square-triangle-circle'),
			array('icon-square-triangle' =>'icon-square-triangle'),
			array('icon-stylus' =>'icon-stylus'),
			array('icon-varnish-brush' =>'icon-varnish-brush'),
			array('icon-vector-arc' =>'icon-vector-arc'),
			array('icon-vector-circle' =>'icon-vector-circle'),
			array('icon-vector-line' =>'icon-vector-line'),
			array('icon-vector-path-1' =>'icon-vector-path-1'),
			array('icon-vector-path-2' =>'icon-vector-path-2'),
			array('icon-vector-path-3' =>'icon-vector-path-3'),
			array('icon-vector-rectangle' =>'icon-vector-rectangle'),
			array('icon-vector-triangle' =>'icon-vector-triangle'),
			array('icon-agenda-1' =>'icon-agenda-1'),
			array('icon-agenda-2' =>'icon-agenda-2'),
			array('icon-article-2' =>'icon-article-2'),
			array('icon-article-3' =>'icon-article-3'),
			array('icon-article' =>'icon-article'),
			array('icon-ballpen' =>'icon-ballpen'),
			array('icon-bold' =>'icon-bold'),
			array('icon-book-2' =>'icon-book-2'),
			array('icon-book-3' =>'icon-book-3'),
			array('icon-book-4' =>'icon-book-4'),
			array('icon-book-5' =>'icon-book-5'),
			array('icon-book-6' =>'icon-book-6'),
			array('icon-book' =>'icon-book'),
			array('icon-bookmark-2' =>'icon-bookmark-2'),
			array('icon-bookmark-3' =>'icon-bookmark-3'),
			array('icon-bookmark-4' =>'icon-bookmark-4'),
			array('icon-bookmark-add' =>'icon-bookmark-add'),
			array('icon-bookmark-checked' =>'icon-bookmark-checked'),
			array('icon-bookmark1' =>'icon-bookmark1'),
			array('icon-bookmarks' =>'icon-bookmarks'),
			array('icon-character' =>'icon-character'),
			array('icon-characters' =>'icon-characters'),
			array('icon-clipboard-1' =>'icon-clipboard-1'),
			array('icon-clipboard-2' =>'icon-clipboard-2'),
			array('icon-clipboard-check' =>'icon-clipboard-check'),
			array('icon-clipboard-file' =>'icon-clipboard-file'),
			array('icon-cmd' =>'icon-cmd'),
			array('icon-content-1' =>'icon-content-1'),
			array('icon-content-2' =>'icon-content-2'),
			array('icon-content-3' =>'icon-content-3'),
			array('icon-copy-plain-text' =>'icon-copy-plain-text'),
			array('icon-copy-styles' =>'icon-copy-styles'),
			array('icon-CV-2' =>'icon-CV-2'),
			array('icon-CV' =>'icon-CV'),
			array('icon-document-envelope-1' =>'icon-document-envelope-1'),
			array('icon-document-envelope-2' =>'icon-document-envelope-2'),
			array('icon-document-pencil' =>'icon-document-pencil'),
			array('icon-indent-left' =>'icon-indent-left'),
			array('icon-indent-right' =>'icon-indent-right'),
			array('icon-liner' =>'icon-liner'),
			array('icon-list-bullets' =>'icon-list-bullets'),
			array('icon-list-numbers' =>'icon-list-numbers'),
			array('icon-marker' =>'icon-marker'),
			array('icon-newspaper' =>'icon-newspaper'),
			array('icon-nib-1' =>'icon-nib-1'),
			array('icon-nib-2' =>'icon-nib-2'),
			array('icon-note' =>'icon-note'),
			array('icon-notebook' =>'icon-notebook'),
			array('icon-office-archives' =>'icon-office-archives'),
			array('icon-paper-clamp' =>'icon-paper-clamp'),
			array('icon-papyrus' =>'icon-papyrus'),
			array('icon-paragraph-down' =>'icon-paragraph-down'),
			array('icon-paragraph-up' =>'icon-paragraph-up'),
			array('icon-paragraph' =>'icon-paragraph'),
			array('icon-pen-1' =>'icon-pen-1'),
			array('icon-pencil-1' =>'icon-pencil-1'),
			array('icon-pencil-2' =>'icon-pencil-2'),
			array('icon-quill-ink-pot' =>'icon-quill-ink-pot'),
			array('icon-quill' =>'icon-quill'),
			array('icon-quotes' =>'icon-quotes'),
			array('icon-research' =>'icon-research'),
			array('icon-spell-check' =>'icon-spell-check'),
			array('icon-strikethrough' =>'icon-strikethrough'),
			array('icon-text-box' =>'icon-text-box'),
			array('icon-text-color' =>'icon-text-color'),
			array('icon-text-input' =>'icon-text-input'),
			array('icon-text-italic' =>'icon-text-italic'),
			array('icon-text' =>'icon-text'),
			array('icon-translate' =>'icon-translate'),
			array('icon-underline' =>'icon-underline'),
			array('icon-user-manual-2' =>'icon-user-manual-2'),
			array('icon-user-manual' =>'icon-user-manual'),
			array('icon-write-2' =>'icon-write-2'),
			array('icon-write-3' =>'icon-write-3'),
			array('icon-write-off' =>'icon-write-off'),
			array('icon-write' =>'icon-write'),
			array('icon-add-notification' =>'icon-add-notification'),
			array('icon-add-tab' =>'icon-add-tab'),
			array('icon-airplane-mode-2' =>'icon-airplane-mode-2'),
			array('icon-airplane-mode' =>'icon-airplane-mode'),
			array('icon-align-bottom' =>'icon-align-bottom'),
			array('icon-align-left' =>'icon-align-left'),
			array('icon-align-right' =>'icon-align-right'),
			array('icon-allign-top' =>'icon-allign-top'),
			array('icon-backward' =>'icon-backward'),
			array('icon-ban' =>'icon-ban'),
			array('icon-brightness-high' =>'icon-brightness-high'),
			array('icon-brightness-low' =>'icon-brightness-low'),
			array('icon-cancel-circle' =>'icon-cancel-circle'),
			array('icon-cancel-square-2' =>'icon-cancel-square-2'),
			array('icon-check-all' =>'icon-check-all'),
			array('icon-check-circle-2' =>'icon-check-circle-2'),
			array('icon-check-circle' =>'icon-check-circle'),
			array('icon-check-square-2' =>'icon-check-square-2'),
			array('icon-check-square' =>'icon-check-square'),
			array('icon-check' =>'icon-check'),
			array('icon-close' =>'icon-close'),
			array('icon-config-1' =>'icon-config-1'),
			array('icon-config-2' =>'icon-config-2'),
			array('icon-contract-2' =>'icon-contract-2'),
			array('icon-contract-3' =>'icon-contract-3'),
			array('icon-contract-4' =>'icon-contract-4'),
			array('icon-contract' =>'icon-contract'),
			array('icon-cursor-click' =>'icon-cursor-click'),
			array('icon-cursor-double-click' =>'icon-cursor-double-click'),
			array('icon-cursor-select' =>'icon-cursor-select'),
			array('icon-cursor' =>'icon-cursor'),
			array('icon-door-lock' =>'icon-door-lock'),
			array('icon-double-tap' =>'icon-double-tap'),
			array('icon-download-1' =>'icon-download-1'),
			array('icon-download-2' =>'icon-download-2'),
			array('icon-drag-1' =>'icon-drag-1'),
			array('icon-drag' =>'icon-drag'),
			array('icon-edit-1' =>'icon-edit-1'),
			array('icon-edit-2' =>'icon-edit-2'),
			array('icon-edit-3' =>'icon-edit-3'),
			array('icon-expand-2' =>'icon-expand-2'),
			array('icon-expand-3' =>'icon-expand-3'),
			array('icon-expand-4' =>'icon-expand-4'),
			array('icon-expand-horizontal' =>'icon-expand-horizontal'),
			array('icon-expand-vertical' =>'icon-expand-vertical'),
			array('icon-expand' =>'icon-expand'),
			array('icon-eye-off' =>'icon-eye-off'),
			array('icon-eye' =>'icon-eye'),
			array('icon-fingerprint' =>'icon-fingerprint'),
			array('icon-flash-2' =>'icon-flash-2'),
			array('icon-flash-3' =>'icon-flash-3'),
			array('icon-flash-4' =>'icon-flash-4'),
			array('icon-flip-horizontal' =>'icon-flip-horizontal'),
			array('icon-flip-vertical' =>'icon-flip-vertical'),
			array('icon-forward' =>'icon-forward'),
			array('icon-grid-circles' =>'icon-grid-circles'),
			array('icon-grid-squares-2' =>'icon-grid-squares-2'),
			array('icon-grid-squares' =>'icon-grid-squares'),
			array('icon-hamburger-menu-1' =>'icon-hamburger-menu-1'),
			array('icon-hamburger-menu-2' =>'icon-hamburger-menu-2'),
			array('icon-hand' =>'icon-hand'),
			array('icon-help-1' =>'icon-help-1'),
			array('icon-help-2' =>'icon-help-2'),
			array('icon-home' =>'icon-home'),
			array('icon-info' =>'icon-info'),
			array('icon-inside' =>'icon-inside'),
			array('icon-key-1' =>'icon-key-1'),
			array('icon-key-2' =>'icon-key-2'),
			array('icon-label-cancel' =>'icon-label-cancel'),
			array('icon-label' =>'icon-label'),
			array('icon-layout-1' =>'icon-layout-1'),
			array('icon-layout-2' =>'icon-layout-2'),
			array('icon-layout-3' =>'icon-layout-3'),
			array('icon-list-1' =>'icon-list-1'),
			array('icon-list-2' =>'icon-list-2'),
			array('icon-list-3' =>'icon-list-3'),
			array('icon-list-4' =>'icon-list-4'),
			array('icon-lock' =>'icon-lock'),
			array('icon-loop' =>'icon-loop'),
			array('icon-magic-wand-1' =>'icon-magic-wand-1'),
			array('icon-magic-wand-2' =>'icon-magic-wand-2'),
			array('icon-magnet' =>'icon-magnet'),
			array('icon-magnifier-1' =>'icon-magnifier-1'),
			array('icon-magnifier-2' =>'icon-magnifier-2'),
			array('icon-maximize-left' =>'icon-maximize-left'),
			array('icon-maximize-right' =>'icon-maximize-right'),
			array('icon-menu-circle-grid' =>'icon-menu-circle-grid'),
			array('icon-minus-circle' =>'icon-minus-circle'),
			array('icon-minus-square' =>'icon-minus-square'),
			array('icon-more-circle' =>'icon-more-circle'),
			array('icon-more-circles-horizontal' =>'icon-more-circles-horizontal'),
			array('icon-more-circles-vertical' =>'icon-more-circles-vertical'),
			array('icon-more-squares-vertical-filled' =>'icon-more-squares-vertical-filled'),
			array('icon-more-squares-vertical' =>'icon-more-squares-vertical'),
			array('icon-notification-2' =>'icon-notification-2'),
			array('icon-notification-off' =>'icon-notification-off'),
			array('icon-notification-paused' =>'icon-notification-paused'),
			array('icon-notification' =>'icon-notification'),
			array('icon-outside' =>'icon-outside'),
			array('icon-paper-clip' =>'icon-paper-clip'),
			array('icon-paper-plane' =>'icon-paper-plane'),
			array('icon-pass' =>'icon-pass'),
			array('icon-phone-shake' =>'icon-phone-shake'),
			array('icon-pin-1' =>'icon-pin-1'),
			array('icon-pin-2' =>'icon-pin-2'),
			array('icon-pin-3' =>'icon-pin-3'),
			array('icon-pin-code' =>'icon-pin-code'),
			array('icon-plus-circle' =>'icon-plus-circle'),
			array('icon-plus-square' =>'icon-plus-square'),
			array('icon-plus' =>'icon-plus'),
			array('icon-pointer' =>'icon-pointer'),
			array('icon-power' =>'icon-power'),
			array('icon-press' =>'icon-press'),
			array('icon-question' =>'icon-question'),
			array('icon-refresh-2' =>'icon-refresh-2'),
			array('icon-refresh-warning' =>'icon-refresh-warning'),
			array('icon-refresh' =>'icon-refresh'),
			array('icon-reload-checked' =>'icon-reload-checked'),
			array('icon-reload' =>'icon-reload'),
			array('icon-remove-tab' =>'icon-remove-tab'),
			array('icon-rotate' =>'icon-rotate'),
			array('icon-scroll' =>'icon-scroll'),
			array('icon-search-history' =>'icon-search-history'),
			array('icon-settings-2' =>'icon-settings-2'),
			array('icon-settings' =>'icon-settings'),
			array('icon-Shape18' =>'icon-Shape18'),
			array('icon-share-1' =>'icon-share-1'),
			array('icon-share-2' =>'icon-share-2'),
			array('icon-share-3' =>'icon-share-3'),
			array('icon-share-4' =>'icon-share-4'),
			array('icon-spread' =>'icon-spread'),
			array('icon-swap-horizontal' =>'icon-swap-horizontal'),
			array('icon-swap-vertical' =>'icon-swap-vertical'),
			array('icon-swipe-down' =>'icon-swipe-down'),
			array('icon-swipe-left' =>'icon-swipe-left'),
			array('icon-swipe-right' =>'icon-swipe-right'),
			array('icon-swipe-up' =>'icon-swipe-up'),
			array('icon-switch-off' =>'icon-switch-off'),
			array('icon-switch-on' =>'icon-switch-on'),
			array('icon-switches-1' =>'icon-switches-1'),
			array('icon-switches-2' =>'icon-switches-2'),
			array('icon-tabs-2' =>'icon-tabs-2'),
			array('icon-tabs' =>'icon-tabs'),
			array('icon-tap' =>'icon-tap'),
			array('icon-touch' =>'icon-touch'),
			array('icon-trash-recycle' =>'icon-trash-recycle'),
			array('icon-trash' =>'icon-trash'),
			array('icon-unlocked' =>'icon-unlocked'),
			array('icon-upload-1' =>'icon-upload-1'),
			array('icon-upload-2' =>'icon-upload-2'),
			array('icon-warning-circle' =>'icon-warning-circle'),
			array('icon-warning-hexagon' =>'icon-warning-hexagon'),
			array('icon-warning-triangle' =>'icon-warning-triangle'),
			array('icon-zoom-in-1' =>'icon-zoom-in-1'),
			array('icon-zoom-in-2' =>'icon-zoom-in-2'),
			array('icon-zoom-out-1' =>'icon-zoom-out-1'),
			array('icon-zoom-out-2' =>'icon-zoom-out-2'),
			array('icon-file-aep' =>'icon-file-aep'),
			array('icon-file-ai' =>'icon-file-ai'),
			array('icon-file-apk' =>'icon-file-apk'),
			array('icon-file-archive' =>'icon-file-archive'),
			array('icon-file-audio' =>'icon-file-audio'),
			array('icon-file-avi' =>'icon-file-avi'),
			array('icon-file-backup' =>'icon-file-backup'),
			array('icon-file-bookmark' =>'icon-file-bookmark'),
			array('icon-file-cdr' =>'icon-file-cdr'),
			array('icon-file-clip' =>'icon-file-clip'),
			array('icon-file-code' =>'icon-file-code'),
			array('icon-file-copy' =>'icon-file-copy'),
			array('icon-file-corrupted' =>'icon-file-corrupted'),
			array('icon-file-css' =>'icon-file-css'),
			array('icon-file-delete' =>'icon-file-delete'),
			array('icon-file-dmg' =>'icon-file-dmg'),
			array('icon-file-doc' =>'icon-file-doc'),
			array('icon-file-download' =>'icon-file-download'),
			array('icon-file-edit' =>'icon-file-edit'),
			array('icon-file-eps' =>'icon-file-eps'),
			array('icon-file-error' =>'icon-file-error'),
			array('icon-file-exchange' =>'icon-file-exchange'),
			array('icon-file-exe' =>'icon-file-exe'),
			array('icon-file-export' =>'icon-file-export'),
			array('icon-file-flv' =>'icon-file-flv'),
			array('icon-file-gif' =>'icon-file-gif'),
			array('icon-file-ico' =>'icon-file-ico'),
			array('icon-file-image' =>'icon-file-image'),
			array('icon-file-import' =>'icon-file-import'),
			array('icon-file-info' =>'icon-file-info'),
			array('icon-file-jpg' =>'icon-file-jpg'),
			array('icon-file-linked' =>'icon-file-linked'),
			array('icon-file-load' =>'icon-file-load'),
			array('icon-file-locked' =>'icon-file-locked'),
			array('icon-file-mov' =>'icon-file-mov'),
			array('icon-file-mp3' =>'icon-file-mp3'),
			array('icon-file-mpg' =>'icon-file-mpg'),
			array('icon-file-new' =>'icon-file-new'),
			array('icon-file-otf' =>'icon-file-otf'),
			array('icon-file-pdf' =>'icon-file-pdf'),
			array('icon-file-png' =>'icon-file-png'),
			array('icon-file-psd' =>'icon-file-psd'),
			array('icon-file-rar' =>'icon-file-rar'),
			array('icon-file-raw' =>'icon-file-raw'),
			array('icon-file-remove' =>'icon-file-remove'),
			array('icon-file-search' =>'icon-file-search'),
			array('icon-file-settings' =>'icon-file-settings'),
			array('icon-file-share' =>'icon-file-share'),
			array('icon-file-star' =>'icon-file-star'),
			array('icon-file-svg' =>'icon-file-svg'),
			array('icon-file-sync' =>'icon-file-sync'),
			array('icon-file-table' =>'icon-file-table'),
			array('icon-file-text' =>'icon-file-text'),
			array('icon-file-tif' =>'icon-file-tif'),
			array('icon-file-ttf' =>'icon-file-ttf'),
			array('icon-file-txt' =>'icon-file-txt'),
			array('icon-file-upload' =>'icon-file-upload'),
			array('icon-file-vector' =>'icon-file-vector'),
			array('icon-file-video' =>'icon-file-video'),
			array('icon-file-warning' =>'icon-file-warning'),
			array('icon-file-xls' =>'icon-file-xls'),
			array('icon-file-xml' =>'icon-file-xml'),
			array('icon-file-zip' =>'icon-file-zip'),
			array('icon-file' =>'icon-file'),
			array('icon-files-2' =>'icon-files-2'),
			array('icon-files' =>'icon-files'),
			array('icon-folder-alert' =>'icon-folder-alert'),
			array('icon-folder-archive' =>'icon-folder-archive'),
			array('icon-folder-audio' =>'icon-folder-audio'),
			array('icon-folder-backup' =>'icon-folder-backup'),
			array('icon-folder-bookmark' =>'icon-folder-bookmark'),
			array('icon-folder-check' =>'icon-folder-check'),
			array('icon-folder-code' =>'icon-folder-code'),
			array('icon-folder-copy' =>'icon-folder-copy'),
			array('icon-folder-delete' =>'icon-folder-delete'),
			array('icon-folder-download' =>'icon-folder-download'),
			array('icon-folder-exchange' =>'icon-folder-exchange'),
			array('icon-folder-export' =>'icon-folder-export'),
			array('icon-folder-file' =>'icon-folder-file'),
			array('icon-folder-image' =>'icon-folder-image'),
			array('icon-folder-import' =>'icon-folder-import'),
			array('icon-folder-info' =>'icon-folder-info'),
			array('icon-folder-linked' =>'icon-folder-linked'),
			array('icon-folder-locked' =>'icon-folder-locked'),
			array('icon-folder-new' =>'icon-folder-new'),
			array('icon-folder-open' =>'icon-folder-open'),
			array('icon-folder-search' =>'icon-folder-search'),
			array('icon-folder-share' =>'icon-folder-share'),
			array('icon-folder-star' =>'icon-folder-star'),
			array('icon-folder-sync' =>'icon-folder-sync'),
			array('icon-folder-text' =>'icon-folder-text'),
			array('icon-folder-upload' =>'icon-folder-upload'),
			array('icon-folder-video' =>'icon-folder-video'),
			array('icon-folder' =>'icon-folder'),
			array('icon-alcohol' =>'icon-alcohol'),
			array('icon-apple-1' =>'icon-apple-1'),
			array('icon-apple-2' =>'icon-apple-2'),
			array('icon-apple-3' =>'icon-apple-3'),
			array('icon-avocado' =>'icon-avocado'),
			array('icon-banana' =>'icon-banana'),
			array('icon-barbecue' =>'icon-barbecue'),
			array('icon-beer-mug' =>'icon-beer-mug'),
			array('icon-beverage' =>'icon-beverage'),
			array('icon-blender' =>'icon-blender'),
			array('icon-bottle-beer' =>'icon-bottle-beer'),
			array('icon-bottle-milk' =>'icon-bottle-milk'),
			array('icon-bottle-wine' =>'icon-bottle-wine'),
			array('icon-bowl' =>'icon-bowl'),
			array('icon-bread-1' =>'icon-bread-1'),
			array('icon-bread-2' =>'icon-bread-2'),
			array('icon-butcher-knife' =>'icon-butcher-knife'),
			array('icon-cake' =>'icon-cake'),
			array('icon-candy' =>'icon-candy'),
			array('icon-capcake' =>'icon-capcake'),
			array('icon-carrot' =>'icon-carrot'),
			array('icon-champagne' =>'icon-champagne'),
			array('icon-checken' =>'icon-checken'),
			array('icon-cheese' =>'icon-cheese'),
			array('icon-chef-hat-1' =>'icon-chef-hat-1'),
			array('icon-chef-hat-2' =>'icon-chef-hat-2'),
			array('icon-chef-knife' =>'icon-chef-knife'),
			array('icon-cherry' =>'icon-cherry'),
			array('icon-coconut' =>'icon-coconut'),
			array('icon-coffee-bean' =>'icon-coffee-bean'),
			array('icon-coffee-cup' =>'icon-coffee-cup'),
			array('icon-coffee-machine' =>'icon-coffee-machine'),
			array('icon-coffee-mug' =>'icon-coffee-mug'),
			array('icon-cookie-1' =>'icon-cookie-1'),
			array('icon-cookie-2' =>'icon-cookie-2'),
			array('icon-cooking-pan' =>'icon-cooking-pan'),
			array('icon-cooking-pot' =>'icon-cooking-pot'),
			array('icon-cooking-timer-1' =>'icon-cooking-timer-1'),
			array('icon-cooking-timer-2' =>'icon-cooking-timer-2'),
			array('icon-cooking-timer-3' =>'icon-cooking-timer-3'),
			array('icon-cooking-timer-4' =>'icon-cooking-timer-4'),
			array('icon-cooking-timer-5' =>'icon-cooking-timer-5'),
			array('icon-cooking-timer-6' =>'icon-cooking-timer-6'),
			array('icon-cooking-timer-7' =>'icon-cooking-timer-7'),
			array('icon-cooking-timer-8' =>'icon-cooking-timer-8'),
			array('icon-corkscrew' =>'icon-corkscrew'),
			array('icon-croissant' =>'icon-croissant'),
			array('icon-egg' =>'icon-egg'),
			array('icon-fast-food' =>'icon-fast-food'),
			array('icon-fire' =>'icon-fire'),
			array('icon-fork-knife-1' =>'icon-fork-knife-1'),
			array('icon-fork-knife-2' =>'icon-fork-knife-2'),
			array('icon-fork-spoon-knife' =>'icon-fork-spoon-knife'),
			array('icon-fork-spoon' =>'icon-fork-spoon'),
			array('icon-fork' =>'icon-fork'),
			array('icon-fridge' =>'icon-fridge'),
			array('icon-fried-egg' =>'icon-fried-egg'),
			array('icon-fries' =>'icon-fries'),
			array('icon-glass-beer-1' =>'icon-glass-beer-1'),
			array('icon-glass-beer-2' =>'icon-glass-beer-2'),
			array('icon-glass-champagme-1' =>'icon-glass-champagme-1'),
			array('icon-glass-champagme-2' =>'icon-glass-champagme-2'),
			array('icon-glass-cocktail-1' =>'icon-glass-cocktail-1'),
			array('icon-glass-cocktail-2' =>'icon-glass-cocktail-2'),
			array('icon-glass-water' =>'icon-glass-water'),
			array('icon-glass-wine-1' =>'icon-glass-wine-1'),
			array('icon-glass-wine-2' =>'icon-glass-wine-2'),
			array('icon-glass-wine-3' =>'icon-glass-wine-3'),
			array('icon-grapes' =>'icon-grapes'),
			array('icon-grinder' =>'icon-grinder'),
			array('icon-hamburger' =>'icon-hamburger'),
			array('icon-ice-cream-1' =>'icon-ice-cream-1'),
			array('icon-ice-cream-2' =>'icon-ice-cream-2'),
			array('icon-ice-cream-3' =>'icon-ice-cream-3'),
			array('icon-jam-jar' =>'icon-jam-jar'),
			array('icon-kitchen-glove' =>'icon-kitchen-glove'),
			array('icon-kitchen-sclae' =>'icon-kitchen-sclae'),
			array('icon-knife' =>'icon-knife'),
			array('icon-ladle' =>'icon-ladle'),
			array('icon-lemon' =>'icon-lemon'),
			array('icon-lollipop-1' =>'icon-lollipop-1'),
			array('icon-lollipop-2' =>'icon-lollipop-2'),
			array('icon-meal-time' =>'icon-meal-time'),
			array('icon-meal' =>'icon-meal'),
			array('icon-microwave' =>'icon-microwave'),
			array('icon-mushroom' =>'icon-mushroom'),
			array('icon-pear-1' =>'icon-pear-1'),
			array('icon-pear-2' =>'icon-pear-2'),
			array('icon-pear-apple' =>'icon-pear-apple'),
			array('icon-pepper' =>'icon-pepper'),
			array('icon-pitcher' =>'icon-pitcher'),
			array('icon-pizza' =>'icon-pizza'),
			array('icon-pretzel' =>'icon-pretzel'),
			array('icon-recipe' =>'icon-recipe'),
			array('icon-sausage' =>'icon-sausage'),
			array('icon-shake' =>'icon-shake'),
			array('icon-skewer' =>'icon-skewer'),
			array('icon-spoon' =>'icon-spoon'),
			array('icon-strawberry' =>'icon-strawberry'),
			array('icon-sushi-1' =>'icon-sushi-1'),
			array('icon-sushi-2' =>'icon-sushi-2'),
			array('icon-tea-cup' =>'icon-tea-cup'),
			array('icon-tea-mug' =>'icon-tea-mug'),
			array('icon-teapot-1' =>'icon-teapot-1'),
			array('icon-teapot-2' =>'icon-teapot-2'),
			array('icon-togo-cup-1' =>'icon-togo-cup-1'),
			array('icon-water-can' =>'icon-water-can'),
			array('icon-watermelon' =>'icon-watermelon'),
			array('icon-K'=>'icon-K'),
			array('icon-album-2' =>'icon-album-2'),
			array('icon-album' =>'icon-album'),
			array('icon-albums' =>'icon-albums'),
			array('icon-aperture' =>'icon-aperture'),
			array('icon-aspect-ratio' =>'icon-aspect-ratio'),
			array('icon-audiobook-2' =>'icon-audiobook-2'),
			array('icon-audiobook' =>'icon-audiobook'),
			array('icon-boombox-1' =>'icon-boombox-1'),
			array('icon-boombox-2' =>'icon-boombox-2'),
			array('icon-camcorder' =>'icon-camcorder'),
			array('icon-camera-focus' =>'icon-camera-focus'),
			array('icon-camera-off' =>'icon-camera-off'),
			array('icon-camera-reverse' =>'icon-camera-reverse'),
			array('icon-camera-swap' =>'icon-camera-swap'),
			array('icon-camera-tripod' =>'icon-camera-tripod'),
			array('icon-camera' =>'icon-camera'),
			array('icon-cassette' =>'icon-cassette'),
			array('icon-CD' => 'icon-CD'),
			array('icon-clapperboard' =>'icon-clapperboard'),
			array('icon-closed-caption' =>'icon-closed-caption'),
			array('icon-director-chair' =>'icon-director-chair'),
			array('icon-earphones-1' =>'icon-earphones-1'),
			array('icon-earphones-2' =>'icon-earphones-2'),
			array('icon-earphones-3' =>'icon-earphones-3'),
			array('icon-eject-circle' =>'icon-eject-circle'),
			array('icon-eject' =>'icon-eject'),
			array('icon-end-circle' =>'icon-end-circle'),
			array('icon-end' =>'icon-end'),
			array('icon-exposure' =>'icon-exposure'),
			array('icon-external-flash' =>'icon-external-flash'),
			array('icon-film-1' =>'icon-film-1'),
			array('icon-film-l' =>'icon-film-l'),
			array('icon-film-reel' =>'icon-film-reel'),
			array('icon-flash-auto' =>'icon-flash-auto'),
			array('icon-flash-off' =>'icon-flash-off'),
			array('icon-flash' =>'icon-flash'),
			array('icon-forward-2' =>'icon-forward-2'),
			array('icon-forward-circle' =>'icon-forward-circle'),
			array('icon-frame' =>'icon-frame'),
			array('icon-HD' =>'icon-HD'),
			array('icon-headphones-1' =>'icon-headphones-1'),
			array('icon-headphones-2' =>'icon-headphones-2'),
			array('icon-loop-1' =>'icon-loop-1'),
			array('icon-loop-2' =>'icon-loop-2'),
			array('icon-loop-all' =>'icon-loop-all'),
			array('icon-macro' =>'icon-macro'),
			array('icon-media-player' =>'icon-media-player'),
			array('icon-mic-2' =>'icon-mic-2'),
			array('icon-microphone-off' =>'icon-microphone-off'),
			array('icon-microphone' =>'icon-microphone'),
			array('icon-moviecamera' =>'icon-moviecamera'),
			array('icon-music-tone-1-off' =>'icon-music-tone-1-off'),
			array('icon-music-tone-1' =>'icon-music-tone-1'),
			array('icon-music-tone-2-off' =>'icon-music-tone-2-off'),
			array('icon-music-tone-2' =>'icon-music-tone-2'),
			array('icon-mute' =>'icon-mute'),
			array('icon-panorama' =>'icon-panorama'),
			array('icon-pause-circle' =>'icon-pause-circle'),
			array('icon-pause' =>'icon-pause'),
			array('icon-photo-add' =>'icon-photo-add'),
			array('icon-photo-album' =>'icon-photo-album'),
			array('icon-photo' =>'icon-photo'),
			array('icon-photos' =>'icon-photos'),
			array('icon-play-circle' =>'icon-play-circle'),
			array('icon-play' =>'icon-play'),
			array('icon-playlist-1' =>'icon-playlist-1'),
			array('icon-playlist-add' =>'icon-playlist-add'),
			array('icon-playlist-audio' =>'icon-playlist-audio'),
			array('icon-playlist-video' =>'icon-playlist-video'),
			array('icon-podcast' =>'icon-podcast'),
			array('icon-rec-circle' =>'icon-rec-circle'),
			array('icon-retro-camera' =>'icon-retro-camera'),
			array('icon-rewind-circle' =>'icon-rewind-circle'),
			array('icon-rewind' =>'icon-rewind'),
			array('icon-rotate-left' =>'icon-rotate-left'),
			array('icon-rotate-right' =>'icon-rotate-right'),
			array('icon-SD' => 'icon-SD'),
			array('icon-shuffle' =>'icon-shuffle'),
			array('icon-slideshow-1' =>'icon-slideshow-1'),
			array('icon-slideshow-2' =>'icon-slideshow-2'),
			array('icon-soundwave' =>'icon-soundwave'),
			array('icon-speaker-1' =>'icon-speaker-1'),
			array('icon-speaker-2' =>'icon-speaker-2'),
			array('icon-start-circle' =>'icon-start-circle'),
			array('icon-start' =>'icon-start'),
			array('icon-stereo-1' =>'icon-stereo-1'),
			array('icon-stereo-2' =>'icon-stereo-2'),
			array('icon-stop-circle' =>'icon-stop-circle'),
			array('icon-stop' =>'icon-stop'),
			array('icon-turntable' =>'icon-turntable'),
			array('icon-video-camera-2' =>'icon-video-camera-2'),
			array('icon-video-camera-off' =>'icon-video-camera-off'),
			array('icon-video-camera' =>'icon-video-camera'),
			array('icon-volume-1' =>'icon-volume-1'),
			array('icon-volume-2' =>'icon-volume-2'),
			array('icon-volume-off' =>'icon-volume-off'),
			array('icon-vumeter' =>'icon-vumeter'),
			array('icon-7-support-1' =>'icon-7-support-1'),
			array('icon-7-support-2' =>'icon-7-support-2'),
			array('icon-h-calls' =>'icon-h-calls'),
			array('icon-ATM-1' =>'icon-ATM-1'),
			array('icon-ATM-2' =>'icon-ATM-2'),
			array('icon-balance' =>'icon-balance'),
			array('icon-bank' =>'icon-bank'),
			array('icon-banknote-1' =>'icon-banknote-1'),
			array('icon-banknote-2' =>'icon-banknote-2'),
			array('icon-banknote-coins' =>'icon-banknote-coins'),
			array('icon-banknotes-1' =>'icon-banknotes-1'),
			array('icon-banknotes-2' =>'icon-banknotes-2'),
			array('icon-bar-chart-board' =>'icon-bar-chart-board'),
			array('icon-bar-chart-down' =>'icon-bar-chart-down'),
			array('icon-bar-chart-search' =>'icon-bar-chart-search'),
			array('icon-bar-chart-stats-down' =>'icon-bar-chart-stats-down'),
			array('icon-bar-chart-stats-up' =>'icon-bar-chart-stats-up'),
			array('icon-bar-chart-up' =>'icon-bar-chart-up'),
			array('icon-bar-chart' =>'icon-bar-chart'),
			array('icon-bill-1' =>'icon-bill-1'),
			array('icon-bill-2' =>'icon-bill-2'),
			array('icon-bitcoin' =>'icon-bitcoin'),
			array('icon-briefcase' =>'icon-briefcase'),
			array('icon-btcoin-circle' =>'icon-btcoin-circle'),
			array('icon-calculator' =>'icon-calculator'),
			array('icon-calendar-money' =>'icon-calendar-money'),
			array('icon-cent-circle' =>'icon-cent-circle'),
			array('icon-cent' =>'icon-cent'),
			array('icon-coins-1' =>'icon-coins-1'),
			array('icon-coins-2' =>'icon-coins-2'),
			array('icon-coins-3' =>'icon-coins-3'),
			array('icon-coins-4' =>'icon-coins-4'),
			array('icon-credit-card-2' =>'icon-credit-card-2'),
			array('icon-credit-card' =>'icon-credit-card'),
			array('icon-currency-exchange' =>'icon-currency-exchange'),
			array('icon-donut-chart-1' =>'icon-donut-chart-1'),
			array('icon-donut-chart-2' =>'icon-donut-chart-2'),
			array('icon-EUR-circle' =>'icon-EUR-circle'),
			array('icon-EUR' =>'icon-EUR'),
			array('icon-GBP-circle' =>'icon-GBP-circle'),
			array('icon-GBP' =>'icon-GBP'),
			array('icon-gold-1' =>'icon-gold-1'),
			array('icon-gold-2' =>'icon-gold-2'),
			array('icon-graph-2' =>'icon-graph-2'),
			array('icon-graph-chart-board-down' =>'icon-graph-chart-board-down'),
			array('icon-graph-chart-board-up' =>'icon-graph-chart-board-up'),
			array('icon-graph-chart-board' =>'icon-graph-chart-board'),
			array('icon-graph-down' =>'icon-graph-down'),
			array('icon-graph-money' =>'icon-graph-money'),
			array('icon-graph-up' =>'icon-graph-up'),
			array('icon-graph' =>'icon-graph'),
			array('icon-hand-banknote' =>'icon-hand-banknote'),
			array('icon-hand-banknotes' =>'icon-hand-banknotes'),
			array('icon-hand-bill-1' =>'icon-hand-bill-1'),
			array('icon-hand-bill-2' =>'icon-hand-bill-2'),
			array('icon-hand-coin' =>'icon-hand-coin'),
			array('icon-hand-coins' =>'icon-hand-coins'),
			array('icon-hand-credit-card' =>'icon-hand-credit-card'),
			array('icon-JPY-circle' =>'icon-JPY-circle'),
			array('icon-JPY' =>'icon-JPY'),
			array('icon-money-bag-coins' =>'icon-money-bag-coins'),
			array('icon-money-bag' =>'icon-money-bag'),
			array('icon-money-bubble' =>'icon-money-bubble'),
			array('icon-money-hierarchy' =>'icon-money-hierarchy'),
			array('icon-networking' =>'icon-networking'),
			array('icon-pie-chart-1' =>'icon-pie-chart-1'),
			array('icon-pie-chart-2' =>'icon-pie-chart-2'),
			array('icon-pie-chart-3' =>'icon-pie-chart-3'),
			array('icon-pie-chart-board' =>'icon-pie-chart-board'),
			array('icon-piggy-bank' =>'icon-piggy-bank'),
			array('icon-presentation' =>'icon-presentation'),
			array('icon-safe' =>'icon-safe'),
			array('icon-search-money' =>'icon-search-money'),
			array('icon-search-stats-1' =>'icon-search-stats-1'),
			array('icon-send-money' =>'icon-send-money'),
			array('icon-shacking-hands' =>'icon-shacking-hands'),
			array('icon-stamp' =>'icon-stamp'),
			array('icon-support' =>'icon-support'),
			array('icon-target-1' =>'icon-target-1'),
			array('icon-target-2' =>'icon-target-2'),
			array('icon-target-3' =>'icon-target-3'),
			array('icon-target-4' =>'icon-target-4'),
			array('icon-target-money' =>'icon-target-money'),
			array('icon-tasks-1' =>'icon-tasks-1'),
			array('icon-tasks-2' =>'icon-tasks-2'),
			array('icon-tasks-3' =>'icon-tasks-3'),
			array('icon-tasks-checked' =>'icon-tasks-checked'),
			array('icon-tie' =>'icon-tie'),
			array('icon-time-money' =>'icon-time-money'),
			array('icon-USD-circle' =>'icon-USD-circle'),
			array('icon-USD' =>'icon-USD'),
			array('icon-voucher' =>'icon-voucher'),
			array('icon-workflow' =>'icon-workflow'),
			array('icon-write-check' =>'icon-write-check'),
			array('icon-airplay' =>'icon-airplay'),
			array('icon-antena-1' =>'icon-antena-1'),
			array('icon-antena-2' =>'icon-antena-2'),
			array('icon-antena-3' =>'icon-antena-3'),
			array('icon-bluetooth' =>'icon-bluetooth'),
			array('icon-broadcast' =>'icon-broadcast'),
			array('icon-cloud-backup' =>'icon-cloud-backup'),
			array('icon-cloud-check' =>'icon-cloud-check'),
			array('icon-cloud-download' =>'icon-cloud-download'),
			array('icon-cloud-edit' =>'icon-cloud-edit'),
			array('icon-cloud-error-2' =>'icon-cloud-error-2'),
			array('icon-cloud-error' =>'icon-cloud-error'),
			array('icon-cloud-help' =>'icon-cloud-help'),
			array('icon-cloud-hosting' =>'icon-cloud-hosting'),
			array('icon-cloud-locked' =>'icon-cloud-locked'),
			array('icon-cloud-minus' =>'icon-cloud-minus'),
			array('icon-cloud-music' =>'icon-cloud-music'),
			array('icon-cloud-off' =>'icon-cloud-off'),
			array('icon-cloud-plus' =>'icon-cloud-plus'),
			array('icon-cloud-search' =>'icon-cloud-search'),
			array('icon-cloud-settings' =>'icon-cloud-settings'),
			array('icon-cloud-share' =>'icon-cloud-share'),
			array('icon-cloud-sync' =>'icon-cloud-sync'),
			array('icon-cloud-upload' =>'icon-cloud-upload'),
			array('icon-cloud' =>'icon-cloud'),
			array('icon-database-backup' =>'icon-database-backup'),
			array('icon-database-check' =>'icon-database-check'),
			array('icon-database-edit' =>'icon-database-edit'),
			array('icon-database-error' =>'icon-database-error'),
			array('icon-database-firewall' =>'icon-database-firewall'),
			array('icon-database-locked' =>'icon-database-locked'),
			array('icon-database-plus' =>'icon-database-plus'),
			array('icon-database-refresh' =>'icon-database-refresh'),
			array('icon-database-remove' =>'icon-database-remove'),
			array('icon-database-search' =>'icon-database-search'),
			array('icon-database-settings' =>'icon-database-settings'),
			array('icon-database' =>'icon-database'),
			array('icon-internet-block' =>'icon-internet-block'),
			array('icon-internet-location' =>'icon-internet-location'),
			array('icon-internet-lock' =>'icon-internet-lock'),
			array('icon-internet-refresh' =>'icon-internet-refresh'),
			array('icon-internet-search' =>'icon-internet-search'),
			array('icon-internet-settings' =>'icon-internet-settings'),
			array('icon-internet-time' =>'icon-internet-time'),
			array('icon-internet' =>'icon-internet'),
			array('icon-mobile-hotspot' =>'icon-mobile-hotspot'),
			array('icon-network-desktop' =>'icon-network-desktop'),
			array('icon-network-laptop' =>'icon-network-laptop'),
			array('icon-network-smartphone' =>'icon-network-smartphone'),
			array('icon-network' =>'icon-network'),
			array('icon-satelite-signal' =>'icon-satelite-signal'),
			array('icon-satelite' =>'icon-satelite'),
			array('icon-server-backup' =>'icon-server-backup'),
			array('icon-server-check' =>'icon-server-check'),
			array('icon-server-edit' =>'icon-server-edit'),
			array('icon-server-error' =>'icon-server-error'),
			array('icon-server-firewall' =>'icon-server-firewall'),
			array('icon-server-locked' =>'icon-server-locked'),
			array('icon-server-plus' =>'icon-server-plus'),
			array('icon-server-refresh' =>'icon-server-refresh'),
			array('icon-server-remove' =>'icon-server-remove'),
			array('icon-server-search' =>'icon-server-search'),
			array('icon-server-settings' =>'icon-server-settings'),
			array('icon-server' =>'icon-server'),
			array('icon-signal-1' =>'icon-signal-1'),
			array('icon-signal-2' =>'icon-signal-2'),
			array('icon-signal-4' =>'icon-signal-4'),
			array('icon-usb-1' =>'icon-usb-1'),
			array('icon-usb-2' =>'icon-usb-2'),
			array('icon-wifi-locked' =>'icon-wifi-locked'),
			array('icon-wifi-tethering-off' =>'icon-wifi-tethering-off'),
			array('icon-wifi-tethering' =>'icon-wifi-tethering'),
			array('icon-wifi' =>'icon-wifi'),
			array('icon-D-glasses' =>'icon-D-glasses'),
			array('icon-armchair' =>'icon-armchair'),
			array('icon-balloons' =>'icon-balloons'),
			array('icon-baseball-1' =>'icon-baseball-1'),
			array('icon-baseball-2' =>'icon-baseball-2'),
			array('icon-basketball-2' =>'icon-basketball-2'),
			array('icon-basketball' =>'icon-basketball'),
			array('icon-binoculars' =>'icon-binoculars'),
			array('icon-bow-arrow' =>'icon-bow-arrow'),
			array('icon-bowling-1' =>'icon-bowling-1'),
			array('icon-bowling-2' =>'icon-bowling-2'),
			array('icon-chess-1' =>'icon-chess-1'),
			array('icon-chess-2' =>'icon-chess-2'),
			array('icon-couch' =>'icon-couch'),
			array('icon-cutter' =>'icon-cutter'),
			array('icon-diamond-1' =>'icon-diamond-1'),
			array('icon-diamond-2' =>'icon-diamond-2'),
			array('icon-diamond-ring' =>'icon-diamond-ring'),
			array('icon-do-not-disturb' =>'icon-do-not-disturb'),
			array('icon-dress' =>'icon-dress'),
			array('icon-duck-toy' =>'icon-duck-toy'),
			array('icon-fireworks' =>'icon-fireworks'),
			array('icon-fishing' =>'icon-fishing'),
			array('icon-fitness' =>'icon-fitness'),
			array('icon-flashlight' =>'icon-flashlight'),
			array('icon-football' =>'icon-football'),
			array('icon-funnel' =>'icon-funnel'),
			array('icon-gift' =>'icon-gift'),
			array('icon-golf' =>'icon-golf'),
			array('icon-guitar' =>'icon-guitar'),
			array('icon-hammer' =>'icon-hammer'),
			array('icon-hanger-1' =>'icon-hanger-1'),
			array('icon-hanger-2' =>'icon-hanger-2'),
			array('icon-hat-1' =>'icon-hat-1'),
			array('icon-hat-2' =>'icon-hat-2'),
			array('icon-hipster-glasses' =>'icon-hipster-glasses'),
			array('icon-iron' =>'icon-iron'),
			array('icon-kg'=>'icon-kg'),
			array('icon-kite' =>'icon-kite'),
			array('icon-lamp-1' =>'icon-lamp-1'),
			array('icon-lamp-2' =>'icon-lamp-2'),
			array('icon-lego-1' =>'icon-lego-1'),
			array('icon-lego-2' =>'icon-lego-2'),
			array('icon-magic-wand-3' =>'icon-magic-wand-3'),
			array('icon-magic-wand-4' =>'icon-magic-wand-4'),
			array('icon-origami-1' =>'icon-origami-1'),
			array('icon-origami-2' =>'icon-origami-2'),
			array('icon-pants' =>'icon-pants'),
			array('icon-pingpong' =>'icon-pingpong'),
			array('icon-pool' =>'icon-pool'),
			array('icon-puzzle' =>'icon-puzzle'),
			array('icon-razor' =>'icon-razor'),
			array('icon-ribbon-bow' =>'icon-ribbon-bow'),
			array('icon-safety-pin' =>'icon-safety-pin'),
			array('icon-saw' =>'icon-saw'),
			array('icon-screwdriver' =>'icon-screwdriver'),
			array('icon-scuba' =>'icon-scuba'),
			array('icon-shirt' =>'icon-shirt'),
			array('icon-shoes' =>'icon-shoes'),
			array('icon-shovel' =>'icon-shovel'),
			array('icon-soccer-shoe' =>'icon-soccer-shoe'),
			array('icon-soccer' =>'icon-soccer'),
			array('icon-swimsuit' =>'icon-swimsuit'),
			array('icon-swiss-knife' =>'icon-swiss-knife'),
			array('icon-t-shirt' =>'icon-t-shirt'),
			array('icon-umbrella-open' =>'icon-umbrella-open'),
			array('icon-underwear' =>'icon-underwear'),
			array('icon-volleyball' =>'icon-volleyball'),
			array('icon-watering-can' =>'icon-watering-can'),
			array('icon-wedding-rings' =>'icon-wedding-rings'),
			array('icon-whistle' =>'icon-whistle'),
			array('icon-wrench-1' =>'icon-wrench-1'),
			array('icon-wrench-2' =>'icon-wrench-2'),
			array('icon-wrench-3' =>'icon-wrench-3'),
			array('icon-wrench-hammer' =>'icon-wrench-hammer'),
			array('icon-wrench-screwdriver-1' =>'icon-wrench-screwdriver-1'),
			array('icon-wrench-screwdriver-2' =>'icon-wrench-screwdriver-2'),
			array('icon-gag' =>'icon-gag'),
			array('icon-px'=>'icon-px'),
			array('icon-after-effects' =>'icon-after-effects'),
			array('icon-aim' =>'icon-aim'),
			array('icon-airbnb' =>'icon-airbnb'),
			array('icon-amazon' =>'icon-amazon'),
			array('icon-android' =>'icon-android'),
			array('icon-apple' =>'icon-apple'),
			array('icon-audition' =>'icon-audition'),
			array('icon-bebo' =>'icon-bebo'),
			array('icon-behance' =>'icon-behance'),
			array('icon-blogger' =>'icon-blogger'),
			array('icon-bridge' =>'icon-bridge'),
			array('icon-chrome' =>'icon-chrome'),
			array('icon-codepen' =>'icon-codepen'),
			array('icon-creativecloud' =>'icon-creativecloud'),
			array('icon-creativemarket' =>'icon-creativemarket'),
			array('icon-delicious' =>'icon-delicious'),
			array('icon-deviantart' =>'icon-deviantart'),
			array('icon-digg' =>'icon-digg'),
			array('icon-dreamweaver' =>'icon-dreamweaver'),
			array('icon-dribbble' =>'icon-dribbble'),
			array('icon-drive' =>'icon-drive'),
			array('icon-dropbox' =>'icon-dropbox'),
			array('icon-envato' =>'icon-envato'),
			array('icon-facebook-messanger' =>'icon-facebook-messanger'),
			array('icon-facebook' =>'icon-facebook'),
			array('icon-finder' =>'icon-finder'),
			array('icon-firefox' =>'icon-firefox'),
			array('icon-flash2' =>'icon-flash2'),
			array('icon-flicr' =>'icon-flicr'),
			array('icon-forrst' =>'icon-forrst'),
			array('icon-foursquare' =>'icon-foursquare'),
			array('icon-git' =>'icon-git'),
			array('icon-google-play-1' =>'icon-google-play-1'),
			array('icon-google-play-2' =>'icon-google-play-2'),
			array('icon-google-plus' =>'icon-google-plus'),
			array('icon-hangouts' =>'icon-hangouts'),
			array('icon-illustrator' =>'icon-illustrator'),
			array('icon-inbox2' =>'icon-inbox2'),
			array('icon-indesign' =>'icon-indesign'),
			array('icon-inspect' =>'icon-inspect'),
			array('icon-instagram' =>'icon-instagram'),
			array('icon-kickstarter' =>'icon-kickstarter'),
			array('icon-lastfm' =>'icon-lastfm'),
			array('icon-linkedin' =>'icon-linkedin'),
			array('icon-opera' =>'icon-opera'),
			array('icon-osx' =>'icon-osx'),
			array('icon-paypal' =>'icon-paypal'),
			array('icon-penterest' =>'icon-penterest'),
			array('icon-photoshop' =>'icon-photoshop'),
			array('icon-picasa' =>'icon-picasa'),
			array('icon-prelude' =>'icon-prelude'),
			array('icon-premiere-pro' =>'icon-premiere-pro'),
			array('icon-rdio' =>'icon-rdio'),
			array('icon-reddit' =>'icon-reddit'),
			array('icon-rss' =>'icon-rss'),
			array('icon-safari' =>'icon-safari'),
			array('icon-skype' =>'icon-skype'),
			array('icon-soundcloud' =>'icon-soundcloud'),
			array('icon-spotify' =>'icon-spotify'),
			array('icon-squarespace' =>'icon-squarespace'),
			array('icon-stumble-upon' =>'icon-stumble-upon'),
			array('icon-tumblr' =>'icon-tumblr'),
			array('icon-twitter' =>'icon-twitter'),
			array('icon-vimeo-1' =>'icon-vimeo-1'),
			array('icon-vimeo-2' =>'icon-vimeo-2'),
			array('icon-vk' =>'icon-vk'),
			array('icon-watsup' =>'icon-watsup'),
			array('icon-wikipedia' =>'icon-wikipedia'),
			array('icon-windows' =>'icon-windows'),
			array('icon-wordpress' =>'icon-wordpress'),
			array('icon-xing' =>'icon-xing'),
			array('icon-yahoo' =>'icon-yahoo'),
			array('icon-youtube' =>'icon-youtube'),
			array('icon-zerply' =>'icon-zerply'),
			array('icon-alarm-add' =>'icon-alarm-add'),
			array('icon-alarm-off' =>'icon-alarm-off'),
			array('icon-alarm-on' =>'icon-alarm-on'),
			array('icon-alarm' =>'icon-alarm'),
			array('icon-calendar-2' =>'icon-calendar-2'),
			array('icon-calendar-check' =>'icon-calendar-check'),
			array('icon-calendar-date-2' =>'icon-calendar-date-2'),
			array('icon-calendar-date' =>'icon-calendar-date'),
			array('icon-calendar-time' =>'icon-calendar-time'),
			array('icon-calendar' =>'icon-calendar'),
			array('icon-clock-2' =>'icon-clock-2'),
			array('icon-clock' =>'icon-clock'),
			array('icon-compass-2' =>'icon-compass-2'),
			array('icon-compass' =>'icon-compass'),
			array('icon-direction' =>'icon-direction'),
			array('icon-directions-1' =>'icon-directions-1'),
			array('icon-directions-2' =>'icon-directions-2'),
			array('icon-distance-1' =>'icon-distance-1'),
			array('icon-distance-2' =>'icon-distance-2'),
			array('icon-fast-delivery' =>'icon-fast-delivery'),
			array('icon-gps-location' =>'icon-gps-location'),
			array('icon-history' =>'icon-history'),
			array('icon-hourglass-1' =>'icon-hourglass-1'),
			array('icon-hourglass-2' =>'icon-hourglass-2'),
			array('icon-hourglass-reverse' =>'icon-hourglass-reverse'),
			array('icon-infinite-loop' =>'icon-infinite-loop'),
			array('icon-infinite' =>'icon-infinite'),
			array('icon-location-1-off' =>'icon-location-1-off'),
			array('icon-location-1-on' =>'icon-location-1-on'),
			array('icon-location-1-search' =>'icon-location-1-search'),
			array('icon-location-2-add' =>'icon-location-2-add'),
			array('icon-location-2-check' =>'icon-location-2-check'),
			array('icon-location-2-delete' =>'icon-location-2-delete'),
			array('icon-location-2-off' =>'icon-location-2-off'),
			array('icon-location-2-remove' =>'icon-location-2-remove'),
			array('icon-location-2' =>'icon-location-2'),
			array('icon-location-3' =>'icon-location-3'),
			array('icon-location-4' =>'icon-location-4'),
			array('icon-map-2' =>'icon-map-2'),
			array('icon-map-location-1' =>'icon-map-location-1'),
			array('icon-map-location-2' =>'icon-map-location-2'),
			array('icon-map-location-3' =>'icon-map-location-3'),
			array('icon-map-location-4' =>'icon-map-location-4'),
			array('icon-map-timezone' =>'icon-map-timezone'),
			array('icon-map' =>'icon-map'),
			array('icon-navigation-1' =>'icon-navigation-1'),
			array('icon-navigation-2' =>'icon-navigation-2'),
			array('icon-phone-location' =>'icon-phone-location'),
			array('icon-street-location' =>'icon-street-location'),
			array('icon-street-view' =>'icon-street-view'),
			array('icon-timer-1' =>'icon-timer-1'),
			array('icon-timer-2' =>'icon-timer-2'),
			array('icon-wind-direction' =>'icon-wind-direction'),
			array('icon-wrist-watch' =>'icon-wrist-watch'),
			array('icon-anchor' =>'icon-anchor'),
			array('icon-bicycle' =>'icon-bicycle'),
			array('icon-bicycling' =>'icon-bicycling'),
			array('icon-boat-1' =>'icon-boat-1'),
			array('icon-boat-2' =>'icon-boat-2'),
			array('icon-bus-wifi' =>'icon-bus-wifi'),
			array('icon-bus' =>'icon-bus'),
			array('icon-cable-ski' =>'icon-cable-ski'),
			array('icon-car-2' =>'icon-car-2'),
			array('icon-car-battery' =>'icon-car-battery'),
			array('icon-car-key' =>'icon-car-key'),
			array('icon-car-parking' =>'icon-car-parking'),
			array('icon-car-service' =>'icon-car-service'),
			array('icon-car-wash' =>'icon-car-wash'),
			array('icon-car-wifi' =>'icon-car-wifi'),
			array('icon-car' =>'icon-car'),
			array('icon-cog' =>'icon-cog'),
			array('icon-construction-barricade' =>'icon-construction-barricade'),
			array('icon-construction-cone' =>'icon-construction-cone'),
			array('icon-directions' =>'icon-directions'),
			array('icon-elevator-1' =>'icon-elevator-1'),
			array('icon-elevator-2' =>'icon-elevator-2'),
			array('icon-escalator-down' =>'icon-escalator-down'),
			array('icon-escalator-up' =>'icon-escalator-up'),
			array('icon-flight-land' =>'icon-flight-land'),
			array('icon-flight-takeoff' =>'icon-flight-takeoff'),
			array('icon-forklift' =>'icon-forklift'),
			array('icon-fuel' =>'icon-fuel'),
			array('icon-garage' =>'icon-garage'),
			array('icon-gas-station' =>'icon-gas-station'),
			array('icon-gearbox' =>'icon-gearbox'),
			array('icon-helicopter' =>'icon-helicopter'),
			array('icon-helmet-1' =>'icon-helmet-1'),
			array('icon-helmet-2' =>'icon-helmet-2'),
			array('icon-kids-scooter' =>'icon-kids-scooter'),
			array('icon-motorcycle' =>'icon-motorcycle'),
			array('icon-off-roader' =>'icon-off-roader'),
			array('icon-pickup-truck' =>'icon-pickup-truck'),
			array('icon-racing-flag' =>'icon-racing-flag'),
			array('icon-road' =>'icon-road'),
			array('icon-rudder' =>'icon-rudder'),
			array('icon-scooter' =>'icon-scooter'),
			array('icon-ship' =>'icon-ship'),
			array('icon-speedometer' =>'icon-speedometer'),
			array('icon-stairs-down' =>'icon-stairs-down'),
			array('icon-stairs-up' =>'icon-stairs-up'),
			array('icon-supercar' =>'icon-supercar'),
			array('icon-taxi-1' =>'icon-taxi-1'),
			array('icon-taxi-2' =>'icon-taxi-2'),
			array('icon-tractor' =>'icon-tractor'),
			array('icon-traffic-light' =>'icon-traffic-light'),
			array('icon-trailer' =>'icon-trailer'),
			array('icon-train-1' =>'icon-train-1'),
			array('icon-train-2' =>'icon-train-2'),
			array('icon-train-wifi' =>'icon-train-wifi'),
			array('icon-tram' =>'icon-tram'),
			array('icon-truck' =>'icon-truck'),
			array('icon-van' =>'icon-van'),
			array('icon-wagon' =>'icon-wagon'),
			array('icon-aids' =>'icon-aids'),
			array('icon-ambulance' =>'icon-ambulance'),
			array('icon-bandage-1' =>'icon-bandage-1'),
			array('icon-bandage-2' =>'icon-bandage-2'),
			array('icon-blood-1' =>'icon-blood-1'),
			array('icon-blood-2' =>'icon-blood-2'),
			array('icon-brain' =>'icon-brain'),
			array('icon-cardio' =>'icon-cardio'),
			array('icon-cross-circle' =>'icon-cross-circle'),
			array('icon-cross-rectangle' =>'icon-cross-rectangle'),
			array('icon-DNA' =>'icon-DNA'),
			array('icon-drugs' =>'icon-drugs'),
			array('icon-emergency-call' =>'icon-emergency-call'),
			array('icon-emergency' =>'icon-emergency'),
			array('icon-first-aid' =>'icon-first-aid'),
			array('icon-fitness-app' =>'icon-fitness-app'),
			array('icon-handicap' =>'icon-handicap'),
			array('icon-healthcare' =>'icon-healthcare'),
			array('icon-heart-beat' =>'icon-heart-beat'),
			array('icon-hospital-building' =>'icon-hospital-building'),
			array('icon-hospital-circle' =>'icon-hospital-circle'),
			array('icon-hospital-home' =>'icon-hospital-home'),
			array('icon-hospital-square' =>'icon-hospital-square'),
			array('icon-medical-book' =>'icon-medical-book'),
			array('icon-medical-folder' =>'icon-medical-folder'),
			array('icon-medical-tests' =>'icon-medical-tests'),
			array('icon-microscope' =>'icon-microscope'),
			array('icon-ointment' =>'icon-ointment'),
			array('icon-paramedic' =>'icon-paramedic'),
			array('icon-pharmacy' =>'icon-pharmacy'),
			array('icon-pill-2' =>'icon-pill-2'),
			array('icon-pill-3' =>'icon-pill-3'),
			array('icon-pill' =>'icon-pill'),
			array('icon-pulse' =>'icon-pulse'),
			array('icon-spermatosoid' =>'icon-spermatosoid'),
			array('icon-stethoscope' =>'icon-stethoscope'),
			array('icon-stretcher' =>'icon-stretcher'),
			array('icon-surgical-knife' =>'icon-surgical-knife'),
			array('icon-surgical-scissors' =>'icon-surgical-scissors'),
			array('icon-syringe' =>'icon-syringe'),
			array('icon-teeth-care' =>'icon-teeth-care'),
			array('icon-test-tube-2' =>'icon-test-tube-2'),
			array('icon-test-tube' =>'icon-test-tube'),
			array('icon-thermometer-1' =>'icon-thermometer-1'),
			array('icon-toilet-paper' =>'icon-toilet-paper'),
			array('icon-tooth' =>'icon-tooth'),
			array('icon-weight' =>'icon-weight'),
			array('icon-alien' =>'icon-alien'),
			array('icon-biohazard' =>'icon-biohazard'),
			array('icon-bird' =>'icon-bird'),
			array('icon-birdhouse' =>'icon-birdhouse'),
			array('icon-butterfly' =>'icon-butterfly'),
			array('icon-casino-chip' =>'icon-casino-chip'),
			array('icon-coffin' =>'icon-coffin'),
			array('icon-controller-1' =>'icon-controller-1'),
			array('icon-controller-2' =>'icon-controller-2'),
			array('icon-controller-3' =>'icon-controller-3'),
			array('icon-crossed-bones' =>'icon-crossed-bones'),
			array('icon-day-night' =>'icon-day-night'),
			array('icon-death' =>'icon-death'),
			array('icon-dice' =>'icon-dice'),
			array('icon-dream-house' =>'icon-dream-house'),
			array('icon-eco-house' =>'icon-eco-house'),
			array('icon-emoticon-grin' =>'icon-emoticon-grin'),
			array('icon-emoticon-smile' =>'icon-emoticon-smile'),
			array('icon-emoticon' =>'icon-emoticon'),
			array('icon-exit' =>'icon-exit'),
			array('icon-fence' =>'icon-fence'),
			array('icon-fir-tree-1' =>'icon-fir-tree-1'),
			array('icon-fir-tree-2' =>'icon-fir-tree-2'),
			array('icon-fire-1' =>'icon-fire-1'),
			array('icon-ghost' =>'icon-ghost'),
			array('icon-hanging' =>'icon-hanging'),
			array('icon-happy-mask' =>'icon-happy-mask'),
			array('icon-hipster-1' =>'icon-hipster-1'),
			array('icon-hipster-2' =>'icon-hipster-2'),
			array('icon-house-fire' =>'icon-house-fire'),
			array('icon-house-lightening' =>'icon-house-lightening'),
			array('icon-house-search' =>'icon-house-search'),
			array('icon-incognito' =>'icon-incognito'),
			array('icon-labyrinth-1' =>'icon-labyrinth-1'),
			array('icon-labyrinth-2' =>'icon-labyrinth-2'),
			array('icon-leaf' =>'icon-leaf'),
			array('icon-lighthouse' =>'icon-lighthouse'),
			array('icon-love' =>'icon-love'),
			array('icon-middle-finger' =>'icon-middle-finger'),
			array('icon-moon' =>'icon-moon'),
			array('icon-moustache' =>'icon-moustache'),
			array('icon-no-smoking' =>'icon-no-smoking'),
			array('icon-pacman' =>'icon-pacman'),
			array('icon-plant' =>'icon-plant'),
			array('icon-playing-cards' =>'icon-playing-cards'),
			array('icon-poison' =>'icon-poison'),
			array('icon-pong' =>'icon-pong'),
			array('icon-poo' =>'icon-poo'),
			array('icon-pool-1' =>'icon-pool-1'),
			array('icon-radioactive' =>'icon-radioactive'),
			array('icon-recycle' =>'icon-recycle'),
			array('icon-robot-1' =>'icon-robot-1'),
			array('icon-robot-2' =>'icon-robot-2'),
			array('icon-rock' =>'icon-rock'),
			array('icon-run' =>'icon-run'),
			array('icon-sad-mask' =>'icon-sad-mask'),
			array('icon-scythe' =>'icon-scythe'),
			array('icon-shooting-star' =>'icon-shooting-star'),
			array('icon-skull' =>'icon-skull'),
			array('icon-smoking' =>'icon-smoking'),
			array('icon-snowflake' =>'icon-snowflake'),
			array('icon-snowman' =>'icon-snowman'),
			array('icon-steps' =>'icon-steps'),
			array('icon-sun' =>'icon-sun'),
			array('icon-tetris' =>'icon-tetris'),
			array('icon-theatre-masks' =>'icon-theatre-masks'),
			array('icon-tombstone' =>'icon-tombstone'),
			array('icon-tree' =>'icon-tree'),
			array('icon-ufo' =>'icon-ufo'),
			array('icon-unicorn' =>'icon-unicorn'),
			array('icon-vigilante' =>'icon-vigilante'),
			array('icon-wall' =>'icon-wall'),
			array('icon-wheat' =>'icon-wheat'),
			array('icon-account-book-1' =>'icon-account-book-1'),
			array('icon-account-book-female' =>'icon-account-book-female'),
			array('icon-account-book-male' =>'icon-account-book-male'),
			array('icon-contacts' =>'icon-contacts'),
			array('icon-female-sign' =>'icon-female-sign'),
			array('icon-head-brainstorming' =>'icon-head-brainstorming'),
			array('icon-head-idea' =>'icon-head-idea'),
			array('icon-head-money' =>'icon-head-money'),
			array('icon-head-question' =>'icon-head-question'),
			array('icon-head-search' =>'icon-head-search'),
			array('icon-head-settings' =>'icon-head-settings'),
			array('icon-head-speech' =>'icon-head-speech'),
			array('icon-head-time' =>'icon-head-time'),
			array('icon-head' =>'icon-head'),
			array('icon-ID-card' =>'icon-ID-card'),
			array('icon-male-sign' =>'icon-male-sign'),
			array('icon-people-female' =>'icon-people-female'),
			array('icon-people-idea' =>'icon-people-idea'),
			array('icon-people-male' =>'icon-people-male'),
			array('icon-people-money' =>'icon-people-money'),
			array('icon-people-question' =>'icon-people-question'),
			array('icon-people-speech-1' =>'icon-people-speech-1'),
			array('icon-people-speech-2' =>'icon-people-speech-2'),
			array('icon-people-target' =>'icon-people-target'),
			array('icon-people-time' =>'icon-people-time'),
			array('icon-people' =>'icon-people'),
			array('icon-public-speaking' =>'icon-public-speaking'),
			array('icon-rolodex-2' =>'icon-rolodex-2'),
			array('icon-rolodex' =>'icon-rolodex'),
			array('icon-team-1' =>'icon-team-1'),
			array('icon-team-2' =>'icon-team-2'),
			array('icon-team-3' =>'icon-team-3'),
			array('icon-team-hierarchy' =>'icon-team-hierarchy'),
			array('icon-useer-female-picture' =>'icon-useer-female-picture'),
			array('icon-useer-male-picture' =>'icon-useer-male-picture'),
			array('icon-user-add' =>'icon-user-add'),
			array('icon-user-check' =>'icon-user-check'),
			array('icon-user-circle' =>'icon-user-circle'),
			array('icon-user-delete' =>'icon-user-delete'),
			array('icon-user-female-add' =>'icon-user-female-add'),
			array('icon-user-female-check' =>'icon-user-female-check'),
			array('icon-user-female-circle' =>'icon-user-female-circle'),
			array('icon-user-female-delete' =>'icon-user-female-delete'),
			array('icon-user-female-edit' =>'icon-user-female-edit'),
			array('icon-user-female-options' =>'icon-user-female-options'),
			array('icon-user-female-picture-add' =>'icon-user-female-picture-add'),
			array('icon-user-female-pictures' =>'icon-user-female-pictures'),
			array('icon-user-female-portrait' =>'icon-user-female-portrait'),
			array('icon-user-female-profile' =>'icon-user-female-profile'),
			array('icon-user-female-settings' =>'icon-user-female-settings'),
			array('icon-user-female-speech-1' =>'icon-user-female-speech-1'),
			array('icon-user-female-speech-2' =>'icon-user-female-speech-2'),
			array('icon-user-female' =>'icon-user-female'),
			array('icon-user-male-add' =>'icon-user-male-add'),
			array('icon-user-male-check' =>'icon-user-male-check'),
			array('icon-user-male-circle' =>'icon-user-male-circle'),
			array('icon-user-male-delete' =>'icon-user-male-delete'),
			array('icon-user-male-edit' =>'icon-user-male-edit'),
			array('icon-user-male-options' =>'icon-user-male-options'),
			array('icon-user-male-picture-add' =>'icon-user-male-picture-add'),
			array('icon-user-male-pictures' =>'icon-user-male-pictures'),
			array('icon-user-male-portrait' =>'icon-user-male-portrait'),
			array('icon-user-male-profile' =>'icon-user-male-profile'),
			array('icon-user-male-settings' =>'icon-user-male-settings'),
			array('icon-user-male-speech-1' =>'icon-user-male-speech-1'),
			array('icon-user-male-speech-2' =>'icon-user-male-speech-2'),
			array('icon-user-male' =>'icon-user-male'),
			array('icon-user-picture-1' =>'icon-user-picture-1'),
			array('icon-user-picture-2' =>'icon-user-picture-2'),
			array('icon-user-picture-add' =>'icon-user-picture-add'),
			array('icon-user-profile-1' =>'icon-user-profile-1'),
			array('icon-user-profile-2' =>'icon-user-profile-2'),
			array('icon-user-search-2' =>'icon-user-search-2'),
			array('icon-user-target' =>'icon-user-target'),
			array('icon-user' =>'icon-user'),
			array('icon-users-male-female' =>'icon-users-male-female'),
			array('icon-users-male' =>'icon-users-male'),
			array('icon-users' =>'icon-users'),
			array('icon-VIP-card' =>'icon-VIP-card'),
			array('icon-badge-1' =>'icon-badge-1'),
			array('icon-badge-2' =>'icon-badge-2'),
			array('icon-crown' =>'icon-crown'),
			array('icon-diploma-1' =>'icon-diploma-1'),
			array('icon-diploma-2' =>'icon-diploma-2'),
			array('icon-diploma-3' =>'icon-diploma-3'),
			array('icon-flag-1' =>'icon-flag-1'),
			array('icon-flag-2' =>'icon-flag-2'),
			array('icon-flag-3' =>'icon-flag-3'),
			array('icon-flag-4' =>'icon-flag-4'),
			array('icon-heart-broken' =>'icon-heart-broken'),
			array('icon-heart' =>'icon-heart'),
			array('icon-hearts' =>'icon-hearts'),
			array('icon-like-2' =>'icon-like-2'),
			array('icon-like' =>'icon-like'),
			array('icon-medal-1' =>'icon-medal-1'),
			array('icon-medal-2' =>'icon-medal-2'),
			array('icon-medal-3' =>'icon-medal-3'),
			array('icon-medal-4' =>'icon-medal-4'),
			array('icon-medal-5' =>'icon-medal-5'),
			array('icon-medal-6' =>'icon-medal-6'),
			array('icon-olympic-torch' =>'icon-olympic-torch'),
			array('icon-podium' =>'icon-podium'),
			array('icon-star-circle' =>'icon-star-circle'),
			array('icon-star-plus' =>'icon-star-plus'),
			array('icon-star' =>'icon-star'),
			array('icon-trophy-1' =>'icon-trophy-1'),
			array('icon-trophy-2' =>'icon-trophy-2'),
			array('icon-trophy-3' =>'icon-trophy-3'),
			array('icon-unlike-2' =>'icon-unlike-2'),
			array('icon-unlike' =>'icon-unlike'),
			array('icon-verification' =>'icon-verification'),
			array('icon-votes-2' =>'icon-votes-2'),
			array('icon-votes' =>'icon-votes'),
			array('icon-binary-code' =>'icon-binary-code'),
			array('icon-bug-fixed' =>'icon-bug-fixed'),
			array('icon-bug-search' =>'icon-bug-search'),
			array('icon-bug' =>'icon-bug'),
			array('icon-code-1' =>'icon-code-1'),
			array('icon-code-2' =>'icon-code-2'),
			array('icon-code-3' =>'icon-code-3'),
			array('icon-CPU-overclock' =>'icon-CPU-overclock'),
			array('icon-CPU' =>'icon-CPU'),
			array('icon-firewall-1' =>'icon-firewall-1'),
			array('icon-firewall-allert' =>'icon-firewall-allert'),
			array('icon-firewall-block' =>'icon-firewall-block'),
			array('icon-firewall-disable' =>'icon-firewall-disable'),
			array('icon-firewall-done' =>'icon-firewall-done'),
			array('icon-firewall-help' =>'icon-firewall-help'),
			array('icon-firewall-refresh' =>'icon-firewall-refresh'),
			array('icon-firewall-star' =>'icon-firewall-star'),
			array('icon-firewall' =>'icon-firewall'),
			array('icon-hierarchy-structure-1' =>'icon-hierarchy-structure-1'),
			array('icon-hierarchy-structure-2' =>'icon-hierarchy-structure-2'),
			array('icon-hierarchy-structure-3' =>'icon-hierarchy-structure-3'),
			array('icon-hierarchy-structure-4' =>'icon-hierarchy-structure-4'),
			array('icon-hierarchy-structure-5' =>'icon-hierarchy-structure-5'),
			array('icon-hierarchy-structure-6' =>'icon-hierarchy-structure-6'),
			array('icon-html-5' =>'icon-html-5'),
			array('icon-link-1-add' =>'icon-link-1-add'),
			array('icon-link-1-broken' =>'icon-link-1-broken'),
			array('icon-link-1-remove' =>'icon-link-1-remove'),
			array('icon-link-1' =>'icon-link-1'),
			array('icon-link-2-broken' =>'icon-link-2-broken'),
			array('icon-link-2' =>'icon-link-2'),
			array('icon-link-3-broken' =>'icon-link-3-broken'),
			array('icon-link-3' =>'icon-link-3'),
			array('icon-search-stats' =>'icon-search-stats'),
			array('icon-window-404' =>'icon-window-404'),
			array('icon-window-binary-code' =>'icon-window-binary-code'),
			array('icon-window-bookmark' =>'icon-window-bookmark'),
			array('icon-window-code' =>'icon-window-code'),
			array('icon-window-console' =>'icon-window-console'),
			array('icon-window-content' =>'icon-window-content'),
			array('icon-window-cursor' =>'icon-window-cursor'),
			array('icon-window-edit' =>'icon-window-edit'),
			array('icon-window-layout' =>'icon-window-layout'),
			array('icon-window-loading' =>'icon-window-loading'),
			array('icon-window-lock' =>'icon-window-lock'),
			array('icon-window-refresh' =>'icon-window-refresh'),
			array('icon-window-search' =>'icon-window-search'),
			array('icon-window-settings' =>'icon-window-settings'),
			array('icon-window-user' =>'icon-window-user'),
			array('icon-window' =>'icon-window'),
			array('icon-windows-open' =>'icon-windows-open'),
		);
	}
}


if ( ! function_exists( 'pado_search_popup' ) ) {
	function pado_search_popup() { ?>
        <div class="site-search" id="search-box">
            <div class="close-search">
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <div class="form-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                                <div class="input-group">
                                    <input type="search" id="search-input" value="<?php echo get_search_query() ?>" name="s"
                                           class="search-field"
                                           placeholder="<?php esc_attr_e( 'Enter search Keyword', 'pado' ); ?>"
                                           required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php }
}

add_action('pado_after_footer', 'pado_search_popup', 10);



/**
 *
 * Like post ajax function.
 *
 **/
if ( ! function_exists( 'pado_like_post' ) ) {
	function pado_like_post() {
		if( empty( $_POST ) ) {
			esc_html_e( 'Ajax error', 'pado' );
		} else {

			$post_id = sanitize_text_field( $_POST['post_id'] );
			$count_likes = get_post_meta( $post_id, 'count_likes', true );

			if ( isset( $_COOKIE['post_likes'] ) && ! empty( $_COOKIE['post_likes'] ) ) {
				$ids = explode( ',', $_COOKIE['post_likes'] );
				if ( ( $key = array_search( $post_id, $ids ) ) !== false ) {
					$count_likes = ($count_likes - 1 >= 0) ? ($count_likes - 1) : '0';
					unset( $ids[ $key ] );
				} else {
					$count_likes++;
					$ids[] = $post_id;
				}

				update_post_meta( $post_id, 'count_likes', $count_likes );
				$ids_list = implode( ',', $ids );
				setcookie( 'post_likes', $ids_list, ( time() + 3600 * 730 ), '/' );
				echo esc_html( $count_likes );
			} else {

				$count_likes++;
				update_post_meta( $post_id, 'count_likes', $count_likes );
				setcookie( 'post_likes', $post_id, ( time() + 3600 * 730 ), '/' );
				echo esc_html( $count_likes );
			}

		}
		exit;
	}
}

add_action( 'wp_ajax_pado_like_post', 'pado_like_post' );
add_action( 'wp_ajax_nopriv_pado_like_post', 'pado_like_post' );


/**
 * Like counter.
 */
if ( ! function_exists('pado_like_counter') ) {
	function pado_like_counter() {
		// Count post likes
		$count_post_likes = get_post_meta( get_the_ID(), 'count_likes', true );
		$count_post_likes = !empty($count_post_likes) ? $count_post_likes : '0';
		?>
        <div class="post-counts__count">
            <span>
                <i class="count"><?php echo esc_html( $count_post_likes ); ?></i>
            </span>
        </div>
		<?php
	}
}

/**
 * Like button.
 */
if ( ! function_exists('pado_like_button') ) {
	function pado_like_button() { ?>
        <div class="post__likes" data-id="<?php echo get_the_ID(); ?>"></div>
    <?php
	}
}


/**
 *
 * Add new fields to user profile.
 *
 */
if ( ! function_exists( 'pado_show_extra_profile_fields' ) ) {
	function pado_show_extra_profile_fields( $user ) { ?>

        <h3><?php esc_html_e( 'Extra profile information', 'pado' ); ?></h3>

        <table class="form-table">

            <tr>
                <th><label for="twitter"><?php esc_html_e( 'Twitter', 'pado' ); ?></label></th>

                <td>
                    <input type="text" name="twitter" id="twitter" value="<?php echo esc_url( get_user_meta( $user->ID, 'twitter', true ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php esc_html_e( 'Please enter your Twitter profile link.', 'pado' ); ?></span>
                </td>
            </tr>
            <tr>
                <th><label for="facebook"><?php esc_html_e( 'Facebook', 'pado' ); ?></label></th>

                <td>
                    <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_user_meta( $user->ID, 'facebook', true ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php esc_html_e( 'Please enter your Facebook profile link.', 'pado' ); ?></span>
                </td>
            </tr>
            <tr>
                <th><label for="instagram"><?php esc_html_e( 'Instagram', 'pado' ); ?></label></th>

                <td>
                    <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_user_meta( $user->ID, 'instagram', true ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php esc_html_e( 'Please enter your Instagram profile link.', 'pado' ); ?></span>
                </td>
            </tr>
            <tr>
                <th><label for="dribbble"><?php esc_html_e( 'Dribbble', 'pado' ); ?></label></th>

                <td>
                    <input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_user_meta( $user->ID, 'dribbble', true ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php esc_html_e( 'Please enter your Dribbble profile link.', 'pado' ); ?></span>
                </td>
            </tr>

        </table>
	<?php }
}
add_action( 'show_user_profile', 'pado_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'pado_show_extra_profile_fields' );

/**
 *
 * Save and update new fields in user profile.
 *
 */
if ( ! function_exists( 'pado_save_extra_profile_fields' ) ) {
	function pado_save_extra_profile_fields( $user_id ) {

		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}
		update_user_meta( $user_id, 'facebook',  esc_url( $_POST['facebook'] ) );
		update_user_meta( $user_id, 'twitter',   esc_url( $_POST['twitter'] ) );
		update_user_meta( $user_id, 'instagram', esc_url( $_POST['instagram'] ) );
		update_user_meta( $user_id, 'dribbble', esc_url( $_POST['dribbble'] ) );
	}
}
add_action( 'personal_options_update', 'pado_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'pado_save_extra_profile_fields' );

if ( ! function_exists( 'pado_fixed_header' ) ) {
    function pado_fixed_header( $menu_main_style, $post_id ) {
        $fixed_menu_class = (cs_get_option('fixed_menu') || is_404()) ? ' enable_fixed' : '';

        $meta_data           = get_post_meta( $post_id, '_custom_page_options', true );
        $meta_data_portfolio = get_post_meta( $post_id, 'pado_portfolio_options', true );

        if (isset($meta_data['style_header']) && $meta_data['style_header'] === 'transparent') {
            $fixed_menu_class .= ' header_trans-fixed';
        } elseif (isset($meta_data_portfolio['style_header']) && $meta_data_portfolio['style_header'] === 'transparent') {
            $fixed_menu_class .= ' header_trans-fixed';
        } elseif (is_404() || (cs_get_option('fixed_transparent_menu_blog') && is_single() && get_post_type() == 'post')) {
            $fixed_menu_class .= ' header_trans-fixed';
        } elseif (cs_get_option('fixed_menu') && cs_get_option('transparent_menu') && ((isset($meta_data['style_header']) && $meta_data['style_header'] === 'empty') || (isset($meta_data_portfolio['style_header']) && $meta_data_portfolio['style_header'] === 'empty'))) {
            $fixed_menu_class .= ' header_trans-fixed';
        } elseif ((isset($meta_data['style_header']) && $meta_data['style_header'] === 'fixed') || (isset($meta_data_portfolio['style_header']) && $meta_data_portfolio['style_header'] === 'fixed')) {
            $fixed_menu_class .= ' fixed-header';
        } elseif ((isset($meta_data['style_header']) && $meta_data['style_header'] === 'none') || (isset($meta_data_portfolio['style_header']) && $meta_data_portfolio['style_header'] === 'none')) {
            $fixed_menu_class .= ' header_trans-fixed none';
        } else {
            $fixed_menu_class .= '';
        }

        $fixed_menu_class = !function_exists('cs_framework_init') && is_404() ? ' fixed-header' : $fixed_menu_class;
        $fixed_menu_class = apply_filters('pado_blog_menu_style', $fixed_menu_class);

        return $fixed_menu_class;

    }
}

if ( ! function_exists( 'pado_main_header_html' ) ) {
    function pado_main_header_html() {

        if (is_page() || is_home()) {
            $post_id = get_queried_object_id();
        } else {
            $post_id = get_the_ID();
        }

        $meta_data           = get_post_meta( $post_id, '_custom_page_options', true );
        $meta_data_portfolio = get_post_meta( $post_id, 'pado_portfolio_options', true );
        $menu_main_style     = is_404() ? 'only_logo' : cs_get_option('menu_style');

        if ( isset( $meta_data['change_menu'] ) && $meta_data['change_menu'] && isset( $meta_data['menu_style'] ) ) {
            $menu_main_style = $meta_data['menu_style'];
        }

        if ( isset( $meta_data_portfolio['change_menu'] ) && $meta_data_portfolio['change_menu'] && isset( $meta_data_portfolio['menu_style'] ) ) {
            $menu_main_style = $meta_data_portfolio['menu_style'];
        }

        $menu_main_style     = is_search() ? cs_get_option('menu_style') : $menu_main_style;
        $menu_main_style     = ! empty( $menu_main_style ) || function_exists( 'cs_framework_init' ) ? $menu_main_style : 'simple';

        get_template_part( 'template-parts/menu/menu', $menu_main_style );
    }
}

add_action( 'pado_main_header', 'pado_main_header_html' );

function google_theme_color() {
    if ($google_theme_color = cs_get_option( 'google_theme_color' )) {
        ?>
        <meta name="theme-color" content="<?php echo esc_attr( $google_theme_color ); ?>">
        <?php
    }
}
add_action( 'wp_head', 'google_theme_color' );
