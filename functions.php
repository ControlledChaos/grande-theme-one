<?php

load_theme_textdomain( 'grande-design', get_template_directory() . '/languages' );

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}


// Clean up the <head>
// -----------------------------------------------------------------
function grande_remove_head_links() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action( 'init', 'grande_remove_head_links' );

remove_action( 'wp_head', 'wp_generator' );


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

function grande_editor_styles() {
	add_editor_style();
}
add_action( 'after_setup_theme', 'grande_editor_styles' );


// Theme support
// -----------------------------------------------------------------
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 640, 480, true );
add_theme_support( 'automatic-feed-links' );


// Title tag filters
// -----------------------------------------------------------------
function grande_document_title_separator( $sep ) {
    $sep = "|";
	return $sep;
}
add_filter( 'document_title_separator', 'grande_document_title_separator' );


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


// Add Custom Menus
// -----------------------------------------------------------------
function grande_register_menus() {
	register_nav_menus(
	array(
	'navigation' => __( 'Navigation Menu', 'grande-design' )
	)
	);
}
add_action( 'init', 'grande_register_menus' );


// Custom images
// -----------------------------------------------------------------
add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
add_image_size('large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true );
add_image_size( 'Intro Slide', 1000, 563, true );
add_image_size( 'Poster Preview', 200, 300, true );
add_image_size( 'Poster', 320, 480, true );
add_image_size( 'Gallery Preview', 120, 120, true );
add_image_size( 'Sharing Image', 600, 315, true );


// Add excerpts to pages for use in meta data
// -----------------------------------------------------------------
function grande_page_excerpts() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'grande_page_excerpts' );