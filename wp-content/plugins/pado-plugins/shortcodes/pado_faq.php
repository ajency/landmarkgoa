<?php
if ( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			'name'        => __( 'FAQ', 'js_composer' ),
			'base'        => 'pado_faq',
            'description' => __( 'Section with FAQ', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Items', 'js_composer' ),
                    'description' => __( 'Please add information for the item', 'js_composer' ),
					'param_name' => 'items',
					'value'      => '',
					'params'     => array(
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Number', 'js_composer' ),
                            'description' => __( 'Please add number', 'js_composer' ),
							'param_name' => 'number',
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Title', 'js_composer' ),
                            'description' => __( 'Please add your title', 'js_composer' ),
							'param_name' => 'title',
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Text', 'js_composer' ),
                            'description' => __( 'Please add your text', 'js_composer' ),
							'param_name' => 'text',
						),
					),
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_pado_faq extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'items' => '',
			), $atts ) );


			// include needed stylesheets
			if ( ! in_array( "pado-faq", self::$css_scripts ) ) {
				self::$css_scripts[] = "pado-faq";
			}
			$this->enqueueCss();
			$items = (array) vc_param_group_parse_atts( $items );

			ob_start();

			if ( ! empty( $items ) ) { ?>
                <div class="faq-wrapper">

					<?php foreach ( $items as $item ) { ?>

                        <div class="faq-item">
                            <div class="number"><?php echo esc_html( $item['number'] ); ?></div>
                            <div class="title-wrap">
                                <div class="title"><?php echo wpautop( $item['title'] ); ?></div>
                            </div>
                            <div class="text"><?php echo wpautop( $item['text'] ); ?></div>
                        </div>

					<?php } ?>

                </div>

			<?php }

			return ob_get_clean();
		}
	}
}
