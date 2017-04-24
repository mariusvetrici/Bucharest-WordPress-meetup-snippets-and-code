<?php
/**
 * meetup_wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package meetup_wp
 */

if ( ! function_exists( 'meetup_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meetup_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on meetup_wp, use a find and replace
	 * to change 'meetup_wp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'meetup_wp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'meetup_wp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'meetup_wp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'meetup_wp_setup' );

function theme_prefix_setup() {
 add_theme_support( 'custom-logo', array(
   'height'      => 75,
   'width'       => 300,
   'flex-width'  => true,
) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meetup_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meetup_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'meetup_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meetup_wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'meetup_wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Right', 'meetup_wp' ),
		'id'            => 'header-right',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer left', 'meetup_wp' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title-footer">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer center', 'meetup_wp' ),
		'id'            => 'footer-center',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title-footer">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer right', 'meetup_wp' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title-footer">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'meetup_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meetup_wp_scripts() {

	wp_enqueue_style( 'meetup_wp-style', get_stylesheet_uri() );

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'meetup_wp-to-top', get_template_directory_uri() . '/js/to-top.js', array(), '20171215', true );
	wp_enqueue_script( 'meetup_wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'meetup_wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meetup_wp_scripts' );


/**
* Implement the Custom code.
**/

require get_template_directory() . '/inc/script.php';


/**
* Implement Options.
**/
require get_template_directory() . '/inc/options.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
