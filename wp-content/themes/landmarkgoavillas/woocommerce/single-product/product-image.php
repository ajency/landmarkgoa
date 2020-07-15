<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     3.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$label = get_post_meta($post->ID, 'pado_product_options');
$label_new = isset($label) && !empty($label) ? $label[0]['pado_product_new'] : false;

$gallery = $product->get_gallery_image_ids();

$label = '';
if ( $product->is_on_sale() ) {

	$label = apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'pado' ) . '</span>', $post, $product );

}elseif(isset($label_new) && $label_new && !$product->is_on_sale()){
    $label = '<span class="on-new">'. esc_html__( 'New', 'pado' ) . '</span>';
 } ?>


<div class="pado_images">
	<?php if ( has_post_thumbnail() || count( $gallery ) > 0 ) {
		if ( count( $gallery ) > 0 ) { ?>

                <ul class="product-gallery-wrap">
	                <?php foreach ( $gallery as $item ) {
		                $image_url = wp_get_attachment_image_url( $item, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
		                $image_alt     = (is_numeric($item) && !empty($item)) ? get_post_meta($item, '_wp_attachment_image_alt', true ) : '';
		                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a class="popup-image" href="%s"  data-size="600x450">' . $label . '<img src="%s" class="s-img-switch" alt="'. $image_alt .'" /></a></li>', $image_url, $image_url ), $post->ID );
	                } ?>
                </ul>

                <ul class="product-gallery-thumbnail-wrap">
                    <?php foreach ( $gallery as $item ) {
                        $image_url = wp_get_attachment_image_url( $item, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
	                    $image_alt     = (is_numeric($item) && !empty($item)) ? get_post_meta($item, '_wp_attachment_image_alt', true ) : '';
                        echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><img src="%s" class="s-img-switch" alt="'. $image_alt .'" /></li>', $image_url, $image_url ), $post->ID );
                    } ?>
                </ul>
		   	<?php
	    } else {
	    	if ( has_post_thumbnail() ) {
	    	    $props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
	    	    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<figure><a href="%s" class="popup-image" data-size="600x450">%s</a></figure>', $props['url'], get_the_post_thumbnail() ), $post->ID );
	    	}
	    }
	} else {
	    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<figure><img src="%s" data-size="600x450" alt="%s" /></figure>', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'pado' ) ), $post->ID );
	} ?>
 
	<?php if ( $product->is_on_sale() ) : ?>

		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'pado' ) . '</span>', $post, $product ); ?>

	<?php endif; ?>

</div>
