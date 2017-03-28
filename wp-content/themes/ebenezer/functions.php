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
			'principal' => 'Principal',
		) );
		
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_image_size( 'thumb_post', 250, 200, true );
	}
endif;

add_action( 'after_setup_theme', 'ebenezer_setup' );

//Desabilita a barra de administração do site
//show_admin_bar(false);

/**
 * Estilos e scripts do site
 */
function ebenezer_scripts() {
	wp_enqueue_style( 'ebenezer-css-basic', get_template_directory_uri() . '/css/lib/basic-style.css' );
	wp_enqueue_style( 'ebenezer-css', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'ebenezer-wp-css', get_template_directory_uri() . '/css/wordpress-style.css' );
	wp_enqueue_style( 'ebenezer-css-owl-carousel', get_template_directory_uri() . '/css/lib/owl.carousel.css' );
	wp_enqueue_style( 'ebenezer-css-fonts', get_template_directory_uri() . '/css/lib/ebenezer-codes.css' );
	

	wp_enqueue_script( 'ebenezer-js-jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', true );
	wp_enqueue_script( 'ebenezer-js-owl-carousel', get_template_directory_uri() . '/js/lib/owl.carousel.min.js',  true );
	wp_enqueue_script( 'ebenezer-js-general-scripts', get_template_directory_uri() . '/js/scripts.js',  true );
	wp_enqueue_script( 'ebenezer-js-home-scripts', get_template_directory_uri() . '/js/script-home.js',  true );
}

add_action( 'wp_enqueue_scripts', 'ebenezer_scripts' );

function add_excerpt_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'add_excerpt_to_pages' );

// function add_image_class($class){
//     $class = '_img-responsive';
//     return $class;
// }

// add_filter('get_image_tag_class','add_image_class');

/**
 * Registra widgets.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ebenezer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ebenezer' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Adicione widgets aqui', 'ebenezer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ebenezer_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Funções do tema
 */
require get_template_directory() . '/inc/custom-theme-functions.php';