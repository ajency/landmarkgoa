<?php
/**
 * The template for displaying archive pages.
 *
 * @package fcampaign
 * @since 1.0.0
 *
 */

get_header();

// Category taxonomy
global $wp_query;
$tax = $wp_query->get_queried_object();


// Posts args
$args = array(
	'posts_per_page' => - 1,
	'post_type'      => 'portfolio',
	'tax_query'      => array(
		array(
			'taxonomy' => 'portfolio-category',
			'field'    => 'slug',
			'terms'    => $tax->slug
		)
	)
);

$portfolioCategory = new WP_Query( $args ); ?>

<div class="container archive-client">
	<div class="portfolio-wrapper clearfix">
		<div class="portfolio no-padd col-3 simple clearfix" data-space="10">
			<div class="wpb_column vc_column_container vc_col-sm-12  margin-lg-50b margin-xs-10b">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<?php while ( $portfolioCategory->have_posts() ) : $portfolioCategory->the_post();
							setup_postdata( $portfolioCategory ); ?>
							<div class="item block_item_0">
								<a href="<?php the_permalink(); ?>" class="item-link gridrotate-alb <?php echo esc_attr($hover); ?>" target="_self">
									<div class="item-img">
										<div class="images-one">
											<?php if (!get_post_thumbnail_id($post->ID)) {
												$portfolio_meta = get_post_meta($post->ID, 'pado_portfolio_options');
												$images = explode(',', $portfolio_meta[0]['slider']);
												$url = (!empty($images[0]) && is_numeric($images[0])) ? wp_get_attachment_image_src($images[0], 'large') : '';
												$image_alt     = (!empty($images[0]) && is_numeric($images[0])) ? get_post_meta($images[0], '_wp_attachment_image_alt', true ) : ''; ?>
												<img src="<?php echo esc_url($url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="s-img-switch">
												<?php
											} else {
												$image_id = get_post_thumbnail_id($post->ID);
												$image_alt     = (is_numeric($image_id) && !empty($image_id)) ? get_post_meta($image_id, '_wp_attachment_image_alt', true ) : '';
												$image = (is_numeric($image_id) && !empty($image_id)) ? wp_get_attachment_image_src($image_id, 'large') : ''; ?>
												<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="s-img-switch">
											<?php } ?>
										</div>
									</div>
									<div class="item-overlay">
										<?php the_title('<h5 class="portfolio-title">','</h5>'); ?></h5>
									</div>
								</a>
							</div>

						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

get_footer(); ?>
