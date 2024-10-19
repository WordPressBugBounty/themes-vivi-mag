<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_link_format_function')) {

	function vivi_mag_link_format_function() {

	?>

        <?php if ( has_post_thumbnail() ): ?>
        	<div class="post-article link" style="background-image:url('<?php esc_url(the_post_thumbnail_url('vivi_mag_blog_thumbnail')); ?>');">
        <?php else: ?>
        	<div class="post-article link">
        <?php endif; ?>

            <a href="<?php echo esc_url(vivi_mag_get_link_url()); ?>" target="_blank">

                <span class="dashicons dashicons-admin-links"></span>
                <?php echo get_the_title(); ?>

            </a>

        </div>

	<?php

	}

	add_action( 'vivi_mag_link_format', 'vivi_mag_link_format_function' );

}

?>