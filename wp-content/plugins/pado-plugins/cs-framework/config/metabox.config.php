<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access pages directly.


$options = array();

$options[] = array(
    'id'        => 'pado_post_options',
    'title'     => 'Post preview settings',
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'   => 'section_3',
            'fields' => array(
                array(
                    'id'      => 'post_preview_style',
                    'type'    => 'select',
                    'title'   => 'Preview style',
                    'options' => array(
                        'image'  => 'Post image',
                        'text'   => 'Quote',
                        'audio'  => 'Soundcloud audio',
                        'video'  => 'Video',
                        'slider' => 'Image slider',
                        'link'   => 'Link'
                    ),
                    'default' => array('image')
                ),

                array(
                    'id'         => 'post_preview_text',
                    'type'       => 'wysiwyg',
                    'title'      => 'Post preview text',
                    'dependency' => array('post_preview_style', '==', 'text')
                ),
                array(
                    'id'         => 'post_preview_author',
                    'type'       => 'text',
                    'title'      => 'Author',
                    'dependency' => array('post_preview_style', '==', 'text')
                ),
                array(
                    'id'         => 'post_preview_link',
                    'type'       => 'text',
                    'title'      => 'Link',
                    'dependency' => array('post_preview_style', '==', 'link')
                ),
                array(
                    'id'         => 'post_preview_audio',
                    'type'       => 'wysiwyg',
                    'title'      => 'Soundcloud iframe',
                    'dependency' => array('post_preview_style', '==', 'audio')
                ),
                array(
                    'id'         => 'post_preview_video',
                    'type'       => 'text',
                    'title'      => 'Video url from Youtube',
                    'dependency' => array('post_preview_style', '==', 'video')
                ),
                array(
                    'id'          => 'post_preview_slider',
                    'type'        => 'gallery',
                    'title'       => 'Slider images',
                    'add_title'   => 'Add Images',
                    'edit_title'  => 'Edit Images',
                    'clear_title' => 'Remove Images',
                    'dependency'  => array('post_preview_style', '==', 'slider')
                ),
                array(
                    'id'      => 'pado_navigation_posts',
                    'type'    => 'switcher',
                    'title'   => 'Navigation in post item',
                    'default' => true
                ),
            )
        )
    )
);

$options[] = array(
    'id'        => 'pado_portfolio_options',
    'title'     => 'Portfolio details',
    'post_type' => 'portfolio',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
        array(
            'name'   => 'section_5',
            'title'  => 'Portfolio General Options',
            'fields' => array(

                array(
                    'id'         => 'portfolio_style',
                    'type'       => 'image_select',
                    'title'      => 'Style for gallery:',
                    'options'    => array(
                        'parallax'       => EF_URL . '/admin/assets/images/cs_images/portfolio-parallax.jpg',
                        'full_images'    => EF_URL . '/admin/assets/images/cs_images/portfolio-full-images.jpg',
                        'simple_slider'  => EF_URL . '/admin/assets/images/cs_images/portfolio-simple-slider.jpg',
                        'simple_gallery' => EF_URL . '/admin/assets/images/cs_images/portfolio-simple.jpg',
                        'left_gallery'   => EF_URL . '/admin/assets/images/cs_images/portfolio-left.jpg',
                        'alia'           => EF_URL . '/admin/assets/images/cs_images/portfolio-alia.jpg',
                        'tile_info'      => EF_URL . '/admin/assets/images/cs_images/portfolio-tile-info.jpg',
                        'menio'          => EF_URL . '/admin/assets/images/cs_images/portfolio-menio.jpg',
                        'urban'          => EF_URL . '/admin/assets/images/cs_images/portfolio-urban.jpg',
                    ),
                    'radio'      => true,
                    'attributes' => array(
                        'data-depend-id' => 'portfolio_style',
                    ),
                    'default'    => 'parallax',
                    'desc'       => 'Choose gallery style for portfolio'
                ),
                array(
                    'id'          => 'slider',
                    'type'        => 'gallery',
                    'title'       => 'Image gallery',
                    'add_title'   => 'Add Images',
                    'edit_title'  => 'Edit Images',
                    'clear_title' => 'Remove Images',
                    'desc'        => 'Add images for gallery'
                ),
                array(
                    'id'      => 'portfolio_img_size',
                    'type'    => 'select',
                    'title'   => 'Size for images',
                    'options' => array_merge(array('full'), get_intermediate_image_sizes()),
                    'default' => 'full',
                    'desc'    => 'Select size for images of gallery'
                ),
                array(
                    'id'         => 'additional_title',
                    'type'       => 'text',
                    'title'      => 'Additional title for content text',
                    'default'    => '',
                    'dependency' => array('portfolio_style', '==', 'alia'),
                    'desc'       => 'Enter addition title for this portfolio page'
                ),
                array(
                    'id'         => 'additional_text',
                    'type'       => 'textarea',
                    'title'      => 'Additional text',
                    'default'    => '',
                    'dependency' => array('portfolio_style', 'any', 'alia,menio'),
                    'desc'       => 'Enter addition text for this portfolio page'
                ),
                array(
                    'id'          => 'images',
                    'type'        => 'gallery',
                    'title'       => 'Additional gallery',
                    'add_title'   => 'Add Images',
                    'edit_title'  => 'Edit Images',
                    'clear_title' => 'Remove Images',
                    'dependency'  => array('portfolio_style', 'any', 'simple_slider,alia,menio'),
                    'desc'        => 'Add addition gallery for this portfolio page'
                ),
                array(
                    'id'         => 'blockquote',
                    'type'       => 'textarea',
                    'title'      => 'Blockquote text',
                    'default'    => '',
                    'dependency' => array('portfolio_style', 'any', 'simple_slider,urban,tile_info,menio'),
                    'desc'       => 'Enter blockquote text for this portfolio page'
                ),
                array(
                    'id'         => 'blockquote_author',
                    'type'       => 'text',
                    'title'      => 'Blockquote author',
                    'default'    => '',
                    'dependency' => array('portfolio_style', 'any', 'simple_slider,urban,tile_info,menio'),
                    'desc'       => 'Enter blockquote author for this portfolio page'
                ),
                array(
                    'id'         => 'enable_recent_posts',
                    'type'       => 'switcher',
                    'title'      => 'Enable Recent Posts?',
                    'default'    => true,
                    'dependency' => array('portfolio_style', 'any', 'tile_info,menio'),
                    'desc'       => 'Turning on recent posts for this portfolio page'
                ),
                array(
                    'id'         => 'recent_subtitle',
                    'type'       => 'text',
                    'title'      => 'Subtitle for recent posts',
                    'default'    => '',
                    'dependency' => array('portfolio_style|enable_recent_posts', 'any|==', 'menio,tile_info|true'),
                    'desc'       => 'Enter subtitle for recent posts of this portfolio page'
                ),
                array(
                    'id'         => 'recent_title',
                    'type'       => 'text',
                    'title'      => 'Title for recent posts',
                    'default'    => '',
                    'dependency' => array('portfolio_style|enable_recent_posts', 'any|==', 'menio,tile_info|true'),
                    'desc'       => 'Enter title for recent posts of this portfolio page'
                ),
                array(
                    'id' => 'parallax_mobile',
                    'type' => 'switcher',
                    'title' => 'Enable parallax on mobile devices?',
                    'default' => false,
                    'dependency' => array('portfolio_style', '==', 'parallax'),
                ),
                array(
                    'id'      => 'pado_social_portfolio',
                    'type'    => 'switcher',
                    'title'   => 'Social sharing in portfolio post',
                    'default' => true,
                    'desc'    => 'Turning on social sharing buttons for this portfolio post',
                    'dependency' => array('portfolio_style', 'any', 'parallax,simple_slider,left_gallery,alia,tile_info,menio,urban'),
                ),
                array(
                    'id'         => 'portfolio_btn',
                    'type'       => 'text',
                    'title'      => 'Additional button',
                    'default'    => '',
                    'dependency' => array('portfolio_style', 'any', 'left_gallery,simple,simple_slider,urban,alia'),
                    'desc'       => 'Enter additional button text for this portfolio page'
                ),
                array(
                    'id'         => 'portfolio_btn_url',
                    'type'       => 'text',
                    'title'      => 'Additional button URL',
                    'default'    => '',
                    'dependency' => array('portfolio_style', 'any', 'left_gallery,simple,simple_slider,urban,alia'),
                    'desc'       => 'Enter additional button URL for this portfolio page'
                ),
                array(
                    'id'         => 'btn_style',
                    'type'       => 'select',
                    'title'      => 'Button style',
                    'options'    => array(
                        'a-btn a-btn-1'                => 'Default',
                        'a-btn a-btn-1 a-btn-arrow'    => 'Default with arrow',
                        'a-btn a-btn-2'                => 'Default Transparent',
                        'a-btn a-btn-2 a-btn-arrow'    => 'Default Transparent with arrow',
                        'a-btn a-btn-3'                => 'Dark',
                        'a-btn a-btn-3 a-btn-arrow'    => 'Dark with arrow',
                        'a-btn a-btn-4'                => 'Dark Transparent',
                        'a-btn a-btn-4 a-btn-arrow'    => 'Dark Transparent with arrow',
                        'a-btn a-btn-5'                => 'Light',
                        'a-btn a-btn-5 a-btn-arrow'    => 'Light with arrow',
                        'a-btn a-btn-6'                => 'Light Transparent',
                        'a-btn a-btn-6 a-btn-arrow'    => 'Light Transparent with arrow',
                        'a-btn a-btn-7'                => 'White',
                        'a-btn a-btn-7 a-btn-arrow'    => 'White with arrow',
                        'a-btn a-btn-8'                => 'White Transparent',
                        'a-btn a-btn-8 a-btn-arrow'    => 'White Transparent with arrow',
                        'a-btn a-btn-link'             => 'Default link',
                        'a-btn a-btn-link a-btn-arrow' => 'Default link with arrow',
                    ),
                    'dependency' => array('portfolio_style', 'any', 'left_gallery,simple,simple_slider,urban,alia'),
                    'desc'       => 'Choose button style for this portfolio page'
                ),
                array(
                    'id'      => 'pado_navigation_portfolio',
                    'type'    => 'switcher',
                    'title'   => 'Navigation in portfolio post',
                    'default' => true,
                    'desc'    => 'Turning on navigation for this portfolio post'
                ),
                array(
                    'id'    => 'ext_link',
                    'type'  => 'text',
                    'title' => 'External link',
                    'desc'  => 'Enter external link'
                ),
            )
        ),
        array(
            'name'   => 'section_4',
            'title'  => 'Portfolio Header Options',
            'fields' => array(
                array(
                    'id'      => 'page_menu',
                    'type'    => 'select',
                    'title'   => 'Page menu',
                    'options' => pado_get_menus(),
                    'default' => array('none'),
                    'desc'    => 'Select page menu'
                ),
                array(
                    'id'      => 'change_menu',
                    'type'    => 'switcher',
                    'title'   => 'Change menu style for this page?',
                    'default' => false,
                    'desc'    => 'This option allows change menu style for this page'
                ),
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
                    'dependency' => array('change_menu', '==', true),
                    'desc'       => 'Choose menu style for this page'
                ),
                array(
                    'id'         => 'header_btn',
                    'type'       => 'switcher',
                    'title'      => 'Add button for Header?',
                    'default'    => false,
                    'dependency' => array('change_menu|menu_style', '==|==', 'true|simple'),
                    'desc'       => 'This option allows add button to header for this page'
                ),
                array(
                    'id'         => 'header_btn_text',
                    'type'       => 'text',
                    'title'      => 'Button Text',
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
                    'desc'       => 'Enter text for button'
                ),
                array(
                    'id'         => 'header_btn_url',
                    'type'       => 'text',
                    'title'      => 'Button URL',
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
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
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
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
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
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
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
                    'default'    => 'a-btn-1',
                ),
                array(
                    'id'         => 'full_width_menu',
                    'type'       => 'switcher',
                    'title'      => 'Full width menu',
                    'default'    => false,
                    'dependency' => array('menu_style|change_menu', '==|==', 'simple|true'),
                    'desc'       => 'Turning on full width menu'
                ),
                array(
                    'id'         => 'logo_bg',
                    'type'       => 'switcher',
                    'title'      => 'Add background for Logo?',
                    'default'    => false,
                    'dependency' => array('menu_style|change_menu', 'any|==', 'simple,aside|true'),
                    'desc'       => 'This option allows add background to logo for this page'
                ),
                array(
                    'id'      => 'style_header',
                    'type'    => 'select',
                    'title'   => 'Select header style',
                    'options' => array(
                        'empty'       => "Isn`t chosen",
                        'default'     => 'Static',
                        'fixed'       => 'Fixed',
                        'transparent' => 'Fixed transparent',
                        'none'        => 'None'
                    ),
                    'default' => 'empty',
                    'desc'    => 'Will not working for Aside Header',
                ),
                array(
                    'id'         => 'menu_light_text',
                    'type'       => 'switcher',
                    'title'      => 'Light text on menu',
                    'default'    => false,
                    'dependency' => array('style_header', '==', 'transparent'),
                    'desc'       => 'Turning on Light text on menu for this page. Will not working for Aside Header && Only Logo Header'
                ),
                array(
                    'id'      => 'image_page_logo',
                    'type'    => 'upload',
                    'title'   => 'Site Logo',
                    'default' => '',
                    'desc'    => 'Upload any media using the WordPress Native Uploader.',
                ),
                array(
                    'id'      => 'image_logo_scroll',
                    'type'    => 'upload',
                    'title'   => 'Site Logo on scroll',
                    'default' => get_template_directory_uri() . '/assets/images/logo.png',
                    'desc'    => 'Upload any media using the WordPress Native Uploader.',
                ),
                array(
                    'id'      => 'image_logo_mobile',
                    'type'    => 'upload',
                    'title'   => 'Site Logo on mobile',
                    'default' => '',
                    'desc'    => 'Upload any media using the WordPress Native Uploader.',
                ),
            )
        ),
        array(
            'name'   => 'general_footer_options',
            'title'  => 'Portfolio Footer Options',
            'fields' => array(
                array(
                    'id'      => 'change_footer',
                    'type'    => 'switcher',
                    'title'   => 'Change footer style for this page?',
                    'default' => false,
                    'desc'    => 'This option allows change footer style for this page'
                ),
                array(
                    'id'         => 'pado_footer_style',
                    'type'       => 'image_select',
                    'title'      => 'Footer style',
                    'options'    => array(
                        'modern'  => EF_URL . '/admin/assets/images/cs_images/footer_modern.jpg',
                        'classic' => EF_URL . '/admin/assets/images/cs_images/footer_classic.jpg',
                        'none'    => EF_URL . '/admin/assets/images/cs_images/footer_none.jpg',
                    ),
                    'radio'      => true,
                    'attributes' => array(
                        'data-depend-id' => 'pado_footer_style',
                    ),
                    'desc'       => 'Choose style Footer for this page',
                    'dependency' => array('change_footer', '==', true)
                ),
                array(
                    'id'      => 'footer_logo_radio',
                    'type'    => 'radio',
                    'title'   => 'Type of footer logo',
                    'dependency' => array( 'change_footer|pado_footer_style', '==|==', 'true|classic' ),
                    'options' => array(
                        'imglogo' => 'Image Logo',
                        'txtlogo' => 'Text Logo',
                    ),
                    'default' => array( 'imglogo' ),
                ),
                array(
                    'id'         => 'footer_logo',
                    'type'       => 'upload',
                    'title'      => 'Footer Logo for classic style',
                    'desc'       => 'Upload any media using the WordPress Native Uploader.',
                    'dependency' => array( 'change_footer|pado_footer_style|footer_logo_radio_imglogo', '==|==|==', 'true|classic|true' ),
                    'default'    => get_template_directory_uri() . '/assets/images/logo.png',
                ),
                array(
                    'id'         => 'footer_logo_text',
                    'type'       => 'text',
                    'title'      => 'Footer Logo',
                    'dependency' => array( 'change_footer|pado_footer_style|footer_logo_radio_txtlogo', '==|==|==', 'true|classic|true' ),
                ),
                array(
                    'id'         => 'enable_footer_copy_page',
                    'type'       => 'switcher',
                    'title'      => 'Enable Footer copyright',
                    'default'    => true,
                    'desc'       => 'Turning on Footer copyright for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|==', 'true|modern')
                ),
                array(
                    'id'         => 'pado_copyright_align',
                    'type'       => 'select',
                    'title'      => 'Copyright align',
                    'options'    => array(
                        'left'   => 'left',
                        'center' => 'center',
                        'right'  => 'right',
                    ),
                    'dependency' => array('enable_footer_copy_page|change_footer|pado_footer_style', '==|==|==', 'true|true|modern'),
                    'desc'       => 'Select align copyright for this page'
                ),
                array(
                    'id'         => 'enable_footer_socials',
                    'type'       => 'switcher',
                    'title'      => 'Enable Footer Socials',
                    'default'    => true,
                    'desc'       => 'Turning on Footer socials for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|==', 'true|modern')
                ),
                array(
                    'id'         => 'pado_socials_align',
                    'type'       => 'select',
                    'title'      => 'Socials align',
                    'options'    => array(
                        'left'   => 'left',
                        'center' => 'center',
                        'right'  => 'right',
                    ),
                    'default'    => 'right',
                    'dependency' => array('enable_footer_socials|change_footer|pado_footer_style', '==|==|==', 'true|true|modern' ),
                ),
                array(
                    'id'         => 'enable_footer_white_page',
                    'type'       => 'switcher',
                    'title'      => 'Enable Light Footer',
                    'default'    => false,
                    'desc'       => 'Turning on Light footer for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|!=', 'true|none')
                ),
                array(
                    'id'         => 'footer_color',
                    'type'       => 'color_picker',
                    'title'      => 'Change Footer Background Color',
                    'default'    => '',
                    'desc'       => 'This options allows change footer background color for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|!=', 'true|none')
                ),
                array(
                    'id'         => 'fixed_transparent_footer',
                    'type'       => 'switcher',
                    'title'      => 'Fixed and transparent footer',
                    'default'    => false,
                    'desc'       => 'Turning on fixed and transparent footer for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|!=', 'true|none')
                ),
                array(
                    'id'         => 'enable_parallax_footer_page',
                    'type'       => 'switcher',
                    'title'      => 'Enable Parallax Footer',
                    'default'    => false,
                    'desc'       => 'Turning on Parallax footer for this page',
                    'dependency' => array('fixed_transparent_footer|change_footer|pado_footer_style', '==|==|!=', 'false|true|none'),
                ),
            )
        ),
    )
);

$options[] = array(
    'id'        => 'pado_product_options',
    'title'     => 'Product options',
    'post_type' => 'product',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'   => 'section_product',
            'fields' => array(
                array(
                    'id'      => 'pado_product_new',
                    'type'    => 'switcher',
                    'title'   => 'Add label New?',
                    'default' => false
                ),
                array(
                    'id'    => 'pado_additional_text',
                    'type'  => 'textarea',
                    'title' => 'Additional text'
                ),
            )
        )
    )
);

$options[] = array(
    'id'        => '_custom_page_options',
    'title'     => 'Custom Options',
    'post_type' => 'page', // or post or CPT
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        // begin section
        array(
            'name'   => 'general_header_options',
            'title'  => 'Header Page Option',
            'fields' => array(
                array(
                    'id'      => 'page_menu',
                    'type'    => 'select',
                    'title'   => 'Page menu',
                    'options' => pado_get_menus(),
                    'default' => array('none'),
                    'desc'    => 'Select page menu'
                ),
                array(
                    'id'      => 'change_menu',
                    'type'    => 'switcher',
                    'title'   => 'Change menu style for this page?',
                    'default' => false,
                    'desc'    => 'This option allows change menu style for this page'
                ),
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
                    'dependency' => array('change_menu', '==', true),
                    'desc'       => 'Choose menu style for this page'
                ),
                array(
                    'id'         => 'header_btn',
                    'type'       => 'switcher',
                    'title'      => 'Add button for Header?',
                    'default'    => false,
                    'dependency' => array('change_menu|menu_style', '==|==', 'true|simple'),
                    'desc'       => 'This option allows add button to header for this page'
                ),
                array(
                    'id'         => 'header_btn_text',
                    'type'       => 'text',
                    'title'      => 'Button Text',
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
                    'desc'       => 'Enter text for button'
                ),
                array(
                    'id'         => 'header_btn_url',
                    'type'       => 'text',
                    'title'      => 'Button URL',
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
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
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
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
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
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
                    'dependency' => array('header_btn|menu_style|change_menu', '==|==|==', 'true|simple|true'),
                    'default'    => 'a-btn-1',
                ),
                array(
                    'id'         => 'full_width_menu',
                    'type'       => 'switcher',
                    'title'      => 'Full width menu',
                    'default'    => false,
                    'dependency' => array('menu_style|change_menu', '==|==', 'simple|true'),
                    'desc'       => 'Turning on full width menu'
                ),
                array(
                    'id'         => 'logo_bg',
                    'type'       => 'switcher',
                    'title'      => 'Add background for Logo?',
                    'default'    => false,
                    'dependency' => array('menu_style|change_menu', 'any|==', 'simple,aside|true'),
                    'desc'       => 'This option allows add background to logo for this page'
                ),
                array(
                    'id'      => 'style_header',
                    'type'    => 'select',
                    'title'   => 'Select header style',
                    'options' => array(
                        'empty'       => "Isn`t chosen",
                        'default'     => 'Static',
                        'fixed'       => 'Fixed',
                        'transparent' => 'Fixed transparent',
                        'none'        => 'None'
                    ),
                    'default' => 'empty',
                    'desc'    => 'Will not working for Aside Header',
                ),
                array(
                    'id'         => 'menu_light_text',
                    'type'       => 'switcher',
                    'title'      => 'Light text on menu',
                    'default'    => false,
                    'dependency' => array('style_header', '==', 'transparent'),
                    'desc'       => 'Turning on Light text on menu for this page. Will not working for Aside Header && Only Logo Header'
                ),
                array(
                    'id'      => 'image_page_logo',
                    'type'    => 'upload',
                    'title'   => 'Site Logo',
                    'default' => '',
                    'desc'    => 'Upload any media using the WordPress Native Uploader.',
                ),
                array(
                    'id'      => 'image_logo_scroll',
                    'type'    => 'upload',
                    'title'   => 'Site Logo on scroll',
                    'default' => get_template_directory_uri() . '/assets/images/logo.png',
                    'desc'    => 'Upload any media using the WordPress Native Uploader.',
                ),
                array(
                    'id'      => 'image_logo_mobile',
                    'type'    => 'upload',
                    'title'   => 'Site Logo on mobile',
                    'default' => '',
                    'desc'    => 'Upload any media using the WordPress Native Uploader.',
                ),
//                array(
//                    'id'      => 'header_scroll_bg',
//                    'type'    => 'color_picker',
//                    'title'   => 'Header Scroll Background Color',
//                    'default' => '',
//                    'desc'    => 'This option allows change header background color on scroll for this page'
//                ),
//                array(
//                    'id'      => 'header_scroll_text',
//                    'type'    => 'color_picker',
//                    'title'   => 'Header Scroll Text Color',
//                    'default' => '',
//                    'desc'    => 'This option allows change header text color on scroll for this page'
//                ),
            )
        ),
        array(
            'name'   => 'general_footer_options',
            'title'  => 'Footer Page Option',
            'fields' => array(
                array(
                    'id'      => 'change_footer',
                    'type'    => 'switcher',
                    'title'   => 'Change footer style for this page?',
                    'default' => false,
                    'desc'    => 'This option allows change footer style for this page'
                ),
                array(
                    'id'         => 'pado_footer_style',
                    'type'       => 'image_select',
                    'title'      => 'Footer style',
                    'options'    => array(
                        'modern'  => EF_URL . '/admin/assets/images/cs_images/footer_modern.jpg',
                        'classic' => EF_URL . '/admin/assets/images/cs_images/footer_classic.jpg',
                        'none'    => EF_URL . '/admin/assets/images/cs_images/footer_none.jpg',
                    ),
                    'radio'      => true,
                    'attributes' => array(
                        'data-depend-id' => 'pado_footer_style',
                    ),
                    'desc'       => 'Choose style Footer for this page',
                    'dependency' => array('change_footer', '==', true)
                ),
                array(
                    'id'      => 'footer_logo_radio',
                    'type'    => 'radio',
                    'title'   => 'Type of footer logo',
                    'dependency' => array( 'change_footer|pado_footer_style', '==|==', 'true|classic' ),
                    'options' => array(
                        'imglogo' => 'Image Logo',
                        'txtlogo' => 'Text Logo',
                    ),
                    'default' => array( 'imglogo' ),
                ),
                array(
                    'id'         => 'footer_logo',
                    'type'       => 'upload',
                    'title'      => 'Footer Logo for classic style',
                    'desc'       => 'Upload any media using the WordPress Native Uploader.',
                    'dependency' => array( 'change_footer|pado_footer_style|footer_logo_radio_imglogo', '==|==|==', 'true|classic|true' ),
                    'default'    => get_template_directory_uri() . '/assets/images/logo.png',
                ),
                array(
                    'id'         => 'footer_logo_text',
                    'type'       => 'text',
                    'title'      => 'Footer Logo',
                    'dependency' => array( 'change_footer|pado_footer_style|footer_logo_radio_txtlogo', '==|==|==', 'true|classic|true' ),
                ),
                array(
                    'id'         => 'enable_footer_copy_page',
                    'type'       => 'switcher',
                    'title'      => 'Enable Footer copyright',
                    'default'    => true,
                    'desc'       => 'Turning on Footer copyright for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|==', 'true|modern')
                ),
                array(
                    'id'         => 'pado_copyright_align',
                    'type'       => 'select',
                    'title'      => 'Copyright align',
                    'options'    => array(
                        'left'   => 'left',
                        'center' => 'center',
                        'right'  => 'right',
                    ),
                    'dependency' => array('enable_footer_copy_page|change_footer|pado_footer_style', '==|==|==', 'true|true|modern'),
                    'desc'       => 'Select align copyright for this page'
                ),
                array(
                    'id'         => 'enable_footer_socials',
                    'type'       => 'switcher',
                    'title'      => 'Enable Footer Socials',
                    'default'    => true,
                    'desc'       => 'Turning on Footer socials for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|==', 'true|modern')
                ),
                array(
                    'id'         => 'pado_socials_align',
                    'type'       => 'select',
                    'title'      => 'Socials align',
                    'options'    => array(
                        'left'   => 'left',
                        'center' => 'center',
                        'right'  => 'right',
                    ),
                    'default'    => 'right',
                    'dependency' => array('enable_footer_socials|change_footer|pado_footer_style', '==|==|==', 'true|true|modern' ),
                ),
                array(
                    'id'         => 'enable_footer_white_page',
                    'type'       => 'switcher',
                    'title'      => 'Enable Light Footer',
                    'default'    => false,
                    'desc'       => 'Turning on Light footer for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|!=', 'true|none')
                ),
                array(
                    'id'         => 'footer_color',
                    'type'       => 'color_picker',
                    'title'      => 'Change Footer Background Color',
                    'default'    => '',
                    'desc'       => 'This options allows change footer background color for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|!=', 'true|none')
                ),
                array(
                    'id'         => 'fixed_transparent_footer',
                    'type'       => 'switcher',
                    'title'      => 'Fixed and transparent footer',
                    'default'    => false,
                    'desc'       => 'Turning on fixed and transparent footer for this page',
                    'dependency' => array('change_footer|pado_footer_style', '==|!=', 'true|none')
                ),
                array(
                    'id'         => 'enable_parallax_footer_page',
                    'type'       => 'switcher',
                    'title'      => 'Enable Parallax Footer',
                    'default'    => false,
                    'desc'       => 'Turning on Parallax footer for this page',
                    'dependency' => array('fixed_transparent_footer|change_footer|pado_footer_style', '==|==|!=', 'false|true|none'),
                ),
            )
        ),
        array(
            'name'   => 'general_page_options',
            'title'  => 'Other Page Option',
            'fields' => array(
                array(
                    'id'    => 'padding_desktop',
                    'type'  => 'text',
                    'title' => 'Custom desktop paddings (left and right) for page',
                    'desc'  => 'Enter padding container for desktop version of this page'
                ),
                array(
                    'id'    => 'padding_mobile',
                    'type'  => 'text',
                    'title' => 'Custom mobile paddings (left and right) for page',
                    'desc'  => 'Enter padding container for mobile version of this page'
                ),
            ),
        ),
    )
);


CSFramework_Metabox::instance($options);
