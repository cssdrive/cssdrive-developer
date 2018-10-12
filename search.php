<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'cssdrive' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1 class="page-title"><?php _e( 'Nothing Found', 'cssdrive' ); ?></h1>
	<?php endif; ?>

<div id="wrap" uk-grid>
	
	<!--  Main Content
  ============================================================ -->
  
	<main id="main" class="uk-width-expand@m" role="main">
		<?php if ( have_posts() ) : ?>
			
			<!--  Content
      ============================================================ -->
      
			<?php while ( have_posts() ) : the_post(); ?>		    
			  <?php get_template_part( 'parts/content', get_post_format() ); ?>		  
			<?php endwhile; ?>
			
			<?php pagination(); ?>
			
		<?php else : ?>
			
			<!--  Empty Content
      ============================================================ -->
      
			<?php get_template_part( 'parts/content', 'none' ); ?>
			
	  <?php endif; ?>
	</main>
	
	<!--  Sidebar
	============================================================ -->
	
	<?php get_sidebar(); ?>
	
</div><!-- #wrap -->


<?php get_footer(); ?>