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

	// Enqueue Core CSS files (always loaded)
	wp_enqueue_style( 'portfolio-reset', get_template_directory_uri() . '/assets/css/core/reset.css', array(), '1.0.0' );
	wp_enqueue_style( 'portfolio-variables', get_template_directory_uri() . '/assets/css/core/variables.css', array( 'portfolio-reset' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-typography', get_template_directory_uri() . '/assets/css/core/typography.css', array( 'portfolio-variables' ), '1.0.0' );

	// Enqueue Component CSS files (reusable components)
	wp_enqueue_style( 'portfolio-navigation', get_template_directory_uri() . '/assets/css/components/navigation.css', array( 'portfolio-typography' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-buttons', get_template_directory_uri() . '/assets/css/components/buttons.css', array( 'portfolio-typography' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-forms', get_template_directory_uri() . '/assets/css/components/forms.css', array( 'portfolio-typography' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-cards', get_template_directory_uri() . '/assets/css/components/cards.css', array( 'portfolio-typography' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-utilities', get_template_directory_uri() . '/assets/css/components/utilities.css', array( 'portfolio-typography' ), '1.0.0' );

	// Enqueue Section CSS files (page sections)
	wp_enqueue_style( 'portfolio-hero', get_template_directory_uri() . '/assets/css/sections/hero.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-about', get_template_directory_uri() . '/assets/css/sections/about.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-portfolio', get_template_directory_uri() . '/assets/css/sections/portfolio.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-skills', get_template_directory_uri() . '/assets/css/sections/skills.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-career', get_template_directory_uri() . '/assets/css/sections/career.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-recommendations', get_template_directory_uri() . '/assets/css/sections/recommendations.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-contact', get_template_directory_uri() . '/assets/css/sections/contact.css', array( 'portfolio-utilities' ), '1.0.0' );
	wp_enqueue_style( 'portfolio-footer', get_template_directory_uri() . '/assets/css/sections/footer.css', array( 'portfolio-utilities' ), '1.0.0' );

	// Enqueue SwiperJS CSS
	wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );

	// Enqueue SwiperJS
	wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );

	// Enqueue main JavaScript
	wp_enqueue_script( 'portfolio-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery', 'swiper-js' ), '1.0.0', true );

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