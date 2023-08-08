<?php
/**
 * The Template for displaying all single posts.
 *
 * @package ugdsb3
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;

			the_post_navigation( array(
				'next_text' 		=> '<span class="post-title">%title <span class="fa fa-chevron-right"></span></span>',
     		'prev_text' 		=> '<span class="fa fa-chevron-left"></span> <span class="post-title">%title</span>',
				'in_same_term'  => true,
			) );

		endwhile; // end of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
