<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'pado' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'pado' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'pado' ), get_the_title() ),
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'pado' ),
						'comment_notes_after'  => ' ',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' .
										'<input id="author" placeholder="'. esc_attr__( 'Name', 'pado' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>',
							'email'  => '<p class="comment-form-email">' .
										'<input id="email" placeholder="'. esc_attr__( 'Email', 'pado' ) . '" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" required /></p>',
						),
						'label_submit'  => esc_html__( 'Send', 'pado' ),
						'logged_in_as'  => '',
						'comment_field' => '',
						'comment_notes_before' => '',
						'class_submit'         => 'submit a-btn-2',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'pado' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Rating', 'pado' ) .'</label><select name="rating" id="rating" required>
							<option value="">' . esc_attr__( 'Rate&hellip;', 'pado' ) . '</option>
							<option value="5">' . esc_attr__( 'Perfect', 'pado' ) . '</option>
							<option value="4">' . esc_attr__( 'Good', 'pado' ) . '</option>
							<option value="3">' . esc_attr__( 'Average', 'pado' ) . '</option>
							<option value="2">' . esc_attr__( 'Not that bad', 'pado' ) . '</option>
							<option value="1">' . esc_attr__( 'Very Poor', 'pado' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" placeholder="'. esc_html__( 'Message', 'pado' ) . '" name="comment" cols="45" rows="8" required></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'pado' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
