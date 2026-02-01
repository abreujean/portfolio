<?php
/**
 * Theme setup and configuration
 * 
 * @package Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup
 */
function portfolio_theme_setup() {
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus
	register_nav_menus(
		array(
			'primary' => __( 'Menu Principal', 'portfolio' ),
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature
	add_theme_support(
		'custom-background',
		array(
			'default-color' => '#0A0D16',
			'default-image' => '',
		)
	);

	// Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Remove admin bar from frontend
	add_filter( 'show_admin_bar', '__return_false' );
}
add_action( 'after_setup_theme', 'portfolio_theme_setup' );

/**
 * Set content width
 */
function portfolio_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
 * Remove unnecessary WordPress features
 */
function portfolio_cleanup() {
	// Remove WordPress version from head
	remove_action( 'wp_head', 'wp_generator' );
	
	// Remove RSD link
	remove_action( 'wp_head', 'rsd_link' );
	
	// Remove Windows Live Writer manifest link
	remove_action( 'wp_head', 'wlwmanifest_link' );
	
	// Remove emoji support
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'portfolio_cleanup' );