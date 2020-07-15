<?php
/**
 * Single service
 *
 * @package pado
 * @since 1.0
 *
 */
get_header();

$protected = '';

if ( post_password_required() ) {
	$protected = 'protected-page';
}

$preview = 'image';

$blog_type = cs_get_option( 'blog_single_type' ) ? cs_get_option( 'blog_single_type' ) : 'modern';

while ( have_posts() ) :
	the_post(); ?>

    <div class="container">
    <div class="row">
    <div class="post-details single-post col-md-12 no-padd-md <?php echo esc_attr( $preview ); ?>">
        <div class="single-content <?php echo esc_attr( $protected ); ?>">
            <div class="main-top-content">
				<?php the_title( '<h2 class="title">', '</h2>' ); ?>
                <div class="title-wrap">
                    <div class="date-post"><?php the_time( get_option( 'date_format' ) ); ?></div>
                </div>
            </div>
			<?php
			if ( ! ( ! has_post_thumbnail() && $blog_type == 'modern' ) && function_exists( 'cs_framework_init' ) ) {
				if ( has_post_thumbnail() ) { ?>
                    <div class="post-banner">
                        <?php $tumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID());
                        $image_alt     = (is_numeric($post_thumbnail_id) && !empty($post_thumbnail_id)) ? get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true ) : ''; ?>
                        <img src="<?php echo esc_url( $tumb_url ); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    </div>
                <?php }
			}
			if ( $blog_type == 'modern' ) { ?>

			<?php if ( ! has_post_thumbnail() || ! function_exists( 'cs_framework_init' ) ) { ?>

                <div class="post-little-banner">
                    <div class="main-top-content text-center">
						<?php the_title( '<h2 class="title">', '</h2>' ); ?>
                        <div class="date-post"><?php the_time( get_option( 'date_format' ) ); ?></div>
                    </div>
                </div>
			<?php } ?>

            <div class="post-paper <?php echo esc_attr( $blog_type ); ?>">
				<?php }

				the_content();

				wp_link_pages( 'link_before=<span class="pages">&link_after=</span>&before=<div class="post-nav"> <span>' . esc_html__( "Page:", 'pado' ) . ' </span> &after=</div>' );
				wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
	<?php

if ( $blog_type == 'modern' ) { ?>
    </div>
<?php }

endwhile;

get_footer();











