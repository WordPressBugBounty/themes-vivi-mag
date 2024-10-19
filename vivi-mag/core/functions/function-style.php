<?php 

if (!function_exists('vivi_mag_css_custom')) {

	function vivi_mag_css_custom() { 

		$css = '';

		/* =================== BEGIN HEADER TEXT COLOR =================== */

		if (vivi_mag_setting('vivi_mag_logo_text_color')) 
			$css .= "#logo a { color:".esc_html(vivi_mag_setting('vivi_mag_logo_text_color'))."; }";
		
		/* =================== END HEADER IMAGE =================== */

		/* =================== BEGIN LOGO STYLE =================== */

		if (vivi_mag_setting('vivi_mag_logo_font_size')) 
			$css .= "#logo a { font-size:".esc_html(vivi_mag_setting('vivi_mag_logo_font_size'))."; }";

		if (vivi_mag_setting('vivi_mag_logo_description_font_size')) 
			$css .= "#logo a span { font-size:".esc_html(vivi_mag_setting('vivi_mag_logo_description_font_size'))."; }";
		
		if ( vivi_mag_setting('vivi_mag_logo_description_top_margin') ) 
			$css .=  "#logo a span { margin-top:".esc_html(vivi_mag_setting('vivi_mag_logo_description_top_margin'))."; }"; 

		if (vivi_mag_setting('vivi_mag_logo_font_weight'))
			$css .= "#logo a { font-weight:" . esc_html(vivi_mag_setting('vivi_mag_logo_font_weight')) . ";}"; 
		
		if (vivi_mag_setting('vivi_mag_logo_text_transform'))
			$css .= "#logo a { text-transform:" . esc_html(vivi_mag_setting('vivi_mag_logo_text_transform')) . ";}"; 

		/* =================== END LOGO STYLE =================== */
		
		/* =================== BEGIN MAIN MENU STYLE =================== */
		
		if ( vivi_mag_setting('vivi_mag_menu_font_size') )  : 
			$css .= "nav#mobilemenu ul li a { font-size:".esc_html(vivi_mag_setting('vivi_mag_menu_font_size'))."; }"; 
			$css .= "nav#mobilemenu ul ul li a { font-size:" . ( str_replace("px", "", esc_html(vivi_mag_setting('vivi_mag_menu_font_size'))) - 2 ) . "px;}"; 
		endif;
		
		if (vivi_mag_setting('vivi_mag_menu_font_weight'))
			$css .= "nav#mobilemenu ul li a { font-weight:" . esc_html(vivi_mag_setting('vivi_mag_menu_font_weight')) . ";}"; 
		
		if (vivi_mag_setting('vivi_mag_menu_text_transform'))
			$css .= "nav#mobilemenu ul li a { text-transform:" . esc_html(vivi_mag_setting('vivi_mag_menu_text_transform')) . ";}"; 
		
		/* =================== END MAIN MENU =================== */
		
		/* =================== BEGIN CONTENT STYLE =================== */
		
		if ( vivi_mag_setting('vivi_mag_content_font_size') ) :
			
			$css .= '
				.post-article a,
				.post-article p,
				.post-article li,
				.post-article address,
				.post-article dd,
				.post-article blockquote,
				.post-article td,
				.post-article th,
				.post-article span,
				.sidebar-area a,
				.sidebar-area p,
				.sidebar-area li,
				.sidebar-area address,
				.sidebar-area dd,
				.sidebar-area blockquote,
				.sidebar-area td,
				.sidebar-area th,
				.sidebar-area span,
				.textwidget { font-size:' . esc_html(vivi_mag_setting('vivi_mag_content_font_size')) . '}';
			
		endif;
		
		/* =================== END CONTENT STYLE =================== */
		
		/* =================== START TITLE STYLE =================== */

		if ( vivi_mag_setting('vivi_mag_h1_font_size') ) :
		
			$css .=  "
				h1, 
				h1.title, 
				h1.title a, 
				h1.title span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h1_font_size')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_h2_font_size') ) :
		
			$css .=  "
				h2, 
				h2.title, 
				h2.title a, 
				h2.title span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h2_font_size')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_h3_font_size') ) :
		
			$css .=  "
				h3, 
				h3.title, 
				h3.title a, 
				h3.title span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h3_font_size')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_h4_font_size') ) :
		
			$css .=  "
				h4, 
				h4.title, 
				h4.title a, 
				h4.title span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h4_font_size')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_h5_font_size') ) :
		
			$css .=  "
				h5, 
				h5.title, 
				h5.title a, 
				h5.title span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h5_font_size')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_h6_font_size') ) :
		
			$css .=  "
				h6, 
				h6.title, 
				h6.title a, 
				h6.title span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h6_font_size')) . "; }"; 
		
		endif;

		if ( vivi_mag_setting('vivi_mag_titles_font_weight') ) :
		
			$css .=  "
	
				h1,
				h2,
				h3,
				h4,
				h5,
				h6,
				h1.title a,
				h2.title a,
				h3.title a,
				h4.title a,
				h5.title a,
				h6.title a,
				h1.title span,
				h2.title span,
				h3.title span,
				h4.title span,
				h5.title span,
				h6.title span { font-weight:" . esc_html(vivi_mag_setting('vivi_mag_titles_font_weight')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_titles_text_transform') ) :
		
			$css .=  "
	
				h1,
				h2,
				h3,
				h4,
				h5,
				h6,
				h1.title a,
				h2.title a,
				h3.title a,
				h4.title a,
				h5.title a,
				h6.title a { text-transform:" . esc_html(vivi_mag_setting('vivi_mag_titles_text_transform')) . "; }"; 
		
		endif;
		
		if ( vivi_mag_setting('vivi_mag_h2_font_size') && vivi_mag_is_woocommerce_active() ) :
		
			$css .=  "
				.cross-sells h2 span,
				.upsells-products h2 span,
				.related-products h2 span { font-size:" . esc_html(vivi_mag_setting('vivi_mag_h2_font_size')) . "; }"; 
		
		endif;

		/* =================== END TITLE STYLE =================== */

		/* =================== BEGIN POST META STYLE =================== */
		
		if ( vivi_mag_setting('vivi_mag_postmeta_font_size') ) :
			
			$css .= '
			.post-meta-author ,
			.post-meta-author a,
			.post-meta-date,
			.post-meta-category ,
			.post-meta-category a,
			.post-meta-icon { font-size:' . esc_html(vivi_mag_setting('vivi_mag_postmeta_font_size')) . ' !important}';
			
		endif;

		if ( vivi_mag_setting('vivi_mag_postmeta_text_transform') ) :
			
			$css .= '
			.post-meta-author ,
			.post-meta-date,
			.post-meta-category ,
			.post-meta-icon { text-transform:' . esc_html(vivi_mag_setting('vivi_mag_postmeta_text_transform')) . ' !important}';
			
		endif;

		/* =================== END POST META =================== */

		wp_add_inline_style( 'vivi-mag-style', $css );
		
	}

	add_action('wp_enqueue_scripts', 'vivi_mag_css_custom');

}

?>