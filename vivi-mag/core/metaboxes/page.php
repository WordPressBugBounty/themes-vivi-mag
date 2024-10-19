<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

new vivi_mag_metaboxes (

	'page', 
	
	array(

		array(
		
			'name' => 'Navigation',  
			'type' => 'navigation',  
			'item' => array( 
				
				'general' => esc_html__( 'Setting', 'vivi-mag') , 
					
			),   
				
			'start' => '<ul>', 
			'end' => '</ul>'),  
		
		array(
			
			'type' => 'begintab',
			'tab' => 'general',
			'element' =>
				
				array(
					'name' => esc_html__( 'Page settings','vivi-mag'),
					'type' => 'title',
				),
		
				array(
					'name' => esc_html__( 'Template','vivi-mag'),
					'desc' => esc_html__( 'Select a template for this page','vivi-mag'),
					'id' => 'vivi_mag_template',
					'type' => 'select',
					'options' => array(
						'full' => esc_html__( 'Full Width','vivi-mag'),
						'left-sidebar' =>  esc_html__( 'Left Sidebar','vivi-mag'),
						'right-sidebar' => esc_html__( 'Right Sidebar','vivi-mag'),
					),
					'std' => 'right-sidebar',
				),
		
		),
		
		array(
			'type' => 'endtab'
		),
		
	array( 'type' => 'endsection' )
	
	)
	
);

?>