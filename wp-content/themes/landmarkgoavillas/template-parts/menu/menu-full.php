<?php
/**
 * Full menu
 */

if ( is_page() || is_home() ) {
    $post_id = get_queried_object_id();
} else {
    $post_id = get_the_ID();
}

$meta_data           = get_post_meta($post_id, '_custom_page_options', true);
$meta_data_portfolio = get_post_meta(get_the_ID(), 'pado_portfolio_options', true);

$fixed_menu_class = pado_fixed_header('full', $post_id);
$full_width_menu  = cs_get_option('full_width_menu');

$light_menu = ((isset($meta_data['menu_light_text']) && $meta_data['menu_light_text'] && $meta_data['style_header'] == 'transparent')
    || (isset($meta_data_portfolio['menu_light_text']) && $meta_data_portfolio['menu_light_text'] && $meta_data_portfolio['style_header'] == 'transparent')) ? '-light' : '';

$full_width_menu = ((isset($meta_data['full_width_menu']) && $meta_data['full_width_menu'])
    || (isset($meta_data_portfolio['full_width_menu']) && $meta_data_portfolio['full_width_menu'])) ? 'full-width' : ''; ?>

<div class="header_top_bg <?php echo esc_attr($fixed_menu_class) ?>">
    <!-- HEADER -->
    <header class="full <?php echo esc_attr($full_width_menu . ' ' . $light_menu); ?>">

        <!-- LOGO -->
        <?php pado_site_logo(); ?>
        <!-- /LOGO -->

        <!-- MOB MENU ICON -->
        <a href="#" class="mob-but-full">
            <div class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </a>
        <!-- /MOB MENU ICON -->

        <!-- NAVIGATION -->
        <nav id="topmenu-full" class="topmenu-full">
            <div class="full-menu-wrap">
                <?php pado_custom_menu(); ?>
            </div>
        </nav>
        <!-- NAVIGATION -->
    </header>
</div>