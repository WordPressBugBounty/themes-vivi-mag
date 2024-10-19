<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'vivi_mag_admin_notice' ) ) {

	class vivi_mag_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'vivi-mag-dismissed-notice') &&
				version_compare( PHP_VERSION, VIVI_MAG_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
				add_action( 'admin_init', array(&$this, 'add_script') ,11);

            }

		}
        
		 /**
		 * Loads the notice style
		 */

		public function add_script() {

			global $wp_version;

			$file_dir = get_template_directory_uri() . '/core/admin/assets/';
			wp_enqueue_style ( 'vivi-mag-notice', $file_dir.'css/notice.css' );

		}
        
        
        /**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['vivi-mag-dismiss'] ) && check_admin_referer( 'vivi-mag-dismiss-action' ) ) {
		
				update_option( 'vivi-mag-dismissed-notice', intval($_GET['vivi-mag-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="notice notice-warning is-dismissible">
                
            	<p>
            
            		<strong>

                        <?php esc_html_e( 'Pay what you want to unlock all premium features of Vivi Mag theme like...', 'vivi-mag' );  ?>
                    
                    </strong>
                
                </p>
                
                <p class="notice-coupon-message">

					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '600+ Google Fonts', 'vivi-mag' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Custom colors', 'vivi-mag' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Portfolio section', 'vivi-mag' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Unlimited widget areas', 'vivi-mag' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '6 additional "postBlocks" modules', 'vivi-mag' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '2 additional "postBlocks" layouts', 'vivi-mag' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Lifetime updates and support', 'vivi-mag' ); ?>
                
                </p>

				<p>
            		
					<a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/vivi-mag-elegant-and-stylish-wordpress-theme/?ref=2&campaign=vivi-mag-notice' ); ?>" class="button button-primary"><?php esc_html_e( 'Name your price', 'vivi-mag' ); ?></a>
                
            	</p>

            	<p>

                    <?php

                        printf( 
                            '<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'vivi-mag' ) . '</a>', 
                            esc_url( wp_nonce_url( add_query_arg( 'vivi-mag-dismiss', '1' ), 'vivi-mag-dismiss-action'))
                        );

                    ?>
                    
            	</p>
                    
            </div>
		
		<?php
		
		}

	}

}

new vivi_mag_admin_notice();

?>