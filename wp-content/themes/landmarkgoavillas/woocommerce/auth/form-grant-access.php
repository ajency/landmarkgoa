<?php
/**
 * Auth form grant access
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/auth/form-grant-access.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Auth
 * @version 2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php do_action( 'woocommerce_auth_page_header' ); ?>

<h1><?php printf( esc_html__( '%s would like to connect to your store' , 'pado' ), esc_html( $app_name ) ); ?></h1>

<?php wc_print_notices(); ?>

<p><?php printf( esc_html__( 'This will give "%s" <strong>%s</strong> access which will allow it to:' , 'pado' ), esc_html( $app_name ), esc_html( $scope ) ); ?></p>

<ul class="wc-auth-permissions">
	<?php foreach ( $permissions as $permission ) : ?>
		<li><?php echo esc_html( $permission ); ?></li>
	<?php endforeach; ?>
</ul>

<div class="wc-auth-logged-in-as">
	<?php echo get_avatar( $user->ID, 70 ); ?>
	<p><?php printf( esc_html__( 'Logged in as %s', 'pado' ), esc_html( $user->display_name ) ); ?> <a href="<?php echo esc_url( $logout_url ); ?>" class="wc-auth-logout"><?php esc_html_e('Logout', 'pado' ); ?></a>
</div>

<p class="wc-auth-actions">
	<a href="<?php echo esc_url( $granted_url ); ?>" class="button button-primary wc-auth-approve"><?php esc_html_e( 'Approve', 'pado' ); ?></a>
	<a href="<?php echo esc_url( $return_url ); ?>" class="button wc-auth-deny"><?php esc_html_e( 'Deny', 'pado' ); ?></a>
</p>

<?php do_action( 'woocommerce_auth_page_footer' ); ?>
