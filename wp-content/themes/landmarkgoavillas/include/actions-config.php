<?php
/**
 * The template for requried actions hooks.
 *
 * @package pado
 * @since 1.0
 */


add_action( 'wp_enqueue_scripts', 'pado_enqueue_scripts' );
add_action( 'wp_footer', 'pado_enqueue_main_style' );
add_action( 'widgets_init', 'pado_register_widgets' );
add_action( 'tgmpa_register', 'pado_include_required_plugins' );


define( 'CS_ACTIVE_FRAMEWORK', true );
define( 'CS_ACTIVE_METABOX', true );
define( 'CS_ACTIVE_TAXONOMY', true );
define( 'CS_ACTIVE_SHORTCODE', false );
define( 'CS_ACTIVE_CUSTOMIZE', false );




/*
 * Register sidebar.
 */
if ( ! function_exists( 'pado_register_widgets' ) ) {
	function pado_register_widgets() {
		// register sidebars
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_attr__( 'Sidebar', 'pado' ),
				'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
				'description'   => esc_attr__( 'Drag the widgets for sidebars.', 'pado' )
			)
		);

        register_sidebar(
            array(
                'id'            => 'shop_sidebar',
                'name'          => esc_attr__('Shop Sidebar', 'pado'),
                'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5>',
                'after_title'   => '</h5>',
                'description'   => esc_attr__('Drag the widgets for sidebars.', 'pado')
            )
        );
	}
}

function pado_enqueue_main_style() {
	global $post;

	if( is_page() || is_home()) {
		$post_id = get_queried_object_id();
	} else {
		$post_id = get_the_ID();
	}

	wp_enqueue_style( 'pado-dynamic', admin_url( 'admin-ajax.php' ) . '?action=pado_dynamic_css&post=' . $post_id , array('pado-theme') );
}

/*
Register Fonts
*/
if ( ! function_exists( 'pado_fonts_url' ) ) {
	function pado_fonts_url() {
		$font_url = '';

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'pado' ) ) {
			$fonts = array(
				'Poppins: 100,100i,300,300i,400,400i,500,500i,600,600i,700,700i'
			);

			$font_url = add_query_arg( 'family',
				urlencode( implode( '|', $fonts ) . "&subset=latin,latin-ext" ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}
}
/*
Enqueue scripts and styles.
*/
if ( ! function_exists( 'pado_font_scripts' ) ) {
	function pado_font_scripts() {
		wp_enqueue_style( 'pado-fonts', pado_fonts_url(), array(), '1.0.0' );
	}
}

if ( ! function_exists( 'pado_wp_body_classes' ) ) {
	function pado_wp_body_classes( $classes ) {
	    global $bodyClass;

		$bodyClass = explode(' ', $bodyClass);

		foreach ($bodyClass as $class){
			$classes[] = $class;
        }

		return $classes;
	}
}
add_filter( 'body_class','pado_wp_body_classes' );


/**
/**
 * @ return null
 * @ param none
 * @ loads all the js and css script to frontend
 **/
if ( ! function_exists( 'pado_enqueue_scripts' ) ) {
	function pado_enqueue_scripts() {

		// general settings
		if ( ( is_admin() ) ) {
			return;
		}

		wp_enqueue_style( 'pado-fonts', pado_fonts_url(), array(), '1.0.0' );
		wp_enqueue_script( 'wow', PADO_T_URI . '/assets/js/lib/wow.min.js', array( 'jquery' ), '',false );
		wp_enqueue_script( 'flex-slider', PADO_T_URI . '/assets/js/lib/flex-slider.min.js', array( 'jquery' ), '',false );
		wp_enqueue_script( 'parallax', PADO_T_URI . '/assets/js/lib/parallax.min.js', array( 'jquery' ), '',false );
		wp_enqueue_script( 'youtube-player', PADO_T_URI . '/assets/js/lib/jquery.mb.YTPlayer.min.js', array( 'jquery' ), '',false );
		wp_enqueue_script( 'fitVids', PADO_T_URI . '/assets/js/lib/fitVids.min.js', array( 'jquery' ), '',false );
		wp_enqueue_script( 'isotope', PADO_T_URI . '/assets/js/lib/isotope.min.js', array( 'jquery' ), '',false );
		wp_enqueue_script( 'countdown', PADO_T_URI . '/assets/js/jquery.countdown.min.js', '', '', true );
		wp_enqueue_script( 'pado-foxlazy', PADO_T_URI . '/assets/js/foxlazy.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'easings', PADO_T_URI . '/assets/js/jquery.easings.min.js','','', true );
        wp_enqueue_script( 'magnific', PADO_T_URI . '/assets/js/magnific.js', '', '', true );
		wp_enqueue_script( 'fancybox', PADO_T_URI . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'swiper', PADO_T_URI . '/assets/js/swiper3.js', array( 'jquery' ),'', true );

		if( ! function_exists( 'cs_framework_init' )){
			wp_enqueue_script( 'mousewheel', PADO_T_URI . '/assets/lib/js/jquery.mousewheel.min.js', array( 'jquery' ), '', true);
			wp_enqueue_script( 'lightgallery', PADO_T_URI . '/assets/lib/js/lightgallery.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'justified-gallery', PADO_T_URI . '/assets/lib/js/jquery.justifiedGallery.js', array( 'jquery' ), '', true );
		}

		wp_enqueue_script( 'slick', PADO_T_URI . '/assets/js/slick.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'thumbnails-popup', PADO_T_URI . '/assets/js/lib/thumbnails-popup.js', array( 'jquery', 'dgwt-jg-lightgallery' ),'', true );
        wp_enqueue_script( 'header', PADO_T_URI . '/assets/js/header.js', array( 'jquery' ), '',true );
        wp_enqueue_script( 'pado-main', PADO_T_URI . '/assets/js/script.js', array( 'jquery' ), '',  true );

		// add TinyMCE style
		add_editor_style();

		// including jQuery plugins
		wp_localize_script( 'jquery', 'get',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'siteurl' => get_template_directory_uri(),
			)
		);

		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// register style
		wp_enqueue_style( 'pado-base', PADO_T_URI . '/style.css' );
        wp_enqueue_style( 'pado-preloader', PADO_T_URI . '/assets/css/preloader.min.css' );
        wp_enqueue_style( 'magnific-popup', PADO_T_URI . '/assets/css/magnific-popup.css' );
        wp_enqueue_style( 'magnific-popup-custom', PADO_T_URI . '/assets/css/magnific-popup-custom.min.css' );
		wp_enqueue_style( 'bootstrap', PADO_T_URI . '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'animate', PADO_T_URI . '/assets/css/animate.css' );
		wp_enqueue_style( 'font-awesome', PADO_T_URI . '/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'pe-icon-7-stroke', PADO_T_URI . '/assets/css/pe-icon-7-stroke.css' );
		wp_enqueue_style( 'fancybox', PADO_T_URI . '/assets/css/jquery.fancybox.min.css' );
		wp_enqueue_style( 'swiper', PADO_T_URI . '/assets/css/swiper3.css' );
		wp_enqueue_style( 'simple-fonts', PADO_T_URI . '/assets/css/simple-line-icons.css' );
        wp_enqueue_style( 'pado-custom-font', PADO_T_URI . '/assets/css/pado-icons.css' );
		wp_enqueue_style( 'ionicons', PADO_T_URI . '/assets/css/ionicons.min.css' );
		wp_enqueue_style( 'slick', PADO_T_URI . '/assets/css/slick.css' );
		wp_enqueue_style( 'pado-retreat', PADO_T_URI . '/assets/css/retreat.min.css' );
        wp_enqueue_style( 'pado-buttons', PADO_T_URI . '/assets/css/buttons.min.css' );
        wp_enqueue_style( 'pado-header', PADO_T_URI . '/assets/css/header.min.css' );
		wp_enqueue_style( 'pado-theme', PADO_T_URI . '/assets/css/pado.min.css' );
        wp_enqueue_style( 'pado-footer', PADO_T_URI . '/assets/css/footer.min.css' );
        wp_enqueue_style( 'pado-error', PADO_T_URI . '/assets/css/error-page.min.css' );
        wp_enqueue_style( 'pado-portfolio', PADO_T_URI . '/assets/css/portfolio.min.css' );
        wp_enqueue_style( 'pado-blog', PADO_T_URI . '/assets/css/blog.min.css' );
		wp_enqueue_style( 'pado-shop', PADO_T_URI . '/assets/css/shop.min.css' );

        if( function_exists( 'cs_framework_init' )){
            wp_enqueue_style( 'pado-typography', PADO_T_URI . '/assets/css/typography.min.css' );
        }

		if( ! function_exists( 'cs_framework_init' )){
			wp_enqueue_style( 'admin-style', PADO_T_URI . '/assets/lib/css/admin-style.css' );
			wp_enqueue_style( 'lightgallery', PADO_T_URI . '/assets/lib/css/lightgallery.min.css' );
			wp_enqueue_style( 'libs-style', PADO_T_URI . '/assets/lib/css/style.css' );
		}

		/* Add Custom JS */
		if ( cs_get_option( 'custom_js_scripts' ) ) {
			wp_add_inline_script( 'pado-main', cs_get_option( 'custom_js_scripts' ) );
		}

		if ( cs_get_option( 'enable_lazy_load' ) ) {
			wp_localize_script( 'pado-main', 'enable_foxlazy', 'enable' );
		}

		if ( cs_get_option('heading') ) {
			foreach (cs_get_option('heading') as $key => $title) {
				if ( empty( $title['heading_family'] )) continue;
				$font_family = $title['heading_family'];
				if(! empty($font_family['family']) ) { 
					wp_enqueue_style( sanitize_title_with_dashes($font_family['family']), '//fonts.googleapis.com/css?family=' . $font_family['family'] . ':' . $title['heading_family']['variant'].'' );
				}
			}
		}

		// include font family
		if ( function_exists('pado_include_fonts') ) {
			pado_include_fonts(
				array(
					'menu_item_family',
					'submenu_item_family',
					'gallery_font_family',
					'all_button_font_family',
					'all_button_font_family',
					'footer_font_family',
					'item_gallery_font_family',
					) // all options name 
			);
		}

	}
}


function pado_regiser_info_icons() {
	wp_enqueue_style( 'pado-font-info',   PADO_T_URI . '/assets/css/simple-line-icons.css' );
    wp_enqueue_style( 'pado-custom-font', PADO_T_URI . '/assets/css/pado-icons.css' );
}
add_action( 'vc_base_register_admin_css', 'pado_regiser_info_icons' );

/**
 * Filter the page title.
 */
if ( ! function_exists( 'pado_wp_title' ) ) {
	function pado_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'pado' ), max( $paged, $page ) );
		}

		return $title;
	}
}
add_filter( 'wp_title', 'pado_wp_title', 10, 2 );

/**
 * Include plugins
 **/
if ( ! function_exists( 'pado_include_required_plugins' ) ) {
	function pado_include_required_plugins() {

		$plugins = array(
			array(
				'name'               => esc_html__( 'Pado Plugins', 'pado' ),
				// The plugin name
				'slug'               => 'pado-plugins',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( '//download-plugins.viewdemo.co/pado/pado-plugins.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'version'            => '',
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Visual Composer', 'pado' ),
				// The plugin name
				'slug'               => 'js_composer',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( '//download-plugins.viewdemo.co/premium-plugins/js_composer.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
            array(
                'name'               => esc_html__( 'Image Map Pro', 'pado' ),
                // The plugin name
                'slug'               => 'image-map-pro-wordpress',
                // The plugin slug (typically the folder name)
                'source'             => esc_url( '//download-plugins.viewdemo.co/premium-plugins/image-map-pro-wordpress.zip' ),
                // The plugin source
                'required'           => true,
                // If false, the plugin is only 'recommended' instead of required
                'version'            => '',
                // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false,
                // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,
                // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '',
                // If set, overrides default API URL and points to an external URL
            ),
			array(
				'name'               => esc_html__( 'The Grid', 'pado' ),
				// The plugin name
				'slug'               => 'the_grid',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( '//download-plugins.viewdemo.co/premium-plugins/the_grid.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Contact Form 7', 'pado' ),
				// The plugin name
				'slug'               => 'contact-form-7',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'UpQode Google Maps', 'pado' ),
				// The plugin name
				'slug'               => 'upqode-google-maps',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Woocommerce', 'pado' ),
				// The plugin name
				'slug'               => 'woocommerce',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Draw attention', 'pado' ),
				// The plugin name
				'slug'               => 'draw-attention',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Whizzy', 'pado' ),
				// The plugin name
				'slug'               => 'whizzy',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__('Gutenberg Blocks Collection', 'pado'), // The plugin name
				'slug'               => 'qodeblock', // The plugin slug (typically the folder name)
				'required'           => true, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
		);

		// Change this to your theme text domain, used for internationalising strings

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       => 'pado',                    // Text domain - likely want to be the same as your theme.
			'default_path' => '',                            // Default absolute path to pre-packaged plugins
			'menu'         => 'tgmpa-install-plugins',    // Menu slug
			'has_notices'  => true,                        // Show admin notices or not
			'is_automatic' => true,                        // Automatically activate plugins after installation or not
			'message'      => '',                            // Message to output right before the plugins table
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'pado' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'pado' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'pado' ),
				// %1$s = plugin name
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'pado' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'pado' ),
				// %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'pado' ),
				// %1$s = plugin name(s)
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'pado' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'pado' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'pado' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'pado' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'pado' ),
				// %1$s = dashboard link
				'nag_type'                        => 'updated'
				// Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );
	}
}

if ( ! function_exists( 'pado_password_form' ) ) {
	function pado_password_form() {
		global $post;
		$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
		$o     = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
  ' . esc_html__( 'ENTER PASSWORD BELOW:', 'pado' ) . '
  <label for="' . esc_attr( $label ) . '"></label><input placeholder="' . esc_attr__( "Password:", 'pado' ) . '" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" maxlength="20" /><input type="submit" name="' . esc_attr__( 'Submit', 'pado' ) . '" value="' . esc_attr__( 'Accept', 'pado' ) . '" />
  </form>
  ';

		return $o;
	}
}
add_filter( 'the_password_form', 'pado_password_form' );

// for woocommerce
add_filter('loop_shop_columns', 'pado_loop_columns');
if (!function_exists('pado_loop_columns')) {
	function pado_loop_columns() {
		if (cs_get_option('products_per_row')) {
			return cs_get_option('products_per_row');
		} else {
			return 4; // 4 products per row
		}
	}
}
/* For Woocommerce */
if (!function_exists('pado_add_to_cart_fragment')) {
	function pado_add_to_cart_fragment( $fragments ) {
	
		ob_start();
		$count = WC()->cart->cart_contents_count;
		?> 
		<a class="pado-shop-icon ion-bag" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart','pado' ); ?>">
		   <?php  if ( $count > 0 ) { ?>
		        <div class="cart-contents">
		        	<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
		        </div>
		   <?php } ?>
		</a>
		<?php $fragments['a.pado-shop-icon'] = ob_get_clean();

		$fragments['div.pado_mini_cart'] = pado_mini_cart();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'pado_add_to_cart_fragment' );

if (!function_exists('pado_redirect_coming_soon')) {
	function pado_redirect_coming_soon() {
		if ( cs_get_option('pado_enable_coming_soon') && cs_get_option('pado_page_coming_soon') && !is_admin_bar_showing() ) {

			$redirect_permalink = get_permalink( cs_get_option('pado_page_coming_soon') );
			if ( get_permalink() != $redirect_permalink ){
				wp_redirect( get_permalink( cs_get_option('pado_page_coming_soon') ) );
				exit();
			}
		}
	}
}
add_action( 'template_redirect', 'pado_redirect_coming_soon' );


/*
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) || version_compare( PHP_VERSION, '5.3', '<' ) ) {
	if ( ! function_exists( 'pado_requirements_notice' ) ) {
		function pado_requirements_notice() {
			$message = sprintf( esc_html__( 'Pado theme needs minimal WordPress version 4.3 and PHP 5.3<br>You are running version WordPress - %s, PHP - %s.<br>Please upgrade need module and try again.', 'pado' ), $GLOBALS['wp_version'], PHP_VERSION );
			printf( '<div class="notice-warning notice"><p><strong>%s</strong></p></div>', $message );
		}
	}
	add_action( 'admin_notices', 'pado_requirements_notice' );
}


/*
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( ! function_exists( 'pado_coming_soon_notice' ) ) {
	function pado_coming_soon_notice() {
		if ( cs_get_option('pado_enable_coming_soon') ) {
			?>
			<div class="notice-warning notice">
				<p><strong>
				<?php echo esc_html__( 'Your "Coming Soon" option is enabled now.', 'pado' );
				?></strong></p></div>
			<?php
		}
	}
}
add_action( 'admin_notices', 'pado_coming_soon_notice' );


// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'pado_add_gutenberg_assets' );

if ( ! function_exists( 'pado_add_gutenberg_assets' ) ) {
    function pado_add_gutenberg_assets()
    {
        // Load the theme styles within Gutenberg.
        wp_enqueue_style( 'pado-fonts', pado_fonts_url(), array(), '1.0.0' );
        wp_enqueue_style('pado-gutenberg', get_theme_file_uri('/assets/css/gutenberg-editor-style.min.css'), false);
    }
}