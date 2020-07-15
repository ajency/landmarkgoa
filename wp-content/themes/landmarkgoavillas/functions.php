<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package pado
 * @since 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}


defined( 'PADO_T_URI' ) or define( 'PADO_T_URI', get_template_directory_uri() );
defined( 'PADO_T_PATH' ) or define( 'PADO_T_PATH', get_template_directory() );

// Include functions
require_once PADO_T_PATH . '/include/class-tgm-plugin-activation.php';
require_once PADO_T_PATH . '/include/helper-functions.php';
require_once PADO_T_PATH . '/include/actions-config.php';
require_once PADO_T_PATH . '/include/custom-header.php';
require_once PADO_T_PATH . '/include/filters.php';
require_once PADO_T_PATH . '/include/customizer.php';
require_once PADO_T_PATH . '/include/menu-walker.php';
require_once PADO_T_PATH . '/include/custom-menu.php';

require PADO_T_PATH . '/plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://main.aheto.co/wp-update/?action=get_metadata&slug=pado', //Metadata URL.
	__FILE__, //Full path to the main plugin file.
	'pado' //Plugin slug. Usually it's the same as the name of the directory.
);

// after setup
if (!function_exists('pado_after_setup')) {
	function pado_after_setup() {
		register_nav_menus( array( 'primary-menu' => esc_attr__( 'Primary menu', 'pado' ) ) );
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		add_theme_support( 'woocommerce' );

		load_theme_textdomain( 'pado', PADO_T_PATH . '/languages' );

        if ( function_exists( 'cs_framework_init' ) ) {
            register_nav_menus( array(
                'footermenu' => esc_html__( 'Footer Menu', 'pado' ),
            ) );
        }

	}
}
add_action( 'after_setup_theme', 'pado_after_setup' );





if (!function_exists('pado_child_font')) {
	function pado_child_font($fonts)
	{
		if (is_array($fonts)) {
			$fonts[] = 'BebasNeueBook';
		}
		return $fonts;
	}
}

add_filter( 'cs_websafe_fonts', 'pado_child_font' );
