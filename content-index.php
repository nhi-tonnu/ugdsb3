<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ugdsb3
 */
?>

<?php //the_post_thumbnail( 'ugdsb3-featured', array( 'class' => 'single-featured' )); ?>

<div class="post-inner-content-home">aaaa
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ugdsb3' ),
				'after'  => '</div>',
			) );
		?>

    <?php
      // Checks if this is homepage to enable homepage widgets
      if ( is_front_page() ) :
        get_sidebar( 'home' );
      endif;
    ?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
</div>
