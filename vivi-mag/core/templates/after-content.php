<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_after_content_function')) {

	function vivi_mag_after_content_function() {

		if ( 
			vivi_mag_get_archive_title() || 
			is_page_template() || 
			is_search() || 
			is_home()
		) {

			the_excerpt();

		} else {

			the_content();

			if ( is_single() && vivi_mag_setting('vivi_mag_enable_author_info_box') == true ) : 

				do_action('vivi_mag_post_author');

			endif;

			the_tags( '<footer class="line"><span class="entry-info"><strong>Tags:</strong> ', ', ', '</span></footer>' );

			comments_template();

		}

	}

	add_action( 'vivi_mag_after_content', 'vivi_mag_after_content_function' );

}

?>
