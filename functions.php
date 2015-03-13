<?php /*
	DIY Theme functions and definitions

	Set up the theme and provides some helper functions, which are used in the
	theme as custom template tags. Others are attached to action and filter
	hooks in WordPress to change core functionality.

	When using a child theme you can override certain functions (those wrapped
	in a function_exists() call) by defining them first in your child theme's
	functions.php file. The child theme's functions.php file is included before
	the parent theme's file, so the child theme functions would be used.

	@link http://codex.wordpress.org/Theme_Development
	@link http://codex.wordpress.org/Child_Themes
	@link http://codex.wordpress.org/Plugin_API
	
	@package WordPress
	@subpackage DIY Theme

*/

 define( 'WP_DEBUG', true );
 define( 'WP_DEBUG_DISPLAY', true );
 define( 'WP_DEBUG_LOG', false );

add_theme_support( 'title-tag' );



// default content width
if (!isset($content_width)) $content_width = 960;



// enable theme support
function diy_setup() {
	
	// enable featured images
	add_theme_support('post-thumbnails');

	// enable custom headers
	add_theme_support('custom-header');
	
	// enable custom backgrounds
	add_theme_support('custom-background');
	
	// enable three nav menus
	register_nav_menus(array(
		'header'  => __('Header Menu', 'diy'),
		'sidebar' => __('Sidebar Menu', 'diy'),
		'footer'  => __('Footer Menu', 'diy'),
	));
	
	// automatic feed links
	add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'diy_setup');



// enable widgets
function diy_widgets_init() {
	register_sidebar(array(
		'name'          => __('Header Widgets', 'diy'),
		'id'            => 'header',
		'description'   => __('Header Area', 'diy'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
	register_sidebar(array(
		'name'          => __('Sidebar Widgets', 'diy'),
		'id'            => 'sidebar',
		'description'   => __('Sidebar Area', 'diy'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
	register_sidebar(array(
		'name'          => __('Footer Widgets', 'diy'),
		'id'            => 'footer',
		'description'   => __('Footer Area', 'diy'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
}
add_action('widgets_init', 'diy_widgets_init');



// enable styles for visual editor
function diy_add_editor_style() {
	add_editor_style('style-editor.css');
}
add_action('after_setup_theme', 'diy_add_editor_style');



// enqueue script and style
function diy_scripts_styles() {

	// load custom scripts
	wp_enqueue_script('custom', get_template_directory_uri() .'/js/custom.js', array('jquery'), null, false);
	
	// conditionally load script for threaded comments
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	// load style.css
	wp_enqueue_style('diy', get_stylesheet_uri(), array(), null);
	
	// Pure.css is already linked. Simple uncomment the line below. 
	// Load pure.css http://purecss.io/
	//wp_enqueue_style( 'pure', 'http://yui.yahooapis.com/pure/0.5.0/pure-min.css', false ); 
	
}
add_action('wp_enqueue_scripts', 'diy_scripts_styles');

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function diy_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'diy' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'diy_wp_title', 10, 2 );


