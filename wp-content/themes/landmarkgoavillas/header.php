<?php
/**
 *
 * The Header for Pado theme
 * @since 1.0.0
 * @version 1.0.0
 *
 */

global $bodyClass;

if ( is_page() || is_home() ) {
    $post_id = get_queried_object_id();
} else {
    $post_id = get_the_ID();
}
$meta_data = get_post_meta($post_id, '_custom_page_options', true);

// page options
$enable_footer_parallax = cs_get_option('enable_parallax_footer');

// classes
$change_footer = (!empty($meta_data_portfolio['change_footer']) && $meta_data_portfolio['change_footer']) ? $meta_data_portfolio['change_footer'] : false;
if ( $change_footer ) {
    $enable_footer_parallax = isset($meta_data['enable_parallax_footer_page']) ? $meta_data['enable_parallax_footer_page'] : $enable_footer_parallax;
}
$enable_footer_parallax = is_search() ? false : $enable_footer_parallax;

$class_main_wrapper     = ($enable_footer_parallax) ? 'footer-parallax' : '';
$class_main_wrapper     .= !function_exists('cs_framework_init') ? ' unit' : '';
//$class_main_wrapper     .= ' unit';
$class_desc_padd = '';
$class_mob_padd  = '';

if ( !empty($meta_data['padding_desktop']) ) {
    $class_desc_padd = ' padding-desc ';
}
if ( !empty($meta_data['padding_mobile']) ) {
    $class_mob_padd = ' padding-mob ';
} ?>
    <!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<!-- MAIN_WRAPPER -->
<?php

$preloader = cs_get_option('pado_enable_preloader');
if ( isset($preloader) && !empty($preloader) && $preloader ) { ?>
    <?php $preloader_bg = !empty(cs_get_option('preloader_bg')) ? 'background-color: ' . cs_get_option('preloader_bg') : 'background-color: #fff' ?>
    <div class="preloader preloader--spinner" style="<?php echo esc_attr($preloader_bg); ?>">
        <?php $preloader_color = !empty(cs_get_option('preloader_color')) ? 'background: ' . cs_get_option('preloader_color') : 'background: #004ae2;' ?>
        <div class="cssload-loader" style="<?php echo esc_attr($preloader_color); ?>"></div>
    </div>
<?php } else { ?>
    <div class="preloader preloader--simple"></div>
<?php } ?>

<div class="main-wrapper <?php echo esc_attr($class_main_wrapper) . ' ' . esc_attr($class_desc_padd) . esc_attr($class_mob_padd); ?>">
<?php do_action('pado_main_header'); ?>