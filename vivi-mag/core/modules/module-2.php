<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

function vivi_mag_get_module_2($catID = false, $hide_title = false) {

	$html = '';
	$inner = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 8,
	);

	if ( is_numeric($catID) ) :
		$args['cat'] = $catID;
	endif;

	$query = new WP_Query($args);

	if ( $query->have_posts() ) :

		while ( $query->have_posts() ) : $query->the_post();
		
		global $post;
	
		if ($query->current_post == 4) {
			
			$inner .= '</div>';
			$inner .= '<div class="news_right_col">';
		
		}
	
		if( 
			$query->current_post == 0 || 
			$query->current_post == 4  
		) {
	
			$inner .= vivi_mag_get_main_article($post->ID, 'vivi_mag_medium_image');
	
		} else {
						
			$inner .= vivi_mag_get_small_article($post->ID);
	
		}
	
		endwhile;
	
	endif;
	wp_reset_postdata();

	$html .= '<div class="news_container module-2 layout-2">';

		$html .= ( $hide_title == false) ? '<h4 class="title"><span>' . esc_html(get_cat_name($catID)) . '</span></h4>' : '';

		$html .= '<div class="clear"></div>';
		
		$html .= '<div class="news_left_col">';

			$html .= $inner;

		$html .= '</div>';

		$html .= '<div class="clear"></div>';

	$html .= '</div>';
	
	return $html;

}

?>