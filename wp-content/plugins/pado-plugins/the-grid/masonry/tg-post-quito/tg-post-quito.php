<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Post Quito
* Skin Slug: tg-post-quito
* Date: 10/09/18 - 11:53:45AM
*
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Init The Grid Elements instance
$tg_el = The_Grid_Elements();

// Prepare main data for futur conditions
$image  = $tg_el->get_attachment_url();
$format = $tg_el->get_item_format();

$output = null;

$media = $tg_el->get_media();

// if there is a media
if ($media) {

	// Media wrapper start
	$output .= $tg_el->get_media_wrapper_start();

	// Media content (image, gallery, audio, video)
	$output .= $media;

	// if there is an image
	if ($image || in_array($format, array('gallery', 'video'))) {

		// Media content holder start
		$output .= $tg_el->get_media_content_start();

		// Overlay
		$output .= $tg_el->get_overlay();

		// Center wrapper start
		$output .= $tg_el->get_center_wrapper_start();
			$output .= $tg_el->get_media_button(array('icons' => array('image' => '<i>+</i>', 'audio' => '<i>Play Audio</i>', 'video' => '<i>Play Video</i>', 'pause' => ''), 'action' => array('type' => 'lightbox')), 'tg-element-9');
		$output .= $tg_el->get_center_wrapper_end();
		// Center wrapper end

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

		$output .= $tg_el->add_layer_action(array('action' => array('type' => 'lightbox', 'position' => 'above')), 'tg-absolute');

	}

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end

}

// Bottom content wrapper start
$output .= $tg_el->get_content_wrapper_start('', 'bottom');
	$output .= $tg_el->get_the_terms(array('taxonomy' => '', 'link' => true, 'color' => '', 'separator' => '', 'override' => true), 'tg-element-1 category');
	$output .= $tg_el->get_the_title(array('link' => false, 'html_tag' => 'h3', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-3 title');
	$output .= $tg_el->get_the_excerpt(array('length' => '200', 'suffix' => '...'), 'tg-element-6 text');
	$output .= $tg_el->get_content_clear();
$output .= $tg_el->get_content_wrapper_end();
// Bottom content wrapper end

return $output;