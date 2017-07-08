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
		add_image_size( 'banner_mobile', 450, 200, true );
		add_image_size( 'thumb_video_home', 168, 94, true );
	}
endif;

add_action( 'after_setup_theme', 'ebenezer_setup' );
remove_action('wp_head', 'wp_generator');

//Desabilita a barra de administração do site
show_admin_bar(false);

function admin_scripts(){

	wp_enqueue_media();
	wp_enqueue_style('admin_custom_style', get_template_directory_uri() . '/css/custom-admin.css');
}

add_action('admin_enqueue_scripts', 'admin_scripts');


/**
 * Estilos e scripts do site
 */
function ebenezer_scripts() {
	wp_enqueue_style( 'ebenezer-css-basic', get_template_directory_uri() . '/css/lib/basic-style.css' );
	wp_enqueue_style( 'ebenezer-css', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'ebenezer-1', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'ebenezer-wp-css', get_template_directory_uri() . '/css/wordpress-style.css' );
	wp_enqueue_style( 'ebenezer-css-owl-carousel', get_template_directory_uri() . '/css/lib/owl.carousel.css' );
	wp_enqueue_style( 'ebenezer-css-fonts', get_template_directory_uri() . '/css/lib/ebenezer-codes.css' );
	

	wp_enqueue_script( 'ebenezer-js-jquery', get_template_directory_uri() . '/js/lib/jquery-1.12.4.min.js', true );
	wp_enqueue_script( 'ebenezer-js-owl-carousel', get_template_directory_uri() . '/js/lib/owl.carousel.min.js',  true );
	wp_enqueue_script( 'ebenezer-js-general-scripts', get_template_directory_uri() . '/js/scripts.js',  true );
}

add_action( 'wp_enqueue_scripts', 'ebenezer_scripts' );


function login_scripts(){

	wp_enqueue_style('admin_custom_style', get_template_directory_uri() . '/css/custom-admin.css');
}

add_action( 'login_enqueue_scripts', 'login_scripts' );

function load_async_scripts( $url ){
	if( strpos( $url, '#async' ) === false )
		return $url;
	else if( is_admin() )
		return str_replace( '#async', '', $url );
	else
		return str_replace( '#async', '', $url ) ."' async='true";
}

add_filter( 'clean_url', 'load_async_scripts', 11, 1 );

/**
* Remove a versão do wordpress dos scripts e CSSs
*/
function remove_ver( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_ver', 9999 );
add_filter( 'script_loader_src', 'remove_ver', 9999 );

/**
 * Desabilita a exclusão automática dos arquivos da lixeira
*/ 
function remove_automatic_delete() {
	remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}

add_action( 'init', 'remove_automatic_delete' );

function add_excerpt_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'add_excerpt_to_pages' );

/*
* Botões customizados no editor
*/
function custom_buttons() {
	add_filter( 'mce_external_plugins', 'add_custom_buttons' );
    add_filter( 'mce_buttons', 'register_custom_buttons' );
}

add_action( 'admin_head', 'custom_buttons' );

function add_custom_buttons( $plugin_array ) {
    $plugin_array['video_youtube'] = get_template_directory_uri() . '/js/custom-buttons-editor.js';

    return $plugin_array;
}

function register_custom_buttons( $buttons ) {
    array_push( $buttons, 'video_youtube' );
    
    return $buttons;
}

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

	register_sidebar( array(
		'name' => 'Home sidebar',
		'id' => 'home_sidebar',
		'description' => 'Barra lateral da home',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}
add_action( 'widgets_init', 'ebenezer_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Funções do tema
 */
require_once get_template_directory() . '/inc/custom-theme-functions.php';

/*
* Custom post types
*/
require_once get_template_directory() . '/inc/custom-post-type/custom-type-eventos.php';
require_once get_template_directory() . '/inc/custom-post-type/custom-type-banner.php';

/*
* Shortcodes
*/
require_once get_template_directory() . '/inc/shortcodes/shortcode-editor.php';
require_once get_template_directory() . '/inc/shortcodes/shortcode-eventos.php';

/*
* Widgets
*/
require_once get_template_directory() . '/inc/widgets/widget-busca.php';
require_once get_template_directory() . '/inc/widgets/widget-posts.php';
require_once get_template_directory() . '/inc/widgets/widget-eventos.php';