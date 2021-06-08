<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package pado
 * @since 1.0
 */


if (! function_exists('pado_child_styles')) {
	function pado_child_styles(){

		// register style
		wp_enqueue_style('pado-child-css', get_stylesheet_directory_uri() . '/style.css');


	}
}
add_action( 'wp_enqueue_scripts', 'pado_child_styles');

function footer_widgets_init() {
	register_sidebar( array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Sidebar 2',
		'id' => 'footer-sidebar-2',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Sidebar 3',
		'id' => 'footer-sidebar-3',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action('widgets_init','footer_widgets_init');


/*
 * Site logo function.
 */
if ( ! function_exists( 'pado_site_logo' ) ) {
	function pado_site_logo() {
        $meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
        $meta_data_portfolio = get_post_meta(get_the_ID(), 'pado_portfolio_options', true);

        $logo_bg = isset( $meta_data['logo_bg'] ) && $meta_data['logo_bg'] ? 'logo-bg' : '';
        $logo_bg = isset( $meta_data_portfolio['logo_bg'] ) && $meta_data_portfolio['logo_bg'] ? 'logo-bg' : $logo_bg; ?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo <?php echo esc_attr($logo_bg); ?>">

			<?php
            $light_menu = ((isset($meta_data['menu_light_text']) && $meta_data['menu_light_text'] && $meta_data['style_header'] == 'transparent')
                || (isset($meta_data_portfolio['menu_light_text']) && $meta_data_portfolio['menu_light_text'] && $meta_data_portfolio['style_header'] == 'transparent' )) ? true : false;

            $logoHover         = cs_get_option('image_logo');
            $image_logo_mobile = cs_get_option('image_logo_mobile');
            $logo_alt = get_option('blogname');

            if ( apply_filters('pado_type_logo', cs_get_option('site_logo')) == 'imglogo' ) {

                if ( is_404() && cs_get_option('error_logo') ) {
                    if ( apply_filters('pado_type_logo', cs_get_option('error_site_logo')) == 'txtlogo' ) {
                        echo ' <span> ' . esc_html(cs_get_option('error_text_logo')) . '</span>';
                    } else {
                        $logo = '';
                        if ( cs_get_option('error_image_logo') ) {
                            $logo = cs_get_option('error_image_logo');
                        }
                        // logo for page
                        ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                             class="main-logo">

                        <?php if ( $logoHover ) { ?>
                            <img src="<?php echo esc_url($logoHover); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                                 class="logo-hover">
                        <?php } else { ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                                 class="logo-hover">
                        <?php }
                    }
                } else {

                    if ( isset($light_menu) && $light_menu ) {
                        $logo = cs_get_option('image_logo_light');
                    } else {
                        $logo = cs_get_option('image_logo');
                    }

                    // logo for page
                    $logo              = !empty($meta_data['image_page_logo']) ? $meta_data['image_page_logo'] : $logo;
                    $logo              = isset($meta_data_portfolio['image_page_logo']) && !empty($meta_data_portfolio['image_page_logo']) ? $meta_data_portfolio['image_page_logo'] : $logo;
                    $image_logo        = apply_filters('pado_header_logo', $logo);
                    $img_src           = !empty($image_logo) ? $image_logo : PADO_T_URI . '/assets/images/logo.png';
                    $logoHover         = isset($meta_data['image_logo_scroll']) && !empty($meta_data['image_logo_scroll']) ? $meta_data['image_logo_scroll'] : $logoHover;
                    $logoHover         = isset($meta_data_portfolio['image_logo_scroll']) && !empty($meta_data_portfolio['image_logo_scroll']) ? $meta_data_portfolio['image_logo_scroll'] : $logoHover;
                    $image_logo_mobile = isset($meta_data['image_logo_mobile']) && !empty($meta_data['image_logo_mobile']) ? $meta_data['image_logo_mobile'] : $image_logo_mobile;
                    $image_logo_mobile = isset($meta_data_portfolio['image_logo_mobile']) && !empty($meta_data_portfolio['image_logo_mobile']) ? $meta_data_portfolio['image_logo_mobile'] : $image_logo_mobile;

                    ?>
                    <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                         class="main-logo">

                    <?php if ( $logoHover ) { ?>
                        <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                             class="logo-hover">
                    <?php } else { ?>
                        <img src="<?php echo esc_url($logoHover); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                             class="logo-hover">
                    <?php } ?>
                    <img src="<?php echo esc_url($image_logo_mobile); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                         class="main-logo logo-mobile">
                    <?php
                }
            } elseif ( !function_exists('cs_framework_init') ) {
                echo '<span>' . esc_html($logo_alt) . '</span>';
            } else {
                echo '<span>' . esc_html(cs_get_option('text_logo')) . '</span>';
            } ?>
		</a>
	<?php }
}


 /* Custom login page logo
================================================== */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('wp-content/uploads/sites/15/2019/10/imageedit_38_8901892709.png');
            height:65px;
            width:320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Landmark Goa Villas';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


/* Custom login page logo - Haveli Anirudh
================================================== */
function my_login_logo1() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('/wp-content/uploads/sites/22/2021/05/site-logo.png');
            width:206px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }


function my_login_logo_url1() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url1' );

function my_login_logo_url_title1() {
    return 'Haveli Anirudh';
}

$siteurl = home_url();

if($siteurl == 'https://havelianirudh.com' ){

    add_action( 'login_enqueue_scripts', 'my_login_logo1' );
    add_filter( 'login_headertitle', 'my_login_logo_url_title1' );

}