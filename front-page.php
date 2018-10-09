<?php get_header(); ?>

	<!--  Main Content
  ============================================================ -->
  
	<main id="main" role="main">
		
		<!--  OWL Carousel
    ============================================================ -->
		
		<h2 class="uk-h2">Рандомный слайдер постов</h2>
		<?php get_template_part( 'components/owl-carousel' ); ?>

		<!--  Primary Last Post
    ============================================================ -->
    
    <div class="uk-margin-large-top">
	    <h2 class="uk-h2">Вывод последних постов</h2>
	    <?php get_template_part( 'components/primary-post' ); ?>
    </div>
    
    <!--  Visible Last Post
    ============================================================ -->
    
    <div class="uk-margin-large-top">
	    <h2 class="uk-h2">Скрывающиеся блоки последних постов</h2>
	    <?php get_template_part( 'components/visible-post' ); ?>
    </div>

	</main><!-- #main -->

<?php get_footer(); ?>