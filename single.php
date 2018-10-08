<?php get_header(); ?>
<div id="wrap" class="uk-grid-large" uk-grid>
	
	<!-- Main Single
  ============================================================ --> 
  
	<main id="main" class="uk-width-expand@m" role="main">
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
			
			<hr class="uk-hr">
			
			<!--  Last Post Category
			============================================================ -->
			
			<div class="uk-margin-medium">
				<?php
					$categories = get_the_category($post->ID);
					if ($categories) {
					$category_ids = array();
					foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
					$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>3,
					'orderby'=>rand,
					'caller_get_posts'=>1);
					$my_query = new wp_query($args);
					if( $my_query->have_posts() ) {
					echo '<h3>Похожие записи по категориям:</h3>';
					echo '<ul class="uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>';
					while ($my_query->have_posts()) {
					$my_query->the_post();
					?>
					<li>
						<div class="uk-card uk-background-muted uk-card-small">
							<div class="uk-card-media-top">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<div class="uk-card-body">
								<h3 class="uk-card-title">
									<a class="uk-link-text" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h3>
							</div>
						</div>
					</li>
					<?php
					}
					echo '</ul>';
					}
					wp_reset_query();
					}
				?>
			</div>
			
			<hr class="uk-hr">
			
			<!--  Last Post Tags
			============================================================ -->
			
			<div class="uk-margin-medium">
				<h3>Похожие записи по тегам:</h3>
					<?php $tags = wp_get_post_tags($post->ID);
					if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					$args=array(
					'tag__in' => $tag_ids,       
					'orderby'=>rand,                
					'caller_get_posts'=>1,            
					'post__not_in' => array($post->ID),
					'showposts'=>3                      
					);
					$my_query = new wp_query($args);
					if( $my_query->have_posts() ) {
					echo '<ul class="uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>';
					while ($my_query->have_posts()) {
					$my_query->the_post();
					?>
					<li>
						<div class="uk-card uk-background-muted uk-card-small">
							<div class="uk-card-media-top">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<div class="uk-card-body">
								<h3 class="uk-card-title">
									<a class="uk-link-text" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h3>
							</div>
						</div>
					</li>
					<?php
					}
					echo '</ul>';
					}
					wp_reset_query();
					}
				?>
			</div>
			
			<hr class="uk-hr">
		  
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