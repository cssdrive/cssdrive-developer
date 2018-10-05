<?php
/**
 * Template Name: Добавить новость
 * Template Post Type: post, page, product
 */
acf_form_head();
get_header(); ?>

  <!--  Main Page Add
  ============================================================ -->
 
	<main id="main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'parts/content', 'page' ); ?>
			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
		<?php endwhile;?>
	</main><!-- #main -->
	
	<!--  ACF Add Post
  ============================================================ -->
	
	<?php	if ( is_user_logged_in() ) { ?>
	  
	  <?php $current_page = $_SERVER['REQUEST_URI']; acf_form(array(
			'post_id'		=> 'new_post', // post id to get field groups from and save data to
			'new_post'		=> array(
				'post_type'		=> 'post',
				'post_status'		=> 'pending'
				/*
			    publish — опубликованный пост,
			    pending — пост ожидает проверки модератором,
			    draft — черновик,
			    auto-draft — автоматически созданный чероновик для нового поста, не содержащий контента,
			    future — пост запланирован на публикацию,
			    private — невидим для незарегистрированных пользователей,
			    inherit — статус вложений и редакций постов,
			    trash — пост, находящийся в корзине (удаленный), статус добавлен в WordPress 2.8
				*/	
			),
			
			'field_groups' => array(), // this will find the field groups for this post (post ID's of the acf post objects)
			'form' => true, // set this to false to prevent the <form> tag from being created
			'form_attributes' => array( // attributes will be added to the form element
        'id' => 'post',
        'class' => 'uk-form',
        'action' => '',
        'method' => 'post',
	    ),
	    'return' => add_query_arg( 'updated', 'true', get_permalink() ), // return url
      'html_before_fields' => '', // html inside form before fields
      'html_after_fields' => '', // html inside form after fields
      
			'post_title' => true,
		  'post_content' => true,
		  'html_updated_message'	=> '<div id="message" class="updated uk-margin-bottom uk-text-success">Спасибо. Запись отправлена на проверку.</div>',
		  'html_submit_button'	=> '<input type="submit" class="acf-button uk-button uk-button-primary uk-margin-top" value="%s" />',
		  'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
		  //'return' => '%post_id%', // %post_url% , %post_id%
			'submit_value'		=> 'Добавить новость'
		));?>
									
  <?php } else { ?>
								  
		<?php echo 'Вы должны <a href="/wp-login.php?action=register">зарегистрироваться</a> или <a href="/wp-login.php">войти</a>, чтобы добавить свою новость.'; ?>
							    
	<?php } ?>
	
<?php get_footer(); ?>