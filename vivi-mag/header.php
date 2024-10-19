<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

if ( function_exists('wp_body_open') ) {
	wp_body_open();
}

?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vivi-mag' ); ?></a>

<?php get_template_part('template-parts/scroll','sidebar'); ?>

<div id="wrapper">

    <?php if ( vivi_mag_setting('vivi_mag_enable_topbar_section', true) == true ) : ?>

        <div id="topbar-section">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <?php echo vivi_mag_get_topbar_leftcolumn(); ?>

                        <div class="topbar-right-column">

                            <?php 
                                        
                                if ( 
                                    vivi_mag_is_woocommerce_active() && 
                                    vivi_mag_setting('vivi_mag_enable_woocommerce_header_cart', true) == true
                                ) :
                                            
                                    echo vivi_mag_header_cart();
                                        
                                endif;
                                    
                            ?>

                            <a class="open-modal-sidebar" href="#modal-sidebar"><i class="fa fa-bars"></i></a>

                        </div>
                    
                    </div>

                </div>

            </div>

        </div>

    <?php endif;?>

	<header id="header-wrapper" >

        <div id="header">

            <div class="container">

                <div class="row">

                    <div class="col-md-12" >

                        <div id="logo">

                            <?php

                                if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {

                                    the_custom_logo();

                                } else {

                                    echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';

                                        echo esc_html(get_bloginfo('name'));

                                        if ( get_theme_mod('vivi_mag_hide_tagline', false) == false) :
                                            
                                            echo '<span>'. esc_html(get_bloginfo('description')) . '</span>';

                                        endif;

                                    echo '</a>';

                                }

                            ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div id="menu-wrapper">
                        
            <div class="container">
                        
                <div class="row">
                                    
                    <div class="col-md-12" >

                        <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false" type="button">
                            <span aria-hidden="true"><?php esc_html_e( 'Menu', 'vivi-mag' ); ?></span>
                            <span class="dashicons" aria-hidden="true"></span>
                        </button>

                        <nav id="top-menu" class="header-menu <?php echo esc_attr(get_theme_mod('vivi_mag_menu_layout','left_align'));?>_layout" >
                        
                            <?php 
                                                
                                wp_nav_menu( array(
                                    'theme_location' => 'main-menu',
                                    'container' => 'false'
                                )); 
                                                
                            ?>
                                                
                        </nav> 
            
                    
                    </div>
            
                </div>
                            
            </div>
                                    
        </div>

	</header>