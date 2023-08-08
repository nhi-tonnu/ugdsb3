<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ugdsb3
 */
?>
</div>
<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

				

			<?php endif; // end sidebar widget area ?>
</div><!-- #secondary -->
