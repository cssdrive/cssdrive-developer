<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
	
/*  Настраниваем вывод ленты комментариев
============================================================*/

if ( ! function_exists( 'cssd_comment' ) ) :
function cssd_comment( $comment, $args, $depth ) {
    global $commentnumber;
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' : ?>
    <?php break;
    default :
    $commentnumber++; ?>
      
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    	<div id="comment-<?php comment_ID(); ?>" class="comment-body">
        <article id="comment-<?php comment_ID(); ?>" class="uk-comment uk-visible-toggle">
          <header class="comment-header uk-comment-header uk-position-relative">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
              <div class="uk-width-auto">
                  <div  class="uk-comment-avatar">
                    <?php $avatar_size = 48;  if ( '0' != $comment->comment_parent ) $avatar_size = 48; echo get_avatar( $comment, $avatar_size ); ?>
                  </div>
              </div>
              <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove">
                  <span class="commentnumber"><?php echo '#'.$commentnumber; ?></span>
                  <?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
                  <?php if($comment->comment_parent){ $comment_parent_href = htmlspecialchars(get_comment_link( $comment->comment_parent )); $comment_parent = get_comment($comment->comment_parent); ?>
			              <span class="rep-authorcom uk-text-meta"><?php _e( '@ Answer for:', 'cssdrive' ); ?> <?php echo $comment_parent->comment_author;?></span>
			            <?php } ?>
			          </h4>
			          
                <p class="uk-comment-meta uk-margin-remove-top">
                  <span class="com_date"><?php printf(__('%1$s in %2$s', 'cssdrive'), get_comment_date('d.m.Y'),  get_comment_time()) ?></span>
                  <?php get_author_class($comment->comment_author_email,$comment->user_id)?>
                  <?php bac_comment_count_per_user();?>
                </p>
              </div>
            </div>
            <div class="uk-position-top-right uk-position-small uk-hidden-hover uk-visible@s">
            	<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cssdrive' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
            <div class="uk-hidden@s">
	            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cssdrive' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
          </header>
          <div class="comment-content uk-comment-body">
            <?php if ( $comment->comment_approved == '0' ) : ?>
	            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cssdrive' ); ?></em>
	          <?php endif; ?>
	          <?php comment_text(); ?>
	          <?php edit_comment_link( __( 'Edit', 'cssdrive' ), '<span class="edit-link">', '</span>' ); ?>
          </div>  
        </article>
    	</div>
    	
    	<hr class="uk-hr">
   
      <?php
    break;
  endswitch;
}
endif;

/*  Меняем местами поля
============================================================*/

function cssd_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть
	$new_fields = array(); // сюда соберем поля в новом порядке
	$myorder = array('author','email','url','phone','comment'); // нужный порядок
	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}
	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;
	return $new_fields;
}
add_filter('comment_form_fields', 'cssd_reorder_comment_fields' );

/*  Поля формы INPUT
============================================================*/

function cssd_custom_fields($fields) {
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? "aria-required='true'" : ’ );
	
  $fields[ 'author' ] = '
  <div class="uk-child-width-1-3@s uk-grid-small" uk-grid>
  <p class="comment-form-author">'.
    '<label for="author">' . __( 'Name', 'cssdrive' ) . '</label>'.
    ( $req ? '<span class="required">*</span> ' : ’ ).
    '<input id="author" class="uk-input" name="author" type="text" required value="'. esc_attr( $commenter['comment_author'] ) .
    '"  tabindex="1"' . $aria_req . '></p>';
  $fields[ 'email' ] = '<p class="comment-form-email">'.
    '<label for="email">' . __( 'Email', 'cssdrive' ) . '</label>'.
    ( $req ? '<span class="required">*</span>' : ’ ).
    '<input id="email" class="uk-input" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
    '" tabindex="2"' . $aria_req . ' ></p>';
  $fields[ 'url' ] = '<p class="comment-form-url">'.
    '<label for="url">' . __( 'Website', 'cssdrive' ) . '</label>'.
    '<input id="url" class="uk-input" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
    '" tabindex="3" /></p></div>';
  $fields[ 'phone' ] = '<p class="comment-form-phone">'.
    '<label for="phone">' . __( 'Phone', 'cssdrive' ) . '</label>'.
    '<input id="phone" class="uk-input" name="phone" type="text" /></p>';
      
  return $fields;
}
add_filter('comment_form_default_fields', 'cssd_custom_fields');

/*  Поля формы TEXTAREA
============================================================*/

function cssd_comment_form_text_area($arg) {
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? "aria-required='true'" : ’ );
	// Форма [textarea]
  $arg['comment_field'] = '<p class="comment-form-comment uk-margin"><label for="comment">' . __( 'Comment*', 'cssdrive' ) . '</label><textarea id="comment" class="uk-textarea uk-resize-vertical uk-width-1-1" name="comment" rows="6" ' . $aria_req . '></textarea></p>';
  // Кнопка [sunbmit]
  $arg['comment_notes_after'] = '<button type="submit" id="submit-new" class="uk-button uk-button-primary">'.__('Post Comment', 'cssdrive').'</button>';
  return $arg;
}
add_filter('comment_form_defaults', 'cssd_comment_form_text_area');

/*  Отключаем ненужные поля
============================================================*/

function remove_comment_fields($fields) {
unset($fields['phone']);
return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_fields');

/*  Подсчет сообщений пользователей
============================================================*/

function  bac_comment_count_per_user() {
  global $wpdb;
  $comment_count = $wpdb->get_var(
  'SELECT COUNT(comment_ID) FROM '. $wpdb->comments. '
  WHERE comment_author_email = "' . get_comment_author_email() .'"
  AND comment_approved = "1"
  AND comment_type NOT IN ("pingback", "trackback")'
  );
  if ( $comment_count == 1) {
    echo ' 1 Сообщение';
  }
  else {
    echo ' ' . $comment_count . ' Сообщений';
  }
}

/*  Статус пользователя
============================================================*/

function get_author_class($comment_author_email,$user_id){
  global $wpdb;
  $adminEmail = get_option('admin_email');
  $author_count  =  count($wpdb->get_results(
  "SELECT comment_ID as author_count FROM  $wpdb->comments WHERE comment_author_email = '$comment_author_email' "));
  if($comment_author_email ==$adminEmail)
    echo '<a class="vp" href="' . get_author_posts_url(get_the_author_meta( 'ID' )) . '" title="Администратор сайта">Админ</a>';
  if($user_id!=0 && $comment_author_email !=$adminEmail)
    echo '<a class="vip" target="_blank" href="" title="Зарегистрированный пользователь">UseR</a>';
  if($author_count>=1 && $author_count<50 && $comment_author_email !==$adminEmail)
    echo '<a class="vip1" target="_blank" href="" title="Сообщений от 1 до 50">Прохожий</a>';
  else if($author_count>=50 && $author_count<100 && $comment_author_email !==$adminEmail)
    echo '<a class="vip2" target="_blank" href="" title="Сообщений от 50 до 100">Новичок</a>';
  else if($author_count>=100 && $author_count<250 && $comment_author_email !==$adminEmail)
    echo '<a class="vip3" target="_blank" href="" title="Сообщений от 100 до 250">Знающий</a>';
  else if($author_count>=250 && $author_count<400 && $comment_author_email !==$adminEmail)
    echo '<a class="vip4" target="_blank" href="" title="Сообщений от 250 до 400">Опытный</a>';
  else if($author_count>=400 &&$author_count<800 && $comment_author_email !==$adminEmail)
    echo '<a class="vip5" target="_blank" href="" title="Сообщений от 400 до 800">Бывалый</a>';
  else if($author_count>=800 && $author_count<1200 && $comment_author_email !==$adminEmail)
    echo '<a class="vip6" target="_blank" href="" title="Сообщений от 800 до 1200">СуперПупер</a>';
  else if($author_count>=1200 && $comment_author_email !==$adminEmail)
    echo '<a class="vip7" target="_blank" href="" title="Сообщений от 1200 до бесконечности">Профессор</a>';
}