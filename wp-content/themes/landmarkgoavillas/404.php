<?php
/**
 * 404 Page
 *
 * @package pado
 * @since 1.0
 *
 */

$btntext           = cs_get_option('error_btn_text') ? cs_get_option('error_btn_text') : esc_html__('Go home', 'pado');
$title             = cs_get_option('error_title') ? cs_get_option('error_title') : esc_html__('Something went wrong.', 'pado');
$subtitle          = cs_get_option('error_subtitle') ? cs_get_option('error_subtitle') : esc_html__('We can’t find the page your are looking for.', 'pado');
$enable_search_404 = cs_get_option('enable_search_404');
$btn_style         = cs_get_option('btn_style') ? cs_get_option('btn_style') : 'a-btn a-btn-4';

get_header(); ?>
    <div class="container-fluid no-padd error-height">
        <div class="hero-inner bg-cover full-height">
            <?php if ( cs_get_option('image_404') ):
                echo pado_the_lazy_load_flter(cs_get_option('image_404'), array(
                    'class' => 's-img-switch',
                    'alt'   => esc_attr__('404 image', 'pado')
                ));
            endif; ?>
            <div class="fullheight text-center">
                <div class="vertical-align">
                    <h1 class="bigtext"><?php esc_html_e('404', 'pado'); ?></h1>
                    <?php if ( !empty($title) ) { ?>
                        <h3 class="title bold font-1"><?php echo esc_html($title); ?></h3>
                    <?php } ?>
                    <?php if ( !empty($subtitle) ) { ?>
                        <h6 class="subtitle"><?php echo esc_html($subtitle); ?></h6>
                    <?php }
                    if ( isset($enable_search_404) && $enable_search_404 ) { ?>
                        <div class="search">
                            <div class="form-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="search" method="get" class="search-form-404"
                                                  action="<?php echo esc_url(home_url('/')); ?>">
                                                <div class="input-group">
                                                    <input type="search" value="<?php echo get_search_query() ?>"
                                                           name="s"
                                                           class="search-field"
                                                           placeholder="<?php esc_attr_e('Enter keyword', 'pado'); ?>"
                                                           required>
                                                    <input type="submit" id="searchsubmit"
                                                           value="<?php echo esc_attr('Search', 'pado'); ?>">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       class="a-btn <?php echo esc_attr($btn_style); ?>"><?php echo esc_html($btntext); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
