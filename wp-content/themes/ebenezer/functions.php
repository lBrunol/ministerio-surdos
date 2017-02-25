<?php
/**
 * ebenezer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ebenezer
 */

if ( ! function_exists( 'ebenezer_setup' ) ) :
	function ebenezer_setup() {
		
		load_theme_textdomain( 'ebenezer', get_template_directory() . '/languages' );

		
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ebenezer' ),
		) );
		
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;

add_action( 'after_setup_theme', 'ebenezer_setup' );

//Desabilita a barra de administração do site
show_admin_bar(false);

/**
 * Estilos e scripts do site
 */
function ebenezer_scripts() {
	wp_enqueue_style( 'ebenezer-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'ebenezer-jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', true );
	wp_enqueue_script( 'ebenezer-script-geral', get_template_directory_uri() . '/js/scripts.js',  true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}

add_action( 'wp_enqueue_scripts', 'ebenezer_scripts' );