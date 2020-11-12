<?php
/**
 * Core theme functions file
 *
 * @package    Grande_Theme
 * @subpackage Core
 * @category   General
 * @access     public
 * @since      1.0.0
 */

// Theme file namespace.
// namespace Grande_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Define the minimum required PHP version.
define( 'GRANDE_PHP_VERSION', '7.3' );

/**
 * Core theme function
 *
 * Loads PHP classes.
 *
 * @since  1.0.0
 * @access public
 * @global string $pagenow Gets the filename of the current page.
 * @return void
 */
function grande_theme() {

	// Register theme classes.
	require get_theme_file_path( '/includes/autoload-base.php' );
	// require get_theme_file_path( '/includes/autoload-customize.php' );

	// Get the filename of the current page.
	global $pagenow;

	// Instantiate theme classes.
	Grande_Theme\Classes\Theme     :: instance();
	Grande_Theme\Classes\Admin     :: instance();
	// Grande_Theme\Classes\Non_Latin :: instance();
	// Grande_Theme\Classes\Media     :: instance();
	// Grande_Theme\Classes\Customize :: instance();

	// Instantiate admin theme classes.
	if ( is_admin() ) {

		// Run the page header on all screens.
		// Grande_Theme\Classes\Admin_Pages :: instance();

		// Run the dashboard only on the admin index screen.
		if ( 'index.php' == $pagenow ) {
			// Grande_Theme\Classes\Dashboard :: instance();
		}
	}

	// Template files.
	// require get_theme_file_path( '/includes/template-functions.php' );
	// require get_theme_file_path( '/includes/template-tags.php' );

	// Handle SVG icons.
	// require get_theme_file_path( '/includes/svg-icons.php' );

	// Custom CSS.
	// require get_theme_file_path( '/includes/custom-css.php' );
}

// Run the theme.
grande_theme();

/**
 * Get the theme activation class
 *
 * Instantiate before the following version compare
 * to allow the deatcivation methods to run.
 */
require get_theme_file_path( '/includes/classes/class-activate.php' );

// Stop here if the minimum PHP version is not met.
if ( version_compare( phpversion(), GRANDE_PHP_VERSION, '<' ) ) {
	return;
}

load_theme_textdomain( 'grande-design', get_template_directory() . '/languages' );

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

// Theme scripts
// -----------------------------------------------------------------
function grande_theme_scripts()
{
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'modernizr',        get_template_directory_uri() . '/js/modernizr.2.8.3.js' );
	wp_enqueue_script( 'prefix',           get_template_directory_uri() . '/js/prefixfree.min.js' );
	wp_enqueue_script( 'toggle',           get_template_directory_uri() . '/js/toggle.js' );
	wp_enqueue_script( 'scroll',           get_template_directory_uri() . '/js/scrollToTop.js' );
	wp_enqueue_script( 'fittext',          get_template_directory_uri() . '/js/jquery.fittext.js' );
	wp_enqueue_script( 'flexslider',       get_template_directory_uri() . '/js/jquery.flexslider.js' );
	wp_enqueue_script( 'fancybox',         get_template_directory_uri() . '/js/jquery.fancybox.js' );
	wp_enqueue_script( 'fancymedia',       get_template_directory_uri() . '/js/jquery.fancybox-media.js' );
	wp_enqueue_script( 'froogaloop',       get_template_directory_uri() . '/js/froogaloop2.min.js' );
	wp_enqueue_script( 'fancybox-buttons', get_template_directory_uri() . '/js/jquery.fancybox-buttons.js' );
	wp_enqueue_script( 'touchSwipe',       get_template_directory_uri() . '/js/jquery.touchSwipe.js' );
	wp_enqueue_script( 'fancymouse',       get_template_directory_uri() . '/js/jquery.mousewheel.js' );
	wp_enqueue_script( 'easing',           get_template_directory_uri() . '/js/jquery.easing.js' );
	wp_enqueue_script( 'tooltip',          get_template_directory_uri() . '/js/jquery.tooltipster.js' );
}
add_action( 'wp_enqueue_scripts', 'grande_theme_scripts' );


// Theme styles
// -----------------------------------------------------------------
function grande_additional_styles()
{
	wp_enqueue_style( 'style',        get_stylesheet_uri() );
    // wp_enqueue_style( 'responsive',   get_template_directory_uri() . '/responsive.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'fontello',     get_template_directory_uri() . '/css/fontello.css' );
	wp_enqueue_style( 'flexslider',   get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'fancybox',     get_template_directory_uri() . '/css/fancybox.css' );
	wp_enqueue_style( 'tooltip',      get_template_directory_uri() . '/css/tooltipster.css' );
	wp_enqueue_style( 'comments',     get_template_directory_uri() . '/css/comments.css' );
	wp_enqueue_style( 'other',        get_template_directory_uri() . '/css/other.css' );
}
add_action( 'wp_enqueue_scripts', 'grande_additional_styles' );

// Custom login page
// -----------------------------------------------------------------
function grande_login() {
	wp_enqueue_script( 'typekit', 'https://use.typekit.net/gqn1jpx.js' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/login.js' );
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'grande_login' );

function grande_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'grande_login_logo_url' );

function grande_login_logo_url_title() {
	return 'Greg Grande';
}
add_filter( 'login_headertitle', 'grande_login_logo_url_title' );
