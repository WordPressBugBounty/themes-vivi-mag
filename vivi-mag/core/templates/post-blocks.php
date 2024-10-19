<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_post_blocks_function')) {

	function vivi_mag_post_blocks_function() {

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if(1 == $paged) {
			
			if ( 
				(vivi_mag_setting('vivi_mag_postblock_1_layout', 'module-1') <> 'disable') &&
				(vivi_mag_setting('vivi_mag_postblock_1_category','none') <> 'none' ) 
			) {
	
				echo call_user_func(
					'vivi_mag_get_' . str_replace('-', '_', vivi_mag_setting('vivi_mag_postblock_1_layout', 'module-1')),
					vivi_mag_setting('vivi_mag_postblock_1_category'),
					vivi_mag_setting('vivi_mag_postblock_1_hide_title'),
				);
	
			}
					
			if ( 
				(vivi_mag_setting('vivi_mag_postblock_2_layout', 'disable') <> 'disable') &&
				(vivi_mag_setting('vivi_mag_postblock_2_category','none') <> 'none' )
			) {
	
				echo call_user_func(
					'vivi_mag_get_' . str_replace('-', '_', vivi_mag_setting('vivi_mag_postblock_2_layout')),
					vivi_mag_setting('vivi_mag_postblock_2_category'),
					vivi_mag_setting('vivi_mag_postblock_2_hide_title'),
				);
	
			}
				
		}
		
	}

	add_action( 'vivi_mag_post_blocks', 'vivi_mag_post_blocks_function' );

}

?>