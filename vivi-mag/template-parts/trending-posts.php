<?php

    if ( vivi_mag_setting('vivi_mag_enable_trending_posts', true) == true ) :

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'ignore_sticky_posts' => true,
            'orderby' => vivi_mag_setting('vivi_mag_trending_posts_orderby', 'comment_count'),
        );

        if ( is_numeric(vivi_mag_setting('vivi_mag_trending_posts_category')) ) :
			$args['cat'] = vivi_mag_setting('vivi_mag_trending_posts_category');
		endif;

        $trending_posts = new WP_Query($args);
        $trending_posts_enabled = vivi_mag_setting('vivi_mag_enable_trending_posts_only_first_page_pagination', false);

        if (
            $trending_posts->have_posts() &&
            (
                (
                    $trending_posts_enabled == true && 
                    get_query_var('paged') <= 1
                ) ||
                $trending_posts_enabled == false
            )
    
        ) :

    ?>

        <section class="trending-articles-wrapper">

            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="trending-articles-section">

                            <h2 class="trending-articles-section-title"><?php echo vivi_mag_setting('vivi_mag_trending_posts_section_title', esc_html__( 'Trending Posts', 'vivi-mag' )) ;?></h2>

                            <div class="trending-articles-grid">

                                <?php

                                    while ($trending_posts->have_posts()) : $trending_posts->the_post();
                                        
                                        global $post;

                                        $post_count = $trending_posts->current_post + 1;
                                ?>

                                        <div class="trending-article trending-article-<?php echo $post_count;?>">

                                            <div class="trending-article-inner">

                                                <?php

                                                    if ('' != get_the_post_thumbnail() ) : 

                                                        the_post_thumbnail('vivi_mag_trending_image');
                                                    
                                                    else :

                                                        $thumbnailIMG = get_stylesheet_directory_uri() . '/assets/images/placeholder-185x125.jpg';
                                                        echo '<img src="' . esc_url($thumbnailIMG) . '" alt="' . esc_attr(get_the_title()) . '">';
                                    
                                                    endif;
                                                ?>

                                                <div class="trending-article-content">
                                                    <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
                                                    <p class="trending-article-author"><?php echo esc_html__('Written by ','vivi-mag') . get_the_author_posts_link(); ?></p>
                                                </div>

                                            </div>

                                        </div>

                                <?php

                                    endwhile;
                                    wp_reset_postdata();
                                    
                                ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

<?php

        endif;

    endif;

?>