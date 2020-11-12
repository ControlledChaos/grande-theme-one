<?php
/**
 * Grande_Theme theme class
 *
 * Adds theme support, enqueues styles & scripts, registers
 * navigation menus & widget areas, all the typical theme stuff.
 *
 * @package    Grande_Theme
 * @subpackage Classes
 * @category   General
 * @since      1.0.0
 */

// Theme file namespace.
namespace Grande_Theme\Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Theme {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {
		return new self;
	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Remove unpopular meta tags.
		add_action( 'init', [ $this, 'head_cleanup' ] );

		// Title tag separator.
		add_filter( 'document_title_separator', [ $this, 'title_separator' ] );

		// Theme setup.
		add_action( 'after_setup_theme', [ $this, 'setup' ], 11 );

		// Remove user color scheme picker.
		remove_action( 'admin_init', 'register_admin_color_schemes' );

		// Add navigation menus.
		add_action( 'init', [ $this, 'menus' ] );

		// Frontend scripts.
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ] );

		// Print frontend scripts.
		add_action( 'wp_print_footer_scripts', [ $this, 'print_frontend_scripts' ] );

		// Frontend styles.
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_styles' ] );

		// Backend styles.
		add_action( 'admin_enqueue_scripts', [ $this, 'backend_styles' ], 99 );

		// Editor styles.
		add_action( 'init', [ $this, 'editor_styles' ] );

		// Editor styles from Customizer.
		// add_filter( 'tiny_mce_before_init', [ $this, 'editor_customizer_styles' ] );

		// Customizer scripts.
		add_action( 'customize_controls_print_footer_scripts', [ $this, 'customize_scripts' ] );

		// Customizer styles.
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'customize_styles' ] );

		// Customizer preview.
		add_action( 'customize_preview_init', [ $this, 'customize_preview_init' ] );

		// Login styles.
		add_action( 'login_enqueue_scripts', [ $this, 'login_styles' ] );

		// Skiip link.
		add_action( 'wilbur_body_open', [ $this, 'skip_link' ], 5 );

		// Read more link.
		add_filter( 'the_content_more_link', 'read_more' );

		// Add excerpts to pages for use in meta data.
        add_action( 'init', [ $this, 'add_page_excerpts' ] );

        // Show excerpt metabox by default.
        add_filter( 'default_hidden_meta_boxes', [ $this, 'show_excerpt_metabox' ], 10, 2 );

		// Grande theme page.
		add_action( 'admin_menu', [ $this, 'theme_page' ] );

		// Tabbed theme page scripts.
		add_action( 'admin_enqueue_scripts', [ $this, 'tabs' ] );

		// Filter the parent theme starter content.
		if ( is_customize_preview() ) {
			add_filter( 'wilbur_starter_content', [ $this, 'starter_content' ] );
		}
	}

	/**
	 * Clean up meta tags from the <head>
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function head_cleanup() {

		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
	}

	/**
	 * Title tag separator
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the text of the separator.
	 */
	public function title_separator( $sep ) {
		$sep = '|';
		return $sep;
	}

	/**
	 * Theme setup
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Set content-width.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1024;
		}

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set post thumbnail size.
		set_post_thumbnail_size( 1280, 720, [ 'center', 'center' ] );

		// Extra-large image the same as the content width.
		add_image_size( 'extra-large', 1024, 768, true );

		// Custom images
		// -----------------------------------------------------------------
		add_image_size( 'Intro Slide', 1000, 563, true );
		add_image_size( 'Poster Preview', 200, 300, true );
		add_image_size( 'Poster', 320, 480, true );
		add_image_size( 'Gallery Preview', 120, 120, true );
		add_image_size( 'Sharing Image', 600, 315, true );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			]
		);

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'grande' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		/*
		 * Adds starter content to highlight the theme on fresh sites.
		 * This is done conditionally to avoid loading the starter content on every
		 * page load, as it is a one-off operation only needed once in the customizer.
		 */
		if ( is_customize_preview() ) {
			// require get_theme_file_path( '/includes/starter-content.php' );
			// add_theme_support( 'starter-content', wilbur_get_starter_content() );
		}

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'editor-styles' );
		add_theme_support( 'dark-editor-style' );
	}

	/**
	 * Register navigation menus
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function menus() {

		$locations = [
			'navigation' => __( 'Navigation Menu', 'grande' ),
			'footer'     => __( 'Footer Menu', 'grande' )
		];

		register_nav_menus( $locations );
	}

	/**
	 * Enqueue frontend scripts
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function frontend_scripts() {

		wp_enqueue_script( 'jquery' );

		$theme_version = wp_get_theme()->get( 'Version' );

		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// wp_enqueue_script( 'wilbur-js', get_theme_file_uri( 'assets/js/index.min.js' ), [], $theme_version, false );
		// wp_script_add_data( 'wilbur-js', 'async', true );
	}

	/**
	 * Enqueue frontend scripts
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function print_frontend_scripts() {

		// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);

		jQuery( document ).ready( function($) {

			var href   = window.location.href,
				noHash = window.location.href.replace( /#.*$/, '' );

			$( '.to-the-content' ).click( function(event) {
				event.preventDefault();
				$( 'html, body' ).stop().animate( { scrollTop: $( '#post-inner' ).offset().top }, '250' );
				window.history.replaceState( '', document.title, noHash );
			});

			$( '.to-the-top' ).click( function(event) {
				event.preventDefault();
				$( 'html, body' ).stop().animate( { scrollTop: $( 'html' ).offset().top }, 'fast' );
				window.history.replaceState( '', document.title, noHash );
			});

			// Check to see if the window is top if not then display button.
			$( window ).scroll( function() {
				if ( $(this).scrollTop() > 450 ) {
					$( '.to-the-top' ).fadeIn( '250' );
				} else {
					$( '.to-the-top' ).fadeOut( '250' );
				}
			});
		});
		</script>
		<?php
	}

	/**
	 * Enqueue frontend styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function frontend_styles() {

		// Get theme version.
		$theme_version  = wp_get_theme()->get( 'Version' );

		/**
		 * Theme sylesheet
		 *
		 * This enqueues the minified stylesheet compiled from SASS (.scss) files.
		 * The main stylesheet, in the root directory, only contains the theme header but
		 * it is necessary for theme activation. DO NOT delete the main stylesheet!
		 */
		wp_enqueue_style( 'grande', get_theme_file_uri( 'assets/css/style.min.css' ), [], $theme_version, 'all' );

		// Right-to-left languages.
		if ( is_rtl() ) {
			wp_enqueue_style( 'wilbur-rtl', get_theme_file_uri( 'assets/css/rtl.min.css' ), [ 'grande' ], $theme_version, 'all' );
		}

		wp_enqueue_style( 'wilbur-style', get_stylesheet_uri(), [ 'grande' ], $theme_version, 'all' );
		wp_style_add_data( 'wilbur-style', 'rtl', 'replace' );

		// Add output of Customizer settings as inline style.
		// wp_add_inline_style( 'wilbur-style', wilbur_get_customizer_css( 'front-end' ) );

		// Add print CSS.
		wp_enqueue_style( 'wilbur-print-style', get_theme_file_uri( 'print.css' ), null, $theme_version, 'print' );

		/**
		 * Dark mode styles
		 *
		 * These syles are enqueued if the user's device prefers dark mode.
		 * Same as the dark mode option in the Customizer.
		 */
		wp_enqueue_style( 'wilbur-dark', get_theme_file_uri( 'assets/css/dark-mode.min.css' ), [ 'grande' ], $theme_version, '(prefers-color-scheme: dark)' );

		// Toolbar styles.
		wp_enqueue_style( 'wilbur-toolbar', get_theme_file_uri( 'assets/css/toolbar.min.css' ), [ 'grande' ], $theme_version, 'all' );
	}

	/**
	 * Enqueue backend styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function backend_styles() {

		// Get WordPress version.
		global $wp_version;

		// Get theme versions.
		$theme_version  = wp_get_theme()->get( 'Version' );

		// Admin page styles.
		// wp_enqueue_style( 'wilbur-admin', get_theme_file_uri( 'assets/css/admin.css' ), [], $theme_version, 'all' );

		// WordPress 5.4 + styles.
		if ( version_compare( $wp_version, '5.4', '>=' ) ) {
			wp_enqueue_style( 'wilbur-edit-page', get_theme_file_uri( 'assets/css/edit-page.css' ), [], $theme_version, 'all' );
		} else {
			wp_enqueue_style( 'wilbur-edit-page', get_theme_file_uri( 'assets/css/edit-page-early.css' ), [], $theme_version, 'all' );
		}

		// Right-to-left languages.
		if ( is_rtl() ) {
			wp_enqueue_style( 'wilbur-admin-rtl', get_theme_file_uri( 'assets/css/admin-rtl.css' ), [ 'wilbur-admin' ], $theme_version, 'all' );
		}

		// Toolbar styles.
		// wp_enqueue_style( 'wilbur-toolbar', get_theme_file_uri( 'assets/css/toolbar.css' ), [ 'admin-bar' ], $theme_version, 'all' );
	}

	/**
	 * Editor styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function editor_styles() {

		$editor_styles = [
			'/assets/css/editor.min.css',
		];

		add_editor_style( $editor_styles );
	}

	/**
	 * Editor styles from Customizer
	 *
	 * Adds styles to the head of the TinyMCE iframe.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $mce_init TinyMCE styles.
	 * @return array TinyMCE styles.
	 * @return void
	 */
	public function editor_customizer_styles( $mce_init ) {

		$styles = wilbur_get_customizer_css( 'editor' );

		if ( ! isset( $mce_init['content_style'] ) ) {
			$mce_init['content_style'] = $styles . ' ';
		} else {
			$mce_init['content_style'] .= ' ' . $styles . ' ';
		}

		return $mce_init;
	}

	/**
	 * Enqueue customizer scripts
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function customize_scripts() {

		// Get theme versions.
		$theme_version  = wp_get_theme()->get( 'Version' );

		wp_enqueue_script( 'wilbur-customize', get_theme_file_uri( 'assets/js/customize.min.js' ), [], $theme_version, true );
	}

	/**
	 * Enqueue customizer styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function customize_styles() {

		// Get theme versions.
		$theme_version  = wp_get_theme()->get( 'Version' );

		// Add main customizer js file.
		wp_enqueue_script( 'wilbur-customize', get_theme_file_uri( '/assets/js/customize.js' ), [ 'jquery' ], $theme_version, false );

		// Add script for color calculations.
		wp_enqueue_script( 'wilbur-color-calculations', get_theme_file_uri( '/assets/js/color-calculations.js' ), [ 'wp-color-picker' ], $theme_version, false );

		// Add script for controls.
		wp_enqueue_script( 'wilbur-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), [ 'wilbur-color-calculations', 'customize-controls', 'underscore', 'jquery' ], $theme_version, false );
		wp_localize_script( 'wilbur-customize-controls', 'twentyTwentyBgColors', $this->get_customizer_color_vars() );

		wp_enqueue_style( 'wilbur-customize', get_theme_file_uri( 'assets/css/customize.min.css' ), [], $theme_version, 'all' );
	}

	/**
	 * Enqueue scripts for the customizer preview.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function customize_preview_init() {

		$theme_version = wp_get_theme()->get( 'Version' );

		wp_enqueue_script( 'wilbur-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), [ 'customize-preview', 'customize-selective-refresh', 'jquery' ], $theme_version, true );
	}

	/**
	 * Enqueue login styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function login_styles() {

		// Get theme versions.
		$theme_version  = wp_get_theme()->get( 'Version' );

		wp_enqueue_style( 'wilbur-login', get_theme_file_uri( 'assets/css/login.min.css' ), [], $theme_version, 'all' );
	}

	/**
	 * Returns an array of variables for the customizer preview.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_customizer_color_vars() {

		$colors = [
			'content'       => [
				'setting' => 'background_color',
			],
			'header-footer' => [
				'setting' => 'header_footer_background_color',
			],
		];
		return $colors;
	}

	/**
	 * Skip link
	 *
	 * Includes a skip to content link at the top of the page
	 * so that users can bypass the menu.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup of the link.
	 */
	public function skip_link() {
		echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'grande' ) . '</a>';
	}

	/**
	 * Read more link
	 *
	 * Overwrites the default more tag with styling and screen reader markup.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $html The default output HTML for the more tag.
	 * @return string
	 */
	public function read_more( $html ) {

		return preg_replace(
			'/<a(.*)>(.*)<\/a>/iU',
			sprintf(
				'<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>',
				get_the_title( get_the_ID() )
			),
			$html
		);
	}

	/**
     * Add excerpts to pages
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function add_page_excerpts() {
        add_post_type_support( 'page', 'excerpt' );
    }

    /**
     * Excerpts visible by default
     *
     * @since  1.0.0
	 * @access public
     * @param  array $hidden
     * @param  object $screen
	 * @return array Unsets the hidden value in the screen base array.
     */
    public function show_excerpt_metabox( $hidden, $screen ) {

        // Post type screens to show excerpt.
        if ( 'post' == $screen->base || 'page' == $screen->base ) {

            // Look for hidden stuff.
            foreach( $hidden as $key=>$value ) {

                // If the excerpt is hidden, show it.
                if ( 'postexcerpt' == $value ) {
                    unset( $hidden[$key] );
                    break;
                }

            }

        }

        // Return the default for other post types.
        return $hidden;
	}

	/**
	 * Enqueue jQuery tabs
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the script tag for jQuery tabs.
	 */
	public function tabs() {
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_add_inline_script( 'jquery-ui-tabs', 'jQuery(document).ready(function($){ $("#theme-page-content .tabbed-content").tabs({ activate: function( event, ui ) { ui.newPanel.hide().fadeIn(250); } }) });', true );
	}

	/**
	 * Grande theme page
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function theme_page() {

		// Add a submenu page under Themes.
		$this->theme_page = add_theme_page(
			__( 'Grande Theme Information', 'grande' ),
			__( 'Grande Theme', 'grande' ),
			'manage_options',
			'grande',
			[ $this, 'theme_page_output' ],
			-1
		);

		// Add sample help tab.
		add_action( 'load-' . $this->theme_page, [ $this, 'help_theme_page' ] );
	}

	/**
     * Add help tabs to the theme page
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function help_theme_page() {

		// Add to the about page.
		$screen = get_current_screen();
		if ( $screen->id != $this->theme_page ) {
			return;
		}
	}

	/**
     * Get output of the theme page
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function theme_page_output() {
        require get_theme_file_path( '/templates/theme-page.php' );
	}

	/**
	 * Function to return the array of starter content for the theme.
	 *
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 *
	 * Passes through the `wilbur_starter_content` filter before returning.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $starter_content Array of starter content added by the parent theme.
	 * @return array Returns a filtered array of args for the starter_content.
	 */
	public function starter_content( $starter_content ) {

		// Define and register starter content to showcase the theme on new sites.
		require get_theme_file_path( '/includes/starter-content.php' );
		$starter_content = \Grande_Theme\Includes\starter_content();

		return $starter_content;
	}
}
