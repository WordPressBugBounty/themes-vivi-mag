<?php 

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_scroll_sidebar_function')) {

	function vivi_mag_scroll_sidebar_function() { 
	
		if ( is_active_sidebar('vivi-mag-scroll-widget-area')) { 
			
			dynamic_sidebar('vivi-mag-scroll-widget-area');
			
		} else { 
					
			the_widget( 'WP_Widget_Archives','',
			array(	'before_widget' => '<div class="post-article widget_archive">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="title-container"><h3 class="title">',
					'after_title'   => '</h3></div>'
			));

			the_widget( 'WP_Widget_Calendar',
			array(	'title'=> esc_html__('Calendar',"vivi-mag")),
			array(	'before_widget' => '<div class="post-article widget_calendar">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="title-container"><h3 class="title">',
					'after_title'   => '</h3></div>'
			));

			the_widget( 'WP_Widget_Categories','',
			array(	'before_widget' => '<div class="post-article widget_categories">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="title-container"><h3 class="title">',
					'after_title'   => '</h3></div>'
			));
			
		} 
			 
	}

	add_action( 'vivi_mag_scroll_sidebar', 'vivi_mag_scroll_sidebar_function' );

}

?>