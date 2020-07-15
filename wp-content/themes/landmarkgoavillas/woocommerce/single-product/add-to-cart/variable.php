<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'pado' ); ?></p>
	<?php else : ?>
    <div class="woocommerce-variation-add-to-cart variations_button">
		<?php if ( ! $product->is_sold_individually() ) : ?>
            <span><?php esc_html_e('Quantity', 'pado'); ?></span>
			<?php woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); ?>
		<?php endif; ?>
    </div>
		<table class="variations">
	        <tbody>
	            <?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++; ?>

	                <tr>
	                    <td class="label">
	                    	<label for="product-select-<?php echo esc_attr(sanitize_title($name)); ?>"><?php echo do_shortcode(wc_attribute_label($name,$product)); ?></label>
	                	</td>
	                </tr>
	                <tr>
	                    <td class="value">
                            <fieldset>
		                        <?php
		                            if ( is_array( $options ) ) {
		                                $select_options = array();
		                                if ( empty( $_POST ) )
		                                    $selected_value = ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) ? $selected_attributes[ sanitize_title( $name ) ] : '';
		                                else
		                                    $selected_value = isset( $_POST[ 'attribute_' . sanitize_title( $name ) ] ) ? $_POST[ 'attribute_' . sanitize_title( $name ) ] : '';

		                                // Get terms if this is a taxonomy - ordered
		                                if ( taxonomy_exists( sanitize_title( $name ) ) ) {

		                                    $terms = get_terms( sanitize_title($name), array('menu_order' => 'ASC') );
		 									$counter = 0;

		                                    foreach ( $terms as $term ) {

		                                        if ( ! in_array( $term->slug, $options ) ) continue;
                                                    $select_options[] =  '<option value="' . esc_attr($term->slug) . '" ' . selected( $selected_value, $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
                                                   $counter++;
		                                    }
		                                } else {

		                                    $counter = 0;
		                                    foreach ( $available_variations as $option ) {
			                                    $attr_option = array_shift( $option['attributes'] );
			                                    $select_options[] = '<option value="' . esc_attr($attr_option) . '" ' . selected( $selected_value, $attr_option, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $attr_option ) . '</option>';
                                               $counter++;
                                             }
		                                }
		                            }
		                        ?>
	                   	 	</fieldset>
                            <select id="product-select-<?php echo esc_attr( sanitize_title($name) ); ?>" name="attribute_<?php echo esc_attr(sanitize_title($name)); ?>">
                                <?php foreach($select_options as $option) print $option; ?>
							</select>
                        <?php
                        	if ( sizeof($attributes) == $loop )
                		?></td>
	                </tr>
	            <?php endforeach;?>
	        </tbody>
	    </table>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<?php
        $cat_count = !empty(get_the_terms( $post->ID, 'product_cat' )) ? sizeof( get_the_terms( $post->ID, 'product_cat' ) ) : '';
		$tag_count = !empty(get_the_terms( $post->ID, 'product_tag' )) ? sizeof( get_the_terms( $post->ID, 'product_tag' ) ) : ''; ?>
        <div class="product_meta">

			<?php do_action( 'woocommerce_product_meta_start' ); ?>

			<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

                <span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'pado' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'pado' ); ?></span></span>

			<?php endif; ?>
            <br>

			<?php if (!empty($cat_count)) {
                echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'pado' ) . ' ', '</span>' );
            } ?>

			<?php if (!empty($tag_count)) {
                echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'pado' ) . ' ', '</span>' );
            } ?>

			<?php do_action( 'woocommerce_product_meta_end' ); ?>

        </div>
		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
