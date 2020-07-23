<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Portfolio Full
* Skin Slug: tg-portfolio-full
* Date: 10/05/18 - 11:10:34AM
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

	// Media wrapper start
	$output .= $tg_el->get_media_wrapper_start();

	// Media content (image, gallery, audio, video)
	$output .= $tg_el->get_media();

		// Media content holder start
		$output .= $tg_el->get_media_content_start();




		// Center wrapper start
		$output .= $tg_el->get_center_wrapper_start();
			// Overlay
			$output .= $tg_el->get_overlay('','center');
			$output .= $tg_el->get_the_title(array('link' => false, 'html_tag' => 'h2', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-1 title');
			$output .= $tg_el->get_the_terms(array('taxonomy' => 'portfolio-category', 'link' => false, 'color' => '', 'separator' => ', ', 'override' => true, 'html_tag' => 'div'), 'tg-element-2 category main-color');
		$output .= $tg_el->get_center_wrapper_end();
		// Center wrapper end

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end


return $output;