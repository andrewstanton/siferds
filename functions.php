<?php
/**
 * Todd Productions Inc. functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Todd Productions Inc.
 */

if ( ! function_exists( 'siferds_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function siferds_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Todd Productions Inc., use a find and replace
	 * to change 'big_trees' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'big_trees', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'big_trees' ),
		'footer-menu' => __( 'Footer', 'big_trees' ),
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
	add_theme_support( 'custom-background', apply_filters( 'siferds_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'siferds_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function siferds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'siferds_content_width', 640 );
}
add_action( 'after_setup_theme', 'siferds_content_width', 0 );


/*
 *
 * Add Page Categories
 * Page Excerpts
 *
 */
function siferds_pagesetup() {
	add_post_type_support( 'page', 'excerpt' );
	// Add category metabox to page
	register_taxonomy_for_object_type('category', 'page');
	}
add_action( 'init', 'siferds_pagesetup' );

/**
 * Enqueue scripts and styles.
 */
function siferds_scripts() {

	/*
	 * CSS Files
	 */
	
	// Sass Compiled File
	wp_enqueue_style('big-trees-app-css', get_template_directory_uri().'/css/app.min.css');

	/*
	 * JS Files
	 */
	wp_enqueue_script( 'big-trees-font-awesome', 'https://use.fontawesome.com/releases/v5.0.7/js/all.js', array(), '4.0.0', true );

	wp_enqueue_script( 'big-trees-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	wp_enqueue_script( 'big-trees-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'big-trees-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'big-trees-appjs', get_template_directory_uri() . '/js/app.min.js', array('jquery'), '20170926', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'siferds_scripts' );


/**
 * Remove Options from toolbar
 */
 function siferds_remove_admin_bar_links() {
	global $wp_admin_bar;

	//Remove WordPress Logo Menu Items
	$wp_admin_bar->remove_menu('wp-logo'); // Removes WP Logo and submenus completely, to remove individual items, use the below mentioned codes
	$wp_admin_bar->remove_menu('about'); // 'About WordPress'
	$wp_admin_bar->remove_menu('wporg'); // 'WordPress.org'
	$wp_admin_bar->remove_menu('documentation'); // 'Documentation'
	$wp_admin_bar->remove_menu('support-forums'); // 'Support Forums'
	$wp_admin_bar->remove_menu('feedback'); // 'Feedback'


	$wp_admin_bar->remove_menu('themes'); // 'Themes'
	$wp_admin_bar->remove_menu('widgets'); // 'Widgets'
	$wp_admin_bar->remove_menu('menus'); // 'Menus'

	// Remove Comments Bubble
	$wp_admin_bar->remove_menu('comments');

	//Remove Update Link if theme/plugin/core updates are available
	$wp_admin_bar->remove_menu('updates');

	//Remove '+ New' Menu Items
	$wp_admin_bar->remove_menu('new-content'); // Removes '+ New' and submenus completely, to remove individual items, use the below mentioned codes
	$wp_admin_bar->remove_menu('new-post'); // 'Post' Link
	$wp_admin_bar->remove_menu('new-media'); // 'Media' Link
	$wp_admin_bar->remove_menu('new-link'); // 'Link' Link
	$wp_admin_bar->remove_menu('new-page'); // 'Page' Link
	$wp_admin_bar->remove_menu('new-user'); // 'User' Link
 }
 
 add_action( 'wp_before_admin_bar_render', 'siferds_remove_admin_bar_links' );


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


//Load Plugin Dependency
include_once( __DIR__ . '/vendor/autoload.php' );
WP_Dependency_Installer::instance()->run( __DIR__ );