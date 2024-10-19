<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_top_section_function')) {

	function vivi_mag_top_section_function( $page = false ) {

		if(
		
			(
				$page == 'archive' &&
				vivi_mag_setting('vivi_mag_enable_category_title', true) == true 
			) ||
		
			(
				$page == 'search' &&
				vivi_mag_setting('vivi_mag_enable_searched_item', true) == true 
			) 
		
		) :
			
	?>
		
            <section class="top-section-wrapper">
            
                <div id="top-section-inner">
                        
                    <?php 

                        if ( is_archive() ) : 
                    
                    ?>
                    
                            <h1 class="archive-title"><?php echo vivi_mag_get_archive_title(); ?></h1>
                    
                    <?php 
                        
                        endif;

                        if ( is_search() ) : 
                    
                    ?>
                    
                            <h1 class="search-result-title"><?php esc_html_e( 'You searched: ', 'vivi-mag' ) ?><strong><?php echo get_search_query(); ?> </strong></h1>
                    
                    <?php 
                        
                        endif;
                    
                    ?>        
        
                </div>        
                        
            </section>

	<?php 
	
		endif;
	
	}

	add_action( 'vivi_mag_top_section', 'vivi_mag_top_section_function', 10, 1);

}

?>