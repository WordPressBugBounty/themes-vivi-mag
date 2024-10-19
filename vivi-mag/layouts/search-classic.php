<div id="content" class="container">
	
    <div class="row">
    
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
                <?php do_action('vivi_mag_postformat'); ?>
                <div class="clear"></div>
                
            </div>
		
		<?php 
			
			endwhile; 
			else:
		
		?>

			<div class="post-container col-md-12" >
    
                <article class="post-article not-found">
                                
                	<h1><?php esc_html_e( 'Not found', 'vivi-mag' ) ?></h1>
                	<p><?php esc_html_e( 'Sorry, no posts matched your criteria', 'vivi-mag' ) ?> <strong>: <?php echo esc_html($s); ?> </strong></p>
                 
                </article>
    
			</div>
        
		<?php endif; ?>
           
    </div>

	<?php do_action( 'vivi_mag_pagination', 'archive'); ?>

</div>