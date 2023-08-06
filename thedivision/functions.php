<?php
/**
 * Shape functions and definitions
 *
 * @package shape
 * @since shape 1.0
 */
 
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since shape 1.0
 */
 
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'shape_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since shape 1.0
 */
function shape_setup() {
 
    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );
 
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on Shape, use a find and replace
     * to change 'shape' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'shape', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );
 
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'shape' ),
    ) );
}
endif; // shape_setup
add_action( 'after_setup_theme', 'shape_setup' );

/**
 * Enqueue scripts and styles
 */
function shape_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'shape_scripts' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Shape 1.0
 */
 
if ( function_exists('register_sidebars') ){
	register_sidebars(2);
}
if ( function_exists('register_sidebars') ){
	register_sidebars(3);
}

 
function shape_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'shape' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title h3">',
        'after_title' => '</h3>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'shape' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title h3">',
        'after_title' => '</h3>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'bbpress Left-Sidebar', 'shape' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title h3">',
        'after_title' => '</h3>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'bbpress Right-Sidebar', 'shape' ),
        'id' => 'sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title h3">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'shape_widgets_init' );

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menu' );

function add_parent_url_menu_class( $classes = array(), $item = false ) {
	// Get current URL
	$current_url = current_url();

	// Get homepage URL
	$homepage_url = trailingslashit( get_bloginfo( 'url' ) );

	// Exclude 404 and homepage
	if( is_404() or $item->url == $homepage_url ) return $classes;

	if ( strstr( $current_url, $item->url) ) {
		// Add the 'parent_url' class
		$classes[] = 'current_page_item';
	}

	return $classes;
}

function current_url() {
	// Protocol
	$url = ( 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';

	$url .= $_SERVER['SERVER_NAME'];

	// Port
	$url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];

	$url .= $_SERVER['REQUEST_URI'];

	return trailingslashit( $url );
}

add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 2 );

function delete_own_post($retvalue, $capability, $args) {

if ($capability=="delete_post") {return bb_current_user_can( 'edit_post', $args[1]);}

return $retvalue;

}

add_filter('bb_current_user_can', 'delete_own_post',10,3);

function allow_images_allowed_tags( $tags ) {
	if (bb_current_user_can('moderate')){
	
		$tags = array('src' => array(), 'title' => array(), 'alt' => array());	
	}	
	return $tags;
}

add_filter( 'bb_allowed_tags', 'allow_images_allowed_tags' );

?>
