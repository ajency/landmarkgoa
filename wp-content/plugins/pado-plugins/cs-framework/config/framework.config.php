<?php if ( !defined('ABSPATH') ) {
    die;
} // Cannot access pages directly.


// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings = array(
    'menu_title' => 'Theme Options',
    'menu_type'  => 'add_menu_page',
    'menu_slug'  => 'cs-framework',
    'ajax_save'  => false,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// ----------------------------------------
// general option section
// ----------------------------------------
$options[] = array(
    'name'   => 'general',
    'title'  => 'General',
    'icon'   => 'fa fa-globe',
    'fields' => array(
        array(
            'id'      => 'page_scroll_top',
            'type'    => 'switcher',
            'title'   => 'Enable scroll top button',
            'default' => false,
            'desc'    => 'Display the button, with a click on which the page will scroll up',
        ),
        array(
            'id'      => 'enable_lazy_load',
            'type'    => 'switcher',
            'title'   => 'Enable lazy load',
            'desc'    => 'Lazy Load delays loading of images in long web pages. Images outside of viewport will not be loaded before user scrolls to them. This option is available for Images and Maps',
            'default' => true
        ),
        array(
            'id'    => 'pado_enable_coming_soon',
            'type'  => 'switcher',
            'title' => 'Enable Coming Soon',
            'desc'  => 'Redirect on the select page when site loading',
        ),
        array(
            'id'         => 'pado_page_coming_soon',
            'type'       => 'select',
            'title'      => 'Page Coming Soon',
            'options'    => 'pages',
            'query_args' => array(
                'sort_order'  => 'ASC',
                'sort_column' => 'post_title',
            ),
            'dependency' => array('pado_enable_coming_soon', '==', 'true'),
            'desc'       => 'Choose page'
        ),
        array(
            'id'      => 'enable_copyright',
            'type'    => 'switcher',
            'title'   => 'Enable Copyright',
            'default' => false,
            'desc'    => 'Display a message when user click right button mouse on page'
        ),
        array(
            'id'         => 'text_copyright',
            'type'       => 'wysiwyg',
            'title'      => 'Text Copyright',
            'default'    => '@2018 Pado',
            'dependency' => array('enable_copyright', '==', 'true'),
            'desc'       => 'Enter your message for copyright'
        ),
        array(
            'title'   => esc_html__('Google Theme Color', 'pado'),
            'id'      => 'google_theme_color',
            'type'    => 'color_picker',
            'default' => '#004ae2',
            'desc'    => 'Applied only on Android mobile devices, click <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android" target="_blank">here</a> to learn more about this',
        ),
        array(
            'id'      => 'pado_enable_preloader',
            'type'    => 'switcher',
            'title'   => 'Enable Preloader',
            'default' => true,
            'desc'    => 'The animation which displays when the page’s content is loading'
        ),
        array(
            'id'         => 'preloader_bg',
            'type'       => 'color_picker',
            'title'      => 'Preloader background',
            'dependency' => array('pado_enable_preloader', '==', 'true'),
            'default'    => '#fff',
        ),
        array(
            'id'         => 'preloader_color',
            'type'       => 'color_picker',
            'title'      => 'Preloader color',
            'dependency' => array('pado_enable_preloader', '==', 'true'),
            'default'    => '#004ae2',
        ),
    ) // end: fields
);


// ----------------------------------------
// Header option section
// ----------------------------------------
$options[] = array(
    'name'   => 'header',
    'title'  => 'Header',
    'icon'   => 'fa fa-star',
    'fields' => array(
        array(
            'id'         => 'menu_style',
            'type'       => 'image_select',
            'title'      => 'Menu style:',
            'options'    => array(
                'simple'    => EF_URL . '/admin/assets/images/cs_images/header_simple.jpg',
                'aside'     => EF_URL . '/admin/assets/images/cs_images/header_aside.jpg',
                'full'      => EF_URL . '/admin/assets/images/cs_images/header_fullscreen.jpg',
                'only_logo' => EF_URL . '/admin/assets/images/cs_images/header_only_logo.jpg',
            ),
            'radio'      => true,
            'attributes' => array(
                'data-depend-id' => 'menu_style',
            ),
            'default'    => 'simple',
            'desc'       => 'Choose menu style'
        ),
        array(
            'id'         => 'search_on',
            'type'       => 'switcher',
            'title'      => 'Enable search button in menu?',
            'default'    => true,
            'dependency' => array('menu_style', 'any', 'simple,aside'),
            'desc'       => 'Display search button in the menu'
        ),
        array(
            'id'         => 'header_btn',
            'type'       => 'switcher',
            'title'      => 'Add button for Header?',
            'default'    => false,
            'dependency' => array('menu_style', '==', 'simple'),
            'desc'       => 'This option allows add button to header for this page'
        ),
        array(
            'id'         => 'header_btn_text',
            'type'       => 'text',
            'title'      => 'Button Name',
            'dependency' => array('header_btn|menu_style', '==|==', 'true|simple'),
            'desc'       => 'Enter text for button'
        ),
        array(
            'id'         => 'header_btn_url',
            'type'       => 'text',
            'title'      => 'Button URL',
            'dependency' => array('header_btn|menu_style', '==|==', 'true|simple'),
            'desc'       => 'Enter link for button'
        ),
        array(
            'id'         => 'header_btn_style',
            'type'       => 'select',
            'title'      => 'Select button style',
            'options'    => array(
                'a-btn-1'             => "Default Button",
                'a-btn-1 a-btn-arrow' => "Default Button with arrow",
                'a-btn-2'             => 'Default Transparent Button',
                'a-btn-2 a-btn-arrow' => 'Default Transparent Button with arrow',
                'a-btn-3'             => "Dark Button",
                'a-btn-3 a-btn-arrow' => "Dark Button with arrow",
                'a-btn-4'             => 'Dark Transparent Button',
                'a-btn-4 a-btn-arrow' => 'Dark Transparent Button with arrow',
                'a-btn-5'             => "Light Button",
                'a-btn-5 a-btn-arrow' => "Light Button with arrow",
                'a-btn-6'             => 'Light Transparent Button',
                'a-btn-6 a-btn-arrow' => 'Light Transparent Button with arrow',
                'a-btn-7'             => "White Button",
                'a-btn-7 a-btn-arrow' => "White Button with arrow",
                'a-btn-8'             => 'White Transparent Button',
                'a-btn-8 a-btn-arrow' => 'White Transparent Button with arrow',
            ),
            'dependency' => array('header_btn|menu_style', '==|==', 'true|simple'),
            'default'    => 'a-btn-1',
        ),
        array(
            'id'         => 'header_btn_style_scroll',
            'type'       => 'select',
            'title'      => 'Select button style on scroll',
            'options'    => array(
                'a-btn-1'             => "Default Button",
                'a-btn-1 a-btn-arrow' => "Default Button with arrow",
                'a-btn-2'             => 'Default Transparent Button',
                'a-btn-2 a-btn-arrow' => 'Default Transparent Button with arrow',
                'a-btn-3'             => "Dark Button",
                'a-btn-3 a-btn-arrow' => "Dark Button with arrow",
                'a-btn-4'             => 'Dark Transparent Button',
                'a-btn-4 a-btn-arrow' => 'Dark Transparent Button with arrow',
                'a-btn-5'             => "Light Button",
                'a-btn-5 a-btn-arrow' => "Light Button with arrow",
                'a-btn-6'             => 'Light Transparent Button',
                'a-btn-6 a-btn-arrow' => 'Light Transparent Button with arrow',
                'a-btn-7'             => "White Button",
                'a-btn-7 a-btn-arrow' => "White Button with arrow",
                'a-btn-8'             => 'White Transparent Button',
                'a-btn-8 a-btn-arrow' => 'White Transparent Button with arrow',
            ),
            'dependency' => array('header_btn|menu_style', '==|==', 'true|simple'),
            'default'    => 'a-btn-1',
        ),
        array(
            'id'         => 'header_btn_style_mobile',
            'type'       => 'select',
            'title'      => 'Select button style on mobile',
            'options'    => array(
                'a-btn-1'             => "Default Button",
                'a-btn-1 a-btn-arrow' => "Default Button with arrow",
                'a-btn-2'             => 'Default Transparent Button',
                'a-btn-2 a-btn-arrow' => 'Default Transparent Button with arrow',
                'a-btn-3'             => "Dark Button",
                'a-btn-3 a-btn-arrow' => "Dark Button with arrow",
                'a-btn-4'             => 'Dark Transparent Button',
                'a-btn-4 a-btn-arrow' => 'Dark Transparent Button with arrow',
                'a-btn-5'             => "Light Button",
                'a-btn-5 a-btn-arrow' => "Light Button with arrow",
                'a-btn-6'             => 'Light Transparent Button',
                'a-btn-6 a-btn-arrow' => 'Light Transparent Button with arrow',
                'a-btn-7'             => "White Button",
                'a-btn-7 a-btn-arrow' => "White Button with arrow",
                'a-btn-8'             => 'White Transparent Button',
                'a-btn-8 a-btn-arrow' => 'White Transparent Button with arrow',
            ),
            'dependency' => array('header_btn|menu_style', '==|==', 'true|simple'),
            'default'    => 'a-btn-1',
        ),
        array(
            'id'         => 'header_copyright',
            'type'       => 'textarea',
            'title'      => 'Header Copyright',
            'default'    => 'Pado &copy; ' . date('Y') . '. All Right Reserved.',
            'dependency' => array('menu_style', '==', 'aside'),
        ),
        array(
            'id'           => 'header_social',
            'type'         => 'group',
            'title'        => 'Header social links',
            'dependency'   => array('menu_style', 'any', 'aside'),
            'button_title' => 'Add New',
            'desc'         => 'Add social links for header',
            'fields'       => array(
                array(
                    'id'    => 'header_social_link',
                    'type'  => 'text',
                    'title' => 'Link'
                ),
                array(
                    'id'    => 'header_social_icon',
                    'type'  => 'icon',
                    'title' => 'Icon'
                )
            ),
            'default'      => array(
                array(
                    'header_social_link' => 'https://www.facebook.com/',
                    'header_social_icon' => 'fa fa-facebook'
                ),
                array(
                    'header_social_link' => 'https://www.pinterest.com/',
                    'header_social_icon' => 'fa fa-pinterest-p'
                ),
                array(
                    'header_social_link' => 'https://twitter.com/',
                    'header_social_icon' => 'fa fa-twitter'
                ),
                array(
                    'header_social_link' => 'https://dribbble.com/',
                    'header_social_icon' => 'fa fa-dribbble'
                ),
            )
        ),
    ) // end: fields
);

// ----------------------------------------
// Logo option section
// ----------------------------------------
$options[] = array(
    'name'   => 'logo',
    'title'  => 'Logo',
    'icon'   => 'fa fa-puzzle-piece',
    'fields' => array(
        //Site logo
        array(
            'id'      => 'site_logo',
            'type'    => 'radio',
            'title'   => 'Type of site logo',
            'options' => array(
                'txtlogo' => 'Text Logo',
                'imglogo' => 'Image Logo',
            ),
            'default' => array('txtlogo'),
            'desc'    => 'Choose type for logo'
        ),
        array(
            'id'         => 'image_logo',
            'type'       => 'upload',
            'title'      => 'Site Logo',
            'default'    => get_template_directory_uri() . '/assets/images/logo.png',
            'desc'       => 'Upload any media using the WordPress Native Uploader.',
            'dependency' => array('site_logo_imglogo', '==', 'true'),
        ),
        array(
            'id'         => 'image_logo_light',
            'type'       => 'upload',
            'title'      => 'Site Logo for Light Style',
            'default'    => get_template_directory_uri() . '/assets/images/logo.png',
            'desc'       => 'Upload any media using the WordPress Native Uploader.',
            'dependency' => array('site_logo_imglogo', '==', 'true'),
        ),
        array(
            'id'         => 'image_logo_mobile',
            'type'       => 'upload',
            'title'      => 'Site Logo for Mobile',
            'default'    => get_template_directory_uri() . '/assets/images/logo.png',
            'desc'       => 'Upload any media using the WordPress Native Uploader.',
            'dependency' => array('site_logo_imglogo', '==', 'true'),
        ),
        array(
            'id'         => 'text_logo',
            'type'       => 'text',
            'title'      => 'Text Logo',
            'default'    => 'Pado',
            'sanitize'   => 'textarea',
            'dependency' => array('site_logo_txtlogo', '==', 'true'),
            'desc'       => 'Enter text for logo'
        ),
        array(
            'id'         => 'text_logo_style',
            'type'       => 'radio',
            'title'      => 'Text logo style',
            'options'    => array(
                'default' => 'Default',
                'custom'  => 'Custom',
            ),
            'default'    => array('default'),
            'dependency' => array('site_logo_txtlogo', '==', 'true'),
            'desc'       => 'Choose style for logo'
        ),
        array(
            'id'         => 'text_logo_width',
            'type'       => 'text',
            'title'      => 'Max width logo section',
            'default'    => '70px',
            'dependency' => array('text_logo_style_custom|site_logo_txtlogo', '==|==', 'true|true'),
            'desc'       => 'Enter max width (in px)'
        ),
        array(
            'id'         => 'text_logo_color',
            'type'       => 'color_picker',
            'title'      => 'Text Logo Color',
            'default'    => '#fff',
            'dependency' => array('text_logo_style_custom|site_logo_txtlogo', '==|==', 'true|true'),
            'desc'       => 'Choose color for logo'
        ),
        array(
            'id'         => 'text_logo_font_size',
            'type'       => 'text',
            'title'      => 'Text logo font size',
            'default'    => '20px',
            'dependency' => array('text_logo_style_custom|site_logo_txtlogo', '==|==', 'true|true'),
            'desc'       => 'Enter font size (in px). By default the logo have 20px font size'
        ),
        array(
            'id'         => 'img_logo_style',
            'type'       => 'radio',
            'title'      => 'Image logo style',
            'options'    => array(
                'default' => 'Default',
                'custom'  => 'Custom',
            ),
            'default'    => array('default'),
            'dependency' => array('site_logo_imglogo', '==', 'true'),
            'desc'       => 'Choose style for logo'
        ),
        array(
            'id'         => 'img_logo_width',
            'type'       => 'text',
            'title'      => 'Site Logo Width Size',
            'desc'       => 'Enter width size (in px). By default the logo have 60px width size',
            'dependency' => array('img_logo_style_custom|site_logo_imglogo', '==|==', 'true|true')
        ),
        array(
            'id'         => 'img_logo_height',
            'type'       => 'text',
            'title'      => 'Site Logo Height Size',
            'desc'       => 'Enter height size (in px). By default the logo have 52px height size',
            'dependency' => array('img_logo_style_custom|site_logo_imglogo', '==|==', 'true|true')
        ),
    ) // end: fields
);

// Typography
$options[] = array(
    'name'   => 'typography',
    'title'  => 'Typography',
    'icon'   => 'fa fa-font',
    'fields' => array(

        array(
            'type'    => 'heading',
            'content' => 'Typography Headings',
        ),
        array(
            'id'              => 'heading',
            'type'            => 'group',
            'title'           => 'Typography Headings',
            'button_title'    => 'Add New',
            'accordion_title' => 'Add New',
            'desc'            => 'This option allows change headings style',

            // begin: fields
            'fields'          => array(

                // header size
                array(
                    'id'      => 'heading_tag',
                    'type'    => 'select',
                    'title'   => 'Title Tag',
                    'options' => array(
                        'h1' => esc_html__('H1', 'pado'),
                        'h2' => esc_html__('H2', 'pado'),
                        'h3' => esc_html__('H3', 'pado'),
                        'h4' => esc_html__('H4', 'pado'),
                        'h5' => esc_html__('H5', 'pado'),
                        'h6' => esc_html__('H6', 'pado'),
                        'p'  => esc_html__('Paragraph', 'pado'),
                    ),
                ),

                // font family
                array(
                    'id'      => 'heading_family',
                    'type'    => 'typography',
                    'title'   => 'Font Family',
                    'default' => array(
                        'family'  => 'Open Sans',
                        'variant' => 'regular',
                        'font'    => 'google', // this is helper for output
                    ),
                ),

                // font size
                array(
                    'id'      => 'heading_size',
                    'type'    => 'text',
                    'title'   => 'Font Size (in px)',
                    'default' => '54px',
                ),
            ),
        ),

        array(
            'type'    => 'heading',
            'content' => 'Typography Menu',
        ),
        // menu
        array(
            'id'      => 'menu_item_family',
            'type'    => 'typography',
            'title'   => 'Menu Item Font Family',
            'default' => array(
                'family'  => 'Montserrat',
                'variant' => 'regular',
                'font'    => 'google', // this is helper for output
            ),
            'desc'    => 'This option allows change font family for menu item'
        ),

        // font size
        array(
            'id'      => 'menu_item_size',
            'type'    => 'text',
            'title'   => 'Menu Item Font Size',
            'default' => '',
            'desc'    => 'This option allows change font size for menu item (in px)'
        ),

        // line height
        array(
            'id'      => 'menu_line_height',
            'type'    => 'text',
            'title'   => 'Menu Line Height',
            'default' => '',
            'desc'    => 'This option allows change line height for menu item'
        ),

        //submenu
        array(
            'id'      => 'submenu_item_family',
            'type'    => 'typography',
            'title'   => 'Submenu Item Font Family',
            'default' => array(
                'family'  => 'Montserrat',
                'variant' => 'regular',
                'font'    => 'google', // this is helper for output
            ),
            'desc'    => 'This option allows change font family for submenu item'
        ),

        // font size
        array(
            'id'      => 'submenu_item_size',
            'type'    => 'text',
            'title'   => 'Submenu Item Font Size',
            'default' => '',
            'desc'    => 'This option allows change font size for submenu item (in px)'
        ),

        // line height
        array(
            'id'      => 'submenu_line_height',
            'type'    => 'text',
            'title'   => 'Submenu Line Height',
            'default' => '',
            'desc'    => 'This option allows change line height for submenu item'
        ),
        array(
            'type'    => 'heading',
            'content' => 'Typography Button',
        ),

        array(
            'id'      => 'all_button_font_family',
            'type'    => 'typography',
            'title'   => 'Button Font Family',
            'default' => array(
                'family'  => '',
                'variant' => 'regular',
                'font'    => 'websafe', // this is helper for output
            ),
            'desc'    => 'This option allows change font family for button'
        ),

        // font size
        array(
            'id'      => 'all_button_font_size',
            'type'    => 'text',
            'title'   => 'Button Font Size',
            'default' => '',
            'desc'    => 'This option allows change font size for button (in px)'
        ),

        // line height
        array(
            'id'      => 'all_button_line_height',
            'type'    => 'text',
            'title'   => 'Button Line Height',
            'default' => '',
            'desc'    => 'This option allows change line height for button'
        ),

        // font color
        array(
            'id'      => 'all_button_letter_spacing',
            'type'    => 'text',
            'title'   => 'Letter Spacing',
            'default' => '',
            'desc'    => 'This option allows change letter spacing for button (in px)'
        ),
        array(
            'type'    => 'heading',
            'content' => 'Typography Link',
        ),

        array(
            'id'      => 'all_links_font_family',
            'type'    => 'typography',
            'title'   => 'Link Font Family',
            'default' => array(
                'family'  => '',
                'variant' => 'regular',
                'font'    => 'websafe', // this is helper for output
            ),
            'desc'    => 'This option allows change font family for link'
        ),

        // font size
        array(
            'id'      => 'all_links_font_size',
            'type'    => 'text',
            'title'   => 'Link Font Size',
            'default' => '',
            'desc'    => 'This option allows change font size for link (in px)'
        ),

        // line height
        array(
            'id'      => 'all_links_line_height',
            'type'    => 'text',
            'title'   => 'Link Line Height',
            'default' => '',
            'desc'    => 'This option allows change line height for link'
        ),

        // font color
        array(
            'id'      => 'all_links_letter_spacing',
            'type'    => 'text',
            'title'   => 'Link Letter Spacing',
            'default' => '',
            'desc'    => 'This option allows change letter spacing for link (in px)'
        ),
    ),
);

// ----------------------------------------
// Custom color
// ----------------------------------------
$options[] = array(
    'name'   => 'theme_colors',
    'title'  => 'Theme Color',
    'icon'   => 'fa fa-magic',
    // begin: fields
    'fields' => array(
        array(
            'id'      => 'change_colors',
            'type'    => 'switcher',
            'title'   => 'Change colors?',
            'default' => false,
            'desc'    => 'This option allows change theme color'
        ),
        array(
            'id'         => 'menu_font_color',
            'type'       => 'color_picker',
            'title'      => 'Primary Menu Font Color',
            'default'    => '#222222',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change menu font color'
        ),
        array(
            'id'         => 'menu_font_color_2',
            'type'       => 'color_picker',
            'title'      => 'Secondary Menu Font Color',
            'default'    => '#999',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change menu font color'
        ),
        array(
            'id'         => 'menu_bg_color',
            'type'       => 'color_picker',
            'title'      => 'Menu Background Color',
            'default'    => '#ffffff',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change menu background color'
        ),
        array(
            'id'         => 'submenu_bg_color',
            'type'       => 'color_picker',
            'title'      => 'Submenu Background Color',
            'default'    => '#ffffff',
            'desc'       => 'This option allows change submenu background color (not for full menu style)',
            'dependency' => array('change_colors', '==', 'true'),
        ),
        array(
            'id'         => 'menu_bg_color_scroll',
            'type'       => 'color_picker',
            'title'      => 'Menu Background Color On Scroll',
            'default'    => '#ffffff',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change menu background color on scroll'
        ),
        array(
            'id'         => 'front_color_1',
            'type'       => 'color_picker',
            'title'      => 'First Front Color',
            'default'    => '#222222',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change first front color'
        ),
        array(
            'id'         => 'front_color_2',
            'type'       => 'color_picker',
            'title'      => 'Second Front Color',
            'default'    => '#999999',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change second front color'
        ),
        array(
            'id'         => 'front_color_3',
            'type'       => 'color_picker',
            'title'      => 'Third Front Color',
            'default'    => '#eeeeee',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change third front color'
        ),
        array(
            'id'         => 'light_color',
            'type'       => 'color_picker',
            'title'      => 'Light Color',
            'default'    => '#ffffff',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change light color'
        ),
        array(
            'id'         => 'base_color_1',
            'type'       => 'color_picker',
            'title'      => 'Base Color',
            'default'    => '#004ae2',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change first base color'
        ),
        array(
            'id'         => 'footer_bg_color',
            'type'       => 'color_picker',
            'title'      => 'Footer Background Color',
            'default'    => '#222222',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change footer background color'
        ),
        array(
            'id'         => 'footer_text_color',
            'type'       => 'color_picker',
            'title'      => 'Footer Text Color',
            'default'    => '#ffffff',
            'dependency' => array('change_colors', '==', 'true'),
            'desc'       => 'This option allows change footer text color'
        ),
    ), // end: fields
);

// ----------------------------------------
// Blog option section
// ----------------------------------------
$options[] = array(
    'name'   => 'blog',
    'title'  => 'Blog',
    'icon'   => 'fa fa-newspaper-o',
    'fields' => array(
        array(
            'id'      => 'sidebar',
            'type'    => 'checkbox',
            'title'   => 'Show sidebar on pages:',
            'options' => array(
                'post' => 'Post',
                'blog' => 'Blog'
            )
        ),
        array(
            'id'      => 'sidebar_position',
            'type'    => 'select',
            'title'   => 'Sidebar Position',
            'options' => array(
                'left_sidebar'  => 'Left Sidebar',
                'right_sidebar' => 'Right Sidebar',
            ),
        ),
        array(
            'id'         => 'blog_type',
            'type'       => 'image_select',
            'title'      => 'Blog Style:',
            'options'    => array(
                'masonry' => EF_URL . '/admin/assets/images/cs_images/blog-masonry.jpg',
                'center' => EF_URL . '/admin/assets/images/cs_images/blog-center.jpg',
                'metro'  => EF_URL . '/admin/assets/images/cs_images/blog-metro.jpg',
            ),
            'radio'      => true,
            'attributes' => array(
                'data-depend-id' => 'blog_type',
            ),
            'default'    => 'masonry',
            'desc'       => 'Choose style for blog'
        ),
        array(
            'id'      => 'blog_title',
            'type'    => 'text',
            'title'   => 'Blog title',
            'default' => 'Blog',
            'desc'    => 'Enter title for blog'
        ),
        array(
            'id'      => 'blog_categories_show',
            'type'    => 'switcher',
            'title'   => 'Show posts from not all categories?',
            'default' => false,
            'desc'    => 'This option allows show posts in blog from not all categories'
        ),
        array(
            'id'         => 'blog_categories',
            'type'       => 'select',
            'title'      => 'Show posts from categories:',
            'options'    => pado_element_values('post_category'),
            'attributes' => array(
                'multiple' => 'multiple',
            ),
            'dependency' => array('blog_categories_show', '==', true),
            'desc'       => 'Select categories for showing posts in blog'
        ),
        array(
            'id'      => 'fixed_transparent_menu_blog',
            'type'    => 'switcher',
            'title'   => 'Transparent header for single post',
            'default' => false,
            'desc'    => 'Turning on transparent header for single post'
        ),
        array(
            'id'      => 'pado_social_post',
            'type'    => 'switcher',
            'title'   => 'Social sharing in posts',
            'default' => false,
            'desc'    => 'Display social sharing buttons'
        ),
        array(
            'id'      => 'pado_post_tags',
            'type'    => 'switcher',
            'title'   => 'Tags in posts',
            'default' => false,
            'desc'    => 'Display tags in posts'
        ),
        array(
            'id'      => 'pado_post_cat',
            'type'    => 'switcher',
            'title'   => 'Categories in posts',
            'default' => false,
            'desc'    => 'Display categories in posts'
        ),
        array(
            'id'      => 'pado_post_author',
            'type'    => 'switcher',
            'title'   => 'Author in post details page',
            'default' => false,
            'desc'    => 'Display author in post details page'
        ),
        array(
            'id'      => 'post_author_info',
            'type'    => 'switcher',
            'title'   => "Biographical Info from User's profile",
            'default' => true,
            'desc'    => 'Display biographical info from user\'s profile in post details page'
        ),

    ) // end: fields
);


// ----------------------------------------
// Portfolio option section
// ----------------------------------------
$options[] = array(
    'name'   => 'portfolio',
    'title'  => 'Portfolio',
    'icon'   => 'fa fa-file-text-o',
    'fields' => array(
        array(
            'id'      => 'social_portfolio',
            'type'    => 'switcher',
            'title'   => 'Social sharing in portfolio',
            'default' => true,
            'desc'    => 'Display social sharing buttons (for all portfolios)'
        ),
        array(
            'id'      => 'navigation_portfolio',
            'type'    => 'switcher',
            'title'   => 'Navigation in portfolio',
            'default' => true,
            'desc'    => 'Display navigation buttons (for all portfolios)'
        ),
        array(
            'id'      => 'portfolio_protect_title',
            'type'    => 'textarea',
            'title'   => 'Portfolio protected text',
            'default' => '',
            'desc'    => 'Enter text for portfolio protected page'
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => 'Portfolio Url Slug',
            'default' => '',
            'desc'    => 'This option allows change portfolio url slug. Please update <a href="' . home_url('wp-admin/options-permalink.php') . '">permalinks</a> after this. '
        ),
        array(
            'id'      => 'portfolio_category_slug',
            'type'    => 'text',
            'title'   => 'Portfolio Url Category Slug',
            'default' => '',
            'desc'    => 'This option allows change portfolio url category slug. Please update <a href="' . home_url('wp-admin/options-permalink.php') . '">permalinks</a> after this. '
        ),
    ) // end: fields
);


// ----------------------------------------
// Ecommerce
// ----------------------------------------
$options[] = array(
    'name'   => 'ecommerce_options',
    'title'  => 'Ecommerce',
    'icon'   => 'fa fa-shopping-cart',
    // begin: fields
    'fields' => array(
        array(
            'id'      => 'products_per_row',
            'type'    => 'select',
            'title'   => 'Products per row',
            'options' => array(
                '4' => 'Three columns',
                '3' => 'Four columns',
                '6' => 'Two columns',
            ),
            'default' => '4',
            'desc'    => 'Select count columns per row for products'
        ),
        array(
            'id'      => 'shop_cart_on',
            'type'    => 'switcher',
            'title'   => 'Enable shop cart in menu?',
            'default' => true,
            'desc'    => 'Display shop cart button in menu'
        ),
        array(
            'id'      => 'enable_sidebar_ecommerce',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Shop',
            'default' => true,
            'desc'    => 'Display sidebar on shop page (product list page)'
        ),
        array(
            'id'      => 'shop_image_banner',
            'type'    => 'upload',
            'title'   => 'Image Banner for Shop',
            'desc'    => 'Upload image for banner'
        ),
        array(
            'id'      => 'light_banner_text',
            'type'    => 'switcher',
            'title'   => 'Enable Light text for Banner',
            'default' => false,
            'desc'    => 'Enable light text for font'
        ),
        array(
            'id'      => 'disable_container_full',
            'type'    => 'switcher',
            'title'   => 'Full width container',
            'default' => true,
            'desc'    => 'Disable full width container'
        ),
        array(
            'id'      => 'enable_sidebar_ecommerce_detail',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Product Detail Page',
            'default' => true,
            'desc'    => 'Display sidebar on product detail page'
        ),
        array(
            'id'      => 'enable_socials_share',
            'type'    => 'switcher',
            'title'   => 'Enable Socials share on product detail page',
            'default' => true,
            'desc'    => 'Display social sharing buttons'
        ),
        array(
            'id'      => 'ecommerce_subtitle_recent',
            'type'    => 'text',
            'title'   => 'Subtitle for recent products',
            'default' => '',
            'desc'    => 'Enter subtitle for recent products'
        ),
    ),
);


// ----------------------------------------
// Footer option section                  -
// ----------------------------------------
$options[] = array(
    'name'   => 'footer',
    'title'  => 'Footer',
    'icon'   => 'fa fa-copyright',
    'fields' => array(
        array(
            'id'         => 'pado_footer_style',
            'type'       => 'image_select',
            'title'      => 'Footer style:',
            'options'    => array(
                'modern'  => EF_URL . '/admin/assets/images/cs_images/footer_modern.jpg',
                'classic' => EF_URL . '/admin/assets/images/cs_images/footer_classic.jpg',
            ),
            'radio'      => true,
            'attributes' => array(
                'data-depend-id' => 'pado_footer_style',
            ),
            'default'    => 'modern',
            'desc'       => 'Choose footer style'
        ),
        array(
            'id'         => 'footer_logo_radio',
            'type'       => 'radio',
            'title'      => 'Type of footer logo',
            'dependency' => array('pado_footer_style', '==', 'classic'),
            'options'    => array(
                'imglogo' => 'Image Logo',
                'txtlogo' => 'Text Logo',
            ),
            'default'    => array('imglogo'),
        ),
        array(
            'id'         => 'footer_logo',
            'type'       => 'upload',
            'title'      => 'Footer Logo for classic style',
            'desc'       => 'Upload any media using the WordPress Native Uploader.',
            'dependency' => array('pado_footer_style|footer_logo_radio_imglogo', '==|==', 'classic|true'),
            'default'    => get_template_directory_uri() . '/assets/images/logo.png',
        ),
        array(
            'id'         => 'footer_logo_text',
            'type'       => 'text',
            'title'      => 'Footer Logo',
            'dependency' => array('pado_footer_style|footer_logo_radio_txtlogo', '==|==', 'classic|true'),
        ),
        array(
            'id'       => 'footer_text',
            'type'     => 'wysiwyg',
            'title'    => 'Copyright text',
            'settings' => array(
                'textarea_rows' => 5,
                'media_buttons' => false,
            ),
            'default'  => 'Pado &copy; ' . date('Y') . '. Development with love by <a href="https://themeforest.net/user/truethemes">TrueThemes</a>',
            'desc'     => 'Enter copyright text for footer. Will be use for modern and classic footer styles'
        ),
        array(
            'id'         => 'pado_copyright_align',
            'type'       => 'select',
            'title'      => 'Copyright align',
            'options'    => array(
                'left'   => 'Left',
                'center' => 'Center',
                'right'  => 'Right',
            ),
            'dependency' => array('pado_footer_style', '==', 'modern'),
            'desc'       => 'Select align for copyright',
        ),
        array(
            'id'           => 'footer_social',
            'type'         => 'group',
            'title'        => 'Footer social links',
            'button_title' => 'Add New',
            'desc'         => 'Add social links for footer. Will be use for modern and classic footer styles',
            'fields'       => array(
                array(
                    'id'    => 'footer_social_link',
                    'type'  => 'text',
                    'title' => 'Link'
                ),
                array(
                    'id'    => 'footer_social_icon',
                    'type'  => 'icon',
                    'title' => 'Icon'
                )
            ),
            'default'      => array(
                array(
                    'footer_social_link' => 'https://www.facebook.com/',
                    'footer_social_icon' => 'fa fa-facebook'
                ),
                array(
                    'footer_social_link' => 'https://twitter.com/',
                    'footer_social_icon' => 'fa fa-twitter'
                ),
                array(
                    'footer_social_link' => 'https://instagram.com/',
                    'footer_social_icon' => 'fa fa-instagram'
                ),
                array(
                    'footer_social_link' => 'https://dribbble.com/',
                    'footer_social_icon' => 'fa fa-dribbble'
                ),
                array(
                    'footer_social_link' => 'https://www.pinterest.com/',
                    'footer_social_icon' => 'fa fa-pinterest-p'
                ),
            ),
        ),
        array(
            'id'         => 'pado_socials_align',
            'type'       => 'select',
            'title'      => 'Socials align',
            'options'    => array(
                'left'   => 'Left',
                'center' => 'Center',
                'right'  => 'Right',
            ),
            'default'    => 'right',
            'dependency' => array('pado_footer_style', '==', 'modern'),
        ),
        array(
            'id'      => 'enable_footer_white',
            'type'    => 'switcher',
            'title'   => 'Enable Light Footer',
            'default' => false,
            'desc'    => 'Turning on Light footer'
        ),
        array(
            'id'      => 'enable_parallax_footer',
            'type'    => 'switcher',
            'title'   => 'Enable Parallax Footer',
            'default' => false,
            'desc'    => 'Turning on Parallax footer'
        ),

    ) // end: fields
);

// ----------------------------------------
// Custom Css and JavaScript
// ----------------------------------------
$options[] = array(
    'name'   => 'custom_css',
    'title'  => 'Custom JavaScript',
    'icon'   => 'fa fa-paint-brush',
    'fields' => array(
        array(
            'id'    => 'custom_js_scripts',
            'desc'  => 'Only JS code, without tag &lt;script&gt;.',
            'type'  => 'textarea',
            'title' => 'Custom JavaScript code'
        )
    )
);
// ----------------------------------------
// 404 Page                               -
// ----------------------------------------
$options[] = array(
    'name'   => 'error_page',
    'title'  => '404 Page',
    'icon'   => 'fa fa-bolt',

    // begin: fields
    'fields' => array(
        array(
            'id'      => 'error_logo',
            'type'    => 'switcher',
            'title'   => 'Change logo for 404 page',
            'default' => false,
            'desc'    => 'This option allows change logo'
        ),
        array(
            'id'         => 'error_site_logo',
            'type'       => 'radio',
            'title'      => 'Type of site logo',
            'options'    => array(
                'txtlogo' => 'Text Logo',
                'imglogo' => 'Image Logo',
            ),
            'default'    => array('imglogo'),
            'dependency' => array('error_logo', '==', true),
            'desc'       => 'Choose type for logo'
        ),
        array(
            'id'         => 'error_text_logo',
            'type'       => 'text',
            'title'      => 'Text Logo',
            'default'    => 'Pado',
            'sanitize'   => 'textarea',
            'dependency' => array('error_site_logo_txtlogo|error_logo', '==|==', 'true|true'),
            'desc'       => 'Enter text for logo'
        ),
        array(
            'id'         => 'error_image_logo',
            'type'       => 'upload',
            'title'      => 'Image Logo',
            'default'    => get_template_directory_uri() . '/assets/images/logo.png',
            'desc'       => 'Upload any media using the WordPress Native Uploader.',
            'dependency' => array('error_site_logo_imglogo|error_logo', '==|==', 'true|true'),
        ),
        array(
            'id'      => 'error_title',
            'type'    => 'text',
            'title'   => 'Error Title',
            'default' => 'Page not found',
            'desc'    => 'Enter title'
        ),
        array(
            'id'      => 'error_subtitle',
            'type'    => 'text',
            'title'   => 'Error Subtitle',
            'default' => '',
            'desc'    => 'Enter subtitle'
        ),
        array(
            'id'      => 'enable_search_404',
            'type'    => 'switcher',
            'title'   => 'Enable Search Form',
            'default' => false,
        ),
        array(
            'id'      => 'error_btn_text',
            'type'    => 'textarea',
            'title'   => 'Error button text',
            'default' => 'Go home',
            'desc'    => 'Enter button text'
        ),
        array(
            'id'      => 'btn_style',
            'type'    => 'select',
            'title'   => 'Button Style',
            'options' => array(
                'a-btn-1'                => "Default Button",
                'a-btn-1 a-btn-arrow'    => "Default Button with arrow",
                'a-btn-2'                => 'Default Transparent Button',
                'a-btn-2 a-btn-arrow'    => 'Default Transparent Button with arrow',
                'a-btn-3'                => "Dark Button",
                'a-btn-3 a-btn-arrow'    => "Dark Button with arrow",
                'a-btn-4'                => 'Dark Transparent Button',
                'a-btn-4 a-btn-arrow'    => 'Dark Transparent Button with arrow',
                'a-btn-5'                => "Light Button",
                'a-btn-5 a-btn-arrow'    => "Light Button with arrow",
                'a-btn-6'                => 'Light Transparent Button',
                'a-btn-6 a-btn-arrow'    => 'Light Transparent Button with arrow',
                'a-btn-7'                => "White Button",
                'a-btn-7 a-btn-arrow'    => "White Button with arrow",
                'a-btn-8'                => 'White Transparent Button',
                'a-btn-8 a-btn-arrow'    => 'White Transparent Button with arrow',
                'a-btn-link'             => 'Default link',
                'a-btn-link a-btn-arrow' => 'Default link with arrow',
            ),
            'desc'    => 'Change button style'
        ),
        array(
            'id'      => 'image_404',
            'type'    => 'upload',
            'title'   => '404 page background',
            'default' => get_template_directory_uri() . '/assets/images/404.jpg',
            'desc'    => 'Select background image'
        ),
    ) // end: fields
);
// ----------------------------------------
// Backup
// ----------------------------------------
$options[] = array(
    'name'   => 'backup_section',
    'title'  => 'Backup',
    'icon'   => 'fa fa-shield',

    // begin: fields
    'fields' => array(

        array(
            'type'    => 'notice',
            'class'   => 'warning',
            'content' => 'You can save your current options. Download a Backup and Import.',
        ),

        array(
            'type' => 'backup',
        ),

    )  // end: fields
);

CSFramework::instance($settings, $options);