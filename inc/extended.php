<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
	
/*  Excerpt
============================================================*/

// Добавляем класс
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}
add_filter( "the_excerpt", "add_class_to_excerpt" );

// Изменить текст ссылки
function modify_read_more_link() {
  return '<div class="uk-margin"><a class="more-link" href="' . get_permalink() . '"> ' . __( 'Read the full article...', 'cssdrive' ) . '</a></div>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

// Заменяет текст фрагмента «Читать дальше» по ссылке
function new_excerpt_more($more) {
  global $post;
	return '<div class="uk-margin"><a class="moretag" href="'. get_permalink($post->ID) . '"> ' . __( 'Read the full article...', 'cssdrive' ) . '</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Пропустить прокрутку страницы при нажатии ссылки More
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

/*  Добавялем собственные классы к логотипу
============================================================*/

function add_custom_logo() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $html = sprintf( '<a href="%1$s" class="uk-navbar-item uk-logo" rel="home" itemprop="url">%2$s</a>',
    esc_url( esc_url( home_url( '/' ) ) ),
    wp_get_attachment_image( $custom_logo_id, 'full', false, array(
      'class' => 'custom-logo',
    ) )
  );
  return $html;   
}
add_filter( 'get_custom_logo', 'add_custom_logo' );

/*  Меняем параметры вывода поля "Защищено"
============================================================*/

function true_new_post_pass_form() {
	return '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
	  <div class="uk-margin-top">Запись защищена. Для получения пароля обратитесь к администратору.</div>
	  <ul class="uk-grid-small uk-margin" uk-grid>
      <li class="uk-width-expand@s">
        <input class="uk-input" name="post_password" type="password" placeholder="Пароль к записи" />
      </li>
      <li class="uk-width-auto@s">
        <input class="uk-button uk-button-primary" type="submit" name="Submit" value="Разблокировать" />
      </li>
    </ul>
	</form>';
}
add_filter( 'the_password_form', 'true_new_post_pass_form' );

/*  Включаем возможность загрузки SVG файлов в медиатеку
============================================================*/

function add_svg_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'add_svg_types');

/*  Добавляем заголовки к контейнеру "Повторитель" в ACF
============================================================*/

function acf_flexible_content_layout_title( $title, $field, $layout, $i ) {	
	// remove layout title from text
	$title = '';
	// load sub field image
	// note you may need to add extra CSS to the page t style these elements
	/*
	$title .= '<div class="thumbnail">';
	if( $image = get_sub_field('plugins_img') ) {
		$title .= '<img src="' . $image['sizes']['thumbnail'] . '" height="18" />';
	}
	$title .= '</div>';
	*/
	
	// load text sub field
	if( $text = get_sub_field('plugins_name') ) {
		$title .= '<strong>' . $text . '</strong>';
	}
	// return
	return $title;
}
// name
add_filter('acf/fields/flexible_content/layout_title/name=repeater_plugins', 'acf_flexible_content_layout_title', 10, 4);