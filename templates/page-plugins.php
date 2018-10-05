<?php
/**
 * Template Name: Плагины
 * Template Post Type: post, page, product
 */
get_header(); ?>

  <!--  Main Page Add Post
  ============================================================ -->
 
	<main id="main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'parts/content', 'page' ); ?>
			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
		<?php endwhile;?>
	</main><!-- #main -->
	
	<!--  ACF Plugins Page
  ============================================================ -->
	
	<?php if ( have_rows( 'repeater_plugins' ) ): ?>
		<div class="uk-child-width-1-2@m uk-grid-large uk-margin-medium" uk-grid>
			<?php while ( have_rows( 'repeater_plugins' ) ) : the_row(); ?>
				<div>
					
					<?php if ( get_row_layout() == 'plugins_add' ) : ?>
					
						<ul class="uk-grid-small" uk-grid>
							<li class="uk-width-auto@s">
								<?php $plugins_img = get_sub_field( 'plugins_img' ); ?>
								<?php if ( $plugins_img ) { ?>
									<img class="uk-border-rounded" src="<?php echo $plugins_img['url']; ?>" alt="<?php echo $plugins_img['alt']; ?>" width="100" height="100">
								<?php } ?>
							</li>
							<li class="uk-width-expand@s">
								<h1 class="uk-h4"><?php the_sub_field( 'plugins_name' ); ?> <sup class="uk-text-meta"><?php the_sub_field( 'plugins_verse' ); ?></sup></h1>
								
								<?php $plugins_download = get_sub_field( 'plugins_download' ); ?>
								<?php if ( $plugins_download ) { ?>
									<a class="uk-button uk-button-default uk-button-small uk-border-rounded" href="<?php echo $plugins_download['url']; ?>">Скачать</a>
								<?php } ?>
								
								<?php if ( get_sub_field( 'plugins_website' ) ) { ?>
					        <a class="uk-button uk-button-default uk-button-small uk-border-rounded" href="<?php the_sub_field( 'plugins_website' ); ?>" target="_blank">Сайт</a>
					      <?php } ?>
					      
								<?php if ( get_sub_field( 'plugins_pro' ) ) { ?>
					      	<a class="uk-button uk-button-default uk-button-small uk-border-rounded" href="<?php the_sub_field( 'plugins_pro' ); ?>" target="_blank">Pro</a>
					      <?php } ?>

							</li>
						</ul>
					
					<?php endif; ?>
					
				</div>
			<?php endwhile; ?>
	  </div>
	<?php else: ?>
		<?php // no layouts found ?>
	<?php endif; ?>
	
<?php get_footer(); ?>