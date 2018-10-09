<!--  Article Page
============================================================ -->
  
<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article uk-margin'); ?>>
	
	<?php the_title( '<h1 class="uk-h2 uk-article-title">', '</h1>' ); ?>
	
	<?php the_content(); ?>

	<?php wp_link_pages(array(
		'before'      => '<div class="page-links">' . __( 'Pages:', 'cssdrive' ),
		'after'       => '</div>',
		'link_before' => '<span class="uk-button uk-button-small uk-button-default">',
		'link_after'  => '</span>',
	));?>
	
	<?php edit_post_link( __( 'Edit', 'cssdrive' ), '', '', null, 'uk-button uk-button-small uk-button-default' ); ?>
	
</article><!-- #post-## -->