<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package ugdsb3
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ugdsb3' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );

			endwhile;

			the_posts_pagination( array(
	        'prev_text' => '<span class="fa fa-chevron-left"></span> ' . __( 'Newer posts', 'ugdsb3' ),
	        'next_text' => __( 'Older posts', 'ugdsb3' ) . ' <span class="fa fa-chevron-right"></span>' ,
	    ) );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
