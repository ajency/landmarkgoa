<?php

//REGISTER POST TYPES


class Pado_Plugins {

	private $assets_js;

	public function __construct() {
		$this->assets_js  = plugins_url( '/includes/composer/js', __FILE__ );
		$this->assets_css = plugins_url( '/includes/composer/css', __FILE__ );


		add_action( 'init', array( $this, 'pado_register_portfolio' ), 0 );
		add_action( 'admin_init', array( $this, 'pado_load_map' ) );
		add_action( 'admin_print_scripts-post.php', array( $this, 'vc_enqueue_scripts' ), 99 );
		add_action( 'admin_print_scripts-post-new.php', array( $this, 'vc_enqueue_scripts' ), 99 );

		// add new params
		add_action( 'admin_init', array( $this, 'pado_load_new_params' ) );

		add_action( 'admin_init', array( $this, 'pado_load_shortcodes' ) );
		add_action( 'wp', array( $this, 'pado_load_shortcodes' ) );

		add_action( 'admin_enqueue_scripts', array($this, 'pado_wpc_date_style') );

	}

	public function pado_register_portfolio() {

		// New Post Type


		// New Post Type
		register_post_type( 'services',
			array(
				'labels' => array(
					'name' => esc_html__( 'Services','pado-plugins'),
					'singular_name' => esc_html__( 'Item','pado-plugins')
				),
				'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
				'menu_icon' => 'dashicons-welcome-write-blog',
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'service-item'),
			)
		);
		// New Taxonomy
		register_taxonomy(
			'service-category',
			'services',
			array(
				'label' => esc_html__( 'Categories','pado-plugins'),
				'rewrite' => array( 'slug' => 'service-category' ),
				'hierarchical' => true,
			)
		);


		$portfolio_url_slug = cs_get_option('portfolio_slug') ? cs_get_option('portfolio_slug') : 'portfolio-item';
		$portfolio_category_url_slug = cs_get_option('portfolio_category_slug') ? cs_get_option('portfolio_category_slug') : 'portfolio-category';

		$taxonomy_labels = array(
			'name'                       => 'Category',
			'singular_name'              => 'Category',
			'menu_name'                  => 'Categories',
			'all_items'                  => 'All Categories',
			'parent_item'                => 'Parent Category',
			'parent_item_colon'          => 'Parent Category:',
			'new_item_name'              => 'New Category Name',
			'add_new_item'               => 'Add New Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update Category',
			'separate_items_with_commas' => 'Separate categories with commas',
			'search_items'               => 'Search categories',
			'add_or_remove_items'        => 'Add or remove categories',
			'choose_from_most_used'      => 'Choose from the most used categories',
		);

		$taxonomy_rewrite = array(
			'slug'         => $portfolio_category_url_slug,
			'with_front'   => true,
			'hierarchical' => true,
		);

		$taxonomy_args = array(
			'labels'            => $taxonomy_labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'show_tagcloud'     => true,
			'rewrite'           => $taxonomy_rewrite,
		);
		register_taxonomy( 'portfolio-category', array( 'portfolio' ), $taxonomy_args );



		$taxonomy_labels = array(
			'name'                       => 'Client',
			'singular_name'              => 'Client',
			'menu_name'                  => 'Clients',
			'all_items'                  => 'All Clients',
			'parent_item'                => 'Parent Client',
			'parent_item_colon'          => 'Parent Client:',
			'new_item_name'              => 'New Client Name',
			'add_new_item'               => 'Add New Client',
			'edit_item'                  => 'Edit Client Info',
			'update_item'                => 'Update Client',
			'separate_items_with_commas' => 'Separate clients with commas',
			'search_items'               => 'Search clients',
			'add_or_remove_items'        => 'Add or remove clients',
			'choose_from_most_used'      => 'Choose from the most used clients',
		);

		$taxonomy_rewrite = array(
			'slug'         => 'portfolio-client',
			'with_front'   => true,
			'hierarchical' => true,
		);

		$taxonomy_args = array(
			'labels'            => $taxonomy_labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'show_tagcloud'     => true,
			'rewrite'           => $taxonomy_rewrite,
		);
		register_taxonomy( 'portfolio-client', array( 'portfolio' ), $taxonomy_args );


		$taxonomy_labels = array(
			'name'                       => 'Tag',
			'singular_name'              => 'Tag',
			'menu_name'                  => 'Tags',
			'all_items'                  => 'All Tags',
			'parent_item'                => 'Parent Tag',
			'parent_item_colon'          => 'Parent Tag:',
			'new_item_name'              => 'New Tag Name',
			'add_new_item'               => 'Add New Tag',
			'edit_item'                  => 'Edit Tag',
			'update_item'                => 'Update Tag',
			'separate_items_with_commas' => 'Separate categories with commas',
			'search_items'               => 'Search categories',
			'add_or_remove_items'        => 'Add or remove categories',
			'choose_from_most_used'      => 'Choose from the most used categories',
		);

		$taxonomy_rewrite = array(
			'slug'         => 'portfolio-tag',
			'with_front'   => true,
			'hierarchical' => true,
		);

		$taxonomy_args = array(
			'labels'            => $taxonomy_labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'show_tagcloud'     => true,
			'rewrite'           => $taxonomy_rewrite,
		);
		register_taxonomy( 'portfolio-tag', array( 'portfolio' ), $taxonomy_args );


		//Register new post type
		$post_type_labels = array(
			'name'               => 'Portfolio',
			'singular_name'      => 'Portfolio',
			'menu_name'          => 'Portfolio',
			'parent_item_colon'  => 'Parent Portfolio:',
			'all_items'          => 'All Portfolios',
			'view_item'          => 'View Portfolio',
			'add_new_item'       => 'Add New Portfolio',
			'add_new'            => 'Add New',
			'edit_item'          => 'Edit Portfolio',
			'update_item'        => 'Update Portfolio',
			'search_items'       => 'Search portfolios',
			'not_found'          => 'No portfolios found',
			'not_found_in_trash' => 'No portfolios found in Trash',
		);

		$post_type_rewrite = array(
			'slug'       => 'portfolio-item',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);

		$post_type_args = array(
			'label'              => 'portfolio',
			'description'        => 'Portfolio information pages',
			'labels'             => $post_type_labels,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions'),
			'taxonomies'         => array( 'post' ),
			'hierarchical'       => false,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-format-gallery',
			'has_archive'        => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => $portfolio_url_slug ),
			'capability_type'    => 'post',
		);

		register_post_type( 'portfolio', $post_type_args );

	}

	public function pado_load_map() {
		if ( class_exists( 'Vc_Manager' ) ) {
			require_once( EF_ROOT . '/' . 'includes/composer/map.php' );
			require_once( EF_ROOT . '/' . 'includes/composer/init.php' );
		}
	}

	public function pado_load_shortcodes() {

		if ( class_exists( 'Vc_Manager' ) ) {

			if ( ! function_exists( 'pado_wpc_date' ) ) {
				function pado_wpc_date($settings, $value) {
					return '<div class="date-group">'
					       . '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-date ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="text" value="' . $value . '"/>'
					       . '</div>';
				}
			}
			vc_add_shortcode_param('pado_wpc_date', 'pado_wpc_date', get_template_directory_uri() . '/assets/js/date.js');


			foreach ( glob( EF_ROOT . '/' . 'shortcodes/pado_*.php' ) as $shortcode ) {
				require_once( EF_ROOT . '/' . 'shortcodes/' . basename( $shortcode ) );
			}
			foreach ( glob( EF_ROOT . '/' . 'shortcodes/vc_*.php' ) as $shortcode ) {
				require_once( EF_ROOT . '/' . 'shortcodes/' . basename( $shortcode ) );
			}
		}

	}


	public function pado_wpc_date_style() {
		wp_enqueue_script('jquery-ui-datepicker' );
	}

	public function pado_load_new_params() {
		$params = glob( dirname( __FILE__ ) . '/params/*' , GLOB_ONLYDIR);
		foreach ( $params as $key => $name ) {
			require_once( __DIR__ . "/params/" . basename($name) . "/" . basename($name) . ".php" );
		}
	}

	public function vc_enqueue_scripts() {
        if ( class_exists( 'Vc_Manager' ) ) {
            wp_enqueue_style('pado-vc-style', EF_URL . '/includes/assets/css/vc-style.css');
            wp_enqueue_script('pado-vc-script', EF_URL . '/includes/assets/js/vc-script.js', array('jquery'), '1.0.0', true);
            wp_enqueue_script('pado-ics-gradient-editor', EF_URL . '/includes/assets/js/ics-gradient-editor.min.js', array('jquery'), '1.0.0', true);
            wp_enqueue_script('pado-vc-image-picker', EF_URL . '/includes/assets/js/vc-image-picker.js', array('jquery'), '1.0.0', true);
        }
	}



} // end of class

