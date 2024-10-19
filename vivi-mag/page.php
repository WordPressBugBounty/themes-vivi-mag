<?php 

	get_header();
	get_template_part('core/templates/breadcrumb'); 
	get_sidebar('header');
	
?>

<div id="content" class="container content">
	
    <div class="row">
       
        <div class="<?php echo vivi_mag_template('span') . " " . vivi_mag_template('sidebar'); ?>">
        	
            <div class="row">
        
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                    <?php 
					
						while ( have_posts() ) : the_post();
						
							do_action('vivi_mag_postformat');
							
							wp_link_pages(
								array(
									'before' => '<div class="vivi-mag-pagination">',
									'after' => '</div>',
									'link_before' => '<span>',
									'link_after' => '</span>'
								)
							);
						
						endwhile;
						
					?>
            
                </div>
        
			</div>
        
        </div>
        
		<?php get_sidebar(); ?>	

    </div>
    
</div>

<?php get_footer(); ?>