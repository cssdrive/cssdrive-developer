<?php get_header(); ?>
<div id="wrap" class="uk-grid-large" uk-grid>
	
	<!-- Main Single
  ============================================================ --> 
  
	<main id="main" class="uk-width-expand@m">
		<?php while ( have_posts() ) :the_post(); ?>
			
			<!--  Content Single
			============================================================ -->

		  <?php get_template_part( 'parts/content', 'single' ); ?>
		  
		  <!--  Content Post Navigation
			============================================================ -->
		  
		  <div class="uk-section uk-section-xsmall uk-section-muted uk-margin-medium">
			  <ul class="uk-child-width-expand@s uk-flex-middle" uk-grid>
				  <li class="uk-text-left uk-margin-left">
					  <?php $prev_post = get_previous_post(); if( ! empty($prev_post) ){ ?>
						  <a class="uk-link-reset" href="<?php echo get_permalink( $prev_post->ID ); ?>">
							  <?php echo get_the_post_thumbnail($prev_post->ID, array(48) ); ?> <?php echo $prev_post->post_title; ?>
							</a>
						<?php } ?>
					</li>
					<li class="uk-text-right uk-margin-right">			    
						<?php $next_post = get_next_post(); if( ! empty($next_post) ){ ?>
							<a class="uk-link-reset" href="<?php echo get_permalink( $next_post->ID ); ?>">
								<?php echo $next_post->post_title; ?> <?php echo get_the_post_thumbnail($next_post->ID, array(48) ); ?>
							</a>
					  <?php } ?>
					</li>
				</ul>
			</div>
		  
		  <!--  Comments
			============================================================ -->
			
		  <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
		  
		<?php endwhile; ?>
	</main>
	
	<!--  Sidebar
	============================================================ -->
	
	<?php get_sidebar(); ?>
	
</div><!-- #wrap -->
<?php get_footer(); ?>