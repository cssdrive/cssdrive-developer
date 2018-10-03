<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) { return; } ?>

<script>
	jQuery( document ).ready(function() {
    jQuery('.widget > ul').addClass('uk-list uk-list-divider uk-text-meta');
  });
</script>

<aside class="uk-width@m" style="width: 300px;">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>