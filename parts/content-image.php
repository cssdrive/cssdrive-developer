<!--  Article Content Images
============================================================ -->
  
<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article uk-margin-large'); ?>>
  
  <div class="uk-position-relative uk-light">		
		<?php if ( '' !== get_the_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post', ['class' => 'uk-width-1-1', 'uk-img' => '']); ?></a>
		<?php endif; ?>
		
		<?php if ( is_sticky() && is_home() ) { ?>
			<div class="uk-position-top-right uk-position-small">
				<span uk-icon="icon: bell"></span> Липучка
			</div><!-- .uk-overlay -->
		<?php }	?>
		
    <div class="uk-overlay uk-overlay-secondary uk-position-bottom">       
      <?php $categories = get_the_category(); if($categories){ foreach($categories as $category) { $out .= '<a class="uk-button uk-button-default uk-border-rounded" href="'.get_category_link($category->term_id ).'">' . $category->name . '</a> '; } echo trim($out, ', '); } ?>

      <?php the_title( '<h2 class="uk-h2 uk-article-title uk-margin-small-top"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
      
      <ul class="uk-article-meta uk-child-width-auto uk-grid-small uk-flex-middle" uk-grid>
				<li><span uk-icon="icon: calendar"></span> <?php the_time('d.m.Y'); ?></li>
				<li><span uk-icon="icon: user"></span> <a class="uk-text-meta" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li>
				<li><span uk-icon="icon: comments"></span> <a class="uk-text-meta" href="<?php the_permalink() ?>#comments"><?php comments_number('Добавить комментарий', '1 Комментарий', '% Комментария'); ?></a></li>
			</ul>
			
    </div><!-- .uk-overlay -->   
  </div><!-- .uk-position-relative -->
  
  <?php if(has_excerpt()) { the_excerpt(); } else { the_content(); } ?>
	
  <?php edit_post_link( __( 'Edit', 'cssdrive' ), '', '', null, 'uk-button uk-button-small uk-button-default' ); ?>
	
</article>