<!--  Article Content
============================================================ -->
  
<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article uk-margin-large'); ?>>
	
	<?php the_title( '<h2 class="uk-h2 uk-article-title"><a class="uk-link-reset" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	
	<ul class="uk-article-meta uk-child-width-auto uk-grid-small uk-flex-middle uk-margin-bottom" uk-grid>
		<?php if ( is_sticky() && is_home() ) { ?><li><span uk-icon="icon: bell"></span> Липучка</li><?php }	?>
		<li><span uk-icon="icon: calendar"></span> <?php the_time('d.m.Y'); ?></li>
		<li><span uk-icon="icon: user"></span> <a class="uk-text-meta" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li>
		<li><span uk-icon="icon: comments"></span> <a class="uk-text-meta" href="<?php the_permalink() ?>#comments"><?php comments_number('Добавить комментарий', '1 Комментарий', '% Комментария'); ?></a></li>
		<li><?php foreach((get_the_category()) as $category) {  echo '<span uk-icon="icon: bookmark"></span> <a class="uk-text-meta" href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a> '; } ?></li>
	</ul>
	
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post', ['uk-img' => '']); ?></a>
	<?php endif; ?>
	
	<?php if(has_excerpt()) { the_excerpt(); } else { the_content(); } ?>
	
  <?php edit_post_link( __( 'Edit', 'cssdrive' ), '', '', null, 'uk-button uk-button-small uk-button-default' ); ?>
	
</article>