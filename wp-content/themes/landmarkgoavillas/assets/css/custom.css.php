<?php 
header("Content-type: text/css; charset: UTF-8"); ?>

<?php
$style = '';
///HEADER LOGO//
if ( cs_get_option('site_logo') == 'txtlogo' ) {
    //Header logo text
    if ( cs_get_option('text_logo_style') == 'custom' ) {

        $style .= 'a.logo span{';
        $style .=  cs_get_option('text_logo_color') && cs_get_option('text_logo_color') !== '#fff' ? 'color:' . cs_get_option('text_logo_color') . ' !important;' : '';
        $style .=  cs_get_option('text_logo_width') ? 'width:' . cs_get_option('text_logo_width') . ' !important;' : '';
        $style .=  cs_get_option('text_logo_font_size') ? 'font-size:' . cs_get_option('text_logo_font_size') . ' !important;' : '';
        $style .= '}';
    }

} else {
    //Header logo image
    if ( cs_get_option('img_logo_style') == 'custom' ) {
        $style .= '.logo img {';
        if (cs_get_option('img_logo_width')) {
            $logo_width = is_integer(cs_get_option('img_logo_width')) ? cs_get_option('img_logo_width') . 'px' : cs_get_option('img_logo_width');
             $style .=  cs_get_option('img_logo_width') ? 'width:' . esc_attr($logo_width) . ' !important;' : '';
        }
        if (cs_get_option('img_logo_height')) {
            $logo_height = is_integer(cs_get_option('img_logo_height')) ? cs_get_option('img_logo_height') . 'px' : cs_get_option('img_logo_height');
             $style .=  cs_get_option('img_logo_height') ? 'height:' . esc_attr( $logo_height ) . ' !important;' : '';
             $style .=  cs_get_option('img_logo_height') ? 'max-height:' . cs_get_option('img_logo_height') . ' !important;' : '';
        }
        $style .= '}';
    }
}
echo esc_html($style);

$post_id = isset($_GET['post']) && is_numeric($_GET['post']) ? $_GET['post'] : '' ;

if(!empty($post_id)){
 $meta_data = get_post_meta( $post_id, '_custom_page_options', true );

if (isset($meta_data['footer_color']) && !empty($meta_data['footer_color'])) { ?>
body.page-id-<?php echo esc_attr($post_id); ?> #footer.modern,
body.page-id-<?php echo esc_attr($post_id); ?> #footer.classic {
    background-color: <?php echo esc_html($meta_data['footer_color']) ?>;
}

<?php }

if (isset($meta_data['header_scroll_bg']) && !empty($meta_data['header_scroll_bg'])) { ?>
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color {
    background-color: <?php echo esc_html($meta_data['header_scroll_bg']) ?>;
}

<?php }

 if(!empty($meta_data['padding_desktop'])){ ?>
.page-id-<?php echo esc_attr($post_id); ?> .padding-desc,
.page-id-<?php echo esc_attr($post_id); ?> .padding-desc .vc_row,
.page-id-<?php echo esc_attr($post_id); ?> .padding-desc + #footer > div {
    padding-right: <?php echo esc_attr($meta_data['padding_desktop']); ?>;
    padding-left: <?php echo esc_attr($meta_data['padding_desktop']); ?>;
}

<?php }

 if(!empty($meta_data['padding_mobile'])){ ?>

@media only screen and (max-width: 1024px) {
    .page-id-<?php echo esc_attr($post_id); ?> .padding-mob,
    .page-id-<?php echo esc_attr($post_id); ?> .padding-mob .vc_row,
    .page-id-<?php echo esc_attr($post_id); ?> .padding-mob + #footer > div {
        padding-right: <?php echo esc_attr($meta_data['padding_mobile']); ?>;
        padding-left: <?php echo esc_attr($meta_data['padding_mobile']); ?>;
    }
}

<?php }
}?>

/**** WHITE VERSION  ****/

<?php

if(cs_get_option('change_colors')){
if (cs_get_option( 'menu_bg_color') && cs_get_option('menu_bg_color') !== '#ffffff') { ?>
header.aside,
.header_top_bg:not(.header_trans-fixed):not(.bg-fixed-color):not(.fixed-header),
header.full .topmenu-full:before,
header .logo.logo-bg {
    background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color')) ?>;
}

@media (min-width: 1025px) {
    header.aside .header-middle .pado-shop-icon .cart-contents {
        background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color')) ?>;
    }

    header.aside .header-middle .pado-shop-icon {
        color: <?php echo esc_html(cs_get_option( 'menu_bg_color')) ?>;
    }
}

@media only screen and (max-width: 1024px) {
    header.simple #topmenu,
    header.aside #topmenu{
        background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color')) ?>;
    }
}

<?php }
if (cs_get_option( 'menu_font_color') && cs_get_option('menu_font_color') !== '#222222' ) { ?>

header .logo,
header .logo header a.logo-bg span,
header.simple #topmenu .menu li a,
header.aside #topmenu .menu li a,
header.full .full-menu-wrap ul li a {
    color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
}

header.full .mob-but-full .line,
header.full .mob-but-full.active .line {
    background-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>
}

@media (min-width: 1025px) {
    header.aside .logo,
    header.aside .header-middle .pado-shop-icon .cart-contents,
    header.simple #topmenu .menu>li.mega-menu>ul>li>a,
    header.simple .pado-buttons a,
    header.simple .pado_mini_cart .mini_cart_item_name,
    .header_top_bg.header_trans-fixed:not(.bg-fixed-color) header.simple.-light .mini-cart-wrapper .pado-shop-icon .cart-contents,
    header.aside .header-middle .open-search,
    header.simple .f-right {
        color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
    }

    header.simple .site-search .line,
    header.simple #topmenu .menu>li>a::before,
    header.aside .site-search .line,
    header.simple .mini-cart-wrapper .pado-shop-icon .cart-contents {
        background-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
    }
}

@media (max-width: 1024px) {
    header.aside #topmenu .menu li .menu-arrow,
    header.simple #topmenu .menu li .menu-arrow,
    header.simple .mob-nav-close,
    header.aside .mob-nav-close,
    header.simple .f-right{
        color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
    }

    header.simple .mini-cart-wrapper .pado-shop-icon {
        color: inherit;
    }

    header.aside .mob-nav-close .line,
    header.aside .cart-contents,
    header.aside .mob-nav .line,
    header.aside .mob-nav.active .line,
    header.simple .mob-nav-close .line,
    header.simple .cart-contents,
    header.simple .mob-nav .line,
    header.simple .mob-nav.active .line {
        background-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>
    }
}

<?php }
if (cs_get_option( 'menu_font_color_2') && cs_get_option('menu_font_color_2') !== '#999' ) { ?>
@media (min-width: 1025px) {
    header.simple #topmenu .menu>li li a,
    header.simple .pado_mini_cart .mini_cart_item_quantity,
    header.simple .pado_mini_cart .woocommerce-mini-cart__total,
    header.simple .remove_from_cart_button,
    header.simple .pado_mini_cart a.button,
    header.simple .search-form input,
    header.aside .copy,
    header.aside .social li a,
    header.aside .topmenu .menu ul li a {
        color: <?php echo esc_html(cs_get_option( 'menu_font_color_2')) ?>
    }

    header.aside .header-middle .open-search {
        background-color: <?php echo esc_html(cs_get_option( 'menu_font_color_2')) ?>
    }
}

@media (max-width: 1024px) {
    header.aside .social li a,
    header.aside .search-form input,
    header.aside .copy{
        color: <?php echo esc_html(cs_get_option( 'menu_font_color_2')) ?>
    }
}

<?php }
if (cs_get_option( 'submenu_bg_color') && cs_get_option('submenu_bg_color') !== '#ffffff' ) { ?>
@media only screen and (min-width: 1025px) {
    header.simple #topmenu .menu>li ul,
    header.aside .topmenu .menu ul {
        background-color: <?php echo esc_html(cs_get_option( 'submenu_bg_color')) ?>;
    }
}

<?php }
if (cs_get_option( 'menu_bg_color_scroll') && cs_get_option('menu_bg_color_scroll') !== '#ffffff' ) { ?>
.header_top_bg.header_trans-fixed.bg-fixed-color,
.bg-fixed-color header .logo.logo-bg {
    background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color_scroll')) ?>;
}

<?php }

if (cs_get_option( 'border_menu_bg_color') && cs_get_option('border_menu_bg_color') !== '#030e28' ) { ?>
@media only screen and (min-width: 1025px) {
    .aside-menu .aside-nav {
        background-color: <?php echo esc_html(cs_get_option( 'border_menu_bg_color')) ?>;
    }
}

<?php }?>

/* ======= FRONT COLOR 1 ======= */

<?php if (cs_get_option( 'front_color_1') && cs_get_option( 'front_color_1') !== '#222222') : ?>

button, html input[type=button], input[type=reset], input[type=submit],
.pado_copyright_overlay,
.flex-control-paging li a.flex-active {
    background: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>
}

body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2,
.a-btn-3-style [type="submit"], .a-btn-3,
.a-btn-4-style [type="submit"]:hover, .a-btn-4:hover,
.a-btn-5-style [type="submit"]:hover, .a-btn-5:hover,
.portfolio-single-content.simple_slider .swiper3-pagination-bullet,
.simple_slider .post-media .swiper3-pagination-bullet-active,
.pado-shop-main-banner ul li:not(:last-of-type)::after,
.post-media .video-content .play:hover,
.post.center-style.format-gallery .flex-direction-nav .flex-prev:hover, .post.center-style.format-gallery .flex-direction-nav .flex-next:hover, .post.center-style.format-post-slider .flex-direction-nav .flex-prev:hover, .post.center-style.format-post-slider .flex-direction-nav .flex-next:hover,
.post.center-style.format-link .info-wrap, .post.center-style.format-post-link .info-wrap,
.post.metro-style .info-wrap .category a:hover,
.post.metro-style.format-video .video-content .play:hover, .post.metro-style.format-post-video .video-content .play:hover,
.post.metro-style.format-link .post-wrap-item, .post.metro-style.format-post-link .post-wrap-item,
.post.metro-style.format-link .info-wrap, .post.metro-style.format-post-link .info-wrap,
.post.metro-style.format-gallery .flex-direction-nav .flex-prev:hover, .post.metro-style.format-gallery .flex-direction-nav .flex-next:hover, .post.metro-style.format-post-slider .flex-direction-nav .flex-prev:hover, .post.metro-style.format-post-slider .flex-direction-nav .flex-next:hover,
.single-post .single-content .swiper-arrow-right div::before, .single-post .single-content .swiper-arrow-left div::before,
.post-nav .pages, .post-nav .current, .pager-pagination .pages, .pager-pagination .current,
.img-slider .flex-next:hover, .img-slider .flex-prev:hover,
.post-details .single-categories a:hover,
.post-info span a,
.col-md-4 .widget_tag_cloud a, .col-md-3 .widget_tag_cloud a,
.pagination a.img,
.woocommerce div.product form.cart .button,
.woocommerce .woocommerce-message, .woocommerce .woocommerce-info, .woocommerce .woocommerce-error,
.woocommerce ul.products li.product .pado_product_list_name .count,
.woocommerce form.login .form-row input[type="checkbox"]:checked + label.checkbox:before, .woocommerce form.checkout .form-row input[type="checkbox"]:checked + label.checkbox:before, .woocommerce .woocommerce-shipping-fields input[type="checkbox"]:checked + label.checkbox:before,
.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce-page.woocommerce-cart a.button, .shipping-calculator-button, .woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button,
.toggle-title:after,
.banner-slider-wrap.vertical .pag-wrapper .swiper3-pagination .swiper3-pagination-progressbar,
.coming-page-wrapper .wpcf7 .input_protected_wrapper::before,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-prev,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-next:hover,
.info-block-wrap.style-3 .video.only-button .video-container iframe, .info-block-wrap.style-3 .video.only-button .fluid-width-video-wrapper iframe,
.info-block-wrap.style-4 .video.only-button .video-container iframe, .info-block-wrap.style-4 .video.only-button .fluid-width-video-wrapper iframe,
#multiscroll-nav a,
.skills .line .active-line,
.services.creative_slider .swiper3-button-next,
.urban_slider .slick-arrow:hover,
.properties_carousel .swiper3-button-prev, .properties_carousel .swiper3-button-next,
.main-header-testimonial.left_align .swiper3-pagination span {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>
}

.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active a,
.woocommerce div.product form.cart .button,
body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2,
.a-btn-3-style [type="submit"], .a-btn-3,
.woocommerce-page.woocommerce-cart a.button, .shipping-calculator-button, .woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, transparent), color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?>));
    background-image: -webkit-linear-gradient(left, transparent 50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%);
    background-image: -o-linear-gradient(left, transparent 50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%);
    background-image: linear-gradient(to right, transparent 50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%);
}

.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a,
.a-btn-4-style [type="submit"], .a-btn-4 {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?>), color-stop(50%, transparent));
    background-image: -webkit-linear-gradient(left, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%, transparent 50%);
    background-image: -o-linear-gradient(left, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%, transparent 50%);
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%, transparent 50%);
}

body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2,
body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2,
.a-btn-3-style [type="submit"], .a-btn-3,
.a-btn-3-style [type="submit"]:hover, .a-btn-3:hover,
.a-btn-4-style [type="submit"], .a-btn-4,
.a-btn-4-style [type="submit"]:hover, .a-btn-4:hover,
.a-btn-5-style [type="submit"]:hover, .a-btn-5:hover,
button, html input[type=button], input[type=reset], input[type=submit],
.woocommerce div.product form.cart .button,
.woocommerce div.product form.cart .button:hover,
.select2-drop-active,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a:hover,
.pado-sorting-products-widget .woocommerce-ordering select,
.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce form.login .form-row input[type="submit"]:focus:hover, .woocommerce form.login .form-row input[type="submit"]:visited:hover, .woocommerce form.login .form-row input[type="submit"]:active:hover, .woocommerce form.login .form-row input[type="submit"]:hover,
.woocommerce-page.woocommerce-cart a.button, .shipping-calculator-button, .woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button,
.woocommerce-page.woocommerce-cart a.button:hover, .shipping-calculator-button:hover, .woocommerce-page.woocommerce-cart .woocommerce input.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover,
.woocommerce-page.woocommerce-checkout .woocommerce input.button:focus,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a,
.page-numbers:hover, .page-numbers:focus,
.post-nav .pages, .post-nav .current, .pager-pagination .pages, .pager-pagination .current,
.flex-control-paging li,
.main-header-testimonial.left_align .swiper3-pagination span.swiper3-pagination-bullet-active::before {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>
}

body,
a, a:hover, a:focus,
caption,
.wpb_text_column h1, .wpb_text_column h2, .wpb_text_column h3, .wpb_text_column h4, .wpb_text_column h5, .wpb_text_column h6,
dt,
body.single-whizzy_proof_gallery .single-content .title,
body.single-whizzy_proof_gallery .whizzy-data .grid__item .entry__meta-box span,
body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2:hover,
#back-to-top,
.text-dark,
kbd,
.a-btn-3-style [type="submit"]:hover, .a-btn-3:hover,
.a-btn-4-style [type="submit"]:focus, .a-btn-4:focus,
.a-btn-4-style [type="submit"], .a-btn-4,
.a-btn-5-style [type="submit"], .a-btn-5,
.a-btn-5-style [type="submit"]:focus, .a-btn-5:focus,
.a-btn-6-style [type="submit"]:hover, .a-btn-6:hover,
.a-btn-7-style [type="submit"], .a-btn-7,
.a-btn-7-style [type="submit"]:focus, .a-btn-7:focus,
.a-btn-8-style [type="submit"]:hover, .a-btn-8:hover,
.error404 .hero-inner .title,
.error404 .hero-inner .a-btn-dark,
code,
.simple_gallery .flex-direction-nav a,
.simple_gallery .categories a:hover,
.simple_gallery .title,
.simple_gallery .info-item-wrap .name,
.urban .text-wrap h3, .urban .text-wrap h2, .urban .text-wrap h1,
.tile_info .text-gallery-wrap .text-wrap h3, .tile_info .text-gallery-wrap .text-wrap h2, .tile_info .text-gallery-wrap .text-wrap h1,
.parallax-window .content-parallax .title,
.parallax-window .content-parallax .category-parallax a:hover,
.parallax-window .content-parallax .info-item-wrap .item .name,
.portfolio-single-content.tile_info .text span,
.portfolio-single-content.urban .descr-wrapper .text span,
.woocommerce div.product form.cart .button:hover,
.woocommerce .single-product div.product p.price ins, .woocommerce .pado_product_detail div.product span.price ins, .woocommerce .single-product div.product span.price ins, .woocommerce ul.products.default li.product .price ins, .pado_cart.shop_table ul .cart_item ul .product-price ins, .pado_cart.shop_table ul .cart_item ul .product-subtotal ins, .woocommerce table.shop_table .cart_item .product-total ins,
.woocommerce-page ul.products li.product .pado-prod-list-image .pado-add-to-cart a, .woocommerce ul.products li.product .pado-prod-list-image .pado-add-to-cart a, .woocommerce-page.woocommerce .woocommerce-message a.button,
.woocommerce .single-product .star-rating, .woocommerce .pado_product_detail .star-rating,
.woocommerce .woocommerce-thankyou-order-received,
.woocommerce table.shop_table tfoot td,
.woocommerce .product-total, .woocommerce .shipped_via,
.pado_product_detail .social-list a,
.single-product .product .summary .variations_form.cart .variations_button span, .single-product .product .summary .variations_form.cart .variations tbody span, .pado_product_detail .product .summary .variations_form.cart .variations_button span, .pado_product_detail .product .summary .variations_form.cart .variations tbody span,
.single-product .product .summary .cart .variations .label label, .pado_product_detail .product .summary .cart .variations .label label,
.single-product .product .summary .cart .variations .value ul li label, .pado_product_detail .product .summary .cart .variations .value ul li label,
.single-product .product .summary .product_meta, .pado_product_detail .product .summary .product_meta,
.single-product div.product .woocommerce-tabs ul.tabs.wc-tabs li a, .pado_product_detail div.product .woocommerce-tabs ul.tabs.wc-tabs li a,
.single-product div.product .woocommerce-tabs .woocommerce-Tabs-panel h2, .pado_product_detail div.product .woocommerce-tabs .woocommerce-Tabs-panel h2,
.single-product .product #reviews #comments .commentlist .comment .comment-text .meta, .pado_product_detail .product #reviews #comments .commentlist .comment .comment-text .meta,
.single-product .product #reviews #comments .commentlist .comment .comment-text .date_publish, .pado_product_detail .product #reviews #comments .commentlist .comment .comment-text .date_publish,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-reply-title, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-reply-title,
.single-product .product div.related.products .related-subtitle, .pado_product_detail .product div.related.products .related-subtitle,
.single-product div.product .up-sells h2, .pado_product_detail div.product .up-sells h2,
.single-product .product .related.products h2, .pado_product_detail .product .related.products h2,
.single-product .product .related.products h2.woocommerce-loop-product__title, .pado_product_detail .product .related.products h2.woocommerce-loop-product__title,
.woocommerce ul.products li.product h3,
.pado-woocommerce-pagination .nav-links .nav-previous a, .pado-woocommerce-pagination .nav-links .nav-next a,
.pado-woocommerce-pagination .nav-links a::before,
.pado-woocommerce-pagination .nav-links .nav-previous a::after,
.pado_cart.shop_table .heading li,
.pado_cart.shop_table ul .cart_item ul .product-name a,
.pado_cart.shop_table ul .cart_item ul .product-name .variation dt,
.pado_cart.shop_table .complement-cart .coupon .input-text:-webkit-input-placeholder, .woocommerce form .form-row select:-webkit-input-placeholder, .woocommerce form .form-row input:-webkit-input-placeholder,
.pado_cart.shop_table .complement-cart .coupon .input-text:-moz-placeholder, .woocommerce form .form-row select:-moz-placeholder, .woocommerce form .form-row input:-moz-placeholder,
.pado_cart.shop_table .complement-cart .coupon .input-text:-ms-input-placeholder, .woocommerce form .form-row select:-ms-input-placeholder, .woocommerce form .form-row input:-ms-input-placeholder,
.pado_cart.shop_table .complement-cart .coupon .input-text:-moz-placeholder, .woocommerce form .form-row select:-moz-placeholder, .woocommerce form .form-row input:-moz-placeholder,
.woocommerce form .form-row select,
.pado-cart-collaterals h2,
.pado-cart-collaterals .cart_totals .shop_table ul li,
.woocommerce form.checkout_coupon .form-row input.input-text,
.woocommerce form.checkout_coupon .form-row input.input-text:-webkit-input-placeholder,
.woocommerce form.checkout_coupon .form-row input.input-text:-moz-placeholder,
.woocommerce form.checkout_coupon .form-row input.input-text:-ms-input-placeholder,
.woocommerce form.checkout_coupon .form-row input.input-text:-moz-placeholder,
.woocommerce form.checkout h3,
.woocommerce form.login .form-row label, .woocommerce form.checkout .form-row label,
.woocommerce form.login .form-row input, .woocommerce form.login .form-row textarea, .woocommerce form.checkout .form-row input, .woocommerce form.checkout .form-row textarea,
.woocommerce form.login .form-row input:-webkit-input-placeholder, .woocommerce form.login .form-row textarea:-webkit-input-placeholder, .woocommerce form.checkout .form-row input:-webkit-input-placeholder, .woocommerce form.checkout .form-row textarea:-webkit-input-placeholder,
.woocommerce form.login .form-row input:-moz-placeholder, .woocommerce form.login .form-row textarea:-moz-placeholder, .woocommerce form.checkout .form-row input:-moz-placeholder, .woocommerce form.checkout .form-row textarea:-moz-placeholder,
.woocommerce form.login .form-row input:-ms-input-placeholder, .woocommerce form.login .form-row textarea:-ms-input-placeholder, .woocommerce form.checkout .form-row input:-ms-input-placeholder, .woocommerce form.checkout .form-row textarea:-ms-input-placeholder,
.woocommerce form.login .form-row input:-moz-placeholder, .woocommerce form.login .form-row textarea:-moz-placeholder, .woocommerce form.checkout .form-row input:-moz-placeholder, .woocommerce form.checkout .form-row textarea:-moz-placeholder,
.select2-container--default .select2-selection--single .select2-selection__rendered,
.woocommerce form.login .lost_password a,
.select2-drop-active,
.select2-results li.select2-highlighted,
.woocommerce table.shop_table thead .product-name, .woocommerce table.shop_table thead .product-total,
.woocommerce table.shop_table .cart_item .product-name,
.woocommerce table.shop_table .cart_item .product-name .variation dt,
.woocommerce table.shop_table tfoot .cart-subtotal th, .woocommerce table.shop_table tfoot .shipping th,
.woocommerce table.shop_table .order-total th,
.woocommerce table.shop_table .order-total .woocommerce-Price-amount,
.woocommerce-checkout-review-order #payment div.payment_box,
.shipping-calculator-form button.button:hover,
.woocommerce ul.products li.product a h2,
.pado-best-seller-widget .seller-text a,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active a:hover,
.woocommerce-MyAccount-content a.woocommerce-Button:hover,
.woocommerce-MyAccount-content legend,
.woocommerce-MyAccount-content p a:hover,
.pado-shop-banner .pado-shop-title,
.pado-shop-main-banner ul li a,
.woocommerce form.login .form-row input[type="submit"]:focus:hover, .woocommerce form.login .form-row input[type="submit"]:visited:hover, .woocommerce form.login .form-row input[type="submit"]:active:hover, .woocommerce form.login .form-row input[type="submit"]:hover,
.woocommerce-page.woocommerce-cart a.button:hover, .shipping-calculator-button:hover, .woocommerce-page.woocommerce-cart .woocommerce input.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover,
.woocommerce-page.woocommerce .woocommerce-message a.button:hover,
.woocommerce form .form-row input,
.shipping-calculator-button,
.woocommerce .woocommerce-customer-details address p,
.single-product .product .summary .product_title, .pado_product_detail .product .summary .product_title,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a,
.post-little-banner .page-title-blog,
.post-little-banner.empty-post-list h3,
.post-media .video-content .play::before,
.post.center-style .title,
.post.center-style.format-quote .info-wrap blockquote, .post.center-style.format-post-text .info-wrap blockquote,
.post.center-style.format-gallery .flex-direction-nav .flex-prev, .post.center-style.format-gallery .flex-direction-nav .flex-next, .post.center-style.format-post-slider .flex-direction-nav .flex-prev, .post.center-style.format-post-slider .flex-direction-nav .flex-next,
.post.metro-style .info-wrap .title,
.post.metro-style.format-video .video-content .play::before, .post.metro-style.format-post-video .video-content .play::before,
.post.metro-style.format-quote i.fa-quote-right, .post.metro-style.format-post-text i.fa-quote-right,
.post.metro-style.format-quote .info-wrap blockquote, .post.metro-style.format-post-text .info-wrap blockquote,
.post.metro-style.format-gallery .flex-direction-nav .flex-prev, .post.metro-style.format-gallery .flex-direction-nav .flex-next, .post.metro-style.format-post-slider .flex-direction-nav .flex-prev, .post.metro-style.format-post-slider .flex-direction-nav .flex-next,
.blog.masonry .format-quote i.fa-quote-right,
.single-post .title,
.single-post .single-content blockquote p,
.single-post .single-content .swiper-container .description,
.single-post .single-content .swiper-arrow-right, .single-post .single-content .swiper-arrow-left,
.post-little-banner .main-top-content > *,
.main-wrapper .col-md-4 .sidebar-item h1, .main-wrapper .col-md-4 .sidebar-item h2, .main-wrapper .col-md-4 .sidebar-item h3, .main-wrapper .col-md-4 .sidebar-item h4, .main-wrapper .col-md-4 .sidebar-item h5, .main-wrapper .col-md-4 .sidebar-item h6, .main-wrapper .col-md-4 .sidebar-item strong, .main-wrapper .col-md-3 .sidebar-item h1, .main-wrapper .col-md-3 .sidebar-item h2, .main-wrapper .col-md-3 .sidebar-item h3, .main-wrapper .col-md-3 .sidebar-item h4, .main-wrapper .col-md-3 .sidebar-item h5, .main-wrapper .col-md-3 .sidebar-item h6, .main-wrapper .col-md-3 .sidebar-item strong,
.main-wrapper .col-md-4 .sidebar-item table, .main-wrapper .col-md-3 .sidebar-item table,
.main-wrapper .col-md-4 .sidebar-item table th, .main-wrapper .col-md-4 .sidebar-item table a, .main-wrapper .col-md-3 .sidebar-item table th, .main-wrapper .col-md-3 .sidebar-item table a,
.main-wrapper .col-md-4 .sidebar-item table caption, .main-wrapper .col-md-3 .sidebar-item table caption,
.main-wrapper .col-md-4 .sidebar-item .pado-recent-post-widget .recent-text a, .main-wrapper .col-md-3 .sidebar-item .pado-recent-post-widget .recent-text a,
.recent-post-single .recent-title,
.sm-wrap-post .content .title,
.pagination.cs-pager .page-numbers.next:after,
.pagination.cs-pager .page-numbers.prev:after,
.pages, .page-numbers,
.page-numbers:hover, .page-numbers:focus,
.single-pagination > div a.content,
.img-slider .flex-next, .img-slider .flex-prev,
.post-details .date-post span, .post-details .author span,
.post-details .link-wrap a,
.bottom-infopwrap .likes-wrap span, .bottom-infopwrap .count, .bottom-infopwrap .post__likes,
.user-info-wrap .post-author__title,
.single-content.no-thumb .main-top-content .title,
.post-info span.author,
.post-info span.author a,
.comments .content .comment-reply-link,
.comments .comment-reply-title,
.comments .content .text h1, .comments .content .text h2, .comments .content .text h3, .comments .content .text h4, .comments .content .text h5, .comments .content .text h6,
.comments .person .author,
.comments .comments-title, .comments .comments-title span,
#contactform h3, .comments-form h3,
#contactform textarea, #contactform input:not([type="submit"]), .comments-form textarea, .comments-form input:not([type="submit"]),
#contactform textarea::-moz-placeholder, #contactform input::-moz-placeholder, .comments-form textarea::-moz-placeholder, .comments-form input::-moz-placeholder,
.comment-form label, .comments.main label,
.sidebar-item ul li a,
.col-md-4 .sidebar-item .recentcomments a, .col-md-3 .sidebar-item .recentcomments a,
.col-md-4 .sidebar-item li, .col-md-3 .sidebar-item li,
.col-md-4 .sidebar-item.widget_rss h5 a, .col-md-3 .sidebar-item.widget_rss h5 a,
.col-md-4 .sidebar-item.widget_rss a.rsswidget, .col-md-3 .sidebar-item.widget_rss a.rsswidget,
.col-md-4 .sidebar-item.widget_rss cite, .col-md-3 .sidebar-item.widget_rss cite,
.col-md-3 .ContactWidget .contact_url, .col-md-3 .ContactWidget div.contact_content, .col-md-3 .ContactWidget a.fa, .col-md-3 .padoInstagramWidget, .col-md-4 .ContactWidget .contact_url, .col-md-4 .ContactWidget div.contact_content, .col-md-4 .ContactWidget a.fa, .col-md-4 .padoInstagramWidget,
.metro-load-more .metro-load-more__button,
.col-md-4 .sidebar-item h5, .col-md-3 .sidebar-item h5,
.col-md-4 .sidebar-item select, .col-md-3 .sidebar-item select,
.coming-soon-descr,
.coming-page-wrapper .form input::-webkit-input-placeholder,
.coming-page-wrapper .form input::-moz-placeholder,
.coming-page-wrapper .form input:-ms-input-placeholder,
.coming-page-wrapper .form input:-moz-placeholder,
.coming-page-wrapper .title,
.banner-slider-wrap.urban .pag-wrapper .swiper3-button-next, .banner-slider-wrap.urban .pag-wrapper .swiper3-button-prev,
.banner-slider-wrap.vertical .pag-wrapper .swiper3-button-prev, .banner-slider-wrap.vertical .pag-wrapper .swiper3-button-next,
.banner-slider-wrap.vertical .pag-wrapper .number-slides .total,
.banner-slider-wrap.vertical .subtitle,
.banner-slider-wrap.vertical .text,
.banner-slider-wrap.vertical .title,
.top-banner .description,
.accordion-wrapper .accordion-title,
.top-banner .subtitle,
.top-banner .title,
.contacts-info-wrap.style3 .text,
.contacts-info-wrap.style3 .form input::-webkit-input-placeholder,
.contacts-info-wrap.style3 .form input::-moz-placeholder,
.contacts-info-wrap.style3 .form input:-ms-input-placeholder,
.contacts-info-wrap.style3 .form input:-moz-placeholder,
.contacts-info-wrap.style3 .form textarea::-webkit-input-placeholder,
.contacts-info-wrap.style3 .form textarea::-moz-placeholder,
.contacts-info-wrap.style3 .form textarea:-ms-input-placeholder,
.contacts-info-wrap.style3 .form textarea:-moz-placeholder,
.contacts-info-wrap.style4 .additional-content-wrap .text,
.contacts-info-wrap.style4 .additional-content-wrap .title,
.faq-item .title,
.headings.style2 .title,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-prev:hover,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-next,
.info-block-wrap.style-3 .title,
.info-block-wrap.style-3 .content h1, .info-block-wrap.style-3 .content h2, .info-block-wrap.style-3 .content h3, .info-block-wrap.style-3 .content h4, .info-block-wrap.style-3 .content h5, .info-block-wrap.style-3 .content h6,
.info-block-wrap.style-3 .content ul,
.info-block-wrap.style-3 .video.only-button .video-content span,
.last-post-wrap .last-post-button a,
.last-post-wrap .post-item__content h3,
.info-block-wrap.style-5 .content-wrap .title,
.info-block-wrap.style-4 .video.only-button .video-content span,
.info-block-wrap.promotion .subtitle,
.info-block-wrap.promotion .title,
.thumb-slider-wrapp .thumb-slider-wrapp-arrow .hide-images, .thumb-slider-wrapp .thumb-slider-wrapp-arrow .show-images,
.location-map .tabs .subtitle,
.location-map .tabs .title,
.location__item .title,
.parallax-showcase-wrapper .title,
.parallax-showcase-wrapper .desc,
.filter_slider .swiper3-pagination .swiper3-pagination-bullet-active i,
.product-slider-wrapper .swiper3-pagination,
.services.creative_slider .content-slide .text,
.services.creative_slider .swiper3-button-prev,
.location-map .tabs .info__text span,
.urban_slider .slick-current .pagination-title,
.services.accordion .accordeon .title,
.services.center .text,
.skills .skill,
.skill-wrapper .title,
.skill-wrapper.linear .skill-label,
.skill-wrapper.linear .skill-value,
.main-header-testimonial.left_align .content-slide .description p,
.main-header-testimonial.left_align .content-slide .user-info .name, .main-header-testimonial.left_align .content-slide .user-info .position,
.main-header-testimonial.modern .content-slide .description p,
.main-header-testimonial.modern .swiper3-button-next::before, .main-header-testimonial.modern .swiper3-button-prev::before,
.team-members-wrap .member-name {
    color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>
}

.woocommerce .sidebar-item a.remove,
.woocommerce a.remove:hover,
.post-nav a span {
    color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?> !important
}

.error404 .hero-inner .bigtext {
    text-shadow: -10px 0 0 <?php echo esc_html(cs_get_option( 'front_color_1')) ?>
}

<?php endif;

/* ======= FRONT COLOR 2 ======= */

if (cs_get_option( 'front_color_2') && cs_get_option( 'front_color_2') !== '#999999') : ?>
.post > .post-wrap-item,
.product-slider-wrapper .additional-link::before {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>;
}

table, th, td,
abbr, acronym,
.a-btn-5-style [type="submit"], .a-btn-5,
.a-btn-6-style [type="submit"], .a-btn-6,
.a-btn-6-style [type="submit"]:hover, .a-btn-6:hover,
#back-to-top,
.protected-page form input:not([type="submit"]),
.single-product .product .woocommerce-Reviews #review_form_wrapper input, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper input, .single-product .product .woocommerce-Reviews #review_form_wrapper textarea, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper textarea,
.woocommerce form .form-row.woocommerce-invalid .select2-container, .woocommerce form .form-row.woocommerce-invalid input.input-text, .woocommerce form .form-row.woocommerce-invalid select,
.pages, .page-numbers,
.main-wrapper .col-md-4 .sidebar-item, .main-wrapper .col-md-3 .sidebar-item,
.post-info .single-tags a, .bottom-infopwrap .single-tags a, .user-info-wrap .single-tags a, .main-top-content .single-tags a, .post-details .link-wrap .single-tags a, .post-details .post-media .single-tags a,
.comments.main,
.widget_product_search input[type="search"], .widget_search input[type="text"],
.col-md-4 .sidebar-item select, .col-md-3 .sidebar-item select {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>
}

.a-btn-5-style [type="submit"]:hover, .a-btn-5:hover,
.a-btn-link:hover,
.error404 .hero-inner .subtitle,
.error404 .hero-inner .search input:not([type="submit"]),
blockquote cite,
.wpb_text_column p,
body.single-whizzy_proof_gallery .whizzy-data .grid__item .entry__meta-box .meta-box__title,
.urban .text-wrap .text,
.urban .blockquote cite,
.tile_info .text-gallery-wrap .info-item-wrap .text-item,
.tile_info .text-gallery-wrap .info-item-wrap .text-item a,
.tile_info .text-gallery-wrap .text-wrap .text,
.tile_info .blockquote cite,
.simple_gallery .text p,
.simple_gallery .info-item-wrap .text-item, .simple_gallery .info-item-wrap .text-item a,
.simple_slider .info-wrap .text-item a,
.simple_slider .text-wrap .text,
.simple_slider .blockquote cite,
.urban .banner-wrap .excerpt,
.urban .info-item-wrap .text-item,
.urban .info-item-wrap .text-item a,
.alia .text-gallery-wrap .info-item-wrap .text-item, .alia .text-gallery-wrap .info-item-wrap a,
.alia .text-wrap .text p,
.menio .blockquote cite,
.menio .additional-text,
.menio .text-wrap p,
.parallax-window .content-parallax .text,
.parallax-window .content-parallax .info-item-wrap .item .text-item a, .parallax-window .content-parallax .info-item-wrap .item .text-item,
.portfolio-single-content.left_gallery .info-wrap .text,
.portfolio-single-content.left_gallery .info-item-wrap .text-item,
.portfolio-single-content.left_gallery .info-item-wrap .text-item a,
p.cart-empty,
.woocommerce .single-product div.product p.price, .woocommerce .pado_product_detail div.product span.price, .woocommerce .single-product div.product span.price, .woocommerce ul.products.default li.product .price, .pado_cart.shop_table ul .cart_item ul .product-price, .pado_cart.shop_table ul .cart_item ul .product-subtotal, .woocommerce table.shop_table .cart_item .product-total,
.woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .shipping-calculator-button,
.woocommerce .quantity .qty,
.woocommerce .woocommerce-message, .woocommerce .woocommerce-info, .woocommerce .woocommerce-error,
.single-product .product .summary .cart .variations .value ul li p, .pado_product_detail .product .summary .cart .variations .value ul li p,
.woocommerce .woocommerce-message a, .woocommerce .woocommerce-info a, .woocommerce .woocommerce-error a,
.single-product .product .summary .woocommerce-product-rating .woocommerce-review-link, .pado_product_detail .product .summary .woocommerce-product-rating .woocommerce-review-link,
.single-product .product .summary .product_desc p, .pado_product_detail .product .summary .product_desc p,
.single-product .product .summary .variations_form.cart .variations .value select, .pado_product_detail .product .summary .variations_form.cart .variations .value select,
.single-product .product .summary .product_meta a, .pado_product_detail .product .summary .product_meta a,
.single-product .product .summary .product_meta .sku_wrapper .sku, .pado_product_detail .product .summary .product_meta .sku_wrapper .sku,
.single-product div.product .woocommerce-tabs .woocommerce-Tabs-panel p, .pado_product_detail div.product .woocommerce-tabs .woocommerce-Tabs-panel p,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form-rating label, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form-rating label,
.single-product .product .woocommerce-Reviews #review_form_wrapper input, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper input, .single-product .product .woocommerce-Reviews #review_form_wrapper textarea, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper textarea,
.pado_cart.shop_table .complement-cart .coupon .input-text[type="submit"], .woocommerce form .form-row select[type="submit"], .woocommerce form .form-row input[type="submit"],
.woocommerce form.login .lost_password a:hover,
.select2-search input,
.select2-results li,
.woocommerce table.shop_table .cart_item .product-name strong,
.woocommerce-checkout-review-order #payment .payment_methods.methods li,
.woocommerce-checkout-review-order #payment .payment_methods.methods li label,
.woocommerce-checkout-review-order #payment .payment_methods.methods li .about_paypal,
.woocommerce div.product p.stock,
.pado-sorting-products-widget .woocommerce-ordering select,
.woocommerce-MyAccount-content .woocommerce-Address-title .edit,
.woocommerce-MyAccount-content address,
.woocommerce-MyAccount-content p a,
.pado-shop-banner .pado-shop-menu ul li,
.pado-shop-banner .pado-shop-menu ul li a,
.pado-shop-main-banner ul li,
.woocommerce table.shop_table .cart_item .product-name .variation dd p,
.woocommerce ul.products li.product span del,
.woocommerce ul.products li.product span del span,
.pado-best-seller-widget .seller-price del span,
.woocommerce ul.products li.product,
.pado_cart.shop_table ul .cart_item ul .product-name .variation dd p,
#ship-to-different-address label,
.post-little-banner .count-results,
.post-little-banner.empty-post-list input:not([type="submit"]),
.post.center-style .date a,
.post.center-style.format-quote .info-wrap cite, .post.center-style.format-post-text .info-wrap cite,
.post.metro-style .info-wrap .date a,
.post.metro-style .info-wrap .text p,
.post.metro-style .info-wrap .counters span, .post.metro-style .info-wrap .counters .count,
.post.metro-style.format-quote .info-wrap cite, .post.metro-style.format-post-text .info-wrap cite,
.single-post p,
.main-wrapper .col-md-4 .sidebar-item a, .main-wrapper .col-md-4 .sidebar-item li, .main-wrapper .col-md-4 .sidebar-item p, .main-wrapper .col-md-3 .sidebar-item a, .main-wrapper .col-md-3 .sidebar-item li, .main-wrapper .col-md-3 .sidebar-item p,
.main-wrapper .col-md-4 .sidebar-item.widget_tag_cloud a, .main-wrapper .col-md-3 .sidebar-item.widget_tag_cloud a,
.main-wrapper .col-md-4 .sidebar-item .pado-widget-about .text, .main-wrapper .col-md-3 .sidebar-item .pado-widget-about .text,
.main-wrapper .col-md-4 .sidebar-item .pado-recent-post-widget .recent-date, .main-wrapper .col-md-3 .sidebar-item .pado-recent-post-widget .recent-date,
.single-pagination > div,
.post-details .date-post, .post-details .author,
.post-details ul li, .post-details ol li,
.post-info .single-tags a, .bottom-infopwrap .single-tags a, .user-info-wrap .single-tags a, .main-top-content .single-tags a, .post-details .link-wrap .single-tags a, .post-details .post-media .single-tags a,
.user-info-wrap .post-author__nicename,
.comments .content .text,
.comments .person .comment-date,
.widget_product_search input[type="search"], .widget_search input[type="text"],
.col-md-4 .sidebar-item a, .col-md-4 .sidebar-item span, .col-md-4 .sidebar-item p, .col-md-4 .sidebar-item strong, .col-md-3 .sidebar-item a, .col-md-3 .sidebar-item span, .col-md-3 .sidebar-item p, .col-md-3 .sidebar-item strong,
.sidebar-item .price_slider_amount button.button,
.sidebar-item span.product-title,
.main-wrapper .col-md-4 .sidebar-item .cat-item.current-cat a, .main-wrapper .col-md-3 .sidebar-item .cat-item.current-cat a,
.post.center-style.format-link .link-wrap i, .post.center-style.format-post-link .link-wrap i,
.post.metro-style.format-link .link-wrap i, .post.metro-style.format-post-link .link-wrap i,
.post.center-style.format-quote .info-wrap i, .post.center-style.format-post-text .info-wrap i,
.about-section .description,
.accordion-wrapper .accordion-description, .accordion-wrapper .accordion-position,
.accordion-wrapper .accordion-form div.wpcf7-response-output, .accordion-wrapper .accordion-form div.wpcf7-validation-errors, .accordion-wrapper .accordion-form div.wpcf7-acceptance-missing,
.banner-slider-wrap.vertical .pag-wrapper .number-slides,
.banner-slider-wrap.urban .pag-wrapper .swiper3-pagination,
.banner-slider-wrap.urban .pag-wrapper .swiper3-pagination-total,
.coming-page-wrapper .subtitle,
.contacts-info-wrap.simple_form p > span span.wpcf7-not-valid-tip,
.contacts-info-wrap.style5 .item-wrapper a, .contacts-info-wrap.style5 .item-wrapper .text,
.contacts-info-wrap.style3 .form span,
.contacts-info-wrap.style4 .additional-content-wrap,
.contacts-info-wrap.style4 .additional-content-wrap .content-item a, .contacts-info-wrap.style4 .additional-content-wrap .content-item div,
.contacts-info-wrap.simple_form div.wpcf7-validation-errors, .contacts-info-wrap.simple_form div.wpcf7-acceptance-missing,
.faq-item .text,
.headings.style2 .description,
.location-content .descr-row,
.location__item:before,
.last-post-wrap .post-item__date,
.info-block-wrap.style-1 .content p,
.info-block-wrap.style-4 .content p,
.info-block-wrap.discount .subtitle,
.info-block-wrap.style-3 .content p,
.location__item .description,
.location-map .tabs .description,
.location-map .tabs .info__text,
.location-map .tabs .info__text a,
.split-wrapper .wpcf7 textarea, .split-wrapper .wpcf7 input:not([type="submit"]),
.split-wrapper .description,
.skill-wrapper.numerical .skill-label,
.skill-wrapper .text,
.service-list-wrapper .text,
.services.accordion .accordeon .text,
.services.accordion .accordeon a,
.services.creative_slider .text,
.product-slider-wrapper .additional-link,
.product-slider-wrapper .prod-descr,
.post-slider-wrapper.classic_slider_progress .date,
.post-slider-wrapper.slider_progress .date,
.filter_slider .swiper3-pagination .swiper3-pagination-bullet i,
.services.classic .text,
.skill-wrapper.circle .skill-text,
.split-wrapper .wpcf7 div.wpcf7-mail-sent-ok, .split-wrapper .wpcf7 div.wpcf7-validation-errors, .split-wrapper .wpcf7 div.wpcf7-acceptance-missing,
.split-wrapper .wpcf7 span.wpcf7-not-valid-tip,
.team-members-wrap .member-position,
.main-header-testimonial.modern .content-slide .position {
    color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>
}

.woocommerce .woocommerce-error li {
    color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?> !important;
}


<?php endif;

/* ======= FRONT COLOR 3 ======= */

if (cs_get_option( 'front_color_3') && cs_get_option( 'front_color_3') !== '#eeeeee') : ?>
.urban .banner-wrap,
.tile_info .recent-posts-wrapper,
.menio .recent-posts-wrapper,
.portfolio-single-content.urban .main-info-wrap,
.single-product .product .summary .cart .variations .value ul li label:before, .pado_product_detail .product .summary .cart .variations .value ul li label:before,
.product-gallery-wrap .on-new,
.pado-cart-collaterals .cart_totals .shop_table ul li:first-child, .pado-cart-collaterals .cart_totals .shop_table ul li:last-child,
.woocommerce form.login .form-row label.checkbox:before, .woocommerce form.checkout .form-row label.checkbox:before, .woocommerce .woocommerce-shipping-fields label.checkbox:before,
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
.shop-list-page .on-new,
.woocommerce ul.products li.product span.on-new,
.pado-shop-banner,
.pado-shop-banner .pado-shop-menu ul li:not(:last-of-type)::after,
.woocommerce form.login .form-row input:-webkit-autofill, .woocommerce form.checkout .form-row input:-webkit-autofill, .woocommerce form.login .form-row input:-webkit-autofill:hover, .woocommerce form.checkout .form-row input:-webkit-autofill:hover, .woocommerce form.login .form-row input:-webkit-autofill:focus, .woocommerce form.checkout .form-row input:-webkit-autofill:focus,
.input_post_wrapper::before,
.skill-wrapper.linear .line,
.skills .line,
.services.creative_slider .swiper3-button-prev,
.post-slider-wrapper.classic_slider_progress .swiper3-pagination,
.post-slider-wrapper.slider_progress .swiper3-pagination,
.filter_slider .swiper3-pagination .swiper3-pagination-bullet-active:not(:last-of-type)::after,
.filter_slider .swiper3-pagination .swiper3-pagination-bullet:last-child:not(:first-child).swiper3-pagination-bullet-active::after,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-prev:hover,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-next,
.banner-slider-wrap.urban .pag-wrapper .swiper3-pagination:before, .banner-slider-wrap.urban .pag-wrapper .swiper3-pagination:after,
.simple_slider .post-media .swiper3-pagination-bullet,
.a-btn-5-style [type="submit"], .a-btn-5,
.a-btn-6-style [type="submit"]:hover, .a-btn-6:hover,
.simple_slider.single-pagination::before,
code,
.banner-slider-wrap.vertical.light .pag-wrapper .swiper3-pagination,
.product-slider-wrapper .swiper3-pagination .swiper3-pagination-bullet::after, .product-slider-wrapper .swiper3-pagination .swiper3-pagination-bullet::before,
.interactive-slider .tabs-item::before,
.skills.light .line,
.service-list-wrapper .img-wrap a,
.showcase_slider .slide-image .hover_arrow {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>
}

.sidebar-item ins,
.metro-load-more {
    background: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>;
}

.a-btn-6-style [type="submit"], .a-btn-6 {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_3')) ?>), color-stop(50%, transparent));
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'front_color_3')) ?> 50%, transparent 50%);
}

.urban .social-list a,
.portfolio-single-content.left_gallery .social-list a,
.tile_info .social-list a,
.alia .text-gallery-wrap .info-item-wrap .name,
.alia .social-list a,
.menio .social-list a,
.woocommerce .quantity .qty,
.single-product .product .summary .variations_form.cart, .pado_product_detail .product .summary .variations_form.cart,
.single-product .product .summary .variations_form.cart .variations .value select, .pado_product_detail .product .summary .variations_form.cart .variations .value select,
.single-product .product .summary .cart .variations .value fieldset, .pado_product_detail .product .summary .cart .variations .value fieldset,
.single-product .product .woocommerce-tabs .tabs.wc-tabs:before, .pado_product_detail .product .woocommerce-tabs .tabs.wc-tabs:before,
.pado_cart.shop_table .heading,
.pado_cart.shop_table ul .cart_item,
.pado_cart.shop_table .complement-cart .coupon .input-text, .woocommerce form .form-row select, .woocommerce form .form-row input,
.pado-cart-collaterals .cart_totals .shop_table ul li,
.pado-cart-collaterals .cart_totals .shop_table ul li:first-child, .pado-cart-collaterals .cart_totals .shop_table ul li:last-child,
.woocommerce form.checkout_coupon .form-row input.input-text,
.woocommerce form.login .form-row input, .woocommerce form.login .form-row textarea, .woocommerce form.checkout .form-row input, .woocommerce form.checkout .form-row textarea,
.woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-invalid .select2-container,
.select2-container,
.woocommerce table.shop_table tfoot,
.woocommerce table.shop_table .cart-subtotal,
.woocommerce table.shop_table .shipping,
.woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .shipping-calculator-button,
.pado-best-seller-widget .swiper3-slide,
.select2-search input,
.select2-container.select2-dropdown-open.select2-drop-above .select2-choice,
.pado_cart.shop_table ul .cart_item ul .product-thumbnail img,
.pado_product_detail .product .pado_images a, .single-product .product .pado_images a,
.product-gallery-thumbnail-wrap .s-back-switch::before,
.page .woocommerce.columns-3 ul.products li.product .pado-prod-list-image, .woocommerce ul.products li.product .pado-prod-list-image,
.woocommerce form.checkout_coupon, .woocommerce form.login,
.comment-title,
.single-post .single-content .swiper-container,
.main-wrapper .col-md-4 .sidebar-item h5, .main-wrapper .col-md-3 .sidebar-item h5,
.post-info span,
#contactform textarea, #contactform input:not([type="submit"]), .comments-form textarea, .comments-form input:not([type="submit"]),
.accordion-wrapper .accordion-header,
.accordion-wrapper .accordion-content,
.accordion-wrapper .accordion-item:last-child .accordion-content,
.contacts-info-wrap.style3 .form input:not([type="submit"]), .contacts-info-wrap.style3 .form textarea,
.faq-item:not(:last-of-type),
.split-wrapper .wpcf7 textarea, .split-wrapper .wpcf7 input:not([type="submit"]),
.last-post-wrap .last-post-button a,
.last-post-wrap .post-item__wrapper,
.line-of-images.clients .line-wrap,
.line-of-images.clients .line-item,
.info-block-wrap.style-3 .video.only-button .video-content span,
.services.accordion .accordeon a {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>
}

.a-btn-6-style [type="submit"], .a-btn-6,
.a-btn-6-style [type="submit"]:focus, .a-btn-6:focus,
.urban .social-list a,
.tile_info .recent-posts-wrapper .subtitle,
.simple_slider .info-wrap .social-list a,
.alia .social-list a,
.menio .social-list a,
.tile_info .social-list a,
.pado-best-seller-widget .swiper3-button-prev, .pado-best-seller-widget .swiper3-button-next,
.single-product .product #reviews #comments .commentlist .comment .comment-text .description, .pado_product_detail .product #reviews #comments .commentlist .comment .comment-text .description,
.woocommerce ul.products li.product .category-product a,
.woocommerce .single-product .star-rating:before, .woocommerce .pado_product_detail .star-rating:before,
.select2-search:after,
.bottom-infopwrap .likes-wrap .post__likes::before,
.single-pagination > div.pag-prev::before,
.sm-wrap-post .content .excerpt,
.post.metro-style .info-wrap .counters i,
.single-post dl dd, .comments dl dd,
.sm-wrap-post .content .post-date .date,
.single-pagination > div.pag-next::after,
.single-pagination .icon-wrap i,
.bottom-infopwrap .social-list a,
.user-info-wrap .post-author__social a,
.post-info span a, .post-info span,
.banner-slider-wrap.urban .additional_title,
.top-banner .additional_title,
.about-section .bg-title,
.accordion-wrapper .accordion-title i,
.accordion-wrapper .accordion-title span,
.top-banner .socials a,
.banner-slider-wrap.urban .socials a,
.main-header-testimonial.modern .bg-text,
.service-list-wrapper.classic .counter,
.services.creative_slider .content-slide i,
.services.creative_slider .services-bg-text,
.promotion.info_video .item .item-name,
.promotion.simple .description,
.promotion.modern .description,
.product-slider-wrapper .bg-title,
.urban_slider .pagination-category,
.filter_slider .portfolio-tabs-wrapper .filters ul li span,
.info-block-wrap.style-3 .bg-text,
.location .bg-title,
.urban_slider .pagination-title,
.info-block-wrap.style-5 .bg-text,
.showcase_slider .slide-image .arrow::before {
    color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>
}

.pado_cart.shop_table ul .cart_item ul .product-remove .remove {
    color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?> !important;
}

.woocommerce form.login .form-row input:-webkit-autofill, .woocommerce form.checkout .form-row input:-webkit-autofill, .woocommerce form.login .form-row input:-webkit-autofill:hover, .woocommerce form.checkout .form-row input:-webkit-autofill:hover, .woocommerce form.login .form-row input:-webkit-autofill:focus, .woocommerce form.checkout .form-row input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0 1000px <?php echo esc_html(cs_get_option( 'front_color_3')) ?> inset;
    box-shadow: 0 0 0 1000px <?php echo esc_html(cs_get_option( 'front_color_3')) ?> inset
}

.coming-soon .count {
    text-shadow: 7px 0 0 <?php echo esc_html(cs_get_option( 'front_color_3')) ?>
}

.skill-wrapper.circle svg circle {
    stroke: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>
}

.video.only-button .video-content::before,
.video.only-button .video-content::after {
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'front_color_3')) ?> 53%, rgba(255, 255, 255, 0) 0%);
}

<?php endif;


if (cs_get_option( 'front_color_1') && cs_get_option( 'front_color_3')) : ?>

.a-btn-5-style [type="submit"], .a-btn-5 {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?>), color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_3')) ?>));
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%, <?php echo esc_html(cs_get_option( 'front_color_3')) ?> 50%);
}

<?php endif;

/* ======= LIGHT COLOR ======= */

if (cs_get_option( 'light_color') && cs_get_option( 'light_color') !== '#ffffff') : ?>

.iframe-video.audio,
.a-btn-7-style [type="submit"],.a-btn-7,
.a-btn-8-style [type="submit"]:hover,.a-btn-8:hover,
#back-to-top,
.parallax-window .content-parallax,
.simple_gallery .flex-direction-nav a,
.woocommerce ul.products li.product .pado-prod-list-image:after,
.woocommerce-MyAccount-content a.woocommerce-Button:hover,
.woocommerce-page.woocommerce .woocommerce-message a.button:hover,
.woocommerce-page .unit .post-paper,
.post-media .video-content .play,
.post.center-style .info-wrap,
.post.metro-style .post-wrap-item,
.post.metro-style .info-wrap,
.post.metro-style.format-video .video-content .play,.post.metro-style.format-post-video .video-content .play,
.post.metro-style.format-gallery .flex-direction-nav .flex-prev,.post.metro-style.format-gallery .flex-direction-nav .flex-next,.post.metro-style.format-post-slider .flex-direction-nav .flex-prev,.post.metro-style.format-post-slider .flex-direction-nav .flex-next,
.unit .blog.masonry+.sidebar .sidebar-item,
.single-post .single-content .swiper-container .description,
.single-post .single-content .swiper-arrow-right,.single-post .single-content .swiper-arrow-left,
.pages,.page-numbers,
.post-banner,
.sidebar-show.metro .sidebar-item,
.unit .single-post .comments .comment .content,
.unit .single-post,
.comments .comment .content,
.comments .person .comment-date::before,
.blog.metro,.archive.metro,
.post-little-banner,
.post.center-style .date::before,
.post.center-style.format-quote .info-wrap,.post.center-style.format-post-text .info-wrap,
.post.center-style.format-gallery .flex-direction-nav .flex-prev,.post.center-style.format-gallery .flex-direction-nav .flex-next,.post.center-style.format-post-slider .flex-direction-nav .flex-prev,.post.center-style.format-post-slider .flex-direction-nav .flex-next,
.post-paper.masonry,
.post-paper,
.post-details .date-post::before,
.post-details .link-wrap,
.user-info-wrap .post-author,
.user-info-wrap .post-author__nicename::before,
.post-info span.author,
.img-slider .flex-next, .img-slider .flex-prev,
.banner-slider-wrap.vertical.light .pag-wrapper .swiper3-pagination .swiper3-pagination-progressbar,
.banner-slider-wrap.urban .additional_wrap,
.banner-slider-wrap.urban .pag-wrapper,
.top-banner .additional_wrap,
.contacts-info-wrap.style4 .additional-content-wrap,
.image-parallax__content,
.video.only-button .video-content .play:hover,
.team-members-wrap.inline_text .team-member .social,
.service-list-wrapper .content-wrap,
.services.accordion .accordeon-wrap,
.services.creative_slider .content-slide,
.promotion.simple .promotion-content,
.post-slider-wrapper.slider_progress .content-wrap,
.split-wrapper .vertical::before,.split-wrapper .vertical::after,
.split-wrapper .horizontal::after,.split-wrapper .horizontal::before,
.urban_slider .slick-arrow,
.thumb-slider-wrapp .sub-thumb-slider,
.location-map .tabs,
.location__item.active,
.last-post-wrap .post-item__wrapper,
.info-block-wrap.style-3 .video.only-button .video-content .play:hover,
.info-block-wrap.discount .subtitle,
.info-block-wrap.style-4 .video.only-button .video-content .play:hover,
.info-block-wrap.style-5 .image-wrap .play:hover,
.thumb-slider-wrapp .thumb-slider-wrapp-arrow .hide-images,.thumb-slider-wrapp .thumb-slider-wrapp-arrow .show-images,
.team-members-wrap.slider_modern .team-member .social,
#multiscroll-nav a.active {
    background-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>
}

.flex-control-paging li a {
    background: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}


.a-btn-7-style [type="submit"],.a-btn-7 {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, transparent), color-stop(50%, <?php echo esc_html(cs_get_option( 'light_color')) ?>));
    background-image: linear-gradient(to right, transparent 50%, <?php echo esc_html(cs_get_option( 'light_color')) ?> 50%);
}

.woocommerce-page.woocommerce .woocommerce-message a.button:hover,
.woocommerce-MyAccount-content a.woocommerce-Button:hover,
.a-btn-8-style [type="submit"]:hover,.a-btn-8:hover {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'light_color')) ?>), color-stop(50%, transparent));
    background-image: -webkit-linear-gradient(left, <?php echo esc_html(cs_get_option( 'light_color')) ?> 50%, transparent 50%);
    background-image: -o-linear-gradient(left, <?php echo esc_html(cs_get_option( 'light_color')) ?> 50%, transparent 50%);
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'light_color')) ?> 50%, transparent 50%);
}

.a-btn-7-style [type="submit"]:hover,.a-btn-7:hover,
.a-btn-8-style [type="submit"],.a-btn-8,
.a-btn-7-style [type="submit"],.a-btn-7,
.a-btn-8-style [type="submit"]:hover,.a-btn-8:hover,
.woocommerce-page.woocommerce .woocommerce-message a.button,
.woocommerce-page.woocommerce .woocommerce-message a.button:hover,
.woocommerce-MyAccount-content a.woocommerce-Button:hover,
.woocommerce-MyAccount-content a.woocommerce-Button,
.flex-control-paging li a,
.split-wrapper .content-wrap.light .wpcf7 textarea, .split-wrapper .content-wrap.light .wpcf7 input:not([type="submit"]) {
    border-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>
}

::-moz-selection,
::selection,
.mb_YTPPlaypause:before,
.text-light,
mark,ins,
button,html input[type=button],input[type=reset],input[type=submit],
.protected-page form input[type="submit"],
body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2,
body.single-whizzy_proof_gallery .whizzy-data .grid__item .a-btn-2:focus,
.pado_copyright_overlay h1,.pado_copyright_overlay h2,.pado_copyright_overlay h3,.pado_copyright_overlay h4,.pado_copyright_overlay h5,.pado_copyright_overlay h6,
.pado_copyright_overlay_text,
.a-btn-1-style [type="submit"],.a-btn-1,
.a-btn-1-style [type="submit"]:focus,.a-btn-1:focus,
.a-btn-2-style [type="submit"]:hover,.a-btn-2:hover,
.a-btn-3-style [type="submit"]:focus,.a-btn-3:focus,
.a-btn-8-style [type="submit"]:focus,.a-btn-8:focus,
.a-btn-3-style [type="submit"],.a-btn-3,
.a-btn-4-style [type="submit"]:hover,.a-btn-4:hover,
.a-btn-7-style [type="submit"]:hover,.a-btn-7:hover,
.a-btn-8-style [type="submit"],.a-btn-8,
.error404 .hero-inner .search input[type="submit"],
.menio .banner-wrap .title,
.menio .banner-wrap .social-list li a,
.alia .banner-wrap .title,
.button.wc-backward,
.woocommerce div.product form.cart .button,
.woocommerce-page.woocommerce-cart .woocommerce input.button:hover,.woocommerce-page.woocommerce-checkout .woocommerce input.button:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.shipping-calculator-button:hover,
.woocommerce-page.woocommerce-cart a.button,.woocommerce-page.woocommerce-checkout a.button,.woocommerce-page.woocommerce a.button,.woocommerce-page.woocommerce button.button.alt,.woocommerce button.button.alt,
.woocommerce-page.woocommerce-cart a.button:hover,.woocommerce-page.woocommerce-checkout a.button:hover,.woocommerce-page.woocommerce a.button:hover,.woocommerce-page.woocommerce button.button.alt:hover,.woocommerce button.button.alt:hover,
.woocommerce .pado_images span.onsale,.woocommerce ul.products li.product .pado-prod-list-image .onsale,
.woocommerce .woocommerce-message a:hover,.woocommerce .woocommerce-info a:hover,.woocommerce .woocommerce-error a:hover,
.woocommerce .woocommerce-error,
.woocommerce .woocommerce-error li strong,
.product-gallery-wrap .on-new,
.single-product .product .summary .cart .group_table td.label,.pado_product_detail .product .summary .cart .group_table td.label,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,.pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.input_shop_wrapper:hover,
.woocommerce ul.products li.product .pado_product_list_name .count,
.pado_cart.shop_table .complement-cart .coupon .input-text[type="submit"]:hover,.woocommerce form .form-row select[type="submit"]:hover,.woocommerce form .form-row input[type="submit"]:hover,
.woocommerce form.login .form-row input[type="submit"]:focus,.woocommerce form.login .form-row input[type="submit"]:visited,.woocommerce form.login .form-row input[type="submit"]:active,.woocommerce form.login .form-row input[type="submit"],
.shop-list-page .on-new,
.woocommerce ul.products li.product span.on-new,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a:hover,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active a,
.woocommerce-MyAccount-content a.woocommerce-Button,
.woocommerce form.login .form-row input[type="submit"]:focus,.woocommerce form.login .form-row input[type="submit"]:visited,.woocommerce form.login .form-row input[type="submit"]:active,.woocommerce form.login .form-row input[type="submit"],
.woocommerce-page.woocommerce-cart a.button,.shipping-calculator-button,.woocommerce-page.woocommerce-cart .woocommerce input.button,.woocommerce-page.woocommerce-checkout .woocommerce input.button,
.woocommerce-page.woocommerce .woocommerce-message a.button,
.woocommerce input.button,
.img-slider .flex-next:hover,.img-slider .flex-prev:hover,
.post-nav .pages,.post-nav .current,.pager-pagination .pages,.pager-pagination .current,
.post-content h5,
.post-content .date,
.post-wrap-item.text .post-content i,
.post-wrap-item.text .post-content blockquote,
.post.metro-style.format-gallery .flex-direction-nav .flex-prev:hover,.post.metro-style.format-gallery .flex-direction-nav .flex-next:hover,.post.metro-style.format-post-slider .flex-direction-nav .flex-prev:hover,.post.metro-style.format-post-slider .flex-direction-nav .flex-next:hover,
.post.metro-style.format-link .link-wrap a,.post.metro-style.format-post-link .link-wrap a,
.post.metro-style .info-wrap .category a,
.post.center-style.format-link .link-wrap,.post.center-style.format-post-link .link-wrap,
.post.center-style.format-gallery .flex-direction-nav .flex-prev:hover,.post.center-style.format-gallery .flex-direction-nav .flex-next:hover,.post.center-style.format-post-slider .flex-direction-nav .flex-prev:hover,.post.center-style.format-post-slider .flex-direction-nav .flex-next:hover,
.post-media .video-content .play:hover::before,
.post-little-banner.empty-post-list input[type="submit"],
.post-media .close,
.post.center-style.format-link .link-wrap a,.post.center-style.format-post-link .link-wrap a,
.post-details .single-categories a,
.post-info .single-tags a:hover,.bottom-infopwrap .single-tags a:hover,.user-info-wrap .single-tags a:hover,.main-top-content .single-tags a:hover,.post-details .link-wrap .single-tags a:hover,.post-details .post-media .single-tags a:hover,
#contactform #submit,.comments-form #submit,
.col-md-4 .widget_tag_cloud a,.col-md-3 .widget_tag_cloud a,
.post.metro-style.format-video .video-content .play:hover::before, .post.metro-style.format-post-video .video-content .play:hover::before,
.post-info span a,
.coming-page-wrapper .wpcf7 .input_protected_wrapper input,
.banner-slider-wrap.urban .title,
.banner-slider-wrap.vertical.light .pag-wrapper .number-slides .current,
.banner-slider-wrap.vertical.light .pag-wrapper .swiper3-button-next:hover,.banner-slider-wrap.vertical.light .pag-wrapper .swiper3-button-prev:hover,
.banner-slider-wrap.vertical.light .title,
.banner-slider-wrap.vertical.light .subtitle,
.banner-slider-wrap.vertical.light .text,
.banner-slider-wrap.urban .subtitle,
.top-banner.-light .subtitle, .top-banner.-light .title, .top-banner.-light .description,
.image-parallax__banner-title,
.image-parallax__banner-description,
.info-block-wrap.style-5 .content-wrap .info-item .info-text,
.info-block-wrap.style-5 .image-wrap .play,
.info-block-wrap.style-4 .video.only-button .close,
.info-block-wrap.style-4 .video.only-button .video-content .play::before,
.info-block-wrap.style-3 .video.only-button .close,
.info-block-wrap.style-3 .video.only-button .video-content .play::before,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-next:hover,
.info-block-wrap.style-3 .images-wrapper .slick-arrow.slick-prev,
.parallax-showcase-wrapper.-light .title,
.parallax-showcase-wrapper.-light .desc,
.filter_slider .portfolio-tabs-wrapper a.title-link,
.properties_carousel .portfolio-info .category,
.properties_carousel .portfolio-info h3,
.properties_carousel .portfolio-info .excerpt,
.properties_carousel .swiper3-button-prev,.properties_carousel .swiper3-button-next,
.urban_slider .slick-arrow:hover,
.interactive-slider.tabs .active div,
.tabs.interactive-slider a,
.showcase_slider .slide-title,
.promotion.modern .subtitle,
.promotion.info_video .play:hover:before,
.promotion.info_video .swiper3-button-prev:hover,.promotion.info_video .swiper3-button-next:hover,
.services.creative_slider .swiper3-button-next,
.service-list-wrapper .img-wrap a,
.skills.light .skill,
.skill-wrapper.light .subtitle,.skill-wrapper.light .title,.skill-wrapper.light .text,
.split-wrapper .content-wrap.light .title,
.main-header-testimonial.left_align .content-slide .user-info .position,
.iframe-video.banner-video .title,
.iframe-video.banner-video .subtitle,
.iframe-video.banner-video .video-content span,
.iframe-video .video-close-button,
.video.only-button .video-content .play::before,
.video.only-button .close,
.post-slider-wrapper.classic_slider_progress .category,
.promotion.simple .subtitle,
.split-wrapper .content-wrap.light .wpcf7 textarea, .split-wrapper .content-wrap.light .wpcf7 input:not([type="submit"]),
.banner-slider-wrap.vertical.light .pag-wrapper .swiper3-button-next, .banner-slider-wrap.vertical.light .pag-wrapper .swiper3-button-prev,
.banner-slider-wrap.vertical.light .pag-wrapper .number-slides,
.banner-slider-wrap.vertical.light .pag-wrapper .number-slides .total{
    color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.woocommerce-page.woocommerce .sidebar-item a.button {
    color: <?php echo esc_html(cs_get_option( 'light_color')) ?> !important;
}


@media only screen and (min-width: 1200px) {
    .portfolio-single-content.left_gallery .single-pagination.left_gallery.change-color a.content {
        color: <?php echo esc_html(cs_get_option( 'light_color')) ?>
    }
}

@media (max-width: 767px) {
    .properties_carousel .pado-portfolio-list-image .portfolio-info .excerpt,
    .post-slider-wrapper.slider_progress .title, .post-slider-wrapper.slider_progress .date {
        color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }
}

.promotion.info_video .swiper3-button-prev, .promotion.info_video .swiper3-button-next {
    color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    opacity: 0.6;
}

.info-block-wrap.style-4 .number .maskRect {
    fill: <?php echo esc_html(cs_get_option( 'light_color')) ?>
}

.team-members-wrap.inline .member-info-wrap {
    background-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>
}


<?php endif;


/* ======= BASE COLOR ======= */

if (cs_get_option( 'base_color_1') && cs_get_option( 'base_color_1') !== '#004ae2') : ?>
.coming-page-wrapper .wpcf7 .input_protected_wrapper input,
.a-btn-1-style [type="submit"],.a-btn-1,
.a-btn-2-style [type="submit"]:hover,.a-btn-2:hover,
.error404 .hero-inner .search input[type="submit"],
.protected-page form input[type="submit"],
.urban .banner-wrap .title::after,
.portfolio-single-content.simple_slider .swiper3-pagination-bullet-active,
.woocommerce input.button,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.single-product .product .summary .cart .variations .value ul li input:checked + label:before, .pado_product_detail .product .summary .cart .variations .value ul li input:checked + label:before,
.woocommerce .pado_images span.onsale, .woocommerce ul.products li.product .pado-prod-list-image .onsale,
.woocommerce-page.woocommerce-cart .woocommerce input.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .shipping-calculator-button:hover,
.woocommerce-page.woocommerce-cart a.button, .woocommerce-page.woocommerce-checkout a.button, .woocommerce-page.woocommerce a.button, .woocommerce-page.woocommerce button.button.alt, .woocommerce button.button.alt,
.woocommerce-page.woocommerce-cart a.button:hover, .woocommerce-page.woocommerce-checkout a.button:hover, .woocommerce-page.woocommerce a.button:hover, .woocommerce-page.woocommerce button.button.alt:hover, .woocommerce button.button.alt:hover,
#contactform #submit,.comments-form #submit,
.post-info .single-tags a:hover,.bottom-infopwrap .single-tags a:hover,.user-info-wrap .single-tags a:hover,.main-top-content .single-tags a:hover,.post-details .link-wrap .single-tags a:hover,.post-details .post-media .single-tags a:hover,
.post-details .single-categories a,
.post.metro-style .info-wrap .category a,
.post-little-banner.empty-post-list input[type="submit"],
.info-block-wrap.style-3 .video.only-button .video-content .play,
.info-block-wrap.style-4 .video.only-button .video-content .play,
.info-block-wrap.style-5 .content-wrap .info-item .info-subtitle::before,
.info-block-wrap.style-5 .image-wrap .play,
.post-slider-wrapper.slider_progress .swiper3-pagination-progressbar,
.video.only-button .video-content .play,
.services.creative_slider .services-bg,
.promotion.info_video .items-wrap,
.promotion.info_video .play:hover:before,
.promotion.modern .subtitle,
.post-slider-wrapper.classic_slider_progress .category,
.post-slider-wrapper.classic_slider_progress .swiper3-pagination-progressbar,
.promotion.simple .subtitle,
.grid-transform .tg-ajax-button span,
header.simple .search-form .input-group::after,
header.simple .site-search .search-form .input-group::after {
    background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

::-moz-selection {
    background: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

::selection {
    background: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

mark,ins {
    background: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,.pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.woocommerce input.button,
.woocommerce input.button:hover,
.a-btn-1-style [type="submit"],.a-btn-1,
.error404 .hero-inner .search input[type="submit"],
.post-little-banner.empty-post-list input[type="submit"],
#contactform #submit,.comments-form #submit,
.grid-transform .tg-ajax-button span {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, transparent), color-stop(50%, <?php echo esc_html(cs_get_option( 'base_color_1')) ?>));
    background-image: -webkit-linear-gradient(left, transparent 50%, <?php echo esc_html(cs_get_option( 'base_color_1')) ?> 50%);
    background-image: -o-linear-gradient(left, transparent 50%, <?php echo esc_html(cs_get_option( 'base_color_1')) ?> 50%);
    background-image: linear-gradient(to right, transparent 50%, <?php echo esc_html(cs_get_option( 'base_color_1')) ?> 50%);
}

.a-btn-2-style [type="submit"],.a-btn-2 {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'base_color_1')) ?>), color-stop(50%, transparent));
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'base_color_1')) ?> 50%, transparent 50%);
}


.a-btn-1-style [type="submit"],.a-btn-1,
.a-btn-1-style [type="submit"]:hover,.a-btn-1:hover,
.a-btn-2-style [type="submit"],.a-btn-2,
.a-btn-2-style [type="submit"]:hover,.a-btn-2:hover,
.error404 .hero-inner .search input[type="submit"],
.error404 .hero-inner .search input[type="submit"]:hover,
.error404 .hero-inner .search input:not([type="submit"]),
.protected-page form input:not([type="submit"]):focus,
.woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select,
.woocommerce-page.woocommerce-cart .woocommerce input.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .shipping-calculator-button:hover,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover, .pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover,
.pado_cart.shop_table .complement-cart .coupon .input-text:focus,
.woocommerce form.checkout_coupon .form-row input.input-text:focus,
.woocommerce form.login .form-row input:focus, .woocommerce form.login .form-row textarea:focus, .woocommerce form.checkout .form-row input:focus, .woocommerce form.checkout .form-row textarea:focus, .woocommerce form.checkout_coupon .form-row input.input-text:focus, .woocommerce form .form-row input:focus,
.woocommerce input.button,
.woocommerce input.button:hover,
#contactform #submit,.comments-form #submit,
.post-little-banner.empty-post-list input[type="submit"],
.post-little-banner.empty-post-list input[type="submit"]:hover,
.post-little-banner.empty-post-list input:not([type="submit"]),
.post-info .single-tags a:hover,.bottom-infopwrap .single-tags a:hover,.user-info-wrap .single-tags a:hover,.main-top-content .single-tags a:hover,.post-details .link-wrap .single-tags a:hover,.post-details .post-media .single-tags a:hover,
#contactform #submit:hover,.comments-form #submit:hover,
#contactform textarea:focus, #contactform input:not([type="submit"]):focus, .comments-form textarea:focus, .comments-form input:not([type="submit"]):focus,
.coming-page-wrapper .form input:not([type="submit"]), .coming-page-wrapper .form textarea,
.contacts-info-wrap.style3 .form input:not([type="submit"]):focus,.contacts-info-wrap.style3 .form textarea:focus,
.info-block-wrap.style-3 .video.only-button .video-content .play,
.info-block-wrap.style-4 .video.only-button .video-content .play,
.info-block-wrap.style-5 .image-wrap .play,
.split-wrapper .wpcf7 textarea:focus, .split-wrapper .wpcf7 input:not([type="submit"]):focus,
.video.only-button .video-content .play,
.split-wrapper .content-wrap.light .wpcf7 textarea:focus, .split-wrapper .content-wrap.light .wpcf7 input:not([type="submit"]):focus,
.promotion.info_video .play::before,
.grid-transform .tg-ajax-button span,
.grid-transform .tg-ajax-button span:hover {
    border-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
}

@media (min-width: 1025px) {
    header.simple #topmenu .menu>li:not(.mega-menu) ul,
    header.simple #topmenu .menu>li.mega-menu>ul::before {
        border-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
    }

    header.simple .mini_cart_item_price,
    header.simple .pado_mini_cart .woocommerce-mini-cart__total span,
    header.simple #topmenu .menu>li li.current_page_item a,
    header.simple .pado-buttons a i {
        color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
    }

    header.simple .pado_mini_cart a.button:hover {
        background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
    }
}

.skill-wrapper.circle svg #bar {
    stroke: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

.split-wrapper .wpcf7 textarea:focus, .split-wrapper .wpcf7 input:not([type="submit"]):focus,
#contactform textarea:focus, #contactform input:not([type="submit"]):focus, .comments-form textarea:focus, .comments-form input:not([type="submit"]):focus {
    outline-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
}

.a-btn-1-style [type="submit"]:hover,.a-btn-1:hover,
.a-btn-2-style [type="submit"],.a-btn-2,
.a-btn-2-style [type="submit"]:focus,.a-btn-2:focus,
.a-btn-link,
#footer.modern:not(.white-footer) .footer-socials a:hover,
#footer.classic:not(.white-footer) .socials a:hover,
#footer.classic:not(.white-footer) .copyright a:hover,
.error404 .hero-inner .bigtext,
.error404 .hero-inner .search input[type="submit"]:hover,
.no-menu>a,
.simple_gallery .categories a,
.simple_slider .info-wrap a:hover,
.simple_slider .info-wrap .social-list a:hover,
.simple_slider .blockquote::before,
.urban .info-item-wrap a:hover,
.urban .blockquote::before,
.urban .social-list a:hover,
.tile_info .text-gallery-wrap .info-item-wrap a:hover,
.tile_info .blockquote::before,
.tile_info .social-list a:hover,
.alia .text-gallery-wrap .info-item-wrap a:hover,
.alia .social-list a:hover,
.menio .banner-wrap .social-list li a:hover,
.menio .social-list a:hover,
.menio .recent-posts-wrapper .subtitle,
.parallax-window .content-parallax .category-parallax a,
.parallax-window .content-parallax .social-list>li a:hover,
.parallax-window .content-parallax .info-item-wrap .item .text-item a:hover,
.portfolio-single-content.left_gallery .info-item-wrap .text-item a:hover,
.portfolio-single-content.left_gallery .social-list a:hover,
.portfolio-single-content.tile_info .text h6,
.portfolio-single-content.menio .blockquote cite,
.portfolio-single-content.urban .descr-wrapper .text h6,
.portfolio-single-content.simple_gallery .item a:hover,
.woocommerce .pado_product_detail div.product span.price,
.woocommerce .pado_product_detail div.product p.price ins,
.woocommerce .product-name a,
.pado_product_detail .social-list a:hover,
.single-product .product .summary .product_meta a:hover,.pado_product_detail .product .summary .product_meta a:hover,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover,.pado_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover,
.woocommerce ul.products li.product .pado-prod-list-image .pado-link,
.pado-woocommerce-pagination .nav-links .nav-previous a:hover::before,.pado-woocommerce-pagination .nav-links .nav-previous a:hover::after,.pado-woocommerce-pagination .nav-links .nav-next a:hover::before,.pado-woocommerce-pagination .nav-links .nav-next a:hover::after,
.single-product .product_price,
.single-product .product_price .price,
.pado_cart.shop_table ul .cart_item ul .product-price,.pado_cart.shop_table ul .cart_item ul .product-subtotal,
.pado_cart.shop_table .complement-cart .coupon .input-text,.woocommerce form .form-row select,.woocommerce form .form-row input,
.select2-container,
.woocommerce table.shop_table .woocommerce-Price-amount,
.woocommerce ul.products li.product span,
.pado-best-seller-widget .swiper3-button-prev:hover,.pado-best-seller-widget .swiper3-button-next:hover,
.pado-best-seller-widget .seller-price span,
.pado-sorting-products-widget .woocommerce-ordering::after,
.pado-shop-banner .pado-shop-menu ul li a:hover,
.pado-shop-main-banner ul li a:hover,
.pado-shop-banner .pado-shop-menu ul li:last-child,
.single-product .summary .product_price .price,
.woocommerce input.button:hover,
.shipping-calculator-button:hover,
.single-product div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a, .pado_product_detail div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a,
.post-little-banner .page-title-blog span,
.post-little-banner.empty-post-list input[type="submit"]:hover,
.post-details .single-post ul:not(.comments):not(.slides):not(.children):not(.social-list) li::before,
.post-details .single-content ul:not(.comments):not(.slides):not(.children):not(.social-list) li::before,
.post.center-style .category,
.post.center-style .category a,
.single-post .single-content blockquote p::before,
.main-wrapper .col-md-4 .sidebar-item a:hover,.main-wrapper .col-md-3 .sidebar-item a:hover,
.main-wrapper .col-md-4 .sidebar-item.widget_tag_cloud a:hover,.main-wrapper .col-md-3 .sidebar-item.widget_tag_cloud a:hover,
.single-pagination>div.pag-prev:hover::before,
.single-pagination>div.pag-next:hover::after,
.post-details .link-wrap i,
.bottom-infopwrap .likes-wrap .post__likes--liked::before,
.bottom-infopwrap .social-list a:hover,
.user-info-wrap .post-author__social a:hover,
.comments .content .comment-reply-link:hover,
.comments .comment-reply-title a:hover,
.comments .person .author:hover,
.col-md-4 .sidebar-item.widget_rss a.rsswidget:hover,.col-md-3 .sidebar-item.widget_rss a.rsswidget:hover,
.col-md-4 .sidebar-item.widget_rss span.rss-date,.col-md-3 .sidebar-item.widget_rss span.rss-date,
.widget_product_search form::after,.widget_search form div::after,
.sidebar-item span.product-title:hover,
#contactform #submit:hover,.comments-form #submit:hover,
.banner-slider-wrap.urban .pag-wrapper .swiper3-pagination-current,
.banner-slider-wrap.urban .socials a:hover,
.banner-slider-wrap.vertical .pag-wrapper .number-slides .current,
.banner-slider-wrap.vertical .pag-wrapper .swiper3-button-prev:hover,.banner-slider-wrap.vertical .pag-wrapper .swiper3-button-next:hover,
.top-banner .socials a:hover,
.top-banner .title i,
.accordion-wrapper .accordion-form label,
.accordion-wrapper .accordion-form p:before,
.accordion-wrapper .accordion-title.is_opened i,
.coming-soon .count,
.coming-page-wrapper .form input:not([type="submit"]),.coming-page-wrapper .form textarea,
.contacts-info-wrap.style4 .additional-content-wrap .content-item a:hover,
.contacts-info-wrap.style5 .item-wrapper i,
.contacts-info-wrap.style5 .item-wrapper a:hover,
.contacts-info-wrap.style3 .title-main,
.contacts-info-wrap.style3 .form input:not([type="submit"]),.contacts-info-wrap.style3 .form textarea,
.faq-item .number,
.headings .subtitle i,.headings .title i,.headings .description i,
.headings.style2 .subtitle,
.headings.style5 .typed,.headings.style5 .typed-cursor,
.info-block-wrap.style-1 .content ul li:before,
.info-block-wrap.style-5 .image-wrap .play:hover,
.info-block-wrap.style-4 .video.only-button .video-content .play:hover::before,
.info-block-wrap.style-4 .content a,
.info-block-wrap.discount .title i,
.info-block-wrap.style-3 .video.only-button .video-content .play:hover::before,
.info-block-wrap.style-3 .content ul li:before,
.info-block-wrap.style-3 .content a,
.last-post-wrap .last-post-button a:before,
.location__item.active:before,
.location__item.active .title,
.location-map .tabs .subtitle i,
.location-map .tabs .info__text a:hover,
.filter_slider .portfolio-tabs-wrapper .filters ul li:hover,.filter_slider .portfolio-tabs-wrapper .filters ul li.active,
.filter_slider .portfolio-tabs-wrapper .filters ul li:hover span,.filter_slider .portfolio-tabs-wrapper .filters ul li.active span,
.urban_slider .slick-current .pagination-category,
.post-slider-wrapper.slider_progress .category,
.product-slider-wrapper .socials a:hover,
.product-slider-wrapper .additional-link:hover,.product-slider-wrapper .additional-email:hover,
.product-slider-wrapper .swiper3-pagination .swiper3-pagination-bullet-active i,
.promotion.modern .title i,
.promotion.simple .title i,
.promotion.info_video .video-btn,
.services.creative_slider .content-slide .title,
.services.accordion .accordeon a.active,.services.accordion .accordeon a.active .title,.services.accordion .accordeon a:hover,.services.accordion .accordeon a:hover .title,
.service-list-wrapper .counter,
.skill-wrapper .subtitle,
.skill-wrapper.numerical .skill-value,.skill-wrapper.numerical .symbol,
.skill-wrapper.circle #cont:after,
.split-wrapper .subtitle,
.split-wrapper .wpcf7 textarea:focus,.split-wrapper .wpcf7 input:not([type="submit"]):focus,
.team-members-wrap.inline .member-info h5,
.team-members-wrap.inline .social .fa:hover,
.team-members-wrap.inline_text .team-member .social a:hover,
.team-members-wrap.slider_modern .team-member .social a:hover,
.main-header-testimonial.modern .content-slide .description p::before,
.video.only-button .video-content .play:hover::before,
.promotion.info_video .play::before,
.promotion.info_video .title i,
header.simple #topmenu .menu>li li a:hover,
header.full .full-menu-wrap ul .current-menu-ancestor>a, header.full .full-menu-wrap ul .current-menu-item>a,
header.full .full-menu-wrap ul li a:hover {
    color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
}

@media (max-width: 1024px) {
    header.simple #topmenu .menu li.current-menu-parent>a, header.simple #topmenu .menu li.current-menu-item>a, header.simple #topmenu .menu li.current-menu-ancestor>a,
    header.aside .topmenu .menu li.current-menu-parent>a, header.aside .topmenu .menu li.current-menu-item>a, header.aside .topmenu .menu li.current-menu-ancestor>a,
    header.aside #topmenu .menu li.current-menu-parent>a, header.aside #topmenu .menu li.current-menu-item>a, header.aside #topmenu .menu li.current-menu-ancestor>a {
        color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?> !important
    }

    header.aside .search-form .input-group::after {
         background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
     }
}

@media (min-width: 1025px) {
    header.aside .topmenu .menu li.current-menu-parent>a, header.aside .topmenu .menu li.current-menu-item>a, header.aside .topmenu .menu li.current-menu-ancestor>a,
    header.aside .topmenu .menu li a:hover {
        color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?> !important
    }

    header.aside .header-middle .pado-shop-icon {
        background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
    }

    header.aside .site-search .search-form .input-group::after {
        background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
    }
}

.portfolio-single-content.tile_info .recent-posts-wrapper .subtitle,
.portfolio-urban .tg-filter.tg-filter-active .tg-filter-name,
.portfolio-urban .tg-filter-name:hover,
.portfolio-urban .tg-filter .tg-filter-name:hover .tg-filter-count, .portfolio-urban .tg-filter.tg-filter-active .tg-filter-name .tg-filter-count,
.portfolio-urban .tg-ajax-button-holder .tg-ajax-button span:before,
.tg-grid-transform .tg-element-2,
.grid-transform .tg-ajax-button span:hover,
.metro-overlay .tg-filter.tg-filter-active .tg-filter-name, .metro-overlay .tg-filter.tg-filter-active .tg-filter-name span,
.metro-overlay .tg-filter .tg-filter-name:hover, .metro-overlay .tg-filter .tg-filter-name:hover span,
.tg-pado-simple-2 .tg-element-2,
.tg-portfolio-classic .tg-element-1,
.tg-portfolio-full .tg-element-2,
.tg-posts-male .tg-element-2,
.tg-post-simple .tg-element-10 {
    color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?> !important
}

.tg-urban .tg-top-holder::before {
    border-color: transparent <?php echo esc_html(cs_get_option( 'base_color_1')) ?> transparent transparent;
}

.tg-shop-layout .tg-element-4 {
    background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>
}

<?php endif;

/* ======= FOOTER TEXT COLOR ======= */

if (cs_get_option( 'footer_text_color') && cs_get_option( 'footer_text_color') !== '#ffffff') : ?>
#footer.modern:not(.white-footer) .copyright,
#footer.modern:not(.white-footer) .copyright a,
#footer.modern:not(.white-footer) .footer-socials a:not(:hover),
#footer.classic:not(.white-footer) .anchor-navigation li.current-menu-item a,
#footer.classic:not(.white-footer) .anchor-navigation li a,
#footer.classic:not(.white-footer) .anchor-navigation li a:hover,
#footer.classic:not(.white-footer) .footer-logo,
#footer.classic:not(.white-footer) .socials a:not(:hover),
#footer.classic:not(.white-footer) .copyright a:not(:hover),
#footer.classic:not(.white-footer) .copyright {
    color: <?php echo esc_html(cs_get_option( 'footer_text_color')) ?>;
}

#footer.classic:not(.white-footer) .socials a {
    border-color: <?php echo esc_html(cs_get_option( 'footer_text_color')) ?>;
}

<?php endif;

 if (cs_get_option( 'footer_bg_color') && cs_get_option( 'footer_bg_color') !== '#222') : ?>
#footer.modern:not(.white-footer),
#footer.classic:not(.white-footer) {
    background-color: <?php echo esc_html(cs_get_option( 'footer_bg_color')) ?>;
}

<?php endif;

}



//TYPOGRAPHY

$options = apply_filters( 'cs_get_option', get_option( CS_OPTION ) );

function get_str_by_number($str){
    $number = preg_replace("/[0-9|\.]/", '', $str);
    return $number;
}

foreach ($options as $key => $item) {
    if (is_array($item)) {
        if (!empty($item['variant']) && $item['variant'] == 'regular') {
            $item['variant'] = 'normal';
        }
    }
    $options[$key] = $item;
}

function calculateFontWeight( $fontWeight ) {
    $fontWeightValue = '';
    $fontStyleValue = '';

    switch( $fontWeight ) {
        case '100':
            $fontWeightValue = '100';
            break;
        case '100italic':
            $fontWeightValue = '100';
            $fontStyleValue = 'italic';
            break;
        case '300':
            $fontWeightValue = '300';
            break;
        case '300italic':
            $fontWeightValue = '300';
            $fontStyleValue = 'italic';
            break;
        case '500':
            $fontWeightValue = '500';
            break;
        case '500italic':
            $fontWeightValue = '500';
            $fontStyleValue = 'italic';
            break;
        case '700':
            $fontWeightValue = '700';
            break;
        case '700italic':
            $fontWeightValue = '700';
            $fontStyleValue = 'italic';
            break;
        case '900':
            $fontWeightValue = '900';
            break;
        case '900italic':
            $fontWeightValue = '900';
            $fontStyleValue = 'italic';
            break;
        case 'italic':
            $fontStyleValue = 'italic';
            break;
    }

    return array('weight' => $fontWeightValue, 'style' => $fontStyleValue);
}

$all_button_font = $options['all_button_font_family']; ?>

.a-btn,
.a-btn-style [type="submit"] {
<?php
if(!empty($all_button_font['family'])){
	echo "font-family: \"{$all_button_font['family']}\" !important;";
}

$variant = calculateFontWeight( $all_button_font['variant'] );
if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;

$button_font_style = get_str_by_number($all_button_font['variant']);
if(!empty($button_font_style) && !empty($all_button_font['family'])){
	echo "font-style:{$button_font_style} !important;";
}

$all_button_font_size = get_number_str($options['all_button_font_size']);
if(!empty($all_button_font_size)){
	echo "font-size: {$all_button_font_size}px !important;";
}

$all_button_line_height = get_number_str($options['all_button_line_height']);
if(!empty($all_button_line_height)){
   echo "line-height:{$all_button_line_height}px !important;";
}
if(!empty($options['all_button_letter_spacing'])){
	echo "letter-spacing:{$options['all_button_letter_spacing']} !important;";
} ?>
}

<?php $all_links_font= $options['all_links_font_family']; ?>
a {
<?php if(!empty($all_links_font['family'])){
	echo "font-family: \"{$all_links_font['family']}\" !important;";
}
$variant = calculateFontWeight( $all_links_font['variant'] );
if(!empty($all_links_font['family']) && !empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;

$links_font_family = get_str_by_number($all_links_font['variant']);
if(!empty($links_font_family) && !empty($all_links_font['family'])) {
	echo "font-style:{$links_font_family} !important;";
}

$all_links_font_size = get_number_str($options['all_links_font_size']);
if(!empty($all_links_font_size)){
	echo "font-size: {$all_links_font_size}px !important;" ;
}

$all_links_line_height = get_number_str($options['all_links_line_height']);
if(!empty($all_links_line_height)){
	echo "line-height:{$all_links_line_height}px !important;";
}

$all_links_letter_spacing = get_number_str($options['all_links_letter_spacing']);
if(!empty($all_links_letter_spacing)){
	echo "letter-spacing:{$all_links_letter_spacing} !important;";
} ?>
}

/*FOOTER*/
<?php function get_number_str($str){
    $number = preg_replace("/[^0-9|\.]/", '', $str);
    return $number;
}


/* FOR TITLE H1 - H6 */
if ( cs_get_option('heading') ) {
    foreach (cs_get_option('heading') as $title) {
        $font_family = $title['heading_family'];
        echo esc_attr($title['heading_tag']); ?>
,
<?php echo esc_attr($title['heading_tag']); ?>
a {
<?php if($font_family['family']){
    echo "font-family: {$font_family['family']} !important;";
}
$one_title_size = get_number_str($title['heading_size']);
if($one_title_size){
    echo "font-size: {$one_title_size}px !important;\n line-height: normal;";
}?>
}

<?php }
} ?>

#topmenu ul.menu > li > a {
<?php if ( cs_get_option('menu_item_family') ) {

	$font_family = cs_get_option('menu_item_family');
	if(!empty($font_family['family'])){ ?> font-family: "<?php echo esc_html( $font_family['family'] ); ?>", sans-serif;
<?php }

$variant = calculateFontWeight( $font_family['variant'] );
if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;
}
if ( cs_get_option('menu_item_size') ) {
$menu_item_size = get_number_str(cs_get_option('menu_item_size'));  ?> font-size: <?php echo esc_html( $menu_item_size ); ?>px !important;
<?php }
if ( cs_get_option('menu_line_height') ) {
	$menu_line_height = get_number_str(cs_get_option('menu_line_height'));  ?> line-height: <?php echo esc_html( $menu_line_height ); ?>px !important;
<?php } ?>
}

#topmenu ul ul li a {
<?php if ( cs_get_option('submenu_item_family') ) {
	$font_family = cs_get_option('submenu_item_family');
	if(!empty($font_family['family'])){ ?> font-family: "<?php echo esc_html( $font_family['family'] ); ?>", sans-serif;
<?php }
$variant = calculateFontWeight( $font_family['variant'] );
if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;
}
if ( cs_get_option('submenu_item_size') ) {
$submenu_item_size = get_number_str(cs_get_option('submenu_item_size')); ?> font-size: <?php echo esc_html( $submenu_item_size ); ?>px;
<?php }

if ( cs_get_option('submenu_line_height') ) {
	$submenu_line_height = get_number_str(cs_get_option('submenu_line_height'));  ?> line-height: <?php echo esc_html( $submenu_line_height ); ?>px;
<?php } ?>
}
