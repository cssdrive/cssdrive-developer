<?php
	
/*  Setup
============================================================*/

function cssdrive_setup() {
	load_theme_textdomain( 'cssdrive', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );

	register_nav_menus(array(
		'top'    => __( 'Top Menu', 'cssdrive' ),
	));
	
	add_theme_support('post-formats', array(
		'image',
	));
}
add_action( 'after_setup_theme', 'cssdrive_setup' );

/*  Scripts
============================================================*/

function cssdrive_scripts() {
	wp_enqueue_style( 'uikit', get_theme_file_uri( '/assets/uikit/css/uikit.min.css' ), false, '3.0.0-rc.17', 'all' );
	wp_enqueue_style( 'extended', get_theme_file_uri( '/assets/css/extended.css' ), false, '', 'all' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'uikit', get_theme_file_uri() . '/assets/uikit/js/uikit.min.js', array( 'jquery' ), '3.0.0-rc.17', true );
	wp_enqueue_script( 'uikit-icons', get_theme_file_uri() . '/assets/uikit/js/uikit-icons.min.js', array( 'jquery' ), '3.0.0-rc.17', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cssdrive_scripts' );

/*  Includes
============================================================*/

// Расширенные возможности навигации
require get_parent_theme_file_path( '/inc/dropdown.php' );
require get_parent_theme_file_path( '/inc/offcanvas.php' );

// Кастомный шаблон комментариев
require get_parent_theme_file_path( '/inc/comments.php' );

// Регистрация втджетов и кастомных решений
require get_parent_theme_file_path( '/inc/widgets.php' );

// Меняем вывод постраничной навигации в постах
require get_parent_theme_file_path( '/inc/pagination.php' );

// Расширения и дополнения к стандартным функциям WordPress
require get_parent_theme_file_path( '/inc/extended.php' );