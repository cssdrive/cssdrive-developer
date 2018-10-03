<!--  Comments List
============================================================ -->

<?php if ( post_password_required() ) { return; } ?>
<div id="comments">
  <?php if ( have_comments() ) : ?>
  
	  <h2 class="comments-title">
		  <?php $comments_number = get_comments_number(); if ( '1' === $comments_number ) { printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'cssdrive' ), get_the_title() ); } else { printf( _nx( '%1$s Reply to &ldquo;%2$s&rdquo;', '%1$s Replies to &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'cssdrive' ), number_format_i18n( $comments_number ), get_the_title() ); } ?>
	  </h2>
	
		<ul class="comment-list uk-list uk-list-large uk-comment-list">
			<?php wp_list_comments( array( 'callback' => 'cssd_comment', ) ); ?>
		</ul>
	
		<?php the_comments_pagination(array(
				'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'cssdrive' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'cssdrive' ) . '</span>',
		)); endif; ?>
	
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	    <p class="no-comments"><?php _e( 'Comments are closed.', 'cssdrive' ); ?></p>
		<?php endif; ?>
	
	<?php comment_form(); ?>
</div><!-- #comments -->