<?php
if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/team/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
	vc_map(
		array(
			'name'        => __( 'Team', 'js_composer' ),
			'base'        => 'pado_team',
			'description' => __( 'My team', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'heading'    => __( 'Type', 'js_composer' ),
                    'description' => esc_html__( 'Please select main type', 'js_composer' ),
                    'param_name' => 'team_style',
                    'value'      => array(
                        array(
                            'value' => 'inline_text',
                            'label' => esc_html__( 'Inline with text', 'js_composer' ),
                            'image' => $url . 'inline_text.jpg'
                        ),
                        array(
                            'value' => 'inline',
                            'label' => esc_html__( 'Inline', 'js_composer' ),
                            'image' => $url . 'inline.jpg'
                        ),
                        array(
                            'value' => 'slider_modern',
                            'label' => esc_html__( 'Slider Modern', 'js_composer' ),
                            'image' => $url . 'slider_modern.jpg'
                        ),
                    ),
                ),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Column number', 'js_composer' ),
                    'description' => esc_html__( 'Please select number of columns', 'js_composer' ),
					'param_name' => 'col_numb',
					'value'      => array(
						__( '4 columns', 'js_composer' ) => 'col-4 col-xs-12 col-sm-6 col-md-3',
						__( '3 columns', 'js_composer' ) => 'col-3 col-xs-12 col-sm-6 col-md-4',
						__( '2 columns', 'js_composer' ) => 'col-2 col-xs-12 col-sm-6',
					),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline' ) ),
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Title', 'js_composer' ),
                    'description' => esc_html__( 'Please add title', 'js_composer' ),
					'param_name' => 'title',
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline_text' ) ),
				),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Button', 'js_composer' ),
                    'description' => esc_html__( 'Please add button link', 'js_composer' ),
					'param_name' => 'button',
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline', 'inline_text' ) ),
				),
                array(
                    'type'        => 'select_preview',
                    'heading'     => __('Button style', 'js_composer'),
                    'description' => __('Please select button style', 'js_composer'),
                    'param_name'  => 'btn_style',
                    'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline', 'inline_text' ) ),
                    'value'       => array(
                        array(
                            'value' => 'a-btn a-btn-1',
                            'label' => esc_html__('Default', 'js_composer'),
                            'image' => $url_btn . 'a-btn-1.png'
                        ),
                        array(
                            'value' => 'a-btn a-btn-1 a-btn-arrow',
                            'label' => esc_html('Default with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-1 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-2',
                            'label' => esc_html('Default Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-2.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-2 a-btn-arrow',
                            'label' => esc_html('Default Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-2 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-3',
                            'label' => esc_html('Dark', 'pado'),
                            'image' => $url_btn . 'a-btn-3.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-3 a-btn-arrow',
                            'label' => esc_html('Dark with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-3 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-4',
                            'label' => esc_html('Dark Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-4.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-4 a-btn-arrow',
                            'label' => esc_html('Dark Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-4 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-5',
                            'label' => esc_html('Light', 'pado'),
                            'image' => $url_btn . 'a-btn-5.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-5 a-btn-arrow',
                            'label' => esc_html('Light with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-5 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-6',
                            'label' => esc_html('Light Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-6.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-6 a-btn-arrow',
                            'label' => esc_html('Light Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-6 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-7',
                            'label' => esc_html('White', 'pado'),
                            'image' => $url_btn . 'a-btn-7.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-7 a-btn-arrow',
                            'label' => esc_html('White with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-7 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-8',
                            'label' => esc_html('White Transparent', 'pado'),
                            'image' => $url_btn . 'a-btn-8.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-8 a-btn-arrow',
                            'label' => esc_html('White Transparent with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-8 a-btn-arrow.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-link',
                            'label' => esc_html('Default link', 'pado'),
                            'image' => $url_btn . 'a-btn-link.png',
                        ),
                        array(
                            'value' => 'a-btn a-btn-link a-btn-arrow',
                            'label' => esc_html('Default link with arrow', 'pado'),
                            'image' => $url_btn . 'a-btn-link a-btn-arrow.png',
                        ),
                    )
                ),
				// slider
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay (sec)', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '0',
					'group'       => 'Slider options',
					'description' => __( '0 - off autoplay.', 'js_composer' ),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '1500',
                    'group'       => 'Slider options',
					'description' => __( 'Speed Animation. Default 500 milliseconds', 'js_composer' ),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Loop', 'js_composer' ),
                    'description' => esc_html__( 'Do you want to enable loop option?', 'js_composer' ),
					'param_name' => 'loop',
					'value'      => '1',
                    'group'       => 'Slider options',
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for large desktop', 'js_composer' ),
					'param_name'  => 'lg_count',
					'value'      => '4',
                    'group'       => 'Slider options',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for middle desktop', 'js_composer' ),
					'param_name'  => 'md_count',
					'value'      => '3',
                    'group'       => 'Slider options',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for tablet', 'js_composer' ),
					'param_name'  => 'sm_count',
					'value'      => '2',
                    'group'       => 'Slider options',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for mobile', 'js_composer' ),
					'param_name'  => 'xs_count',
					'value'      => '1',
                    'group'       => 'Slider options',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider', 'slider_modern' ) ),
				),
				// end slider

				array(
					'type' => 'param_group',
					'heading' => __( 'Team members', 'js_composer' ),
					'param_name' => 'team_members',
                    'description' => __( 'Please add more options fro team member', 'js_composer' ),
					'value' => '',
					'params' => array(
						array(
							'type'        => 'attach_image',
                            'description' => __( 'Please add image', 'js_composer' ),
							'heading'     => __( 'Photo', 'js_composer' ),
							'param_name'  => 'image_id',
						),
						array(
							'type'       => 'textfield',
                            'description' => __( 'Please add the name', 'js_composer' ),
							'heading'    => __( 'Name', 'js_composer' ),
							'param_name' => 'name',
						),
						array(
							'type'       => 'textfield',
                            'description' => __( 'Please add the position', 'js_composer' ),
							'heading'    => __( 'Position', 'js_composer' ),
							'param_name' => 'position',
						),
						array(
							'type' => 'param_group',
							'heading' => __( 'Socials', 'js_composer' ),
                            'description' => __( 'Please add social information', 'js_composer' ),
							'param_name' => 'socials',
							'value' => '',
							'params' => array(
								array(
									'type' => 'iconpicker',
									'heading' => 'Select icon',
									'param_name' => 'icon',
                                    'description' => __( 'Please add icon', 'js_composer' ),
									'value' => '',
								),
								array(
									'type'        => 'textfield',
									'heading'     => __( 'url', 'js_composer' ),
									'param_name'  => 'social_url',
									'value'       => '',
									'description' => __( 'Enter social link url.', 'js_composer' ),
								),
                            )
                        ),
					), // end repeater
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
					'value'       => '',
				),
				/* CSS editor */
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' ),
				),
			), //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_pado_team extends WPBakeryShortCode {

		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'team_style'    => 'inline_text',
				'col_numb'		=> 'col-4 col-xs-12 col-sm-6 col-md-3',
				'autoplay'      => '',
				'speed'         => '',
				'loop'          => '',
				'lg_count'    	=> '',
				'md_count'   	=> '',
				'sm_count'      => '',
				'xs_count'      => '',
				'button'      => '',
				'btn_style'      => '',
				'title'      => '',
				'team_members'	=> array(),
				'el_class'      => '',
				'css' 			=> '',
			), $atts ) );

			// include needed stylesheets
			if ( !in_array( "pado-team", self::$css_scripts ) ) {
				self::$css_scripts[] = "pado-team";
			}
			$this->enqueueCss();

			$autoplay = is_numeric( $autoplay ) ? $autoplay * 1000 : 0;
			$speed    = is_numeric( $speed ) ? $speed : '500';
			$loop     = !empty( $loop ) ? '1' : '0';

			$lg_count    = !empty( $lg_count ) && is_numeric( $lg_count ) ? $lg_count : '4';
			$md_count    = !empty( $md_count ) && is_numeric( $md_count ) ? $md_count : '3';
			$sm_count    = !empty( $sm_count ) && is_numeric( $sm_count ) ? $sm_count : '2';
			$xs_count    = !empty( $xs_count ) && is_numeric( $xs_count ) ? $xs_count : '1';


			$class = ( !empty( $team_style ) ) ? $team_style : "";
			$class .= " " . ( !empty( $el_class ) ) ? $el_class : '';
			$class .= vc_shortcode_custom_css_class( $css, ' ' );
			$btn_style = isset($btn_style) && !empty($btn_style) ? $btn_style : 'a-btn';
			$team_members = (array) vc_param_group_parse_atts( $team_members );

			ob_start(); ?>

			<div class="team-members-wrap clearfix <?php echo esc_attr( $class ); ?>">
				<?php if ( $team_style == "inline" ) {
					if ( !empty( $team_members ) ) {
						foreach( $team_members as $member ) {
							$image_url = ( !empty( $member['image_id'] ) && is_numeric( $member['image_id'] ) ) ? wp_get_attachment_url( $member['image_id'] ) : '';
							$image_alt = get_post_meta( $member['image_id'], '_wp_attachment_image_alt', true );
							$socials = (array) vc_param_group_parse_atts( $member['socials'] ); ?>
							<div class="team-member clearfix <?php echo esc_attr( $col_numb ); ?>" onclick="">
                                <div class="member-wrap">
	                                <?php if ( !empty( $image_url ) ) {
		                                echo pado_the_lazy_load_flter( $image_url, array(
			                                'class' => 's-img-switch',
			                                'alt'   => $image_alt,
		                                ) );
	                                } // end if ?>

                                    <div class="member-info-wrap">
                                        <div class="member-info">
			                                <?php if ( !empty( $member['name'] ) ) { ?>
                                                <h5 class="member-name"><?php echo esc_html( $member['name'] ); ?></h5>
			                                <?php } // end if ?>

			                                <?php if ( !empty( $member['position'] ) ) { ?>
                                                <div class="member-position"><?php echo esc_html( $member['position'] ); ?></div>
			                                <?php } // end if ?>
                                        </div>

		                                <?php if ( !empty( $socials ) ) { ?>
                                            <div class="social">
				                                <?php foreach( $socials as $item ) { ?>
                                                    <a href="<?php echo esc_url( $item['social_url'] ); ?>" target="_blank" class="soc-item">
                                                        <i class="fa <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                                    </a>
				                                <?php } // end foreach ?>
                                            </div>
		                                <?php } // end if ?>

                                    </div>
                                </div>
							</div>

						<?php
						} // end foreach
					} // end if

                    if ( ! empty( $button ) ) {
                        $url = vc_build_link( $button );
                        $target = !empty($url['target']) ? $url['target'] : '_self';
                    }

                    if ( ! empty( $button ) ) {?>
                        <div class="btn-wrap text-center">
                            <a href="<?php echo esc_attr( $url['url'] ); ?>"
                               class="<?php echo esc_attr($btn_style); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                        </div>
                <?php }
				} elseif($team_style == 'slider_modern'){ ?>
                    <?php if ( !empty( $team_members ) ) {
                    $responsive = 'data-responsive="responsive" data-add-slides="' . $lg_count . '" data-lg-slides="' . $lg_count . '" data-md-slides="' . $md_count . '" data-sm-slides="' . $sm_count . '" data-xs-slides="' . $xs_count . '"';
                    // space_between slides
                    $space_between = 30; ?>

                    <div class="team-members-container swiper3-container"
                         data-mouse="0" data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                         data-loop="<?php echo esc_attr( $loop ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>"
                         data-center="0"
                         data-space=<?php echo esc_attr( $space_between ); ?> <?php echo $responsive; ?>>

                        <div class="swiper3-wrapper">

							<?php foreach( $team_members as $member ) {
								$image_url = ( !empty( $member['image_id'] ) && is_numeric( $member['image_id'] ) ) ? wp_get_attachment_url( $member['image_id'] ) : '';
								$image_alt = get_post_meta( $member['image_id'], '_wp_attachment_image_alt', true );
								$socials = (array) vc_param_group_parse_atts( $member['socials'] ); ?>

                                <div class="swiper3-slide">
                                    <div class="team-member clearfix">
                                        <div class="member-wrap">
			                                <?php if ( !empty( $image_url ) ) {
				                                echo pado_the_lazy_load_flter( $image_url, array(
					                                'class' => 's-img-switch',
					                                'alt'   => $image_alt,
				                                ) );
			                                } // end if ?>
			                                <?php if ( !empty( $socials ) ) { ?>
                                                <div class="social">
					                                <?php foreach( $socials as $item ) { ?>
                                                        <a href="<?php echo esc_url( $item['social_url'] ); ?>" target="_blank" class="soc-item">
                                                            <i class="fa <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                                        </a>
					                                <?php } // end foreach ?>
                                                </div>
			                                <?php } // end if ?>

                                        </div>
                                        <div class="member-info-wrap">
                                            <div class="member-info">
				                                <?php if ( !empty( $member['name'] ) ) { ?>
                                                    <h5 class="member-name"><?php echo esc_html( $member['name'] ); ?></h5>
				                                <?php } // end if ?>

				                                <?php if ( !empty( $member['position'] ) ) { ?>
                                                    <div class="member-position"><?php echo esc_html( $member['position'] ); ?></div>
				                                <?php } // end if ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

							<?php } // end foreach ?>

                        </div>
                    </div>

                    <div class="swiper3-button-prev">
                        <i class="ion-chevron-left"></i>
                    </div>
                    <div class="swiper3-button-next">
                        <i class="ion-chevron-right"></i>
                    </div>
                    <!-- <div class="swiper3-pagination"></div> -->

				<?php } // end if
                 }
				elseif($team_style == "inline_text"){ ?>
                    <?php if(! empty( $title ) ||  ! empty( $button ) ){ ?>
                        <div class="info-wrapper">
							<?php if ( ! empty( $title ) ) {?>
                                <h2 class="title"><?php echo wp_kses_post($title); ?></h2>
							<?php }

							if ( ! empty( $button ) ) {
								$url = vc_build_link( $button );
                                $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self';
                            }

							if ( ! empty( $url['url'] ) ) {?>
                                <div class="btn-wrap">
                                    <a href="<?php echo esc_attr( $url['url'] ); ?>"
                                       class="<?php echo esc_attr($btn_style); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                                </div>
							<?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ( !empty( $team_members ) ) { ?>
                        <ul class="team-list-wrap">
                            <?php foreach( $team_members as $member ) {
                                if (!empty( $member['image_id'] ) && is_numeric( $member['image_id'] )) {
                                    $image_url = wp_get_attachment_url( $member['image_id'] );
                                    $image_alt = get_post_meta( $member['image_id'], '_wp_attachment_image_alt', true );
                                    $socials = (array) vc_param_group_parse_atts( $member['socials'] ); ?>
                                    <li class="team-member clearfix">
                                        <div class="member-wrap">
                                            <?php if ( !empty( $image_url ) ) {
                                                echo pado_the_lazy_load_flter( $image_url, array(
                                                    'class' => 's-img-switch',
                                                    'alt'   => $image_alt,
                                                ) );
                                            } // end if ?>
                                            <?php if ( !empty( $socials ) ) { ?>
                                                <div class="social">
                                                    <?php foreach( $socials as $item ) { ?>
                                                        <a href="<?php echo esc_url( $item['social_url'] ); ?>" target="_blank" class="soc-item">
                                                            <i class="fa <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                                        </a>
                                                    <?php } // end foreach ?>
                                                </div>
                                            <?php } // end if ?>

                                        </div>
                                        <div class="member-info-wrap">
                                            <div class="member-info">
                                                <?php if ( !empty( $member['name'] ) ) { ?>
                                                    <h5 class="member-name"><?php echo esc_html( $member['name'] ); ?></h5>
                                                <?php } // end if ?>

                                                <?php if ( !empty( $member['position'] ) ) { ?>
                                                    <div class="member-position"><?php echo esc_html( $member['position'] ); ?></div>
                                                <?php } // end if ?>
                                            </div>



                                        </div>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    <?php } // end if

                }// end else if ?>

            </div>

			<?php
			return ob_get_clean();
		} // end content()
	} // end class
} // end if

?>
