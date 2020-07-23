<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
*
* CSFramework Taxonomy Config
*
* @since 1.0
* @version 1.0
*
*/
$options      = array();

$options[]    = array(
	'id'        => 'clients_options',
	'taxonomy' => 'portfolio-client', // or array( 'category', 'post_tag' )

	// begin: fields
	'fields'    => array(
		// begin: a field
		array(
			'id'        => 'client_photo',
			'type'      => 'image',
			'title'     => 'Photo',
			'add_title' => 'Add Photo',
		),
		// end: a field

	), // end: fields
);


CSFramework_Taxonomy::instance( $options );