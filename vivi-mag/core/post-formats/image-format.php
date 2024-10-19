<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('vivi_mag_image_format_function')) {

	function vivi_mag_image_format_function() {

	?>

        <div class="post-article-wrap">

            <?php

                do_action(
                    'vivi_mag_thumbnail',
                    'vivi_mag_blog_thumbnail'
                );

            ?>

            <div class="post-article">

            	<?php

            		do_action('vivi_mag_before_content', 'post');
            		do_action('vivi_mag_after_content');

            	?>

            </div>

            <div class="clear"></div>

        </div>

	<?php

	}

	add_action( 'vivi_mag_image_format', 'vivi_mag_image_format_function' );

}

?>