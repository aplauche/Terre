<?php
/**
 * This file adds functions to the Terre WordPress theme.
 *
 * @package Terre
 * @author  Anton Plauche
 * @license GNU General Public License v2 or later
 */

if ( ! function_exists( 'terre_setup' ) ) {

	/**
	 * Main Setup Function
	 * 
	 * @since 0.0.1
	 */
	function terre_setup() {

		add_theme_support( 'editor-styles' );

		// Make theme available for translation.
		load_theme_textdomain( 'terre', get_template_directory() . '/languages' );

		// Enqueue editor styles.
		add_editor_style( get_template_directory_uri() . '/style.css' );

		// Load all block styles on page regardless if they are included or not
		// __return_true may speed up website, but could lead to bugs
		add_filter( 'should_load_separate_core_block_assets', '__return_false' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );
	}
}
add_action( 'after_setup_theme', 'terre_setup' );

/**
 * Enqueue theme style sheet.
 *
 * @since 0.0.1
 */
function terre_enqueue_style_sheet() {

	wp_enqueue_style(
		'terre',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'terre' )->get( 'Version' )
	);

}
add_action( 'wp_enqueue_scripts', 'terre_enqueue_style_sheet' );

/**
 * Enqueue editor JS file for Gutenberg mods.
 *
 * @since 0.0.1
 */
function terre_blocktheme_gutenberg_styles() {
  wp_enqueue_script( 
		'terre-editor-script', 
		get_template_directory_uri() . '/scripts/editor.js', 
		array(), 
		wp_get_theme( 'terre' )->get( 'Version' ), 
		true 
	);
}
add_action( 'enqueue_block_editor_assets', 'terre_blocktheme_gutenberg_styles' );
