<?php 

	get_header(); 

	get_template_part('core/templates/breadcrumb'); 

	do_action('vivi_mag_top_section', 'search');

	get_sidebar('header');

	if ( 
		!vivi_mag_setting('vivi_mag_search_layout') || 
		strstr(vivi_mag_setting('vivi_mag_search_layout'), 'sidebar' )
	) {
				
		get_template_part('layouts/search', 'sidebar'); 

	} else if ( vivi_mag_setting('vivi_mag_search_layout') == 'col-md-4' ) { 

		get_template_part('layouts/search', 'masonry'); 

	} else { 
		
		get_template_part('layouts/search', 'classic');
			
	}

	get_footer(); 

?>