<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

define( 'VIVI_MAG_MIN_PHP_VERSION', '5.3' );

/*-----------------------------------------------------------------------------------*/
/* Switches back to the previous theme if the minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'vivi_mag_check_php_version' ) ) {

	function vivi_mag_check_php_version() {

		if ( version_compare( PHP_VERSION, VIVI_MAG_MIN_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', 'vivi_mag_min_php_not_met_notice' );
			switch_theme( get_option( 'theme_switched' ));
			return false;

		};
	}

	add_action( 'after_switch_theme', 'vivi_mag_check_php_version' );

}

/*-----------------------------------------------------------------------------------*/
/* An error notice that can be displayed if the Minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'vivi_mag_min_php_not_met_notice' ) ) {

	function vivi_mag_min_php_not_met_notice() {
		?>
		<div class="notice notice-error is_dismissable">
			<p>
				<?php esc_html_e('You need to update your PHP version to run this theme.', 'vivi-mag' ); ?><br />
				<?php
				printf(
					esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'vivi-mag' ),
					PHP_VERSION,
					VIVI_MAG_MIN_PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php

	}

}

/*-----------------------------------------------------------------------------------*/
/* WooCommerce is active */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'vivi_mag_is_woocommerce_active' ) ) {

	function vivi_mag_is_woocommerce_active( $type = '' ) {

        global $woocommerce;

        if ( isset( $woocommerce ) ) {

			if ( !$type || call_user_func($type) ) {

				return true;

			}

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'vivi_mag_comments' ) ) {

	function vivi_mag_comments($comment, $args, $depth) {

	?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

		<div id="comment-<?php comment_ID(); ?>" class="comment-container">

			<div class="comment-avatar">
				<?php echo get_avatar($comment->comment_author_email, 80 ); ?>
			</div>

			<div class="comment-text">

            	<header class="comment-author">

                    <span class="author"><cite><?php printf( esc_html__('%s has written:','vivi-mag'), get_comment_author_link());?> </cite></span>

                    <time datetime="<?php echo esc_attr(get_comment_date())?>" class="comment-date">

                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
                            <?php printf(esc_html__('%1$s at %2$s','vivi-mag'), get_comment_date(),  get_comment_time()) ?>
                        </a>

                        <?php

							comment_reply_link(
								array_merge(
									$args,
									array(
										'depth' => $depth,
										'max_depth' => $args['max_depth']
									)
								)
							);

							edit_comment_link(esc_html__('(Edit)','vivi-mag'));

						?>

                    </time>

				</header>

				<?php if ($comment->comment_approved == '0') : ?>

                    <p><em><?php esc_html_e('Your comment is awaiting approval.','vivi-mag') ?></em></p>

				<?php endif; ?>

				<?php comment_text() ?>

			</div>

			<div class="clear"></div>

		</div>

	<?php

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get archive title */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_get_the_archive_title')) {

	function vivi_mag_get_archive_title() {

		if ( is_category() ) {
			$title = sprintf( esc_html__( 'Category: %s', 'vivi-mag' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( esc_html__( 'Tag: %s', 'vivi-mag' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( esc_html__( 'Author: %s', 'vivi-mag' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( 'Year: %s', 'vivi-mag' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'vivi-mag' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( esc_html__( 'Month: %s', 'vivi-mag' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'vivi-mag' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( 'Day: %s', 'vivi-mag' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'vivi-mag' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', 'vivi-mag' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', 'vivi-mag' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( esc_html__( 'Archives: %s', 'vivi-mag' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title = sprintf( esc_html__( '%1$s: %2$s', 'vivi-mag' ), $tax->labels->singular_name, single_term_title( '', false ) );
		}

		if ( isset($title) )  :
			return $title;
		else:
			return false;
		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Check if is single page */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_is_single')) {

	function vivi_mag_is_single() {

		if ( is_single() || is_page() ) :

			return true;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get theme setting */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_setting')) {

	function vivi_mag_setting($id, $default = FALSE ) {

		return get_theme_mod($id, $default);

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get post meta */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_postmeta')) {

	function vivi_mag_postmeta( $id, $default = '' ) {

		global $post, $wp_query;

		if (vivi_mag_is_woocommerce_active('is_shop')) :

			$content_ID = get_option('woocommerce_shop_page_id');

		else :

			$content_ID = (isset($post->ID)) ? $post->ID : false;

		endif;

		$val = get_post_meta( $content_ID , $id, TRUE);

		if ( !empty($val) ) :

			return $val;

		else:

			return $default;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Add Skype on allowed protocols */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_kses_allowed_protocols')) {

	function vivi_mag_kses_allowed_protocols($protocols) {

		$protocols[] = 'skype';
		return $protocols;

	}

	add_filter( 'kses_allowed_protocols', 'vivi_mag_kses_allowed_protocols');

}

/*-----------------------------------------------------------------------------------*/
/* Responsive embed */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_embed_html')) {

	function vivi_mag_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}

	add_filter( 'embed_oembed_html', 'vivi_mag_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'vivi_mag_embed_html' );

}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_template')) {

	function vivi_mag_template($id) {

		$template = array (

			'full' => 'col-md-12' ,
			'left-sidebar' => 'col-md-8' ,
			'right-sidebar' => 'col-md-8'

		);

		$span = $template['right-sidebar'];
		$sidebar =  'right-sidebar';

		if (
			vivi_mag_is_woocommerce_active('is_woocommerce') &&
			vivi_mag_postmeta('vivi_mag_template') &&
			is_search()
		) {

			$span = $template[esc_attr(vivi_mag_postmeta('vivi_mag_template'))];
			$sidebar =  esc_attr(vivi_mag_postmeta('vivi_mag_template'));

		} elseif (
			!is_attachment() &&
			vivi_mag_postmeta('vivi_mag_template') &&
			(is_page() || is_single() || vivi_mag_is_woocommerce_active('is_shop'))
		) {

			$span = $template[esc_attr(vivi_mag_postmeta('vivi_mag_template'))];
			$sidebar =  esc_attr(vivi_mag_postmeta('vivi_mag_template'));

		} elseif (
			!vivi_mag_is_woocommerce_active('is_woocommerce') &&
			( is_category() || is_tag() || is_month() ) &&
			vivi_mag_setting('vivi_mag_category_layout')
		) {

			$span = $template[esc_attr(vivi_mag_setting('vivi_mag_category_layout'))];
			$sidebar =  esc_attr(vivi_mag_setting('vivi_mag_category_layout'));

		} elseif (
			is_home() &&
			vivi_mag_setting('vivi_mag_home_layout')
		) {

			$span = $template[esc_attr(vivi_mag_setting('vivi_mag_home_layout'))];
			$sidebar =  esc_attr(vivi_mag_setting('vivi_mag_home_layout'));

		} else if (
			!vivi_mag_is_woocommerce_active('is_woocommerce') &&
			is_search() &&
			vivi_mag_setting('vivi_mag_search_layout')
		) {

			$span = $template[esc_attr(vivi_mag_setting('vivi_mag_search_layout'))];
			$sidebar =  esc_attr(vivi_mag_setting('vivi_mag_search_layout'));

		} else if (
			vivi_mag_is_woocommerce_active('is_woocommerce') &&
			( vivi_mag_is_woocommerce_active('is_product_category') || vivi_mag_is_woocommerce_active('is_product_tag') ) &&
			vivi_mag_setting('vivi_mag_woocommerce_category_layout')
		) {

			$span = $template[esc_attr(vivi_mag_setting('vivi_mag_woocommerce_category_layout'))];
			$sidebar =  esc_attr(vivi_mag_setting('vivi_mag_woocommerce_category_layout'));

		} elseif ( is_attachment() ) {

			$span = $template['full'];
			$sidebar =  'full';

		}

		return ${$id};

	}

}

/*-----------------------------------------------------------------------------------*/
/* Is archive */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_is_archive')) {

	function vivi_mag_is_archive() {

		if (
			is_category() ||
			is_tag() ||
			is_author() ||
			is_year() ||
			is_month()

		) {

			return true;

		} else {

			return false;

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASSES */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_body_classes_function')) {

	function vivi_mag_body_classes_function($classes) {

		global $wp_customize;

		if ( isset( $wp_customize ) ) :

			$classes[] = 'is_customizer_panel';

		endif;

		if (
			( is_home() ) ||
			( vivi_mag_is_archive() ) ||
			( is_search() )
		) :

			$classes[] = 'is_blog_section';

		endif;

		if (
			( 
				!get_background_image() &&
				get_theme_mod('background_color','ffffff') == 'ffffff'
			)
		) :

			$classes[] = 'is_minimal_layout';

		endif;
		
		if (
			( get_theme_mod('vivi_mag_scrollable_menu_on_desktop', false) == false )
		) :

			$classes[] = 'hide_scrollable_menu_on_desktop';

		endif;

		return $classes;

	}

	add_filter('body_class', 'vivi_mag_body_classes_function');

}

/*-----------------------------------------------------------------------------------*/
/* Post class */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_post_class')) {

	function vivi_mag_post_class($classes) {

		$masonry  = 'post-container masonry-item col-md-4';
		$standard = 'post-container col-md-12';

		if ( !vivi_mag_is_single() ) {

			if ( is_home() ) {

				if ( 
					vivi_mag_setting('vivi_mag_home_layout') == 'col-md-4'
				) {

					$classes[] = $masonry;

				} else {

					$classes[] = $standard;

				}

			} else if ( is_archive() && !vivi_mag_is_woocommerce_active('is_shop') ) {

				if ( vivi_mag_setting('vivi_mag_category_layout') == 'col-md-4' ) {

					$classes[] = $masonry;

				} else {

					$classes[] = $standard;

				}

			} else if ( is_search() ) {

				if ( vivi_mag_setting('vivi_mag_search_layout') == 'col-md-4' ) {

					$classes[] = $masonry;

				} else {

					$classes[] = $standard;

				}

			}

		} else if ( vivi_mag_is_single() && vivi_mag_is_woocommerce_active('is_cart') ) {

			$classes[] = 'post-container col-md-12 woocommerce_cart_page';

		} else if ( vivi_mag_is_single() && !vivi_mag_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		} else if ( is_page() ) {

			$classes[] = 'full';

		}

		if (
			( is_home() ) ||
			( vivi_mag_is_archive() ) ||
			( is_search() )
		) :

			$classes[] = 'post-container-wrap';

		endif;

		return $classes;

	}

	add_filter('post_class', 'vivi_mag_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* Get paged */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_paged')) {

	function vivi_mag_paged() {

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		return $paged;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Swipebox post gallery */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_swipebox')) {

	function vivi_mag_swipebox($html, $id, $size, $permalink, $icon, $text) {

		if ( !$permalink )
			return str_replace( '<a', '<a class="swipebox"', $html );
		else
			return $html;
	}

	add_filter( 'wp_get_attachment_link', 'vivi_mag_swipebox', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Get link url  */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_get_link_url')) {

	function vivi_mag_get_link_url() {

		$content = get_the_content();
		$has_url = get_url_in_content( $content );
		return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );

	}

}

/*-----------------------------------------------------------------------------------*/
/* Excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_hide_excerpt_more')) {

	function vivi_mag_hide_excerpt_more() {
		return '';
	}

	add_filter('the_content_more_link', 'vivi_mag_hide_excerpt_more');
	add_filter('excerpt_more', 'vivi_mag_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* Get post icon */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_posticon')) {

	function vivi_mag_posticon() {
		
		$html = '';

		$icons = array (
			'video' => 'fa fa-play' , 
			'gallery' => 'fa fa-camera' , 
			'audio' => 'fa fa-volume-up' , 
			'chat' => 'fa fa-users', 
			'status' => 'fa fa-keyboard-o', 
			'image' => 'fa fa-picture-o' ,
			'quote' => 'fa fa-quote-left', 
			'link' => 'fa fa-external-link', 
			'aside' => 'fa fa-file-text-o', 
		);

		if ( get_post_format() ) { 
		
			$html .= '<i class="'.esc_attr($icons[get_post_format()]).'"></i> '; 
			$html .= ucfirst( strtolower( esc_html(get_post_format()) )); 
		
		} else {
		
			$html .= '<i class="fa fa-pencil-square"></i> '; 
			$html .= esc_html__( 'Article','vivi-mag'); 
		
		}

		return $html;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_scripts_styles')) {

	function vivi_mag_scripts_styles() {

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Work+Sans:100,200,300,400,500,600,700,800,900|Roboto+Slab:100,200,300,400,500,600,700,800,900'),
			'subset' =>	'latin,latin-ext'
		);

		wp_enqueue_style('dashicons');
		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '3.3.7' );
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0' );
		wp_enqueue_style('swipebox', get_template_directory_uri() . '/assets/css/swipebox.css', array(), '1.3.0' );
		wp_enqueue_style('vivi-mag-style', get_stylesheet_uri(), array() );
		wp_enqueue_style('vivi-mag-woocommerce', get_template_directory_uri() . '/assets/css/vivi-mag-woocommerce.css', array(), '1.0.0' );

		wp_enqueue_style(
			'vivi-mag-' . esc_attr(get_theme_mod('vivi_mag_skin', 'orange')),
			get_template_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('vivi_mag_skin', 'orange')) . '.css',
			array( 'vivi-mag-style' ),
			'1.0.0'
		);

		wp_enqueue_script( 'vivi-mag-navigation', get_template_directory_uri() . '/assets/js/navigation.js' , array('jquery'), '1.0', TRUE );

		wp_localize_script( 'vivi-mag-navigation', 'accessibleNavigationScreenReaderText', array(
			'expandMain'   => __( 'Open the main menu', 'vivi-mag' ),
			'collapseMain' => __( 'Close the main menu', 'vivi-mag' ),
			'expandChild'   => __( 'expand submenu', 'vivi-mag' ),
			'collapseChild' => __( 'collapse submenu', 'vivi-mag' ),
		));

		wp_enqueue_script(
			'jquery.ticker',
			get_template_directory_uri() . '/assets/js/jquery.ticker.js',
			array('jquery'),
			'1.2.1',
			TRUE
		);

		wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js' , array('jquery'), '1.3', TRUE );
		wp_enqueue_script('jquery-nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.js' , array('jquery'), '3.7.6', TRUE );
		wp_enqueue_script('jquery-swipebox', get_template_directory_uri() . '/assets/js/jquery.swipebox.js' , array('jquery'), '1.4.4', TRUE );
		wp_enqueue_script('jquery-touchSwipe', get_template_directory_uri() . '/assets/js/jquery.touchSwipe.js' , array('jquery'), '1.6.18', TRUE );
		wp_enqueue_script('fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js' , array('jquery'), '1.1', TRUE );
		wp_enqueue_script('vivi-mag-template',get_template_directory_uri() . '/assets/js/vivi-mag-template.js',array('jquery', 'imagesloaded', 'masonry'), '1.0.0', TRUE );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		wp_enqueue_script('html5shiv', get_template_directory_uri().'/assets/scripts/html5shiv.js', FALSE, '3.7.3');
		wp_script_add_data('html5shiv', 'conditional', 'IE 8' );
		wp_enqueue_script('selectivizr', get_template_directory_uri().'/assets/scripts/selectivizr.js', FALSE, '1.0.3b');
		wp_script_add_data('selectivizr', 'conditional', 'IE 8' );

	}

	add_action( 'wp_enqueue_scripts', 'vivi_mag_scripts_styles' );

}

/*-----------------------------------------------------------------------------------*/
/* Theme setup */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_setup')) {

	function vivi_mag_setup() {

		global $content_width;

		if ( !isset($content_width) )
			$content_width = 1170;

		load_theme_textdomain( 'vivi-mag', get_template_directory() . '/languages');

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo');

		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
		));

		add_image_size( 'vivi_mag_blog_thumbnail', 790, 550, TRUE );

		add_image_size( 'vivi_mag_recent_post_large', 535, 375, TRUE );
		add_image_size( 'vivi_mag_recent_post_small', 268, 195, TRUE );

		add_image_size( 'vivi_mag_trending_image', 185, 125, TRUE );

		add_image_size( 'vivi_mag_small_image', 120, 100, TRUE ); 
		add_image_size( 'vivi_mag_medium_image', 600, 396, TRUE ); 
		add_image_size( 'vivi_mag_large_image', 700, 611, TRUE ); 

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'vivi-mag' )
		));

		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/aside-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/default-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/image-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/link-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/page-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/product-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/quote-format.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/post/related-post.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post/main-article.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post/small-article.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post/hero-article.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/modules/module-1.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/modules/module-2.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/templates/after-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/before-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/footer.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/masonry.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/media.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/news-ticker.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/pagination.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-author.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-blocks.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-formats.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/related-posts.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/top-section.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/bottom-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/footer-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/header-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/scroll-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/side-sidebar.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-metaboxes.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-notice.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-plugin-activation.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-welcome-page.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/customize.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-required-plugins.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-style.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-widgets.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-woocommerce.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/page.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/post.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/product.php' );


	}

	add_action( 'after_setup_theme', 'vivi_mag_setup' );

}

/*-----------------------------------------------------------------------------------*/
/* Exclude featured posts on homepage */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_exclude_recent_posts_on_home')) {

	function vivi_mag_exclude_recent_posts_on_home(&$query) {

		if (
			$query->is_home() &&
			$query->is_main_query() &&
			(
				vivi_mag_setting('vivi_mag_enable_recent_posts', true) == true &&
				vivi_mag_setting('vivi_mag_exclude_recent_posts_on_loop', false) == true
			)
		) {

			$offset = 9;

			$ppp = get_option('posts_per_page');

			if ( $query->is_paged ) {

				$page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );
				$query->set('offset', $page_offset );

			}
			else {
				$query->set('offset',$offset);
			}

		}

	}

	add_action('pre_get_posts', 'vivi_mag_exclude_recent_posts_on_home', 1 );

}

/*-----------------------------------------------------------------------------------*/
/* Adjust offset pagination */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_adjust_offset_pagination')) {

	function vivi_mag_adjust_offset_pagination($found_posts, $query) {

		$offset = 9;

		if (
			$query->is_home() &&
			$query->is_main_query() &&
			(
				vivi_mag_setting('vivi_mag_enable_recent_posts', true) == true &&
				vivi_mag_setting('vivi_mag_exclude_recent_posts_on_loop', false) == true
			)
		) {
					return $found_posts - $offset;
		}

		return $found_posts;

	}

	add_filter('found_posts', 'vivi_mag_adjust_offset_pagination', 1, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* Get categories */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('vivi_mag_get_categories')) {

	function vivi_mag_get_categories($first_element = 'none') {

		if ( $first_element == 'none') {
			$return['none'] = esc_attr__( 'None','vivi-mag');
		} else {
			$return['all'] = esc_attr__( 'All categories','vivi-mag');
		}

		$args = array(
			'taxonomy' => 'category',
			'hide_empty' => true,
		);

		foreach ( get_terms($args) as $cat) {
			$return[$cat->term_id] = $cat->name;
		}
		
		return $return;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get current date */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_get_current_date')) {

	function vivi_mag_get_current_date() {

			$date_format = esc_attr(vivi_mag_setting('vivi_mag_topbar_date_format', 'l, F j Y'));

			if(strtotime(wp_date($date_format))){
				$current_date = wp_date($date_format);
			} else {
				$current_date = wp_date('l, F j Y');
			}

			return $current_date;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get topbar left column */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('vivi_mag_get_topbar_leftcolumn')) {

	function vivi_mag_get_topbar_leftcolumn() {

			$html = '';

			$leftcolumn = vivi_mag_setting('vivi_mag_topbar_leftcolumn', 'newsticker');

			switch ($leftcolumn) {

				case 'social_icons':
					$html = vivi_mag_get_social_icons();
				break;
				
				case 'current_date':
					$html = esc_html(vivi_mag_get_current_date());
				break;

				default :
				case 'newsticker':
					$html = vivi_mag_get_newsticker();
				break;
			
			}

			$htmlLength = strlen($html);

			return ($htmlLength > 0) ? '<div class="topbar-left-column">' . $html . '</div>' : '';

	}

}

?>
