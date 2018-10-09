<?php query_posts(array('cat' => '0', 'showposts' => 6)); ?>
<?php if (have_posts()) : ?>
<?php $count = 0; ?>

  <div class="uk-grid-small uk-grid-match" uk-grid>
	  <?php while (have_posts()) : the_post(); ?>
		<?php $count++; ?>
		<?php if ($count == 1) : ?>
	    <div class="uk-width-1-2@l">
		    
				<div id="post-<?php the_ID(); ?>" class="uk-position-relative uk-light">		
					<?php if ( '' !== get_the_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large', ['class' => 'uk-width-1-1']); ?></a>
					<?php endif; ?>
					
					<?php if ( is_sticky() && is_home() ) { ?>
						<div class="uk-position-top-right uk-position-small">
							<span uk-icon="icon: bell"></span> Липучка
						</div><!-- .uk-overlay -->
					<?php }	?>
					
			    <div class="uk-overlay uk-overlay-secondary uk-position-bottom">				
			      <?php the_title( '<h2 class="uk-article-title uk-margin-small-top"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>	
			      
			      <ul class="uk-article-meta uk-child-width-auto uk-grid-small uk-flex-middle uk-visible@s" uk-grid>
							<li><span uk-icon="icon: calendar"></span> <?php the_time('d.m.Y'); ?></li>
							<li><span uk-icon="icon: comments"></span> <a class="uk-text-meta" href="<?php the_permalink() ?>#comments"><?php comments_number('Добавить комментарий', '1 Комментарий', '% Комментария'); ?></a></li>
							<li><?php foreach((get_the_category()) as $category) {  echo '<span uk-icon="icon: bookmark"></span> <a class="uk-text-meta" href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a> '; } ?></li>
						</ul>				
			    </div><!-- .uk-overlay -->   
			  </div><!-- .uk-position-relative -->
			  
			</div><!-- .uk-width-1-2@l -->
	  <?php else : ?>
	    <div class="uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l">
		    
				<div id="post-<?php the_ID(); ?>" class="uk-card uk-card-secondary uk-card-small uk-light">
					<div class="uk-card-media-top">
						<?php if ( '' !== get_the_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_small', ['class' => 'uk-width-1-1']); ?></a>
						<?php endif; ?>
					</div>
					<div class="uk-card-body">
						<?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					</div>
				</div>
				
			</div>
	  <?php endif; ?>
		<?php endwhile; ?>
  </div>
<?php endif; ?>
<?php wp_reset_query();?>