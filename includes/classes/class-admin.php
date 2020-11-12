<?php
/**
 * Grande_Theme admin class
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

class Admin {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Set variable for new instance.
		$theme_admin = new self;

		// Register custom fields.
		$theme_admin->fields();

		// Return the instance.
		return $theme_admin;
	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {}

	/**
	 * Register custom fields
	 *
	 * Includes fields for the Advanced Custom Fields Pro plugin.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function fields() {

		// Load fields for Advanced Custom Fields Pro.
		if ( class_exists( 'acf_pro' ) ) {

			// Front page.
			require_once get_theme_file_path( 'includes/fields/acf-front-page.php' );
		}
	}
}
