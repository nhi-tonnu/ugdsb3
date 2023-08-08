<?php
/**
 * @package ugdsb3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-item-wrap">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			 	<?php the_post_thumbnail( 'ugdsb3-featured', array( 'class' => 'single-featured' )); ?>
			</a>
		<div class="post-inner-content">
			<header class="entry-header page-header">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header><!-- .entry-header -->

			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
				<p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'ugdsb3' ); ?></a></p>
			</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">

				<?php
				if ( get_theme_mod( 'ugdsb3_excerpts' ) == 1 ) :
					the_excerpt();?>
					<p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Read More', 'ugdsb3' ); ?></a></p>
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
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-## -->
