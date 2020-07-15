<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_excerpt ) {
	return;
}

?>
<div class="product_desc" itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>
<?php if(cs_get_option('enable_socials_share')){ ?>
    <div class="single-share">
        <div class="ft-part">
            <ul class="social-list">
                <li>
                    <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                       target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                <li>
                    <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                       class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'pado'); ?>"><i class="fa fa-twitter"></i></a>
                </li>

                <li>
                    <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                       class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                <li>
                    <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                       target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
<?php } ?>
