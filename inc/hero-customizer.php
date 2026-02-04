<?php
/**
 * Hero Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Hero Section Customizer settings
 */
function portfolio_hero_customizer($wp_customize) {
    // Hero Section Panel
    $wp_customize->add_panel('hero_panel', array(
        'title'       => __('Hero Section', 'portfolio'),
        'description' => __('Customize the hero section content and appearance', 'portfolio'),
        'priority'    => 30,
    ));

    // Hero Content Section
    $wp_customize->add_section('hero_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'hero_panel',
        'priority' => 10,
    ));

    // First Name
    $wp_customize->add_setting('hero_first_name', array(
        'default'           => 'Henrique',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_first_name', array(
        'label'       => __('First Name', 'portfolio'),
        'description' => __('Your first name', 'portfolio'),
        'section'     => 'hero_content',
        'type'        => 'text',
    ));

    // Last Name
    $wp_customize->add_setting('hero_last_name', array(
        'default'           => 'Sousa',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_last_name', array(
        'label'       => __('Last Name', 'portfolio'),
        'description' => __('Your last name', 'portfolio'),
        'section'     => 'hero_content',
        'type'        => 'text',
    ));

    // Role Text
    $wp_customize->add_setting('hero_role_text', array(
        'default'           => 'Front-end developer · UI designer',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_role_text', array(
        'label'       => __('Role/Title', 'portfolio'),
        'description' => __('Your professional title or role', 'portfolio'),
        'section'     => 'hero_content',
        'type'        => 'text',
    ));

    // Greeting Text
    $wp_customize->add_setting('hero_greeting_text', array(
        'default'           => '👋 Saudações!',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_greeting_text', array(
        'label'       => __('Greeting', 'portfolio'),
        'description' => __('Greeting message (emoji supported)', 'portfolio'),
        'section'     => 'hero_content',
        'type'        => 'text',
    ));

    // Status Text
    $wp_customize->add_setting('hero_status_text', array(
        'default'           => 'Available for work',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_status_text', array(
        'label'       => __('Status Text', 'portfolio'),
        'description' => __('Status message (visible on mobile)', 'portfolio'),
        'section'     => 'hero_content',
        'type'        => 'text',
    ));

    // Social Links Section
    $wp_customize->add_section('hero_socials', array(
        'title'    => __('Social Links', 'portfolio'),
        'panel'    => 'hero_panel',
        'priority' => 20,
    ));

    // LinkedIn URL
    $wp_customize->add_setting('hero_linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_linkedin_url', array(
        'label'       => __('LinkedIn URL', 'portfolio'),
        'section'     => 'hero_socials',
        'type'        => 'url',
    ));

    // GitHub URL
    $wp_customize->add_setting('hero_github_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_github_url', array(
        'label'       => __('GitHub URL', 'portfolio'),
        'section'     => 'hero_socials',
        'type'        => 'url',
    ));

    // Dribbble URL
    $wp_customize->add_setting('hero_dribbble_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_dribbble_url', array(
        'label'       => __('Dribbble URL', 'portfolio'),
        'section'     => 'hero_socials',
        'type'        => 'url',
    ));

    // Behance URL
    $wp_customize->add_setting('hero_behance_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_behance_url', array(
        'label'       => __('Behance URL', 'portfolio'),
        'section'     => 'hero_socials',
        'type'        => 'url',
    ));

    // Actions Section
    $wp_customize->add_section('hero_actions', array(
        'title'    => __('Actions', 'portfolio'),
        'panel'    => 'hero_panel',
        'priority' => 30,
    ));

    // CV URL
    $wp_customize->add_setting('hero_cv_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_cv_url', array(
        'label'       => __('CV Download URL', 'portfolio'),
        'description' => __('Link to your CV/resume PDF file', 'portfolio'),
        'section'     => 'hero_actions',
        'type'        => 'url',
    ));

    // CV Text
    $wp_customize->add_setting('hero_cv_text', array(
        'default'           => 'Baixar CV ↓',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_cv_text', array(
        'label'       => __('CV Link Text', 'portfolio'),
        'section'     => 'hero_actions',
        'type'        => 'text',
    ));

    // Chat Button Text
    $wp_customize->add_setting('hero_chat_button_text', array(
        'default'           => '💬 Vamos conversar!',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_chat_button_text', array(
        'label'       => __('Chat Button Text', 'portfolio'),
        'section'     => 'hero_actions',
        'type'        => 'text',
    ));

    // Visibility Section
    $wp_customize->add_section('hero_visibility', array(
        'title'    => __('Visibility', 'portfolio'),
        'panel'    => 'hero_panel',
        'priority' => 40,
    ));

    // Show Socials
    $wp_customize->add_setting('hero_show_socials', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_show_socials', array(
        'label'       => __('Show Social Icons', 'portfolio'),
        'section'     => 'hero_visibility',
        'type'        => 'checkbox',
    ));

    // Show Language
    $wp_customize->add_setting('hero_show_lang', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_show_lang', array(
        'label'       => __('Show Language Switcher', 'portfolio'),
        'description' => __('Visible on mobile only (desktop shows in menu)', 'portfolio'),
        'section'     => 'hero_visibility',
        'type'        => 'checkbox',
    ));

    // Show Status
    $wp_customize->add_setting('hero_show_status', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_show_status', array(
        'label'       => __('Show Status', 'portfolio'),
        'description' => __('Visible on mobile only (desktop shows in menu)', 'portfolio'),
        'section'     => 'hero_visibility',
        'type'        => 'checkbox',
    ));

    // Show Greeting
    $wp_customize->add_setting('hero_show_greeting', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_show_greeting', array(
        'label'       => __('Show Greeting', 'portfolio'),
        'section'     => 'hero_visibility',
        'type'        => 'checkbox',
    ));

    // Show CV Link
    $wp_customize->add_setting('hero_show_cv_link', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_show_cv_link', array(
        'label'       => __('Show CV Download Link', 'portfolio'),
        'section'     => 'hero_visibility',
        'type'        => 'checkbox',
    ));

    // Show Chat Button
    $wp_customize->add_setting('hero_show_chat_button', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_show_chat_button', array(
        'label'       => __('Show Chat Button', 'portfolio'),
        'section'     => 'hero_visibility',
        'type'        => 'checkbox',
    ));
}
add_action('customize_register', 'portfolio_hero_customizer');
