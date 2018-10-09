<?php query_posts(array('orderby' => 'rand', 'cat' => '0', 'showposts' => 5)); ?>
<?php $counter = 0; ?>
<?php if ( have_posts() ) : ?>
<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl uk-grid-small uk-grid-match" uk-grid>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $counter = $counter + 1;?>
		
		<?php if(1 == $counter) : { ?>
			<div>
				<div class="uk-card uk-card-small uk-card-secondary">
					<div class="uk-card-media-top">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
					</div>
					<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
				</div>
			</div>
		<?php } endif; ?>
	
		<?php if(2 == $counter) : { ?>
			<div class="uk-visible@s">
				<div class="uk-card uk-card-small uk-card-secondary">
					<div class="uk-card-media-top">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
					</div>
					<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
				</div>
			</div>
		<?php } endif; ?>
		
		<?php if(3 == $counter) : { ?>
			<div class="uk-visible@m">
				<div class="uk-card uk-card-small uk-card-secondary">
					<div class="uk-card-media-top">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
					</div>
					<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
				</div>
			</div>
		<?php } endif; ?>
		
		<?php if(4 == $counter) : { ?>
			<div class="uk-visible@l">
				<div class="uk-card uk-card-small uk-card-secondary">
					<div class="uk-card-media-top">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
					</div>
					<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
				</div>
			</div>
		<?php } endif; ?>
		
		<?php if(5 == $counter) : { ?>
			<div class="uk-visible@xl">
				<div class="uk-card uk-card-small uk-card-secondary">
					<div class="uk-card-media-top">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
					</div>
					<div class="uk-card-body"> <?php the_title( '<h2 class="uk-h5"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
				</div>
			</div>
		<?php } endif; ?>

		<?php endwhile; ?>
</div>
<?php else : ?>
	Постов нет!
<?php endif; ?>
<?php wp_reset_query();?>