<?php
/**
 * About Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register About Section Customizer settings
 */
function portfolio_about_customizer($wp_customize) {
    // About Section Panel
    $wp_customize->add_panel('about_panel', array(
        'title'       => __('About Section', 'portfolio'),
        'description' => __('Customize the about section content and appearance', 'portfolio'),
        'priority'    => 40,
    ));

    // Content Section
    $wp_customize->add_section('about_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'about_panel',
        'priority' => 10,
    ));

    // Avatar Image
    $wp_customize->add_setting('about_avatar', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_avatar', array(
        'label'       => __('Avatar Image', 'portfolio'),
        'description' => __('Upload an image to display as avatar (recommended size: 260x260px)', 'portfolio'),
        'section'     => 'about_content',
        'settings'    => 'about_avatar',
    )));

    // Badge Text
    $wp_customize->add_setting('about_badge', array(
        'default'           => '🧐 Sobre mim',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('about_badge', array(
        'label'       => __('Badge Text', 'portfolio'),
        'description' => __('Badge text displayed above the name (emoji supported)', 'portfolio'),
        'section'     => 'about_content',
        'type'        => 'text',
    ));

    // Name
    $wp_customize->add_setting('about_name', array(
        'default'           => 'Jean Abreu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('about_name', array(
        'label'       => __('Name', 'portfolio'),
        'description' => __('Your full name', 'portfolio'),
        'section'     => 'about_content',
        'type'        => 'text',
    ));

    // Description Section
    $wp_customize->add_section('about_description', array(
        'title'    => __('Description', 'portfolio'),
        'panel'    => 'about_panel',
        'priority' => 20,
    ));

    // Description Text
    $wp_customize->add_setting('about_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('about_description', array(
        'label'       => __('Description', 'portfolio'),
        'description' => __('Enter your description. Use double line breaks to separate paragraphs.', 'portfolio'),
        'section'     => 'about_description',
        'type'        => 'textarea',
    ));

    // List Section
    $wp_customize->add_section('about_list', array(
        'title'    => __('List Items', 'portfolio'),
        'panel'    => 'about_panel',
        'priority' => 30,
    ));

    // Interests
    $wp_customize->add_setting('about_interests', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('about_interests', array(
        'label'       => __('Interests', 'portfolio'),
        'description' => __('Enter your interests (e.g., Front-end or back-end)', 'portfolio'),
        'section'     => 'about_list',
        'type'        => 'textarea',
    ));

    // Objective
    $wp_customize->add_setting('about_objective', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('about_objective', array(
        'label'       => __('Objective', 'portfolio'),
        'description' => __('Enter your objective (e.g., Create products that generate positive impact)', 'portfolio'),
        'section'     => 'about_list',
        'type'        => 'textarea',
    ));
}
add_action('customize_register', 'portfolio_about_customizer');
