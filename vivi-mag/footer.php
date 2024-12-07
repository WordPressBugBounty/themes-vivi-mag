    <footer id="footer">
    
    	<?php
		
			get_sidebar('bottom');
			get_sidebar('footer');
		
		?>
        
        <div class="container">
    
             <div class="row copyright" >
                
                <div class="col-md-12" >

                    <?php echo vivi_mag_get_social_icons(); ?>

                    <p>

                    	<?php 
						
							if ( vivi_mag_setting('vivi_mag_copyright_text')) :
							
								echo wp_filter_post_kses(vivi_mag_setting('vivi_mag_copyright_text'));
								
							else:
							
								esc_html_e('Copyright ', 'vivi-mag');
								echo esc_html(get_bloginfo('name'));
								echo esc_html( date_i18n( __( ' Y', 'vivi-mag' )));
							
							endif;

							echo ' | <a href="' . esc_url('https://www.themeinprogress.com/') . '" target="_blank">' . sprintf(esc_html__('Theme by %s', 'vivi-mag'), 'ThemeinProgress') . '</a>';
							echo ' | <a href="' . esc_url('http://wordpress.org/') . '" title="' . esc_attr__('A Semantic Personal Publishing Platform', 'vivi-mag') . '" rel="generator">' . sprintf(esc_html__('Proudly powered by %s', 'vivi-mag'), 'WordPress') . '</a>';

                    	?>
                            
                    </p>

                </div>
            
            </div>
            
        </div>
    
    </footer>

</div>

<?php 

	if ( vivi_mag_setting('vivi_mag_enable_backtotop_button', true) == true )
		echo '<div id="back-to-top"><span class="dashicons dashicons-arrow-up-alt"></span></div>';

	wp_footer(); 
	
?>   

</body>

</html>