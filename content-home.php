<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ugdsb3
 */
?>

<?php the_post_thumbnail( 'ugdsb3-featured', array( 'class' => 'single-featured' )); ?>
<?php if (is_single()) :
  the_title( '<h2>', '</h2>' );
else :
  the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif; ?>

<?php if ('post' == get_post_type()) { ?>
  <p class="author">Posted <?php echo get_the_date(); ?></p>
<?php } ?>
<div class="post-inner-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-content">
				<?php
				if ( get_theme_mod( 'ugdsb3_excerpts' ) == 1 ) :
					the_excerpt();?>
					<a class="btn btn-default read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Read More', 'ugdsb3' ); ?></a>
				<?php else :
					the_content();
				endif;
				 ?>

				<?php
					wp_link_pages( array(
						'before'            => '<div class="page-links">'.esc_html__( 'Pages:', 'ugdsb3' ),
						'after'             => '</div>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'pagelink'          => '%',
						'echo'              => 1
		       		) );
		    	?>
   
	</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div>


