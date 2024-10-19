<?php

if (!function_exists('vivi_mag_loadwidgets')) {

	function vivi_mag_loadwidgets() {

/*-----------------------------------------------------------------------------------*/
/* 		LOAD ALL SIDEBAR AREAS
/*-----------------------------------------------------------------------------------*/    

		register_sidebar(array(
			'name' => esc_html__('Side widget area','vivi-mag'),
			'id'   => 'vivi-mag-side-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'vivi-mag'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Scroll widget area','vivi-mag'),
			'id'   => 'vivi-mag-scroll-widget-area',
			'description'   => esc_html__('This widget area will be shown inside the scrollable sidebar.', 'vivi-mag'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-container"><h3 class="title">',
			'after_title'   => '</h3></div>'
		));

		register_sidebar(array(
			'name' => esc_html__('Header widget area','vivi-mag'),
			'id'   => 'vivi-mag-header-widget-area',
			'description'   => esc_html__('This widget area will be shown before the content.', 'vivi-mag'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Bottom widget area','vivi-mag'),
			'id'   => 'vivi-mag-bottom-widget-area',
			'description'   => esc_html__('This widget area will be shown at the bottom of your content', 'vivi-mag'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		));
	
		register_sidebar(array(
			'name' => esc_html__('Footer widget area','vivi-mag'),
			'id'   => 'vivi-mag-footer-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'vivi-mag'),
			'before_widget' => '<div id="%1$s" class="col-md-3 %2$s"><div class="widget-box">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		));

	}

	add_action( 'widgets_init', 'vivi_mag_loadwidgets' );

}

?>