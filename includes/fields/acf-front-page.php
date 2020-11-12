<?php
/**
 * ACF fields: front page
 *
 * Rquires the Advanced Custom Fields Pro plugin
 * to be installed and activated.
 *
 * @package    Grande_Theme
 * @subpackage Admin\Custom_Fields
 * @category   Editing
 * @since      1.0.0
 */

namespace Grande\Admin\Custom_Fields;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( function_exists( 'acf_add_local_field_group' ) ) :

	// Gallery images preview size in the admin.
	$gallery_preview = 'Portfolio Thumbnail';

	acf_add_local_field_group( [
		'key'    => 'group_566f19363b264',
		'title'  => __( 'Intro Slides', 'grande-design' ),
		'fields' => [
			[
				'key'               => 'field_567610ead78ad',
				'label'             => __( 'Add Intro', 'grande-design' ),
				'name'              => 'add_slideshow',
				'type'              => 'true_false',
				'instructions'      => __( 'Adding an intro changes the header on the home page from plain text to text over an image background.<br />Use a single image in the gallery to create a static background, use two or more to create a slideshow the fades between photos.', 'grande-design' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => __( 'Check to add intro', 'grande-design' ),
				'default_value'     => 0,
				'ui'                => 0,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
			],
			[
				'key'               => 'field_566f196d7dec6',
				'label'             => __( 'Intro Slides', 'grande-design' ),
				'name'              => 'intro_slides',
				'type'              => 'gallery',
				'instructions'      => __( 'Drag & drop the thumbnails to set the order of the slideshow.', 'grande-design' ),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_567610ead78ad',
							'operator' => '==',
							'value'    => '1',
						],
					],
				],
				'wrapper'  => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'min'           => '',
				'max'           => '',
				'preview_size'  => $gallery_preview,
				'library'       => 'all',
				'min_width'     => 1000,
				'min_height'    => 563,
				'min_size'      => '',
				'max_width'     => '',
				'max_height'    => '',
				'max_size'      => '',
				'mime_types'    => '',
				'return_format' => 'array',
				'insert'        => 'append',
			],
		],
		'location' => [
			[
				[
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				],
			],
		],
		'menu_order'            => 1,
		'position'              => 'acf_after_title',
		'style'                 => 'seamless',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => [
			0  => 'permalink',
			1  => 'the_content',
			2  => 'excerpt',
			3  => 'custom_fields',
			4  => 'discussion',
			5  => 'comments',
			6  => 'revisions',
			7  => 'slug',
			8  => 'author',
			9  => 'format',
			10 => 'page_attributes',
			11 => 'featured_image',
			12 => 'categories',
			13 => 'tags',
			14 => 'send-trackbacks',
		],
		'active'      => true,
		'description' => __( 'For the slides in the Intro section of the homepage.', 'grande-design' )
	] );

endif;
