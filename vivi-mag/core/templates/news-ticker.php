<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

function vivi_mag_get_newsticker() {

	$html = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => intval(vivi_mag_setting('vivi_mag_news_ticker_limit', 5)),
		'orderby' => esc_attr(vivi_mag_setting('vivi_mag_news_ticker_order', 'date')),
		'order' => esc_attr(vivi_mag_setting('vivi_mag_news_ticker_sort_order', 'desc')),
	);

	if ( is_numeric(vivi_mag_setting('vivi_mag_news_ticker_category')) ) :
		$args['cat'] = vivi_mag_setting('vivi_mag_news_ticker_category');
	endif;

	$recent_posts = new WP_Query($args);

	if ($recent_posts->have_posts()) : 

		$html .= '<div class="ticker-section">';

		$html .= '<div class="ticker">';

		$html .= '<strong><span>' . vivi_mag_setting('vivi_mag_news_ticker_title', esc_html__( 'HOT', 'vivi-mag')) . '</span></strong>';

		$html .= '<ul>';

		while ($recent_posts->have_posts()) : $recent_posts->the_post();

			$html .= '<li><a href="' . esc_url(get_permalink()).'">' . esc_html(get_the_title()).'</a></li>';

		endwhile;

		$html .= '</ul>';

		$html .= '</div>';
		$html .= '</div>';
	
	endif;
	wp_reset_postdata();

	return $html;

}

?>