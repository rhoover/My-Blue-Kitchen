<?php
/**
 * mbk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mbk
 */

if ( ! function_exists( 'mybluekitchen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mybluekitchen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mbk, use a find and replace
		 * to change 'mybluekitchen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mybluekitchen', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'mybluekitchen' ),
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
		add_theme_support( 'custom-background', apply_filters( 'mybluekitchen_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mybluekitchen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function mybluekitchen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	// $GLOBALS['content_width'] = apply_filters( 'mybluekitchen_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'mybluekitchen_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mybluekitchen_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mybluekitchen' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mybluekitchen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Searchbar', 'mybluekitchen' ),
		'id'            => 'searchbar-1',
		'description'   => esc_html__( 'Add search widget here.', 'mybluekitchen' ),
		'before_widget' => '<div class="header-search">',
		'after_widget'  => '</div>',
		'before_title'  => ' ',
		'after_title'   => ' ',
	) );
}
add_action( 'widgets_init', 'mybluekitchen_widgets_init' );

/**
* Remove Extraneous Crap
*/
remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer
remove_action('wp_head', 'feed_links');
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post._wp_head
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

add_filter( 'emoji_svg_url', '__return_false' );

function rh_remove_version() {return '';}
add_filter('the_generator', 'rh_remove_version');

function rh_stop_loading_wp_embed() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
add_action('init', 'rh_stop_loading_wp_embed');

/** remove p from around img tag */
function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/**
* Remove shit-ton of extraneous classs from each nav menu items_wrap
* Courtesy: http://wpsnipp.com/index.php/functions-php/remove-every-class-and-id-from-the-wp_nav_menu/
*/
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item', 'menu-item')) : '';
}

/**
* Clean Title presentation on archive page
* Courtesy: http://wordpress.stackexchange.com/questions/175884/how-to-customize-the-archive-title
*/
add_filter('get_the_archive_title', function($title) {
  if(is_category()) {
    $title = single_cat_title('', false);
  }
  return $title;
});

/**
* Get Contact Form 7 Under Control
*/
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );


/**
 * Enqueue scripts and styles.
 */
function mybluekitchen_scripts() {
	// wp_enqueue_style( 'mybluekitchen-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'mybluekitchen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'mybluekitchen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mybluekitchen_scripts' );


/**  Solving the extra gutenburg stuff **/
function remove_gutenberg_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_script( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_gutenberg_styles', 100 );

function disable_classic_theme_styles() {
	wp_deregister_style('classic-theme-styles');
	wp_dequeue_style('classic-theme-styles');
}
add_filter('wp_enqueue_scripts', 'disable_classic_theme_styles', 100);

/** change gallery image size, courtesy https://amethystwebsitedesign.com/how-to-get-larger-images-in-a-wordpress-gallery **/
function mbk_gallery_atts( $out, $pairs, $atts ) {
   
	$atts = shortcode_atts( array(
			'columns' => '3',
			'size' => 'medium',
			 ), $atts );

	$out['columns'] = $atts['columns'];
	$out['size'] = $atts['size'];

	return $out;

}
add_filter( 'shortcode_atts_gallery', 'mbk_gallery_atts', 10, 3 );

/** Custom shortcode for recipe categories */
include('shortcodes/category-shortcode.php');
/** Custom shortcode for oil categories */
include('shortcodes/oils-shortcode.php');
/** Custom shortcode for single oil category */
include('shortcodes/single-oil-shortcode.php');

/**disable new WP feature so to staay with sitemap plugin */
add_filter( 'wp_sitemaps_enabled', '__return_false' );

/** Remove stupid WP Global Styles in head element */
add_action( 'wp_enqueue_scripts', 'remove_global_styles' );
function remove_global_styles(){
    wp_dequeue_style( 'global-styles' );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
