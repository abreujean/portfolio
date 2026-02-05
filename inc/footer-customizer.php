<?php
/**
 * Footer Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Footer Section Customizer settings
 */
function portfolio_footer_customizer($wp_customize) {
    // Footer Section Panel
    $wp_customize->add_panel('footer_panel', array(
        'title'       => __('Footer Section', 'portfolio'),
        'description' => __('Customize footer content and social links', 'portfolio'),
        'priority'    => 70,
    ));

    // Content Section
    $wp_customize->add_section('footer_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'footer_panel',
        'priority' => 10,
    ));

    // Copyright Text
    $wp_customize->add_setting('footer_copyright_text', array(
        'default'           => 'Henrique Sousa',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('footer_copyright_text', array(
        'label'       => __('Copyright Name', 'portfolio'),
        'description' => __('Your name or company name (year will be added automatically)', 'portfolio'),
        'section'     => 'footer_content',
        'type'        => 'text',
    ));

    // Social Links Section
    $wp_customize->add_section('footer_social', array(
        'title'    => __('Social Links', 'portfolio'),
        'panel'    => 'footer_panel',
        'priority' => 20,
    ));

    // LinkedIn URL
    $wp_customize->add_setting('footer_linkedin_url', array(
        'default'           => 'https://www.linkedin.com/in/thiago-de-sousa-rocha/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('footer_linkedin_url', array(
        'label'       => __('LinkedIn URL', 'portfolio'),
        'description' => __('Your LinkedIn profile URL', 'portfolio'),
        'section'     => 'footer_social',
        'type'        => 'url',
    ));

    // GitHub URL
    $wp_customize->add_setting('footer_github_url', array(
        'default'           => 'https://github.com/thiago-sousa',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('footer_github_url', array(
        'label'       => __('GitHub URL', 'portfolio'),
        'description' => __('Your GitHub profile URL', 'portfolio'),
        'section'     => 'footer_social',
        'type'        => 'url',
    ));
}
add_action('customize_register', 'portfolio_footer_customizer');
