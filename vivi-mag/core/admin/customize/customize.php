<?php

if (!function_exists('vivi_mag_customize_panel_function')) {

	function vivi_mag_customize_panel_function() {

		$theme_panel = array (

			/* Vivi Mag support section
			========================================================================== */

			array(

				'title' => esc_html__( 'Upgrade to Vivi Mag Pro','vivi-mag'),
				'id' => 'vivi-mag-customize-info',
				'type' => 'vivi-mag-customize-info',
				'section' => 'vivi-mag-customize-info',
				'priority' => '08',

			),

			/**
			* Site identity > Hide Tagline option
			*/

			array(

				'label' => esc_html__( 'Hide Tagline','vivi-mag'),
				'description' => esc_html__( 'Do you want to hide the tagline?','vivi-mag'),
				'id' => 'vivi_mag_hide_tagline',
				'type' => 'checkbox',
				'section' => 'title_tagline',
				'std' => false,

			),

			/**
			* Colors > Logo text color option
			*/

			array(

				'label' => esc_html__('Logo text color','vivi-mag'),
				'description' => esc_html__('Choose your custom color for the logo.','vivi-mag'),
				'id' => 'vivi_mag_logo_text_color',
				'type' => 'color',
				'section' => 'colors',
				'std' => '#262626',
			),

			/* Vivi Mag Main Settings panel
			========================================================================== */

			array(

				'title' => esc_html__( 'Vivi Mag Main Settings','vivi-mag'),
				'description' => esc_html__( 'Vivi Mag Main Settings','vivi-mag'),
				'type' => 'panel',
				'id' => 'general_panel',
				'priority' => '10',

			),

			/* Vivi Mag Main Settings panel > Color Scheme section
			========================================================================== */

			array(

				'title' => esc_html__( 'Color Scheme','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the color scheme of Vivi Mag.','vivi-mag'),
				'type' => 'section',
				'panel' => 'general_panel',
				'priority' => '11',
				'id' => 'colorscheme_section',

			),

			/**
			* Vivi Mag Main Settings panel > Color Scheme section > Body Color Schemes option
			*/

			array(

				'label' => esc_html__( 'Body Color Schemes','vivi-mag'),
				'description' => esc_html__('Choose your body color scheme.','vivi-mag'),
				'id' => 'vivi_mag_skin',
				'type' => 'select',
				'section' => 'colorscheme_section',
				'options' => array (
				   'cyan' => esc_html__( 'Cyan','vivi-mag'),
				   'orange' => esc_html__( 'Orange','vivi-mag'),
				   'blue' => esc_html__( 'Blue','vivi-mag'),
				   'red' => esc_html__( 'Red','vivi-mag'),
				   'pink' => esc_html__( 'Pink','vivi-mag'),
				   'purple' => esc_html__( 'Purple','vivi-mag'),
				   'yellow' => esc_html__( 'Yellow','vivi-mag'),
				   'green' => esc_html__( 'Green','vivi-mag'),
				   'black' => esc_html__( 'Black','vivi-mag'),
				   'clean-yellow' => esc_html__( 'Clean Yellow','vivi-mag'),
				   'clean-red' => esc_html__( 'Clean Red','vivi-mag'),
				   'clean-turquoise' => esc_html__( 'Clean Turquoise','vivi-mag'),
				   'clean-green' => esc_html__( 'Clean Green','vivi-mag'),
				   'clean-blue' => esc_html__( 'Clean Blue','vivi-mag'),
				   'clean-pink' => esc_html__( 'Clean Pink','vivi-mag'),
				),

				'std' => 'orange',

			),

			/* Vivi Mag Main Settings panel > Topbar section
			========================================================================== */

			array(

				'title' => esc_html__( 'Topbar section','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the topbar.','vivi-mag'),
				'type' => 'section',
				'id' => 'topbar_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > Left columns option
			*/

			array(

				'label' => esc_html__('Left columns','vivi-mag'),
				'description' => esc_html__('Select the element to show on left column','vivi-mag'),
				'id' => 'vivi_mag_topbar_leftcolumn',
				'type' => 'select',
				'section' => 'topbar_section',
				'options' => array (
					'current_date' => esc_html__( 'Show the current date','vivi-mag'),
					'newsticker' => esc_html__( 'Show the newsticker','vivi-mag'),
					'social_icons' => esc_html__( 'Show the social icons','vivi-mag'),
				 ),
				 'std' => 'newsticker',

			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > Date format option
			*/

			array(

				'label' => esc_html__( 'Date format','vivi-mag'),
				'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">To format the date, please refer to the online documentation for detailed instructions</a>.', 'vivi-mag' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
				'id' => 'vivi_mag_topbar_date_format',
				'type' => 'dateformat',
				'section' => 'topbar_section',
				'std' => 'l, F j Y',

			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > News ticker title option
			*/

			array(

				'label' => esc_html__( 'News ticker title','vivi-mag'),
				'description' => esc_html__( 'Insert the title for the news ticker','vivi-mag'),
				'id' => 'vivi_mag_news_ticker_title',
				'type' => 'text',
				'section' => 'topbar_section',
				'std' => esc_html__( 'HOT', 'vivi-mag'),

			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > News ticker category option
			*/

			array(

				'label' => esc_html__('News ticker category','vivi-mag'),
				'description' => esc_html__('Please select the category of the news ticker','vivi-mag'),
				'id' => 'vivi_mag_news_ticker_category',
				'type' => 'select',
				'section' => 'topbar_section',
				'options' => vivi_mag_get_categories('all'),
				'std' => 'all',

			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > News ticker orderby option
			*/

			array(
				'label' => esc_html__('News ticker orderby','vivi-mag'),
				'description' => esc_html__('How you want to order the articles?','vivi-mag'),
				'id' => 'vivi_mag_news_ticker_order',
				'type' => 'select',
				'section' => 'topbar_section',
				'options' => array (
					'title' => esc_html__( 'Post title','vivi-mag'),
					'rand' => esc_html__( 'Randomly','vivi-mag'),
					'comment_count' => esc_html__( 'Comment count','vivi-mag'),
					'date' => esc_html__( 'Post date','vivi-mag'),
				 ),
				 'std' => 'date',
			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > News ticker sort order option
			*/

			array(
				'label' => esc_html__('News ticker sort order','vivi-mag'),
				'description' => esc_html__('Select the order of the articles','vivi-mag'),
				'id' => 'vivi_mag_news_ticker_sort_order',
				'type' => 'select',
				'section' => 'topbar_section',
				'options' => array (
					'asc' => esc_html__( 'Ascending','vivi-mag'),
					'desc' => esc_html__( 'Descending','vivi-mag'),
				 ),
				 'std' => 'desc',
			),

			/**
			* Vivi Mag Main Settings panel > Topbar section > News ticker limit option
			*/

			array(

				'label' => esc_html__( 'News ticker limit','vivi-mag'),
				'description' => esc_html__( 'Please set the limit of the news ticker','vivi-mag'),
				'id' => 'vivi_mag_news_ticker_limit',
				'type' => 'number',
				'input_attrs' => array(
					'min' => -1,
				),
				'section' => 'topbar_section',
				'std' => '-1',

			),

			/* Vivi Mag Main Settings panel > Recent posts grid section
			========================================================================== */

			array(

				'title' => esc_html__( 'Recent posts grid','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage recent posts grid on the homepage.','vivi-mag'),
				'type' => 'section',
				'id' => 'recent_posts_grid_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Main Settings panel > Recent posts grid section > Recent Posts Grid option
			*/

			array(

				'label' => esc_html__( 'Recent Posts Grid', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to enable the recent posts grid on the homepage?', 'vivi-mag' ),
				'id' => 'vivi_mag_enable_recent_posts',
				'type' => 'checkbox',
				'section' => 'recent_posts_grid_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Recent posts grid section > Recent posts only on the first page of pagination option
			*/

			array(

				'label' => esc_html__( 'Recent posts only on the first page of pagination', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to show the recent posts grid only on the first page of pagination on your homepage? Enable this option to display the recent posts grid exclusively on the first page.', 'vivi-mag' ),
				'id' => 'vivi_mag_enable_recent_posts_only_first_page_pagination',
				'type' => 'checkbox',
				'section' => 'recent_posts_grid_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > Recent posts grid section > Exclude Recent Posts option
			*/

			array(

				'label' => esc_html__( 'Exclude Recent Posts', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to exclude the recent posts from the main homepage article loop (if the recent posts grid is enabled)?', 'vivi-mag' ),
				'id' => 'vivi_mag_exclude_recent_posts_on_loop',
				'type' => 'checkbox',
				'section' => 'recent_posts_grid_section',
				'std' => false,

			),

			/* Vivi Mag Main Settings panel > Trending posts section
			========================================================================== */

			array(

				'title' => esc_html__( 'Trending posts grid','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage trending posts grid on the homepage.','vivi-mag'),
				'type' => 'section',
				'id' => 'trending_posts_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Main Settings panel > Trending posts section > Trending Posts option
			*/

			array(

				'label' => esc_html__( 'Trending Posts', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to enable the trending posts grid on the homepage?', 'vivi-mag' ),
				'id' => 'vivi_mag_enable_trending_posts',
				'type' => 'checkbox',
				'section' => 'trending_posts_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Trending posts grid section > Trending posts only on the first page of pagination option
			*/

			array(

				'label' => esc_html__( 'Trending posts only on the first page of pagination', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to show the trending posts grid only on the first page of pagination on your homepage? Enable this option to display the recent posts grid exclusively on the first page.', 'vivi-mag' ),
				'id' => 'vivi_mag_enable_trending_posts_only_first_page_pagination',
				'type' => 'checkbox',
				'section' => 'trending_posts_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > Trending posts section > Trending posts section title option
			*/

			array(

				'label' => esc_html__( 'Trending posts section title','vivi-mag'),
				'description' => esc_html__( 'Insert the title of trending posts section','vivi-mag'),
				'id' => 'vivi_mag_trending_posts_section_title',
				'type' => 'text',
				'section' => 'trending_posts_section',
				'std' => esc_html__( 'Trending Posts', 'vivi-mag' )

			),

			/**
			* Vivi Mag Main Settings panel > Trending posts section > Trending posts category option
			*/

			array(

				'label' => esc_html__('Trending posts category','vivi-mag'),
				'description' => esc_html__('Please select the category of trending posts section','vivi-mag'),
				'id' => 'vivi_mag_trending_posts_category',
				'type' => 'select',
				'section' => 'trending_posts_section',
				'options' => vivi_mag_get_categories('all'),
				'std' => 'all',

			),

			/**
			* Vivi Mag Main Settings panel > Trending posts section > Trending posts orderby option
			*/

			array(

				'label' => esc_html__('Trending posts orderby','vivi-mag'),
				'description' => esc_html__('Select the icon for WooCommerce header cart (Please clear the cookies to display the new icon)','vivi-mag'),
				'id' => 'vivi_mag_trending_posts_orderby',
				'type' => 'select',
				'section' => 'trending_posts_section',
				'options' => array (
					'ID' => esc_html__( 'ID','vivi-mag'),
					'author' => esc_html__( 'Author','vivi-mag'),
					'title' => esc_html__( 'Post title','vivi-mag'),
					'date' => esc_html__( 'Date','vivi-mag'),
					'comment_count' => esc_html__( 'Number of comments','vivi-mag'),
				 ),
				 'std' => 'comment_count',

			),

			/* Vivi Mag Post Blocks panel
			========================================================================== */

			array(

				'title' => esc_html__( 'Vivi Mag PostBlocks','vivi-mag'),
				'description' => esc_html__( 'Vivi Mag PostBlocks','vivi-mag'),
				'type' => 'panel',
				'id' => 'postblocks_panel',
				'priority' => '15',

			),

			/* Vivi Mag Post Blocks panel > Vivi Mag postBlock 1 section
			========================================================================== */

			array(

				'title' => esc_html__( 'Vivi Mag postBlock 1','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the Vivi Mag postBlock 1','vivi-mag'),
				'type' => 'section',
				'id' => 'vivi_mag_postblock_1',
				'panel' => 'postblocks_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Post Blocks panel > Vivi Mag postBlock 1 section > postBlock 1 category option
			*/

			array(

				'label' => esc_html__('Category','vivi-mag'),
				'description' => esc_html__('Please select the category of this postblock','vivi-mag'),
				'id' => 'vivi_mag_postblock_1_category',
				'type' => 'select',
				'section' => 'vivi_mag_postblock_1',
				'options' => vivi_mag_get_categories('none'),
				'std' => 'none',

			),

			/**
			* Vivi Mag Post Blocks panel > Vivi Mag postBlock 1 section > postBlock 1 hide title option
			*/

			array(

				'label' => esc_html__( 'Category title', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to hide the category title?', 'vivi-mag' ),
				'id' => 'vivi_mag_postblock_1_hide_title',
				'type' => 'checkbox',
				'section' => 'vivi_mag_postblock_1',
				'std' => false,

			),

			/**
			* Vivi Mag Post Blocks panel > Vivi Mag postBlock 1 section > postBlock 1 layout option
			*/

			array(

				'label' => esc_html__( 'Layout','vivi-mag'),
				'description' => esc_html__('Please select the layout of this postblock.','vivi-mag'),
				'id' => 'vivi_mag_postblock_1_layout',
				'type' => 'select',
				'section' => 'vivi_mag_postblock_1',
				'options' => array (
					'disable' => esc_html__( 'Disable','vivi-mag'),
					'module-1' => esc_html__( 'Module 1','vivi-mag'),
					'module-2' => esc_html__( 'Module 2','vivi-mag'),
				),
				'std' => 'disable',
			),

			/* Vivi Mag Post Blocks panel > Vivi Mag postBlock 2 section
			========================================================================== */

			array(

				'title' => esc_html__( 'Vivi Mag postBlock 2','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the Vivi Mag postBlock 2','vivi-mag'),
				'type' => 'section',
				'id' => 'vivi_mag_postblock_2',
				'panel' => 'postblocks_panel',
				'priority' => '14',

			),

			/**
			* Vivi Mag Post Blocks panel > Vivi Mag postBlock 2 section > postBlock 2 category option
			*/

			array(

				'label' => esc_html__('Category','vivi-mag'),
				'description' => esc_html__('Please select the category of this postblock','vivi-mag'),
				'id' => 'vivi_mag_postblock_2_category',
				'type' => 'select',
				'section' => 'vivi_mag_postblock_2',
				'options' => vivi_mag_get_categories('none'),
				'std' => 'none',

			),

			/**
			* Vivi Mag Post Blocks panel > Vivi Mag postBlock 2 section > postBlock 2 hide title option
			*/

			array(

				'label' => esc_html__( 'Category title', 'vivi-mag' ),
				'description' => esc_html__( 'Do you want to hide the category title?', 'vivi-mag' ),
				'id' => 'vivi_mag_postblock_2_hide_title',
				'type' => 'checkbox',
				'section' => 'vivi_mag_postblock_2',
				'std' => false,

			),

			/**
			* Vivi Mag Post Blocks panel > Vivi Mag postBlock 2 section > postBlock 2 layout option
			*/

			array(

				'label' => esc_html__( 'Layout','vivi-mag'),
				'description' => esc_html__('Please select the layout of this postblock.','vivi-mag'),
				'id' => 'vivi_mag_postblock_2_layout',
				'type' => 'select',
				'section' => 'vivi_mag_postblock_2',
				'options' => array (
					'disable' => esc_html__( 'Disable','vivi-mag'),
					'module-1' => esc_html__( 'Module 1','vivi-mag'),
					'module-2' => esc_html__( 'Module 2','vivi-mag'),
				),
				'std' => 'disable',
			),

			/* Vivi Mag Main Settings panel > General settings section
			========================================================================== */

			array(

				'title' => esc_html__( 'General settings','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the general settings of Vivi Mag.','vivi-mag'),
				'type' => 'section',
				'id' => 'settings_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Main Settings panel > General settings section > Scrollable sidebar menu on desktop option
			*/

			array(

				'label' => esc_html__( 'Scrollable sidebar menu on desktop','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the menu within the scrollable sidebar on desktop devices as well?','vivi-mag'),
				'id' => 'vivi_mag_scrollable_menu_on_desktop',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > General settings section > Enable the breadcrumb option
			*/

			array(

				'label' => esc_html__( 'Enable the breadcrumb','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the breadcrumb on whole website (except the homepage)?','vivi-mag'),
				'id' => 'vivi_mag_enable_breadcrumb',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > General settings section > Category title option
			*/

			array(

				'label' => esc_html__( 'Category title','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the category title, under the black container?','vivi-mag'),
				'id' => 'vivi_mag_enable_category_title',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > General settings section > Searched item option
			*/

			array(

				'label' => esc_html__( 'Searched item','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the searched item, under the black container?','vivi-mag'),
				'id' => 'vivi_mag_enable_searched_item',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > General settings section > Back to top button option
			*/

			array(

				'label' => esc_html__( 'Back to top button','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable a button to back on the top of the site?','vivi-mag'),
				'id' => 'vivi_mag_enable_backtotop_button',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			/* Vivi Mag Main Settings panel > Single posts settings section
			========================================================================== */

			array(

				'title' => esc_html__( 'Single posts settings','vivi-mag'),
				'description' => esc_html__( 'From this section, you can manage (show or hide) various elements within individual posts, such as the category, publication date, author, etc.','vivi-mag'),
				'type' => 'section',
				'id' => 'single_posts_settings_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Show categories option
			*/

			array(

				'label' => esc_html__( 'Show categories','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the post categories?','vivi-mag'),
				'id' => 'vivi_mag_enable_post_category',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Show post icon option
			*/

			array(

				'label' => esc_html__( 'Show post icon','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the post icon?','vivi-mag'),
				'id' => 'vivi_mag_enable_post_icon',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Show author option
			*/

			array(

				'label' => esc_html__( 'Show author','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the author name?','vivi-mag'),
				'id' => 'vivi_mag_enable_post_author',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Show date option
			*/

			array(

				'label' => esc_html__( 'Show date','vivi-mag'),
				'description' => esc_html__( 'Do you want to enable the post date?','vivi-mag'),
				'id' => 'vivi_mag_enable_post_date',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Related posts option
			*/

			array(

				'label' => esc_html__( 'Related posts','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the related posts at the end of each article?','vivi-mag'),
				'id' => 'vivi_mag_enable_related_posts',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Post author info box option
			*/

			array(

				'label' => esc_html__( 'Post author info box','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the post author info box below the content? (Important, the biographical info must be added from the user settings)','vivi-mag'),
				'id' => 'vivi_mag_enable_author_info_box',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > Single posts settings section > Post Format option
			*/

			array(

				'label' => esc_html__( 'Post Format','vivi-mag'),
				'description' => esc_html__( 'Do you want to use a different layout for the Aside, Link and Quote posts?','vivi-mag'),
				'id' => 'vivi_mag_enable_post_format_layout',
				'type' => 'checkbox',
				'section' => 'single_posts_settings_section',
				'std' => true,

			),

			/* Vivi Mag Main Settings panel > WooCommerce settings
			========================================================================== */

			array(

				'title' => esc_html__( 'WooCommerce settings','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the settings of WooCommerce.','vivi-mag'),
				'type' => 'section',
				'id' => 'woocommerce_section',
				'panel' => 'general_panel',
				'priority' => '25',

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > WooCommerce header cart option
			*/

			array(

				'label' => esc_html__('WooCommerce header cart','vivi-mag'),
				'description' => esc_html__('Do you want to show the header cart?','vivi-mag'),
				'id' => 'vivi_mag_enable_woocommerce_header_cart',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => true,

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > WooCommerce header cart icon option
			*/

			array(

				'label' => esc_html__('WooCommerce header cart icon','vivi-mag'),
				'description' => esc_html__('Select the icon for WooCommerce header cart (Please clear the cookies to display the new icon)','vivi-mag'),
				'id' => 'vivi_mag_woocommerce_header_icon',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'fa-shopping-basket' => esc_html__( 'Icon 1','vivi-mag'),
				   'fa-shopping-cart' => esc_html__( 'Icon 2','vivi-mag'),
				   'fa-cart-plus' => esc_html__( 'Icon 3','vivi-mag'),
				),
				'std' => 'fa-shopping-basket',

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > Cross sell products option
			*/

			array(

				'label' => esc_html__( 'Cross sell products','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the cross sell products on cart page?','vivi-mag'),
				'id' => 'vivi_mag_enable_woocommerce_cross_sell_cart',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > Related products option
			*/

			array(

				'label' => esc_html__( 'Related products','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the related products on product page?','vivi-mag'),
				'id' => 'vivi_mag_enable_woocommerce_related_products',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > Up sell products option
			*/

			array(

				'label' => esc_html__( 'Up sell products','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the up sell products on product page?','vivi-mag'),
				'id' => 'vivi_mag_enable_woocommerce_upsell_products',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > WooCommerce linkable product thumbnails option
			*/

			array(

				'label' => esc_html__( 'WooCommerce linkable product thumbnails','vivi-mag'),
				'description' => esc_html__( 'Do you want to make linkable the product thumbnails on WooCommerce category pages?','vivi-mag'),
				'id' => 'vivi_mag_enable_woocommerce_linkable_product_thumbnails',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			/**
			* Vivi Mag Main Settings panel > WooCommerce settings section > WooCommerce Category Layout option
			*/

			array(

				'label' => esc_html__('WooCommerce Category Layout','vivi-mag'),
				'description' => esc_html__('Select a layout for the woocommerce categories.','vivi-mag'),
				'id' => 'vivi_mag_woocommerce_category_layout',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','vivi-mag'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','vivi-mag'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','vivi-mag'),
				),

				'std' => 'right-sidebar',

			),

			/* Vivi Mag Featured Links panel
			========================================================================== */

			array(

				'title' => esc_html__( 'Vivi Mag Featured Links','vivi-mag'),
				'description' => esc_html__( 'Vivi Mag Featured Links','vivi-mag'),
				'type' => 'panel',
				'id' => 'featured_links_panel',
				'priority' => '10',

			),

			/* Vivi Mag Featured Links panel > Featured Link Settings section
			========================================================================== */

			array(

				'title' => esc_html__( 'Featured Link Settings','vivi-mag'),
				'description' => esc_html__('Featured Link #1','vivi-mag'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '09',
				'id' => 'featured_links_settings',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link Settings section > Enable the featured links section option
			*/

			array(

				'label' => esc_html__( 'Enable the featured links section','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the featured links section, below the homepage slideshow?','vivi-mag'),
				'id' => 'vivi_mag_enable_featuredlinks_section',
				'type' => 'checkbox',
				'section' => 'featured_links_settings',
				'std' => false,

			),

			/* Vivi Mag Featured Links panel > Featured Link #1 section
			========================================================================== */

			array(

				'title' => esc_html__( 'Featured Link #1','vivi-mag'),
				'description' => esc_html__('Featured Link #1','vivi-mag'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '10',
				'id' => 'featured_link_1',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #1 section > Image option
			*/

			array(

				'label' => esc_html__( 'Image','vivi-mag'),
				'description' => esc_html__( 'Upload the image','vivi-mag'),
				'id' => 'vivi_mag_featured_link_1_image',
				'type' => 'upload',
				'section' => 'featured_link_1',
				'std' => '',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #1 section > Title option
			*/

			array(

				'label' => esc_html__( 'Title','vivi-mag'),
				'description' => esc_html__( 'Insert the title of this slide','vivi-mag'),
				'id' => 'vivi_mag_featured_link_1_title',
				'type' => 'text',
				'section' => 'featured_link_1',
				'std' => '',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #1 section > Url option
			*/

			array(

				'label' => esc_html__( 'Url','vivi-mag'),
				'description' => esc_html__( 'Insert the url of this slide','vivi-mag'),
				'id' => 'vivi_mag_featured_link_1_url',
				'type' => 'url',
				'section' => 'featured_link_1',
				'std' => '',

			),

			/* Vivi Mag Featured Links panel > Featured Link #2 section
			========================================================================== */

			array(

				'title' => esc_html__( 'Featured Link #2','vivi-mag'),
				'description' => esc_html__('Featured Link #2','vivi-mag'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '10',
				'id' => 'featured_link_2',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #2 section > Image option
			*/

			array(

				'label' => esc_html__( 'Image','vivi-mag'),
				'description' => esc_html__( 'Upload the image','vivi-mag'),
				'id' => 'vivi_mag_featured_link_2_image',
				'type' => 'upload',
				'section' => 'featured_link_2',
				'std' => '',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #2 section > Title option
			*/

			array(

				'label' => esc_html__( 'Title','vivi-mag'),
				'description' => esc_html__( 'Insert the title of this slide','vivi-mag'),
				'id' => 'vivi_mag_featured_link_2_title',
				'type' => 'text',
				'section' => 'featured_link_2',
				'std' => '',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #2 section > Url option
			*/

			array(

				'label' => esc_html__( 'Url','vivi-mag'),
				'description' => esc_html__( 'Insert the url of this slide','vivi-mag'),
				'id' => 'vivi_mag_featured_link_2_url',
				'type' => 'url',
				'section' => 'featured_link_2',
				'std' => '',

			),

			/* Vivi Mag Featured Links panel > Featured Link #3 section
			========================================================================== */

			array(

				'title' => esc_html__( 'Featured Link #3','vivi-mag'),
				'description' => esc_html__('Featured Link #3','vivi-mag'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '10',
				'id' => 'featured_link_3',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #3 section > Image option
			*/

			array(

				'label' => esc_html__( 'Image','vivi-mag'),
				'description' => esc_html__( 'Upload the image','vivi-mag'),
				'id' => 'vivi_mag_featured_link_3_image',
				'type' => 'upload',
				'section' => 'featured_link_3',
				'std' => '',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #3 section > Title option
			*/

			array(

				'label' => esc_html__( 'Title','vivi-mag'),
				'description' => esc_html__( 'Insert the title of this slide','vivi-mag'),
				'id' => 'vivi_mag_featured_link_3_title',
				'type' => 'text',
				'section' => 'featured_link_3',
				'std' => '',

			),

			/**
			* Vivi Mag Featured Links panel > Featured Link #3 section > Url option
			*/

			array(

				'label' => esc_html__( 'Url','vivi-mag'),
				'description' => esc_html__( 'Insert the url of this slide','vivi-mag'),
				'id' => 'vivi_mag_featured_link_3_url',
				'type' => 'url',
				'section' => 'featured_link_3',
				'std' => '',

			),

			/* Vivi Mag Main Settings panel > Layouts section
			========================================================================== */

			array(

				'title' => esc_html__( 'Layouts','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the layouts of Vivi Mag.','vivi-mag'),
				'type' => 'section',
				'id' => 'layouts_section',
				'panel' => 'general_panel',
				'priority' => '16',

			),

			/**
			* Vivi Mag Main Settings panel > Layouts section > Menu layout option
			*/

			array(

				'label' => esc_html__('Menu layout','vivi-mag'),
				'description' => esc_html__('Choose a layout for the main menu (only for the desktop devices)','vivi-mag'),
				'id' => 'vivi_mag_menu_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'left_align' => esc_html__( 'Left align','vivi-mag'),
				   'center_align' => esc_html__( 'Center align','vivi-mag'),
				),

				'std' => 'left_align',

			),

			/**
			* Vivi Mag Main Settings panel > Layouts section > Home Blog Layout option
			*/

			array(

				'label' => esc_html__('Home Blog Layout','vivi-mag'),
				'description' => esc_html__('If you&#39;ve set the latest articles, for the homepage, choose a layout.','vivi-mag'),
				'id' => 'vivi_mag_home_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','vivi-mag'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','vivi-mag'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','vivi-mag'),
				   'col-md-4' => esc_html__( 'Masonry','vivi-mag'),
				),

				'std' => 'right-sidebar',

			),

			/**
			* Vivi Mag Main Settings panel > Layouts section > Category Layout option
			*/

			array(

				'label' => esc_html__('Category Layout','vivi-mag'),
				'description' => esc_html__('Select a layout for category pages.','vivi-mag'),
				'id' => 'vivi_mag_category_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','vivi-mag'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','vivi-mag'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','vivi-mag'),
				   'col-md-4' => esc_html__( 'Masonry','vivi-mag'),
				),

				'std' => 'right-sidebar',

			),

			/**
			* Vivi Mag Main Settings panel > Layouts section > Search Layout option
			*/

			array(

				'label' => esc_html__('Search Layout','vivi-mag'),
				'description' => esc_html__('Select a layout for the search section.','vivi-mag'),
				'id' => 'vivi_mag_search_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','vivi-mag'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','vivi-mag'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','vivi-mag'),
				   'col-md-4' => esc_html__( 'Masonry','vivi-mag'),
				),

				'std' => 'right-sidebar',

			),

			/* Vivi Mag Main Settings panel > Social Links and Footer section
			========================================================================== */

			array(

				'title' => esc_html__( 'Social Links and Footer','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the social icons and the copyright text.','vivi-mag'),
				'type' => 'section',
				'id' => 'footer_section',
				'panel' => 'general_panel',
				'priority' => '17',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Copyright Text option
			*/

			array(

				'label' => esc_html__( 'Copyright Text','vivi-mag'),
				'description' => esc_html__( 'Insert your copyright text.','vivi-mag'),
				'id' => 'vivi_mag_copyright_text',
				'type' => 'textarea',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Facebook Url option
			*/

			array(

				'label' => esc_html__( 'Facebook Url','vivi-mag'),
				'description' => esc_html__( 'Insert Facebook Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_facebook_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > X Url option
			*/

			array(

				'label' => esc_html__( 'X Url','vivi-mag'),
				'description' => esc_html__( 'Insert X (Twitter) Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_x_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Flickr Url option
			*/

			array(

				'label' => esc_html__( 'Flickr Url','vivi-mag'),
				'description' => esc_html__( 'Insert Flickr Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_flickr_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Linkedin Url option
			*/

			array(

				'label' => esc_html__( 'Linkedin Url','vivi-mag'),
				'description' => esc_html__( 'Insert Linkedin Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_linkedin_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Slack Url option
			*/

			array(

				'label' => esc_html__( 'Slack Url','vivi-mag'),
				'description' => esc_html__( 'Insert Slack Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_slack_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Pinterest Url option
			*/

			array(

				'label' => esc_html__( 'Pinterest Url','vivi-mag'),
				'description' => esc_html__( 'Insert Pinterest Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_pinterest_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Tumblr Url option
			*/

			array(

				'label' => esc_html__( 'Tumblr Url','vivi-mag'),
				'description' => esc_html__( 'Insert Tumblr Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_tumblr_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Soundcloud Url option
			*/

			array(

				'label' => esc_html__( 'Soundcloud Url','vivi-mag'),
				'description' => esc_html__( 'Insert Soundcloud Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_soundcloud_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Spotify Url option
			*/

			array(

				'label' => esc_html__( 'Spotify Url','vivi-mag'),
				'description' => esc_html__( 'Insert Spotify Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_spotify_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Youtube Url option
			*/

			array(

				'label' => esc_html__( 'Youtube Url','vivi-mag'),
				'description' => esc_html__( 'Insert Youtube Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_youtube_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Vimeo Url option
			*/

			array(

				'label' => esc_html__( 'Vimeo Url','vivi-mag'),
				'description' => esc_html__( 'Insert Vimeo Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_vimeo_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > VK Url option
			*/

			array(

				'label' => esc_html__( 'VK Url','vivi-mag'),
				'description' => esc_html__( 'Insert VK Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_vk_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Instagram Url option
			*/

			array(

				'label' => esc_html__( 'Instagram Url','vivi-mag'),
				'description' => esc_html__( 'Insert Instagram Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_instagram_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Deviantart Url option
			*/

			array(

				'label' => esc_html__( 'Deviantart Url','vivi-mag'),
				'description' => esc_html__( 'Insert Deviantart Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_deviantart_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Github Url option
			*/

			array(

				'label' => esc_html__( 'Github Url','vivi-mag'),
				'description' => esc_html__( 'Insert Github Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_github_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Xing Url option
			*/

			array(

				'label' => esc_html__( 'Xing Url','vivi-mag'),
				'description' => esc_html__( 'Insert Xing Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_xing_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Dribbble Url option
			*/

			array(

				'label' => esc_html__( 'Dribbble Url','vivi-mag'),
				'description' => esc_html__( 'Insert Dribbble Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_dribbble_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Dropbox Url option
			*/

			array(

				'label' => esc_html__( 'Dropbox Url','vivi-mag'),
				'description' => esc_html__( 'Insert Dropbox Url (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_dropbox_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Whatsapp Url option
			*/

			array(

				'label' => esc_html__( 'Whatsapp Number','vivi-mag'),
				'description' => esc_html__( 'Insert Whatsapp number (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_whatsapp_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Telegram Url option
			*/

			array(

				'label' => esc_html__( 'Telegram Account','vivi-mag'),
				'description' => esc_html__( 'Insert Telegram Account (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_telegram_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Trello Url option
			*/

			array(

				'label' => esc_html__( 'Trello Account','vivi-mag'),
				'description' => esc_html__( 'Insert Trello Account (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_trello_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Twitch Url option
			*/

			array(

				'label' => esc_html__( 'Twitch Account','vivi-mag'),
				'description' => esc_html__( 'Insert Twitch Account (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_twitch_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Tripadvisor Url option
			*/

			array(

				'label' => esc_html__( 'Tripadvisor Account','vivi-mag'),
				'description' => esc_html__( 'Insert Tripadvisor Account (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_tripadvisor_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Vine Url option
			*/

			array(

				'label' => esc_html__( 'Vine Account','vivi-mag'),
				'description' => esc_html__( 'Insert Vine Account (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_vine_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),
			
			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Skype Url option
			*/

			array(

				'label' => esc_html__( 'Skype Url','vivi-mag'),
				'description' => esc_html__( 'Insert Skype ID (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_skype_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Email Address option
			*/

			array(

				'label' => esc_html__( 'Email Address','vivi-mag'),
				'description' => esc_html__( 'Insert Email Address (leave empty if you want to hide the button)','vivi-mag'),
				'id' => 'vivi_mag_footer_email_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			/**
			* Vivi Mag Main Settings panel > Social Links and Footer section > Feed Rss Button option
			*/

			array(

				'label' => esc_html__( 'Feed Rss Button','vivi-mag'),
				'description' => esc_html__( 'Do you want to display the Feed Rss button?','vivi-mag'),
				'id' => 'vivi_mag_footer_rss_button',
				'type' => 'select',
				'section' => 'footer_section',
				'options' => array (
				   'off' => esc_html__( 'No','vivi-mag'),
				   'on' => esc_html__( 'Yes','vivi-mag'),
				),

				'std' => 'off',

			),

			/* Vivi Mag Typography panel
			========================================================================== */

			array(

				'title' => esc_html__( 'Vivi Mag Typography','vivi-mag'),
				'description' => esc_html__( 'Vivi Mag Typography','vivi-mag'),
				'type' => 'panel',
				'id' => 'typography_panel',
				'priority' => '11',

			),

			/* Vivi Mag Typography panel > Logo section
			========================================================================== */

			array(

				'title' => esc_html__( 'Logo','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the typography of the logo.','vivi-mag'),
				'type' => 'section',
				'id' => 'logo_section',
				'panel' => 'typography_panel',
				'priority' => '10',

			),

			/**
			* Vivi Mag Typography panel > Logo section > Font size option
			*/

			array(

				'label' => esc_html__( 'Font size','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for logo font (For example, 60px) ','vivi-mag'),
				'id' => 'vivi_mag_logo_font_size',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '70px',

			),

			/**
			* Vivi Mag Typography panel > Logo section > Description font size option
			*/

			array(

				'label' => esc_html__( 'Description font size','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for logo description (For example, 14px) ','vivi-mag'),
				'id' => 'vivi_mag_logo_description_font_size',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '14px',

			),

			/**
			* Vivi Mag Typography panel > Logo section > Description top margin option
			*/

			array(

				'label' => esc_html__( 'Description top margin','vivi-mag'),
				'description' => esc_html__( 'Add a space between the logo and the description (For example, 15px) ','vivi-mag'),
				'id' => 'vivi_mag_logo_description_top_margin',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '20px',

			),

			/**
			* Vivi Mag Typography panel > Logo section > Weight option
			*/

			array(

				'label' => esc_html__('Weight','vivi-mag'),
				'description' => esc_html__('Choose a font weight for the logo.','vivi-mag'),
				'id' => 'vivi_mag_logo_font_weight',
				'type' => 'select',
				'section' => 'logo_section',
				'options' => array(
					'100' => esc_html__( '100','vivi-mag'),
					'200' => esc_html__( '200','vivi-mag'),
					'300' => esc_html__( '300','vivi-mag'),
					'400' => esc_html__( '400','vivi-mag'),
					'500' => esc_html__( '500','vivi-mag'),
					'600' => esc_html__( '600','vivi-mag'),
					'700' => esc_html__( '700','vivi-mag'),
					'800' => esc_html__( '800','vivi-mag'),
					'900' => esc_html__( '900','vivi-mag'),
				),

				'std' => '500',

			),

			/**
			* Vivi Mag Typography panel > Logo section > Text transform option
			*/

			array(

				'label' => esc_html__('Text transform','vivi-mag'),
				'description' => esc_html__('Do you want to display an uppercase logo?.','vivi-mag'),
				'id' => 'vivi_mag_logo_text_transform',
				'type' => 'select',
				'section' => 'logo_section',
				'options' => array(
					'none' => esc_html__( 'None','vivi-mag'),
					'uppercase' => esc_html__( 'Uppercase','vivi-mag'),
				),

				'std' => 'none',

			),

			/* Vivi Mag Typography panel > Menu section
			========================================================================== */

			array(

				'title' => esc_html__( 'Menu','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the typography of the menu.','vivi-mag'),
				'type' => 'section',
				'id' => 'menu_section',
				'panel' => 'typography_panel',
				'priority' => '11',

			),

			/**
			* Vivi Mag Typography panel > Menu section > Font size option
			*/

			array(

				'label' => esc_html__( 'Font size','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for menu font (For example, 14px) ','vivi-mag'),
				'id' => 'vivi_mag_menu_font_size',
				'type' => 'pixel_size',
				'section' => 'menu_section',
				'std' => '16px',

			),

			/**
			* Vivi Mag Typography panel > Menu section > Menu weight option
			*/

			array(

				'label' => esc_html__('Menu weight','vivi-mag'),
				'description' => esc_html__('Choose a font weight for the menu.','vivi-mag'),
				'id' => 'vivi_mag_menu_font_weight',
				'type' => 'select',
				'section' => 'menu_section',
				'options' => array(
					'100' => esc_html__( '100','vivi-mag'),
					'200' => esc_html__( '200','vivi-mag'),
					'300' => esc_html__( '300','vivi-mag'),
					'400' => esc_html__( '400','vivi-mag'),
					'500' => esc_html__( '500','vivi-mag'),
					'600' => esc_html__( '600','vivi-mag'),
					'700' => esc_html__( '700','vivi-mag'),
					'800' => esc_html__( '800','vivi-mag'),
					'900' => esc_html__( '900','vivi-mag'),
				),

				'std' => '400',

			),

			/**
			* Vivi Mag Typography panel > Menu section > Text transform option
			*/

			array(

				'label' => esc_html__('Text transform','vivi-mag'),
				'description' => esc_html__('Do you want to display an uppercase menu?.','vivi-mag'),
				'id' => 'vivi_mag_menu_text_transform',
				'type' => 'select',
				'section' => 'menu_section',
				'options' => array(
					'none' => esc_html__( 'None','vivi-mag'),
					'uppercase' => esc_html__( 'Uppercase','vivi-mag'),
				),

				'std' => 'none',

			),

			/* Vivi Mag Typography panel > Content section
			========================================================================== */

			array(

				'title' => esc_html__( 'Content','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the typography of the content.','vivi-mag'),
				'type' => 'section',
				'id' => 'content_section',
				'panel' => 'typography_panel',
				'priority' => '12',

			),

			/**
			* Vivi Mag Typography panel > Content section > Font size option
			*/

			array(

				'label' => esc_html__( 'Font size','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for content font (For example, 14px) ','vivi-mag'),
				'id' => 'vivi_mag_content_font_size',
				'type' => 'pixel_size',
				'section' => 'content_section',
				'std' => '14px',

			),

			/* Vivi Mag Typography panel > Headlines section
			========================================================================== */

			array(

				'title' => esc_html__( 'Headlines','vivi-mag'),
				'description' => esc_html__( 'From this section you can manage the typography of the headlines.','vivi-mag'),
				'type' => 'section',
				'id' => 'headlines_section',
				'panel' => 'typography_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > H1 headline option
			*/

			array(

				'label' => esc_html__( 'H1 headline','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for for H1 elements (For example, 24px) ','vivi-mag'),
				'id' => 'vivi_mag_h1_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '24px',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > H2 headline option
			*/

			array(

				'label' => esc_html__( 'H2 headline','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for for H2 elements (For example, 22px) ','vivi-mag'),
				'id' => 'vivi_mag_h2_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '22px',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > H3 headline option
			*/

			array(

				'label' => esc_html__( 'H3 headline','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for for H3 elements (For example, 20px) ','vivi-mag'),
				'id' => 'vivi_mag_h3_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '20px',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > H4 headline option
			*/

			array(

				'label' => esc_html__( 'H4 headline','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for for H4 elements (For example, 18px) ','vivi-mag'),
				'id' => 'vivi_mag_h4_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '18px',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > H5 headline option
			*/

			array(

				'label' => esc_html__( 'H5 headline','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for for H5 elements (For example, 16px) ','vivi-mag'),
				'id' => 'vivi_mag_h5_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '16px',

			),
			
			/**
			* Vivi Mag Typography panel > Headlines section > H6 headline option
			*/

			array(

				'label' => esc_html__( 'H6 headline','vivi-mag'),
				'description' => esc_html__( 'Insert a size, for for H6 elements (For example, 14px) ','vivi-mag'),
				'id' => 'vivi_mag_h6_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '14px',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > Titles weight option
			*/

			array(

				'label' => esc_html__('Titles weight','vivi-mag'),
				'description' => esc_html__('Choose a font weight for the titles.','vivi-mag'),
				'id' => 'vivi_mag_titles_font_weight',
				'type' => 'select',
				'section' => 'headlines_section',
				'options' => array(
					'100' => esc_html__( '100','vivi-mag'),
					'200' => esc_html__( '200','vivi-mag'),
					'300' => esc_html__( '300','vivi-mag'),
					'400' => esc_html__( '400','vivi-mag'),
					'500' => esc_html__( '500','vivi-mag'),
					'600' => esc_html__( '600','vivi-mag'),
					'700' => esc_html__( '700','vivi-mag'),
					'800' => esc_html__( '800','vivi-mag'),
					'900' => esc_html__( '900','vivi-mag'),
				),

				'std' => '600',

			),

			/**
			* Vivi Mag Typography panel > Headlines section > Text transform option
			*/

			array(

				'label' => esc_html__('Text transform','vivi-mag'),
				'description' => esc_html__('Do you want to display an uppercase title?.','vivi-mag'),
				'id' => 'vivi_mag_titles_text_transform',
				'type' => 'select',
				'section' => 'headlines_section',
				'options' => array(
					'none' => esc_html__( 'None','vivi-mag'),
					'uppercase' => esc_html__( 'Uppercase','vivi-mag'),
				),

				'std' => 'none',

			),

			/* Vivi Mag Typography panel > Post meta section
			========================================================================== */

			array(

				'title' => esc_html__( 'Post meta','vivi-mag'),
				'description' => esc_html__( 'From this section, you can manage the typography of the post meta.','vivi-mag'),
				'type' => 'section',
				'id' => 'postmeta_section',
				'panel' => 'typography_panel',
				'priority' => '13',

			),

			/**
			* Vivi Mag Typography panel > Post meta section > Font size option
			*/

			array(

				'label' => esc_html__( 'Font size','vivi-mag'),
				'description' => esc_html__( 'Insert a size for the post meta (e.g., 11px)','vivi-mag'),
				'id' => 'vivi_mag_postmeta_font_size',
				'type' => 'pixel_size',
				'section' => 'postmeta_section',
				'std' => '11px',

			),

			/**
			* Vivi Mag Typography panel > Post meta section > Text transform option
			*/

			array(

				'label' => esc_html__('Text transform','vivi-mag'),
				'description' => esc_html__('Do you want to display the post meta in uppercase?','vivi-mag'),
				'id' => 'vivi_mag_postmeta_text_transform',
				'type' => 'select',
				'section' => 'postmeta_section',
				'options' => array(
					'none' => esc_html__( 'None','vivi-mag'),
					'uppercase' => esc_html__( 'Uppercase','vivi-mag'),
				),

				'std' => 'uppercase',

			),

		);

		new vivi_mag_customize($theme_panel);

	}

	add_action( 'vivi_mag_customize_panel', 'vivi_mag_customize_panel_function' );

}

do_action('vivi_mag_customize_panel');

?>
