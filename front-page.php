<?
/*
Description: Custom Page to display home page

*/
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :

		

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'home' );

			endwhile;

			the_posts_pagination( array(
	        'prev_text' => '<span class="fa fa-chevron-left"></span> ' . __( 'Newer posts', 'ugdsb3' ),
	        'next_text' => __( 'Older posts', 'ugdsb3' ) . ' <span class="fa fa-chevron-right"></span>' ,
	    ) );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

		</main><!-- #main -->
</div><!-- #primary -->
<?php 
get_sidebar();
get_footer(); ?>