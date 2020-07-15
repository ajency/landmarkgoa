<?php
/**
 *
 * Footer
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( (is_page() || is_home()) && !is_search() ) {
    $post_id = get_queried_object_id();
} else {
    $post_id = get_the_ID();
}
// page options
$meta_data           = get_post_meta($post_id, '_custom_page_options', true);
$meta_data_portfolio = get_post_meta($post_id, 'pado_portfolio_options', true);

$pado_footer_style = 'modern';
$pado_footer_style      = cs_get_option('pado_footer_style') ? cs_get_option('pado_footer_style') : $pado_footer_style;
$enable_footer_copy     = $enable_footer_socials = true;
$enable_footer_white    = cs_get_option('enable_footer_white');
$enable_footer_parallax = cs_get_option('enable_parallax_footer');
$copyright_align        = cs_get_option('pado_copyright_align');
$socials_align          = cs_get_option('pado_socials_align');
$footer_enable          = true;

$footer_logo_radio = cs_get_option('footer_logo_radio');
if ( $footer_logo_radio == 'imglogo' ) {
    $footer_logo = cs_get_option('footer_logo');
} else {
    $footer_logo = cs_get_option('footer_logo_text');
}

$change_footer = (!empty($meta_data['change_footer']) && $meta_data['change_footer']) ? $meta_data['change_footer'] : false;
if ( $change_footer ) {
    $enable_footer_copy     = isset($meta_data['enable_footer_copy_page']) ? $meta_data['enable_footer_copy_page'] : $enable_footer_copy;
    $enable_footer_socials  = isset($meta_data['enable_footer_socials']) ? $meta_data['enable_footer_socials'] : $enable_footer_socials;
    $enable_footer_white    = isset($meta_data['enable_footer_white_page']) ? $meta_data['enable_footer_white_page'] : $enable_footer_white;
    $enable_footer_parallax = isset($meta_data['enable_parallax_footer_page']) ? $meta_data['enable_parallax_footer_page'] : $enable_footer_parallax;
    $copyright_align        = isset($meta_data['pado_copyright_align']) ? $meta_data['pado_copyright_align'] : $copyright_align;
    $socials_align          = isset($meta_data['pado_socials_align']) ? $meta_data['pado_socials_align'] : $socials_align;
    $pado_footer_style      = isset($meta_data['pado_footer_style']) ? $meta_data['pado_footer_style'] : $pado_footer_style;

    $footer_logo_radio = isset($meta_data['footer_logo_radio']) ? $meta_data['footer_logo_radio'] : $pado_footer_style;
    if ( $footer_logo_radio == 'imglogo' ) {
        $footer_logo = isset($meta_data['footer_logo']) ? $meta_data['footer_logo'] : $footer_logo;
    } else {
        $footer_logo = isset($meta_data['footer_logo_text']) ? $meta_data['footer_logo_text'] : $footer_logo;
    }
}

$change_footer = (!empty($meta_data_portfolio['change_footer']) && $meta_data_portfolio['change_footer']) ? $meta_data_portfolio['change_footer'] : false;
if ( $change_footer ) {
    $enable_footer_copy     = isset($meta_data_portfolio['enable_footer_copy_page']) ? $meta_data_portfolio['enable_footer_copy_page'] : $enable_footer_copy;
    $enable_footer_socials  = isset($meta_data_portfolio['enable_footer_socials']) ? $meta_data_portfolio['enable_footer_socials'] : $enable_footer_socials;
    $enable_footer_white    = isset($meta_data_portfolio['enable_footer_white_page']) ? $meta_data_portfolio['enable_footer_white_page'] : $enable_footer_white;
    $enable_footer_parallax = isset($meta_data_portfolio['enable_parallax_footer_page']) ? $meta_data_portfolio['enable_parallax_footer_page'] : $enable_footer_parallax;
    $copyright_align        = isset($meta_data_portfolio['pado_copyright_align']) ? $meta_data_portfolio['pado_copyright_align'] : $copyright_align;
    $socials_align          = isset($meta_data_portfolio['pado_socials_align']) ? $meta_data_portfolio['pado_socials_align'] : $socials_align;
    $pado_footer_style      = isset($meta_data_portfolio['pado_footer_style']) ? $meta_data_portfolio['pado_footer_style'] : $pado_footer_style;

    $footer_logo_radio = isset($meta_data_portfolio['footer_logo_radio']) ? $meta_data_portfolio['footer_logo_radio'] : $pado_footer_style;
    if ( $footer_logo_radio == 'imglogo' ) {
        $footer_logo = isset($meta_data_portfolio['footer_logo']) ? $meta_data_portfolio['footer_logo'] : $footer_logo;
    } else {
        $footer_logo = isset($meta_data_portfolio['footer_logo_text']) ? $meta_data_portfolio['footer_logo_text'] : $footer_logo;
    }
}

if ( empty($copyright_align) ) {
    $copyright_align = 'center';
}

if ( empty($socials_align) ) {
    $socials_align = 'center';
}

$enable_footer_parallax = is_search() ? false : $enable_footer_parallax;
$pado_footer_style      = is_search() ? cs_get_option('pado_footer_style') : $pado_footer_style;
$pado_footer_style      = !empty($pado_footer_style) || !function_exists('cs_framework_init') ? $pado_footer_style : 'modern';

$class_footer = $pado_footer_style;
$class_footer .= !empty($meta_data['fixed_transparent_footer']) || is_404() || (!empty($meta_data_portfolio['fixed_transparent_footer']) || !empty($meta_data_events['fixed_transparent_footer'])) ? ' fix-bottom' : '';

if ( function_exists('cs_framework_init') && !$enable_footer_copy && !$enable_footer_socials ) {
    $class_footer .= ' no-footer';
}

if ( $enable_footer_white ) {
    $class_footer .= ' white-footer';
}

if (is_404()) {
    $enable_footer_copy  = false;
    $socials_align = 'center';
    $class_footer .= ' white-footer';
}

if ( $enable_footer_parallax ) {
    $class_footer .= ' footer-parallax';
}

if ( $enable_footer_copy && $enable_footer_socials ) {
    $copyClass   = 'col-sm-6';
    $socialClass = '';
} else {
    $copyClass   = '';
    $socialClass = ' text-center';
}

if ( $pado_footer_style == 'none' || is_search() ) {
    $footer_enable = false;
} ?>

</div>

<?php if ( $footer_enable ) { ?>
    <footer id="footer" class="<?php echo esc_attr($class_footer); ?>">

        <?php if ( !function_exists('cs_framework_init') ) { ?>
            <div class="container-fluid">
                <div class="copyright text-center">
                    <?php
                    $footer_text = esc_html__(' &copy;', 'pado') . date('Y');
                    echo wp_kses_post($footer_text . bloginfo('name'));
                    ?>
                </div>
            </div>
        <?php } ?>

        <?php if ( $pado_footer_style == 'modern' && ((!empty($enable_footer_copy) && $enable_footer_copy == true) || $enable_footer_socials == true) ) { ?>
            <div class="container-fluid">
                <div class="row">
                    <?php if ( $enable_footer_socials && cs_get_option('footer_social') ) { ?>
                        <div class="col-xs-12 pull-right footer-socials text-<?php echo esc_attr($socials_align . ' ' . $copyClass . $socialClass); ?>">
                            <?php foreach ( cs_get_option('footer_social') as $link ) { ?>
                                <a href="<?php echo esc_url($link['footer_social_link']); ?>" target="_blank">
                                    <i class="<?php echo esc_attr($link['footer_social_icon']); ?>"></i>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ( $enable_footer_copy ) { ?>
                        <div class="copyright col-xs-12 text-<?php echo esc_attr($copyright_align . ' ' . $copyClass); ?>">
                            <?php $footer_text = cs_get_option('footer_text') ? cs_get_option('footer_text') : ' ';
                            echo wp_kses_post($footer_text); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if ( $pado_footer_style == 'classic' ) { ?>
            <div class="footer-bottom-container">
                <?php if ( has_nav_menu('footermenu') ) { ?>
                    <div class="footer-bottom-col">
                        <div class="footer-menu">
                            <?php $args_menu = array(
                                'theme_location'  => 'footermenu',
                                'container'       => '',
                                'container_class' => 'footer-menu',
                                'menu_class'      => 'anchor-navigation',
                                'depth'           => 1,
                                'walker'          => new Pado_Menu_Walker()
                            );
                            wp_nav_menu($args_menu); ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="footer-bottom-col">
                    <?php if ( $footer_logo && $footer_logo_radio == 'imglogo' ) { ?>
                        <div class="footer-logo"><img src="<?php echo esc_url($footer_logo) ?>"
                                                      alt="<?php bloginfo('name'); ?>"></div>
                    <?php } else { ?>
                        <div class="footer-logo"><?php echo esc_html($footer_logo) ?></div>
                    <?php } ?>
                </div>
                <?php if ( $enable_footer_socials && cs_get_option('footer_social') ) { ?>
                    <div class="footer-bottom-col">
                        <div class="socials">
                            <?php foreach ( cs_get_option('footer_social') as $link ) { ?>
                                <a href="<?php echo esc_url($link['footer_social_link']); ?>" target="_blank">
                                    <i class="<?php echo esc_attr($link['footer_social_icon']); ?>"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="footer-bottom-container">
                <div class="footer-bottom-col">
                    <div class="copyright">
                        <?php $footer_text = cs_get_option('footer_text') ? cs_get_option('footer_text') : ' ';
                        echo wp_kses_post($footer_text); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </footer>
<?php } ?>

<?php
$classCopy = cs_get_option('enable_copyright') && !cs_get_option('text_copyright') ? '' : 'copy';
if ( cs_get_option('enable_copyright') ): ?>
    <div class="pado_copyright_overlay <?php echo esc_attr($classCopy); ?>">
        <div class="pado_copyright_overlay-active">
            <?php if ( cs_get_option('text_copyright') ) : ?>
                <div class="pado_copyright_overlay_text">
                    <?php echo wp_kses_post(cs_get_option('text_copyright')); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<div class="fullview">
    <div class="fullview__close"></div>
</div>

<?php if ( cs_get_option('page_scroll_top') ) { ?>
    <a href="#" id="back-to-top">&uarr;</a>
<?php } ?>


<?php wp_footer(); ?>
</body>
</html>