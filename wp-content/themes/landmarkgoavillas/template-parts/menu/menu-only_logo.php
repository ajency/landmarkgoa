<?php
/**
 * Full menu
 */

if ( is_page() || is_home() ) {
    $post_id = get_queried_object_id();
} else {
    $post_id = get_the_ID();
}

$fixed_menu_class = pado_fixed_header( 'only_logo', $post_id ); ?>

<div class="header_top_bg <?php echo esc_attr($fixed_menu_class) ?>">
    <!-- HEADER -->
    <header class="only-logo">
        <!-- LOGO -->
        <?php pado_site_logo(); ?>
        <!-- /LOGO -->
    </header>
</div>