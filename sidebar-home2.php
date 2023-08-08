<?php
/**
 * The Sidebar widget area for static frontpage.
 *
 * @package ugdsb3
 */
?>

  

			
	
</div>
<?php if ( is_active_sidebar( 'home2' ) ) : ?>
	<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
			<?php dynamic_sidebar( 'home2' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>