<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Grid transform
* Skin Slug: tg-grid-transform
* Date: 10/05/18 - 11:11:26AM
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




		// Bottom wrapper start
		$output .= '<div class="tg-bottom-holder">';
			// Overlay
			$output .= $tg_el->get_overlay('','bottom');
			$output .= $tg_el->get_the_terms(array('taxonomy' => 'portfolio-category', 'link' => false, 'color' => '', 'separator' => ', ', 'override' => true, 'html_tag' => 'div'), 'tg-element-2 category');
			$output .= $tg_el->get_the_title(array('link' => false, 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-1 title');
		$output .= '</div>';
		// Bottom wrapper end

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end


return $output;