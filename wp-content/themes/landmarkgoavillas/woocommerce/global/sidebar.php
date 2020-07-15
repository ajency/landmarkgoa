<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
</div><!-- end main -->
</div><!-- end column -->
<?php

if ( (! function_exists( 'cs_framework_init' ) && is_active_sidebar('shop_sidebar')) || (is_shop() && cs_get_option('enable_sidebar_ecommerce')) || is_product() && cs_get_option('enable_sidebar_ecommerce_detail')) { ?>
<div class="col-md-3">
	<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'shop_sidebar' ) ); ?>
</div>
<?php }


?>
</div><!-- end row -->
</div><!-- end container -->

<?php if(is_shop()){ ?>
</div><!-- end shop-wrapper -->
<?php } ?>