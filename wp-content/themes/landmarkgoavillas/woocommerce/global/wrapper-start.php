<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
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

// Single no-padd class
$container_shop = cs_get_option('enable_container_full');
$container = ( is_shop() ) ? isset($container_shop) && $container_shop ? 'container-fluid shop-list-page' : 'container shop-list-page' : 'container';

$class_col = 'col-md-12';
if ( (! function_exists( 'cs_framework_init' ) && is_active_sidebar('shop_sidebar')) || (is_shop() && cs_get_option('enable_sidebar_ecommerce')) || is_product() && cs_get_option('enable_sidebar_ecommerce_detail') ) {
	$class_col = 'col-md-9 	';
}
?>
<?php if(is_shop()){
    $light_text = cs_get_option('light_banner_text');
    $light_text = isset($light_text) && !empty($light_text) && $light_text ? '-light' : ''; ?>
    <div class="shop-wrapper">
        <div class="shop-banner <?php echo esc_attr($light_text); ?> <?php echo empty(cs_get_option('shop_image_banner')) ? esc_attr('without-img') : esc_attr(''); ?>">
            <?php if (!empty(cs_get_option('shop_image_banner'))) { ?>
                <img src="<?php echo esc_url(cs_get_option('shop_image_banner')) ?>" alt="<?php woocommerce_page_title() ?>" class="s-img-switch">
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="pado-shop-main-banner">
                            <div class="pado-shop-title"><?php woocommerce_page_title(); ?></div>
                            <div class="pado-shop-menu">
                                <ul>
                                    <li><a href="<?php  echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'pado'); ?></a></li>
                                    <li><?php woocommerce_page_title(); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div id="container" class="<?php echo esc_attr($container); ?>">
            <div class="row">
                <div class="<?php echo esc_attr( $class_col ); ?> "><div id="content" role="main">
