<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_before_content_function')) {

	function vivi_mag_before_content_function( $type = "post" ) {
		
		if ( 
			$type == 'post' && 
			( 
				vivi_mag_setting('vivi_mag_enable_post_author', true) || 
				vivi_mag_setting('vivi_mag_enable_post_date', true)
			)
		) :

			echo '<div class="post-meta">';

				if ( vivi_mag_setting('vivi_mag_enable_post_author', true) == true ) :
					
					echo '<span class="post-meta-author">';

						esc_html_e('Written by ','vivi-mag');
						echo get_the_author_posts_link();

					echo '</span>';

				endif;

				if ( vivi_mag_setting('vivi_mag_enable_post_date', true) == true ) :
					
					echo '<span class="post-meta-date">';

						echo get_the_date();

					echo '</span>';

				endif;

			echo '</div>';

		endif;
		
		if ( ! vivi_mag_is_single() ) {

			do_action('vivi_mag_get_title', 'blog' ); 

		} else {

			if ( !vivi_mag_is_woocommerce_active('is_cart') ) :
	
				if ( vivi_mag_is_single() && !is_page_template() ) :
							 
					do_action('vivi_mag_get_title', 'single');
							
				else :
					
					do_action('vivi_mag_get_title', 'blog'); 
							 
				endif;
	
			endif;

		}

		if ( $type == 'post' ) :

			echo '<div class="post-meta">';

				if ( vivi_mag_setting('vivi_mag_enable_post_category', true ) == true ) :
					
					echo '<span class="post-meta-category">'; 

						the_category(' . '); 
					
					echo '</span>';
				
				endif;

				if ( vivi_mag_setting('vivi_mag_enable_post_icon', true ) == true ) :

					echo '<span class="post-meta-icon">'; 

						echo vivi_mag_posticon();
					
					echo '</span>';
					
				endif;

			echo '</div>';

		endif;

	} 
	
	add_action( 'vivi_mag_before_content', 'vivi_mag_before_content_function' );

}

?>