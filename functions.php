<?php
/**
 * Functions file for Portfolio Theme
 *
 * @package Portfolio
 */

// Require theme setup and configuration files
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/hero-section.php';
require_once get_template_directory() . '/inc/hero-customizer.php';
require_once get_template_directory() . '/inc/about-section.php';
require_once get_template_directory() . '/inc/about-customizer.php';
require_once get_template_directory() . '/inc/skills-section.php';
require_once get_template_directory() . '/inc/skills-customizer.php';
require_once get_template_directory() . '/inc/portfolio-section.php';
require_once get_template_directory() . '/inc/portfolio-customizer.php';
require_once get_template_directory() . '/inc/career-section.php';
require_once get_template_directory() . '/inc/career-customizer.php';
require_once get_template_directory() . '/inc/recommendations-section.php';
require_once get_template_directory() . '/inc/recommendations-customizer.php';

/**
 * Allow SVG uploads in WordPress
 */
function portfolio_allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'portfolio_allow_svg_upload');

/**
 * Fix SVG display in WordPress admin
 */
function portfolio_fix_svg_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'portfolio_fix_svg_display');