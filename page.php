<?php get_header(); ?>

  <!--  Main Page
  ============================================================ -->
 
	<main id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'parts/content', 'page' ); ?>

			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

		<?php endwhile;?>

	</main><!-- #main -->
	
<?php get_footer(); ?>