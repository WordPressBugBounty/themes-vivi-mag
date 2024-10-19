<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

function vivi_mag_get_module_1($catID = false, $hide_title = false) {

	$html = '';
	$innerLeft = '';
	$innerRight = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 5,
	);

	if ( is_numeric($catID) ) :
		$args['cat'] = $catID;
	endif;

	$query = new WP_Query($args);

	if ( $query->have_posts() ) :

		$innerLeft = '';
		$innerRight = '';
		
		while ( $query->have_posts() ) : $query->the_post();
			
			global $post;
			
			if( 0 == $query->current_post ) {
			
				$innerLeft .= vivi_mag_get_main_article($post->ID, 'vivi_mag_large_image', 'placeholder-700x611.jpg');
			
			} else {
				
				$innerRight .= vivi_mag_get_small_article($post->ID);
			
			}
			
		endwhile;
				
	endif;
	wp_reset_postdata();

	$html .= '<div class="news_container module-1 layout-1">';

		$html .= ( $hide_title == false) ? '<h4 class="title"><span>' . esc_html(get_cat_name($catID)) . '</span></h4>' : '';

		$html .= '<div class="clear"></div>';
		
		$html .= '<div class="news_left_col">';

			$html .= $innerLeft;

		$html .= '</div>';

		$html .= '<div class="news_right_col">';

			$html .= $innerRight;

		$html .= '</div>';

		$html .= '<div class="clear"></div>';

	$html .= '</div>';
	
	return $html;

}

?>