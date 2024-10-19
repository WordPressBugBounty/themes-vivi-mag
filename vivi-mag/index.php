<?php 

	get_header();
	
	get_sidebar('header');

	get_template_part('template-parts/recent','posts'); 
	get_template_part('template-parts/trending','posts'); 

	get_template_part('core/templates/featured', 'links'); 
	
	if ( 
		!vivi_mag_setting('vivi_mag_home_layout') || 
		strstr(vivi_mag_setting('vivi_mag_home_layout'), 'sidebar' )
	) {
				
		get_template_part('layouts/home', 'sidebar'); 

	} else if ( vivi_mag_setting('vivi_mag_home_layout') == 'col-md-4' ) { 

		get_template_part('layouts/home', 'masonry'); 

	} else { 
		
		get_template_part('layouts/home', 'classic');
			
	}

	get_footer(); 
	
?>