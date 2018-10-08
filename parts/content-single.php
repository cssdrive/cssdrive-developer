<!--  Article Single
============================================================ -->
  
<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article uk-margin'); ?>>
	
	<?php the_title( '<h1 class="uk-h2 uk-article-title">', '</h1>' ); ?>
	
	<ul class="uk-article-meta uk-child-width-auto uk-grid-small uk-flex-middle uk-margin-bottom" uk-grid>
		<li><span uk-icon="icon: calendar"></span> <?php the_time('d.m.Y'); ?></li>
		<li><span uk-icon="icon: user"></span> <a class="uk-text-meta" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li>
		<li><span uk-icon="icon: comments"></span> <a class="uk-text-meta" href="<?php the_permalink() ?>#comments"><?php comments_number('Добавить комментарий', '1 Комментарий', '% Комментария'); ?></a></li>
		<li><?php foreach((get_the_category()) as $category) {  echo '<span uk-icon="icon: bookmark"></span> <a class="uk-text-meta" href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a> '; } ?></li>
	</ul>
	
	<?php the_content(); ?>
	
	<?php wp_link_pages(array(
		'before'      => '<div class="page-links">' . __( 'Pages:', 'cssdrive' ),
		'after'       => '</div>',
		'link_before' => '<span class="uk-button uk-button-small uk-button-default">',
		'link_after'  => '</span>',
	));?>
	
	<!--  Rambler Share Button
  ============================================================ -->

	<!------ Rambler.Likes script start https://developers.rambler.ru/likes/ ------>
	<div class="rambler-share uk-margin"></div>
	<script>
	(function() {
	var init = function() {
	RamblerShare.init('.rambler-share', {
		"style": {
			"iconSize": 20,
			"borderRadius": 0,
			"counterSize": 16
		},
		"utm": "utm_medium=social",
		"counters": true,
		"buttons": [
			"vkontakte",
			"facebook",
			"odnoklassniki",
			"twitter",
			"googleplus",
			"telegram",
			"copy"
		]
	});
	};
	var script = document.createElement('script');
	script.onload = init;
	script.async = true;
	script.src = 'https://developers.rambler.ru/likes/v1/widget.js';
	document.head.appendChild(script);
	})();
	</script>
	<!------   Rambler.Likes script end  ------>
	
  <div class="uk-margin uk-article-meta"><?php the_tags(__('<span uk-icon="icon: tag"></span> ', 'thefubon') . '', ', ', ''); ?></div>
	
	<hr class="uk-hr">	
	  <a class="uk-link-text" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
		  <?php echo get_avatar( get_the_author_meta('user_email'), 42, '', '', array('class'=>'uk-margin-small-right', 'extra_attr'=>'style="margin-top: -4px;"')); ?><?php the_author(); ?>
		</a>
	<hr class="uk-hr">
	
	<div class="uk-margin-small">Последнее изменение: <?php the_modified_date(); ?> в <?php the_modified_time(); ?></div>
	
  <?php edit_post_link( __( 'Edit', 'cssdrive' ), '', '', null, 'uk-button uk-button-small uk-button-default' ); ?>
	
</article>