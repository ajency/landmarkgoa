<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Background
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_background extends CSFramework_Options {

	public function __construct( $field, $value = '', $unique = '' ) {
		parent::__construct( $field, $value, $unique );
	}

	public function output() {

		print $this->element_before();

		$value_defaults = array(
			'image'       => '',
			'repeat'      => '',
			'position'    => '',
			'attachment'  => '',
			'color'       => '',
		);

		$this->value    = wp_parse_args( $this->element_value(), $value_defaults );

		$upload_type    = ( isset( $upload_type  ) ) ? $upload_type  : 'image';
		$button_title   = ( isset( $button_title ) ) ? $button_title : __( 'Upload', CS_TEXTDOMAIN );
		$frame_title    = ( isset( $frame_title  ) ) ? $frame_title  : __( 'Upload', CS_TEXTDOMAIN );
		$insert_title   = ( isset( $insert_title ) ) ? $insert_title : __( 'Use Image', CS_TEXTDOMAIN );

		print '<div class="cs-field-upload">';
		print '<input type="text" name="'. $this->element_name( '[image]' ) .'" value="'. $this->value['image'] .'"'. $this->element_class() . $this->element_attributes() .'/>';
		print '<a href="#" class="button cs-add" data-frame-title="'. $frame_title .'" data-upload-type="'. $upload_type .'" data-insert-title="'. $insert_title .'">'. $button_title .'</a>';
		print '</div>';

		// background attributes
		print '<fieldset>';
		print cs_add_element( array(
			'pseudo'          => true,
			'type'            => 'select',
			'name'            => $this->element_name( '[repeat]' ),
			'options'         => array(
				''              => 'repeat',
				'repeat-x'      => 'repeat-x',
				'repeat-y'      => 'repeat-y',
				'no-repeat'     => 'no-repeat',
				'inherit'       => 'inherit',
			),
			'attributes'      => array(
				'data-atts'     => 'repeat',
			),
			'value'           => $this->value['repeat']
		) );
		print cs_add_element( array(
			'pseudo'          => true,
			'type'            => 'select',
			'name'            => $this->element_name( '[position]' ),
			'options'         => array(
				''              => 'left top',
				'left center'   => 'left center',
				'left bottom'   => 'left bottom',
				'right top'     => 'right top',
				'right center'  => 'right center',
				'right bottom'  => 'right bottom',
				'center top'    => 'center top',
				'center center' => 'center center',
				'center bottom' => 'center bottom'
			),
			'attributes'      => array(
				'data-atts'     => 'position',
			),
			'value'           => $this->value['position']
		) );
		print cs_add_element( array(
			'pseudo'          => true,
			'type'            => 'select',
			'name'            => $this->element_name( '[attachment]' ),
			'options'         => array(
				''              => 'scroll',
				'fixed'         => 'fixed',
			),
			'attributes'      => array(
				'data-atts'     => 'attachment',
			),
			'value'           => $this->value['attachment']
		) );
		print cs_add_element( array(
			'pseudo'          => true,
			'id'              => $this->field['id'].'_color',
			'type'            => 'color_picker',
			'name'            => $this->element_name('[color]'),
			'attributes'      => array(
				'data-atts'     => 'bgcolor',
			),
			'value'           => $this->value['color'],
			'default'         => ( isset( $this->field['default']['color'] ) ) ? $this->field['default']['color'] : '',
			'rgba'            => ( isset( $this->field['rgba'] ) && $this->field['rgba'] === false ) ? false : '',
		) );
		print '</fieldset>';

		print $this->element_after();

	}
}
