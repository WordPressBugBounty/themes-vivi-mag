<?php
	
	if ( vivi_mag_setting('vivi_mag_enable_featuredlinks_section') == true ) :

		echo '<div id="featured-links" class="container">';
            
            echo '<div class="row">';

                echo '<div class="col-md-12">';

                    echo '<div class="featured-links-wrapper">';
                        
                        if ( vivi_mag_setting('vivi_mag_featured_link_1_image') ) :
                        
                            $featured_image_1 = esc_attr(vivi_mag_setting('vivi_mag_featured_link_1_image'));
                            $featured_link_1 = wp_get_attachment_url($featured_image_1);
                            $featured_title_1 =  vivi_mag_setting('vivi_mag_featured_link_1_title');

                            echo '<div class="featured-link-item featured-link-item-1">';

                            if ( vivi_mag_setting('vivi_mag_featured_link_1_url') ) :

                                echo '<a href="' . esc_url(vivi_mag_setting('vivi_mag_featured_link_1_url')) . '"></a>';

                            endif;

                            echo '<img src="' . esc_url($featured_link_1) . '" alt="' . esc_attr($featured_title_1) . '">';

                            if ( vivi_mag_setting('vivi_mag_featured_link_1_title') ) :

                                echo '<div class="featured-link-title">';
                                echo '<h6>' . esc_html($featured_title_1) . '</h6>';
                                echo '</div>';
                    
                            endif;

                            echo '</div>';
                        
                        endif;
                        
                        if ( vivi_mag_setting('vivi_mag_featured_link_2_image') ) :
                        
                            $featured_image_2 = esc_attr(vivi_mag_setting('vivi_mag_featured_link_2_image'));
                            $featured_link_2 = wp_get_attachment_url($featured_image_2);
                            $featured_title_2 =  vivi_mag_setting('vivi_mag_featured_link_2_title');

                            echo '<div class="featured-link-item featured-link-item-2">';

                            if ( vivi_mag_setting('vivi_mag_featured_link_2_url') ) :

                                echo '<a href="' . esc_url(vivi_mag_setting('vivi_mag_featured_link_2_url')) . '"></a>';

                            endif;

                            echo '<img src="' . esc_url($featured_link_2) . '" alt="' . esc_attr($featured_title_2) . '">';

                            if ( vivi_mag_setting('vivi_mag_featured_link_2_title') ) :

                                echo '<div class="featured-link-title">';
                                echo '<h6>' . esc_html($featured_title_2) . '</h6>';
                                echo '</div>';
                    
                            endif;

                            echo '</div>';
                        
                        endif;
                        
                        if ( vivi_mag_setting('vivi_mag_featured_link_3_image') ) :
                        
                            $featured_image_3 = esc_attr(vivi_mag_setting('vivi_mag_featured_link_3_image'));
                            $featured_link_3 = wp_get_attachment_url($featured_image_3);
                            $featured_title_3 =  vivi_mag_setting('vivi_mag_featured_link_3_title');

                            echo '<div class="featured-link-item featured-link-item-3">';

                            if ( vivi_mag_setting('vivi_mag_featured_link_3_url') ) :

                                echo '<a href="' . esc_url(vivi_mag_setting('vivi_mag_featured_link_3_url')) . '"></a>';

                            endif;

                            echo '<img src="' . esc_url($featured_link_3) . '" alt="' . esc_attr($featured_title_3) . '">';

                            if ( vivi_mag_setting('vivi_mag_featured_link_3_title') ) :

                                echo '<div class="featured-link-title">';
                                echo '<h6>' . esc_html($featured_title_3) . '</h6>';
                                echo '</div>';
                    
                            endif;

                            echo '</div>';
                        
                        endif;
                    
                    echo '</div>';
                
                echo '</div>';

            echo '</div>';

		echo '</div>';

	endif;

?>