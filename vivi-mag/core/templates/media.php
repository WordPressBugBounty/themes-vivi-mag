<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_thumbnail_function')) {

	function vivi_mag_thumbnail_function($id) {

		global $post;
		
		$class = '';

		if (
			 ( is_home() ) ||
			 ( vivi_mag_is_archive() ) ||
			 ( is_search() )
		) :

			$class = 'blog-section';

		endif;

		if ( '' != get_the_post_thumbnail() ) { 
			
	?>
			
			<div class="pin-container <?php echo esc_attr($class);?>" >
					
				<?php 
						
					the_post_thumbnail($id);
					
				?>
                    
			</div>
			
	<?php
	
		}
	
	}

	add_action( 'vivi_mag_thumbnail', 'vivi_mag_thumbnail_function', 10, 1 );

}

?>