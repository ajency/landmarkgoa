<?php
/**
 * Pado Theme Customizer.
 *
 * @package pado
 */

if ( ! function_exists( 'pado_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function pado_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_image' )->transport     = 'postMessage';
		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
		$wp_customize->get_setting( 'background_image' )->transport = 'postMessage';
	}
endif;
add_action( 'customize_register', 'pado_customize_register' );

if ( ! function_exists( 'pado_customize_preview_js' ) ) :
	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function pado_customize_preview_js() {
		wp_enqueue_script( 'pado_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160714', true );

		wp_localize_script( 'pado_customizer', 'wp_customizer', array(
			'ajax_url'  => admin_url( 'admin-ajax.php' ),
			'theme_url' => get_template_directory_uri(),
			'site_name' => get_bloginfo( 'name' )
		) );
	}
endif;
add_action( 'customize_preview_init', 'pado_customize_preview_js' );

if ( ! function_exists( 'pado_button_customize_js' ) ) :
	function pado_button_customize_js() {

		wp_enqueue_script( 'pado_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-controls' ), '20160714', true );

	}
endif;
add_action( 'customize_controls_enqueue_scripts', 'pado_button_customize_js' );
