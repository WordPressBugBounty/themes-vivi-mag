<?php 

	get_header();

	get_template_part('core/templates/breadcrumb'); 
	
	do_action('vivi_mag_top_section', 'archive');

	get_sidebar('header');

	if ( 
		!vivi_mag_setting('vivi_mag_category_layout') || 
		strstr(vivi_mag_setting('vivi_mag_category_layout'), 'sidebar' )
	) {
				
		get_template_part('layouts/archive', 'sidebar'); 

	} else if ( vivi_mag_setting('vivi_mag_category_layout') == 'col-md-4' ) { 

		get_template_part('layouts/archive', 'masonry'); 

	} else { 
		
		get_template_part('layouts/archive', 'classic');
			
	}

	get_footer(); 

?>