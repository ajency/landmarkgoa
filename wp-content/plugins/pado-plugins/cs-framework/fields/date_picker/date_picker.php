<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Date picker
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_date_picker extends CSFramework_Options {

	public function __construct( $field, $value = '', $unique = '' ) {
		parent::__construct( $field, $value, $unique );
	}

	public function output() {

		print $this->element_before();
		echo '<input type="text" name="'. $this->element_name() .'" value="'. $this->element_value() .'" class="cs-date-picker" ' . $this->element_attributes() .'/>';
		print $this->element_after();

		wp_enqueue_script('jquery-ui-datepicker' );

		wp_enqueue_script('jquery-ui-datetimepicker', esc_url( 'cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js' ) );
		
		wp_enqueue_style('jquery-ui-style', esc_url( 'ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' ) );

	}
}

function wpc_admin_datetimepicker_js_function() {
	echo '<script>jQuery(function() { if( jQuery(".cs-date-picker").length ){ jQuery(".cs-date-picker").datetimepicker(); } });</script>';
}
add_action('admin_footer', 'wpc_admin_datetimepicker_js_function');

function wpc_admin_datetimepicker_css_function() {
	echo '<style>.ui-state-default .ui-icon {background-image: none !important;}</style>';
}
add_action('admin_footer', 'wpc_admin_datetimepicker_css_function');