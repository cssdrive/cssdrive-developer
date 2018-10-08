<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

function cssd_breadcrumb() {
  if (!is_front_page()) {
    echo '<li><a href="';
    echo get_option('home');
    echo '"> ' . __( 'Home', 'cssdrive' ) . ' ';
    echo "</a></li>";
    if (is_category() || is_single()) {
      echo " <li>";
      the_category(' ');
      echo " </li> ";
      if (is_single()) {
        echo " <li>";
        the_title();
        echo " </li>";
      }
    } elseif (is_page()) {
      echo " <li>";
      echo the_title();
      echo " </li>";
    }
  }
  else {
    echo " <li>";
    echo ' ' . __( 'Home', 'cssdrive' ) . ' ';
    echo " </li>";
  }
}