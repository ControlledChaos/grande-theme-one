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
define( 'GRANDE_CUSTOMIZE_CLASS', get_theme_file_path() . '/includes/classes/customize/class-' );

// Array of classes to register.
const CUSTOMIZE_CLASSES = [
	'Grande_Theme\Classes\Customize'          => GRANDE_CUSTOMIZE_CLASS . 'customize.php',
	'Grande_Theme\Classes\Separator_Control'  => GRANDE_CUSTOMIZE_CLASS . 'separator-control.php',
	'Grande_Theme\Classes\Customize_Sanitize' => GRANDE_CUSTOMIZE_CLASS . 'customize-sanitize.php',
];

// Autoload class files.
spl_autoload_register(
	function ( string $classname ) {
		if ( isset( CUSTOMIZE_CLASSES[ $classname ] ) ) {
			require CUSTOMIZE_CLASSES[ $classname ];
		}
	}
);