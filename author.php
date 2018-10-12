<?php get_header();
	
	$user_id = NULL;
	$user_acf_prefix = get_the_author_meta('ID');
	$user_id_prefixed = $user_acf_prefix . $user_id;
	
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
	
	<!--  Background User Images
  ============================================================ -->
	
	<?php $author_header = get_field( 'author_header', $user_id_prefixed ); ?>
	<?php if ( $author_header ) { ?>
		<img class="uk-width-1-1" src="<?php echo $author_header['url']; ?>" alt="<?php echo $author_header['alt']; ?>" />
	<?php } ?>

  <!--  Main Page
  ============================================================ -->
 
	<main id="main" role="main">	
		<div uk-grid>
			
			<div class="uk-width-auto@s" style="width: 200px;">
				<ul class="uk-list uk-list-divider">
					<li> <?php echo get_avatar( $curauth->user_email, 100, '', '', array('class'=>'uk-border-circle', 'extra_attr'=>'style="  "')); ?></li>
					<li><?php echo $curauth->display_name; ?></li>
					<li><?php echo $curauth->nickname; ?></li>
					<li>ID: <?php echo $curauth->ID; ?></li>
					<li><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></li>
					<li><?php echo $curauth->user_description; ?></li>
					<li>Регистрация: <?php echo $curauth->user_registered; ?></li>
				</ul>
			</div><!-- LEFT -->
			
			<div class="uk-width-expand@s">				
				<?php if ( have_posts() ) : ?>
			
					<!--  Content
		      ============================================================ -->
		      
					<?php while ( have_posts() ) : the_post(); ?>		    
			  		<?php get_template_part( 'parts/content', get_post_format() ); ?>		  
					<?php endwhile; ?>
					
					<?php pagination(); ?>
					
				<?php else : ?>
					
					<!--  Empty Content
		      ============================================================ -->
		      
					<?php get_template_part( 'parts/content', 'none' ); ?>
					
			  <?php endif; ?>
			</div><!-- CENTER -->
			
			<!--  Sidebar
			============================================================ -->
			
			<?php get_sidebar(); ?>
			
		</div><!-- uk-grid -->
	</main><!-- #main -->

<?php get_footer(); ?>