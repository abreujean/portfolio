<?php
/**
 * Enqueue scripts and styles
 * 
 * @package Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme styles and scripts
 */
function portfolio_enqueue_assets() {
	// Enqueue main stylesheet
	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Enqueue CSS files in correct order
	wp_enqueue_style( 'portfolio-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), '1.0.0' );
	wp_enqueue_style( 'portfolio-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), '1.0.0' );
	wp_enqueue_style( 'portfolio-components', get_template_directory_uri() . '/assets/css/components.css', array( 'portfolio-variables' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-sections', get_template_directory_uri() . '/assets/css/sections.css', array( 'portfolio-components' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'portfolio-sections' ), '1.0.0' );

	// Enqueue main JavaScript
	wp_enqueue_script( 'portfolio-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );

	// Localize script for AJAX data
	wp_localize_script(
		'portfolio-main',
		'portfolio_ajax',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'portfolio_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'portfolio_enqueue_assets' );

/**
 * Enqueue admin styles
 */
function portfolio_admin_styles() {
	wp_enqueue_style( 'portfolio-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'portfolio_admin_styles' );