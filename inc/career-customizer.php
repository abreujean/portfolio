<?php
/**
 * Career Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Career Section Customizer settings
 */
function portfolio_career_customizer($wp_customize) {
    // Career Section Panel
    $wp_customize->add_panel('career_panel', array(
        'title'       => __('Career Section', 'portfolio'),
        'description' => __('Customize career section content and appearance', 'portfolio'),
        'priority'    => 50,
    ));

    // Header Section
    $wp_customize->add_section('career_header', array(
        'title'    => __('Header', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 10,
    ));

    // Badge Text
    $wp_customize->add_setting('career_badge', array(
        'default'           => '💼 Carreira',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_badge', array(
        'label'       => __('Badge Text', 'portfolio'),
        'description' => __('Badge text displayed above title (emoji supported)', 'portfolio'),
        'section'     => 'career_header',
        'type'        => 'text',
    ));

    // Title
    $wp_customize->add_setting('career_title', array(
        'default'           => 'Trajetória até aqui',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_title', array(
        'label'       => __('Section Title', 'portfolio'),
        'description' => __('Main title of career section', 'portfolio'),
        'section'     => 'career_header',
        'type'        => 'text',
    ));

    // Professional Section
    $wp_customize->add_section('career_professional', array(
        'title'    => __('Professional Experiences', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 20,
    ));

    // Professional Period
    $wp_customize->add_setting('career_professional_period', array(
        'default'           => '2020 · Atualmente',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_period', array(
        'label'       => __('Professional Period', 'portfolio'),
        'description' => __('Overall period for professional experiences', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    // Professional Experience 1
    $wp_customize->add_setting('career_professional_1_title', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_title', array(
        'label'       => __('Experience 1 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_1_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_description', array(
        'label'       => __('Experience 1 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_1_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_tags', array(
        'label'       => __('Experience 1 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_1_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_period', array(
        'label'       => __('Experience 1 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_1_highlight', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_highlight', array(
        'label'       => __('Experience 1 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 2
    $wp_customize->add_setting('career_professional_2_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_title', array(
        'label'       => __('Experience 2 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_description', array(
        'label'       => __('Experience 2 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_2_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_tags', array(
        'label'       => __('Experience 2 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_period', array(
        'label'       => __('Experience 2 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_highlight', array(
        'label'       => __('Experience 2 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Academic Section
    $wp_customize->add_section('career_academic', array(
        'title'    => __('Academic Experiences', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 30,
    ));

    // Academic Period
    $wp_customize->add_setting('career_academic_period', array(
        'default'           => '2011 · Atualmente',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_period', array(
        'label'       => __('Academic Period', 'portfolio'),
        'description' => __('Overall period for academic experiences', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 1
    $wp_customize->add_setting('career_academic_1_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_title', array(
        'label'       => __('Course 1 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_1_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_description', array(
        'label'       => __('Course 1 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_1_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_period', array(
        'label'       => __('Course 1 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 2
    $wp_customize->add_setting('career_academic_2_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_title', array(
        'label'       => __('Course 2 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_2_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_description', array(
        'label'       => __('Course 2 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_2_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_period', array(
        'label'       => __('Course 2 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));
}
add_action('customize_register', 'portfolio_career_customizer');
