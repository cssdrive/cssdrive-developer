<?php query_posts(array('orderby' => 'rand', 'cat' => '0', 'showposts' => 9)); ?>
	<?php $counter = 0; ?>
	<?php if ( have_posts() ) : ?>
	  <div class="uk-grid-small uk-grid-match" uk-grid>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php $counter = $counter + 1;?>
			
			<?php if(1 == $counter) : { ?>
				<div class="uk-width-1-2@m">
					<div class="uk-card uk-card-small uk-card-secondary">
						<div class="uk-card-media-top">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['class' => 'uk-width-1-1']); ?></a>
						</div>
						<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
					</div>
				</div>
			<?php } else : { ?>
				<div class="uk-width-1-2@s uk-width-1-4@m">
				  <div class="uk-card uk-card-small uk-card-secondary">
						<div class="uk-card-media-top">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
						</div>
						<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
					</div>
				</div>
			<?php } endif; ?>
		
			<?php if(5 == $counter) : { ?>
				<div class="uk-width-1-2@m">
					<div class="uk-inline">
	            <img class="uk-width-1-1" src="http://cssdrive.ru/wp-content/uploads/adv_1.jpg">
	            <div class="uk-position-center">
	              <h3 class="uk-h4 uk-text-uppercase uk-text-bold uk-text-center uk-margin-remove">Реклама</h3>
	              <h4 class="uk-h5 uk-margin-remove uk-text-bold">(Каждый 6 пост)</h4>
	            </div>
	        </div>
				</div>
			<?php } endif; ?>
	
	  <?php endwhile; ?>
	  </div>
	<?php else : ?>
		Постов нет!
	<?php endif; ?>
<?php wp_reset_query();?>