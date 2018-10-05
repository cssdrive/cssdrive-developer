<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class('uk-offcanvas-content'); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'cssdrive' ); ?></a>
	
<!--  Header
============================================================ -->

<header id="header" class="uk-background-primary uk-light" role="banner">
	
	<!-- Navigation
	============================================================ -->
	
	<nav id="navigation" class="uk-navbar-container uk-navbar-transparent" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'cssdrive' ); ?>">
		<div class="uk-container" uk-navbar>
	  
		  <div class="nav-overlay uk-navbar-left">
				<?php if ( is_front_page() ) : ?>
					<h1 class="uk-navbar-item uk-logo uk-margin-remove"><?php bloginfo( 'name' ); ?></h1>
				<?php else : ?>
					<a class="uk-navbar-item uk-logo uk-link-reset" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
		  </div>
			
		  <div class="nav-overlay uk-navbar-center">
				<?php wp_nav_menu( array(
					'theme_location'  => 'top',
				  'menu_id'         => 'top-menu',
					'container'       => '',
					'menu_class'      => 'uk-navbar-nav uk-navbar-parent-icon uk-visible@m',
					'link_before'     => '<span>',
					'link_after'      => '</span>',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'fallback_cb'     => 'dropdown::fallback',
					'walker'          => new dropdown('navbar'),
				));	?>
		  </div>
		  
		  <div class="nav-overlay uk-navbar-right">
			  <a class="uk-navbar-toggle" uk-search-icon uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
			  <a class="uk-navbar-toggle uk-hidden@m" type="button" uk-toggle="target: #offcanvas-menu"><span uk-navbar-toggle-icon></span></a>
		  </div>
		  
		  <div class="nav-overlay uk-navbar-left uk-flex-1" hidden>
		      <div class="uk-navbar-item uk-width-expand">
		        <form role="search" method="get" class="uk-search uk-search-navbar uk-width-1-1" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		          <input class="uk-search-input" type="search" value="<?php echo get_search_query(); ?>" name="search" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'cssdrive' ); ?>" autofocus>
		        </form>	
		      </div>
		      <a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
		  </div>
		  
		</div>
	</nav><!-- #navigation -->
	
</header><!-- #header -->

<!--  Offcanvas
============================================================ -->

<div id="offcanvas-menu" uk-offcanvas="overlay: true; flip: true;">	
  <div class="uk-offcanvas-bar">
    <?php wp_nav_menu( array(
			'theme_location'  => 'top',
		  'menu_id'         => 'top',
			'container'       => '',
			'menu_class'      => 'uk-nav uk-nav-primary uk-nav-parent-icon',
			'link_before'     => '<span>',
			'link_after'      => '</span>',
			'items_wrap'      => '<ul id="%1$s" class="%2$s" uk-nav>%3$s</ul>',
			'fallback_cb'     => 'offcanvas::fallback',
			'walker'          => new offcanvas('navbar'),
		));?>
  </div>
</div><!-- #offcanvas-menu -->

<!--  Container
============================================================ -->

<div id="container" class="uk-section uk-section-small uk-container" uk-height-viewport="expand: true">