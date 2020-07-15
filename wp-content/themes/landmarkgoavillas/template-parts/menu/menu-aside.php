<?php
/**
 * Aside menu
 */

if ( is_page() || is_home() ) {
    $post_id = get_queried_object_id();
} else {
    $post_id = get_the_ID();
}

$fixed_menu_class = pado_fixed_header('aside', $post_id);

$meta_data = get_post_meta($post_id, '_custom_page_options', true);
$meta_data_portfolio = get_post_meta(get_the_ID(), 'pado_portfolio_options', true);

// variables
$enable_search       = cs_get_option('search_on');
$logo_bg             = cs_get_option('logo_bg');

if ( isset($meta_data['change_menu']) && $meta_data['change_menu'] ) {
    $full_width_menu     = $meta_data['full_width_menu'];
    $logo_bg             = $meta_data['logo_bg'];
}

if ( isset($meta_data_portfolio['change_menu']) && $meta_data_portfolio['change_menu'] ) {
    $full_width_menu     = $meta_data_portfolio['full_width_menu'];
    $logo_bg             = $meta_data_portfolio['logo_bg'];
} ?>

<div class="header_top_bg header_trans-fixed">
    <!-- HEADER -->
    <header class="aside">
        <!-- LOGO -->
        <?php pado_site_logo($logo_bg); ?>
        <!-- /LOGO -->
        <!-- MOB MENU ICON -->
        <a href="#" class="mob-nav">
            <div class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </a>
        <!-- /MOB MENU ICON -->

        <!-- NAVIGATION -->
        <nav id="topmenu" class="topmenu">
            <a href="#" class="mob-nav-close">
                <span>close</span>
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </a>
            <?php pado_custom_menu(); ?>
            <div class="header-bottom">
                <ul class="social">
                    <?php foreach (cs_get_option('header_social') as $link) { ?>
                        <li><a href="<?php echo esc_url($link['header_social_link']); ?>" target="_blank"><i
                                        class="<?php echo esc_attr($link['header_social_icon']); ?>"></i></a>
                        </li>
                    <?php } ?>
                </ul>
                <?php $footer_textFull = cs_get_option('header_copyright') ? cs_get_option('header_copyright') : ''; ?>
                <div class="copy">
                    <?php echo wp_kses_post($footer_textFull); ?>
                </div>
            </div>
            <div class="header-middle">
                <?php if ( function_exists('WC') ) {
                    if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && (cs_get_option('shop_cart_on') || !function_exists('cs_framework_init')) ) {
                        $count = WC()->cart->cart_contents_count; ?>
                        <div class="mini-cart-wrapper">
                            <a class="pado-shop-icon ion-bag"
                               href="<?php echo wc_get_cart_url(); ?>"
                               title="<?php esc_attr_e('view your shopping cart', 'pado'); ?>">
                                <?php if ( $count > 0 ) { ?>
                                    <div class="cart-contents">
                                        <span class="cart-contents-count"><?php echo esc_html($count); ?></span>
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                    <?php }
                }
                if ( $enable_search ) { ?>
                    <div class="search-icon-wrapper">
                        <i class="ion-android-search open-search"></i>
                        <?php do_action('pado_after_footer'); ?>
                    </div>
                <?php } ?>
            </div>
        </nav>
        <!-- NAVIGATION -->

        <!-- OVERLAY -->
        <span class="header-overlay"></span>
        <!-- OVERLAY -->

    </header>
</div>