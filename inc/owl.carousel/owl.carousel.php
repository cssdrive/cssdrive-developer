<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/*  Подключаем скрипты в head
============================================================*/

function owl_carousel_scripts() {
  if ( is_front_page() ) { // Выводим только на главной
    wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/inc/owl.carousel/owl.carousel.css' ), false, '1.3.3', 'all' );
    wp_enqueue_script( 'owl-carousel', get_theme_file_uri() . '/inc/owl.carousel/owl.carousel.js', array( 'jquery' ), '1.3.3', false );
  }
}
add_action('wp_enqueue_scripts','owl_carousel_scripts');