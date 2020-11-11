<?php
/**
 * Register theme classes
 *
 * @package  Grande_Theme
 * @category General
 * @access   public
 * @since    1.0.0
 */

// Theme file namespace.
namespace Grande_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Define the `classes` directory.
define( 'GRANDE_CLASS', get_theme_file_path() . '/includes/classes/class-' );

// Array of classes to register.
const CLASSES = [
	'Grande_Theme\Classes\Theme'               => GRANDE_CLASS . 'theme.php',
	// 'Grande_Theme\Classes\Non_Latin'           => GRANDE_CLASS . 'non-latin.php',
	// 'Grande_Theme\Classes\SVG_Icons'            => GRANDE_CLASS . 'svg-icons.php',
	// 'Grande_Theme\Classes\Media'            => GRANDE_CLASS . 'media.php',
	// 'Grande_Theme\Classes\Walker_Comment'            => GRANDE_CLASS . 'walker-comment.php',
	// 'Grande_Theme\Classes\Walker_Page'            => GRANDE_CLASS . 'walker-page.php',
	// 'Grande_Theme\Classes\Dark_Mode_Widget' => GRANDE_CLASS . 'dark-mode-widget.php',
	// 'Grande_Theme\Classes\User_Bio'         => GRANDE_CLASS . 'user-bio.php',
	// 'Grande_Theme\Classes\Admin_Pages'      => GRANDE_CLASS . 'admin-pages.php',
	// 'Grande_Theme\Classes\Dashboard'        => GRANDE_CLASS . 'dashboard.php',
	// 'Grande_Theme\Classes\Script_Loader'        => GRANDE_CLASS . 'script-loader.php'
];

// Autoload class files.
spl_autoload_register(
	function ( string $classname ) {
		if ( isset( CLASSES[ $classname ] ) ) {
			require CLASSES[ $classname ];
		}
	}
);
