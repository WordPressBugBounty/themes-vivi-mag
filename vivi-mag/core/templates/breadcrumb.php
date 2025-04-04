<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
		
if ( !is_home() && vivi_mag_setting('vivi_mag_enable_breadcrumb') == true ) : ?>
    
	<div id="breadcrumb_wrapper">
        
		<div class="container">
            
			<div class="row">
                    
				<div class="col-md-12">
                    
					<?php 
							
						global $s;
						
						$delimiter = '<i class="fa fa-long-arrow-right"></i>';
						
						echo '<ul id="breadcrumb">';
					
						echo '<li><strong>' . esc_html__('You are here : ','vivi-mag') . '</strong></li>';
					
						if ( !vivi_mag_is_woocommerce_active('is_woocommerce') ) {
								
							echo '<li><a href="' . esc_url(home_url()) . '">' . esc_html__('Home','vivi-mag') . '</a></li>' . $delimiter;
								
							if ( is_category() ) {
									
								echo '<li>' . vivi_mag_get_archive_title() . '</li>';
					
							} elseif (is_single() && !is_attachment()) {
									
								echo '<li>';
								the_category(' , </li> <li>');
								echo '</li>' . $delimiter . '<li> ' . esc_html(get_the_title()) . '</li>';
						
							} elseif (is_page()) {
									
								echo '<li>' . esc_html(get_the_title()) . '</li>';
						
							} else if ( vivi_mag_get_archive_title()) {
								
								echo '<li>' . vivi_mag_get_archive_title() . '</li>';
								
							} else if ( is_search() ) {
					
								echo '<li>' . esc_html__( 'Search results for ', 'vivi-mag' ) . esc_html($s) . '</li>';
							
							} else if ( is_404() ) {
					
								echo '<li>' . esc_html__( 'Page 404', 'vivi-mag' ) . esc_html($s) . '</li>';
								
							} else if ( is_attachment() ) {
					
								echo '<li>' . esc_html__( 'Attachment: ', 'vivi-mag' ) . esc_html(get_the_title()) . '</li>';
								
							} 
						
						} else if ( vivi_mag_is_woocommerce_active('is_woocommerce') ) {
						
							woocommerce_breadcrumb(
									
								array(
									'delimiter'   => $delimiter,
									'wrap_before' => '',
									'wrap_after'  => '',
									'before'      => '<li>',
									'after'       => '</li>',
								)
							
							);
						
						}
							
						echo '</ul>';
						
					?>
                        
				</div>

			</div>
                
		</div>
        
	</div>
    
<?php endif; ?>