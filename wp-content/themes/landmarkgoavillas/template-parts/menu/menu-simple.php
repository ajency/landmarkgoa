<?php
/**
 * Simple menu
 */

if ( is_page() || is_home() ) {
    $post_id = get_queried_object_id();
} else {
    $post_id = get_the_ID();
}

$fixed_menu_class = pado_fixed_header('simple', $post_id);

$meta_data = get_post_meta($post_id, '_custom_page_options', true);
$meta_data_portfolio = get_post_meta(get_the_ID(), 'pado_portfolio_options', true);

// variables
$logo_bg = $button_enable = '';

$light_menu = ((isset($meta_data['menu_light_text']) && $meta_data['menu_light_text'] && $meta_data['style_header'] == 'transparent')
    || (isset($meta_data_portfolio['menu_light_text']) && $meta_data_portfolio['menu_light_text'] && $meta_data_portfolio['style_header'] == 'transparent' )) ? '-light' : '';

$enable_search       = cs_get_option('search_on');
$logo_bg             = cs_get_option('logo_bg');
$header_btn          = cs_get_option('header_btn');
$header_btn_name     = cs_get_option('header_btn_text');
$header_btn_url      = cs_get_option('header_btn_url');
$button_style        = cs_get_option('header_btn_style');
$button_style_scroll = cs_get_option('header_btn_style_scroll');
$button_style_mobile = cs_get_option('header_btn_style_mobile');
$full_width_menu     = '';

if ( isset($meta_data['change_menu']) && $meta_data['change_menu'] ) {
    $full_width_menu     = $meta_data['full_width_menu'];
    $logo_bg             = $meta_data['logo_bg'];
    $header_btn          = $meta_data['header_btn'];
    $header_btn_name     = $meta_data['header_btn_text'];
    $header_btn_url      = $meta_data['header_btn_url'];
    $button_style        = $meta_data['header_btn_style'];
    $button_style_scroll = $meta_data['header_btn_style_scroll'];
    $button_style_mobile = $meta_data['header_btn_style_mobile'];
}

if ( isset($meta_data_portfolio['change_menu']) && $meta_data_portfolio['change_menu'] ) {
    $full_width_menu     = $meta_data_portfolio['full_width_menu'];
    $logo_bg             = $meta_data_portfolio['logo_bg'];
    $header_btn          = $meta_data_portfolio['header_btn'];
    $header_btn_name     = $meta_data_portfolio['header_btn_text'];
    $header_btn_url      = $meta_data_portfolio['header_btn_url'];
    $button_style        = $meta_data_portfolio['header_btn_style'];
    $button_style_scroll = $meta_data_portfolio['header_btn_style_scroll'];
    $button_style_mobile = $meta_data_portfolio['header_btn_style_mobile'];
}

if ( isset($header_btn) && $header_btn ) {
    $button_enable = $header_btn;
    if ( isset($header_btn_name) && !empty($header_btn_name) ) {
        $button_name         = $header_btn_name;
        $button_url          = isset($header_btn_url) ? $header_btn_url : '';
        $button_style        = isset($button_style) ? $button_style : 'a-btn-1';
        $button_style_scroll = isset($button_style_scroll) ? $button_style_scroll : 'a-btn-1';
        $button_style_mobile = isset($button_style_mobile) ? $button_style_mobile : 'a-btn-1';
    } else {
        $button_enable = false;
    }
}

$full_width_menu = ($full_width_menu) ? 'full-width' : '';

?>

<div class="header_top_bg <?php echo esc_attr($fixed_menu_class); ?>">
    <!-- HEADER -->
    <header class="simple <?php echo esc_attr($full_width_menu . ' ' . $light_menu); ?>">
            <!-- LOGO -->
            <?php pado_site_logo($logo_bg); ?>
            <!-- /LOGO -->
            <?php if ( $button_enable ): ?>
                <!--  BTN -->
                <div class="header-button">
                    <a href="<?php echo esc_attr($button_url); ?>"
                       class="a-btn <?php echo esc_attr($button_style); ?> header-button-default"><?php echo esc_attr($button_name); ?></a>
                    <a href="<?php echo esc_attr($button_url); ?>"
                       class="a-btn <?php echo esc_attr($button_style_scroll); ?> header-button-scroll"><?php echo esc_attr($button_name); ?></a>
                </div>
                <!--  /BTN -->
            <?php endif; ?>
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
                <div class="f-right">
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
                                <?php echo pado_mini_cart(); ?>
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
                <?php if ( $button_enable ): ?>
                    <div class="header-button header-button--mobile">
                        <a href="<?php echo esc_attr($button_url); ?>"
                           class="a-btn <?php echo esc_attr($button_style_mobile); ?>"><?php echo esc_attr($button_name); ?></a>
                    </div>
                <?php endif; ?>
            </nav>
            <!-- NAVIGATION -->

            <!-- OVERLAY -->
            <span class="header-overlay"></span>
            <!-- OVERLAY -->

        </header>
</div>