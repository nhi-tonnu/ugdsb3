<?php
/**
 * Template Name: HomePage Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ugdsb3
 */

get_header('home'); 

?>

	<div id="primary" class="content-area">
    	<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'index' ); ?>		
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
    </div>



<?php /******************* row for 3 homepage widgets */
 if ( is_front_page() ) :?>
 
 	<div class="home-widget-area row">
		<?php if ( is_active_sidebar( 'home-widget-1' ) ) : ?>
		<div class="col-sm-4 home-widget" role="complementary" id="home1">
			<?php dynamic_sidebar( 'home-widget-1' ); ?>
		</div><!-- .widget-area .first -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'home-widget-2' ) ) : ?>
		<div class="col-sm-4 home-widget" role="complementary" id="home2">
			<?php dynamic_sidebar( 'home-widget-2' ); ?>
		</div><!-- .widget-area .second -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'home-widget-3' ) ) : ?>
		<div class="col-sm-4 home-widget" role="complementary" id="home3">
			<?php dynamic_sidebar( 'home-widget-3' ); ?>
		</div><!-- .widget-area .third -->
		<?php endif; ?>
	</div>
<?php endif;?>



<?php get_footer(); ?>
