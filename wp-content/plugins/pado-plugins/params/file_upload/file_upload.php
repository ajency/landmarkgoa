<?php
/**
 * Pado File Params
 *
 * @version 1.0
 * @since   1.0.0
 */

if ( ! class_exists('Pado_File_Params')) {
	class Pado_File_Params {

		function __construct() {
			add_action( 'vc_load_default_params', array( &$this, 'load_custom_param' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'backend__enqueue_scripts' ) );
		}

		/* load js */
		public function load_custom_param() {
			vc_add_shortcode_param( 'pado_file', array( $this, 'render' ),
				plugins_url( 'js/file.js', __FILE__ ) );
		}

		public function backend__enqueue_scripts($value='')
		{
			wp_enqueue_style( 'pado_file_css',
				plugins_url( 'css/file.css', __FILE__ ) );

			wp_enqueue_script('jquery');
			wp_enqueue_media();
		}

		/* render */
		public function render( $settings, $value ) {
			ob_start();
			?>
            <div class="vc_file_param">
				<?php // Audio url
				$audio_url = wp_get_attachment_url($value); ?>
                <input type="hidden" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $settings['param_name'] ); ?>" id="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value regular-text
						<?php echo esc_attr( $settings['param_name'] ); ?>
						<?php echo esc_attr( $settings['type'] ); ?>">
                <input type="text" value="<?php echo esc_attr( $audio_url ); ?>" class="url-audio">
                <input type="button" name="upload-btn" class="vc_upload_btn button-secondary" value="<?php esc_html_e('Upload File', 'pado'); ?>">
            </div>
			<?php
			return ob_get_clean();
		}

	}

}
new Pado_File_Params();