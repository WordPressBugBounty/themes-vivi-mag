<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

function vivi_mag_get_main_article($postID, $size = 'vivi_mag_large_image', $placeholder = 'placeholder-600x396.jpg') {

	$excerpt = wp_trim_words(get_the_content($postID), 10 , '...' );

	$html = '';

	$html .= '<div class="main_article">';
					
		$html .= '<div class="article_featured_img">';
		
			$html .= '<a class="standard-post-permalink" href="' . esc_url(get_permalink($postID)) . '">';

				if ( has_post_thumbnail($postID) ) {

					$html .= get_the_post_thumbnail($postID, $size);

				} else {

					$thumbnailIMG = get_stylesheet_directory_uri() . '/assets/images/' . $placeholder;
					$html .= '<img src="' . esc_url($thumbnailIMG) . '" alt="' . esc_attr(get_the_title($postID)) . '">';

				}
			
			$html .= '</a>';
	
		$html .= '</div>';
					
		$html .= '<div class="article_details" style="display:block">';
		
			$html .= '<a href="' . esc_url(get_permalink($postID)) . '">';
		
				$html .= '<h3>' . esc_html(get_the_title($postID)) . '</h3>';
		
			$html .= '</a>';
		
			$html .= '<div class="meta-info">' . esc_html(get_the_date(false, $postID)) . '</div>';
		
			$html .= '<p>' . esc_html($excerpt) . ' </p>';
		
		$html .= '</div>';
		
		$html .= '<div class="clear"></div>';
	
	$html .= '</div>';
	
	return $html;

}
	
?>