<?php
if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/testimonial/';
	vc_map(
		array(
			'name'                    => __( 'Testimonial', 'js_composer' ),
			'base'                    => 'pado_testimonial',
            'description'             => __( 'Section with testimonials', 'js_composer' ),
			'as_parent'               => array( 'only' => 'pado_testimonial_items' ),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Style', 'js_composer'),
                    'description' => __('Please select main style', 'js_composer'),
                    'param_name'  => 'type_slider',
                    'value'       => array(
                        array(
                            'value' => 'modern',
                            'label' => esc_html__('Modern Slider', 'js_composer'),
                            'image' => $url . 'modern.jpg'
                        ),
                        array(
                            'value' => 'left_align',
                            'label' => esc_html__('Left Align Slider', 'js_composer'),
                            'image' => $url . 'left_align.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Background text', 'js_composer' ),
                    'description' => __( 'Please add background text', 'js_composer' ),
					'param_name'  => 'bg_text',
					'value'       => '',
					'dependency' => array( 'element' => 'type_slider', 'value' => array('modern'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Change color for text', 'js_composer' ),
                    'description' => __( 'Please select color for text', 'js_composer' ),
					'param_name' => 'color1',
					'dependency' => array( 'element' => 'type_slider', 'value' => array('left_align'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Change color for name', 'js_composer' ),
                    'description' => __( 'Please select color for name', 'js_composer' ),
					'param_name' => 'color2',
					'dependency' => array( 'element' => 'type_slider', 'value' => array('left_align'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Change color for position', 'js_composer' ),
                    'description' => __( 'Please select color for position', 'js_composer' ),
					'param_name' => 'color3',
					'dependency' => array( 'element' => 'type_slider', 'value' => array('left_align'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Change color for pagination', 'js_composer' ),
                    'description' => __( 'Please select color for pagination', 'js_composer' ),
					'param_name' => 'color4',
					'dependency' => array( 'element' => 'type_slider', 'value' => array('left_align'))
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay (sec)', 'js_composer' ),
					'description' => __( '0 - off autoplay.', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '0'
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'description' => __( 'Speed Animation. Default 1000 milliseconds', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '500'
				),
				array(
					'type'       => 'checkbox',
                    'description' => __( 'Do you want to enable loop option?', 'js_composer' ),
					'heading'    => __( 'Loop', 'js_composer' ),
					'param_name' => 'loop',
					'value'      => '1',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
					'value'       => ''
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' )
				)
			) //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_pado_testimonial extends WPBakeryShortCodesContainer {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'type_slider' => 'modern',
				'bg_text' => '',
				'autoplay'    => '',
				'loop'        => '',
				'speed'       => '',
				'color1'       => '',
				'color2'       => '',
				'color3'       => '',
				'color4'       => '',
				'css'         => '',
				'class'       => '',
				'el_class'    => ''
			), $atts ) );

			// include needed stylesheets
			if ( ! in_array( "pado-testimonial", self::$css_scripts ) ) {
				self::$css_scripts[] = "pado-testimonial";
			}
			$this->enqueueCss();

			$autoplay = is_numeric( $autoplay ) ? $autoplay * 1000 : 0;
			$speed    = is_numeric( $speed ) ? $speed : '500';
			$loop     = ! empty( $loop ) ? '1' : '0';

			$color1 = isset($color1) && !empty($color1) ? 'style=color:' . $color1 . ';' : '';
			$color2 = isset($color2) && !empty($color2) ? 'style=color:' . $color2 . ';' : '';
			$color3 = isset($color3) && !empty($color3) ? 'style=color:' . $color3 . ';' : '';

			$class = ( ! empty( $el_class ) ) ? $el_class : '';
			$class .= vc_shortcode_custom_css_class( $css, ' ' );
			$class .= ' ' . $type_slider;

			global $pado_testimonial_items;
			$pado_testimonial_items = array();

			ob_start();

			do_shortcode( $content );

			if ( ! empty( $pado_testimonial_items ) && count( $pado_testimonial_items ) > 0 ) {
			    if(isset($color4) && !empty($color4) && $type_slider == 'left_align'){ ?>
                    <style>
                        .main-header-testimonial.left_align .swiper3-pagination span{
                            background-color: <?php echo $color4 ?>!important;
                        }
                        .main-header-testimonial.left_align .swiper3-pagination span.swiper3-pagination-bullet-active::before{
                            border-color: <?php echo $color4 ?>!important;
                        }
                    </style>
                <?php }?>
                <div class="main-header-testimonial classic <?php echo esc_attr( $class ); ?>">
                    <?php
                    if(!empty($bg_text) && $type_slider == 'modern'){ ?>
                        <div class="bg-text"><?php echo esc_html($bg_text); ?></div>
                    <?php } ?>

                    <div class="swiper3-container"
                         data-mouse="0" data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                         data-loop="<?php echo esc_attr( $loop ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>"
                         data-center="1"
                         data-space="0" data-pagination-type="bullets" >
                        <div class="swiper3-wrapper">

							<?php foreach ( $pado_testimonial_items as $item ) {
								$value = (object) $item['atts'];

								$class_slide = '';
								if ( ! empty( $value->css ) ) {
									$class_slide .= vc_shortcode_custom_css_class( $value->css, ' ' );
								} ?>

                                <div class="swiper3-slide <?php echo esc_attr( $class_slide ); ?>">
									<?php if ( $type_slider == 'modern' ) { ?>
                                        <div class="content-slide">
											<?php
											if ( ! empty( $item['content'] ) ) { ?>
                                                <div class="description clearfix">
                                                    <p><?php echo do_shortcode( $item['content'] ); ?></p>
                                                </div>
											<?php } ?>
											<div class="user">
												<?php if ( ! empty( $value->logo_image ) && is_numeric( $value->logo_image ) ) {
                                                    $alt = get_post_meta( $value->logo_image, '_wp_attachment_image_alt', true ); ?>
                                                    <div class="logo-customer">
                                                        <img src="<?php echo esc_url( wp_get_attachment_url( $value->logo_image ) ); ?>"
                                                             alt="<?php echo esc_attr( $alt ); ?>" class="s-img-switch">
                                                    </div>
                                                <?php } ?>
                                                <div class="user-info">
                                                    <?php if ( ! empty( $value->author ) ) { ?>
                                                        <div class="name"><?php echo esc_html( $value->author ); ?></div>
                                                    <?php }

                                                    if ( ! empty( $value->position ) ) { ?>
                                                        <div class="position"><?php echo esc_html( $value->position ); ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
									<?php }
									elseif( $type_slider == 'left_align' ){ ?>
                                        <div class="content-slide">
                                            <div class="user">
												<?php if ( ! empty( $value->logo_image ) && is_numeric( $value->logo_image ) ) {
													$alt = get_post_meta( $value->logo_image, '_wp_attachment_image_alt', true ); ?>
                                                    <div class="logo-customer">
                                                        <img src="<?php echo esc_url( wp_get_attachment_url( $value->logo_image ) ); ?>"
                                                             alt="<?php echo esc_attr( $alt ); ?>" class="s-img-switch">
                                                    </div>
												<?php } ?>
	                                            <?php if ( ! empty( $item['content'] ) ) { ?>
                                                    <div class="description clearfix">
                                                        <p <?php echo esc_attr($color1); ?>><?php echo do_shortcode( $item['content'] ); ?></p>
                                                        <div class="user-info">
		                                                    <?php if ( ! empty( $value->author ) ) { ?>
                                                                <div class="name" <?php echo esc_attr($color2); ?>><?php echo esc_html( $value->author ); ?></div>
		                                                    <?php }

		                                                    if ( ! empty( $value->position ) ) { ?>
                                                                <div class="position" <?php echo esc_attr($color3); ?>><?php echo esc_html( $value->position ); ?></div>
		                                                    <?php } ?>
                                                        </div>
                                                    </div>
	                                            <?php } ?>

                                            </div>
                                        </div>
                                    <?php }
									else {
										$stars = isset( $value->stars ) ? $value->stars : 'one'; ?>
                                        <div class="content-slide">
                                            <div class="info-wrap">
                                                <div class="stars <?php echo esc_attr( $stars ); ?>">
                                                    <span class="fa fa-star-o"></span>
                                                    <span class="fa fa-star-o"></span>
                                                    <span class="fa fa-star-o"></span>
                                                    <span class="fa fa-star-o"></span>
                                                    <span class="fa fa-star-o"></span>
                                                </div>
                                                <div class="text"><?php echo do_shortcode( $item['content'] ); ?></div>
                                            </div>
                                            <div class="user">
												<?php if ( ! empty( $value->logo_image ) && is_numeric( $value->logo_image ) ) {
													$alt = get_post_meta( $value->logo_image, '_wp_attachment_image_alt', true ); ?>
                                                    <div class="logo-customer">
                                                        <img src="<?php echo esc_url( wp_get_attachment_url( $value->logo_image ) ); ?>"
                                                             alt="<?php echo esc_attr( $alt ); ?>" class="s-img-switch">
                                                    </div>
												<?php } ?>
                                                <div class="user-info">
													<?php if ( ! empty( $value->author ) ) { ?>
                                                        <div class="name"><?php echo esc_html( $value->author ); ?></div>
													<?php }

													if ( ! empty( $value->position ) ) { ?>
                                                        <div class="position"><?php echo esc_html( $value->position ); ?></div>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>
                                </div>

							<?php } ?>
                        </div>
                    </div>
                    <?php if($type_slider != 'modern'){?>
                    <div class="swiper3-pagination"></div>
                    <?php }else{ ?>
                        <div class="swiper3-button-next"></div>
                        <div class="swiper3-button-prev"></div>
                    <?php }?>
                </div>
			<?php }

			return ob_get_clean();
		}
	}
}


if ( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			'name'            => 'Testimonial item',
			'base'            => 'pado_testimonial_items',
			'as_child'        => array( 'only' => 'pado_testimonial' ),
			'content_element' => true,
			'params'          => array(
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Image', 'js_composer' ),
					'param_name' => 'logo_image',
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => __( 'Content', 'js_composer' ),
					'param_name' => 'content',
					'holder'     => 'div',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( "Author's name", 'js_composer' ),
					'param_name' => 'author',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( "Position", 'js_composer' ),
					'param_name' => 'position',
					'value'      => '',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' )
				)
			) //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_pado_testimonial_items extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			global $pado_testimonial_items;
			$pado_testimonial_items[] = array( 'atts' => $atts, 'content' => $content );

			return;
		}
	}
}