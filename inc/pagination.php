<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
	
/*  Постраничная навигация
-------------------------------------------------------------------*/

function pagination( $before = '', $after = '', $echo = true, $args = array(), $wp_query = null ) {
	if( ! $wp_query )
		global $wp_query;
	// параметры по умолчанию
	$default_args = array(
		'text_num_page'   => 'Страница {current} из {last}:', // Текст перед пагинацией. {current} - текущая; {last} - последняя (пр. 'Страница {current} из {last}' получим: "Страница 4 из 60" )
		'num_pages'       => 6, // сколько ссылок показывать
		'step_link'       => 12, // ссылки с шагом (значение - число, размер шага (пр. 1,2,3...10,20,30). Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…', // промежуточный текст "до".
		'dotright_text2'  => '…', // промежуточный текст "после".
		'back_text'       => '<span uk-pagination-previous></span>', // текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => '<span uk-pagination-next></span>', // текст "перейти на следующую страницу". Ставим 0, если эта ссылка не нужна.
		'first_page_text' => 'к началу', // текст "к первой странице". Ставим 0, если вместо текста нужно показать номер страницы.
		'last_page_text'  => 'в конец', // текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
	);
	$default_args = apply_filters('pagenavi_args', $default_args ); // чтобы можно было установить свои значения по умолчанию
	$args = array_merge( $default_args, $args );
	extract( $args );
	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	$paged          = (int) $wp_query->query_vars['paged'];
	$max_page       = $wp_query->max_num_pages;
	//проверка на надобность в навигации
	if( $max_page <= 1 )
		return false;
	if( empty( $paged ) || $paged == 0 )
		$paged = 1;
	$pages_to_show = intval( $num_pages );
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor( $pages_to_show_minus_1/2 ); //сколько ссылок до текущей страницы
	$half_page_end = ceil( $pages_to_show_minus_1/2 ); //сколько ссылок после текущей страницы
	$start_page = $paged - $half_page_start; //первая страница
	$end_page = $paged + $half_page_end; //последняя страница (условно)
	if( $start_page <= 0 )
		$start_page = 1;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;
	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}
	if( $start_page <= 0 )
		$start_page = 1;
	//выводим навигацию
	$out = '';
	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if( false === strpos( $first_url, '?') )
		$first_url = user_trailingslashit( $first_url );
	$out .= $before . "<ul class='uk-pagination uk-flex-center uk-flex-middle'>\n";
		if( $text_num_page ){
			$text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
			$out.= sprintf( "<li><span class='pages'>$text_num_page</span></li> ", $paged, $max_page );
		}
		// назад
		if ( $back_text && $paged != 1 )
			$out .= '<li><a href="'. ( ($paged-1)==1 ? $first_url : str_replace( '___', ($paged-1), $link_base ) ) .'">'. $back_text .'</a></li> ';
			
		// в начало
		if ( $start_page >= 2 && $pages_to_show < $max_page ) {
			$out.= '<li><a class="first" href="'. $first_url .'">'. ( $first_page_text ? $first_page_text : 1 ) .'</a></li> ';
			if( $dotright_text && $start_page != 2 ) $out .= '<li><span class="extend">'. $dotright_text .'</span><li> ';
		}
		// пагинация
		for( $i = $start_page; $i <= $end_page; $i++ ) {
			if( $i == $paged )
				$out .= '<li class="uk-active"><span>'.$i.'</span></li> ';
			elseif( $i == 1 )
				$out .= '<li><a href="'. $first_url .'">1</a></li> ';
			else
				$out .= '<li><a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a></li> ';
		}
		//ссылки с шагом
		$dd = 0;
		if ( $step_link && $end_page < $max_page ){
			for( $i = $end_page+1; $i<=$max_page; $i++ ) {
				if( $i % $step_link == 0 && $i !== $num_pages ) {
					if ( ++$dd == 1 )
						$out.= '<li><span class="extend">'. $dotright_text2 .'</span></li> ';
					$out.= '<li><a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a></li> ';
				}
			}
		}
		// в конец
		if ( $end_page < $max_page ) {
			if( $dotright_text && $end_page != ($max_page-1) )
				$out.= '<li><span class="extend">'. $dotright_text2 .'</span></li> ';
			$out.= '<li><a class="last" href="'. str_replace( '___', $max_page, $link_base ) .'">'. ( $last_page_text ? $last_page_text : $max_page ) .'</a></li> ';
		}
		// вперед
		if ( $next_text && $paged != $end_page )
			$out.= '<li><a class="next" href="'. str_replace( '___', ($paged+1), $link_base ) .'">'. $next_text .'</a></li> ';
	$out .= "</ul>". $after ."\n";
	$out = apply_filters('pagenavi', $out );
	if( $echo )
		return print $out;
	return $out;
}
