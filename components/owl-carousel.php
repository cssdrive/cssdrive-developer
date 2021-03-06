<?php query_posts(array('orderby' => 'rand', 'cat' => '0', 'showposts' => 10)); ?>

	<div id="sync1" class="owl-carousel">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article'); ?>>	    
		    <div class="uk-position-relative uk-light">		
					<?php if ( '' !== get_the_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['class' => 'uk-width-1-1']); ?></a>
					<?php endif; ?>
					
					<?php if ( is_sticky() && is_home() ) { ?>
						<div class="uk-position-top-right uk-position-small">
							<span uk-icon="icon: bell"></span> Липучка
						</div><!-- .uk-overlay -->
					<?php }	?>
					
			    <div class="uk-overlay uk-overlay-secondary uk-position-bottom">				
			      <?php the_title( '<h2 class="uk-h3 uk-article-title"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			      
			      <ul class="uk-article-meta uk-child-width-auto uk-grid-small uk-flex-middle uk-visible@s" uk-grid>
							<li><span uk-icon="icon: calendar"></span> <?php the_time('d.m.Y'); ?></li>
							<li><span uk-icon="icon: user"></span> <a class="uk-text-meta" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li>
							<li><span uk-icon="icon: comments"></span> <a class="uk-text-meta" href="<?php the_permalink() ?>#comments"><?php comments_number('Добавить комментарий', '1 Комментарий', '% Комментария'); ?></a></li>
							<li><?php foreach((get_the_category()) as $category) {  echo '<span uk-icon="icon: bookmark"></span> <a class="uk-text-meta" href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a> '; } ?></li>
						</ul>					
			    </div><!-- .uk-overlay -->   
			  </div><!-- .uk-position-relative -->
		  </article>
	  <?php  endwhile; ?>
  </div>
  
  <div id="sync2" class="owl-carousel">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	    <?php if ( '' !== get_the_post_thumbnail() ) : ?>
	      <div class="item">
				  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'uk-width-1-1']); ?></a>
				</div><!-- .item --> 
			<?php endif; ?>   
	  <?php  endwhile; ?>
  </div>
  
<?php wp_reset_query();?>