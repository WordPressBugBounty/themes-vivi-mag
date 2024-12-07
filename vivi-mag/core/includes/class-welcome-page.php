<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'vivi_mag_welcome' ) ) {

	class vivi_mag_welcome {

		public $theme_fields;

		public function __construct( $fields = array() ) {

			$this->theme_fields = $fields;

			add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
			add_action('admin_menu',array( &$this, 'welcome_page_menu'));

		}

		public function admin_scripts() {

			global $pagenow;

			$file_dir = get_template_directory_uri() . '/core/admin/assets/';

			if ( $pagenow == 'themes.php' && isset($_GET['page']) && $_GET['page'] == 'vivi-mag-welcome-page') {

				wp_enqueue_style (
					'vivi-mag-welcome-page-style',
					$file_dir . 'css/welcome-page.css',
					array(), '1.0.0'
				);

				wp_enqueue_script (
					'vivi-mag-welcome-page-functions',
					$file_dir . 'js/welcome-page.js',
					array('jquery'),
					'1.0.0',
					TRUE
				);

			}

		}

    public function theme_info($id, $screenshot = false) {

		$themedata = wp_get_theme();
        return ($screenshot == true) ? $themedata->get_screenshot() : $themedata->get($id);

    }

    public function welcome_page_menu() {

			add_theme_page(
                sprintf(esc_html__('About %1$s', 'vivi-mag'), $this->theme_info('Name')),
				sprintf(esc_html__('About %1$s', 'vivi-mag'), $this->theme_info('Name')),
				'edit_theme_options',
				'vivi-mag-welcome-page',
				array( &$this, 'welcome_page' )
			);

		}

		public function check_installed_plugin($slug, $filename) {
			return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
		}

		private function call_plugin_api( $slug ) {

			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

			$call_api = get_transient( 'vivi_mag_plugin_info_' . $slug );

			if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information',
					array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
							'banners'           => true,
						),
					)
				);
				set_transient( 'vivi_mag_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}

        public function welcome_page() {

            $tabs = array(
                'getting_started' => esc_html__('Getting Started', 'vivi-mag'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'vivi-mag'),
                'free_pro' => esc_html__('Free VS Pro', 'vivi-mag'),
                'changelog' => esc_html__('Changelog', 'vivi-mag'),
                'support' => esc_html__('Support', 'vivi-mag'),
            );

        ?>

            <div class="wrap about-wrap access-wrap">

                <div class="abt-promo-wrap clearfix">

                    <div class="abt-theme-wrap">

                      <h1>
                        <?php
                          printf(
                            esc_html__('Welcome to %1$s - Version %2$s', 'vivi-mag'),
                            $this->theme_info('Name'),
                            $this->theme_info('Version')
                          );
                        ?>
                      </h1>

                      <div class="theme-details">

                        <div class="theme-screenshot">
                            <img src="<?php echo esc_url($this->theme_info('Screenshot', true)); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'vivi-mag' ); ?>"/>
                        </div>

                        <div class="about-text"><?php echo $this->theme_info('Description'); ?></div>

                        <div class="clearfix"></div>

                      </div>

                    </div>

                </div>

                <div class="nav-tab-wrapper clearfix">

					<?php

						$tabHTML = '';

						foreach ($tabs as $id => $label) :

							$target = '';
							$nav_class = 'nav-tab';
							$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started';

              if ($id == $section) {
								$nav_class .= ' nav-tab-active';
							}

							if ($id == 'free_pro') {
								$nav_class .= ' upgrade-button';
							}

							switch ($id) {

								case 'support':
									$target = 'target="_blank"';
                  $url = esc_url('https://wordpress.org/support/theme/'.$this->theme_info('TextDomain'));
								break;

								case 'getting_started':
									$url = esc_url(admin_url('themes.php?page=vivi-mag-welcome-page'));
								break;

								default:
									$url = esc_url(admin_url('themes.php?page=vivi-mag-welcome-page&section=' . $id));
								break;

							}

							$tabHTML .= '<a ';
							$tabHTML .= $target;
							$tabHTML .= ' href="' . $url. '"';
							$tabHTML .= ' class="' . esc_attr($nav_class). '"';
							$tabHTML .= '>';
							$tabHTML .= esc_html($label);
							$tabHTML .= '</a>';

						endforeach;

						echo $tabHTML;

					?>

                </div>

                <div class="welcome-section-wrapper">

                    <div class="welcome-section getting_started clearfix">

                    	<?php

							$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started';

							switch ($section) {

								case 'free_pro':
									$this->free_pro();
								break;

								case 'recommended_plugins':
									$this->recommended_plugins();
								break;

								case 'changelog':
									$this->changelog();
								break;

								case 'getting_started':
								default:
									$this->getting_started();
								break;

							}

						?>

                    </div>

                </div>

            </div>

		<?php

		}

		public function quick_links() {

			return array(
				array (
					'text' => esc_html__('Upload logo', 'vivi-mag'),
					'link' => add_query_arg( [ 'autofocus[control]' => 'custom_logo' ], admin_url( 'customize.php' ))
				),
				array (
					'text' => esc_html__('PostBlocks', 'vivi-mag'),
					'link' => add_query_arg(['autofocus[panel]' => 'postblocks_panel'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Featured Links', 'vivi-mag'),
					'link' => add_query_arg(['autofocus[panel]' => 'featured_links_panel'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Color scheme', 'vivi-mag'),
					'link' => add_query_arg(['autofocus[control]' => 'vivi_mag_skin'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('General settings', 'vivi-mag'),
					'link' => add_query_arg(['autofocus[section]' => 'settings_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Typography', 'vivi-mag'),
					'link' => add_query_arg(['autofocus[panel]' => 'typography_panel'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Social Links and Footer', 'vivi-mag'),
					'link' => add_query_arg(['autofocus[section]' => 'footer_section'], admin_url( 'customize.php'))
				),
			);

		}

        public function getting_started() {

		?>

			<div class="getting-started-top-wrap clearfix">

				<div class="theme-steps-list">

					<div class="theme-steps">

						<h3><?php echo esc_html__('Step 1 - Ensure Your Page Home Page is set Your latest posts', 'vivi-mag'); ?></h3>
						<ol>
							<li><?php echo esc_html__('Go to Settings > Reading > General settings > Your homepage displays', 'vivi-mag'); ?></li>
							<li><?php echo esc_html__('Set "Your homepage displays" to Your latest posts', 'vivi-mag'); ?></li>
							<li><?php echo esc_html__('Save changes', 'vivi-mag'); ?></li>
						</ol>
						<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'vivi-mag'); ?></a>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Step 2 - Customizer Options Panel', 'vivi-mag'); ?></h3>
						<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'vivi-mag'); ?></p>
						<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'vivi-mag'); ?></a>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Customizer quick links', 'vivi-mag'); ?></h3>
						<ul class="quick-links">
                        	<?php
								foreach ( $this->quick_links() as $quick_link ) {
									echo '<li><a class="button" href="'.$quick_link['link'].'">'.$quick_link['text'].'</a></li>';
								}
							?>
						</ul>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Documentation', 'vivi-mag'); ?></h3>
						<p><?php echo esc_html__('Need help to use Vivi Mag? Please check our full documentation.', 'vivi-mag'); ?></p>
						<a target="_blank" class="button button-primary" href="<?php echo esc_url('https://demo.themeinprogress.eu/vivi-mag-pro/documentation/vivi-mag-documentation/'); ?>"><?php echo esc_html__('Go to Docs', 'vivi-mag'); ?></a>
					</div>

				</div>

			</div>

        <?php

		}

		public function recommended_plugins() {

			$plugins = array(

				array(
					'filename'	=> 'init',
					'slug'      => 'internal-linking-of-related-contents',
				),

			);

		?>

			<div class="required-plugin-top-wrap clearfix">

				<div class="required-plugin-list">

				<?php

                    foreach ( $plugins as $plugin ) {

                        $slug = $plugin['slug'];
                        $filename = $plugin['filename'];

                        $plugin_info = $this->call_plugin_api( $slug );
                        $plugin_desc = $plugin_info->short_description;
                        $plugin_img  = ( !isset($plugin_info->icons['1x']) ) ? $plugin_info->icons['default'] : $plugin_info->icons['1x'];
                        $plugin_banner  = $plugin_info->banners['low'];

                ?>

					<div class="required-plugin">

                        <div class="required-plugin-head">

							<img class="plugin-banner" src="<?php echo $plugin_banner;?>">

                        </div>

                        <div class="required-plugin-desc">

                            <h3><?php echo $plugin_info->name; ?></h3>
							<?php echo $plugin_info->short_description; ?>

						</div>

                        <div class="required-plugin-footer">

							<span>

								<?php
									echo esc_html__('v', 'vivi-mag');
									echo $plugin_info->version;
									echo esc_html__(' by ', 'vivi-mag');
									echo html_entity_decode( wp_strip_all_tags( $plugin_info->author ) );
								?>

							</span>

							<?php if ( $this->check_installed_plugin( $slug, $filename ) ) : ?>

                            	<button type="button" class="button button-disabled" disabled="disabled">
                            		<?php esc_html_e( 'Installed', 'vivi-mag' ); ?>
                            	</button>

                            <?php else : ?>

                            	<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
                            		<?php esc_html_e( 'Install Now', 'vivi-mag' ); ?>
                            	</a>

                            <?php endif; ?>

						</div>

					</div>

				<?php

					}

				?>

				</div>

			</div>

        <?php

		}

		public function free_pro() {

		?>

            <table class="card table free-pro" cellspacing="0" cellpadding="0" >

                <tbody class="table-body">

                    <tr class="table-head">
                        <th class="large"></th>
                        <th class="indicator"><?php echo esc_html__('Vivi Mag', 'vivi-mag'); ?></th>
                        <th class="indicator"><?php echo esc_html__('Vivi Mag Pro', 'vivi-mag'); ?></th>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('WooCommerce Support', 'vivi-mag'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Responsive Layout', 'vivi-mag'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Masonry layout', 'vivi-mag'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Logo upload', 'vivi-mag'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Social icons', 'vivi-mag'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Copyright text', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Remove the copyright text from the Footer.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Custom colors', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Choose a color for links, buttons, icons and so on.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Shortcodes', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('With the shortcodes, you can add a dinamic contents into your posts and pages.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Portfolio section', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('You can add and display your works and give a modern layout, thanks to the masonry layout.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Galleries', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('For the gallery posts, pages and portfolio items, you can display the native slider or one of available slideshow created with Slider Revolution plugin (not included with Vivi Mag theme).', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Unlimited widget areas', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('On Vivi Mag theme you can generate an unique widget area for each post, page, WooCommerce product and portfolio item.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('postBlocks modules', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('The theme includes additional post blocks, providing greater flexibility in content presentation. These modules can be used to display posts from specific categories.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="indicator"><strong><?php echo esc_html__('2', 'vivi-mag'); ?></strong></td>
                        <td class="indicator"><strong><?php echo esc_html__('8', 'vivi-mag'); ?></strong></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('postBlocks layouts', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Choose from the available layouts to display posts from the selected category with a clean and modern look.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="indicator"><strong><?php echo esc_html__('2', 'vivi-mag'); ?></strong></td>
                        <td class="indicator"><strong><?php echo esc_html__('4', 'vivi-mag'); ?></strong></td>
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Google fonts', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('You can choose and use over 600 different fonts, for the logo, the menu and the titles.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Automatic data import', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('After the activation of Vivi Mag theme, all settings will be imported automatically from the free version.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('1 click upgrades', 'vivi-mag'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Start automatically the theme upgrades with simple one-click.', 'vivi-mag'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>

                    </tr>

                    <tr class="upsell-row">

                        <td></td>
                        <td></td>
                        <td>
                            <a  target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/vivi-mag-elegant-and-stylish-wordpress-theme/?ref=2&campaign=vivi-mag-welcome-page' );?>" class="button button-primary"><?php echo esc_html__('Upgrade now', 'vivi-mag'); ?></a>
                        </td>
                    </tr>

                </tbody>

            </table>

        <?php

		}

		public function changelog() {

			/* check if the changelog of child theme exist */

			if ( is_file(trailingslashit(get_stylesheet_directory()) . '/core/extras/changelog.php')) {
				require_once( trailingslashit( get_stylesheet_directory() ) . '/core/extras/changelog.php' );
			} else {
				require_once( trailingslashit( get_template_directory() ) . '/core/extras/changelog.php' );
			}

		}

	}

}

new vivi_mag_welcome();

?>
