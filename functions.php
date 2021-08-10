<?php
/**
 * Sandbox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sandbox
 */

if ( ! defined( 'SANDBOX_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'SANDBOX_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sandbox_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sandbox_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sandbox, use a find and replace
		 * to change 'sandbox' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sandbox', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'sandbox' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sandbox_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'sandbox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sandbox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sandbox_content_width', 640 );
}
add_action( 'after_setup_theme', 'sandbox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sandbox_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'sandbox' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'sandbox' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title mb-3">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'sandbox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sandbox_scripts() {
	wp_enqueue_style( 'sandbox-style', get_stylesheet_uri(), array(), SANDBOX_VERSION );
	wp_enqueue_style( 'sandbox-plugins', get_template_directory_uri() . '/assets/css/plugins.css', array(), SANDBOX_VERSION );
	wp_enqueue_style( 'sandbox-theme', get_template_directory_uri() . '/assets/css/style.css', array(), SANDBOX_VERSION );
	wp_enqueue_style( 'sandbox-font', get_template_directory_uri() . '/assets/css/font/thicccboi.css', array(), SANDBOX_VERSION );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true );

	wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', array(), '5.0.1', true );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'sandbox-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), SANDBOX_VERSION, true );
	wp_enqueue_script( 'sandbox-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), SANDBOX_VERSION, true );
	wp_enqueue_script( 'sandbox-likes', get_template_directory_uri() . '/assets/js/likes.js', array( 'jquery' ), SANDBOX_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'sandbox_scripts' );

/**
 * Register Custom Navigation Walker
 */
function sandbox_register_navwalker(){
    require_once 'inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'sandbox_register_navwalker' );

/**
 * Implement the Custom Header feature.
 */
require 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require 'inc/template-functions.php';

/**
 * Customizer additions.
 */
require 'inc/customizer.php';

/**
 * Customizer additions.
 */
require 'inc/post-like.php';

/**
 * Custom Widgets.
 */
require 'inc/widgets.php';

/**
 * Custom Post Types.
 */
require 'inc/custom-post-types.php';

/**
 * Redux Framework.
 */
require 'inc/acf-install.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require 'inc/jetpack.php';
}
