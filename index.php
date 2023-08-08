<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : 
				//if(! is_front_page()) :
			?>
				
					<h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
			

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

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
get_footer();
