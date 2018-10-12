<?php get_header(); ?>

<div id="wrap">
	
<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'cssdrive' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'cssdrive' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'cssdrive' ); ?></p>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->
	
	<p>Вы 
		<?php
			#some variables for the script to use
			#if you have some reason to change these, do.  but wordpress can handle it
			$adminemail = get_option('admin_email'); #the administrator email address, according to wordpress
			$website = get_bloginfo('url'); #gets your blog's url from wordpress
			$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress
			
			  if (!isset($_SERVER['HTTP_REFERER'])) {
			    #politely blames the user for all the problems they caused
			        echo "попытались открыть "; #starts assembling an output paragraph
				$casemessage = "Не все потеряно!";
			  } elseif (isset($_SERVER['HTTP_REFERER'])) {
			    #this will help the user find what they want, and email me of a bad link
				echo "нажал ссылку на"; #now the message says You clicked a link to...
			        #setup a message to be sent to me
				$failuremess = "Пользователь попытался перейти к $website"
			        .$_SERVER['REQUEST_URI']." и получил ошибку 404 (страница не найдена). ";
				$failuremess .= "Это не их вина, поэтому попробуйте исправить это.  
			        Они пришли из ".$_SERVER['HTTP_REFERER'];
				mail($adminemail, "Плохая ссылка на ".$_SERVER['REQUEST_URI'],
			        $failuremess, "От: $websitename <noreply@$website>"); #email you about problem
				$casemessage = "Администратор отправлен по электронной почте об этой проблеме тоже.";#set a friendly message
			  }
			  echo " ".$website.$_SERVER['REQUEST_URI']; ?> 
			но его не существует. <?php echo $casemessage; ?>  Вы можете нажать 
			и попробуйте еще раз или найдите то, что вы ищете:
	  <?php include(TEMPLATEPATH . "/searchform.php"); ?>
	</p>

	

</div><!-- #wrap -->

<?php get_footer(); ?>