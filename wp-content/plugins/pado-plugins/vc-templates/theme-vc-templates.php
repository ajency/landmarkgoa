<?php

function pado_reset_default_templates( $data ) {
    return array();
}
add_filter( 'vc_load_default_templates', 'pado_reset_default_templates' );

function pado_vc_templates(){

    $templates = array();

    //Category About
//	About (Default)
    $data = array();
    $data['name'] = esc_html__( 'About (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/about/default.jpg' );
    $data['sort_name'] = 'About';
    $data['custom_class'] = 'general about';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_lg_pt="padding-lg-0t"][vc_column desctop_lg_pt="padding-md-0t" css=".vc_custom_1536158287200{padding-top: 0px !important;}"][pado_about style="with_images" btn_style="a-btn a-btn-1 a-btn-arrow" image1="42" image2="30" title="We believe in creativity" bg_title="About" button="url:%23|title:Contact%20us||"]Suspendisse nisl purus, pharetra eget elit nec, facilisis fringilla elit ullamcorper dapibus justo, in mattis justo bibendum id dolor tortor eu pharetra eget elit nec.[/pado_about][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Accordion
//  Accordion (Default)
    $data = array();
    $data['name'] = esc_html__( 'Accordion (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/accordion/default.jpg' );
    $data['sort_name'] = 'Accordion';
    $data['custom_class'] = 'general accordion';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pb="padding-lg-120b" desctop_pb="padding-md-100b" tablets_pb="padding-sm-80b" mobile_pb="padding-xs-50b" css=".vc_custom_1537338451851{background-color: rgba(237,237,237,0.7) !important;*background-color: rgb(237,237,237) !important;}"][vc_column width="1/2" css=".vc_custom_1537254084208{padding-top: 0px !important;}"][pado_accordion items="%5B%7B%22number%22%3A%221.%22%2C%22title%22%3A%22Chief%20Architect%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221320%22%7D%2C%7B%22number%22%3A%222.%22%2C%22title%22%3A%22Creative%20Director%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221321%22%7D%2C%7B%22number%22%3A%223.%22%2C%22title%22%3A%22Front-end%20Developer%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221322%22%7D%2C%7B%22number%22%3A%224.%22%2C%22title%22%3A%22Sales%20Manager%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221323%22%7D%5D"][/vc_column][vc_column width="1/2" offset="vc_hidden-lg vc_hidden-md vc_hidden-sm" css=".vc_custom_1537337093150{padding-top: 0px !important;}"][vc_separator color="custom" accent_color="#d8d8d8"][/vc_column][vc_column width="1/2" css=".vc_custom_1537337125111{padding-top: 0px !important;}"][pado_accordion items="%5B%7B%22number%22%3A%225.%22%2C%22title%22%3A%22Creative%20Director%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221324%22%7D%2C%7B%22number%22%3A%226.%22%2C%22title%22%3A%22Back-end%20Developer%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221325%22%7D%2C%7B%22number%22%3A%227.%22%2C%22title%22%3A%22Content%20Manager%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221326%22%7D%2C%7B%22number%22%3A%228.%22%2C%22title%22%3A%22Sales%20Consultant%22%2C%22position%22%3A%22Office%20in%20New%20York%22%2C%22description%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person%20is%20forever%20in%20that%20state.%5CnFor%20your%20necessary%20discernment.%20Thank%20you%20for%20reading.%22%2C%22form%22%3A%221327%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Banners
//  Image Banner (Default)
    $data = array();
    $data['name'] = esc_html__( 'Image Banner (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/image_banner/default.jpg' );
    $data['sort_name'] = 'Banners';
    $data['custom_class'] = 'general banners';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][pado_banner light="true" overlay="true" image="300" title="<b>About us</b>"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Banners
//  Banner Slider (Horizontal Urban Slider)
    $data = array();
    $data['name'] = esc_html__( 'Banner Slider (Horizontal Urban Slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/banner_slider/urban.jpg' );
    $data['sort_name'] = 'Banners';
    $data['custom_class'] = 'general banners sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mb="margin-lg-150b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-30b"][vc_column][banner_slider type_slider="urban" socials_urban="%5B%7B%22icon%22%3A%22fa%20fa-facebook-square%22%2C%22social_url%22%3A%22https%3A%2F%2Fwww.facebook.com%2F%22%7D%2C%7B%22icon%22%3A%22fa%20fa-twitter%22%2C%22social_url%22%3A%22https%3A%2F%2Ftwitter.com%2F%22%7D%2C%7B%22icon%22%3A%22fa%20fa-instagram%22%2C%22social_url%22%3A%22https%3A%2F%2Fwww.instagram.com%2F%22%7D%2C%7B%22icon%22%3A%22fa%20fa-dribbble%22%2C%22social_url%22%3A%22https%3A%2F%2Fdribbble.com%2F%22%7D%5D" additional_title="PADO - ARCHITECTURE STUDIO"][banner_slider_items subtitle="2005 Stokes Isle Apt. 896, Venaville, New York" title="<b>Exhibition</b> Center
in Boston" btn_style="a-btn a-btn-1 a-btn-arrow" additional_btn_style="a-btn a-btn-6 a-btn-arrow" image="18" button="url:%23|title:Look%20More|target:%20_blank|" additional_button="|||"][banner_slider_items subtitle="Campus Mail Services 2115 Summit Avenue Saint Paul, Minnesota 55105" title="<b>Exhibition</b> Center
in Minnesota" btn_style="a-btn a-btn-1 a-btn-arrow" additional_btn_style="a-btn a-btn-1 a-btn-arrow" image="24" button="url:%23|title:Look%20More|target:%20_blank|"][banner_slider_items subtitle="3275 NW 24th Street Rd" title="<b>Exhibition</b> Center
in Miami" btn_style="a-btn a-btn-1 a-btn-arrow" additional_btn_style="a-btn a-btn-1 a-btn-arrow" image="25" button="url:%23|title:Look%20More|target:%20_blank|"][/banner_slider][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Banners
//  Banner Slider (Vertical Slider)
    $data = array();
    $data['name'] = esc_html__( 'Banner Slider (Vertical Slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/banner_slider/vertical.jpg' );
    $data['sort_name'] = 'Banners';
    $data['custom_class'] = 'general banners sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][banner_slider type_slider="vertical" text_style="light"][banner_slider_items option_style="vertical" subtitle="Tolko interiors" title="<b>OSKO / GUEST FLOOR</b>" text="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." btn_style="a-btn a-btn-3 a-btn-arrow" image="306" button="url:%23|title:See%20More||"][banner_slider_items option_style="vertical" subtitle="Oko apartaments" title="<b>BROWNY FLAT</b>" text="Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur." btn_style="a-btn a-btn-3 a-btn-arrow" image="309" button="url:%23|title:See%20More||"][banner_slider_items option_style="vertical" subtitle="Cross Studio" title="<b>Stylish loft</b>" text="Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure." btn_style="a-btn a-btn-3 a-btn-arrow" image="298" button="url:%23|title:See%20More||"][/banner_slider][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Default)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-1.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Default with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Default with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-1-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-1 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;

    //Category Buttons
//  Buttons (Default transparent)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Default transparent)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-2.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-2" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Default transparent with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Default transparent with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-2-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-2 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Dark)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Dark)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-3.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-3" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Dark with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Dark with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-3-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-3 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Dark transparent)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Dark transparent)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-4.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-4" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Dark transparent with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Dark transparent with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-4-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-4 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Light)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Light)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-5.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-5" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Light with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Light with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-5-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_button btn_style="a-btn a-btn-5 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Light transparent)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Light transparent)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-6.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1538136877012{background-color: #1e73be !important;}"][vc_column][pado_button btn_style="a-btn a-btn-6" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Light transparent with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Light transparent with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-6-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1538136877012{background-color: #1e73be !important;}"][vc_column][pado_button btn_style="a-btn a-btn-6 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (White)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (White)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-7.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1538136877012{background-color: #1e73be !important;}"][vc_column][pado_button btn_style="a-btn a-btn-7" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (White with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (White)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-7-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1538136877012{background-color: #1e73be !important;}"][vc_column][pado_button btn_style="a-btn a-btn-7 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (White transparent)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (White transparent)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-8.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1538136877012{background-color: #1e73be !important;}"][vc_column][pado_button btn_style="a-btn a-btn-8" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (White transparent with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (White transparent with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-8-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1538136877012{background-color: #1e73be !important;}"][vc_column][pado_button btn_style="a-btn a-btn-8 a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Default link)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Default link)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-link.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_button btn_style="a-btn a-btn-link" add_btn_style="a-btn a-btn-1" style="text-center" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Default link with arrow)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Default link with arrow)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/a-btn-link-a-btn-arrow.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_button btn_style="a-btn a-btn-link a-btn-arrow" button="url:%23|title:Contact%20Us||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Contacts
//  Contacts (Info list)
    $data = array();
    $data['name'] = esc_html__( 'Contacts (Info list)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/contacts/style5.jpg' );
    $data['sort_name'] = 'Contacts';
    $data['custom_class'] = 'general contacts';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-85b" desctop_md_mb="margin-md-55b" tablets_mb="margin-sm-35b" mobile_mb="margin-xs-40b"][vc_column][pado_contacts items="%5B%7B%22icon%22%3A%22icon-email%22%2C%22icon_color%22%3A%22%23004ae2%22%2C%22items_child%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522email%2522%253A%2522hello%2540pado.architecture%2522%257D%252C%257B%2522title%2522%253A%2522Support%2522%252C%2522email%2522%253A%2522hello%2540pado.architecture%2522%257D%255D%22%7D%2C%7B%22icon%22%3A%22icon-telephone-1%22%2C%22icon_color%22%3A%22%23004ae2%22%2C%22items_child%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522phone%2522%253A%2522(0043)%2520568%2520456%2520902%2522%257D%252C%257B%2522title%2522%253A%2522Support%2522%252C%2522phone%2522%253A%2522(0043)%2520568%2520456%2520902%2522%257D%255D%22%7D%2C%7B%22icon%22%3A%22icon-map-location-1%22%2C%22icon_color%22%3A%22%23004ae2%22%2C%22items_child%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522text%2522%253A%25222005%2520Stokes%2520Isle%2520Apt.%2520896%252C%2520Venaville%252C%2520New%2520York%252010010%2522%257D%255D%22%7D%5D"][/pado_contacts][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Contacts
//  Contacts (Simple form)
    $data = array();
    $data['name'] = esc_html__( 'Contacts (Simple form)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/contacts/simple_form.jpg' );
    $data['sort_name'] = 'Contacts';
    $data['custom_class'] = 'general contacts';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pt="padding-lg-140t" desctop_lg_pb="padding-lg-140b" desctop_pt="padding-md-110t" desctop_pb="padding-md-110b" tablets_pt="padding-sm-80t" tablets_pb="padding-sm-80b" mobile_pt="padding-xs-50t" mobile_pb="padding-xs-50b" css=".vc_custom_1536827168772{background-image: url(http://dev.viewdemo.co/wp/pado/wp-content/uploads/2018/08/image@3x4.jpg?id=179) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/6" css=".vc_custom_1535717139247{padding-top: 0px !important;}"][/vc_column][vc_column width="4/6" css=".vc_custom_1535717129852{padding-top: 0px !important;}"][vc_row_inner desctop_mb="margin-lg-60b" desctop_md_mb="margin-md-50b" tablets_mb="margin-sm-50b" mobile_mb="margin-xs-40b"][vc_column_inner][pado_headings title="<b>Subscribe for our newsletter</b>" description="Please fill out the form below"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][pado_contacts style="simple_form" form="588"][/pado_contacts][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Contacts
//  Contacts (Info with parallax)
    $data = array();
    $data['name'] = esc_html__( 'Contacts (Info with parallax)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/contacts/style3.jpg' );
    $data['sort_name'] = 'Contacts';
    $data['custom_class'] = 'general contacts';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][pado_contacts style="style3" title="Contact me" image="306" text="Are you interested in working together?" form="282"][/pado_contacts][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Contacts
//  Contacts (Custom info)
    $data = array();
    $data['name'] = esc_html__( 'Contacts (Custom info)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/contacts/style4.jpg' );
    $data['sort_name'] = 'Contacts';
    $data['custom_class'] = 'general contacts';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-95b" desctop_md_mb="margin-md-75b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-40b"][vc_column][pado_contacts style="style4" address_info="%5B%7B%22address%22%3A%22Via%20Cesare%20Rosaroll%20st.%20118%2C%2080139%20Sofia%22%7D%5D" email_info="%5B%7B%22email%22%3A%22pado%40info.com%22%7D%5D" phone_info="%5B%7B%22phone%22%3A%22%2B759%20933%2043%2045%22%7D%5D"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque facilisis elementum laoreet. Vivamus vestibulum facilisis tortor non pellentesque. Etiam porttitor augue a iaculis bibendum. Nulla vitae metus non orci porta auctor nec eu ipsum.

In vitae feugiat mauris. Cras placerat dolor sed leo dictum, id sodales felis vestibulum. Ut imperdiet pharetra neque vitae sodales. Curabitur at magna pulvinar, porta odio in.[/pado_contacts][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Faq
//  Faq (Default)
    $data = array();
    $data['name'] = esc_html__( 'Faq (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/faq/default.jpg' );
    $data['sort_name'] = 'Faq';
    $data['custom_class'] = 'general faq';
    $data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-30t" desctop_mb="margin-lg-30b" mobile_mt="margin-xs-10t" mobile_mb="margin-xs-10b" desctop_lg_pt="padding-lg-100t" desctop_lg_pb="padding-lg-100b" desctop_pt="padding-md-80t" desctop_pb="padding-md-80b" tablets_pt="padding-sm-60t" tablets_pb="padding-sm-60b" mobile_pt="padding-xs-50t" mobile_pb="padding-xs-50b"][vc_column css=".vc_custom_1537805819487{padding-top: 0px !important;}"][pado_faq items="%5B%7B%22number%22%3A%2201%22%2C%22title%22%3A%22Branding%20is%20simply%20a%20more%20efficient%20way%20to%20sell%20things%3F%5Cn%22%2C%22text%22%3A%22Lorem%20ipsum%20dolor%20sit%20amet%2Cconsectetur%20a%20elit.%20in%20ut%20ullamcorper%20leo%2C%20eget%20euismod%20orci.%20Cum%20socils%20natoque%20penatibus%20et%20magnis%20dis%20parturient%20montes%2C%20nascetur%20ridiculus%20musbulum%20ultrices%20aliquam%20convallis.%20Maecenas%20ut%20tellus%20mi.%20Proin%20tincidunt%2C%20lectus%20eu%20volutpat%20mattis%2C%20ante%20metus%20lacinia%20tellus%2C%20vitae%20condimentum%20nulla%20enim%20bibendum%20nibh.%20Praesent%20tupris%20risus%2C%20interdum%20nec%20venenatis%20id%2C%20pretium%20sit%20amet%20purus.%20Interdum%20et%20malesuada%22%7D%2C%7B%22number%22%3A%2202%22%2C%22title%22%3A%22It's%20better%20to%20be%20first%20in%20the%20mind%20than%20to%20be%20first%20in%20the%20marketplace%3F%22%2C%22text%22%3A%22Praesent%20ullamcorper%20dapibus%20justo%2C%20in%20mattis%20justo%20bibendum%20id.%20Pellentesque%20dolor%20tortor%2C%20luctus%20eu%20dolor%20ut%2C%20aliquet%20varius%20tortor.%20Etiam%20id%20sem%20consequat%2C%20posuere%20augue%20ac%2C%20rutrum%20nibh.%20Cras%20efficitur%20ex%20vitae%20faucibus%20facilisis.%20Nullam%20venenatis%2C%20massa%20eget%20malesuada%20porta%2C%20ligula%20justo%20porta%20leo%2C%20a%20efficitur%20justo%20lectus%20sit%20amet%20erat.%20Vestibulum%20ante%20ipsum%20primis%20in%20faucibus%20orci%20luctus%20et%20ultrices%20posuere%20cubilia%20lacinia%20ipsum%20vel%20odio%20varius%22%7D%2C%7B%22number%22%3A%2203%22%2C%22title%22%3A%22Positioning%20is%20what%20you%20do%20the%20mind%20of%20the%20prospect%3F%22%2C%22text%22%3A%22Etiam%20vitae%20iaculis%20augue.%20Sed%20tristique%20sed%20neque%20id%20tempus.%20Suspendisse%20et%20laoreet%20purus.%20Etiam%20facilisis%20dapibus%20hendrerit.%20Nullam%20et%20fringilla%20odio.%20Praesent%20tempus%20non%20nulla%20eu%20rhoncus.%20Vestibulum%20a%20interdum%20enim%2C%20ac%20scelerisque%20neque.%20Mauris%20efficitur%20arcu%20vitae%20arcu%20lacinia%20suscipit.%20Mauris%20lacinia%20ipsum%20vel%20odio%20varius%20ullamcorper%20ac%20ac%20turpis.%20Integer%20a%20ex%20magna%20ex%20massa%2C%20vestibulum%20quis%20viverra%20at%20lacinia%20ipsum%20vel%20odio%20varius%22%7D%2C%7B%22number%22%3A%2204%22%2C%22title%22%3A%22Branding%20is%20simply%20a%20more%20efficient%20way%20to%20sell%20things%3F%22%2C%22text%22%3A%22Aenean%20vehicula%20tempus%20orci%20non%20molestie.%20Sed%20egestas%20commodo%20porta.%20Praesent%20consectetur%20sollicitudin%20scelerisque.%20Nullam%20ornare%20elit%20interdum%20posuere%20facilisis.%20Donec%20consequat%20pretium%20pretium.%20Nullam%20imperdiet%20varius%20dignissim.%20Mauris%20at%20interdum%20turpis.%20Sed%20ex%20massa%2C%20vestibulum%20quis%20viverra%20at%2C%20dapibus%20facilisis%20risus.%20In%20ac%20volutpat%20justo%2C%20et%20pretium%20risus.%20Quisque%20semper%20sed%20orci%20vel%20porta%20quis%20lobortis%20justo%2C%20ut%20pharetra%20libero%20pulvinar%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Gallery
//  Gallery (Default)
    $data = array();
    $data['name'] = esc_html__( 'Gallery (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/gallery/default.jpg' );
    $data['sort_name'] = 'Gallery';
    $data['custom_class'] = 'general gallery';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_gallery images="44,43,75,33,31,40,41,42,32,30,24,25,18,72,1301,1267,499,509,495,500,498,496,493,483"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Headings
//  Headings (Simple)
    $data = array();
    $data['name'] = esc_html__( 'Headings (Simple)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/heading/style2.jpg' );
    $data['sort_name'] = 'Headings';
    $data['custom_class'] = 'general headings';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-70b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-60b" mobile_mb="margin-xs-40b"][vc_column][pado_headings title="Our Great <b>Services</b>" description="For each project we establish relationships with partners who we know will help us cre"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Headings
//  Headings (Text left align)
    $data = array();
    $data['name'] = esc_html__( 'Headings (Text left align)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/heading/style1.jpg' );
    $data['sort_name'] = 'Headings';
    $data['custom_class'] = 'general headings';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_mb="margin-lg-105b" desctop_md_mb="margin-md-55b" tablets_mb="margin-sm-35b" mobile_mb="margin-xs-5b" desctop_lg_pt="padding-lg-30t" desctop_lg_pb="padding-lg-65b" mobile_pt="padding-xs-10t" mobile_pb="padding-xs-50b" css=".vc_custom_1534329899805{background-color: #004ae2 !important;}"][vc_column][pado_headings style="style1" title="Start a New Project With Pado ?" title_color="#ffffff" btn_style="a-btn a-btn-7" button="url:%23|title:Contact%20Us|target:%20_blank|"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Headings
//  Headings (Text with type animation)
    $data = array();
    $data['name'] = esc_html__( 'Headings (Text with type animation)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/heading/style5.gif' );
    $data['sort_name'] = 'Headings';
    $data['custom_class'] = 'general headings';
    $data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-95t" desctop_md_mt="margin-md-55t" tablets_mt="margin-sm-35t" mobile_mt="margin-xs-20t"][vc_column][pado_headings style="style5" title="Hello! every day we create projects, they are" animation_text="flexible,compatible,modern"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Image Parallax
//  Image Parallax (Simple)
    $data = array();
    $data['name'] = esc_html__( 'Image Parallax (Simple)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/image_parallax/simple.jpg' );
    $data['sort_name'] = 'Image parallax';
    $data['custom_class'] = 'general image-parallax';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][image_parallax][image_parallax_items image="18" overlay="true" title="<b>MATRIS CAMP</b>" description_banner="OUR TEAM DEVELOPED THE WHOLE CONCEPT OF JOINING
A SINK IN EXACT TIME OF THE DAY AND PRODUCT USE."][/image_parallax_items][image_parallax_items image="24" overlay="true"][/image_parallax_items][image_parallax_items image="499" overlay="true" style="modern" subtitle="ENVIRONMENT" heading_size="h3" title="UE4 CONTEMPORARY <b>INTERIOR</b>"]Interior visualisation done in Unreal Engine 4. This scene was assembled using mostly library assets that were optimised and made game engine ready. Materials were created using Substance Suite.[/image_parallax_items][image_parallax_items image="72" overlay="true"][/image_parallax_items][image_parallax_items image="493" overlay="true" style="modern" position="image-parallax__item--bl" heading_size="h3" title="TOOLS USED:"]
<ul>
    <li>Autodesk 3ds Max</li>
    <li>Adobe Photoshop</li>
    <li>UV Layout</li>
    <li>Substance Painter</li>
    <li>Substance Designer</li>
    <li>Bitmap2Material</li>
    <li>Unreal Engine 1</li>
</ul>
[/image_parallax_items][/image_parallax][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Info block
//  Info block (Modern with slider)
    $data = array();
    $data['name'] = esc_html__( 'Info block (Modern with slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/info_block/style-3.jpg' );
    $data['sort_name'] = 'Info block';
    $data['custom_class'] = 'general info-block video sliders';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-75b" desctop_md_mb="margin-md-0b" mobile_mb="margin-xs-45b"][vc_column][pado_info_block number="10" title="Years
Experience" bg_text="About" add_video="yes" video_link="https://www.youtube.com/watch?v=Ynr4o0eOjdg" lazy_load="no" image_bg="27" images="30,31,32,33"]
<h4>Our team takes over everything, from an <a href="http://dev.viewdemo.co/wp/pado/main-home/">idea and concept</a> development to realization.</h4>
All our projects incorporate a unique artistic image and functional solutions. Client is the soul of the project. Our main goal is to illustrate his/hers values and individuality through design. Our team takes over everything,[/pado_info_block][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Info block
//  Info block (Promotion)
    $data = array();
    $data['name'] = esc_html__( 'Info block (Promotion)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/info_block/promotion.jpg' );
    $data['sort_name'] = 'Info block';
    $data['custom_class'] = 'general info-block';
    $data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-120t" desctop_pt="padding-md-100t" tablets_pt="padding-sm-80t" mobile_pt="padding-xs-50t"][vc_column width="1/3" css=".vc_custom_1535714458139{margin-bottom: 35px !important;padding-top: 0px !important;}"][pado_info_block info_block_style="promotion" title="<b>CREATIVE</b>
STYLE" subtitle="POSTANA JUMBO" btn_style="a-btn a-btn-link a-btn-arrow" block_bg="398" button="url:%23|title:Shop%20Now||"][/pado_info_block][/vc_column][vc_column width="1/3" css=".vc_custom_1535714464580{margin-bottom: 35px !important;padding-top: 0px !important;}"][pado_info_block info_block_style="promotion" title="<b>RETRO</b>
STYLE" subtitle="WESTWOOD RETRO" btn_style="a-btn a-btn-link a-btn-arrow" block_bg="397" button="url:%23|title:Shop%20Now||"][/pado_info_block][/vc_column][vc_column width="1/3" css=".vc_custom_1535714468718{margin-bottom: 35px !important;padding-top: 0px !important;}"][pado_info_block info_block_style="promotion" title="<b>MODERN</b>
STYLE" subtitle="PALOMA FABRIC" btn_style="a-btn a-btn-link a-btn-arrow" block_bg="408" button="url:%23|title:Shop%20Now||"][/pado_info_block][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Info block
//  Info block (Discount)
    $data = array();
    $data['name'] = esc_html__( 'Info block (Discount)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/info_block/discount.jpg' );
    $data['sort_name'] = 'Info block';
    $data['custom_class'] = 'general info-block';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_lg_pt="padding-lg-120t" desctop_pt="padding-md-100t" tablets_pt="padding-sm-80t" mobile_pt="padding-xs-50t"][vc_column][pado_info_block info_block_style="discount" image_position="bottom" image_width="110" title="<b>Up To <i>40% Off</i>
Final Sale Items</b>" subtitle="#padostorediscount" btn_style="a-btn a-btn-link a-btn-arrow" section_color_bg="#f7f7f7" image="425" mask_image="426" button="url:%23|title:Shop%20Now||"][/pado_info_block][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Info block
//  Info block (Modern)
    $data = array();
    $data['name'] = esc_html__( 'Info block (Modern)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/info_block/style-4.jpg' );
    $data['sort_name'] = 'Info block';
    $data['custom_class'] = 'general info-block video';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][pado_info_block info_block_style="style-4" number="10" title="Years Experience" add_video="yes" video_link="https://www.youtube.com/watch?v=-xNN-bJQ4vI" image_bg="27"]Our team takes over everything, from an <a href="http://dev.viewdemo.co/wp/awa/about-us-2/#">idea and concept</a> development to realization.

All our projects incorporate a unique artistic image and functional solutions. Client is the soul of the project. Our main goal is to illustrate his/hers values and individuality through design.[/pado_info_block][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Info block
//  Info block (Classic)
    $data = array();
    $data['name'] = esc_html__( 'Info block (Classic)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/info_block/style-1.jpg' );
    $data['sort_name'] = 'Info block';
    $data['custom_class'] = 'general info-block';
    $data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-85t" desctop_mb="margin-lg-120b" desctop_md_mt="margin-md-65t" desctop_md_mb="margin-md-100b" tablets_mt="margin-sm-45t" tablets_mb="margin-sm-80b" mobile_mt="margin-xs-15t" mobile_mb="margin-xs-50b"][vc_column][pado_info_block info_block_style="style-1" button="url:%23|title:View%20work||" image_id="30"]
<h2>Create the lifestyle you <span style="color: #004ae2;">really desire.</span></h2>
Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia a leo nulla ve elementum lacus et mi posuere pulvinar nec pulvin.
<ul>
    <li>Beautiful and easy to professional animations</li>
    <li>Theme advantages are pixel perfect design</li>
    <li>Find more creative ideas for your projects</li>
</ul>
[/pado_info_block][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Info block
//  Info block (Simple)
    $data = array();
    $data['name'] = esc_html__( 'Info block (Simple)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/info_block/style-5.jpg' );
    $data['sort_name'] = 'Info block';
    $data['custom_class'] = 'general info-block video';
    $data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-150t" desctop_lg_pb="padding-lg-150b" desctop_pt="padding-md-100t" desctop_pb="padding-md-100b" tablets_pt="padding-sm-80t" tablets_pb="padding-sm-80b" mobile_pt="padding-xs-50t" mobile_pb="padding-xs-50b"][vc_column css=".vc_custom_1537336248360{padding-top: 0px !important;}"][pado_info_block info_block_style="style-5" title="Ready to Make
<b>an Impact?</b>" items_accordion="%5B%7B%22title%22%3A%22Mission%20of%20our%20company%22%2C%22text%22%3A%22When%20I%20first%20mention%20this%20to%20most%20people%2C%20they%20really%20don%E2%80%99t%20get%20it%2C%20so%20here%20is%20a%20simple%20formula%20for%20keeping%20your%20moods%20upbeat.%5Cn%22%7D%2C%7B%22title%22%3A%22Making%20an%20Impact%22%2C%22text%22%3A%22Making%20changes%20in%20your%20life%20is%20great%20and%20it%20is%20the%20way%20we%20grow%20and%20develop%20as%20people.%20%22%7D%2C%7B%22title%22%3A%22Company%20culture%22%2C%22text%22%3A%22Many%20people%20has%20the%20notion%20that%20enlightenment%20is%20one%20state.%20Many%20also%20believe%20that%20when%20it%20is%20attained%2C%20a%20person.%22%7D%5D" bg_text="Vacancies" add_video="yes" video_link="https://www.youtube.com/watch?v=2WiKxibXvEw" image_id="1266"][/pado_info_block][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;



    //Category Posts
//  Last posts (Default)
    $data = array();
    $data['name'] = esc_html__( 'Last posts (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/posts/default.jpg' );
    $data['sort_name'] = 'Posts';
    $data['custom_class'] = 'general posts';
    $data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-120t" desctop_pt="padding-md-100t" tablets_pt="padding-sm-80t" mobile_pt="padding-xs-50t"][vc_column][vc_row_inner desctop_mb="margin-lg-80b" desctop_md_mb="margin-md-70b" tablets_mb="margin-sm-60b" mobile_mb="margin-xs-40b"][vc_column_inner][pado_headings title="Lastest <b>News</b>"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][pado_last_posts style_post="simple" count_line="three" btn_style="a-btn a-btn-link a-btn-arrow" link="true" count="3" link_options="url:%23|title:See%20All%20Posts||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Line of images
//  Line of images (Clients)
    $data = array();
    $data['name'] = esc_html__( 'Line of images (Clients)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/line_of_images/clients.jpg' );
    $data['sort_name'] = 'Line of images';
    $data['custom_class'] = 'general line-of-images';
    $data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-120t" desctop_lg_pb="padding-lg-120b" desctop_pt="padding-md-100t" desctop_pb="padding-md-100b" tablets_pt="padding-sm-80t" tablets_pb="padding-sm-80b" mobile_pt="padding-xs-50t" mobile_pb="padding-xs-50b"][vc_column][vc_row_inner desctop_mb="margin-lg-80b" desctop_md_mb="margin-md-70b" tablets_mb="margin-sm-60b" mobile_mb="margin-xs-40b"][vc_column_inner][pado_headings title="Great <b>Brands</b>"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][pado_line_of_images count_lg="4" count_md="3" count_xs="2" logos="%5B%7B%22image%22%3A%22581%22%7D%2C%7B%22image%22%3A%22580%22%7D%2C%7B%22image%22%3A%22579%22%7D%2C%7B%22image%22%3A%22578%22%7D%2C%7B%22image%22%3A%22577%22%7D%2C%7B%22image%22%3A%22576%22%7D%2C%7B%22image%22%3A%22575%22%7D%2C%7B%22image%22%3A%22574%22%7D%2C%7B%22image%22%3A%22573%22%7D%2C%7B%22image%22%3A%22572%22%7D%2C%7B%22image%22%3A%22571%22%7D%2C%7B%22image%22%3A%22570%22%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Line of images
//  Line of images (Clients (Style 2))
    $data = array();
    $data['name'] = esc_html__( 'Line of images (Clients (Style 2))', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/line_of_images/clients-2.jpg' );
    $data['sort_name'] = 'Line of images';
    $data['custom_class'] = 'general line-of-images';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pt="padding-lg-50t" desctop_lg_pb="padding-lg-50b" css=".vc_custom_1536311778627{background-color: #004ae2 !important;}"][vc_column css=".vc_custom_1536311821914{padding-top: 0px !important;}"][pado_line_of_images style="clients-2" logos="%5B%7B%22image%22%3A%22991%22%7D%2C%7B%22image%22%3A%22989%22%7D%2C%7B%22image%22%3A%22990%22%7D%2C%7B%22image%22%3A%22992%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Locations
//  Locations (Default)
    $data = array();
    $data['name'] = esc_html__( 'Locations (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/locations/default.jpg' );
    $data['sort_name'] = 'Locations';
    $data['custom_class'] = 'general map';
    $data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-120t" desctop_lg_pb="padding-lg-120b" desctop_pt="padding-md-100t" desctop_pb="padding-md-100b" tablets_pt="padding-sm-80t" tablets_pb="padding-sm-80b" mobile_pt="padding-xs-50t" mobile_pb="padding-xs-50b"][vc_column css=".vc_custom_1536932684862{padding-top: 0px !important;}"][pado_location marker_active="1248" marker_passive="1249" title="Meet Us
in <b>Your City</b>" locations="%5B%7B%22title%22%3A%22Los%20Angeles%2C%20USA%20%22%2C%22address%22%3A%22Los%20Angeles%2C%20%D0%9A%D0%B0%D0%BB%D1%96%D1%84%D0%BE%D1%80%D0%BD%D1%96%D1%8F%2C%20%D0%A1%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D1%96%20%D0%A8%D1%82%D0%B0%D1%82%D0%B8%20%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8%22%2C%22description%22%3A%222005%20Stokes%20Isle%20Apt.%20896%2C%20%5CnLos%20Angeles%2010010%22%2C%22informations%22%3A%22%255B%257B%2522title%2522%253A%2522Work%2520Schedule%2522%252C%2522information_item%2522%253A%2522%25255B%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253EMon%252520-%252520Sat%25253A%25253C%25252Fspan%25253E%25252011%25253A00-19%25253A00%25252C%252520%252522%25257D%25252C%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253ESun%25253A%25253C%25252Fspan%25253E11%25253A00-16%25253A00%25252C%252520%252522%25257D%25255D%2522%257D%255D%22%2C%22phones%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522phone_item%2522%253A%2522%25255B%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25252C%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25255D%2522%257D%255D%22%2C%22emails%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522email_item%2522%253A%2522%25255B%25257B%252522email_text%252522%25253A%252522hello%252540pado.architecture%252522%25257D%25252C%25257B%252522email_text%252522%25253A%252522support%252540pado.architecture%252522%25257D%25255D%2522%257D%255D%22%7D%2C%7B%22title%22%3A%22NewYork%2C%20USA%22%2C%22address%22%3A%22New%20York%20Avenue%20Northwest%2C%20%D0%92%D0%B0%D1%88%D0%B8%D0%BD%D0%B3%D1%82%D0%BE%D0%BD%2C%20%D0%9E%D0%BA%D1%80%D1%83%D0%B3%20%D0%9A%D0%BE%D0%BB%D1%83%D0%BC%D0%B1%D1%96%D1%8F%2C%20%D0%A1%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D1%96%20%D0%A8%D1%82%D0%B0%D1%82%D0%B8%20%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8%22%2C%22description%22%3A%222005%20Stokes%20Isle%20Apt.%20896%2C%20%5CnNew%20York%2010010%22%2C%22informations%22%3A%22%255B%257B%2522title%2522%253A%2522Work%2520Schedule%2522%252C%2522information_item%2522%253A%2522%25255B%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253EMon%252520-%252520Sat%25253A%25253C%25252Fspan%25253E11%25253A00-19%25253A00%25252C%252520%252522%25257D%25252C%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253ESun%25253A%25253C%25252Fspan%25253E11%25253A00-16%25253A00%25252C%252520%252522%25257D%25255D%2522%257D%255D%22%2C%22phones%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522phone_item%2522%253A%2522%25255B%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25252C%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25255D%2522%257D%255D%22%2C%22emails%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522email_item%2522%253A%2522%25255B%25257B%252522email_text%252522%25253A%252522hello%252540pado.architecture%252522%25257D%25252C%25257B%252522email_text%252522%25253A%252522support%252540pado.architecture%252522%25257D%25255D%2522%257D%255D%22%7D%2C%7B%22title%22%3A%22Boston%2C%20USA%22%2C%22address%22%3A%22Boston%2C%20%D0%9C%D0%B0%D1%81%D1%81%D0%B0%D1%87%D1%83%D1%81%D0%B5%D1%82%D1%81%2C%20%D0%A1%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D1%96%20%D0%A8%D1%82%D0%B0%D1%82%D0%B8%20%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8%22%2C%22description%22%3A%222005%20Stokes%20Isle%20Apt.%20896%2C%20%5CnBoston%2010010%22%2C%22informations%22%3A%22%255B%257B%2522title%2522%253A%2522Work%2520Schedule%2522%252C%2522information_item%2522%253A%2522%25255B%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253EMon%252520-%252520Sat%25253A%25253C%25252Fspan%25253E%25252011%25253A00-19%25253A00%25252C%252520%252522%25257D%25252C%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253ESun%25253A%25253C%25252Fspan%25253E%25253A11%25253A00-16%25253A00%25252C%252520%252522%25257D%25255D%2522%257D%255D%22%2C%22phones%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522phone_item%2522%253A%2522%25255B%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25252C%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25255D%2522%257D%255D%22%2C%22emails%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522email_item%2522%253A%2522%25255B%25257B%252522email_text%252522%25253A%252522hello%252540pado.architecture%252522%25257D%25252C%25257B%252522email_text%252522%25253A%252522support%252540pado.architecture%252522%25257D%25255D%2522%257D%255D%22%7D%2C%7B%22title%22%3A%22Detroit%2C%20USA%22%2C%22address%22%3A%22Detroit%2C%20%D0%9C%D1%96%D1%87%D0%B8%D0%B3%D0%B0%D0%BD%2C%20%D0%A1%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D1%96%20%D0%A8%D1%82%D0%B0%D1%82%D0%B8%20%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8%22%2C%22description%22%3A%222005%20Stokes%20Isle%20Apt.%20896%2C%20%5CnDetroit%2010010%22%2C%22informations%22%3A%22%255B%257B%2522title%2522%253A%2522Work%2520Schedule%2522%252C%2522information_item%2522%253A%2522%25255B%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253EMon%252520-%252520Sat%25253A%25253C%25252Fspan%25253E%25252011%25253A00-19%25253A00%25252C%252520%252522%25257D%25252C%25257B%252522information_text%252522%25253A%252522%25253Cspan%25253ESun%25253A%25253C%25252Fspan%25253E11%25253A00-16%25253A00%25252C%252520%252522%25257D%25255D%2522%257D%255D%22%2C%22phones%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522phone_item%2522%253A%2522%25255B%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25252C%25257B%252522phone_text%252522%25253A%252522(0043)%252520568%252520456%252520902%252522%25257D%25255D%2522%257D%255D%22%2C%22emails%22%3A%22%255B%257B%2522title%2522%253A%2522Head%2520Office%2522%252C%2522email_item%2522%253A%2522%25255B%25257B%252522email_text%252522%25253A%252522hello%252540pado.architecture%252522%25257D%25252C%25257B%252522email_text%252522%25253A%252522support%252540pado.architecture%252522%25257D%25255D%2522%257D%255D%22%7D%5D" json_style="JTVCJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZmVhdHVyZVR5cGUlMjIlM0ElMjAlMjJhZG1pbmlzdHJhdGl2ZSUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmVsZW1lbnRUeXBlJTIyJTNBJTIwJTIybGFiZWxzLnRleHQuZmlsbCUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMnN0eWxlcnMlMjIlM0ElMjAlNUIlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJjb2xvciUyMiUzQSUyMCUyMiUyMzQ0NDQ0NCUyMiUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU3RCU1RCUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU3RCUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU3QiUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmZlYXR1cmVUeXBlJTIyJTNBJTIwJTIyYWRtaW5pc3RyYXRpdmUuY291bnRyeSUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmVsZW1lbnRUeXBlJTIyJTNBJTIwJTIyZ2VvbWV0cnkuZmlsbCUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMnN0eWxlcnMlMjIlM0ElMjAlNUIlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJ2aXNpYmlsaXR5JTIyJTNBJTIwJTIyb24lMjIlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlNUQlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJmZWF0dXJlVHlwZSUyMiUzQSUyMCUyMmFkbWluaXN0cmF0aXZlLnByb3ZpbmNlJTIyJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZWxlbWVudFR5cGUlMjIlM0ElMjAlMjJsYWJlbHMuaWNvbiUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMnN0eWxlcnMlMjIlM0ElMjAlNUIlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJodWUlMjIlM0ElMjAlMjIlMjNmZjAwMDAlMjIlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJ2aXNpYmlsaXR5JTIyJTNBJTIwJTIyb24lMjIlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlNUQlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJmZWF0dXJlVHlwZSUyMiUzQSUyMCUyMmxhbmRzY2FwZSUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmVsZW1lbnRUeXBlJTIyJTNBJTIwJTIyYWxsJTIyJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyc3R5bGVycyUyMiUzQSUyMCU1QiU3QiUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmNvbG9yJTIyJTNBJTIwJTIyJTIzZjJmMmYyJTIyJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTVEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZmVhdHVyZVR5cGUlMjIlM0ElMjAlMjJwb2klMjIlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJlbGVtZW50VHlwZSUyMiUzQSUyMCUyMmFsbCUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMnN0eWxlcnMlMjIlM0ElMjAlNUIlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJ2aXNpYmlsaXR5JTIyJTNBJTIwJTIyb2ZmJTIyJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTVEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZmVhdHVyZVR5cGUlMjIlM0ElMjAlMjJyb2FkJTIyJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZWxlbWVudFR5cGUlMjIlM0ElMjAlMjJhbGwlMjIlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJzdHlsZXJzJTIyJTNBJTIwJTVCJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyc2F0dXJhdGlvbiUyMiUzQSUyMC0xMDAlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJsaWdodG5lc3MlMjIlM0ElMjA0NSUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU3RCUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU1RCUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU3RCUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCU3QiUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmZlYXR1cmVUeXBlJTIyJTNBJTIwJTIycm9hZC5oaWdod2F5JTIyJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZWxlbWVudFR5cGUlMjIlM0ElMjAlMjJhbGwlMjIlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJzdHlsZXJzJTIyJTNBJTIwJTVCJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIydmlzaWJpbGl0eSUyMiUzQSUyMCUyMnNpbXBsaWZpZWQlMjIlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlNUQlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJmZWF0dXJlVHlwZSUyMiUzQSUyMCUyMnJvYWQuYXJ0ZXJpYWwlMjIlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJlbGVtZW50VHlwZSUyMiUzQSUyMCUyMmxhYmVscy5pY29uJTIyJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyc3R5bGVycyUyMiUzQSUyMCU1QiU3QiUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMnZpc2liaWxpdHklMjIlM0ElMjAlMjJvZmYlMjIlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlNUQlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0QlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJmZWF0dXJlVHlwZSUyMiUzQSUyMCUyMnRyYW5zaXQlMjIlMkMlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJlbGVtZW50VHlwZSUyMiUzQSUyMCUyMmFsbCUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMnN0eWxlcnMlMjIlM0ElMjAlNUIlN0IlMEElMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjAlMjJ2aXNpYmlsaXR5JTIyJTNBJTIwJTIyb2ZmJTIyJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTVEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyZmVhdHVyZVR5cGUlMjIlM0ElMjAlMjJ3YXRlciUyMiUyQyUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmVsZW1lbnRUeXBlJTIyJTNBJTIwJTIyYWxsJTIyJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIyc3R5bGVycyUyMiUzQSUyMCU1QiU3QiUwQSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMmNvbG9yJTIyJTNBJTIwJTIyJTIzNDZiY2VjJTIyJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTJDJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdCJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIydmlzaWJpbGl0eSUyMiUzQSUyMCUyMm9uJTIyJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTVEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTVE" zoom="7" title_bg="Contact"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio list (Default)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio list (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolios/default.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_portfolio_list light="yes" cats="room" order="ASC" count="3"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio sliders (Slider with filter)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio sliders (Slider with filter)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolio_slider/filter_slider.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio sliders';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-140b" desctop_md_mb="margin-md-90b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-40b"][vc_column][pado_portfolio_sliders cats="gardening,interior-design,landscaping" count="5" title="Our Feature <b>Works</b>"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio sliders (Properties carousel)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio sliders (Properties carousel)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolio_slider/properties_carousel.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_portfolio_sliders style="properties_carousel" orderby="date" order="ASC" loop="true" speed="500" count="5"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio sliders (Urban slider)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio sliders (Urban slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolio_slider/urban_slider.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mb="margin-lg-70b" mobile_mb="margin-xs-30b"][vc_column][pado_portfolio_sliders style="urban_slider" cats="apartments"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio sliders (Interactive links)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio sliders (Interactive links)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolio_slider/interactive.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_portfolio_sliders style="interactive" cats="room" orderby="ID" order="ASC" count="3"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio sliders (Showcase slider)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio sliders (Showcase slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolio_slider/showcase_slider.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_portfolio_sliders style="showcase_slider" cats="apartments"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Portfolio
//  Portfolio sliders (Split slider)
    $data = array();
    $data['name'] = esc_html__( 'Portfolio sliders (Split slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/portfolio_slider/split_slider.jpg' );
    $data['sort_name'] = 'Portfolio';
    $data['custom_class'] = 'general portfolio sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_portfolio_sliders style="split_slider" cats="apartments" orderby="ID" order="ASC" btn_style="a-btn a-btn-4 a-btn-arrow" count="3" color1="#e5ddd4" color2="#eeecff" color3="#cee2e6"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Posts
//  Post slider (Simple slider with progress bar)
    $data = array();
    $data['name'] = esc_html__( 'Post slider (Simple slider with progress bar)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/post_slider/slider_progress.jpg' );
    $data['sort_name'] = 'Posts';
    $data['custom_class'] = 'general posts sliders';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-150b" desctop_md_mb="margin-md-95b" tablets_mb="margin-sm-75b" mobile_mb="margin-xs-45b"][vc_column][pado_post_slider cats="business,technology"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Posts
//  Post slider (Classic slider with progress bar)
    $data = array();
    $data['name'] = esc_html__( 'Post slider (Classic slider with progress bar)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/post_slider/classic_slider_progress.jpg' );
    $data['sort_name'] = 'Posts';
    $data['custom_class'] = 'general posts sliders';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-150b" desctop_md_mb="margin-md-95b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][pado_post_slider style="classic_slider_progress" cats="business,marketing" orderby="title" lg_count="3"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Products
//  Products slider (Default)
    $data = array();
    $data['name'] = esc_html__( 'Products slider (Default)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/products_slider/vertical.jpg' );
    $data['sort_name'] = 'Products';
    $data['custom_class'] = 'general products sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1535714316175{background-color: #f7f7f7 !important;}"][vc_column][pado_products_slider btn_style="a-btn a-btn-1 a-btn-arrow" socials="%5B%7B%22icon%22%3A%22fa%20fa-facebook-square%22%2C%22social_url%22%3A%22%23%22%7D%2C%7B%22icon%22%3A%22fa%20fa-twitter-square%22%2C%22social_url%22%3A%22%23%22%7D%2C%7B%22icon%22%3A%22fa%20fa-instagram%22%2C%22social_url%22%3A%22%23%22%7D%2C%7B%22icon%22%3A%22fa%20fa-youtube-square%22%2C%22social_url%22%3A%22%23%22%7D%5D" additional_text="View full collection" additional_url="http://dev.viewdemo.co/wp/pado/shop/" email="sales@padostud.io" cats_product="modern" order="ASC" autoplay="5000" image="361" bg_title="padoshop"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Promotions
//  Promotions (Modern)
    $data = array();
    $data['name'] = esc_html__( 'Promotions (Modern)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/promotion/modern.jpg' );
    $data['sort_name'] = 'Promotions';
    $data['custom_class'] = 'general promotions';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1537364888685{background-color: #f7f7f7 !important;}"][vc_column css=".vc_custom_1537364923164{padding-top: 0px !important;}"][promotion image_position="bottom" image_width="130" subtitle="10% OFFER" title="<b>Apartments from developers for sale in Boston</b>" description="2005 Stokes Isle Apt. 896, Venaville, New York" btn_style="a-btn a-btn-link a-btn-arrow" image="1283" mask_image="1282" button="url:%23|title:Learn%20More||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Promotions
//  Promotions (Simple)
    $data = array();
    $data['name'] = esc_html__( 'Promotions (Simple)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/promotion/simple.jpg' );
    $data['sort_name'] = 'Promotions';
    $data['custom_class'] = 'general promotions';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mt="margin-lg-60t" mobile_mt="margin-xs-35t"][vc_column css=".vc_custom_1537365314266{padding-top: 0px !important;}"][promotion style="simple" subtitle="#padostorediscount" title="<b>Up To 40% Off
Final Sale </b>" btn_style="a-btn a-btn-link a-btn-arrow" parallax="true" section_image_bg="1301" button="url:%23|title:Learn%20More||"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Promotions
//  Promotions (Info with video)
    $data = array();
    $data['name'] = esc_html__( 'Promotions (Info with video)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/promotion/info_video.jpg' );
    $data['sort_name'] = 'Promotions';
    $data['custom_class'] = 'general promotions video';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mt="margin-lg-60t" mobile_mt="margin-xs-35t"][vc_column][promotion style="info_video" title="<b>Architecture</b> and
Interaction <b>design</b>" btn_style="a-btn a-btn-link a-btn-arrow" items="%5B%7B%22image%22%3A%221291%22%2C%22name%22%3A%221826%20sqft%22%7D%2C%7B%22image%22%3A%221290%22%2C%22name%22%3A%223%20room%22%7D%2C%7B%22image%22%3A%221292%22%2C%22name%22%3A%222%20bath%22%7D%2C%7B%22image%22%3A%221293%22%2C%22name%22%3A%222%20garages%22%7D%5D" video_enable="true" right_image_parallax="true" button="url:%23|title:Learn%20More||" video_link="https://www.youtube.com/watch?v=SNBV3SDhOOI" video_name="Watch Now" right_image_bg="1297" left_image_bg="1289"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Services
//  Services (Creative slider)
    $data = array();
    $data['name'] = esc_html__( 'Services (Creative slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/services/creative-slider.jpg' );
    $data['sort_name'] = 'Services';
    $data['custom_class'] = 'general services sliders';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-80b" desctop_md_mb="margin-md-85b" tablets_mb="margin-sm-75b" mobile_mb="margin-xs-40b"][vc_column][pado_services items="%5B%7B%22icon_type_item%22%3A%22custom_icon%22%2C%22icon%22%3A%22icon-arrow-1-circle-down%22%2C%22custom_icon%22%3A%22187%22%2C%22title%22%3A%22%245BM%22%2C%22text%22%3A%22Total%20Valume%22%7D%2C%7B%22icon_type_item%22%3A%22custom_icon%22%2C%22icon%22%3A%22icon-arrow-1-circle-down%22%2C%22custom_icon%22%3A%22184%22%2C%22title%22%3A%221.6M%22%2C%22text%22%3A%22Site%20Area%22%7D%2C%7B%22icon_type_item%22%3A%22custom_icon%22%2C%22icon%22%3A%22icon-arrow-1-circle-down%22%2C%22custom_icon%22%3A%22188%22%2C%22title%22%3A%22%2456%22%2C%22text%22%3A%22House%20Units%22%7D%2C%7B%22icon_type_item%22%3A%22custom_icon%22%2C%22icon%22%3A%22icon-arrow-1-circle-down%22%2C%22custom_icon%22%3A%22189%22%2C%22title%22%3A%223%22%2C%22text%22%3A%22Yards%22%7D%5D" autoplay="5" loop="true" enable_full="true" title="We provide Awesome <b>Services</b>" text="Client is the soul of the project. Our main goal is to illustrate his" bg_text="Awesome"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Services
//  Services (Accordion)
    $data = array();
    $data['name'] = esc_html__( 'Services (Accordion)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/services/accordion.jpg' );
    $data['sort_name'] = 'Services';
    $data['custom_class'] = 'general services accordion';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pt="padding-lg-100t" desctop_lg_pb="padding-lg-100b" desctop_pt="padding-md-80t" desctop_pb="padding-md-80b" tablets_pt="padding-sm-60t" tablets_pb="padding-sm-60b" mobile_pt="padding-xs-50t" mobile_pb="padding-xs-50b" css=".vc_custom_1536048379200{background-color: rgba(237,244,247,0.44) !important;*background-color: rgb(237,244,247) !important;}"][vc_column css=".vc_custom_1536047679164{padding-top: 0px !important;}"][pado_services style="accordion" content_position="right" items_accordion="%5B%7B%22number%22%3A%2201.%22%2C%22title%22%3A%22Aparements%22%2C%22text%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt.%22%7D%2C%7B%22number%22%3A%2202.%22%2C%22title%22%3A%22House%20Unit%22%2C%22text%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt.%22%7D%2C%7B%22number%22%3A%2203.%22%2C%22title%22%3A%22Parking%22%2C%22text%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt.%22%7D%2C%7B%22number%22%3A%2204.%22%2C%22title%22%3A%22Total%20Value%22%2C%22text%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt.%22%7D%5D" title="Architecture with
<b>people in mind.</b>" image="44"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Services
//  Services (Center)
    $data = array();
    $data['name'] = esc_html__( 'Services (Center)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/services/center.jpg' );
    $data['sort_name'] = 'Services';
    $data['custom_class'] = 'general services';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column width="1/3"][pado_services style="center" icon="icon-pencil1" icon_color="#004ae2" icon_color_hover="#222222" title="Digital solutions" text="Proin ultricies augue libero, faucibus elit elementum sed dolor felis, cursus non diam non, finibus feugiat dui, a facilisis urna a ex magna"][/vc_column][vc_column width="1/3"][pado_services style="center" icon="icon-color-palette" icon_color="#004ae2" icon_color_hover="#222222" title="Creative strategy" text="Fusce auctor lacinia nunc, quis pellentesque dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubili"][/vc_column][vc_column width="1/3"][pado_services style="center" icon="icon-pencil-ruler" icon_color="#004ae2" icon_color_hover="#222222" title="Integrated marketing" text="Proin ultricies augue libero, quis faucibus elit elementum sed dolor felis, cursus non diam non, finibus interdum posuere tempus non nulla"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Services
//  Services (Classic)
    $data = array();
    $data['name'] = esc_html__( 'Services (Classic)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/services/classic.jpg' );
    $data['sort_name'] = 'Services';
    $data['custom_class'] = 'general services';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column width="1/2" mobile_mb="margin-xs-50b" offset="vc_col-lg-4 vc_col-md-4 vc_col-xs-12"][pado_services style="classic" title="Industry" image="449" text="Etiam vitae iaculis augue tristique sed neque id tempus et laoreet purus. Etiam facilisis dapibus hendrerit simply odiocon"][/vc_column][vc_column width="1/2" tablets_mb="margin-sm-50b" offset="vc_col-lg-4 vc_col-md-4 vc_col-xs-12"][pado_services style="classic" title="Portfolios" image="447" text="Vestibulum ante ipsum primis faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus a leo ultrices, a efficitur nulla"][/vc_column][vc_column width="1/2" offset="vc_col-lg-4 vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-3 vc_col-xs-12"][pado_services style="classic" title="Creativity" image="450" text="Praesent ullamcorper dapibus justo, in mattis justo bibendum id. Pellentesque dolor tortor, luctus eu dolor ut, aliquet varius"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Services
//  Services list (Modern)
    $data = array();
    $data['name'] = esc_html__( 'Services list (Modern)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/services_list/default.jpg' );
    $data['sort_name'] = 'Services';
    $data['custom_class'] = 'general services';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-90b" desctop_md_mb="margin-md-85b" tablets_mb="margin-sm-65b" mobile_mb="margin-xs-55b"][vc_column][pado_services_list cats="design" desc_column="4" btn_style="a-btn a-btn-link a-btn-arrow" btn_text="View More"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Services
//  Services list (Classic)
    $data = array();
    $data['name'] = esc_html__( 'Services list (Classic)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/services_list/classic.jpg' );
    $data['sort_name'] = 'Services';
    $data['custom_class'] = 'general services';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][pado_services_list style="classic" cats="design" desc_column="4" tablet_column="4" count="3"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Skills
//  Skills (Text with lines)
    $data = array();
    $data['name'] = esc_html__( 'Skills (Text with lines)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/skills/linear_text.jpg' );
    $data['sort_name'] = 'Skills';
    $data['custom_class'] = 'general skills';
    $data['content'] = <<<CONTENT
[vc_row][vc_column][pado_skills skills_style="linear_text" linear_skills="%5B%7B%22title%22%3A%22Illustration%22%2C%22number%22%3A%2290%22%2C%22line_color%22%3A%22%23004ae2%22%7D%2C%7B%22title%22%3A%22Web%20design%22%2C%22number%22%3A%2280%22%2C%22line_color%22%3A%22%23004ae2%22%7D%2C%7B%22title%22%3A%22Develope%22%2C%22number%22%3A%2295%22%2C%22line_color%22%3A%22%23004ae2%22%7D%5D" title="Modern digital creative agency." subtitle="Our skills" text="Proin ultricies augue libero, quis faucibus elit elementum sed dolor felis, cursus non diam non, finibus feugiat dui a facilisis urna"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Skills
//  Skills (Circle)
    $data = array();
    $data['name'] = esc_html__( 'Skills (Circle)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/skills/circle.jpg' );
    $data['sort_name'] = 'Skills';
    $data['custom_class'] = 'general skills';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][pado_skills circle_skills="%5B%7B%22number%22%3A%2290%22%2C%22title%22%3A%22Interior%20Design%22%2C%22text%22%3A%22Suspendisse%20nisl%20purus%2C%20pharetra%20eget%20elit%20nec%2C%20facilisis%20fringi%22%7D%2C%7B%22number%22%3A%2280%22%2C%22title%22%3A%22Visualization%22%2C%22text%22%3A%22Etiam%20vitae%20iaculis%20augue.%20Sed%20tristique%20neque%20id%20tempus%20et%20%22%7D%2C%7B%22number%22%3A%2295%22%2C%22title%22%3A%22Construction%22%2C%22text%22%3A%22Nullam%20ornare%20elit%20interdum%20posuere%20facilisis%20consequat%20%20%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Skills
//  Skills (Numerical)
    $data = array();
    $data['name'] = esc_html__( 'Skills (Numerical)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/skills/numerical.jpg' );
    $data['sort_name'] = 'Skills';
    $data['custom_class'] = 'general skills';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-60b"][vc_column][pado_skills skills_style="numerical" numerical_skills="%5B%7B%22number%22%3A%22324%22%2C%22symbol_location%22%3A%22before%22%2C%22title%22%3A%22Countries%20Served%22%7D%2C%7B%22number%22%3A%223000%22%2C%22symbol%22%3A%22%2B%22%2C%22symbol_location%22%3A%22before%22%2C%22title%22%3A%22Satisfied%20Clients%22%7D%2C%7B%22number%22%3A%22324%22%2C%22symbol_location%22%3A%22before%22%2C%22title%22%3A%22Countries%20Served%22%7D%2C%7B%22number%22%3A%226.468%22%2C%22symbol%22%3A%22%24%22%2C%22symbol_location%22%3A%22before%22%2C%22title%22%3A%22Total%20Value%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Team
//  Team (Inline)
    $data = array();
    $data['name'] = esc_html__( 'Team (Inline)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/team/inline.jpg' );
    $data['sort_name'] = 'Team';
    $data['custom_class'] = 'general team';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1536140535687{background-color: #f7f7f7 !important;}"][vc_column][vc_row_inner desctop_mt="margin-lg-85t" desctop_mb="margin-lg-80b" desctop_md_mt="margin-md-65t" desctop_md_mb="margin-md-70b" tablets_mt="margin-sm-45t" tablets_mb="margin-sm-60b" mobile_mt="margin-xs-15t" mobile_mb="margin-xs-40b"][vc_column_inner][pado_headings subtitle="Our team" title="May we present <b>our team</b>"][/vc_column_inner][/vc_row_inner][vc_row_inner desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column_inner][pado_team team_style="inline" team_members="%5B%7B%22image_id%22%3A%22826%22%2C%22name%22%3A%22Jessy%20Rose%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%2296%22%2C%22name%22%3A%22Camilla%20Shean%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%2298%22%2C%22name%22%3A%22Martin%20Ross%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22828%22%2C%22name%22%3A%22Ken%20Torrin%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22824%22%2C%22name%22%3A%22Blanche%20Fields%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22827%22%2C%22name%22%3A%22Odri%20Turner%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22825%22%2C%22name%22%3A%22Frankie%20Kao%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22829%22%2C%22name%22%3A%22Selena%20Gomez%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%5D" css=".vc_custom_1536163133793{padding-right: 10px !important;padding-bottom: 10px !important;padding-left: 10px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Team
//  Team (Inline with text)
    $data = array();
    $data['name'] = esc_html__( 'Team (Inline with text)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/team/inline_text.jpg' );
    $data['sort_name'] = 'Team';
    $data['custom_class'] = 'general team';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pt="padding-lg-120t" desctop_lg_pb="padding-lg-80b" desctop_pt="padding-md-65t" desctop_pb="padding-md-50b" tablets_pt="padding-sm-35t" tablets_pb="padding-sm-25b" mobile_pt="padding-xs-5t" mobile_pb="padding-xs-20b" css=".vc_custom_1534329796619{background-color: #f7f7f7 !important;}"][vc_column][pado_team btn_style="a-btn a-btn-link a-btn-arrow" team_members="%5B%7B%22image_id%22%3A%2295%22%2C%22name%22%3A%22Blanche%20Fields%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%2296%22%2C%22name%22%3A%22Martin%20Ross%22%2C%22position%22%3A%22Developer%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%2298%22%2C%22name%22%3A%22Frankie%20Kao%22%2C%22position%22%3A%22Art%20Director%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%2522%257D%255D%22%7D%5D" title="Our Fantastic <b>Team</b>" button="url:%23|title:View%20All%20Members|target:%20_blank|"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Team
//  Team (Slider modern)
    $data = array();
    $data['name'] = esc_html__( 'Team (Slider modern)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/team/slider_modern.jpg' );
    $data['sort_name'] = 'Team';
    $data['custom_class'] = 'general team sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1536140535687{background-color: #f7f7f7 !important;}"][vc_column][vc_row_inner desctop_mt="margin-lg-85t" desctop_mb="margin-lg-80b" desctop_md_mt="margin-md-65t" desctop_md_mb="margin-md-70b" tablets_mt="margin-sm-45t" tablets_mb="margin-sm-60b" mobile_mt="margin-xs-15t" mobile_mb="margin-xs-40b"][vc_column_inner][pado_headings subtitle="Our team" title="<b>May we present our team</b>"][/vc_column_inner][/vc_row_inner][vc_row_inner desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column_inner][pado_team team_style="slider_modern" team_members="%5B%7B%22image_id%22%3A%22824%22%2C%22name%22%3A%22Blanche%20Fields%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22827%22%2C%22name%22%3A%22Martin%20Ross%20%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22825%22%2C%22name%22%3A%22Frankie%20Kao%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22829%22%2C%22name%22%3A%22Selena%20Gomez%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%22826%22%2C%22name%22%3A%22Sophie%20Turner%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-official%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Sliders
//  Sliders (Split screen slider)
    $data = array();
    $data['name'] = esc_html__( 'Sliders (Split screen slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/split_slider/Splitscreenslider.jpg' );
    $data['sort_name'] = 'Sliders';
    $data['custom_class'] = 'general sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pado_split_sliders items="%5B%7B%22image%22%3A%22290%22%2C%22item_style%22%3A%22description%22%2C%22title%22%3A%22be%20connected.%20%3Cbr%3E%5Cnanywhere.%20anytime.%22%2C%22description%22%3A%22Large%20businesses%20require%20a%20lot%20of%20IT%20infrastructure%20and%20a%20department%20to%20look%20after%20it.%20Small%20businesses%20often%20can%E2%80%99t%20afford%20to%20have%20that%20sort%20of%20internal%20support%20in%20place%2C%20yet%20they%20need%20fully%20operational%20IT%20systems%20in%22%2C%22linear_skills%22%3A%22%255B%257B%2522title%2522%253A%2522%2522%252C%2522number%2522%253A%2522%2522%252C%2522number_style%2522%253A%2522all-line%2522%252C%2522line_color%2522%253A%2522%2523004ae2%2522%257D%255D%22%2C%22images_list%22%3A%22%255B%257B%257D%255D%22%2C%22count_line%22%3A%22two%22%2C%22form%22%3A%22%22%2C%22text_align%22%3A%22text-center%22%2C%22button%22%3A%22url%3A%2523%7Ctitle%3ASee%2520More%7C%7C%22%2C%22btn_style%22%3A%22a-btn%20a-btn-1%22%2C%22btn_style_form%22%3A%22a-btn-style%20a-btn-1-style%22%2C%22pagination_color1%22%3A%22%23000000%22%2C%22pagination_color2%22%3A%22%23004ae2%22%7D%2C%7B%22image%22%3A%22209%22%2C%22item_style%22%3A%22skill_list%22%2C%22subtitle%22%3A%22Design%22%2C%22title%22%3A%22awesome%20for%20%3Cbr%3E%5Cnstartups%20%26%20tech%22%2C%22linear_skills%22%3A%22%255B%257B%2522title%2522%253A%2522graphic%2522%252C%2522number%2522%253A%252287%2522%252C%2522number_style%2522%253A%2522all-line%2522%252C%2522line_color%2522%253A%2522%2523004ae2%2522%257D%252C%257B%2522title%2522%253A%2522ui%252Fux%2522%252C%2522number%2522%253A%252290%2522%252C%2522number_style%2522%253A%2522all-line%2522%252C%2522line_color%2522%253A%2522%2523004ae2%2522%257D%252C%257B%2522title%2522%253A%2522illustrations%2522%252C%2522number%2522%253A%252283%2522%252C%2522number_style%2522%253A%2522all-line%2522%252C%2522line_color%2522%253A%2522%2523004ae2%2522%257D%255D%22%2C%22images_list%22%3A%22%255B%257B%257D%255D%22%2C%22count_line%22%3A%22two%22%2C%22form%22%3A%22%22%2C%22text_align%22%3A%22text-left%22%2C%22button%22%3A%22url%3A%2523%7Ctitle%3ASee%2520More%7C%7C%22%2C%22btn_style%22%3A%22a-btn%20a-btn-1%22%2C%22btn_style_form%22%3A%22a-btn-style%20a-btn-1-style%22%2C%22pagination_color1%22%3A%22%23000000%22%2C%22pagination_color2%22%3A%22%23004ae2%22%7D%2C%7B%22image%22%3A%2244%22%2C%22item_style%22%3A%22description%22%2C%22title%22%3A%22download%20it%20now%22%2C%22description%22%3A%22Large%20businesses%20require%20a%20lot%20of%20IT%20infrastructure%20and%20a%20department%20to%20look%20after%20it.%20Small%20businesses%20often%20can%E2%80%99t%20afford%20to%20have%20that%20sort%20of%20internal%20support%20in%20place%2C%20yet%20they%20need%20fully%20operational%20IT%20systems%20in%5Cn%22%2C%22linear_skills%22%3A%22%255B%257B%2522title%2522%253A%2522%2522%252C%2522number%2522%253A%2522%2522%252C%2522number_style%2522%253A%2522all-line%2522%252C%2522line_color%2522%253A%2522%2523004ae2%2522%257D%255D%22%2C%22images_list%22%3A%22%255B%257B%257D%255D%22%2C%22count_line%22%3A%22two%22%2C%22form%22%3A%22%22%2C%22text_align%22%3A%22text-center%22%2C%22button%22%3A%22url%3A%2523%7Ctitle%3APurchase%2520Now%7C%7C%22%2C%22btn_style%22%3A%22a-btn%20a-btn-1%22%2C%22btn_style_form%22%3A%22a-btn-style%20a-btn-1-style%22%2C%22pagination_color1%22%3A%22%23ffffff%22%2C%22pagination_color2%22%3A%22%23004ae2%22%2C%22light_style_header%22%3A%22true%22%7D%2C%7B%22image%22%3A%2243%22%2C%22bg_color%22%3A%22%23000000%22%2C%22item_style%22%3A%22form%22%2C%22subtitle%22%3A%22Hire%20Us%22%2C%22title%22%3A%22let%E2%80%99s%20start%20new%20project%22%2C%22linear_skills%22%3A%22%255B%257B%2522title%2522%253A%2522%2522%252C%2522number%2522%253A%2522%2522%252C%2522number_style%2522%253A%2522all-line%2522%252C%2522line_color%2522%253A%2522%2523004ae2%2522%257D%255D%22%2C%22images_list%22%3A%22%255B%257B%257D%255D%22%2C%22count_line%22%3A%22two%22%2C%22form%22%3A%22282%22%2C%22light%22%3A%22true%22%2C%22text_align%22%3A%22text-left%22%2C%22btn_style%22%3A%22a-btn%20a-btn-1%22%2C%22btn_style_form%22%3A%22a-btn-style%20a-btn-1-style%22%2C%22pagination_color1%22%3A%22%23004ae2%22%2C%22pagination_color2%22%3A%22%23ffffff%22%2C%22light_style_header%22%3A%22true%22%7D%5D" nav_pos="right"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Testimonials
//  Testimonials (Left align slider)
    $data = array();
    $data['name'] = esc_html__( 'Testimonials (Left align slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/testimonial/left_align.jpg' );
    $data['sort_name'] = 'Testimonials';
    $data['custom_class'] = 'general testimonials sliders';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1536314441039{background-image: url(http://dev.viewdemo.co/wp/pado/wp-content/uploads/2018/08/banner.jpg?id=27) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column desctop_mt="margin-lg-85t" desctop_mb="margin-lg-120b" desctop_md_mt="margin-md-65t" desctop_md_mb="margin-md-100b" tablets_mt="margin-sm-45t" tablets_mb="margin-sm-60b" mobile_mt="margin-xs-15t" mobile_mb="margin-xs-50b"][pado_testimonial type_slider="left_align" autoplay="5000" speed="1500" loop="true" color1="#ffffff" color2="#ffffff" color4="#ffffff"][pado_testimonial_items author="Blanche Fields" position="Google, CEO" logo_image="825"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour “[/pado_testimonial_items][pado_testimonial_items author="Blanche Fields" position="Google, CEO" logo_image="828"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour “[/pado_testimonial_items][pado_testimonial_items author="Blanche Fields" position="Google, CEO" logo_image="827"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour “[/pado_testimonial_items][pado_testimonial_items author="Blanche Fields" position="Google, CEO" logo_image="826"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour “[/pado_testimonial_items][/pado_testimonial][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Testimonials
//  Testimonials (Modern slider)
    $data = array();
    $data['name'] = esc_html__( 'Testimonials (Modern slider)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/testimonial/modern.jpg' );
    $data['sort_name'] = 'Testimonials';
    $data['custom_class'] = 'general testimonials sliders';
    $data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-100t" desctop_mb="margin-lg-120b" desctop_md_mt="margin-md-80t" desctop_md_mb="margin-md-100b" tablets_mt="margin-sm-60t" tablets_mb="margin-sm-80b" mobile_mt="margin-xs-30t" mobile_mb="margin-xs-50b"][vc_column][pado_testimonial type_slider="modern" bg_text="Testimonials"][pado_testimonial_items author="Blanche Fields" position="Google, CEO" stars="five" logo_image="55"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly ”[/pado_testimonial_items][pado_testimonial_items author="Markus Rosenberg" position="Developer" stars="five" logo_image="249"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly ”[/pado_testimonial_items][pado_testimonial_items author="Blanche Fields" position="Google, CEO" stars="five" logo_image="55"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly ”[/pado_testimonial_items][pado_testimonial_items author="Markus Rosenberg" position="Developer" stars="five" logo_image="249"]“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly ”[/pado_testimonial_items][/pado_testimonial][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Banners
//  Banners (Video Banner)
    $data = array();
    $data['name'] = esc_html__( 'Banners (Video Banner)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/video/video_banner.jpg' );
    $data['sort_name'] = 'Banners';
    $data['custom_class'] = 'general banners video';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][video_banner video_link="https://youtu.be/zp2lgrzmnn8" video_image="44" autoplay="on" mute="on" subtitle="Wordpress agency" title="Let’s create together"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Buttons
//  Buttons (Video Button)
    $data = array();
    $data['name'] = esc_html__( 'Buttons (Video Button)', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/button/video_button.jpg' );
    $data['sort_name'] = 'Buttons';
    $data['custom_class'] = 'general buttons video';
    $data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-50b"][vc_column][video_button_shortcode video_link="https://www.youtube.com/watch?time_continue=2&amp;v=YMurlapfouo"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    //Category Coming soon
    //  Coming soon
    $data = array();
    $data['name'] = esc_html__( 'Coming Soon', 'pado' );
    $data['disabled'] = true; //disable it to not show in the default tab
    $data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/pado_templates/coming_soon/coming-soon.jpg' );
    $data['sort_name'] = 'Coming Soon';
    $data['custom_class'] = 'general coming-soon';
    $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content" full_height="yes" desctop_lg_pt="padding-lg-60t" desctop_lg_pb="padding-lg-40b" mobile_pt="padding-xs-40t" mobile_pb="padding-xs-40b" css=".vc_custom_1536828525157{background-image: url(http://dev.viewdemo.co/wp/pado/wp-content/uploads/2018/09/bg-2.png?id=1032) !important;}"][vc_column][pado_coming_soon title="Something awesome in the works." subtitle="You can subscribe us to get when our website is ready." date="2019/01/01 00:00" days="Days" hours="Hours" minutes="Minutes" seconds="Seconds" days_mobile="D" hours_mobile="H" minutes_mobile="M" seconds_mobile="S" form="1023"][/vc_column][/vc_row]
CONTENT;
    $templates[] = $data;


    return $templates;
}

function pado_add_default_templates() {
    $templates = pado_vc_templates();
    return array_map( 'vc_add_default_templates', $templates );
}
pado_add_default_templates();